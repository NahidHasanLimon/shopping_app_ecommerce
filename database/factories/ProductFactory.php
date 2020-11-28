<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Category;
use App\SubCategory;
use App\Product;
use App\Model;
use Faker\Generator as Faker;

 

$factory->define(Product::class, function (Faker $faker) {
	$filepath =public_path('assets/images/product');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }
    return [
        'name' =>  $faker->word,
        // 'sub_category_id' => function () {
        //     return factory(SubCategory::class)->create()->id;
        // },
        'sub_category_id' => App\SubCategory::all()->random()->id,
        'description'=>$faker->text,
        'is_available'=>$faker->boolean($chanceOfGettingTrue = 99),
        'is_featured'=>$faker->boolean($chanceOfGettingTrue = 30),
        'old_price'=>$faker->randomNumber(4),
        'new_price'=>$faker->randomNumber(4),
        'thumbnail' => $faker->image($filepath,270, 340,null,false),
        
    ];
});