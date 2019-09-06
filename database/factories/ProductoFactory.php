<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Productos;
use Faker\Generator as Faker;

$factory->define(Productos::class, function (Faker $faker) {
    return [
      'nombre'=>Str::random(10),
      'descripcion'=>Str::random(10),
      'imagen'=>Str::random(10),
    ];
});
