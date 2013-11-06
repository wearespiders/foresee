<?php

extract( shortcode_atts( array(
			'title' => '',
			'per_page' => -1,
			'featured' => 'false',
			'order'=> 'DESC',
			'orderby'=> 'date',
		), $atts ) );
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	wp_enqueue_scripts( 'jquery-flexslider' );
	$output = '';
	$id = mt_rand( 99, 999 );

	$output .= '<div class="mk-shortcode mk-woocommerce-carousel">';
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>'.$title.'</span>';
	$output .= '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" class="mk-woo-view-all">'.__( 'VIEW ALL', 'mk_framework' ).'</a></h3>';
	$output .= '<div id="mk-woocommerce-carousel-'.$id.'" class="mk-flexslider">';
	if ( $featured == 'false' ) {
		$output .= do_shortcode( '[recent_products per_page="'.$per_page.'" orderby="'.$orderby.'" order="'.$order.'"]' );
	} else {
		$output .= do_shortcode( '[featured_products per_page="'.$per_page.'" orderby="'.$orderby.'" order="'.$order.'"]' );
	}



	$output .= '</div><div class="clearboth"></div></div>';


	$output .= '<script type="text/javascript">
        jQuery(document).ready(function() {
                jQuery("#mk-woocommerce-carousel-'.$id.'").flexslider({
                    selector: ".mk-products > li",
                    slideshow: true,
                    animation: "slide",              //String: Select your animation type, "fade" or "slide"
                    smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
                    slideshowSpeed: 6000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
                    animationSpeed: 400,            //Integer: Set the speed of animations, in milliseconds
                    pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
                    controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
                    directionNav:true,
                    prevText: "",           //String: Set the text for the "previous" directionNav item
                    nextText: "",               //String: Set the text for the "next" directionNav item
                    itemWidth: 260,
                    itemMargin: 0,
                    maxItems: 4,
                    minItems: 1,
                    move: 1
                });
        });
        </script>';
	echo $output;

}
	
