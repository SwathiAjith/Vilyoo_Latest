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

if ( ! $post->post_excerpt ) {
	return;
}

?>
<div itemprop="description" class="font-verdana">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>
<?php
	$is_customizable = get_post_meta( $post->ID, 'is_this_product_customizable' )[0];
	if( $is_customizable == "yes" ) {
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
?>

