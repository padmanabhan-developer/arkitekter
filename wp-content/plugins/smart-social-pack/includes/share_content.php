<?php
 function post_share_botton_setting($bottom_output=''){
 	$bottom_output = '<br/>'; 
 	$bottom_output .= '<div class="bottom_output"><ul>';
 	if(get_option('enable_fb')==1){
 	$bottom_output .= '<li class="smart-btn-facebook">
								<a class="smart-link-facebook" title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=' . get_permalink(). '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span><i class="fa fa-facebook-square icon"></i></span>
										<span class="fb_small_btn mini">share</span>
									<span class="facebook" data-url="'.get_permalink().'" data-text="'.get_the_title().' - " ></span>
								</a>
							</li>';
								}
	if (get_option('twitter_via')):
	$twitter_mention = " - via:" . get_option('twitter_via');
	else:
		$twitter_mention = "";
	endif;
		if(get_option('enable_twitter')==1){
	$bottom_output .= '<li class="smart-btn-twitter">
								<a class="smart-link-twitter" title="Tweet on Twitter" href="https://twitter.com/intent/tweet?text='.get_the_title().': '.get_permalink().$twitter_mention. '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span><i class="fa fa-twitter-square icon"></i></span>
									<span class="twitter_small_btn mini">Tweet</span>
								</a>
							</li>';
										}
	if(get_option('enable_gp')==1){
	$bottom_output .= '<li class="smart-btn-gplus">
								<a class="smart-link-gplus" title="Share on Google+" href="http://plus.google.com/share?url=' .get_permalink(). '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span><i class="fa fa-google-plus icon"></i></span>
									<span class="gp_small_btn mini" >+1</span>
								</a>
							</li>';
						}
	if(get_option('enable_pct')==1){
	$bottom_output .= '<li class="smart-btn-pocket">
								<a class="smart-link-pocket" title="Save to read later on Pocket" href="https://getpocket.com/save?url=' . get_permalink() . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
									<span ><i class="fa fa-get-pocket icon"></i></span>
									<span class="pocket_small_btn mini">Pocket</span>
								</a>
							</li>';
						}
	if(get_option('enable_ln')==1){
		$bottom_output .= '<li class="smart-btn-linkedin">
								<a class="smart-link-linkedin" title="Share on Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&title='. get_the_title() .'" onclick="if(!document.getElementById(\'td_social_networks_buttons\')){window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;}" >
									<span ><i class="fa fa-linkedin-square icon"></i></span>
									<span class="ln_small_btn mini">LinkedIn</span>
									<span data-url="'.get_permalink().'" data-text="'.get_the_title().' - " ></span>
								</a>
								</li>';}
	if(get_option('enable_eml')==1){
	$bottom_output .= '<li class="smart-btn-email">
								<a class="smart-link-email" title="Share via mail" href="mailto:?subject='.get_the_title().'&body='.get_option('sharify_custom_email_msg'). ' - ' . get_permalink().'">
									<span ><i class="fa fa-envelope icon"></i></span>
									<span class="eml_small_btn mini">Email</span>
								</a>
								</li>';}

 	$bottom_output .= '</ul></div></br/>';
 	return $bottom_output;
}


function post_share_tuttom($content){
if (1 == get_option('cstm_post') && is_custom_post_type()){

}else{
if(is_single() && (1 == get_option('smart_fb_share'))){

 $add_sharebutton = post_share_botton_setting();
 return $content.$add_sharebutton;
 
}else{
	return $content;

}

}
 }
 add_filter('the_content','post_share_tuttom');


function post_share_tuttom_top($content){
	if (1 == get_option('cstm_post') && is_custom_post_type()){

}else{
if(is_single() && (1 == get_option('smart_fb_share_top'))){

 $add_sharebutton = post_share_botton_setting();
 return $add_sharebutton.$content;
 
}else{
	return $content;

}
}
 }
 add_filter('the_content','post_share_tuttom_top');


