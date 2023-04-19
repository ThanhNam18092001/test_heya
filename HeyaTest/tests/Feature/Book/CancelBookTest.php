<?php

namespace Tests\Feature\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CancelBookTest extends TestCase
{
    /** @test */
    public function cancel_book_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/46/cancel');

        $this->assertArrayHasKey('message', $response);
        // dd($response->json());
    }

    /** @test */
    public function cancel_book_assignment_id_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/0/cancel');

        $this->assertArrayHasKey('book_assignment_id', $response['errors']);
        // dd($response->json());
    }
}
