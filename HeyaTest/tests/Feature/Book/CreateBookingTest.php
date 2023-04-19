<?php

namespace Tests\Feature\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateBookingTest extends TestCase
{
    /** @test */ // Note
    public function test_example()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/create');

        // $this->assertArrayHasKey('message', $response['data']);

        dd($response->json());
    }
}
