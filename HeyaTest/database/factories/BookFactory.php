<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Merchant;
use App\Models\MerchantLocations;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => function () {
                return Customer::factory()->create()->id;
            },
            'merchant_id' => function () {
                return Merchant::factory()->create()->id;
            },
            'merchant_location_id' => function () {
                return MerchantLocations::factory()->create()->id;
            },
            'response_id' => function () {
                return User::factory()->create()->id;
            },
            'assigned_by' => '1',
            'assigned_at' => $this->faker->date('Y-m-d', 'now'),
            'cancelled_by' => '1',
            'cancelled_at' => 1,
            'cancelled_reason' => $this->faker->title(),
            'booked_by' => '1',
            'phone_client' => $this->faker->phoneNumber(),
            'date_book' => $this->faker->date('Y-m-d', 'now'),
            'time_book' => $this->faker->time(),
            'total_price' =>$this->faker->randomDigit(),
            'noted_client'=> $this->faker->title(),
            'noted_merchant' => $this->faker->title(),
            'book_status' => $this->faker->boolean(),
            'paidstatus' => '1',
            'deleted_at'=> $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
