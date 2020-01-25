<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class NewPostTest extends TestCase {

    use RefreshDatabase;
    
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
        $response->assertSessionHas('_old_input');
        ;
    }

    public function testNewPost() {
        $postParams = [
            'title' => 'the title',
            'content' => 'In a place far far away.'
        ];
        $user = factory(User::class)
                ->make(['email' => 'test@user.laravel']);
        $user->save();
        $this->be($user);
        $response = $this->call('POST', '/new', $postParams);
        $response->assertRedirect('http://localhost/new');
        $this->assertDatabaseHas('posts', $postParams);
    }

}
