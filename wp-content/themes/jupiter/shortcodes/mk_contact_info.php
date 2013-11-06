<?php

extract( shortcode_atts( array(
			'title' => '',
			'phone' => '',
			'fax' => '',
			'email' => '',
			'address' => '',
			'website' => '',
			'company' => '',
			'person' => '',
			'skype' => '',
			'el_class' => ''
		), $atts ) );
$output = '';
$output .= '<div class="widget_contact_info mk-contactinfo-shortcode">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= '<ul>';
$output .= !empty( $person )  ? '<li><i class="mk-moon-user-7"></i><span>'.$person.'</span></li>' : '';
$output .= !empty( $company )  ? '<li><i class="mk-moon-office"></i><span>'.$company.'</span></li>' : '';
$output .= !empty( $address )  ? '<li><i class="mk-icon-home"></i><span>'.$address.'</span></li>' : '';
$output .= !empty( $phone )  ? '<li><i class="mk-icon-phone"></i><span>'.$phone.'</span></li>' : '';
$output .= !empty( $fax )  ? '<li><i class="mk-icon-print"></i><span>'.$fax.'</li></span>' : '';
$output .= !empty( $email )  ? '<li><i class="mk-icon-envelope-alt"></i><span><a href="mailto:'.antispambot( $email ).'">'.antispambot( $email ).'</a></span></li>' : '';
$output .= !empty( $website )  ? '<li><i class="mk-icon-globe"></i><span><a href="'.$website.'">'.str_replace( 'http://', '', $website ).'</a></span></li>' : '';
$output .= !empty( $skype )  ? '<li><i class="mk-moon-skype"></i><span><a href="skype:'.$skype.'?call">'.$skype.'</a></span></li>' : '';
$output .= '</ul>';
$output .= '</div>';

echo $output;
