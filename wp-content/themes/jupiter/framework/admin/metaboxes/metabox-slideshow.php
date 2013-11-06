<?php
$config  = array(
  'title' => sprintf( '%s Slideshow Options', THEME_NAME ),
  'id' => 'mk-metaboxes-slideshow',
  'pages' => array(
    'slideshow'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(

  array(
    "name" => __( "Caption Title", "mk_framework" ),
    "id" => "_title",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "size" => 100,
    "type" => "text"
  ),

  array(
    "name" => __( "Caption Description", "mk_framework" ),
    "id" => "_description",
    "default" => "",
    "rows" => "3",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "textarea"
  ),


  array(
    "name" => __( "Link To (optional)", "mk_framework" ),
    "desc" => __( "The url that the slider item links to.", "mk_framework" ),
    "id" => "_link_to",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "superlink"
  ),




);
new metaboxesGenerator( $config, $options );
