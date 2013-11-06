<?php

function theme_enqueue_scripts() {
	if ( !is_admin() ) {
		$move_bottom = true;
		$mk_option = theme_option( THEME_OPTIONS );

		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_enqueue_script( 'jquery-prettyphoto', THEME_JS .'/jquery.prettyPhoto.js', array( 'jquery' ), false, $move_bottom );
		remove_action ( 'bbp_enqueue_scripts' , 'enqueue_styles' );

		/* Register Scripts */
		wp_register_script( 'jquery-isotope', THEME_JS .'/jquery.isotope.min.js', array( 'jquery' ), false, $move_bottom );
		wp_enqueue_script( 'jquery-flexslider', THEME_JS .'/jquery.flexslider.min.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-cookieBar', THEME_JS .'/jquery.cookieBar.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-photostream', THEME_JS .'/jquery.photostream.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-tools', THEME_JS .'/jquery.tabs.tools.min.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-jplayer', THEME_JS .'/jquery.jplayer.min.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'infinitescroll', THEME_JS .'/jquery.infinitescroll.min.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-icarousel', THEME_JS .'/icarousel.packed.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-mousewheel', THEME_JS .'/jquery.mousewheel.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-easychart', THEME_JS .'/jquery.easychart.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'jquery-raphael', THEME_JS .'/jquery.raphael-min.js', array( 'jquery' ), false, $move_bottom );
		wp_register_script( 'mediaelementplayer-js', THEME_JS .'/mediaelement-and-player.min.js', array( 'jquery' ), false, $move_bottom );
		//wp_register_script( 'ajax-portfolio', THEME_JS .'/ajax-portfolio.js', array( 'jquery' ), false, $move_bottom );


		if ( $mk_option['disable_smoothscroll'] == 'true' ) {
			wp_enqueue_script( 'jquery-nicescroll', THEME_JS. '/jquery.nicescroll.min.js', array( 'jquery' ), false, $move_bottom );
		}
		wp_enqueue_script( 'jquery-scrollto', THEME_JS. '/jquery.scroll-to.js', array( 'jquery' ), false, $move_bottom );

		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );

		}


		if ( $mk_option['enable_uc'] == 'true' || is_page_template( 'under-construction.php' ) ) {
			wp_enqueue_script( 'jquery-countdown', THEME_JS. '/jquery.countdown.js', array( 'jquery' ), false, $move_bottom );
		}
		wp_enqueue_script( 'theme-plugins', THEME_JS .'/plugins.js', array( 'jquery' ), false, $move_bottom );
		wp_enqueue_script( 'theme-scripts', THEME_JS .'/theme-scripts.js', array( 'jquery' ), false, $move_bottom );


		wp_enqueue_style( 'mk-style', get_stylesheet_uri(), false, false, 'all' );


		if ( isset( $_GET['skin'] ) ) {
			wp_enqueue_style( 'mk-skin', THEME_DIR_URI.'/skin.php?skin=' .$_GET['skin'] , false, false, 'all' );
		}else {
			wp_enqueue_style( 'mk-skin', THEME_DIR_URI.'/skin.php', false, false, 'all' );
		}

		if ( is_rtl() ) {
			wp_enqueue_style(  'style-rtl', THEME_STYLES.'/rtl.css', false, false, 'all' );
		}

		if ( $mk_option['special_fonts_type_1'] == 'google' && !empty( $mk_option['special_fonts_list_1'] ) ) {
			wp_enqueue_style( 'google-font-api-special-1', 'http://fonts.googleapis.com/css?family=' .$mk_option['special_fonts_list_1'].'&subset='.$mk_option['google_font_subset_1'] , false, false, 'all' );
		}
		if ( $mk_option['special_fonts_type_2'] == 'google' && !empty( $mk_option['special_fonts_list_2'] ) ) {
			wp_enqueue_style( 'google-font-api-special-2', 'http://fonts.googleapis.com/css?family=' .$mk_option['special_fonts_list_2'].'&subset='.$mk_option['google_font_subset_2']  , false, false, 'all' );
		}
		wp_register_style(  'mediaelementplayer-css', THEME_STYLES.'/mediaelementplayer.css', false, false, 'all' );
	}
}
add_action( 'init', 'theme_enqueue_scripts' );
add_action( 'wp_head', 'theme_enqueue_scripts' );



if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
	/**
	 * Remove WooCommerce Generator tag, styles, and scripts from the homepage.
	 * Tested and works with WooCommerce 2.0+
	 *
	 * @author Greg Rickaby
	 * @since 2.0.0
	 */
	function child_manage_woocommerce_styles() {
		$mk_option = theme_option( THEME_OPTIONS );
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		if ( ( is_front_page() || is_home() ) && $mk_option['home_disable_woocommerce'] == 'true' ) {
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}}
}



function mk_enqueue_styles() {
	global $post;


	if ( is_single() || is_page() ) {
		$enable_noti_bar = get_post_meta( $post->ID, 'enable_noti_bar', true );
		$local_backgrounds = get_post_meta( $post->ID, '_enable_local_backgrounds', true );


		if ( $local_backgrounds == 'true' ) {
			$body_bg  = get_post_meta( $post->ID, 'body_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'body_color', true ).' !important;' : '';
			$body_bg .= get_post_meta( $post->ID, 'body_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'body_image', true ) . ') !important;' : '';
			$body_bg .= get_post_meta( $post->ID, 'body_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'body_repeat', true ).' !important;' : '' ;
			$body_bg .= get_post_meta( $post->ID, 'body_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'body_position', true ).';' : '';
			$body_bg .= get_post_meta( $post->ID, 'body_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'body_attachment', true ).' !important;' : '';



			$header_bg  = get_post_meta( $post->ID, 'header_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'header_color', true ).' !important;' : '';
			$header_bg .= get_post_meta( $post->ID, 'header_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'header_image', true ) . ') !important;' : 'background-image:none !important;';
			$header_bg .= get_post_meta( $post->ID, 'header_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'header_repeat', true ).' !important;' : '' ;
			$header_bg .= get_post_meta( $post->ID, 'header_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'header_position', true ).';' : '';
			$header_bg .= get_post_meta( $post->ID, 'header_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'header_attachment', true ).' !important;' : '';


			$banner_bg  = get_post_meta( $post->ID, 'banner_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'banner_color', true ).' !important;' : '';
			$banner_bg .= get_post_meta( $post->ID, 'banner_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'banner_image', true ) . ') !important;' : 'background-image:none !important;';
			$banner_bg .= get_post_meta( $post->ID, 'banner_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'banner_repeat', true ).' !important;' : '' ;
			$banner_bg .= get_post_meta( $post->ID, 'banner_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'banner_position', true ).';' : '';
			$banner_bg .= get_post_meta( $post->ID, 'banner_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'banner_attachment', true ).' !important;' : '';


			$page_bg  = get_post_meta( $post->ID, 'page_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'page_color', true ).' !important;' : '';
			$page_bg .= get_post_meta( $post->ID, 'page_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'page_image', true ) . ') !important;' : '';
			$page_bg .= get_post_meta( $post->ID, 'page_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'page_repeat', true ).' !important;' : '' ;
			$page_bg .= get_post_meta( $post->ID, 'page_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'page_position', true ).' !important;' : '';
			$page_bg .= get_post_meta( $post->ID, 'page_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'page_attachment', true ).' !important;' : '';


			$footer_bg  = get_post_meta( $post->ID, 'footer_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'footer_color', true ).' !important;' : '';
			$footer_bg .= get_post_meta( $post->ID, 'footer_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'footer_image', true ) . ') !important;' : '';
			$footer_bg .= get_post_meta( $post->ID, 'footer_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'footer_repeat', true ).' !important;' : '' ;
			$footer_bg .= get_post_meta( $post->ID, 'footer_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'footer_position', true ).';' : '';
			$footer_bg .= get_post_meta( $post->ID, 'footer_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'footer_attachment', true ).' !important;' : '';




			$page_title = get_post_meta( $post->ID, '_page_title_color', true ) ? 'color:'.get_post_meta( $post->ID, '_page_title_color', true ).' !important;' : '';
			$page_subtitle = get_post_meta( $post->ID, '_page_subtitle_color', true ) ? 'color:'.get_post_meta( $post->ID, '_page_subtitle_color', true ).' !important;' : '';
			$banner_border = get_post_meta( $post->ID, '_banner_border_color', true ) ? 'border-bottom:1px solid '.get_post_meta( $post->ID, '_banner_border_color', true ).' !important;' : '';






			echo '<style type="text/css" media="screen">' . "\n";
			echo 'body {'. $body_bg. "}\n";
			echo '.mk-header-bg {'.$header_bg. "}\n";
			echo '#mk-header {' . $banner_bg. $banner_border . "}\n";
			echo '#theme-page{'.$page_bg. "}\n";
			echo '#mk-footer {'. $footer_bg. "}\n";
			echo '.page-introduce-title {'. $page_title. "}\n";
			echo '.page-introduce-subtitle {'. $page_subtitle. "}\n";


			$boxed_layout_shadow_size = get_post_meta( $post->ID, 'boxed_layout_shadow_size', true );
			$boxed_layout_shadow_intensity = get_post_meta( $post->ID, 'boxed_layout_shadow_intensity', true );
			if ( $boxed_layout_shadow_size > 0 ) {
				echo '#mk-boxed-layout {
		  -webkit-box-shadow: 0 0 '.$boxed_layout_shadow_size.'px rgba(0, 0, 0, '.$boxed_layout_shadow_intensity.') !important;
		  -moz-box-shadow: 0 0 '.$boxed_layout_shadow_size.'px rgba(0, 0, 0, '.$boxed_layout_shadow_intensity.') !important;
		  box-shadow: 0 0 '.$boxed_layout_shadow_size.'px rgba(0, 0, 0, '.$boxed_layout_shadow_intensity.') !important;

		}';
			}
			echo'</style>' . "\n";

		}

		if ( $enable_noti_bar == 'true' ) {
			$notifi_bg  = get_post_meta( $post->ID, 'noti_bg_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'noti_bg_color', true ).' !important;' : '';
			if ( get_post_meta( $post->ID, 'noti_bg_image_source', true ) == 'preset' ) {
				$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_preset_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'noti_bg_preset_image', true ) . ') !important;' : ' ';
			} else if ( get_post_meta( $post->ID, 'noti_bg_image_source', true ) == 'custom' ) {
					$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_custom_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'noti_bg_custom_image', true ) . ') !important;' : ' ';
				}
			$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'noti_bg_repeat', true ).' !important;' : '' ;
			$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'noti_bg_position', true ).' !important;' : '';
			$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'noti_bg_attachment', true ).' !important;' : '';

			echo '<style type="text/css" media="screen">' . "\n";
			echo '#mk-notification-bar {'.$notifi_bg."}\n";
			echo '.mk-noti-message {color:'.get_post_meta( $post->ID, 'noti_message_color', true )."}\n";
			echo '.mk-noti-more {color:'.get_post_meta( $post->ID, 'noti_more_color', true )."}\n";
			echo'</style>' . "\n";
		}




	}
}
add_action( 'wp_footer', 'mk_enqueue_styles' );
