<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryEdit;
use App\Models\Category;
use App\Traits\Helper;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreate $request)
    {
        $input = $request->all();
        Category::create(array_merge($input, ['slug' => Helper::slugit($request->name)]));

        return redirect()->back()->with('status', trans('categories_create.status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
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
        Category::update($request, $id);
        return redirect()->back()->with('status', trans('categories_edit.status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();
        return response()->json();
    }
}
