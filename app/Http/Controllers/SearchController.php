<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function viewsearch(){
        return view('user.search');
    }

    public function search(Request $request){
        if($request->ajax()){
            dd($request);
            if(!empty($request->search)) {
                dd("search-=roduct");
                $search = $request->search;
                $output = "";
                $searchProduct = Product::where('name', 'like', '%' . $search . '%')->get();
                dd("searchProduct");
                if($searchProduct){
                    foreach ($searchProduct as $key=> $product)
                    {
                        $output= <<<TEXT

                     <div class="product-item">
                     <a href="#"><img src="storage/uploads/$product->image" alt=""></a>
                     <div class="down-content">
                     <a href="#"><h4>$product->name</h4></a>
                     <h6>$ $product->old_price</h6>
                     <h5>$ $product->new_price</h5>

                    <p>{{$product->description}}</p>
                    <ul class="stars">
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   </ul>
                   <span><a href="review/$product->id/review">Reviews <?php echo count($product->review)?></a></span>

                   </div>
                   </div>


                   TEXT;
                    }

                    return response($output);
                }
                //return view('user.contact', compact('searchProduct'));
            }if (empty($request->search)) {
                $outputs = "";
                $searchProduct = Product::latest()->paginate(6);
                if($searchProduct){
                    foreach ($searchProduct as $key=> $product)
                    {
                        $outputs= <<<TEXT

                     <div class="product-item">
                     <a href="#"><img src="storage/uploads/$product->image" alt=""></a>
                     <div class="down-content">
                     <a href="#"><h4>$product->name</h4></a>
                     <h6>$ $product->old_price</h6>
                     <h5>$ $product->new_price</h5>

                    <p>{{$product->description}}</p>
                    <ul class="stars">
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   <li><i class="fa fa-star"></i></li>
                   </ul>
                   <span><a href="review/$product->id/review">Reviews <?php echo count($product->review)?></a></span>

                   </div>
                   </div>


                   TEXT;
                    }

                    return response($outputs);
                }

            }

        }else {

            $searchProduct =  Product::latest()->paginate(6);;
            return view('user.contact', compact('searchProduct'));


        }


    }


}
