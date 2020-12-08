<?php

namespace Database\Factories;

use App\Models\Comentary;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph($nbSentences = 1, $variableNbSentences = true),
            'user_id' => User::inRandomOrder()->first(),
            'post_id' => Post::inRandomOrder()->first(),
        ];
    }
}
