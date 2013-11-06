<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6"  <?php language_attributes(); ?>>
   <![endif]-->
<!--[if IE 7]>
   <html id="ie7" <?php language_attributes(); ?>>
      <![endif]-->
<!--[if IE 8]>
      <html id="ie8" <?php language_attributes(); ?>>
         <![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]>
         <html <?php language_attributes(); ?>>
            <![endif]-->
<?php  
$mk_options = theme_option(THEME_OPTIONS);
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>            
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="Theme Version" content="<?php $theme_data = wp_get_theme(); echo $theme_data['Version']; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>
            <?php if ( is_plugin_inactive('wordpress-seo/wp-seo.php') ) {
                   bloginfo( 'name' );
                  } ?> <?php wp_title("|", true); ?>
        </title>
        <?php if ( $mk_options['custom_favicon'] ) : ?>
          <link rel="shortcut icon" href="<?php echo $mk_options['custom_favicon']; ?>"  />
        <?php else : ?>
        <link rel="shortcut icon" href="<?php echo THEME_IMAGES; ?>/favicon.png"  />
        <?php endif; ?>
        <?php if($mk_options['iphone_icon']): ?>
        <link rel="apple-touch-icon-precomposed" href="<?php echo $mk_options['iphone_icon']; ?>">
        <?php endif; ?>
        <?php if($mk_options['iphone_icon_retina']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $mk_options['iphone_icon_retina']; ?>">
        <?php endif; ?>
        <?php if($mk_options['ipad_icon']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $mk_options['ipad_icon']; ?>">
        <?php endif; ?>
        <?php if($mk_options['ipad_icon_retina']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $mk_options['ipad_icon_retina']; ?>">
        <?php endif; ?>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url');?>">
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url');?>">
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
         <!--[if lt IE 9]>
         <script src="<?php echo THEME_JS;?>/html5shiv.js" type="text/javascript"></script>
         <![endif]-->
         <!--[if IE 7 ]>
               <link href="<?php echo THEME_STYLES;?>/ie7.css" media="screen" rel="stylesheet" type="text/css" />
               <![endif]-->
         <!--[if IE 8 ]>
               <link href="<?php echo THEME_STYLES;?>/ie8.css" media="screen" rel="stylesheet" type="text/css" />
         <![endif]-->

         <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
         <script type="text/javascript">
         var mk_header_parallax, mk_responsive_nav_width, mk_header_sticky, mk_header_parallax, mk_banner_parallax, mk_page_parallax, mk_footer_parallax, mk_body_parallax;
          mk_images_dir = "<?php echo THEME_IMAGES; ?>",
          mk_theme_js_path = "<?php echo THEME_JS;  ?>",
          mk_responsive_nav_width = <?php echo $mk_options['responsive_nav_width']; ?>,
          mk_smooth_scroll = <?php echo $mk_options['disable_smoothscroll']; ?>,
          mk_header_sticky = <?php echo $mk_options['enable_sticky_header']; ?>;
          <?php if(is_singular()) : ?>
          mk_header_parallax = <?php echo get_post_meta( $post->ID, 'header_parallax', true ) ? get_post_meta( $post->ID, 'header_parallax', true ) : "false" ?>,
          mk_banner_parallax = <?php echo get_post_meta( $post->ID, 'banner_parallax', true ) ? get_post_meta( $post->ID, 'banner_parallax', true ) : "false"; ?>,
          mk_page_parallax = <?php echo get_post_meta( $post->ID, 'page_parallax', true ) ? get_post_meta( $post->ID, 'page_parallax', true ) : "false"; ?>,
          mk_footer_parallax = <?php echo get_post_meta( $post->ID, 'footer_parallax', true ) ? get_post_meta( $post->ID, 'footer_parallax', true ) : "false"; ?>,
          mk_body_parallax = <?php echo get_post_meta( $post->ID, 'body_parallax', true ) ? get_post_meta( $post->ID, 'body_parallax', true ) : "false"; ?>;
          <?php endif; ?>
         </script>
    <?php wp_head(); ?>     
    </head>
<?php

global $post;
$mk_body_class[] = $mk_banner_class = $mk_header_class ='';
if ( ($mk_options['background_selector_orientation'] == 'boxed_layout') && !(is_singular() && get_post_meta( $post->ID, '_enable_local_backgrounds', true ) == 'true' && get_post_meta( $post->ID, 'background_selector_orientation', true ) == 'full_width_layout')) { 
    $mk_body_class[] = 'mk-boxed-enabled';
} else if(is_singular() && get_post_meta( $post->ID, '_enable_local_backgrounds', true ) == 'true' && get_post_meta( $post->ID, 'background_selector_orientation', true ) == 'boxed_layout') {
   $mk_body_class[] = 'mk-boxed-enabled';
}
if($mk_options['body_size'] == 'true') {
  $mk_body_class[] = 'mk-background-stretch';
}
?>

<body <?php body_class($mk_body_class); ?>>

<div id="mk-boxed-layout">
<?php
if($mk_options['banner_size'] == 'true') {
  $mk_banner_class = ' mk-background-stretch';
}  
 ?>
<header id="mk-header" data-height="<?php echo $mk_options['header_height']; ?>" data-sticky-height="<?php echo $mk_options['header_scroll_height']; ?>" class="<?php echo $mk_options['main_nav_style']; ?>-style-nav<?php echo $mk_banner_class; ?>">
  <?php 
    if(is_page()){
      theme_class('notification_bar', $post->ID);
      theme_class('header_banner_video', $post->ID);
    } ?>
<div class="mk-zindex-fix">    
<?php if($mk_options['disable_header_toolbar'] == 'true') : ?>
<div class="mk-header-toolbar">
  <?php if ( $mk_options['enable_header_date'] == 'true' ) { ?>
      <span class="mk-header-date"><i class="mk-icon-time"></i><?php echo date("F j, Y"); ?></span>
    <?php } ?>
  <?php theme_class('header_toolbar_menu'); ?>

    <?php theme_class('header_toolbar_contact'); ?>

    <span class="mk-header-tagline"><?php echo stripslashes($mk_options['header_toolbar_tagline']); ?></span>
    <?php if(function_exists('mk_wpml_language_switch')) { mk_wpml_language_switch(); } ?>

    
    <?php if($mk_options['header_search_location'] == 'toolbar') theme_class('mk_header_search'); ?>
    <?php theme_class('mk_header_social'); ?>

    <?php if($mk_options['header_toolbar_login'] == 'true') : ?>
         <?php theme_class('mk_header_login'); ?> 
   <?php endif; ?>

    <?php if($mk_options['header_toolbar_subscribe'] == 'true') : ?>
      <div class="mk-header-signup">
        <a href="#" id="mk-header-subscribe-button" class="mk-subscribe-link mk-toggle-trigger"><i class="mk-icon-envelope"></i><?php _e('Subscribe', 'mk_framework'); ?></a>
        <?php theme_class('mk_header_subscribe'); ?> 
      </div>
    <?php endif; ?>

    <?php 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $mk_options['header_checkout_woocommerce'] == 'true') {
      global $woocommerce;
    ?>

    <div class="mk-header-checkout">
      <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" id="mk-header-checkout-btn" class="mk-checkout-btn"><i class="mk-moon-cart-2"></i><?php _e('Checkout', 'mk_framework'); ?></a>
      <?php theme_class('mk_header_checkout'); ?> 
    </div>
  <?php
  }
   ?>
  <div class="clearboth"></div>
</div>
<?php endif; ?>
<!-- End Header Toolbae -->


<?php
if($mk_options['header_size'] == 'true') {
  $mk_header_class = ' mk-background-stretch';
}  
 ?>
<div class="mk-header-inner">
  <div class="mk-header-bg <?php echo $mk_header_class; ?>"></div>
  <div class="mk-header-right">
  <?php theme_class('start_tour_link'); ?>
  <?php if($mk_options['header_search_location'] == 'header') theme_class('mk_header_search'); ?>
  </div>
  <?php if($mk_options['main_nav_style'] == 'modern') : ?>
  <div data-megawidth="<?php echo $mk_options['grid_width']; ?>" class="mk-header-nav-container modern-style mk-mega-nav">
  <?php theme_class('primary_menu'); ?>
   <?php if($mk_options['header_search_location'] == 'beside_nav') { theme_class('main_nav_side_search'); } ?>
  
  </div>

  <?php endif; ?>
  <div class="mk-nav-responsive-link"><i class="mk-moon-menu-3"></i></div>
  <?php theme_class('custom_logo'); ?>
  <div class="clearboth"></div>
  <?php if($mk_options['main_nav_style'] == 'classic') : ?>
  <div class="mk-header-nav-container">
  <div class="mk-classic-nav-bg"></div>
  <div class="mk-classic-menu-wrapper mk-mega-nav" data-megawidth="<?php echo $mk_options['grid_width']; ?>">
    <?php theme_class('primary_menu'); ?>
    <?php if($mk_options['header_search_location'] == 'beside_nav') { theme_class('main_nav_side_search'); } ?>
  </div>
  </div>
  <?php endif; ?>
<div class="clearboth"></div>
</div>
<div class="mk-header-padding-wrapper"></div>
<div class="clearboth"></div>


<?php
if(is_singular()) {
  theme_class('mk_google_maps',$post->ID);
  theme_class('mk_slideshow',$post->ID);
  theme_class('page_introduce',$post->ID);
} else {
  theme_class('page_introduce');
}
?>

<div class="clearboth"></div>
</div>
</header>
