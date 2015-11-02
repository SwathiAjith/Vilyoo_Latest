<?php
//print_r($product);
/**
 * The Template for displaying all single products.
 *
 * @package Dokan
 * @subpackage WooCommerce/Templates
 * @version 1.6.4
 */
get_header();
?>
<div class="container">
	<div id="primary" class="white-bg shadow-it content-area col-md-9">
	    <div id="content" class="site-content" role="main">

		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action('woocommerce_before_main_content');
		?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php 
					wc_get_template_part( 'content', 'single-product' ); 
					$index = get_post_meta( $product->id, $key = '_dps_processing_time' );
					$times = array(
				        '' => __( 'Ready to ship in...', 'dokan' ),
				        '1' => __( '1 business day', 'dokan' ),
				        '2' => __( '1-2 business day', 'dokan' ),
				        '3' => __( '1-3 business day', 'dokan' ),
				        '4' => __( '3-5 business day', 'dokan' ),
				        '5' => __( '1-2 weeks', 'dokan' ),
				        '6' => __( '2-3 weeks', 'dokan' ),
				        '7' => __( '3-4 weeks', 'dokan' ),
				        '8' => __( '4-6 weeks', 'dokan' ),
				        '9' => __( '6-8 weeks', 'dokan' ),
				    );

				?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content');
		?>

	    </div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
	<?php // get_sidebar( 'product-single' ); ?>
    <div id="secondary" class="col-md-3 clearfix pad-right" role="complementary">

    <div class="widget-area">

        <?php do_action( 'before_sidebar' ); ?>
        <aside id="text-2" class="white-bg shadow-it col-xs-12 widget widget_text">
        <div class="single-sold-by col-md-12">
			<?php
				$author     = get_user_by( 'id', $product->post->post_author );
			    $store_info = dokan_get_store_info( $author->ID );
			    $store_name = $store_info['store_name'];
			    echo "<p class='text-center'>";
			    printf( '<strong>SOLD BY</strong><br><a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_name );
			    $rating_info = dokan_get_seller_rating( $author->ID );
			    //print_r($store_info);
			?>
				<span class="seller-rating-tooltip" title="Based on <?php echo $rating_info['count']; ?> reviews."><br><?php echo $rating_info['rating'];?> / 5</span><br>
			</p>
		</div>
		<div class="col-md-12 text-center mb-15">
			<a href="#contact-seller-form-popup" data-toggle="modal" class="btn btn-default">Contact Seller</a>
			<ul class="nav nav-tabs seller-tabs">
				    <li class="active"><a data-toggle="tab" href="#sectionA">Shipping</a></li>
				    <li><a data-toggle="tab" href="#sectionB">Return</a></li>
				    <li><a data-toggle="tab" href="#sectionC">Policy</a></li>
			</ul>
			<div class="tab-content">
			    <div id="sectionA" class="tab-pane fade in active">
			        <p>Items will be shiipped <?php echo "within <b>" . $times[$index].'</b>'; ?>
			           working days from <b><?php echo $store_info['address'];?></b>. 
			           Currently shipping to all locations in india.
			        </p>
			    </div>
			    <div id="sectionB" class="tab-pane fade in">
			        <p>Contact support@vilyoo.com in case the item received is damaged or not as displayed
			           on the site, within 24 hour of the receipt of the shipment.
			           Further details on <a href="http://vilyoo.com/returns-shipping/">Here</a>

			        </p>
			    </div>
			    <div id="sectionC" class="tab-pane fade in">
			        <p>We accept payment through PayUMoney</p>
			    </div>
		</div> 
	</aside>
        <?php if ( !dynamic_sidebar( 'sidebar-single-product' ) ) : ?>

            <aside id="search" class="widget widget_search">
                <?php get_search_form(); ?>
            </aside>

            <aside id="archives" class="widget">
                <h1 class="widget-title"><?php _e( 'Archives', 'dokan' ); ?></h1>
                <ul>
                    <?php wp_get_archives( array('type' => 'monthly') ); ?>
                </ul>
            </aside>

            <aside id="meta" class="widget">
                <h1 class="widget-title"><?php _e( 'Meta', 'dokan' ); ?></h1>
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </aside>

        <?php endif; // end sidebar widget area ?>
        
    </div>
    </div><!-- #secondary .widget-area -->



</div>

<?php get_footer(); ?>