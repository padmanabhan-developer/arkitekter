<?php
/**
 * Template Name: Partnere
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div id="wrapper">
    <div id="banner" class="white-bg black">
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
     	  
          <div class="about_section white-bg management">
          	   <div class="container">
               		<div class="cases_row">
                    <?php 
						$custom_args = array(
						'post_type' => 'partnere',
						'posts_per_page' => -1,
						'orderby'   => 'meta_value',
        				'order' => 'DESC', 
						);
						$custom_query = new WP_Query( $custom_args );
						$i = 0; $j=1;
						$total_row = 2;
					?>
                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                    <?php 
						if(($i % 2) == 0 ){
							$class = 'manage-small pull-left';
							$j++; 
						}
						else {
							$class = 'manage-big pull-right';
						}
						$rcnt =	($j % 2);
						if($rcnt == 0) {
							$class = (($i % 2) == 1 )?'manage-small pull-right':'manage-big pull-left';
						}
					?>
                    		
                             <div class="<?php echo $class;  ?>">
                         	  <div class="case-inner">
                                    <img src="<?php the_post_thumbnail_url(); ?>" style="width:627px;height:372px;"/>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                    	<div class="txt_left2">
                                                         <h2><?php the_title(); ?></h2>
                                                         <h3><?php echo $value1 = get_field( "man_post"); ?></h3>
                                                         <h6>T: <?php echo $value1 = get_field( "telephone"); ?><br>E: <?php echo $value1 = get_field( "email"); ?></h6>
                                                         <?php if($class_big=="3" || $class_big=="4"){ ?>
                                                          <p><?php the_excerpt(); ?></p>
                                                          <?php } ?>
                                                         <a href="<?php the_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                         </div>
                                                         <?php if($class_big=="1" || $class_big=="2"){ ?>
                                                         <div class="txt_right2">
                                                         <p><?php the_excerpt(); ?></p>
                                                         </div>
														 <?php } ?>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div><!--close case-small-->
                   <?php 
				   $i++;
				   
				   endwhile; 
				   ?> 
                    </div>
                    
                    <div class="button_row4"><a href="<?php echo site_url(); ?>/medarbejdere/" class="button-with-arrow">Se alle medarebejdere</a></div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
     </div><!--close content-->
<!--close content-->
</div><!--close wrapper-->
<?php
get_sidebar();
get_footer();
