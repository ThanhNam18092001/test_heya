<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ListAppointmentsCustomerTest extends TestCase
{
    /** @test */
    public function list_appointments_customer_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MTIwMTg3OSwibmJmIjoxNjgxMjAxODc5LCJqdGkiOiJtYW5zdWgyVDUwZ0FNOFZhIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.1ZjsJFLRLbwOpLO-940xyn8NlHRW-ECaLttEhs4dCPE',
        ])->get('https://api.heyapos.com/api/v1/merchants/customers/1/appointments');

        $this->assertArrayHasKey('data', $response);
        // dd($response);
    }
}
