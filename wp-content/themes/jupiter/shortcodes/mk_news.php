<?php

extract( shortcode_atts( array(
			'count' => 8,
			'offset' => 0,
			'cat' => '',
			'posts' => '',
			'author' => '',
			'image_height' => '250',
			'pagination' => 'true',
			'pagination_style' => '2',
			'orderby'=> 'date',
			'order'=> 'DESC',


		), $atts ) );

$query = array(
	'posts_per_page' => (int)$count,
	'post_type'=>'news',
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


if ( is_singular() ) {
	global $post;
	$layout = get_post_meta( $post->ID, '_layout', true );
}

$atts = array(
	'layout' => $layout,
	'image_height' => $image_height,
);

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
$id = mt_rand( 100, 999 );

$output = '<section id="mk-news-section-'.$id.'" class="mk-news-container mk-theme-loop isotop-enabled '.$paginaton_style_class.'" >' . "\n";


if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();
	$output .= mk_news_loop( $atts, 1 );
endwhile;
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
