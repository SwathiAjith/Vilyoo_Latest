<?php
/**
 * The Sidebar containing the main widget areas.
 * @package dokan
 * @package dokan - 2014 1.0
 */
?>

<?php if(is_singular('event')){ ?>
   <aside id="woocommerce_top_rated_events" class="white-bg shadow-it col-xs-12 widget woocommerce widget_top_rated_products"><h3 class="widget-title">Other Events</h3><hr>
 <?php
	$type = 'event';
	$args=array(
	  'post_type' => $type,
	  'post_status' => 'publish',
	  'posts_per_page' => 5,
	  'caller_get_posts'=> 1
	);
	$my_query = null;
	$my_query = new WP_Query($args);
	echo '<ul class="dokan-bestselling-product-widget product_list_widget">';
	if( $my_query->have_posts() ) {
	  while ($my_query->have_posts()) : $my_query->the_post(); 
		$event_city = get_post_meta( get_the_ID(), 'event_city', true);
  		$event_date = get_post_meta( get_the_ID(), 'event_date', true);
		$event_time = get_post_meta( get_the_ID(), 'event_time', true);
		$thumbUrl = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		 echo '</ul>';
        ?>
      <ul class="product_list_widget">
      <li>
        <a href="<?php the_permalink()?>"><?php the_title(); ?></a> 
        <img src="<?php echo $thumbUrl; ?>" />
        <span><?php echo $event_time; echo ","; ?></span>
        <span class="md8labelfl"><?php echo $event_date; echo ",";?></span>
        <span class="md8labelfl"><?php echo $event_city; ?></span>
        </li>
      </ul>
	<?php
		endwhile;
 	}?>
 </aside>
	
 <?php }else{?>
 
<div class="col-md-3 pad-right eventsidebar"> <span class="addevent">Add An Event</span>
  <div class="white-bg shadow-it sidebarmaindiv">
    <form action="" method="post" id="newEventForm" name="newEvent" enctype="multipart/form-data">
      <div class="formdiv" >
        <label class="formlabel" >Title</label>
        <input name="title" class="forminput" required="required" type="text" />
      </div>
      <div class="formdiv">
        <label class="formlabel">Date</label>
         <input name="date" class="forminput" required="required" id="datepicker" />
    </div>
      <div class="formdiv">
      <label class="formlabel" >Time</label>
      <?php
			$start = '12:00AM';
			$end = '11:59PM';
 			$interval = '+15 minutes';

			$start_str = strtotime($start);
			$end_str = strtotime($end);
			$now_str = $start_str;
							 
			echo '<select id="timepicker" name="timepicker" class="forminput" required="required">';
			while($now_str <= $end_str){
				$starttime = date('h:i A', $now_str);
			 
   			 echo '<option value="' . date('h:i A', $now_str) . '">' . date('h:i A', $now_str) . '</option>';
   			 $now_str = strtotime($interval, $now_str);
			}
			 
			 echo '</select>';
			?> 
        
        
      </div>
      <div class="formdiv">
        <label class="formlabel">Duration</label>
        <select class="forminput duration"  name="duration">
        	<option value="">Select Duration</option>
            <option value="0.5 Day">0.5 Day</option>
            <option value="1 Day">1 Day</option>
            <?php for($d=2;$d<=30;$d++){ ?>
            <option value="<?php echo $d; ?> Days"><?php echo $d; ?> Days</option>
            <?php } ?>
        </select>
      </div>
      <div class="formdiv">
        <label class="formlabel" >Location</label>
        <input name="location" type="text" required="required" class="forminput" />
      </div>
      <div class="formdiv">
        <label class="formlabel" >City</label>
        <input name="eventcity" type="text" required="required" class="forminput" />
      </div>
      <div class="formdiv">
        <label class="formlabel" >Description</label>
        <textarea name="description" required="required" class="forminput" ></textarea>
      </div>
      <div class="formbnrdiv">
      <?php wp_nonce_field( 'bImage', 'my_image_upload_nonce' ); ?>
        <label class="labelbnrimg" >Banner Image</label>
        <input name="bImage" type="file" align="left" />
      </div>
      <div class="formdiv">
        <label class="formlabel" >Publisher's Name</label>
        <input name="pubName" type="text" required="required" class="forminput" />
      </div>
      <div class="formdiv">
        <label class="formlabel" >Contact Email</label>
        <input name="email" type="email" required="required" class="forminput" />
      </div>
      <div class="formdiv">
        <label class="formlabel" >Contact Number</label>
        <input name="phone" type="text" maxlength="10" data-validation="length numeric" required="required" data-validation-length="min10" class="forminput"  pattern="[789][0-9]{9}" />
      </div>
      <div class="formbutton" >
        <input name="addEventSubmit" type="submit" />
      </div>
      
    </form>
  </div>
</div>
<?php } ?>