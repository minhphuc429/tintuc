<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search;
use App\Repositories\PostRepository as Post;

class IndexController extends Controller
{
    private $post;

    /**
     * Create a new controller instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function frontPage()
    {
        $posts = $this->post->paginate(5);
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->post->find($id);
        return view('single', compact('post'));
    }

    public function search(Search $request)
    {
        $posts = $this->post->search($request->get('query'))->paginate(5);
        if ($posts) return view('search')->with(['posts' => $posts]);
    }
}
