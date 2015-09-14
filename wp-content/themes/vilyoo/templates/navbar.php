<div class="collapse navbar-collapse pad-left pad-right">
	<ul id="main-menu" class="nav navbar-nav">
		<li class="menu-item mega-dropdown dropdown">
			<a title="Shop by medium" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Shop by medium</a>
			<ul role="menu" class=" dropdown-menu mega-dropdown-menu row">
				<div class="col-md-2">
					<strong>Paper</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 161 );
					?>
					<br>
					<strong>Leather</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 170 );
					?>
				</div>
				<div class="col-md-2">
					<strong>Glass</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 179 );
					?>
					<br>
					<strong>Bead</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 197 );
					?>
				</div>
				<div class="col-md-2">
					<strong>Clay</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 187 );
					?>
					<br>
					<strong>Wood</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 223 );
					?>
				</div>
				<div class="col-md-2">
					<strong>Paintings / Art</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 231 );
					?>
				</div>
				<div class="col-md-2">
					<strong>Thread</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 205 );
					?>
					<br>
					<strong>Metal</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 216 );
					?>
				</div>
				<div class="col-md-2">
					<strong>Supplies</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 253 );
					?>
					<br>
					<strong>Upcycled</strong>
					<?php 
						woocommerce_tags_from_parent_by_ID( 247 );
					?>
				</div>
			</ul>
		</li>
		<li class="menu-item mega-dropdown dropdown">
			<a title="Shop By Product" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Shop By Product</a>
			<ul role="menu" class="dropdown-menu mega-dropdown-menu row">
				<div class="col-md-2">
					<a title="Fashion Accessories" href="<?php echo esc_url( get_term_link( 98, 'product_cat' ) ); ?>">
						<strong>Fashion Accessories</strong>
					</a>
					<?php 
						woocommerce_subcats_from_parentcat_by_ID( 98 );
					?>
				</div>
				<div class="col-md-2">
					<a title="Home Decor" href="<?php echo esc_url( get_term_link( 109, 'product_cat' ) ); ?>">
						<strong>Home Decor</strong>
					</a>
					<?php 
						woocommerce_subcats_from_parentcat_by_ID( 109 );
					?>
				</div>
				<div class="col-md-2">
					<a title="Tablewear" href="<?php echo esc_url( get_term_link( 126, 'product_cat' ) ); ?>">
						<strong>Tablewear</strong>
					</a>
					<?php 
						woocommerce_subcats_from_parentcat_by_ID( 126 );
					?>
				</div>
				<div class="col-md-2">
					<a title="Garden Accessories" href="<?php echo esc_url( get_term_link( 136, 'product_cat' ) ); ?>">
						<strong>Garden Accessories</strong>
					</a>
					<?php 
						woocommerce_subcats_from_parentcat_by_ID( 136 );
					?>
				</div>
				<div class="col-md-2">
					<a title="Gift / Personal" href="<?php echo esc_url( get_term_link( 149, 'product_cat' ) ); ?>">
						<strong>Gift / Personal</strong>
					</a>
					<?php 
						woocommerce_subcats_from_parentcat_by_ID( 149 );
					?>
				</div>
				<div class="col-md-2">
					<a title="Festival Products" href="<?php echo esc_url( get_term_link( 144, 'product_cat' ) ); ?>">
						<strong>Festival Products</strong>
					</a>
					<?php 
						woocommerce_subcats_from_parentcat_by_ID( 144 );
					?>
				</div>
			</ul>
		</li>
		<li class="menu-item">
			<a title="Request your Customized Product" href="<?php echo site_url(); ?>/customize-product/">Customize</a>
		</li>
		<li class="menu-item">
			<a title="Workshops" href="<?php echo esc_url( get_term_link( 264, 'product_cat' ) ); ?>">Workshops</a>
		</li>
		<li class="menu-item">
			<a title="DIY KITS" href="<?php echo esc_url( get_term_link( 265, 'product_cat' ) ); ?>">DIY KITS</a>
		</li>
		<li class="menu-item mega-dropdown dropdown">
			<a href="#" id="nav-search-icon">
				<span class="fa fa-search"></span>
			</a>
			<ul class="dropdown-menu col-md-6 pull-right">
				<div id="nav-search-visible">
						<div class="col-md-12 pull-right">
							<div id="nav-search-box">
								<?php
									echo do_shortcode('[yith_woocommerce_ajax_search]');
								?>
							</div>
						</div>
					</div>
			</ul>
		</li>
	</ul>
</div>