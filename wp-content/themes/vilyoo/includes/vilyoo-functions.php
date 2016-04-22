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
 * This code should be added to functions.php of your theme
 **/
add_filter('woocommerce_default_catalog_orderby', 'custom_default_catalog_orderby');

function custom_default_catalog_orderby() {
     return 'date'; // Can also use title and price
}

/**
	 * Returns whether or not the product is in stock.
	 *
	 * @return bool
	 */
	function is_expired($product) {
		 $date = get_post_meta($product->id,'_date')[0];
		 if($date != "")
		 {
			 $date = strtotime($date);
			 if(time() > $date)
			 return true;
		 } 
	}
	
	/**
	 * Returns difference b/w two dates.
	 *
	 * @return integer
	 */
	function dateDiff($start, $end)
	{
		$start_ts = strtotime($start);
		$end_ts   = strtotime($end);
		$diff     = $end_ts - $start_ts;
		return round($diff / 86400);
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
    array_push($multiple_recipients,$v_seller->user_email);
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

    $toSend = array();
    array_push( $toSend, 'sales@vilyoo.com' );
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
                'AP' => __('Andhra Pradesh', 'woocommerce'),
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
       'exclude' => '290',
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

    $is_customizable = get_post_meta( $post->ID, 'is_this_product_customizable' )[0];

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
            $is_customizable = get_post_meta( $_product->id, 'is_this_product_customizable' )[0];
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


  //Will effect both the woocommerce archive page and the wordpress archive page to display 48 items
/*function set_row_count_archive($query){
    if ($query->is_archive) {
            $query->set('posts_per_page', 20);
   }
    return $query;
}*/
 
//add_filter('pre_get_posts', 'set_row_count_archive');
add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

function custom_pre_get_posts_query( $q ) {

	if ( ! $q->is_main_query() ) return;
	//if ( ! $q->is_post_type_archive() ) return;

	if ( ! is_admin()) {

		$q->set( 'tax_query', array(array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => array( 'christmas' ), // Don't display products in the knives category on the shop page
			'operator' => 'NOT IN',
			//'include_children' => false
		)));

	}

	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

}
/* Exclude Category from Shop 
   
   Added by Swathi Ajith on 1/12/2016 */

function se_customize_product_shortcode( $args, $atts) {

    if ( ! is_admin() && $atts['category'] != "diy-kits,workshops") {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => array( 'christmas','diy-kits','workshops'),
                'operator' => 'NOT IN'
            )
       );
    }
 
    return $args;
}
add_filter( 'woocommerce_shortcode_products_query', 'se_customize_product_shortcode', 10, 2 );
 
// CUSTOM FIELD IN USER ADMIN - SAVE
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) { 
 
$product_commission = get_user_meta( $user->ID, 'dokan_product_commission', true );
$supply_commission = get_user_meta( $user->ID, 'dokan_supply_commission', true );
?>

    <h3>Commission</h3>

	<table class="form-table">

			<tr>
												   		<th>
												   		<?php _e( 'Product Commission', 'dokan' ); ?>
												   		</th>

												   		<td>
												   			<input type="number" name="dokan_product_commission" class="regular-text" placeholder="%" value="<?php echo esc_attr( $product_commission ); ?>"><p class="description"><?php _e( 'Product Commission(%)', 'dokan' ) ?></p>
												   		</td>
												   	</tr>
			<tr>
												   		<th>
												   		<?php _e( 'Supply Commission', 'dokan' ); ?>
												   		</th>

												   		<td>
												   			<input type="number" name="dokan_supply_commission" class="regular-text" placeholder="%" value="<?php echo esc_attr( $supply_commission ); ?>">
												   			<p class="description"><?php _e( 'Supply Commission(%)', 'dokan' ) ?></p>
												   		</td>
												   	</tr>

	</table>
<?php }  

// CUSTOM FIELD IN USER ADMIN
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        {return false;}
	$product_commission = sanitize_text_field( $_POST['dokan_product_commission'] );
	$supply_commission = sanitize_text_field( $_POST['dokan_supply_commission'] );
    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    update_user_meta( $user_id, 'dokan_product_commission', $product_commission );
    update_user_meta( $user_id, 'dokan_supply_commission', $supply_commission );
}

//Add columns to the CSV 
function wpg_add_columns($cols) {

	
    $cols['wc_settings_tab_sellername'] = __('Seller Name', 'mytheme');	
	$cols['wc_settings_tab_customeraddress'] = __('Customer Address', 'mytheme');
	$cols['wc_settings_tab_selleraddress'] = __('Seller Address', 'mytheme');
	$cols['wc_settings_tab_sellingprice'] = __('Selling Price', 'mytheme');
	return $cols;
}
add_filter('wpg_order_columns', 'wpg_add_columns');
// Add field to settings
function wpg_add_fields($settings) {

	$settings['sellingprice'] = array(
								'name' => __( 'Selling Price', 'woocommerce-simply-order-export' ),
								'type' => 'checkbox',
								'desc' => __( 'Selling Price', 'woocommerce-simply-order-export' ),
								'id'   => 'wc_settings_tab_sellingprice'
							);
	$settings['sellername'] = array(
								'name' => __( 'Seller Name', 'woocommerce-simply-order-export' ),
								'type' => 'checkbox',
								'desc' => __( 'Seller Name', 'woocommerce-simply-order-export' ),
								'id'   => 'wc_settings_tab_sellername'
							);
	$settings['customeraddress'] = array(
								'name' => __( 'Customer Address', 'woocommerce-simply-order-export' ),
								'type' => 'checkbox',
								'desc' => __( 'Customer Address', 'woocommerce-simply-order-export' ),
								'id'   => 'wc_settings_tab_customeraddress'
							);
	$settings['selleraddress'] = array(
								'name' => __( 'Seller Address', 'woocommerce-simply-order-export' ),
								'type' => 'checkbox',
								'desc' => __( 'Seller Address', 'woocommerce-simply-order-export' ),
								'id'   => 'wc_settings_tab_selleraddress'
							);

	return $settings;

}
 
add_filter('wc_settings_tab_order_export', 'wpg_add_fields');
//Calculate shipping price based on commission
function woocommerce_calculate_shipping($post_id)
{
	$seller_id      = get_current_user_id();
	$product_commission = get_user_meta( $seller_id , 'dokan_product_commission', true );
	$supply_commission = get_user_meta( $seller_id , 'dokan_supply_commission', true );
	$_regular_price  = $_POST['_regular_price'];
	$_sale_price     =$_POST['_sale_price'];
	$seller_price =  $_POST['seller_price_db']; 
	$workshop_type = get_post_meta($product->id,'_workshop_type')[0];
	$_weight         = stripslashes($_POST['_weight']);
	$_length         = stripslashes($_POST['_length']);
	$_width          = stripslashes ($_POST['_width']);
	$_height         = stripslashes($_POST['_height']);
	$workshop_type = get_post_meta($post_id,'workshop_type',true);
	if($post_id != ''){
		$newsku = "PROD".$post_id;
          update_post_meta( $post_id, '_sku', $newsku );
         if($seller_price !=""){
            $regularPrice = $seller_price;
         }else{
           $regularPrice = $_regular_price;
         }
         update_post_meta( $post_id, 'product_seller_price', $regularPrice );
        
         if($_weight != "" && $_length != "" && $_width != "" && $_height != ""){
            $volume = $_length*$_width*$_height;
            $volumetricMass = $volume/5000;
             
            if($volumetricMass > $_weight){
                $finalWeight = $volumetricMass/0.5;
            }else{
                $finalWeight= $_weight/0.5;
                
            }
            $finalWeight = ceil($finalWeight);
            }
             if($workshop_type == 1)
             {
			 	 //shipping rate iszero in case of workshop
			   $shippingcost = 0;
			 }
			 else
			 {
				 //shipping rate
	            $shippingrate = get_option('base_shipping_rate');
	            $shippingcost = $finalWeight*$shippingrate;
			 }
            
            
            
            //Surcharge rate 
            $surchargerate = get_option('surcharge_rate');
            $surchargeshipping = ($shippingcost*($surchargerate/100));
            update_post_meta( $post_id, 'surcharge_rate', $surchargeshipping );
            
            //Service Tax rate
            $servicetaxrate = get_option('service_tax');
            $serviceTax = ($shippingcost+$surchargeshipping)*($servicetaxrate/100);
            update_post_meta( $post_id, 'service_tax', $serviceTax );
            
            //Final shipping price
            $finalPriceShipping = $shippingcost+$surchargeshipping+$serviceTax; 
            update_post_meta( $post_id, 'product_shipping_cost', $finalPriceShipping );
            
            //Vilyoo Comission
            if($workshop_type == '1')
            {
				 $VilyooComission = ($regularPrice *($supply_commission/100));
			}
			else{
				 $VilyooComission = ($regularPrice *($product_commission/100));
			}
           
            update_post_meta( $post_id, 'vilyoo_commission', $VilyooComission );
            
            //Sales Tax
            $salestaxrate = get_option('sales_tax');
            $salesTax = ($regularPrice *($salestaxrate/100));
            update_post_meta( $post_id, 'sales_tax', $salesTax );
            
            //Final Price 
            $finalPrice = $regularPrice+$finalPriceShipping+$VilyooComission+$salesTax;    
            $finalPrice = floor($finalPrice);
            update_post_meta( $post_id, '_regular_price', $finalPrice ); 
}
	
}

 add_filter('dokan_process_product_meta', 'woocommerce_calculate_shipping');
 
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
 
 
// Save Fields using WooCommerce Action Hook
add_action( 'woocommerce_process_product_meta', 'woocommerce_process_product_meta_fields_save' );
 
function woocommerce_process_product_meta_fields_save( $post_id ){
    $seller_id = $_POST['post_author'];
    $product_commission = get_user_meta( $seller_id , 'dokan_product_commission', true );
	$supply_commission = get_user_meta( $seller_id , 'dokan_supply_commission', true );
	$_regular_price  = $_POST['_regular_price'];
	$_sale_price     =$_POST['_sale_price'];
	$seller_price =  $_POST['seller_price'];
	update_post_meta( $post_id, 'product_seller_price', $serviceTax ); 
	$workshop_type = get_post_meta($product->id,'_workshop_type')[0];
	$_weight         = stripslashes($_POST['_weight']);
	$_length         = stripslashes($_POST['_length']);
	$_width          = stripslashes ($_POST['_width']);
	$_height         = stripslashes($_POST['_height']);
	$workshop_type = get_post_meta($post_id,'workshop_type',true);
	if($post_id != ''){
        $newsku = "PROD".$post_id;
        update_post_meta( $post_id, '_newsku', $newsku );
         if($seller_price !=""){
            $regularPrice = $seller_price;
         }else{
           $regularPrice = $_regular_price;
         }
         update_post_meta( $post_id, 'product_seller_price', $regularPrice );
        
         if($_weight != "" && $_length != "" && $_width != "" && $_height != ""){
            $volume = $_length*$_width*$_height;
            $volumetricMass = $volume/5000;
             
            if($volumetricMass > $_weight){
                $finalWeight = $volumetricMass/0.5;
            }else{
                $finalWeight= $_weight/0.5;
                
            }
            $finalWeight = ceil($finalWeight);
            }
             if($workshop_type == 1)
             {
			 	 //shipping rate iszero in case of workshop
			   $shippingcost = 0;
			 }
			 else
			 {
				 //shipping rate
	            $shippingrate = get_option('base_shipping_rate');
	            $shippingcost = $finalWeight*$shippingrate;
			 }
            
            
            
            //Surcharge rate 
            $surchargerate = get_option('surcharge_rate');
            $surchargeshipping = ($shippingcost*($surchargerate/100));
            update_post_meta( $post_id, 'surcharge_rate', $surchargeshipping );
            
            //Service Tax rate
            $servicetaxrate = get_option('service_tax');
            $serviceTax = ($shippingcost+$surchargeshipping)*($servicetaxrate/100);
            update_post_meta( $post_id, 'service_tax', $serviceTax );
            
            //Final shipping price
            $finalPriceShipping = $shippingcost+$surchargeshipping+$serviceTax; 
            update_post_meta( $post_id, 'product_shipping_cost', $finalPriceShipping );
            
            //Vilyoo Comission
            if($workshop_type == '1')
            {
				 $VilyooComission = ($regularPrice *($supply_commission/100));
			}
			else{
				 $VilyooComission = ($regularPrice *($product_commission/100));
			}
           
            update_post_meta( $post_id, 'vilyoo_commission', $VilyooComission );
            
            //Sales Tax
            $salestaxrate = get_option('sales_tax');
            $salesTax = ($regularPrice *($salestaxrate/100));
            update_post_meta( $post_id, 'sales_tax', $salesTax );
            
            //Final Price 
            $finalPrice = $regularPrice+$finalPriceShipping+$VilyooComission+$salesTax;    
            $finalPrice = floor($finalPrice);
            update_post_meta( $post_id, '_regular_price', $finalPrice ); 
            update_post_meta( $post_id, 'vilyoo_price', $finalPrice ); 
}
    
}

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );
function woo_add_custom_general_fields() {

  global $woocommerce, $post;
  $seller_price = get_post_meta( $post->ID, 'product_seller_price', true );
  $vilyooprice =  get_post_meta( $post->ID, 'vilyoo_price', true );
  $shipping_price = get_post_meta( $post->ID, 'product_shipping_cost', true );
  $VilyooComission = get_post_meta( $post->ID, 'vilyoo_commission', true );
  $salesTax = get_post_meta( $post->ID, 'sales_tax', true );
  $finalshippingprice = get_post_meta( $post->ID, '_regular_price', true );
  //echo '<div class="options_group">';

  // Custom fields will be created here...

// Text Field
woocommerce_wp_text_input( 
    array( 
        'id'          => 'seller_price', 
        'label'       => __( 'Seller Price', 'woocommerce' ), 
        'placeholder' => '',
        'desc_tip'    => 'true',
        'description' => __( '', 'woocommerce' ),
        'value'       => $seller_price
    )
);
woocommerce_wp_text_input( 
    array( 
        'id'          => 'shipping_cost', 
        'label'       => __( 'Shipping Cost', 'woocommerce' ), 
        'placeholder' => '',
        'desc_tip'    => 'true',
        'description' => __( '', 'woocommerce' ),
        'value'       => $shipping_price
    )
);
woocommerce_wp_text_input( 
    array( 
        'id'          => 'vilyoo_comission', 
        'label'       => __( 'Vilyoo Commission', 'woocommerce' ), 
        'placeholder' => '',
        'desc_tip'    => 'true',
        'description' => __( '', 'woocommerce' ),
        'value'       => $VilyooComission
    )
);
woocommerce_wp_text_input( 
    array( 
        'id'          => 'sales_tax', 
        'label'       => __( 'Sales Tax', 'woocommerce' ), 
        'placeholder' => '',
        'desc_tip'    => 'true',
        'description' => __( '', 'woocommerce' ),
        'value'       => $salesTax
    )
);
woocommerce_wp_text_input( 
    array( 
        'id'          => 'vilyoo_price', 
        'label'       => __( 'Vilyoo Price', 'woocommerce' ), 
        'placeholder' => '',
        'desc_tip'    => 'true',
        'description' => __( '', 'woocommerce' ),
        'value'       => $vilyooprice
    )
);
 
}
/**
 * Create the section beneath the products tab
 **/
add_filter( 'woocommerce_get_sections_products', 'shipping_add_section' );
function shipping_add_section( $sections ) {
	
	$sections['wcslider'] = __( 'Vilyoo Shipping', 'text-domain' );
	return $sections;
	
}
/**
 * Add settings to the specific section we created before
 */
add_filter( 'woocommerce_get_settings_products', 'wcslider_all_settings', 10, 2 );
function wcslider_all_settings( $settings, $current_section ) {
	/**
	 * Check the current section is what we want
	 **/
	if ( $current_section == 'wcslider' ) {
		$settings_slider = array();
		// Add Title to the Settings
		$settings_slider[] = array( 'name' => __( 'Vilyoo Shipping Rates', 'text-domain' ), 'type' => 'title', 'desc' => __( 'The following options are used to configure Base Shipping Rate,Surcharge and Service Tax', 'text-domain' ), 'id' => 'wcslider' );
		 
		// Add text field option
		$settings_slider[] = array(
			'name'     => __( 'Base Shipping Rate', 'text-domain' ),
			'type'	   => 'number',
			'class'    => 'textfield',
			'desc_tip' => __( 'Base Shipping Rate', 'text-domain' ),
			'id'       => 'base_shipping_rate',
			'placeholder'     => '%',
			'desc'     => __( 'Base Shipping Rate(%)', 'text-domain' ),
		);
		$settings_slider[] = array(
			'name'     => __( 'Surcharge', 'text-domain' ),
			'type'	   => 'number',
			'class'    => 'textfield',
			'desc_tip' => __( 'Surcharge', 'text-domain' ),
			'id'       => 'surcharge_rate',
			'placeholder'     => '%',
			'desc'     => __( 'Surcharge(%)', 'text-domain' ),
		);
		$settings_slider[] = array(
			'name'     => __( 'Service Tax', 'text-domain' ),
			'type'	   => 'number',
			'class'    => 'textfield',
			'desc_tip' => __( 'Service Tax', 'text-domain' ),
			'id'       => 'service_tax',
			'placeholder'     => '%',
			'desc'     => __( 'Service Tax(%)', 'text-domain' ),
		);
		$settings_slider[] = array(
			'name'     => __( 'Sales Tax', 'text-domain' ),
			'type'	   => 'number',
			'class'    => 'textfield',
			'desc_tip' => __( 'Sales Tax', 'text-domain' ),
			'id'       => 'sales_tax',
			'placeholder'     => '%',
			'desc'     => __( 'Sales Tax(%)', 'text-domain' ),
		);
		
		$settings_slider[] = array( 'type' => 'sectionend', 'id' => 'wcslider' );
		return $settings_slider;
	
	/**
	 * If not, return the standard settings
	 **/
	} else {
		return $settings;
	}
}


function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');


//Add Facebook Open Graph Meta Tags
function add_facebook_open_graph_tags() {
	if (is_single()) { 
	global $post; 
	$image = get_post_meta($post->ID, 'thesis_post_image', $single = true); 
	if (!$image)
		$image = 'ENTER URL TO DEFAULT IMAGE HERE';
	?>	
	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
	<meta property="fb:admins" content="ENTER YOUR FACEBOOK USER ID HERE" />
	<?php }
}
 
 // First Register the Tab by hooking into the 'woocommerce_product_data_tabs' filter
add_filter( 'woocommerce_product_data_tabs', 'add_my_custom_product_data_tab' );
function add_my_custom_product_data_tab( $product_data_tabs ) {
	$product_data_tabs['Workshops'] = array(
		'label' => __( 'Workshops', 'my_text_domain' ),
		'target' => 'Workshop_product_data',
	);
	$product_data_tabs['DIY Kits'] = array(
		'label' => __( 'DIY Kits', 'my_text_domain' ),
		'target' => 'my_custom_product_data',
	);
	return $product_data_tabs;
}
 
add_action( 'woocommerce_product_data_panels', 'add_my_custom_product_data_fields' );
function add_my_custom_product_data_fields() {
	global $woocommerce, $post;
	$post_id = $post->ID;
	$_workshop_type = get_post_meta($post_id,'_workshop_type', true);
	$_stock = get_post_meta($post_id,'workshop_stock', true);
	$_stock_status = get_post_meta($post_id,'_stock_status', true);
	 
	$_workshop_start_time = get_post_meta($post_id,'_workshop_start_time', true);
	$_workshop_end_time = get_post_meta($post_id,'_workshop_end_time', true);
	$_date = get_post_meta($post_id,'_date', true);
	$workshop_city = get_post_meta($post_id,'workshop_city', true);
	$workshop_state = get_post_meta($post_id,'workshop_state', true);
	$venue = get_post_meta($post_id,'_venue', true);
	?>
	<!-- id below must match  registered in above add_my_custom_product_data_tab function -->
	
  	 
     <script>jQuery(document).ready(function( $ ){  	 
    jQuery('.datepicker').datepicker(); 
    
     if($('#_workshop_type').val() == 'publish')
     {
           $('._stock').hide();
            $('._stock_status').hide();
     }else{
            $('._stock').show();
            $('._stock_status').show();
     }
    $('#_workshop_type').change(function()
    {
    	 
    if($('#_workshop_type').val() == 'publish')
     {
     	
            $('._stock').hide();
            $('._stock_status').hide();
     }else{
            $('._stock').show();
            $('._stock_status').show();
     }
      });
    })</script> 
	<div id="Workshop_product_data" class="panel woocommerce_options_panel">
		<?php
		woocommerce_wp_select( 
			array( 
					'id'      => '_workshop_type', 
					'label'   => __( 'Workshop Type', 'dokan' ), 
					'class' => '_workshop_type',
					'options' => array(
					'sell'   => __( 'Sell', 'dokan' ),
					'publish'   => __( 'Publish/Advertise', 'dokan' ),
					 		 
				)
		));
		woocommerce_wp_text_input( 
		    array( 
		        'id'          => '_stock', 
		        'label'       => __( 'Number Of Seats', 'woocommerce' ), 
		        'placeholder' => '',
		        'type' => 'number',
		        'class' => '_stock',
		        'desc_tip'    => 'true',
		        'value'       => $_stock
         ));
		woocommerce_wp_select( 
			array( 
					'id'      => '_stock_status', 
					'label'   => __( 'Seat Status', 'dokan' ), 
					'class' => '_stock_status',
					'options' => array(
					'instock'   => __( 'Seats Available', 'dokan' ),
					'outofstock'   => __( 'Not Available', 'dokan' ),
				 
				)
		));
		
		?>
		<p class="form-field _workshop_time_field ">
			<label for="_workshop_start_time">
				<?php _e( 'Start Time', 'dokan' ); ?>
			</label>
			<?php
			$start = '12:00AM';
			$end = '11:59PM';
 			$interval = '+15 minutes';

			$start_str = strtotime($start);
			$end_str = strtotime($end);
			$now_str = $start_str;
							 
			echo '<select id="_workshop_start_time" name="_workshop_start_time">';
			while($now_str <= $end_str){
				$starttime = date('h:i A', $now_str);
				if($_workshop_start_time == $starttime){
				$selected = 'selected';
			}
   			 echo '<option value="' . date('h:i A', $now_str) . '">' . date('h:i A', $now_str) . '</option>';
   			 $now_str = strtotime($interval, $now_str);
			}
			echo '<option selected="'.$selected.'" value="' . $_workshop_start_time . '">' . $_workshop_start_time . '</option>';
			 echo '</select>';
			?> 
		</p>
		<p class="form-field _workshop_time_field">
			<label for="_workshop_end_time">
				<?php _e( 'End Time', 'dokan' ); ?>
			</label>
			<?php
			$start = '12:00AM';
			$end = '11:59PM';
 			$interval = '+15 minutes';

			$start_str = strtotime($start);
			$end_str = strtotime($end);
			$now_str = $start_str;
			echo '<select  id="_workshop_end_time" name="_workshop_end_time">';
			while($now_str <= $end_str){
			$endtime = date('h:i A', $now_str);
			if($_workshop_end_time == $endtime){
				$selected = 'selected';
			}
   			 echo '<option value="' . date('h:i A', $now_str) . '">' . date('h:i A', $now_str) . '</option>';
   			 $now_str = strtotime($interval, $now_str);
			}
			echo '<option selected="'.$selected.'" value="' . $_workshop_end_time . '">' . $_workshop_end_time . '</option>';
			 echo '</select>';
			?> 
		</p>
		<?php
		woocommerce_wp_text_input( 
		    array( 
		        'id'          => '_date', 
		        'label'       => __( 'Date', 'woocommerce' ), 
		        'placeholder' => '',
		        'desc_tip'    => 'true',
		        'class' => 'datepicker',
		        'description' => __( 'Enter Date', 'woocommerce' ),
		        'value'       => $date
         )); 
         woocommerce_wp_text_input( 
		    array( 
		        'id'          => '_duration', 
		        'label'       => __( 'Duration', 'woocommerce' ), 
		        'placeholder' => 'Days',
		        'type' => 'number',
		        'desc_tip'    => 'true',
		        'description' => __( 'Enter Days', 'woocommerce' ), 
		        'value'       => $duration
         ));
         woocommerce_wp_text_input( 
		    array( 
		        'id'          => 'workshop_city', 
		        'label'       => __( 'City', 'woocommerce' ), 
		        'placeholder' => '',
		        'desc_tip'    => 'true',
		        'value'       => $workshop_city
         ));?>
         <p class="form-field _state_field">
         <label for="workshop_state"><?php _e( 'State', 'dokan' ); ?></label>
          <select name="workshop_state" class="form-control" id="workshop_state">
                <option value="">Select State</option>
                <?php
											global $woocommerce;
											$states = indian_woocommerce_states();
											$states = $states['IN'];
											foreach ( $states as $key => $state ) {
									        ?>
									        <?php if($workshop_state == $state){
												$selected = 'selected';
											}?>
										        <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
									        <?php
										    }
									    ?>
									    <option selected="<?php echo $selected;?>" value="<?php echo $workshop_state; ?>"><?php echo $workshop_state; ?></option>
            </select>
		 </p>
         <?php 
         woocommerce_wp_text_input( 
		    array( 
		        'id'          => '_venue', 
		        'label'       => __( 'Venue', 'woocommerce' ), 
		        'placeholder' => '',
		        'desc_tip'    => 'true',
		        'value'       => $venue
         ));
		?>
	</div>
	 
			 										
												  
	<?php
	 
} 
 
/**
 * 
 *
 * Processes the custom tab options when a post is saved
 */
function process_product_meta_custom_tab_down( $post_id ) {
		
		$workshoptype= $_POST['tax_input']['product_cat'][1];
		$workshopsubtype= $_POST['tax_input']['product_cat'][2];
		
		if($workshoptype == '264' || $workshopsubtype == '268' || $workshopsubtype == '269')
		{
		update_post_meta( $post_id, 'workshop_type', '1' );
        update_post_meta( $post_id, '_workshop_type', $_POST['_workshop_type'] );
        update_post_meta( $post_id, 'workshop_stock', $_POST['_stock']);
        update_post_meta( $post_id, '_stock_status', $_POST['_stock_status']);
        if(isset($_POST["_workshop_start_time"]))
	    {
	        $_workshop_start_time = $_POST["_workshop_start_time"];
	    }   
        update_post_meta( $post_id, '_workshop_start_time',$_workshop_start_time);
        if(isset($_POST["_workshop_end_time"]))
	    {
	        $_workshop_end_time = $_POST["_workshop_end_time"];
	    }
        update_post_meta( $post_id, '_workshop_end_time', $_POST['_workshop_end_time']);
        update_post_meta( $post_id, '_date', $_POST['_date']);
        update_post_meta( $post_id, '_duration', $_POST['_duration']);
        update_post_meta( $post_id, 'workshop_city', $_POST['workshop_city']);
        update_post_meta( $post_id, 'workshop_state', $_POST['workshop_state']);
        update_post_meta( $post_id, '_venue', $_POST['_venue']);
        }
	
        
}
add_action('woocommerce_process_product_meta', 'process_product_meta_custom_tab_down', 10, 2); 
 
 
 
// Hide the custome meta fields from admin page 
add_action( 'admin_head', 'hidecustomfields' );

function hidecustomfields() {
	echo "<style type='text/css'>#postcustom { display: none; }</style>
";
}
 
function enqueue_date_picker(){
    wp_enqueue_script(
        'field-date', 
        get_template_directory_uri() . '/admin/field-date.js', 
        array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
        time(),
        true
    );  

    wp_enqueue_style( 'jquery-ui-datepicker' );
}

add_action('admin_enqueue_scripts', 'enqueue_date_picker');

// display an 'Out of Stock' label on archive pages
/*add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );
function woocommerce_template_loop_stock() {
    global $product;
    $stock = $product->get_stock_quantity();
    if ( $stock === 0 )
        echo '<p class="stock out-of-stock">Out of Stock</p>';
}*/
add_action( 'woocommerce_before_shop_loop_item_title', function() {
    global $product;
	$workshop_type = get_post_meta($product->id,'_workshop_type')[0];
    if ( !$product->is_in_stock() ) {
	    if($workshop_type)
	    {
	     echo '<span class="outofstock">Sold</span>';
	    }
	    else
	    {
		 echo '<span class="outofstock">Sold</span>';	
		}
	}
    if($workshop_type)
    {
		 if (is_expired($product)) {
        echo '<div class="expired">Closed</div>';
    }
	}
   
})
?>
