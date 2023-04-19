<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateServiceTest extends TestCase
{
    /** @test */
    public function create_service_successfully()
    {
        $data = [
            "checkNewCategory" => true,
            "name-category" => "combo sơn móng",
            "color_id" => 1,
            "checkNewExtraService" => true,
            "service_variants" => [
                [
                    "extra_name" => "Cắt móng tay và chân",
                    "price" => 200,
                    "duration" => "00:30:00"
                ],
                [
                    "extra_name" => "Sơn móng tay chân",
                    "price" => 250,
                    "duration" => "00:30:00"
                ],
            ],
            "merchant_id" => 1,
            "service_category_id" => 1,
            "merchant_location_id" => 1,
            "regular_price" => 450,
            "sale_price" => 400,
            "name" => "Combo sơn móng",
            "description" => "Combo cắt móng, sơn móng",
            "sort_order" => 4,
            "enable_online_booking" => 1,
            "duration_time" => "01:00:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => [1, 2]
        ];
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/service/store-service', $data);

        $this->assertArrayHasKey('message', $response['data']);

        dd($response['data']);
    }

    /** @test */
    public function create_service_category_id_error()
    {
        $data = [
            "checkNewCategory" => true,
            "name-category" => "Gội đầu",
            "color_id" => 1,
            "checkNewExtraService" => true,
            "service_variants" => [
                [
                    "extra_name" => "Gội đầu",
                    "price" => 170,
                    "duration" => "00:25:00"
                ],
                [
                    "extra_name" => "SƠn móng chân",
                    "price" => 100,
                    "duration" => "00:10:00"
                ]
            ],
            "merchant_id" => 1,
            "service_category_id" => 0,
            "merchant_location_id" => 1,
            "regular_price" => 250,
            "sale_price" => 250,
            "name" => "Gội đầu",
            "description" => "Gội đầu",
            "sort_order" => 4,
            "enable_online_booking" => 1,
            "duration_time" => "00:25:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => [1, 2]
        ];
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/service/store-service', $data);

        $this->assertArrayHasKey('service_category_id', $response['errors']);

        // dd($response['error']);
    }

    /** @test */
    public function create_service_merchant_location_id_error()
    {
        $data = [
            "checkNewCategory" => true,
            "name-category" => "Gội đầu",
            "color_id" => 1,
            "checkNewExtraService" => true,
            "service_variants" => [
                [
                    "extra_name" => "Gội đầu",
                    "price" => 170,
                    "duration" => "00:25:00"
                ],
                [
                    "extra_name" => "SƠn móng chân",
                    "price" => 100,
                    "duration" => "00:10:00"
                ]
            ],
            "merchant_id" => 1,
            "service_category_id" => 1,
            "merchant_location_id" => 0,
            "regular_price" => 250,
            "sale_price" => 250,
            "name" => "Gội đầu",
            "description" => "Gội đầu",
            "sort_order" => 4,
            "enable_online_booking" => 1,
            "duration_time" => "00:25:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => [1, 2]
        ];
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/service/store-service', $data);

        $this->assertArrayHasKey('merchant_location_id', $response['errors']);

        // dd($response['error']);
    }

    /** @test */
    public function create_service_regular_price_empty()
    {
        $data = [
            "checkNewCategory" => true,
            "name-category" => "Gội đầu",
            "color_id" => 1,
            "checkNewExtraService" => true,
            "service_variants" => [
                [
                    "extra_name" => "Gội đầu",
                    "price" => 170,
                    "duration" => "00:25:00"
                ],
                [
                    "extra_name" => "SƠn móng chân",
                    "price" => 100,
                    "duration" => "00:10:00"
                ]
            ],
            "merchant_id" => 1,
            "service_category_id" => 1,
            "merchant_location_id" => 1,
            "regular_price" => null,
            "sale_price" => 250,
            "name" => "Gội đầu",
            "description" => "Gội đầu",
            "sort_order" => 4,
            "enable_online_booking" => 1,
            "duration_time" => "00:25:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => [1, 2]
        ];
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/service/store-service', $data);

        $this->assertArrayHasKey('regular_price', $response['errors']);

        // dd($response['error']);
    }

    /** @test */
    public function create_service_sale_price_empty()
    {
        $data = [
            "checkNewCategory" => true,
            "name-category" => "Gội đầu",
            "color_id" => 1,
            "checkNewExtraService" => true,
            "service_variants" => [
                [
                    "extra_name" => "Gội đầu",
                    "price" => 170,
                    "duration" => "00:25:00"
                ],
                [
                    "extra_name" => "SƠn móng chân",
                    "price" => 100,
                    "duration" => "00:10:00"
                ]
            ],
            "merchant_id" => 1,
            "service_category_id" => 1,
            "merchant_location_id" => 1,
            "regular_price" => 250,
            "sale_price" => null,
            "name" => "Gội đầu",
            "description" => "Gội đầu",
            "sort_order" => 4,
            "enable_online_booking" => 1,
            "duration_time" => "00:25:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => [1, 2]
        ];
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/service/store-service', $data);

        $this->assertArrayHasKey('sale_price', $response['errors']);

        // dd($response['error']);
    }

    /** @test */
    public function create_service_name_empty()
    {
        $data = [
            "checkNewCategory" => true,
            "name-category" => "Gội đầu",
            "color_id" => 1,
            "checkNewExtraService" => true,
            "service_variants" => [
                [
                    "extra_name" => "Gội đầu",
                    "price" => 170,
                    "duration" => "00:25:00"
                ],
                [
                    "extra_name" => "SƠn móng chân",
                    "price" => 100,
                    "duration" => "00:10:00"
                ]
            ],
            "merchant_id" => 1,
            "service_category_id" => 1,
            "merchant_location_id" => 1,
            "regular_price" => 250,
            "sale_price" => 250,
            "name" => null,
            "description" => "Gội đầu",
            "sort_order" => 4,
            "enable_online_booking" => 1,
            "duration_time" => "00:25:00",
            "enable" => 1,
            "enable_booking" => 1,
            "enable_voucher_sale" => 1,
            "enable_discount" => 1,
            "emoloyee_service_id" => [1, 2]
        ];
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/service/store-service', $data);

        $this->assertArrayHasKey('name', $response['errors']);

        // dd($response['error']);
    }
}
