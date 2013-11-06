<?php
$config  = array(
  'title' => sprintf( '%s Slideshow Options', THEME_NAME ),
  'id' => 'mk-metaboxes-icarousel',
  'pages' => array(
    'icarousel'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(



array(
    "name" => __( "Easing", "mk_framework" ),
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
    "name" => __( "Pause Time", "mk_framework" ),
    "desc" => __( "You can define a pause time for this slide which will override the global pause time.", "mk_framework" ),
    "id" => "_pause_time",
    "min" => "100",
    "max" => "10000",
    "step" => "100",
    "unit" => 'ms',
    "default" => '1000',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

array(
    "desc" => __( "Please Use the featured image metabox to upload your images. Images will be cropped to fit its container.", "mk_framework" ),
    "type" => "info"
  ),

);
new metaboxesGenerator( $config, $options );
