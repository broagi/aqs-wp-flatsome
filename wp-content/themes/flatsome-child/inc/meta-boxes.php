<?php

add_filter( 'rwmb_meta_boxes', 'hrm_register_meta_boxes' );

function hrm_register_meta_boxes( $meta_boxes )
{
	$meta_boxes[]  = array(
		'title'  => __( 'Cấu hình bài viết', 'hrm' ),
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'id'   => 'post-height',
				'name' => __( ' Bài viết tiêu biểu', 'hrm' ),
				'type' => 'checkbox',
				'desc' => __( 'Tích nếu bạn muốn nó là bài viết tiêu biểu?', 'hrm' ),
			),
			array(
				'id'   => 'post-mo-ta',
				'name' => __( ' Mô tả bài viết', 'hrm' ),
				'type' => 'text',
				'desc' => __( 'Mô tả bài viết', 'hrm' ),
			),

		),
	);
	return $meta_boxes;
	
}
add_filter( 'rwmb_meta_boxes', 'hrm_register_meta_boxes_video' );
function hrm_register_meta_boxes_video( $meta_boxes ) {
	$meta_boxes[]  = array(
		'title'  => __( 'Cấu hình video', 'hrm' ),
		'pages'  => array( 'video' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video', 'hrm' ),
				'id'   => "video-index",
				'desc' => esc_html__( 'video dự án', 'hrm' ),
				'type' => 'text',
			),	
		),
	);
	return $meta_boxes;
}


