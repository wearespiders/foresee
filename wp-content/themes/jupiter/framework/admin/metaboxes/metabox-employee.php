<?php
$config  = array(
	'title' => sprintf( '%s Employees Options', THEME_NAME ),
	'id' => 'mk-metaboxes-notab',
	'pages' => array(
		'employees'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(


	array(
		"name" => __( "Employee Position", "mk_framework" ),
		"desc" => __( "Please enter team member's Position in the company.", "mk_framework" ),
		"id" => "_position",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),
	array(
		"name" => __( "About Member", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_desc",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"rows"=> 5,
		"type" => "editor"
	),
	array(
		"name" => __( "Email Address", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_email",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),
		array(
		"name" => __( "Social Network (Facebook)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_facebook",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),

		array(
		"name" => __( "Social Network (Twitter)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_twitter",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),
		array(
		"name" => __( "Social Network (Google Plus)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_googleplus",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),

		array(
		"name" => __( "Social Network (Linked In)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_linkedin",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),

	array(
		"desc" => __( "Please Use the featured image metabox to upload your employee photo and then assign to the post. the image dimensions must be exactly 165px X 165px.", "mk_framework" ),
		"type" => "info"
	),



);
new metaboxesGenerator( $config, $options );
