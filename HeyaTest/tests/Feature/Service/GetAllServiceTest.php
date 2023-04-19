<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetAllServiceTest extends TestCase
{
    /** @test */
    public function get_all_service_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service');

        // $this->assertArrayHasKey('data', $response);
        dd($response['data']);
    }

}
