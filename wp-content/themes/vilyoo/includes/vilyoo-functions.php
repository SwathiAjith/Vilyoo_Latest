<?php

$sidebars = array(
    array( 'name' => __( 'General Sidebar', 'dokan' ), 'id' => 'sidebar-1' ),
    array( 'name' => __( 'Home Sidebar', 'dokan' ), 'id' => 'sidebar-home' ),
    array( 'name' => __( 'Blog Sidebar', 'dokan' ), 'id' => 'sidebar-blog' ),
    array( 'name' => __( 'Header Sidebar', 'dokan' ), 'id' => 'sidebar-header' ),
    array( 'name' => __( 'Shop Archive', 'dokan' ), 'id' => 'sidebar-shop' ),
    array( 'name' => __( 'Seller Sidebar', 'dokan' ), 'id' => 'sidebar-seller' ),
    array( 'name' => __( 'My Account Sidebar', 'dokan' ), 'id' => 'sidebar-my-account' ),
    array( 'name' => __( 'Single Product', 'dokan' ), 'id' => 'sidebar-single-product' )
);

foreach ($sidebars as $sidebar) {
    register_sidebar( array(
        'name' => $sidebar['name'],
        'id' => $sidebar['id'],
        'before_widget' => '<aside id="%1$s" class="white-bg shadow-it col-xs-12 widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

$footer_widgets = array(
    array( 'name' => __( 'Footer Sidebar - 1', 'dokan' ), 'id' => 'footer-1' ),
    array( 'name' => __( 'Footer Sidebar - 2', 'dokan' ), 'id' => 'footer-2' ),
    array( 'name' => __( 'Footer Sidebar - 3', 'dokan' ), 'id' => 'footer-3' ),
    array( 'name' => __( 'Footer Sidebar - 4', 'dokan' ), 'id' => 'footer-4' )
);

foreach ($footer_widgets as $footer_widget) {
    register_sidebar( array(
        'name' => $footer_widget['name'],
        'id' => $footer_widget['id'],
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

function wd_mandrill_woo_order( $message ) {
    if ( in_array( 'wp_WC_Email->send', $message['tags']['automatic'] ) ) {
        $message['html'] = $message['html'];
    } else {
        $message['html'] = nl2br( $message['html'] );
    }

    return $message;
}
add_filter( 'mandrill_payload', 'wd_mandrill_woo_order' );

function addBootstrapToCheckoutFields( $fields ) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            // $field['class'][] = 'form-group'; 

            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );

function vilyoo_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="'. home_url( "/" ) .'">
						<label>
							<span class="screen-reader-text">'. _x( "Search for:", "label" ) .'</span>
							<input type="search" class="search-field" placeholder="'. esc_attr_x( "Search …", "placeholder" ) .'" value="'. get_search_query() .'" name="s" title="'. esc_attr_x( "Search for:", "label" ) .'" />
						</label>
						<input type="hidden" value="product" name="post_type" id="post_type" />
						<input type="submit" class="search-submit" value="'. esc_attr_x( "Search", "submit button" ) .'" />
					</form>';
}
add_filter( 'get_search_form', 'vilyoo_search_form' );

function vilyoo_featured_sellers( $limit ) {

	// Get all of the sellers using in-built dokan class with a limit passed during function usage.
	$sellers = dokan_get_feature_sellers( $limit );

	if ( $sellers ) {

        foreach ($sellers as $key => $seller) {
            $store_info = dokan_get_store_info( $seller->ID );
            $rating = dokan_get_seller_rating( $seller->ID );
            $display_rating = $rating['rating'];

            if ( ! $rating['count'] ) {
                $display_rating = __( 'No ratings found yet!', 'dokan' );
            }
            ?>
            <li>
                <a href="<?php echo dokan_get_store_url( $seller->ID ); ?>">
                    <?php echo esc_html( $store_info['store_name'] ); ?>
                </a><br />
                <i class='fa fa-star'></i>
                <?php echo $display_rating; ?>
            </li>

            <?php
        }
    }
}

function vilyoo_most_sales_shop() {
    $sellers_count = dokan_get_seller_count();
    $sellers = dokan_get_sellers( $sellers_count );
    foreach ( $sellers as $key => $seller ) {
        $seller_id = $seller->ID;
        return $seller_id;
    }
    // dokan_author_total_sales
    
}

/**
 * Get NGO Shop list
 *
 * @param  integer $limit
 * @return array
 */
function vilyoo_get_ngo_sellers( ) {
    $args = array(
        'role'         => 'seller',
        'meta_key'     => 'vilyoo_ngo_shop',
        'meta_value'   => 'yes'
    );
    $users = get_users( $args );

    $args = array(
        'role'         => 'administrator',
        'meta_key'     => 'vilyoo_ngo_shop',
        'meta_value'   => 'yes'
    );
    $admins = get_users( $args );

    $sellers = array_merge( $admins, $users );
    return $sellers;
}


// Display NGO Shops using shortcode.
add_shortcode( 'list_ngo_shops', 'display_ngo_shops' );
function display_ngo_shops() {

    $ngo_shops = vilyoo_get_ngo_sellers();

    if ( $ngo_shops ) {
        foreach ( $ngo_shops as $key => $ngo_shop ) {
            $store_info = dokan_get_store_info( $ngo_shop->ID );
            $rating = dokan_get_seller_rating( $ngo_shop->ID );
            $display_rating = $rating['rating'];
            $store_url = dokan_get_store_url( $ngo_shop->ID );
            $store_name = $store_info['store_name'];

            echo '<div class="col-md-4"><div class="white-bg shadow-it col-md-12 pad-left pad-right">';
            echo '<div class="col-xs-3 text-center">'. get_avatar( $ngo_shop->ID ) .'<br></div>';
            echo '<div class="col-xs-9">
                        <h4><a class="seller-name" href="'. $store_url .'">'. esc_html( $store_name ) .'</a></h4>
                        <div class="star-rating">
                            <h5>Rating : '. $display_rating .' <i class="fa fa-star"></i></h5>
                        </div>
                    </div>';

            echo '</div></div>';
        }
    }
    else {
        echo "<h4>No NGO Shops</h4>";
    }
}

// Related posts output number filter
add_filter( 'woocommerce_output_related_products_args', function( $args ) { 
    $args = wp_parse_args( array( 'posts_per_page' => 5, 'columns' => 5 ), $args );
    return $args;
});

add_action( 'woocommerce_before_my_account', 'my_account_seller_dashboard_link' );
function my_account_seller_dashboard_link() {
    $user_id = get_current_user_id();
    if ( dokan_is_user_seller( $user_id ) ) {
        echo '<p><a href="'. home_url("/dashboard") .'" class="btn btn-seller-dash">Seller Dashboard</a></p>';
    }
    else {}
}
    
/** 
* Contact Seller Ajax
*/
// Register scripts
add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );
function theme_register_scripts() {
 
  /** Register JavaScript Functions File */
  wp_register_script( 'contact-seller', esc_url( trailingslashit( get_template_directory_uri() ) . 'includes/js/contact-seller.js' ), array( 'jquery' ), '1.0', true );
 
  /** Localize Scripts */
  $contact_seller_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
  wp_localize_script( 'contact-seller', 'contact_seller_array', $contact_seller_array );
 
}
 
/** Enqueue Scripts. */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
 
  /** Enqueue JavaScript Functions File */
  wp_enqueue_script( 'contact-seller' );
 
}

/** Ajax Post */
add_action( 'wp_ajax_vilyoo_contact_seller', 'vilyoo_contact_seller_init' );
add_action( 'wp_ajax_nopriv_vilyoo_contact_seller', 'vilyoo_contact_seller_init' );
function vilyoo_contact_seller_init() {
    $v_seller_id = $_POST['seller_id'];
    $v_seller = get_user_by( 'id', (int) $v_seller_id );
    if ( !$v_seller ) {
        $message = "Oops, Something went wrong. Try again!";
        wp_send_json_error( $message );
    }
    $v_name = trim( strip_tags( $_POST['name'] ) );
    $v_phone = trim( strip_tags( $_POST['phone'] ) );
    $v_email = trim( strip_tags( $_POST['email'] ) );
    $v_message = $_POST['message'];
    $multiple_recipients = array();
    array_push($multiple_recipients,$multiple_recipients);
    array_push($multiple_recipients,'sales@vilyoo.com');
    $content_to_send = "<b>From : </b>" . $v_name ."<br>";
    $content_to_send .= "<b>Email : </b>". $v_email ."<br>";
    $content_to_send .= "<b>Phone : </b>". $v_phone ."<br>";
    $content_to_send .= "<b>Message: </b>". $v_message ."<br>";
    $content_to_send .= "<br><b>From Page: </b>". $_POST['page_url'];
    wp_mail( $multiple_recipients, '[Vilyoo.com] New message from '.$v_name, $content_to_send );
    $message = "Message successfully sent!";
    wp_send_json_success( $message );
    die();
}

/* Submit Product Customization request */
add_action( 'wp_ajax_vilyoo_request_product_customization', 'vilyoo_request_product_customization_init' );
add_action( 'wp_ajax_nopriv_vilyoo_request_product_customization', 'vilyoo_request_product_customization_init' );
function vilyoo_request_product_customization_init() {

    parse_str( $_POST['data'], $posted );
    // die( print_r($posted));

    $mainProd   = $posted['prodMainCat'];
    $subProd    = $posted['prodSubCat'];
    $email      = $posted['userEmail'];

    $content_to_send  = "<b><center>New Product Customization Request</center></b><br>";
    $content_to_send .= "<b>Email : </b>". $email ."<br>";

    if( $posted['material'] ) {
        $materials  = $posted['material'];
        $content_to_send .= "<b>Materials to be used : <br>";
        foreach ( $materials as $key => $material ) {
            $content_to_send .= $material .", ";
        }
    }
    $length     = $posted['length'];
    $width      = $posted['width'];
    $height     = $posted['height'];
    $content_to_send .= "<br><b>Dimensions : </b> Length x Width x Height : ". $length ." x " . $width ." x " . $height . "<br>";

    $budget     = $posted['budget'];

    $content_to_send .= "<b>Available Budget : </b>". $budget ."<br>";

    if( $posted['image'] ) {
        $images      = $posted['image']; // Multiple values
        $content_to_send .= "<b>Image for Reference : </b>";
        foreach ( $images as $key => $image ) {
            $content_to_send .= $image ."<br>";
        }
    }
    $desc       = $posted['reqDesciption'];

    $content_to_send .= "<b>Customization Description : </b>". $desc ."<br>";

    $delivery   = $posted['deliveryLocation'];

    $content_to_send .= "<b>Delivery Location : </b>". $delivery ."<br>";

    $toSend = array( get_option( 'admin_email' ) );
    
    if( $posted['prefShop'] ) {
        $prefShop   = $posted['prefShop']; // Multiple values
        
        foreach ( $prefShop as $key => $shopId ) {
            $sellerInfo = get_user_by( 'id', (int) $shopId );
            array_push( $toSend, $sellerInfo->user_email );
        }
    }
    foreach( $toSend as $key => $recepient ) {
        if( wp_mail( $recepient, '[Vilyoo.com] New Customized Product Request', $content_to_send ) ) {
   
            $message = "Message successfully sent!";
            wp_send_json_success( $message );
            die();
        } else {
            $message = "Error sending message. Please try again!";
            wp_send_json_error( $message );
            die();
        }
    }
}

/**
 * Code goes in functions.php or a custom plugin.
 */
add_filter( 'woocommerce_states', 'indian_woocommerce_states' );

function indian_woocommerce_states( $states ) {

  $states['IN'] = array(
                'AP' => __('Andra Pradesh', 'woocommerce'),
                'AR' => __('Arunachal Pradesh', 'woocommerce'),
                'AS' => __('Assam', 'woocommerce'),
                'BR' => __('Bihar', 'woocommerce'),
                'CT' => __('Chhattisgarh', 'woocommerce'),
                'GA' => __('Goa', 'woocommerce'),
                'GJ' => __('Gujarat', 'woocommerce'),
                'HR' => __('Haryana', 'woocommerce'),
                'HP' => __('Himachal Pradesh', 'woocommerce'),
                'JK' => __('Jammu and Kashmir', 'woocommerce'),
                'JH' => __('Jharkhand', 'woocommerce'),
                'KA' => __('Karnataka', 'woocommerce'),
                'KL' => __('Kerala', 'woocommerce'),
                'MP' => __('Madhya Pradesh', 'woocommerce'),
                'MH' => __('Maharashtra', 'woocommerce'),
                'MN' => __('Manipur', 'woocommerce'),
                'ML' => __('Meghalaya', 'woocommerce'),
                'MZ' => __('Mizoram', 'woocommerce'),
                'NL' => __('Nagaland', 'woocommerce'),
                'OR' => __('Orissa', 'woocommerce'),
                'PB' => __('Punjab', 'woocommerce'),
                'RJ' => __('Rajasthan', 'woocommerce'),
                'SK' => __('Sikkim', 'woocommerce'),
                'TN' => __('Tamil Nadu', 'woocommerce'),
                'TR' => __('Tripura', 'woocommerce'),
                'UT' => __('Uttaranchal', 'woocommerce'),
                'UP' => __('Uttar Pradesh', 'woocommerce'),
                'WB' => __('West Bengal', 'woocommerce'),
                'AN' => __('Andaman and Nicobar Islands', 'woocommerce'),
                'CH' => __('Chandigarh', 'woocommerce'),
                'DN' => __('Dadar and Nagar Haveli', 'woocommerce'),
                'DD' => __('Daman and Diu', 'woocommerce'),
                'DL' => __('Delhi', 'woocommerce'),
                'LD' => __('Lakshadeep', 'woocommerce'),
                'PY' => __('Pondicherry (Puducherry)', 'woocommerce')
  );

  return $states;
}

// /**
//  * Redirect users to custom URL based on their role after login
//  *
//  * @param string $redirect
//  * @param object $user
//  * @return string
//  */
// function wc_custom_user_redirect( $redirect, $user ) {
//     // Get the first of all the roles assigned to the user
//     $role = $user->roles[0];
//     $dashboard = admin_url();
//     $myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
//     $seller_dash = home_url("/dashboard");

//     if( $role == 'administrator' ) {
//         //Redirect administrators to the dashboard
//         $redirect = $dashboard;
//     } elseif ( $role == 'shop-manager' ) {
//         //Redirect shop managers to the dashboard
//         $redirect = $dashboard;
//     } elseif ( $role == 'editor' ) {
//         //Redirect editors to the dashboard
//         $redirect = $dashboard;
//     } elseif ( $role == 'author' ) {
//         //Redirect authors to the dashboard
//         $redirect = $dashboard;
//     } elseif ( $role == 'customer' || $role == 'subscriber' ) {
//         //Redirect customers and subscribers to the "My Account" page
//         $redirect = $myaccount;
//     } elseif ( $role == 'seller' ) {
//         $redirect = $seller_dash;

//     } else {
//         //Redirect any other role to the previous visited page or, if not available, to the home
//         $redirect = wp_get_referer() ? wp_get_referer() : home_url();
//     }
//     return $redirect;
// }
// add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );
// 
function reregister_taxonomy_pro_tags() {
    # the post types that the taxonomy is registered to
    $post_types = array('product');
    # set this to the taxonomy name
    $tax_name = 'product_tag';
    # load the already created taxonomy as array so we can
    # pass it back in as $args to register_taxonomy
    $tax = (array)get_taxonomy($tax_name);

    if ($tax) {
        # adjust the hierarchical necessities
        $tax['hierarchical'] = true;
        $tax['rewrite']['hierarchical'] = true;

        # adjust the hierarchical niceties (these could be ignored)
        // $tax['labels']['parent_item'] = sprintf(__("Parent %s"), $tax->labels->singular_name );
        // $tax['labels']['parent_item_colon'] = sprintf(__("Parent %s:"), $tax->labels->singular_name);

        # cast caps to array as expected by register_taxonomy
        $tax['capabilities'] = (array)$tax['cap'];
        # cast labels to array
        $tax['labels'] = (array)$tax['labels'];
        # register the taxonomy with our new settings
        register_taxonomy($tax_name, array('product'), $tax);
    }
}
add_action('init', 'reregister_taxonomy_pro_tags', 9999);

function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {
    $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 1,
       'parent' => $parent_cat_ID,
       'taxonomy' => 'product_cat'
    );
    $subcats = get_categories($args);
    echo '<ul class="wooc_sclist">';
    foreach ($subcats as $sc) {
        $link = get_term_link( $sc->slug, $sc->taxonomy );
        echo '<li><a href="'. $link .'">'.$sc->name.'</a></li>';
    }
    echo '</ul>';
}

function woocommerce_tags_from_parent_by_ID($parent_tag_ID) {

    $args = array(
       'hierarchical' => 1,
       'hide_empty' => 1,
       'parent' => $parent_tag_ID
    );
    $subtags = get_terms( 'product_tag', $args );
    echo '<ul class="wooc_sclist">';
    foreach ($subtags as $st) {
        $link = get_term_link( $st->slug, $st->taxonomy );
        echo '<li><a href="'. $link .'">'.$st->name.'</a></li>';
    }
    echo '</ul>';
}

// Replace default "Add to Cart" text!
// add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
// add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text' );

// function woo_custom_cart_button_text() {
 
//     return __( 'Buy Now!', 'woocommerce' );
 
// }
// 

function add_js_for_customizable_product() {

    // This script will only be added to footer if the product on page is customizable

    global $post;

    $is_customizable = get_post_meta( $post->ID, 'is_this_product_customizable' );

    if( $is_customizable == "yes" ) {

    ?>

        <script type="text/javascript">
            jQuery( function($) {
                var currentProductId = <?php echo $post->ID; ?>;
                $( '#addCustomizationMessage' ).click( function(e) {
                    e.preventDefault();
                    console.log( 'Clicked');
                    $( '#personalizedNoteWrap' ).removeClass('hide')
                });
                $( '#savePersonalizationNote' ).click( function(e) {
                    e.preventDefault();
                    var productCustomNote = $( '#personalizedNoteData' ).val();
                    if( productCustomNote == '' || productCustomNote == undefined || productCustomNote.length < 10 ) {
                        $( '#personalizedNoteData').focus();
                    } else {
                        localStorage.setItem( currentProductId, productCustomNote )
                        $( '#personalizedNoteWrap' ).addClass('hide');
                        $( '#addCustomizationMessageNotif' ).removeClass( 'hide' ).addClass( 'alert' ).text( 'Personalization Message Saved.' );
                    }
                });
            });
        </script>
    <?php 
    }
}

function add_js_for_customisable_product_on_checkout() {

    if( is_woocommerce && is_checkout ) {
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $is_customizable = get_post_meta( $_product->id, 'is_this_product_customizable' );
            if( $is_customizable == "yes" ) {
                ?>

                <script type="text/javascript">
                    jQuery( function($) {
                        var customizableProdId = <?php echo $_product->id; ?>;
                        var customizableProdMsg = localStorage.getItem( customizableProdId );
                        $( '#order_comments' ).val( $( '#order_comments' ).val() + 'Customization Message for Product "<?php echo $_product->post->post_title; ?> : "' + customizableProdMsg + '\n');
                    });
                </script>

                <?php
            }
        }
    }

}

add_action( 'wp_footer', 'add_js_for_customizable_product', 99 );
add_action( 'wp_footer', 'add_js_for_customisable_product_on_checkout', 99 );

add_filter( 'woocommerce_currencies', 'vilyoo_add_indian_currency' );
add_filter( 'woocommerce_currency_symbol', 'vilyoo_add_indian_currency_symbol' );

function vilyoo_add_indian_currency( $currencies ) {
    $currencies['INR'] = 'INR';
    return $currencies;
}

function vilyoo_add_indian_currency_symbol( $symbol ) {
    $currency = get_option( 'woocommerce_currency' );
    switch( $currency ) {
        case 'INR': $symbol = '<i class="fa fa-rupee"></i>'; break;
    }
    return $symbol;
}


