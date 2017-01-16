<?php
/**
 * Template Name: Medarbejdere
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="banner" class="no-bg">
     	  <div class="container">
          	   <div class="banner_inner">
               		<img src="<?php echo get_template_directory_uri(); ?>/images/services.jpg" alt="" />
                    <div class="banner_layer">
                    	<div class="banner_table">
                        	<div class="banner_td">
                            	 <div class="banner_text">
                                 	  <h2><?php the_field('section1_title');?></h2>
                                      <p><?php echo get_post_field('post_content', get_the_ID()); ?></p>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div><!--close container-->
     </div>
     <div id="content">
     	  
           <div class="about_section gray-bg">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php the_field('section1_title');?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                           <?php the_field('partner_textblock'); ?>
                      </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          <div class="about_section white-bg peoples">
          	   <div class="container">
               		
                    <div class="filter_section">
                        <div class="filter1">
                         	  <div id="button">
                                  <a class="menu_class">Lokation</a>
                                  <div class="the_menu">
                                     <!--<ul>
                                            <li class="grid"><a href="#">Grid</a></li>
                                            <li class="list"><a href="#">Liste</a></li>
                                         </ul>-->
                                         <ul>
                                         <?php 
                                            $locargs = array('post_type' => 'contact', 'showposts' => -1);
											$location = get_posts( $locargs );
											foreach($location as $loc) {
												echo '<li class="cl" cid="'.get_the_title( $loc->ID ).'" type="loc">'.get_the_title( $loc->ID ).'</li>';
											}
										 ?>
                                         </ul>
                                  </div><!--close the_menu-->
                              </div><!--close button-->
                         </div><!--close filter1-->
                         
                         
                         <div class="filter2">
                         	  <div id="button2">
                                  <a class="menu_class2">Fagligt felt</a>
                                  <div class="the_menu2">
                                       <ul>
                                <?php
                                       $custom_terms = get_terms('categories_peo');
										foreach($custom_terms as $custom_term) {
											wp_reset_query();
											$args = array('post_type' => 'perspektivs',
												'tax_query' => array(
													array(
														'taxonomy' => 'categories_peo',
														'field' => 'slug',
														'terms' => $custom_term->slug,
													),
												),
											 );
										
											 $loop = new WP_Query($args);
											 if($loop->have_posts()) {
												echo '<li class="cl" cid="'.$custom_term->term_id.'" type="cat">'.$custom_term->name.'</li>';
											 }
										}
            ?>                           
                                            </ul>
                                  </div><!--close the_menu-->
                              </div><!--close button-->
                         </div><!--close filter2-->
                    
                          
                    </div>
      <script>
        $( document ).ready(function() {
		$( ".cl" ).click(function() {
		  var state_id=$(this).attr('cid');
		  var type = $(this).attr('type');
				$.ajax({
					url:'<?php echo admin_url( 'admin-ajax.php' );?>',
					type:'POST',
					data:{state_id:state_id,type:type, action:'auto_search'},
					success:function(result){
						$(".peoples_row").html(result);
					},
				});
			});
    	});
    	</script>
               		<div class="peoples_row grids">
                    	 
                         <ul>
                          <?php 
						  $args = array( 'post_type' => 'perspektivs','paged' => $paged, 'showposts' => -1,'order' => 'ASC');
						 $loop = new WP_Query( $args );
								
						  while ( $loop->have_posts() ) : $loop->the_post(); $post_id=get_the_ID();
						?>
                         	<li>
                            	<div class="pthumb">
                                <img src="<?php the_post_thumbnail_url(); ?>" />
                                <div class="partner_text">
                                      <span>
                                        <strong><?php the_title(); ?></strong><br>
                                        Partner<br>
                                        <?php the_field('achieved'); ?><br>
                                        Tel. <?php the_field('telephone'); ?><br>
                                        <?php the_field('email'); ?>
                                      </span>
                                 </div>
                                </div>
                            </li>
                            <?php endwhile; ?>
                         </ul>
                  </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
          
          
     </div>
     <script type="text/javascript">
	 $(document).ready(function(){
	 $('.grid').click(function(){
		$('.grids').show(2000);
		$('.lists').hide(2000);
		});	 
	 });
	 </script>
<script type="text/javascript">
	 $(document).ready(function(){
	 $('.list').click(function(){
		$('.lists').show(2000);
		$('.grids').hide(2000);
		});	 
	 });
	 </script>

<?php
get_sidebar();
get_footer();