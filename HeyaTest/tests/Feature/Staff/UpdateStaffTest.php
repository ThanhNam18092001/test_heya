<?php

namespace Tests\Feature\Staff;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateStaffTest extends TestCase
{
    /** @test */
    public function update_staff_successfully()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => "039755877",
            "email" => "tranvanc@gmail.com",
            "services_id" =>  "[4]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        // $this->assertArrayHasKey('message', $response);

        dd($response->json());
    }

    /** @test */
    public function update_staff_employee_id_error()
    {
        $data = [
            "employee_id" => 0,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => "0397558799",
            "email" => "tranvan@gmail.com",
            "services_id" =>  "[4]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        $this->assertArrayHasKey('employee_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_staff_name_empty()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => null,
            "phone" => "0397558799",
            "email" => "tranvan@gmail.com",
            "services_id" =>  "[4]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

         $this->assertArrayHasKey('full_name', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_staff_phone_empty()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => null,
            "email" => "tranvan@gmail.com",
            "services_id" =>  "[4]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        $this->assertArrayHasKey('phone', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_staff_email_empty()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => "0397558799",
            "email" => null,
            "services_id" =>  "[4]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        $this->assertArrayHasKey('email', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_staff_merchant_location_id_error()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => "0397558799",
            "email" => "tranvan@gmail.com",
            "services_id" =>  "[4]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 0,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        $this->assertArrayHasKey('merchant_location_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_staff_services_id_error()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => "0397558799",
            "email" => "tranvan@gmail.com",
            "services_id" =>  "[0]",
            "access_level" => 2,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        $this->assertArrayHasKey('services_id', $response['errors']);

        // dd($response->json());
    }

    /** @test */
    public function update_staff_access_level_error()
    {
        $data = [
            "employee_id" => 2,
            "merchant_id" => 1,
            "full_name" => "Tran Van B",
            "phone" => "0397558799",
            "email" => "tranvan@gmail.com",
            "services_id" =>  "[4]",
            "access_level" => 0,
            "title_name" => "Bác sĩ NhiLe",
            "merchant_location_id" => 1,
            "is_receive_book" => false
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->put('https://api.heyapos.com/api/v1/merchants/staffs/update/14', $data);

        $this->assertArrayHasKey('access_level', $response['errors']);

        // dd($response->json());
    }
}
