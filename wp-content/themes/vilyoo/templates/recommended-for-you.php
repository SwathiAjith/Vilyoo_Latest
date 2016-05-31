<?php
/**
  Developed By: Aphelion Softwares Pvt Ltd.
  On Date: 30 March, 2016.
 */
?>
<?php  $product_category = get_option('woocommerce_product_category');
       
switch ($product_category) {
    case 98:
        $img_src =  'wp-content/themes/vilyoo/includes/images/fashion_accessories.jpg';
        $category_name = "FASHION ACCESSORIES";
        break;
    case 109:
        $img_src = 'wp-content/themes/vilyoo/includes/images/home_decor.jpg';
        $category_name= "HOME DECOR";
        break;
    case 126:
        $img_src = 'wp-content/themes/vilyoo/includes/images/table_wear.jpg';
        $category_name="TABLE WEAR";
        break;
    case 136:
        $img_src = 'wp-content/themes/vilyoo/includes/images/garden_accessories.jpg';
        $category_name= "GARDEN ACCESSORIES";
        break;
    case 149:
        $img_src = 'wp-content/themes/vilyoo/includes/images/gift_personal.jpg';
        $category_name= "GIFT / PERSONAL";
        break;
    case 144:
        $img_src = 'wp-content/themes/vilyoo/includes/images/festival_products.jpg';
        $category_name= "FESTIVAL PRODUCTS";
        break;
    case 265:
        $img_src = 'wp-content/themes/vilyoo/includes/images/DIY_kits.jpg';
        $category_name= "DIY KITS";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>
<section>
  
     <div class="container">
   <div class="row  bgwhite_cont gift_boxbottom">
   			
   <div class="design_box">
   <div class="col-md-2">
        <div class="text-center ">
        
          <div class="cat_brand">
        <img class="imgmob" src=<?php echo $img_src; ?> alt=""></div>
            
           
          
         </div></div>
 
     <div class="col-md-4">
     <div class="bottom_box">
     <h3> Recommended for you</h3>
     <h2><?php echo $category_name; ?>
     </h2>    
     <h4> 
     Don't forget to treat the most loved person</h4>
      <p><a title="Gift yourself" href="<?php echo esc_url( get_term_link( intval($product_category) , 'product_cat' ) ); ?>">Gift yourself</a></p></div>
     
     
     </div>
         <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 2, 'category' => $product_category , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
      <?php while ( $loop->have_posts() ) : $loop->the_post(); global 

$product; ?>
       <div class="col-md-3 col-sm-6">
      
      
         
          <div class="small_box">
      <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                        
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt=" "/>'; ?>
       	  </a>
       </div>
             
   </div>
   <?php endwhile; ?> 
      
                                   
      
    
</div>
</div>
</div>
</div>

</section>