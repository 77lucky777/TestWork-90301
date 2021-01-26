<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publishing_house' => $this->faker->company(),
            'year' => $this->faker->year(),
            'user_id' => $this->faker->randomDigitNotNull()
        ];
    }
}
