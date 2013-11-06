<?php

$el_class = '';

extract( shortcode_atts( array(
            'el_class' => '',
            'title' => '',
            'style' => 'simple_minimal',
            'icon' => '',
            'icon_color' => '',
            'icon_circle_color' => '', // for boxed and simple minimal style
            'icon_circle_border_color' => '', // for boxed and simple minimal style
            'box_blur' => '', // for boxed style
            'circled' => 'false', // for simple minimal style
            'icon_location' => 'left', // for simple ultimate and boxed style
            'icon_size' => 'medium', // for simple ultimate style
            'read_more_txt' => '',
            'read_more_url' => '',
            'text_size' => '18',
            'font_weight' => 'inherit',
            'rounded_circle' => 'false',
            'margin' => '30',
            'txt_color' => '',
            'title_color' => '',
            'animation' => '',
        ), $atts ) );

$output = $box_blur_wrapper_css = $animation_css = $box_blur_css = $border_color = $rounded_circle_css = '';

$id = mt_rand( 99, 999 );
$style_css = '<style type="text/css">';
$style_css .= !empty( $txt_color ) ? ( '#box-icon-'.$id.' {color:'.$txt_color.';}' ) : '';
if ( empty( $read_more_url ) ) {
    $style_css .= !empty( $title_color ) ? ( '#box-icon-'.$id.' h4 {color:'.$title_color.'!important;}' ) : '';
} else {
    $style_css .= !empty( $title_color ) ? ( '#box-icon-'.$id.' h4 a{color:'.$title_color.'!important;}' ) : '';
}
$style_css .= '</style>';
if ( $box_blur == 'true' ) {
    $box_blur_css = 'blured-box';
    $box_blur_wrapper_css = 'blured-box-wrapper';
}
if ( $animation != '' ) {
    $animation_css = ' mk-animate-element ' . $animation . ' ';
}
$output .= '<div id="box-icon-'.$id.'" style="margin-bottom:'.$margin.'px;" class="'.$el_class.' '.$box_blur_wrapper_css.' '.$style.'-style mk-box-icon">';
if ( $style == "simple_minimal" ) {
    if ( $circled == 'true' ) {
        $border_css =  !empty( $icon_circle_border_color ) ? ( 'border:1px solid '.$icon_circle_border_color.';' ) : '';
        $output .= '<h4 style="font-size:'.$text_size.'px;font-weight:'.$font_weight.';"><i class="mk-'.$icon.$animation_css.' circled-icon mk-main-ico" style="'.$border_css.'color:'.$icon_color.';background-color:'.$icon_circle_color.'"></i>';
        $output .= !empty( $read_more_url ) ? '<a href="'.$read_more_url.'">'.$title.'</a>' : $title;
        $output .= '</h4>';
    }   else {
        $output .= '<h4 style="font-size:'.$text_size.'px;font-weight:'.$font_weight.';"><i style="color:'.$icon_color.'" class="mk-'.$icon.$animation_css.' mk-main-ico"></i>';
        $output .= !empty( $read_more_url ) ? '<a href="'.$read_more_url.'">'.$title.'</a>' : $title;
        $output .= '</h4>';
    }

    $output .= wpb_js_remove_wpautop( $content );
    if ( $read_more_txt ) {
        $output .= '<div class="clearboth"></div><a class="icon-box-readmore" href="'.$read_more_url.'">'.$read_more_txt.'<i class="mk-icon-caret-right"></i></a>';
    }

} else if ( $style == "boxed" ) {

        $output .= '<div class="icon-box-boxed '.$box_blur_css.' '.$icon_location.'">';
        $border_css =  !empty( $icon_circle_border_color ) ? ( 'border:1px solid '.$icon_circle_border_color.';' ) : '';
        if ( !empty( $icon ) ) {
            $output .= '<i style="'.$border_css.'background-color:'.$icon_circle_color.';color:'.$icon_color.';" class="mk-'.$icon.$animation_css.' mk-main-ico"></i>';
        }
        $output .= '<h4 style="font-size:'.$text_size.'px;font-weight:'.$font_weight.';">';
        $output .= !empty( $read_more_url ) ? '<a href="'.$read_more_url.'">'.$title.'</a>' : $title;
        $output .= '</h4>';
        $output .= wpb_js_remove_wpautop( $content );
        if ( $read_more_txt ) {
            $output .= '<div class="clearboth"></div><a class="icon-box-readmore" href="'.$read_more_url.'">'.$read_more_txt.'<i class="mk-icon-caret-right"></i></a>';
        }
        $output .= '<div class="clearboth"></div></div>';


    } else if ( $style == "simple_ultimate" ) {
            if($rounded_circle == 'true' && ($icon_size == 'small' || $icon_size == 'medium')) {
                $border_color = 'border-color:'.$icon_color.';';
                $rounded_circle_css = 'rounded-circle';
            }
        $output .= '<div class="'.$icon_location.'-side '.$rounded_circle_css.'">';
        if ( !empty( $icon ) ) {
            $output .= '<i style="color:'.$icon_color.';'.$border_color.'" class="mk-'.$icon.$animation_css.' '.$icon_size.' mk-main-ico"></i>';
        }
        $output .= '<div class="box-detail-wrapper '.$icon_size.'-size">';
        $output .= '<h4 style="font-size:'.$text_size.'px;font-weight:'.$font_weight.';">';
        $output .= !empty( $read_more_url ) ? '<a href="'.$read_more_url.'">'.$title.'</a>' : $title;
        $output .= '</h4>';
        $output .= wpb_js_remove_wpautop( $content );
        if ( $read_more_txt ) {
            $output .= '<div class="clearboth"></div><a class="icon-box-readmore" href="'.$read_more_url.'">'.$read_more_txt.'<i class="mk-icon-caret-right"></i></a>';
        }
        $output .= '</div><div class="clearboth"></div></div>';
    }
$output .= '</div>' . $style_css;

echo $output;
