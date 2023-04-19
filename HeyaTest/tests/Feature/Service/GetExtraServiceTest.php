<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetExtraServiceTest extends TestCase
{
    /** @test */
    public function get_extra_service_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1/extra-service');

        $this->assertArrayHasKey('data', $response);
        // dd($response['data']);
    }

    /** @test */
    public function get_extra_service_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service/0/extra-service');

        $this->assertArrayHasKey('message', $response['error']);
    }
}
