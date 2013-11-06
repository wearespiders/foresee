<?php

$theme = new Theme();
$theme->init(array(
    "theme_name" => "Jupiter",
    "theme_slug" => "JP"
));


class Theme
{
    function init($options)
    {
        $this->constants($options);
        add_action('init', array(
            &$this,
            'language'
        ));
        $this->functions();
        $this->plugins();
        $this->admin();
        
        add_action('after_setup_theme', array(
            &$this,
            'supports'
        ));
        add_action('widgets_init', array(
            &$this,
            'widgets'
        ));
        
    }
    
    
     
    
    
    
    function constants($options)
    {
        define("THEME_DIR", get_template_directory());
        define("THEME_DIR_URI", get_template_directory_uri());
        define("THEME_NAME", $options["theme_name"]);
        if ( defined( "ICL_LANGUAGE_CODE" )) {$lang="_".ICL_LANGUAGE_CODE;} else {$lang = "";}
        define( "THEME_OPTIONS", $options["theme_name"] . '_options' . $lang );
        define("THEME_SLUG", $options["theme_slug"]);
        
        /* ------ */
        define("THEME_STYLES", THEME_DIR_URI . "/stylesheet/css");
        define("THEME_LESS", THEME_DIR_URI . "/less");
        define("THEME_IMAGES", THEME_DIR_URI . "/images");
        define("THEME_CACHE_DIR", THEME_DIR . "/cache");
        define("THEME_JS", THEME_DIR_URI . "/js");
        
        define('FONTFACE_DIR', THEME_DIR . '/fontface');
        define('FONTFACE_URI', THEME_DIR_URI . '/fontface');
        define("THEME_CACHE_URI", THEME_DIR_URI . "/cache");
        
        /* ------ */
        define("THEME_FRAMEWORK", THEME_DIR . "/framework");
        define("THEME_PLUGINS", THEME_FRAMEWORK . "/plugins");
        define("THEME_PLUGINS_URI", THEME_DIR_URI . "/framework/plugins" );
        define("THEME_SHORTCODES", THEME_FRAMEWORK . "/shortcodes");
        define("THEME_WIDGETS", THEME_FRAMEWORK . "/widgets");
        define("THEME_SLIDERS", THEME_FRAMEWORK . "/sliders");
        define("THEME_HELPERS", THEME_FRAMEWORK . "/helpers");
        define("THEME_FUNCTIONS", THEME_FRAMEWORK . "/functions");
        define("THEME_CLASSES", THEME_FRAMEWORK . "/classes");
        
        /* ------ */
        define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
        define('THEME_METABOXES', THEME_ADMIN . '/metaboxes');
        define('THEME_ADMIN_POST_TYPES', THEME_ADMIN . '/post-types');
        define('THEME_GENERATORS', THEME_ADMIN . '/generators');
        define('THEME_ADMIN_URI', THEME_DIR_URI . '/framework/admin');
        define('THEME_ADMIN_ASSETS_URI', THEME_DIR_URI . '/framework/admin/assets');
        
    }
    
    
    
    function widgets()
    {
        
        require_once(THEME_WIDGETS . "/widgets-contact-form.php");
        require_once(THEME_WIDGETS . "/widgets-contact-info.php");
        require_once(THEME_WIDGETS . "/widgets-gmap.php");
        require_once(THEME_WIDGETS . "/widgets-popular-posts.php");
        require_once(THEME_WIDGETS . "/widgets-related-posts.php");
        require_once(THEME_WIDGETS . "/widgets-recent-posts.php");
        require_once(THEME_WIDGETS . "/widgets-social-networks.php");
        require_once(THEME_WIDGETS . "/widgets-subnav.php");
        require_once(THEME_WIDGETS . "/widgets-testimonials.php");
        require_once(THEME_WIDGETS . "/widgets-twitter-feeds.php");
        require_once(THEME_WIDGETS . "/widgets-video.php");
        require_once(THEME_WIDGETS . "/widgets-flickr-feeds.php");
        require_once(THEME_WIDGETS . "/widgets-instagram-feeds.php");
        require_once(THEME_WIDGETS . "/widgets-news-slider.php");
        require_once(THEME_WIDGETS . "/widgets-recent-portfolio.php");
        require_once(THEME_WIDGETS . "/widgets-slideshow.php");


        register_widget("Artbees_Widget_Popular_Posts");
        register_widget("Artbees_Widget_Recent_Posts");		
        register_widget("Artbees_Widget_Related_Posts");
        register_widget("Artbees_Widget_Twitter");
        register_widget("Artbees_Widget_Contact_Form");	
        register_widget("Artbees_Widget_Contact_Info");		
        register_widget("Artbees_Widget_Social");
        register_widget("Artbees_Widget_Sub_Navigation");		
        register_widget("Artbees_Widget_Google_Map");		
        register_widget("Artbees_Widget_Testimonials");	
        register_widget("Artbees_Widget_video");
        register_widget("Artbees_Widget_Flickr_feeds");	
        register_widget("Artbees_Widget_instagram_feeds");
        register_widget("Artbees_Widget_News_Feed");
        register_widget("Artbees_Widget_Recent_Portfolio");
        register_widget("Artbees_Widget_Slideshow");

        
    }
    
    
    function plugins()
    {
    
    if (!class_exists('WPBakeryVisualComposerAbstract')) {
      $dir = dirname(__FILE__) . '/wpbakery/';
      $composer_settings = Array(
          'APP_ROOT'      => $dir . '/framework/',
          'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
          'APP_DIR'       => basename( $dir ) . '/js_composer/',
          'CONFIG'        => $dir . '/js_composer/config/',
          'ASSETS_DIR'    => 'assets/',
          'COMPOSER'      => $dir . '/js_composer/composer/',
          'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
          'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
          'USER_DIR_NAME'  => 'shortcodes',
          'default_post_types' => Array('page', 'post', 'portfolio', 'news', 'faq', 'banner_builder')
      );
      require_once locate_template('framework/wpbakery/js_composer/js_composer.php');
      $wpVC_setup->init($composer_settings);
    }   
    require_once(THEME_DIR . "/wpml-fix/mk-wpml.php");
      
    }
    
    






    function supports()
    {
        if (!isset( $content_width )) $content_width = theme_option( THEME_OPTIONS, 'grid_width' );   
         
        if (function_exists('add_theme_support')) {
            add_theme_support('menus');
            add_theme_support('automatic-feed-links');
            add_theme_support('editor-style');
            add_theme_support( 'woocommerce' );
            register_nav_menus(array(
                'toolbar-menu' => 'Header Toolbar Navigation',
            ));
            register_nav_menus(array(
                'primary-menu' => 'Main Navigation',
            ));
            register_nav_menus(array(
                'footer-menu' => 'Footer Navigation',
            ));

             add_theme_support('post-thumbnails');
              

        }  
    }








    
    function functions()
    {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        require_once(THEME_FUNCTIONS . "/general-functions.php");
        require_once(THEME_CLASSES . "/wp-nav-custom-walker.php");
        require_once(THEME_FUNCTIONS . "/enqueue-front-scripts.php");
        require_once(THEME_CLASSES . "/theme-class.php");
        require_once(THEME_GENERATORS . '/sidebar-generator.php');
        require_once(THEME_FRAMEWORK . "/breadcrumbs/breadcrumbs.php");
        require_once(THEME_FRAMEWORK . "/tgm-plugin-activation/request-plugins.php");
        include_once (THEME_ADMIN_POST_TYPES . '/news.php');
        include_once (THEME_ADMIN_POST_TYPES . '/faq.php');
        include_once (THEME_ADMIN_POST_TYPES . '/portfolio.php');

        $this->options();
       

        
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            require_once(THEME_FUNCTIONS . "/mk-woocommerce.php");
        }

    }

    
    
    
    function language() {
            $locale = get_locale();
            load_theme_textdomain('mk_framework', THEME_DIR . '/languages');
            $locale_file = THEME_ADMIN . "/languages/$locale.php";
       
        if (is_readable($locale_file)) {
            require_once($locale_file);
        }
    }
    
    
    function options()
    {
        global $theme_options;
        $theme_options = array();
            $page = include(THEME_ADMIN . "/admin-panel/masterkey.php");
            $theme_options[$page['name']] = array();
            foreach ($page['options'] as $option) {
                if (isset($option['default'])) {
                    $theme_options[$page['name']][$option['id']] = $option['default'];
                }
            }
            $theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option($page['name']));
        
        
    }
    
    
    
    
    function admin()
    {
        if (is_admin()) {
            require_once(THEME_ADMIN . '/admin.php');
            $admin = new Theme_admin();
            $admin->init();
            
        }
    }
    
}


?>