<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div id="slider">
     	  <div class="container">
              <div class="flexslider2">
              <?php if( have_rows('image_slider') ): ?>
 
    <ul class="slides">
 
    <?php while( have_rows('image_slider') ): the_row(); ?>
 
        <li><img src="<?php echo get_sub_field('slider_images'); ?>" alt="" /></li>
        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
                   
               </div>
           </div>
       </div>

       <div id="content">
     	  <div class="section-gray home-section1">
          	   <div class="container">
               		<div class="section1_inner">
                    	 <div class="colom1">
                         	  
                         	  <div class="col1-inner">
                              	   <h2><?php echo get_the_title(83); ?></h2>
                                   <p><?php $con= get_post_field('post_content', 83); echo $con; ?></p>
                                    <a href="<?php echo get_permalink(83);?>" class="button-with-arrow">Se alle nyheder</a>
                              </div>
                         </div><!--close colom1-->
                         <?php
                        while ( have_posts() ) : the_post(); 
						$first = get_field('displayfirst');
						
						$second = get_field('displaysec');
						$third = get_field('displaythi');
						
						$cfir = get_field('disfirst');
						$csec = get_field('dissec');
						$vi =get_field('video_banner');
						endwhile;
						
							$cont=1;
						?>
                         <div class="colom2">
                        <?php 	
							foreach( $first as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
							<?php
							if($cont == 1){
							 ?>
                           
						
                         	  <div class="col2_inner">
                              	   <div class="col2_inner_image">
                                   	    <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:180px;height:234px;"/>
	
<?php endif; ?>
                                        <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="text_layer">
                                                         
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                   </div>
                                   <div class="col2_inner_text">
                                   		<h6><?php the_date('d | m | Y'); ?></h6>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                   </div>
                              </div>
                              <?php } 
							  elseif($cont==2){?>
                              
                              <div class="col2_inner">
                              	   <?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img src="<?php the_post_thumbnail_url(); ?>" style="height:111px;width:347px;"/>
	</a>
<?php endif; ?>
                                   <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="text_layer">
                                                    	 <h5><?php the_date('d | m | Y'); ?></h5>
                                                         <h3><?php the_title(); ?></h3>
                                                         <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                              </div>
                       
                        <?php } ?>   
                        <?php 
						$cont++;
						endforeach; ?>
                        </div>
                         <?php  
							
							
							$conts=1;
						?>
                        <div class="colom3">
                        
                        <?php 	
						 	
							foreach( $second as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
							
							
							
                              <div class="col3_inner">
                              	     <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:168px;height:111px;" />
	
<?php endif; ?>
                                   <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="text_layer">
                                                    	 <h5><?php the_date('d | m | Y'); ?></h5>
                                                         <h3><?php the_title(); ?></h3>
                                                         <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                              </div>
                              
                           <?php endforeach; ?>   
                              
                              
                         </div>
                      <?php
							$cos=1;
						?>
                        
                        <div class="colom2">
                         	  <?php 
							foreach( $third as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); 
							  if($cos <= 2){
							  
							  ?>
                              
                              <div class="col4_inner">
                              	   <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:168px;height:111px;" />

<?php endif; ?>
                                   <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="text_layer">
                                                    	 <h5><?php the_date('d | m | Y'); ?> </h5>
                                                         <h3><?php the_title(); ?></h3>
                                                         <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                              </div>
                          
                              
                              <?php } else{?>
                         	  <div class="col2_inner">
                              	   <div class="col2_inner_image">
                                   	    <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:180px;height:234px;" />
	
<?php endif; ?>
                                        <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="text_layer">
                                                         
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                   </div>
                                   <div class="col2_inner_text">
                                   		<h6><?php the_date('d | m | Y'); ?></h6>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                   </div>
                              </div>
                             <?php 
							  }
							 $cos++;
							endforeach; ?> 
                         </div>
                          </div>
                        
                    </div><!--close section1_inner-->
               </div><!--close container-->
          </div><!--close home-section1-->
          
          <div class="section-white home-section2">
          	   <div class="container">
               		<div class="cases_text">
                    	 <h2><?php echo get_the_title(110); ?></h2>
                         <p><?php $con= get_post_field('post_content', 110); echo $con; ?> </p>
                         <a href="<?php echo site_url(); ?>/cases/" class="button-with-arrow">Se alle cases</a>
                    </div>
                    
                    <div class="cases_row">
                    <?php 
					$cont=1;
					foreach( $cfir as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post); ?>
					
                    	 <div class="case-big">
                         	  <div class="case-inner">
                                      <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:708px;height:430px;" />
	
<?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <p><?php the_content(); ?> </p>
                                                         <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div><!--close case-big-->
                         <?php $cont++; endforeach;  
						   
                       $cont=1;
					foreach( $csec as $post): // variable must be called $post (IMPORTANT) ?>
        		<?php setup_postdata($post); ?>  
                         <div class="case-small">
                         	  <div class="case-inner">
                               <?php if ( has_post_thumbnail() ) : ?>
	
							   <img src="<?php the_post_thumbnail_url(); ?>" style="width:360px;height:209px;" />
	
								<?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <p><?php the_content(); ?> </p>
                                                         <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div><!--close case-small-->
                         <?php endforeach; ?>
                         
                         <!--close case-small-->
                    </div><!--close cases_row-->
               </div><!--close container-->
          </div><!--close home-section1-->
          
          <div class="section-gray home-section3">
          	   <div class="container">
               <?php
               foreach( $vi as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
               		<div class="home_secion3_inner">
                    	<?php if ( has_post_thumbnail() ) : ?>
	
							 <?php the_post_thumbnail($size); ?>
	
								<?php endif; ?>
                         <div class="video_text">
                         	  <div class="video_table">
                              	   <div class="video_td">
                                   		<div class="video_text_inner">
                                        	 <h2><?php the_title(); ?></h2>
                                             
                                             <p><?php the_content(); ?></p>
                                             <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <?php endforeach; ?>
                    <!--<div class="button_row"><a href="#" class="button-with-arrow">Se alle videoer</a></div>-->
               </div><!--close container-->
          </div><!--close home-section1-->
     </div>

<?php
get_sidebar();
get_footer();
