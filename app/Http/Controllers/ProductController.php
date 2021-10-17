<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        
        $groupedProducts = $this->showAllProducts();
        
        return view('index',compact('groupedProducts'));
    }

    public function showAllProducts(){
        $groupedProducts = Product::simplePaginate(12);
        return $groupedProducts;
    }
}
