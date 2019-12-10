<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
        $category = Category::paginate(6);
        $product = Product::paginate(12);
        
        return view('welcome')->with([
            'products'   => $product,
            'categories'  => $category,
        ]);
    }

    public function admin() {
        $category = Category::paginate(6);
        $product = Product::paginate(12);
        
        return view('admin.dashboard');
    }
}
