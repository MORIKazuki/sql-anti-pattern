<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NaiveTreeComment;
use Faker\Generator as Faker;

$factory->define(NaiveTreeComment::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,3),
        'article_id' => 1,
        'body' => $faker->paragraph,
        'reply_to_comment_id' => null,
        'parent_comment_id' => null,
    ];
});
