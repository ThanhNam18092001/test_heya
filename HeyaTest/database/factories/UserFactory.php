<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'password' => $this->faker->password(),
            'permissions' => $this->faker->title(),
            'status' => $this->faker->boolean(),
            'deleted_at' => $this->faker->date('Y-m-d', 'now'),
            'last_login' => $this->faker->date('Y-m-d', 'now'),
            'avatar_file_id' => function () {
                return File::factory()->create()->id;
            },
            'social_token' => $this->faker->phoneNumber(), //fix
            'social_id' => $this->faker->phoneNumber(), //fix
            'type_social' => $this->faker->title(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'notification_setting' => $this->faker->title(),
            'date_of_birth' => $this->faker->date('Y-m-d', 'now'),
            'is_ban' => $this->faker->randomElement([0, 9]), // fix
            'license_number' => $this->faker->buildingNumber(), // fix
            'remember_token' => $this->faker->buildingNumber(), // fix
            'email_at' => $this->faker->date('Y-m-d', 'now'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
