<?php
/**
* Plugin Name: social share a full social pakage
* Version: 1.5
* Plugin URI:http://me.codeoner.com/
* Description: You'll get there are many option this plugin ,  By this plugin you can share your blog post,custom type post in many social website, You can design social website icon from dashboar, you can linking you socila profile  in your website,you can easnily design it, also you can Add your facebook page in your website and desing all theme from dashboard.
* Author: Quazi Sazzad
* Author URI: http://me.codeoner.com/
* Tested up to: 4.6
* Layers Plugin: True
* Layers Required Version: 1.0
*License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * License: GPL2
 * Copyright 2016  quazi sazzad  (email : qsazzad21@gmail.com, skype:quazisazzad)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
**/

 if(!defined('ABSPATH'))
 	{
	exit;
	}

  require_once(plugin_dir_path(__FILE__).'/includes/smart-fb-script.php');
  require_once(plugin_dir_path(__FILE__).'/includes/smart-fb-page-class.php');
  require_once(plugin_dir_path(__FILE__).'/includes/social_link_class.php');
  require_once(plugin_dir_path(__FILE__).'/includes/share_content.php');
  require_once(plugin_dir_path(__FILE__).'/includes/share_setting.php');

  	
function fb_page_widget(){
	register_widget('smart_fb_page_like');
	register_widget('social_link');

}
add_action('widgets_init','fb_page_widget');


function active_smart_share()
{
  	add_option('smart_fb_share', 1);
  	add_option('smart_fb_share_buttom', 0);
  	add_option('enable_fb', 1);
	add_option('small_fb_button'	, 0);
	add_option('enable_twitter'		, 1);
	add_option('small_twitter_button'		, 0);
	add_option('enable_gp'		, 1);
	add_option('small_gp_button'	    , 0);
	add_option('enable_pct'	, 1);
	add_option('small_pct_button', 0);
	add_option('enable_ln'		, 1);
	add_option('small_ln_button'		    , 0);
	add_option('enable_eml'		, 1);
	add_option('small_eml_button'	, 0);
	add_option('fb_color', "#ffffff");
	add_option('fb_bacground', "#3b5998");
	add_option('fb_hover', "#0e2e6f");
	add_option('twitter_bacground', "#4db2ec");
	add_option('twitter_color', "#ffffff");
	add_option('twitter_hover', "#138bdb");
	add_option('gp_bacground', "#a32c2c");
	add_option('gp_hover', "#a30000");
	add_option('gp_color', "#ffffff");
	add_option('pct_bacground', "#b5414a");
	add_option('pct_color', "#ffffff");
	add_option('pct_hover', "#b5000f");
	add_option('ln_bacground', "#2c4270");
	add_option('ln_color', "#ffffff");
	add_option('ln_hover', "#012270");
	add_option('eml_bacground', "#bf4133");
	add_option('eml_color', "#ffffff");
	add_option('eml_hover', "#bf1805");

}
register_activation_hook(__FILE__, 'active_smart_share');


function deactive_smart_share()
{
  delete_option('smart_fb_share');
  delete_option('smart_fb_share_buttom');
  delete_option('enable_fb');
	delete_option('small_fb_button');
	delete_option('enable_twitter');
	delete_option('small_twitter_button');
	delete_option('enable_gp');
	delete_option('small_gp_button');
	delete_option('enable_pct');
	delete_option('small_pct_button');
	delete_option('enable_ln');
	delete_option('small_ln_button');
	delete_option('enable_eml');
	delete_option('small_eml_button');
	delete_option('fb_bacground');
	delete_option('fb_hover');
	delete_option('fb_color');
	delete_option('twitter_bacground');
	delete_option('twitter_color');
	delete_option('twitter_hover');
	delete_option('gp_color');
	delete_option('gp_bacground');
	delete_option('gp_hover');
	delete_option('pct_bacground');
	delete_option('pct_color');
	delete_option('pct_hover');
	delete_option('ln_bacground');
	delete_option('ln_color');
	delete_option('ln_hover');
	delete_option('eml_bacground');
	delete_option('eml_color');
	delete_option('eml_hover');
}

register_deactivation_hook(__FILE__, 'deactive_smart_share');?>
