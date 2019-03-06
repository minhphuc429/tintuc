<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreate;
use App\Http\Requests\PostEdit;
use App\Repositories\PostRepository as Post;

class PostController extends Controller
{
    private $post;

    /**
     * PostController constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => $this->post->all()
        ];

        return view('posts.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreate $request
     * @return \Illuminate\Http\Response
     * @throws \App\Repositories\Exceptions\RepositoryException
     */
    public function store(PostCreate $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->description = $request->input('description');

        $post->create($request->all());

        return redirect()->back()->with('status', 'Tạo post thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostEdit $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEdit $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->content = $request->input('content');
        $post->update();

        return redirect()->back()->with('status', 'Cập nhật post thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('status', 'Xóa post thành công');
    }
}
