<?php

namespace Tests\Feature\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetListNameEmployeeTest extends TestCase
{
    /** @test */
    public function get_list_name_employee_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service/1/list-employee');

        // $this->assertArrayHasKey('data', $response);
        dd($response['data']);
    }

    /** @test */
    public function get_list_name_employee_error()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos',
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/service/0/list-employee');

        $this->assertArrayHasKey('message', $response['error']);
        // dd($response['error']);
    }
}
