@include('user.partials.header')

<!-- Page Content -->
<!-- Banner Starts Here -->
@php $total = 0 @endphp
@if(session('cart'))
    @foreach(session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
    @endforeach
@endif

<div class=" container banner header-text" >
    <div class="register-box">
        <div class=" card mt-5 ">
        <div class="card-body register-card-body">
            <h2 class="login-box-msg font-weight-bold">Make Payment</h2>

            <form id="paymentForm">
                <div class="input-group mb-3 p-1">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                    <input type="text" id="first-name" class="form-control" placeholder="Full name" value="{{auth()->user()->name}}" required>
                    <div class="input-group-append">

                    </div>
                </div>
                <div class="input-group mb-3 p-1">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                    <input type="email" id="email" class="form-control" placeholder="Email" value="{{auth()->user()->email}}" required>
                    <div class="input-group-append">

                    </div>
                </div>
                <div class="input-group mb-3 p-1">
                    <div class="input-group-text">
                    <span class="">&#8358;</span>
                    </div>
                    <input type="text" id="amount" class="form-control" placeholder="Enter Amount in Naira" value="{{number_format($total)}}" required>
                    <div class="input-group-append">

                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div style="width: 40%; margin: 0 auto;">
                        <button type="submit" class="btn btn-primary btn-block" onclick="payWithPaystack(event)">Pay</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        </div>
    </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
<!-- /.register-box -->
</div>
<!-- Banner Ends Here -->

    <script type="text/javascript">
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_e9ac4daa64df7d6d4041f62d3deaa88b243d3aaa', // Replace with your public key
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let reference =  response.reference;

                    $.ajax({
                        url : 'verify-payment/'+reference,
                        type:'GET',
                        success: function (response){
                            console.log(response);
                            if(response[0].status == true)
                            { $('#paymentForm').prepend(
                                `<h1 style="color: green; margin: 2px;"><strong>${response[0].message}</strong></h1>`
                            );
                                window.location.href ='confirm';
                            }else{
                                $('#paymentForm').prepend(
                                    `<h2>Failed to verify Payment</h2>`
                                );
                            }
                        }


                    });
                    alert(message);
                }
            });
            handler.openIframe();
        }
    </script>



<script src="https://js.paystack.co/v1/inline.js"></script>
@include('user.partials.footer')
