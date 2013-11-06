<?php

$type = $annotation = '';

$url = rawurlencode( get_permalink() );
if ( has_post_thumbnail() ) {
	$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
	$media = ( is_array( $img_url ) ) ? '&amp;media='.rawurlencode( $img_url[0] ) : '';
} else {
	$media = '';
}
$description = ( get_the_excerpt() != '' ) ? '&amp;description='.rawurlencode( strip_tags( get_the_excerpt() ) ) : '';

$output =  '<div class="wpb_pinterest wpb_pinterest_type_'.$type.'">';
$output .= '<a href="http://pinterest.com/pin/create/button/?url='.$url.$media.$description.'" size="horizontal" class="pin-it-button" data-pin-do="buttonPin" data-pin-config="above"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';
$output .= '</div>'.$this->endBlockComment( 'wpb_pinterest' )."\n";

echo $output;
