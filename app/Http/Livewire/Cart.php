<?php
namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as CartClass;
use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        $priceTotal = CartClass::priceTotal();
        $content = CartClass::content();
        $counter = CartClass::content()->count();
        return view('livewire.cart', compact('counter', 'content', 'priceTotal'));
    }
    public function increment($rowId, $qty)
    {
        $inc = $qty + 1;
        return CartClass::update($rowId, $inc);
    }
    public function decrement($rowId, $qty)
    {
        $dec = $qty - 1;
        return CartClass::update($rowId, $dec);
    }
    public function remove($rowId)
    {
        return CartClass::remove($rowId);
    }

}

