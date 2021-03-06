<?php
/**
 * Template Name: Vilyoo - Full Width Template
 */

get_header(); ?>
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="content" class="white-bg shadow-it main-content-inner col-sm-12 col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>

				<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
