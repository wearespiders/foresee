<?php

$title = $link = $size = $zoom = $type = $el_position = $el_class = '';
extract( shortcode_atts( array(
			'title' => '',
			'link' => '',
			'size' => 200,
			'zoom' => 14,
			'type' => 'm',
			'frame_style' => '',
			'el_class' => ''
		), $atts ) );
$output = '';

if ( $link == '' ) { return null; }

$output = '';
$output .= '<div class="wpb_gmaps_widget '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading" style="text-align:left;"><span>'.$title.'</span></h3>';
}
$output .= '<div class="wpb_map_wraper '.$frame_style.'-frame"><iframe width="100%" height="'.$size.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$link.'&amp;t='.$type.'&amp;z='.$zoom.'&amp;output=embed"></iframe></div>';
$output .= '</div>';

echo $output;
