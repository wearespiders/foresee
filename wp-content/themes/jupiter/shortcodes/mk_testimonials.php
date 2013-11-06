<?php

extract( shortcode_atts( array(
			'title' => '',
			'style' => 'boxed',
			'count'=> 10,
			'orderby'=> 'date',
			'testimonials' => '',
			'order'=> 'DESC',
			'skin' => 'dark',
			"el_class"=> '',
			'animation' => '',
		), $atts ) );


wp_print_scripts( 'jquery-flexslider' );

$id = mt_rand( 99, 9999 );
$animation_css = $skin_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if ( $style == 'simple' ) {
	$skin_css = $skin.'-version ';
}

if ( $style == 'boxed' ) {
	$directionNavArrowsLeft = 'mk-icon-chevron-left';
	$directionNavArrowsRight = 'mk-icon-chevron-right';
} else {
	if ( $skin == 'dark' ) {
		$directionNavArrowsLeft = 'mk-icon-chevron-left';
		$directionNavArrowsRight = 'mk-icon-chevron-right';
	} else {
		$directionNavArrowsLeft = 'mk-moon-arrow-left-14';
		$directionNavArrowsRight = 'mk-moon-arrow-right-15';
	}
}

if($style == 'modern') {
	$controlNav = 'true';
	$directionNav = 'false';
} else {
	$controlNav = 'false';
	$directionNav = 'true';
}

$script_out = '<script type="text/javascript">

        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#testimonial_'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "fade",
                    smoothHeight: false,
                    slideshowSpeed: 5000,
                    animationSpeed: 500,
                    directionNavArrowsLeft : \'<i class="'.$directionNavArrowsLeft.'"></i>\',
    				directionNavArrowsRight : \'<i class="'.$directionNavArrowsRight.'"></i>\',
                    pauseOnHover: true,
                    controlNav: '.$controlNav.',
                    directionNav:'.$directionNav.',
                    prevText: "",
                    nextText: ""
                });
            });
        });
        </script>';

$query = array(
	'post_type' => 'testimonial',
	'showposts' => $count,
);

if ( $testimonials ) {
	$query['post__in'] = explode( ',', $testimonials );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$loop = new WP_Query( $query );


$output = '';
$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
while ( $loop->have_posts() ):
	$loop->the_post();
$url = get_post_meta( get_the_ID(), '_url', true );
$company = get_post_meta( get_the_ID(), '_company', true );
if ( $style == 'boxed' || $style == 'modern' ) {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$image_src  = theme_image_resize( $image_src_array[ 0 ], 120, 120 );
}
if ( $style != 'modern' ) {

	$output .= '<li>';
	$output .= '<div class="mk-testimonial-content">';
	$output .= '<p class="mk-testimonial-quote">'. get_post_meta( get_the_ID(), '_desc', true ).'</p>';
	$output .= '</div>';
	if ( $style == 'boxed' && !empty( $image_src['url'] ) ) {
		$output .= '<div class="mk-testimonial-image '.$animation_css.'"><img width="50" height="50" src="'.$image_src['url'].'" alt="'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'" /></div>';
	}
	$output .= '<span class="mk-testimonial-author">'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'</span>';
	$output .= !empty( $company ) ? ( '<a '.( !empty( $url ) ? ( 'href="'.$url.'"' ) : '' ).' class="mk-testimonial-company">'. strip_tags( $company ).'</a>' ) : '';
	$output .= '</li>'. "\n\n";

} else {

	$output .= '<li>';
	$output .= '<div class="mk-testimonial-content">';
	$output .= '<p class="mk-testimonial-quote">'. get_post_meta( get_the_ID(), '_desc', true ).'</p>';
	if (!empty( $image_src['url'] ) ) {
		$output .= '<div class="mk-testimonial-image '.$animation_css.'"><img width="50" height="50" src="'.$image_src['url'].'" alt="'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'" /></div>';
	}
	$output .= '<span class="mk-testimonial-author">'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'</span>';
	$output .= !empty( $company ) ? ( '<a '.( !empty( $url ) ? ( 'href="'.$url.'"' ) : '' ).' class="mk-testimonial-company">'. strip_tags( $company ).'</a>' ) : '';
	$output .= '<div class="clearboth"></div></div>';
	$output .= '</li>'. "\n\n";
}

endwhile;

wp_reset_query();



$final_output = $heading_title;
$final_output .= '<div class="mk-testimonial '.$style.'-style mk-flexslider '.$skin_css.$el_class.'" id="testimonial_'.$id.'">';
if ( $style == 'simple' ) {
	$output .= '<i class="mk-moon-quotes-left"></i>';
	$output .= '<i class="mk-moon-quotes-right"></i>';
}
$final_output .= '<ul class="mk-flex-slides">' . $output . '</ul></div>' . "\n\n\n\n" . $script_out;

echo $final_output;
