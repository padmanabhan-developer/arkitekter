<?php
/**
 * Social widget
 */
class caddy_Social_Widget extends WP_Widget {
  function caddy_Social_Widget() {
    $widget_ops = array('classname' => 'widget_caddy_social', 'description' => __('Simple way to add Social Icons', 'leadagency'));
    $this->__construct('widget_caddy_social', __('leadagency: Social Links', 'leadagency'), $widget_ops);
    $this->alt_option_name = 'widget_caddy_social';

    
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_caddy_social', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    if (!isset($instance['facebook'])) { $instance['facebook'] = ''; }
    if (!isset($instance['instagram'])) { $instance['instagram'] = ''; }
    if (!isset($instance['linkdin'])) { $instance['linkdin'] = ''; }
    if (!isset($instance['twitter'])) { $instance['twitter'] = ''; }
   

    echo $before_widget;
    if ($title) {
      echo $before_title;
      echo $title;
      echo $after_title;
    }
  ?>
<ul class="social_icon">
<?php if(!empty($instance['facebook'])):?><li><a href="<?php echo esc_url($instance['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif;?>
<?php if(!empty($instance['linkdin'])):?><li><a href="<?php echo esc_url($instance['linkdin']); ?>"  target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif;?>
<?php if(!empty($instance['twitter'])):?><li><a href="<?php echo esc_url($instance['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif;?>

<?php if(!empty($instance['instagram'])):?><a  href="<?php echo esc_url($instance['instagram']); ?>" target="_blank"><li><i class="fa fa-instagram"></i></li></a><?php endif;?>
</ul>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_caddy_social', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
     $instance['title'] = strip_tags($new_instance['title']);
    $instance['facebook'] = strip_tags($new_instance['facebook']);
    $instance['instagram'] = strip_tags($new_instance['instagram']);
    $instance['linkdin'] = strip_tags($new_instance['linkdin']);
    $instance['twitter'] = strip_tags($new_instance['twitter']);

    $alloptions = wp_cache_get('alloptions', 'options');
    if (isset($alloptions['widget_caddy_social'])) {
      delete_option('widget_caddy_social');
    }

    return $instance;
  }

 

  function form($instance) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $facebook = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
    $instagram = isset($instance['instagram']) ? esc_attr($instance['instagram']) : '';
    $linkdin = isset($instance['linkdin']) ? esc_attr($instance['linkdin']) : '';
    $twitter = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
    
  ?>
  <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Facebook:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php _e('instagram:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('linkdin')); ?>"><?php _e('Linkdin:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkdin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkdin')); ?>" type="text" value="<?php echo esc_attr($linkdin); ?>" />
        <p>
      <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php _e('Twitter:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
    </p>
    
  <?php
  }
}
/**
 * Backyard Recent_Posts widget class
 *  Just a rewite of wp recent post
 * 
 */
register_widget('caddy_Social_Widget');







class caddy_address_Widget extends WP_Widget {
  function caddy_address_Widget() {
    $widget_ops = array('classname' => 'caddy_address_Widget', 'description' => __('Simple way to add Footer Address', 'leadagency'));
    $this->__construct('caddy_address_Widget', __('leadagency: Footer Widget Address', 'leadagency'), $widget_ops);
    $this->alt_option_name = 'caddy_address_Widget';

    
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('caddy_address_Widget', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    if (!isset($instance['footer_address'])) { $instance['footer_address'] = ''; }
    if (!isset($instance['instagram'])) { $instance['instagram'] = ''; }
    if (!isset($instance['linkdin'])) { $instance['linkdin'] = ''; }
    if (!isset($instance['twitter'])) { $instance['twitter'] = ''; }
   

    echo $before_widget;
    if ($title) {
      echo $before_title;
      echo $title;
      echo $after_title;
    }
  ?>
   <address>
          <?php if(!empty($instance['footer_address'])){echo $instance['footer_address'];}?>
          </address>
          <address>
          T:<?php if(!empty($instance['footer_telephone'])){echo $instance['footer_telephone'];}?><br>
          E:<?php if(!empty($instance['footer_email'])){echo $instance['footer_email'];}?><br>
          W: <?php if(!empty($instance['footer_web'])){echo $instance['footer_web'];}?>
          </address>
          <address>
          CVR.nr:<?php if(!empty($instance['footer_cvrn'])){echo $instance['footer_cvrn'];}?>
          </address>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_caddy_social', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['footer_address'] = strip_tags($new_instance['footer_address']);
    $instance['footer_telephone'] = strip_tags($new_instance['footer_telephone']);
    $instance['footer_email'] = strip_tags($new_instance['footer_email']);
    $instance['footer_web'] = strip_tags($new_instance['footer_web']);
	$instance['footer_cvrn'] = strip_tags($new_instance['footer_cvrn']);

    $alloptions = wp_cache_get('alloptions', 'options');
    if (isset($alloptions['widget_caddy_social'])) {
      delete_option('widget_caddy_social');
    }

    return $instance;
  }

 

  function form($instance) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $footer_address = isset($instance['footer_address']) ? esc_attr($instance['footer_address']) : '';
    $footer_telephone = isset($instance['footer_telephone']) ? esc_attr($instance['footer_telephone']) : '';
    $footer_email = isset($instance['footer_email']) ? esc_attr($instance['footer_email']) : '';
    $footer_web = isset($instance['footer_web']) ? esc_attr($instance['footer_web']) : '';
	$footer_cvrn = isset($instance['footer_cvrn']) ? esc_attr($instance['footer_cvrn']) : '';
    
  ?>
  
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Address:', 'leadagency'); ?></label>
      <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_address')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_address')); ?>"><?php echo esc_attr($footer_address); ?></textarea>
      
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('footer_telephone')); ?>"><?php _e('Telephone:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_telephone')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_telephone')); ?>" type="text" value="<?php echo esc_attr($footer_telephone); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('footer_email')); ?>"><?php _e('Email:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_email')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_email')); ?>" type="text" value="<?php echo esc_attr($footer_email); ?>" />
        <p>
      <label for="<?php echo esc_attr($this->get_field_id('footer_web')); ?>"><?php _e('Website:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_web')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_web')); ?>" type="text" value="<?php echo esc_attr($footer_web); ?>" />
    </p>
     <p>
      <label for="<?php echo esc_attr($this->get_field_id('footer_cvrn')); ?>"><?php _e('CVR:', 'leadagency'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_cvrn')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_cvrn')); ?>" type="text" value="<?php echo esc_attr($footer_cvrn); ?>" />
    </p>
    
  <?php
  }
}
/**
 * Backyard Recent_Posts widget class
 *  Just a rewite of wp recent post
 * 
 */
register_widget('caddy_address_Widget');

/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */
class  My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

        function widget($args, $instance) {

                if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 5;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */
            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );

            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
                    <?php 
					$categories = get_the_category( get_the_ID() );
					//echo'<pre>';print_r($categories);
					?>
                    <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                    <?php echo $current_category = single_cat_title("", true); ?>
                <?php if ( $show_date ) : ?>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>
                <span class="category">
                <?php foreach($categories as $sidecat){?>
                <a href="<?php echo get_category_link(get_cat_id($sidecat->name));?>">• <?php echo $sidecat->name;?></a>
                <?php }?>
                </span>
                </li>
            <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
        }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

?>