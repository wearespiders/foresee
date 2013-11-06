<?php

extract( shortcode_atts( array(
			'src' => '',
			'axis' => '',
			'animation' => '',
			'align' => 'left',
			'title' => '',
			'el_class' => '',
		), $atts ) );




$animation_css =  '';


if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

$output .= '<div class="mk-moving-image-shortcode mk-shortcode align-'.$align.' '.$animation_css.$el_class.'">';
$output .= '<img class="mk-floating-'.$axis.'" alt="'.$title.'" title="'.$title.'" src="'.$src.'" />';
$output .= '</div>';
$output .= '<div class="clearboth"></div></div>';

echo $output;
