<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Category;
use App\Model;
use Faker\Generator as Faker;

 

$factory->define(Category::class, function (Faker $faker) {
	$filepath =public_path('assets/images/category');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }
    return [
        'name' =>  $faker->word,
        'description'=>$faker->text,
        // 'is_available'=>$faker->boolean($chanceOfGettingTrue = 98),
        'thumbnail' => $faker->image($filepath,270, 340,null,false),
        
    ];
});