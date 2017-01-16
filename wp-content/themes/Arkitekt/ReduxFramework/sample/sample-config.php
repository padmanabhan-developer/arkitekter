<?php

/**
*ReduxFramework Sample Config File
*For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */



if (!class_exists("Redux_Framework_sample_config")) {



    class Redux_Framework_sample_config {



        public $args = array();

        public $sections = array();

        public $theme;

        public $ReduxFramework;



        public function __construct() {

            // This is needed. Bah WordPress bugs.  ;)           

            $this->initSettings();

        }



        public function initSettings() {



            if ( !class_exists("ReduxFramework" ) ) {

                return;

            }       

            

            // Just for demo purposes. Not needed per say.

            $this->theme = wp_get_theme();



            // Set the default arguments

            $this->setArguments();



            // Set a few help tabs so you can see how it's done

            $this->setHelpTabs();



            // Create the sections and fields

            $this->setSections();



            if (!isset($this->args['opt_name'])) { // No errors please

                return;

            }



            // If Redux is running as a plugin, this will remove the demo notice and links

            //add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );

            // Function to test the compiler hook and demo CSS output.

            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 

            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.

            // Change the arguments after they've been declared, but before the panel is created

            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

            // Change the default value of a field after it's been set, but before it's been useds

            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

            // Dynamically add a section. Can be also used to modify sections/fields

            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));



            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);

        }



        /**
          *This is a test function that will let you see when the compiler hook occurs.
          *It only runs if a field	set with compiler=>true is changed.
         * */

        function compiler_action($options, $css) {

            //echo "<h1>The compiler hook has run!";

            //print_r($options); //Option values

            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )



            /*

              // Demo of how to use the dynamic CSS and write your own static CSS file

              $filename = dirname(__FILE__) . '/style' . '.css';

              global $wp_filesystem;

              if( empty( $wp_filesystem ) ) {

              require_once( ABSPATH .'/wp-admin/includes/file.php' );

              WP_Filesystem();

              }



              if( $wp_filesystem ) {

              $wp_filesystem->put_contents(

              $filename,

              $css,

              FS_CHMOD_FILE // predefined mode settings for WP files

              );

              }

             */

        }



       

        function dynamic_section($sections) {

            //$sections = array();
           
            return $sections;

        }



       

        function change_arguments($args) {

            //$args['dev_mode'] = true;



            return $args;

        }



       

        function change_defaults($defaults) {

            $defaults['str_replace'] = "Testing filter hook!";




            return $defaults;

        }



        // Remove the demo link and the notice of integrated demo from the redux-framework plugin

        function remove_demo() {



            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.

            if (class_exists('ReduxFrameworkPlugin')) {

                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);

            }



            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.

            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));

        }



        public function setSections() {



         
            // Background Patterns Reader

            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';

            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';

            $sample_patterns = array();



            if (is_dir($sample_patterns_path)) :



                if ($sample_patterns_dir = opendir($sample_patterns_path)) :

                    $sample_patterns = array();



                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {



                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {

                            $name = explode(".", $sample_patterns_file);

                            $name = str_replace('.' . end($name), '', $sample_patterns_file);

                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);

                        }

                    }

                endif;

            endif;



            ob_start();



            $ct = wp_get_theme();

            $this->theme = $ct;

            $item_name = $this->theme->get('Name');

            $tags = $this->theme->Tags;

            $screenshot = $this->theme->get_screenshot();

            $class = $screenshot ? 'has-screenshot' : '';



            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));

            ?>

            <div id="current-theme" class="<?php echo esc_attr($class); ?>">

            <?php if ($screenshot) : ?>

                <?php if (current_user_can('edit_theme_options')) : ?>

                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">

                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />

                        </a>

                <?php endif; ?>

                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />

            <?php endif; ?>



                <h4>

            <?php echo htmlspecialchars_decode( $this->theme->display('Name') ); ?>

                </h4>



                <div>

                    <ul class="theme-info">

                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>

                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>

                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>

                    </ul>

                    <p class="theme-description"><?php echo htmlspecialchars_decode( $this->theme->display('Description') ); ?></p>

                <?php

                if ($this->theme->parent()) {

                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));

                }

                ?>



                </div>



            </div>



            <?php

            $item_info = ob_get_contents();



            ob_end_clean();



            $sampleHTML = '';

            if (file_exists(dirname(__FILE__) . '/info-html.html')) {

                /** @global WP_Filesystem_Direct $wp_filesystem  */

                global $wp_filesystem;

                if (empty($wp_filesystem)) {

                    require_once(ABSPATH . '/wp-admin/includes/file.php');

                    WP_Filesystem();

                }

                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');

            }

			

            // ACTUAL DECLARATION OF SECTIONS          
			/*$this->sections[] = array(
                'icon' => 'el-icon-stackoverflow',
                'title' => __('Miscellaneous Settings', 'biss'),
                'fields' => array(                                           
                    array(
                        'id'       => 'preload_opt',
                        'type'     => 'switch',
                        'title'    => __('On/Off Preload', 'biss'),
                        'subtitle' => __('Look, it\'s on!', 'biss'),
                        'default'  => true,
                    ),
                    array(
                        'id' => 'preload_text',
                        'type' => 'text',
                        'title' => __('Preload Text', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'default' => 'loading',
                    ),
					     
				    array(
						'id'       => 'breadcrumbs_opt',
						'type'     => 'switch',
						'title'    => __('Breadcrumbs in top page.', 'biss'),
						'subtitle' => __('Look, it\'s on!', 'biss'),
						'default'  => true,
					),   
                 )
            );

			$this->sections[] = array(

                'icon' => ' el-icon-picture',

                'title' => __('Logo & Favicon', 'biss'),

                'fields' => array(

					array(

                        'id' => 'favicon',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Custom Favicon', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Upload your Favicon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/favicon.ico'),

                    ),
                    array(

                        'id' => 'logocheck',

                        'type' => 'checkbox',

                        'title' => __('Use Big Logo?', 'biss'),

                        'subtitle' => 'default: Logo small + Site Name + Tag Line.',

                        'desc' => 'Use big logo with : max-height: 90px & max-width: auto.',

                        'default' => '0'// 1 = on | 0 = off

                    ),
					
					array(

                        'id' => 'logo',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Upload your logo.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/site-logo.png'),

                    ),                   

					array(

                        'id' => 'site_name',

                        'type' => 'text',

                        'title' => __('Site Name', 'biss'),

                        'subtitle' => __('Site Name, leave a blank do not show.', 'biss'),

                        'default' => 'Biss',

                    ),

					array(

                        'id' => 'tagline',

                        'type' => 'text',

                        'title' => __('Tag Line', 'biss'),

                        'subtitle' => __('Tag Line, leave a blank do not show.', 'biss'),

                        'default' => 'Corporate WordPress Theme',

                    ),
					
                    array(

                        'id' => 'shadow_img',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Shadow Image', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Upload your Shadow Image.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/shadow.png'),

                    ),

                )

            );*/

			$this->sections[] = array(

                'icon' => 'el-icon-qrcode',

                'title' => __('Header Settings', 'biss'),

                'fields' => array(	
				
					  array(
                        'id' => 'logo',
                        'type' => 'media',
                        'title' => __('set logo', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
                    ),
					
						  array(
                        'id' => 'serchic',
                        'type' => 'media',
                        'title' => __('set search img', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => array('url' => get_template_directory_uri().'/images/search.png'),
                    ),
					  array(
                        'id' => 'sharechic',
                        'type' => 'media',
                        'title' => __('set share img', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => array('url' => get_template_directory_uri().'/images/search.png'),
                    ),
					
					

				)

			);		
			/* $this->sections[] = array(

                'icon' => 'el-icon-blogger',

                'title' => __('Blog Settings', 'biss'),

                'fields' => array(	
                    array(
                        'id' => 'blog_thumbnail',
                        'type' => 'media',
                        'title' => __('Blog Image', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => array('url' => get_template_directory_uri().'/img/blog.jpg'),
                    ),
					
					array(
						'id' => 'blog_background',
						
						'type' => 'media',
						
						'title' => __('Blog background','biss'),
						
						'subtitle' => __('set blog background','biss'),
						
						'desc' => __('','biss'),
						
						'default' => array('url' =>get_template_directory_uri().'/img/blog.jpg'),
					),
					
					array(
					
					'id' => 'blog_bg_color',
					
					'type' => 'color',
					 
					'title' => __('blog background color','biss'),
					
					'subtitle' => __('set blog background color','biss'),
					
					 'default' => '#ffffff',
					 
					 'validate' => 'color',
					),
					
                    array(
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => __('Blog Title', 'biss'),
                        'subtitle' => __('Input Blog Title', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => 'Blog'
                    ),
                    array(
                        'id' => 'blog_tagline',
                        'type' => 'textarea',
                        'title' => __('Blog Tagline', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => 'Donec orci eros, tristique sit amet odio vitae, auctor pharetra nisi. Mauris ornare euismod lorem et fringilla. In nec bibendum enim, id lobortis enim. Sed ac faucibus lectus, vitae imperdiet elit.'
                    ),
					      	
					array(
					'id' => 'size',
					'type' => 'typography',
					'title' => 'select '
					),			
					array(
						'id' => 'blog_feature_img',
						'type' => 'media',
						'title' => __('feature image','biss'),
						'subtitle' => __('','biss'),
						'desc' => __('','biss'),
						'default' => array('url' =>get_template_directory_uri().'/img/blog.jpg'),
					),
            		array(
                        'id' => 'blog_excerpt',

                        'type' => 'text',

                        'title' => __('Blog Custom Excerpt', 'biss'),

                        'subtitle' => __('Input number custom excerpt', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => '30'

                    ),
					
                    array(

                        'id' => 'blog_rm',

                        'type' => 'text',

                        'title' => __('Text Read More', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'read more'

                    ),

                    	 

				 )

            );
            $this->sections[] = array(

                'icon' => 'el-icon-blogger',

                'title' => __('Single Blog Settings', 'biss'),

                'fields' => array(                      
                    array(

                        'id' => 'single_title',

                        'type' => 'text',

                        'title' => __('Single Blog Title', 'biss'),

                        'subtitle' => __('Input Single Title', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => ''

                    ),  
                    array(
                        'id' => 'single_tagline',
                        'type' => 'textarea',
                        'title' => __('Single Blog Tagline', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => 'Donec orci eros, tristique sit amet odio vitae, auctor pharetra nisi. Mauris ornare euismod lorem et fringilla. In nec bibendum enim, id lobortis enim. Sed ac faucibus lectus, vitae imperdiet elit.'
                    ),          

                    

                    array(

                        'id' => 'single_blog_next',

                        'type' => 'text',

                        'title' => __('Text Next Article', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'NEXT ARTICLE'

                    ),
                    array(

                        'id' => 'single_blog_prev',

                        'type' => 'text',

                        'title' => __('Text Prev Article', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'PREV ARTICLE'

                    ),

                    array(

                        'id' => 'author',

                        'type' => 'select',

                        'title' => __('Show About Author Single Blog ?', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'options'  => array(

                            'yes' => 'Yes',

                            'no'  => 'No',

                        ),

                        'default' => 'yes',

                    ),   

                    array(

                        'id' => 'comments',

                        'type' => 'select',

                        'title' => __('Show comments box ?', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'options'  => array(

                            'yes' => 'Yes',

                            'no'  => 'No',

                        ),

                        'default' => 'yes',

                    ),   
                    array(

                        'id' => 'sharing',

                        'type' => 'select',

                        'title' => __('Show Social Sharing on Single Blog ?', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'options'  => array(

                            'yes' => 'Yes',

                            'no'  => 'No',

                        ),

                        'default' => 'yes',

                    ),          

                 )

            );
			

             $this->sections[] = array(

                'icon' => 'el-icon-briefcase',

                'title' => __('Portfolio Settings', 'biss'),

                'fields' => array(
                    array(
                        'id' => 'portfolio_thumbnail',
                        'type' => 'media',
                        'title' => __('Background Portfolio Top Page', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => array('url' => get_template_directory_uri().'/img/14.jpg'),
                    ),

					array(

                        'id' => 'show_all',

                        'type' => 'text',

                        'title' => __('Text Show All Filter', 'biss'),

                        'subtitle' => '',                                              

                        'default' => 'Show All'

                    ), 

					
                    array(

                        'id' => 'portfolio_show',

                        'type' => 'text',

                        'title' => __('Show Posts', 'biss'),

                        'subtitle' => 'Show number posts in portfolio page',                                              

                        'default' => '12'

                    ),

				)
			);	
			
            $this->sections[] = array(
                'icon' => 'el-icon-shopping-cart-sign',
                'title' => __('Shop Settings', 'biss'),
                'fields' => array(   
                    array(
                        'id' => 'shop_thumbnail',
                        'type' => 'media',
                        'title' => __('Background Shop Top Page', 'biss'),
                        'subtitle' => __('', 'biss'),
                        'desc' => __('', 'biss'),
                        'default' => array('url' => get_template_directory_uri().'/img/15.jpg'),
                    ),
                    array(
                        'id' => 'shop_title',
                        'type' => 'text',
                        'title' => __('Shop Title', 'biss'),
                        'subtitle' => '',
                        'desc' => __('Title on Shop Page', 'biss'),
                        'default' => 'Shop Catalog'
                    ), 
                    array(
                        'id' => 'shop_subtitle',
                        'type' => 'textarea',
                        'title' => __('Shop SubTitle', 'biss'),
                        'subtitle' => '',
                        'desc' => __('SubTitle on Shop Page', 'biss'),
                        'default' => 'Donec orci eros, tristique sit amet odio vitae, auctor pharetra nisi. Mauris ornare euismod lorem et fringilla. In nec bibendum enim, id lobortis enim. Sed ac faucibus lectus, vitae imperdiet elit.'
                    ),  
                    array(
                        'id' => 'single_product_title',
                        'type' => 'text',
                        'title' => __('Single Title', 'biss'),
                        'subtitle' => '',
                        'desc' => __('Title on Single Page', 'biss'),
                        'default' => 'Shop Single Product'
                    ),            
                    array(
                        'id' => 'single_product_subtitle',
                        'type' => 'textarea',
                        'title' => __('Single SubTitle', 'biss'),
                        'subtitle' => '',
                        'desc' => __('SubTitle on Single Page', 'biss'),
                        'default' => 'Donec orci eros, tristique sit amet odio vitae, auctor pharetra nisi. Mauris ornare euismod lorem et fringilla. In nec bibendum enim, id lobortis enim. Sed ac faucibus lectus, vitae imperdiet elit.'
                    ),       
                    array(
                        'id' => 'product_related_title',
                        'type' => 'text',
                        'title' => __('Related Title', 'biss'),
                        'subtitle' => '',
                        'desc' => __('Title Box Related Product on Single Page', 'biss'),
                        'default' => 'Related Products'
                    ),
                )
            );
			$this->sections[] = array(

                'icon' => 'el-icon-group',

                'title' => __('Payment Settings', 'biss'),

                'fields' => array(
				   array(

                        'id' => 'paypal',

                        'type' => 'text',

                        'title' => __('paypal url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://www.paypal.com/',

                    ),
					array(

                        'id' => 'american_express',

                        'type' => 'text',

                        'title' => __('american express url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),
				array(
                     'id' => 'visa',

                        'type' => 'text',

                        'title' => __('visa url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    )
				)
				);*/
		/*	$this->sections[] = array(

                'icon' => 'el-icon-group',

                'title' => __('Social Settings', 'biss'),

                'fields' => array(
				   array(

                        'id' => 'google-partner',

                        'type' => 'text',

                        'title' => __('google partner Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '#',

                    ),
					array(

                        'id' => 'facebook',

                        'type' => 'text',

                        'title' => __('Facebook Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://www.facebook.com/',

                    ),

					array(

                        'id' => 'google',

                        'type' => 'text',

                        'title' => __('Google+ Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://plus.google.com',

                    ),

					array(

                        'id' => 'twitter',

                        'type' => 'text',

                        'title' => __('Twitter Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://twitter.com/',

                    ),

					array(

                        'id' => 'youtube',

                        'type' => 'text',

                        'title' => __('Youtube Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://youtube.com/',

                    ),

					array(

                        'id' => 'linkedin',

                        'type' => 'text',

                        'title' => __('Linkedin Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://www.linkedin.com/',

                    ),

					array(

                        'id' => 'dribbble',

                        'type' => 'text',

                        'title' => __('Dribbble Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),

                    array(

                        'id' => 'pinterest',

                        'type' => 'text',

                        'title' => __('Pinterest Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),                    

                    array(

                        'id' => 'instagram',

                        'type' => 'text',

                        'title' => __('Instagram Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),

					array(

                        'id' => 'skype',

                        'type' => 'text',

                        'title' => __('Skype Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => ''

                    ),					

                    array(

                        'id' => 'rssfeed',

                        'type' => 'text',

                        'title' => __('RSS Feed Url', 'biss'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => ''

                    ),
					

				)

			);
*/
		/*	$this->sections[] = array(

                'icon' => 'el-icon-graph',

                'title' => __('404 Settings', 'biss'),

                'fields' => array(

                    array(

                        'id' => '404_bg',

                        'type' => 'media',

                        'title' => __('Background Image', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/16.jpg')

                    ),

					array(

                        'id' => '404_title',

                        'type' => 'text',

                        'title' => __('404 Title', 'biss'),

                        'subtitle' => __('Input 404 Title', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'Error 404'

                    ),						 		

					array(

                        'id' => '404_big_content',

                        'type' => 'editor',

                        'title' => __('404 Big Content', 'biss'),

                        'subtitle' => __('Enter 404 Big Content', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'That link is broken.'

                    ),
                    array(

                        'id' => '404_bold_content',

                        'type' => 'editor',

                        'title' => __('404 Bold Content', 'biss'),

                        'subtitle' => __('Enter 404 Bold Content', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'We can not seem to find /404/'

                    ),
                    array(

                        'id' => '404_content',

                        'type' => 'editor',

                        'title' => __('404 Content', 'biss'),

                        'subtitle' => __('Enter 404 Content', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'Please use the navigation above or search to find what you are looking for.'

                    ),

                    			 

				 )

            );

            $this->sections[] = array(

                'icon' => 'el-icon-hourglass',

                'title' => __('Coming Soon Settings', 'biss'),

                'fields' => array(
                    array(

                        'id' => 'cs_logo',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Comming Soon Logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Upload your comming soon logo.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/comming-soon-logo.png'),

                    ),    

                    array(

                        'id' => 'cs_bg',

                        'type' => 'media',

                        'title' => __('Background Image', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/coming-soon-bg.jpg')

                    ),      

                    array(

                        'id' => 'cs_title',

                        'type' => 'text',

                        'title' => __('Coming Soon Title', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'OUR WEBSITE IS COMING SOON. STAY TURNED.'

                    ),                              

                    array(

                        'id' => 'cs_stitle',

                        'type' => 'text',

                        'title' => __('Coming Soon Subtitle', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('', 'biss'),

                        'default' => 'We will be ready in just',

                    ),

                    array(

                        'id' => 'cs_year',

                        'type' => 'text',

                        'title' => __('Year', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Enter year will be ready', 'biss'),

                        'default' => '2016',

                    ),

                    array(

                        'id' => 'cs_month',

                        'type' => 'text',

                        'title' => __('Month', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Enter month will be ready', 'biss'),

                        'default' => '1',

                    ),

                    array(

                        'id' => 'cs_day',

                        'type' => 'text',

                        'title' => __('Days', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Enter days will be ready', 'biss'),

                        'default' => '1',

                    ),

                )    

            );

		*/	$this->sections[] = array(

                'icon' => ' el-icon-credit-card',

                'title' => __('Footer Settings', 'biss'),

                'fields' => array(	
				
				array(

                        'id' => 'footer_llg',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('upload icon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/imgages/site-logo.png'),
							
                    ), 
					 array(

                        'id' => 'lg_link',

                        'type' => 'text',

                        'title' => __('logolink', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Enter logo link', 'biss'),

                        'default' => 'http://ldsstage.in/arkitekter/',

                    ),
  
                 array(

                        'id' => 'footer_info_ttl',

                        'type' => 'text',

                        'title' => __('Tel', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => '25252525',

                    ),
					
					  array(

                        'id' => 'footer_info_email',

                        'type' => 'text',

                        'title' => __('Email', 'biss'),

                        'subtitle' => __('Used Layout Footer 3', 'biss'),

                        'default' => 'support@bisstheme.com',

                    ),
					array(

                        'id' => 'footer_social_icon_star',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('linkedin logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('upload icon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/imgages/site-logo.png'),
							
                    ),  
					 array(

                        'id' => 'lg_link_li',

                        'type' => 'text',

                        'title' => __('linked link', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Linked link', 'biss'),

                        'default' => 'http://ldsstage.in/arkitekter/',

                    ), 
					array(

                        'id' => 'footer_social_icon_inst',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('instagram logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('upload icon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/images/site-logo.png'),
							
                    ), 
					array(

                        'id' => 'lg_li_in',

                        'type' => 'text',

                        'title' => __('instagram link', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('instagram link', 'biss'),

                        'default' => 'http://ldsstage.in/arkitekter/',

                    ),                  
					array(

                        'id' => 'footer_social_icon_fb',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('fb logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('upload icon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/images/site-logo.png'),
							
                    ),  
					array(

                        'id' => 'lg_li_fb',

                        'type' => 'text',

                        'title' => __('Fb link', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Fb link', 'biss'),

                        'default' => 'http://ldsstage.in/arkitekter/',

                    ),   
						array(

                        'id' => 'footer_social_icon_pn',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('printerset logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('upload icon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/images/site-logo.png'),
							
                    ), 
					array(

                        'id' => 'lg_li_pn',

                        'type' => 'text',

                        'title' => __('Printerest link', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Printerest link', 'biss'),

                        'default' => 'http://ldsstage.in/arkitekter/',

                    ),                      

				array(

                        'id' => 'footer_social_icon_twitter',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('twitter logo', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('upload icon.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/imgages/site-logo.png'),							
                    ),

array(

                        'id' => 'lg_li_tw',

                        'type' => 'text',

                        'title' => __('Twitter link', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'desc' => __('Twitter link', 'biss'),

                        'default' => 'http://ldsstage.in/arkitekter/',

                    ),   
					array(

                        'id' => 'footer_text',

                        'type' => 'editor',

                        'title' => __('Footer Text', 'biss'),

                        'subtitle' => __('Copyright Text', 'biss'),

                        'default' => '© Copyright 2014 by OceanThemes. All Rights Reserved.',

                    ),                    

				)

			);
			/*$this->sections[] = array(
				'icon' => 'el-icon-font',
				'title' => __('Customize Content','biss'),
				'fields' => array(
						array(
							'id' => 'post-title',
							'type' => 'text',
							'title' => __('post title','biss'),
							'subtitle' => __('give the post title','biss')
							
						),
						array(
							'id' => 'post-description',
							'type' => 'textarea',
							'title' => __('description','biss'),
							'subtitle' => __('add the description','biss')
 						),
						array(
							'id' => 'post_category',
							'type' => 'select',
							'title' => __('category','biss'),
							'subtitle' => __('select the category','biss'),
							  'desc' => __('', 'biss'),
							  'options' =>array(
							  		'photos' => 'photos',
									'gallery' => 'gallery'
							  )
						),
						array(
							'id' => 'post_tag',
							'type' => 'text',
							'title' => __('post tag','biss'),
							'subtitle' => __('post tagged','biss'),
							'placeholder' => __('post tagged name','biss')

						)
				)
			);

            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => __('Typography', 'biss'),
                'fields' => array(
                    array(
                        'id' => 'h1-typography',
                        'type' => 'typography',
                        'output' => array('h1'),
                        'title' => __('Heading 1', 'biss'),
                        'subtitle' => __('Specify the heading 1 font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => ''
                        ),
                    ),  
					 
                    array(
                        'id' => 'h2-typography',
                        'type' => 'typography',
                        'output' => array('h2'),
                        'title' => __('Heading 2', 'biss'),
                        'subtitle' => __('Specify the heading 2 font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => ''
                        ),
                    ), 
                    array(
                        'id' => 'h3-typography',
                        'type' => 'typography',
                        'output' => array('h3'),
                        'title' => __('Heading 3', 'biss'),
                        'subtitle' => __('Specify the heading 3 font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => ''
                        ),
                    ), 
                    array(
                        'id' => 'h4-typography',
                        'type' => 'typography',
                        'output' => array('h4'),
                        'title' => __('Heading 4', 'biss'),
                        'subtitle' => __('Specify the heading 4 font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => ''
                        ),
                    ), 
                    array(
                        'id' => 'h5-typography',
                        'type' => 'typography',
                        'output' => array('h5'),
                        'title' => __('Heading 5', 'biss'),
                        'subtitle' => __('Specify the heading 5 font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => ''
                        ),
                    ), 
                    array(
                        'id' => 'h6-typography',
                        'type' => 'typography',
                        'output' => array('h6'),
                        'title' => __('Heading 6', 'biss'),
                        'subtitle' => __('Specify the heading 6 font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => ''
                        ),
                    ),    

                    array(
                        'id' => 'menu-typography',
                        'type' => 'typography',
                        'output' => array('.site-header nav.blocked > ul > li > .wrapper > a, .site-header nav.normal > ul > li > a'),
                        'title' => __('Menu item', 'biss'),
                        'subtitle' => __('Specify the Menu item font properties.', 'biss'),
                        'google' => true,
                        'default' => array(
                            'color'       => '', 
                            'font-style'  => '', 
                            'font-family' => '',
                            'font-size'   => '', 
                            'line-height' => '',
                        ),
                    ),                                   
                )
            );
			$this->sections[] = array(

                'icon' => 'el-icon-website',

                'title' => __('Custom Theme Option', 'biss'),

                'fields' => array(
				    array(

                        'id' => 'home_page_benner',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Home Page Benner', 'biss'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Home Page Benner.', 'biss'),

                        'subtitle' => __('', 'biss'),

                        'default' => '',

                    ),
					array(
	
							'id' => 'home_page_text1',
	
							'type' => 'text',
	
							'title' => __('Home Page Benner Text', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => ''
	
					),	
					array(
	
							'id' => 'home_center_page_text',
	
							'type' => 'editor',
	
							'title' => __('Home Center Page Text', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => ''
	
					),	
					array(
	
							'id' => 'home_center_bg_color',
	
							'type' => 'color',

                        'title' => __('Home Center Background color', 'biss'),

                        'subtitle' => __('Home Center Background color for the theme (default: #373d4b). Recommended: #2c150f , #2e2d26 , #292421 , #44324d , #016f86 , #2b2a33 , #787777 ', 'biss'),

                        'default' => '#373d4b',

                        'validate' => 'color',
	
					),				 
					array(
	
							'id' => 'top_info_phone',
	
							'type' => 'text',
	
							'title' => __('Top Contact Info Phone Number', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => '802-701-9763'
	
					),
					array(
	
							'id' => 'ppc_advertising',
	
							'type' => 'text',
	
							'title' => __('PPC Advertising Link', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => ''
	
						),
					
						array(
	
							'id' => 'video_production',
	
							'type' => 'text',
	
							'title' => __('Video Production Link', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => ''
	
						),
						array(
	
							'id' => 'web_design_link',
	
							'type' => 'text',
	
							'title' => __('Web Design Link', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => ''
	
						),
						array(
	
							'id' => 'seo_services',
	
							'type' => 'text',
	
							'title' => __('SEO Services Link', 'biss'),
	
							'subtitle' => __('', 'biss'),
	
							'desc' => __('', 'biss'),
	
							'default' => ''
	
						),
				   array(

                        'id' => 'phone_number_text_color',

                        'type' => 'color',

                        'title' => __('Phone Number Text Color', 'biss'),

                        'subtitle' => __('Pick the Phone Number Text Color for the theme (default: #373d4b). Recommended: #2c150f , #2e2d26 , #292421 , #44324d , #016f86 , #2b2a33 , #787777 ', 'biss'),

                        'default' => '#373d4b',

                        'validate' => 'color',

                    ),
					
					 array(

                        'id' => 'menu_text_color',

                        'type' => 'color',

                        'title' => __('Menu Text Color', 'biss'),

                        'subtitle' => __('Pick the Menu Text Colorr for the theme (default: #373d4b). Recommended: #2c150f , #2e2d26 , #292421 , #44324d , #016f86 , #2b2a33 , #787777 ', 'biss'),

                        'default' => '#373d4b',

                        'validate' => 'color',

                    ),
					array(

                        'id' => 'menu_text_color_hover',

                        'type' => 'color',

                        'title' => __('Menu Text hover Color', 'biss'),

                        'subtitle' => __('Pick the Menu Text Colorr for the theme (default: #373d4b). Recommended: #2c150f , #2e2d26 , #292421 , #44324d , #016f86 , #2b2a33 , #787777 ', 'biss'),

                        'default' => '#373d4b',

                        'validate' => 'color',

                    ),    
                    array(

                        'id' => 'second_color',

                        'type' => 'color',

                        'title' => __('Theme Header Color', 'biss'),

                        'subtitle' => __('Pick the Header color for the theme (default: #373d4b). Recommended: #2c150f , #2e2d26 , #292421 , #44324d , #016f86 , #2b2a33 , #787777 ', 'biss'),

                        'default' => '#373d4b',

                        'validate' => 'color',

                    ),                     
          

                    array(

                        'id' => 'footer_bg',

                        'type' => 'color',

                        'title' => __('The Footer Background Color', 'biss'),

                        'subtitle' => __('Pick a footer background color for theme (default: #373d4b).', 'biss'),

                        'default' => '#373d4b',

                        'validate' => 'color',

                    ),
					 array(

                        'id' => 'footer_bottom_bg',

                        'type' => 'color',

                        'title' => __('The Footer Bottom Background Color', 'biss'),

                        'subtitle' => __('Pick a footer Bottom background color for theme (default: #FF9900).', 'biss'),
 
                        'default' => '#373d4b',

                        'validate' => 'color',

                    ),
					array(

                        'id' => 'footer_text',

                        'type' => 'editor',

                        'title' => __('Footer Text', 'biss'),

                        'subtitle' => __('Copyright Text', 'biss'),

                        'default' => '© Copyright 2014 by OceanThemes. All Rights Reserved.',

                    ), 

                    array(

                        'id' => 'body-font2',

                        'type' => 'typography',

						'output' => array('body'),

                        'title' => __('Body Font', 'biss'),

                        'subtitle' => __('Specify the body font properties.', 'biss'),

                        'google' => true,

                        'default' => array(

                            'color' => '',

                            'font-size' => '',

                            'line-height' => '',

                            'font-family' => "",

                        ),

                    ),
				  
				)

            );*/

          /*  $this->sections[] = array(

                'icon' => 'el-icon-website',

                'title' => __('Styling Options', 'biss'),

                'fields' => array(

					

                    array(

                        'id' => 'style',

                        'type' => 'select',

                        'title' => __('Theme style', 'biss'),

                        'subtitle' => __('choose style', 'biss'),

                        'desc' => __('', 'biss'),

                        'options'  => array(

                            'style2' => 'style2',

                            'style3' => 'style3',
							
							'style4' => 'style4',
							
							'style5' => 'style5',
							
							'style6' => 'style6',
							
							'style7' => 'style7',

                        ),

                        'default' => 'style2',

                    ),
                    array(

                        'id' => 'boxed_bg',

                        'type' => 'media',

                        'title' => __('Background Image', 'biss'),

                        'subtitle' => __('Background Image for Boxed Version', 'biss'),

                        'desc' => __('Background Image only for Boxed Version', 'biss'),

                        'default' => array('url' => get_template_directory_uri().'/img/pat02.png')

                    ),  

                      

                    array(

                        'id' => 'main_color',

                        'type' => 'color',

                        'title' => __('Theme Main Color', 'biss'),

                        'subtitle' => __('Pick the main color for the theme (default: #ce434a). Recommended: #90ADA9 , #73C026 , #E8BB48 , #D6A5BB , #A6C7AC , #806b66 , #e3823d', 'biss'),

                        'default' => '#ce434a',

                        'validate' => 'color',

                    ),	         

                  

                     array(

                        'id' => 'custom-css',

                        'type' => 'ace_editor',

                        'title' => __('CSS Code', 'biss'),

                        'subtitle' => __('Paste your CSS code here.', 'biss'),

                        'mode' => 'css',

                        'theme' => 'monokai',

                        'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',

                        'default' => "#header{\nmargin: 0 auto;\n}"

                    ),

                )

            );
          */  
         /*  $this->sections[] = array(
                'icon' => 'el-icon-tint',
                'title' => __('Button Styling', 'biss'),
                'fields' => array(   
                    array(
                        'id'   =>'divider_1',
                        'desc' => __('Button Red', 'biss'),
                        'type' => 'divide'
                    ),
                    array(
                        'id' => 'btn1_bg',
                        'type' => 'color',
                        'title' => __('Button Background Color', 'biss'),
                        'subtitle' => __('Button background color for theme (default: #ce434a).', 'biss'),
                        'default' => '#ce434a',
                        'validate' => 'color',
                    ),                                 
                    array(
                        'id' => 'btn1_bghover',
                        'type' => 'color',
                        'title' => __('Button Background Hover Color', 'biss'),
                        'subtitle' => __('Button background hover color for theme (default: #b02e34).', 'biss'),
                        'default' => '#b02e34',
                        'validate' => 'color',
                    ), 
                    array(
                        'id'   =>'divider_2',
                        'desc' => __('Button Black', 'biss'),
                        'type' => 'divide'
                    ),
                    array(
                        'id' => 'btn2_bg',
                        'type' => 'color',
                        'title' => __('Button Background Color', 'biss'),
                        'subtitle' => __('Button background color for theme (default: #373d4b).', 'biss'),
                        'default' => '#373d4b',
                        'validate' => 'color',
                    ),                                 
                    array(
                        'id' => 'btn2_bghover',
                        'type' => 'color',
                        'title' => __('Button Background Hover Color', 'biss'),
                        'subtitle' => __('Button background hover color for theme (default: #21252e).', 'biss'),
                        'default' => '#21252e',
                        'validate' => 'color',
                    ), 
                )
            );
            */
            
			

            $theme_info = '<div class="redux-framework-section-desc">';

            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'biss') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';

            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'biss') . $this->theme->get('Author') . '</p>';

            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'biss') . $this->theme->get('Version') . '</p>';

            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';

            $tabs = $this->theme->get('Tags');

            if (!empty($tabs)) {

                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'biss') . implode(', ', $tabs) . '</p>';

            }

            $theme_info .= '</div>';

        }



        public function setHelpTabs() {



            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.

            $this->args['help_tabs'][] = array(

                'id' => 'redux-opts-1',

                'title' => __('Theme Information 1', 'biss'),

                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'biss')

            );



            $this->args['help_tabs'][] = array(

                'id' => 'redux-opts-2',

                'title' => __('Theme Information 2', 'biss'),

                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'biss')

            );



            // Set the help sidebar

            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'biss');

        }



        /**
         * All the possible arguments for Redux.
         *For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */

        public function setArguments() {



            $theme = wp_get_theme(); // For use with some settings. Not necessary.



            $this->args = array(

                // TYPICAL -> Change these values as you need/desire

                'opt_name' => 'theme_option', // This is where your data is stored in the database and also becomes your global variable name.

                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel

                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel

                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

                'allow_sub_menu' => true, // Show the sections below the admin menu item or not

                'menu_title' => __('Theme options', 'biss'),

                'page' => __('Biss Options', 'biss'),

                // You will need to generate a Google API key to use this feature.

                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth

                'google_api_key' => 'AIzaSyBM9vxebWLN3bq4Urobnr6tEtn7zM06rEw', // Must be defined to add google fonts to the typography module

                //'admin_bar' => false, // Show the panel pages on the admin bar

                'global_variable' => '', // Set a different name for your global variable other than the opt_name

                'dev_mode' => false, // Show the time the page took to load, etc

                'customizer' => true, // Enable basic customizer support

                // OPTIONAL -> Give you extra features

                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.

                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters

                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.

                'menu_icon' => '', // Specify a custom URL to an icon

                'last_tab' => '', // Force your panel to always open to a specific tab (by id)

                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title

                'page_slug' => '_options', // Page slug used to denote the panel

                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not

                'default_show' => false, // If true, shows the default value next to each field that is not the default value.

                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *

                // CAREFUL -> These options are for advanced use only

                'transient_time' => 60 * MINUTE_IN_SECONDS,

                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output

                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.

                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.

                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

                'show_import_export' => true, // REMOVE

                'system_info' => false, // REMOVE

                'help_tabs' => array(),

                'help_sidebar' => '', // __( '', $this->args['domain'] );            

            );

            // Panel Intro text -> before the form

            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {

                if (!empty($this->args['global_variable'])) {

                    $v = $this->args['global_variable'];

                } else {

                    $v = str_replace("-", "_", $this->args['opt_name']);

                }

                $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'biss'), $v);

            } else {

                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'biss');

            }



            // Add content after the form.

            $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'biss');

        }



    }



    new Redux_Framework_sample_config();

}





/**
  *Custom function for the callback referenced above
 */

if (!function_exists('redux_my_custom_field')):



    function redux_my_custom_field($field, $value) {

        print_r($field);

        print_r($value);

    }



endif;




if (!function_exists('redux_validate_callback_function')):



    function redux_validate_callback_function($field, $value, $existing_value) {

        $error = false;

        $value = 'just testing';

        /*

          do your validation



          if(something) {

          $value = $value;

          } elseif(something else) {

          $error = true;

          $value = $existing_value;

          $field['msg'] = 'your custom error message';

          }

         */



        $return['value'] = $value;

        if ($error == true) {

            $return['error'] = $field;

        }

        return $return;

    }





endif;

