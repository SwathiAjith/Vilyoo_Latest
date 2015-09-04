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
				<span class="seller-rating-tooltip" title="Based on <?php echo $rating_info['count']; ?> reviews."><?php echo $rating_info['rating'];?> / 5</span><br>
			</p>
		</div>
		<div class="col-md-12 text-center mb-15">
			<a href="#contact-seller-form-popup" data-toggle="modal" class="btn btn-default">Contact Seller</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div id="contact-seller-form-popup" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="contact-seller-pop" id="contact-seller-pop" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Contact <?php echo $store_info['store_name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <div id="pop-form-header">

                        </div>
                        <div class="row mb-15">
                            <div class="col-md-6">
                                <input id="v_fullname" name="fullname" class="form-control" placeholder="Full Name" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <input id="v_phone" type="text" name="phone" class="form-control" placeholder="Phone Number" pattern=".{10,}" title="10 digits minimum" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-md-12">
                                <input id="v_email" name="email" class="form-control" placeholder="Email Address Name" type="email" required>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-md-12">
                                <textarea id="v_message" class="form-control" rows="6" name="message" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <p>
                            <small>All fields are required</small>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input name="contact-authorID" id="contact-authorID" type="hidden" value="<?php echo $author->ID; ?>">
                        <?php
                            global $wp;
                            $current_url = home_url( add_query_arg( array(), $wp->request ) );
                        ?>
                        <input name="contact-url" id="contact-url" type="hidden" value="<?php echo $current_url; ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" id="vilyoo-contact-seller-submit-btn" class="btn btn-success" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>