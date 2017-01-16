<?php
/**
 * Template Name: Awards
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
                                 	  <h2><?php the_field('banner_texttitle'); ?></h2>
                                      <p><?php the_field('banner_textblock'); ?> </p>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div><!--close container-->
     </div>
     <div id="content">
     	  
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 <h2><?php the_field('section_title')?></h2>
                    </div>
                    
                    <div class="about_right">
                    	 <article>
                           <?php the_field('section_textblock'); ?>
                      </article>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          
        <?php  if( have_rows('awards') ):

 	// loop through the rows of data
	$awardscount =1;
         while ( have_rows('awards') ) : the_row();
	     ?>
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 &nbsp;
                    </div>
                    
                    <div class="about_right">
                    	 <div class="years">
                          <div class="years_inner">
                         	  <div class="year"><?php echo get_sub_field('award_year'); ?></div>
                              <div class="toogle_button">
                              	   <a href="javascript:;" class="minus aa"></a>
                                   <a href="javascript:;" class="plus aa" data-awardid="<?php echo $awardscount?>"></a>
                              </div>
                              </div>
                               <div class="answer" id="award-<?php echo $awardscount?>" style="display:none;">
                               <ul>
                               <?php  if( have_rows('awarddetails') ):
							
							// loop through the rows of data
							 while ( have_rows('awarddetails') ) : the_row();
							
							 ?>
                               <li><span style="display:inline-flex;"><p><?php echo get_sub_field('award_name'); ?>  </p>
                        
                               <h6>|<?php echo get_sub_field('projectname'); ?>
                                <?php // the_title(); ?></h6>
    
                               </span> </li>
                               
                               
                               <?php 
							   $awardscount++;
							   endwhile; 
                               endif;
                               ?>
                               </ul>
                               </div>
                         </div>
                    </div>
               </div><!--close container-->
          </div><!--close about_section-->
          <?php 
		      endwhile;
			endif;
		  ?>
     </div>
 <script>
        $(document).ready(function() {
            $('.plus').click(function() {   
				var awardid =$(this).data('awardid');
				$(this).closest('.about_section').toggleClass( "no" );
                $('#award-'+awardid).slideToggle();
                $(this).toggleClass('close');
            });
        }); // end ready
    </script>


<?php
get_sidebar();
get_footer();
