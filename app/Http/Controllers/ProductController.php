<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $items = Product::all();

        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '<a href="" data-url="'.route('product.update', $items->id).'" data-edit="'.route('product.edit', $items->id).'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i></span></a>
                 <a href="" data-url="'.route('product.destroy', $items->id).'" class="btnDestroy btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i></span></a>';
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }
}
