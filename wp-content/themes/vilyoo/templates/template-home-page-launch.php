<?php
/**
 * Template Name: Website Home Page - Launch
 */

get_header(); ?>
<style type="text/css">
	#masthead.affix {
		margin-top:20px;
	}
</style>
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container-fluid pad-left pad-right homgBannerBg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="home-featured-seller">
						<div class="col-md-9 pad-left pad-right">
							<div class="col-md-12 text-left">
								<h2 class="hero-title">
									<span>Exquisite craft products directly</span><br />
									<span>from the maker</span>
								</h2>
								<a href="<?php echo get_site_url()?>/products/" class="btn hero-btn">Shop Now</a>
							</div>
						</div>
						<div class="col-md-3 pad-right" id="home-featured-seller-right">
							<div class="col-xs-12 pad-left pad-right">
								<div id="home-seller-info" class="text-center white-bg col-md-12 pad-left pad-right">
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
		<div id="homeLinksToProduct">
			<div class="container">
				<div class="row">
					<div class="col-md-12 pad-left pad-right">
						<div class="col-md-4 colProdLinks">
							<p class="text-center homeBannerFooterLinks">
								<a href="<?php echo get_site_url(); ?>/category/workshops/">Workshops</a>
							</p>
						</div>
						<div class="col-md-4 colProdLinks">
							<p class="text-center homeBannerFooterLinks">
								<a href="<?php echo get_site_url(); ?>/category/diy-kits/">DIY Kits</a>
							</p>
						</div>
						<div class="col-md-4 colProdLinks">
							<p class="text-center homeBannerFooterLinks">
								<a href="<?php echo get_site_url(); ?>/medium/supplies/">Supplies</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12">
<!--
				<div class="promoBanners">
					<div class="col-md-8 pad-left pad-right">
						<a href="#">
							<img src="<?php echo get_site_url()?>/wp-content/themes/vilyoo/includes/images/home-banners/Banner_product.jpg">
						</a>
					</div>
					<div class="col-md-4">
						<div class="col-xs-12 pad-left pad-right mb-15">
							<a href="#">
								<img src="<?php echo get_site_url()?>/wp-content/themes/vilyoo/includes/images/home-banners/Banner_Workshop-01.jpg">
							</a>
						</div>
						<div class="col-xs-12 pad-left pad-right mt-15">
							<a href="#">
								<img src="<?php echo get_site_url()?>/wp-content/themes/vilyoo/includes/images/home-banners/Banner_DIY.jpg">
							</a>
						</div>
					</div>
				</div>
-->
				<div id="home-most-popular">
					<p class="text-center free-shipping-holder">
						<span class="home-free-shipping">
							<img src="<?php echo get_site_url()?>/wp-content/themes/vilyoo/includes/images/bf326b-free-shipping-48.png" alt="Free Shipping" class="img-circle">
						</span>
					</p>
					<div class="vilyoo-section-header col-xs-12 mt-15">
						<h4>Latest Products</h4>
					</div>
					<div class="clearfix"></div>
					<div class="white-bg col-md-12 shadow-it">
						<?php  echo do_shortcode( '[recent_products per_page="8" columns="4" orderby="rand" order="rand"]' ); ?>
						<p class="text-center">
							<a href="<?php echo get_site_url()?>/products" class="btn hero-btn btn-shop-all">More...</a>
						</p>
					</div>
				</div>

				<div id="home-latest-workshops">
					<div class="vilyoo-section-header col-xs-12 mt-15">
						<h4>Workshops & DIY Kits</h4>
					</div>
					<div class="clearfix"></div>
					<div class="white-bg col-md-12 shadow-it">
						<?php echo do_shortcode( '[product_category per_page="4" columns="4" category="diy-kits,workshops"]' ); ?>
						<p class="text-center">
							<a href="<?php echo get_site_url()?>/category/diy-kits" class="btn hero-btn btn-shop-all">More...</a>
						</p>
					</div>
				</div>
				

<?php get_footer(); ?>