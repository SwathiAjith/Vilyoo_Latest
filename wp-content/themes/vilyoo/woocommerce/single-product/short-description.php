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
		<a href="#" class="btn btn-default">Customization Message</a>
		<?php
	}
?>

