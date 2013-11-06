<?php

extract( shortcode_atts( array(
			'title' => '',
			'count'=> 10,
			'orderby'=> 'date',
			'slides' => '',
			'order'=> 'DESC',
			"image_width" => 770,
			"image_height" => 350,
			"effect" => 'fade',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"smooth_height" => "true",
			"direction_nav" => "true",
			"caption_bg_color" => "",
			"caption_color" => "#fff",
			"caption_bg_opacity" => 0.8,
			"el_class" => '',
		), $atts ) );


wp_enqueue_scripts( 'jquery-flexslider' );

$id = mt_rand( 99, 9999 );

$caption_bg_color = !empty( $caption_bg_color ) ? $caption_bg_color : theme_option( THEME_OPTIONS, 'skin_color' );

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
                    controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
                    directionNav:'.$direction_nav.',
                    prevText: "",           //String: Set the text for the "previous" directionNav item
                    nextText: ""               //String: Set the text for the "next" directionNav item
                });
            });
        });
        </script>
';

$query = array(
	'post_type' => 'slideshow',
	'showposts' => $count,
);

if ( $slides ) {
	$query['post__in'] = explode( ',', $slides );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}
$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$loop = new WP_Query( $query );

$output = '';
while ( $loop->have_posts() ):
	$loop->the_post();
$url = get_post_meta( get_the_ID(), '_link_to', true );
$caption = get_post_meta( get_the_ID(), '_title', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
$image_src  = theme_image_resize( $image_src_array[0], $image_width, $image_height );


$output .= '<li>';
$output .= !empty( $url ) ? '<a href="'.$url.'">' : '' ;
$output .= '<img alt="'.$caption.'" src="' . $image_src['url'] .'" />';
$output .= !empty( $url ) ? '</a>' : '' ;
$output .= !empty( $caption ) ?  '<div class="mk-flex-caption">
                    <div style="background-color:'.$caption_bg_color.'; -webkit-opacity: '.$caption_bg_opacity.';-moz-opacity: '.$caption_bg_opacity.';-o-opacity: '.$caption_bg_opacity.';filter: alpha(opacity='.( $caption_bg_opacity * 100 ).');opacity: '.$caption_bg_opacity.';" class="color-mask"></div>
                    <span style="color:'.$caption_color.'">'.$caption.'</span>
                    </div>' : '';

$output .= '</li>'. "\n\n";
endwhile;
wp_reset_query();
echo $heading_title.'<div style="max-width:' . $image_width . 'px;" class="mk-slideshow-shortcode mk-flexslider '.$el_class.'" id="flexslider_'.$id.'"><ul class="mk-flex-slides">' . $output . '</ul></div>' . "\n\n\n\n" . $script_out;



