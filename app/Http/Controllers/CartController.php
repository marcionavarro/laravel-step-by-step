<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('cart.shop', compact('products'));
    }

    public function cart()
    {
        return view('cart.cart');
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->image]]);

        return redirect()->back()->with('success', 'Produto adicionado no carrinho!');
    }

    public function qtyIncrement($id)
    {
        $productCart = Cart::get($id);
        $product = Product::find($productCart->id);
        $updateQty = $productCart->qty + 1;
        $updatePrice = ($product->price * $updateQty);

        Cart::update($id, ['qty' => $updateQty, 'price' => $updatePrice]);
        return redirect()->back()->with('success', 'Item adicionado com sucesso!');
        ;
    }

    public function qtyDecrement($id)
    {
        $productCart = Cart::get($id);
        $product = Product::find($productCart->id);
        $updateQty = $productCart->qty - 1;
        $updatePrice = ($product->price * $updateQty);

        if ($updateQty > 0) {
            Cart::update($id, ['qty' => $updateQty, 'price' => $updatePrice]);
        }

        Cart::update($id, $updateQty);
        return redirect()->back()->with('success', 'Item excluido com sucesso!');
    }

    public function removeProduct($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Carrinho removido com sucesso!');
    }
}