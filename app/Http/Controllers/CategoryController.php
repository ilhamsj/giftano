<?php

namespace App\Http\Controllers;

use App\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    public function create()
    {
        
    }

    public function store(CategoryRequest $request)
    {
        $item = Category::create($request->all());
        return response()->json([
            'data' => $item,
            'status' => 'store success' 
        ]);
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
        $request->validate([
            'name' => Rule::requiredIf($request->has('name'))
        ]);

        $item = Category::find($id);
        $item->update($request->all());

        return response()->json([
            'data' => $item,
            'status' => 'update success' 
        ]);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json([
            'status' => 'delete success' 
        ]);
    }
}