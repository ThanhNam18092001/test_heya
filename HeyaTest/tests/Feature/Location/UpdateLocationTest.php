<?php

namespace Tests\Feature\Location;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UpdateLocationTest extends TestCase
{
    /** @test */
    public function update_location_successfully()
    {
        $data = [
            "user_id"=> null,
            "name"=> "dgdg",
            "address"=> "223 Nguyễn Xí",
            "latitude"=> null,
            "longitude"=> null,
            "contact_code"=> 61,
            "contact_number"=> "0355501616",
            "status"=> 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/location/update/10', $data);

         $this->assertArrayHasKey('message', $response);
        // dd($response['message']);
    }

    /** @test */
    public function update_location_name_empty()
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
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/location/update/9', $data);

        $this->assertArrayHasKey('name', $response['errors']);
    }

    /** @test */
    public function update_location_address_empty()
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
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/location/update/9', $data);

        $this->assertArrayHasKey('address', $response['errors']);
    }

    /** @test */
    public function update_location_contact_number_empty()
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
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/location/update/9', $data);

        $this->assertArrayHasKey('contact_number', $response['errors']);
    }
}
