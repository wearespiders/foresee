<?php

$el_class ='';

extract( shortcode_atts( array(
			'el_class' => '',
			'size' => 'medium',
			'style' => '',
			'align' => 'none',
			'margin' => '',
			'icon_color' => '#ccc',
			'facebook' => "",
			'twitter' => "",
			'rss' => "",
			'dribbble' => "",
			'digg' => "",
			'pinterest' => "",
			'flickr' => "",
			'google_plus' => "",
			'linkedin' => "",
			'blogger' => "",
			'youtube' => "",
			'last_fm' => "",
			'live_journal' => "",
			'stumble_upon' => "",
			'tumblr' => "",
			'vimeo' => "",
			'wordpress' => "",
			'yelp' => "",
			'reddit' => "",
		), $atts ) );
$id = mt_rand( 99, 999 );
switch ( $style ) {
case 'rounded' :
	$icon_style = 'socialico-square-';
	break;
case 'simple' :
	$icon_style = 'mk-social-';
	break;
case 'circle' :
	$icon_style = 'mk-socialci-';
	break;
default :
	$icon_style = 'mk-socialci-';
}

$output = '';

$output .= '<div class=" '.$el_class.'">';
$output .= '<div id="social-networks-'.$id.'" class="mk-social-network-shortcode mk-shortcode social-align-'.$align.' '.$size.' '.$el_class.'">';
$output .= '<ul>';
$output .= !empty( $facebook )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="facebook-hover" href="'.$facebook.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'facebook"></i></a></li>' : '';
$output .= !empty( $twitter )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="twitter-hover" href="'.$twitter.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'twitter"></i></a></li>' : '';
$output .= !empty( $rss )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="rss-hover" href="'.$rss.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'rss"></i></a></li>' : '';
$output .= !empty( $dribbble )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="dribbble-hover" href="'.$dribbble.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'dribbble"></i></a></li>' : '';
$output .= !empty( $digg )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="digg-hover" href="'.$digg.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'digg"></i></a></li>' : '';
$output .= !empty( $pinterest )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="pinterest-hover" href="'.$pinterest.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'pinterest"></i></a></li>' : '';
$output .= !empty( $flickr )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="flickr-hover" href="'.$flickr.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'flickr"></i></a></li>' : '';
$output .= !empty( $google_plus )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="googleplus-hover" href="'.$google_plus.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'googleplus"></i></a></li>' : '';
$output .= !empty( $linkedin )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="linkedin-hover" href="'.$linkedin.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'linkedin"></i></a></li>' : '';
$output .= !empty( $blogger )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="blogger-hover" href="'.$blogger.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'blogger"></i></a></li>' : '';
$output .= !empty( $youtube )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="youtube-hover" href="'.$youtube.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'youtube"></i></a></li>' : '';
$output .= !empty( $last_fm )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="lastfm-hover" href="'.$last_fm.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'lastfm"></i></a></li>' : '';
$output .= !empty( $stumble_upon )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="stumbleupon-hover" href="'.$stumble_upon.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'stumbleupon"></i></a></li>' : '';
$output .= !empty( $tumblr )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="tumblr-hover" href="'.$tumblr.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'tumblr"></i></a></li>' : '';
$output .= !empty( $vimeo )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="vimeo-hover" href="'.$vimeo.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'vimeo"></i></a></li>' : '';
$output .= !empty( $wordpress )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="wordpress-hover" href="'.$wordpress.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'wordpress"></i></a></li>' : '';
$output .= !empty( $yelp )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="yelp-hover" href="'.$yelp.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'yelp"></i></a></li>' : '';
$output .= !empty( $reddit )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="reddit-hover" href="'.$reddit.'"><i style="color:'.$icon_color.'" class="'.$icon_style.'reddit"></i></a></li>' : '';
$output .= '</ul>';
$output .= '</div>';
$output .= '</div>';
echo $output;
