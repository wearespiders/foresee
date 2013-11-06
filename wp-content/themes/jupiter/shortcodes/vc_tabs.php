<?php
$title  = $el_position = $el_class = '';
extract( shortcode_atts( array(
			'heading_title' => '',
			'orientation' => 'horizental',
			'title' => '',
			"container_bg_color" => '#fff',
			'tab_location' => '',
			'el_class' => '',
		), $atts ) );
$output = $tab_location_css =  '';

wp_enqueue_script( 'jquery-ui-tabs' );
$id = mt_rand( 99, 999 );
if ( !empty( $heading_title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}


$output = '<ul class="mk-tabs-tabs">';
if ( preg_match_all( "/(.?)\[(vc_tab)\b(.*?)(?:(\/))?\]/s", $content, $matches ) ) {
        for ( $i = 0; $i < count( $matches[ 0 ] ); $i++ ) {
            $matches[ 3 ][ $i ] = shortcode_parse_atts( $matches[ 3 ][ $i ] );
        }
        for ( $i = 0; $i < count( $matches[ 0 ] ); $i++ ) {
            $icon = $matches[ 3 ][ $i ][ 'icon' ];
            if($icon == '') {
                $output .= '<li><a href="#'.$matches[ 3 ][ $i ][ 'tab_id' ].'">' . $matches[ 3 ][ $i ][ 'title' ] . '</a></li>';
            } else {
                $output .= '<li class="tab-with-icon"><a href="#'. $matches[ 3 ][ $i ][ 'tab_id' ] .'"><i class="mk-' . $icon . '"></i>' . $matches[ 3 ][ $i ][ 'title' ] . '</a></li>';
            }
            
        }
}

$output .= '<div class="clearboth"></div></ul>';
$output .= '<div class="mk-tabs-panes">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop( $content );
$output .= '<div class="clearboth"></div></div>';
if ( $el_position != '' ) {
	$el_position_css = $el_position.'-column';
}
if ( $orientation == 'vertical' ) {
	$tab_location_css = ' vertical-'.$tab_location;
}
echo $heading_title.'<div id="mk-tabs-'.$id.'" class="mk-shortcode mk-tabs'.$tab_location_css.' '.$orientation.'-style ' . $el_class . '">' . $output . '<div class="clearboth"></div></div>
        <style type="text/css">
                #mk-tabs-'.$id.' .mk-tabs-tabs li.ui-tabs-active, #mk-tabs-'.$id.' .mk-tabs-panes, #mk-tabs-'.$id.' .mk-fancy-title span{
                    background-color: '.$container_bg_color.';
                }
        </style>
        ';
