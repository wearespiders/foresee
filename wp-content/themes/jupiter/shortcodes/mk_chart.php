<?php

extract( shortcode_atts( array(
			'desc' => '',
			'percent' => '',
			'bar_color' => '',
			'track_color' => '',
			'line_width' => '',
			'bar_size' => '',
			'content' => '',
			'content_type' => '',
			'icon' => '',
			'custom_text' => '',
			'el_class' => '',
			'animation' => '',
		), $atts ) );
wp_enqueue_script( 'jquery-easychart' );

$animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

$output = '<div class="'.$animation_css.'">';
$output .= '<div class="mk-chart" style="width:'.$bar_size.'px;height:'.$bar_size.'px;line-height:'.$bar_size.'px" data-percent="'.$percent.'" data-barColor="'.$bar_color.'" data-trackColor="'.$track_color.'" data-lineWidth="'.$line_width.'" data-barSize="'.$bar_size.'">';
if ( $content_type == 'icon' ) {
	$icon_size = floor( $bar_size/3 );
	$output .= '<i style="line-height:'.$bar_size.'px; font-size:'.$icon_size.'px" class="mk-'.$icon.'"></i>';
} elseif ( $content_type == 'custom_text' ) {
	$output .= '<span class="chart-custom-text">'.$custom_text.'</span>';
} else {
	$output .= '<div class="chart-percent"><span>'.$percent.'</span>%</div>';
}
$output .= '</div>';
$output .= '<div class="mk-chart-desc">'.$desc.'</div>';
$output .= '</div>';
echo $output;
