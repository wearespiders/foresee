<?php

extract( shortcode_atts( array(
			"images" => '',
			"effect" => 'fade',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"smooth_height" => "true",
			"direction_nav" => "true",
			'bg_color' => '',
			'attachment' => 'scroll',
			'bg_position' => 'left top',
			'border_color' => '#eaeaea',
			'bg_image' => '',
			'enable_3d' => 'false',
			'speed_factor' => '',
			"el_class" => '',
		), $atts ) );


wp_enqueue_scripts( 'jquery-flexslider' );
if ( $images == '' ) return null;
$id = mt_rand( 99, 9999 );

$script_out = '';
if ( $enable_3d == 'true' ) {
	$script_out .= '
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        if(!is_touch_device()) {
                         jQuery("#flexslider_'.$id.'").parallax("50%", '.$speed_factor.');
                        }
                    });
                 </script>';
}


$script_out .= '<script type="text/javascript">

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
                    controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
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
	$image_src  = wp_get_attachment_image_src( $attach_id, 'full' );


	$output .= '<li>';
	$output .= '<img alt="" src="' . $image_src[0] .'" />';
	$output .= '</li>'. "\n\n";

}

$backgroud_image = !empty( $bg_image ) ? 'background-image:url('.$bg_image.'); ' : '';
echo '<div class="mk-fullwidth-slideshow mk-shortcode mk-flexslider '.$el_class.'" id="flexslider_'.$id.'" style="'. $backgroud_image.'background-color:'.$bg_color.'; background-position:'.$bg_position.';background-attachment:'.$attachment.';border:1px solid '.$border_color.';border-left:none;border-right:none;">
            <ul class="mk-flex-slides">' . $output . '</ul>
            </div><div class="clearboth"></div>' . $script_out;
