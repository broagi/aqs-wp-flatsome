<?php
// Register Custom Post Type
function hrm_post_type_Project() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'hrm' ),
		'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'hrm' ),
		'menu_name'             => __( 'Services', 'hrm' ),
		'name_admin_bar'        => __( 'Services', 'hrm' ),
		'archives'              => __( 'Item Archives', 'hrm' ),
		'attributes'            => __( 'Item Attributes', 'hrm' ),
		'parent_item_colon'     => __( 'Parent Item:', 'hrm' ),
		'all_items'             => __( 'All Services', 'hrm' ),
		'add_new_item'          => __( 'Add new', 'hrm' ),
		'add_new'               => __( 'Add new', 'hrm' ),
		'new_item'              => __( 'New Item', 'hrm' ),
		'edit_item'             => __( 'Sửa', 'hrm' ),
		'update_item'           => __( 'Update Item', 'hrm' ),
		'view_item'             => __( 'View Item', 'hrm' ),
		'view_items'            => __( 'View Items', 'hrm' ),
		'search_items'          => __( 'Search Item', 'hrm' ),
		'not_found'             => __( 'Not found', 'hrm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hrm' ),
		'featured_image'        => __( 'Featured Image', 'hrm' ),
		'set_featured_image'    => __( 'Set featured image', 'hrm' ),
		'remove_featured_image' => __( 'Remove featured image', 'hrm' ),
		'use_featured_image'    => __( 'Use as featured image', 'hrm' ),
		'insert_into_item'      => __( 'Insert into item', 'hrm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'hrm' ),
		'items_list'            => __( 'Items list', 'hrm' ),
		'items_list_navigation' => __( 'Items list navigation', 'hrm' ),
		'filter_items_list'     => __( 'Filter items list', 'hrm' ),
	);
	$args = array(
		'label'                 => __( 'service', 'hrm' ),
		'description'           => __( 'Page Services', 'hrm' ),
		'labels'                => $labels,
		'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
		'taxonomies'            => array( 'service_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'hrm_post_type_Project', 0 );

// Register Custom Taxonomy
function hrm_reg_project_cat() {

	$labels = array(
		'name'                       => _x( 'Category Services', 'Taxonomy General Name', 'hrm' ),
		'singular_name'              => _x( 'Category Services', 'Taxonomy Singular Name', 'hrm' ),
		'menu_name'                  => __( 'Category Services', 'hrm' ),
		'all_items'                  => __( 'All Category', 'hrm' ),
		'parent_item'                => __( 'Parent Item', 'hrm' ),
		'parent_item_colon'          => __( 'Parent Item:', 'hrm' ),
		'new_item_name'              => __( 'New Item Name', 'hrm' ),
		'add_new_item'               => __( 'Add new Category', 'hrm' ),
		'edit_item'                  => __( 'Edit Item', 'hrm' ),
		'update_item'                => __( 'Update Item', 'hrm' ),
		'view_item'                  => __( 'View Item', 'hrm' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'hrm' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'hrm' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'hrm' ),
		'popular_items'              => __( 'Popular Items', 'hrm' ),
		'search_items'               => __( 'Search Items', 'hrm' ),
		'not_found'                  => __( 'Not Found', 'hrm' ),
		'no_terms'                   => __( 'No items', 'hrm' ),
		'items_list'                 => __( 'Items list', 'hrm' ),
		'items_list_navigation'      => __( 'Items list navigation', 'hrm' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'service_cat', array( 'service' ), $args );

}
add_action( 'init', 'hrm_reg_project_cat', 0 );