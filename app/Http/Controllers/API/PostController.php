<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreate;
use App\Http\Requests\PostEdit;
use App\Repositories\PostRepository as Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

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
        return $this->post->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreate $request)
    {
        $input = $request->all();

        $image = $request->get('thumbnail');
        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

        $input->thumbnail = ($request->get('thumbnail'))->save(public_path('images/').$name);


        $this->post->create($input);

        return response()->json(['status' => 'Tạo post thành công']);
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
        $input = $request->all(['title', 'content', 'description']);
        $this->post->update($input, $id);

        return response()->json(['status' => 'Cập nhật post thành công']);
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
