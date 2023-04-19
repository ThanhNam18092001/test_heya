<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UpdateCustomerTest extends TestCase
{
    /** @test */
    public function update_customer_successfully()
    {
        $data = [
            "merchant_id" => 1,
            "name" => "Nhi Lê Loan",
            "phone_number" => "0397552999",
            "email" => "daopwww@gmail.com",
            "date_of_birth" => "2002-02-27",
            "notify_market" => true,
            "notification_customer" => true
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->put('https://api.heyapos.com/api/v1/merchants/customers/update/2', $data);

        // $this->assertArrayHasKey('content', $response['errors']);
         dd($response->json());
    }

    /** @test */
    public function update_customer_error()
    {
        $data = [
            "merchant_id" => 0,
            "name" => "Nhi Lê Loan",
            "phone_number" => "0397552999",
            "email" => "daopwww@gmail.com",
            "date_of_birth" => "2002-02-27",
            "notify_market" => true,
            "notification_customer" => true
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->put('https://api.heyapos.com/api/v1/merchants/customers/update/2', $data);

        $this->assertArrayHasKey('message', $response['error']);
        //  dd($response->json());
    }

    /** @test */
    public function update_customer_merchant_id_error()
    {
        $data = [
            "merchant_id" => 1,
            "name" => "Nhi Lê Loan",
            "phone_number" => "0397552999",
            "email" => "daopwww@gmail.com",
            "date_of_birth" => "2002-02-27",
            "notify_market" => true,
            "notification_customer" => true
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->put('https://api.heyapos.com/api/v1/merchants/customers/update/2', $data);

        $this->assertArrayHasKey('merchant_id', $response['errors']);
        //  dd($response->json());
    }

    /** @test */
    public function update_customer_name_empty()
    {
        $data = [
            "merchant_id" => 1,
            "name" => "",
            "phone_number" => "0397552999",
            "email" => "daopwww@gmail.com",
            "date_of_birth" => "2002-02-27",
            "notify_market" => true,
            "notification_customer" => true
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->put('https://api.heyapos.com/api/v1/merchants/customers/update/2', $data);

        $this->assertArrayHasKey('name', $response['errors']);
        //  dd($response->json());
    }

    /** @test */
    public function update_customer_phone_number_empty()
    {
        $data = [
            "merchant_id" => 1,
            "name" => "Nhi Lê Loan",
            "phone_number" => "",
            "email" => "daopwww@gmail.com",
            "date_of_birth" => "2002-02-27",
            "notify_market" => true,
            "notification_customer" => true
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->put('https://api.heyapos.com/api/v1/merchants/customers/update/2', $data);

        $this->assertArrayHasKey('phone_number', $response['errors']);
        //  dd($response->json());
    }
}
