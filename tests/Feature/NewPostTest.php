<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class NewPostTest extends TestCase {

    public function testWrongParams() {
        $user = factory(User::class)
                ->make(['email' => 'test@user.laravel']);
        $this->be($user);
        $response = $this->call(
                'POST',
                '/new',
                ['title' => 'the title', 'content' => 'ojhkjhg']
        );
        $response->assertSessionHasErrors('content');
        $response->assertSessionHas('_old_input');;
    }

}
