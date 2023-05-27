<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- modal css-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="modal/css/ionicons.min.css">
    <link rel="stylesheet" href="modal/css/flaticon.css">
    <link rel="stylesheet" href="modal/css/style.css">

    <!-- modal css ends -->

    <link rel="icon" href="/icon/icon.ico" type="image/x-icon">
    <script src="/js/jquery-3.6.0.js"></script>

    <title>Essential Stores</title>

    <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="template/assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="template/assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                @if (Route::has('login'))
                    @auth
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <h2>Essential <em>Stores</em></h2>
                        </a>
                    @else
                        <a class="navbar-brand" href="/">
                            <h2>Essential <em>Stores</em></h2>
                        </a>
                    @endauth
                @endif


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('all-products*') ? 'active' : '' }}"
                                href="{{ route('user.showAllProducts') }}">Our Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}"
                                href="{{ Route('user.about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}"
                                href="{{ Route('user.contact') }}">Contact Us</a>
                        </li>

                        <li class="nav-item">

                            <div class="dropdown">
                                <a href="{{ route('user.cart') }}" class="nav-link {{ Request::is('cart*') ? 'active' : '' }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span id="cart-count"
                                        class="badge badge-pill badge-danger">
                                        {{ auth()->user()?->carts()->count() ?? count((array) session('cart')) }}
                                    </span>
                                </a>

                                {{-- <!-- I coommented this out because it is messing up my UI-->
                            <!--
                            <div class="dropdown-menu">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </div>
                                    @php $total = 0 @endphp
                                    @foreach ((array) session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                    </div>
                                </div>
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ $details['image'] }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">

                                                <p>{{ $details['name'] }}</p>
                                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="" class="btn btn-primary btn-block">View all</a>
                                    </div>
                                </div>
                            </div>
                            --> --}}
                            </div>


                        </li>

                        @if (Route::has('login'))

                            @auth
                                <li class="nav-item">
                                    <x-app-layout></x-app-layout>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>


                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    </li>
                                @endif
                            @endauth

                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <div class="text-center">{{ session('success') }}</div>
                </div>
            @endif

            @yield('content')
        </div>
    </header>
