<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

global $product;

if ( ! $post->post_excerpt ) {
	return;
}
$workshop_type = get_post_meta($post->ID,'_workshop_type')[0];
$workshop = get_post_meta($post->ID,'workshop_type',true);
?>

<?php
	$is_customizable = get_post_meta( $post->ID, 'is_this_product_customizable' )[0];

	if( $is_customizable == "yes" && !$workshop_type) {
		?>
		<a id="addCustomizationMessage" href="#" class="btn btn-default">Add Customization Message</a>
		<p id="addCustomizationMessageNotif" class="mt-15 hide">
			
		</p>
		<div id="personalizedNoteWrap" class="hide">
			<textarea id="personalizedNoteData" name="personalizedNoteData" class="form-control mt-15" placeholder="Enter Instructions for Customization to Seller."></textarea>
			<p class="mt-15">
				<button id="savePersonalizationNote" type="button" class="btn btn-primary">Save Notes</button>
			</p>
		</div>
		<?php
	}
	else if($workshop == '1'){
		if(get_post_meta($product->id,'_date')[0]){

    echo "<b>Date : </b>" .get_post_meta($product->id,'_date')[0] .'. <br >';
}
else{
    echo "<b>Date </b>: No dates specified you can contact the author to inform the date <br>";
}
$stock = get_post_meta($product->id,'_stock')[0];
$stock = round($stock, 0);
//if it is publishing workshop down show no of seats
if($workshop_type != 'publish')
{
	echo "<b>No of Seats : </b>" .$stock.'<br >';
}
echo "<b>Venue : </b>" .get_post_meta($product->id,'_venue')[0].'<br >';

echo "<b>City : </b>" .get_post_meta($product->id,'workshop_city')[0].'<br >';

echo "<br>";		
	}
?>

