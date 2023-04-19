<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    /** @test */
    public function create_customer_successfully()
    {

        $data = [
            'merchant_id' => 1,
            'name' => 'Dao Duy Phuong',
            'phone_number' => '03975520003',
            'email' => 'daopwww@gmail.com',
            'date_of_birth' => '2018-02-27',
            'total_visited' => 2,
            'total_cancelled' => 0,
            'total_no_show' => 0,
            'loyalty_point' => 0,
            'amount_spent' => 0,
            'notify_market' => 0,
            'notification_customer' => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/store', $data);

        //  $this->assertArrayHasKey('message', $response);
         dd($response->json());
    }

    /** @test */
    public function create_customer_phone_number_error()
    {

        $data = [
            'merchant_id' => 1,
            'name' => 'Dao Duy Phuong',
            'phone_number' => '0397552999',
            'email' => 'daopwww@gmail.com',
            'date_of_birth' => '2018-02-27',
            'total_visited' => 2,
            'total_cancelled' => 0,
            'total_no_show' => 0,
            'loyalty_point' => 0,
            'amount_spent' => 0,
            'notify_market' => 0,
            'notification_customer' => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/store', $data);

        $this->assertArrayHasKey('phone_number', $response['errors']);
        //  dd($response->json());
    }

    /** @test */
    public function create_customer_merchant_id_empty()
    {

        $data = [
            'merchant_id' => 0,
            'name' => 'Dao Duy Phuong',
            'phone_number' => '0397552999',
            'email' => 'daopwww@gmail.com',
            'date_of_birth' => '2018-02-27',
            'total_visited' => 2,
            'total_cancelled' => 0,
            'total_no_show' => 0,
            'loyalty_point' => 0,
            'amount_spent' => 0,
            'notify_market' => 0,
            'notification_customer' => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/store', $data);

        $this->assertArrayHasKey('merchant_id', $response['errors']);
        //  dd($response->json());
    }

    /** @test */
    public function create_customer_name_empty()
    {

        $data = [
            'merchant_id' => 1,
            'name' => '',
            'phone_number' => '0397552999',
            'email' => 'daopwww@gmail.com',
            'date_of_birth' => '2018-02-27',
            'total_visited' => 2,
            'total_cancelled' => 0,
            'total_no_show' => 0,
            'loyalty_point' => 0,
            'amount_spent' => 0,
            'notify_market' => 0,
            'notification_customer' => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/store', $data);

        $this->assertArrayHasKey('name', $response['errors']);
        // dd($response->json());
    }

    /** @test */
    public function create_customer_phone_number_empty()
    {

        $data = [
            'merchant_id' => 1,
            'name' => 'hy',
            'phone_number' => '',
            'email' => 'daopwww@gmail.com',
            'date_of_birth' => '2018-02-27',
            'total_visited' => 2,
            'total_cancelled' => 0,
            'total_no_show' => 0,
            'loyalty_point' => 0,
            'amount_spent' => 0,
            'notify_market' => 0,
            'notification_customer' => 1
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/store', $data);

        $this->assertArrayHasKey('phone_number', $response['errors']);
        //  dd($response->json());
    }
}
