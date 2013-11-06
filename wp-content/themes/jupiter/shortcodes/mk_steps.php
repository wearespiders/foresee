<?php

extract( shortcode_atts( array(
			'title' => '',
			'step' => 4,
			'hover_color' => theme_option( THEME_OPTIONS, 'skin_color' ),
			'icon_1' => '',
			'title_1' => '',
			'desc_1' => '',
			'url_1' => '',

			'icon_2' => '',
			'title_2' => '',
			'desc_2' => '',
			'url_2' => '',

			'icon_3' => '',
			'title_3' => '',
			'desc_3' => '',
			'url_3' => '',

			'icon_4' => '',
			'title_4' => '',
			'desc_4' => '',
			'url_4' => '',

			'icon_5' => '',
			'title_5' => '',
			'desc_5' => '',
			'url_5' => '',

			'el_class' => '',
			'animation' => '',
		), $atts ) );

$animation_css = $output = '';

$id = mt_rand( 99, 999 );

if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$output .= '<div id="mk-process-'.$id.'" class="mk-process-steps mk-shortcode process-steps-'.$step.' '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading" style="text-align:left;"><span>'.$title.'</span></h3>';
}
$output .= '<ul>' . "\n";
for ( $i=1; $i <= $step; $i++ ) {
	$output .= '<li><span class="mk-process-icon'.$animation_css.'"><i class="mk-'.${'icon_'.$i}.'"></i></span>';
	$output .= '<div class="mk-process-detail">';
	$output .= !empty( ${'url_'.$i} ) ? ( '<h3><a href="'.${'url_'.$i}.'">'.${'title_'.$i}.'</a></h3>' ) : ( '<h3>'.${'title_'.$i}.'</h3>' );
	$output .= '<p>'.${'desc_'.$i}.'</p>';
	$output .= '</div>';
	$output .= '</li>' . "\n";
}

$output .= '<div class="clearboth"></div></ul></div>' . "\n";
$output .= '<style type="text/css">
                    #mk-process-'.$id.' ul li:hover .mk-process-icon {background-color:'.$hover_color.';}
                  </style>';

echo $output;
