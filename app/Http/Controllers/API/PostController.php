<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreate;
use App\Http\Requests\PostEdit;
use App\Repositories\PostRepository as Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->all();
        foreach ($posts as $post) {
            if ($c = preg_match_all("/(public\/images\/)/is", $post->thumbnail, $matches))
                $post->thumbnail = Storage::url($post->thumbnail);
        }
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreate $request)
    {
        if (Auth::user()->can('post.create')) {
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            $input['thumbnail'] = $request->file('thumbnail')->store('public/images');
            $this->post->create($input);

            return response()->json(['status' => 'Tạo post thành công']);
        } else {
            return response()->json(['status' => 'Bạn không có quyền thực hiện hành động này'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->post->find($id);
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
        if (Auth::user()->can('post.update')) {
            $input = $request->all(['title', 'content', 'description']);
            $this->post->update($input, $id);

            return response()->json(['status' => 'Cập nhật post thành công']);
        } else {
            return response()->json(['status' => 'Bạn không có quyền thực hiện hành động này'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->delete($id);

        return response()->json(['status' => 'Xóa post thành công']);
    }
}
