<?php

$sidebars = array(
    array( 'name' => __( 'General Sidebar', 'dokan' ), 'id' => 'sidebar-1' ),
    array( 'name' => __( 'Home Sidebar', 'dokan' ), 'id' => 'sidebar-home' ),
    array( 'name' => __( 'Blog Sidebar', 'dokan' ), 'id' => 'sidebar-blog' ),
    array( 'name' => __( 'Header Sidebar', 'dokan' ), 'id' => 'sidebar-header' ),
    array( 'name' => __( 'Shop Archive', 'dokan' ), 'id' => 'sidebar-shop' ),
    array( 'name' => __( 'Seller Sidebar', 'dokan' ), 'id' => 'sidebar-seller' ),
    array( 'name' => __( 'My Account Sidebar', 'dokan' ), 'id' => 'sidebar-my-account' ),
    array( 'name' => __( 'Single Product', 'dokan' ), 'id' => 'sidebar-single-product' ),
    array( 'name' => __( 'Footer Sidebar - 1', 'dokan' ), 'id' => 'footer-1' ),
    array( 'name' => __( 'Footer Sidebar - 2', 'dokan' ), 'id' => 'footer-2' ),
    array( 'name' => __( 'Footer Sidebar - 3', 'dokan' ), 'id' => 'footer-3' ),
    array( 'name' => __( 'Footer Sidebar - 4', 'dokan' ), 'id' => 'footer-4' ),
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
// add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );
// function theme_register_scripts() {
 
//   /** Register JavaScript Functions File */
//   wp_register_script( 'contact-seller', esc_url( trailingslashit( get_template_directory_uri() ) . 'includes/js/contact-seller.js' ), array( 'jquery' ), '1.0', true );
 
//   /** Localize Scripts */
//   $contact_seller_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
//   wp_localize_script( 'contact-seller', 'contact_seller_array', $contact_seller_array );
 
// }
 
// /** Enqueue Scripts. */
// add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
// function theme_enqueue_scripts() {
 
//   /** Enqueue JavaScript Functions File */
//   wp_enqueue_script( 'contact-seller' );
 
// }

// /** Ajax Post */
// add_action( 'wp_ajax_vilyoo_contact_seller', 'vilyoo_contact_seller_init' );
// add_action( 'wp_ajax_nopriv_vilyoo_contact_seller', 'vilyoo_contact_seller_init' );
// function vilyoo_contact_seller_init() {
//     $v_seller_id = $_POST['seller_id'];
//     $v_seller = get_user_by( 'id', (int) $v_seller_id );
//     if ( !$v_seller ) {
//         $message = "Oops, Something went wrong. Try again!";
//         wp_send_json_error( $message );
//     }
//     $v_name = trim( strip_tags( $_POST['name'] ) );
//     $v_phone = trim( strip_tags( $_POST['phone'] ) );
//     $v_email = trim( strip_tags( $_POST['email'] ) );
//     $v_message = $_POST['message'];
//     $content_to_send = "<b>From : </b>" . $v_name ."<br>";
//     $content_to_send .= "<b>Email : </b>". $v_email ."<br>";
//     $content_to_send .= "<b>Phone : </b>". $v_phone ."<br>";
//     $content_to_send .= "<b>Message: </b>". $v_message ."<br>";
//     $content_to_send .= "<br><b>From Page: </b>". $_POST['page_url'];
//     wp_mail( $v_seller->user_email, '[Vilyoo.com] New message from '.$v_name, $content_to_send );
//     $message = "Message successfully sent!";
//     wp_send_json_success( $message );
//     die();
// }
