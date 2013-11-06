<?php
/**
 * WPBakery Visual Composer Here includes useful files for plugin
 *
 * @package WPBakeryVisualComposer
 *
 */

$lib_dir = $composer_settings['COMPOSER_LIB'];
$shortcodes_dir = $composer_settings['SHORTCODES_LIB'];
$settings_dir = $composer_settings['COMPOSER'] . 'settings/';

require_once( $lib_dir . 'wp_autoupdate.php' );
require_once( $lib_dir . 'abstract.php' );
require_once( $lib_dir . 'helpers.php' );
require_once( $lib_dir . 'helpers_api.php' );
require_once( $lib_dir . 'filters.php' );
require_once( $lib_dir . 'params.php' );

require_once( $lib_dir . 'mapper.php' );
require_once( $lib_dir . 'shortcodes.php' );
require_once( $lib_dir . 'composer.php' );

require_once( $settings_dir . 'settings.php');

/* Add shortcodes classes */
require_once( $shortcodes_dir . 'row.php' );
require_once( $shortcodes_dir . 'column.php' );
require_once( $shortcodes_dir . 'page_section.php' );

require_once( $shortcodes_dir . 'tabs.php' );
require_once( $shortcodes_dir . 'accordion.php' );
require_once( $shortcodes_dir . 'custom_box.php' );
require_once( $shortcodes_dir . 'content_box.php' );
require_once( $shortcodes_dir . 'blog.php' );
require_once( $shortcodes_dir . 'general.php' );
require_once( $shortcodes_dir . 'news.php' );
require_once( $shortcodes_dir . 'portfolio.php' );
require_once( $shortcodes_dir . 'raw_content.php' );
require_once( $shortcodes_dir . 'single_image.php' );



require_once( $lib_dir . 'layouts.php' );

require_once( $lib_dir . 'params/load.php');
