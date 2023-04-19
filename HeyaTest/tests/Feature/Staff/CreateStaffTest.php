<?php

namespace Tests\Feature\Staff;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateStaffTest extends TestCase
{
    /** @test */
    public function store_staff_successfully()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => "Nguyen Truc Quynh",
            "phone" => "039456907",
            "email" => "nguyentrucquynh@gmail.com",
            "services_id" => "[1, 2]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NguyenQuynh",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

        $this->assertArrayHasKey('message', $response);

        // dd($response->json());
    }

    /** @test */
    public function store_staff_name_empty()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => null,
            "phone" => "039111111",
            "email" => "tranvana@gmail.com",
            "services_id" => "[2]",
            "access_level" => 2,
            "title_name" => "Bác sĩ HienMai",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

         $this->assertArrayHasKey('full_name', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_staff_phone_empty()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => "Tran Van A",
            "phone" => null,
            "email" => "tranvana@gmail.com",
            "services_id" => "[2]",
            "access_level" => 2,
            "title_name" => "Bác sĩ HienMai",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

        $this->assertArrayHasKey('phone', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_staff_email_empty()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => "Tran Van A",
            "phone" => "039111111",
            "email" => null,
            "services_id" => "[2]",
            "access_level" => 2,
            "title_name" => "Bác sĩ HienMai",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

        $this->assertArrayHasKey('email', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_staff_merchant_location_id_error()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => "Tran Van A",
            "phone" => "039111111",
            "email" => "tranvana@gmail.com",
            "services_id" => "[2]",
            "access_level" => 2,
            "title_name" => "Bác sĩ HienMai",
            "merchant_location_id" => 0,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

        $this->assertArrayHasKey('merchant_location_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_staff_services_id_error()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => "Tran Van A",
            "phone" => "039111111",
            "email" => "tranvana@gmail.com",
            "services_id" => "[0]",
            "access_level" => 2,
            "title_name" => "Bác sĩ HienMai",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

        $this->assertArrayHasKey('services_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function store_staff_access_level_error()
    {
        $data = [
            "merchant_id" => 1,
            "full_name" => "Tran Van A",
            "phone" => "039111111",
            "email" => "tranvana@gmail.com",
            "services_id" => "[2]",
            "access_level" => 0,
            "title_name" => "Bác sĩ HienMai",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->post('https://api.heyapos.com/api/v1/merchants/staffs/store', $data);

        $this->assertArrayHasKey('access_level', $response['errors']);

        // dd($response->json());
    }
}
