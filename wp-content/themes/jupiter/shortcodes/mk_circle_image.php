<?php

extract( shortcode_atts( array(
			'heading_title' => '',
			'image_diameter' => 770,
			'image_height' => 350,
			'src' => '',
			'animation' => '',
			'link' => '',
			'el_class' => '',
		), $atts ) );


$image_src  = theme_image_resize( $src, $image_diameter, $image_diameter );
$animation_css = '';
if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

$output .= '<div class="mk-circle-image  mk-shortcode '.$animation_css.$el_class.'"><span>';
if ( !empty( $heading_title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}
if ( $link ) {
	$output .= '<a href="'.$link.'"><img alt="'.$heading_title.'" title="'.$heading_title.'" src="'.$image_src['url'].'" /></a>';
} else {
	$output .= '<img alt="'.$heading_title.'" title="'.$heading_title.'" src="'.$image_src['url'].'" />';
}

$output .= '</span></div><div class="clearboth"></div>';

echo $output;
