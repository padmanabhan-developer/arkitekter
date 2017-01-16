<?php
/**
 * Template Name: contact
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div id="wrapper">
     <div id="banner">
     	  <div class="container">
          	   <div class="banner_inner">
                  <?php 
					if(get_field('banner_image',get_the_ID())){
				  	$bannerimage = get_field('banner_image',get_the_ID()); 
				  	?>
               			<img src="<?php echo $bannerimage['url']; ?>" alt="" />
                   	<?php } 
					else{?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/services.jpg" alt="" />
                    <?php } ?>

                    <div class="banner_layer">
                    	<div class="banner_table">
                        	<div class="banner_td">
                            	 <div class="banner_text">
                                 <?php  while ( have_posts() ) : the_post(); $post_id=get_the_ID();  ?>
                                 	  <h2><?php the_title(); ?></h2>
                                       
                                      <p><?php echo get_post_field('post_content', $post_id); ?></p>
                                       <?php
										endwhile; //resetting the page loop
										wp_reset_query(); //resetting the page query
										?>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div><!--close container-->
     </div><!--close banner-->
    <div id="content">
              
              <div class="contact_section">
                   <div id="contact_grid" class="container">
                        <div id="contact_row" class="contact_row">
                        <?php 
						$custom_args = array(
						'post_type' => 'contact',
						'posts_per_page' => -1,
						);
						$custom_query = new WP_Query( $custom_args ); 
						?>
                    	<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                             <div class="con_col4">
                                  <div class="contact_inner">
                                       <div class="contact_thumb"> 
                                       <?php if ( has_post_thumbnail() ) : 
									   		$url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
											$url = img_resize($url_orinignal, 353, 237, true);
									   ?>
                                       <img src="<?php echo $url; ?>" />
									   <?php endif;?>
									   <div class="layer"></div></div>
                                       <div class="contact_text">
                                            <div class="txt_left">
                                                 <h2><?php the_title(); ?></h2>
                                                 <h3><?php echo $value1 = get_field( "title_down_text"); ?></h3>
                                                 <a href="<?php the_permalink(); ?>" class="button-small"></a>
                                            </div>
                                            <div class="txt_right">
                                                 <p><?php echo $value1 = get_field( "address1"); ?><br><?php echo $value1 = get_field( "address2"); ?><br><?php echo $value1 = get_field( "telephone"); ?><br><?php echo $value1 = get_field( "email"); ?></p>
                                            </div>
                                       </div>
                                  </div>
                             </div><!--close con_col4--> 
                        <?php endwhile; ?>     
                        </div><!--close contact_row-->
                   </div><!--close container-->
              </div><!--close contact_section-->
              
              
              
              
         </div>
<!--close content-->
</div><!--close wrapper-->
<?php
get_sidebar();
get_footer();
