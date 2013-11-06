<?php
$output = $el_class = '';
extract(shortcode_atts(array(
	'fullwidth' => 'false',
    'el_class' => '',
), $atts));

$fullwidth_start = $output = $fullwidth_end = '';

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class().$el_class, $this->settings['base']);

if($fullwidth == 'true') {
	global $post;
	$page_layout = get_post_meta( $post->ID, '_layout', true );
	$fullwidth_start = '</div></div>';
	$fullwidth_end = '<div class="theme-page-wrapper '.$page_layout.'-layout mk-grid vc_row-fluid row-fluid"><div class="theme-content" style="padding-top:0px; padding-bottom:0px;">';
}

$output .= $fullwidth_start . '<div class="'.$css_class.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$fullwidth_end . $this->endBlockComment('row');
echo $output;