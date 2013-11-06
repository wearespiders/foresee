<?php

extract( shortcode_atts( array(
			'style' => 'classic',
			'column' => 3,
			'count'=> 10,
			'disable_excerpt' => 'true',
			'disable_permalink' => 'true',
			"sortable" => 'true',
			'pagination' => 'true',
			'pagination_style' => '1',
			'height' => '',
			'cat' => '',
			'author' => '',
			'posts' => '',
			'offset' => 0,
			'order'=> 'DESC',
			'orderby'=> 'date',
			//'ajax' => 'true',
			'target' => '_self',
		), $atts ) );


global $wp_version;
if ( is_front_page() && version_compare( $wp_version, "3.1", '>=' ) ) {
	$paged = ( get_query_var( 'paged' ) ) ?get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
}else {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
}

$query = array(
	'post_type' => 'portfolio',
	'posts_per_page' => (int)$count,
	'paged' => $paged
);
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $cat != '' ) {
	global $wp_version;
	if ( version_compare( $wp_version, "3.1", '>=' ) ) {
		$query['tax_query'] = array(
			array(
				'taxonomy' => 'portfolio_category',
				'field' => 'slug',
				'terms' => explode( ',', $cat )
			)
		);
	}else {
		$query['taxonomy'] = 'portfolio_category';
		$query['term'] = $cat;
	}
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


if ( is_page() ) {
	global $post;
	$layout = get_post_meta( $post->ID, '_layout', true );
}
else if ( is_search() ) {
		$layout = theme_option( THEME_OPTIONS, 'search_page_layout' );
	}
else if ( is_archive() ) {
		$layout = theme_option( THEME_OPTIONS, 'archive_page_layout' );
	}


$atts = array(
	'column' => $column,
	'layout' => $layout,
	'height' => $height,
	'disable_excerpt' => $disable_excerpt,
	'pagination' => $pagination,
	'target' => $target,
	'disable_permalink' => $disable_permalink
);
wp_enqueue_script( 'jquery-isotope' );
$paginaton_style_class = '';
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

$output = '<div class="portfolio-grid">';
$id = mt_rand( 100, 999 );
if ( $sortable == 'true' && !is_archive() ) {
	$output .= '<header class="filter-'.$style.'" id="mk-filter-portfolio"><ul>';
	$terms = array();
	if ( $cat != '' ) {
		foreach ( explode( ',', $cat ) as $term_slug ) {
			$terms[] = get_term_by( 'slug', $term_slug, 'portfolio_category' );
		}
	} else {
		$terms = get_terms( 'portfolio_category', 'hide_empty=1' );
	}
	$output .= '<li><a class="current" data-filter="*" href="#">'.__( 'All', 'mk_framework' ).'</a></li>';
	foreach ( $terms as $term ) {
		$output .= '<li><a data-filter=".'.$term->slug . '" href="#">' . $term->name . '</a></li>';
	}

	$output .= '<div class="clearboth"></div></ul>';
	if ( $column != 1 && $style != 'modern' ) :
		$output .= '<div data-view="mk-portfolio-loop-'.$id.'" class="mk-portfolio-orientation">';
	$output .= '<a href="#" class="mk-grid-view current"></a>';
	$output .= '<a href="#" class="mk-list-view"></a>';
	$output .= '</div>';
	endif;
	$output .= '<div class="clearboth"></div></header>';
}


/*
wp_enqueue_script( 'ajax-portfolio' );
$output .= '<div class=​"portfolio-loader" style=​""><div></div></div>';
$output .= '<div class="ajax-container">';
$output .= '<div class="ajax-controls">';
$output .= '<a href="#" class="close-ajax-container"><i class="mk-moon-close-2"></i></a>';
$output .= '<a href="#" class="next-ajax-container"><i class="mk-moon-arrow-right-3"></i></a>';
$output .= '<a href="#" class="prev-ajax-container"><i class="mk-moon-arrow-left-2"></i></a>';
$output .= '</div></div>';
*/


$output .= '<section id="mk-portfolio-loop-'.$id.'" class="mk-portfolio-container mk-theme-loop isotop-enabled mk-portfolio-'.$style.' '.$paginaton_style_class.' " >' . "\n";

if ( is_archive() ) :
	if ( have_posts() ):
		while ( have_posts() ) :
			the_post();
		switch ( $style ) {

		case 'classic' :
			$output .= mk_portfolio_classic_loop($r, $atts, 1 );
			break;
		case 'modern' :
			$output .= mk_portfolio_modern_loop( $r, $atts, 1 );
			break;
			$output .= mk_portfolio_classic_loop( $r, $atts, 1 );
		}
	endwhile;
endif;
else :
	if ( $r->have_posts() ):
		while ( $r->have_posts() ) :
			$r->the_post();
		switch ( $style ) {

		case 'classic' :
			$output .= mk_portfolio_classic_loop( $r, $atts, 1 );
			break;
		case 'modern' :
			$output .= mk_portfolio_modern_loop( $r, $atts, 1 );
			break;
			$output .= mk_portfolio_classic_loop( $r, $atts, 1 );
		}
	endwhile;
endif;
endif;


$output .= '</section><div class="clearboth"></div>' . "\n\n";



$output .= '<a class="mk-loadmore-button" href="#"><i class="mk-icon-arrow-down mk-left"></i>'.__( 'Load More', 'mk_framework' ).'<i class="mk-icon-arrow-down mk-right"></i></a>';

$output .= '</div>';

if ( $pagination == 'true' ) {
	ob_start();
	theme_blog_pagenavi( '', '', $r, $paged );
	$output .= ob_get_clean();
}
wp_reset_postdata();
echo $output;
