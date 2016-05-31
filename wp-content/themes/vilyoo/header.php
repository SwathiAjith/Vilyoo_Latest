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
			<div class="site-header-inner col-sm-12">
				<div id="hide-on-scroll-nav" class="row">
					<div class="col-md-3 header-logo">
						<?php $header_image = get_header_image();
						if ( ! empty( $header_image ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
							</a>
						<?php } else { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php echo get_template_directory_uri() .'/includes/images/vilyoo-logo.png' ?>" width="230" alt="">
							</a>
						<?php } ?>
					</div>
					<div class="col-md-9 pad-right text-right text_font">
                    <div class="col-md-12"><ul id="header-submenu" class="header-subtop text_font">
							
							<li>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
									<strong><span class="fa fa-user"></span> <?php 
									if (is_user_logged_in()) { 
										echo "My Account";
									} else {
										echo "Login";
									}
									?> </strong>
								</a>
							</li>
                            <li><a title="Shopping Bag" href="#"><strong><i class="fa fa-shopping-cart"></i></strong>  ( 0 )</a></li>
						</ul></div>
                         <div class="col-md-12"><ul id="header-submenu" class="header-subtop">
							
							
							<li class="bold_text">
							
									<strong>
                                    <span class="fa fa-envelope"></span>&nbsp;
                                    <a href="mailto:support@vilyoo.com"> support@vilyoo.com</a></strong> 
                                
							</li>
                            
							<li class="bold_text">
									<strong>
                                    <span class="fa fa-phone"></span>&nbsp;
                                    <a href="tel:+91-7411300425"> +91-7411300425</a></strong> 
                                    </li>
						</ul></div>
						
					</div>
				</div>
				<div class="col-md-12 header-search">
					<nav id="primary-nav-wrap" class="site-navigation">
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
									<?php include get_template_directory().'/templates/navbar.php'; ?>
									<!-- 
									<?php 
										wp_nav_menu(
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
										);
									 ?>
									-->

								</div><!-- .navbar -->
							</div>
						</div>
					</nav><!-- .site-navigation -->
				</div>
			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<div class="main-content">
