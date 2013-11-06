<?php

extract( shortcode_atts( array(
			"title" => '',
			"images" => '',
			"size" => 'full',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"el_class" => '',
			'animation' => '',
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
                }).find(".mk-laptop-image").fadeIn();;
            });
        });
        </script>';

$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$output = '';
$images = explode( ',', $images );
$i = -1;

switch ( $size ) {
case 'full' :
	$image_width = 682;
	$image_height = 467;
	$container_width = 988;
	$container_height = 523;
	$laptop_image = 'full';
	break;

case 'one-half' :
	$image_width = 487;
	$image_height = 327;
	$container_width = 701;
	$container_height = 372;
	$laptop_image = 'one-half';
	break;

case 'one-third' :
	$image_width = 280;
	$image_height = 170;
	$container_width = 330;
	$container_height = 200;
	$laptop_image = 'one-half';
	break;

case 'one-fourth' :
	$image_width = 185;
	$image_height = 123;
	$container_width = 267;
	$container_height = 142;
	$laptop_image = 'one-fourth';
}

foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], $image_width, $image_height );

	$output .= '<li>';
	$output .= '<img alt="" src="' . $image_src['url'] .'" />';
	$output .= '</li>'. "\n\n";

}

echo $heading_title.'<div style="max-height:'.$container_height.'px;max-width:'.$container_width.'px;" class="mk-laptop-slideshow-shortcode '.$animation_css.$size.'-laptop mk-flexslider '.$el_class.'" id="flexslider_'.$id.'"><img style="display:none" class="mk-laptop-image" src="'.THEME_IMAGES.'/laptop-'.$laptop_image.'.png" alt="" /><ul class="mk-flex-slides" style="max-width:'.$image_width.'px;max-height:'.$image_height.'px;">' . $output . '</ul></div>' . "\n\n\n\n" . $script_out;



