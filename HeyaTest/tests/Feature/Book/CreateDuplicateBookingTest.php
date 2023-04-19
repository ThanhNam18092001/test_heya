<?php

namespace Tests\Feature\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateDuplicateBookingTest extends TestCase
{
    /** @test */ //Note
    public function create_duplicate_booking_successfully()
    {
        // $data = [
        //     "book_assignment_id" => 4
        // ];
        // $response = Http::withHeaders([
        //     'Accept-Heya' => 'application/myheya.heyapos'
        // ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/duplicate', $data);

        // dd($response->json());

        // $this->assertArrayHasKey('message', $response['data']);
    }
}
