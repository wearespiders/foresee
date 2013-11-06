<?php

extract( shortcode_atts( array(
			'title' => false,
			'style' => 'simple',
			'icon' => '',
			"el_class" => '',
		), $atts ) );

$id = mt_rand( 99, 999 );
$output = '';

$output .= '<div id="mk-toggle-'.$id.'" class="mk-toggle mk-shortcode '.$style.'-style '.$el_class.'">';
if ( $icon && $style != 'simple' ) {
	$output .= '<span class="mk-toggle-title"><i class="mk-' . $icon . '"></i>' .$title . '</span>';
} else {
	$output .= '<span class="mk-toggle-title">' .$title . '</span>';
}
$output .= '<div class="mk-toggle-pane">' . wpb_js_remove_wpautop( do_shortcode( trim( $content ) ) ) . '</div></div>';
echo $output;
