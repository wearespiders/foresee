<?php
/**
 * WPBakery Visual Composer Shortcodes main
 *
 * @package WPBakeryVisualComposer
 *
 */

/*
This is were shortcodes for default content elements are
defined. Each element should have shortcode for frontend
display (on a website).

This will add shortcode that will be used in frontend site
*/

define( 'VC_SHORTCODE_CUSTOMIZE_PREFIX', 'vc_theme_' );
define( 'VC_SHORTCODE_BEFORE_CUSTOMIZE_PREFIX', 'vc_theme_before_' );
define( 'VC_SHORTCODE_AFTER_CUSTOMIZE_PREFIX', 'vc_theme_after_' );
define( 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG', 'vc_shortcodes_css_class' );
if ( !class_exists( 'WPBakeryShortCode' ) ) {
    abstract class WPBakeryShortCode extends WPBakeryVisualComposerAbstract {

        protected $shortcode;
        protected $html_template;

        protected $atts, $settings;
        protected static $enqueue_index = 0;
        protected static $js_scripts = array();
        protected static $css_scripts = array();

        public function __construct( $settings ) {
            $this->settings = $settings;
            $this->shortcode = $this->settings['base'];

            $this->addAction( 'admin_init', 'enqueueAssets' );

            $this->addShortCode( $this->shortcode, array( $this, 'output' ) );
        }

        public function enqueueAssets() {
            if ( !empty( $this->settings['admin_enqueue_js'] ) ) $this->registerJs( $this->settings['admin_enqueue_js'] );
            if ( !empty( $this->settings['admin_enqueue_css'] ) ) $this->registerCss( $this->settings['admin_enqueue_css'] );
        }

        protected function registerJs( $param ) {
            if ( is_array( $param ) ) {
                foreach ( $param as $value ) {
                    $this->registerJs( $value );
                }
            } elseif ( is_string( $param ) && !empty( $param ) ) {
                $name = $this->shortcode.'_enqueue_js_'.self::$enqueue_index++;
                self::$js_scripts[] = $name;
                wp_register_script( $name, $param,  array( 'jquery' ), time(), true );
            }
        }

        protected function registerCss( $param ) {
            if ( is_array( $param ) ) {
                foreach ( $param as $value ) {
                    $this->registerCss( $value );
                }
            } elseif ( is_string( $param ) ) {
                $name = $this->shortcode.'_enqueue_css_'.self::$enqueue_index++;
                self::$css_scripts[] = $name;
                wp_register_style( $name, $param,  array( "mk_framework"), time() );
            }
        }

        public static function enqueueCss() {
            foreach ( self::$css_scripts as $stylesheet ) {
                wp_enqueue_style( $stylesheet );
            }
        }
        public static function enqueueJs() {
            foreach ( self::$js_scripts as $script ) {
                wp_enqueue_script( $script );
            }
        }
        public function shortcode( $shortcode ) {

        }
        protected function setTemplate( $template ) {
            $this->html_template = $template;
        }
        protected function getTemplate() {
            if ( isset( $this->html_template ) ) return $this->html_template;
            return false;
        }
        protected function getFileName() {
            return $this->shortcode;
        }
        /**
         * Find html template for shortcode output.
         */
        protected function findShortcodeTemplate() {
            // Check template path in shortcode's mapping settings
            if ( !empty( $this->settings['html_template'] ) && is_file( $this->settings( 'html_template' ) ) ) {
                return $this->setTemplate( $this->settings['html_template'] );
            }
            // Check template in theme directory
            $user_template = WPBakeryVisualComposer::getUserTemplate( $this->getFilename().'.php' );
            if ( is_file( $user_template ) ) {
                return $this->setTemplate( $user_template );
            }
            // Check default place
            $default_dir = WPBakeryVisualComposer::defaultTemplatesDIR();
            if ( is_file( $default_dir.$this->getFilename().'.php' ) ) {
                return $this->setTemplate( $default_dir.$this->getFilename().'.php' );
            }
        }
        protected function content( $atts, $content = null ) {
            return $this->loadTemplate( $atts, $content );
        }
        protected function loadTemplate( $atts, $content = null ) {
            $output = '';
            if ( !$this->html_template ) $this->findShortcodeTemplate();
            if ( $this->html_template ) {
                ob_start();
                include $this->html_template;
                $output = ob_get_contents();
                ob_end_clean();
            } else {
                trigger_error( sprintf( __( 'Wrong template for `%s` shortcode in class `%s`. Please check your mapping settings for this code. Error', "mk_framework"), $this->shortcode, get_class( $this ) ) );
            }

            return $output;
        }

        public function contentAdmin( $atts, $content ) {
            $element = $this->shortcode;
            $output = $custom_markup = $width = $el_position = '';

            if ( $content != NULL ) { $content = wpautop( stripslashes( $content ) ); }

            if ( isset( $this->settings['params'] ) ) {
                $shortcode_attributes = array( 'width' => '1/1' );
                foreach ( $this->settings['params'] as $param ) {
                    if ( $param['param_name'] != 'content' ) {
                        if ( isset( $param['value'] ) ) {
                            $shortcode_attributes[$param['param_name']] = is_string( $param['value'] ) ? __( $param['value'], "mk_framework" ) : $param['value'];
                        } else {
                            $shortcode_attributes[$param['param_name']] = '';
                        }
                    } else if ( $param['param_name'] == 'content' && $content == NULL ) {
                            $content = __( $param['value'], "mk_framework" );
                        }
                }
                extract( shortcode_atts(
                        $shortcode_attributes
                        , $atts ) );
                $elem = $this->getElementHolder( $width );
                if ( isset( $atts['el_position'] ) ) $el_position = $atts['el_position'];
                $iner = $this->outputTitle( $this->settings['name'] );
                foreach ( $this->settings['params'] as $param ) {
                    $param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';
                    if ( is_array( $param_value ) ) {
                        // Get first element from the array
                        reset( $param_value );
                        $first_key = key( $param_value );
                        $param_value = $param_value[$first_key];
                    }
                    $iner .= $this->singleParamHtmlHolder( $param, $param_value );
                }
                $elem = str_ireplace( '%wpb_element_content%', $iner, $elem );
                $output .= $elem;
            } else {
                //This is used for shortcodes without params (like simple divider)
                // $column_controls = $this->getColumnControls($this->settings['controls']);
                $width = '1/1';

                $elem = $this->getElementHolder( $width );

                $inner = '';
                if ( isset( $this->settings["custom_markup"] ) && $this->settings["custom_markup"] != '' ) {
                    if ( $content != '' ) {
                        $custom_markup = str_ireplace( "%content%", $content, $this->settings["custom_markup"] );
                    } else if ( $content == '' && isset( $this->settings["default_content_in_template"] ) && $this->settings["default_content_in_template"] != '' ) {
                            $custom_markup = str_ireplace( "%content%", $this->settings["default_content_in_template"], $this->settings["custom_markup"] );
                        }
                    //$output .= do_shortcode($this->settings["custom_markup"]);
                    $inner .= do_shortcode( $custom_markup );
                }
                $elem = str_ireplace( '%wpb_element_content%', $inner, $elem );
                $output .= $elem;
            }
            return $output;
        }
        public function isAdmin() {
            return is_admin() && !empty( $_POST['action'] ) && preg_match( '/^wpb\_/', $_POST['action'] );
        }

        public function output( $atts, $content = null, $base = '' ) {
            $this->atts = $this->prepareAtts( $atts );
            $output = '';

            $content = empty( $content ) && !empty( $atts['content'] ) ? $atts['content'] : $content;

            if ( $this->isAdmin() ) $output .= $this->contentAdmin( $this->atts, $content );

            if ( empty( $output ) ) {
                $custom_output = VC_SHORTCODE_CUSTOMIZE_PREFIX.$this->shortcode;
                $custom_output_before = VC_SHORTCODE_BEFORE_CUSTOMIZE_PREFIX.$this->shortcode; // before shortcode function hook
                $custom_output_after = VC_SHORTCODE_AFTER_CUSTOMIZE_PREFIX.$this->shortcode; // after shortcode function hook

                // Before shortcode
                if ( function_exists( $custom_output_before ) ) {
                    $output .= $custom_output_before( $this->atts, $content );
                } else {
                    $output .=  $this->beforeShortcode( $this->atts, $content );
                }
                // Shortcode content
                if ( function_exists( $custom_output ) ) {
                    $output .= $custom_output( $this->atts, $content );
                } else {
                    $output .=  $this->content( $this->atts, $content );
                }
                // After shortcode
                if ( function_exists( $custom_output_after ) ) {
                    $output .= $custom_output_after( $this->atts, $content );
                } else {
                    $output .=  $this->afterShortcode( $this->atts, $content );
                }
            }
            return $output;
        }

        /**
         * Creates html before shortcode html.
         *
         * @param unknown $atts    - shortcode attributes list
         * @param unknown $content - shortcode content
         * @return string - html which will be displayed before shortcode html.
         */
        public function beforeShortcode( $atts, $content ) {
            return '';
        }

        /**
         * Creates html before shortcode html.
         *
         * @param unknown $atts    - shortcode attributes list
         * @param unknown $content - shortcode content
         * @return string - html which will be displayed after shortcode html.
         */
        public function afterShortcode( $atts, $content ) {
            return '';
        }

        public function getExtraClass( $el_class ) {
            $output = '';
            if ( $el_class != '' ) {
                $output = " " . str_replace( ".", "", $el_class );
            }
            return $output;
        }

        public function getCSSAnimation( $css_animation ) {
            $output = '';
            if ( $css_animation != '' ) {
                wp_enqueue_script( 'waypoints' );
                $output = ' wpb_animate_when_almost_visible wpb_'.$css_animation;
            }
            return $output;
        }

        /**
         * Create HTML comment for blocks
         *
         * @param unknown $string
         *
         * @return string
         */
        public function endBlockComment( $string ) {
            //return '';
            return !empty( $_GET['wpb_debug'] ) && $_GET['wpb_debug']=='true' ? '<!-- END '.$string.' -->' : '';
        }
        /**
         * Start row comment for html shortcode block
         *
         * @param unknown $position - block position
         * @return string
         */
        public function startRow( $position ) {
            $output = '';
            return '';
        }
        /**
         * End row comment for html shortcode block
         *
         * @param unknown $position -block position
         * @return string
         */

        public function endRow( $position ) {
            $output = '';
            return '';
        }
        public function settings( $name ) {
            return isset( $this->settings[$name] ) ? $this->settings[$name] : null;
        }
        public function getElementHolder( $width ) {
            $output = '';
            $column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
            $css_class = 'wpb_'.$this->settings["base"].' wpb_content_element wpb_sortable'.( !empty( $this->settings["class"] ) ? ' '.$this->settings["class"] : '' );
            $output .= '<div data-element_type="'.$this->settings["base"].'" class="'.$css_class.'">';
            $output .= str_replace( "%column_size%", wpb_translateColumnWidthToFractional( $width ), $column_controls );
            $output .= $this->getCallbacks( $this->shortcode );
            $output .= '<div class="wpb_element_wrapper '.$this->settings( "wrapper_class" ).'">';
            $output .= '%wpb_element_content%';
            $output .= '</div>'; // <!-- end .wpb_element_wrapper -->';
            $output .= '</div>'; // <!-- end #element-'.$this->shortcode.' -->';
            return $output;
        }
        /* This returs block controls
    ---------------------------------------------------------- */
        public function getColumnControls( $controls, $extended_css = '' ) {
            $controls_start = '<div class="controls controls_element'.( !empty( $extended_css ) ? " {$extended_css}" : '' ).'">';
            $controls_end = '</div>';

            $controls_add = '';//' <a class="column_add" href="#" title="'.sprintf(__('Add to %s', "mk_framework"), strtolower($this->settings('name'))).'"></a>';
            $controls_edit = ' <a class="column_edit" href="#" title="'.sprintf( __( 'Edit %s', "mk_framework"), strtolower( $this->settings( 'name' ) ) ).'"><i class="mk-icon-pencil"></i></a>';
            $controls_delete = ' <a class="column_clone" href="#" title="'.sprintf( __( 'Clone %s', "mk_framework"), strtolower( $this->settings( 'name' ) ) ).'"><i class="mk-icon-copy"></i></a> <a class="column_delete" href="#" title="'.sprintf( __( 'Delete %s', "mk_framework"), strtolower( $this->settings( 'name' ) ) ).'"><i class="mk-icon-trash"></i></a>';

            $column_controls_full = $controls_start .  $controls_add . $controls_edit . $controls_delete . $controls_end;
            $column_controls_size_delete = $controls_start . $controls_delete . $controls_end;
            $column_controls_popup_delete = $controls_start . $controls_delete . $controls_end;
            $column_controls_edit_popup_delete = $controls_start . $controls_edit . $controls_delete . $controls_end;

            if ( $controls == 'popup_delete' ) {
                return $column_controls_popup_delete;
            } else if ( $controls == 'edit_popup_delete' ) {
                    return $column_controls_edit_popup_delete;
                } else if ( $controls == 'size_delete' ) {
                    return $column_controls_size_delete;
                } else if ( $controls == 'popup_delete' ) {
                    return $column_controls_popup_delete;
                } else if ( $controls == 'add' ) {
                    return $controls_start . $controls_add . $controls_end;
                } else {
                return $column_controls_full;
            }
        }

        /* This will fire callbacks if they are defined in map.php
       ---------------------------------------------------------- */
        public function getCallbacks( $id ) {
            $output = '';

            if ( isset( $this->settings['js_callback'] ) ) {
                foreach ( $this->settings['js_callback'] as $text_val => $val ) {
                    /* TODO: name explain */
                    $output .= '<input type="hidden" class="wpb_vc_callback wpb_vc_'.$text_val.'_callback " name="'.$text_val.'" value="'.$val.'" />';
                }
            }

            return $output;
        }

        public function singleParamHtmlHolder( $param, $value ) {
            $output = '';
            // Compatibility fixes
            $old_names = array( 'yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange' );
            $new_names = array( 'alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning' );
            $value = str_ireplace( $old_names, $new_names, $value );
            //$value = __($value, "mk_framework");
            //
            $param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
            $type = isset( $param['type'] ) ? $param['type'] : '';
            $class = isset( $param['class'] ) ? $param['class'] : '';

            if ( isset( $param['holder'] ) === true && $param['holder'] !== 'hidden' ) {
                $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
            } elseif ( isset( $param['holder'] ) === true && $param['holder'] == 'input' ) {
                $output .= '<'.$param['holder'].' readonly="true" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'">';
            } elseif ( isset( $param['holder'] ) === true && in_array( $param['holder'], array( 'img', 'iframe' ) ) ) {
                $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" src="'.$value.'">';
            }

            if ( isset( $param['admin_label'] ) && $param['admin_label'] === true ) {
                $output .= '<span class="vc_admin_label admin_label_'.$param['param_name'].( empty( $value ) ? ' hidden-label' : '' ).'"><label>'.__( $param['heading'], "mk_framework").'</label>: '.$value.'</span>';
            }

            return $output;
        }

        protected function outputTitle( $title ) {
            return  '<h4 class="wpb_element_title">'.__( $title, "mk_framework").'</h4>';
        }

        public function template( $content = '' ) {
            return $this->contentAdmin( $this->atts, $content );
        }
        protected function prepareAtts( $atts ) {
            $return = array();
            if ( is_array( $atts ) ) {
                foreach ( $atts as $key => $val ) {
                    $return[$key] = preg_replace( '/\`\`/', '"', $val );
                }
            }
            return $return;
        }
    }
}
if ( !class_exists( 'WPBakeryShortCode_UniversalAdmin' ) ) {
    abstract class WPBakeryShortCode_UniversalAdmin extends WPBakeryShortCode {
        protected $html_editor_already_is_used = false;
        public function __construct( $settings ) {
            $this->settings = $settings;
            $this->addShortCode( $this->settings['base'], array( $this, 'output' ) );
        }
        protected  function content( $atts, $content = null ) {
            return '';
        }
        public function contentAdmin( $atts,  $content ) {

            $element = $this->settings['base'];
            $output = '';
            $this->loadParams();
            //if ( $content != NULL ) { $content = apply_filters('the_content', $content); }
            $content = $el_position = '';
            if ( isset( $this->settings['params'] ) ) {
                $shortcode_attributes = array();
                foreach ( $this->settings['params'] as $param ) {
                    if ( $param['param_name'] != 'content' ) {
                        $shortcode_attributes[$param['param_name']] = $param['value'];
                    } else if ( $param['param_name'] == 'content' && $content == NULL ) {
                            $content = $param['value'];
                        }
                }
                extract( shortcode_atts(
                        $shortcode_attributes
                        , $atts ) );

                $output .= '<div class="vc_span12 wpb_edit_form_elements"><h2>'.__( 'Edit', "mk_framework").' ' .__( $this->settings['name'], "mk_framework" ).'</h2>';

                foreach ( $this->settings['params'] as $param ) {
                    $param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : null;

                    if ( is_array( $param_value ) && !empty( $param['type'] ) && $param['type']!='checkbox' ) {
                        // Get first element from the array
                        reset( $param_value );
                        $first_key = key( $param_value );
                        $param_value = $param_value[$first_key];
                    }
                    $output .= $this->singleParamEditHolder( $param, $param_value );
                }

                $output .= '<div class="edit_form_actions"><a href="#" class="wpb_save_edit_form button-primary">'. __( 'Save', "mk_framework" ) .'</a></div>';

                $output .= '</div>'; //close wpb_edit_form_elements
            }
        }

        protected function singleParamEditHolder( $param, $param_value ) {
            /*
            $dependency = '';
        if ( !empty( $param['dependency'] ) && isset( $param['dependency']['element'] ) ) {
            $dependency = ' data-dependency="' . $param['dependency']['element'] . '"';

            if ( isset( $param['dependency']['not_empty'] ) && $param['dependency']['not_empty']===true ) {
                $dependency .= ' data-dependency-not-empty="true"';
            }

            if ( isset( $param['dependency']['value'] ) ) {
                if ( is_array( $param['dependency']['value'] ) ) {
                    foreach ( $param['dependency']['value'] as $val ) {
                        $dependency .= ' data-dependency-value-'.$val.'="' . $val . '"';
                    }

                } else {
                    $dependency .= ' data-dependency-value-'.$param['dependency']['value'].'="' . $param['dependency']['value'] . '"';
                }
            }
            if ( isset( $param['dependency']['callback'] ) ) {
                $dependency .= ' data-dependency-callback="' . $param['dependency']['callback'] . '"';
            }
        }
        */
            $output = '';
            if ( $param['type'] == 'hidden_input' ) {

                $output .= $this->singleParamEditForm( $param, $param_value );

            } else {
                $output = '<div class="vc_row-fluid wpb_el_type_'. $param['type'] .'">';
                $output .= ( isset( $param['heading'] ) ) ? '<div class="wpb_element_label">'.__( $param['heading'], "mk_framework" ).'</div>' : '';//vc_span3

                $output .= '<div class="edit_form_line">';//vc_span9
                $output .= $this->singleParamEditForm( $param, $param_value );
                $output .= ( isset( $param['description'] ) ) ? '<span class="description clear">'.__( $param['description'], "mk_framework" ).'</span>' : '';
                $output .= '</div>';

                $output .= '</div>';
            }

            return $output;
        }

        protected function singleParamEditForm( $param, $param_value ) {

            $param_line = '';

            // hidden_input - input
            if ( $param['type'] == 'hidden_input' ) {
                $value = __( $param_value, "mk_framework" );
                $value = $param_value;
                $param_line .= '<input name="'.$param['param_name'].'" id="'.$param['param_name'].'" class="wpb_vc_param_value mk_shortcode_hidden '.$param['param_name'].' '.$param['type'].'" type="hidden" value="'.$value.'"/>';
            }
            // Textfield - input
            else if ( $param['type'] == 'textfield' ) {
                $value = __( $param_value, "mk_framework" );
                $value = htmlspecialchars( $value );
                //$value = $param_value;
                $param_line .= '<input name="'.$param['param_name'].'" class="wpb_vc_param_value wpb-textinput '.$param['param_name'].' '.$param['type'].'" type="text" value="'.$value.'"/>';
            }
            else if ( $param['type'] == 'upload' ) {
                    $value = __( $param_value, "mk_framework" );
                    $value = $param_value;
                    $param_line .= '<div class="upload-option">';
                    $param_line .= '<input class="mk-upload-url wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'" type="text" id="' . $param['param_name']. '" name="' . $param['param_name'] . '" size="50"  value="'.$value.'" /><a class="option-upload-button thickbox" id="' . $param['param_name'] . '_button" href="#">'.__( 'Upload', 'mk_framework' ).'</a>';
                    $param_line .= '<span id="'.$param['param_name'].'-preview" class="show-upload-image" alt=""><img src="'.$value.'" title="" /></span></div>';
                }
            // Color - input
            else if ( $param['type'] == 'color' ) {
                    $value = __( $param_value, "mk_framework" );
                    $value = $param_value;
                    $param_line .= '<input name="'.$param['param_name'].'" class="color-picker composer-color-picker wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'" type="minicolors" value="'.$value.'"/>';
                    $margin_bottom = isset( $param['margin_bottom'] ) ? $param['margin_bottom'] : '0';
                    $param_line .= '<div style="margin-bottom:'.$margin_bottom.'px"></div>';
                }

            // Range - input
            else if ( $param['type'] == 'range' ) {
                    $value = __( $param_value, "mk_framework" );
                    $value = $param_value;
                    $param_line .= '<div class="mk-ui-input-slider"><div class="mk-range-input" data-value="'.$value.'" data-min="'.$param['min'].'" data-max="'.$param['max'].'" data-step="'.$param['step'].'"></div><input name="'.$param['param_name'].'"  class="range-input-selector range-input-composer wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'" type="text" value="'.$value.'"/><span class="unit">' . $param['unit'] . '</span></div>';
                }

            // Toggle - input
            else if ( $param['type'] == 'toggle' ) {
                    $value = __( $param_value, "mk_framework" );
                    $value = $param_value;
                    $param_line .= '<span class="mk-toggle-button mk-composer-toggle"><span class="toggle-handle"></span><input type="hidden" class="wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'" value="'.$value.'" name="'.$param['param_name'].'"/></span>';
                }
            // Fonts - select
            else if ( $param['type'] == 'fonts' ) {
                    $param_line .= '<select name="'.$param['param_name'].'" id="'.$param['param_name'].'" class="mk-chosen mk-shortcode-fonts-list wpb-select wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'">';

                    /*
            ** 600 Google Fonts List
            -------------------------------------------------------------*/
                    $google_webfonts = array( 'Abel', 'Abril+Fatface', 'Acid', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent+Pro', 'Aguafina+Script', 'Aladin', 'Aldrich', 'Alegreya', 'Alegreya+SC', 'Alex+Brush', 'Alfa+Slab+One', 'Alice', 'Alike', 'Alike+Angular', 'Allan', 'Allan:bold', 'Allerta', 'Allerta+Stencil', 'Allura', 'Almendra', 'Almendra+SC', 'Amaranth', 'Amatic+SC', 'Amethysta', 'Andada', 'Andika', 'Annie+Use+Your+Telescope', 'Anonymous+Pro', 'Antic', 'Antic+Didone', 'Antic+Slab', 'Anton', 'Arapey', 'Arbutus', 'Architects+Daughter', 'Arimo', 'Arizonia', 'Armata', 'Artifika', 'Arvo', 'Asap', 'Asset', 'Astloch', 'Asul', 'Atomic+Age', 'Aubrey', 'Audiowide', 'Average', 'Averia+Gruesa+Libre', 'Averia+Libre', 'Averia+Sans+Libre', 'Averia+Serif+Libre', 'Bad+Script', 'Balthazar', 'Bangers', 'Basic', 'Baumans', 'Belgrano', 'Belleza', 'Bentham', 'Berkshire+Swash', 'Bevan', 'Bigshot+One', 'Bilbo', 'Bilbo+Swash+Caps', 'Bitter', 'Black+Ops+One', 'Bonbon', 'Boogaloo', 'Bowlby+One', 'Bowlby+One+SC', 'Brawler', 'Bree+Serif', 'Bubblegum+Sans', 'Buda', 'Buda:light', 'Buenard', 'Butcherman', 'Butcherman+Caps', 'Butterfly+Kids', 'Cabin', 'Cabin+Condensed', 'Cabin+Sketch', 'Cabin+Sketch:bold', 'Cabin:bold', 'Caesar+Dressing', 'Cagliostro', 'Calligraffitti', 'Cambo', 'Candal', 'Cantarell', 'Cantata+One', 'Cardo', 'Carme', 'Carter+One', 'Caudex', 'Cedarville+Cursive', 'Ceviche+One', 'Changa+One', 'Chango', 'Chau+Philomene+One', 'Chelsea+Market', 'Cherry+Cream+Soda', 'Chewy', 'Chicle', 'Chivo', 'Coda', 'Coda:800', 'Codystar', 'Comfortaa', 'Coming+Soon', 'Concert+One', 'Condiment', 'Contrail+One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Corben:bold', 'Cousine', 'Coustard', 'Covered+By+Your+Grace', 'Crafty+Girls', 'Creepster', 'Creepster+Caps', 'Crete+Round', 'Crimson', 'Crushed', 'Cuprum', 'Cutive', 'Damion', 'Dancing+Script', 'Dawning+of+a+New+Day', 'Days+One', 'Delius', 'Delius+Swash+Caps', 'Delius+Unicase', 'Della+Respira', 'Devonshire', 'Didact+Gothic', 'Diplomata', 'Diplomata+SC', 'Doppio+One', 'Dorsa', 'Dosis', 'Dr+Sugiyama', 'Droid+Sans', 'Droid+Sans+Mono', 'Droid+Serif', 'Duru+Sans', 'Dynalight', 'EB+Garamond', 'Eater', 'Eater+Caps', 'Economica', 'Electrolize', 'Emblema+One', 'Emilys+Candy', 'Engagement', 'Enriqueta', 'Erica+One', 'Esteban', 'Euphoria+Script', 'Ewert', 'Exo', 'Expletus+Sans', 'Fanwood+Text', 'Fascinate', 'Fascinate+Inline', 'Federant', 'Federo', 'Felipa', 'Fjord+One', 'Flamenco', 'Flavors', 'Fondamento', 'Fontdiner+Swanky', 'Forum', 'Francois+One', 'Fredericka+the+Great', 'Fredoka+One', 'Fresca', 'Frijole', 'Fugaz+One', 'Galdeano', 'Gentium+Basic', 'Gentium+Book+Basic', 'Geo', 'Geostar', 'Geostar+Fill', 'Germania+One', 'Give+You+Glory', 'Glass+Antiqua', 'Glegoo', 'Gloria+Hallelujah', 'Goblin+One', 'Gochi+Hand', 'Gorditas', 'Goudy+Bookletter+1911', 'Graduate', 'Gravitas+One', 'Great+Vibes', 'Gruppo', 'Gudea', 'Habibi', 'Hammersmith+One', 'Handlee', 'Happy+Monkey', 'Henny+Penny', 'Herr+Von+Muellerhoff', 'Holtwood+One+SC', 'Homemade+Apple', 'Homenaje', 'IM+Fell', 'Iceberg', 'Iceland', 'Imprima', 'Inconsolata', 'Inder', 'Indie+Flower', 'Inika', 'Irish+Grover', 'Irish+Growler', 'Istok+Web', 'Italiana', 'Italianno', 'Jim+Nightshade', 'Jockey+One', 'Jolly+Lodger', 'Josefin+Sans', 'Josefin+Slab', 'Judson', 'Julee', 'Junge', 'Jura', 'Just+Another+Hand', 'Just+Me+Again+Down+Here', 'Kameron', 'Karla', 'Kaushan+Script', 'Kelly+Slab', 'Kenia', 'Knewave', 'Kotta+One', 'Kranky', 'Kreon', 'Kristi', 'Krona+One', 'La+Belle+Aurore', 'Lancelot', 'Lato', 'League+Script', 'Leckerli+One', 'Ledger', 'Lekton', 'Lemon', 'Lilita+One', 'Limelight', 'Linden+Hill', 'Lobster', 'Lobster+Two', 'Londrina+Shadow', 'Londrina+Sketch', 'Londrina+Solid', 'LondrinaOutline', 'Lora', 'Love+Ya+Like+A+Sister', 'Loved+by+the+King', 'Lovers+Quarrel', 'Luckiest+Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo+Swash+Caps', 'Magra', 'Maiden+Orange', 'Mako', 'Marck+Script', 'Marko+One', 'Marmelad', 'Marvel', 'Mate', 'Mate+SC', 'Maven+Pro', 'Meddon', 'MedievalSharp', 'Medula+One', 'Megrim', 'Merienda+One', 'Merriweather', 'Metamorphous', 'Metrophobic', 'Michroma', 'Miltonian', 'Miltonian+Tattoo', 'Miniver', 'Miss+Fajardose', 'Miss+Saint+Delafield', 'Modern+Antiqua', 'Molengo', 'Monofett', 'Monoton', 'Monsieur+La+Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Mountains+of+Christmas', 'Mr+Bedford', 'Mr+Bedfort', 'Mr+Dafoe', 'Mr+De+Haviland', 'Mrs+Saint+Delafield', 'Mrs+Sheppards', 'Muli', 'Mystery+Quest', 'Neucha', 'Neuton', 'News+Cycle', 'Niconne', 'Nixie+One', 'Nobile:400,700', 'Norican', 'Nosifer', 'Nosifer+Caps', 'Noticia+Text:400,700', 'Nova+Flat', 'Nova+Mono', 'Nova+Oval', 'Nova+Round', 'Nova+Script', 'Nova+Slim', 'Numans', 'Nunito', 'Old+Standard+TT', 'Oldenburg', 'Oleo+Script', 'Open+Sans:400,600,700,800', 'Orbitron', 'Original+Surfer', 'Oswald', 'Over+the+Rainbow', 'Overlock', 'Overlock+SC', 'Ovo', 'Oxygen', 'PT+Mono', 'PT+Sans:400,700', 'PT+Sans+Narrow', 'PT+Serif', 'PT+Serif+Caption', 'Pacifico', 'Parisienne', 'Passero+One', 'Passion+One', 'Patrick+Hand', 'Patua+One', 'Paytone+One', 'Permanent+Marker', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon+Script', 'Plaster', 'Play', 'Playball', 'Playfair+Display', 'Podkova', 'Poiret+One', 'Poller+One', 'Poly', 'Pompiere', 'Pontano+Sans', 'Port+Lligat+Sans', 'Port+Lligat+Slab', 'Prata', 'Press+Start+2P', 'Princess+Sofia', 'Prociono', 'Prosto+One', 'Puritan', 'Quantico', 'Quattrocento', 'Quattrocento+Sans', 'Questrial', 'Quicksand:300,400,700', 'Qwigley', 'Radley', 'Raleway', 'Raleway:100', 'Rammetto+One', 'Rancho', 'Rationale', 'Redressed', 'Reenie+Beanie', 'Revalia', 'Ribeye', 'Ribeye+Marrow', 'Righteous', 'Rochester', 'Rock+Salt', 'Rokkitt', 'Ropa+Sans', 'Rosario', 'Rosarivo', 'Rouge+Script', 'Ruda', 'Ruge+Boogie', 'Ruluko', 'Ruslan+Display', 'Russo One', 'Ruthie', 'Sail', 'Salsa', 'Sancreek', 'Sansita+One', 'Sarina', 'Satisfy', 'Schoolbell', 'Seaweed+Script', 'Sevillana', 'Shadows+Into+Light', 'Shadows+Into+Light+Two', 'Shanti', 'Share', 'Shojumaru', 'Short+Stack', 'Sigmar+One', 'Signika', 'Signika+Negative', 'Simonetta', 'Sirin+Stencil', 'Six+Caps', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Sniglet:800', 'Snippet', 'Sofia', 'Sonsie+One', 'Sorts+Mill+Goudy', 'Special+Elite', 'Spicy+Rice', 'Spinnaker', 'Spirax', 'Squada+One', 'Stardos+Stencil', 'Stint+Ultra+Condensed', 'Stint+Ultra+Expanded', 'Stoke', 'Sue+Ellen+Francisco', 'Sunshiney', 'Supermercado+One', 'Swanky+and+Moo+Moo', 'Syncopate', 'Tangerine', 'Telex', 'Tenor+Sans', 'Terminal+Dosis', 'Terminal+Dosis+Light', 'The+Girl+Next+Door', 'Tienne', 'Tinos', 'Titillium+Web:400,300,600,700,900', 'Titan+One', 'Trade+Winds', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen+One', 'Ubuntu', 'Ubuntu+Condensed', 'Ubuntu+Mono', 'Ultra', 'Uncial+Antiqua', 'UnifrakturCook', 'UnifrakturCook:bold', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Varela', 'Varela+Round', 'Vast+Shadow', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Voltaire', 'Waiting+for+the+Sunrise', 'Wallpoet', 'Walter+Turncoat', 'Wellfleet', 'Wire+One', 'Yanone+Kaffeesatz', 'Yellowtail', 'Yeseva+One', 'Yesteryear', 'Zeyada' );


                    /*
            ** Safe Fonts List
            -------------------------------------------------------------*/
                    $safe_fonts = array( 'Arial, Helvetica, sans-serif', 'Arial Black, Gadget, sans-serif', 'Bookman Old Style, serif', 'Comic Sans MS, cursive', 'Courier, monospace', 'Courier New, Courier, monospace', 'Garamond, serif', 'Georgia, serif', 'Impact, Charcoal, sans-serif', 'Lucida Console, Monaco, monospace', 'Lucida Grande, Lucida Sans Unicode, sans-serif', 'MS Sans Serif, Geneva, sans-serif', 'MS Serif, New York, sans-serif', 'Palatino Linotype, Book Antiqua, Palatino, serif', 'Tahoma, Geneva, sans-serif', 'Times New Roman, Times, serif', 'Trebuchet MS, Helvetica, sans-serif', 'Verdana, Geneva, sans-serif' );

                    $param_line .= '<option data-type="" value="none">Select Font</option>';
                    /* List Safe Fonts */
                    foreach ( $safe_fonts as $safe_font ) {

                        $param_line .= '<option data-type="safefont" ';
                        if ( $param_value == $safe_font ) {
                            $param_line .= ' selected="selected"';
                        }
                        $param_line .= " value='" . $safe_font . "' >- Safe Font - " . $safe_font . "</option>";
                    }

                    /* List Google Fonts */
                    foreach ( $google_webfonts as $google_webfont ) {

                        $param_line .= '<option data-type="google" ';
                        if ( $param_value == $google_webfont ) {
                            $param_line .= ' selected="selected"';
                        }
                        $param_line .= 'value="' . $google_webfont . '" >- Google Fonts - ' . str_replace( '+', ' ', $google_webfont ) . '</option>';
                    }

                    $fontface = array();
                    $stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
                    if ( file_exists( $stylesheet ) ) {
                        $file_content = file_get_contents( $stylesheet );
                        if ( preg_match_all( "/@font-face\s*{.*?font-family\s*:\s*('|\")(.*?)\\1.*?}/is", $file_content, $matchs ) ) {
                            foreach ( $matchs[0] as $index => $css ) {
                                $fontface[$matchs[2][$index]] = array(
                                    'name' => $matchs[2][$index],
                                    'css' => $css,
                                );
                            }

                        }
                    }

                    $count = 1;
                    foreach ( $fontface as $value => $font ) {
                        $param_line .=  '<option data-type="fontface" ';
                        if ( $param_value == $value ) {
                            $param_line .= ' selected="selected"';
                        }
                        $param_line .=  ' value="' . $value . '" >- Fontface - ' . $font['name'] . '</option>';
                        $count++;
                    }

                    $param_line .= '</select>';
                }


            else if ( $param['type'] == 'awesome_icons' ) {
                    $value = __( $param_value, "mk_framework" );
                    $value = $param_value;
                    $param_line .= '<input autocomplete="off" size="60" placeholder="Type Icon Name to Filter" type="text" class="page-composer-icon-filter" value="" name="icon-filter-by-name" />';
                    $param_line .= '<div class="mk-visual-selector mk-font-icons-wrapper">';
                    if ( $param['encoding'] == 'true' ) {
                        foreach ( $param['value'] as $key => $option ) {
                            if ( $key ) {
                                $param_line .= '<a href="#" title="Class Name : mk-'.$key.'" rel="'.$option.'"><span>'.$key.'</span><i class="mk-'.$key.'" ></i></a>';
                            } else {
                                $param_line .= '<a class="mk-no-icon" href="#" rel="">r</a>';
                            }
                        }
                    } else {
                        foreach ( $param['value'] as $key => $option ) {
                            if ( $key ) {
                                $param_line .= '<a href="#" title="Class Name : mk-'.$key.'" rel="'.$key.'"><span>'.$key.'</span><i class="mk-'.$key.'" ></i></a>';
                            } else {
                                $param_line .= '<a class="mk-no-icon" href="#" rel="">r</a>';
                            }
                        }
                    }

                    $param_line .= '<input name="'.$param['param_name'].'" id="'.$param['param_name'].'" class="wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'" type="hidden" value="'.$value.'"/>';
                    $param_line .= '</div>';
                }



            // visual_selector - input
            else if ( $param['type'] == 'visual_selector' ) {
                $border = ( $param['border'] == 'true' ) ? 'border:1px solid #ddd;' : '';
                $param_line .= '<div class="mk-visual-selector">';
                foreach ( $param['value'] as $key => $option ) {
                    $param_line .= '<a style="margin:15px 15px 0 0;'.$border.'" href="#" rel="'.$option.'"><img  src="' . THEME_ADMIN_ASSETS_URI . '/images/'.$key.'" /></a>';
                }
                $param_line .= '<input name="'.$param['param_name'].'" id="'.$param['param_name'].'" class="wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'" type="hidden" value="'.$param_value.'"/>';
                $param_line .= '</div>';

            }



            // Dropdown - select
            else if ( $param['type'] == 'multiselect' ) {
                    $param_line .= '<select multiple="multiple" name="'.$param['param_name'].'" class="mk-chosen wpb-multiselect wpb_vc_param_value '.$param['param_name'].' '.$param['type'].'">';
                    if ( $param['options'] != null && !empty( $param['options'] ) ) {
                        foreach ( $param['options'] as $key => $value ) {
                            $selected = '';
                            if ( in_array( $key, explode( ',', $param_value ) ) ) { $selected = ' selected="selected"'; }
                            $param_line .= '<option class="'.$key.'" value="'.$key.'"'.$selected.'>'.$value.'</option>';
                        }
                    }
                    $param_line .= '</select>';
                }

            // Dropdown - select
            else if ( $param['type'] == 'dropdown' ) {
                    $param_line .= '<select name="'.$param['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select '.$param['param_name'].' '.$param['type'].'">';
                    $param_line .= '<option class="" value="">'.__( 'Select option', "mk_framework" ).'</option>';
                    foreach ( $param['value'] as $text_val => $val ) {
                        if ( is_numeric( $text_val ) && is_string( $val ) || is_numeric( $text_val ) && is_numeric( $val ) ) {
                            $text_val = $val;
                        }
                        $text_val = __( $text_val, "mk_framework" );
                        //$val = strtolower(str_replace(array(" "), array("_"), $val));
                        //$val = strtolower(str_replace(array(" "), array("_"), $val)); //issue #464 github
                        $selected = '';
                        if ( $val == $param_value ) $selected = ' selected="selected"';
                        $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
                    }
                    $param_line .= '</select>';
                }
            // WYSIWYG field
            else if ( $param['type'] == 'textarea_html' ) {
                    if ( $this->html_editor_already_is_used!==false ) {
                        $param_value = __( $param_value, "mk_framework" );
                        $param_line .= '<textarea name="'.$param['param_name'].'" class="wpb_vc_param_value wpb-textarea '.$param['param_name'].' textarea">'.$param_value.'</textarea>';
                        $param_line .= '<div class="updated"><p>'.__( 'Field type is changed from `textarea_html` to `textarea`, because it is already used by `'.$this->html_editor_already_is_used.'` field. Textarea_html field\'s type can be used only once per shortcode.', "mk_framework").'</p></div>';
                    } else {
                        $this->html_editor_already_is_used = $param['param_name'];
                        $param_line .= do_shortcode_param_settings_field( 'textarea_html', $param, $param_value );
                    }
                    // $param_line .= $this->getTinyHtmlTextArea($param, $param_value);
                }
            // Checkboxes with post types
            else if ( $param['type'] == 'checkbox' ) {
                    $param_line .= '<input class="wpb_vc_param_value wpb-checkboxes" type="hidden" value="" name="'.$param['param_name'].'"/>';
                    $current_value = explode( ",", $param_value );
                    $values = is_array( $param['value'] ) ? $param['value'] : array();
                    foreach ( $values as $label => $v ) {
                        $checked = in_array( $v, $current_value ) ? ' checked="checked"' : '';
                        $param_line .= ' <input id="'. $param['param_name'] . '-' . $v .'" value="' . $v . '" class="'.$param['param_name'].' '.$param['type'].'" type="checkbox" name="'.$param['param_name'].'"'.$checked.'> ' . __( $label, "mk_framework" );
                    }
                }
            else if ( $param['type'] == 'posttypes' ) {
                    $param_line .= '<input class="wpb_vc_param_value wpb-checkboxes" type="hidden" value="" name="'.$param['param_name'].'"/>';
                    $args = array(
                        'public'   => true
                    );
                    $post_types = get_post_types( $args );
                    foreach ( $post_types as $post_type ) {
                        $checked = "";
                        if ( $post_type != 'attachment' ) {
                            if ( in_array( $post_type, explode( ",", $param_value ) ) ) $checked = ' checked="checked"';
                            $param_line .= ' <input id="'. $param['param_name'] . '-' . $post_type .'" value="' . $post_type . '" class="'.$param['param_name'].' '.$param['type'].'" type="checkbox" name="'.$param['param_name'].'"'.$checked.'> ' . $post_type;
                        }
                    }
                }
            else if ( $param['type'] == 'taxonomies' || $param['type'] == 'taxomonies' ) {
                    $param_line .= '<input class="wpb_vc_param_value wpb-checkboxes" type="hidden" value="" name=""/>';
                    $post_types = get_post_types( array( 'public' => false, 'name' => 'attachment' ), 'names', 'NOT' );
                    foreach ( $post_types as $type ) {
                        $taxonomies = get_object_taxonomies( $type , '' );
                        foreach ( $taxonomies as $tax ) {
                            $checked = "";
                            if ( in_array( $tax->name, explode( ",", $param_value ) ) ) $checked = ' checked="checked"';
                            $param_line .= ' <label data-post-type="' . $type . '"><input id="'. $param['param_name'] . '-' . $tax->name .'" value="' . $tax->name . '" data-post-type="' . $type . '" class="'.$param['param_name'].' '.$param['type'].'" type="checkbox" name="'.$param['param_name'].'"'.$checked.'> ' . $tax->label. '</label>';
                        }
                    }
                }
            // Exploded textarea
            else if ( $param['type'] == 'exploded_textarea' ) {
                    $param_value = str_replace( ",", "\n", $param_value );
                    $param_line .= '<textarea name="'.$param['param_name'].'" class="wpb_vc_param_value wpb-textarea '.$param['param_name'].' '.$param['type'].'">'.$param_value.'</textarea>';
                } 
            // Big Regular textarea
            else if ( $param['type'] == 'textarea_raw_html' ) {
                    // $param_value = __($param_value, "mk_framework");
                    $param_line .= '<textarea name="'.$param['param_name'].'" class="wpb_vc_param_value wpb-textarea_raw_html '.$param['param_name'].' '.$param['type'].'" rows="16">' . htmlentities( rawurldecode( base64_decode( $param_value ) ), ENT_COMPAT, 'UTF-8' ) . '</textarea>';
                }
            // Regular textarea
            else if ( $param['type'] == 'textarea' ) {
                    $param_value = __( $param_value, "mk_framework" );
                    $param_line .= '<textarea name="'.$param['param_name'].'" class="wpb_vc_param_value wpb-textarea '.$param['param_name'].' '.$param['type'].'">'.$param_value.'</textarea>';
                }
            // Attach images
            else if ( $param['type'] == 'attach_images' ) {
                    // TODO: More native way
                    $param_value = wpb_removeNotExistingImgIDs( $param_value );
                    $param_line .= '<input type="hidden" class="wpb_vc_param_value gallery_widget_attached_images_ids '.$param['param_name'].' '.$param['type'].'" name="'.$param['param_name'].'" value="'.$param_value.'"/>';
                    //$param_line .= '<a class="button gallery_widget_add_images" href="#" title="'.__('Add images', "mk_framework").'">'.__('Add images', "mk_framework").'</a>';
                    $param_line .= '<div class="gallery_widget_attached_images">';
                    $param_line .= '<ul class="gallery_widget_attached_images_list">';
                    $param_line .= ( $param_value != '' ) ? fieldAttachedImages( explode( ",", $param_value ) ) : '';
                    $param_line .= '</ul>';
                    $param_line .= '</div>';
                    $param_line .= '<div class="gallery_widget_site_images">';
                    // $param_line .= siteAttachedImages(explode(",", $param_value));
                    $param_line .= '</div>';
                    $param_line .= '<a class="gallery_widget_add_images" href="#" title="'.__( 'Add images', "mk_framework" ).'">'.__( 'Add images', "mk_framework" ).'</a>';//class: button
                    //$param_line .= '<div class="wpb_clear"></div>';
                }
            else if ( $param['type'] == 'attach_image' ) {
                    $param_value = wpb_removeNotExistingImgIDs( preg_replace( '/[^\d]/', '', $param_value ) );
                    $param_line .= '<input type="hidden" class="wpb_vc_param_value gallery_widget_attached_images_ids '.$param['param_name'].' '.$param['type'].'" name="'.$param['param_name'].'" value="'.$param_value.'"/>';
                    //$param_line .= '<a class="button gallery_widget_add_images" href="#" use-single="true" title="'.__('Add image', "mk_framework").'">'.__('Add image', "mk_framework").'</a>';
                    $param_line .= '<div class="gallery_widget_attached_images">';
                    $param_line .= '<ul class="gallery_widget_attached_images_list">';
                    $param_line .= ( $param_value != '' ) ? fieldAttachedImages( explode( ",", $param_value ) ) : '';
                    $param_line .= '</ul>';
                    $param_line .= '</div>';
                    $param_line .= '<div class="gallery_widget_site_images">';
                    // $param_line .= siteAttachedImages(explode(",", $param_value));
                    $param_line .= '</div>';
                    $param_line .= '<a class="gallery_widget_add_images" href="#" use-single="true" title="'.__( 'Add image', "mk_framework" ).'">'.__( 'Add image', "mk_framework" ).'</a>';//class: button
                    //$param_line .= '<div class="wpb_clear"></div>';
                }       //
            else if ( $param['type'] == 'widgetised_sidebars' ) {
                    $wpb_sidebar_ids = array();
                    $sidebars = $GLOBALS['wp_registered_sidebars'];

                    $param_line .= '<select name="'.$param['param_name'].'" class="wpb_vc_param_value dropdown wpb-input wpb-select '.$param['param_name'].' '.$param['type'].'">';
                    foreach ( $sidebars as $sidebar ) {
                        $selected = '';
                        if ( $sidebar["id"] == $param_value ) $selected = ' selected="selected"';
                        $sidebar_name = __( $sidebar["name"], "mk_framework" );
                        $param_line .= '<option value="'.$sidebar["id"].'"'.$selected.'>'.$sidebar_name.'</option>';
                    }
                    $param_line .= '</select>';
                } else {
                $param_line .= do_shortcode_param_settings_field( $param['type'], $param, $param_value );
            }


            return $param_line;
        }

        protected function getTinyHtmlTextArea( $param = array(), $param_value ) {
            $param_line = '';

            //$upload_media_btns = '<div class="wpb_media-buttons hide-if-no-js"> '.__('Upload/Insert').' <a title="'.__('Add an Image').'" class="wpb_insert-image" href="#"><img alt="'.__('Add an Image').'" src="'.home_url().'/wp-admin/images/media-button-image.gif"></a> <a class="wpb_switch-editors" title="'.__('Switch Editors').'" href="#">HTML mode</a></div>';

            if ( function_exists( 'wp_editor' ) ) {
                $default_content = __( $param_value, "mk_framework" );
                $output_value = '';
                // WP 3.3+
                ob_start();
                wp_editor( $default_content, 'wpb_tinymce_'.$param['param_name'], array( 'editor_class' => 'wpb_vc_param_value wpb-textarea visual_composer_tinymce '.$param['param_name'].' '.$param['type'], 'media_buttons' => true, 'wpautop' => true ) );
                $output_value = ob_get_contents();
                ob_end_clean();
                $param_line .= $output_value;
            }
            return $param_line;
        }
    }
}
if ( !class_exists( 'WPBakeryShortCode_Settings' ) ) {
    class WPBakeryShortCode_Settings extends WPBakeryShortCode_UniversalAdmin {

        public function content( $atts, $content = null ) {
            return '';
        }

        public function contentAdmin( $atts, $content ) {
            $this->loadDefaultParams();
            $output = $el_position = '';

            //if ( $content != NULL ) { $content = apply_filters('the_content', $content); }
            if ( isset( $this->settings['params'] ) ) {
                $shortcode_attributes = array();
                foreach ( $this->settings['params'] as $param ) {
                    if ( $param['param_name'] != 'content' ) {
                        $shortcode_attributes[$param['param_name']] = isset( $param['value'] ) ? $param['value'] : null;
                    } else if ( $param['param_name'] == 'content' && $content == NULL ) {
                            $content = $param['value'];
                        }
                }
                extract( shortcode_atts(
                        $shortcode_attributes
                        , $atts ) );

                $output .= '<div class="vc_span12 wpb_edit_form_elements"><h2 style="display: none;">'.__( 'Edit', "mk_framework").' ' .__( $this->settings['name'], "mk_framework" ).'</h2>';

                foreach ( $this->settings['params'] as $param ) {
                    $param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';
                    if ( is_array( $param_value ) && !empty( $param_value ) && !empty( $param['type'] ) && $param['type']!='checkbox' ) {
                        // Get first element from the array
                        reset( $param_value );
                        $first_key = key( $param_value );
                        $param_value = $param_value[$first_key];
                    } elseif ( is_array( $param_value ) ) {
                        $param_value = '';
                    }
                    $output .= $this->singleParamEditHolder( $param, $param_value );
                    if ( $param['param_name'] == 'el_position' ) $el_position = $param_value;

                }

                $output .= '</div>'; //close wpb_edit_form_elements

                foreach ( WpbakeryShortcodeParams::getScripts() as $script ) {
                    $output .= "\n\n".'<script type="text/javascripts" src="'.$script.'"></script>';
                }
            }

            return $output;
        }

        public function loadDefaultParams() {
            global $vc_params_list;
            if ( empty( $vc_params_list ) ) return false;
            $script_url = WPBakeryVisualComposer::getInstance()->assetURL( 'js/params/all.js' );
            foreach ( $vc_params_list as $param ) {
                add_shortcode_param( $param, 'vc_'.$param.'_form_field', $script_url );
            }
        }
    }
}
if ( !class_exists( 'WPBakeryShortCodeFishBones' ) ) {
    class WPBakeryShortCodeFishBones extends WPBakeryShortCode {

        public function __construct( $settings ) {
            $this->settings = $settings;
            $this->shortcode = $this->settings['base'];
            $this->addAction( 'admin_print_scripts-post.php', 'enqueueAssets' );
            $this->addAction( 'admin_print_scripts-post-new.php', 'enqueueAssets' );
            if ( $this->isAdmin() ) {
                $this->removeShortCode( $this->shortcode );
                $this->addShortCode( $this->shortcode, array( $this, 'output' ) );
            }
        }

        protected function content( $atts, $content = null ) {
            return ''; // this method is not used
        }
    }
}
