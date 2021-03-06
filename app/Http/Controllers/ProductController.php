<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'image'         => 'required',
            'category_id'   => 'required',
        ]);

        $product = Product::create($request->all());

        if($request->hasFile('image')) {
            $mime   = $request->file('image')->getClientOriginalExtension();
            $image  = \Str::slug($request->name).Carbon::now()->format('-YHis'). '.' .$mime;
            $path   = $request->file('image')->storeAs('images', $image, 'heroku_public');

            $product->image = env('APP_URL').'images/'.$image;
            $product->save();
        }
        return response()->json([
            'item'  => $product,
            'status'    => 'store success'
        ]);
    }

    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => Rule::requiredIf($request->has('name')),
            'image' => Rule::requiredIf($request->has('image')),
            'category_id' => Rule::requiredIf($request->has('category_id')),
        ]);
        
        $item = Product::find($id);
        
        if($request->hasFile('image')):
            
            $old_image  = 'images/'.$item->image;
            file_exists($old_image) ? unlink($old_image) : '';
            $mime   = $request->file('image')->getClientOriginalExtension();
            $image  = \Str::slug($request->name).Carbon::now()->format('-YHis'). '.' .$mime;
            $path   = $request->file('image')->storeAs('images', $image, 'heroku_public');

            $item->update($request->except('image'));
            $item->update([
                'image' => env('APP_URL').'images/'.$image
            ]);
            $item->save();
        else:
            $item->update($request->except('image'));
        endif;
    
        return response()->json([
            'item'      => $item,
            'status'    => 'update success'
        ]);
    }

    public function destroy($id)
    {
        $item = Product::find($id);
        $item->delete();
        $image = 'images/'.$item->image;

        file_exists($image) ? unlink($image) : '';

        return response()->json([
            'item' => $item->name,
            'message' => 'Delete Success'
        ], 200);
    }
}
