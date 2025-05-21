<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $allPosts = Post::all();
        return view('index', ['posts' => $allPosts]);
    }

    public function show($post){
        $singlePost = Post::find($post);
        if(is_null($singlePost)){
            return to_route('posts.index');
        }
        return view('show', ['post' => $singlePost]);
    }

    public function create(){
        return view('create');
    }

    public function store(){
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->save();
        return to_route('posts.index');
    }

    public function edit(Post $post){
        return view('edit', [ 'post' => $post]);
    }

    public function update($post){
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $post = Post::find($post);

        $post->update([
            'title'=> $title,
            'description'=> $description,
        ]);
        return to_route('posts.show', $post);
    }

    public function destroy($post){
        $post = Post::find($post);
        $post->delete();
        return to_route('posts.index');
    }
}
