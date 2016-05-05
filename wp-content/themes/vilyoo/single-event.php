<?php
/**
 * The Template for displaying all single events.
 * @package Dokan
 * @subpackage WooCommerce/Templates
 * @version 1.6.4
 */
 
get_header();
?>

<div class="container">
  <div id="singleEvent" class="col-md-9 white-bg shadow-it">
    <div class="singletopdiv" >
      <?php while ( have_posts() ) : the_post();?>
      <div class="col-md-12">
        <div class="col-md-4">
          <?php $thumbUrl = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
          <img src="<?php echo $thumbUrl; ?>" /> </div>
        <div class="col-md-8">
          <h4><a>
            <?php the_title(); ?>
            </a></h4>
          <?php 
			  $event_date = get_post_meta( get_the_ID(), 'event_date', true);
			  $event_time = get_post_meta( get_the_ID(), 'event_time', true);
			  $event_location = get_post_meta( get_the_ID(), 'event_location', true);
			  $event_city = get_post_meta( get_the_ID(), 'event_city', true);
			  $event_duration = get_post_meta( get_the_ID(), 'event_duration', true);
			  $event_publisher_name = get_post_meta( get_the_ID(), 'event_publisher_name', true);
			  $event_email = get_post_meta( get_the_ID(), 'event_email', true);
			  $event_phone = get_post_meta( get_the_ID(), 'event_phone', true);
		  ?>
          <div class="md8div">
            <label class="md8label">Date</label>
            <p class="md8labelfl"><?php echo $event_date; ?></p>
          </div>
          <div class="md8div">
            <label class="md8label">Time</label>
            <p class="md8labelfl"><?php echo $event_time; ?></p>
          </div>
          <div class="md8div">
            <label class="md8label">Location</label>
            <p class="md8labelfl"><?php echo $event_location; ?></p>
          </div>
          <div class="md8div">
            <label class="md8label">City</label>
            <p class="md8labelfl"><?php echo $event_city; ?></p>
          </div>
          <div class="md8duration">
            <label class="md8label">Duration</label>
            <p class="md8labelfl"><?php echo $event_duration; ?></p>
          </div>
          <div class="md8detail">
            <label class="md8label">Detail</label>
            <p class="md8labelfl">
              <?php the_content();?>
            </p>
          </div>
          <div class="col-md-5"></div>
          <div class="col-md-7">
            <div class="md8div">
              <label class="md8labelfl">Published by : </label>
              <p class="md8labelfr"><?php echo $event_publisher_name; ?></p>
            </div>
            <div class="md8div">
              <label class="md8labelfl">Contact Number : </label>
              <p class="md8labelfr"><?php echo $event_phone; ?></p>
            </div>
            <div class="md8div">
              <label class="md8labelfl">Email : </label>
              <p class="md8labelfr"><?php echo $event_email; ?></p>
            </div>
             <?php echo do_shortcode( '[woocommerce_social_media_share_buttons]' ); ?>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="white-bg shadow-it singlesidebar">
      <?php get_sidebar('events'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>