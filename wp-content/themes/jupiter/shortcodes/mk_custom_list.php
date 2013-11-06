<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'title' => '',
			'style' => 'f00c',
			'icon_color'=> '',
			'animation' => '',
			'align' => 'none',
			'margin_bottom' => '',
		), $atts ) );

$id = mt_rand( 99, 999 );
$output = $animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if ( substr( $style, 0, 1 ) == 'f' ) {
	$font_family = 'FontAwesome';
} else {
	$font_family = 'Icomoon';
}

$output .= '<div id="list-style-'.$id.'" class="mk-list-styles mk-shortcode mk-align-'.$align.' '.$animation_css.$el_class.'" style="margin-bottom:'.$margin_bottom.'px">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '<style type="text/css">
                    #list-style-'.$id.' ul li:before {
                        font-family:'.$font_family.';
                        content: "\\'.$style.'";
                        color:'.$icon_color.'
                    }
                </style>';

echo $output;
