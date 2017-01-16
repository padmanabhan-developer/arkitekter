<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->
        <?php 
		global $theme_option;
		?>
<div id="footer">
	 <div class="footer_top">
     	  <div class="container">
          	   <div class="footer_inner">
               		<div class="col3 ftrbox1">
                    	 <div class="ftrlogo"><a href="<?php echo $theme_option['lg_link']; ?>" ><img src="<?php echo $theme_option['footer_llg']['thumbnail']; ?>" alt="" /></a></div>
                         <p>T: <?php echo $theme_option['footer_info_ttl'] ?></p>
                         <p>E: <?php echo $theme_option['footer_info_email'] ?></p>
                    </div>
                    <div class="col3 ftrbox2">
                    	 <h2>Følg os her </h2>
                         <div class="social">
                         	  <ul>
                              		<li><a href="<?php echo $theme_option['lg_link_li']; ?>" class="linkein" style="background:rgba(0, 0, 0, 0) url(<?php echo $theme_option['footer_social_icon_star']['thumbnail']; ?>)  no-repeat scroll center center"></a></li>
                                    <li><a href="<?php echo $theme_option['lg_li_in']; ?>" class="instagram" style="background:rgba(0, 0, 0, 0) url(<?php echo $theme_option['footer_social_icon_inst']['thumbnail']; ?>)  no-repeat scroll center center"></a></li>
                                    <li><a href="<?php echo $theme_option['lg_li_fb']; ?>" class="facebook" style="background:rgba(0, 0, 0, 0) url(<?php echo $theme_option['footer_social_icon_fb']['thumbnail']; ?>)  no-repeat scroll center center"></a></li>
                                    <li><a href="<?php echo $theme_option['lg_li_tw']; ?>" class="twitter" style="background:rgba(0, 0, 0, 0) url(<?php echo $theme_option['footer_social_icon_twitter']['thumbnail']; ?>)  no-repeat scroll center center"></a></li>
                                    <li><a href="<?php echo $theme_option['lg_li_pn']; ?>" class="pintrest" style="background:rgba(0, 0, 0, 0) url(<?php echo $theme_option['footer_social_icon_pn']['thumbnail']; ?>)  no-repeat scroll center center"></a></li>
                              </ul>
                         </div>
                    </div>
                    <div class="col3 ftrbox3">
                    	 <h2>Nyhedsbrev</h2>
                         <a href="#" class="button-with-arrow">Indtast email</a>
                    </div>
               </div><!--close footer_inner-->
          </div><!--close container-->
     </div><!--close footer_top-->
     
     <div class="footer_bottom">
     	  <div class="container">

           <?php  wp_nav_menu( array( 'theme_location' => 'new-menu', 'items_wrap' => '<ul><li> </li>%3$s</ul>' ) ); ?>
               <p><?php echo $theme_option['footer_text']; ?></p>
          </div><!--close container-->
     </div><!--close footer_bottom-->
</div>
		
	</div><!-- #page -->

	<?php wp_footer(); ?>
    
<script src="<?php echo get_template_directory_uri(); ?>/js/readmore.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	//alert("hello");
  jQuery("#menu > li > a").click(function () {
	jQuery(this).parent().addClass('active').siblings().removeClass('active');
   jQuery('div.submenu_section').not(jQuery(this).siblings()).slideUp();
    jQuery(this).siblings("div.submenu_section").slideToggle();
	});
	jQuery("a.close_button").click(function () {
		$(this).parents('div.submenu_section').slideUp();
	});

    jQuery('#info').readmore({
      moreLink: '<a href="#">Usage, examples, and options</a>',
      collapsedHeight: 384,
      afterToggle: function(trigger, element, expanded) {
        if(! expanded) { // The "Close" link was clicked
          jQuery('html, body').animate({scrollTop: $(element).offset().top}, {duration: 100});
        }
      }
    });

    jQuery('article').readmore({speed: 500});
	});
  </script>



 <script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>