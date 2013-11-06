<?php

extract( shortcode_atts( array(
            'title' => '',
            'email' => get_bloginfo( 'admin_email' ),
            'style' => 'classic',
            'skin' => 'dark',
            'el_class' => '',
        ), $atts ) );
$id = mt_rand( 99, 999 );
$file_path = THEME_DIR_URI;
$tabindex_1 = $id;
$tabindex_2 = $id + 1;
$tabindex_3 = $id + 2;
$tabindex_4 = $id + 3;
$name_str = __( 'Your Name', 'mk_framework' );
$email_str = __( 'Your Email', 'mk_framework' );
$submit_str = __( 'Submit', 'mk_framework' );
$content_str = __( 'Your message', 'mk_framework' );
$fancy_title = '';
if ( !empty( $title ) ) {
    $fancy_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
if ( $style == 'classic' ) {
    echo <<<HTML
{$fancy_title}
<div class="mk-contact-form-wrapper classic-style mk-shortcode {$el_class}">
    <form class="mk-contact-form" action="{$file_path}/sendmail.php" method="post" novalidate="novalidate">
        <div class="mk-form-row"><i class="mk-icon-user"></i><input placeholder="{$name_str}" type="text" required="required" id="contact_name" name="contact_name" class="text-input watermark-input" value="" tabindex="{$tabindex_1}" /></div>
        <div class="mk-form-row"><i class="mk-icon-envelope"></i><input placeholder="{$email_str}" type="email" required="required" id="contact_email" name="contact_email" class="text-input watermark-input" value="" tabindex="{$tabindex_2}" /></div>
        <div class="mk-form-row"><i class="mk-icon-pencil"></i><textarea required="required" placeholder="{$content_str}" name="contact_content" id="contact_content" class="mk-textarea" tabindex="{$tabindex_3}"></textarea></div>
        <div class="mk-form-row" style="float:left;"><button tabindex="{$tabindex_4}" class="mk-button mk-skin-button three-dimension contact-form-button medium">{$submit_str}</button></div>
        <i class="mk-contact-loading mk-icon-spinner mk-icon-spin"></i>
        <i class="mk-contact-success mk-icon-ok-sign"></i>
        <input type="hidden" value="{$email}" name="contact_to"/>
    </form>
    <div class="clearboth"></div>

</div>
HTML;

} else {
    echo <<<HTML
{$fancy_title}
<div class="mk-contact-form-wrapper mk-shortcode contact-{$skin} modern-style {$el_class}">
    <form class="mk-contact-form" action="{$file_path}/sendmail.php" method="post" novalidate="novalidate">
        <div class="mk-form-row"><input placeholder="{$name_str}" type="text" required="required" id="contact_name" name="contact_name" class="text-input watermark-input" value="" tabindex="{$tabindex_1}" /></div>
        <div class="mk-form-row"><input placeholder="{$email_str}" type="email" required="required" id="contact_email" name="contact_email" class="text-input watermark-input" value="" tabindex="{$tabindex_2}" /></div>
        <div class="mk-form-row"><textarea required="required" placeholder="{$content_str}" name="contact_content" id="contact_content" class="mk-textarea" tabindex="{$tabindex_3}"></textarea></div>
        <div class="mk-form-row"><button tabindex="{$tabindex_4}" class="mk-button outline-btn-{$skin} outline-dimension contact-form-button large">{$submit_str}</button></div>
        <i class="mk-contact-loading mk-icon-spinner mk-icon-spin"></i>
        <i class="mk-contact-success mk-icon-ok-sign"></i>
        <input type="hidden" value="{$email}" name="contact_to"/>
    </form>
    <div class="clearboth"></div>

</div>
HTML;
}
