<?php
/**
 * Template Name: Website Home Page - Launch
 */

get_header(); ?>

<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div id="home-featured-seller">
					<div class="col-md-9 white-bg pad-left pad-right shadow-it" id="home-featured-seller-left">
						<div class="col-md-12 text-center">
							<h2 class="hero-title">
								<span>We're on a Mission,</span>
								to popularize modern <strong><em>Crafting</em></strong> techniques.
							</h2>
							<a href="#" class="btn hero-btn">Learn More</a>
						</div>
            		</div>
                	<div class="col-md-3 pad-right" id="home-featured-seller-right">
		            	<div class="col-xs-12 pad-left pad-right">
		            		<div id="home-seller-info" class="text-center white-bg shadow-it col-md-12 pad-left pad-right">
					           	<h3 class="sell-title">
					           		Sell your crafts
					           		<br>with<br>
					           		<strong><em>Vilyoo!</em></strong>
					           	</h3>
					           	<a href="<?php echo get_site_url()?>/my-account/" class="btn btn-sellwithus">Start Selling!</a>
					           	<p class="col-xs-12">
					           		<small><em>*Sign up now to get early-stage seller benefits!</em></small>
					           	</p>
					        </div>
				        </div>
					</div><!-- col-md-4 -->
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12">
				<div class="clearfix"></div>
				<div id="home-most-popular">
					<div class="vilyoo-section-header col-xs-12">
						<h4>Latest Items</h4>
					</div>
					<div class="white-bg col-md-12 shadow-it">
						<?php // echo do_shortcode( '[best_selling_products per_page="5" columns="5"]' ); ?>
						<?php echo do_shortcode( '[products per_page="10" orderby="rand" columns="5"]' ); ?>
					</div>
				</div>
				

<?php get_footer(); ?>