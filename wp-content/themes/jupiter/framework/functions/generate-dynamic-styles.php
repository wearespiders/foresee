<?php error_reporting( NULL );
$option = theme_option( THEME_OPTIONS );
if(isset($_GET['skin'])) {
	$skin_color = '#'.$_GET['skin'];
} else {
	$skin_color = $option['skin_color'];
}


function my_strstr( $haystack, $needle, $before_needle = false ) {
	if ( !$before_needle ) return strstr( $haystack, $needle );
	else return substr( $haystack, 0, strpos( $haystack, $needle ) );
}

/* fontface */
if ( $option['special_fonts_type_1'] == 'fontface' ) {
	$fontface_1 = $option['special_fonts_list_1'];

	$stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
	if ( file_exists( $stylesheet ) ) {
		$file_content = file_get_contents( $stylesheet );
		if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$fontface_1\\1.*?}/is", $file_content, $match ) ) {
			$fontface_style_1 = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0../fontface/", $match[0] )."\n";
		}

		if ( is_array( $option['special_elements_1'] ) ) {
			$special_elements_1 = implode( ', ', $option['special_elements_1'] );
		} else {
			$special_elements_1 = $option['special_elements_1'];
		}

		if ( $special_elements_1 && $fontface_1 ) {
			$fontface_css_1 = $special_elements_1 . '{ font-family: "' . $fontface_1.'"}';
		}

	}
}

if ( $option['special_fonts_type_2'] == 'fontface' ) {
	$fontface_2 = $option['special_fonts_list_2'];

	$stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
	if ( file_exists( $stylesheet ) ) {
		$file_content = file_get_contents( $stylesheet );
		if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$fontface_2\\1.*?}/is", $file_content, $match ) ) {
			$fontface_style_2 = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0../fontface/", $match[0] )."\n";
		}

		if ( is_array( $option['special_elements_2'] ) ) {
			$special_elements_2 = implode( ', ', $option['special_elements_2'] );
		} else {
			$special_elements_2 = $option['special_elements_2'];
		}

		if ( $special_elements_2 && $fontface_2 ) {
			$fontface_css_2 = $special_elements_2 . '{ font-family: "' . $fontface_2.'"}';
		}
	}
}




/**
 * Safe Fonts
 * */
if ( $option['special_fonts_type_1'] == 'safe_font' ) {
	$safefont_1 = $option['special_fonts_list_1'];

	if ( is_array( $option['special_elements_1'] ) ) {
		$special_elements_1 = implode( ', ', $option['special_elements_1'] );
	} else {
		$special_elements_1 = $option['special_elements_1'];
	}

	if ( $special_elements_1 && $safefont_1 ) {
		$safefont_css_1 = $special_elements_1 . '{ font-family: ' . $safefont_1.'}';
	}

}


if ( $option['special_fonts_type_2'] == 'safe_font' ) {
	$safefont_2 = $option['special_fonts_list_2'];


	if ( is_array( $option['special_elements_2'] ) ) {
		$special_elements_2 = implode( ', ', $option['special_elements_2'] );
	} else {
		$special_elements_2 = $option['special_elements_2'];
	}

	if ( $special_elements_2 && $safefont_2 ) {
		$safefont_css_2 = $special_elements_2 . '{ font-family: ' . $safefont_2.'}';
	}

}







/**
 * Google Fonts
 * */
if ( is_array( $option['special_elements_1'] ) ) {
	$special_elements_1 = implode( ', ', $option['special_elements_1'] );
} else {
	$special_elements_1 = $option['special_elements_1'];
}

if ( is_array( $option['special_elements_2'] ) ) {
	$special_elements_2 = implode( ', ', $option['special_elements_2'] );
} else {
	$special_elements_2 = $option['special_elements_2'];
}

if ( $special_elements_1 && $option['special_fonts_type_1'] == 'google' ) {

	$google_font_1 = $special_elements_1  . ' {font-family: ';

	$format_name1 = strpos( $option['special_fonts_list_1'], ':' );
	if ( $format_name1 !== false ) {
		$google_font_1 .=  my_strstr( str_replace( '+', ' ', $option['special_fonts_list_1'] ), ':', true );
	} else { $google_font_1 .= str_replace( '+', ' ', $option['special_fonts_list_1'] );


	}

	$google_font_1 .=' }';

}

if ( $special_elements_2 && $option['special_fonts_type_2'] == 'google' ) {
	$google_font_2 = $special_elements_2  . ' {font-family: ';

	$format_name2 = strpos( $option['special_fonts_list_2'], ':' );
	if ( $format_name2 !== false ) {
		$google_font_2 .=  my_strstr( str_replace( '+', ' ', $option['special_fonts_list_2'] ), ':', true );
	} else { $google_font_2 .= str_replace( '+', ' ', $option['special_fonts_list_2'] );


	}

	$google_font_2 .=' }';

}

$safe_font = $option['font_family'] ? 'font-family: ' . stripslashes( $option['font_family'] ) . ';' : '';




/**
 * Body background
 */

$body_bg  = $option['body_color'] ? 'background-color:'.$option['body_color'].';' : '';
$body_bg .= $option['body_image'] ? 'background-image:url(' . $option['body_image'] . ');' : ' ';
$body_bg .= $option['body_repeat'] ? 'background-repeat:'.$option['body_repeat'].';' : '';
$body_bg .= $option['body_position'] ? 'background-position:'.$option['body_position'].';' : '';
$body_bg .= $option['body_attachment'] ? 'background-attachment:'.$option['body_attachment'].';' : '';



/**
 * Header background
 */
$header_bg  = $option['header_color'] ? 'background-color:'.$option['header_color'].';' : '';
$header_bg .= $option['header_image'] ? 'background-image:url(' . $option['header_image'] . ');' : ' ';
$header_bg .= $option['header_repeat'] ? 'background-repeat:'.$option['header_repeat'].';' : '';
$header_bg .= $option['header_position'] ? 'background-position:'.$option['header_position'].';' : '';
$header_bg .= $option['header_attachment'] ? 'background-attachment:'.$option['header_attachment'].';' : '';



/**
 * Header Banner background
 */

$banner_bg  = $option['banner_color'] ? 'background-color:'.$option['banner_color'].';' : '';
$banner_bg .= $option['banner_image'] ? 'background-image:url(' . $option['banner_image'] . ');' : ' ';
$banner_bg .= $option['banner_repeat'] ? 'background-repeat:'.$option['banner_repeat'].';' : '';
$banner_bg .= $option['banner_position'] ? 'background-position:'.$option['banner_position'].';' : '';
$banner_bg .= $option['banner_attachment'] ? 'background-attachment:'.$option['banner_attachment'].';' : '';



/**
 * Page background
 */

$page_bg  = $option['page_color'] ? 'background-color:'.$option['page_color'].';' : '';
$page_bg .= $option['page_image'] ? 'background-image:url(' . $option['page_image'] . ');' : ' ';
$page_bg .= $option['page_repeat'] ? 'background-repeat:'.$option['page_repeat'].';' : '';
$page_bg .= $option['page_position'] ? 'background-position:'.$option['page_position'].';' : '';
$page_bg .= $option['page_attachment'] ? 'background-attachment:'.$option['page_attachment'].';' : '';


/**
 * Footer background
 */

$footer_bg  = $option['footer_color'] ? 'background-color:'.$option['footer_color'].';' : '';
$footer_bg .= $option['footer_image'] ? 'background-image:url(' . $option['footer_image'] . ');' : ' ';
$footer_bg .= $option['footer_repeat'] ? 'background-repeat:'.$option['footer_repeat'].';' : '';
$footer_bg .= $option['footer_position'] ? 'background-position:'.$option['footer_position'].';' : '';
$footer_bg .= $option['footer_attachment'] ? 'background-attachment:'.$option['footer_attachment'].';' : '';




/**
 * Under Construction Section background
 */

$uc_bg .= $option['uc_bg_color'] ? 'background-color:'.$option['uc_bg_color'].';' : '';
if($option['uc_bg_image_source'] == 'preset') {
$uc_bg .=  $option['uc_bg_preset_image'] ? 'background-image:url(' . $option['uc_bg_preset_image'] . ');' : ' ';
} else if($option['uc_bg_image_source'] == 'custom') {
$uc_bg .=  $option['uc_bg_custom_image'] ? 'background-image:url(' . $option['uc_bg_custom_image'] . ');' : ' ';	
}


$uc_bg .= $option['uc_bg_repeat'] ? 'background-repeat:'.$option['uc_bg_repeat'].';' : '';
$uc_bg .= $option['uc_bg_position'] ? 'background-position:'.$option['uc_bg_position'].';' : '';
$uc_bg .= $option['uc_bg_attachment'] ? 'background-attachment:'.$option['uc_bg_attachment'].';' : '';


$skin_darker = hexDarker($skin_color,20);
$main_nav_top_bg_hover_color = mk_color($option['main_nav_top_bg_hover_color'], $option['main_nav_top_bg_hover_color_rgba']);



if($option['main_nav_bg_color'] == '') {
	$classic_nav_bg = $header_bg;
} else {
	$classic_nav_bg = 'background-color:' . $option['main_nav_bg_color'] . ';';
}

$sidebar_width = 100 - $option['content_width'];
$boxed_layout_width = $option['grid_width'] + 60;


