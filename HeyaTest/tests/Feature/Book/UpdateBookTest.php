<?php

namespace Tests\Feature\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UpdateBookTest extends TestCase
{
    /** @test */
    public function update_booking_successfully()
    {
        $data = [
            "customer_id" => 1,
            "book_status" => "completed",
            "book_assignment_services" => [
                [
                    "book_assignment_service_id" => 1,
                    "time_start" => "2024-03-21 10:00:00",
                    "duration" => "00:44:00"
                ],
                [
                    "book_assignment_service_id" => 1,
                    "duration" => "00:24:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/1', $data);

        $this->assertArrayHasKey('message', $response);

        // dd($response->json());
    }

    /** @test */
    public function update_booking_assignment_id_error()
    {
        $data = [
            "customer_id" => 1,
            "book_status" => "completed",
            "book_assignment_services" => [
                [
                    "book_assignment_service_id" => 1,
                    "time_start" => "2024-03-21 10:00:00",
                    "duration" => "00:44:00"
                ],
                [
                    "book_assignment_service_id" => 1,
                    "duration" => "00:24:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/0', $data);

        $this->assertArrayHasKey('book_assignment_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_booking_status_error()
    {
        $data = [
            "customer_id" => 1,
            "book_status" => "",
            "book_assignment_services" => [
                [
                    "book_assignment_service_id" => 1,
                    "time_start" => "2024-03-21 10:00:00",
                    "duration" => "00:44:00"
                ],
                [
                    "book_assignment_service_id" => 1,
                    "duration" => "00:24:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/1', $data);

        $this->assertArrayHasKey('message', $response['error']);

        //  dd($response->json());
    }

    /** @test */
    public function update_booking_assignment_service_id_error()
    {
        $data = [
            "customer_id" => 1,
            "book_status" => "completed",
            "book_assignment_services" => [
                [
                    "book_assignment_service_id" => 0,
                    "time_start" => "2024-03-21 10:00:00",
                    "duration" => "00:44:00"
                ],
                [
                    "book_assignment_service_id" => 1,
                    "duration" => "00:24:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/1', $data);

        $this->assertArrayHasKey('book_assignment_services.0.book_assignment_service_id', $response['errors']);

        //  dd($response->json());
    }

    /** @test */
    public function update_booking_time_start_error()
    {
        $data = [
            "customer_id" => 1,
            "book_status" => "completed",
            "book_assignment_services" => [
                [
                    "book_assignment_service_id" => 1,
                    "time_start" => "",
                    "duration" => "00:44:00"
                ],
                [
                    "book_assignment_service_id" => 1,
                    "duration" => "00:24:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/1', $data);

        $this->assertArrayHasKey('book_assignment_services.0.time_start', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_booking_duration_error()
    {
        $data = [
            "customer_id" => 1,
            "book_status" => "completed",
            "book_assignment_services" => [
                [
                    "book_assignment_service_id" => 1,
                    "time_start" => "2024-03-21 10:00:00",
                    "duration" => ""
                ],
                [
                    "book_assignment_service_id" => 1,
                    "duration" => "00:24:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->put('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/1', $data);

        $this->assertArrayHasKey('book_assignment_services.0.duration', $response['errors']);

        //dd($response->json());
    }
}
