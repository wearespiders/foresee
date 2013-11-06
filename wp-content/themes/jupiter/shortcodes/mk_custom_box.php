<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'border_color' => '',
			'bg_color' => '',
			'bg_image' => '',
			'bg_position' => 'center center',
			'bg_repeat' => 'repeat',
			'bg_stretch' => '',
			'predefined_bg' => '',
			'padding_horizental' => '20',
			'padding_vertical' => '20',
			'min_height' => '',
			'margin_bottom' => '10',
			'animation' => '',
		), $atts ) );

$output = $bg_stretch_class = $animation_css ='';
$id = mt_rand( 99, 999 );

if ( $bg_stretch == 'true' ) {
	$bg_stretch_class = 'mk-background-stretch';
}
if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

if ( !empty( $bg_image ) ) {
	$backgroud_image = !empty( $bg_image ) ? 'background-image:url('.$bg_image.'); ' : '';
} else {
	$backgroud_image = !empty( $predefined_bg ) ? 'background-image:url('.THEME_IMAGES.'/pattern/'.$predefined_bg.'.png);' : '';
}
$border = !empty( $border_color ) ? ( 'border:1px solid '.$border_color.';' ) : '';

$output .= '<div id="mk-custom-box-'.$id.'" class="mk-custom-boxed mk-blur-parent mk-shortcode '.$bg_stretch_class.' '.$animation_css.$el_class.'" style="margin-bottom:'.$margin_bottom.'px">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '<div class="clearboth"></div></div>';
$output .= '<style type="text/css">
                   #mk-custom-box-'.$id.' {
                        min-height:'.$min_height.'px;
                        padding:'.$padding_vertical.'px '.$padding_horizental.'px;
                        '. $backgroud_image.'
                        background-attachment:scroll;
                        background-repeat:'.$bg_repeat.';
                        background-color:'.$bg_color.';
                        background-position:'.$bg_position.';
                        margin-bottom:'.$margin_bottom.'px;
                        '.$border.'

                  }
                 #mk-custom-box-'.$id.' .mk-fancy-title.pattern-style span{
                        background-color: '.$bg_color.' !important;
                    }
                 </style>';


echo $output;
