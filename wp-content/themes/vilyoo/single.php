<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _tk
 */

get_header(); ?>

<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 blog-page-main">
				<div class="col-md-9">
					<div class="shadow-it white-bg col-md-12">
						<?php while ( have_posts() ) : the_post(); ?>
 						<?php echo do_shortcode( '[woocommerce_social_media_share_buttons]' ); ?>
							<?php get_template_part( 'content', 'single' ); ?>
<?php echo do_shortcode( '[woocommerce_social_media_share_buttons]' ); ?>
							<?php _tk_content_nav( 'nav-below' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
							?>

						<?php endwhile; // end of the loop. ?>
					</div>
			    </div>
			   
					
			   <?php get_sidebar('blog'); ?>
<?php get_footer(); ?>