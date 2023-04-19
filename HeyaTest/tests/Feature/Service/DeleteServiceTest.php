<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DeleteServiceTest extends TestCase
{
    /** @test */
    public function delete_service_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->delete('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1');

        $this->assertArrayHasKey('message', $response);
        // dd($response['message']);
    }

    /** @test */
    public function delete_service_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->delete('https://api.heyapos.com/api/v1/merchants/LmMxu/service/0');

        $this->assertArrayHasKey('service_id', $response['errors']);
        // dd($response['errors']);
    }
}
