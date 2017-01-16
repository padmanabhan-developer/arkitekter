<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>
<div class="banner2 white-bg">
          	   <div class="container">
               		<div id="grid2">
                        <div id="posts2">
                            <?php if( have_rows('cases_gallery') ):
							$co=1;
							while( have_rows('cases_gallery') ): the_row(); 
							$image = get_sub_field('cases_images');
							$bigimg = ( $co == 2 )?'big':'';
							 ?>
                            <div class="post2">
                                <div class="case-inner <?php echo $bigimg; ?>">
                                <img src="<?php echo get_sub_field('cases_images'); ?>" alt="<?php echo $image['alt'] ?>" />
                                 <a href="<?php echo get_sub_field('cases_images'); ?>" class="cases_single_page" >    
                                     <div class="layer"></div>
                                 </a>    
                           		</div>
                        	</div><!--close post-->
                            <?php 
							$co++;
							endwhile;
							endif;
							?>
                  </div><!--close posts-->
                    </div><!--close grid-->
               </div><!--close container-->
          </div>
          
          <div id="content">
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2 class="title-main"><?php echo the_field('first_tab_title');?></h2>
                    </div>
                    
                    <div class="about_right">
                    	<article>
                            <?php echo the_field('tabcontent'); ?>
                      	</article>
                      
                       <div class="fax-div">
                      <div class="faq">
                         	      <section id="faq-list">
                                  
                                        <div class="faq_box">
                                            <h2>Detaljer</h2>
                                            <div class="answer">
											<?php if(get_field('detail_title1') && get_field('detail_text1')) {?>
                                             <h3><?php echo the_field('detail_title1'); ?></h3>
                                             <h4><?php echo the_field('detail_text1'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title2') && get_field('detail_text2')) {?>
                                             <h3><?php echo the_field('detail_title2'); ?></h3>
                                             <h4><?php echo the_field('detail_text2'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title3') && get_field('detail_text3')) {?>
                                             <h3><?php echo the_field('detail_title3'); ?></h3>
                                             <h4><?php echo the_field('detail_text3'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title4') && get_field('detail_text4')) {?>
                                             <h3><?php echo the_field('detail_title4'); ?></h3>
                                             <h4><?php echo the_field('detail_text4'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title5') && get_field('detail_text5')) {?>
                                             <h3><?php echo the_field('detail_title5'); ?></h3>
                                             <h4><?php echo the_field('detail_text5'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title6') && get_field('detail_text6')) {?>
                                             <h3><?php echo the_field('detail_title6'); ?></h3>
                                             <h4><?php echo the_field('detail_text6'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title7') && get_field('detail_text7')) {?>
                                             <h3><?php echo the_field('detail_title7'); ?></h3>
                                             <h4><?php echo the_field('detail_text7'); ?></h4>
                                            <?php }?>
											<?php if(get_field('detail_title8') && get_field('detail_text8')) {?>
                                             <h3><?php echo the_field('detail_title8'); ?></h3>
                                             <h4><?php echo the_field('detail_text8'); ?></h4>
                                            <?php }?>
                                                 
                                                 <h3><a href="<?php echo the_field('google_map'); ?>" target="_blank">Google maps</a></h3>
												
                                            </div>
                                        </div>
                                        
                                        
            						</section>
                              </div>
                              </div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Menneskerne bag</h2>
                    </div>
                    
                    <div class="about_right">
                    	 <p class="pera1"><?php echo the_field('member_det'); ?></p>
                    	 <div class="partner_row">
                         
                         	  <ul>
                          <?php 

$posts = get_field('membercase');
if( $posts ): ?>
   
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
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
                                                    <?php the_field('post_name'); ?><br>
                                                     <?php the_field('achieved'); ?><br>
                                                    Tel. <?php the_field('telephone'); ?><br>
                                                    <?php the_field('email'); ?>
                                                  </span>
                                             </div>
                                        </div>
                                    </li>
    <?php endforeach; ?>
   
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?> 	  
                              </ul>
                         </div>
                         <div class="button_row2"><a href="#" class="button-with-arrow">Se alle medarbejdere</a></div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Dokumentation</h2>
                    </div>
                    
                    <div class="about_right">
                    	 <p><?php the_field('attach_pdf_description'); ?></p>
                    	 
                         <div class="button_row2"><a href="<?php the_field('attach_pdf'); ?>" class="download no-margin">Download</a></div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->

          <div class="about_section single-service">
          	   <div class="container">
               		
               	   <div class="about_left">
                    	 <h2>Relaterede cases</h2>
                    </div>
               		
                    
               		<div class="cases_row">
                    <?php
					
					$pid = get_the_ID();
$terms = get_the_terms( $pid , 'categories_csc', 'string');
if($terms):
//Pluck out the IDs to get an array of IDS
$term_ids = wp_list_pluck($terms,'term_id');

//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
//Chose 'AND' if you want to query for posts with all terms
  $second_query = new WP_Query( array(
      'post_type' => 'cases',
      'tax_query' => array(
                    array(
                        'taxonomy' => 'categories_csc',
                        'field' => 'id',
                        'terms' => $term_ids,
                        'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                     )),
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'post__not_in'=>array($pid)
   ) );
$co=1;
//Loop through posts and display...
    if($second_query->have_posts()) {
     while ($second_query->have_posts() ) : $second_query->the_post(); 
	 if($co == 1){
	 ?>
     
       <div class="case-big">
                         	  <div class="case-inner">
                                    <?php 
									
									 if ( has_post_thumbnail() ) : 
										 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
										 $url = img_resize($url_orinignal, 708, 430, true);
										 else: 
										 $url = get_template_directory_uri().'/images/thumb9.png';
										 endif; 
									//the_post_thumbnail( 'related_sm', array('alt' => get_the_title()) ); 
									
									?><img src="<?php echo $url ; ?>" alt="<?php echo get_the_title()?>" />
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
                         </div>
       
       
   <?php
	 }
	 else{
		 ?>
         <div class="case-small">
                         	  <div class="case-inner">
                               <?php 
								 if ( has_post_thumbnail() ) : 
								 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
								 $url = img_resize($url_orinignal, 360, 209, true);
								 else: 
								 $url = get_template_directory_uri().'/images/thumb10.png';
								 endif; 
							   //the_post_thumbnail( 'related_sm', array('alt' => get_the_title()) ); 
							   ?>
                               <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title()?>" />
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
                         </div>
         <?php 
	 }
   $co++;
   endwhile; wp_reset_query();
   }?>
   
   <?php endif; ?>
                    
                    </div>
                    
                    <div class="button_row5"><a href="<?php echo site_url(); ?>/cases/" class="button-with-arrow">Se alle cases</a></div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
     </div>
