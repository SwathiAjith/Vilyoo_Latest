<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>

	<div class="col-md-12">
		<?php 
			// Get all the products and list it here!
			woocommerce_content(); 
		?>
	</div>


<?php get_footer(); ?>
