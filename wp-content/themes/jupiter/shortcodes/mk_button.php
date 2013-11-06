<?php
extract( shortcode_atts( array(
			'el_class' => '',
			'id' => '',
			'size' => 'medium',
			'icon' => '',
			'text_color' => '',
			'bg_color' => '',
			'outline_skin' => '',
			'dimension' => 'three',
			'text_color' => 'light',
			"url" => '',
			"target" => '',
			'margin_bottom' => 15,
			'margin_top' => '',
			'animation' => '',
			'button' => '',
			"align" => '',
		), $atts ) );

$animation_css = '';

$text_color = '';

$style_id = mt_rand( 99, 999 );

if ( $dimension == 'outline' ) {
	$style = '<style type="text/css">
        .button-'.$style_id.' {
                margin-bottom: '.$margin_bottom.'px;
                margin-top: '.$margin_top.'px;

        }
                </style>';
    $outline_skin = !empty( $outline_skin ) ? ('outline-btn-'.$outline_skin) : 'outline-btn-dark';              

} else {
	$style = '<style type="text/css">
        .button-'.$style_id.' {
                background-color:' . $bg_color . ';
                margin-bottom: '.$margin_bottom.'px;
                margin-top: '.$margin_top.'px;

        }
        .button-'.$style_id.':hover {
                background-color:' . hexDarker( $bg_color, 7 ). ';

        }
        .button-'.$style_id.'.three-dimension  {
             box-shadow: 0px 3px 0px 0px '.hexDarker( $bg_color, 20 ).';
        }
        .button-'.$style_id.'.three-dimension:active  {
             box-shadow: 0px 1px 0px 0px '.hexDarker( $bg_color, 20 ).';
        }
                </style>';
    $text_color = !empty( $text_color ) ? ($text_color.'-color ') : 'light-color ';            
}



if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$icon = !empty( $icon ) ? ( '<i class="mk-'.$icon.'"></i>' ) : '';
$id = !empty( $id ) ? ( 'id="'.$id.'"' ) : '';
$target = !empty( $target ) ? ( 'target="'.$target.'"' ) : '';

$button = '<a href="'.$url.'" '.$target.' '.$id.' class="mk-button '.$outline_skin.' button-'.$style_id.' '.$animation_css.$text_color.' mk-shortcode '.$dimension.'-dimension '.$size.' '.$el_class.'">'.$icon.do_shortcode( strip_tags( $content ) ).'</a>';
$output = ( !empty( $align ) ? '<div class="mk-button-align '.$align.'">' : '' ) . $button . ( !empty( $align ) ? '</div>' : '' );
echo $output . "\n\n" . $style;
