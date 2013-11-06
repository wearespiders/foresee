<?php
vc_map( array(
        "name"      => __( "Image Slideshow", "mk_framework" ),
        "base"      => "mk_image_slideshow",
        "class"     => "mk-image-slider-class",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Heading Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "attach_images",
                "heading" => __( "Add Images", "mk_framework" ),
                "param_name" => "images",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),


            array(
                "type" => "range",
                "heading" => __( "Width", "mk_framework" ),
                "param_name" => "image_width",
                "value" => "770",
                "min" => "100",
                "max" => "1380",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Height", "mk_framework" ),
                "param_name" => "image_height",
                "value" => "350",
                "min" => "100",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "heading" => __( "Animation Effect", 'mk_framework' ),
                "description" => __( "", 'mk_framework' ),
                "param_name" => "effect",
                "value" => array(
                    __( "Fade", 'mk_framework' )  =>  "fade",
                    __( "Slide", 'mk_framework' ) =>  "slide",
                ),
                "type" => "dropdown"
            ),

            array(
                "type" => "range",
                "heading" => __( "Animation Speed", "mk_framework" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Slideshow Speed", "mk_framework" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Pause on Hover", "mk_framework" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => __( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Smooth Height", "mk_framework" ),
                "param_name" => "smooth_height",
                "value" => "true",
                "description" => __( "Allow height of the slider to animate smoothly in horizontal mode", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Direction Nav", "mk_framework" ),
                "param_name" => "direction_nav",
                "value" => "true",
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Fullwidth Slideshow", "mk_framework" ),
        "base"      => "mk_fullwidth_slideshow",
        "class"     => "mk-image-slider-class",
        "controls"  => "edit_popup_delete",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "color",
                "heading" => __( "Border Top and Bottom Color", "mk_framework" ),
                "param_name" => "border_color",
                "value" => "#eaeaea",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Box Background Color", "mk_framework" ),
                "param_name" => "bg_color",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Background Image", "mk_framework" ),
                "param_name" => "bg_image",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Background Attachment", "mk_framework" ),
                "param_name" => "attachment",
                "width" => 150,
                "value" => array( __( 'Scroll', "mk_framework" ) => "scroll", __( 'Fixed', "mk_framework" ) => "fixed" ),
                "description" => __( "The background-attachment property sets whether a background image is fixed or scrolls with the rest of the page. <a href='http://www.w3schools.com/CSSref/pr_background-attachment.asp'>Read More</a>", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Background Position", "mk_framework" ),
                "param_name" => "bg_position",
                "width" => 300,
                "value" => array(
                    __( 'Left Top', "mk_framework" ) => "left top",
                    __( 'Center Top', "mk_framework" ) => "center top",
                    __( 'Right Top', "mk_framework" ) => "right top",
                    __( 'Left Center', "mk_framework" ) => "left center",
                    __( 'Center Center', "mk_framework" ) => "center center",
                    __( 'Right Center', "mk_framework" ) => "right center",
                    __( 'Left Bottom', "mk_framework" ) => "left bottom",
                    __( 'Center Bottom', "mk_framework" ) => "center bottom",
                    __( 'Right Bottom', "mk_framework" ) => "right bottom",
                ),
                "description" => __( "First value defines horizontal position and second vertical positioning.", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Enable 3D background", "mk_framework" ),
                "param_name" => "enable_3d",
                "value" => "false",
            ),
            array(
                "type" => "range",
                "heading" => __( "3D Speed Factor", "mk_framework" ),
                "param_name" => "speed_factor",
                "min" => "-10",
                "max" => "10",
                "step" => "0.1",
                "unit" => 'factor',
                "value" => "4",
                "type" => "range"
            ),
            array(
                "type" => "attach_images",
                "heading" => __( "Add Images", "mk_framework" ),
                "param_name" => "images",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "heading" => __( "Animation Effect", 'mk_framework' ),
                "description" => __( "", 'mk_framework' ),
                "param_name" => "effect",
                "value" => array(
                    __( "Fade", 'mk_framework' )  =>  "fade",
                    __( "Slide", 'mk_framework' ) =>  "slide",
                ),
                "type" => "dropdown"
            ),

            array(
                "type" => "range",
                "heading" => __( "Animation Speed", "mk_framework" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Slideshow Speed", "mk_framework" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Pause on Hover", "mk_framework" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => __( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Smooth Height", "mk_framework" ),
                "param_name" => "smooth_height",
                "value" => "true",
                "description" => __( "Allow height of the slider to animate smoothly in horizontal mode", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Direction Nav", "mk_framework" ),
                "param_name" => "direction_nav",
                "value" => "true",
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Laptop Slideshow", "mk_framework" ),
        "base"      => "mk_laptop_slideshow",
        "class"     => "mk-image-slider-class",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "attach_images",
                "heading" => __( "Add Images", "mk_framework" ),
                "param_name" => "images",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "heading" => __( "Size", 'mk_framework' ),
                "description" => __( "", 'mk_framework' ),
                "param_name" => "size",
                "value" => array(
                    __( "Full Width", 'mk_framework' )  =>  "full",
                    __( "One Half", 'mk_framework' ) =>  "one-half",
                    __( "One Third", 'mk_framework' ) =>  "one-third",
                    __( "One Fourth", 'mk_framework' ) =>  "one-fourth",
                ),
                "type" => "dropdown"
            ),
            array(
                "type" => "range",
                "heading" => __( "Animation Speed", "mk_framework" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Slideshow Speed", "mk_framework" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Pause on Hover", "mk_framework" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => __( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework" )
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
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework" )
            )

        )
    )
);

vc_map( array(
        "name"      => __( "LCD Slideshow", "mk_framework" ),
        "base"      => "mk_lcd_slideshow",
        "class"     => "mk-image-slider-class",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "attach_images",
                "heading" => __( "Add Images", "mk_framework" ),
                "param_name" => "images",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Animation Speed", "mk_framework" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Slideshow Speed", "mk_framework" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Pause on Hover", "mk_framework" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => __( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework" )
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
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework" )
            )

        )
    )
);

vc_map( array(
        "name"      => __( "Flexslider", "mk_framework" ),
        "base"      => "mk_flexslider",
        "class"     => "mk-flexslider-class",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Count", "mk_framework" ),
                "param_name" => "count",
                "value" => "10",
                "min" => "-1",
                "max" => "50",
                "step" => "1",
                "unit" => 'slides',
                "description" => __( "How many slides you would like to show? (-1 means unlimited)", "mk_framework" )
            ),
            array(
                "type" => "multiselect",
                "heading" => __( "Select specific slides", "mk_framework" ),
                "param_name" => "slides",
                "value" => '',
                "options" => $flexslider,
                "description" => __( "", "mk_framework" )
            ),

            array(
                "heading" => __( "Order", 'mk_framework' ),
                "description" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
                "param_name" => "order",
                "value" => array(
                    __( "ASC (ascending order)", 'mk_framework' ) => "ASC",
                    __( "DESC (descending order)", 'mk_framework' ) => "DESC"
                ),
                "type" => "dropdown"
            ),
            array(
                "heading" => __( "Orderby", 'mk_framework' ),
                "description" => __( "Sort retrieved slides items by parameter.", 'mk_framework' ),
                "param_name" => "orderby",
                "value" => $mk_orderby,
                "type" => "dropdown"
            ),
            array(
                "type" => "range",
                "heading" => __( "Height", "mk_framework" ),
                "param_name" => "image_height",
                "value" => "350",
                "min" => "100",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Width", "mk_framework" ),
                "param_name" => "image_width",
                "value" => "770",
                "min" => "100",
                "max" => "1380",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "heading" => __( "Animation Effect", 'mk_framework' ),
                "description" => __( "", 'mk_framework' ),
                "param_name" => "effect",
                "value" => array(
                    __( "Fade", 'mk_framework' )  =>  "fade",
                    __( "Slide", 'mk_framework' ) =>  "slide",
                ),
                "type" => "dropdown"
            ),

            array(
                "type" => "range",
                "heading" => __( "Animation Speed", "mk_framework" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Slideshow Speed", "mk_framework" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Pause on Hover", "mk_framework" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => __( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Smooth Height", "mk_framework" ),
                "param_name" => "smooth_height",
                "value" => "true",
                "description" => __( "Allow height of the slider to animate smoothly in horizontal mode", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Direction Nav", "mk_framework" ),
                "param_name" => "direction_nav",
                "value" => "true",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Caption Background Color", "mk_framework" ),
                "param_name" => "caption_bg_color",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Caption Text Color", "mk_framework" ),
                "param_name" => "caption_color",
                "value" => "#fff",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Caption Opacity", "mk_framework" ),
                "param_name" => "caption_bg_opacity",
                "value" => "0.6",
                "min" => "0.1",
                "max" => "1",
                "step" => "0.1",
                "unit" => 'alpha',
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Layerslider", "mk_framework" ),
        "base"      => "mk_layerslider",
        "class"     => "mk-flexslider-class",
        "controls"  => "edit_popup_delete",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "dropdown",
                "heading" => __( "Select Slideshow", "mk_framework" ),
                "param_name" => "id",
                "value" => $layer_slider,
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Revolution Slider", "mk_framework" ),
        "base"      => "mk_revslider",
        "class"     => "mk-flexslider-class",
        "controls"  => "edit_popup_delete",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "dropdown",
                "heading" => __( "Select Slideshow", "mk_framework" ),
                "param_name" => "id",
                "value" => $rev_slider,
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Testimonial Slideshow", "mk_framework" ),
        "base"      => "mk_testimonials",
        "class"     => "mk-testimonial-slider-class",
        "category" => __( 'Slideshows', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "heading" => __( "Style", 'mk_framework' ),
                "description" => __( "", 'mk_framework' ),
                "param_name" => "style",
                "value" => array(
                    __( "Boxed", 'mk_framework' ) => "boxed",
                    __( "Modern", 'mk_framework' ) => "modern",
                    __( "Simple Centered", 'mk_framework' ) => "simple"
                ),
                "type" => "dropdown"
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Skin", "mk_framework" ),
                "param_name" => "skin",
                "value" => array( __( 'Dark', "mk_framework" ) => "dark", __( 'Light', "mk_framework" ) => "light" ),
                "description" => __( "This option is only for 'Simple Centered' style and you can use it when you need to place this shortcode inside a page section with dark background.", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'simple' ) )
            ),
            array(
                "type" => "range",
                "heading" => __( "Count", "mk_framework" ),
                "param_name" => "count",
                "value" => "10",
                "min" => "-1",
                "max" => "50",
                "step" => "1",
                "unit" => 'testimonial',
                "description" => __( "How many testimonial you would like to show? (-1 means unlimited)", "mk_framework" )
            ),
            array(
                "type" => "multiselect",
                "heading" => __( "Select specific testimonials", "mk_framework" ),
                "param_name" => "testimonials",
                "value" => '',
                "options" => $testimonials,
                "description" => __( "", "mk_framework" )
            ),

            array(
                "heading" => __( "Order", 'mk_framework' ),
                "description" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
                "param_name" => "order",
                "value" => array(
                    __( "ASC (ascending order)", 'mk_framework' ) => "ASC",
                    __( "DESC (descending order)", 'mk_framework' ) => "DESC"
                ),
                "type" => "dropdown"
            ),
            array(
                "heading" => __( "Orderby", 'mk_framework' ),
                "description" => __( "Sort retrieved client items by parameter.", 'mk_framework' ),
                "param_name" => "orderby",
                "value" => $mk_orderby,
                "type" => "dropdown"
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
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework" )
            )

        )
    )
);
