<?php
/**
 * Template Name: Awards
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<script>
        $(document).ready(function() {
            $('.plus').click(function() {   
		//	alert("click");
				/*$('.years').css('display','inline-flex');*/
				$('.answer').css('border','none');
				/*$('.year').append( "<p class='minus'></p><p class='plus'></p>" );*/
				
                $(this).next('.answer').css('margin-left','20%');
				$(this).next('.answer').css('margin-top','-36px');
                $(this).next('.answer').slideToggle(500);
                $(this).toggleClass('close');
            });
        }); // end ready
    </script>
<div id="banner">
     	  <div class="container">
          	   <div class="banner_inner">
               		<?php if ( has_post_thumbnail() ) : ?>
	
<?php the_post_thumbnail($size); ?>
	
<?php endif; ?>
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
         while ( have_rows('awards') ) : the_row();
	     ?>
          <div class="about_section">
          	   <div class="container">
               		<div class="about_left">
                    	 &nbsp;
                    </div>
                    
                    <div class="about_right">
                    	 <div class="years">
                         	  <div class="year"><?php echo get_sub_field('award_year'); ?></div>
                              <div class="toogle_button">
                              	   <a class="minus aa"></a>
                                   <a class="plus aa"></a>
                                   <div class="answer">
                                   <ul>
                                   <?php  if( have_rows('awarddetails') ):

 	// loop through the rows of data
         while ( have_rows('awarddetails') ) : the_row();
 
         ?>
                                   <li><span style="display:inline-flex;"><p><?php echo get_sub_field('award_name'); ?>  </p>
                            
							       <h6>|<?php echo get_sub_field('projectname'); ?>
                                    <?php // the_title(); ?></h6>
		
								   </span> </li>
                                   
                                   
                                   <?php endwhile; 
								   endif;
								   ?>
                                   </ul>
                                   </div>
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


<?php
get_sidebar();
get_footer();
