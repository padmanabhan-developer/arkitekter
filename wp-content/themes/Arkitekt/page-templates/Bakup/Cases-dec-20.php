<?php
/**
 * Template Name: Cases
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="banner">
     	  <div class="container">
          <?php while ( have_posts() ) : the_post();  $post_id=get_the_ID(); ?>
          	   <div class="banner_inner">
                 <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url( $size ); ?>" alt="">
				 <?php endif; ?>
                    <div class="banner_layer">
                    	<div class="banner_table">
                        	<div class="banner_td">
                            	 <div class="banner_text">
                                 	  <h2><?php the_title(); ?></h2>
                                      <p><?php echo get_post_field('post_content', $post_id); ?></p>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
               <?php endwhile; ?>
          </div><!--close container-->
     </div>
     
     
     <div id="content">
     	  
          <div class="case-section">
          	   <div class="container">
               		 <?php 
						$custom_args = array(
						'post_type' => 'cases',
						);
						$custom_query = new WP_Query( $custom_args ); 
						
						$i = 0; $j=1;
						$totalpost = $custom_query->post_count;
						//$total_row = round( ($totalpost /2), PHP_ROUND_HALF_UP );
						$total_row = 3;
					?>
                   <div class="cases_row">
                   <?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
                     
 					if(($i > 1) && (($i % $total_row) == 0)) { $j++; ?> </div><div class="cases_row"> <?php } ?>
					
                    <?php 
						if(($i % 3) == 0 ){
							$class = 'case-big';
						}
						else {
							$class = 'case-small';
						}
						
						$rcnt =	($j % 2);
						if($rcnt == 0) {
							$class = (($i % 3) == 1 )?'case-big pull-right':'case-small pull-left';
						}
					?>
                    	 <div class="<?php echo $class; ?>">
                         	  <div class="case-inner">
                                     <?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <p><?php $content = get_the_content();
														 echo mb_strimwidth($content, 0, 90, '...') ?>
                                                         </p>
                                                         <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div><!--close case-big-->
                    <?php $i++; ?>   
                    <?php endwhile; //echo $i; ?>    
                    </div>       	   
                     <div class="button_row4"><a href="#" class="loadmore">Load flere</a></div>
               </div><!--close container-->
          </div><!--close case_section-->
     </div>
<?php
get_sidebar();
get_footer();
