<base href="/">
@include('admin.partials.header')

@include('admin.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid ">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 mt-4 px-4">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title ">Create Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" value="{{$product->name}}" required autofocus autocomplete="name">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Product description" value="{{$product->description}}" required autofocus autocomplete="description">
                                </div>

                                <div class="form-group">
                                    <label for="Old price">Price</label>
                                    <input type="text" class="form-control" id="old_price" name="old_price" placeholder="Enter Product Old Price" value="{{$product->old_price}}" required autofocus autocomplete="old_price">
                                </div>

                                <div class="form-group">
                                    <label for="New price">Price</label>
                                    <input type="text" class="form-control" id="new_price" name="new_price" placeholder="Enter Product New Price" value="{{$product->new_price}}" required autofocus autocomplete="new_price">
                                </div>

                                <div class="form-group">
                                    <label for="description">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" min="0" value="{{$product->quantity}}" required autofocus autocomplete="quantity">
                                </div>


                                <div class="col-sm-6">
                                    <!-- Select multiple-->
                                    <div class="form-group">
                                        <label>Select Category (Multiple) </label>
                                        <select multiple class="form-control" name="category_id[]" multiple="multiple">


                                            @foreach($categories as $category)
                                                @if(in_array($category->id, $product->category->pluck('id')->toArray()))

                                                <option value="{{$category->name }} "selected >{{$category->name}}</option>

                                                @else
                                                    <option value="{{$category->name }}">{{$category->name}}</option>
                                                @endif

                                                    @endforeach


                                        </select>
                                    </div>
                                </div>





                                <input type="file" name="image">


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="submit" value="Submit" class="btn btn-outline-success">
                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    </section>
</div>





@include('admin.partials.footer')
