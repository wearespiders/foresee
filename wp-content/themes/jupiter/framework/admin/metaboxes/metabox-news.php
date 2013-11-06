<?php
$config  = array(
  'title' => sprintf( '%s News Options', THEME_NAME ),
  'id' => 'mk-metaboxes-tabs',
  'pages' => array(
    'news'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(


  array(
    "type" => "start_sub",
    "options" => array(
      "mk_option_general" => __( "General Setting", 'mk_framework' ),
      "mk_option_post_type" => __( "Post Type", 'mk_framework' ),
      "mk_option_backgrounds" => __('Skining', 'mk_framework'),
      "mk_option_slideshow" => __( "Slideshow", 'mk_framework' ),
    ),
  ),




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
    "default" => 'default',
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "0 30px 30px 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
      "default" => 'page-layout-default',
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
    "desc" => __( "If left Blank the global title which you defined in masterkey settings will be used. You can optionally use a different page title in banner section from this option.", "mk_framework" ),
    "id" => "_custom_page_title",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
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
    "id" => 'mk_option_post_type'
  ),

  array(
    "name" => __( "Post Type", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Post Style", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_news_post_style",
    "default" => 'full-with-image',
    "preview" => false,
    "options" => array(
      "full-with-image" => __( "Full With Image", "mk_framework" ),
      "full-without-image" => __( "Full Without Image", "mk_framework" ),
      "half-with-image" => __( "Half With Image", "mk_framework" ),
      "half-without-image" => __( "Half Without Image", "mk_framework" ),
      "fourth-with-image" => __( "One Fourth With Image", "mk_framework" ),
      "fourth-without-image" => __( "One Fourth Without Image", "mk_framework" ),
    ),
    "option_structure" => 'sub',
    "divider" => true,

    "type" => "chosen_select"
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
    "name" => __("Slideshow Settings", "mk_framework" ),
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
      "menu_order" => __('Menu Order', 'mk_framework'),
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
      "menu_order" => __('Menu Order', 'mk_framework'),
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
      "menu_order" => __('Menu Order', 'mk_framework'),
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
    "type"=>"end_sub"
  ),


);
new metaboxesGenerator( $config, $options );
