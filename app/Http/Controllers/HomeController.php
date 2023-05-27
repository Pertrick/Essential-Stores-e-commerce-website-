<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;


class HomeController extends Controller
{
    public function home()
    {
        $products = Product::latest()->paginate(12);
         return view('user.index', compact('products'));
    }

    public function adminHome()
    {
        return view('admin.index');
    }


    public function about()
    {
        return view('user.about');
    }


    public function search(Request $request)
    {
        if (!empty($request->search)) {
            $search = $request->input('search');
            $products = Product::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->orWhere('new_price', 'LIKE', '%' . $search . '%')
                ->latest()->paginate(6)->setPath('');
            $pagination = $products->appends(array(
                'search' => $search
            ));
            if ($products) {
                return view('user.index', compact('products'));
            }
        }
        if (empty($request->search)) {

            $products =  Product::latest()->paginate(6);;
            return view('user.index', compact('products'));
        }
    }

    public function showAllProducts()
    {
        $products = Product::with('category')->latest()->paginate(9);
        $sn = 1;
        return view('user.products', compact('products', 'sn'));
    }

    public function modal($id)
    {
        return Product::findOrFail($id);
    }

    public function searchAllProducts(Request $request)
    {
        if (!empty($request->search)) {
            $search = $request->search;
            $products = Product::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->orWhere('new_price', 'LIKE', '%' . $search . '%')
                ->latest()->paginate(6)->setPath('');
            $pagination = $products->appends(array(
                'search' => $search
            ));;
            if ($products) {
                return view('user.products', compact('products'));
            }
        }
        if (empty($request->search)) {

            $products =  Product::latest()->paginate(6);;
            return view('user.products', compact('products'));
        }
    }
}
