<?php
extract( shortcode_atts( array(
			'title' => __( "Section", "mk_framework" ),
			'icon' => '',
		), $atts ) );

$output = '';
$icon = !empty( $icon ) ? '<i class="mk-' . $icon . '"></i>' : '';
$output .= "\n\t\t\t\t" . '<div class="mk-accordion-single"><div class="mk-accordion-tab">'.$icon.$title.'</div>';
$output .= "\n\t\t\t\t" . '<div class="mk-accordion-pane">';
$output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t\t" . '<div class="clearboth"></div></div></div>';

echo $output;
