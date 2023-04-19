<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class NoShowBookingTest extends TestCase
{
    /** @test */
    public function no_show_booking_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/1/no-show');

        $this->assertArrayHasKey('message', $response);
        // dd($response->json());
    }

    /** @test */
    public function no_show_booking_book_assignment_id_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/0/no-show');

        $this->assertArrayHasKey('book_assignment_id', $response['errors']);
        //dd($response->json());
    }
}
