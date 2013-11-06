<?php

extract( shortcode_atts( array(
			'title' => '',
			'count'=> 10,
			'bg_color' => '',
			'border_color' => '',
			'orderby'=> 'date',
			'target' => '_self',
			'clients' => '',
			'height' => '',
			'order'=> 'DESC',
			'autoplay' => 'true',
			'el_class' => '',
		), $atts ) );


wp_enqueue_script( 'jquery-flexslider' );
$query = array(
	'post_type' => 'clients',
	'showposts' => $count,
);

if ( $clients ) {
	$query['post__in'] = explode( ',', $clients );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$loop = new WP_Query( $query );

$bg_color = !empty( $bg_color ) ? ( ' background-color:'.$bg_color.'; ' ) : '';
$border_color = !empty( $border_color ) ? ( ' border-color:'.$border_color.'; ' ) : 'border-color:transparent;';
$height = !empty( $height ) ? ( ' height:'.$height.'px; ' ) : ( ' height:110px; ' );

$id = mt_rand( 99, 999 );
$directionNav = "false";
$output = '';

$output .= '<div id="clients-shortcode-'.$id.'" class="mk-clients-shortcode mk-flexslider mk-shortcode '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
	$directionNav = "true";
}
$output .= '<ul class="mk-flex-slides">';
while ( $loop->have_posts() ):
	$loop->the_post();
$url = get_post_meta( get_the_ID(), '_url', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

$output .= '<li>';
$output .= !empty( $url ) ? '<a target="'.$target.'" href="'.$url.'">' : '';
$output .= '<div title="'.get_the_title().'" class="client-logo" style="background-image:url('.get_image_src( $image_src_array[0] ).'); '.$height.$bg_color.$border_color.'"></div>';
$output .= !empty( $url ) ? '</a>' : '';
$output .= '</li>';

endwhile;
wp_reset_query();

$output .= '</ul></div>';


$output .= '<script type="text/javascript">

        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#clients-shortcode-'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: '.$autoplay.',
                    animation: "slide",              //String: Select your animation type, "fade" or "slide"
                    smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
                    slideshowSpeed: 4000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
                    animationSpeed: 400,            //Integer: Set the speed of animations, in milliseconds
                    pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
                    controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
                    directionNav:'.$directionNav.',
                    prevText: "",           //String: Set the text for the "previous" directionNav item
                    nextText: "",               //String: Set the text for the "next" directionNav item
                    itemWidth: 184,
                    itemMargin: 0,
                    minItems: 1,
                    move: 1,
                    maxItems: 6
                });
            });
        });
        </script>';



echo $output;
