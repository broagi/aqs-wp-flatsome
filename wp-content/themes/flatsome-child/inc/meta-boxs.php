<?php
add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );
function your_prefix_register_meta_boxes( $meta_boxes ) {
    $meta_boxes[]  = array(
		'title'  => __( 'Tin tức liên quan', 'hrm' ),
		'pages'  => array( 'service' ),
		'fields' => array(
            array(
                'name'        => 'Select a post new related',
                'id'          => 'page-sel',
                'type'        => 'post',

    // Post type.
                'post_type'   => 'post',

    // Field type.
                'field_type'  => 'select',
                 'multiple'        => true,
    // Placeholder, inherited from `select_advanced` field.
                'placeholder' => 'Select post',

    // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                ),
            ),
			array(
            'name'   => 'Tài liệu đi kèm (nếu có)', // Optional
            'id'     => 'dow-tl',
            'type'   => 'group',
            // List of sub-fields
				'clone'       => true,
                        'collapsible' => true,
                        'save_state'  => true,
                        'group_title' => array( 'field' => 'person' ),
            'fields' => array(
				array(
                    'name' => 'Tiêu đề file',
                    'id'   => 'link-t',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Link tải',
                    'id'   => 'link-d',
                    'type' => 'text',
                ),
                // Other sub-fields here
            ),
        ),
		),
	);

    return $meta_boxes;
}