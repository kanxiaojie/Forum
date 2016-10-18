<?php

use App\Post;
use Illuminate\Support\Facades\Cache;

class PostTest extends TestCase
{
    public function test_index()
    {
        $this->action('get', 'PostController@index');

        $this->assertResponseOk();
    }
}


