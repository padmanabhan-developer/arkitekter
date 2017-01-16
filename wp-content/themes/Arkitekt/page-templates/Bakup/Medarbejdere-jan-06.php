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
                    	 <h2 class="title-main"><?php the_field('section1_title');?></h2>
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
                                  <a class="showsorter menu_class">Lokation</a>
                                  <div class="the_menu 2">
                                         <ul>
                                         <?php 
                                            $locargs = array('post_type' => 'contact', 'showposts' => -1);
											$location = get_posts( $locargs );
											foreach($location as $loc) {
												echo '<li class="cl"  data-postid="'.$loc->ID.'" cid="'.get_the_title( $loc->ID ).'" type="loc">'.get_the_title( $loc->ID ).'</li>';
											}
										 ?>
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
												echo '<li class="cl"  data-postid="'.get_the_ID().'" cid="'.$custom_term->term_id.'" type="cat">'.$custom_term->name.'</li>';
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
			var postid=$(this).data('postid');
		   	$(this).addClass('active').siblings().removeClass('active');
		  	var type = $(this).attr('type');
				$.ajax({
					url:'<?php echo admin_url( 'admin-ajax.php' );?>',
					type:'POST',
					data:{state_id:state_id,postid:postid,type:type, action:'auto_searchpeople'},
					beforeSend : function () {
						$(".peoples_row").html('<div style=" margin: auto;text-align: center;"><a href="javascript:;" style="text-decoration:none; text-align:center" class="ajaxloader" >Loading</a></div>');
					},
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
								  <?php if ( has_post_thumbnail() ) : 
                                 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
                                 $url = img_resize($url_orinignal, 230, 243, true);
                                 else: 
                                 $url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 230, 243, true);
                                 endif; ?>
                                 <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title()?>" />
                                <div class="partner_text">
                                      <span>
                                        <strong><?php the_title(); ?></strong><br>
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
