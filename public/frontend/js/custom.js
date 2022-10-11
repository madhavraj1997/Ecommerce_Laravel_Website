
$(document).ready(function () {
    loadCart();
    loadWishlist();
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        
        var inc_val = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_val,10);

        value = isNaN(value) ? 0 : value;
        if(value<10)
        {
            value++;
            
            $(this).closest('.product_data').find('.qty-input').val(value);

        }

    });

    $('.decrement-btn').click(function (e){
        e.preventDefault();

   
        var dec_val = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_val,10);
        value = isNaN(value) ? 0 : value;
        if(value>1)
        {
            value--;
           
            $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });



    $('.addToCartBtn').click(function(e) {
        e.preventDefault();
        
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,

            },
           
            success: function(response) {
                swal(response.status);
                loadCart();

            }

        });

    });
    $('.addToWishlist').click(function (e) { 
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
                

            },
           
            success: function(response) {
                swal(response.status);
                loadWishlist();

            }

        });
        
    });

    $('.delete-cart-item').click(function (e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            method: "POST",
            url:"delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            success: function(response){
                window.location.reload();
                swal("",response.status, "success");
                
            }
        });

    });

    $('.remove-wishlist-item').click(function (e) { 
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            method: "POST",
            url:"remove-wishlist-item",
            data: {
                'prod_id':prod_id,
            },
            success: function(response){
                window.location.reload();
                swal("",response.status, "success");
                
            }
        });
        
    });

    $('.changeQuantity').click(function (e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        data = {
            'prod_id':prod_id,
            'prod_qty': qty,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });


        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function(response){
                window.location.reload();   
               

            }
        });

    });

    function loadCart()
    {
        $.ajax({
            type: "get",
            url: "/load-cart-item",
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                
                
                
            }
        });
    }

    function loadWishlist()
    {
        $.ajax({
            type: "get",
            url: "/load-wishlist",
            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
                
                
                
            }
        });
    }
    



});
