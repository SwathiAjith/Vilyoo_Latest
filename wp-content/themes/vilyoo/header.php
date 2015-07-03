<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header" role="banner">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="small-top-nav">
				<div class="col-sm-12 pull-right">
					<ul>
						<li>
							<?php if (is_user_logged_in()) { ?>
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">My Account</a></li>
							<?php } else { ?>
							<a href="#vilyoo-login" data-toggle="modal">Sign in / Sign up</a></li>
							<?php } ?>
						<li><a href="<?php echo get_permalink( '4' ); ?>">Vendor dashboard</a></li>
						<li><a href="#">Track you order</a></li>
				</div>
			</div>
			<div class="site-header-inner col-sm-12">
				<div class="col-md-3 header-logo pad-left">
					<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
						</a>
					<?php } else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri() .'/includes/images/logo.png' ?>" alt="">
						</a>
					<?php } ?>
				</div>
				<div class="col-md-8 header-search pad-left">
					<?php
						echo do_shortcode('[yith_woocommerce_ajax_search]');
					?>
				</div>
				<div class="col-md-1 header-cart">
					<?php
						$cart_total = floatval( preg_replace( '#[^\d.]#', '', WC()->cart->get_cart_total() ) );
					?>
					<a class="btn btn-cart pull-right" href="<?php echo WC()->cart->get_cart_url(); ?>">
						<i class="fa fa-shopping-cart"></i>
						<span> Cart 
							<span class="cart-item-count-head">
								( <?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> )
							</span>
						</span>
					</a>
				</div>
			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<div id="vilyoo-login" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<?php wp_login_form(); ?>
			</div>
		</div>
	</div>
</div>
<nav id="primary-nav-wrap" class="site-navigation">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div class="site-navigation-inner col-sm-12">
				<div class="navbar navbar-default">
					<div class="navbar-header">
						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only"><?php _e('Toggle navigation','_tk') ?> </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
	
					</div>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location' 	=> 'primary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse pad-left pad-right',
							'menu_class' 		=> 'nav navbar-nav',
							'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
							'menu_id'			=> 'main-menu',
							'walker' 			=> new wp_bootstrap_navwalker()
						)
					); ?>

				</div><!-- .navbar -->
			</div>
		</div>
	</div><!-- .container -->
</nav><!-- .site-navigation -->

<div class="main-content">
