<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Role;


class HomeController extends Controller
{
    public function redirect(){
        $products = Product::latest()->paginate(6);
        return view('user.index', compact('products'));
    }

    public function home()
    {
        $products = Product::latest()->paginate(6);

            if(Auth::check()){
               foreach(auth()->user()->roles as $role){
                if($role->name === "User"){
                    return view('user.index', compact('products'));
                }else if($role->name === "Administrator"){
                    return view('admin.index');
                }
               }
            }
            else{
                return redirect('/');
            }

    }


    public function about(){
        return view('user.about');
    }

    public function contact(){
        return view('user.contact');
    }


}
