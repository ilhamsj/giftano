<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $item = Category::create($request->all());
        return new CategoryResource($item);
    }

    public function show($id)
    {
        return new CategoryResource(Category::find($id));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Category::find($id);
        $item->update($request->all());

        return new CategoryResource($item);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return new CategoryResource([
            'status' => 'berhasil',
        ]);   
    }
}