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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
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
<div id="wrapper">
<header id="header" class="<?php echo get_the_ID();?>">
     	  <div class="container">
          	   <div class="logo"><a href="<?php echo site_url();  ?>"><img class="headerlogo" src="<?php echo $theme_option['footer_llg']['url']; ?>" alt="" /></a></div>
               <nav id='cssmenu'>
                    <div id="head-mobile"></div>
                    <div class="button"></div>
                    <ul>
                    <li><a href="#">Projekter</a>
                        <ul>
                             <li><a href="#">Arkitektur</a></li>
                             <li><a href="#">Spaceplanning</a></li>
                             <li><a href="#">Landskab</a></li>
                             <li><a href="#">Design</a></li>
                             <li><a href="#">Rådgivning</a></li>
                             <li><a href="#">Byplan</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Mennesker</a>
                        <ul>
                             <li><a href="#">Partnere</a></li>
                             <li><a href="#">Medarbejdere</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Om os</a>
                        <ul>
                            <li><a href="#">Firma profil</a></li>
                            <li><a href="#">Awards</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Ydelser</a>
                        <ul>
                             <li><a href="#">Arkitektur</a></li>
                             <li><a href="#">Landskab / Byplan</a></li>
                             <li><a href="#">Retail</a></li>
                             <li><a href="#">Bim / Bæredygtighed </a></li>
                             <li><a href="#">Kommunikation</a></li>
                             <li><a href="#">Rådgivning</a></li>
                             <li><a href="#">Spaceplanning / Indretning</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Job</a>
                        <ul>
                             <li><a href="#">Leddige stillinger </a></li>
                             <li><a href="#">Portrætter</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Kontakt</a>
                        <ul>
                             <li><a href="#">København</a></li>
                             <li><a href="#">Silkeborg</a></li>
                             <li><a href="#">Herning</a></li>
                             <li><a href="#">Aarhus </a></li>
                             <li><a href="#">Oslo</a></li>
                             <li><a href="#">Nesbye</a></li>
                             <li><a href="#">Göteborg</a></li>
                         </ul>
                    </li>
                    </ul>
                    </nav>
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
               <?php
			$menu_name = 'primary';
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
			$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
			//print_r($menuitems);
			   ?>
            <ul id="menu" class="nav navbar-nav navbar-right">
                <?php
                $count = 0;
                $submenu = false;
                foreach( $menuitems as $item ):
                    // set up title and url
                    $title = $item->title;
                    $link = $item->url;
                    // item does not have a parent so menu_item_parent equals 0 (false)
                    if ( !$item->menu_item_parent ):
            
                    // save this id for later comparison with sub-menu items
                    $parent_id = $item->ID;
				$postid = 	url_to_postid( $link );
                ?>
                <li <?php if(get_the_ID()==$postid) {?>class="active" <?php } ?>>
                    <a href="<?php if($link && $link !='#'){ echo $link; }else {?> javascript:; <?php }?>" class="title <?php echo $postid;?>">
                        <?php echo $title; 
						$submenucount=1;
						?>
                    </a>
                <?php endif; ?>
                 <?php if ( $parent_id == $item->menu_item_parent ): ?>
                  <?php if ( !$submenu ): $submenu = true; ?>
                    <div class="submenu_section">
                    <div class="container">
                        <div class="submenu">
                        <ul>
                        <?php 
						
						endif; ?>
                         	<li>
                            <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
                            </li>
                            <?php if(($submenucount > 1) && ($submenucount%3==0) ) echo "</ul><ul>";?>
                            <?php $submenucount++;?>
                            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                        </ul>
                         </div>
                      </div>
                    </div>
                        <?php $submenu = false; endif; ?>
                    <?php endif; ?>
                     <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
                </li>                           
                <?php $submenu = false; endif; ?>
            
            <?php $count++; endforeach; ?>
            
              </ul>
                          <!-- Right nav -->
                          <?php  //wp_nav_menu( array( 'sub_menu' => true,  'walker' => new WPSE_78121_Sublevel_Walker , 'theme_location' => 'primary', 'items_wrap' => '<ul id="menu" class="nav navbar-nav navbar-right">%3$s</ul>' ) ); ?>
 
        
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
                              	   <a href="<?php echo $theme_option['lg_li_in']; ?>" class="instagram1"></a>
                                   <a href="<?php echo $theme_option['lg_link_li']; ?>" class="linkedin1"></a>
                                   <a href="<?php echo $theme_option['lg_li_fb']; ?>" class="facebook1"></a>
                                   <!--<a href="#" class="twitter1"></a>-->
                              </div>
                         </div>
                      </div><!--close header_right-->
          </div><!--close container-->
     </header>
