<?php
/**
  Developed By: Aphelion Softwares Pvt Ltd.
  On Date: 30 March, 2016.
 */
?>
<section class="bgblack_cont">
     <div class="container">
   <div class="row">   		
   <div class="col-sm-12">
    <div  class="section-title white">
 
   <h4 class="text_centre">Our customer & artists appreciate vilyoo effort and is visible from their comments</h4>
   </div>
   </div>
   </div>
   
   <div class="tablerow">
    
     <?php
        $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 2,'orderby' => 'rand' );
         $loop = new WP_Query( $args );?>
         
        <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
    <?php $post_content =  $loop->post->post_content;
          $post_title =  $loop->post->post_title;
          $client_name =  get_post_meta($loop->post->ID, '_ikcf_client', true); 
          	?>
          	 
                                    <div class="testimonial-block">
   
                       
                                        <blockquote>
                                            <p><?php echo $post_content; ?></p>
                                            
                                        <div class="testimonial-avatar"><?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="50px" height="50px" />'; ?></div>
                                        <div class="testimonial-info">
                                            <div class="testimonial-info-in">
                                                <p> <?php echo $post_title; ?></p>
                                                  <p class="sub-text"><?php echo $client_name;?> </p>
                                            </div>
                                        </div>
                                        </blockquote>
                                     
                                  </div> 

                    
                

    <?php endwhile; ?>
   
    <?php wp_reset_query(); ?>
                        
                               
                  
                               
                             
                                   
                        
                        </div>
   
   </div>
  
  </section>