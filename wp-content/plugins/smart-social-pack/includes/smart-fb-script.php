<?php

function js_css(){
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css');
	wp_enqueue_style('adminstyle', plugins_url().'/smart-social-pack/style/style.php');
	wp_enqueue_script('main',plugins_url().'/smart-social-pack/js/main.js');
	wp_enqueue_script('count',plugins_url().'/smart-social-pack/js/count.js');
}
add_action('wp_enqueue_scripts','js_css');
 function admn_scipt(){
 	wp_enqueue_style( 'wp-color-picker' ); 
 	 wp_enqueue_script('wp-color-picker');
   wp_enqueue_script('color', plugins_url().'/smart-social-pack/js/color-picker.js');
 }
 add_action('admin_enqueue_scripts','admn_scipt');