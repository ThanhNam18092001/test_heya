<?php

namespace Tests\Feature\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DeleteBooking extends TestCase
{
    /** @test */
    public function delete_book_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/46');

        $this->assertArrayHasKey('message', $response);
        dd($response->json());
    }
}
