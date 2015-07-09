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
					<div class="collapse navbar-collapse pad-left pad-right">
						<ul id="main-menu" class="nav navbar-nav">
							<li class="menu-item mega-dropdown">
								<a title="Paper" href="http://localhost/avani/category/paper-craft/" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
									Paper Crafts <span class="fa fa-angle-down"></span>
								</a>
								<ul role="menu" class=" dropdown-menu mega-dropdown-menu row">
									<li class="col-sm-3">
										<ul>
											<li class="dropdown-header">New in Stores</li>                            
				                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
				                              	<div class="carousel-inner">
				                                	<div class="item active">
				                                    	<a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
				                                    	<h4><small>Summer dress floral prints</small></h4>                                        
				                                    	<button class="btn btn-cart" type="button">Rs. 4999</button>   
				                                	</div><!-- End Item -->
					                                <div class="item">
					                                    <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
					                                    <h4><small>Gold sandals with shiny touch</small></h4>                                        
					                                    <button class="btn btn-cart" type="button">Rs. 999</button>       
					                                </div><!-- End Item -->
					                                <div class="item">
					                                    <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
					                                    <h4><small>Denin jacket stamped</small></h4>                                        
					                                    <button class="btn btn-cart" type="button">Rs. 4999</button>      
					                                </div><!-- End Item -->                                
				                              	</div><!-- End Carousel Inner -->
				                            </div><!-- /.carousel -->
				                            <li class="divider"></li>
				                            <li><a href="#">View more<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
										</ul>
									</li>
									<li class="col-sm-3">
										<ul>
											<li id="menu-item-197" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-197"><a title="Origami items" href="http://localhost/avani/category/paper-craft/origami-items/">Origami items</a></li>
											<li id="menu-item-198" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-198"><a title="Paper flowers" href="http://localhost/avani/category/paper-craft/paper-flowers/">Paper flowers</a></li>
											<li id="menu-item-199" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-199"><a title="Paper Mosaics" href="http://localhost/avani/category/paper-craft/paper-mosaics/">Paper Mosaics</a></li>
											<li id="menu-item-200" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-200"><a title="papier-mâché" href="http://localhost/avani/category/paper-craft/papier-mache/">papier-mâché</a></li>
											<li id="menu-item-201" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-201"><a title="Parchment craft" href="http://localhost/avani/category/paper-craft/parchment-craft/">Parchment craft</a></li>
										</ul>
									</li>
									<li class="col-sm-3">
										<ul>
											<li id="menu-item-202" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-202"><a title="Quilled products" href="http://localhost/avani/category/paper-craft/quilled-products/">Quilled products</a></li>
											<li id="menu-item-203" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-203"><a title="Scrapbooks" href="http://localhost/avani/category/paper-craft/scrapbooks/">Scrapbooks</a></li>
											<li id="menu-item-204" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-204"><a title="Sospeso" href="http://localhost/avani/category/paper-craft/sospeso/">Sospeso</a></li>
											<li id="menu-item-205" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-205"><a title="Albums" href="http://localhost/avani/category/paper-craft/albums/">Albums</a></li>
											<li id="menu-item-206" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-206"><a title="Exploding box cards" href="http://localhost/avani/category/paper-craft/exploding-box-cards/">Exploding box cards</a></li>
										</ul>
									</li>
									<li class="col-sm-3">
										<ul>
											<li id="menu-item-207" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-207"><a title="Gift Bags" href="http://localhost/avani/category/paper-craft/gift-bags/">Gift Bags</a></li>
											<li id="menu-item-208" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-208"><a title="Greeting Cards" href="http://localhost/avani/category/paper-craft/greeting-cards/">Greeting Cards</a></li>
											<li id="menu-item-209" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-209"><a title="Invitation Cards" href="http://localhost/avani/category/paper-craft/invitation-cards/">Invitation Cards</a></li>
											<li id="menu-item-210" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-210"><a title="Decoupage items" href="http://localhost/avani/category/paper-craft/decoupage-items/">Decoupage items</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<?php 
						// wp_nav_menu(
						// 	array(
						// 		'theme_location' 	=> 'primary',
						// 		'depth'             => 2,
						// 		'container'         => 'div',
						// 		'container_class'   => 'collapse navbar-collapse pad-left pad-right',
						// 		'menu_class' 		=> 'nav navbar-nav',
						// 		'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
						// 		'menu_id'			=> 'main-menu',
						// 		'walker' 			=> new wp_bootstrap_navwalker()
						// 	)
						// );
					 ?>

				</div><!-- .navbar -->
			</div>
		</div>
	</div><!-- .container -->
</nav><!-- .site-navigation -->

<div class="main-content">
