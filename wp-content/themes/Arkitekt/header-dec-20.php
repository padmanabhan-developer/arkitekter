<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen" />



    
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>    
    <script type="text/javascript">
    $(document).ready(function(){
    $(window).load(function(){
      $('.flexslider2').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
	});
  </script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php global $theme_option; ?>
<?php
class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='submenu_section'><div class='container'>
<div class='submenu'><ul>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div></div>\n";
    }
}
?>
<div id="wrapper">
<header id="header">
     	  <div class="container">
          	   <div class="logo"><a href="<?php echo site_url();  ?>"><img src="<?php echo $theme_option['logo']['thumbnail']; ?>" alt="" /></a></div>
               
               <div class="navbar navbar-default" role="navigation">
                               
                               <div class="navbar-header">
								<button id="btn1"type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" onclick="toggleColor()">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </div>
                        <div class="navbar-collapse collapse">
                
                          <!-- Right nav -->
                          <?php  wp_nav_menu( array( 'sub_menu' => true,  'walker' => new WPSE_78121_Sublevel_Walker , 'theme_location' => 'primary', 'items_wrap' => '<ul id="menu" class="nav navbar-nav navbar-right">%3$s</ul>' ) ); ?>
 
        
                        </div><!--/.nav-collapse -->
                      </div>
                      
                      <div class="header_right">
                      	   <div class="search_box">
                         	  <div id="button3">
                                  <a class="menu_class3"></a>
                                  <div class="the_menu3">
                                       <div class="search_inner">
                                       		<input name="" type="text" class="search_input">
                                            <button class="search_button"></button>
                                       </div>
                                  </div><!--close the_menu-->
                              </div><!--close button-->
                         </div><!--close phone_box-->
                         <div class="share_box">
                         	  <a class="share"></a>
                              <div class="social_icons">
                              	   <a href="#" class="instagram1"></a>
                                   <a href="#" class="linkedin1"></a>
                                   <a href="#" class="facebook1"></a>
                                   <!--<a href="#" class="twitter1"></a>-->
                              </div>
                         </div>
                      </div><!--close header_right-->
          </div><!--close container-->
     </header>
