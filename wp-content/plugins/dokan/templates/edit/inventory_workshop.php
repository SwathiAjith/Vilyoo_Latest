<?php 
global $post;
global $product;
$tax_classes = array_filter( array_map( 'trim', explode( "\n", get_option( 'woocommerce_tax_classes' ) ) ) );
$classes_options = array();
$classes_options[''] = __( 'Standard', 'dokan' );
if ( $tax_classes ) {

    foreach ( $tax_classes as $class ) {
        $classes_options[ sanitize_title( $class ) ] = esc_html( $class );
    }
}

?>
<div class="dokan-form-horizontal">
    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_sku"><?php _e( 'SKU', 'dokan' ); ?></label>
        <div class="dokan-w4 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_sku', array( 'placeholder' => 'SKU' ) ); ?>
        </div>
    </div>
    
    <div class="dokan-form-group hide">
        <label class="dokan-w4 dokan-control-label" for=""><?php _e( 'Manage Stock?', 'dokan' ); ?></label>
        <div class="dokan-w6 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_manage_stock', array('label' => __( 'Enable stock management at product level', 'dokan' ), 'checked' => 'checked' ), 'checkbox' ); ?>
        </div>
    </div>

    <div class="dokan-form-group hide_if_variable">
        <label class="dokan-w4 dokan-control-label" for="_workshop_type"><?php _e( 'Workshop Type', 'dokan' ); ?></label>
        <div class="dokan-w4 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_workshop_type', array( 'options' => array(
                'sell' => __( 'Sell', 'dokan' ),
                'publish' => __( 'Publish/Advertise', 'dokan' )
                ) ), 'select'
            ); ?>
        </div>
    </div>

    <div class="dokan-form-group" id="seat_numbers">
        <label class="dokan-w4 dokan-control-label" for="_stock_qty"><?php if($_workshop_type != 1) { _e( 'No Of Seats', 'dokan' ); } else { _e( 'Number Of Seats', 'dokan' );} ?><span class="required">*</span></label>
        <div class="dokan-w4 dokan-text-left">
            <?php dokan_post_input_stock( $post->ID, '_stock', array( 'placeholder' => '10', 'required' => 'required' , 'class' => "dokan-form-control"  ),'number' ); ?>
        </div>
    </div>

    <div class="dokan-form-group hide_if_variable">
        <label class="dokan-w4 dokan-control-label" for="_stock_status"><?php _e( 'Seat Status', 'dokan' ); ?></label>
        <div class="dokan-w4 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_stock_status', array( 'options' => array(
                'instock' => __( 'Seats Available', 'dokan' ),
                'outofstock' => __( 'Not Available', 'dokan' )
                ) ), 'select'
            ); ?>
        </div>
    </div>

    <div class="dokan-form-group hide_if_variable">
        <label class="dokan-w4 dokan-control-label" for="_workshop_start_time"><?php _e( 'Start Time', 'dokan' ); ?></label>
        <div class="dokan-w4 dokan-text-left">
            <select name="_workshop_start_time" id="_workshop_start_time" class="dokan-form-control">
                <option value="5:00 AM">5:00 AM</option>
                <option value="5:15 AM">5:15 AM</option>
                <option value="5:30 AM">5:30 AM</option>
                <option value="5:45 AM">5:45 AM</option>
                 
                <option value="6:00 AM">6:00 AM</option>
                <option value="6:15 AM">6:15 AM</option>
                <option value="6:30 AM">6:30 AM</option>
                <option value="6:45 AM">6:45 AM</option>
                 
                <option value="7:00 AM">7:00 AM</option>
                <option value="7:15 AM">7:15 AM</option>
                <option value="7:30 AM">7:30 AM</option>
                <option value="7:45 AM">7:45 AM</option>
                 
                <option value="8:00 AM">8:00 AM</option>
                <option value="8:15 AM">8:15 AM</option>
                <option value="8:30 AM">8:30 AM</option>
                <option value="8:45 AM">8:45 AM</option>
                 
                <option value="9:00 AM">9:00 AM</option>
                <option value="9:15 AM">9:15 AM</option>
                <option value="9:30 AM">9:30 AM</option>
                <option value="9:45 AM">9:45 AM</option>
                 
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:15 AM">10:15 AM</option>
                <option value="10:30 AM">10:30 AM</option>
                <option value="10:45 AM">10:45 AM</option>
                 
                <option value="11:00 AM">11:00 AM</option>
                <option value="11:15 AM">11:15 AM</option>
                <option value="11:30 AM">11:30 AM</option>
                <option value="11:45 AM">11:45 AM</option>
                 
                <option value="12:00 PM">12:00 PM</option>
                <option value="12:15 PM">12:15 PM</option>
                <option value="12:30 PM">12:30 PM</option>
                <option value="12:45 PM">12:45 PM</option>
                 
                <option value="1:00 PM">1:00 PM</option>
                <option value="1:15 PM">1:15 PM</option>
                <option value="1:30 PM">1:30 PM</option>
                <option value="1:45 PM">1:45 PM</option>
                 
                <option value="2:00 PM">2:00 PM</option>
                <option value="2:15 PM">2:15 PM</option>
                <option value="2:30 PM">2:30 PM</option>
                <option value="2:45 PM">2:45 PM</option>
                 
                <option value="3:00 PM">3:00 PM</option>
                <option value="3:15 PM">3:15 PM</option>
                <option value="3:30 PM">3:30 PM</option>
                <option value="3:45 PM">3:45 PM</option>
                 
                <option value="4:00 PM">4:00 PM</option>
                <option value="4:15 PM">4:15 PM</option>
                <option value="4:30 PM">4:30 PM</option>
                <option value="4:45 PM">4:45 PM</option>
                 
                <option value="5:00 PM">5:00 PM</option>
                <option value="5:15 PM">5:15 PM</option>
                <option value="5:30 PM">5:30 PM</option>
                <option value="5:45 PM">5:45 PM</option>
                 
                <option value="6:00 PM">6:00 PM</option>
                <option value="6:15 PM">6:15 PM</option>
                <option value="6:30 PM">6:30 PM</option>
                <option value="6:45 PM">6:45 PM</option>
                 
                <option value="7:00 PM">7:00 PM</option>
                <option value="7:15 PM">7:15 PM</option>
                <option value="7:30 PM">7:30 PM</option>
                <option value="7:45 PM">7:45 PM</option>
                 
                <option value="8:00 PM">8:00 PM</option>
                <option value="8:15 PM">8:15 PM</option>
                <option value="8:30 PM">8:30 PM</option>
                <option value="8:45 PM">8:45 PM</option>
                 
                <option value="9:00 PM">9:00 PM</option>
                <option value="9:15 PM">9:15 PM</option>
                <option value="9:30 PM">9:30 PM</option>
                <option value="9:45 PM">9:45 PM</option>
                 
                <option value="10:00 PM">10:00 PM</option>
                <option value="10:15 PM">10:15 PM</option>
                <option value="10:30 PM">10:30 PM</option>
                <option value="10:45 PM">10:45 PM</option>
                 
                <option value="11:00 PM">11:00 PM</option>
                <option value="11:15 PM">11:15 PM</option>
                <option value="11:30 PM">11:30 PM</option>
                <option value="11:45 PM">11:45 PM</option>
            </select>
        </div>
    </div>
    <div class="dokan-form-group hide_if_variable">
        <label class="dokan-w4 dokan-control-label" for="_workshop_end_time"><?php _e( 'End Time', 'dokan' ); ?></label>
        <div class="dokan-w4 dokan-text-left">
            <select name="_workshop_end_time" id="_workshop_end_time" class="dokan-form-control">
                <option value="5:00 AM">5:00 AM</option>
                <option value="5:15 AM">5:15 AM</option>
                <option value="5:30 AM">5:30 AM</option>
                <option value="5:45 AM">5:45 AM</option>
                 
                <option value="6:00 AM">6:00 AM</option>
                <option value="6:15 AM">6:15 AM</option>
                <option value="6:30 AM">6:30 AM</option>
                <option value="6:45 AM">6:45 AM</option>
                 
                <option value="7:00 AM">7:00 AM</option>
                <option value="7:15 AM">7:15 AM</option>
                <option value="7:30 AM">7:30 AM</option>
                <option value="7:45 AM">7:45 AM</option>
                 
                <option value="8:00 AM">8:00 AM</option>
                <option value="8:15 AM">8:15 AM</option>
                <option value="8:30 AM">8:30 AM</option>
                <option value="8:45 AM">8:45 AM</option>
                 
                <option value="9:00 AM">9:00 AM</option>
                <option value="9:15 AM">9:15 AM</option>
                <option value="9:30 AM">9:30 AM</option>
                <option value="9:45 AM">9:45 AM</option>
                 
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:15 AM">10:15 AM</option>
                <option value="10:30 AM">10:30 AM</option>
                <option value="10:45 AM">10:45 AM</option>
                 
                <option value="11:00 AM">11:00 AM</option>
                <option value="11:15 AM">11:15 AM</option>
                <option value="11:30 AM">11:30 AM</option>
                <option value="11:45 AM">11:45 AM</option>
                 
                <option value="12:00 PM">12:00 PM</option>
                <option value="12:15 PM">12:15 PM</option>
                <option value="12:30 PM">12:30 PM</option>
                <option value="12:45 PM">12:45 PM</option>
                 
                <option value="1:00 PM">1:00 PM</option>
                <option value="1:15 PM">1:15 PM</option>
                <option value="1:30 PM">1:30 PM</option>
                <option value="1:45 PM">1:45 PM</option>
                 
                <option value="2:00 PM">2:00 PM</option>
                <option value="2:15 PM">2:15 PM</option>
                <option value="2:30 PM">2:30 PM</option>
                <option value="2:45 PM">2:45 PM</option>
                 
                <option value="3:00 PM">3:00 PM</option>
                <option value="3:15 PM">3:15 PM</option>
                <option value="3:30 PM">3:30 PM</option>
                <option value="3:45 PM">3:45 PM</option>
                 
                <option value="4:00 PM">4:00 PM</option>
                <option value="4:15 PM">4:15 PM</option>
                <option value="4:30 PM">4:30 PM</option>
                <option value="4:45 PM">4:45 PM</option>
                 
                <option value="5:00 PM">5:00 PM</option>
                <option value="5:15 PM">5:15 PM</option>
                <option value="5:30 PM">5:30 PM</option>
                <option value="5:45 PM">5:45 PM</option>
                 
                <option value="6:00 PM">6:00 PM</option>
                <option value="6:15 PM">6:15 PM</option>
                <option value="6:30 PM">6:30 PM</option>
                <option value="6:45 PM">6:45 PM</option>
                 
                <option value="7:00 PM">7:00 PM</option>
                <option value="7:15 PM">7:15 PM</option>
                <option value="7:30 PM">7:30 PM</option>
                <option value="7:45 PM">7:45 PM</option>
                 
                <option value="8:00 PM">8:00 PM</option>
                <option value="8:15 PM">8:15 PM</option>
                <option value="8:30 PM">8:30 PM</option>
                <option value="8:45 PM">8:45 PM</option>
                 
                <option value="9:00 PM">9:00 PM</option>
                <option value="9:15 PM">9:15 PM</option>
                <option value="9:30 PM">9:30 PM</option>
                <option value="9:45 PM">9:45 PM</option>
                 
                <option value="10:00 PM">10:00 PM</option>
                <option value="10:15 PM">10:15 PM</option>
                <option value="10:30 PM">10:30 PM</option>
                <option value="10:45 PM">10:45 PM</option>
                 
                <option value="11:00 PM">11:00 PM</option>
                <option value="11:15 PM">11:15 PM</option>
                <option value="11:30 PM">11:30 PM</option>
                <option value="11:45 PM">11:45 PM</option>
            </select>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_date"><?php if($_workshop_type != 1) { _e( 'Date', 'dokan' ); } else { _e( 'Date', 'dokan' );} ?><span class="required">*</span></label>
        <div class="dokan-w4 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_date', array( 'placeholder' => 'Date', 'required' => 'required','class' => "datepicker dokan-form-control" ) ); ?>
            <Span>Select if you have a fixed date</Span>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_duration"><?php if($_workshop_type != 1) { _e( 'Duration', 'dokan' ); } else { _e( 'Duration', 'dokan' );} ?><span class="required">*</span></label>
        <div class="dokan-w4 dokan-text-left duration_field">
            <?php dokan_post_input_box( $post->ID, '_duration', array( 'placeholder' => '0.5', 'required' => 'required', 'class' => "duration_field dokan-form-control"  ) ); ?>Days
        </div>
    </div>
 <div class="dokan-form-group">
         <label class="dokan-w4 dokan-control-label" for="workshop_city"><?php _e( 'City', 'dokan' ); ?></label>
         <div class="dokan-w4 dokan-text-left">
         <?php $workshop_city = get_post_meta($product->id,'workshop_city')[0];
         $workshop_state = get_post_meta($product->id,'workshop_state')[0];
         ?>
         <input type="text" id="workshop_city" name="workshop_city"  class="form-control" required="required" value="<?php echo $workshop_city; ?>"></input> 
            </div>
        </div>
   
     <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="workshop_state"><?php _e( 'State', 'dokan' ); ?></label>
         <div class="dokan-w4 dokan-text-left">
            <select name="workshop_state" class="form-control" id="workshop_state" required="required">
                <option value="">Select State</option>
                <?php
											global $woocommerce;
											$states = indian_woocommerce_states();
											$states = $states['IN'];
											foreach ( $states as $key => $state ) {
									        ?>
									        <?php if($workshop_state == $state){
												$selected = 'selected';
											}?>
										        <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
									        <?php
										    }
									    ?>
									    <option selected="<?php echo $selected;?>" value="<?php echo $workshop_state; ?>"><?php echo $workshop_state; ?></option>
            </select>
         </div>
     </div>
    
        <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_venue"><?php if($_workshop_type != 1) { _e( 'Venue', 'dokan' ); } else { _e( 'venue', 'dokan' );} ?></label>
        <div class="dokan-w4 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_venue', array( 'placeholder' => 'Venue', 'class' => "dokan-form-control" ) ); ?>
        </div>
    </div>
    </div> <!-- .form-horizontal -->
