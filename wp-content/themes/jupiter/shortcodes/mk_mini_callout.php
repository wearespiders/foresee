<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'title' => '',
			'button_text' => '',
			'button_url' => '',
		), $atts ) );


$output = '<div class=" '.$el_class.'">';
$output .= '<div class="mk-mini-callout">';
$output .= '<span class="callout-title">'.$title.'</span>';
$output .= '<span class="callout-desc">'.wpb_js_remove_wpautop( $content ).'</span>';
if ( $button_text ) {
	$output .= '<a href="'.$button_url.'">'.$button_text.'<i class="mk-icon-caret-right"></i></a>';
}
$output .= '</div>';
$output .= '</div>';

echo $output;
