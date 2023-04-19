<?php

namespace Tests\Feature\Location;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DeleteLocationTest extends TestCase
{
    /** @test */
    public function delete_location_successfully()
    {

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->delete('https://api.heyapos.com/api/v1/merchants/LmMxu/location/destroy/10');

        $this->assertArrayHasKey('message', $response);
    }
}
