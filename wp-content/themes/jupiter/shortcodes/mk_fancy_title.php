<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'style' => 'true',
			'color' => '#3d3d3d',
			"size" => '30',
			'font_weight' => 'normal',
			'margin_bottom' => '20',
			'margin_top' => '0',
			"align" => 'left',
			'animation' => '',
			"font_family" => '',
			'tag_name' => 'h2',
			"font_type" => '',
		), $atts ) );
$id = mt_rand( 99, 999 );
$output = '';
$divider_css = $animation_css = $span_padding = '';
$style = ( $style == 'true' ) ? 'pattern' : 'simple';
$output .= mk_get_fontfamily( "#fancy-title-", $id, $font_family, $font_type );
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
if ( $style == 'true' ) {
	if ( $align == 'left' ) {$span_padding = 'padding-right:8px;';}
	else if ( $align == 'center' ) {$span_padding = 'padding:0 8px;';}
	else if ( $align == 'right' ) {$span_padding = 'padding-left:8px;';}
}
$output .= '<'.$tag_name.' style="font-size: '.$size.'px;text-align:'.$align.';color: '.$color.';font-weight:'.$font_weight.';margin-top:'.$margin_top.'px;margin-bottom:'.$margin_bottom.'px; '.$divider_css.'" id="fancy-title-'.$id.'" class="mk-shortcode mk-fancy-title '.$animation_css.$style.'-style '.$el_class.'"><span style="'.$span_padding.'">' . wpb_js_remove_wpautop( $content ). '</span></'.$tag_name.'><div class="clearboth"></div>';

echo $output;
