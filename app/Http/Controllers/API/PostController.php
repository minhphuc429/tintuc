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
     * @return \Illuminate\Support\Collection
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

            return response()->json(['message' => 'Tạo post thành công']);
        } else {
            return response()->json(['message' => 'Bạn không có quyền thực hiện hành động này'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        $post['thumbnail'] = Storage::url($post['thumbnail']);
        return $post;
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
        $post = $this->post->findOrFail($id);
        if (Auth::user()->can('post.update', $post)) {
            $input = $request->all(['title', 'slug', 'description', 'thumbnail', 'content', 'published', 'category_id']);
            if ($input['thumbnail']) $input['thumbnail'] = $request->file('thumbnail')->store('public/images');
            $this->post->update($post, $input);

            return response()->json(['message' => 'Cập nhật post thành công']);
        } else {
            return response()->json(['message' => 'Bạn không có quyền thực hiện hành động này'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $this->post->delete($post);

        return response()->json(['message' => 'Xóa post thành công']);
    }

    public function draft()
    {
        return $this->post->findWhere(['published' => false]);
    }
}
