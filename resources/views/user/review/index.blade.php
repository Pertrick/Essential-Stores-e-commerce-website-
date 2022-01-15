<base href="/">
@include('user.partials.header')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">

<div class="container"  style="padding-top: 100px;">
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">


                @if(count($reviews)>0)
                    @foreach($reviews as $rev)
                    <div class="post" >

                        <div class="user-block mt-4">
                            @if($rev->user->profile_photo_path)
                            <img class="img-circle img-bordered-sm" src="storage/{{ $rev->user->profile_photo_path }}" alt="{{$rev->user->name}}">
                            @else
                                <img class="img-circle img-bordered-sm" src="storage/user.jfif" alt="user image">
                            @endif
                            <span class="username">

                                 @if (Route::has('login'))

                                    @auth
                                        @foreach($roles as $role)
                                            @if($role->name === "Administrator")

                                                <form style="float: right" action="{{ route('user.review.delete', $rev->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                <input type="submit" name="_method" value="Delete" class="btn btn-danger">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                                            @endif
                                        @endforeach
                                    @endauth
                                    @endif






                                <a href="#">{{$rev->user->name}}</a>


                            </span>



                            <span class="description">Shared publicly - {{$rev->created_at->format('l, jS \of F Y h:i:s A')}}</span>
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

                        <form action="{{route('user.review.store', $products->id)}}" method="post">
                            @csrf
                            <textarea class="form-control form-control-sm" type="text" name="text" placeholder="Type a Review.." cols="5" rows="5" autofocus autocomplete="text" autocapitalize="text" required></textarea>

                            <input type="submit" value="submit" class="btn btn-success mt-2">
                            <!-- /.post -->
                        </form>

                        <div class="d-flex justify-content-center">
                            {!! $reviews->links() !!}
                        </div>




                    </div>

            </div>

        </section>

        <!-- Content Header (Page header) -->

    </div>
</div>




<!-- Bootstrap -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="admin/plugins/raphael/raphael.min.js"></script>
<script src="admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard2.js"></script>
@include('user.partials.footer')
