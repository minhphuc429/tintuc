<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository as Post;

class HomeController extends Controller
{
    private $post;

    /**
     * Create a new controller instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
