<?php 
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
 header('Content-type: text/css');
header('Cache-control: must-revalidate');

 ?>
.bottom_output {
	width: 100%;
}

.bottom_output  ul{
margin: 0;
padding: 0;
}
.smart-btn-facebook {background: <?php echo get_option('fb_bacground'); ?>;}
.smart-btn-twitter{background: <?php echo get_option('twitter_bacground'); ?>;}
.smart-btn-gplus{background:<?php echo get_option('gp_bacground'); ?>;}
.smart-btn-pocket{background: <?php echo get_option('pct_bacground'); ?>;}
.smart-btn-linkedin{background: <?php echo get_option('ln_bacground'); ?>;}
.smart-btn-email{background: <?php echo get_option('eml_bacground'); ?>;}

.smart-link-facebook {color:<?php echo get_option('fb_color'); ?>}
.smart-link-twitter{color:<?php echo get_option('twitter_color'); ?>}
.smart-link-gplus{color:<?php echo get_option('gp_color'); ?>}
.smart-link-email{color:<?php echo get_option('eml_color'); ?>}
.smart-link-pocket{color:<?php echo get_option('pct_color'); ?>}
.smart-link-linkedin{color:<?php echo get_option('ln_color'); ?>}

.smart-btn-facebook:hover {background-color: <?php echo get_option('fb_hover'); ?> }
.smart-btn-facebook a:hover {color:#fff;    text-decoration: none !important}
.smart-btn-twitter:hover  {background-color: <?php echo get_option('twitter_hover'); ?>}
.smart-btn-twitter a:hover {color:#fff;    text-decoration: none !important}
.smart-btn-gplus:hover {background-color: <?php echo get_option('gp_hover'); ?>}
.smart-btn-gplus a:hover {color:#fff;    text-decoration: none !important}
.smart-btn-pocket:hover {background-color: <?php echo get_option('pct_hover'); ?>}
.smart-btn-pocket a:hover {color:#fff;    text-decoration: none !important}
.smart-btn-linkedin:hover {background-color:  <?php echo get_option('ln_hover'); ?>}
.smart-btn-linkedin a:hover {color:#fff;    text-decoration: none !important}
.smart-btn-email:hover {background-color: <?php echo get_option('eml_hover'); ?>}
.smart-btn-email a:hover {color:#fff;    text-decoration: none !important}

<?php 
if ( 1 == get_option('small_fb_button') ){
 ?>
.fb_small_btn{
	display: none;
}
<?php } ?>

<?php 
if ( 1 == get_option('small_twitter_button') ){
 ?>
.twitter_small_btn{
	display: none;
}
<?php } ?>

<?php 
if ( 1 == get_option('small_gp_button') ){
 ?>
.gp_small_btn{
	display: none;
}
<?php } ?>

<?php 
if ( 1 == get_option('small_pct_button') ){
 ?>
.pocket_small_btn{
	display: none;
}
<?php } ?>

<?php 
if ( 1 == get_option('small_ln_button') ){
 ?>
.ln_small_btn{
	display: none;
}
<?php } ?>

<?php 
if ( 1 == get_option('small_eml_button') ){
 ?>
.eml_small_btn{
	display: none;
}
<?php } ?>

.bottom_output  ul li{
	list-style: none;
	margin: 1px;
	display: inline;
	border-radius: 3px;
  padding:4px;
}

.bottom_output ul li a{
	text-decoration: none !important;
	font-size: 16px;
	padding:2px;
}


.icon{
	margin-left:3px; 
}

@media only screen and (min-width: 768px) and (max-width: 1120px) {
	
	.bottom_output ul li a{
	text-decoration: none;
	font-size: 12px;
}
}



@media only screen and (min-width: 200px) and (max-width: 767px) {

			.mini{display:none;}				

}


