<?php
namespace App\Shop;
// use Session;
use App\User;
use App\Product;
use Auth;
use Session;
use App\Cart as CartModel;
use App\CartItem;
class Cart
{
	private $user;
	private $product;
  private $session;
	function __construct()
	{
		 $this->session = session();
      if (Auth::check()) {
        $this->user =Auth::user(); 
    }
	}
	
	 public function add($input)
    {
      $product_id = $input['id'];

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
   public function details(){
    if (Auth::check()) {
          return $this->db_cart_details();
         }else{
           return $this->session_cart_details();
        }
      
    }
     public function remove($product_id){
      // dd($product_id);
    if (Auth::check()) {
           $this->remove_item_from_cart_db($product_id);
         }else{
            $this->remove_item_from_cart_session($product_id);
        }
      
    }
  public function add_to_cart_db(){
    $cart_model = new CartModel();
    $cart = $cart_model->where('user_id', '=', $this->user->id)->first();
    if (is_null($cart)) {
      $cart_model->user_id = $this->user->id;
      $cart_model->session_id = $this->session->getId();
      $cart_model->save();
      $cart_id = $cart_model->id;
    }else{
      $cart_id = $cart->id;
    }
    $cart_item = new CartItem();
    $exist_item = $cart_item->where('cart_id', '=',$cart_id)->where('product_id', '=', $this->product->id)->first();
    if (is_null($exist_item)) {
     $this->add_item_in_cart_db($cart_id);
    }
    elseif (!is_null($exist_item)) {
      $this->increment_item_in_cart_db($cart->id);
    }
    
  }
  public function sum_of_item_total_db($cart_id){
    $cart_item = new CartItem();
    $total = $cart_item->where('cart_id','=',$cart_id)->get()->sum('item_total');
    return $total;
  }
  public function add_item_in_cart_db($cart_id){
       $cart_item = new CartItem();
       $cart_item->cart_id = $cart_id;
       $cart_item->product_id = $this->product->id;
       $cart_item->quantity = 1;
       $cart_item->atttributes = 'attributes';
       $cart_item->price = $this->product->new_price;
       $cart_item->discount = 0.00;
       $cart_item->item_total = $this->product->new_price;
       $cart_item->save();
  }

  public function increment_item_in_cart_db($cart_id){
    $cart_item = new CartItem();
    $cart_item = $cart_item->where('cart_id','=',$cart_id)->where('product_id','=',$this->product->id)->first();
    $current_quantity = $cart_item->quantity;
    $updated_quantity = $current_quantity+1;
    $price = $cart_item->price;
    $cart_item->update(
      [
        'quantity'=> $updated_quantity,
        'item_total'=> $updated_quantity * $price
      ]
    );
  }
  public function db_cart_details(){
    $cart_model = new CartModel();
    $cart = [];
    $cart_id= $cart_model->where('user_id', '=', $this->user->id)->first()->id;
    if (!is_null($cart_id)) {
    $cart = $cart_model->where('id', '=', $cart_id)->with(['items', 'items.item'])->first()->toArray();
    }
    return $cart;
  }
  public function add_to_cart_session()
    {
      // session()->flush();
        $product_id = $this->product->id;
        $cart = session()->get("cart");
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $product_id => [
                        "product_id" => $this->product->id,
                        "name" => $this->product->name,
                        "quantity" => 1,
                        "price" => $this->product->new_price,
                        "photo" => $this->product->thumbnail,
                        "item_total" => (double)$this->product->new_price,
                        "item" =>  $this->product->toArray()
                        // "ip_address" => $request->ip()
                    ]
            ];
            session()->put("cart", $cart);
            session()->save();
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
            $cart[$product_id]['item_total'] = $cart[$product_id]['quantity'] * (double)$cart[$product_id]['price'];
            session()->put("cart", $cart);
            session()->save();
        }
        // if item not exist in cart then add to cart with quantity = 1
        else{
          $cart[$product_id] = [
            "product_id" => $this->product->id,
            "name" => $this->product->name,
            "quantity" => 1,
            "price" => $this->product->new_price,
            "photo" => $this->product->thumbnail,
            "item_total" => (double)$this->product->new_price * 1,
            "item" =>  $this->product->toArray()
        ];
        session()->put("cart", $cart);
        session()->save();
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
	public function session_cart_details(){
      $cart_details =  array(); 
      if (session()->has('cart') && !is_null(session()->get('cart')) && !empty(session()->get('cart'))) {
      $cart = session()->get('cart');
       // session()->flush();
      $number_of_items_in_cart=0;
      $sub_total = 0;
      $sub_total_temp = 0;
      $modified_items =[];
      if (session()->has("cart")) {
        $items = session()->get("cart");
        // dd($cart);
        $product = new Product();
        foreach ($items as  $key => $item){
          $sub_total_temp +=  (double)$item["item_total"];
          $sub_total = round( $sub_total_temp , 2);
                $ok=$item["item"];
           $modified_items[] =[
                        "product_id" => $item['product_id'],
                        "name" => $item['name'],
                        "quantity" =>$item['quantity'],
                        "price" => $item['price'],
                        "item_total" => $item['item_total'],
                        "item" => $item['item']
                    ];
          }
        $number_of_items_in_cart = count($items);
      }
      $cart_details["number_of_items_in_cart"] = $number_of_items_in_cart;
      $cart_details["total"] = $sub_total;
      $cart_details["session_id"] = $this->session->getId();

      $cart_details["items"] = $modified_items;
      }
       return $cart_details;
    }
    public function remove_item_from_cart_session($product_id){
        $cart = session()->get("cart");
            if(isset($cart[$product_id])) {
                unset($cart[$product_id]);
                session()->put("cart", $cart);
                if (session()->save()) {
                  return true;
                }
            }
    } 
    public function remove_item_from_cart_db($product_id){
     $cart_item = new CartItem();
     $cart_item = $cart_item->where('product_id',$item_id)->delete();
     if (!$cart_item) {
       return false;
     }
     return true;
    }
    public function update(){
      $product_quantity = 13;
      $cart = session()->get('cart');
      $product_id =2;
      

      $cart[$product_id]["quantity"] = $product_quantity;
      $cart[$product_id]["item_total"] = $cart[$product_id]["price"] * $product_quantity;
      session()->put('cart', $cart);
      session()->save();
     
    }
    public function is_cart_exist_in_db(){
      $cart_model = new CartModel();;
      $cart = $cart_model->where('user_id', '=', $this->user->id)->first();
      if (!$cart) {
        return false ;
      }
      return true;
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
        $itemArray=[];
        if (!empty($session_cart_items)){
        foreach ($session_cart_items as  $key => $item){
          $is_exist_cart_item = $cart_item->where('product_id', '=', $item['product_id'])->where('cart_id', '=',$cart_id)->first();
            $cart_item = new CartItem();
            // $cart_model = new CartModel();
          if (is_null($is_exist_cart_item)){
             $cart_item->cart_id = $cart_id;
             $cart_item->product_id = $item['product_id'];
             $cart_item->quantity = $item['quantity'];
             $cart_item->atttributes = 'attributes';
             $cart_item->price = $item['price'];
             $cart_item->discount = 0.00;
             $cart_item->item_total = $item['item_total']*$item['quantity'];
             $cart_item->save();
          }

      }
      
    }
    }
}

