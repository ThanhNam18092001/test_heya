<?php

namespace Tests\Feature\Authencation;

use GuzzleHttp\Middleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\RequestInterface;
use Tests\TestCase;
use Whoops\Run;

class LoginTest extends TestCase
{
    /** @test */
    public function user_login_successfully()
    {
        $data = [
            'email' => 'admin.merchant@gmail.com',
            'password' => '123456'
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/auth/login', $data)->json();
        $this->assertArrayHasKey('data', $response);
    }

    /** @test */
    public function user_login_incorrect_account()
    {
        $data = [
            'email' => '2lukas.nguyen@heya.com',
            'password' => '1234567'
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/auth/login', $data)->json();
        $this->assertArrayHasKey('message', $response['error']);
    }

    /** @test */
    public function user_login_email_empty()
    {
        $data = [
            'email' => '',
            'password' => '1234567'
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/auth/login', $data);
        $this->assertArrayHasKey('email', $response['errors']);
    }

    /** @test */
    public function user_login_password_empty()
    {
        $data = [
            'email' => 'lukas.nguyen@heya.com',
            'password' => ''
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/auth/login', $data);
        $this->assertArrayHasKey('password', $response['errors']);
    }

    /** @test */
    public function user_login_email_invalidate()
    {
        $data = [
            'email' => 'ddd',
            'password' => 'ddd'
        ];

        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->post('https://api.heyapos.com/api/v1/auth/login', $data)->json();
        $this->assertArrayHasKey('email', $response['errors']);
    }
}
