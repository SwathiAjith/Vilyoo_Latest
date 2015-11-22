    
(function($) {
    /** jQuery Document Ready */
    $(document).ready(function(){
 
        $( '#contact-seller-pop' ).submit( function( e ) { 
            /** Prevent Default Behaviour */
            e.preventDefault();

            /** Get Post ID */
            var seller_id = $( '#contact-authorID' ).val(),
                name = $('#v_fullname').val(),
                phone = $('#v_phone').val(),
                email = $('#v_email').val(),
                message = $('#v_message').val(),
                page_url = $('#contact-url').val();

            /** Ajax Call */
            $.ajax({
                cache: false,
                timeout: 8000,
                url: contact_seller_array.admin_ajax,
                type: "POST",
                data: ({ 
                    action:'vilyoo_contact_seller',
                    seller_id:seller_id,
                    name:name,
                    phone:phone,
                    email:email,
                    message:message,
                    page_url:page_url
                }),
 
                beforeSend: function() {                    
                    $( '#pop-form-header' ).addClass('alert alert-info mb-15').html( 'Sending message to seller!' );
                },
 
                success: function( data, textStatus, jqXHR ){
                    $( '#pop-form-header' ).removeClass('alert-info').addClass('alert-success').html( 'Message successfully sent!' ); 
                },

                error: function( jqXHR, textStatus, errorThrown ){
                    console.log( 'The following error occured: ' + textStatus, errorThrown );  
                    $( '#pop-form-header' ).removeClass('alert-info').addClass('alert-danger').html( 'Oops, Something went wrong. Try again!' ); 
                }
 
            });
        });
 
    });
 
})(jQuery);