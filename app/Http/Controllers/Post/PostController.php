<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;

class PostController extends Controller {

    public function createPost(Request $request) {
        $validator = Validator::make($request->all(), [
                    'title' => 'required|max:255',
                    'content' => 'required|min:20',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors($validator);
        }
        
        $post = new Post();
        
        $post->title = $request->title;
        $post->content = $request->content;
        Auth::user()->posts()->save($post);
        return redirect('/new');
    }

}
