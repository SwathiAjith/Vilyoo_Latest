jQuery( document ).ready( function( $ ) {

    $( 'input.search-field' ).addClass( 'form-control' );
    $('#_sku').attr('readonly', true);
    // here for each comment reply link of wordpress
    $( '.comment-reply-link' ).addClass( 'btn btn-primary' );

    // here for the submit button of the comment reply form
    $( '#commentsubmit' ).addClass( 'btn btn-primary' );
    $("#update_product").click(function(){
        
         var productId = getParameterByName('product_id');
         if(productId){
           
            $('#_sku').val("PROD"+productId);
         }
    });
    // The WordPress Default Widgets
    // Now we'll add some classes for the wordpress default widgets - let's go

    // the search widget
    $( 'input.search-field' ).addClass( 'form-control' );
    $( 'input.search-submit' ).addClass( 'btn btn-default' );

    $( '.widget_rss ul' ).addClass( 'media-list' );

    $( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul' ).addClass( 'nav' );

    $( '.widget_recent_comments ul#recentcomments' ).css( 'list-style', 'none').css( 'padding-left', '0' );
    $( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px');

    $( 'table#wp-calendar' ).addClass( 'table table-striped');

    $( '#masthead' ).affix({
        offset: 100
    });

    // Make all the add to cart button bootstrap combatible and our custom red button class
    $( '.add_to_cart_button' ).addClass( 'btn btn-cart' );

    /*
    "Hovernav" navbar dropdown on hover
    Uses jQuery Media Query - see http://www.sitepoint.com/javascript-media-queries/
    */
    var mq = window.matchMedia('(min-width: 768px)');
    if (mq.matches) {
        $('ul.navbar-nav > li').addClass('hovernav');
    } else {
        $('ul.navbar-nav > li').removeClass('hovernav');
    };
    /*
    The addClass/removeClass also needs to be triggered
    on page resize <=> 768px
    */
    if (matchMedia) {
        var mq = window.matchMedia('(min-width: 768px)');
        mq.addListener(WidthChange);
        WidthChange(mq);
    }
    function WidthChange(mq) {
        if (mq.matches) {
            $('ul.navbar-nav > li').addClass('hovernav');
            // Restore "clickable parent links" in navbar
            $('.hovernav a').click(function () {
                window.location = this.href;
            });
        } else {
            $('ul.navbar-nav > li').removeClass('hovernav');
        }
    };
    // Restore "clickable parent links" in navbar
    $('.hovernav a').click(function () {
        window.location = this.href;
    });

    $( window ).load( function() {

        // Set height for homepage featured seller widgets
        var featuredBoxHeight = $( '#home-featured-seller-left' ).outerHeight();
        // featuredBoxHeight = featuredBoxHeight - 14;
        $( '#home-seller-info' ).height( featuredBoxHeight );

        // Equal Heights.
        $('ul.products').each(function(){  

            var highestBox = 0;
            $('li.product', this).each(function(){

                if($(this).height() > highestBox) 
                   highestBox = $(this).height(); 
            });  

            $('li.product',this).height(highestBox + 40);

        });


        $('.dokan-seller-wrap').each(function(){  

            var highestBox = 0;
            $('.dokan-single-seller', this).each(function(){

                if($(this).height() > highestBox) 
                   highestBox = $(this).height(); 
            });  

            $('.dokan-single-seller',this).height(highestBox + 40);

        });

    });

    //Global Tooltip Init
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // Product plus and minus
    $('.plus').on('click',function(e){

        var val = parseInt($(this).prev('input').val());

        $(this).prev('input').val( val+1 );


        });
        $('.minus').on('click',function(e){

        var val = parseInt($(this).next('input').val());
        if(val !== 0){
            $(this).next('input').val( val-1 );
        }
    });
	
	//Product Customize

	$( '#customize-mainproduct-select .btn-radio' ).click(function(e) {
		$('#customize-mainproduct-select .btn-radio').not(this).removeClass('active')
			.siblings('input').prop('checked',false)
			.siblings('.img-radio').css('opacity','0.5')
            .parent('.col-md-2').removeClass('selProduct');
		$(this).addClass('active')
			.siblings('input').prop('checked',true)
			.siblings('.img-radio').css('opacity','1')
            .parent('.col-md-2').addClass('selProduct');

        showSubCat( this.id );
	});
    $( '#prod-sub-cat-select .btn-radio' ).click(function(e) {
        $( '#customize-submit' ).removeClass( 'disabled' );
        $( '.prod-bottom-part-2' ).slideDown();
        $('#prod-sub-cat-select .btn-radio').not(this).removeClass('active')
            .siblings('input').prop('checked',false)
            .siblings('.img-radio').css('opacity','0.5')
            .parent('.col-md-2').removeClass('selProduct');
        $(this).addClass('active')
            .siblings('input').prop('checked',true)
            .siblings('.img-radio').css('opacity','1')
            .parent('.col-md-2').addClass('selProduct');
    });
    function showSubCat( id ) {
        var subCat = "#prod-sub-cat-select #subCat" + id;
        $( '.prod-bottom-part' ).slideDown();
        $( subCat ).show();
        $( '.subCat-sel' ).not( subCat ).hide();
    }

    /** Added for getting query string */
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    imgArray = [];

    $( '#confirmFilesUploaded' ).click( function(e) {
        e.preventDefault();
        imgAdd = '';
        $('#uploadedImgWrapper tbody.files').children().each(function(){
            // Get all `img` elements that are in this cell
            var img = $(this).find("span.preview a");

            var imgHref = img.attr('href');

            imgAdd += '<img src="' + imgHref + '" width="100" style="margin-right:5px;">'
            
            imgArray.push( imgHref );

        });
        $("#fileUploadModal").modal('hide');
        $( '#imgContentsCustom' ).html( imgAdd );
    });

    $( '#customize-form' ).submit( function(e) {
        e.preventDefault();
        var cusFormData = $( '#customize-form' ).serialize();
        if( imgArray ){
            imgArray.forEach( function( img ) {
                cusFormData += "&image[]=" + encodeURIComponent( img );
            });
        }
        
        console.log( cusFormData );
        // alert( $('#refImg').val() );
        var submitCustomize = $.ajax({
            cache: false,
            timeout: 8000,
            method: "POST",
            url: contact_seller_array.admin_ajax,
            data: ({ 
                action:'vilyoo_request_product_customization',
                data: cusFormData
            }),
            beforeSend: function() {
                // setting a timeout
                $( '#cusFormSubmitResponse' ).html( '<div class="alert alert-info">Sending the Information!</div>' );
            },
            success: function(data) {
                $( '#cusFormSubmitResponse' ).html( '<div class="alert alert-success">' + data.data + '</div>' );
            },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");
                $( '#cusFormSubmitResponse' ).html( '<div class="alert alert-danger">' + xhr.statusText + xhr.responseText + '</div>' );
            }
        });
    });
});