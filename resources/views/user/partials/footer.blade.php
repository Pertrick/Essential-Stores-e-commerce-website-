
<script type="text/javascript">


    $(document).ready(function (){

    $('.detail-btn').click(function (){
        const id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
            url: 'product-modal/'+id,
            type: 'GET',
            data: {
                "id" : id,
            },
            success:function (data){
                console.log(data);
                $('.detail').click(function (){
                    $.ajax({
                        type: 'GET',
                        url : 'add-to-cart/'+data.id,

                    });
                });
                $('#product-id').append(data.id);
                $('#product-name').html(data.name);
                $('#product-desc').html(data.description);
                $('#product-old_price').html('&#8358;'+ data.old_price);
                $('#product-new_price').html('&#8358;'+data.new_price);
                $('#product-image').html('<img src="storage/uploads/'+data.image+ '" width=250 height=250 >');

            }
        });
    });

    });
</script>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright &copy; <?= Date('Y') ?> Essentials Stores Co., Ltd.</p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="template/vendor/jquery/jquery.min.js"></script>
<script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="template/assets/js/custom.js"></script>
<script src="template/assets/js/owl.js"></script>
<script src="template/assets/js/slick.js"></script>
<script src="template/assets/js/isotope.js"></script>
<script src="template/assets/js/accordions.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>


</body>

</html>
