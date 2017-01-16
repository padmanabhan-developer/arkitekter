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
                            <?php if( have_rows('project_gallery_rep') ):
							$co=1;
							while( have_rows('project_gallery_rep') ): the_row(); 
							$image = get_sub_field('projrct_gallery');
							 ?>
                            <div class="post2">
                                <div class="case-inner">
                                <?php if($co==1){?>
                                 	 <img src="<?php echo get_sub_field('projrct_gallery'); ?>" alt="<?php echo $image['alt'] ?>"style="width:353px;height:205px;" />
                                     <?php }
									 elseif($co == 2){
										?>	<img src="<?php echo get_sub_field('projrct_gallery'); ?>" alt="<?php echo $image['alt'] ?>" style="width:353px;height:205px;" />									 
									 <?php } elseif($co == 3){
										?>	<img src="<?php echo get_sub_field('projrct_gallery'); ?>" alt="<?php echo $image['alt'] ?>" style="width:352px;height:420px;"/>									 
									 <?php } elseif($co == 4){
										?>	<img src="<?php echo get_sub_field('projrct_gallery'); ?>" alt="<?php echo $image['alt'] ?>"  style="width:353px;height:205px;"  />									 
									 <?php } elseif($co == 5){
										?>	<img src="<?php echo get_sub_field('projrct_gallery'); ?>" alt="<?php echo $image['alt'] ?>"   style="width:353px;height:205px;" />									 
									 <?php }?>
                                     <div class="layer"></div>
                           		</div>
                        	</div><!--close post-->
                            <?php 
							$co++;
							endwhile;
							endif;
							?>
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            <!--close post-->
                            
                            
                            
                  </div><!--close posts-->
                    </div><!--close grid-->
               </div><!--close container-->
          </div>
          
          <div id="content">
     
     	  
     	  
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php echo the_field('first_section_title');?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                            <?php echo the_field('first_section_textblock'); ?>
                            
                      </article>
                      
                      <!--<div class="button_row3"><a href="#" class="button-with-arrow">Detaljer</a></div>-->
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
          
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2>Dokumentation</h2>
                    </div>
                    
                    <div class="about_right">
                    	 <p><?php the_field('pdf_documentation'); ?></p>
                    	 
                         <div class="button_row2"><a href="<?php the_field('pdf_attachment'); ?>" class="download no-margin">Download</a></div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
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
                                    	       <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:169px;height:180px;"/>
	
<?php endif; ?>
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
          
          <div class="about_section single-service">
          	   <div class="container">
               		
               	   <div class="about_left">
                    	 <h2>Relaterede cases</h2>
                    </div>
               		
                    
               		<div class="cases_row">
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
	 if($co == 1){
	 ?>
     
       <div class="case-big">
                         	  <div class="case-inner">
                                    <?php the_post_thumbnail( 'related_sm', array('alt' => get_the_title()) ); ?>
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
                               <?php the_post_thumbnail( 'related_sm', array('alt' => get_the_title()) ); ?>
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
                    
                    </div>
                    
                    <div class="button_row5"><a href="<?php echo site_url(); ?>/cases/" class="button-with-arrow">Se alle cases</a></div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
     </div>