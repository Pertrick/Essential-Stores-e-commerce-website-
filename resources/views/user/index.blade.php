
    @include('user.partials.header')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.blade.php">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

            @if(count($products)>0)
            @foreach($products as $product)

          <div class="col-md-4">
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

                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            @else
                <div style="text-align: center; color:red;">No Product to display</div>
            @endif

        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Essential Stores</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for the best products?</h4>
              <p>At<a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent"> Essential Stores</a> the best quality products ranging from clothes, bags, shoes etc are always in stock at a very affordable price. Our Products are available for all age range and at all sizes. At Essential Stores, what you see is what we deliver, because your satisfaction is our pleasure. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
                <li><a href="#">Non cum id reprehenderit</a></li>
              </ul>
              <a href="about.blade.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="template/assets/images/woman-holding-cloth.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Essential Stores</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('user.partials.footer')


