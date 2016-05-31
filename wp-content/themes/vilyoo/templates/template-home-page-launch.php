<?php
/**
 * Template Name: Website Home Page - Launch
 */

get_header(); ?>
<style type="text/css">
	#masthead.affix
	{
		margin-top: 20px;
	}
</style>
<?php // substitute the class "container - fluid" below if you want a wider content area ?>
<?php include get_template_directory().'/templates/slider.php'; ?>
<?php include get_template_directory().'/templates/contemporary-fine-crafts.php'; ?>
<?php include get_template_directory().'/templates/featured-seller.php'; ?>    

<?php include get_template_directory().'/templates/featured-collection.php'; ?>    
  
<?php include get_template_directory().'/templates/checkout-latest-creatives.php'; ?>    
  
<?php include get_template_directory().'/templates/testimonials.php'; ?>
  
<?php include get_template_directory().'/templates/recommended-for-you.php'; ?>

 

<?php get_footer(); ?>