<?php
function vc_sorted_list_form_field($settings, $value) {
    return '<div class="vc-sorted-list">'
        .'<input name="'.$settings['param_name'].'" class="wpb_vc_param_value  '.$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'.$value.'" />'
        .'<div class="vc-sorted-list-toolbar">'.vc_sorted_list_parts_list($settings['options']).'</div>'
        .'<ul class="vc-sorted-list-container"></ul>'
        .'</div>';
}


function vc_sorted_list_parts_list($list) {
    $output = '';
    foreach($list as $control) {
        $output .= '<label><input type="checkbox" name="vc_sorted_list_element" value="'.$control[0].'" data-element="'.$control[0].'"> '.htmlspecialchars($control[1]).'</label>';
    }
    return $output;
}

function vc_sorted_list_parse_value($value) {
    return preg_split('/\,/', $value);
}