<?php
add_action( 'widgets_init', 'hrm_register_sidebar' );
function hrm_register_sidebar() {
	global $hrm_options;
	$before_widget =  '<div id="%1$s" class="widget %2$s">';
	$after_widget  =  '</div>';
	$before_title  =  '<div class="widget-top"><h3 class="widget-title">';
	$after_title   =  '</h3></div>';

	//Sidebars default

	$sidebars = array(
		'sidebar-primary'     => __( 'Primary Sidebar', 'hrm_tkbds' ),
		);

	foreach ( $sidebars as $id => $name )
	{
		register_sidebar( array(
			'name'          => $name,
			'id'            => $id,
			'before_widget' => $before_widget ,
			'after_widget'  => $after_widget ,
			'before_title'  => $before_title ,
			'after_title'   => $after_title ,
			) );
	}

	//footer sidebar
	$footer_top = $hrm_options['show-footer-top'];
	$layout_footer = $hrm_options['hrm-footer-layout'];
	if ($footer_top) {
		for ($i=1; $i<= $layout_footer ; $i++) {
			register_sidebar( array(
				'name'          => sprintf( __( 'Footer Sidebar %d', 'galaticos' ), $i ),
				'id'            => 'footer-' . $i,
				'before_widget' => $before_widget,
				'after_widget'  => $after_widget,
				'before_title'  => $before_title,
				'after_title'   => $after_title,
				)
			);
		}
	}
}
?>