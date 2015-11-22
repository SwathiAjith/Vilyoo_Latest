<?php
/**
 * Template Name: Customize Product Template
 */

get_header(); ?>

<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div id="customize-product-page" class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12">
				<div class="shadow-it white-bg">
					<form id="customize-form" class="form-horizontal" role="form" enctype="multipart/form-data">
						<div class="col-md-12">
							<h3 class="cus-hMain text-center">What Product do you want to customize?<span class="required">*</span></h3>
							<div id="customize-mainproduct-select" class="col-md-12 text-center mt-15">
								<?php
									$file = "customize-product-list.json";
									$products_file = get_template_directory_uri().'/static_json/'.$file;
									$json_products = file_get_contents( $products_file );
									$products_list = json_decode( $json_products );
									$products = $products_list->products;
									// var_dump( $products );
									foreach( $products as $product ) {
										?>
										<div class="main-prod-select col-md-2 <?php //if ( $product->id == 1 ): echo 'col-md-offset-1'; endif; ?>">
											<img src="<?php echo get_template_directory_uri() .'/includes/images/customized-products/' .$product->image; ?>" class="img-radio">
											<button id="<?php echo $product->id; ?>" type="button" class="btn btn-default btn-radio"><?php echo $product->name; ?></button>
											<input name="prodMainCat" type="checkbox" id="mainCat-<?php echo $product->id; ?>" value="<?php echo $product->name; ?>" class="hidden">
										</div>
										<?php
									}
									
								?>
							</div>
						</div>
						<div class="col-md-12">
							<div class="prod-bottom-part" id="prod-sub-cat-select" style="display:none;">
								<h3 class="cus-hMain text-center">Select Sub-category</h3>
								<div class="col-md-12">
									<?php
										$products = $products_list->products;
										// var_dump( $products );
										foreach( $products as $product ) {

											$prod_children = $product->children;
											echo '<div id="subCat'. $product->id .'" class="subCat-sel" style="display:none">';
											foreach( $prod_children as $prod_child ) {
												?>
												<div class="sub-prod-select space-20 col-md-2">
													<img src="<?php echo get_template_directory_uri() .'/includes/images/customized-products/' .$prod_child->image; ?>" class="img-radio">
													<button id="<?php echo $prod_child->id; ?>" type="button" class="btn btn-default btn-radio"><?php echo $prod_child->name; ?></button>
													<input type="checkbox" name="prodSubCat" id="subCat-<?php echo $prod_child->id; ?>" value="<?php echo $prod_child->name; ?>" class="hidden">
												</div>
												<?php
												if( ( $prod_child->id % 6 == 0 ) ):
													echo '<div class="clearfix"></div>';
												endif;
											}
											echo "</div>";
										}
									?>
								</div>
							
							</div>
						</div>
						<div class="prod-bottom-part-2 col-md-12" style="display:none;">
							<div class="row mt-15">
							<h3 class="cus-hMain text-center">Give us more details!</h3>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Material Preference </h3>
								</div>
								<div class="col-md-8">
									<select name="material[]" multiple class="selectpicker" data-live-search="true">
										<?php
											$materials = $products_list->materials;
											// var_dump( $products );
											foreach( $materials as $material ) {
												echo '<option id="material-'. $material->id .'" value="'. $material->name .'">'. $material->name .'</option>';
											}

										?>
									</select>
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Size<span class="required">*</span> (in Centimeters )<br><small>Enter Zero ( 0 ) if not applicable</small> </h3>
								</div>
								<div class="col-md-8 pad-left pad-right">
									<div class="col-md-4">
										<input type="number" name="length" placeholder="Length in cm" class="form-control" required>
									</div>
									<div class="col-md-4">
										<input type="number" name="width" placeholder="Width in cm" class="form-control" required>
									</div>
									<div class="col-md-4">
										<input type="number" name="height" placeholder="Height in cm" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Budget<span class="required">*</span> </h3>
								</div>
								<div class="col-md-8">
									<select name="budget" class="form-control">
										<option value="500 to 1000">500 - 1000</option>
										<option value="1001 to 1500">1001 - 1500</option>
										<option value="1501 to 2000">1501 - 2000</option>
										<option value="2001 to 3000">2001 - 3000</option>
										<option value="3000 Above">3000 Above</option>
									</select>
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Reference Image<br><small>If any</small></h3>
								</div>
								<div class="col-md-8">
									<a href="#fileUploadModal" data-toggle="modal" class="btn btn-success">
										Add files
									</a>
									<div id="imgContentsCustom"></div>					
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Describe the Requirement<span class="required">*</span></h3>
								</div>
								<div class="col-md-8">
									<textarea name="reqDesciption" class="form-control" required rows="8" placeholder="Detailed description about your requirement"></textarea>
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Preferred Shop</h3>
								</div>
								<div class="col-md-8">
									<select name="prefShop[]" multiple class="selectpicker" data-live-search="true">
										<?php
											$args = array(
										        'role'         	=> 'seller',
										        'meta_key'		=> 'offer_product_customization',
										        'meta_value'	=> 'true'
										    );
										    $sellers = get_users( $args );
										    foreach ( $sellers as $key => $seller ) {
										    
										    	$store_info = dokan_get_store_info( $seller->ID );
										    	$storeName = $store_info['store_name'];
										        ?>
										        <option value="<?php echo $seller->ID; ?>"><?php echo $storeName; ?></option>
										        <?php
										    }
									    ?>
									</select>
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Delivery Location<span class="required">*</span></h3>
								</div>
								<div class="col-md-8">
									<select name="deliveryLocation" class="selectpicker" data-live-search="true" required>
										<?php
											global $woocommerce;
											$states = indian_woocommerce_states();
											$states = $states['IN'];
											foreach ( $states as $key => $state ) {
									        ?>
										        <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
									        <?php
										    }
									    ?>
									</select>
								</div>
							</div>
							<div class="row mt-15">
								<div class="col-md-4">
									<h3 class="customize-q">Email<span class="required">*</span></h3>
								</div>
								<div class="col-md-8">
									<?php 
											if( is_user_logged_in() ){
												global $current_user;
												get_currentuserinfo();
											}
										?>
									<input type="email" class="form-control" name="userEmail" value="<?php echo $current_user->user_email; ?>" placeholder="Email Address" required>
								</div>
							</div>
						</div>
						<div class="row mb-15">
							<div class="col-xs-12 mt-15 text-center">
								<div class="col-md-12">
									<div id="cusFormSubmitResponse"></div>
									<input id="customize-submit" type="submit" value="Submit" class="btn btn-success disabled ">
								</div>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
				<div id="fileUploadModal" class="modal fade">
					<div class="modal-dialog">
					    <div class="modal-content">
					        <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					            <h4 class="modal-title">Confirmation</h4>
					        </div>
					        <div id="uploadedImgWrapper" class="modal-body">
					            <?php do_shortcode( '[jquery_file_upload]' ); ?>
					        </div>
					        <div class="modal-footer">
					            <button id="confirmFilesUploaded" type="button" class="btn btn-primary">Confirm Files</button>
					        </div>
					    </div>
					</div>
				</div>
<?php get_footer(); ?>