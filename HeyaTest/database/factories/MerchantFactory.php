<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'package_id' => '1',
            'merchant_code' => 'LmMxu',
            'name' => $this->faker->title(),
            'merchant_domain' => $this->faker->title(),
            'phone_number' => $this->faker->phoneNumber(),
            'hotline' => $this->faker->phoneNumber(),
            'open_time' => $this->faker->time('H:i:s', 'now'),
            'close_time' => $this->faker->time('H:i:s', 'now'),
            'website' => $this->faker->title(),
            'logo' => $this->faker->image(),
            'description' => $this->faker->title(),
            'total_favourites' => '1',
            'date_approved' => $this->faker->date('Y-m-d', 'now'),
            'status' => '1',
            'approval_status' => $this->faker->boolean(),
            'deleted_at' => $this->faker->time('H:i:s', 'now'),
            'merchant_type' => $this->faker->boolean(),
        ];
    }
}
