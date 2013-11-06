<?php

extract( shortcode_atts( array(
			"images" => '',
			'title' => '',
			'collection_title'=>'',
			"height" => 500,
			"column" => 4,
			"el_class" => '',
			'custom_links'=> '',
			'frame_style' => '',
		), $atts ) );


if ( $images == '' ) return null;
$id = mt_rand( 99, 9999 );

if ( is_page() ) {
	global $post;
	$layout = get_post_meta( $post->ID, '_layout', true );
}

switch ( $column ) {
case 1:
	if ( $layout == 'full' ) {
		$image_width =  1100;
		$height = !empty( $height ) ? $height : 450;
	} else {
		$image_width = 795;
		$height = !empty( $height ) ? $height : 350;
	}
	$column_css = 'gallery-one-column';
	break;
case 2:
	if ( $layout == 'full' ) {
		$image_width = 528;
		$height = !empty( $height ) ? $height : 528;
	} else {
		$image_width = 500;
		$height = !empty( $height ) ? $height : 500;
	}
	$column_css = 'gallery-two-column';
	break;
case 3:
	$image_width = 500;
	$height = !empty( $height ) ? $height : 500;
	$column_css = 'gallery-three-column';
	break;

case 4:
	$image_width = 500;
	$height = !empty( $height ) ? $height : 500;
	$column_css = 'gallery-four-column';
	break;
case 5:
	$image_width = 500;
	$height = !empty( $height ) ? $height : 500;
	$column_css = 'gallery-five-column';
	break;

case 6:
	$image_width = 500;
	$height = !empty( $height ) ? $height : 500;
	$column_css = 'gallery-six-column';
	break;
case 7:
	$image_width = 500;
	$height = !empty( $height ) ? $height : 500;
	$column_css = 'gallery-seven-column';
	break;
case 8:
	$image_width = 500;
	$height = !empty( $height ) ? $height : 500;
	$column_css = 'gallery-eight-column';

}


$output = $first_column ='';
$images = explode( ',', $images );
$custom_links = explode( ',', $custom_links );
$i = -1;


foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $height );
	$output .= '<article class="'.$column_css.' '.$frame_style.'-frame"><div class="mk-gallery-wrapper">';
	$output .='<div class="image-hover-overlay"></div>';
	if ( isset( $custom_links[$i] ) && $custom_links[$i] != '' ) {
		$output .= '<a href="'.$custom_links[$i].'" class="mk-image-shortcode-lightbox"><i class="mk-icon-link"></i></a>';
	} else {
		$output .='<a href="'.$image_src_array[ 0 ].'" rel="prettyPhoto[gallery_'.$id.']" alt="'.$collection_title.'" title="'.$collection_title.'" class="mk-lightbox mk-image-shortcode-lightbox"><i class="mk-icon-zoom-in"></i></a>';
	}

	$output .= '<span class="gallery-inner"><img alt="'.$collection_title.'" src="' . $image_src['url'] .'" /></span>';
	$output .= '</div></article>'. "\n\n";

}

$final_output = '';
if ( !empty( $title ) ) {
	$final_output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$final_output .= '<div class="mk-gallery-shortcode mk-shortcode '.$el_class.'"><section>' . $output . '</section><div class="clearboth"></div></div>';

echo $final_output;
