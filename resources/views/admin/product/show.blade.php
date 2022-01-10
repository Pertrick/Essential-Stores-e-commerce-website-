<base href="/">
@include('admin.partials.header')

@include('admin.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4 px-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">

                            <img class="img-fluid " style="margin: 15px auto; height: 200px; width: 300px"
                                 src="/storage/uploads/{{$product->image}}"
                                 alt="{{$product->name}}">
                        </div>



                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                Name <p class="float-right"><b>{{$product->name}}</b></p>
                            </li>
                            <li class="list-group-item">
                                Description <p class="float-right"><b>{{$product->description}}</b></p>
                            </li>
                            <li class="list-group-item">
                                Old Price <p class="float-right"><b>{{$product->old_price}}</b></p>
                            </li>

                            <li class="list-group-item">
                                New Price <p class="float-right"><b>{{$product->new_price}}</b></p>
                            </li>

                            <li class="list-group-item">
                                Quantity <p class="float-right"><b>{{$product->quantity}}</b></p>
                            </li>

                            <li class="list-group-item">Category
                            @foreach($product->category as$prodcat)

                                    <p class="float-right"><b>{{$prodcat->name}}, </b></p>

                                @endforeach
                            </li>
                        </ul>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
        </div>
    </div>
</section>
</div>





@include('admin.partials.footer')
