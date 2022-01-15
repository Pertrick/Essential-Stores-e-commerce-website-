@include('user.partials.header')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="container p-4">
        <table id="cart" class="table table-hover table-condensed ">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="storage/uploads/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <p class="f">{{ $details['name'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">&#8358;{{number_format( $details['price']) }}</td>
                        <td data-th="Quantity">
                            <input type="number" min="1" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">&#8358;{{number_format ($details['price'] * $details['quantity'] )}}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><p><strong>Cart Total: <span style="font-weight: 700 !important; font-size: large;">&#8358;{{number_format($total)}}</span></strong></span></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    @if(Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

                        @else
                            <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

                        @endauth
                    @endif
                     <a href="{{route('user.payment.show')}}" class="btn btn-success">Checkout</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

</div>
<!-- Banner Ends Here -->



    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('user.updateCart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('user.removeFromCart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>


    @include('user.partials.footer')
