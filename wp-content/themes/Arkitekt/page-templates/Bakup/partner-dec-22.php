<?php
/**
 * Template Name: partner
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
                                      <p> <p><?php echo get_post_field('post_content', get_the_ID()); ?></p> </p>
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
                                           <ul>
                                            	<li class="grid"><a href="#">Grid</a></li>
                                                <li class="list"><a href="#">Liste</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#">Kronologisk</a></li>
                                                <li><a href="#">Alfabetisk</a></li>
                                                <li><a href="#">Lokation</a></li>
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
        echo '<li class="cl" cid="'.$custom_term->term_id.'">'.$custom_term->name.'</li>';
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
			//alert('hello');
		$( ".cl" ).click(function() {
		  var state_id=$(this).attr('cid');
		  //alert(state_id);
		  
				$.ajax({
					url:'<?php echo admin_url( 'admin-ajax.php' );?>',
					type:'POST',
					data:{state_id:state_id,action:'auto_search'},
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
                            	<div class="pthumb"><a href="<?php echo get_permalink(); ?>"> <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:170px;height:180px;"/>
	
<?php endif; ?><div class="layer"></div></a></div>
                            </li>
                            <?php endwhile; ?>
                            
                         </ul>
                            
                  </div>
                    <div class="peoples_row lists" style="display:none;">
                    	 
                         
                          <?php 
						  $args = array( 'post_type' => 'perspektivs','paged' => $paged, 'showposts' => -1);
									$loop = new WP_Query( $args );
								
						  while ( $loop->have_posts() ) : $loop->the_post(); $post_id=get_the_ID();
						?>
                         <div class="col-sm-4 col-md-4 col-xs-4">	
                            	<div class="pthumb"> <?php if ( has_post_thumbnail() ) : ?>
	
	<img src="<?php the_post_thumbnail_url(); ?>" style="width:170px;height:180px;"/>
	
<?php endif; ?><div class="layer"></div></div></div>
						   <div class="col-sm-4 col-md-4 col-xs-4">
                           <div class="pthumb">
                           		 <p><?php the_field('post_name'); ?></p>
                                 <p><?php the_field('achieved'); ?></p>                           
								 <p><?php the_field('telephone'); ?></p>                           
                                 <p><?php the_field('email'); ?></p>
                           </div>
                           </div>
                            
                            <?php endwhile; ?>
                            
                         
                            
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
