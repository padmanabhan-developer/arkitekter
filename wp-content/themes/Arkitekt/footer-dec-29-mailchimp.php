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
                    <span style="display:none;">
                    <?php print_r($theme_option);?>
                    </span>

                    	 <div class="ftrlogo"><a href="<?php echo get_site_url()?>" >
                         <img class="footerlogo" src="<?php echo $theme_option['footer_llg']['url']; ?>" alt="" /></a></div>

                         <p>T: <?php echo $theme_option['footer_info_ttl'] ?></p>

                         <p>E: <?php echo $theme_option['footer_info_email'] ?></p>

                    </div>

                    <div class="col3 ftrbox2">

                    	 <h2>Følg os her </h2>

                         <div class="social">

                         	  <ul>

                              		<li><a href="<?php echo $theme_option['lg_link_li']; ?>" target="_blank" ><img src="<?php echo $theme_option['footer_social_icon_star']['thumbnail']; ?>" /></a></li>

                                    <li><a href="<?php echo $theme_option['lg_li_in']; ?>" target="_blank"><img src="<?php echo $theme_option['footer_social_icon_inst']['thumbnail']; ?>" /></a></li>

                                    <li><a href="<?php echo $theme_option['lg_li_fb']; ?>" target="_blank" ><img src="<?php echo $theme_option['footer_social_icon_fb']['thumbnail']; ?>" /></a></li>

                                  

                              </ul>

                         </div>

                    </div>

                    <div class="col3 ftrbox3">

                    	 <h2>Nyhedsbrev</h2>

                         <div class="newsletter">
                         <!--<input name="" type="text"  class="email" value="Indtast email" onfocus="if (this.value == 'Indtast email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Indtast email';}" />
                         <input name="" type="submit" class="send" />-->
                         <!-- Begin MailChimp Signup Form -->
<!--<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
</style>-->
<div id="mc_embed_signup">
<form action="//aarstiderne.us14.list-manage.com/subscribe/post?u=2907bb69c723bdd3501c0bd68&amp;id=5272d3eb60" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	
<div class="mc-field-group">
	<input type="email" value="" name="EMAIL" class="required email" placeholder="Indtast email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2907bb69c723bdd3501c0bd68_5272d3eb60" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="" name="subscribe" id="mc-embedded-subscribe" class="send"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

                         </div>

                    </div>

               </div><!--close footer_inner-->

          </div><!--close container-->

     </div><!--close footer_top-->

     

     <div class="footer_bottom">

     	  <div class="container">

          <?php  wp_nav_menu( array( 'menu' => 'footer', 'theme_location' => 'footer', 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>

               <p><?php echo $theme_option['footer_text']; ?></p>

          </div><!--close container-->

     </div><!--close footer_bottom-->

</div>

		

	</div><!-- #page -->

<!--<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>-->
 <script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>

	<?php wp_footer(); ?>

    

<script src="<?php echo get_template_directory_uri(); ?>/js/readmore.js"></script>



<script type="text/javascript">

jQuery(document).ready(function(){

	//alert("hello");

//	jQuery( ".submenu" ).append( jQuery( '<a class="close_button" href="javascript:;"></a>' ) );

  jQuery("#menu > li > a").click(function () {

	jQuery(this).parent().addClass('active').siblings().removeClass('active');

   	jQuery('div.submenu_section').not(jQuery(this).siblings()).removeClass('yesactive').slideUp();
    jQuery(this).siblings("div.submenu_section").toggleClass('yesactive').slideToggle();
	var mainmenu =jQuery(this).data('mainmenu');
	var menuheight = jQuery('#submenu'+mainmenu).data('submenucount');
	  if(jQuery('#header').hasClass('sticky')){}
	  else{
		 	// alert(jQuery('#displaymenu'+mainmenu).css('display'));
	   if(jQuery('#displaymenu'+mainmenu).hasClass('yesactive'))
   		{
			jQuery('div#showmenudiv').height(menuheight).slideDown();
		}
		else{
	   		jQuery('div#showmenudiv').slideUp();
	   	}
	  }
    //jQuery(this).siblings("div#showmenudiv").slideToggle();

	});

	jQuery("a.close_button").click(function () {

		$(this).parents('div.submenu_section').slideUp();
		var menuclose = jQuery(this).data('menuclose');
		jQuery('#displaymenu'+menuclose).removeClass('yesactive');
		jQuery('div#showmenudiv').slideUp();
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

	

	$('#faq-list h2').click(function() {

		$(this).next('.answer').slideToggle(500);

		$(this).toggleClass('close');

	});

  </script>



<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox.js"></script>

<script>

jQuery(document).ready(function(){

	//Examples of how to assign the Colorbox event to elements

	jQuery(".project_single_page").colorbox({rel:'project_single_page'});

	jQuery(".cases_single_page").colorbox({rel:'cases_single_page'});

});

</script>

<script>

jQuery(window).scroll(function() {

    if (jQuery(this).scrollTop() > 1){  

        jQuery('header').addClass("sticky",2000);

    }

    else{

        jQuery('header').removeClass("sticky");

    }

});

	jQuery(".share").click(function () {

	jQuery(this).siblings('.social_icons').fadeToggle();

	});



</script>





<script src="<?php echo get_template_directory_uri(); ?>/js/jssor.slider-22.0.15.mini.js" type="text/javascript" data-library="jssor.slider.mini" data-version="22.0.15"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>
</body>

</html>