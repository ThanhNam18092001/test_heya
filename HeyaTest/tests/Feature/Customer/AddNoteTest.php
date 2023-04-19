<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AddNoteTest extends TestCase
{
    /** @test */
    public function create_note_successfully()
    {
        $data = [
            'customer_id' => 1,
            'content' => 'sdas',
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/add-note', $data);

        $this->assertArrayHasKey('message', $response);
        // dd($response->json());
    }

    /** @test */
    public function create_note_customer_id_empty()
    {
        $data = [
            'customer_id' => '',
            'content' => 'sdas',
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/add-note', $data);

        $this->assertArrayHasKey('customer_id', $response['errors']);
        // dd($response->json());
    }

    /** @test */
    public function create_note_customer_id_error()
    {
        $data = [
            'customer_id' => 0,
            'content' => 'sdas',
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/add-note', $data);

        $this->assertArrayHasKey('customer_id', $response['errors']);
        // dd($response->json());
    }

    /** @test */
    public function create_note_content_empty()
    {
        $data = [
            'customer_id' => 1,
            'content' => '',
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmhleWFwb3MuY29tXC9hcGlcL3YxXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY4MDg0NDYxOCwibmJmIjoxNjgwODQ0NjE4LCJqdGkiOiJQQTgzYzJaMDRpRFV4NElvIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OgH9V40sCUPK9AAeyjDejf_jNffyEy6yawtKeoUdZIc',
        ])->post('https://api.heyapos.com/api/v1/merchants/customers/add-note', $data);

        $this->assertArrayHasKey('content', $response['errors']);
        //  dd($response->json());
    }
}
