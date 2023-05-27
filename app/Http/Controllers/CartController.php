<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $total = 0;

        if (!auth()->user()) {
            $carts = session('cart');
            return view('user.cart', compact('carts', 'total'));
        }

        $carts = Cart::with('product')
            ->whereBelongsTo(auth()->user())
            ->get()
            ->map(function ($cart) {
                return [
                    'product_id' => $cart->product->id,
                    'name' => $cart->product->name,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->new_price,
                    'image' => $cart->product->image,
                ];
            });

        return view('user.cart', compact('carts', 'total'));
    }

    public function addToCart()
    {
        $product = request('product');
        $productId = $product['id'];

        if (request()->user()) {
            $userCart = Cart::whereBelongsTo(auth()->user())
                ->where('product_id', $productId)
                ->first();

            if (!empty($userCart)) {
                $quantity =  $userCart->quantity + (intval(request('quantity')) ?? 1);
                $userCart->update(['quantity' => $quantity]);
            } else {
                auth()->user()->carts()->create([
                    'product_id' => $productId,
                    'quantity' =>  request('quantity') ?? 1
                ]);
            }

            $userCartCount = Cart::whereBelongsTo(auth()->user())->count();
            return response()->json($userCartCount);
        } else {

            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    'name' => $product['name'],
                    'quantity' => request('quantity') ?? 1,
                    'price' => $product['new_price'],
                    'image' => $product['image'],
                ];
            }

            session()->put('cart', $cart);
            return response()->json(count($cart));
        }
    }

    public function updateCart(Request $request)
    {
        if (request()->user() && $request->id && $request->quantity) {
            $productCart = Cart::whereBelongsTo(auth()->user())
                                ->where('product_id', $request->id)
                                ->first();

            $productCart->update(['quantity' => $request->quantity]);
            return  session()->flash('success', 'cart updated successfully');
        }


        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return  session()->flash('success', 'cart updated successfully');
        }
    }

    public function removeFromCart(Request $request)
    {
        if (request()->user() && $request->id) {
            $productCart = Cart::whereBelongsTo(auth()->user())
                                ->where('product_id', $request->id)
                                ->first();

            $productCart->delete();
            return session()->flash('success', 'Item removed successfully');
        }


        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return session()->flash('success', 'Item removed successfully');
        }

       
    }
}
