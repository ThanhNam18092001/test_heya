<?php

namespace Tests\Feature\book;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BookListTest extends TestCase
{
    /** @test */
    public function list_book_successfully()
    {
        $response = Http::withHeaders([
            'Accept-Heya' => 'application/myheya.heyapos'
        ])->get('https://api.heyapos.com/api/v1/merchants/LmMxu/book-assignments');

        $this->assertArrayHasKey('data', $response);
        dd($response['data']);
    }
}
