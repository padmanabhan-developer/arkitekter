<?php

/*
Plugin Name: Assign Special Contacts
Plugin URI: http://www.likepoles.com
Description: Assign Special contacts for Categories
Version: 1.0
Author: Bagyaraj Sekar
Author URI:  
*/

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Contacts_List extends WP_List_Table {

	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'Contact', 'sp' ), //singular name of the listed records
			'plural'   => __( 'Contacts', 'sp' ), //plural name of the listed records
			'ajax'     => false //does this table support ajax?
		] );

	}


	/**
	 * Retrieve contacts data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_categories( $per_page = 5, $page_number = 1 ) {

		global $wpdb;

		$taxonomy = 'categories';
		$tax_terms = get_terms($taxonomy,array( 'parent' => 0,'hide_empty' => false));
		$categories = array();
		foreach ($tax_terms as $tax_term) {
			$post_name = array();
			$final_postname ='';
			$sql = "SELECT post_id FROM special_contact WHERE category_id = '".$tax_term->term_taxonomy_id."'";
			$result_post = $wpdb->get_results( $sql, 'ARRAY_A' );
			//print_r($result_post);
			foreach($result_post as $result_p){
				$post_t = get_post( $result_p['post_id'], 'ARRAY_A');
				$post_name[] = $post_t['post_title'];
			}
			if(count($post_name) > 0){
				$final_postname = implode(',',$post_name);
			}
			$categories[] = array('id'=>$tax_term->term_taxonomy_id,
							'name'=>$tax_term->name,
							'slug'=>$tax_term->slug,
							'assignedcontact'=>$final_postname,
							);
		}
		/*$the_posts = get_posts(array('post_type' => 'perspektivs'));
		 foreach($the_posts  as $post_type) {
			 print_r($post_type);
			 echo $post_type->ID;exit;
			 
		 }*/
		//print_r($categories);
		return $categories;
	}


	/**
	 * Delete a contact record.
	 *
	 * @param int $id contact ID
	 */
	public static function update_contact(  ) {
		global $wpdb;
		//print_r($_POST);
		//echo 'dsdsds';
		if(isset($_POST['cat_id'])){
		$catid = $_POST['cat_id'];
		$wpdb->delete("special_contact",[ 'category_id' => $catid ],[ '%d' ]);
		if(count($_POST['contacts'])>0){
		foreach($_POST['contacts'] as $contact){
			if($contact >0){
			$wpdb->insert('special_contact', array(
				'category_id' => $catid,
				'post_id' => $contact,
			));
			}
		}
		}
	}
	}


	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count() {
		global $wpdb;

		$sql = "SELECT COUNT(*) FROM special_contact";

		return $wpdb->get_var( $sql );
	}


	/** Text displayed when no contact data is available */
	public function no_items() {
		_e( 'No data available.', 'sp' );
	}


	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'address':
			case 'city':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['special_contact_id']
		);
	}


	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_id( $item ) {

		//$delete_nonce = wp_create_nonce( 'sp_delete_contact' );

		$title = '<strong>' . $item['id'] . '</strong>';


		return $title ;
	}
	function column_name( $item ) {
		global $wpdb;

		$delete_nonce = wp_create_nonce( 'sp_delete_contact' );

		$title = '<div><strong>' . $item['name'] . '</strong>';

		$the_posts = get_posts(array('post_type' => 'perspektivs', 'posts_per_page' => -1));
			$post_ids = array();
 			$sql_p = "SELECT post_id FROM special_contact WHERE category_id = '".$item['id']."'";
			$results_post = $wpdb->get_results( $sql_p, 'ARRAY_A' );
			//print_r($result_post);
			foreach($results_post as $results_p){
				$post_ids[] = $results_p['post_id'];
			}

           
		  	$title .= '<div class="row-actions"><span class="inline" style="color: #0073aa;cursor:pointer;" onclick="callOpenform('.$item['id'].');">Assign Contact</spna></div>
		  				<div class="inline_edit_form " id="inline_edit_form'.$item['id'].'" style="display:none;">';
						$action = sprintf( '?page=%s&action=%s&contact=%s&_wpnonce=%s', esc_attr( $_REQUEST['page'] ), 'update_contact', absint( $item['id'] ), $delete_nonce );
            $title .= '<form method="post" name="edit_sp_contact'.$item['id'].'" id="edit_sp_contact'.$item['id'].'" action="'.$action .'">';
			// $title .= '<input type="hidden" id="page" name="page" value="wp_list_table_class" />';
			$title .= '<input id="_wpnonce" type="hidden" value="'.$delete_nonce.'" name="_wpnonce">';
            $title .= '<input type="hidden" name ="cat_id" value="'.$item['id'].'" />';
			$title .= '<select multiple="multiple" size="6" name="contacts[]" class="userRequest_activity" >';
			$title .= ' <option value="" />Select Contact</option>';
            foreach($the_posts  as $post_type) { 
           		if (in_array($post_type->ID, $post_ids))
				{$title .= ' <option value="'.$post_type->ID.'" selected="selected" />'.$post_type->post_title.'</option>';}
				else{
					$title .= ' <option value="'.$post_type->ID.'" />'.$post_type->post_title.'</option>';
				}
			 } 
            $title .= ' </select>';
			$title .= '<button class="button-secondary alignleft" type="button" onclick="callHideform('.$item['id'].')">Cancel</button>';
			$title .= '<button class="button-primary save alignright" type="submit">Update</button>';
			$title .= '</form>
            </div></div>';

		//$actions = ['delete' => sprintf( '<a href="?page=%s&action=%s&contact=%s&_wpnonce=%s">Change Contact</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['special_contact_id'] ), $delete_nonce )];
		return $title ;
	}

	function column_slug( $item ) {

		$title = '<strong>' . $item['slug'] . '</strong>';
		return $title . $this->row_actions( $actions );
	}
	function column_assignedcontact( $item ) {

		$title = '<strong>' . $item['assignedcontact'] . '</strong>';
		return $title . $this->row_actions( $actions );
	}

	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = ['cb'      => '<input type="checkbox" />',
			'id'    => __( 'Id', 'sp' ),
			'name'    => __( 'Category Name', 'sp' ),
			'slug'    => __( 'Slug', 'sp' ),
			'assignedcontact'    => __( 'Assigned Contact', 'sp'),
		];

		return $columns;
	}


	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'name' => array( 'name', true )
		);

		return $sortable_columns;
	}

	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		$actions = [
			'bulk-delete' => 'Delete'
		];

		return $actions;
	}


	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->_column_headers = $this->get_column_info();

		/** Process bulk action */
		$this->process_bulk_action();

		$per_page     = $this->get_items_per_page( 'contacts_per_page', 40 );
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count();

		$this->set_pagination_args( [
			'total_items' => $total_items, //WE have to calculate the total number of items
			'per_page'    => $per_page //WE have to determine how many items to show on a page
		] );

		$this->items = self::get_categories( $per_page, $current_page );
	}

	public function process_bulk_action() {

		//Detect when a bulk action is being triggered...
		if ( 'update_contact' === $this->current_action() ) {
			// In our file that handles the request, verify the nonce.
			$nonce = esc_attr( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'sp_delete_contact' ) ) {
				die( 'Go get a life script kiddies' );
			}
			else {
			//print_r($_POST);
			//print_r($_POST['contacts']);
				self::update_contact();

		                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		                // add_query_arg() return the current url
						//echo esc_url_raw(add_query_arg());
		                //wp_redirect( esc_url_raw(add_query_arg()) );
				//exit;
			}

		}

		
	}

}


class SP_Plugin {

	// class instance
	static $instance;

	// contact WP_List_Table object
	public $contacts_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
	}


	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {

		$hook = add_menu_page(
			'Assign Special Contact',
			'Assign Special Contact',
			'manage_options',
			'wp_list_table_class',
			[ $this, 'plugin_settings_page' ]
		);

		add_action( "load-$hook", [ $this, 'screen_option' ] );

	}


	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page() {
		?>
		<div class="wrap">
			<h2>Avialable Categories</h2>

			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
								<?php
								$this->contacts_obj->prepare_items();
								$this->contacts_obj->display(); ?>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
        <script type="text/javascript" language="javascript1.1">
        jQuery(document).ready(function(){
			jQuery(".case-filter li a").on("click", function(){
			});
		});
		
		jQuery(document).ready(function() {

          var last_valid_selection = null;

          jQuery('.userRequest_activity').change(function(event) {

            if (jQuery(this).val().length > 2) {

              jQuery(this).val(last_valid_selection);
            } else {
              last_valid_selection = jQuery(this).val();
            }
          });
        });
		
		function callOpenform(catid){
			jQuery( ".inline_edit_form").hide();
			jQuery( "#inline_edit_form"+catid ).show();
		}
		function callHideform(catid){
			jQuery( "#inline_edit_form"+catid ).hide();
		}
        </script>
	<?php
	}

	/**
	 * Screen options
	 */
	public function screen_option() {

		$option = 'per_page';
		$args   = [
			'label'   => 'Contacts',
			'default' => 5,
			'option'  => 'contacts_per_page'
		];

		add_screen_option( $option, $args );

		$this->contacts_obj = new Contacts_List();
	}


	/** Singleton instance */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}


add_action( 'plugins_loaded', function () {
	SP_Plugin::get_instance();
} );

