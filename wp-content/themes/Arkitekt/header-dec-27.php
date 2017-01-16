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
 <script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
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
	          	<?php
				$menu_name_res = 'primary';
				$locations_res = get_nav_menu_locations();
				$menu_res = wp_get_nav_menu_object( $locations_res[ $menu_name_res ] );
				$menuitems_res = wp_get_nav_menu_items( $menu_res->term_id, array( 'order' => 'DESC' ) );
				//print_r($menuitems);
			   ?>
                <ul>
                <?php
                $count_res = 0;
                $submenu_res = false;
                foreach( $menuitems_res as $item_res ):
                    // set up title and url
                    $title_res = $item_res->title;
                    $link_res = $item_res->url;
                    // item does not have a parent so menu_item_parent equals 0 (false)
                    if ( !$item_res->menu_item_parent ):
            
                    // save this id for later comparison with sub-menu items
                    $parent_id_res = $item_res->ID;
				$postid_res = 	url_to_postid( $link_res );
                ?>
                   <li>
                    <a href="<?php if($link_res && $link_res !='#'){ echo $link_res; }else {?> javascript:; <?php }?>" class="title <?php echo $postid_res;?>">
                        <?php echo $title_res; 	?>
                    </a>
                <?php endif; ?>
                 <?php if ( $parent_id_res == $item_res->menu_item_parent ): ?>
                  <?php if ( !$submenu ): $submenu = true; ?>
                  		<ul>
                        <?php 
						
						endif; ?>
                         	<li>
                            <a href="<?php echo $link_res; ?>" class="title"><?php echo $title_res; ?></a>
                            </li>
                            <?php if ( $menuitems_res[ $count_res + 1 ]->menu_item_parent != $parent_id_res && $submenu ): ?>
                        </ul>
                        
                     <?php $submenu = false; endif; ?>   
                     <?php endif; ?>
                     <?php if ( $menuitems_res[ $count_res + 1 ]->menu_item_parent != $parent_id_res ): ?>
                </li>                           
                <?php $submenu = false; endif; ?>
            <?php $count_res++; endforeach; ?>
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
			 global $post;
    		 $post_slug=strtolower($post->post_name);
			   ?>
            <ul id="menu" class="nav navbar-nav navbar-right">
                <?php
                $count = 0;
                $submenu = false;
					$mainmenu = 1;
                foreach( $menuitems as $item ):
                    // set up title and url
                   // print_r($item);
					$title = $item->title;
                    $link = $item->url;
                    // item does not have a parent so menu_item_parent equals 0 (false)
                    if ( !$item->menu_item_parent ):
            
                    // save this id for later comparison with sub-menu items
                    $parent_id = $item->ID;
					$postid = 	url_to_postid( $link );
					//echo	get_permalink();
					$urlarray = explode('/',$item->url);
					$urlslug = strtolower($urlarray[count($urlarray)-2]);
			
                ?>
                <li <?php if($post_slug==$urlslug) {?>class="active" <?php } ?>>
                    <a slug="<?php echo $item->title;?>" href="<?php if($link && $link !='#'){ echo $link; }else {?> javascript:; <?php }?>" data-mainmenu="<?php echo $parent_id;?>" class="title <?php echo $item->object_id;?> <?php echo get_the_ID()?>">
                        <?php echo $title;
						$submenucount=1;
						?>
                    </a>
                <?php endif; ?>
                 <?php if ( $parent_id == $item->menu_item_parent ): ?>
                  <?php if ( !$submenu ): $submenu = true; ?>
                    <div class="submenu_section" id="displaymenu<?php echo $parent_id;?>" >
                    <div class="container">
                        <div class="submenu">
                        <ul>
                        <?php 
						
						endif; ?>
                     <?php //$postid = 	url_to_postid( $link );
					 
					$urlarray1 = explode('/',$link);
					//print_r($urlarray1);
					 $urlslug1 = strtolower($urlarray1[count($urlarray1)-2]);

						?>
                         	<li data-getid="<?php echo $post_slug;?>" data-postid="<?php echo $urlslug1;?> - <?php echo $post_slug;?>"  <?php if($post_slug==$urlslug1) {?>class="submenuactive" <?php } ?>>
                            <a slug="<?php echo $item->title;?>" href="<?php echo $link; ?>" class="title <?php echo $item->object_id;?> <?php echo get_the_ID()?>"><?php echo $title; ?></a>
                            </li>
                            <?php if(($submenucount > 1) && ($submenucount%3==0) ) echo "</ul><ul>";?>
                            <?php $submenucount++;?>
                            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                        </ul>
                        <?php if($submenucount <=2) $height = 126;
						else if($submenucount == 3)$height = 143;
						else $height = 159;
						?>
                        <span id="submenu<?php echo $parent_id;?>" style="display:none;" data-submenucount="<?php echo $height ?>"></span>
                        <a id="close<?php echo $parent_id;?>" data-menuclose="<?php echo $parent_id;?>" class="close_button" href="javascript:;"></a>
                         </div>
                      </div>
                    </div>
                        <?php $submenu = false; endif; ?>
                    <?php endif; ?>
                     <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
                </li>                           
                <?php $submenu = false; endif; ?>
            
            <?php 
			$mainmenu++;
			$count++; endforeach; ?>
            
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
<div id="showmenudiv" style="display:none; height:160px; background-color:#FFF; "></div>