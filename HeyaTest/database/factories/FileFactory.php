<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>  function () {
                return User::factory()->create()->id;
            },
            'filename' => $this->faker->title(),
            'disk' => $this->faker->title(),
            'path' => $this->faker->title(),
            'extension' => $this->faker->title(),
            'mime' => $this->faker->title(),
            'size' => $this->faker->title(),
            'order_id' => '1',
        ];
    }
}
