<?php

namespace Tests\Feature\Staff;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DeleteStaffTest extends TestCase
{
    /** @test */
    public function delete_staff_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->delete('https://api.heyapos.com/api/v1/merchants/staffs/delete/14');

        $this->assertArrayHasKey('message', $response);
        // dd($response->json());
    }

    /** @test */
    public function delete_staff_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTI3MDc0OSwibmJmIjoxNjgxMjcwNzQ5LCJqdGkiOiJJam9yZkw4SXVEY3hxOG9JIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.jsOjXAl9oQIBE5R6Qo20u1kA4DajWTUotS8IV61abgE',
        ])->delete('https://api.heyapos.com/api/v1/merchants/staffs/delete/0');

        $this->assertArrayHasKey('errors', $response);
        // dd($response->json());
    }
}
