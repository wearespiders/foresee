<?php

vc_map( array(
        "name"      => __( "Social Networks", "mk_framework" ),
        "base"      => "mk_social_networks",
        "class"     => "mk-social-networks-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Size", "mk_framework" ),
                "param_name" => "size",
                "value" => array(
                    "Small" => "small",
                    "Medium" => "medium",
                    "Large" => "large",
                    "X Large" => "x-large",
                    "XX Large" => "xx-large",
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "value" => array(
                    "Rounded" => "rounded",
                    "Circle" => "circle",
                    "Simple" => "simple",
                ),
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin", "mk_framework" ),
                "param_name" => "margin",
                "value" => "4",
                "min" => "0",
                "max" => "50",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "How much distance between icons? this margin will be applied to all directions.", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Icons Color", "mk_framework" ),
                "param_name" => "icon_color",
                "value" => "#ccc",
                "description" => __( "Choose which color would you like on icons normal state. default: #ccc", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Icons Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right", __( 'Center', "mk_framework" ) => "center" ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Facebook URL", "mk_framework" ),
                "param_name" => "facebook",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Twitter URL", "mk_framework" ),
                "param_name" => "twitter",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "RSS URL", "mk_framework" ),
                "param_name" => "rss",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Dribbble URL", "mk_framework" ),
                "param_name" => "dribbble",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Digg URL", "mk_framework" ),
                "param_name" => "digg",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Pinterest URL", "mk_framework" ),
                "param_name" => "pinterest",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Flickr URL", "mk_framework" ),
                "param_name" => "flickr",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Google Plus URL", "mk_framework" ),
                "param_name" => "google_plus",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Linkedin URL", "mk_framework" ),
                "param_name" => "linkedin",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Blogger URL", "mk_framework" ),
                "param_name" => "blogger",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Youtube URL", "mk_framework" ),
                "param_name" => "youtube",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Last-fm URL", "mk_framework" ),
                "param_name" => "last_fm",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Stumble-upon URL", "mk_framework" ),
                "param_name" => "stumble_upon",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Tumblr URL", "mk_framework" ),
                "param_name" => "tumblr",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Vimeo URL", "mk_framework" ),
                "param_name" => "vimeo",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Wordpress URL", "mk_framework" ),
                "param_name" => "wordpress",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Yelp URL", "mk_framework" ),
                "param_name" => "yelp",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Reddit URL", "mk_framework" ),
                "param_name" => "reddit",
                "value" => "",
                "description" => __( "Fill this textbox with the full URL of your corresponding social netowork. include (http://). if left blank this social network icon wont be shown.", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework" )
            )

        )
    )
);


vc_map( array(
        "name"      => __( "Skype Number", "mk_framework" ),
        "base"      => "mk_skype",
        "class"     => "mk-social-networks-class",
        "controls"  => "edit_popup_delete",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Your Skype Number (Display)", "mk_framework" ),
                "param_name" => "display_number",
                "value" => "",
                "description" => __( "Please provide your skype number, when user clicks on the link it will call you if user has already installed skype. Feel Free to make spaces.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Your Skype Number (exact number)", "mk_framework" ),
                "param_name" => "number",
                "value" => "",
                "description" => __( "Please write down the skype number exactly how you dial a number : without spaces.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework" )
            )

        )
    )
);


vc_map( array(
        "name"      => __( "Twitter Feeds", "mk_framework" ),
        "base"      => "vc_twitter",
        "class"     => "mk-twitter-feeds-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Widget Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Twitter name", "mk_framework" ),
                "param_name" => "twitter_name",
                "value" => "",
                "description" => __( "Type in twitter profile name from which load tweets.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Tweets count", "mk_framework" ),
                "param_name" => "tweets_count",
                "value" => "5",
                "min" => "1",
                "max" => "30",
                "step" => "1",
                "unit" => 'tweets',
                "description" => __( "How many recent tweets to load.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        )
    ) );


vc_map( array(
        "name"      => __( "Facebook like", "mk_framework" ),
        "base"      => "vc_facebook",
        "class"     => "mk-facebook-like-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Button type", "mk_framework" ),
                "param_name" => "type",
                "value" => array( __( "Standard", "mk_framework" ) => "standard", __( "Button count", "mk_framework" ) => "button_count", __( "Box count", "mk_framework" ) => "box_count" ),
                "description" => __( "Select button type.", "mk_framework" )
            ),
             array(
                "type" => "textfield",
                "heading" => __( "Custom URL", "mk_framework" ),
                "param_name" => "custom_url",
                "value" => "",
                "description" => __( "Please insert your custom URL, otherwise leave it blank and the current page URL will be used instead.", "mk_framework" )
            )
        )
    ) );

vc_map( array(
        "name"      => __( "Tweetmeme button", "mk_framework" ),
        "base"      => "vc_tweetme",
        "class"     => "mk-tweet-me-class",
        "controls"  => "edit_popup_delete",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Button type", "mk_framework" ),
                "param_name" => "type",
                "value" => array( __( "Horizontal", "mk_framework" ) => "horizontal", __( "Vertical", "mk_framework" ) => "vertical", __( "None", "mk_framework" ) => "none" ),
                "description" => __( "Select button type.", "mk_framework" )
            )
        )
    ) );

vc_map( array(
        "name"      => __( "Google+ button", "mk_framework" ),
        "base"      => "vc_googleplus",
        "class"     => "mk-google-plus-share-class",
        "controls"  => "edit_popup_delete",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Button size", "mk_framework" ),
                "param_name" => "type",
                "value" => array( __( "Standard", "mk_framework" ) => "", __( "Small", "mk_framework" ) => "small", __( "Medium", "mk_framework" ) => "medium", __( "Tall", "mk_framework" ) => "tall" ),
                "description" => __( "Select button type.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Annotation", "mk_framework" ),
                "param_name" => "annotation",
                "value" => array( __( "Inline", "mk_framework" ) => "inline", __( "Bubble", "mk_framework" ) => "", __( "None", "mk_framework" ) => "none" ),
                "description" => __( "Select annotation type.", "mk_framework" )
            )
        )
    ) );

vc_map( array(
        "name"      => __( "Pinterest button", "mk_framework" ),
        "base"      => "vc_pinterest",
        "class"     => "mk-pinterest-feed-class",
        "controls"  => "popup_delete",
        "show_settings_on_create" => false,
        "category" => __( 'Social', 'mk_framework' ),
    ) );






vc_map( array(
        "name"      => __( "Video player", "mk_framework" ),
        "base"      => "vc_video",
        "class"     => "mk-video-player-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Widget Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Video link", "mk_framework" ),
                "param_name" => "link",
                "value" => "",
                "description" => __( 'Link to the video. More about supported formats at <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>.', "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Viewport Animation", "mk_framework" ),
                "param_name" => "animation",
                "value" => $css_animations,
                "description" => __( "Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        )
    ) );

vc_map( array(
        "name"      => __( "Google maps", "mk_framework" ),
        "base"      => "vc_gmaps",
        "class"     => "mk-google-maps-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Widget Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Google map link", "mk_framework" ),
                "param_name" => "link",
                "value" => "",
                "description" => __( 'Link to your map. Visit <a href="http://maps.google.com" target="_blank">Google maps</a> find your address and then click "Link" button to obtain your map link.', "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Map height", "mk_framework" ),
                "param_name" => "size",
                "value" => "300",
                "min" => "1",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( 'Enter map height in pixels. Example: 200).', "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Map type", "mk_framework" ),
                "param_name" => "type",
                "value" => array( __( "Map", "mk_framework" ) => "m", __( "Satellite", "mk_framework" ) => "k", __( "Map + Terrain", "mk_framework" ) => "p" ),
                "description" => __( "Select button alignment.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Map Zoom", "mk_framework" ),
                "param_name" => "zoom",
                "value" => "14",
                "min" => "1",
                "max" => "20",
                "step" => "1",
                "unit" => 'zoom',

            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Frame Style", "mk_framework" ),
                "param_name" => "frame_style",
                "value" => array(
                    "No Frame" => "simple",
                    "Rounded Frame" => "rounded",
                    "Gray Border Frame" => "gray_border",
                    "Border With Shadow" => "border_shadow",
                    "Shadow Only" => "shadow_only",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        )
    ) );





vc_map( array(
        "base"      => "vc_flickr",
        "name"      => __( "Flickr Feeds", "mk_framework" ),
        "class"     => "mk-flickr-feeds-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Widget Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Flickr ID", "mk_framework" ),
                "param_name" => "flickr_id",
                "value" => "",
                "description" => __( 'To find your flickID visit <a href="http://idgettr.com/" target="_blank">idGettr</a>', "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Number of photos", "mk_framework" ),
                "param_name" => "count",
                "value" => "6",
                "min" => "1",
                "max" => "30",
                "step" => "1",
                "unit" => 'photos',
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Thumbnail Size", "mk_framework" ),
                "param_name" => "thumb_size",
                "value" => array( __( "Small", "mk_framework" ) => "s", __( "Medium", "mk_framework" ) => "m", __( "Thumbnail", "mk_framework" ) => "t" ),
                "description" => __( "Photo order", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Type", "mk_framework" ),
                "param_name" => "type",
                "value" => array( __( "User", "mk_framework" ) => "user", __( "Group", "mk_framework" ) => "group" ),
                "description" => __( "Photo stream type", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Display", "mk_framework" ),
                "param_name" => "display",
                "value" => array( __( "Latest", "mk_framework" ) => "latest", __( "Random", "mk_framework" ) => "random" ),
                "description" => __( "Photo order", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        )
    ) );


vc_map( array(
        "base"      => "mk_contact_form",
        "name"      => __( "Contact Form", "mk_framework" ),
        "class"     => "mk-contact-form-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Heading Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" ),

            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "value" => array( __( "Modern", "mk_framework" ) => "modern", __( "Classic", "mk_framework" ) => "classic"),
                "description" => __( "Choose your contact form style", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Skin", "mk_framework" ),
                "param_name" => "skin",
                "value" => array( __( "Dark", "mk_framework" ) => "dark", __( "Light", "mk_framework" ) => "light"),
                "description" => __( "Choose your contact form style", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'modern' ) )
            ),

            
            array(
                "type" => "textfield",
                "heading" => __( "Email", "mk_framework" ),
                "param_name" => "email",
                "value" => "",
                "description" => sprintf( __( 'Which email would you like the contacts to be sent, if left empty emails will be sent to admin email : "%s"', "mk_framework" ), get_bloginfo( 'admin_email' ) ),

            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        )
    ) );




vc_map( array(
        "base"      => "mk_contact_info",
        "name"      => __( "Contact Info", "mk_framework" ),
        "class"     => "mk-contact-info-class",
        "category" => __( 'Social', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Phone", "mk_framework" ),
                "param_name" => "phone",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Fax", "mk_framework" ),
                "param_name" => "fax",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Email", "mk_framework" ),
                "param_name" => "email",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Address", "mk_framework" ),
                "param_name" => "address",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Person", "mk_framework" ),
                "param_name" => "person",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Company", "mk_framework" ),
                "param_name" => "company",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skype Username", "mk_framework" ),
                "param_name" => "skype",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Website", "mk_framework" ),
                "param_name" => "website",
                "value" => ""
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        ),
    ) );





