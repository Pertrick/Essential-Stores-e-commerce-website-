@include('admin.partials.header')

@include('admin.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="p-4">
        @if(session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>
                <div style="text-align: center">{{session()->get('message') }}</div>
            </div>
        @endif
    </div>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                            <a href="{{Route('admin.product.create')}}" class="btn btn-success float-right"><i class="fas fa-plus "></i> Create New Product</a>
                        </div>




                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Sn.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Old Price</th>
                                    <th>New Price</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(count($products) > 0)
                                @foreach($products as $product)
                                <tr>

                                    <td>{{$sn++}}.</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>${{$product->old_price}}</td>
                                    <td>${{$product->new_price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td><img src="/storage/uploads/{{$product->image}}" height="100" width="100" alt="{{$product->name}}"></td>


                                    <td>
                                        @foreach($product->category as $prodcat)
                                            @if(count($product->category) >1)
                                             {{$prodcat->name}},
                                            @else
                                                {{$prodcat->name }}
                                            @endif
                                        @endforeach
                                    </td>


                                        <td><a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-success">Edit</a>

                                            <a href="{{route('admin.product.show', $product->id)}}" class="btn btn-info">View</a>

                                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                                <input type="submit" name="_method" value="Delete" class="btn btn-danger">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                </tr>

                                @endforeach
                                @else
                                <tr><td colspan="9" style="text-align: center">No Product to display</td></tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->








@include('admin.partials.footer')
