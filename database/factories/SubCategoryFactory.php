<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Category;
use App\SubCategory;
use App\Model;
use Faker\Generator as Faker;

 

$factory->define(SubCategory::class, function (Faker $faker) {
	$filepath =public_path('assets/images/sub_category');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }
    return [
        'name' =>  $faker->word,
        // 'category_id' => function () {
        //     return factory(App\Category::class)->create()->id;
        // },
        'category_id' => App\Category::all()->random()->id,
        'description'=>$faker->text,
        // 'is_available'=>$faker->boolean($chanceOfGettingTrue = 98),
        'thumbnail' => $faker->image($filepath,270, 340,null,false),
        
    ];
});