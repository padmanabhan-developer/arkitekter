<?php
/**
 * Template Name: service
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div id="wrapper">
<div id="banner" class="no-bg">
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
                                      <p><?php the_excerpt(); ?></p>
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
     	  
          <div class="about_section no-bg">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2 class="title-main"><?php the_title(); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                            <h6><?php echo $value1 = get_field( "section_title"); ?></h6>
                            <p> <?php echo $value1 = get_field( "section_textblock"); ?></p>
                            <div class="about_image"><img src="<?php echo $value1 = get_field( "section_text_contain_image"); ?>" alt="" /></div>
                      </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
     	  
          <div class="about_section white-bg">
          	   <div class="container">
               		<div id="grid">
                        <div id="posts">
                         <?php 
						$args = array( 'post_type' => 'services','order'=>'ASC');
						$loop = new WP_Query( $args );
						$co=1;
						$psi = array();
						$psi2 = array();
						while ( $loop->have_posts() ) : $loop->the_post(); $post_id=get_the_ID();
						
					
					?>
                            <div class="post">
                                <div class="case-inner">
                                         <?php if ( has_post_thumbnail() ) : ?>
	
<?php the_post_thumbnail($size); ?>
	
<?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                                <div class="cases_td">
                                                     <div class="cases_text_inner">
                                                          <h2><?php the_title(); ?></h2>
                                                          <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                      </div>
                                          		 </div>
                                     		</div>
                                	</div>
                           		</div>
                        	</div><!--close post-->
                           <?php  $co++;  endwhile; ?>
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            
                            
                            
                            
                  </div><!--close posts-->
                    </div><!--close grid-->
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
     </div><!--close content-->
     </div>
<?php
get_sidebar();
get_footer();
