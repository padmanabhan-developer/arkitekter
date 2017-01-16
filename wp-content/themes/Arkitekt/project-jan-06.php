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
               		<div id="grid2" class="1">
                        <div id="posts2">
                            <?php if( have_rows('project_gallery_rep') ):
							$co=1;
							while( have_rows('project_gallery_rep') ): the_row(); 
							$image = get_sub_field('projrct_gallery');
							if($co <=5){
							 ?>
                            <div class="post2">
                                <div class="case-inner">
                                 	 <img src="<?php echo get_sub_field('projrct_gallery'); ?>" alt="" />
                                    <a href="<?php echo get_sub_field('projrct_gallery'); ?>" class="project_single_page"> <div class="layer" ></div></a>
                           		</div>
                        	</div><!--close post-->
                            <?php 
							}else{
							?>
                            <a href="<?php echo get_sub_field('projrct_gallery'); ?>" class="project_single_page"> <div class="layer" ></div></a>
							<?php
							}
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
                    	 <h2 class="title-main"><?php 
						 if(get_field('first_section_title'))
						 	echo the_field('first_section_title');
						 else 
						 	echo get_the_title();
						 ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                            <?php echo the_field('first_section_textblock'); ?>
                            
                      </article>
                      
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
            <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Detaljer</h2>
                    </div>
                    
                    <div class="about_right">
                    	<?php if(get_field('title1') && get_field('text1')) {?>
                         <h3><?php echo the_field('title1'); ?></h3>
                         <h4><?php echo the_field('text1'); ?></h4>
                        <?php }?>
                     	<?php if(get_field('title2') && get_field('text2')) {?>
                         <h3><?php echo the_field('title2'); ?></h3>
                         <h4><?php echo the_field('text2'); ?></h4>
                        <?php }?>
                    	<?php if(get_field('title3') && get_field('text3')) {?>
                         <h3><?php echo the_field('title3'); ?></h3>
                         <h4><?php echo the_field('text3'); ?></h4>
                        <?php }?>
                    	<?php if(get_field('title4') && get_field('text4')) {?>
                         <h3><?php echo the_field('title4'); ?></h3>
                         <h4><?php echo the_field('text4'); ?></h4>
                        <?php }?>
                    	<?php if(get_field('title5') && get_field('text5')) {?>
                         <h3><?php echo the_field('title5'); ?></h3>
                         <h4><?php echo the_field('text5'); ?></h4>
                        <?php }?>
                    	<?php if(get_field('title6') && get_field('text6')) {?>
                         <h3><?php echo the_field('title6'); ?></h3>
                         <h4><?php echo the_field('text6'); ?></h4>
                        <?php }?>
                    	<?php if(get_field('title7') && get_field('text7')) {?>
                         <h3><?php echo the_field('title7'); ?></h3>
                         <h4><?php echo the_field('text7'); ?></h4>
                        <?php }?>
                    	<?php if(get_field('title8') && get_field('text8')) {?>
                         <h3><?php echo the_field('title8'); ?></h3>
                         <h4><?php echo the_field('text8'); ?></h4>
                        <?php }?>
                        <?php if(get_field('google_map_link')){?>
                        <h3><a target="_blank" href="<?php echo get_field('google_map_link'); ?>">Google maps</a></h3>
                        <?php } ?>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->          
          <?php if(get_field('pdf_attachment')){?>
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Dokumentation</h2>
                    </div>
                    
                    <div class="about_right">
                    	 <p><?php the_field('pdf_documentation'); ?></p>
                    	 
                         <div class="button_row2"><a target="_blank" href="<?php the_field('pdf_attachment'); ?>" class="download no-margin">Download</a></div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
        	<?php }?>  
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Menneskerne bag</h2>
                    </div>
                    
                    <div class="about_right">
                    	 <p class="pera1"><?php echo the_field('member_doc'); ?></p>
                    	 <div class="partner_row">
                         
                         	  <ul>
                          <?php 

$posts = get_field('member_add');
if( $posts ): ?>
   
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        	<li>
               	<div class="partner">
                   <?php if ( has_post_thumbnail() ) : 
				   //echo get_post_thumbnail();
				   ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="partnerimg <?php echo get_the_ID();?>" />
					<?php endif; ?>
                                             <div class="partner_text">
                                             	  <span>
                                                  	<strong><?php the_title(); ?></strong><br>
                                                    <?php the_field('post_name'); ?><br>
                                                     <?php if(get_field('achieved')){?>
													 <?php the_field('achieved'); ?><br>
                                                     <?php } ?>
                                                     <?php if(get_field('achieved')){?>
                                                    Tel. <?php the_field('telephone'); ?><br>
                                                    <?php } ?>
                                                    <?php if(get_field('achieved')){?>
													<?php the_field('email'); ?>
                                                    <?php } ?>
                                                  </span>
                                             </div>
                                        </div>
                                    </li>
    <?php endforeach; ?>
   
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?> 	  
                              </ul>
                         </div>
                         <div class="button_row2"><a href="<?php echo get_site_url()?>/medarbejdere" target="_blank" class="button-with-arrow">Se alle medarbejdere</a></div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section single-service">
          	   <div class="container">
               		
               	   <div class="about_left">
                    	 <h2>Relaterede projekter</h2>
                    </div>
               		
                    
               		<div id="grid">
                        <div id="posts">
                    <?php
					$pid = get_the_ID();
					$terms = get_the_terms( $pid , 'categories_project', 'string');
					//Pluck out the IDs to get an array of IDS
					$term_ids = wp_list_pluck($terms,'term_id');
					
					//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
					//Chose 'AND' if you want to query for posts with all terms
					$second_query = new WP_Query( array(
					'post_type' => 'projects',
					'tax_query' => array(
					array(
					'taxonomy' => 'categories_project',
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
	 ?>
     
        <div class="post" id="posid-<?php get_the_ID();?>">
                                <div class="case-inner">
                                           <?php if ( has_post_thumbnail() ) : 
										 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
										 $url = img_resize($url_orinignal, 260, 150, true);
										 else: 
										 $url = get_template_directory_uri().'/images/default-project.jpg';
										 endif; ?>

                                            <img src="<?php echo $url; ?>" alt="" />
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <!--<p><?php the_content(); ?> </p>-->
                                                         <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                         <h6><?php echo get_field('location'); ?> </h6>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div>
       
       
   <?php
   $co++;
   endwhile; wp_reset_query();
   }?>
                    
                    </div>
                    
                    <div class="button_row5"><a href="<?php echo site_url(); ?>/projekter/" class="button-with-arrow">Se alle projekter</a></div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
     </div>