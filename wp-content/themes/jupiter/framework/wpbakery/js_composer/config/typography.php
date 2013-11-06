<?php

vc_map( array(
        "name"      => __( "Text block", "mk_framework" ),
        "base"      => "vc_column_text",
        "wrapper_class" => "clearfix",
        "category" => __( 'Typography', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Text", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "Enter your content.", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
                "description" => __( "You can optionally have readily made global style title for this text block. you can leave it blank if you dont need it. Moreover you can disable this heading title's pattern divider using below option.", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Disable Title Pattern?", "mk_framework" ),
                "param_name" => "disable_pattern",
                "value" => "true",
                "description" => __( "This option will give you the ability to disable fancy title pattern for this shortcode.", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Text Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right", __( 'Center', "mk_framework" ) => "center" ),
                "description" => __( "", "mk_framework" )
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
        "name"      => __( "Fancy Title", "mk_framework" ),
        "base"      => "mk_fancy_title",
        "category" => __( 'Typography', 'mk_framework' ),
        "class"     => "mk-fancy-title-class",
        "params"    => array(

            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Content.", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Tag Name", "mk_framework" ),
                "param_name" => "tag_name",
                "value" => array(
                    "h2" => "h2",
                    "h1" => "h1",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ),
                "description" => __( "For SEO reasons you might need to define your titles tag names according to priority. Please note that H1 can only be used only once in a page due to the SEO reasons. So try to use lower than H2 to meet SEO best practices.", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Pattern?", "mk_framework" ),
                "param_name" => "style",
                "value" => "true",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Text Color", "mk_framework" ),
                "param_name" => "color",
                "value" => "#393836",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Font Size", "mk_framework" ),
                "param_name" => "size",
                "value" => "14",
                "min" => "12",
                "max" => "70",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Font Weight", "mk_framework" ),
                "param_name" => "font_weight",
                "width" => 150,
                "value" => array( __( 'Default', "mk_framework" ) => "inhert", __( 'Bold', "mk_framework" ) => "bold", __( 'Bolder', "mk_framework" ) => "bolder",  __( 'Normal', "mk_framework" ) => "normal",  __( 'Light', "mk_framework" ) => "300", ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Top", "mk_framework" ),
                "param_name" => "margin_top",
                "value" => "0",
                "min" => "-40",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "In some occasions you may on need to define a top margin for this title.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Bottom", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "18",
                "min" => "0",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "fonts",
                "heading" => __( "Font Family", "mk_framework" ),
                "param_name" => "font_family",
                "value" => "",
                "description" => __( "You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "mk_framework" )
            ),
            array(
                "type" => "hidden_input",
                "param_name" => "font_type",
                "value" => "",
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
        "name"      => __( "Title Box", "mk_framework" ),
        "base"      => "mk_title_box",
        "category" => __( 'Typography', 'mk_framework' ),
        "class"     => "mk-title-box-class",
        "params"    => array(

            array(
                "type" => "textarea_html",
                "rows" => 2,
                "holder" => "div",
                "heading" => __( "Content.", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "Allowed Tags [br] [strong] [i] [u] [b] [a] [small]. Please note that [p] tags will be striped out.", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Text Color", "mk_framework" ),
                "param_name" => "color",
                "value" => "#393836",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Hightlight Background Color", "mk_framework" ),
                "param_name" => "highlight_color",
                "value" => "#000",
                "description" => __( "The Hightlight Background color. you can change color opacity from below option.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Hightlight Color Opacity", "mk_framework" ),
                "param_name" => "highlight_opacity",
                "value" => "0.3",
                "min" => "0",
                "max" => "1",
                "step" => "0.01",
                "unit" => 'px',
                "description" => __( "The Opacity of the hightlight background", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Font Size", "mk_framework" ),
                "param_name" => "size",
                "value" => "18",
                "min" => "12",
                "max" => "70",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Line Height (Important)", "mk_framework" ),
                "param_name" => "line_height",
                "value" => "34",
                "min" => "12",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "Since every font family with differnt sizes need different line heights to get a nice looking highlighted titles you should set them manually. as a hint generally (font-size * 2) - 2 works in many cases, but you may need to give more space in between, so we opened your hands with this option. :) ", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Font Weight", "mk_framework" ),
                "param_name" => "font_weight",
                "width" => 150,
                "value" => array( __( 'Default', "mk_framework" ) => "inhert", __( 'Bold', "mk_framework" ) => "bold", __( 'Bolder', "mk_framework" ) => "bolder",  __( 'Normal', "mk_framework" ) => "normal",  __( 'Light', "mk_framework" ) => "300", ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Top", "mk_framework" ),
                "param_name" => "margin_top",
                "value" => "0",
                "min" => "-40",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "In some ocasions you may on need to define a top margin for this title.", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Margin Button", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "18",
                "min" => "0",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "fonts",
                "heading" => __( "Font Family", "mk_framework" ),
                "param_name" => "font_family",
                "value" => "",
                "description" => __( "You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "mk_framework" )
            ),
            array(
                "type" => "hidden_input",
                "param_name" => "font_type",
                "value" => "",
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
        "name"      => __( "Blockquote", "mk_framework" ),
        "base"      => "mk_blockquote",
        "category" => __( 'Typography', 'mk_framework' ),
        "class"     => "mk-blockquote-class",
        "params"    => array(


            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Blockquote Message", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "width" => 150,
                "value" => array( __( 'Quote Style', "mk_framework" ) => "quote-style", __( 'Line Style', "mk_framework" ) => "line-style" ),
                "description" => __( "Using this option you can choose blockquote style.", "mk_framework" )
            ),



            array(
                "type" => "fonts",
                "heading" => __( "Font Family", "mk_framework" ),
                "param_name" => "font_family",
                "value" => "",
                "description" => __( "You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "mk_framework" )
            ),
            array(
                "type" => "hidden_input",
                "param_name" => "font_type",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Text Size", "mk_framework" ),
                "param_name" => "text_size",
                "value" => "12",
                "min" => "12",
                "max" => "50",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "You can set blockquote text size from the below option.", "mk_framework" )
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
        "name"      => __( "Dropcaps", "mk_framework" ),
        "base"      => "mk_dropcaps",
        "class"     => "mk-dropcaps-class",
        "category" => __( 'Typography', 'mk_framework' ),
        "controls"  => "edit_popup_delete",
        "params"    => array(

            array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __( "Dropcaps Character", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "width" => 150,
                "value" => array( __( 'Simple', "mk_framework" ) => "simple-style", __( 'Fancy', "mk_framework" ) => "fancy-style", ),
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
        "name"      => __( "Highlight Text", "mk_framework" ),
        "base"      => "mk_highlight",
        "class"     => "mk-highlight-class",
        "category" => __( 'Typography', 'mk_framework' ),
        "controls"  => "edit_popup_delete",
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Highlight Text", "mk_framework" ),
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
                "type" => "color",
                "heading" => __( "Background Color", "mk_framework" ),
                "param_name" => "bg_color",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "fonts",
                "heading" => __( "Font Family", "mk_framework" ),
                "param_name" => "font_family",
                "value" => "",
                "description" => __( "You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "mk_framework" )
            ),
            array(
                "type" => "hidden_input",
                "param_name" => "font_type",
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
        "name"      => __( "Tooltip", "mk_framework" ),
        "base"      => "mk_tooltip",
        "class"     => "mk-highlight-class",
        "category" => __( 'Typography', 'mk_framework' ),
        "controls"  => "edit_popup_delete",
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Text", "mk_framework" ),
                "param_name" => "text",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Tooltip Text", "mk_framework" ),
                "param_name" => "tooltip_text",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Tooltip URL", "mk_framework" ),
                "param_name" => "href",
                "value" => "",
                "description" => __( "You can optionally link the tooltip text to a webpage.", "mk_framework" )
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
        "name"      => __( "Custom List", "mk_framework" ),
        "base"      => "mk_custom_list",
        "category" => __( 'Typography', 'mk_framework' ),
        "class"     => "mk-list-styles-class",
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
                "heading" => __( "Add your unordered list into this textarea. Allowed Tags : [ul][li][strong][i][em][u][b][a][small]", "mk_framework" ),
                "param_name" => "content",
                "value" => "<ul><li>List Item</li></ul>",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "awesome_icons",
                "heading" => __( "List Icons", "mk_framework" ),
                "param_name" => "style",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "true",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "color",
                "heading" => __( "Icons Color", "mk_framework" ),
                "param_name" => "icon_color",
                "value" => $skin_color,
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "range",
                "heading" => __( "Margin Button", "mk_framework" ),
                "param_name" => "margin_bottom",
                "value" => "30",
                "min" => "-30",
                "max" => "500",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'No Align', "mk_framework" ) => "none", __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right"),
                "description" => __( "Please note that align left and right will make the shortcode to float, therefore in order to keep your page elements from wrapping into each other you should add a padding divider shortcode right after this shortcode.", "mk_framework" )
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
        "name"      => __( "Font icons", "mk_framework" ),
        "base"      => "mk_font_icons",
        "class"     => "mk-lifetime-icons-class",
        "category" => __( 'Typography', 'mk_framework' ),
        "controls"  => "edit_popup_delete",
        "params"    => array(

            array(
                "type" => "awesome_icons",
                "heading" => __( "Icon", "mk_framework" ),
                "param_name" => "icon",
                "width" => 200,
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "icon Color", "mk_framework" ),
                "param_name" => "color",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Icon Size", "mk_framework" ),
                "param_name" => "size",
                "value" => array(
                    "16px" => "small",
                    "32px" => "medium",
                    "48px" => "large",
                    "64px" => "x-large",
                    "128px" => "xx-large",
                    "256px" => "xxx-large",

                ),
                "description" => __( "", "mk_framework" )
            ),


            array(
                "type" => "range",
                "heading" => __( "Horizontal Padding", "mk_framework" ),
                "param_name" => "padding_horizental",
                "value" => "4",
                "min" => "0",
                "max" => "50",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "You can give padding to the icon. this padding will be applied to left and right side of the icon", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Vertical Padding", "mk_framework" ),
                "param_name" => "padding_vertical",
                "value" => "4",
                "min" => "0",
                "max" => "50",
                "step" => "1",
                "unit" => 'px',
                "description" => __( "You can give padding to the icon. this padding will be applied to top and bottom of them icon", "mk_framework" )
            ),
            array(
                "type" => "toggle",
                "heading" => __( "Circle Box?", "mk_framework" ),
                "param_name" => "circle",
                "value" => "false",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Circle Color", "mk_framework" ),
                "param_name" => "circle_color",
                "value" => "",
                "description" => __( "If Circle Enabled you can set the rounded box background color using this color picker.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Icon Align", "mk_framework" ),
                "param_name" => "align",
                "width" => 150,
                "value" => array( __( 'No Align', "mk_framework" ) => "none", __( 'Left', "mk_framework" ) => "left", __( 'Right', "mk_framework" ) => "right", __( 'Center', "mk_framework" ) => "center" ),
                "description" => __( "Please note that align left and right will make the icons to float, therefore in order to keep your page elements from wrapping into each other you should add a padding divider shortcode right after the last icon.", "mk_framework" )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Link", "mk_framework" ),
                "param_name" => "link",
                "value" => "",
                "description" => __( "You can optionally link your icon. please provide full URL including http://", "mk_framework" )
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
        "name"      => __( "Toggle", "mk_framework" ),
        "base"      => "mk_toggle",
        "wrapper_class" => "clearfix",
        "category" => __( 'Typography', 'mk_framework' ),
        "params"    => array(

            array(
                "type" => "textfield",
                "heading" => __( "Toggle Title", "mk_framework" ),
                "param_name" => "title",
                "value" => "",
            ),
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __( "Toggle Content.", "mk_framework" ),
                "param_name" => "content",
                "value" => __( "", "mk_framework" ),
            ),

            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose Icon For title", "mk_framework" ),
                "param_name" => "icon",
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "Please note that this icon only works for fancy style of this shortcode.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "width" => 150,
                "value" => array( __( 'Simple', "mk_framework" ) => "simple", __( 'Fancy', "mk_framework" ) => "fancy" ),
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


$tab_id_1 = time().'-1-'.rand( 0, 100 );
$tab_id_2 = time().'-2-'.rand( 0, 100 );
vc_map( array(
        "name"  => __( "Tabs", "mk_framework" ),
        "base" => "vc_tabs",
        "show_settings_on_create" => false,
        "is_container" => true,
        "icon" => "icon-wpb-ui-tab-content",
        "category" => __( 'Content', 'mk_framework' ),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "heading_title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Orientation", "mk_framework" ),
                "param_name" => "orientation",
                "value" => array(
                    "Horizontal" => "horizental",
                    "Vertical" => "vertical",
                ),
                "description" => __( "Please Choose the style of the line of divider.", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Tab location", "mk_framework" ),
                "param_name" => "tab_location",
                "value" => array(
                    "Left" => "left",
                    "Right" => "right",
                ),
                "description" => __( "Which side would you like the tabs list appear?", "mk_framework" ),
                "dependency" => array( 'element' => "orientation", 'value' => array( 'vertical' ) )
            ),
            array(
                "type" => "color",
                "heading" => __( "Container Background Color", "mk_framework" ),
                "param_name" => "container_bg_color",
                "value" => "#fff",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        ),
        "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>'
        ,
        'default_content' => '
  [vc_tab title="'.__( 'Tab 1', 'mk_framework' ).'" tab_id="'.$tab_id_1.'"][/vc_tab]
  [vc_tab title="'.__( 'Tab 2', 'mk_framework' ).'" tab_id="'.$tab_id_2.'"][/vc_tab]
  ',
        "js_view" => ( $vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35' )
    ) );



vc_map( array(
        "name" => __( "Tab", "mk_framework" ),
        "base" => "vc_tab",
        "allowed_container_element" => 'vc_row',
        "is_container" => true,
        "content_element" => false,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "description" => __( "Tab title.", "mk_framework" )
            ),
            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose Icon (optional)", "mk_framework" ),
                "param_name" => "icon",
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),

        ),
        'js_view' => ( $vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35' )
    ) );


vc_map( array(
        "name" => __( "Accordion", "mk_framework" ),
        "base" => "vc_accordions",
        "show_settings_on_create" => false,
        "is_container" => true,
        "icon" => "icon-wpb-ui-accordion",
        "category" => __( 'Content', 'mk_framework' ),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "heading_title",
                "value" => "",
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Style", "mk_framework" ),
                "param_name" => "style",
                "width" => 150,
                "value" => array(  __( 'Fancy', "mk_framework" ) => "fancy-style", __( 'Simple', "mk_framework" ) => "simple-style" ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Action Style", "mk_framework" ),
                "param_name" => "action_style",
                "width" => 400,
                "value" => array(  __( 'One Toggle Open At A Time', "mk_framework" ) => "accordion-action", __( 'Multiple Toggles Open At A Time', "mk_framework" ) => "toggle-action" ),
                "description" => __( "", "mk_framework" )
            ),
            array(
                "type" => "range",
                "heading" => __( "Initial Index", "mk_framework" ),
                "param_name" => "open_toggle",
                "value" => "0",
                "min" => "-1",
                "max" => "50",
                "step" => "1",
                "unit" => 'index',
                "description" => __( "Specify which toggle to be open by default when The page loads. please note that this value is zero based therefore zero is the first item. this option works when you have chosen [One Toggle Open At A Time] option from above setting. -1 will close all accordions on page load.", "mk_framework" )
            ),
            array(
                "type" => "color",
                "heading" => __( "Container Background Color", "mk_framework" ),
                "param_name" => "container_bg_color",
                "value" => "#fff",
                "description" => __( "", "mk_framework" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "mk_framework" ),
                "param_name" => "el_class",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework" )
            )
        ),
        "custom_markup" => '
  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
  %content%
  </div>
  <div class="tab_controls">
  <button class="add_tab" title="'.__( "Add accordion section", "mk_framework" ).'">'.__( "Add accordion section", "mk_framework" ).'</button>
  </div>
  ',
        'default_content' => '
  [vc_accordion_tab title="'.__( 'Section 1', "mk_framework" ).'"][/vc_accordion_tab]
  [vc_accordion_tab title="'.__( 'Section 2', "mk_framework" ).'"][/vc_accordion_tab]
  ',
        'js_view' => 'VcAccordionView'
    ) );
vc_map( array(
        "name" => __( "Accordion Section", "mk_framework" ),
        "base" => "vc_accordion_tab",
        "allowed_container_element" => 'vc_row',
        "is_container" => true,
        "content_element" => false,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "mk_framework" ),
                "param_name" => "title",
                "description" => __( "Accordion section title.", "mk_framework" )
            ),
            array(
                "type" => "awesome_icons",
                "heading" => __( "Choose Icon (optional)", "mk_framework" ),
                "param_name" => "icon",
                "value" => $mk_awesome_icons_list,
                "encoding" => "false",
                "description" => __( "", "mk_framework" )
            ),
        ),
        'js_view' => 'VcAccordionTabView'
    ) );
