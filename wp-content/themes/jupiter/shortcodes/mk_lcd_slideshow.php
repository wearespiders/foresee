<?php

extract( shortcode_atts( array(
			'title' => '',
			"images" => '',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			'animation' => '',
			"el_class" => '',
		), $atts ) );


wp_enqueue_scripts( 'jquery-flexslider' );
if ( $images == '' ) return null;
$id = mt_rand( 99, 9999 );
$animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}


$script_out = '<script type="text/javascript">

        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#flexslider_'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "fade",
                    smoothHeight: false,
                    slideshowSpeed: '.$slideshow_speed.',
                    animationSpeed: '.$animation_speed.',
                    pauseOnHover: '.$pause_on_hover.',
                    controlNav: false,
                    directionNav:true,
                    prevText: "",
                    nextText: ""
                }).find(".mk-lcd-image").fadeIn();

            });
        });
        </script>';
$final_output = $heading_title = '';

if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$output = '';
$images = explode( ',', $images );
$i = -1;


foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], 872, 506 );

	$output .= '<li>';
	$output .= '<img alt="" src="' . $image_src['url'] .'" />';
	$output .= '</li>'. "\n\n";

}

$final_output .= $heading_title.'<div style="max-width:872px;" class="mk-lcd-slideshow mk-flexslider '.$animation_css.$el_class.'" id="flexslider_'.$id.'"><img style="display:none" class="mk-lcd-image" src="'.THEME_IMAGES.'/lcd-slideshow.png" alt="" /><ul class="mk-flex-slides" style="max-width:838px;max-height:506px;">' . $output . '</ul></div>' . "\n\n\n\n" . $script_out;
echo $final_output;
