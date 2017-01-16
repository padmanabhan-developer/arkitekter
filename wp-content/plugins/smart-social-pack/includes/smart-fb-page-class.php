<?php 

class smart_fb_page_like extends WP_Widget{
	public function __construct(){
		parent:: __construct('smart_fb_page_like', 'smart page liker',array(
          'description'=> 'add your fb page in your website'
			));
	}

 public	function widget($args,$instance){
  
   $data=array();
  $data['title']=$instance['title'];
  $data['page_url']=$instance['page_url'];
  $data['show_timeline']=$instance['show_timeline'];
  $data['adopt_containar']=$instance['adopt_containar'];
  $data['width']=$instance['width'];
  $data['height']=$instance['height'];
  $data['showface_file']=$instance['showface_file'];
  $data['small_header']=$instance['small_header'];
  $data['hide_cover']=$instance['small_header'];

      echo $args['before_widget'];
      echo $args['before_title'];
      echo $data['title'];
      echo $args['after_title'];
      $this->get_fb_form($data);
      echo $args['after_widget'];

	}

 public	function form($instance){

 	  if(isset($instance['title'])){
 	  	$title = $instance['title'];
 	  }else{
 	   $title = 'like us on fb';
 	  }  

 	  if(isset($instance['page_url'])){
 	  	$page_url = $instance['page_url'];
 	  }else{
 	   $page_url = 'http://facebook.com/facebook';
 	  }

 	   if(isset($instance['show_timeline'])){
 	  	$show_timeline = $instance['show_timeline'];
 	  }else{
 	   $show_timeline = 'true';
 	  }

 	  if(isset($instance['adopt_containar'])){
 	  	$adopt_containar = $instance['adopt_containar'];
 	  }else{
 	   $adopt_containar = 'true';
 	  }

 	  if(isset($instance['width'])){
 	  	$width = $instance['width'];
 	  }else{
 	   $width = 250;
 	  }

 	  if(isset($instance['height'])){
 	  	$height = $instance['height'];
 	  }else{
 	   $height = 500;
 	  }

 	  if(isset($instance['showface_file'])){
 	  	$showface_file = $instance['showface_file'];
 	  }else{
 	   $showface_file = 'true';
 	  }

 	  if(isset($instance['small_header'])){
 	  	$small_header = $instance['small_header'];
 	  }else{
 	   $small_header = 'false';
 	  }
 	  if(isset($instance['hide_cover'])){
 	  	$hide_cover = $instance['hide_cover'];
 	  }else{
 	   $hide_cover = 'false';
 	  }
		?>
       <p>
       	<label for="<?php echo $this->get_field_id('title') ?>">title:</label>
       	<input type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>"
       	value="<?php echo esc_attr ($title); ?>" class="widefat">
       </p>

        <p>
       	<label for="<?php echo $this->get_field_id('page_url') ?>">page url:</label>
       	<input type="text" id="<?php echo $this->get_field_id('page_url') ?>" name="<?php echo $this->get_field_name('page_url') ?>"
       	value="<?php echo esc_attr ($page_url); ?>" class="widefat">
       </p>


           <p>

       	<label for="<?php echo $this->get_field_id('show_timeline') ?>"> show timeline:</label>
       	<select type="text" id="<?php echo $this->get_field_id('show_timeline') ?>" name="<?php echo $this->get_field_name('show_timeline') ?>"

       	value="<?php echo esc_attr ($show_timeline); ?>" class="widefat">
       	 <option value="true" <?php echo ($show_timeline=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo ($show_timeline=='false') ? 'selected' : ''  ?>>false</option>
       	</select>
       </p>

       <p>

       	<label for="<?php echo $this->get_field_id('adopt_containar') ?>"> adopt containar:</label>
       	<select type="text" id="<?php echo $this->get_field_id('adopt_containar') ?>" name="<?php echo $this->get_field_name('adopt_containar') ?>"

       	value="<?php echo esc_attr ($adopt_containar); ?>" class="widefat">
       	 <option value="true" <?php echo ($adopt_containar=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo ($adopt_containar=='false') ? 'selected' : ''  ?>>false</option>
       	</select>
       </p>

          <p>
       	<label for="<?php echo $this->get_field_id('width') ?>">width:</label>
       	<input type="text" id="<?php echo $this->get_field_id('width') ?>" name="<?php echo $this->get_field_name('width') ?>"
       	value="<?php echo esc_attr ($width); ?>" class="widefat">
       </p>

       <p>
       	<label for="<?php echo $this->get_field_id('height') ?>">height:</label>
       	<input type="text" id="<?php echo $this->get_field_id('height') ?>" name="<?php echo $this->get_field_name('height') ?>"
       	value="<?php echo esc_attr ($height); ?>" class="widefat">
       </p>

       <p>

       	<label for="<?php echo $this->get_field_id('showface_file') ?>"> show face firend:</label>
       	<select type="text" id="<?php echo $this->get_field_id('showface_file') ?>" name="<?php echo $this->get_field_name('showface_file') ?>"

       	value="<?php echo esc_attr ($showface_file); ?>" class="widefat">
       	 <option value="true" <?php echo ($showface_file=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo ($showface_file=='false') ? 'selected' : ''  ?>>false</option>
       	</select>
       </p>

       <p>

       	<label for="<?php echo $this->get_field_id('small_header') ?>"> small header:</label>
       	<select type="text" id="<?php echo $this->get_field_id('small_header') ?>" name="<?php echo $this->get_field_name('small_header') ?>"

       	value="<?php echo esc_attr ($small_header); ?>" class="widefat">
       	 <option value="true" <?php echo ($small_header=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo ($small_header=='false') ? 'selected' : ''  ?>>false</option>
       	</select>
       </p>

       <p>

       	<label for="<?php echo $this->get_field_id('hide_cover') ?>"> hide coverphoto:</label>
       	<select type="text" id="<?php echo $this->get_field_id('hide_cover') ?>" name="<?php echo $this->get_field_name('hide_cover') ?>"

       	value="<?php echo esc_attr ($hide_cover); ?>" class="widefat">
       	 <option value="true" <?php echo ($hide_cover=='true') ? 'selected' : ''  ?>>true</option>
       	 <option value="false" <?php echo ($hide_cover=='false') ? 'selected' : ''  ?>>false</option>
       	</select>
       </p>

		<?php
	}

       public function update($new_instance, $old_instance){
      $instance = array();
      $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
      $instance['page_url']= (!empty($new_instance['page_url'])) ? strip_tags($new_instance['page_url']) : '';
      $instance['adopt_containar']= (!empty($new_instance['adopt_containar'])) ? strip_tags($new_instance['adopt_containar']) : '';
      $instance['width']= (!empty($new_instance['width'])) ? strip_tags($new_instance['width']) : '';
      $instance['height']= (!empty($new_instance['height'])) ? strip_tags($new_instance['height']) : '';
      $instance['show_timeline']= (!empty($new_instance['show_timeline'])) ? strip_tags($new_instance['show_timeline']) : '';
      $instance['showface_file']= (!empty($new_instance['showface_file'])) ? strip_tags($new_instance['showface_file']) : '';
      $instance['small_header']= (!empty($new_instance['small_header'])) ? strip_tags($new_instance['small_header']) : '';
      $instance['hide_cover']= (!empty($new_instance['hide_cover'])) ? strip_tags($new_instance['hide_cover']) : '';
      return $instance;
	 }


	public function get_fb_form($data){

		
		?>

        <div class="fb-page" 
        data-href="<?php echo $data['page_url']; ?>" 
        <?php if( $data['show_timeline'] == 'true'): ?>
        data-tabs="timeline" 
     <?php endif ?>

        data-small-header="<?php echo $data['small_header']; ?>" 

        <?php if( $data['adopt_containar']=='true') :?>
        data-adapt-container-width="true" 
         <?php else: ?>
        data-width="<?php echo  $data['width'] ?>"
        data-width="<?php echo  $data['height'] ?>"
     <?php endif; ?>

        data-hide-cover="<?php echo $data['hide_cover']; ?>" 
        data-show-facepile="<?php echo $data['showface_file']; ?>">
        </div>


		<?php
	}
}