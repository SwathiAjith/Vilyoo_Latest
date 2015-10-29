<?php
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

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

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
        <aside id="text-2" class="white-bg shadow-it col-xs-12 widget widget_text">
        <div class="single-sold-by col-md-12">
			<?php
				$author     = get_user_by( 'id', $product->post->post_author );
			    $store_info = dokan_get_store_info( $author->ID );
			    $store_name = $store_info['store_name'];
			    echo "<p class='text-center'>";
			    printf( '<strong>SOLD BY</strong><br><a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_name );
			    $rating_info = dokan_get_seller_rating( $author->ID );
			?>
				<span class="seller-rating-tooltip" title="Based on <?php echo $rating_info['count']; ?> reviews."><?php echo $rating_info['rating'];?> / 5</span><br>
			</p>
		</div>
		<div class="col-md-12 text-center mb-15">
			<a href="#contact-seller-form-popup" data-toggle="modal" class="btn btn-default">Contact Seller</a>
		</div> 
	</aside>
    </div>
    </div><!-- #secondary .widget-area -->



</div>

<?php get_footer(); ?>