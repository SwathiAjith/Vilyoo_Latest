<?php
/**
  Developed By: Aphelion Softwares Pvt Ltd.
  On Date: 30 March, 2016.
 */
?>
<section id="home_featurecollection" >
   
   <div class="container">
   <div class="row">   		
   <div class="col-sm-12 home_content">
    <div  class="section-title">
   <h2 class="text_centre features_col">We are home to the best independent creatives</h2>
   <p class="text-center feature-heading-holder"> </p>
   <h4 class="text_centre">FEATURED COLLECTION</h4>
   
   </div>
   
   
   </div>
   </div>
   
   <div class="row">
            
             
               
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
                            <div class="shop-item">
                              
                            <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'category' => 98 , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
                                 
                               
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                   <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        <figure class="effect-chico Feature_imgbox">
                         <img src="wp-content/themes/vilyoo/includes/images/fashion_accessories.jpg" alt="" class="img-responsive"><?php endwhile; ?></figure></a>
                                     
                                 
                                
                                <div class="shop_desc">
                                    <h3><a title="Fashion Accessories" href="<?php echo esc_url( get_term_link( 98, 'product_cat' ) ); ?>">Fashion Accessories</a></h3>
                                <p> <a title="Fashion Accessories" href="<?php echo esc_url( get_term_link( 98, 'product_cat' ) ); ?>">Explore </a></p>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-6">
                        <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'category' => 109 , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
                                 
                               
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="shop-item">
                                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        <figure class="effect-chico Feature_imgbox">
                        <img src="wp-content/themes/vilyoo/includes/images/home_decor.jpg" alt="" class="img-responsive"><?php endwhile; ?></figure></a>
                                <div class="shop_desc">
                                    <h3><a title="Home Decor" href="<?php echo esc_url( get_term_link( 109, 'product_cat' ) ); ?>">Home Decor</a></h3>
                                    <p><a title="Home Decor" href="<?php echo esc_url( get_term_link( 109, 'product_cat' ) ); ?>"> Explore </a></p>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-6">
                        <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'category' => 126 , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
                                 
                               
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="shop-item">
                                 <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        <figure class="effect-chico Feature_imgbox">
                        <img src="wp-content/themes/vilyoo/includes/images/table_wear.jpg" alt="" class="img-responsive"><?php endwhile; ?></figure></a>
                                <div class="shop_desc">
                                    <h3><a title="Tablewear" href="<?php echo esc_url( get_term_link( 126, 'product_cat' ) ); ?>"> Tablewear </a></h3>
                                   <p><a title="Tablewear" href="<?php echo esc_url( get_term_link( 126, 'product_cat' ) ); ?>"> Explore </a></p>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-6">
                        <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'category' => 136 , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
                                 
                               
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="shop-item">
                                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        <figure class="effect-chico Feature_imgbox">
                        <img src="wp-content/themes/vilyoo/includes/images/garden_accessories.jpg" alt="" class="img-responsive"><?php endwhile; ?></figure></a>
                                <div class="shop_desc">
                                    <h3><a title="Garden Accessories" href="<?php echo esc_url( get_term_link( 136, 'product_cat' ) ); ?>">Garden Accessories</a></h3>
                                  <p> <a title="Garden Accessories" href="<?php echo esc_url( get_term_link( 136, 'product_cat' ) ); ?>">Explore ,</a></p>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-6">
                        <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'category' => 149 , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
                                 
                               
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="shop-item">
                                 <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        <figure class="effect-chico Feature_imgbox">
                        <img src="wp-content/themes/vilyoo/includes/images/gift_personal.jpg" alt="" class="img-responsive"><?php endwhile; ?></figure></a>
                                <div class="shop_desc">
                                    <h3><a title="Gift / Personal" href="<?php echo esc_url( get_term_link( 149, 'product_cat' ) ); ?>">Gift / Personal</a></h3>
                                    <p> <a title="Gift / Personal" href="<?php echo esc_url( get_term_link( 149, 'product_cat' ) ); ?>">Explore </a></p>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4 col-sm-6">
                        <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'category' => 144 , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
                                 
                               
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="shop-item">
                                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        <figure class="effect-chico Feature_imgbox">
                        <img src="wp-content/themes/vilyoo/includes/images/festival_products.jpg" alt="" class="img-responsive"><?php endwhile; ?></figure></a>
                                <div class="shop_desc">
                                    <h3><a title="Festival Products" href="<?php echo esc_url( get_term_link( 144, 'product_cat' ) ); ?>">Festival Products</a></h3>
                              <p><a title="Festival Products" href="<?php echo esc_url( get_term_link( 144, 'product_cat' ) ); ?>"> Explore </a></p>
                                </div>
                            </div>
                        </div><!-- end col -->

                                               
                    </div><!-- end item -->
              

                <div class="clearfix"></div>
              

                


                    <!-- end sidebar -->
                </div>
</div>
  
  </section>