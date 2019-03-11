<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryEdit;
use App\Repositories\CategoryRepository as Category;
use App\Traits\Helper;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * PostController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->category->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreate $request)
    {
        $input = $request->all(['name', 'slug']);
//        $input['slug'] = Helper::slugit($request->name);
        $this->category->create($input);
        return response()->json(['message' => 'success', 'data' => $input]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection
     */
    public function show($id)
    {
        return $this->category->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryEdit $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEdit $request, $id)
    {
        $input = $request->all(['name', 'slug']);
//        $input['slug'] = Helper::slugit($request->name);
        $category = $this->category->findOrFail($id);
        $this->category->update($category, $input);
        return response()->json(['message' => 'success']);
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
        $category = $this->category->findOrFail($id);
        $this->category->delete($category);
        return response()->json();
    }
}
