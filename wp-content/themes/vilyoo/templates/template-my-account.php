<?php
/**
 * Template Name: My Account
 *
 */

get_header();
?>

    
<div class="container">
    <div id="primary" class="white-bg shadow-it dokan-single-store content-area col-md-9">
        <div id="content" class="site-content store-page-wrap woocommerce" role="main">
            <div class="col-md-12 pad-left pad-right">
                <?php 
                if ( get_query_var( 'account-migration' ) && dokan_is_user_customer( get_current_user_id() ) ) {
                    include('template-update-account.php');
                } else {
                ?>
                <?php while ( have_posts() ) : the_post(); ?>
            
                    <?php get_template_part( 'content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>
                <?php } ?>
            </div>
        </div>
    </div><!-- .dokan-single-store -->
    <?php get_sidebar('my-account'); ?>
</div>
<?php get_footer(); ?>