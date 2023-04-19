<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UpdateServiceTest extends TestCase
{
    /** @test */
    public function update_service_successfully()
    {
        $data = [
            "service_variants" => [
                [
                    "id" => 2,
                    "extra_name" => "Làm móng",
                    "price" => 150,
                    "duration" => "00:30:00",
                    "description" => "Làm móng tay và chân"
                ]
            ],

            "merchant_id" => 1,
            "service_category_id" => 2,
            "regular_price" => 150,
            "sale_price" => 150,
            "name" => "Làm móng",
            "description" => "Làm móng tay và chân",
            "sort_order" => 1,
            "enable_online_booking" => 1,
            "duration_time" => "00:30:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => "[1,2]"

        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/service/32', $data);

        $this->assertArrayHasKey('message', $response);
        // dd($response['message']);
    }

    /** @test */
    public function update_service_category_id_error()
    {
        $data = [
            "service_variants" => [
                [
                    "id" => 2,
                    "extra_name" => "Cạo đầu 2",
                    "price" => "5",
                    "duration" => "00:15:00",
                    "description" => ""
                ]
            ],

            "merchant_id" => 1,
            "service_category_id" => 0,
            "regular_price" => 123456,
            "sale_price" => "111111",
            "name" => "Cưa móng dò",
            "description" => "hahaeha",
            "sort_order" => 1,
            "enable_online_booking" => 1,
            "duration_time" => "3:00:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => "[1,2]"

        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1', $data);

        $this->assertArrayHasKey('service_category_id', $response['errors']);
        // dd($response['errors']);
    }

    /** @test */
    public function update_service_regular_price_empty()
    {
        $data = [
            "service_variants" => [
                [
                    "id" => 2,
                    "extra_name" => "Cạo đầu 2",
                    "price" => "5",
                    "duration" => "00:15:00",
                    "description" => ""
                ]
            ],

            "merchant_id" => 1,
            "service_category_id" => 2,
            "regular_price" => null,
            "sale_price" => "111111",
            "name" => "Cưa móng dò",
            "description" => "hahaeha",
            "sort_order" => 1,
            "enable_online_booking" => 1,
            "duration_time" => "3:00:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => "[1,2]"

        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1', $data);

        $this->assertArrayHasKey('regular_price', $response['errors']);
        // dd($response['errors']);
    }

    /** @test */
    public function update_service_sale_price_empty()
    {
        $data = [
            "service_variants" => [
                [
                    "id" => 2,
                    "extra_name" => "Cạo đầu 2",
                    "price" => "5",
                    "duration" => "00:15:00",
                    "description" => ""
                ]
            ],

            "merchant_id" => 1,
            "service_category_id" => 2,
            "regular_price" => 123456,
            "sale_price" => null,
            "name" => "Cưa móng dò",
            "description" => "hahaeha",
            "sort_order" => 1,
            "enable_online_booking" => 1,
            "duration_time" => "3:00:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => "[1,2]"

        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1', $data);

        $this->assertArrayHasKey('sale_price', $response['errors']);
        // dd($response['errors']);
    }

    /** @test */
    public function update_service_name_empty()
    {
        $data = [
            "service_variants" => [
                [
                    "id" => 2,
                    "extra_name" => "Cạo đầu 2",
                    "price" => "5",
                    "duration" => "00:15:00",
                    "description" => ""
                ]
            ],

            "merchant_id" => 1,
            "service_category_id" => 2,
            "regular_price" => 123456,
            "sale_price" => "111111",
            "name" => null,
            "description" => "hahaeha",
            "sort_order" => 1,
            "enable_online_booking" => 1,
            "duration_time" => "3:00:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => "[1,2]"

        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1', $data);

        $this->assertArrayHasKey('name', $response['errors']);
        // dd($response['errors']);
    }
}
