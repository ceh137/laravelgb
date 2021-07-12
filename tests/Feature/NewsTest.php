<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_index()
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }
    public function test_news_single()
    {

        $id = rand(1, 23);
        $response = $this->get(route('news.single', ['id' => 3]));

        $response->assertStatus(200);
    }
    public function test_cat_news()
    {
        $cat_id = rand(1, 5);
        $response = $this->get(route('cat.news', ['cat_id' => $cat_id]));

        $response->assertStatus(200);
    }
}
