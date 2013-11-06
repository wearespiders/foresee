<?php

extract( shortcode_atts( array(
			'title' => '',
			"images" => '',
			"image_width" => 770,
			"image_height" => 350,
			"effect" => 'fade',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"smooth_height" => "true",
			"direction_nav" => "true",
			"el_class" => '',
		), $atts ) );


wp_enqueue_scripts( 'jquery-flexslider' );
if ( $images == '' ) return null;
$id = mt_rand( 99, 9999 );

$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$script_out = '<script type="text/javascript">

        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#flexslider_'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "'.$effect.'",              //String: Select your animation type, "fade" or "slide"
                    smoothHeight: '.$smooth_height.',            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
                    slideshowSpeed: '.$slideshow_speed.',           //Integer: Set the speed of the slideshow cycling, in milliseconds
                    animationSpeed: '.$animation_speed.',            //Integer: Set the speed of animations, in milliseconds
                    pauseOnHover: '.$pause_on_hover.',            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
                    controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
                    directionNav:'.$direction_nav.',
                    prevText: "",           //String: Set the text for the "previous" directionNav item
                    nextText: ""               //String: Set the text for the "next" directionNav item
                });
            });
        });
        </script>';



$output = '';
$images = explode( ',', $images );
$i = -1;

foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height );


	$output .= '<li>';
	$output .= '<img alt="" src="' . $image_src['url'] .'" />';
	$output .= '</li>'. "\n\n";

}

echo $heading_title.'<div style="max-width:' . $image_width . 'px;" class="mk-slideshow-shortcode mk-flexslider '.$el_class.'" id="flexslider_'.$id.'"><ul class="mk-flex-slides">' . $output . '</ul></div>' . "\n\n\n\n" . $script_out;
