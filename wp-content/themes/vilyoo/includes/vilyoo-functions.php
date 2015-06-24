<?php

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
function vilyoo_get_feature_sellers( ) {
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

add_shortcode( 'list_ngo_shops', 'display_ngo_shops' );

function display_ngo_shops() {

    $ngo_shops = vilyoo_get_feature_sellers();

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

