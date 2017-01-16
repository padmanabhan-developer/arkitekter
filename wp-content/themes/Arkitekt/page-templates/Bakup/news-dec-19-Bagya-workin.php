<?php
/**
 * Template Name: News
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
               <?php the_post_thumbnail('full'); ?>
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
     	  
          <div class="news_section">
          	   <div class="container">
               	    <div class="news_row">
                          <?php 
						$custom_args = array(
						'post_type' => 'news',
						'posts_per_page' => -1,
						'order' => 'DESC'
						);
						$custom_query = new WP_Query( $custom_args ); 
						$newsorder = 1;
					?>
                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
					
					?>
                         <!--close ncol4-->
                         <?php if($newsorder <=6){?>
                         <div class="ncol4">
                         	  <div class="ncol4_inner">
                              	   <div class="ncol4_inner_image">
                                   	    <img src="<?php the_post_thumbnail_url(); ?>" />
                                   </div>
                                   <div class="ncol4_inner_text">
                                   		<h6><?php the_time('d | m | Y') ?></h6>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 200, '...');?></p>
                                        <a href="<?php the_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                   </div>
                              </div>
                         </div><!--close ncol4-->
                         <?php 							 
						 if($newsorder == 6){ ?>
                         </div><div class="news_row" data-order="<?php echo $newsorder;?>">
                         <?php
						 }
							}else{
							 ?>
                             <div class="ncol3">
                         	  <div class="ncol3_inner">
                              	   <div class="ncol3_inner_image">
                                   	   <img src="<?php the_post_thumbnail_url(); ?>" />
                                   </div>
                                   <div class="ncol3_inner_text">
                                   	    <h6><?php the_time('d | m | Y') ?></h6>
                                        <h2><?php the_title(); ?></h2>
                                        <a href="<?php the_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                   </div>
                              </div>
                         </div>
                             <?php
						 }
						 $newsorder++;
					endwhile; ?> 
                    </div><!--close news_row-->
                    
                    <div class="button_row4"><a href="#" class="loadmore">Load flere</a></div>
               </div><!--close container-->
          </div><!--close news_section-->
          
          
          
          
     </div>
<!--close content-->
</div><!--close wrapper-->
<?php
get_sidebar();
get_footer();
