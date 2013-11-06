<?php
$config  = array(
	'title' => sprintf( '%s Testimonials Options', THEME_NAME ),
	'id' => 'mk-metaboxes-notab',
	'pages' => array(
		'testimonial'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
array(
		"name" => __( "Testimonial Author Name", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_author",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),
array(
		"name" => __( "Testimonial Author Company Name", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_company",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),
	array(
		"name" => __( "URL to Testimonial Author's Website (optional)", "mk_framework" ),
		"desc" => __( "include http://", "mk_framework" ),
		"id" => "_url",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),
	array(
		"name" => __( "Quote", "mk_framework" ),
		"desc" => __( "Please fill below area with the quote", "mk_framework" ),
		"id" => "_desc",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => false,
		"rows"=> 5,
		"type" => "editor"
	),


array(
		"desc" => __( "Please Use the featured image metabox to upload testimonial author's portraite and then assign to the post. This image will be dynamically resized and cropped, therefore in order to have the perfect image quality, dimensions should be exactly 120px X 120px.", "mk_framework" ),
		"type" => "info"
	),

);
new metaboxesGenerator( $config, $options );
