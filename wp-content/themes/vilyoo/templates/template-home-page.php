<?php
/**
 * Template Name: Website Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12">
				<div id="home-featured-seller">
					<?php
					$sellers = dokan_get_feature_sellers( 1 );

					if ( $sellers ) {

				        foreach ($sellers as $key => $seller) {
				            $store_info = dokan_get_store_info( $seller->ID );
				            $rating = dokan_get_seller_rating( $seller->ID );
				            $display_rating = $rating['rating'];

				            $args = array(
								'author'     =>  $seller->ID,
								'post_type'  => 'product',
								'posts_per_page' => 3
							);

							// Query products based on author.
				            $product_query = new WP_Query( $args );

				            $i = 0;
							if ( $product_query->have_posts() ) {
                            	while ( $product_query->have_posts() ) {
                            		$i++;
                                	$product_query->the_post();
                                	if( $i === 1 ) {
                                	?>
                                	<div class="col-md-8 white-bg pad-left pad-right shadow-it">
                                		<div class="pad-left col-md-6">
                                			<?php
												$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300, 300 ) );
												if (@getimagesize($src[0])) {
													?>
													<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
														<img src="<?php echo $src[0]; ?>" alt="<?php echo get_the_title(); ?>">
													</a>
													<?php
												} else {
													echo '<img src="http://placehold.it/300x300/" alt="">';
												}
											?>
                                		</div>
                                		<div class="pad-right col-md-6">
                                			<h2><?php the_title(); ?></h2>
                                		</div>
                                	</div>
                                	<div class="col-md-4">
                                	<?php
                                	} else {
                                	?>
                                	<div class="col-xs-6 white-bg shadow-it">
                                		<?php
											$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300, 300 ) );
											if (@getimagesize($src[0])) {
												?>
												<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
													<img src="<?php echo $src[0]; ?>" alt="<?php echo get_the_title(); ?>">
												</a>
												<?php
											} else {
												echo '<img src="http://placehold.it/300x300/" alt="">';
											}
										?>
										<h4><?php the_title(); ?></h4>
									</div>
                                	
                                	<?php
                                	}
                                }
                            }
					            if ( ! $rating['count'] ) {
					                $display_rating = __( 'No ratings found yet!', 'dokan' );
					            }
					            ?>
					            <div class="row">
					            	<div class="col-xs-12">
					            		<div id="home-seller-info" class="white-bg shadow-it col-md-12 pad-left pad-right">
								            <div class="col-xs-4 text-center">
								            	<?php echo get_avatar( $seller->ID ); ?>
								            	<br />
								            </div>
								            <div class="col-xs-8">
								            	<h4>
								            		Seller : 
									                <a class="seller-name" href="<?php echo dokan_get_store_url( $seller->ID ); ?>">
									                    <?php echo esc_html( $store_info['store_name'] ); ?>
									                </a>
									            </h4>
									            <div class="social-profiles">
									                <?php 
									                	// Listing all social profiles.
									                	$profiles = $store_info['social'];
														foreach ( $profiles as $key => $profile ) {
															if( $key === "fb" ) {
																$key = "facebook";
															} else if ( $key === "gplus" ) {
																$key = "google-plus";
															}
															?>
															<a href="<?php echo $profile; ?>"><i class="fa fa-<?php echo $key; ?>"></i></a>
															<?php
														}
									                	
									                ?>
								            	</div>
								            	<div class="star-rating">
								            		<h5>
								            			Rating : 
										            	<?php echo $display_rating; ?> <i class='fa fa-star'></i>
										            </h5>
									            </div>
								            </div>
								        </div>
							        </div>
							    </div>
							</div><!-- col-md-4 -->

				            <?php
				        }
				    }

				?>
				<div class="pad-left col-md-12">
					<h2 class="text-left">Featured Seller</h2>
				</div>
			</div>

<?php get_footer(); ?>