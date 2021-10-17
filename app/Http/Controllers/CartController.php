<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $req)
    {

        $product = (new Product)->findOrFail($req->input('product_id'));
        Cart::add($product->id, $product->product_title, 1, $product->product_price / 100,);
        flash()
            ->success($product->product_title . " is added");
        return redirect()
            ->route('dashboard');
    }
}

