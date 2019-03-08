<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository as Post;
use Illuminate\Http\Request;

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

    public function frontPage() {
        $posts = $this->post->paginate(5);
        return view('index', compact('posts'));
    }

    public function show($id) {
        $post = $this->post->find($id);
        return view('single', compact('post'));
    }
}
