 
<?php
/**
 * Template Name: Vilyoo Events Template
 */
get_header();
session_start();

if(isset($_POST['addEventSubmit']) || $_SESSION['eventdata']!="")
{
	if( is_user_logged_in() )
	{
		 if($_SESSION['eventdata']!="")
			{
				$d1 = $_SESSION['eventdata']['date'];
				$d2 = date('d-m-Y', strtotime($d1));
				//$user = wp_get_current_user();
				//$uTypes = array('Seller','Customer');
				//if(	 in_array( $uTypes, (array) $user->roles )){ 
				$my_post = array(
					'post_title' => $_SESSION['eventdata']['title'],
					'post_content' => $_SESSION['eventdata']['description'],
					'post_status' => 'pending',
					'post_type' => 'event',
				);
				$the_post_id = wp_insert_post( $my_post );
				//set_featured_image($_POST['bImage'],$the_post_id);
				__update_post_meta( $the_post_id, 'event_date', $d2 );
				__update_post_meta( $the_post_id, 'event_time', $_SESSION['eventdata']['timepicker'] );
				__update_post_meta( $the_post_id, 'event_duration', $_SESSION['eventdata']['duration'] );
				__update_post_meta( $the_post_id, 'event_location', $_SESSION['eventdata']['location'] );
				__update_post_meta( $the_post_id, 'event_publisher_name', $_SESSION['eventdata']['pubName'] );
				__update_post_meta( $the_post_id, 'event_email', $_SESSION['eventdata']['email'] );
				__update_post_meta( $the_post_id, 'event_phone', $_SESSION['eventdata']['phone'] );
				 update_post_meta($the_post_id, '_thumbnail_id', $_SESSION['attachment_id']);

				//}
				?>
                <script>
                	alert("Event Has Been Submitted.");
                </script>
				<?php unset($_SESSION['eventdata']);
				unset($_SESSION['attachment_id']);
				
			}
			else
			{
				$d1 = $_POST['date'];
				$d2 = date('d-m-Y', strtotime($d1));
				//$user = wp_get_current_user();
				//$uTypes = array('Seller','Customer');
				//if(	 in_array( $uTypes, (array) $user->roles )){ }
				$my_post = array(
					'post_title' => $_POST['title'],
					'post_content' => $_POST['description'],
					'post_status' => 'pending',
					'post_type' => 'event',
				);
				$the_post_id = wp_insert_post( $my_post );
				//set_featured_image($_POST['bImage'],$the_post_id);
				__update_post_meta( $the_post_id, 'event_date', $d2 );
				__update_post_meta( $the_post_id, 'event_time', $_POST['timepicker'] );
				__update_post_meta( $the_post_id, 'event_duration', $_POST['duration'] );
				__update_post_meta( $the_post_id, 'event_location', $_POST['location'] );
				__update_post_meta( $the_post_id, 'event_city', $_POST['eventcity'] );
				__update_post_meta( $the_post_id, 'event_publisher_name', $_POST['pubName'] );
				__update_post_meta( $the_post_id, 'event_email', $_POST['email'] );
				__update_post_meta( $the_post_id, 'event_phone', $_POST['phone'] );
				// These files need to be included as dependencies when on the front end.
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				require_once( ABSPATH . 'wp-admin/includes/media.php' );
				// Let WordPress handle the upload.
				// Remember, 'my_image_upload' is the name of our file input in our form above.
				$attachment_id = media_handle_upload( 'bImage', $the_post_id );
				update_post_meta($the_post_id, '_thumbnail_id', $attachment_id);
				?>
                <script>
                	alert("Event Has Been Submitted.");
                </script>
				<?php
				if ( is_wp_error( $attachment_id ) ) {
					// There was an error uploading the image.
				} else {
					// The image was uploaded successfully!
				}
				
			}
	}else{
		
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		// Let WordPress handle the upload.
		// Remember, 'my_image_upload' is the name of our file input in our form above.
	 	$attachment_id = media_handle_upload( 'bImage', 0 );
		$_SESSION['attachment_id']=$attachment_id;
		$_SESSION['eventdata'] = $_POST;
		wp_redirect('my-account');
	}
}
?>

<div class="container">
  <div id="allevents" class="white-bg shadow-it dokan-single-store content-area col-md-9 allevents" >
    <div id="content" class="site-content store-page-wrap woocommerce" >
      <div class="col-md-12 pad-left pad-right">
        <div class="col-md-6">
          <form name="eventSearchForm" method="post">
            <div class="col-md-9 searchforminputdiv">
              <input name="searchtxt" class="form-control searchinput" id="" type="search" placeholder="Location wise or date wise (dd-mm-yy)"  data-min-chars="3" autocomplete="off"/>
            </div>
            <button type="submit" value="Search" name="searchEventSubmit"  class="btn btn-search-event col-xs-3" />
            Search
            </button>
          </form>
          <div>
            <?php if(isset($_POST['searchEventSubmit'])) { echo $msg;} ?>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <?php
		$type = 'event';
		if(isset($_POST['searchEventSubmit']))
{
	$txt = $_POST['searchtxt'];
		
		$args = array(
	 'post_type' => $type,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'caller_get_posts'=> 1,
	'meta_query' => array( 
	'relation' => 'OR',    // This is the problem area! (See below)
		array(
			'key' => 'event_location',
			'value' => $txt,
			'compare' => 'LIKE',
		),
		array(
			'key' => 'event_date',
			'value' => $txt,
			'compare' => 'LIKE',
		),
	),
);
}else
{
		
		$args=array(
		  'post_type' => $type,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'orderby' => 'meta_value',
          'meta_key' => 'event_date',
          //'order' => 'ASC',
		  'caller_get_posts'=> 1
		);
}

		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		  while ($my_query->have_posts()) : $my_query->the_post(); ?>
		  <?php $event_city = get_post_meta( get_the_ID(), 'event_city', true);
		  		$event_date = get_post_meta( get_the_ID(), 'event_date', true);
		  		
		  		$date = date('Y-m-d', strtotime(str_replace('.', '/', $event_date)));
		  		//echo $date. "------";
		  		//Get number of days deference between current date and given date.
				$diff = dateDiff($event_date, date('Y-m-d'));
					
			 if($diff <= 15) {
			 	//echo $diff. "days";	
			 	?>
      <div class="col-md-12 eventpostdiv" >
        <div class="white-bg shadow-it postdiv" >
          <div class="col-md-4">
            <div class="imagediv">
              <?php $thumbUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
              <!--	<img src="http://localhost/vilyoo/wp-content/uploads/2016/01/PHP-web-developer-from-india-kochi..png"/> --> 
              <img src="<?php echo $thumbUrl; ?>" />
              
              <div class="detaildiv"><span class="datespan"><?php echo $event_date; ?></span> <span class="span2">&amp;</span> <span class="locationspan"><?php echo $event_city; ?></span></div>
            </div>
          </div>
          <div class="col-md-8">
            <h5><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
              </a></h5>
            <p class="contentHeight">
              <?php $content = get_the_content();
				  $content = strip_tags($content);
				  echo substr($content, 0, 180);
			  ?>
            <!--<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">More</a> </p>-->
            <a href="<?php the_permalink() ?>" class="goinglink">
            <button class="btn btn-search-event col-xs-4 " type="submit" >Details</button>
            </a> </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php } ?>
  <?php endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>
    </div>
  </div>
  <?php get_sidebar('events'); ?>
</div>
<?php get_footer(); ?>
