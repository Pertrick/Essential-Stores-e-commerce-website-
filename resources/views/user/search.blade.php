
@include('user.partials.header')
<!-- Page Content -->
<div class="banner header-text">
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="products.blade.php">view all products <i class="fa fa-angle-right"></i></a>

                        <!--search bar -->

                        <div>
                            <input type="search" placeholder="search..." id="search" name="search" class="border-0 text-xs focus:outline-none p-2 " required>
                            <button type="submit" class="btn btn-outline-danger border-0 "><i class="fas fa-search" ></i> </button>
                        </div>

                        </form>
                    </div>
                </div>


                <div style="text-align: center; color:red;">No Product to display</div>


            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->
<!-- Banner Ends Here -->



<script type="text/javascript">
    $('#search').on('keyup', function (){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url : '{{route('user.searchs')}}',
            data: {'search': $value},
            success:function(data){
                $('div.col-md-4').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {'csrftoken' : '{{csrf_token() }}'}
    });
</script>



@include('user.partials.footer')


