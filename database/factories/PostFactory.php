<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first(), //$this->faker->numberBetween(1,8),
            'title' => $this->faker->paragraph($nbSentences = 1, $variableNbSentences = true),
            'meta_title' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'text' => $this->faker->paragraph($nbSentences = 20, $variableNbSentences = true),
        ];
    }
}
