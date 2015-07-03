<?php
/**
 * Single Product Rating
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
	<div class="col-md-12 pad-left">
		<?php 
		if ( $rating_count > 0 ) : ?>
			<div class="woocommerce-product-rating col-md-6 pad-left" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
				<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
					<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
						<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
						<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
					</span>
				</div>
				<?php if ( comments_open() ) : ?><br><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?>)</a><?php endif ?>
			</div>

		<?php endif; ?>
		<div class="single-sold-by col-md-6">
			<?php
				$author     = get_user_by( 'id', $product->post->post_author );
			    $store_info = dokan_get_store_info( $author->ID );
			    $store_name = $store_info['store_name'];
			    echo "<p>";
			    printf( '<strong>SOLD BY</strong><br><a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_name );
			    $rating_info = dokan_get_seller_rating( $author->ID );
			?>
				<span class="seller-rating-tooltip" data-toggle="tooltip" data-placement="top" title="Based on <?php echo $rating_info['count']; ?> reviews."><?php echo $rating_info['rating'];?> / 5</span><br>
			</p>
		</div>
	</div>
	<div class="clearfix"></div>