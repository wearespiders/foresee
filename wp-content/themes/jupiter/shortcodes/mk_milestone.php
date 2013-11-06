<?php

extract( shortcode_atts( array(
			"icon" => '',
			"icon_size" => 'medium',
			"icon_color" => '',
			"start" => 0,
			"stop" => 100,
			"speed" => 2000,
			"prefix" => '',
			"suffix" => '',
			"text" => '',
			"text_color" => '',
			'el_class' => '',
		), $atts ) );
$id = mt_rand( 99, 999 );

$output = '<div class="'.$el_class.'">';
$output .= '<div class="mk-shortcode mk-milestone milestone-'.$icon_size.'" >';
$output .= '<i style="color:'.$icon_color.'" class="mk-'.$icon.'"></i>';
$output .= '<div class="milestone-top">';
$output .= !empty( $prefix ) ? ( '<span class="milestone-prefix">'.$prefix.'</span>' ) : '';
$output .= '<span class="milestone-number" data-speed="'.$speed.'" data-stop="'.$stop.'">'.$start.'</span>';
$output .= !empty( $suffix ) ? ( '<span class="milestone-suffix">'.$suffix.'</span>' ) : '';
$output .= '<div style="color:'.$text_color.'" class="milestone-text">'.$text.'</div>';
$output .= '</div>';
$output .= '<div class="clearboth"></div>';
$output .= '</div></div>';

echo $output;
