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