<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
          },
        'name' => function() {
            return factory(App\User::class)->create()->name;
          },
        'gender'=> $faker->randomElement(['Female', 'Male']),
        'level'=> $faker->randomElement([1.0, 1.5, 2.0, 2.5, 3.0, 3.5, 4.0, 4.5, 5.0]),
        'age'=> $faker->numberBetween(10,100),
        'location'=> $faker->city,
    ];
});
