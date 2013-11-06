<?php

extract( shortcode_atts( array(
			'count'=> -1,
			'column' => 3,
			'style' => 'simple',
			'box_blur' => 'false',
			'employees' => '',
			'animation' => '',
			'description' => 'true',
			'el_class' => '',
			'offset' => '',
			'orderby'=> 'date',
			'order'=> 'DESC',
		), $atts ) );

wp_enqueue_script( 'jquery-flexslider' );
$id = mt_rand( 99, 9999 );
$output = $animation_css = '';


$query = array(
	'post_type' => 'employees',
	'showposts' => $count,
);

if ( $employees ) {
	$query['post__in'] = explode( ',', $employees );
}
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

$loop = new WP_Query( $query );
$image_dimension = $column_css = $blur_css = $blur_item_css = '';
switch ( $column ) {
case 1 :
	$image_dimension = 225;
	$column_css = 'one-column';
	break;
case 2 :
	$image_dimension = 225;
	$column_css = 'two-column';
	break;
case 3 :
	$image_dimension = 225;
	$column_css = 'three-column';
	break;
case 4 :
	$image_dimension = 180;
	$column_css = 'four-column';
	break;
case 5 :
	$image_dimension = 130;
	$column_css = 'five-column';
	break;
}
if ( $style == 'boxed' ) {
	$image_dimension = 90;
	if ( $box_blur == 'true' ) {
		$blur_css = 'employee-blur';
		$blur_item_css = 'employee-item-blur';
	}
}

$output .= '<div class="mk-employees mk-shortcode '.$el_class.' '.$column_css.' '.$style.'-style '.$blur_css.'"><ul>';

$i = 0;
while ( $loop->have_posts() ):
	$loop->the_post();
$i++;

$facebook = get_post_meta( get_the_ID(), '_facebook', true );
$linkedin = get_post_meta( get_the_ID(), '_linkedin', true );
$twitter = get_post_meta( get_the_ID(), '_twitter', true );
$email = get_post_meta( get_the_ID(), '_email', true );
$googleplus = get_post_meta( get_the_ID(), '_googleplus', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_dimension, $image_dimension );

$first_column = '';
if ( ( $i-1 )%$column == 0 ) {
	$first_column = 'em-first-column';
}

$output .= '<li class="mk-employee-item '.$first_column.' '.$blur_item_css.'">';
$output .= '<div style="width:'.$image_dimension.'px;height:'.$image_dimension.'px;" class="team-thumbnail '.$animation_css.'"><img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.get_image_src( $image_src['url'] ).'" /></div>';
$output .= '<div class="team-info-wrapper">';
$output .= '<span class="team-member-name">'.get_the_title().'</span>';
$output .= '<span class="team-member-position">'.get_post_meta( get_the_ID(), '_position', true ).'</span>';
if ( $description == 'true' ) {
	$output .= '<span class="team-member-desc">'.get_post_meta( get_the_ID(), '_desc', true ).'</span>';
}
$output .= '<div class="clearboth"></div><ul class="mk-employeee-networks">';
if ( !empty( $email ) ) {
	$output .= '<li><a href="mailto:'.antispambot( $email ).'" title="'.__( 'Get In Touch With', 'mk_framework' ).' '.get_the_title().'"><i class="mk-icon-envelope"></i></a></li>';
}
if ( !empty( $facebook ) ) {
	$output .= '<li><a href="'.$facebook.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Facebook"><i class="mk-moon-facebook"></i></a></li>';
}
if ( !empty( $twitter ) ) {
	$output .= '<li><a href="'.$twitter.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Twitter"><i class="mk-moon-twitter"></i></a></li>';
}
if ( !empty( $googleplus ) ) {
	$output .= '<li><a href="'.$googleplus.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Google Plus"><i class="mk-moon-google-plus"></i></a></li>';
}
if ( !empty( $linkedin ) ) {
	$output .= '<li><a href="'.$linkedin.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Linked In"><i class="mk-icon-linkedin"></i></a></li>';
}
$output .= '</ul>';
$output .= '</div>';
$output .= '</li>';

if ( $i%$column == 0 ) {
	$output .= '<div class="clearboth"></div>';
}
endwhile;
wp_reset_query();

$output .= '</ul><div class="clearboth"></div></div>';


echo $output;
