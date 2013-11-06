<?php

$type = $annotation = '';
extract( shortcode_atts( array(
			'type' => '',
			'annotation' => ''
		), $atts ) );
wp_enqueue_script( 'jquery-googleplus', 'https://apis.google.com/js/plusone.js', array( 'jquery' ), false );
$params = '';
$params .= ( $type != '' ) ? ' size="'.$type.'" ' : '';
$params .= ( $annotation != '' ) ? ' annotation="'.$annotation.'"' : '';

if ( $type == '' ) $type = 'standard';
$output = '<div class="wpb_googleplus wpb_googleplus_type_'.$type.'"><g:plusone href="<?php echo get_permalink(); ?>" '.$params.'></g:plusone></div>';
echo $output;
