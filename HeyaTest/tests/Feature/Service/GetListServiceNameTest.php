<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetListServiceNameTest extends TestCase
{
    /** @test */
    public function get_list_service_name_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1/list-service');

        $this->assertArrayHasKey('data', $response);
        // dd($response['data']);
    }

    /** @test */
    public function get_list_service_name_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service/0/list-service');

        $this->assertArrayHasKey('message', $response['error']);
        // dd($response['error']);
    }
}
