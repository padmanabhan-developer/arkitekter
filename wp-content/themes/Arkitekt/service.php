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
<div id="banner" class="white-bg">
     	  <div class="container">
          	   <div class="banner_inner">
               		<?php 
					if(get_field('bannerimage',get_the_ID())){
				  	$bannerimage = get_field('bannerimage',get_the_ID()); 
				  	?>
               			<img src="<?php echo $bannerimage; ?>" alt="" />
                   	<?php } 
					else{?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/services.jpg" alt="" />
                    <?php } ?>
                    <div class="banner_layer">
                    	<div class="banner_table">
                        	<div class="banner_td">
                            	 <div class="banner_text">
                                 	  <h2><?php the_title(); ?></h2>
                                      <p><?php the_excerpt(); ?></p>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div><!--close container-->
     </div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="content">
  <input type="hidden" id="postid" name="postid" value="<?php echo get_the_ID()?>" />   	  
          <div class="about_section white-bg">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2  class="title-main"><?php echo $value1 = get_field( "content_title"); ?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                            <?php echo $value1 = get_field( "cotent_text"); ?>
                      </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
		<?php 
        $posts = get_field('services_project');
        if( $posts ): 
		 $posts_c = get_field('services_project');
		// print_r($posts_c);
		?>
        <span style="display:none;">
		<?php
		$catArr = array();
		 foreach($posts_c as $post_c){
			echo  $post_c->ID."--";
			$category_detail = get_the_category($post_c->ID);
			foreach($category_detail as $cd){
				echo  get_cat_id($cd->name);
				$catArr[] = get_cat_id($cd->name);
			}
		 }
		?>
		</span>
          <div class="about_section gray-bg single-service">
          <input type="hidden" id="include_filter" name="include_filter" value="0" />
          <input type="hidden" id="view_type" name="view_type" value="grid" />
          <input type="hidden" id="include_sort" name="include_sort" value="time" />
           
          	   <div class="container ajax_services">
               		
                    <div class="filter_section">
                        <div class="filter1">
                         	  <div id="button">
                                  <a class="showsorter menu_class">Sorter</a>
                                  <div class="the_menu">
                                           <ul>
                                            	<li class="change_view_services" viewtype="grid" >Grid</li>
                                                <li class="change_view_services" viewtype="list" >Liste</li>
                                            </ul>
                                            <ul>
                                                <li class="sort_services" sort="time">Kronologisk</li>
                                                <li class="sort_services" sort="alphabets">Alfabetisk</li>
                                                <li class="sort_services" sort="location">Lokation</li>
                                             </ul>
                                  </div><!--close the_menu-->
                              </div><!--close button-->
                         </div><!--close filter1-->
                         
                         
                         <div class="filter2">
                         	  <div id="button2">
                                  <a class="showfilter menu_class2">Fagligt felt</a>
                                  <div class="the_menu2">
                                       <ul>
                                		 <?php
                                       $custom_terms = get_terms('categories_project');
										foreach($custom_terms as $custom_term) {
											//echo $custom_term->slug;
											wp_reset_query();
											$args = array('post_type' => 'projects',
												'tax_query' => array(
													array(
														'taxonomy' => 'categories_project',
														'field' => 'slug',
														'terms' => $custom_term->slug,
													),
												),
											 );
											 $loop = new WP_Query($args);
											 if($loop->have_posts()) {
												echo '<li class="cl_services" cid="'.$custom_term->term_id.'" data-taxslug="'.$custom_term->slug.'" data-postid="'.get_the_ID().'" type="cat">'.$custom_term->name.'</li>';
											 }
										}
									?>                           
                                            </ul>
                                  </div><!--close the_menu-->
                              </div><!--close button-->
                         </div><!--close filter2-->
                    
                          
                    </div>
        <?php $countproject = 1?>            
		<div class="service_signle_row">
		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); 
		$post = get_post( $post->ID );
  			if($countproject==11){ break;}
			if($countproject <=2) {
				get_the_ID();
		?>
                <div class="postbig" data-projid="<?php echo get_the_ID();?>">
                    <div class="case-inner">
                         <?php if ( has_post_thumbnail() ) : 
						 
						 ?>
                          <img class="service_post_big_image" src="<?php the_post_thumbnail_url(); ?>" style="width:100%;height:334px;"/>
                          <?php else:?>
                         <img class="service_post_big_image" src="<?php echo get_template_directory_uri(); ?>/images/default-project.jpg" style="width:100%;height:334px;"/>  
                        <?php endif; ?>
                         <div class="cases">
                              <div class="cases_table">
                                    <div class="cases_td">
                                         <div class="cases_text_inner">
                                              <h2><?php the_title(); ?></h2>
                                              <p><?php
											  $content = get_the_content();
											  $trimmed_content = wp_trim_words( $content, 30, NULL );
											  echo $trimmed_content; ?></p>
                                              <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                              <h6><?php echo the_field('location'); ?></h6>
                                          </div>
                                     </div>
                                </div>
                        </div>
                    </div>
                 </div>
        <?php 
		if($countproject ==2){
			
		?>
		</div>
		<div id="grid">
		<div id="posts"  class="ajax_service_content">
		<?php
		}
			}
			else{?>
             <div class="post" data-projid="<?php echo get_the_ID();?>" >
                  <div class="case-inner">
                                <?php if ( has_post_thumbnail() ) : ?>
									<?php
									$url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
									$url = img_resize_project_related($url_orinignal, 260, 150, true);
									 else: 
									$url =get_template_directory_uri().'/images/default-project.jpg';
									 endif; ?>
                                    <img src="<?php echo $url; ?>" />
                                     <div class="cases">
                                          <div class="cases_table">
                                                <div class="cases_td">
                                                     <div class="cases_text_inner">
                                                          <h2><?php the_title(); ?></h2>
                                                          <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                          <h6><?php echo the_field('location'); ?> </h6>
                                                      </div>
                                          		 </div>
                                     		</div>
                                	</div>
                           		</div>
                        	</div><!--close post-->
        <?php 
			}?>
        <?php 
		$countproject++;
		endforeach;
		?>        
                  </div><!--close posts-->
 </div><!--close grid-->
               </div><!--close container-->
               <div class="container">
               <div id="list_view_service" class="list">
					               		
               </div>
               </div>
<?php if(count($posts) > 12){ ?>
<div class="button_row4" id="more_services" data-category="1">
	<a href="javascript:;" class="loadmore navigation">Load flere</a>
</div>
<?php } ?>
                   <div class="button_row4" id="last_see_all_button" style="display:none">

                    <div class="button_row5">
                    <a href="/Services" class="button-with-arrow">Se alle Ydelser</a>
                    </div>

                   </div>
          </div><!--close about_section-->
         <?php endif;?> 
     </div>

<style>
.navigation.post-navigation {
display: none;
}
</style>
</article><!-- #post-## -->
	<script>
    $( document ).ready(function() {
		//alert('hello');
    
    });
 
 

    </script>
    
