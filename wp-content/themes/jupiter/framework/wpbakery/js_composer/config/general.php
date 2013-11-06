<?php

vc_map( array(
        "name" => __( "Row", "mk_framework" ),
        "base" => "vc_row",
        "is_container" => true,
        "show_settings_on_create" => false,
        "category" => __( 'General', 'mk_framework' ),
        "params" => array(
            array(
                "type" => "toggle",
                "heading" => __( "Fullwidth Row?.", "mk_framework" ),
                "param_name" => "fullwidth",
                "value" => "false",
                "description" => __( "If you enable this option, this row will no longer follow the main grid width and will stretch 100% to screen width.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        ),
        "js_view" => 'VcRowView'
    ) );
vc_map( array(
        "name" => __( "Row", "mk_framework" ),
        "base" => "vc_row_inner",
        "content_element" => false,
        "is_container" => true,
        "show_settings_on_create" => false,
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        ),
        "js_view" => 'VcRowView'
    ) );
vc_map( array(
        "name" => __( "Column", "mk_framework" ),
        "base" => "vc_column",
        "is_container" => true,
        "content_element" => false,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        ),
        "js_view" => 'VcColumnView'
    ) );

vc_map( array(
        "name"      => __( "Page Section", "mk_framework" ),
        "base"      => "mk_page_section",
        "category" => __( 'General', 'mk_framework' ),
        "is_container" => true,
        "show_settings_on_create" => false,
        "params"    => array(
            array(
                "type" => "color",
                "heading" => __( "Border Top and Bottom Color", "mk_framework" ),
                "param_name" => "border_color",
                "value" => "",
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
                "heading" => __( "Background Pattern", 'mk_framework' ),
                "description" => __( "You can optionally select a pattern for this section background. This option only works when background image field is empty (above option).", 'mk_framework' ),
                "param_name" => "predefined_bg",
                "border" => 'true',
                "value" => array(
                    'pattern/no-image.png' => "",
                    'pattern/1.png' => "1",
                    'pattern/2.png' => "2",
                    'pattern/3.png' => "3",
                    'pattern/4.png' => "4",
                    'pattern/5.png' => "5",
                    'pattern/6.png' => "6",
                    'pattern/7.png' => "7",
                    'pattern/8.png' => "8",
                    'pattern/9.png' => "9",
                    'pattern/10.png' => "10",
                    'pattern/11.png' => "11",
                    'pattern/12.png' => "12",
                    'pattern/13.png' => "13",
                    'pattern/14.png' => "14",
                    'pattern/15.png' => "15",
                    'pattern/16.png' => "16",
                    'pattern/17.png' => "17",
                    'pattern/18.png' => "18",
                    'pattern/19.png' => "19",
                    'pattern/20.png' => "20",
                    'pattern/21.png' => "21",
                    'pattern/22.png' => "22",
                    'pattern/23.png' => "23",
                    'pattern/24.png' => "24",
                    'pattern/25.png' => "25",
                    'pattern/26.png' => "26",
                    'pattern/27.png' => "27",
                    'pattern/28.png' => "28",
                    'pattern/29.png' => "29",
                    'pattern/30.png' => "30",
                    'pattern/31.png' => "31",
                    'pattern/32.png' => "32",
                    'pattern/33.png' => "33",

                ),
                "type" => "visual_selector"
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
                "type" => "dropdown",
                "heading" => __( "Background Repeat", "mk_framework" ),
                "param_name" => "bg_repeat",
                "width" => 300,
                "value" => array(
                    __( 'Repeat', "mk_framework" ) => "repeat",
                    __( 'No Repeat', "mk_framework" ) => "no-repeat",
                    __( 'Horizontally repeat', "mk_framework" ) => "repeat-x",
                    __( 'Vertically Repeat', "mk_framework" ) => "repeat-y",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Stretch Background Image to fit the container.", "mk_framework" ),
                "param_name" => "bg_stretch",
                "value" => "false",
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
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Background Video?", "mk_framework" ),
                "param_name" => "bg_video",
                "width" => 300,
                "value" => array(
                    __( 'No', "mk_framework" ) => "no",
                    __( 'Yes', "mk_framework" ) => "yes",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Background Video (MP4 format)", "mk_framework" ),
                "param_name" => "mp4",
                "value" => "",
                "description" => __( "Compatibility for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7", "mk_framework" ),
                "dependency" => array( 'element' => "bg_video", 'value' => array( 'yes' ) )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Background Video (WebM format)", "mk_framework" ),
                "param_name" => "webm",
                "value" => "",
                "description" => __( "Compatibility for Firefox4, Opera, and Chrome", "mk_framework" ),
                "dependency" => array( 'element' => "bg_video", 'value' => array( 'yes' ) )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Background Video Preview image (and fallback image)", "mk_framework" ),
                "param_name" => "poster_image",
                "value" => "",
                "description" => __( "This Image will shown until video load. in case of video is not supported or did not load the image will remain as fallback.", "mk_framework" ),
                "dependency" => array( 'element' => "bg_video", 'value' => array( 'yes' ) )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Video Mask Pattern? (optional)", "mk_framework" ),
                "param_name" => "video_mask",
                "description" => __( "If you enable this option a pattern will overlay the video.", "mk_framework" ),
                "value" => "false",
                "dependency" => array( 'element' => "bg_video", 'value' => array( 'yes' ) )
            ),
            array(
                "type" => "color",
                "heading" => __( "Video Color Mask (optional)", "mk_framework" ),
                "param_name" => "video_color_mask",
                "value" => "",
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "bg_video", 'value' => array( 'yes' ) )
            ),
            array(
                "type" => "range",
                "heading" => __( "Video Color Mask Opacity", "mk_framework" ),
                "param_name" => "video_opacity",
                "value" => "0.6",
                "min" => "0",
                "max" => "1",
                "step" => "0.1",
                "unit" => 'alpha',
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "bg_video", 'value' => array( 'yes' ) )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Drop Top Shadow", "mk_framework" ),
                "description" => __( "If you enable this option, a light inset shadow will appear inside page section > below top border.", 'mk_framework' ),
                "param_name" => "top_shadow",
                "value" => "false",
            ),
            array(
                "heading" => __( "Select Section Layout", 'mk_framework' ),
                "description" => __( "Please select your section layout. if you choose left or right sidebar layout you should consider choosing a custom sidebar for this page.", 'mk_framework' ),
                "param_name" => "section_layout",
                "border" => 'false',
                "value" => array(
                    "page-layout-full.png" => 'full',
                    "page-layout-left.png" => 'left',
                    "page-layout-right.png" => 'right',
                ),
                "type" => "visual_selector"
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Custom Sidebar", "mk_framework" ),
                "param_name" => "sidebar",
                "width" => 400,
                "value" => $custom_sidebars,
                "description" => __( "Please select the custom sidebar area you would like to show in this page section.", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Box Min Height", "mk_framework" ),
                "param_name" => "min_height",
                "value" => "100",
                "min" => "0",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Padding Top", "mk_framework" ),
                "param_name" => "padding_top",
                "value" => "10",
                "min" => "0",
                "max" => "200",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "This option defines how much top distance you need to have inside this section", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Padding Bottom", "mk_framework" ),
                "param_name" => "padding_bottom",
                "value" => "10",
                "min" => "0",
                "max" => "200",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "This option defines how much bottom distance you need to have inside this section", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Bottom", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "0",
                "min" => "0",
                "max" => "200",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "First section in current page?", "mk_framework" ),
                "param_name" => "first_page",
                "description" => __( "If this shortcode is the First element on current page enable this option. This will remove extra space between this section and header.", "mk_framework" ),
                "value" => "false",
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Last section in current page?", "mk_framework" ),
                "param_name" => "last_page",
                "description" => __( "If this shortcode is the last element on current page enable this option. This will remove extra space between this section and footer.", "mk_framework" ),
                "value" => "false",
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Section ID", "mk_framework" ),
                "param_name" => "section_id",
                "value" => "",
                "description" => __( "You can user this field to give your page section a unique ID. please note that this should be used only once in a page.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            ),

        ),
        "js_view" => 'VcRowView'
    ) );

vc_map( array(
        "name"      => __( "Custom Box", "mk_framework" ),
        "base"      => "mk_custom_box",
        "is_container" => true,
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            /*array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Content", "mk_framework" ),
                "param_name" => "content",
                "value" => "",
                "description" => __( "You can insert any type of content including shortcodes.", "mk_framework" )
            ),*/
            array(
                "type" => "color",
                "heading" => __( "Border Color", "mk_framework" ),
                "param_name" => "border_color",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Background Color", "mk_framework" ),
                "param_name" => "bg_color",
                "value" => "#f6f6f6",
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
                "type" => "dropdown",
                "heading" => __( "Background Repeat", "mk_framework" ),
                "param_name" => "bg_repeat",
                "width" => 300,
                "value" => array(
                    __( 'Repeat', "mk_framework" ) => "repeat",
                    __( 'No Repeat', "mk_framework" ) => "no-repeat",
                    __( 'Horizontally repeat', "mk_framework" ) => "repeat-x",
                    __( 'Vertically Repeat', "mk_framework" ) => "repeat-y",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Stretch Background Image to fit the container.", "mk_framework" ),
                "param_name" => "bg_stretch",
                "value" => "false",
            ),
            array(
                "heading" => __( "Background Pattern", 'mk_framework' ),
                "description" => __( "You can optionally select a pattern for this section background. This option only works when background image field is empty.", 'mk_framework' ),
                "param_name" => "predefined_bg",
                "border" => 'true',
                "value" => array(
                    'pattern/no-image.png' => "",
                    'pattern/1.png' => "1",
                    'pattern/2.png' => "2",
                    'pattern/3.png' => "3",
                    'pattern/4.png' => "4",
                    'pattern/5.png' => "5",
                    'pattern/6.png' => "6",
                    'pattern/7.png' => "7",
                    'pattern/8.png' => "8",
                    'pattern/9.png' => "9",
                    'pattern/10.png' => "10",
                    'pattern/11.png' => "11",
                    'pattern/12.png' => "12",
                    'pattern/13.png' => "13",
                    'pattern/14.png' => "14",
                    'pattern/15.png' => "15",
                    'pattern/16.png' => "16",
                    'pattern/17.png' => "17",
                    'pattern/18.png' => "18",
                    'pattern/19.png' => "19",
                    'pattern/20.png' => "20",
                    'pattern/21.png' => "21",
                    'pattern/22.png' => "22",
                    'pattern/23.png' => "23",
                    'pattern/24.png' => "24",
                    'pattern/25.png' => "25",
                    'pattern/26.png' => "26",
                    'pattern/27.png' => "27",
                    'pattern/28.png' => "28",
                    'pattern/29.png' => "29",
                    'pattern/30.png' => "30",
                    'pattern/31.png' => "31",
                    'pattern/32.png' => "32",
                    'pattern/33.png' => "33",

                ),
                "type" => "visual_selector"
            ),
            array(
                "type" => "range",
                "heading" => __( "Padding Top and Bottom", "mk_framework" ),
                "param_name" => "padding_vertical",
                "value" => "30",
                "min" => "0",
                "max" => "200",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Padding Left and Right", "mk_framework" ),
                "param_name" => "padding_horizental",
                "value" => "20",
                "min" => "0",
                "max" => "200",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Bottom", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "10",
                "min" => "0",
                "max" => "200",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Section Min Height", "mk_framework" ),
                "param_name" => "min_height",
                "value" => "100",
                "min" => "0",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
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
        ),
        "js_view" => 'VcColumnView'
    ) );

vc_map( array(
        "name"      => __( "Content Box", "mk_framework" ),
        "base"      => "mk_content_box",
        "is_container" => true,
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose Icons", "mk_framework" ),
                "param_name" => "icon",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "Optionally you can insert icon into Container Title.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Title Heading", "mk_framework" ),
                "param_name" => "heading",
                "value" => "",
                "description" => __( "Please add a title to your container box.", "mk_framework" )
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
        ),
        "js_view" => 'VcColumnView'
    ) );

vc_map( array(
        "name"      => __( "Image", "mk_framework" ),
        "base"      => "mk_image",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Heading Title", "mk_framework" ),
                "param_name" => "heading_title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "upload",
                "heading" => __( "Uplaod Your image", "mk_framework" ),
                "param_name" => "src",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Image Width", "mk_framework" ),
                "param_name" => "image_width",
                "value" => "800",
                "min" => "10",
                "max" => "2600",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Image Height", "mk_framework" ),
                "param_name" => "image_height",
                "value" => "350",
                "min" => "10",
                "max" => "5000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Image Cropping", "mk_framework" ),
                "param_name" => "crop",
                "value" => "true",
                "description" => __( "If you dont want to crop your image based on the dimensions you defined above disable this option. Only wdith will be used to give the image container max-width property.", "mk_framework" )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Lightbox", "mk_framework" ),
                "param_name" => "lightbox",
                "value" => "false",
                "description" => __( "If you would like to have lightbox (image zoom in a frame) enable this option.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Custom Lightbox URL", "mk_framework" ),
                "param_name" => "custom_lightbox",
                "value" => "",
                "description" => __( "You can use this field to add your custom lightbox URL to appear in pop up box. it can be image SRC, youtube URL.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Lightbox Group rel", "mk_framework" ),
                "param_name" => "group",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Image Frame Style", "mk_framework" ),
                "param_name" => "frame_style",
                "value" => array(
                    "No Frame" => "simple",
                    "Rounded Frame" => "rounded",
                    "Single Line Frame" => "single_line",
                    "Gray Border Frame" => "gray_border",
                    "Border With Shadow" => "border_shadow",
                    "Shadow Only" => "shadow_only",
                ),
                "description" => __( "", "mk_framework" )
            ),


            array(
                "type" => "textfield",
                "heading" => __( "Image Link", "mk_framework" ),
                "param_name" => "link",
                "value" => "",
                "description" => __( "Optionally you can link your image.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Target", "mk_framework" ),
                "param_name" => "target",
                "width" => 200,
                "value" => $target_arr,
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Image Caption Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Image Caption Description", "mk_framework" ),
                "param_name" => "desc",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Image Caption Location", "mk_framework" ),
                "param_name" => "caption_location",
                "value" => array(
                    "Inside Image" => "inside-image",
                    "Outside Image" => "outside-image",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right", __( 'Center', "mk_framework" ) => "center" ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Bottom", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "10",
                "min" => "-50",
                "max" => "300",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
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
            ),



        )
    )
);




vc_map( array(
        "name"      => __( "Circle Image Frame", "mk_framework" ),
        "base"      => "mk_circle_image",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Heading Title", "mk_framework" ),
                "param_name" => "heading_title",
                "value" => "",
                "description" => __( "You can Optionally have title for this shortcode.", "mk_framework" )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Uplaod Your image", "mk_framework" ),
                "param_name" => "src",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Image Diameter", "mk_framework" ),
                "param_name" => "image_diameter",
                "value" => "500",
                "min" => "10",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Image Link", "mk_framework" ),
                "param_name" => "link",
                "value" => "",
                "description" => __( "Optionally you can link your image.", "mk_framework" )
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
            ),
        )
    )
);



vc_map( array(
        "name"      => __( "Moving Image", "mk_framework" ),
        "base"      => "mk_moving_image",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "upload",
                "heading" => __( "Uplaod Your image", "mk_framework" ),
                "param_name" => "src",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Moving Axis", "mk_framework" ),
                "param_name" => "axis",
                "value" => array(
                    "Vertical" => "vertical",
                    "Horizontally" => "horizontal",
                ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right", __( 'Center', "mk_framework" ) => "center" ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Title & Alt", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "For SEO purposes you may need to fill out the title and alt property for this image", "mk_framework" )
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
            ),

        )
    )
);



vc_map( array(
        "name"      => __( "Image Gallery", "mk_framework" ),
        "base"      => "mk_gallery",
        "category" => __( 'General', 'mk_framework' ),
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
                "type" => "textfield",
                "heading" => __( "Custom Links", "mk_framework" ),
                "param_name" => "custom_links",
                "value" => "",
                "description" => __( "Please add your links, If you use custom links the lightbox will be converted to expternal links. separate your URLs with comma ','", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "How many Column?", "mk_framework" ),
                "param_name" => "column",
                "value" => "3",
                "min" => "1",
                "max" => "8",
                "step" => "1",
                "unit" => 'column',
                "description" => __( "How many columns would you like to appeare in one row?", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Image Heights", "mk_framework" ),
                "param_name" => "height",
                "value" => "500",
                "min" => "100",
                "max" => "1000",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "You can define you gallery image's height from this option.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Image Frame Style", "mk_framework" ),
                "param_name" => "frame_style",
                "value" => array(
                    "No Frame" => "simple",
                    "Rounded Frame" => "rounded",
                    "Gray Border Frame" => "gray_border",
                ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Collection Title", "mk_framework" ),
                "param_name" => "collection_title",
                "value" => "",
                "description" => __( "This title will be appeared in lightbox.", "mk_framework" )
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
        "name"      => __( "Button", "mk_framework" ),
        "base"      => "mk_button",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "dimension",
                "value" => array(
                    "3 Dimensional" => "three",
                    "2 Dimensional" => "two",
                    "Outline Button" => "outline",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "heading" => __( "Button Text", "mk_framework" ),
                "param_name" => "content",
                "rows" => 1,
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Size", "mk_framework" ),
                "param_name" => "size",
                "value" => array(
                    "Small" => "small",
                    "Medium" => "medium",
                    "Large" => "large",
                ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Button Skin", "mk_framework" ),
                "param_name" => "outline_skin",
                "value" => array(
                    "Dark Color" => "dark",
                    "Light Color" => "light",
                ),
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "dimension", 'value' => array( 'outline' ) )
            ),


            array(
                "type" => "color",
                "heading" => __( "Background Color", "mk_framework" ),
                "param_name" => "bg_color",
                "value" => $skin_color,
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "dimension", 'value' => array( 'two', 'three' ) )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Text Color", "mk_framework" ),
                "param_name" => "text_color",
                "value" => array(
                    "Light" => "light",
                    "Dark" => "dark"
                ),
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "dimension", 'value' => array( 'two', 'three' ) )
            ),
            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose Icons", "mk_framework" ),
                "param_name" => "icon",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "Optionally you can insert icon into button.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Button URL", "mk_framework" ),
                "param_name" => "url",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Target", "mk_framework" ),
                "param_name" => "target",
                "width" => 200,
                "value" => $target_arr,
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right", __( 'Center', "mk_framework" ) => "center" ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button ID", "mk_framework" ),
                "param_name" => "id",
                "value" => "",
                "description" => __( "If your want to use id for this button to refer it in your custom JS, fill this textbox.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Top", "mk_framework" ),
                "param_name" => "margin_top",
                "value" => "0",
                "min" => "-30",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Button", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "15",
                "min" => "-30",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Mini Callout Box", "mk_framework" ),
        "base"      => "mk_mini_callout",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Description", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "Enter your content.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Button Text", "mk_framework" ),
                "param_name" => "button_text",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Button URL", "mk_framework" ),
                "param_name" => "button_url",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            ),
        )
    ) );

vc_map( array(
        "name"      => __( "Message Box", "mk_framework" ),
        "base"      => "mk_message_box",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Write your message in this textarea.", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Type", "mk_framework" ),
                "param_name" => "type",
                "value" => array(
                    "Comment" => "comment-message",
                    "Warning" => "warning-message",
                    "Confrim" => "confirm-message",
                    "Error" => "error-message",
                    "Info" => "info-message",
                ),
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
        "name"      => __( "Icon Box", "mk_framework" ),
        "base"      => "mk_icon_box",
        "category" => __( 'General', 'mk_framework' ),
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
                "heading" => __( "Title Font Size", "mk_framework" ),
                "param_name" => "text_size",
                "value" => "16",
                "min" => "10",
                "max" => "50",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Title Font Weight", "mk_framework" ),
                "param_name" => "font_weight",
                "width" => 200,
                "value" => array( __( 'Default', "mk_framework" ) => "inhert", __( 'Bold', "mk_framework" ) => "bold", __( 'Bolder', "mk_framework" ) => "bolder",  __( 'Normal', "mk_framework" ) => "normal",  __( 'Light', "mk_framework" ) => "300", ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Description", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "Enter your content.", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Read More Text", "mk_framework" ),
                "param_name" => "read_more_txt",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Read More URL", "mk_framework" ),
                "param_name" => "read_more_url",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "awesome_icons",
                "heading" => __( "Select Icon", "mk_framework" ),
                "param_name" => "icon",
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "width" => 300,
                "value" => array( __( 'Simple Minimal', "mk_framework" ) => "simple_minimal", __( 'Simple Ultimate', "mk_framework" ) => "simple_ultimate", __( 'Boxed', "mk_framework" ) => "boxed" ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Icon Size", "mk_framework" ),
                "param_name" => "icon_size",
                "width" => 150,
                "value" => array( __( 'Small', "mk_framework" ) => "small", __( 'Medium', "mk_framework" ) => "medium", __( 'Large', "mk_framework" ) => "large", __( 'X-large', "mk_framework" ) => "x-large" ),
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'simple_ultimate' ) )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Rounded Circle", "mk_framework" ),
                "param_name" => "rounded_circle",
                "value" => "false",
                "description" => __( "If you enable this option a rounded circle will be added to icons. This option will only work for icon size of Small and Medium.", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'simple_ultimate' ) )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Icon Location", "mk_framework" ),
                "param_name" => "icon_location",
                "width" => 150,
                "value" => array( __( 'Left', "mk_framework" ) => "left", __( 'Top', "mk_framework" ) => "top" ),
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'simple_ultimate', 'boxed' ) )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Circle container", "mk_framework" ),
                "param_name" => "circled",
                "value" => "false",
                "description" => __( "If you enable this option, icon will be placed in a rounded box.", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'simple_minimal' ) )
            ),


            array(
                "type" => "color",
                "heading" => __( "Icon Color", "mk_framework" ),
                "param_name" => "icon_color",
                "value" => $skin_color,
                "description" => __( "", "mk_framework" ),
            ),

            array(
                "type" => "color",
                "heading" => __( "Icon Circle Background Color", "mk_framework" ),
                "param_name" => "icon_circle_color",
                "value" => $skin_color,
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'boxed', 'simple_minimal' ) )
            ),

            array(
                "type" => "color",
                "heading" => __( "Icon Circle Border Color", "mk_framework" ),
                "param_name" => "icon_circle_border_color",
                "value" => "",
                "description" => __( "Optionally you can have a border color for icon circle. to disable border just leave this field blank.", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'boxed', 'simple_minimal' ) )
            ),

            array(
                "type" => "toggle",
                "heading" => __( "Box Blur", "mk_framework" ),
                "param_name" => "box_blur",
                "value" => "false",
                "description" => __( "", "mk_framework" ),
                "dependency" => array( 'element' => "style", 'value' => array( 'boxed' ) )
            ),
            array(
                "type" => "color",
                "heading" => __( "Title Color", "mk_framework" ),
                "param_name" => "title_color",
                "value" => "",
                "description" => __( "Optionally you can modify Title color inside this shortcode.", "mk_framework" ),
            ),
            array(
                "type" => "color",
                "heading" => __( "Paragraph Color", "mk_framework" ),
                "param_name" => "txt_color",
                "value" => "",
                "description" => __( "Optionally you can modify text color inside this shortcode.", "mk_framework" ),
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Button", "mk_framework" ),
                "param_name" => "margin",
                "value" => "30",
                "min" => "0",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
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
            ),
        )
    ) );



vc_map( array(
        "name"      => __( "Divider", "mk_framework" ),
        "base"      => "mk_divider",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "value" => array(
                    "Double Dotted" => "double_dot",
                    "Thick Solid" => "thick_solid",
                    "Thin Solid" => "thin_solid",
                    "Single Dotted" => "single_dotted",
                    "Shadow Line" => "shadow_line",
                    "Go Top with Thin Line" => "go_top",
                    "Go Top with Thick Line" => "go_top_thick",
                    "Padding Divider" => "padding_space",
                ),
                "description" => __( "Please Choose the style of the line of divider.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Divider Width", "mk_framework" ),
                "param_name" => "divider_width",
                "value" => array(
                    "Full Width" => "full_width",
                    "One Half" => "one_half",
                    "One Third" => "one_third",
                    "One Fourth" => "one_fourth",
                ),
                "description" => __( "There are 5 widths you can define for each of your divider styles. If you want to divide the page into 2 sections, you can simple place this shortcode into a row and enable 'Fullwidth Row'.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Padding Top", "mk_framework" ),
                "param_name" => "margin_top",
                "value" => "20",
                "min" => "0",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "How much space would you like to have before divider? this value will be applied to top.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Padding Bottom", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "20",
                "min" => "0",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "How much space would you like to have after divider? this value will be applied to bottom.", "mk_framework" )
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
        "name"      => __( "Table", "mk_framework" ),
        "base"      => "mk_table",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "value" => array(
                    "Style 1" => "style1",
                    "Style 2" => "style2",
                ),
            ),
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Table HTML content. You can use below sample and create your own data tables.", "mk_framework" ),
                "param_name" => "content",
                "value" => '<table width="100%">
<thead>
<tr>
<th>Column 1</th>
<th>Column 2</th>
<th>Column 3</th>
<th>Column 4</th>
</tr>
</thead>
<tbody>
<tr>
<td>Item #1</td>
<td>Description</td>
<td>Subtotal:</td>
<td>$3.00</td>
</tr>
<tr>
<td>Item #2</td>
<td>Description</td>
<td>Discount:</td>
<td>$4.00</td>
</tr>
<tr>
<td>Item #3</td>
<td>Description</td>
<td>Shipping:</td>
<td>$7.00</td>
</tr>
<tr>
<td>Item #4</td>
<td>Description</td>
<td>Tax:</td>
<td>$6.00</td>
</tr>
<tr>
<td><strong>All Items</strong></td>
<td><strong>Description</strong></td>
<td><strong>Your Total:</strong></td>
<td><strong>$20.00</strong></td>
</tr>
</tbody>
</table>',
                "description" => __( "Please paste your table html code here.", "mk_framework" )
            ),


            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            ),
        )
    ) );

vc_map( array(
        "name"      => __( "Skill Meter", "mk_framework" ),
        "base"      => "mk_skill_meter",
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "What skill are you demonstrating?", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Percent", "mk_framework" ),
                "param_name" => "percent",
                "value" => "50",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "How many percent would you like to show from this skill?", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Progress Bar Background Color", "mk_framework" ),
                "param_name" => "color",
                "value" => $skin_color,
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
        "name"      => __( "Diagram Progress Bar", "mk_framework" ),
        "base"      => "mk_skill_meter_chart",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Heading Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Skill 1 : Percent", "mk_framework" ),
                "param_name" => "percent_1",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 1 : Arch Color", "mk_framework" ),
                "param_name" => "color_1",
                "value" => "#e74c3c",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 1 : Name", "mk_framework" ),
                "param_name" => "name_1",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),




            array(
                "type" => "range",
                "heading" => __( "Skill 2 : Percent", "mk_framework" ),
                "param_name" => "percent_2",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 2 : Arch Color", "mk_framework" ),
                "param_name" => "color_2",
                "value" => "#8c6645",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 2 : Name", "mk_framework" ),
                "param_name" => "name_2",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),





            array(
                "type" => "range",
                "heading" => __( "Skill 3 : Percent", "mk_framework" ),
                "param_name" => "percent_3",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 3 : Arch Color", "mk_framework" ),
                "param_name" => "color_3",
                "value" => "#265573",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 3 : Name", "mk_framework" ),
                "param_name" => "name_3",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),





            array(
                "type" => "range",
                "heading" => __( "Skill 4 : Percent", "mk_framework" ),
                "param_name" => "percent_4",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 4 : Arch Color", "mk_framework" ),
                "param_name" => "color_4",
                "value" => "#008b83",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 4 : Name", "mk_framework" ),
                "param_name" => "name_4",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),






            array(
                "type" => "range",
                "heading" => __( "Skill 5 : Percent", "mk_framework" ),
                "param_name" => "percent_5",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 5 : Arch Color", "mk_framework" ),
                "param_name" => "color_5",
                "value" => "#d96b52",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 5 : Name", "mk_framework" ),
                "param_name" => "name_5",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),





            array(
                "type" => "range",
                "heading" => __( "Skill 6 : Percent", "mk_framework" ),
                "param_name" => "percent_6",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 6 : Arch Color", "mk_framework" ),
                "param_name" => "color_6",
                "value" => "#82bf56",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 6 : Name", "mk_framework" ),
                "param_name" => "name_6",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),






            array(
                "type" => "range",
                "heading" => __( "Skill 7 : Percent", "mk_framework" ),
                "param_name" => "percent_7",
                "value" => "0",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "Please evaluate your skill in percent", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Skill 7 : Arch Color", "mk_framework" ),
                "param_name" => "color_7",
                "value" => "#4ecdc4",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Skill 7 : Name", "mk_framework" ),
                "param_name" => "name_7",
                "value" => "",
                "margin_bottom" => 40,
                "description" => __( "Which skill are you demonstrating. eg : HTML, Design, CSS,...", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Default Text", "mk_framework" ),
                "param_name" => "default_text",
                "value" => "Skill",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Center Circle Background Color", "mk_framework" ),
                "param_name" => "center_color",
                "value" => "#1e3641",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Default Text Color", "mk_framework" ),
                "param_name" => "default_text_color",
                "value" => "#fff",
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Chart", "mk_framework" ),
        "base"      => "mk_chart",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "range",
                "heading" => __( "Percent", "mk_framework" ),
                "param_name" => "percent",
                "value" => "50",
                "min" => "0",
                "max" => "100",
                "step" => "1",
                "unit" => '%',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Bar Color", "mk_framework" ),
                "param_name" => "bar_color",
                "value" => $skin_color,
                "description" => __( "The color of the circular bar.", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Track Color", "mk_framework" ),
                "param_name" => "track_color",
                "value" => "#ececec",
                "description" => __( "The color of the track for the bar.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Line Width", "mk_framework" ),
                "param_name" => "line_width",
                "value" => "10",
                "min" => "1",
                "max" => "20",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "Width of the bar line.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Bar Size", "mk_framework" ),
                "param_name" => "bar_size",
                "value" => "150",
                "min" => "1",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "The Diameter of the bar.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Content", "mk_framework" ),
                "param_name" => "content_type",
                "width" => 200,
                "value" => array(
                    "Percent" => "percent",
                    "Icon" => "icon",
                    "Custom Text" => "custom_text",
                ),
                "description" => __( "The content inside the bar. If you choose icon, you should select your icon from below list. if you have selected custom text, then you should fill out the 'custom text' option below.", "mk_framework" )
            ),
            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose Icon", "mk_framework" ),
                "param_name" => "icon",
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Custom Text", "mk_framework" ),
                "param_name" => "custom_text",
                "value" => "",
                "description" => __( "Description will appear below each chart.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Description", "mk_framework" ),
                "param_name" => "desc",
                "value" => "",
                "description" => __( "Description will appear below each chart.", "mk_framework" )
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
        "name"      => __( "Process Builder", "mk_framework" ),
        "base"      => "mk_steps",
        "category" => __( 'General', 'mk_framework' ),
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
                "heading" => __( "How Many Steps?", "mk_framework" ),
                "param_name" => "step",
                "value" => "4",
                "min" => "3",
                "max" => "5",
                "step" => "1",
                "unit" => 'step',
                "description" => __( "How many steps do you want to have?", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Container Hover Fill Color", "mk_framework" ),
                "param_name" => "hover_color",
                "value" => $skin_color,
                "description" => __( "", "mk_framework" )
            ),


            array(
                "type" => "awesome_icons",
                "heading" => __( "Step 1 : Icon", "mk_framework" ),
                "param_name" => "icon_1",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 1 : Title", "mk_framework" ),
                "param_name" => "title_1",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 1 : Description", "mk_framework" ),
                "param_name" => "desc_1",
                'margin_bottom' => 40,
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Step 1 : Link", "mk_framework" ),
                "param_name" => "url_1",
                'margin_bottom' => 30,
                "value" => "",
                "description" => __( "If you add a URL the title will be converted to a link. add http://", "mk_framework" )
            ),


            array(
                "type" => "awesome_icons",
                "heading" => __( "Step 2 : Icon", "mk_framework" ),
                "param_name" => "icon_2",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 2 : Title", "mk_framework" ),
                "param_name" => "title_2",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 2 : Description", "mk_framework" ),
                "param_name" => "desc_2",
                'margin_bottom' => 40,
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 2 : Link", "mk_framework" ),
                "param_name" => "url_2",
                'margin_bottom' => 30,
                "value" => "",
                "description" => __( "If you add a URL the title will be converted to a link. add http://", "mk_framework" )
            ),


            array(
                "type" => "awesome_icons",
                "heading" => __( "Step 3 : Icon", "mk_framework" ),
                "param_name" => "icon_3",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 3 : Title", "mk_framework" ),
                "param_name" => "title_3",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 3 : Description", "mk_framework" ),
                "param_name" => "desc_3",
                'margin_bottom' => 40,
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Step 3 : Link", "mk_framework" ),
                "param_name" => "url_3",
                'margin_bottom' => 30,
                "value" => "",
                "description" => __( "If you add a URL the title will be converted to a link. add http://", "mk_framework" )
            ),

            array(
                "type" => "awesome_icons",
                "heading" => __( "Step 4 : Icon", "mk_framework" ),
                "param_name" => "icon_4",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 4 : Title", "mk_framework" ),
                "param_name" => "title_4",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 4 : Description", "mk_framework" ),
                "param_name" => "desc_4",
                'margin_bottom' => 40,
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Step 4 : Link", "mk_framework" ),
                "param_name" => "url_4",
                'margin_bottom' => 30,
                "value" => "",
                "description" => __( "If you add a URL the title will be converted to a link. add http://", "mk_framework" )
            ),


            array(
                "type" => "awesome_icons",
                "heading" => __( "Step 5 : Icon", "mk_framework" ),
                "param_name" => "icon_5",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 5 : Title", "mk_framework" ),
                "param_name" => "title_5",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 5 : Description", "mk_framework" ),
                "param_name" => "desc_5",
                'margin_bottom' => 40,
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Step 5 : Link", "mk_framework" ),
                "param_name" => "url_5",
                'margin_bottom' => 30,
                "value" => "",
                "description" => __( "If you add a URL the title will be converted to a link. add http://", "mk_framework" )
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
        "name"      => __( "News Tab", "mk_framework" ),
        "base"      => "mk_news_tab",
        "category" => __( 'General', 'mk_framework' ),
        "controls"  => "edit_popup_delete",
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Widget Title", "mk_framework" ),
                "param_name" => "widget_title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Tab Title", "mk_framework" ),
                "param_name" => "tab_title",
                "value" => "News",
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
        "name"      => __( "Custom Sidebar", "mk_framework" ),
        "base"      => "mk_custom_sidebar",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Custom Sidebar", "mk_framework" ),
                "param_name" => "sidebar",
                "width" => 400,
                "value" => $custom_sidebars,
                "description" => __( "Please select the custom sidebar area you would like to show.", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            ),
        )
    ) );
vc_map( array(
        "name"      => __( "Padding Divider", "mk_framework" ),
        "base"      => "mk_padding_divider",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "range",
                "heading" => __( "Padding Size (Px)", "mk_framework" ),
                "param_name" => "size",
                "value" => "40",
                "min" => "0",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "How much space would you like to drop in this specific padding shortcode?", "mk_framework" )
            ),
        )
    ) );
vc_map( array(
        "name"      => __( "Clearboth", "mk_framework" ),
        "base"      => "mk_clearboth",
        "show_settings_on_create" => false,
        "category" => __( 'General', 'mk_framework' ),
        "controls" => 'popup_delete'
    ) );


vc_map( array(
        "name"      => __( "Event Countdown", "mk_framework" ),
        "base"      => "mk_countdown",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "heading" => __( "Ends at which Year", "mk_framework" ),
                "param_name" => "year",
                "value" => array(
                    "2013" => '2013',
                    "2014" => '2014',
                    "2015" => '2015',
                    "2016" => '2016',
                    "2017" => '2017',
                    "2018" => '2018',
                    "2019" => '2019',
                    "2020" => '2020',
                ),
                "type" => "dropdown"
            ),

            array(
                "heading" => __( "Ends at which Month", "mk_framework" ),
                "param_name" => "month",
                "value" => '1',
                "value" => array(
                    "January" => 'january',
                    "February" => 'february',
                    "March" => 'march',
                    "April" => 'april',
                    "May" => 'may',
                    "June" => 'june',
                    "July" => 'july',
                    "August" => 'august',
                    "September" => 'september',
                    "October" => 'october',
                    "November" => 'november',
                    "December" => 'december',
                ),
                "type" => "dropdown"
            ),


            array(
                "heading" => __( "Ends at which Day", "mk_framework" ),
                "param_name" => "day",
                "value" => '1',
                "value" => array(
                    "1" => '1',
                    "2" => '2',
                    "3" => '3',
                    "4" => '4',
                    "5" => '5',
                    "6" => '6',
                    "7" => '7',
                    "8" => '8',
                    "9" => '9',
                    "10" => '10',
                    "11" => '11',
                    "12" => '12',
                    "13" => '13',
                    "14" => '14',
                    "15" => '15',
                    "16" => '16',
                    "17" => '17',
                    "18" => '18',
                    "19" => '19',
                    "20" => '20',
                    "21" => '21',
                    "22" => '22',
                    "23" => '23',
                    "24" => '24',
                    "25" => '25',
                    "26" => '26',
                    "27" => '27',
                    "28" => '28',
                    "29" => '29',
                    "30" => '30',
                    "31" => '31',
                ),
                "type" => "dropdown"
            ),


            array(
                "heading" => __( "Ends at which Hour", "mk_framework" ),
                "param_name" => "hour",
                "value" => '1',
                "value" => array(
                    "1" => '1',
                    "2" => '2',
                    "3" => '3',
                    "4" => '4',
                    "5" => '5',
                    "6" => '6',
                    "7" => '7',
                    "8" => '8',
                    "9" => '9',
                    "10" => '10',
                    "11" => '11',
                    "12" => '12',
                    "13" => '13',
                    "14" => '14',
                    "15" => '15',
                    "16" => '16',
                    "17" => '17',
                    "18" => '18',
                    "19" => '19',
                    "20" => '20',
                    "21" => '21',
                    "22" => '22',
                    "23" => '23',
                    "24" => '24',
                ),
                "type" => "dropdown"
            ),


            array(
                "heading" => __( "Ends at which Minute", "mk_framework" ),
                "param_name" => "minute",
                "value" => '1',
                "value" => array(
                    "1" => '1',
                    "2" => '2',
                    "3" => '3',
                    "4" => '4',
                    "5" => '5',
                    "6" => '6',
                    "7" => '7',
                    "8" => '8',
                    "9" => '9',
                    "10" => '10',
                    "11" => '11',
                    "12" => '12',
                    "13" => '13',
                    "14" => '14',
                    "15" => '15',
                    "16" => '16',
                    "17" => '17',
                    "18" => '18',
                    "19" => '19',
                    "20" => '20',
                    "21" => '21',
                    "22" => '22',
                    "23" => '23',
                    "24" => '24',
                    "25" => '25',
                    "26" => '26',
                    "27" => '27',
                    "28" => '28',
                    "29" => '29',
                    "30" => '30',
                    "31" => '31',
                    "32" => '32',
                    "33" => '33',
                    "34" => '34',
                    "35" => '35',
                    "36" => '36',
                    "37" => '37',
                    "38" => '38',
                    "39" => '39',
                    "40" => '40',
                    "41" => '41',
                    "42" => '42',
                    "43" => '43',
                    "44" => '44',
                    "45" => '45',
                    "46" => '46',
                    "47" => '47',
                    "48" => '48',
                    "49" => '49',
                    "50" => '50',
                    "51" => '51',
                    "52" => '52',
                    "53" => '53',
                    "54" => '54',
                    "55" => '55',
                    "56" => '56',
                    "57" => '57',
                    "58" => '58',
                    "59" => '59',
                ),
                "type" => "dropdown"
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
        "name"      => __( "Milestones", "mk_framework" ),
        "base"      => "mk_milestone",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose an Icon", "mk_framework" ),
                "param_name" => "icon",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Icon Size", "mk_framework" ),
                "param_name" => "icon_size",
                "value" => array(
                    "Small" => "small",
                    "Medium" => "medium",
                    "Large" => "large",
                ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Icon Color", "mk_framework" ),
                "param_name" => "icon_color",
                "value" => $skin_color,
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Number Start at", "mk_framework" ),
                "param_name" => "start",
                "value" => "0",
                "min" => "0",
                "max" => "100000",
                "step" => "1",
                "unit" => '',
                "description" => __( "Please choose in which number it should start.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Number Stop at", "mk_framework" ),
                "param_name" => "stop",
                "value" => "100",
                "min" => "0",
                "max" => "100000",
                "step" => "1",
                "unit" => '',
                "description" => __( "Please choose in which number it should Stop.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Speed", "mk_framework" ),
                "param_name" => "speed",
                "value" => "2000",
                "min" => "0",
                "max" => "10000",
                "step" => "1",
                "unit" => 'ms',
                "description" => __( "Speed of the animation from start to stop in milliseconds.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Number Prefix", "mk_framework" ),
                "param_name" => "prefix",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Number Suffix", "mk_framework" ),
                "param_name" => "suffix",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Text Below Number", "mk_framework" ),
                "param_name" => "text",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Text Color", "mk_framework" ),
                "param_name" => "text_color",
                "value" => "",
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
        "name"      => __( "Audio Player", "mk_framework" ),
        "base"      => "mk_audio",
        "category" => __( 'General', 'mk_framework' ),
        "params"    => array(
            array(
                "type" => "upload",
                "heading" => __( "Uplaod MP3 file format", "mk_framework" ),
                "param_name" => "mp3_file",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Uplaod OGG file format", "mk_framework" ),
                "param_name" => "ogg_file",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "upload",
                "heading" => __( "Uplaod Your Thumbnail", "mk_framework" ),
                "param_name" => "thumb",
                "value" => "",
                "description" => __( "It will automatically cropped to 50X50 pixels.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Sound Author", "mk_framework" ),
                "param_name" => "audio_author",
                "value" => "",
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

if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
    $gravity_forms_array[__( "No Gravity forms found.", "mk_framework" )] = '';
    if ( class_exists( 'RGFormsModel' ) ) {
        $gravity_forms = RGFormsModel::get_forms( 1, "title" );
        if ( $gravity_forms ) {
            $gravity_forms_array = array( __( "Select a form to display.", "mk_framework" ) => '' );
            foreach ( $gravity_forms as $gravity_form ) {
                $gravity_forms_array[$gravity_form->title] = $gravity_form->id;
            }
        }
    }
    vc_map( array(
            "name" => __( "Gravity Form", "mk_framework" ),
            "base" => "gravityform",
            "icon" => "icon-wpb-vc_gravityform",
            "category" => __( "Plugins", "mk_framework" ),
            "params" => array(
                array(
                    "type" => "dropdown",
                    "heading" => __( "Form", "mk_framework" ),
                    "param_name" => "id",
                    "value" => $gravity_forms_array,
                    "description" => __( "Select a form to add it to your post or page.", "mk_framework" ),
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __( "Display Form Title", "mk_framework" ),
                    "param_name" => "title",
                    "value" => array( __( "No", "mk_framework" ) => 'false', __( "Yes", "mk_framework" ) => 'true' ),
                    "description" => __( "Would you like to display the forms title?", "mk_framework" ),
                    "dependency" => array( 'element' => "id", 'not_empty' => true )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __( "Display Form Description", "mk_framework" ),
                    "param_name" => "description",
                    "value" => array( __( "No", "mk_framework" ) => 'false', __( "Yes", "mk_framework" ) => 'true' ),
                    "description" => __( "Would you like to display the forms description?", "mk_framework" ),
                    "dependency" => array( 'element' => "id", 'not_empty' => true )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __( "Enable AJAX?", "mk_framework" ),
                    "param_name" => "ajax",
                    "value" => array( __( "No", "mk_framework" ) => 'false', __( "Yes", "mk_framework" ) => 'true' ),
                    "description" => __( "Enable AJAX submission?", "mk_framework" ),
                    "dependency" => array( 'element' => "id", 'not_empty' => true )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __( "Tab Index", "mk_framework" ),
                    "param_name" => "tabindex",
                    "description" => __( "(Optional) Specify the starting tab index for the fields of this form. Leave blank if you're not sure what this is.", "mk_framework" ),
                    "dependency" => array( 'element' => "id", 'not_empty' => true )
                )
            )
        ) );
}


// Contact form 7 plugin
include_once ABSPATH . 'wp-admin/includes/plugin.php'; // Require plugin.php to use is_plugin_active() below
if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
    global $wpdb;
    $cf7 = $wpdb->get_results(
        "
    SELECT ID, post_title
    FROM $wpdb->posts
    WHERE post_type = 'wpcf7_contact_form'
    "
    );
    $contact_forms = array();
    if ( $cf7 ) {
        foreach ( $cf7 as $cform ) {
            $contact_forms[$cform->post_title] = $cform->ID;
        }
    } else {
        $contact_forms["No contact forms found"] = 0;
    }
    vc_map( array(
            "base" => "contact-form-7",
            "name" => __( "Contact Form 7", "mk_framework" ),
            "icon" => "icon-wpb-contactform7",
            "category" => __( 'Plugins', 'mk_framework' ),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __( "Form title", "mk_framework" ),
                    "param_name" => "title",
                    "admin_label" => true,
                    "description" => __( "What text use as form title. Leave blank if no title is needed.", "mk_framework" )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __( "Select contact form", "mk_framework" ),
                    "param_name" => "id",
                    "value" => $contact_forms,
                    "description" => __( "Choose previously created contact form from the drop down list.", "mk_framework" )
                )
            )
        ) );
} // if contact form7 plugin active



vc_map( array(
        "base"      => "mk_woocommerce_recent_carousel",
        "name"      => __( "Woo Recent Carousel", "mk_framework" ),
        "category" => __( 'Plugins', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "New Arrivals"
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Featured Products?", "mk_framework" ),
                "param_name" => "featured",
                "value" => "false",
                "description" => __( "If you want to show featured products enable this option.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "How many Posts?", "mk_framework" ),
                "param_name" => "per_page",
                "value" => "-1",
                "min" => "-1",
                "max" => "50",
                "step" => "1",
                "unit" => 'posts',
                "description" => __( "How many Posts you would like to show? (-1 means unlimited, please note that unlimited will be overrided the limit you defined at : Wordpress Sidebar > Settings > Reading > Blog pages show at most.)", "mk_framework" )
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
                "description" => __( "Sort retrieved Woocommerce items by parameter.", 'mk_framework' ),
                "param_name" => "orderby",
                "value" => $mk_orderby,
                "type" => "dropdown"
            )
        )
    ) );

vc_map( array(
        "name" => __( "Raw HTML", "mk_framework" ),
        "base" => "vc_raw_html",
        "icon" => "icon-wpb-raw-html",
        "category" => __( 'General', 'mk_framework' ),
        "wrapper_class" => "clearfix",
        "params" => array(
            array(
                "type" => "textarea_raw_html",
                "holder" => "div",
                "heading" => __( "Raw HTML", "mk_framework" ),
                "param_name" => "content",
                "value" => base64_encode( "<p>I am raw html block.<br/>Click edit button to change this html</p>" ),
                "description" => __( "Enter your HTML content.", "mk_framework" )
            ),
        )
    ) );

vc_map( array(
        "name" => __( "Raw JS", "mk_framework" ),
        "base" => "vc_raw_js",
        "icon" => "icon-wpb-raw-javascript",
        "category" => __( 'General', 'mk_framework' ),
        "wrapper_class" => "clearfix",
        "params" => array(
            array(
                "type" => "textarea_raw_html",
                "holder" => "div",
                "heading" => __( "Raw js", "mk_framework" ),
                "param_name" => "content",
                "value" => __( base64_encode( "<script type='text/javascript'> alert('Enter your js here!'); </script>" ), "mk_framework" ),
                "description" => __( "Enter your JS code.", "mk_framework" )
            ),
        )
    ) );
