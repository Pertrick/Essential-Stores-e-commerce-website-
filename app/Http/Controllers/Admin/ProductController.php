<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\updateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function store(ProductRequest $request)
    {

       
    }
    // public function index()
    // {
    //     $products = Product::with('category')->latest()->paginate(6);
    //     $sn =1 ;
    //     return view('admin.product.index', compact('products', 'sn'));
    // }


    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('admin.product.create', compact('categories'));
    // }

    // public function store(ProductRequest $request)
    // {

    //     //$cat=  implode(',', $request->category_id);
    //     $categories = $request->category_id;

    //     if($request->has('image')){
    //         $filename = time() . '_' .  $request->file('image')->getClientOriginalName();
    //         $request->file('image')->storeAs('uploads', $filename, 'public');
    //     }


    //     $product = auth()->user()->products()->create([
    //         'name' => $request->name,
    //         'image' => $filename ??null,
    //         'quantity' => $request->quantity,
    //         'description' => $request->description,
    //         'old_price' => $request->old_price,
    //         'new_price' => $request->new_price,


    //     ]);


    //     foreach($categories as $categoryName){
    //       $category = Category::firstOrCreate(['name' => $categoryName]);
    //         $product->category()->attach($category);
    //     }

    //     return redirect()->route('admin.product.index')->with('message', "Product added successfully");

    // }

    // public function edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $categories = Category::all();
    //    // dd($categories);
    //     return view('admin.product.edit', compact('product', 'categories'));
    // }

    // public function show($id){
    //     $product = Product::findOrFail($id);
    //     return view('admin.product.show', compact('product'));
    // }

    // public function update(updateProductRequest $request, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $categories = $request->category_id;

    //     if($request->has('image')){
    //         $filename = time() . '_' .  $request->file('image')->getClientOriginalName();
    //         $request->file('image')->storeAs('uploads', $filename, 'public');
    //     }


    //     $product->update([
    //         'name' => $request->name,
    //         'image' => $filename ??$product->image,
    //         'quantity' => $request->quantity,
    //         'description' => $request->description,
    //         'old_price' => $request->old_price,
    //         'new_price' => $request->new_price,

    //     ]);

    //     $newTags = [];

    //     foreach($categories as $categoryName){
    //         $category = Category::firstOrCreate(['name' => $categoryName]);
    //         array_push($newTags, $category->id);

    //     }

    //     $product->category()->sync($newTags);


    //     return redirect()->route('admin.product.index');
    // }

    // public function destroy($id){
    //     $product = Product::findOrFail($id);

    //     if ($product->image) {
    //         //dd($product->image);
    //         Storage::delete('storage/uploads/' . $product->image);
    //     }


    //         $product->category()->detach();


    //     $product->delete();
    //     return redirect()->back()->with('message', 'Product deleted Successfully');
    // }

}
