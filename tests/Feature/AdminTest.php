<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get(route("admin.index"));

        $response->assertStatus(200);
    }

    public function test_cat_index()
    {
        $response = $this->get(route("admin.categories.index"));

        $response->assertStatus(200);
    }

    public function test_cat_create()
    {
        $response = $this->get(route("admin.categories.create"));

        $response->assertStatus(200);
    }

    public function test_cat_store()
    {
        $response = $this->get(route("admin.categories.store"));

        $response->assertStatus(200);
    }

    public function test_news_index()
    {
        $response = $this->get(route("admin.news.index"));

        $response->assertStatus(200);
    }

    public function test_news_create()
    {
        $response = $this->get(route("admin.news.create"));

        $response->assertStatus(200);
    }

    public function test_news_store()
    {
        $response = $this->get(route("admin.news.store"));

        $response->assertStatus(200);
    }


}
