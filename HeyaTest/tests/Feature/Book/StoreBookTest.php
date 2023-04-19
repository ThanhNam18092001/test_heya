<?php

namespace Tests\Feature\Book;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StoreBookTest extends TestCase
{
    /** @test */
    public function store_book_successfully()
    {
        $data = [
            [
                "customer" => [
                    "phone_number" => "0404091221",
                    "name" => "Mai Ngo My",
                    "email" => "maingomy@gmail.com",
                    "gender" => true,
                    "date_of_birth" => $this->faker->date('Y-m-d', 'now'),
                    "is_walkin_in" => false
                ],
                "book_assignment_services" => [
                    [
                        "service_id" => 4,
                        "time_start" => "2023-04-20 09:00:00",
                        "duration_time" => 30,
                        "quantity" => 2,
                        "employee_id" => 7,
                        "sale_price" => 230
                    ],
                    [
                        "service_id" => 5,
                        "time_start" => "2023-04-20 10:30:00",
                        "duration_time" => 90,
                        "employee_id" => 6,
                    ],
                    [
                        "service_id" => 6,
                        "time_start" => "2023-03-20 11:30:00",
                        "duration_time" => 90,
                        "employee_id" => 7,
                    ]
                ],
                "note" => "customer note",
                "total_price" => "100"
            ],
            [
                "customer" => [
                    "phone_number" => "0404092332",
                    "name" => "Tran Thi Hoa",
                    "email" => "trenthihoa@gmail.com",
                    "gender" => true,
                    "date_of_birth" => $this->faker->date('Y-m-d', 'now'),
                    "is_walkin_in" => false
                ],
                "book_assignment_services" => [
                    [
                        "service_id" => 2,
                        "time_start" => "2023-04-20 13:00:00",
                        "duration_time" => 30,
                        "quantity" => 2,
                        "employee_id" => 7,
                        "sale_price" => 230
                    ],
                    [
                        "service_id" => 3,
                        "time_start" => "2023-04-20 14:00:00",
                        "duration_time" => 90,
                        "employee_id" => 7,
                    ]
                ],
                "note" => "customer note",
                "total_price" => "100"
            ],
            [
                "customer" => [
                    "phone_number" => "0404093443",
                    "name" => "Mai Ngoc",
                    "email" => "maongoc@gmail.com",
                    "gender" => true,
                    "date_of_birth" => $this->faker->date('Y-m-d', 'now'),
                    "is_walkin_in" => false
                ],
                "book_assignment_services" => [
                    [
                        "service_id" => 3,
                        "time_start" => "2023-04-20 15:00:00",
                        "duration_time" => 30,
                        "quantity" => 2,
                        "employee_id" => 7,
                        "sale_price" => 230
                    ],
                    [
                        "service_id" => 4,
                        "time_start" => "2023-04-18 16:30:00",
                        "duration_time" => 90,
                        "employee_id" => 7,
                    ]
                ],
                "note" => "customer note",
                "total_price" => "100"
            ],
            [
                "customer" => [
                    "phone_number" => "0404094554",
                    "name" => "Luong Hoa Thao",
                    "email" => "luonhoathao@gmail.com",
                    "gender" => true,
                    "date_of_birth" => $this->faker->date('Y-m-d', 'now'),
                    "is_walkin_in" => false
                ],
                "book_assignment_services" => [
                    [
                        "service_id" => 6,
                        "time_start" => "2023-04-21 10:00:00",
                        "duration_time" => 90,
                        "employee_id" => 7,
                    ]
                ],
                "note" => "customer note",
                "total_price" => "100"
            ],
            [
                "customer" => [
                    "phone_number" => "0404095665",
                    "name" => "Cuc Hoa",
                    "email" => "cuchoa@gmail.com",
                    "gender" => true,
                    "date_of_birth" => $this->faker->date('Y-m-d', 'now'),
                    "is_walkin_in" => false
                ],
                "book_assignment_services" => [
                    [
                        "service_id" => 4,
                        "time_start" => "2023-04-21 11:00:00",
                        "duration_time" => 30,
                        "quantity" => 2,
                        "employee_id" => 7,
                        "sale_price" => 230
                    ],
                    [
                        "service_id" => 6,
                        "time_start" => "2023-04-21 13:00:00",
                        "duration_time" => 90,
                        "employee_id" => 7,
                    ]
                ],
                "note" => "customer note",
                "total_price" => "100"
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            // dd($data[$i]);

            $response = Http::withHeaders([
                'Accept-Heya' => 'application/myheya.heyapos',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTg4OTQ0MywibmJmIjoxNjgxODg5NDQzLCJqdGkiOiJjc1NXOU1qRWdHSko0MU1DIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.O7CG-QHQFzSusZLkE0L2IjjS1xaJi-Nim7skLqYnIMs'
            ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/store', $data[$i]);
        }

        $this->assertArrayHasKey('message', $response['data']);

         dd($response->json());
    }

    public function store_book_name_empty()
    {
        $data = [
            "customer" => [
                "phone_number" => "0404463279",
                "name" => null,
                "email" => "hoa@gmail.com",
                "gender" => true,
                "date_of_birth" => $this->faker->date
            ],
            "book_assignment_services" => [
                [
                    "service_id" => 4,
                    "time_start" => "2023-05-15 15:30:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/store', $data);

        $this->assertArrayHasKey('customer.name', $response['errors']);

        // dd($response->json());
    }

    public function store_book_email_empty()
    {
        $data = [
            "customer" => [
                "phone_number" => "0404463279",
                "name" => "Nguyen Thi Hoa",
                "email" => null,
                "gender" => true,
                "date_of_birth" => $this->faker->date
            ],
            "book_assignment_services" => [
                [
                    "service_id" => 4,
                    "time_start" => "2023-05-15 15:30:00"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/store', $data);

        $this->assertArrayHasKey('customer.email', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_book_phone_number_empty()
    {
        $data = [
            "customer" => [
                "phone_number" => "",
                "name" => "Lâm Văn Xuân",
                "email" => "xuan@gmail.com",
                "gender" => true,
                "date_of_birth" => "2000-03-15"
            ],
            "book_assignment_services" => [
                [
                    "service_id" => 4,
                    "time_start" => "2023-12-05 00:00:30"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/store', $data);

        $this->assertArrayHasKey('customer.phone_number', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_book_service_id_errr()
    {
        $data = [
            "customer" => [
                "phone_number" => "0404905679",
                "name" => "Lâm Văn Xuân",
                "email" => "xuan@gmail.com",
                "gender" => true,
                "date_of_birth" => "2000-03-15"
            ],
            "book_assignment_services" => [
                [
                    "service_id" => '',
                    "time_start" => "2023-12-05 00:00:30"
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/store', $data);

        $this->assertArrayHasKey('book_assignment_services.0.service_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_book_time_start_empty()
    {
        $data = [
            "customer" => [
                "phone_number" => "0404905679",
                "name" => "Lâm Văn Xuân",
                "email" => "xuan@gmail.com",
                "gender" => true,
                "date_of_birth" => "2000-03-15"
            ],
            "book_assignment_services" => [
                [
                    "service_id" => 4,
                    "time_start" => ""
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments/store', $data);

        $this->assertArrayHasKey('book_assignment_services.0.time_start', $response['errors']);

        // dd($response->json());
    }
}
