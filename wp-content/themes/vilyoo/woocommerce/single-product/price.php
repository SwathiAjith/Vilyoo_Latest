<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 * Added table to show FREE SHIPPING next to amount by Swathi Ajith
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$post_id        = $product->id; 
$workshop_type = get_post_meta($post_id,'workshop_type',true);
?> 
<table style="width:100%">

	<tr>
		<td>
			<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

				<p class="price">
					<?php echo $product->get_price_html(); ?>
				</p>
				<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
				<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
				<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

			</div>
		</td>
		 
	</tr>
<tr><td><div>
			<?php if($workshop_type  == 1)
			{
				
			}
			else{?>
				<p class="freeshipping">
					FREE SHIPPING
				</p>
			<?php } ?>
			</div></td></tr>


</table>
 

 
