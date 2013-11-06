<?php

extract( shortcode_atts( array(
			'heading_title' => '',
			'image_width' => 770,
			'image_height' => 350,
			'lightbox' => 'true',
			'crop' => 'true',
			'custom_lightbox' => '',
			'margin_bottom' => 10,
			'group' => '',
			'frame_style' => 'simple',
			'src' => '',
			'link' => '',
			'target' => '',
			'animation' => '',
			'title'=> '',
			'desc'=> '',
			'align' => 'left',
			'caption_location' => '',
			'el_class' => '',
		), $atts ) );




$animation_css =  $lightbox_enabled = '';

if ( $lightbox == 'true' ) {
	$lightbox_enabled = 'lightbox-enabled';
	$custom_lightbox = !empty( $custom_lightbox ) ? ( $src = $custom_lightbox ) : '';
}
if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

$output .= '<div class="mk-image-shortcode mk-shortcode align-'.$align.' '.$animation_css.$frame_style.'-frame '.$caption_location.' '.$el_class.'" style="max-width: '.$image_width.'px; margin-bottom:'.$margin_bottom.'px">';
if ( !empty( $heading_title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}
$output .= '<div class="mk-image-inner '.$lightbox_enabled.'">';
if ( $crop == 'true' ) {
	$image_src  = theme_image_resize( $src, $image_width, $image_height );
	$output .= '<img class="lightbox-'.$lightbox.' mk-blur" alt="'.$title.'" title="'.$title.'" src="'.$image_src['url'].'" />';
} else {
	$output .= '<img class="lightbox-'.$lightbox.' mk-blur" alt="'.$title.'" title="'.$title.'" src="'.$src.'" />';
}

if ( $lightbox == 'true' ) {
	$output .= '<div class="mk-image-overlay"></div>';
	$output .= '<a href="'.$src.'" rel="prettyPhoto['.$group.']" alt="'.$title.'" title="'.$title.'" class="mk-lightbox mk-image-shortcode-lightbox"><i class="mk-icon-zoom-in"></i></a>';
}
if ( $link ) {
	$output .= '<a href="'.$link.'" target="'.$target.'" class="mk-image-shortcode-link">&nbsp;</a>';
}
$output .= '</div>';
if ( ( !empty( $title ) || !empty( $desc ) ) ) {
	$output .= '<div class="mk-image-caption">
                            <span class="mk-caption-title">'.$title.'</span>
                            <span class="mk-caption-desc">'.$desc.'</span>
                </div>';
}
$output .= '<div class="clearboth"></div></div>';

echo $output;
