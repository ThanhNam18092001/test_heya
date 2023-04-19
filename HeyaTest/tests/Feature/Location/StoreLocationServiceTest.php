<?php

namespace Tests\Feature\Location;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StoreLocationServiceTest extends TestCase
{
    /** @test */
    public function create_location_successfully()
    {
        $data = [
            "user_id" => null,
            "name" => "Trần Khoa",
            "address" => "223 Nguyễn Xí",
            "latitude" => null,
            "longitude" => null,
            "contact_code" => 61,
            "contact_number" => "0355501616",
            "status" => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/location', $data);

        $this->assertArrayHasKey('message', $response['data']);
        // dd($response['data']);
    }

    /** @test */
    public function create_location_name_empty()
    {
        $data = [
            "user_id" => null,
            "name" => null,
            "address" => "223 Nguyễn Xí",
            "latitude" => null,
            "longitude" => null,
            "contact_code" => 61,
            "contact_number" => "0355501616",
            "status" => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/location', $data);

        $this->assertArrayHasKey('name', $response['errors']);
    }

    /** @test */
    public function create_location_address_empty()
    {
        $data = [
            "user_id" => null,
            "name" => "Trần Khoa",
            "address" => null,
            "latitude" => null,
            "longitude" => null,
            "contact_code" => 61,
            "contact_number" => "0355501616",
            "status" => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/location', $data);

        $this->assertArrayHasKey('address', $response['errors']);
    }

    /** @test */
    public function create_location_contact_number_empty()
    {
        $data = [
            "user_id" => null,
            "name" => "Trần Khoa",
            "address" => "223 Nguyễn Xí",
            "latitude" => null,
            "longitude" => null,
            "contact_code" => 61,
            "contact_number" => null,
            "status" => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/location', $data);

        $this->assertArrayHasKey('contact_number', $response['errors']);
    }
}
