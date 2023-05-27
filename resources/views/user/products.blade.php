@include('user.partials.header')
<!-- Page Content -->
{{-- <div class="page-heading products-heading header-text"> --}}
{{-- <div class="container"> --}}
<div class="page-heading products-heading header-text ">
    <div class="owl-banner owl-carousel">
        <a href="{{ route('user.showAllProducts') }}">
            <div class="product-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('user.showAllProducts') }}">
            <div class="product-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('user.showAllProducts') }}">
            <div class="product-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </a>
    </div>
</div>
{{-- </div> --}}
{{-- </div> --}}

<!--search bar -->

<div class="products">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <form action="{{ route('user.searchAllProducts') }}" method="get"
                    class="mt-4 float-right form-inline">
                    @csrf
                    <div class="float-right p-3 ">
                        <input type="search" placeholder="search..." id="search" name="search"
                            class="border-top-0 border-left-0 border-right-0 text-xs focus:outline-none p-2 " required>
                        <button class=" btn btn-outline-danger border-0 focus:outline-none"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="float-none" style="clear: both">
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

                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 all des">
                                    <div class="product-item">
                                        <a href="" class="detail-btn" data-toggle="modal"
                                            data-id="{{ $product->id }}" data-target="#exampleModalCenter"
                                            style="cursor:pointer;">
                                            <img src="storage/{{ $product->image }}" alt="">

                                            @include('user.modal')

                                            <div class="down-content">
                                                <a href="" class="detail-btn" data-toggle="modal"
                                                    data-id="{{ $product->id }}" data-target="#exampleModalCenter"
                                                    style="cursor:pointer;">
                                                    <h4>{{ $product->name }}</h4>
                                                </a>
                                                <h5><sub>&#8358;{{ number_format($product->new_price,2) }}</sub></h5>
                                                <h6><sup>&#8358;{{ number_format($product->old_price,2) }}</sup></h6>


                                                <p>{{ $product->description }}</p>
                                                <ul class="stars">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span><a href="{{ route('user.review.index', $product->uuid) }}">Reviews
                                                        {{ count($product->review) }}</a></span>

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
                            <div
                                style="text-align: center; color:red; margin:0 auto; font-weight: bold; font-style: italic">
                                No Product to display</div>

                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>

@include('user.partials.footer')
