<?php 
add_action('add_meta_boxes', 'yds_metabox_page');
function yds_metabox_page(){
    
	
	#-----------------------------------------------------------------#
	# Header Settings
	#-----------------------------------------------------------------#
    $meta_box = array(
		'id' => 'caddy-metabox-page-header',
		'title' => __('Come on in Page Box ', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
				'name' => __('Title', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => '_header_subtitle',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Google Map Code', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'googlemap_code',
				'type' => 'textarea',
				'std' => '',
				'rows'        => 5,
				'cols'        => 5
				),
				
	
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
	///BUzz
	
	$BUzz = array(
		'id' => 'BUzz_post_blog',
		'title' => __('Buzz', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
				'name' => __('Facebook', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'buzz_facebook',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Linkedin', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'buzz_linkdin',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Twitter', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'buzz_twiter',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Pdf Attachment', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'buzz_attachment',
				'type' => 'file',
				'std' => ''
				),
				
	
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $BUzz['id'], $BUzz['title'], $callback, $BUzz['post_type'], $BUzz['context'], $BUzz['priority'], $BUzz );
///Your Business
	
	$yourbusiness = array(
		'id' => 'yourbusiness_blog',
		'title' => __('Your Business', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'gallery',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			
			array( 
				'name' => __('Popup Single Image', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'your_popupimage',
				'type' => 'file',
				'std' => ''
				),
			array( 
				'name' => __('Section 1 heading', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'your_heading1',
				'type' => 'text',
				'std' => ''
				),
			array( 
				'name' => __('Section 1 content', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'your_',
				'type' => 'textarea',
				'std' => ''
				),
			array( 
				'name' => __('Section 2 heading', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'your_heading2',
				'type' => 'text',
				'std' => ''
				),
			array( 
			'name' => __('Section 2 content', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_baggrund',
			'type' => 'textarea',
			'std' => ''
			),
			array( 
				'name' => __('Section 3 heading', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'your_heading3',
				'type' => 'text',
				'std' => ''
				),
			array( 
			'name' => __('Section 3 content', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_process',
			'type' => 'textarea',
			'std' => ''
			),
			array( 
				'name' => __('Section 4 heading', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'your_heading4',
				'type' => 'text',
				'std' => ''
				),
			array( 
			'name' => __('Section 4 content', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_resultat',
			'type' => 'textarea',
			'std' => ''
			),
			array( 
			'name' => __('Pdf Attachment', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_attachment',
			'type' => 'file',
			'std' => ''
			),
			
			array( 
			'name' => __('Facebook', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_recent_Forretn_f',
			'type' => 'text',
			'std' => ''
			),
			array( 
			'name' => __('Linkedin', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_recent_Forretn_l',
			'type' => 'text',
			'std' => ''
			),
			array( 
			'name' => __('Twitter', 'LeadAgency'),
			'desc' => __('', 'LeadAgency'),
			'id' => 'your_recent_Forretn_t',
			'type' => 'text',
			'std' => ''
			),
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $yourbusiness['id'], $yourbusiness['title'], $callback, $yourbusiness['post_type'], $yourbusiness['context'], $yourbusiness['priority'], $yourbusiness );
$perspektiv = array(
		'id' => 'perspektiv_blog',
		'title' => __('Your perspektiv', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'perspektiv',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
		array( 
				'name' => __('Popup Single Image ', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'perspektiv_popup_attachment',
				'type' => 'file',
				'std' => ''
				),
		
		
		array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Facebook', 'LeadAgency'),
				'id' => 'perspektiv_face',
				'type' => 'text',
				'std' => ''
				),
		
		array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Linkedin', 'LeadAgency'),
				'id' => 'perspektiv_linkdin',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Twitter', 'LeadAgency'),
				'id' => 'perspektiv_twiter',
				'type' => 'text',
				'std' => ''
				),
		array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Section Two', 'LeadAgency'),
				'id' => 'section_two',
				'type' => 'textarea',
				'std' => ''
				),
				array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Section Three', 'LeadAgency'),
				'id' => 'section_three',
				'type' => 'textarea',
				'std' => ''
				),
		
		/*array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Heading', 'LeadAgency'),
				'id' => 'perspektiv_heading',
				'type' => 'text',
				'std' => ''
				),
			*/
				array( 
				'name' => __('Pdf Attachment', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'perspektiv_attachment',
				'type' => 'file',
				'std' => ''
				),
				array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Link', 'LeadAgency'),
				'id' => 'perspektiv_link',
				'type' => 'text',
				'std' => ''
				),
				
	
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $perspektiv['id'], $perspektiv['title'], $callback, $perspektiv['post_type'], $perspektiv['context'], $perspektiv['priority'], $perspektiv );
	
	
	
	
	
	
	
	
	$people = array(
		'id' => 'people_blog',
		'title' => __('People MetaBox', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'perspektivs',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
		
		array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Single Page Image', 'LeadAgency'),
				'id' => 'people_single_image',
				'type' => 'file',
				'std' => ''
				),
		array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Sub title', 'LeadAgency'),
				'id' => 'people_heading',
				'type' => 'text',
				'std' => ''
				),
			
				array( 
				'name' => __('Telephone', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'people_phone',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Email', 'LeadAgency'),
				'id' => 'people_email',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Linkedin', 'LeadAgency'),
				'id' => 'people_Linkedink',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('', 'LeadAgency'),
				'desc' => __('Twitter', 'LeadAgency'),
				'id' => 'people_Twitter',
				'type' => 'text',
				'std' => ''
				),
				
				
	
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $people['id'], $people['title'], $callback, $people['post_type'], $people['context'], $people['priority'], $people );
	
	$vacancies = array(
		'id' => 'vacancies_blog',
		'title' => __('Career MetaBox', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'vacancies',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
		
			array( 
				'name' => __('Section Second', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_Second',
				'type' => 'textarea',
				'std' => ''
				),
			
			array( 
				'name' => __('Icon', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_attachment',
				'type' => 'file',
				'std' => ''
				),	
				array( 
				'name' => __('Hover Icon', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_attachment_hover',
				'type' => 'file',
				'std' => ''
				),	
				array( 
				'name' => __('Subtitle', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_Subtitle',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Facebook Link', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_Facebook',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Linkedin Link', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_Linkdin',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Twitter Link', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'vacancies_Twitter',
				'type' => 'text',
				'std' => ''
				),	
	
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $vacancies['id'], $vacancies['title'], $callback, $vacancies['post_type'], $vacancies['context'], $vacancies['priority'], $vacancies );
	
	
	
	$ourbusinesspage = array(
		'id' => 'ourbusiness_page',
		'title' => __('Our business MetaBox', 'LeadAgency'),
		'description' => __('', 'LeadAgency'),
		'post_type' => 'ourbusiness',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
				
				
				array( 
				'name' => __('Facebook Link', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'business_Facebook',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Linkedin Link', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'business_Linkdin',
				'type' => 'text',
				'std' => ''
				),
				array( 
				'name' => __('Twitter Link', 'LeadAgency'),
				'desc' => __('', 'LeadAgency'),
				'id' => 'business_Twitter',
				'type' => 'text',
				'std' => ''
				),	
	
		)
	);
	$callback = create_function( '$post,$meta_box', 'yds_create_meta_box($post, $meta_box["args"]);' );
	add_meta_box( $ourbusinesspage['id'], $ourbusinesspage['title'], $callback, $ourbusinesspage['post_type'], $ourbusinesspage['context'], $ourbusinesspage['priority'], $ourbusinesspage );
	
	
}
?>