<?php

namespace Database\Factories;

use App\Models\Masthead;
use Illuminate\Database\Eloquent\Factories\Factory;

class MastheadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Masthead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'sub_title' => $this->faker->text,
        ];
    }
}
