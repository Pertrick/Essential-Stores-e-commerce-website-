<base href="/">
@include('user.partials.header')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="adminpanel/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="adminpanel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="adminpanel/dist/css/adminlte.min.css">

<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-lg-4 col-md-6 border" style="border-radius: 5px; padding:5px;">
            <a href="" class="detail-btn" data-toggle="modal" data-id="{{$product->id}}" data-target="#exampleModalCenter" style="cursor:pointer;">
                <img src="storage/{{$product->image}}" alt="{{$product->name}}" width="100%" >
            </a>
            <span>{{$product->name}}</span>
            <div class="float-right">
                <small class="text-danger" style="text-decoration: line-through;">&#8358;{{number_format($product->new_price,2)}}</small>
                <span class="text-success" >&#8358;{{number_format($product->old_price,2)}}</span>
            </div>
            
                <p>{{$product->description}}</p>
        </div>
        <div class="col-lg-7 col-md-6 ml-2" style="background-color:#eee; border-radius:5px;">
            @if(count($reviews)>0)
            @foreach($reviews as $rev)
            <div class="post">

                <div class="user-block mt-4">
                    @if($rev->user->profile_photo_path)
                    <img class="img-circle img-bordered-sm" src="storage/{{ $rev->user->profile_photo_path }}" alt="{{$rev->user->name}}">
                    @else
                    <img class="img-circle img-bordered-sm" src="storage/user.jfif" alt="user image">
                    @endif
                    <span class="username">

                        @if (Route::has('login'))
                        @auth
                        @if(auth()->user()->role_id == 1)

                        <form class="float-right" action="{{ route('user.review.delete', $rev->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                            <input type="submit" name="_method" value="Delete" class="btn btn-danger">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        @endif
                        @endauth
                        @endif

                        <a href="#">{{$rev->user->name}}</a>
                    </span>
                    <span class="description">Shared publicly - {{$rev->created_at}}</span>
                </div>
                <!-- /.user-block -->

                <p>
                    <b>{{$rev->text}}</b>
                </p>

                <hr>
                @endforeach
                @else
                <p><b>No Review Yet ! Be the first to make a review.</b></p>

                @endif

                <form action="{{route('user.review.store', $product->id)}}" method="post">
                    @csrf
                    <textarea class="form-control form-control-sm" type="text" name="text" placeholder="Type a Review.." cols="5" rows="5" autofocus autocomplete="text" autocapitalize="text" required></textarea>

                    <input type="submit" value="submit" class="btn btn-success mt-2 float-right">
                    <!-- /.post -->
                </form>

                <div class="d-flex justify-content-center">
                    {!! $reviews->links() !!}
                </div>

            </div>

        </div>
    </div>
    <!-- Content Header (Page header) -->

</div>




<!-- Bootstrap -->
<script src="adminpanel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="adminpanel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="adminpanel/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="adminpanel/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="adminpanel/plugins/raphael/raphael.min.js"></script>
<script src="adminpanel/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="adminpanel/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="adminpanel/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="adminpanel/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="adminpanel/dist/js/pages/dashboard2.js"></script>
@include('user.partials.footer')