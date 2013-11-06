<?php
$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'title' => '',
			'disable_pattern' => '',
			'margin_bottom' => '',
			'align' => 'left',
			'animation' => '',
		), $atts ) );

$id = mt_rand( 99, 999 );
$output = $animation_css ='';
$disable_pattern = !empty( $disable_pattern ) ? $disable_pattern : 'true';
$margin_style = '';
if ( $margin_bottom != '' ) {
	$margin_style = ' margin-bottom:'.$margin_bottom.'px;';
}
$fancy_style = '';
if ( $align == 'center' ) {
	$fancy_style = 'style="padding:0 5px;"';
} else if ( $align == 'right' ) {
		$fancy_style = 'style="padding:0 0 0 5px;"';
	}


if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$output .= '<div id="mk-text-block-'.$id.'"  style="'.$margin_style.'text-align: '.$align.';" class="mk-text-block  '.$animation_css.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading pattern-'.$disable_pattern.'"><span '.$fancy_style.'>'.$title.'</span></h3>';
}
$output .= wpb_js_remove_wpautop( $content );
$output .= '<div class="clearboth"></div></div> ';

echo $output;
