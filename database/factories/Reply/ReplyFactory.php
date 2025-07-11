<?php

namespace Database\Factories\Reply;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thread_id' => rand(1,200),
            'user_id' => rand(1,10),
            'content' => fake()->text(),
        ];
    }
}
