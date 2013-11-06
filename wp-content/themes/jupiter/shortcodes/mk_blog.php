<?php

extract( shortcode_atts( array(
			'style' => 'classic',
			'column' => 3,
			'disable_meta' => 'true',
			'disable_lightbox' => 'true',
			'grid_image_height' => 350,
			'count' => 8,
			'offset' => 0,
			'cat' => '',
			'posts' => '',
			'author' => '',
			'disable_comments_share' => '',
			'pagination' => 'true',
			'pagination_style' => '2',
			'orderby'=> 'date',
			'order'=> 'DESC',

		), $atts ) );

$query = array(
	'posts_per_page' => (int)$count,
	'post_type'=>'post',
);
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $cat ) {
	$query['cat'] = $cat;
}
if ( $author ) {
	$query['author'] = $author;
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

global $wp_version;
if ( ( is_front_page() || is_home() ) && version_compare( $wp_version, "3.1", '>=' ) ) {//fix wordpress 3.1 paged query
	$paged = ( get_query_var( 'paged' ) ) ?get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
}else {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
}
$query['paged'] = $paged;

$r = new WP_Query( $query );


if ( is_page() ) {
	global $post;
	$layout = get_post_meta( $post->ID, '_layout', true );
}
else if ( is_search() ) {
		$layout = theme_option( THEME_OPTIONS, 'search_page_layout' );
	}
else if ( is_archive() ) {
		$layout = theme_option( THEME_OPTIONS, 'archive_page_layout' );
	} else {
	$layout = 'right';
}

$atts = array(
	'layout' => $layout,
	'column' => $column,
	'grid_image_height' => $grid_image_height,
	'disable_meta' => $disable_meta,
	'disable_comments_share' => $disable_comments_share,
	'disable_lightbox' => $disable_lightbox
);
$el_position_css = $container_css = $output = '';



wp_enqueue_script( 'jquery-jplayer' );

if ( $style != 'grid' ) {


	wp_enqueue_script( 'jquery-isotope' );

	if ( $pagination_style == '2' ) {
		$paginaton_style_class = 'load-button-style';
		wp_enqueue_script( 'infinitescroll' );
	}
	else if ( $pagination_style == '3' ) {
			$paginaton_style_class = 'scroll-load-style';
			wp_enqueue_script( 'infinitescroll' );
		} else {
		$paginaton_style_class = 'page-nav-style';
	}

	$container_css = 'mk-theme-loop isotop-enabled '.$paginaton_style_class;
}


$id = mt_rand( 100, 999 );
$output .= '<div class="clearboth"></div><section id="mk-blog-'.$id.'" class="mk-blog-container mk-'.$style.'-wrapper '.$container_css.'" >' . "\n";
$i = 0;
if ( is_archive() ) :
	if ( have_posts() ):
		while ( have_posts() ) :
			the_post();
		$i++;
	switch ( $style ) {

	case 'classic' :
		$output .= blog_classic_style( $atts, 1 );
		break;

	case 'newspaper' :
		$output .= blog_newspaper_style( $atts, 1 );
		break;
	case 'grid' :
		$output .= blog_grid_style( $atts, $i, 1 );
		break;
	default :
		$output .= blog_grid_style( $atts, $i, 1 );
	}
endwhile;
endif;
else :

	if ( $r->have_posts() ):
		while ( $r->have_posts() ) :
			$r->the_post();
		$i++;
	switch ( $style ) {

	case 'classic' :
		$output .= blog_classic_style( $atts, 1 );
		break;

	case 'newspaper' :
		$output .= blog_newspaper_style( $atts, 1 );
		break;
	case 'grid' :
		$output .= blog_grid_style( $atts, $i, 1 );
		break;
	default :
		$output .= blog_grid_style( $atts, $i, 1 );
	}
endwhile;
endif;
endif;


$output .= '</section><div class="clearboth"></div>' . "\n\n";



$output .= '<a class="mk-loadmore-button" style="display:none;" href="#"><i class="mk-icon-arrow-down mk-left"></i>'.__( 'Load More', 'mk_framework' ).'<i class="mk-icon-arrow-down mk-right"></i></a>';

if ( $pagination == 'true'  ) {
	ob_start();
	theme_blog_pagenavi( '', '', $r, $paged );
	$output .= ob_get_clean();
}
wp_reset_postdata();
echo $output;
