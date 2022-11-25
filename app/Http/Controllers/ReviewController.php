<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index($id)
    { 
        $product = Product::with('review','user')->findOrFail($id);
        $reviews = $product->review()->with('user')->latest()->paginate(7);

        if (!Auth::check()) {
            return view('user.review.index', compact('reviews', 'product'));
        }
        $roles = auth()->user()->roles;
        return view('user.review.index', compact('reviews', 'product', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $this->validate($request, [
           'text' => 'required',
        ]);

        auth()->user()->reviews()->create([
            'text' => $request->text,
            'product_id' => $id,
        ]);

        return redirect()->back()->with("message", "Review Added!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->back()->with("message", "Review Deleted Successfully");
    }
}
