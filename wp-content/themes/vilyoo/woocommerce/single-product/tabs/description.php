<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
$post_id        = $post->ID; 
$workshop_type = get_post_meta($post_id,'workshop_type',true);
 
if($workshop_type  == 1)
{
	$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Workshop Description', 'woocommerce' ) ) );
}
else{
$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Product Description', 'woocommerce' ) ) );	
}

?>

<?php if ( $heading ): ?>
  <h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php wpautop( the_content() ); ?>
<?php if($workshop_type  != 1) { 
	echo "<span class='woocommerce-disclaimer'>Note: As these products are handmade there maybe slight variation in sizes and colour shades from what is described on the website.</span>";
}?>
