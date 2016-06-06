<?php
/**
Developed By: Aphelion Softwares Pvt Ltd.
On Date: 30 March, 2016.
*/
?>
<?php
$limit   = 1;
$sellers = dokan_get_feature_sellers( $limit );

if( $sellers )
{
	foreach($sellers as $key => $seller)
	{
		$store_user = get_userdata( get_query_var( 'author' ) );
		$seller_ID = $seller->ID;
		$store_info = dokan_get_store_info( $seller->ID );
		$store_name = isset( $store_info['store_name'] ) ? esc_html( $store_info['store_name'] ) : __( 'N/A', 'dokan' );
		$seller_desc    = get_usermeta( $seller_ID, 'description' );
		$banner_id  = isset( $store_info['banner'] ) ? $store_info['banner'] : 0;
		if( $banner_id ){
			$banner_url = wp_get_attachment_image_src( $banner_id, 'medium' );
		}
	}
}
?>
<section id="featured_seller">

	<div class="container">
	<div class="row  bgwhite_cont gift_boxbottom">

	<div class="design_box">
	<div class="col-md-2">
		<div class="text-center ">

			<div class="bot_brand">
       <a href="<?php echo dokan_get_store_url($seller->ID ); ?>"><?php echo get_avatar( $seller->ID , 140 ); ?>  </a>
          
		</div>
	</div></div>
	<div class="col-md-4">
     <div class="bottom_box">
     <h3> Artist of the week </h3>
     </br>  
     <h4> <?php echo $seller_desc; ?></h4>
     
    
      
     
     
     </div></div>
   <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 2, 

'author' => intval($seller_ID) , 'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
      <?php while ( $loop->have_posts() ) : $loop->the_post(); global 

$product; ?>
		<div class="col-md-3 col-sm-6">

      <div class="small_box">
      <a href="<?php echo get_permalink( $loop->post->ID ) ?>" 

title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : 

$loop->post->ID); ?>">

                        
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo 

get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img 

src="'.woocommerce_placeholder_img_src().'" alt="" />'; ?>

                        

                    </a>
       </div>
        
                  
                    
      
   </div>
   <?php endwhile; ?> 
   
</div>
</div>
</div>

</section>