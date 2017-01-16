<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '';

global $meta_boxes;

$meta_boxes = array();
// Posts meta box


$meta_boxes[] = array(
	'id'		=> 'images',
	'title'		=> 'Add Information',
	'pages'		=> array( 'ourbusiness'),

	'fields'	=> array(
		
		// FILE UPLOAD
		
		
		array(
			'name'	=> 'Users',
			'desc'	=> '',
			'id'	=> "{$prefix}users",
			'type'	=> 'image'
		),
		
		
		
	
		
	
		/*array(
			'name'	=> 'Rating Images',
			'desc'	=> '',
			'id'	=> "{$prefix}rating-image",
			'type'	=> 'image'
		),*/
	
	
		
		
		/*array(
			'name'	=> 'Select verified or not verified',
			'desc'	=> '',
			'id'	=> "{$prefix}select_ver",
			'type'    => 'select',
				'options' => array(
					'verified' => __( 'Verified', 'cmb' ),
					'not_verified'   => __( 'Not Verified', 'cmb' ),
					
				),
		),*/
	),
	
	
	
	
	
	
	
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );