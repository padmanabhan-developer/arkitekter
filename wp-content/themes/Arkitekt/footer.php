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



                         <div class="newsletter" id="footer_newsletter">

                         <input name="" type="text" id="subscribe_email"  class="email" value="Indtast email" onfocus="if (this.value == 'Indtast email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Indtast email';}" />

                         <input name="" type="submit" id="subscribe_mailchimp" class="send" />

                         <!-- Begin MailChimp Signup Form -->

                         </div>

                         <div id="success_message"></div>

                         



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

 <script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>



	<?php wp_footer(); ?>



    



<script src="<?php echo get_template_directory_uri(); ?>/js/readmore.js"></script>







<script type="text/javascript">



jQuery(document).ready(function(){



	jQuery("#subscribe_mailchimp").click(function () {

		jQuery("#success_message").html('');

		var _e = jQuery("#subscribe_email");

		jQuery("#footer_newsletter").removeClass('footer_error');

		if(_e.val()!= 'Indtast email'){



			if(_e.val()!="" && (_e.val().indexOf("@",0)==-1 || _e.val().indexOf(".",0)==-1))

			{

				jQuery('#gcf_email_error').show();

				jQuery("#success_message").html('Invalid Email');

				jQuery("#footer_newsletter").addClass('footer_error');

				return false;

			}

			else{

				jQuery.ajax({

					url: 'http://aarstiderne.us14.list-manage.com/subscribe/post?u=2907bb69c723bdd3501c0bd68&id=5272d3eb60',

					type:'POST',

					data:{name:"b_2907bb69c723bdd3501c0bd68_5272d3eb60",EMAIL:_e.val(),action:'auto_pr'},

					success:function(data1){

					jQuery("#success_message").html('Tak for din tilmeldelse,<br> du hører fra os');

					_e.val('');

					},

					error:function(data1){

					jQuery("#success_message").html('Tak for din tilmeldelse,<br> du hører fra os');

					_e.val('');

					}

				});

			}

		

		}

		

	});



	$("#subscribe_email").keyup(function(event){

		if(event.keyCode == 13){

			$("#subscribe_mailchimp").click();

		}

	});



  	jQuery("#menu > li > a").click(function () {



	if(jQuery(this).parent().hasClass('active')){}

	else{

		jQuery('a.menu_class3').removeClass('active_search');

		jQuery('.the_menu3').slideUp('medium');

	}

		



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







    jQuery('article').readmore({speed: 500,collapsedHeight:90});



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



	if (jQuery(window).width() > 1900){
		jQuery(".project_single_page").colorbox({rel:'project_single_page',left:"16%",maxWidth :"90%",retinaImage :true,retinaUrl :true});
		jQuery(".cases_single_page").colorbox({rel:'cases_single_page',left:"16%",maxWidth :"90%",retinaImage :true,retinaUrl :true});
		if(jQuery('#gallery_2').length){
			jQuery(".cases_single_page2").colorbox({rel:'cases_single_page2',left:"16%",maxWidth :"90%",retinaImage :true,retinaUrl :true});
		}
	
	}
	else{
		jQuery(".project_single_page").colorbox({rel:'project_single_page',maxWidth :"90%"});
		jQuery(".cases_single_page").colorbox({rel:'cases_single_page',maxWidth :"90%"});
		if(jQuery('#gallery_2').length){
			jQuery(".cases_single_page2").colorbox({rel:'cases_single_page2',maxWidth :"90%"});
		}
	}



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



	if(jQuery(this).hasClass('activeshare')){}

	else{

		if(jQuery('a.menu_class3').hasClass('active_search')){

			jQuery('a.menu_class3').removeClass('active_search')

			jQuery('.the_menu3').slideToggle('medium');

		}

	}

	jQuery(this).toggleClass('activeshare');

	jQuery(this).siblings('.social_icons').fadeToggle(500);



	});





jQuery(document).ready(function(e) {

	if(window.location.href.indexOf("portraettersection") > -1) {

		e('html, body').animate({

			scrollTop: jQuery('#portraetter_section').offset().top - 140

		}, 2000);

	}

	

	/*windowWidth = jQuery(window).width();

	

	if(windowWidth)*/

	

});



</script>



</script><script src="<?php echo get_template_directory_uri(); ?>/js/contact-slider.js"></script>







<script src="<?php echo get_template_directory_uri(); ?>/js/jssor.slider-22.0.15.mini.js" type="text/javascript" data-library="jssor.slider.mini" data-version="22.0.15"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>

</body>



</html>