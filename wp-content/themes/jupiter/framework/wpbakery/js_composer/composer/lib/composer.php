<?php
/**
 * WPBakery Visual Composer main class
 * @package WPBakeryVisualComposer
 *
 */
if (!class_exists('WPBakeryVisualComposer')) {
    class WPBakeryVisualComposer extends WPBakeryVisualComposerAbstract {
        private $postTypes;
        private $layout;
        protected $shortcodes, $images_media_tab;
        protected static $user_template_dir = '';

        public static function getInstance($is_admin = false) {
            static $instance=null;
            if ($instance === null)
                $instance = new WPBakeryVisualComposer($is_admin);
            return $instance;
        }
        public function setPlugin() {
            $this->is_plugin = true;
            $this->is_theme = false;
            $this->postTypes = null;
        }
        public function setTheme() {
            $this->is_plugin = false;
            $this->is_theme = true;
            $this->postTypes = null;
        }
        public function isPlugin() {
            return $this->is_plugin;
        }

        public function isTheme() {
            return $this->is_theme;
        }
        public function getPostTypes() {
            if(is_array($this->postTypes)) return $this->postTypes;

            if ( $this->isPlugin() ) {
                $pt_array = get_option('wpb_js_content_types');
                $this->postTypes = $pt_array ? $pt_array : $this->config('default_post_types');
            } else {
                $pt_array = get_option('wpb_js_theme_content_types');
                $this->postTypes = $pt_array ? $pt_array : $this->config('default_post_types');
            }
            return $this->postTypes;
        }

        public function getLayout() {
            if($this->layout==null)
                $this->layout = new WPBakeryVisualComposerLayout();
            return $this->layout;
        }

        /* Add shortCode to plugin */
        public function addShortCodePlugin($shortcode) {
            $name = 'WPBakeryShortCode_' . $shortcode['base'];
            if( class_exists( $name ) && is_subclass_of( $name, 'WPBakeryShortCode' ) )
                $this->shortcodes[$shortcode['base']] = new $name($shortcode);
            else
                $this->shortcodes[$shortcode['base']] = new WPBakeryShortCodeFishBones($shortcode);
        }

        public function getShortCode($tag) {
            if(!isset($this->shortcodes[$tag])) {
                $this->createShortCodes();
            }
            return $this->shortcodes[$tag];
        }

        public function createColumnShortCode() {
            // $this->shortcodes['vc_column'] = new WPBakeryShortCode_VC_Column( array('base' => 'vc_column') );
        }

        public function createShortCodes() {
            remove_all_shortcodes();
            foreach( WPBMap::getShortCodes() as $sc_base => $el) {
                $name = 'WPBakeryShortCode_' . $el['base'];
                if( class_exists( $name ) && is_subclass_of( $name, 'WPBakeryShortCode' ) )
                    $this->shortcodes[$sc_base] = new $name($el);
                else
                    $this->shortcodes[$sc_base] = new WPBakeryShortCodeFishBones($el);
            }

            $this->createColumnShortCode();
        }

        /* Save generated shortcodes, html and visual composer
          status in posts meta
       ---------------------------------------------------------- */
        public function saveMetaBoxes($post_id) {
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
            $value = $this->post( 'wpb_vc_js_status' );
            if ($value !== null) {
                // Add value
                if ( get_post_meta( $post_id, '_wpb_vc_js_status' ) == '' ) { add_post_meta( $post_id, '_wpb_vc_js_status', $value, true );	}
                // Update value
                elseif ( $value != get_post_meta( $post_id, '_wpb_vc_js_status', true ) ) { update_post_meta( $post_id, '_wpb_vc_js_status', $value ); }
                // Delete value
                elseif ( $value == '' ) { delete_post_meta( $post_id, '_wpb_vc_js_status', get_post_meta( $post_id, '_wpb_vc_js_status', true ) ); }
            }

            if(($value = $this->post( 'wpb_vc_js_interface_version' ))!==null) {
                update_post_meta( $post_id, '_wpb_vc_js_interface_version', $value );
            }
        }

        /**
         * Create shortcode's string
         * @deprecated
         */
        public function elementBackendHtmlJavascript_callback() {
            global $current_user;
            get_currentuserinfo();
            $data_element = $this->post( 'data_element' );

            /** @var $settings - get use group access rules */
            $settings = WPBakeryVisualComposerSettings::get('groups_access_rules');
            $role = $current_user->roles[0];

            if ( $data_element == 'vc_column' && $this->post( 'data_width' )!==null ) {
                $output = do_shortcode( '[vc_column width="'. $this->post( 'data_width' ).'"]' );
                echo $output;
            } elseif($data_element == 'vc_row' || $data_element == 'vc_row_inner' || $data_element == 'mk_page_section') {
                $output = do_shortcode( '['.$data_element.']' );
                echo $output;
            } elseif ( !isset($settings[$role]['shortcodes']) || ( isset($settings[$role]['shortcodes'][$data_element]) && (int)$settings[$role]['shortcodes'][$data_element] == 1 ) ) {
                $output = do_shortcode( '['.$data_element.']' );
                echo $output;
            }
            die();
        }

        /**
         * Creates vc_row shortcode string.
         * @deprecated
         */
        public function elementRowBackendHtmlJavascript_callback() {
            global $current_user;
            get_currentuserinfo();
            $data_element = $this->post( 'data_element' );
            $data_width = $this->post( 'data_width' );
            /** @var $settings - get use group access rules */
            $settings = WPBakeryVisualComposerSettings::get('groups_access_rules');
            $role = $current_user->roles[0];
            if ( $data_element == 'vc_column' ) {
                $output = do_shortcode( '[vc_row][vc_column width="'. ($data_width ? $data_width : '1/1') .'"][/vc_row]' );
                echo $output;
            } elseif( !isset($settings[$role]['shortcodes']) || ( isset($settings[$role]['shortcodes'][$data_element]) && (int)$settings[$role]['shortcodes'][$data_element] == 1 ) ) {
                $output = do_shortcode( '[vc_row][vc_column width="1/1"]['.$data_element.'][/vc_column][/vc_row]' );
                echo $output;
            }
            die();
        }


        public function shortCodesVisualComposerJavascript_callback() {
            $content = $this->post( 'content' );
            $content = stripslashes( $content );
            $this->createShortCodes();
            $not_shortcodes = preg_split('/'.get_shortcode_regex().'/', $content);
            foreach($not_shortcodes as $string ) {
                if( strlen(trim($string))>0 ) {
                    $content = preg_replace("/(".preg_quote($string, '/')."(?!\[\/))/", '[vc_row][vc_column width="1/1"][vc_column_text width="1/1" el_position="first last"]$1[/vc_column_text][/vc_column][/vc_row]', $content);
                }
            }
            // $content = preg_replace('/^([^\[]+)|([^\]]+)$/', '[vc_column_text width="1/1" el_position="first last"]$1$2[/vc_column_text]', $content);
            $output = wpb_js_remove_wpautop( $content );
            echo $output;
            die();
        }

        public function singleImageSrcJavascript_callback() {
            $image_id = (int)$this->post( 'content' );
            if(empty($image_id)) die('');
            $thumb_src = wp_get_attachment_image_src($image_id);
            echo $thumb_src ? $thumb_src[0] : '';
            die();
        }

        public function galleryHTMLJavascript_callback() {
            $images = $this->post( 'content' );
            if(!empty($images)) {
                echo fieldAttachedImages(explode(",", $images));
            }
            die();
        }

        public function getEditFormJavascript_callback() {
            $tag = $this->post( 'tag' );
            $atts = $this->post('atts');
            $content = $this->post('content');

            $this->removeShortCode($tag);
            $settings = WPBMap::getShortCode($tag);
            $settings = new WPBakeryShortCode_Settings($settings);
            echo $settings->contentAdmin($atts, $content);
            die();
        }

        public function showEditFormJavascript_callback() {
            $element = $this->post( 'element' );
            $shortCode = stripslashes($this->post( 'shortcode' ));

            $this->removeShortCode($element);
            $settings = WPBMap::getShortCode($element);
            new WPBakeryShortCode_Settings($settings);

            echo do_shortcode($shortCode);

            die();
        }

        public function saveTemplateJavascript_callback() {
            $output = '';
            $template_name = $this->post( 'template_name' );
            $template = $this->post( 'template' );

            if ( !isset($template_name) || $template_name == "" || !isset($template) || $template == "" ) { echo 'Error: TPL-01'; die(); }

            $template_arr = array( "name" => stripslashes($template_name), "template" => stripslashes($template) );
            $option_name = 'wpb_js_templates';
            $saved_templates = get_option($option_name);

            /*if ( $saved_templates == false ) {
                update_option('wpb_js_templates', $template_arr);
            }*/

            $template_id = sanitize_title($template_name)."_".rand();
            if ( $saved_templates == false ) {
                $deprecated = '';
                $autoload = 'no';
                //
                $new_template = array();
                $new_template[$template_id] = $template_arr;
                //
                add_option( $option_name, $new_template, $deprecated, $autoload );
            } else {
                $saved_templates[$template_id] = $template_arr;
                update_option($option_name, $saved_templates);
            }

            echo $this->getLayout()->getNavBar()->getTemplateMenu(true);

            //delete_option('wpb_js_templates');

            die();
        }

        public function Convert2NewVersionJavascript_callback(){
            global $post;
            $content = $this->post('data');
            if(!empty( $content)) {
                $pattern = get_shortcode_regex();
                $content = str_ireplace('\"', '"', $content);
                $content = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
            }
            echo $content;
            die();
        }

        public function loadTemplateJavascript_callback() {
            $output = '';
            $template_id = $this->post( 'template_id' );

            if ( !isset($template_id) || $template_id == "" ) { echo 'Error: TPL-02'; die(); }

            $option_name = 'wpb_js_templates';
            $saved_templates = get_option($option_name);

            $content = $saved_templates[$template_id]['template'];
            // $content = str_ireplace('\"', '"', $content);
            //echo $content;
            $pattern = get_shortcode_regex();
            $content = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
            echo do_shortcode($content);

            die();
        }

        public function loadTemplateShortcodesJavascript_callback() {
            $template_id = $this->post( 'template_id' );

            if ( !isset($template_id) || $template_id == "" ) { echo 'Error: TPL-02'; die(); }

            $option_name = 'wpb_js_templates';
            $saved_templates = get_option($option_name);

            $content = $saved_templates[$template_id]['template'];
            //echo $content;
            $pattern = get_shortcode_regex();
            $content = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
            echo $content;
            die();
        }

        public function deleteTemplateJavascript_callback() {
            $template_id = $this->post( 'template_id' );

            if ( !isset($template_id) || $template_id == "" ) { echo 'Error: TPL-03'; die(); }

            $option_name = 'wpb_js_templates';
            $saved_templates = get_option($option_name);
            unset($saved_templates[$template_id]);
            if ( count($saved_templates) > 0 ) {
                update_option($option_name, $saved_templates);
            } else {
                delete_option($option_name);
            }

            echo $this->getLayout()->getNavBar()->getTemplateMenu(true);

            die();
        }

        public function getLoopSettingsJavascript_callback() {
            $loop_settings = new VcLoopSettings($this->post('value'), $this->post('settings'));
            $loop_settings->render();
            die();
        }

        public function getLoopSuggestionJavascript_callback() {
            $loop_suggestions = new VcLoopSuggestions($this->post('field'), $this->post('query'), $this->post('exclude'));
            $loop_suggestions->render();
            die();
        }

        public function removeSettingsNotificationJavascript_callback() {
            WPBakeryVisualComposerSettings::removeNotification();
        }

        public function excerptFilter($output) {
            global $post;
            if(empty($output) && !empty($post->post_content)) {
                $text = do_shortcode($post->post_content);
                $excerpt_length = apply_filters('excerpt_length', 30);
                $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
                $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
                return $text;
            }
            return $output;
        }
        public function customizeControlsFooterScripts() {
        }

        public static function uploadDir() {
            return '/js_composer';
        }
        public static function getUserTemplate($template) {
            if(empty(self::$user_template_dir)) {
                $dir_name = isset(WPBakeryVisualComposer::$config['USER_DIR_NAME']) ? WPBakeryVisualComposer::$config['USER_DIR_NAME'] : 'shortcodes';
                self::$user_template_dir = get_template_directory().'/'.$dir_name.'/';
            }
            return self::$user_template_dir.$template;
        }
        public static function defaultTemplatesDIR() {
            if(isset(WPBakeryVisualComposer::$config['HTML_TEMPLATES'])) {
                return  WPBakeryVisualComposer::$config['HTML_TEMPLATES'];
            }
            return WPBakeryVisualComposer::$config['COMPOSER'].'shortcodes_templates/';
        }
    }
}
