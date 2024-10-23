<?php 
add_action( 'wp_enqueue_scripts', 'hrm_styles' );
add_action( 'init', function () {
	add_ux_builder_post_type( 'service' );
} );
function hrm_styles() { 
 		  // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 		  // wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/owl-slider/owl.carousel.css' );
	wp_enqueue_style( 'awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
}
function hrm_scripts() {
	global $hrm_options;

	//wp_enqueue_style('bootstrap' , THEME_URL . 'css/bootstrap.min.css');
	//wp_enqueue_style('fontawesome' , THEME_URL . 'css/font-awesome.min.css');
	//wp_enqueue_style('fancybox' , THEME_URL . 'css/jquery.fancybox-1.3.4.css');
	wp_enqueue_script( 'hrm-js' , get_stylesheet_directory_uri() . '/ja/hrm-cus.js', array('jquery'), false,true );
	wp_enqueue_script( 'match-height-js' , get_stylesheet_directory_uri() . '/ja/match-height.js', array('jquery'), false,true );
	// wp_enqueue_script( 'owl.carousel' , get_stylesheet_directory_uri() . '/ja/owl.carousel.2.min.js', array('jquery'), '2.1',true );
	// wp_enqueue_script( 'isotope' , get_stylesheet_directory_uri() . '/ja/isotope.pkgd.js', array('jquery'), '2.1',true );
	// wp_enqueue_script( 'isotope.pkgdl' , get_stylesheet_directory_uri() . '/ja/isotope.pkgd.min.js', array('jquery'), '2.1',true );
}
add_action( 'wp_enqueue_scripts', 'hrm_scripts' );
require get_stylesheet_directory() . '/inc/meta-boxs.php';
require get_stylesheet_directory() . '/inc/register-post-type.php';
add_filter( 'widget_text', 'do_shortcode' );
function load_project_post($a){
	$args = array(
		"post_type" => "post",
	);

	if( isset( $a['rand'] ) && $a['rand'] == true ) {
		$args['orderby'] = 'rand';
	}
	if( isset( $a['max'] ) ) {
		$args['posts_per_page'] = (int) $a['max'];
	}
	if( isset( $a['id'] ) ) {
		$args['cat'] = (int) $a['id'];
	}

	$html=''; 
	$html .='<ul class="posts-shortcode clearfix left-right">';
	$posts = get_posts($args);
	foreach($posts as $post){
		$html .= '<li class="other-news clearfix">'; 
		$html .= '<div class="inner-content">'; 
		$html .= '<div class="post-thumbnail tie-appear">'; 
		$html .= '<a href="'.get_permalink($post->ID).'"><img src="'.get_the_post_thumbnail_url($post->ID,'post-thumbnail').'"></a>';  
		$html .= '</div>';
		$html .= '<div class="entry-in-post">';
		$html .= '<span class="post-box-time">';
		$postdate = get_field('ngay_dang');
		if($postdate[0] != 1) {
			$html .= '<i class="fa fa-clock-o" aria-hidden="true"></i>'.get_the_time('d/m/Y', $post->ID).''; 
		}
		$html .= '</span>';      
		$html .= '<h2 class="post-box-title">';
		$html .= '<a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a>';
		$html .= '</h2>';  
		$html .= '<div class="entry">';
		$html .= '<p>'.wp_trim_words($post->post_content, 10).'</p>';
		$html .= '</div>'; 
		$html .= '</div>'; 
		$html .= '</div>';  
		$html .= '</li>';
	}

	$html .= '</ul>';
	return $html;
}
add_shortcode("project_post","load_project_post");

add_filter( 'widget_text', 'do_shortcode' );
function load_service_post($a){
	if( isset( $a['rand'] ) && $a['rand'] == true ) {
		$args['orderby'] = 'rand';
	}
	if( isset( $a['max'] ) ) {
		$args['posts_per_page'] = (int) $a['max'];
	}
	if( isset( $a['id'] ) ) {
		$args['cat'] = (int) $a['id'];
	}
	$args = array(
		"post_type" => "service",
		'posts_per_page' => $a['max'],
		'tax_query' => array(
		// array(
		// 	'taxonomy' => 'service_cat',
		// 	'field'    => 'slug',
		// 	'terms'    => $a['title_cat'],
		// ),
			array(
				'taxonomy' => 'service_cat',
				'field'    => 'term_id',
				'terms'    => array( $a['id'] ),
			),
		),
	);



	$html='';
	$html .='<div class="posts-shortcode clearfix">';
	$posts = get_posts($args);
	foreach($posts as $post){
		$html .= '<div class="service-post clearfix 2">'; 
		$html .= '<div class="inner-content">'; 
		$html .= '<div class="post-thumbnail tie-appear">'; 
		$html .= '<a href="'.get_permalink($post->ID).'"><img class="image" src="'.get_the_post_thumbnail_url($post->ID,'project-size').'"></a>';
		$html .= '<a href="'.get_permalink($post->ID).'"><div class="middle">'; 
		$html .= '<i class="fa fa-link" aria-hidden="true"></i>'; 
		$html .= '</div></a>'; 
		$html .= '</div>';
		$html .= '<div class="entry-inner">';    
		$html .= '<h2 class="post-box-title">';
		$html .= '<a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a>';
		$html .= '</h2>';  
		$html .= '<div class="entry">';
		$html .= '<p>'.get_the_excerpt($post->ID).'</p>';
		$html .= '</div>'; 
		$html .= '<div class="entry-rm">';
		$html .= '<a href="'.get_permalink($post->ID).'">'.__('Read more','sc').'</a>';
		$html .= '</div>'; 
		$html .= '</div>';  
		$html .= '</div>';
		$html .= '</div>';
	}
	$html .= '</div>';
	return $html;
}
add_shortcode("service_post","load_service_post");
 	// This theme uses wp_nav_menu() in one location.
// 	register_nav_menus( array(
//         'about' => esc_html__( 'Menu Trang giới thiệu', 'hrm' ),
// 	) );
add_image_size( 'project-size', 520, 364, true );
function hrm_recent_post_category() {
	$posttype = get_post_type();
	if ( $posttype == 'post' ) {
		$categories = wp_get_post_categories(get_the_id(), array('orderby' => 'parent', ));
		$args = array(
			'cat'                 => $categories,
			'post__not_in'        => array(get_the_id()),
			'showposts'           => 8,
			'ignore_sticky_posts' => 1,
			'orderby'             => 'rand',
		);
	} else {
		$args = array(
			'post_type'           => $posttype,
			'post__not_in'        => array(get_the_id()),
			'showposts'           => 8,
			'ignore_sticky_posts' => 1,
			'orderby'             => 'rand',
		);

		$taxs = get_object_taxonomies( $posttype );

		if ( count($taxs) > 0 ) { /* if 1 */
			$terms_obj = wp_get_post_terms( get_the_id(), $taxs[0] );
			$terms = array();
			foreach ($terms_obj as $term_ob) {
				$terms[] = $term_ob->term_id;
			}
			if (count($terms) > 0) { /* if 2 */
				$args['tax_query'] =   array(
					array(
						'taxonomy'         => $taxs[0],
						'field'            => 'id',
						'terms'            => $terms,
						'include_children' => true,
					),
				);
			} /* /.if 2 */
		} /* /.if 1 */
	} /* /.else post_type */
	$related_post = new wp_query($args);
	if( $related_post->have_posts() ){
		?>
		<div class="blog-box-title mt-4">
			<span style="color: #25317b; font-size: 180%;"><strong><?php echo  __( 'Related', 'hrm' ); ?></strong> <?php echo  __( 'Post', 'hrm' ); ?></span>
		</div>
		<div class="show-related">
				<ul class="related clearfix clear post-item">
					<?php while ($related_post->have_posts()){
						$related_post->the_post();?> 
						<div class="other-news clearfix">  
							<div class="inner-content">  
								<div class="post-thumbnail tie-appear">  
									<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>   
								</div>
								<div class="entry-in-post">
									<span class="post-box-time">
										<?php
                                            $postdate = get_field('ngay_dang');
                                            if($postdate[0] != 1){
                                        ?>
                                    	    <i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('d/m/Y'); ?>
                                        <?php } ?>
									</span>       
									<h2 class="post-box-title">
										<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
									</h2>   
									<div class="entry">
										<p><?php echo wp_trim_words( get_the_excerpt(), 8 ); ?></p>
									</div>  
								</div>  
							</div>   
						</div>
						<?php } ?>
					</ul>
			</div>
			<?php   }
			wp_reset_query();
		}
		?>