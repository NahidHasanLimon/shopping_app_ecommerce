<?php
namespace App\Shop;
// use Session;
use App\User;
use App\Product;
use Auth;
use Session;
use App\Cart as CartModel;
use App\CartItem;
use App\Coupon;
class Cart
{
	private $user;
	private $product;
  private $session;
  private $cart_id_db;
	function __construct()
	{		
      $this->session = session();
      if (Auth::check()) {
        $this->user = Auth::user();
        $this->cart_id_db = $this->get_looged_user_cart_id();
    }
	}
	public function get_looged_user_cart_id(){
    $cart_id = null;
     if (Auth::check()){
        $cart_model = new CartModel();
        $cart_model = $cart_model->where('user_id','=',$this->user->id)->where('is_active','=',1)->first();
        if (!is_null($cart_model)) {
          $cart_id = $cart_model->id;
        }
    }
    return $cart_id;
  }
	public function add($item)
    {
      $product_id = $item['id'];
      $this->product = Product::find($product_id);
        if(!$this->product) {
            abort(404);
        }
         if (Auth::check()) {
          $this->add_to_cart_db();
         }else{
          $this->add_to_cart_session();
        }
	}
  // public function update($items){
  //   dd($items);
  // }
  public function details(){
    if (Auth::check()) {
          return $this->db_cart_details();
         }else{
           return $this->session_cart_details();
        }
    }
     public function update($items){
      if(!is_null($this->user) && isset($this->user)){
        return $this->update_cart_db($items);
      }else{
        return $this->update_cart_session($items);
      }
      
     }
  public function update_cart_db($items){
    $cart_item = new CartItem();
    foreach ($items as $key => $value){
      $cart_item = $cart_item->where('cart_id','=',$this->cart_id_db)->where('product_id','=',$key)->first();
      $current_quantity = $cart_item->quantity;
      $updated_quantity = $value;
      $price = $cart_item->price;
        $cart_item->update(
          [
            'quantity'=> $updated_quantity,
            'item_total'=> $updated_quantity * $price
          ]
        );
      }
      $this->store_cart_summary_db();
      return true;
    } 
    public function update_cart_session($items){
      $cart = session()->get('cart');
      foreach ($items as $key => $value){
        $cart['items'][$key]["quantity"] = $value;
        $cart['items'][$key]["item_total"] = $cart['items'][$key]["price"] * $value;
      }
      session()->put('cart', $cart);
      session()->save();
      return true;
    }
  public function remove($product_id){
    if (Auth::check()) {
           $this->remove_item_from_cart_db($product_id);
         }else{
            $this->remove_item_from_cart_session($product_id);
        }
    }
  public function add_to_cart_db(){
    $cart_model = new CartModel();
    if (is_null($this->cart_id_db)) {
      $cart_model->user_id = $this->user->id;
      $cart_model->session_id = $this->session->getId();
      $cart_model->save();
      $this->cart_id_db = $cart_model->id;
    }
    $cart_item = new CartItem();
    $exist_item = $cart_item->where('cart_id', '=',$this->cart_id_db)->where('product_id', '=', $this->product->id)->first();
    if (is_null($exist_item)) {
     $this->add_item_in_cart_db();
    }
    elseif (!is_null($exist_item)) {
      $this->increment_item_in_cart_db();
    }
  }

  public function apply_coupon($coupon_code){
    $coupon = new Coupon();
    $coupon = $coupon->where('code','=',$coupon_code)->first();
    if (!is_null($coupon) || !empty($coupon)) {
      if (!is_null($coupon->expiration_date) && $coupon->expiration_date<'2030-11-11') {
        return "Coupon Expired";
      }elseif ($coupon->is_active==0) {
        return "expired";
      }else{
        if (!is_null($this->user) || !empty($this->user)) {
          if ($this->store_coupon_in_cart_db($coupon)) {
            return "success";
          }
        }else{
          if($this->store_coupon_in_cart_session($coupon)){
            return "success";
          }
        }
      }
    }else{
      return "invalid";
    }
  }
  public function store_coupon_in_cart_db($coupon){
    $cart = new CartModel();
        $cart = $cart->where('id','=',$this->cart_id_db)->first();
        $cart->coupon_code = $coupon->code;
        $cart->coupon_value = $coupon->value;
        if ($cart->save()) {
          $this->store_cart_summary_db();
          return true;
        }   
  }
 public function store_coupon_in_cart_session($coupon){
  $cart = session()->get("cart");
  $cart['coupon_code'] = $coupon->code;
  $cart['coupon_value'] = $coupon->value;
  session()->put("cart", $cart);
                if (session()->save()) {
                  $this->store_cart_summary_session();
                  return true;
                }
        
  }
  public function remove_coupon($coupon_code){
    if (!is_null($this->user) || !empty($this->user)) {
          return $this->remove_coupon_from_cart_db($coupon_code);
        }else{
           return $this->remove_coupon_from_cart_session($coupon_code);
        }
  }
  public function remove_coupon_from_cart_db($coupon_code){
    $cart_model = new CartModel();
    $cart_model = $cart_model->where('id','=',$this->cart_id_db)
            ->where('coupon_code','=',$coupon_code)->first();
    if (!empty($cart_model) || !is_null($cart_model)) {
     $cart_model = $cart_model->update(
      [
        'coupon_code'=> null,
        'coupon_value'=> 0.00
      ]
    );
     $this->store_cart_summary_db();
     return true;
    }else{
      return false;
    }
       
  }
  public function remove_coupon_from_cart_session($coupon_code){
    if (session()->has('cart') ) {
        $cart = session()->get('cart');
         // dd($cart['coupon_code']);
         if (isset($cart['coupon_code'])) {
             if ($cart['coupon_code']==$coupon_code) {
                session()->forget('cart["coupon_code"]');
                unset($cart['coupon_code']);
                unset($cart['coupon_value']);
                session()->put("cart", $cart);
                if (session()->save()){
                  return true;
                }
             }
         }
            
          }
  }
  public function sum_of_cart_item_total_db(){
    $cart_item = new CartItem();
    $total = $cart_item->where('cart_id','=',$this->cart_id_db)->get()->sum('item_total');
    return $total;
  } 
  public function cart_total_value_db(){
    $cart_model = new CartModel();
    $coupon_value = $cart_model->where('id','=',$this->cart_id_db)->first()->coupon_value;
    $sum_of_cart_item_total_db = $this->sum_of_cart_item_total_db();
    $total = ($sum_of_cart_item_total_db -$coupon_value);
    return $total;
  }
  public function number_of_items_in_a_cart_total_db(){
    $cart_item = new CartItem();
    $number_of_items = $cart_item->where('cart_id','=',$this->cart_id_db)->get()->count();
    return $number_of_items;
  }
  public function store_cart_summary_db(){
    $cart_model = new CartModel();
    $cart_model = $cart_model->where('id','=',$this->cart_id_db)->first();
    $cart_model = $cart_model->update(
      [
        'number_of_items_in_cart'=> $this->number_of_items_in_a_cart_total_db(),
        'sub_total'=> $this->sum_of_cart_item_total_db(),
        'total'=>  $this->cart_total_value_db()
      ]
    );

  }
  public function add_item_in_cart_db(){
       $cart_item = new CartItem();
       $cart_item->cart_id =  $this->cart_id_db;
       $cart_item->product_id = $this->product->id;
       $cart_item->quantity = 1;
       $cart_item->atttributes = '';
       $cart_item->price = $this->product->new_price;
       $cart_item->discount = 0.00;
       $cart_item->item_total = $this->product->new_price;
       $cart_item->save();
       $this->store_cart_summary_db();
  }
  public function increment_item_in_cart_db(){
    $cart_item = new CartItem();
    $cart_item = $cart_item->where('cart_id','=',$this->cart_id_db)->where('product_id','=',$this->product->id)->first();
    $current_quantity = $cart_item->quantity;
    $updated_quantity = $current_quantity+1;
    $price = $cart_item->price;
    $cart_item->update(
      [
        'quantity'=> $updated_quantity,
        'item_total'=> $updated_quantity * $price
      ]
    );
    $this->store_cart_summary_db();
  }
  public function db_cart_details(){
    $cart_model = new CartModel();
    $cart = [];
    if (!is_null($this->cart_id_db)) {
    $cart = $cart_model->where('id', '=', $this->cart_id_db)->with(['items', 'items.item'])->first()->toArray();
    }
    return $cart;
  }
  public function is_cart_exist_in_db(){
      $cart_model = new CartModel();;
      $cart = $cart_model->where('user_id', '=', $this->user->id)->where('is_active','=',1)->first();
      if (!$cart) {
        return false ;
      }
      return true;
    }
    public function remove_item_from_cart_db($product_id){
     $cart_item = new CartItem();
     $cart_item = $cart_item->where('product_id',$product_id)->where('cart_id','=',$this->cart_id_db)->delete();
     if (!$cart_item) {
       return false;
     }
     $this->store_cart_summary_db();
     return true;
    }
  public function add_to_cart_session()
    {
      // session()->flush();
        $product_id = $this->product->id;
        $cart = session()->get("cart");
        // if cart is empty then this the first product
        if(!$cart) {
            $cart['items'] = [
                    $product_id => [
                        "product_id" => $this->product->id,
                        "quantity" => 1,
                        "price" => $this->product->new_price,
                        "item_total" => (double)$this->product->new_price,
                        "item" =>  $this->product->toArray(),
                        "atttributes" => ""
                        // "ip_address" => $request->ip()
                    ]
            ];
            session()->put("cart", $cart);
            session()->save();
            $this->store_cart_summary_session();
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart['items'][$product_id])) {
            $cart['items'][$product_id]['quantity']++;
            $cart['items'][$product_id]['item_total'] = $cart['items'][$product_id]['quantity'] * (double)$cart['items'][$product_id]['price'];
              session()->put("cart", $cart);
              session()->save();
            $this->store_cart_summary_session();
        }
        // if item not exist in cart then add to cart with quantity = 1
        else{
          $cart['items'][$product_id] = [
            "product_id" => $this->product->id,
            "quantity" => 1,
            "price" => $this->product->new_price,
            "item_total" => (double)$this->product->new_price * 1,
            "item" =>  $this->product->toArray(),
            "atttributes" => ""
        ];
        session()->put("cart", $cart);
        session()->save();
        $this->store_cart_summary_session();
        return true;
        }
    }
   
    // end of add to cart
    public function session_cart_items(){
      $cart = [];
       if (session()->has('cart') && !is_null(session()->get('cart')) && !empty(session()->get('cart'))) {
        $cart = session()->get('cart');
      }
      return $cart;
    }
    public function store_cart_summary_session(){
      $number_of_items_in_cart=0;
      $sub_total = 0;
      $sub_total_temp = 0;
      $coupon_value = 0;
      $total = 0;
      if (session()->has('cart') ) {
        $cart = session()->get('cart');
        if (!is_null($cart) && !empty($cart)) {
        $items = $cart['items'];
        foreach ($items as  $key => $item){
          $sub_total_temp += (double)$item["item_total"];
          $sub_total = round($sub_total_temp , 2);
          $sub_total = number_format($sub_total, 2, '.', '');
          }
          $number_of_items_in_cart = count($items);
         }
         if (isset($cart['coupon_code']) && isset($cart['coupon_value'])) {
           $coupon_value = $cart['coupon_value'];
           $total = $sub_total -  $coupon_value;
         }else{
          $total = $sub_total;
         }
         $cart['number_of_items_in_cart'] = $number_of_items_in_cart;
         $cart['sub_total'] = $sub_total;
         $cart['total'] = number_format($total, 2, '.', '');
         session()->put("cart", $cart);
         session()->save();

     }

    }
    // public function store_cart_summary_session(){

    // }
	public function session_cart_details(){
    $cart = [] ;
    if (session()->has('cart')){
      $this->store_cart_summary_session();
      $cart = session()->get('cart');
    }
    return $cart ;
      // $cart_details =  array(); 
      // if (session()->has('cart') && !is_null(session()->get('cart')) && !empty(session()->get('cart'))) {
      // $cart = session()->get('cart');
      // $number_of_items_in_cart=0;
      // $sub_total = 0;
      // $sub_total_temp = 0;
      // $modified_items =[];
      // if (session()->has("cart")) {
      //   $cart = session()->get("cart");
      //   $items = $cart['items'];
      //   // dd($items);
      //   foreach ($items as  $key => $item){
      //     $sub_total_temp += (double)$item["item_total"];
      //     $sub_total = round($sub_total_temp , 2);
      //     $sub_total = number_format($sub_total, 2, '.', '');
      //     $modified_items[] = [
      //                   "product_id" => $item['product_id'],
      //                   "quantity" =>$item['quantity'],
      //                   "price" => $item['price'],
      //                   "item_total" => $item['item_total'],
      //                   "item" => $item['item'],
      //                   "atttributes" => ""
      //               ];
      //     }
      //   $number_of_items_in_cart = count($items);
      // }
      // $cart_details["number_of_items_in_cart"] = $number_of_items_in_cart;
      // $cart_details["total"] = $sub_total;
      // $cart_details["session_id"] = $this->session->getId();
      // $cart_details["items"] = $modified_items;
      // }
      //  return $cart_details;
    }
  public function remove_item_from_cart_session($product_id){
        $cart = session()->get("cart");
            if(isset($cart['items'][$product_id])) {
                unset($cart['items'][$product_id]);
                session()->put("cart", $cart);
                if (session()->save()) {
                  $this->store_cart_summary_session();
                  return true;
                }
            }
    } 
  public static function session_to_database(){
      $cart_model = new CartModel();
      $cart_item = new CartItem();
      $session_cart_items =[];
       if (session()->has('cart') && !is_null(session()->get('cart')) && !empty(session()->get('cart'))) {
       $session_cart_items = session()->get('cart');
     }
        $is_exist_cart = $cart_model->where('user_id', '=', Auth::user()->id)->first();
        if (!empty($is_exist_cart)) {
         $cart_id = $cart_model->where('user_id', '=', Auth::user()->id)->first()->id;
        }else{
          $cart_model ->user_id = Auth::user()->id;
          $cart_model ->session_id = session()->getId();
          $cart_model->save();
          $cart_id = $cart_model->id;
        }
        if (!empty($session_cart_items)){
        foreach ($session_cart_items as  $key => $item){
          $is_exist_cart_item = $cart_item->where('product_id', '=', $item['product_id'])->where('cart_id', '=',$cart_id)->first();
            $cart_item = new CartItem();
            // $cart_model = new CartModel();
          if (is_null($is_exist_cart_item)){
             $cart_item->cart_id = $cart_id;
             $cart_item->product_id = $item['product_id'];
             $cart_item->quantity = $item['quantity'];
             $cart_item->atttributes = $item['attributes'];
             $cart_item->price = $item['price'];
             $cart_item->discount = 0.00;
             $cart_item->item_total = $item['quantity']*$item['price'];
             $cart_item->save();
            
          }

      } 
    }
             if (!is_null($cart_id)) {
             $number_of_items_in_a_cart_total_db = $cart_item->where('cart_id','=',$cart_id)->get()->count();
             $total = $cart_item->where('cart_id','=',$cart_id)->get()->sum('item_total');
             $cart_model = $cart_model->where('id','=',$cart_id)->first();
             $cart_model->update(
              [
                'number_of_items_in_cart'=> $number_of_items_in_a_cart_total_db,
                'total'=> $total
              ]
            );
             }
    }
}

