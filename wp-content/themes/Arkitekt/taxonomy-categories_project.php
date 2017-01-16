<?php

/**

 * Template Name: project Subcategory

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

get_header(); 
echo $cat_id = get_query_var('cat');
wp_reset_query();
$queried_obj = get_queried_object();
?>



<div id="banner" class="no-bg">

     	  <div class="container">

          	   <div class="banner_inner <?php echo get_the_ID()?>" >

               		<?php 
                  $banner_field = z_taxonomy_image_url();
					if($banner_field != ''){
				  	?>

               		<img src="<?php echo $banner_field; ?>" alt="" />

                   	<?php } 

					else{?>

                    <img src="<?php echo get_template_directory_uri(); ?>/images/projekt_banner.jpg" alt="" />

                    <?php } ?>

                    <div class="banner_layer">

                    	<div class="banner_table">

                        	<div class="banner_td">

                            	 <div class="banner_text">

                                 	  <h2><?php echo $queried_obj->name; ?></h2>

                                      <p><?php echo $queried_obj->description; ?></p>

                                 </div>

                            </div>

                        </div>

                    </div>

               </div>

          </div><!--close container-->

     </div><!-- #main-content -->

     <div id="content">

     	  

          

          <div class="about_section gray-bg single-service">

          <?php 

		  $currentCatId = $queried_obj->term_id;

		  ?>

          	   <div class="container ajax_posts">

                    <input type="hidden" id="include_type" name="include_type" value="filter" />

                    <input type="hidden" id="include_filter_proj" name="include_filter_proj" value="<?php echo $queried_obj->term_id;?>" />

                    <input type="hidden" id="include_type" name="include_type" value="default" />

                    <input type="hidden" id="view_type" name="view_type" value="grid" />

                    <input type="hidden" id="include_sort_proj" name="include_sort_proj" value="time" />

                    <div class="filter_section">

                        <div class="filter1">

                         	  <div id="button">

                                  <a class="showsorter showsorter menu_classactive">Sorter</a>

                                  <div class="the_menu" style="display: block;">

                                           <ul>

                                            	<li class="change_view active" viewtype="grid">Grid</li>

                                                <li class="change_view" viewtype="list">Liste</li>

                                            </ul>

                                            <ul>

                                                <li class="sort_project" sort="time">Kronologisk</li>

                                                <li class="sort_project" sort="alphabets">Alfabetisk</li>

                                                <li class="sort_project" sort="location">Lokation</li>

                                             </ul>

                                  </div><!--close the_menu-->

                                </div><!--close button-->

                         </div><!--close filter1-->

                         <div class="filter2">

                         	  <div id="button2">

                                  <a class="showfilter menu_classactive">Fagligt felt</a>

                                  <div class="the_menu2" style="display: block;">

                                       <ul>

                                       <?php

                                       $custom_terms = get_terms('categories_project');

										foreach($custom_terms as $custom_term) {

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

												$activeclass = '';

												if($currentCatId == $custom_term->term_id)

												$activeclass = 'active';

													

												echo '<li class="'.$activeclass.' ' .get_the_ID(). '" cid="'.$custom_term->term_id.'"><a href="'.get_term_link( $custom_term ).'" >'.$custom_term->name.'</a></li>';

											 }

										}

            ?>                           

                                       </ul>

                                  </div><!--close the_menu-->

                              </div><!--close button-->

                         </div>

                    </div>

               

               		<div class="service_signle_row">

                     <?php 

						  $args = array( 'post_type' => 'projects',

							  'order'=>'ASC',

							  'posts_per_page' => 10,

							  'post_status'=>'publish',

							  'orderby'=>'post_date',

							  'order' => 'DESC',

							  'tax_query' => array(

												array(

												'taxonomy' => 'categories_project',

												'field' => 'id',

												'terms' => $queried_obj->term_id,)

												)

									);

									

							//$loop = new WP_Query( $args );

							$co=1;

							$psi = array();

							$psi2 = array();

							global $query_string;

							parse_str( $query_string, $my_query_array );

							if ( get_query_var('paged') ) {

								$paged = get_query_var('paged');

							}

							elseif ( get_query_var('page') ) {

								$paged = get_query_var('page');

							}

							else {

								$paged = 1;

							}

							$your_query = null;

							//$wp_query ->query('post_type=projects&order=ASC&posts_per_page=10&post_status=publish&paged='.$paged);

							//print_r($wp_query);

							$wp_query = new WP_Query($args);

							$wp_query->post_count;

							if( $wp_query->have_posts() ):

							while ( $wp_query->have_posts() ) : 

							$wp_query->the_post(); $post_id=get_the_ID();

							if($co <=2 ){

							//	$psi[] = get_the_ID();

								

						?>

                    		

                    	 <div class="postbig">

                                <div class="case-inner">

                                         <?php if ( has_post_thumbnail() ) : 

										 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());

										 $url = img_resize($url_orinignal, 534, 312, true);

										 else: 

										 $url = get_template_directory_uri().'/images/default-project.jpg';

										 endif; ?>

                                        

                                         <img src="<?php echo $url ; ?>" alt="" />

                                        

                                     <div class="cases" data-postid="<?php echo get_the_ID();?>">

                                          <div class="cases_table">

                                                <div class="cases_td">

                                                     <div class="cases_text_inner">

                                                          <h2><?php the_title(); ?></h2>

                                                          <p> <?php echo get_post_field('post_content', $post_id); ?></p>

                                                          <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>

                                                          <h6><?php the_field('location'); ?></h6>

                                                      </div>

                                          		 </div>

                                     		</div>

                                	</div>

                           		</div>

                        	</div><!--close post-->

                            <?php 

							if($co == 2){

								?>

                                </div>

                     <div id="grid">

                        <div id="posts" data-va="2" class="ajax_posts_content">

                                <?php

								}

									}

									else{

										?>

                                <div class="post" data-postid="<?php echo get_the_ID();?>">

                                <div class="case-inner">

                                   <?php

								     //  $url = wp_get_attachment_url( get_post_thumbnail_id($ab), 'thumbnail' ); ?>

									<?php if ( has_post_thumbnail() ) : ?>

											<?php //the_post_thumbnail($size); 

											$url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());

											//$url =get_template_directory_uri().'/images/default-project.jpg';

											//$url = $url_orinignal;

											$url = img_resize_project_related($url_orinignal, 260, 150, true);

											?>

                                            <?php else: 

											$url =get_template_directory_uri().'/images/default-project.jpg';

											?>

											<?php endif; ?>

                                            <img src="<?php echo $url; ?>" alt="" />

								  

                                     <div class="cases">

                                          <div class="cases_table">

                                                <div class="cases_td">

                                                     <div class="cases_text_inner">

                                                          <h2><?php the_title(); ?></h2>

                                                          <a href="<?php echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>

                                                          <h6><?php the_field('location'); ?></h6>

                                                      </div>

                                          		 </div>

                                     		</div>

                                	</div>

                           		</div>

                        	</div>

                                        <?php 

									}

							$co++;  endwhile; 

							endif;

							?>

                  </div><!--close posts-->

                  

                    </div><!--close grid-->

               </div><!--close container-->

               <div class="container">

               <div id="list_view" class="list">

					               		

               </div>

               </div>

                   <div class="button_row4" id="more_posts" data-category="1">

                   <a href="javascript:;" class="loadmore navigation">Load flere</a>

                   </div>

                   <div class="button_row4" id="last_see_all_button" style="display:none">

                    <div class="button_row5">
                    <a href="<?php echo site_url();?>/projekter/" class="button-with-arrow">Se alle Projekter</a>
                    </div>

                   </div>

         </div><!--close about_section-->

          

          <span id="adminurl" data-admin_ajax_url="<?php echo admin_url( 'admin-ajax.php');?>"></span>

          

     </div>

<?php

get_sidebar();

get_footer();

