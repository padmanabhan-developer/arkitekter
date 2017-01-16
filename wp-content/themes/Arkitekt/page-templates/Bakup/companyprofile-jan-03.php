<?php
/**
 * Template Name: Company Profile
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
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
<?php
     	// while ( have_posts() ) : the_post(); $post_id=get_the_ID(); ?>
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php echo get_field( 'section1_title',72 ); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                            <?php echo get_field( 'section1_textblock',72 ); ?>
                      </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Partnere</h2>
                    </div>
                    
                    <div class="about_right">
                    	 <div class="partner_row">
                         	  <ul>
                              <?php
							  $ff= get_field('section_member');
							  ?>
                                <?php 	
							foreach( $ff as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
                              		<li>
                                    	<div class="partner">
                                          <?php if ( has_post_thumbnail() ) : 
										 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
										 $url = img_resize($url_orinignal, 170, 180, true);
										 else: 
										 $url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 170, 180, true);
										 endif; ?>
                                         <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title()?>" />
                                            <div class="partner_text">
                                             	  <span>
                                                  	<strong><?php the_title(); ?></strong><br>
                                                    <!--<?php the_field('post_name');?><br>-->
                                                    <?php the_field('man_post'); ?><br>
                                                    Tel. <?php the_field('telephone');?><br>
                                                    <?php the_field('email');?>
                                                  </span>
                                             </div>
                                        </div>
                                    </li>
                             <?php endforeach; ?>
                                   
                              </ul>
                         </div>
                         <div class="button_row2"><a href="<?php echo get_site_url()?>/partnere" target="_blank" class="button-with-arrow">Se mere</a></div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    <?php
                    //$field = get_field_object('section3_title',$post_id);
					//if ( $field ):
					?>
                    	 <h2><?php echo the_field('section3_title',72); ?></h2>
                    <?php
					//endif; ?>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                           <?php  the_field('section3_textblock',72); ?>
                          
                      	</article>
                      <div class="button_row3"><a href="<?php echo site_url(); ?>/contact/" class="button-with-arrow">Kontakt</a></div>
                    </div>
                    
                    
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	<h2><?php echo the_field( 'section4_title',72); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                             <?php echo get_field( 'section4_textblock',72); ?>
                              </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	<h2><?php echo  get_field( 'section5_title',72 ); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	  <article>
                             <?php echo get_field( 'section5_textblock',72 ); ?>
                              </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	<h2><?php echo get_field( 'section6_title',72 ); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                             <?php echo get_field( 'section6_textblock',72 ); ?>
                         </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
      <?php // endwhile; ?>    
     </div><!--close content-->
<?php
get_sidebar();
get_footer();
