<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'color' => '',
			'highlight_color' => '#000',
			'highlight_opacity' => 0.3,
			"size" => '18',
			'font_weight' => 'normal',
			'margin_bottom' => '20',
			'margin_top' => '0',
			'line_height' => '34',
			"align" => 'left',
			'animation' => '',
			"font_family" => '',
			"font_type" => '',
		), $atts ) );
$id = mt_rand( 99, 999 );
$output = '';
$animation_css ='';
$output .= mk_get_fontfamily( "#fancy-title-", $id, $font_family, $font_type );
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$output .= '<h3 style="font-size: '.$size.'px;text-align:'.$align.';color: '.$color.';font-weight:'.$font_weight.';margin-top:'.$margin_top.'px;margin-bottom:'.$margin_bottom.'px;" id="fancy-title-'.$id.'" class="mk-shortcode mk-title-box '.$animation_css.' '.$el_class.'"><span style="background-color:'.mk_color( $highlight_color, $highlight_opacity ).'; box-shadow: 8px 0 0 '.mk_color( $highlight_color, $highlight_opacity ).', -8px 0 0 '.mk_color( $highlight_color, $highlight_opacity ).';line-height:'.$line_height.'px">' . wpb_js_remove_wpautop( $content ). '</span></h3><div class="clearboth"></div>';

echo $output;
