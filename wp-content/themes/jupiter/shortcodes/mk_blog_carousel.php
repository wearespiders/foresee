<?php

extract( shortcode_atts( array(
			'title' => '',
			'view_all' => '',
			'count'=> 10,
			'author' => '',
			'posts' => '',
			'offset' => 0,
			'cat' => '',
			'order'=> 'DESC',
			'orderby'=> 'date',
			'el_class' => '',
			'enable_excerpt' => 'false',
		), $atts ) );
global $post;
wp_enqueue_script( 'jquery-flexslider' );
$id = mt_rand( 99, 999 );
$query = array(
	'post_type' => 'post',
	'posts_per_page' => (int)$count,
);
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $cat ) {
	$query['cat'] = $cat;
}
if ( $posts ) {
	$query['post__in'] = explode( ',', $posts );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$r = new WP_Query( $query );


$output = '';
$output .= '<div class="mk-shortcode mk-blog-carousel '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>'.$title.'</span>';
	$output .= '<a href="'.get_permalink( $view_all ).'" class="mk-blog-view-all">'.__( 'VIEW ALL', 'mk_framework' ).'</a></h3>';
}
$output .= '<div id="mk-blog-carousel-'.$id.'" class="mk-flexslider"><ul class="mk-flex-slides">';

if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();
	$post_type = get_post_meta( $post->ID, '_single_post_type', true );
if ( $post_type != 'audio' ) {

	if ( $post_type == '' ) {
		$post_type = 'image';
	}
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );


	$output .= '<li><div><div class="blog-carousel-thumb">';

	if ( has_post_thumbnail() ) {
		$image_src  = theme_image_resize( $image_src_array[ 0 ], 245, 180 );
	} else {
		$image_src  = theme_image_resize( THEME_IMAGES . '/empty-thumb.png', 245, 180 );
	}
	$output .= '<img src="'.$image_src['url'].'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
	$output .= '<div class="blog-carousel-overlay"></div>';
	$output .='<a class="post-type-badge '.$post_type.'-icon" href="'.get_permalink().'"><span></span></a>';
	$output .= '</div>';
	$output .='<h5 class="blog-carousel-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
	if ( $enable_excerpt == 'true' ) {
		$output .='<p class="blog-carousel-excerpt">'.get_the_excerpt().'</p>';
	}
	$output .= '</div></li>';
}
endwhile;
endif;
wp_reset_query();

$output .= '</ul></div><div class="clearboth"></div></div>';


$output .= '<script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#mk-blog-carousel-'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "slide",              //String: Select your animation type, "fade" or "slide"
                    smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
                    slideshowSpeed: 6000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
                    animationSpeed: 400,            //Integer: Set the speed of animations, in milliseconds
                    pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
                    controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
                    directionNav:true,
                    prevText: "",           //String: Set the text for the "previous" directionNav item
                    nextText: "",               //String: Set the text for the "next" directionNav item
                    itemWidth: 275,
                    itemMargin: 0,
                    maxItems: 4,
                    minItems: 1,
                    move: 1
                });
            });
        });
        </script>';
echo $output;
