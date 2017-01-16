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
<!--<![endif]--><head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/itemslider.css">
 
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.jqzoom.css">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/rating.css">

    
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet" media="screen" /> <!-- General style -->
<link href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css" type="text/css" rel="stylesheet" media="screen"><!-- prettyPhoto -->
<link href="<?php echo get_template_directory_uri(); ?>/css/tipsy.css" type="text/css" rel="stylesheet" media="screen"><!--tooltip-->
<link href="<?php echo get_template_directory_uri(); ?>/css/camera.css" type="text/css" rel="stylesheet" media="screen"><!--camera-->
<link href="<?php echo get_template_directory_uri(); ?>/css/jcarousel.css" type="text/css" rel="stylesheet" media="screen" /> <!-- list_work -->
<link href="<?php echo get_template_directory_uri(); ?>/css/jquery.jqzoom.css" type="text/css" rel="stylesheet" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Arvo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.2.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css3-mediaqueries.js"></script><!--mediaqueries-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr-1.7.min.js"></script><!--modernizr-->
<?php /*?><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.63321.js"></script><!--itemslider-modernizr--><?php */?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.prettyPhoto.js"></script><!-- prettyPhoto -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tipsy.js"></script><!--tooltip-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.min.js"> </script> <!-- list_work -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-hover-effect.js"></script><!--Image Hover Effect-->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.hoverIntent.minified.js'></script><!--menu-->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.dcmegamenu.1.3.3.js'></script><!--menu-->
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/jquery.tweet.js"></script><!--twitter plugin-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.quovolver.js"></script><!--blockquote-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.catslider.js"></script><!--itemslider-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script><!--custom-->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js'></script> <!--camera slider-->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/camera.min.js'></script> <!--camera slider-->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/organictabs.jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jqzoom-core.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/productview.js"></script><!--productgridlistview-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/accordion.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
$(function() {
	$( '#mi-slider' ).catslider();
});
</script>
<script type="text/javascript">
//------JCAROUSEL-------------
		function mycarousel_initCallback(carousel){
		// Disable autoscrolling if the user clicks the prev or next button.
		carousel.buttonNext.bind('click', function() {
			carousel.startAuto(0);
		});
		carousel.buttonPrev.bind('click', function() {
			carousel.startAuto(0);
		});
		// Pause autoscrolling if the user moves with the cursor over the clip.
		carousel.clip.hover(function() {
			carousel.stopAuto();
		}, function() {
			carousel.startAuto();
		});
	};
	$(document).ready(function() {
		$('#mycarousel, #mycarouselnew').jcarousel({
			auto: 0,
			wrap: 'last',
			initCallback: mycarousel_initCallback
		});
	});	
</script>
<!--MENU-->
<script type="text/javascript">
$(document).ready(function($){
	$('#mega-menu-3').dcMegaMenu({
		rowItems: '2',
		speed: 'fast',
		effect: 'fade'
	});
});
</script>

<?php 
if(!is_product()){
	wp_deregister_script('jquery');
}

wp_head(); ?>
</head>
<?php global $theme_option; 
//echo "</pre>";
//echo "<pre>";
//print_r($theme_option);
$st=$theme_option['style'];
if($st == 'style2')
{
	//echo $st;
	include('instyle2.php');
}
if($st == 'style3')
{
	include('instyle3.php');
}
if($st == 'style4')
{
	include('instyle4.php');
}
if($st == 'style5')
{
	include('instyle5.php');
}
if($st == 'style6')
{
	include('instyle6.php');
}
if($st == 'style7')
{
	include('instyle7.php');
}
?>
<style>
#top,#top2{
	background-color:<?php echo $theme_option['header_bg_color'];?>
}

</style>
<body <?php body_class(); ?> >

<input type="hidden" id="template_id" value="<?php echo get_template_directory_uri(); ?>" >
<div id="page_wrap">
    	<header>
        	<div id="top">
           	<span><?php echo $theme_option['welcome_msg']; ?> <?php
			$current_user = wp_get_current_user();
			 echo  $current_user->user_login;
	?></span>
                <div>
                	
                </div>
            </div><!--end:top-->
            <div id="top2">
            	<ul class="myaccountmenu">
                	<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="first">My Account</a></li>
                    <li><a href="<?php global $woocommerce; echo $cart_url = $woocommerce->cart->get_cart_url(); ?>">My Cart</a></li>
                    <li><a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">Checkout</a></li>
                    <li class="login"><a href="#login-box" class="last login-window">Login</a></li>
                </ul>
                <div id="login-box" class="login-popup">
                <a href="#" class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/process-stop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                  <form method="post" class="signin" action="#">
                        <fieldset class="textbox">
                        <label class="username">
                        <span>Username or email</span>
                        <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
                        </label>
                        <label class="password">
                        <span>Password</span>
                        <input id="password" name="password" value="" type="password" placeholder="Password">
                        </label>
                        <button class="submit button" type="button">Sign in</button>
                        <p>
                        <a class="forgot" href="#">Forgot your password?</a> / <a class="register" href="register.html">Create an Account</a>
                        </p>        
                        </fieldset>
                  </form>
       			</div>
                <div id="demo-header">
                    <a id="cart-link" href="#cart" title="Cart"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> -  <?php echo WC()->cart->get_cart_total(); ?></a>
                    <div id="cart-panel">
                    	<div class="item-cart">
                        <table>
	                  <?php      foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {?>
                          <tbody>
                            <tr>
                              <td class="image"><a href="<?php echo get_permalink();?>">
                              <?php
						
							$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(array(60,60)), $cart_item, $cart_item_key );
							echo $thumbnail;

                              ?>
                              </a>
                             </td>
                            
                              <td class="name"><a href="<?php echo get_permalink(); ?>"><?php echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key ); ?></a></td>
                           
                              <td class="total"><?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
                                             
                        </td>
                               
                            </tr>
                           
                          </tbody>
                           
                        </table>
 						<?php }?>
                        <table border="1px">
                          <tbody>
                            <tr>
                              <td class="textright"><b>Sub-Total:</b></td>
                              <td class="textright"><?php echo WC()->cart->get_cart_total(); ?></td>
                            </tr>
                           </tbody>
                        </table>
                        <div class="buttoncart">
                          <a href="<?php global $woocommerce; echo $cart_url = $woocommerce->cart->get_cart_url(); ?>">View Cart</a>
                          <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">Checkout</a>
                        </div>
                    </div>
                    </div><!-- /login-panel -->
            	</div><!-- /demoheader -->	
            </div><!--end:top2-->
            <div id="top3">
            	<h1 class="logo"><a href="<?php echo get_option('Home'); ?>">Shopy Mart</a></h1>
                     <form action="http://3starinfo.in/porject/wp_theme2/" class="search_bar" method="get" role="search">
                     <fieldset>
                    <label for="s" class="screen-reader-text"></label>
                    <input type="search" title="Search for:" name="s" value="" placeholder="Search Products…" class="search-field">
                    <input type="submit" value="Search" class="submit">
                    <input type="hidden" value="product" name="post_type">
                    </fieldset>
                </form>
            </div><!--end:top3-->
        </header>
       <div id="container">
        	<nav>  
            
                <ul id="mega-menu-3" class="mega-menu">
                   <?php wp_nav_menu( array( 'container' => false,'theme_location' => 'primary', 'items_wrap' => '<ul>%3$s</ul>' ) ); ?> 
                </ul>
            </nav><!--end:grey-->
            <!--end:content-wrap-->
            
      
    