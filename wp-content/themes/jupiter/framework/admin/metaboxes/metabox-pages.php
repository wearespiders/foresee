<?php
$config  = array(
  'title' => sprintf( '%s Page Options', THEME_NAME ),
  'id' => 'mk-metaboxes-tabs',
  'pages' => array(
    'page'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(
  array(
    "type" => "start_sub",
    "options" => array(
      "mk_option_general" => __( "General Settings", 'mk_framework' ),
      "mk_option_backgrounds" => __( 'Skining', 'mk_framework' ),
      "mk_option_slideshow" => __( "Slideshow", 'mk_framework' ),
      "mk_option_banner_video" => __( "Banner Video", 'mk_framework' ),
      "mk_option_google_maps" => __( "Google Maps", 'mk_framework' ),
      "mk_option_header_notification" => __( "Header Notification Bar", 'mk_framework' ),
      "mk_option_footer_twitter" => __( "Footer Twitter section", 'mk_framework' ),
    ),
  ),



  /* Sub Pane one : General Option */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_general'
  ),

  array(
    "name" => __( "General Settings", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Layout", "mk_framework" ),
    "desc" => __( "Please choose this page's layout.", "mk_framework" ),
    "id" => "_layout",
    "default" => 'right',
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "0 30px 30px 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),

  array(
    "name" => __( "Custom Sidebar", "mk_framework" ),
    "desc" => __( "You can create a custom sidebar, under Sidebar option and then assign the custom sidebar here to this post. later on you can customize which widgets to show up.", "mk_framework" ),
    "id" => "_sidebar",
    "default" => '',
    "options" => get_sidebar_options(),
    "option_structure" => 'sub',
    "divider" => false,
    "type" => "chosen_select"
  ),


  array(
    "name" => __( "Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_page_disable_title",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Breadcrumb", "mk_framework" ),
    "desc" => __( "You can disable Breadcrumb for this page using this option", "mk_framework" ),
    "id" => "_disable_breadcrumb",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Page Title Align", "mk_framework" ),
    "desc" => __( "You can change title and subtitle text align.", "mk_framework" ),
    "id" => "_introduce_align",
    "default" => 'left',
    "options" => array(
      "left" => 'Left',
      "right" => 'Right',
      "center" => 'Center',
    ),
    "option_structure" => 'sub',
    "divider" => false,
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Custom Page Title", "mk_framework" ),
    "id" => "_custom_page_title",
    "rows" => "1",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "textarea"
  ),

  array(
    "name" => __( "Page Heading Subtitle", "mk_framework" ),
    "id" => "_page_introduce_subtitle",
    "rows" => "3",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "textarea"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/





  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_backgrounds'
  ),


  array(
    "name" => __( "Override Global Settings", "mk_framework" ),
    "desc" => __( "You should enable this option if you want to override global background values defined in Masterkey Settings.", "mk_framework" ),
    "id" => "_enable_local_backgrounds",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Choose between boxed and full width layout", 'mk_framework' ),
    "desc" => __( "Choose between a full or a boxed layout to set how your website's layout will look like.", 'mk_framework' ),
    "id" => "background_selector_orientation",
    "default" => "full_width_layout",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "0px 30px 20px 0",
    "options" => array(
      "boxed_layout" => 'boxed-layout',
      "full_width_layout" => 'full-width-layout',
    ),
    "type" => "visual_selector"
  ),



  array(
    "name" => __( "Boxed Layout Outer Shadow Size", "mk_framework" ),
    "desc" => __( "You can have a outer shadow around the box. using this option you in can modify its range size", "mk_framework" ),
    "id" => "boxed_layout_shadow_size",
    "default" => "0",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "60",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => __( "Boxed Layout Outer Shadow Intensity", "mk_framework" ),
    "desc" => __( "determines how darker the shadow to be.", "mk_framework" ),
    "id" => "boxed_layout_shadow_intensity",
    "default" => "0",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "1",
    "step" => "0.01",
    "unit" => 'alpha',
    "type" => "range"
  ),

  array(
    "name" => __( "Background color & texture", 'mk_framework' ),
    "desc" => __( "Please click on the different sections to modify their backgrounds.", 'mk_framework' ),
    "id"=> 'general_backgounds',
    "option_structure" => 'main',
    "divider" => true,
    "type" => "general_background_selector"
  ),


  array(
    "id"=>"body_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"body_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"page_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"page_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),








  array(
    "id"=>"header_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"header_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"header_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"banner_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"banner_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"banner_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"footer_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"footer_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"footer_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),

  array(
    "name" => __( 'Page Title', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_page_title_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __( 'Page Subtitle', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_page_subtitle_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __( "Breadcrumb Skin", "mk_framework" ),
    "id" => "_breadcrumb_skin",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "light" => __( 'For Light Background', "mk_framework" ),
      "dark" => __( 'For Dark Background', "mk_framework" ),

    ),
    "type" => "select"
  ),

    array(
    "name" => __( 'Banner Section Border Bottom Color', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_banner_border_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/








  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_slideshow'

  ),
  array(
    "name" => __( "Slideshow Settings", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Enable Slidehsow For this page", "mk_framework" ),
    "desc" => __( "You can enable slideshow for this Post and choose which items to slide. You can also use one item which will give one static image.", "mk_framework" ),
    "id" => "_enable_slidehsow",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Select Your Slideshow", "mk_framework" ),
    "desc" => __( "Select your preferable slide show here", "mk_framework" ),
    "id" => "_slideshow_source",
    "default" => 'layerslider',
    "option_structure" => 'sub',
    "width" => 300,
    "divider" => true,
    "options" => array(
      "layerslider" => "Layer Slider",
      "revslider" => 'Revolution Slider',
      "flexslider" => 'Flexslider',
      "icarousel" => 'iCorousel',
      "banner_builder" => 'Banner Builder',

    ),
    "type" => "chosen_select"
  ),




  array(
    "name" => __( "Select Slideshow", 'mk_framework' ),
    "desc" => __( "", 'mk_framework' ),
    "id" => "_layer_slider_source",
    "default" => '1',
    "target" => 'layer_slider_source',
    "width" => 500,
    "option_structure" => 'sub',
    "divider" => true,
    'margin_bottom' => 200,
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Select Slideshow", 'mk_framework' ),
    "desc" => __( "", 'mk_framework' ),
    "id" => "_rev_slider_source",
    "default" => '1',
    "target" => 'revolution_slider',
    "width" => 500,
    "option_structure" => 'sub',
    "divider" => true,
    'margin_bottom' => 200,
    "type" => "chosen_select"
  ),


  array(
    "type" => "general_wrapper_start",
    "id" => '_icarousel_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Slides", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_icarousel_items",
    "default" => array(),
    "target" => 'icarousel',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "multiselect"
  ),


  array(
    "name" => __( "Number of Slides", "mk_framework" ),
    "desc" => __( "Set how many Slides to be shown on your slider. Please note that slide items number should be odd, therefore we made this option to take only odd numbers. you should have minimum of 3 slide items.", "mk_framework" ),
    "id" => "_icarousel_count",
    "min" => "3",
    "max" => "30",
    "step" => "2",
    "default" => "3",
    "unit" => 'Slides',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),


  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_icarousel_orderby",
    "default" => 'menu_order',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "chosen_select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_icarousel_order",
    "default" => 'ASC',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Autoplay", "mk_framework" ),
    "desc" => __( "Enable this option if you would like slider to autoplay.", "mk_framework" ),
    "id" => "_icarousel_autoplay",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Make 3D", "mk_framework" ),
    "desc" => __( "To Enable or Disable 3D effect.", "mk_framework" ),
    "id" => "_icarousel_3d",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Perspective", "mk_framework" ),
    "desc" => __( "The 3D perspective option. (Min 0 & Max 100)", "mk_framework" ),
    "id" => "_icarousel_perspective",
    "min" => "0",
    "max" => "100",
    "step" => "1",
    "unit" => 'ms',
    "default" => "35",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __( "Pause on Hover", "mk_framework" ),
    "desc" => __( "If true & the slideshow is active, the slideshow will pause on hover.", "mk_framework" ),
    "id" => "_icarousel_pause_on_hover",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Slider Easing", "mk_framework" ),
    "desc" => __( "Set the easing of the sliding animation.", "mk_framework" ),
    "id" => "_icarousel_easing",
    "default" => 'easeOutCubic',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "" => 'none',
      "linear" => 'linear',
      "swing" => 'swing',
      "easeInQuad" => 'easeInQuad',
      "easeOutQuad" => 'easeOutQuad',
      "easeInOutQuad" => 'easeInOutQuad',
      "easeInCubic" => 'easeInCubic',
      "easeOutCubic" => 'easeOutCubic',
      "easeInOutCubic" => 'easeInOutCubic',
      "easeInQuart" => 'easeInQuart',
      "easeOutQuart" => 'easeOutQuart',
      "easeInOutQuart" => 'easeInOutQuart',
      "easeInQuint" => 'easeInQuint',
      "easeOutQuint" => 'easeOutQuint',
      "easeInOutQuint" => 'easeInOutQuint',
      "easeInSine" => 'easeInSine',
      "easeOutSine" => 'easeOutSine',
      "easeInOutSine" => 'easeInOutSine',
      "easeInExpo" => 'easeInExpo',
      "easeOutExpo" => 'easeOutExpo',
      "easeInOutExpo" => 'easeInOutExpo',
      "easeInCirc" => 'easeInCirc',
      "easeOutCirc" => 'easeOutCirc',
      "easeInOutCirc" => 'easeInOutCirc',
      "easeInElastic" => 'easeInElastic',
      "easeOutElastic" => 'easeOutElastic',
      "easeInOutElastic" => 'easeInOutElastic',
      "easeInBack" => 'easeInBack',
      "easeOutBack" => 'easeOutBack',
      "easeInOutBack" => 'easeInOutBack',
      "easeInBounce" => 'easeInBounce',
      "easeOutBounce" => 'easeOutBounce',
      "easeInOutBounce" => 'easeInOutBounce'
    ),
    "type" => "chosen_select"
  ),
  array(
    "name" => __( "Animation Speed", "mk_framework" ),
    "desc" => __( "Slide transition speed.", "mk_framework" ),
    "id" => "_icarousel_animation_speed",
    "min" => "100",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "500",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Pause Time", "mk_framework" ),
    "desc" => __( "How long each slide will show.", "mk_framework" ),
    "id" => "_icarousel_pause_time",
    "min" => "1000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "5000",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __( "Direction Navigation", "mk_framework" ),
    "desc" => __( "Next & Previous navigation.", "mk_framework" ),
    "id" => "_icarousel_direction_nav",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),


  array(
    "type" => "general_wrapper_end"
  ),






  array(
    "type" => "general_wrapper_start",
    "id" => '_flexslider_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Slides", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_flexslider_items",
    "default" => array(),
    "target" => 'flexslider',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "multiselect"
  ),

  array(
    "name" => __( "Slideshow Height", "mk_framework" ),
    "desc" => __( "Adjust your slideshow's height here", "mk_framework" ),
    "id" => "_flexslider_height",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "100",
    "max" => "1000",
    "step" => "10",
    "unit" => 'px',
    "default" => "400",
    "type" => "range"
  ),

  array(
    "name" => __( "Pagination Type", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_flexslider_pagination",
    "option_structure" => 'sub',
    "divider" => true,
    "default" => 'circle',
    "options" => array(
      "thumb" => 'Thumbnail',
      "circle" => 'Circles',
    ),
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Number of Slides", "mk_framework" ),
    "desc" => __( "Set how many Slides to be shown on your slider.", "mk_framework" ),
    "id" => "_flexslider_count",
    "min" => "1",
    "max" => "30",
    "step" => "1",
    "default" => "10",
    "unit" => 'Slides',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Caption", "mk_framework" ),
    "desc" => __( "If this option is disabled, the title, description,  read-more button will be disabled.", "mk_framework" ),
    "id" => "_flexslider_disableCaption",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_flexslider_orderby",
    "default" => 'menu_order',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "chosen_select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_flexslider_order",
    "default" => 'ASC',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Autoplay", "mk_framework" ),
    "desc" => __( "Enable this option if you would like slider to autoplay.", "mk_framework" ),
    "id" => "_flexslider_slideshow",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Pause on Hover", "mk_framework" ),
    "desc" => __( "If true & the slideshow is active, the slideshow will pause on hover.", "mk_framework" ),
    "id" => "_flexslider_pauseOnHover",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Slider Easing", "mk_framework" ),
    "desc" => __( "Set the easing of the sliding animation.", "mk_framework" ),
    "id" => "_flexslider_easing",
    "default" => 'easeOutCubic',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "" => 'none',
      "linear" => 'linear',
      "swing" => 'swing',
      "easeInQuad" => 'easeInQuad',
      "easeOutQuad" => 'easeOutQuad',
      "easeInOutQuad" => 'easeInOutQuad',
      "easeInCubic" => 'easeInCubic',
      "easeOutCubic" => 'easeOutCubic',
      "easeInOutCubic" => 'easeInOutCubic',
      "easeInQuart" => 'easeInQuart',
      "easeOutQuart" => 'easeOutQuart',
      "easeInOutQuart" => 'easeInOutQuart',
      "easeInQuint" => 'easeInQuint',
      "easeOutQuint" => 'easeOutQuint',
      "easeInOutQuint" => 'easeInOutQuint',
      "easeInSine" => 'easeInSine',
      "easeOutSine" => 'easeOutSine',
      "easeInOutSine" => 'easeInOutSine',
      "easeInExpo" => 'easeInExpo',
      "easeOutExpo" => 'easeOutExpo',
      "easeInOutExpo" => 'easeInOutExpo',
      "easeInCirc" => 'easeInCirc',
      "easeOutCirc" => 'easeOutCirc',
      "easeInOutCirc" => 'easeInOutCirc',
      "easeInElastic" => 'easeInElastic',
      "easeOutElastic" => 'easeOutElastic',
      "easeInOutElastic" => 'easeInOutElastic',
      "easeInBack" => 'easeInBack',
      "easeOutBack" => 'easeOutBack',
      "easeInOutBack" => 'easeInOutBack',
      "easeInBounce" => 'easeInBounce',
      "easeOutBounce" => 'easeOutBounce',
      "easeInOutBounce" => 'easeInOutBounce'
    ),
    "type" => "chosen_select"
  ),
  array(
    "name" => __( "Slideshow Speed", "mk_framework" ),
    "desc" => __( "Time elapsed between each autoplay sliding case.", "mk_framework" ),
    "id" => "_flexslider_slideshowSpeed",
    "min" => "2000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "5000",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __( "Animation Duration", "mk_framework" ),
    "desc" => __( "Speed of animation", "mk_framework" ),
    "id" => "_flexslider_animationDuration",
    "min" => "200",
    "max" => "10000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "600",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),



  array(
    "type" => "general_wrapper_end"
  ),





  array(
    "type" => "general_wrapper_start",
    "id" => '_banner_builder_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Banner or Banners", "mk_framework" ),
    "desc" => __( "If you select only one banner item, there will be no slideshow otherwise your contents will be slided based on below options. please note that if you want to put any shortcode (in banner builder items) that has slideshow capability such as laptop, lcd, image slideshow, then you should only choose one slide item here due to the main banner builder sliding feature conflicts with its child slideshows. :)", "mk_framework" ),
    "id" => "_banner_items",
    "default" => array(),
    "target" => 'banner_builder',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "multiselect"
  ),

  array(
    "name" => __( "Min Height", "mk_framework" ),
    "desc" => __( "You can adjust a min height to avoid height changes between your slide items which may distract the viewer.", "mk_framework" ),
    "id" => "_banner_minHeight",
    "min" => "50",
    "max" => "1200",
    "step" => "1",
    "unit" => 'px',
    "default" => "200",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),


  array(
    "name" => __( "Top & Bottom Padding", "mk_framework" ),
    "desc" => __( "This option will help you to give your own custom vertical spacing.", "mk_framework" ),
    "id" => "_banner_padding",
    "min" => "0",
    "max" => "500",
    "step" => "1",
    "unit" => 'px',
    "default" => "30",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Animation Style", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_banner_animation",
    "option_structure" => 'sub',
    "divider" => true,
    "default" => 'fade',
    "options" => array(
      "fade" => 'Fade',
      "slide" => 'Slide',
    ),
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_banner_orderby",
    "default" => 'menu_order',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "chosen_select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_banner_order",
    "default" => 'ASC',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "chosen_select"
  ),

  array(
    "name" => __( "Autoplay", "mk_framework" ),
    "desc" => __( "Enable this option if you would like slider to autoplay.", "mk_framework" ),
    "id" => "_banner_slideshow",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Slideshow Speed", "mk_framework" ),
    "desc" => __( "Time elapsed between each autoplay sliding case.", "mk_framework" ),
    "id" => "_banner_slideshowSpeed",
    "min" => "2000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "5000",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __( "Animation Duration", "mk_framework" ),
    "desc" => __( "Speed of animation", "mk_framework" ),
    "id" => "_banner_animationDuration",
    "min" => "200",
    "max" => "10000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "600",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),



  array(
    "type" => "general_wrapper_end"
  ),





  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/



  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_banner_video'
  ),
  array(
    "name" =>__( "Enable Banner Video", "mk_framework" ),
    "desc" => __( "If you enable this option you can upload video files which will play in banner section background.", "mk_framework" ),
    "id" => "_enable_banner_video",
    "default" => "false",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),


  array(
    "name" => __( "Upload Video (MP4 format)", "mk_framework" ),
    "desc" => __( "" , "mk_framework" ),
    "id" => "_banner_video_mp4",
    "default" => '',
     "preview" => false,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),

  array(
    "name" => __( "Upload Video (WebM format)", "mk_framework" ),
    "desc" => __( "" , "mk_framework" ),
    "id" => "_banner_video_webm",
    "default" => '',
     "preview" => false,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),

  array(
    "name" => __( "Upload Video Preview Image", "mk_framework" ),
    "desc" => __( "This Image will be shown until the video load." , "mk_framework" ),
    "id" => "_banner_video_preview",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),

    array(
    "name" =>__( "Show Video Pattern Mask", "mk_framework" ),
    "desc" => __( "If you enable this option a pattern will overlay the video.", "mk_framework" ),
    "id" => "_banner_video_pattern",
    "default" => "false",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

    array(
    "name" => __( 'Video Color Overlay', 'mk_framework' ),
    "id" => "_banner_video_color_overlay",
    "default" => "_banner_video_overlay_color",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/





  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_google_maps'
  ),
  array(
    "name" => __( "Enable Google Map for This Page", "mk_framework" ),
    "desc" => __( "If you would like to display google map in this page's header enable this option. Dont forget to set your Latitude and Longitude. The rest are optional.", "mk_framework" ),
    "id" => "_enable_page_gmap",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Map Height", "mk_framework" ),
    "desc" => __( "Set your Maps' height here", "mk_framework" ),
    "id" => "_gmap_height",
    "min" => "100",
    "max" => "1200",
    "step" => "1",
    "unit" => '',
    "default" => "400",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Latitude", "mk_framework" ),
    "default" => "",
    "size" => 40,
    "id" => "_page_gmap_latitude",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Longitude", "mk_framework" ),
    "default" => "",
    "size" => 40,
    "id" => "_page_gmap_longitude",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Zoom", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_page_gmap_zoom",
    "min" => "1",
    "max" => "19",
    "step" => "1",
    "unit" => '',
    "default" => "14",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Enable Pan Control", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_enable_panControl",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Enable Draggable", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_enable_draggable",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Enable Scroll Wheel", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_enable_scrollwheel",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Enable Zoom Control", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_enable_zoomControl",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Enable Map Type Control", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_enable_mapTypeControl",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Enable Scale Control", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_enable_scaleControl",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Enable Marker", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_gmap_marker",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Upload Marker Icon", "mk_framework" ),
    "desc" => __( "If left empty the default icon will be used." , "mk_framework" ),
    "id" => "_pin_icon",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),
  array(
    "name" => __( "Enable Google Maps Hue, Saturation, Lightness, Gamma", "mk_framework" ),
    "desc" => __( "If you dont want to change maps coloring, brightness and so on, disable this option.", "mk_framework" ),
    "id" => "_disable_coloring",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Hue", "mk_framework" ),
    "desc" => __( "Sets the hue of the feature to match the hue of the color supplied. Note that the saturation and lightness of the feature is conserved, which means, the feature will not perfectly match the color supplied .", "mk_framework" ),
    "id" => "_gmap_hue",
    "default" => '#ccc',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __( "Saturation", "mk_framework" ),
    "desc" => __( "Shifts the saturation of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].", "mk_framework" ),
    "id" => "_gmap_saturation",
    "min" => "-100",
    "max" => "100",
    "step" => "1",
    "unit" => '',
    "default" => "1",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Lightness", "mk_framework" ),
    "desc" => __( "Shifts lightness of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].", "mk_framework" ),
    "id" => "_gmap_lightness",
    "min" => "-100",
    "max" => "100",
    "step" => "1",
    "unit" => '',
    "default" => "1",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Gamma", "mk_framework" ),
    "desc" => __( "Modifies the gamma by raising the lightness to the given power. ", "mk_framework" ),
    "id" => "_gmap_gamma",
    "min" => "0.01",
    "max" => "9.99",
    "step" => "0.01",
    "unit" => '',
    "default" => "1",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/


  /* Sub Pane one */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_header_notification'
  ),


  array(
    "name" =>__( "Enable Toolbar", "mk_framework" ),
    "desc" => __( "Enable this option if you would like to show a message, promotion,.. to your site visitors with a dismissible close button (Will be saved in cookies to remember the action)", "mk_framework" ),
    "id" => "enable_noti_bar",
    "default" => "false",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Cookie Name", 'mk_framework' ),
    "desc" => __( "Each new message eighter in this page or other page should have a unique name. you should use dash or underscore instead of space.", "mk_framework" ),
    "id" => "noti_coockie_name",
    "default" => "",
    "size" => 80,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Message", 'mk_framework' ),
    "desc" => __( "Fill your message in this field.", "mk_framework" ),
    "id" => "noti_message",
    "default" => "This is advertising bar and it contains company's most important messages, gifts & promotions!",
    "size" => 80,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Read More Text", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "noti_more_text",
    "default" => "FIND OUR MORE",
    "size" => 30,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Read More URL", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "noti_more_url",
    "default" => "#",
    "size" => 40,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),


  array(
    "name" => __( "Header Section Background", 'mk_framework' ),
    "option_structure" => 'sub',
    "id"=> 'noti_background',
    "option_structure" => 'main',
    "divider" => true,
    "type" => "specific_background_selector_start"
  ),

  array(
    "id"=>"noti_bg_color",
    "default"=> "#33a76a",
    "type"=> 'specific_background_selector_color',
  ),


  array(
    "id"=>"noti_bg_repeat",
    "default"=> "",
    "type"=> 'specific_background_selector_repeat',
  ),

  array(
    "id"=>"noti_bg_attachment",
    "default"=> "",
    "type"=> 'specific_background_selector_attachment',
  ),


  array(
    "id"=>"noti_bg_position",
    "default"=> "",
    "type"=> 'specific_background_selector_position',
  ),


  array(
    "id"=>"noti_bg_preset_image",
    "default"=> "",
    "type"=> 'specific_background_selector_image',
  ),

  array(
    "id"=>"noti_bg_custom_image",
    "default"=> "",
    "type"=> 'specific_background_selector_custom_image',
  ),

  array(
    "id"=>"noti_bg_image_source",
    "default"=> "no-image",
    "type"=> 'specific_background_selector_source',
  ),

  array(
    "divider" => true,
    "type" => "specific_background_selector_end"
  ),

  array(
    "name" => __( 'Message Color', 'mk_framework' ),
    "id" => "noti_message_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __( 'Read More Color', 'mk_framework' ),
    "id" => "noti_more_color",
    "default" => "#dcdcdc",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/


  /* Sub Pane one : News Teaser */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_option_footer_twitter'
  ),


  array(
    "name" =>__( "Footer Twitter section", "mk_framework" ),
    "desc" => __( "You can Place twitter feeds bar to bottom of the content right before footer. simply enable this option and fill out the username. you have more options that you can consider using them to fit this section to your layout skin.", "mk_framework" ),
    "id" => "_enable_footer_twitter",
    "default" => "false",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Twitter Username", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_footer_twitter_username",
    "default" => "",
    "size" => 80,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Tweet Count", "mk_framework" ),
    "desc" => __( "How many tweets you would like to show", "mk_framework" ),
    "id" => "_tweet_count",
    "default" => "3",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "10",
    "step" => "1",
    "unit" => 'tweets',
    "type" => "range"
  ),



  array(
    "name" => __( "Background Color", 'mk_framework' ),
    "id" => "_footer_twitter_bg_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __( "Texts Skin", "mk_framework" ),
    "id" => "_footer_twitter_txt_color",
    "default" => 'light',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "light" => __( 'For Light Background', "mk_framework" ),
      "dark" => __( 'For Dark Background', "mk_framework" ),

    ),
    "type" => "select"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/




  array(
    "type"=>"end_sub"
  ),
);
new metaboxesGenerator( $config, $options );
