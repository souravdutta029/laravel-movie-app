<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class viewMoviesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function the_main_page_info()
    {
        $response = $this->get(route('movies.index'));

        $response->assertStatus(200);
    }
}
