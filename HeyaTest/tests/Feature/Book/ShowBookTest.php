<?php

namespace Tests\Feature\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ShowBookTest extends TestCase
{
    /** @test */
    public function show_book_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/46');

        $this->assertArrayHasKey('id', $response['data']);
    }

    /** @test */
    public function show_book_assignment_id_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/0');

        $this->assertArrayHasKey('book_assignment_id', $response['errors']);
        // dd($response->json());
    }

    /** @test */
    public function show_header_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyaposs'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/0');

        $this->assertArrayHasKey('message', $response['error']);
        // dd($response->json());
    }

    /** @test */
    public function show_merchant_code_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxus/book-assignments/1');

        $this->assertArrayHasKey('merchant_code', $response['errors']);
        //  dd($response->json());
    }
}
