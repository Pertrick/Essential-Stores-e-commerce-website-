@include('user.partials.header')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <a href="{{ route('user.showAllProducts') }}">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('user.showAllProducts') }}">
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('user.showAllProducts') }}">
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Banner Ends Here -->



<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="{{ route('user.showAllProducts') }}">view all products <i
                            class="fa fa-angle-right"></i></a>

                    <!--search bar -->
                    <form action="{{ route('user.search') }}" method="get" class="p-3 float-right form-inline">
                        <div class="float-right p-3 ">
                            <input type="search" placeholder="search..." id="search" name="search"
                                class="border-top-0 border-left-0 border-right-0 text-xs focus:outline-none p-2 "
                                required>
                            <button class=" btn btn-outline-danger border-0 focus:outline-none"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>

                </div>
            </div>


            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col-md-4">

                        <div class="product-item">
                            <a href="" class="detail-btn" data-toggle="modal" data-id="{{ $product->id }}"
                                data-target="#exampleModalCenter" style="cursor:pointer;">
                                <img src="storage\{{ $product->image }}" alt="{{ $product->name }}">
                            </a>


                            @include('user.modal')


                            <div class="down-content">
                                <a href="" class="detail-btn" data-toggle="modal" data-id="{{ $product->id }}"
                                    data-target="#exampleModalCenter" style="cursor:pointer;">
                                    <h4>{{ $product->name }}</h4>
                                </a>

                                <h5><sub>&#8358;{{ number_format($product->new_price, 2) }}</sub></h5>
                                <h6><sup>&#8358;{{ number_format($product->old_price, 2) }}</sup></h6>


                                <p>{{ $product->description }}</p>

                                <span><a href="{{ route('user.review.index', $product->uuid) }}">Reviews
                                        {{ count($product->review) }}</a></span>

                                <form method="post" id="addToCart">
                                    <p class="m-0">QUANTITY</p>
                                    <input type="hidden" value="{{ $product }}" name="product"
                                        id="product{{ $product->id }}">
                                    <input type="number" name="quantity" min="1"
                                        style="width:60px;  border:1px solid grey; border-radius:5px;"
                                        id="quantity{{ $product->id }}" value="1">
                                    <button type="submit" id="addBtn" class="btn btn-outline-danger text-left"
                                        onclick="addToCart({{ json_encode($product, true) }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg>
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                @endforeach

                @if (method_exists($products, 'links'))
                    <div class="d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
                @endif
            @else
                <div style="text-align: center; color:red; margin:0 auto; font-weight: bold; font-style: italic">No
                    Product to display</div>
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
                    <p>At<a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">
                            Essential Stores</a> the best quality products ranging from clothes, bags, shoes etc are
                        always in stock at a very affordable price. Our Products are available for all age range and at
                        all sizes. At Essential Stores, what you see is what we deliver, because your satisfaction is
                        our pleasure. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more
                        info.</p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                author nulla.</p>
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

<script type="text/javascript">
    var product;

    function addToCart(value) {
        product = value;
    }
    $('form#addToCart').on('submit', function(e) {
        e.preventDefault();
        var productId = product.id;
        $.ajax({
            url: '{{ route('cart.product.store') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}',
                product: product,
                quantity: $('#quantity' + productId).val()
            },
            success: function(response) {
                // window.location.reload();
                console.log(response);
                $('#cart-count').text(response);

            }
        });
    })
</script>



@include('user.partials.footer')
