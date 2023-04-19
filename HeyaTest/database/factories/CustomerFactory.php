<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'merchant_id'  =>  function () {
                return Merchant::factory()->create()->id;
            },
            'customer_code' => $this->faker->title(),
            'name' => $this->faker->title(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date('Y-m-d', 'now'),
            'total_visited' => '1',
            'total_cancelled' => '1',
            'total_no_show' => '1',
            'total_rejected' => '1',
            'amount_spent' => '1',
            'marketing_notification' => '1',
            'client_notification' => '1',
            'loyalty_point' => '1',
            'notification_customer' => '1',
            'notify_market' => '1',
            'status' => '1',
            'deleted_at' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
