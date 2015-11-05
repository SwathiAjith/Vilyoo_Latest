<?php
/**
 * Additional Information tab
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional Information', 'woocommerce' ) );

?>

<?php if ( $heading ): ?>
	<h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php $product->list_attributes(); ?>
<?php
	$index = get_post_meta( $product->id, $key = '_dps_processing_time' );
    $index = $index[0];
	$times = array(
        0 => __( 'Ready to ship in...', 'dokan' ),
        1 => __( '1 business day', 'dokan' ),
        2 => __( '1-2 business day', 'dokan' ),
        3 => __( '1-3 business day', 'dokan' ),
        4 => __( '3-5 business day', 'dokan' ),
        5 => __( '1-2 weeks', 'dokan' ),
        6 => __( '2-3 weeks', 'dokan' ),
        7 => __( '3-4 weeks', 'dokan' ),
        8 => __( '4-6 weeks', 'dokan' ),
        9 => __( '6-8 weeks', 'dokan' ),
    );
	echo "Shipping in " . $times[$index] .'.';
?>
