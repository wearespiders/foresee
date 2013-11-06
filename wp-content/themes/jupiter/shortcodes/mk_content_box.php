<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'heading' => '',
			'icon' => '',
			'animation' => '',
		), $atts ) );

$output = $animation_css = '';

if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

$output .= '<div class="mk-content-box mk-shortcode '.$animation_css.$el_class.'">';
$output .= '<span class="content-box-heading"><i class="mk-'.$icon.'"></i> '.strip_tags( $heading ).'</span>';
$output .= '<div class="content-box-content">'.wpb_js_remove_wpautop( $content ).'</div>';
$output .= '<div class="clearboth"></div></div>';

echo $output;
