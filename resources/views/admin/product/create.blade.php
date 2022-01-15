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
                    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" :value="old('name')" required autofocus autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter Product description" :value="old('description')" required autofocus autocomplete="description">
                            </div>

                            <div class="form-group">
                                <label for="old_price">Old Price</label>
                                <input type="text" class="form-control" id="old_price" name="old_price" placeholder="Enter Product Old Price" :value="old('old_price')" required autofocus autocomplete="old_price">
                            </div>


                            <div class="form-group">
                                <label for="new_price">New Price</label>
                                <input type="text" class="form-control" id="new_price" name="new_price" placeholder="Enter Product New Price" :value="old('new price')" required autofocus autocomplete="new_price">
                            </div>

                            <div class="form-group">
                                <label for="description">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" min="0" :value="old('quantity')" required autofocus autocomplete="quantity">
                            </div>

                            <div class="col-sm-6">
                                <!-- Select multiple-->
                                <div class="form-group">
                                    <label>Select Category (Multiple)</label>
                                    <select multiple class="form-control" name="category_id[]" multiple="multiple">
                                        @foreach($categories as $category)
                                        <option value="{{$category->name }}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <input type="file" name="image">


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
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
