<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CustomerListTest extends TestCase
{
    /** @test */
    public function list_customer_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->get('https://api.heyapos.com/api/v1/merchants/customers/LmMxu');

        $this->assertArrayHasKey('data', $response);
    }
}
