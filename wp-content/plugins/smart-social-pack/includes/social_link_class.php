<?php 

class social_link extends WP_Widget{
	public function __construct(){
		parent:: __construct('social_link', 'Social link',array(
          'description'=> 'add Social Website in your website'
			));
	}

	

 public function widget( $args, $instance ) {
		// outputs the content of the widget

     $link=array();
		  $link['facebook_link']=esc_attr($instance['facebook_link']);
		  $link['twitter_link']=esc_attr($instance['twitter_link']);
		  $link['linkedin']=esc_attr($instance['linkedin']);
		  $link['google_link']=esc_attr($instance['google_link']);
			
			$icon_color = array();
			$icon_color['fb'] = esc_attr($instance['fb_icon_color']);	
			$icon_color ['twitter']= esc_attr($instance['twitter_icon_color']);	
			$icon_color['linkedin'] = esc_attr($instance['linkedin_icon_color']);	
			$icon_color ['google']= esc_attr($instance['google_icon_color']);	

         $icon=array();
		  $icon['facebook_icon']=esc_attr($instance['facebook_icon']);
		  $icon['twitter_icon']=esc_attr($instance['twitter_icon']);
		  $icon['linkedin_icon']=esc_attr($instance['linkedin_icon']);
		  $icon['google_icon']=esc_attr($instance['google_icon']);
	 	  $icon_width = $instance['icon_width'];
			  echo $args['before_widget'];
			  echo $args['before_title'];
					    echo $instance['title'];
					    echo $args['after_title'];
				$this->get_social_link($link,$icon,$icon_color, $icon_width);
				echo $args['after_widget'];


 }
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
       $this->get_form($instance);
    }

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
     $instance = array();
     $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
      $instance['facebook_link'] = (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '';
      $instance['facebook_icon']= (!empty($new_instance['facebook_icon'])) ? strip_tags($new_instance['facebook_icon']) : '';
      $instance['twitter_link']= (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '';
      $instance['twitter_icon']= (!empty($new_instance['twitter_icon'])) ? strip_tags($new_instance['twitter_icon']) : '';
      $instance['linkedin']= (!empty($new_instance['linkedin'])) ? strip_tags($new_instance['linkedin']) : '';
      $instance['linkedin_icon']= (!empty($new_instance['linkedin_icon'])) ? strip_tags($new_instance['linkedin_icon']) : '';
      $instance['google_link']= (!empty($new_instance['google_link'])) ? strip_tags($new_instance['google_link']) : '';
      $instance['google_icon']= (!empty($new_instance['google_icon'])) ? strip_tags($new_instance['google_icon']) : '';
      $instance['fb_icon_color']= (!empty($new_instance['fb_icon_color'])) ? strip_tags($new_instance['fb_icon_color']) : '';
      $instance['twitter_icon_color']= (!empty($new_instance['twitter_icon_color'])) ? strip_tags($new_instance['twitter_icon_color']) : '';
      $instance['linkedin_icon_color']= (!empty($new_instance['linkedin_icon_color'])) ? strip_tags($new_instance['linkedin_icon_color']) : '';
      $instance['google_icon_color']= (!empty($new_instance['google_icon_color'])) ? strip_tags($new_instance['google_icon_color']) : '';
      $instance['icon_width']= (!empty($new_instance['icon_width'])) ? strip_tags($new_instance['icon_width']) : '';
      return $instance;
	 }

	



   public function get_form($instance){
   
     if(isset($instance['title'])){
 	  	$title = $instance['title'];
 	  }else{
 	   $title = 'Find Us on:';
 	  } 
 
      if(isset($instance['facebook_link'])){
 	  	$facebook_link = $instance['facebook_link'];
 	  }else{
 	   $facebook_link = 'https://www.facebook.com';
 	  }  

     if(isset($instance['twitter_link'])){
 	  	$twitter_link = $instance['twitter_link'];
 	  }else{
 	   $twitter_link = 'https://www.twitter.com';
 	  }


     if(isset($instance['linkedin'])){
 	  	$linkedin = $instance['linkedin'];
 	  }else{
 	   $linkedin = 'https://www.linkedin.com';
 	  }


     if(isset($instance['google_link'])){
 	  	$google_link = $instance['google_link'];
 	  }else{
 	   $google_link = 'https://www.plus.google.com';
 	  }

 	   if(isset($instance['facebook_icon'])){
 	  	$facebook_icon = $instance['facebook_icon'];
 	  }else{
 	   $facebook_icon = 'facebook';
 	  }

 	   if(isset($instance['twitter_icon'])){
 	  	$twitter_icon = $instance['twitter_icon'];
 	  }else{
 	   $twitter_icon = 'twitter';
 	  }
  
     if(isset($instance['linkedin_icon'])){
 	  	$linkedin_icon = $instance['linkedin_icon'];
 	  }else{
 	   $linkedin_icon = 'linkedin';
 	  }
  
  if(isset($instance['google_icon'])){
 	  	$google_icon = $instance['google_icon'];
 	  }else{
 	   $google_icon = 'google-plus';
 	  }

 	  if(isset($instance['fb_icon_color'])){
 	  	$fb_icon_color = $instance['fb_icon_color'];
 	  }else{
 	   $fb_icon_color = 'blue';
 	  }

 	  if(isset($instance['twitter_icon_color'])){
 	  	$twitter_icon_color = $instance['twitter_icon_color'];
 	  }else{
 	   $twitter_icon_color = '#4DB2EC';
 	  }
 	    if(isset($instance['linkedin_icon_color'])){
 	  	$linkedin_icon_color = $instance['linkedin_icon_color'];
 	  }else{
 	   $linkedin_icon_color = '#FF0000';
 	  }

 	   if(isset($instance['google_icon_color'])){
 	  	$google_icon_color = $instance['google_icon_color'];
 	  }else{
 	   $google_icon_color = '#b00';
 	  }


  
  
  if(isset($instance['icon_width'])){
 	  	$icon_width = $instance['icon_width'];
 	  }else{
 	   $icon_width = 32;
 	      } ?>
       <p>
       	<label for="<?php echo $this->get_field_id('title') ?>"> Title:</label>
       	<input type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>"
       	value="<?php echo esc_attr ($title); ?>" class="widefat">
       </p>

        <p>
       	<label for="<?php echo $this->get_field_id('facebook_link') ?>"> Link:</label>
       	<input type="text" id="<?php echo $this->get_field_id('facebook_link') ?>" name="<?php echo $this->get_field_name('facebook_link') ?>"
       	value="<?php echo esc_attr ($facebook_link); ?>" class="widefat">
       </p>

        <p>
       	<label for="<?php echo $this->get_field_id('facebook_icon') ?>"> Icon:</label>
       	<input type="text" id="<?php echo $this->get_field_id('facebook_icon') ?>" name="<?php echo $this->get_field_name('facebook_icon') ?>"
       	value="<?php echo esc_attr ($facebook_icon); ?>" class="widefat">
       </p>

        <p>
       	<label for="<?php echo $this->get_field_id('fb_icon_color') ?>"> Icon Background Color:</label>
       	<input type="text" id="<?php echo $this->get_field_id('fb_icon_color') ?>" name="<?php echo $this->get_field_name('fb_icon_color') ?>"
       	value="<?php echo esc_attr ($fb_icon_color); ?>" class="widefat">
       </p>

        <p>
       	<label for="<?php echo $this->get_field_id('twitter_link') ?>"> Link:</label>
       	<input type="text" id="<?php echo $this->get_field_id('twitter_link') ?>" name="<?php echo $this->get_field_name('twitter_link') ?>"
       	value="<?php echo esc_attr ($twitter_link); ?>" class="widefat">
       </p>
   
         <p>
       	<label for="<?php echo $this->get_field_id('twitter_icon') ?>"> Icon:</label>
       	<input type="text" id="<?php echo $this->get_field_id('twitter_icon') ?>" name="<?php echo $this->get_field_name('twitter_icon') ?>"
       	value="<?php echo esc_attr ($twitter_icon); ?>" class="widefat">
       </p>
  
			<p>
       	<label for="<?php echo $this->get_field_id('twitter_icon_color') ?>"> Icon Background Color:</label>
       	<input type="text" id="<?php echo $this->get_field_id('twitter_icon_color') ?>" name="<?php echo $this->get_field_name('twitter_icon_color') ?>"
       	value="<?php echo esc_attr ($twitter_icon_color); ?>" class="widefat">
       </p>


        <p>
       	<label for="<?php echo $this->get_field_id('linkedin') ?>"> Link:</label>
       	<input type="text" id="<?php echo $this->get_field_id('linkedin') ?>" name="<?php echo $this->get_field_name('linkedin') ?>"
       	value="<?php echo esc_attr ($linkedin); ?>" class="widefat">
       </p>
   
         <p>
       	<label for="<?php echo $this->get_field_id('linkedin_icon') ?>"> Icon:</label>
       	<input type="text" id="<?php echo $this->get_field_id('linkedin_icon') ?>" name="<?php echo $this->get_field_name('linkedin_icon') ?>"
       	value="<?php echo esc_attr ($linkedin_icon); ?>" class="widefat">
       </p>


      
			<p>
       	<label for="<?php echo $this->get_field_id('linkedin_icon_color') ?>"> Icon Background Color:</label>
       	<input type="text" id="<?php echo $this->get_field_id('linkedin_icon_color') ?>" name="<?php echo $this->get_field_name('linkedin_icon_color') ?>"
       	value="<?php echo esc_attr ($linkedin_icon_color); ?>" class="widefat">
       </p>

          <p>
       	<label for="<?php echo $this->get_field_id('google_link') ?>"> Link:</label>
       	<input type="text" id="<?php echo $this->get_field_id('google_link') ?>" name="<?php echo $this->get_field_name('google_link') ?>"
       	value="<?php echo esc_attr ($google_link); ?>" class="widefat">
       </p>
   
         <p>
       	<label for="<?php echo $this->get_field_id('google_icon') ?>"> Icon:</label>
       	<input type="text" id="<?php echo $this->get_field_id('google_icon') ?>" name="<?php echo $this->get_field_name('google_icon') ?>"
       	value="<?php echo esc_attr ($google_icon); ?>" class="widefat">
       </p>
  
				<p>
       	<label for="<?php echo $this->get_field_id('google_icon_color') ?>"> Icon Background Color:</label>
       	<input type="text" id="<?php echo $this->get_field_id('google_icon_color') ?>" name="<?php echo $this->get_field_name('google_icon_color') ?>"
       	value="<?php echo esc_attr ($google_icon_color); ?>" class="widefat">
       </p>

        <p>
       	<label for="<?php echo $this->get_field_id('icon_width') ?>"> Icon Size:</label>
       	<input type="text" id="<?php echo $this->get_field_id('icon_width') ?>" name="<?php echo $this->get_field_name('icon_width') ?>"
       	value="<?php echo esc_attr ($icon_width); ?>" class="widefat">
       </p>
  
  

            <?php }

        public function get_social_link($link,$icon,$icon_color, $icon_width){ ?>
        <div class="social-link">
        	 <a target="_blank" href="<?php echo esc_attr($link['facebook_link']); ?>"><i style="font-size:<?php echo $icon_width; ?>px;color:<?php echo esc_attr($icon_color['fb']); ?>; border-radius: 5%;" class="fa fa-<?php echo esc_attr($icon['facebook_icon']); ?>-square"></i></a>

        	 <a target="_blank" href="<?php echo esc_attr($link['twitter_link']); ?>"><i style="font-size:<?php echo $icon_width; ?>px;color:<?php echo esc_attr($icon_color['twitter']); ?>; border-radius: 5%;" class="fa fa-<?php echo esc_attr($icon['twitter_icon']); ?>-square"></i></a>

        	 <a target="_blank" href="<?php echo esc_attr($link['linkedin']); ?>"><i style="font-size:<?php echo $icon_width; ?>px;color:<?php echo esc_attr($icon_color['linkedin']); ?>; border-radius: 5%;" class="fa fa-<?php echo esc_attr($icon['linkedin_icon']); ?>-square"></i></a>

        	 <a target="_blank" href="<?php echo esc_attr($link['google_link']); ?>"><i style="font-size:<?php echo $icon_width; ?>px;color:<?php echo esc_attr($icon_color['google']); ?>; border-radius: 5%;" class="fa fa-<?php echo esc_attr($icon['google_icon']); ?>-square"></i></a>

        </div>

      <?php  }

}


