<?php



define('OPTIONS_PATH', get_template_directory_uri() . '/themeoptions/assets/' );



    /**



     * ReduxFramework Sample Config File



     * For full documentation, please visit: http://docs.reduxframework.com/



     */



    if ( ! class_exists('Redux')) {



        return;



    }



    // This is your option name where all the Redux data is stored.



    $opt_name = "backyard";



    // This line is only for altering the demo. Can be easily removed.



    $opt_name = apply_filters('backyard_demo/opt_name', $opt_name );



    /*



     *



     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples



     *



     */



    



    $theme = wp_get_theme(); // For use with some settings. Not necessary.



    $args = array(



        // TYPICAL -> Change these values as you need/desire



        'opt_name'             => $opt_name,



        // This is where your data is stored in the database and also becomes your global variable name.



        'display_name'         => $theme->get('Name'),



        // Name that appears at the top of your panel



        'display_version'      => $theme->get('Version'),



        // Version that appears at the top of your panel



        'menu_type'            => 'menu',



        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)



        'allow_sub_menu'       => true,



        // Show the sections below the admin menu item or not



        'menu_title'           => __('LeadAgency', 'backyard' ),



        'page_title'           => __('LeadAgency', 'backyard' ),



        // You will need to generate a Google API key to use this feature.



        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth



        'google_api_key'       => '',



        // Set it you want google fonts to update weekly. A google_api_key value is required.



        'google_update_weekly' => false,



        // Must be defined to add google fonts to the typography module



        'async_typography'     => false,



        // Use a asynchronous font on the front end or font string



        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader



        'admin_bar'            => false,



        // Show the panel pages on the admin bar



        'admin_bar_icon'       => 'dashicons-portfolio',



        // Choose an icon for the admin bar menu



        'admin_bar_priority'   => 50,



        // Choose an priority for the admin bar menu



        'global_variable'      => '',



        // Set a different name for your global variable other than the opt_name



        'dev_mode'             => false,



        // Show the time the page took to load, etc



        'update_notice'        => true,



        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo



        'customizer'           => true,



        // Enable basic customizer support



        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.



        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field



        // OPTIONAL -> Give you extra features



        'page_priority'        => 50,



        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.



        'page_parent'          => 'themes.php',



        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters



        'page_permissions'     => 'manage_options',



        // Permissions needed to access the options panel.



        'menu_icon'            => '',



        // Specify a custom URL to an icon



        'last_tab'             => '',



        // Force your panel to always open to a specific tab (by id)



        'page_icon'            => 'icon-themes',



        // Icon displayed in the admin panel next to your menu_title



        'page_slug'            => '',



        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided



        'save_defaults'        => true,



        // On load save the defaults to DB before user clicks save or not



        'default_show'         => false,



        // If true, shows the default value next to each field that is not the default value.



        'default_mark'         => '',



        // What to print by the field's title if the value shown is default. Suggested: *



        'show_import_export'   => false,



        // Shows the Import/Export panel when not used as a field.



        // CAREFUL -> These options are for advanced use only



        'transient_time'       => 60 * MINUTE_IN_SECONDS,



        'output'               => true,



        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output



        'output_tag'           => true,



        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head



        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.



        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.



        'database'             => '',



        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!



        'use_cdn'              => true,



        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.



        // HINTS



        'hints' => array(



            'icon' => 'el el-question-sign',



            'icon_position' => 'right',



            'icon_color'    => 'lightgray',



            'icon_size'     => 'normal',



            'tip_style'     => array(



                'color'   => 'red',



                'shadow'  => true,



                'rounded' => false,



                'style'   => '',



            ),



            'tip_position'  => array(



                'my' => 'top left',



                'at' => 'bottom right',



            ),



            'tip_effect'    => array(



                'show' => array(



                    'effect'   => 'slide',



                    'duration' => '500',



                    'event'    => 'mouseover',



                ),



                'hide' => array(



                    'effect'   => 'slide',



                    'duration' => '500',



                    'event'    => 'click mouseleave',



                ),



            ),



        )



    );



    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.



    $args['admin_bar_links'][] = array(



        'id'    => 'redux-docs',



        'href'  => 'http://docs.reduxframework.com/',



        'title' => __('Documentation', 'backyard'),



    );



    $args['admin_bar_links'][] = array(



        //'id'    => 'redux-support',



        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',



        'title' => __( 'Support', 'backyard' ),



    );



    $args['admin_bar_links'][] = array(



        'id'    => 'redux-extensions',



        'href'  => 'reduxframework.com/extensions',



        'title' => __('Extensions', 'backyard'),



    );



    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.



    $args['share_icons'][] = array(



        'url'   => 'https://www.facebook.com/ydesignservices/',



        'title' => 'facebook',



        'icon'  => 'fa fa-facebook'



    );



	   $args['share_icons'][] = array(



        'url'   => 'https://twitter.com/yachika',



        'title' => 'twitter',



        'icon'  => 'fa fa-twitter'



    );



	   $args['share_icons'][] = array(



        'url'   => 'https://www.youtube.com/channel/UCnCxPjeDV7bP3msBquGoPnw',



        'title' => 'youtube',



        'icon'  => 'fa fa-youtube'



    );



	   $args['share_icons'][] = array(



        'url'   => 'https://www.instagram.com/ydesignservices/',



        'title' => 'instagram',



        'icon'  => 'fa fa-instagram'



    );



	   $args['share_icons'][] = array(



        'url'   => 'https://plus.google.com/+YdesignServices',



        'title' => 'google',



        'icon'  => 'fa fa-google'



    );



 



    // Panel Intro text -> before the form



    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {



        if ( ! empty( $args['global_variable'] ) ) {



            $v = $args['global_variable'];



        } else {



            $v = str_replace( '-', '_', $args['opt_name'] );



        }



        /*$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'backyard' ), $v );



    } else {



        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'backyard' );*/



    }



    // Add content after the form.



    ///$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'backyard' );



    Redux::setArgs( $opt_name, $args );



    /*



     * ---> END ARGUMENTS



     */



    /*



     * ---> START HELP TABS



     */



    $tabs = array(



        array(



            'id'      => 'redux-help-tab-1',



            'title'   => __( 'Theme Information 1', 'backyard' ),



            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'backyard' )



        ),



        array(



            'id'      => 'redux-help-tab-2',



            'title'   => __( 'Theme Information 2', 'backyard' ),



            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'backyard' )



        )



    );



    Redux::setHelpTab( $opt_name, $tabs );



    // Set the help sidebar



    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'backyard' );



    Redux::setHelpSidebar( $opt_name, $content );



    /*



     * <--- END HELP TABS



     */



    /*



     *



     * ---> START SECTIONS



     *



     */



    /*



        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for



     */



    // -> START Basic Fields







	Redux::setSection( $opt_name, array(



    'title' => __('General Settings', 'backyard'),



    'id' => 'general_settings',



    'header' => '',



   



    'icon_class' => 'el',



    'icon' => 'el-adjust-alt',



    'customizer' => true,



    'fields' => array( array(

    'id'       => 'site_logo_upload',

    'type'     => 'media', 

    'url'      => true,

    'title'    => __('Logo', 'redux-framework-demo'),

    'desc'     => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),

    'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),

    

    ),





         array(



            'id'=>'redbox_text',



            'type' => 'textarea', 

            'customizer' => true,



             'title' => __('Redbox Text', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),



         ),



    )

);



Redux::setSection( $opt_name, array(



    'icon' => 'el-home',



    'id' => 'home_slider_settings',



    'icon_class' => 'el',



    'title' => __('Background Option

', 'backyard'),



    



    'fields' => array(



        array(



            'id'=>'choose_slider',



            'type' => 'select',



            'title' => __('Background Option

', 'backyard'), 



            'subtitle' => __("Please select the type of slider you want to use on homepage

", 'backyard'),



            //'desc' => __('This is the description field, again good for additional info.', 'backyard'),



            'options' => array('none' => 'None','video' => 'Video','flex' => 'Background Image'),



            'default' => '',



            'width' => 'width:60%',



            'customizer' => false,



            ),

			

			

			array(

    'id'       => 'home_slider',

    'type'     => 'media', 

    'url'      => true,

    'title'    => __('Back ground Image', 'redux-framework-demo'),

    'desc'     => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),

    'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),

	 'required' => array('choose_slider','!=','video'),

),  



       



        array(



            'id'=>'video_embed',



            'type' => 'textarea',



            'customizer' => false,



            'title' => __('Embed Video', 'backyard'), 



            'subtitle' => __('If your using a video on the home page place video embed code here', 'backyard'),



            'required' => array('choose_video_type','=','embed_code'),

			'required' => array('choose_slider','=','video'),



            ),

    ),



    )



);



Redux::setSection( $opt_name, array(



    'icon' => 'el-file-alt',



    'id' => 'social_media_section_id',



    'icon_class' => 'el',



    'title' => __('Social Media

', 'backyard'),
    'fields' => array( 



  array(



            'id'=>'fb_linkid',



            'type' => 'text',



            'customizer' => false,



            'title' => __('Facebook

', 'backyard'),



            'subtitle'=> __('Enter your Facebook URL

', 'backyard'),



            "default"       => 0,



            ),



array(



            'id'=>'insta_linkid',



            'type' => 'text',



            'customizer' => false,



            'title' => __('Instagram

', 'backyard'),



            'subtitle'=> __('Enter your Instagrma URL

', 'backyard'),



            "default"       => 0,



            ),



        



        array(



            'id'=>'tw_linkid',



            'type' => 'text',



            'customizer' => false,



            'title' => __('Twitter', 'backyard'),



            'subtitle'=> __('Enter your Twitter URL

', 'backyard'),



            ///'required' => array('mobile_switch','=','1'),



            //'desc' => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'backyard')



        ), 





array(



            'id'=>'fa_linkedIn',



            'type' => 'text',



            'customizer' => false,



            'title' => __('Linkedin', 'backyard'),



            'subtitle'=> __('Enter your Linkedin URL

', 'backyard'),



            ///'required' => array('mobile_switch','=','1'),



            //'desc' => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'backyard')



        ), 







),



    )



);



Redux::setSection( $opt_name, array(



    'title' => __('Career Page Settings', 'backyard'),



    'id' => 'career_settings',



    'header' => '',

    'icon_class' => 'el',



    'icon' => 'el-adjust-alt',



    'customizer' => true,



    'fields' => array( 

	 array(



            'id'=>'send_title',



            'type' => 'text', 

            'customizer' => true,



             'title' => __('Send an unsolicited Title', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),

			array(



            'id'=>'send_text',



            'type' => 'textarea', 

            'customizer' => true,



             'title' => __('Send an unsolicited Text', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),

			

			array(

			'id'=>'career_title',



            'type' => 'text', 

            'customizer' => true,



             'title' => __('School of Excellence Title', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),

			array(



            'id'=>'career_text',



            'type' => 'textarea', 

            'customizer' => true,



             'title' => __('School of Excellence Text', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),

			

			

			

			array(

    'id'       => 'career_upload',

    'type'     => 'media', 

    'url'      => true,

    'title'    => __('School of Excellence Image', 'redux-framework-demo'),

    'desc'     => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),

    'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),

	),

         array(



            'id'=>'team_title',



            'type' => 'text', 

            'customizer' => true,



             'title' => __('Team Title', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),

			array(



            'id'=>'team_text',



            'type' => 'textarea', 

            'customizer' => true,



             'title' => __('Team Text', 'backyard'),



            'subtitle'=> __('If left blank theme will use site name', 'backyard'),



            "default"       => get_option('blogname'),



			),

			

			array(

    'id'       => 'team_upload',

    'type'     => 'media', 

    'url'      => true,

    'title'    => __('Team Image', 'redux-framework-demo'),

    'desc'     => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),

    'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),

	),

         ),





    )



);

/*Redux::setSection( $opt_name, array(



    'icon' => 'icon-home',



    'icon_class' => 'icon-large',



    'id' => 'home_layout',



    'title' => __('Home Layout', 'backyard'),



    'desc' => "",



    'fields' => array(



    	 array(



            'id'=>'home_sidebar_layout',



            'type' => 'image_select',



            'compiler'=> false,



            'customizer' => true,



            'title' => __('Display a sidebar on the Home Page?', 'backyard'), 



            'subtitle' => __('This determines if there is a sidebar on the home page.', 'backyard'),



            'options' => array(



                    'full' => array('alt' => 'Full Layout', 'img' => OPTIONS_PATH.'img/1col.png'),



                    'sidebar' => array('alt' => 'Sidebar Layout', 'img' => OPTIONS_PATH.'img/2cr.png'),



                ),



            'default' => 'full',



            ),



    	 array(



            'id'=>'home_sidebar',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Choose a Sidebar for your Home Page', 'backyard'), 



            //'subtitle' => __("Choose your Revolution Slider Here", 'backyard'),



            //'desc' => __('This is the description field, again good for additional info.', 'backyard'),



            'data' => 'sidebars',



            'default' => 'sidebar-primary',



            'width' => 'width:60%',



            ),



    	 array(



            "id" => "homepage_layout",



            "type" => "sorter",



            'customizer' => false,



            "title" => __('Homepage Layout Manager', 'backyard'),



            "subtitle" => __('Organize how you want the layout to appear on the homepage', 'backyard'),



            //"compiler"=>'true',    



            'options' => array(



            	"disabled" => array(



                    "block_five"  => __("Latest Blog Posts", 'backyard'),



                    "block_six"   => __("Portfolio Carousel", 'backyard'),



                    "block_seven" => __("Icon Menu", 'backyard'),



                ),



                "enabled" => array(



                    "block_one"   => __("Page Title", 'backyard'),



                    "block_four"  => __("Page Content", 'backyard'),



                ),



            ),



        ),



         array(



            'id'=>'info_blog_settings',



            'type' => 'info',



            'customizer' => false,



            'desc' => __('Home Blog Settings', 'backyard'),



            ),



         array(



            'id'=>'blog_title',



            'type' => 'text',



            'customizer' => false,



            'title' => __('Home Blog Title', 'backyard'),



            'subtitle' => __('ex: Latest from the blog', 'backyard'),



            ),



         array(



            'id'=>'home_post_count',



            'type' => 'slider', 



            'customizer' => false,



            'title' => __('Choose How many posts on Homepage', 'backyard'),



            //'desc'=> __('Note: does not work if images are smaller than max.', 'backyard'),



            "default"       => "4",



            "min"       => "2",



            "step"      => "2",



            "max"       => "8",



            ),



         array(



            'id'=>'home_post_type',



            'type' => 'select',



            'customizer' => false,



            'data' => 'categories',



            'title' => __('Limit posts to a Category', 'backyard'), 



            'subtitle' => __('Leave blank to select all', 'backyard'),



            'width' => 'width:60%',



            //'desc' => __('This is the description field, again good for additional info.', 'backyard'),



            ),



         array(



            'id'=>'info_portfolio_settings',



            'type' => 'info',



            'customizer' => false,



            'desc' => __('Home Portfolio Carousel Settings', 'backyard'),



            ),



         array(



            'id'=>'portfolio_title',



            'type' => 'text',



            'customizer' => false,



            'title' => __('Home Portfolio Carousel title', 'backyard'),



            'subtitle' => __('ex: Portfolio Carousel title', 'backyard'),



            ),



         array(



            'id'=>'portfolio_type',



            'type' => 'select',



            'customizer' => false,



            'data' => 'terms',



            'args' => array('taxonomies'=>'portfolio-type', 'args'=>array()),



            'title' => __('Portfolio Carousel Category Type', 'backyard'), 



            'subtitle' => __('Leave blank to select all types', 'backyard'),



            'width' => 'width:60%',



            //'desc' => __('This is the description field, again good for additional info.', 'backyard'),



            ),



         array(



            'id'=>'home_portfolio_carousel_count',



            'type' => 'slider', 



            'customizer' => false,



            'title' => __('Choose how many portfolio items are in carousel', 'backyard'),



            "default"       => "6",



            "min"       => "4",



            "step"      => "1",



            "max"       => "12",



            ),



         array(



            'id'=>'home_portfolio_order',



            'type' => 'select',



            'customizer' => false,



            'title' => __('Portfolio Carousel Order by', 'backyard'), 



            'subtitle' => __("Choose how the portfolio items should be ordered in the carousel.", 'backyard'),



            'options' => array('menu_order' => 'Menu Order','title' => 'Title','date' => 'Date','rand' => 'Random'),



            'default' => 'menu_order',



            'width' => 'width:60%',



            ),



         array(



            'id'=>'portfolio_show_type',



            'type' => 'switch', 



            'customizer' => false,



            'title' => __('Display Portfolio Types under Title', 'backyard'),



            "default"       => 0,



            ),



           array(



            'id'=>'info_iconmenu_settings',



            'type' => 'info',



            'customizer' => false,



            'desc' => __('Home Icon Menu', 'backyard'),



            ),



           array(



            'id'=>'icon_menu',



            'type' => 'kad_icons',



            'customizer' => false,



            'title' => __('Icon Menu', 'backyard'),



            'subtitle'=> __('Choose your icons for the icon menu.', 'backyard'),



            //'desc' => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'backyard')



        ), 



           array(



            'id'=>'home_icon_menu_column',



            'type' => 'slider', 



            'customizer' => false,



            'title' => __('Choose how many columns in each row', 'backyard'),



            "default"       => "3",



            "min"       => "2",



            "step"      => "1",



            "max"       => "6",



            ),



           array(



            'id'=>'info_page_content',



            'type' => 'info',



            'customizer' => false,



            'desc' => __('Page Content Options', 'backyard'),



            ),



           array(



            'id'=>'home_post_summery',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Latest Post Display', 'backyard'), 



            'subtitle' => __("If Latest Post page is font page. Choose to show full post or post excerpt.", 'backyard'),



            //'desc' => __('This is the description field, again good for additional info.', 'backyard'),



            'options' => array('summery' => 'Post Excerpt','full' => 'Full'),



            'default' => 'summery',



            'width' => 'width:60%',



            ),



        ),



    )



);*/



/*Redux::setSection( $opt_name, array(



    'icon' => 'icon-list-alt',



    'icon_class' => 'icon-large',



    'id' => 'pagepost_settings',



    'title' => __('Page/Post Settings', 'backyard'),



    'desc' => "<div class='redux-info-field'><h3>".__('Page and Post Settings', 'backyard')."</h3></div>",



    'fields' => array(



        array(



            'id'=>'page_comments',



            'type' => 'switch',



            'customizer' => true,



            'title' => __('Allow Comments on Pages', 'backyard'),



            'subtitle' => __('Turn on to allow comments on pages', 'backyard'),



            "default" => 0,



            ),



        array(



            'id'=>'portfolio_link',



            'type' => 'select',



            'data' => 'pages',



            'customizer' => true,



            'width' => 'width:60%',



            'title' => __('All Projects Portfolio Page', 'backyard'), 



            'subtitle' => __('This sets the link in every single portfolio page. *note: You still have to set the page template to portfolio.', 'backyard'),



            ),



        array(



            'id'=>'portfolio_comments',



            'type' => 'switch',



            'customizer' => true,



            'title' => __('Allow Comments on Portfolio Posts', 'backyard'),



            'subtitle' => __('Turn on to allow comments on Portfolio posts', 'backyard'),



            "default" => 0,



            ),



        array(



            'id'=>'close_comments',



            'type' => 'switch',



            'customizer' => true, 



            'title' => __('Show Comments Closed Text?', 'backyard'),



            'subtitle' => __('Choose to show or hide comments closed alert below posts.', 'backyard'),



            "default" => 0,



            ),



        array(



            'id'=>'info_blog_defaults',



            'type' => 'info',



            'customizer' => true,



            'desc' => __('Blog Post Defaults', 'backyard'),



            ),



        array(



            'id'=>'post_summery_default',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Blog Post Summary Default', 'backyard'), 



            'options' => array('text' => 'Text', 'img_portrait' => 'Portrait Image', 'img_landscape' => 'Landscape Image', 'slider_portrait' => 'Portrait Image Slider' , 'slider_landscape' => 'Landscape Image Slider'),



            'width' => 'width:60%',



            'default' => 'img_portrait',



            ),



         array(



            'id'=>'post_summery_default_image',



            'type' => 'media', 



            'customizer' => true,



            'url'=> true,



            'title' => __('Default post summary feature Image', 'backyard'),



            'subtitle' => __('Replace theme default feature image for posts without a featured image', 'backyard'),



            ),



        array(



            'id'=>'post_head_default',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Blog Post Head Content Default', 'backyard'), 



            'options' => array('none' => __('None', 'backyard'), 'flex' => __('Image Slider', 'backyard'), 'image' => __('Image', 'backyard'), 'video' => __('Video', 'backyard')),



            'width' => 'width:60%',



            'default' => 'none',



            ),



        array(



            'id'=>'show_postlinks',



            'type' => 'switch', 



            'customizer' => true,



            'title' => __('Show Previous and Next posts links?', 'backyard'),



            'subtitle' => __('Choose to show or hide previous and next post links in the footer of a single post.', 'backyard'),



            "default" => 0,



            ),



        array(



            'id'=>'hide_author',



            'type' => 'switch', 



            'customizer' => true,



            'title' => __('Show Author Icon with posts?', 'backyard'),



            'subtitle' => __('Choose to show or hide author icon under post title.', 'backyard'),



            "default" => 1,



            ),



        array(



            'id'=>'post_author_default',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Blog Post Author Box Default', 'backyard'), 



            'options' => array('no' => __('No, Do not Show', 'backyard'), 'yes' => __('Yes, Show', 'backyard')),



            'width' => 'width:60%',



            'default' => 'no',



            ),



        array(



            'id'=>'post_carousel_default',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Blog Post Bottom Carousel Default', 'backyard'), 



            'options' => array('no' => __('No, Do not Show', 'backyard'), 'recent' => __('Yes - Display Recent Posts', 'backyard'), 'similar' => __('Yes - Display Similar Posts', 'backyard')),



            'width' => 'width:60%',



            'default' => 'no',



            ),



        array(



            'id'=>'info_blog_category',



            'type' => 'info',



            'customizer' => true,



            'desc' => __('Blog Category/Archive Defaults', 'backyard'),



            ),



        array(



            'id'=>'blog_archive_full',



            'type' => 'select',



            'customizer' => true,



            'title' => __('Blog Archive', 'backyard'), 



            'subtitle' => __("Choose to show full post or post excerpt.", 'backyard'),



            'options' => array('summery' => 'Post Excerpt','full' => 'Full'),



            'default' => 'summery',



            'width' => 'width:60%',



            ),



        ),



    )



);



Redux::setSection( $opt_name, array(



    'icon' => 'icon-wrench',



    'icon_class' => 'icon-large',



    'id' => 'misc_settings',



    'title' => __('Misc Settings', 'backyard'),



    'desc' => "<div class='redux-info-field'><h3>".__('Misc Settings', 'backyard')."</h3></div>",



    'fields' => array(



    	array(



            'id'=>'hide_image_border',



            'type' => 'switch', 



            'customizer' => true,



            'title' => __('Hide Image Border', 'backyard'),



            'subtitle' => __('Choose to show or hide image border for images added in pages or posts', 'backyard'),



            "default" => 0,



            ),



        array(



            'id'=>'backyard_custom_favicon',



            'type' => 'media', 



            'customizer' => true,



            'preview'=> true,



            'title' => __('Custom Favicon', 'backyard'),



            'subtitle' => __('Upload a 16px x 16px png/gif/ico image that will represent your website favicon.', 'backyard'),



            ),



        array(



            'id'=>'contact_email',



            'type' => 'text',



            'customizer' => true,



            'title' => __('Contact Form Email', 'backyard'),



            'subtitle' => __('Sets the email for the contact page email form.', 'backyard'),



            'default' => 'test@test.com'



            ),



        array(



            'id'=>'footer_text',



            'customizer' => true,



            'type' => 'textarea',



            'title' => __('Footer Copyright Text', 'backyard'), 



            'subtitle' => __('Write your own copyright text here. You can use the following shortcodes in your footer text: [copyright] [site-name] [the-year]', 'backyard'),



            'default' => '[copyright] [the-year] [site-name] [theme-credit]',



            ),



        array(



            'id'=>'info_sidebars',



            'type' => 'info',



            'customizer' => true,



            'desc' => __('Create Sidebars', 'backyard'),



            ),



        array(



            'id'=>'cust_sidebars',



            'type' => 'multi_text',



            'customizer' => true,



            'title' => __('Create Custom Sidebars', 'backyard'),



            'subtitle' => __('Type new sidebar name into textbox', 'backyard'),



            'default' =>__('Extra Sidebar', 'backyard'),



            ),



        array(



            'id'=>'info_wpgallerys',



            'type' => 'info',



            'customizer' => true,



            'desc' => __('Wordpress Galleries', 'backyard'),



            ),



        array(



            'id'=>'backyard_gallery',



            'type' => 'switch', 



            'customizer' => true,



            'title' => __('Enable backyard Galleries to override Wordpress', 'backyard'),



            'subtitle' => __('Disable this if using a plugin to customize galleries, for example jetpack tiled gallery.', 'backyard'),



            "default" => 1,



            ),



        array(



            'id'=>'info_lightbox',



            'type' => 'info',



            'customizer' => true,



            'desc' => __('Theme Lightbox', 'backyard'),



            ),



        array(



            'id'=>'kadence_lightbox',



            'type' => 'switch', 



            'customizer' => true,



            'title' => __('Turn Off Theme Lightbox?', 'backyard'),



            "default" => 0,



            ),



        ),



    )



);*/



    $item_info = '<div class="redux-opts-section-desc">';



   



	$item_info .= '<iframe src="http://docs.google.com/gview?url=themenectar.com/docs/salient.pdf&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>';



    $item_info .= '</div>';



				

   /*



    * <--- END SECTIONS



    */



    



	//->End Basic Fields



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {



        $section = array(



            'icon'   => 'el el-list-alt',



            'title'  => __( 'Documentation', 'backyard' ),



            'fields' => array(



                array(



                    'id'       => '17',



                    'type'     => 'raw',



                    'markdown' => true,



                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please



                    //'content' => 'Raw content here',



                ),



            ),



        );



        Redux::setSection( $opt_name, $section );



    }



    /*



     * <--- END SECTIONS



     */



    /*



     *



     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.



     *



     */



    /*



    *



    * --> Action hook examples



    *



    */



    // If Redux is running as a plugin, this will remove the demo notice and links



    //add_action( 'redux/loaded', 'remove_demo' );



    // Function to test the compiler hook and demo CSS output.



    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.



    ///add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);



    // Change the arguments after they've been declared, but before the panel is created



    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );



    // Change the default value of a field after it's been set, but before it's been useds



    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );



    // Dynamically add a section. Can be also used to modify sections/fields



    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');



    /**



     * This is a test function that will let you see when the compiler hook occurs.



     * It only runs if a field    set with compiler=>true is changed.



     * */



    if ( ! function_exists( 'compiler_action' ) ) {



        function compiler_action( $options, $css, $changed_values ) {



            echo '<h1>The compiler hook has run!</h1>';



            echo "<pre>";



            print_r( $changed_values ); // Values that have changed since the last save



            echo "</pre>";



            //print_r($options); //Option values



            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )



        }



    }



    /**



     * Custom function for the callback validation referenced above



     * */



    if ( ! function_exists( 'redux_validate_callback_function' ) ) {



        function redux_validate_callback_function( $field, $value, $existing_value ) {



            $error   = false;



            $warning = false;



            //do your validation



            if ( $value == 1 ) {



                $error = true;



                $value = $existing_value;



            } elseif ( $value == 2 ) {



                $warning = true;



                $value   = $existing_value;



            }



            $return['value'] = $value;



            if ( $error == true ) {



                $return['error'] = $field;



                $field['msg']    = 'your custom error message';



            }



            if ( $warning == true ) {



                $return['warning'] = $field;



                $field['msg']      = 'your custom warning message';



            }



            return $return;



        }



    }



    /**



     * Custom function for the callback referenced above



     */



    if ( ! function_exists( 'redux_my_custom_field' ) ) {



        function redux_my_custom_field( $field, $value ) {



            print_r( $field );



            echo '<br/>';



            print_r( $value );



        }



    }



    /**



     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.



     * Simply include this function in the child themes functions.php file.



     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,



     * so you must use get_template_directory_uri() if you want to use any of the built in icons



     * */



    if ( ! function_exists( 'dynamic_section' ) ) {



        function dynamic_section( $sections ) {



            //$sections = array();



            $sections[] = array(



                'title'  => __( 'Section via hook', 'backyard' ),



                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'backyard' ),



                'icon'   => 'el el-paper-clip',



                // Leave this as a blank section, no options just some intro text set above.



                'fields' => array()



            );



            return $sections;



        }



    }



    /**



     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.



     * */



    if ( ! function_exists( 'change_arguments' ) ) {



        function change_arguments( $args ) {



            //$args['dev_mode'] = true;



            return $args;



        }



    }



    /**



     * Filter hook for filtering the default value of any given field. Very useful in development mode.



     * */



    if ( ! function_exists( 'change_defaults' ) ) {



        function change_defaults( $defaults ) {



            $defaults['str_replace'] = 'Testing filter hook!';



            return $defaults;



        }



    }



    /**



     * Removes the demo link and the notice of integrated demo from the redux-framework plugin



     */



    if ( ! function_exists( 'remove_demo' ) ) {



        function remove_demo() {



            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.



            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {



                remove_filter( 'plugin_row_meta', array(



                    ReduxFrameworkPlugin::instance(),



                    'plugin_metalinks'



                ), null, 2 );



                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.



                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );



            }



        }



    }



