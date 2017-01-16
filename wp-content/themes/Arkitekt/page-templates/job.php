<?php
/**
 * Template Name: Job
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div id="banner" class="white-bg">
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
     
     	  
     	  
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php echo $value1 = get_field( "first_title"); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                           <?php echo $value1 = get_field( "first_textblock"); ?>
                      </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
          
          
          
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php echo $value1 = get_field( "ledige_stillinger_title"); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 
                    	 <div class="faq">
                         	      <section id="faq-list">
                                  <?php 
										$custom_args = array(
										'post_type' => 'vacancies',
										'posts_per_page' => 4,
										 'order' => 'DESC',
										);
										$custom_query = new WP_Query( $custom_args ); 
									?>
                                  <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                                        <div class="faq_box">
                                            <h2 id="closetitle-<?php echo get_the_ID();?>"><?php the_title(); ?></h2>
                                            <div class="answer">
                                            	<span class="faq-image"> <img src="<?php the_post_thumbnail_url(); ?>" style="width:auto;"/></span>
                                               <?php echo $content = the_excerpt();?>
												<div class="button_row-faq">
                                                	<span><a href="<?php the_permalink(); ?>" class="button-with-arrow">Læs mere</a></span>
                                                    <span><a href="#" class="button-with-arrow">Send ansøgning</a></span>
                                                    <?php $file = get_field('pdf'); 
													if($file){
													?>
                                                    <span><a href="<?php echo $file; ?>" class="download">Download</a></span>
                                                    <?php } ?>
                                                    <span><a href="javascript:;" class="mins_button" data-postid="<?php echo get_the_ID();?>"></a></span>
                                                </div>
                                            </div>
                                        </div>
                                   <?php endwhile; ?>      
            						</section>
                              </div>
                         <style>
						 .case-inner img {
							  height: 155px;
							}
							/*#posts .post:nth-child(2) .case-inner img{
								height: auto;
							}*/
						 </style>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div id="portraetter_section" class="about_section single-service job-section">
          	   <div class="container">
               		
               	   <div class="about_left">
                    	 <h2><?php echo $value1 = get_field("portratter_title",80); ?></h2>
                    </div>
               		
                    <div class="about_right">
                    	 <?php echo $value1 = get_field("portratter_contain",80); ?>
                     </div>
                    
                    
               		<div id="grid">
                        <div id="posts">
                            <?php 
						$custom_args = array(
						'post_type' => 'portraet',
						'posts_per_page' => 7,
						);
						$custom_query = new WP_Query( $custom_args ); 
						?>
                         <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                            <div class="post">
                                <div class="case-inner">
                                     <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                     <div class="cases">
                                          <div class="cases_table">
                                                <div class="cases_td">
                                                     <div class="cases_text_inner">
                                                          <h2><?php the_title(); ?></h2>
                                                          <a href="<?php the_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                          <h6><?php the_time('d | m | Y') ?></h6>
                                                      </div>
                                          		 </div>
                                     		</div>
                                	</div>
                           		</div>
                        	</div><!--close post-->
                       <?php endwhile; ?>       
                  </div><!--close posts-->
                    </div><!--close grid-->
               </div><!--close container-->
          </div><!--close about_section-->
     </div><!--close content-->
     <script>
        $(document).ready(function() {
            $('#faq-list a.mins_button').click(function() {
				var postid =$(this).data('postid');
                $(this).closest('.answer').slideToggle();
				$('#closetitle-'+postid).toggleClass('close');
            });
        }); // end ready
    </script>

<?php
get_sidebar();
get_footer();
