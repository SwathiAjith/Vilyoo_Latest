<?php
/**
 * Template Name:Static Page Template
 */

get_header(); ?>
<?php // substitute the class "container-fluid" below if you want a wider content area ?>

<div class="container-fluid">
<?php the_post_thumbnail('img-responsive'); ?>
</div>
	<div class="container">
		<div class="row">
			<div id="content" class="white-bg shadow-it main-content-inner col-sm-12 col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>		
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="entry-content-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
						<?php edit_post_link( __( 'Edit', '_tk' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
					</article><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
