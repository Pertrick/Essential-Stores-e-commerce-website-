@include('user.partials.header')
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>Essentials Stores</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>
            </div>
          </div>


          <div class="col-md-12">

                <div class="row">

                    @if(count($products)>0)
                        @foreach($products as $product)
                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href="#"><img src="storage/uploads/{{$product->image}}" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>{{$product->name}}</h4></a>
                            <h6>${{$product->old_price}}</h6>
                            <h5>${{$product->new_price}}</h5>

                            <p>{{$product->description}}</p>
                          <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
                            <span><a href="{{route('user.review.index', $product->id)}}">Reviews {{count($product->review)}}</a></span>

                        </div>
                      </div>
                    </div>

                        @endforeach

                                @if(method_exists($products, 'links'))
                                    <div class="d-flex justify-content-center">
                                        {!! $products->links() !!}
                                    </div>
                                @endif


                    @else
                        <div style="text-align: center; color:red; margin:0 auto; font-weight: bold; font-style: italic">No Product to display</div>

                    @endif
                </div>
          </div>

            </div>
          </div>

        </div>
      </div>
    </div>

@include('user.partials.footer')
