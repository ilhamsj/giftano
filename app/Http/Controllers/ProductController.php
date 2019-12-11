<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::orderBy('updated_at', 'desc');

        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '<a href="" data-url="'.$items->id.'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i></span></a>
                 <a href="" data-url="'.$items->id.'" class="btnDestroy btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i></span></a>';
            })
            ->editColumn('image', function ($items) {
                return '<img class="img-fluid rounded" src="images/'.$items->image.'"/>';
            })  
            ->rawColumns(['action', 'image'])
            ->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        if($request->hasFile('image')) {
            $mime   = $request->file('image')->getClientOriginalExtension();
            $image  = \Str::slug($request->name).Carbon::now()->format('-YHis'). '.' .$mime;
            $path   = $request->file('image')->storeAs('images', $image, 'heroku_public');

            $product = Product::create($request->all());
            $product->image = $image;
            $product->save();
            return response()->json($product);
        } else {
            return response()->json($request->all());
        }
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
        //
    }

    public function destroy($id)
    {
        $item = Product::find($id);
        $item->delete();
        unlink('images/'.$item->image);
        return response()->json([
            'item' => $item->name,
            'message' => 'Delete Success'
        ], 200);
    }
}
