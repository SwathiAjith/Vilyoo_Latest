<?php
/**
 * Template Name: Website Home Page
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
                                	<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                            			<?php
											$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
											if (@getimagesize($src[0])) {
												?>
													<!-- <img src="<?php echo $src[0]; ?>" alt="<?php echo get_the_title(); ?>"> -->
													<div class="col-md-8 white-bg pad-left pad-right shadow-it" id="home-featured-seller-left" style="background-image: url('<?php echo $src[0]; ?>');">
												<?php
											} else {
												echo '<img src="http://placehold.it/700x400/" alt="">';
											}
										?>
											<div class="featured-seller-1-price">
                                				<?php 
													$price = get_post_meta( $post->ID, '_regular_price' );
													echo get_woocommerce_currency_symbol() .' '. $price[0]; 
												?>
											</div>
                                			<div class="col-md-12" id="featured-seller-1-wrap">
	                                			<h2 class="prod-title"><?php the_title(); ?></h2>
	                                			<p>
	                                				<?php the_excerpt(); ?>
	                                			</p>
	                                		</div>
                                		</div>
                                	</a>
                                	<div class="col-md-4 pad-right" id="home-featured-seller-right">
                                	<?php
                                	} else {
                                	?>
                                	<div class="col-xs-6 white-bg shadow-it home-seller-featured-2-3">
                                		<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
	                                		<?php
												$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( 300, 300 ) );
												if (@getimagesize($src[0])) {
													?>
												
													<img src="<?php echo $src[0]; ?>" alt="<?php echo get_the_title(); ?>">
												
													<?php
												} else {
													echo '<img src="http://placehold.it/300x300/" alt="">';
												}
											?>
											<div class="featured-seller-2-3-price">
												<?php 
													$price = get_post_meta( $post->ID, '_regular_price' );
													echo get_woocommerce_currency_symbol() .' '. $price[0]; 
												?>
											</div>
											<h4 class="prod-title text-center"><?php the_title(); ?></h4>
										</a>
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
								            <div class="col-xs-3 text-center">
								            	<?php echo get_avatar( $seller->ID ); ?>
								            	<br />
								            </div>
								            <div class="col-xs-9">
								            	<h4>
								            		Featured Shop : 
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
				    wp_reset_query();
				?>
			</div>
			<div class="clearfix"></div>
			<div id="home-most-popular">
				<div class="vilyoo-section-header col-xs-12">
					<h4>Most Popular Products</h4>
				</div>
				<div class="white-bg col-md-12 shadow-it">
					<?php echo do_shortcode( '[best_selling_products per_page="5" columns="5"]' ); ?>
				</div>
			</div>
			<div id="home-latest-workshops">
				<div class="vilyoo-section-header col-xs-12">
					<h4>Latest Workshops</h4>
				</div>
				<div class="white-bg col-md-12 shadow-it">
					<?php echo do_shortcode( '[best_selling_products per_page="5" columns="5"]' ); ?>
				</div>
			</div>

<?php get_footer(); ?>