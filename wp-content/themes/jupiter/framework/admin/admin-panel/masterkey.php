<?php
include THEME_ADMIN . '/admin-panel/masterkey-includes.php';

$options = array(


  array(
    "type" => "start",
    "options" => array(
      "mk_options_general" => __( "General", "mk_framework" ),
      "mk_options_skining" => __( "Styling & <br /> Coloring", "mk_framework" ),
      "mk_options_typography" => __( "Typography", "mk_framework" ),
      "mk_options_portfolio" => __( "Portfolio", "mk_framework" ),
      "mk_options_blog" => __( "Blog & <br /> News", "mk_framework" ),
      "mk_options_advanced" => __( "Advanced", "mk_framework" ),
    ),
  ),


  /*
**
**
** Main Pane : General
-------------------------------------------------------------*/
  array(
    "type"=>"start_main_pane",
    "id" => 'mk_options_general'
  ),




  array(
    "type" => "start_sub",
    "options" => array(
      "mk_options_global_settings" => __( "Global Settings", "mk_framework" ),
      "mk_options_header_toolbar" => __( "Header Toolbar", "mk_framework" ),
      "mk_options_header_section" => __( "Header", "mk_framework" ),
      "mk_options_sidebar" => __( "Custom Sidebars", "mk_framework" ),
      "mk_options_footer" => __( "Footer", "mk_framework" ),
      "mk_options_quick_contact" => __( "Quick Contact Form", "mk_framework" ),
    ),
  ),



  /* Sub Pane one : General Settings */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_global_settings'
  ),



  array(
    "name" => __("General / Global Settings Settings", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Custom Favicon", "mk_framework" ),
    "desc" => __( "Using this option, You can upload your own custom favicon." , "mk_framework" ),
    "id" => "custom_favicon",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),



  array(
    "name" => __( "Breadcrumb Globally", "mk_framework" ),
    "desc" => __( "You can disable breadcrumb navigation globally using this option, or you may need to disable it in a page locally.", "mk_framework" ),
    "id" => "disable_breadcrumb",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),


  array(
    "name" => __( "Smooth Scroll", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "disable_smoothscroll",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Page Title in Homepage", "mk_framework" ),
    "desc" => __( "By default Page title is disabled in Homepage, but you can enable it using this option.", "mk_framework" ),
    "id" => "disable_homepage_title",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Main Navigation max-width to Convert Responsive Navigation", "mk_framework" ),
    "desc" => __( "This value defines when Main Navigation should viewed as Responsive Navigation. Default is 1040px but if your Navigation items fits in header in smaller widths you can change this value. For example if you wish to view your website in iPad and see Main Navigtion as you see in desktop, then you should change this value to any size below 1020px.", "mk_framework" ),
    "id" => "responsive_nav_width",
    "default" => "1140",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "600",
    "max" => "1380",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => __( "Main Grid Width", "mk_framework" ),
    "desc" => __( "This option defines the main content max-width. default value is 1140px", "mk_framework" ),
    "id" => "grid_width",
    "default" => "1140",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "960",
    "max" => "1380",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => __( "Content Width (in percent)", "mk_framework" ),
    "desc" => __( "Using this option you can define the width of the content. please note that its in percent, lets say if you set it 60%, sidebar will occupy 40% of the main conent space.", "mk_framework" ),
    "id" => "content_width",
    "default" => "73",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "50",
    "max" => "80",
    "step" => "1",
    "unit" => '%',
    "type" => "range"
  ),


  array(
    "name" => __( "Main Content Responsive State", "mk_framework" ),
    "desc" => __( "Please define in which width of the screen the content & sidebar turn to fullwidth.", "mk_framework" ),
    "id" => "content_responsive",
    "default" => "960",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "800",
    "max" => "1140",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => __( "Apple iPhone Icon", "mk_framework" ),
    "desc" => __( "Icon for Apple iPhone (57px x 57px)" , "mk_framework" ),
    "id" => "iphone_icon",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),

  array(
    "name" => __( "Apple iPhone Retina Icon", "mk_framework" ),
    "desc" => __( "Icon for Apple iPhone Retina Version (114px x 114px)" , "mk_framework" ),
    "id" => "iphone_icon_retina",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),

  array(
    "name" => __( "Apple iPad Icon Upload", "mk_framework" ),
    "desc" => __( "Icon for Apple iPhone (72px x 72px)" , "mk_framework" ),
    "id" => "ipad_icon",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),

  array(
    "name" => __( "Apple iPad Retina Icon Upload", "mk_framework" ),
    "desc" => __( "Icon for Apple iPad Retina Version (144px x 144px)" , "mk_framework" ),
    "id" => "ipad_icon_retina",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => 'upload'
  ),
  array(
    "type"=>"end_sub_pane"
  ),



  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_header_toolbar'
  ),

  array(
    "name" => __("General / Header Toolbar", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),




  array(
    "name" => __( "Header Toolbar", "mk_framework" ),
    "desc" => __( "You can Disable/Enable Header toolbar using this option", "mk_framework" ),
    "id" => "disable_header_toolbar",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Header Toolbar Date", "mk_framework" ),
    "desc" => __( "If you enable this option today's date will be displayed on header toolbar. make sure your hosting server date configurations works as expected otherwise you might need to fix in hosting settings.", "mk_framework" ),
    "id" => "enable_header_date",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Header Search Form Location", "mk_framework" ),
    "desc" => __( "You can define header search form location between header toolbar or header main section. Its recommended to choose header Main area if you have chosen modern style in main navigation.", "mk_framework" ),
    "id" => "header_search_location",
    "default" => 'beside_nav',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "toolbar" => 'Header Toolbar',
      "header" => 'Header Main Area',
      "beside_nav" => 'Inside Main Navigation with Tooltip',
    ),
    "type" => "radio"
  ),
  array(
    "name" => __( "Header Toolbar Tagline", "mk_framework" ),
    "desc" => __( "Fill this area which represents your site slogan or an important message. This message depending on which header style you have chosen will be either be disabled on header toolbar right site, or header section left side.", "mk_framework" ),
    "id" => "header_toolbar_tagline",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Header Toolbar Contact Info (Phone Number)", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "header_toolbar_phone",
    "default" => "+91 9901860619",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Header Toolbar Contact Info (Email Address)", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "header_toolbar_email",
    "default" => "info@foresee.co.in",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),



  array(
    "name" => __( "Header Toolbar Login Form", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "header_toolbar_login",
    "default" => "true",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Header Mailchimp Subscribe Form", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "header_toolbar_subscribe",
    "default" => "false",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Mailchimp List Subscribe Form URL", "mk_framework" ),
    "desc" => __( "This URL can be retrived from your mailchimp dashboard > Lists > your desired list > list settings > forms. in your form creation page you will need to click on 'share it' tab then find 'Your subscribe form lives at this URL:'. its a short URL so you will need to visit this link. once you get into the your created form page, then copy the full address and paste it here in this form. URL look like http://YOUR_USER_NAME.us6.list-manage.com/subscribe?u=d5f4e5e82a59166b0cfbc716f&id=4db82d169b", "mk_framework" ),
    "id" => "mailchimp_action_url",
    "default" => "",
    "size" => 80,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),


  array(
    "name" => __( "Header Toolbar Social Networks", "mk_framework" ),
    "desc" => __( "You can disable or enable header toolbar social networks from this option, you can control the icons from the below option.", "mk_framework" ),
    "id" => "disable_header_social_networks",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),


  array(
    "name" => __( "Header Toolbar Social Networks Style", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "header_social_networks_style",
    "default" => 'circle',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "circle" => 'Circled',
      "rounded" => 'Rounded',
      "simple" => 'Simple',
    ),
    "type" => "radio"
  ),
  array(
    "name" => __( "Add New Network", "mk_framework" ),
    "desc" => __( "Select your social website and enter the full URL to your profile on the site, then click on add new button. then hit save settings.", "mk_framework" ),
    "id" => "header_social_networks_site",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,

    "type" => 'header_social_networks'
  ),

  array(
    "id"=>"header_social_networks_url",
    "default"=> "",
    "type"=> 'hidden_input',
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/



  /* Sub Pane one : Header Section */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_header_section'
  ),
  array(
    "name" => __("General / Header", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __( "Upload Custom Logo", "mk_framework" ),
    "id" => "logo",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "upload"
  ),

  array(
    "name" => __( "Header Height", "mk_framework" ),
    "desc" => __( "You can change header header height using this option. (default:100px).", "mk_framework" ),
    "id" => "header_height",
    "default" => "90",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "50",
    "max" => "400",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),
  array(
    "name" => __( "Sticky Header?", "mk_framework" ),
    "desc" => __( "If you enable this option , header will be fixed on top of your browser window.", "mk_framework" ),
    "id" => "enable_sticky_header",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Sticky Header Height", "mk_framework" ),
    "desc" => __( "While scrolling page header sticks to top with position fixed. This option defines header height on fixed mode. (default:50px).", "mk_framework" ),
    "id" => "header_scroll_height",
    "default" => "55",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "20",
    "max" => "200",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),



  array(
    "name" => __( "Logo Position", "mk_framework" ),
    "desc" => __( "You can set your logo to stay on left or center. Please note that center align only works when Classic Style has been chosen from below option.", "mk_framework" ),
    "id" => "logo_position",
    "default" => 'left',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "left" => 'Left',
      "center" => 'Center',
    ),
    "type" => "radio"
  ),



  array(
    "name" => __( "Main Navigation Styles", "mk_framework" ),
    "desc" => __( "You can switch between 2 main navigation styles.", "mk_framework" ),
    "id" => "main_nav_style",
    "default" => 'modern',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "modern" => 'Modern',
      "classic" => 'Classic',
    ),
    "type" => "radio"
  ),
  array(
    "name" => __( "Main Navigation Align", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "main_menu_align",
    "default" => 'center',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "left" => 'Left',
      "center" => 'Center',
      "right" => 'Right',
    ),
    "type" => "radio"
  ),
  array(
    "name" => __( "Header Start Tour Page", "mk_framework" ),
    "desc" => __( "Please Select the page you would like this link be navigated once clicked.", "mk_framework" ),
    "id" => "header_start_tour_page",
    "target" => 'page',
    "default" => "",
    'chosen' => true,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "superlink"
  ),
  array(
    "name" => __( "Header Start Tour Text", "mk_framework" ),
    "desc" => __( "If you dont want to show sart a tour link leave this field blank.", "mk_framework" ),
    "id" => "header_start_tour_text",
    "default" => __( "", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),





  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/









  /* Sub Pane one : Custom Sidebars */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_sidebar'
  ),
  array(
    "name" => __("General / Custom Sidebar", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Create a new sidebar", "mk_framework" ),
    "desc" => __( "Enter a name for new sidebar. It must be a valid name which starts with a letter, followed by letters, numbers, spaces, or underscores", "mk_framework" ),
    "id" => "sidebars",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,

    "type" => 'custom_sidebar'
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/














  /* Sub Pane one : Footer */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_footer'
  ),
  array(
    "name" => __("General / Footer", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Footer", "mk_framework" ),
    "desc" => __( "You can enable or disable footer section using this option.", "mk_framework" ),
    "id" => "disable_footer",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Footer Column layout", "mk_framework" ),
    "id" => "footer_columns",
    "function" => "footer_culumns",
    "default" => "4",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "30px 30px 0 0",
    "options" => array(
      "1" => 'column_1',
      "2" => 'column_2',
      "3" => 'column_3',
      "4" => 'column_4',
      "5" => 'column_5',
      "6" => 'column_6',
      "half_sub_half" => 'column_half_sub_half',
      "half_sub_third" => 'column_half_sub_third',
      "third_sub_third" => 'column_third_sub_third',
      "third_sub_fourth" => 'column_third_sub_fourth',
      "sub_half_half" => 'column_sub_half_half',
      "sub_third_half" => 'column_sub_third_half',
      "sub_third_third" => 'column_sub_third_third',
      "sub_fourth_third" => 'column_sub_fourth_third',
    ),
    "type" => "visual_selector"
  ),
  array(
    "name" => __( "Sub Footer", "mk_framework" ),
    "desc" => __( "Use this option to enable or disable the sub-footer.", "mk_framework" ),
    "id" => "disable_sub_footer",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => "Footer Toolbar Navigation",
    "desc" => __( "This option allows you to enable a custom navigation on the left section of custom footer.", "mk_framework" ),
    "id" => "enable_footer_nav",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Footer Logo", "mk_framework" ),
    "desc" => __( "This will appear in the sub-footer section. Your image shouldn't not exceed 150 * 60 pixels.", "mk_framework" ),
    "id" => "footer_logo",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "upload"
  ),


  array(
    "name" => __( "Copyright Text", "mk_framework" ),
    "desc" => "",
    "id" => "copyright",
    "default" => 'Copyright All Rights Reserved &copy; 2012',
    "rows" => 3,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "textarea"
  ),
  array(
    "type" => "end_pane"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/



  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_quick_contact'
  ),
  array(
    "name" => __("General / Quick Contact", "mk_framework" ),
    "desc" => __( "Quick Contact is a floating contact form accessible by a button that will be always stick to the website's bottom right section.", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Quick Contact", "mk_framework" ),
    "desc" => __( "You can enable or disable this section using this option.", "mk_framework" ),
    "id" => "disable_quick_contact",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Quick Contact Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "quick_contact_title",
    "default" => __( "Contact Us", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Quick Contact Email", "mk_framework" ),
    "desc" => __( "This email will be used for sending this form's inqueries. Admin's email will be used as default email.", "mk_framework" ),
    "id" => "quick_contact_email",
    "default" => get_bloginfo( 'admin_email' ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Quick Contact Description", "mk_framework" ),
    "desc" => "",
    "id" => "quick_contact_desc",
    "default" => __( "We're not around right now. But you can send us an email and we'll get back to you, asap.", "mk_framework" ),
    "rows" => 2,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "textarea"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/




  array(
    "type"=>"end_sub"
  ),

  array(
    "type"=>"end_main_pane"
  ),
  /* End Main Pane */






  /*
**
**
** Main Pane : Styling & Coloring
-------------------------------------------------------------*/
  array(
    "type"=>"start_main_pane",
    "id" => 'mk_options_skining'
  ),




  array(
    "type" => "start_sub",
    "options" => array(
      "mk_options_backgrounds_skin" => __( "Backgrounds", "mk_framework" ),
      "mk_options_general_skin" => __( "General Coloring", "mk_framework" ),
      "mk_options_main_navigation_skin" => __( "Main Navigation", "mk_framework" ),
      "mk_options_header_toolbar_skin" => __( "Header Toolbar", "mk_framework" ),
      "mk_options_header_banner_skin" => __( "Page Title", "mk_framework" ),
      "mk_options_sidebar_skin" => __( "Sidebar", "mk_framework" ),
      "mk_options_footer_skin" => __( "Footer", "mk_framework" ),
      "mk_options_misc_skin" => __( "Miscellaneous", "mk_framework" ),

    ),
  ),







  /* Sub Pane one : Backgrounds */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_backgrounds_skin'
  ),
  array(
    "name" => __("Styling & Coloring / Backgrounds", "mk_framework" ),
    "desc" => __( "In this section you can modify all the backgrounds of your site including header, page, body, footer. Here, you can set the layout you would like your site to look like, then click on different layout sections to add/create different backgrounds.", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Choose between boxed and full width layout", 'mk_framework' ),
    "desc" => __( "Choose between a full or a boxed layout to set how your website's layout will look like.", 'mk_framework' ),
    "id" => "background_selector_orientation",
    "default" => "full_width_layout",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "0px 30px 20px 0",
    "options" => array(
      "boxed_layout" => 'boxed-layout',
      "full_width_layout" => 'full-width-layout',
    ),
    "type" => "visual_selector"
  ),



  array(
    "name" => __( "Boxed Layout Outer Shadow Size", "mk_framework" ),
    "desc" => __( "You can have a outer shadow around the box. using this option you in can modify its range size", "mk_framework" ),
    "id" => "boxed_layout_shadow_size",
    "default" => "0",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "60",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => __( "Boxed Layout Outer Shadow Intensity", "mk_framework" ),
    "desc" => __( "determines how darker the shadow to be.", "mk_framework" ),
    "id" => "boxed_layout_shadow_intensity",
    "default" => "0",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "1",
    "step" => "0.01",
    "unit" => 'alpha',
    "type" => "range"
  ),

  array(
    "name" => __( "Background color & texture", 'mk_framework' ),
    "desc" => __( "Please click on the different sections to modify their backgrounds.", 'mk_framework' ),
    "id"=> 'general_backgounds',
    "option_structure" => 'sub',
    "option_structure" => 'main',
    "divider" => true,
    "type" => "general_background_selector"
  ),


  array(
    "id"=>"body_color",
    "default"=> "#fff",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"body_size",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),







  array(
    "id"=>"page_color",
    "default"=> "#fff",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_size",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),










  array(
    "id"=>"header_color",
    "default"=> "#fff",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"header_size",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),






  array(
    "id"=>"banner_color",
    "default"=> "#fff",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_size",
    "default"=> "true",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"banner_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"footer_color",
    "default"=> "#1a1a1a",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"footer_size",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),

  array(
    "name" => __( "Header Background Opacity.", "mk_framework" ),
    "desc" => __( "You can change the opacity of your header section.", "mk_framework" ),
    "id" => "header_opacity",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "1",
    "step" => "0.1",
    "unit" => 'opacity',
    "default" => "1",
    "type" => "range"
  ),

  array(
    "name" => __( "Header Background Sticky Opacity.", "mk_framework" ),
    "desc" => __( "The opacity of the sticky header section (after scroll header will be fixed to the top of window).", "mk_framework" ),
    "id" => "header_sticky_opacity",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "1",
    "step" => "0.1",
    "unit" => 'opacity',
    "default" => "0.95",
    "type" => "range"
  ),

    array(
    "name" => __('Header Bottom Border Color', "mk_framework" ),
    "id" => "header_border_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/







  /* Sub Pane one : General Settings */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_general_skin'
  ),


  array(
    "name" => __("Styling & Coloring / General Skin Colors", "mk_framework" ),
    "desc" => __( "These options defines your site's general colors.", "mk_framework" ),
    "type" => "heading"
  ),



  array(
    "name" => __('Theme Skin Color', "mk_framework" ),
    "id" => "skin_color",
    "default" => "#0093dd",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Body Text Color', "mk_framework" ),
    "id" => "body_text_color",
    "default" => "#252525",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Heading 1 (h1) Color', "mk_framework" ),
    "id" => "h1_color",
    "default" => "#393836",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Heading 2 (h2) Color', "mk_framework" ),
    "id" => "h2_color",
    "default" => "#393836",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Heading 3 (h3) Color', "mk_framework" ),
    "id" => "h3_color",
    "default" => "#393836",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Heading 4 (h4) Color', "mk_framework" ),
    "id" => "h4_color",
    "default" => "#393836",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Heading 5 (h5 Color', "mk_framework" ),
    "id" => "h5_color",
    "default" => "#393836",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Heading 6 (h6) Color', "mk_framework" ),
    "id" => "h6_color",
    "default" => "#393836",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Paragraph (p) Color', "mk_framework" ),
    "id" => "p_color",
    "default" => "#252525",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Content Links Color', "mk_framework" ),
    "id" => "a_color",
    "default" => "#333333",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Content Links Color Hover', "mk_framework" ),
    "id" => "a_color_hover",
    "default" => "#0093dd",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Content Strong tag Color', "mk_framework" ),
    "id" => "strong_color",
    "default" => "#0093dd",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),







  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/









  /* Sub Pane one : Main Navigation */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_main_navigation_skin'
  ),

  array(
    "name" => __("Styling & Coloring / Main Navigation", "mk_framework" ),
    "desc" => __( "In this section you can modify the coloring of Main Navigation Section.", "mk_framework" ),
    "type" => "heading"
  ),



  array(
    "name" => __('Container Color Background Color', "mk_framework" ),
    "desc" => __( "This option will put your main navigation in a colored container. This option best works when you choose classic style navigation style from Masterkey > General > Header > Main Navigation Styles.", "mk_framework" ),
    "id" => "main_nav_bg_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Top Level Background Color', "mk_framework" ),
    "id" => "main_nav_top_bg_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Top Level Text Color', "mk_framework" ),
    "id" => "main_nav_top_text_color",
    "default" => "#444444",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Top Level Hover Text Color', "mk_framework" ),
    "id" => "main_nav_top_text_hover_color",
    "default" => "#0093dd",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Top Level Hover Background Color', "mk_framework" ),
    "id" => "main_nav_top_bg_hover_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),
  array(
    "name" => __( "Top Level Hover Background Color Opacity Alpha.", "mk_framework" ),
    "desc" => __( "You can use this option to give yout navigation hover and current item background color a transparent layer style. default is 0.2", "mk_framework" ),
    "id" => "main_nav_top_bg_hover_color_rgba",
    "option_structure" => 'sub',
    "divider" => true,
    "min" => "0",
    "max" => "1",
    "step" => "0.1",
    "unit" => 'alpha',
    "default" => "0",
    "type" => "range"
  ),


  array(
    "name" => __('Sub Level Background Color', "mk_framework" ),
    "id" => "main_nav_sub_bg_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Sub Level Text Color', "mk_framework" ),
    "id" => "main_nav_sub_text_color",
    "default" => "#444444",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Sub Level Text Hover Color', "mk_framework" ),
    "id" => "main_nav_sub_text_color_hover",
    "default" => "#0093dd",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Sub Level Hover Background Color', "mk_framework" ),
    "id" => "main_nav_sub_hover_bg_color",
    "default" => "#f5f5f5",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Responsive Navigation Background Color', "mk_framework" ),
    "id" => "responsive_nav_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Responsive Navigation Text Color', "mk_framework" ),
    "id" => "responsive_nav_txt_color",
    "default" => "#444444",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/








  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_header_toolbar_skin'
  ),

  array(
    "name" => __("Styling & Coloring / Header Toolbar", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __('Header Toolbar Background Color', "mk_framework" ),
    "id" => "header_toolbar_bg",
    "default" => "#ffffff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Header Toolbar Border Bottom Color', "mk_framework" ),
    "id" => "header_toolbar_border_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Header Toolbar Text Color', "mk_framework" ),
    "id" => "header_toolbar_txt_color",
    "default" => "#999999",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Header Toolbar Link Color', "mk_framework" ),
    "id" => "header_toolbar_link_color",
    "default" => "#999999",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Header Toolbar Social Network Icon Colors', "mk_framework" ),
    "id" => "header_toolbar_social_network_color",
    "default" => "#999999",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Header Search Form Input Background Color', "mk_framework" ),
    "id" => "header_toolbar_search_input_bg",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Header Search Form Input Text Color', "mk_framework" ),
    "id" => "header_toolbar_search_input_txt",
    "default" => "#c7c7c7",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/







  /* Sub Pane one : Page Introduce */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_header_banner_skin'
  ),

  array(
    "name" => __("Styling & Coloring / Page Title", "mk_framework" ),
    "desc" => __( "In this section you can modify coloring of Header Page Title and Subtitle.", "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __( 'Page Title', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "page_title_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

    array(
    "name" => __( "text Shadow for Title?", "mk_framework" ),
    "desc" => __( "If you enable this option 1px gray shadow will appear in page title.", "mk_framework" ),
    "id" => "page_title_shadow",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),


  array(
    "name" => __( 'Page Subtitle', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "page_subtitle_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __( "Breadcrumb Skin", "mk_framework" ),
    "id" => "breadcrumb_skin",
    "default" => 'dark',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "light" => __( 'For Light Background', "mk_framework" ),
      "dark" => __( 'For Dark Background', "mk_framework" ),

    ),
    "type" => "radio"
  ),

  array(
    "name" => __( 'Banner Section Border Bottom Color', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "banner_border_color",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/






  /* Sub Pane one : Siebar */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_sidebar_skin'
  ),

  array(
    "name" => __("Styling & Coloring / Sidebar", "mk_framework" ),
    "desc" => __( "This section allows you to modify the coloring of sidebar elements.", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __('Sidebar Title Color', "mk_framework" ),
    "id" => "sidebar_title_color",
    "default" => "#333333",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "name" => __('Sidebar Text Color', "mk_framework" ),
    "id" => "sidebar_text_color",
    "default" => "#666666",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Sidebar Links', "mk_framework" ),
    "id" => "sidebar_links_color",
    "default" => "#333333",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/





  /* Sub Pane one : Footer Section */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_footer_skin'
  ),

  array(
    "name" => __("Styling & Coloring / Footer", "mk_framework" ),
    "desc" => __( "Here, you can modify coloring of Footer section.", "mk_framework" ),
    "type" => "heading"
  ),




  array(
    "name" => __('Footer Title Color', "mk_framework" ),
    "id" => "footer_title_color",
    "default" => "#fff",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Footer Text Color', "mk_framework" ),
    "id" => "footer_text_color",
    "default" => "#808080",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Footer Links Color', "mk_framework" ),
    "id" => "footer_links_color",
    "default" => "#999999",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),

  array(
    "name" => __('Sub Footer Background Color', "mk_framework" ),
    "id" => "sub_footer_bg_color",
    "default" => "#202020",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "name" => __('Sub Footer Navigation Color', "mk_framework" ),
    "id" => "sub_footer_nav_color",
    "default" => "#666666",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/







  /* Sub Pane one : MISC */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_misc_skin'
  ),

  array(
    "name" => __("Styling & Coloring / Miscellaneous", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __('Header Start Tour Link Color', "mk_framework" ),
    "id" => "start_tour_color",
    "default" => "#333",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "color"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/








  array(
    "type"=>"end_sub"
  ),

  array(
    "type"=>"end_main_pane"
  ),
  /* End Main Pane */

























  /*
**
**
** Main Pane : Typography
-------------------------------------------------------------*/
  array(
    "type"=>"start_main_pane",
    "id" => 'mk_options_typography'
  ),




  array(
    "type" => "start_sub",
    "options" => array(
      "mk_options_fonts" => __( "Fonts", "mk_framework" ),
      "mk_options_general_typography" => __( "General Typography", "mk_framework" ),
      "mk_options_main_navigation_typography" => __( "Main Navigation", "mk_framework" ),
      "mk_options_page_introduce_typography" => __( "Page Title", "mk_framework" ),
      "mk_options_sidebar_typography" => __( "Sidebar", "mk_framework" ),
      "mk_options_footer_typography" => __( "Footer", "mk_framework" ),

    ),
  ),



  /* Sub Pane one : Fonts */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_fonts'
  ),

  array(
    "name" => __("Typography / Fonts", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __('Body Font-Family', "mk_framework" ),
    "id" => "font_family",
    "default" => '',
    'chosen' => true,
    "option_structure" => 'sub',
    "width"=> 600,
    "divider" => true,
    "options" => array(
      'Arial Black, Gadget, sans-serif' => 'Arial Black, Gadget, sans-serif',
      'Bookman Old Style, serif' => 'Bookman Old Style, serif',
      'Comic Sans MS, cursive' => 'Comic Sans MS, cursive',
      'Courier, monospace' => 'Courier, monospace',
      'Courier New, Courier, monospace' => 'Courier New, Courier, monospace',
      'Garamond, serif' => 'Garamond, serif',
      'Georgia, serif' => 'Georgia, serif',
      'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
      'Lucida Console, Monaco, monospace' => 'Lucida Console, Monaco, monospace',
      'Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif' => 'Lucida Grande, Lucida Sans, Lucida Sans Unicode, sans-serif',
      'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, sans-serif' => 'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, sans-serif',
      'MS Sans Serif, Geneva, sans-serif' => 'MS Sans Serif, Geneva, sans-serif',
      'MS Serif, New York, sans-serif' => 'MS Serif, New York, sans-serif',
      'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype, Book Antiqua, Palatino, serif',
      'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
      'Times New Roman, Times, serif' => 'Times New Roman, Times, serif',
      'Trebuchet MS, Helvetica, sans-serif' => 'Trebuchet MS, Helvetica, sans-serif',
      'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif'
    ),
    "type" => "dropdown"
  ),

  array(
    "name" => __("1. Choose a font", "mk_framework" ),
    "id" => "special_fonts_list_1",
    "default" => 'Open+Sans:400,300,600,700,800',
    "function" => 'fonts_list',
    "type" => "custom"
  ),
  array(
    "id" => __("special_fonts_type_1", "mk_framework" ),
    "default" => 'google',
    "type" => "special_font"
  ),
  array(
    "name" => __( "Google Font character sets", "mk_framework" ),
    "desc" => __( "please add your character set name/names with comma in between. This option if only works when you have you are using google fonts and your language has other characters that is not available in English. in  Available character sets : latin,latin-ext,cyrillic-ext,greek-ext,greek,vietnamese,cyrillic", "mk_framework" ),
    "id" => "google_font_subset_1",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  array(
    "name" => __("2. Specify which sections use the above font ", "mk_framework" ),
    "id" => "special_elements_1",
    "option_structure" => 'sub',
    "divider" => true,
    "width" => 900,
    'margin' => 100,
    "default" => array( 'body' ),
    "options" => $font_replacement_objects,
    "type" => "multiselect"
  ),

  array(
    "id" => "special_fonts_type_2",
    "default" => 'google',
    "type" => "special_font"
  ),
  array(
    "name" => __("1. Choose a font", "mk_framework" ),
    "id" => "special_fonts_list_2",
    "default" => '',
    "function" => 'fonts_list',
    "type" => "custom"
  ),
  array(
    "name" => __( "Google Font character sets", "mk_framework" ),
    "desc" => __( "please add your character set name/names with comma in between. This option if only works when you have you are using google fonts and your language has other characters that is not available in English. in  Available character sets : latin,latin-ext,cyrillic-ext,greek-ext,greek,vietnamese,cyrillic", "mk_framework" ),
    "id" => "google_font_subset_2",
    "default" => '',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  array(
    "name" => __("2. Specify which sections use the above font ", "mk_framework" ),
    "id" => "special_elements_2",
    "divider" => true,
    "width"=> 900,
    "default" => array(),
    "options" => $font_replacement_objects,
    "type" => "multiselect"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : General Typography */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_general_typography'
  ),

  array(
    "name" => __("Typography / General Typography", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __('Body Text Size', "mk_framework" ),
    "id" => "body_font_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "13",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Body Text Weight', "mk_framework" ),
    "id" => "body_weight",
    "default" => 'normal',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "name" => __('Pragraph (p) Text Size', "mk_framework" ),
    "id" => "p_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "13",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __('Heading 1 (h1) Size', "mk_framework" ),
    "id" => "h1_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "36",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Heading 1 (h1) Weight', "mk_framework" ),
    "id" => "h1_weight",
    "default" => 'bold',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Heading 1 (h1) Text Transform', "mk_framework" ),
    "id" => "h1_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),



  array(
    "name" => __('Heading 2 (h2) Size', "mk_framework" ),
    "id" => "h2_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "30",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Heading 2 (h2) Weight', "mk_framework" ),
    "id" => "h2_weight",
    "default" => 'bold',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Heading 2 (h2) Text Transform', "mk_framework" ),
    "id" => "h2_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "name" => __('Heading 3 (h3) Size', "mk_framework" ),
    "id" => "h3_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "24",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Heading 3 (h3) Weight', "mk_framework" ),
    "id" => "h3_weight",
    "default" => 'bold',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),



  array(
    "name" => __('Heading 3 (h3) Text Transform', "mk_framework" ),
    "id" => "h3_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "name" => __('Heading 4 (h4) Size', "mk_framework" ),
    "id" => "h4_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "18",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Heading 4 (h4) Weight', "mk_framework" ),
    "id" => "h4_weight",
    "default" => 'bold',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Heading 4 (h4) Text Transform', "mk_framework" ),
    "id" => "h4_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Heading 5 (h5) Size', "mk_framework" ),
    "id" => "h5_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "16",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Heading 5 (h5) Weight', "mk_framework" ),
    "id" => "h5_weight",
    "default" => 'bold',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),
  array(
    "name" => __('Heading 5 (h5) Text Transform', "mk_framework" ),
    "id" => "h5_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "name" => __('Heading 6 (h6) Size', "mk_framework" ),
    "id" => "h6_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "14",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Heading 6 (h6) Weight', "mk_framework" ),
    "id" => "h6_weight",
    "default" => 'normal',
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Heading 6 (h6) Text Transform', "mk_framework" ),
    "id" => "h6_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "name" => __('Header Start Tour Link Font Size', "mk_framework" ),
    "id" => "start_tour_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "14",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/















  /* Sub Pane one : Typography Main Navigation */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_main_navigation_typography'
  ),


  array(
    "name" => __("Typography / Main Navigation", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

   array(
    "name" => __('Main Items Space in Between', "mk_framework" ),
    "desc" => __( "This Value will be applied as padding to left and right of the item.", "mk_framework" ),
    "id" => "main_nav_item_space",
    "min" => "0",
    "max" => "100",
    "step" => "1",
    "unit" => 'px',
    "default" => "25",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __('Menu Top Level Text Size', "mk_framework" ),
    "id" => "main_nav_top_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "12",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Menu Top Level Text Weight', "mk_framework" ),
    "id" => "main_nav_top_weight",
    "default" => 'bold',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "width"=>180,
    "type" => "dropdown"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Typography Page Introduce */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_page_introduce_typography'
  ),

  array(
    "name" => __("Typography / Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( 'Page Title Size', 'mk_framework' ),
    "id" => "page_introduce_title_size",
    "min" => "10",
    "max" => "120",
    "step" => "1",
    "unit" => 'px',
    "default" => "34",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),



  array(
    "name" => __( 'Page Title Weight', 'mk_framework' ),
    "id" => "page_introduce_weight",
    "default" => 'lighter',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "width"=>180,
    "type" => "dropdown"
  ),
  array(
    "name" => __('Page Title Text Transform', "mk_framework" ),
    "id" => "page_title_transform",
    "default" => 'none',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "name" => __( 'Page Subtitle Size', 'mk_framework' ),
    "id" => "page_introduce_subtitle_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "14",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __('Page Subtitle Text Transform', "mk_framework" ),
    "id" => "page_introduce_subtitle_transform",
    "default" => 'none',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/










  /* Sub Pane one : Typography Siebar */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_sidebar_typography'
  ),
  array(
    "name" => __("Typography / Sidebar", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __('Sidebar Title Size', "mk_framework" ),
    "id" => "sidebar_title_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "14",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Sidebar Title Weight', "mk_framework" ),
    "id" => "sidebar_title_weight",
    "default" => 'bolder',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "width"=>180,
    "type" => "dropdown"
  ),
  array(
    "name" => __('Sidebar Title Text Transform', "mk_framework" ),
    "id" => "sidebar_title_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Sidebar Text Size', "mk_framework" ),
    "id" => "sidebar_text_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "12",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Sidebar Text Weight', "mk_framework" ),
    "id" => "sidebar_text_weight",
    "default" => 'normal',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "width"=>180,
    "type" => "dropdown"
  ),




  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Typography Footer */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_footer_typography'
  ),


  array(
    "name" => __("Typography / Footer", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __('Footer Title Size', "mk_framework" ),
    "id" => "footer_title_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "14",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Footer Title Weight', "mk_framework" ),
    "id" => "footer_title_weight",
    "default" => '800',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "width"=>180,
    "type" => "dropdown"
  ),
  array(
    "name" => __('Footer Title Text Transform', "mk_framework" ),
    "id" => "footer_title_transform",
    "default" => 'uppercase',
    "options" => array(
      "none" => 'None',
      "uppercase" => 'Uppercase',
      "capitalize" => 'Capitalize',
      "lowercase" => 'Lower case',
    ),
    "option_structure" => 'sub',
    "divider" => true,
    "width"=>180,
    "type" => "dropdown"
  ),

  array(
    "name" => __('Footer Text Size', "mk_framework" ),
    "id" => "footer_text_size",
    "min" => "10",
    "max" => "50",
    "step" => "1",
    "unit" => 'px',
    "default" => "12",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __('Footer Text Weight', "mk_framework" ),
    "id" => "footer_text_weight",
    "default" => 'normal',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      'lighter' => 'Light',
      "normal" => 'Normal',
      "bold" => 'bold',
      "bolder" => 'bolder',
      "800" => 'Extra bold'
    ),
    "width"=>180,
    "type" => "dropdown"
  ),




  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/


  array(
    "type"=>"end_sub"
  ),

  array(
    "type"=>"end_main_pane"
  ),
  /* End Main Pane */




  /*
**
**
** Main Pane : Portfolio
-------------------------------------------------------------*/
  array(
    "type"=>"start_main_pane",
    "id" => 'mk_options_portfolio'
  ),




  array(
    "type" => "start_sub",
    "options" => array(
      "mk_options_portfolio_single" => __( "Portfolio Single Post", "mk_framework" ),
      "mk_options_portfolio_archive" => __( "Portfolio Archive", "mk_framework" ),
      
    ),
  ),



  /* Sub Pane one : Portfolio Single Post */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_portfolio_single'
  ),
  array(
    "name" => __("Portfolio / Single Post", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Portfolio Single Layout", "mk_framework" ),
    "desc" => __( "This option allows you to define the page layout of Portfolio Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework" ),
    "id" => "portfolio_single_layout",
    "default" => "full",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 0 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),
  array(
    "name" => __( "Portfolio Single Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "portfolio_single_title",
    "default" => __( "Portfolio", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  array(
    "name" => __( "Single Featured Image Height", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "Portfolio_single_image_height",
    "min" => "100",
    "max" => "1000",
    "step" => "1",
    "default" => "500",
    "unit" => 'px',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),


  array(
    "name" => __( "Portfolio Title", "mk_framework" ),
    "desc" => __( "Where would you like to show your portfolio post title? If you choose below page title, the page title text will be 'Portfolio' unless you define a custom text for it in single portfolio metabox.", "mk_framework" ),
    "id" => "portfolio_single_title_location",
    "default" => 'page_title',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "inside_post" => __( 'Below Page title', "mk_framework" ),
      "page_title" => __( 'Inside Page Title', "mk_framework" ),

    ),
    "type" => "radio"
  ),

  array(
    "name" => __( "Similar Posts Section", "mk_framework" ),
    "desc" => __( "This option allows you to enable or disable the Similar posts section.", "mk_framework" ),
    "id" => "enable_portfolio_similar_posts",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Comment", "mk_framework" ),
    "desc" => __( "This option allows you to enable or disable the comment section on your single portfolio page.", "mk_framework" ),
    "id" => "enable_portfolio_comment",
    "default" => 'false',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/




/* Sub Pane one : Archive */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_portfolio_archive'
  ),
  array(
    "name" => __("Blog & News / Archive", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Archive Layout", "mk_framework" ),
    "id" => "archive_portfolio_layout",
    "default" => "right",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 0 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),



  array(
    "name" => __( "Portfolio Style", "mk_framework" ),
    "id" => "archive_portfolio_style",
    "default" => 'classic',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "classic" => __( 'Classic', "mk_framework" ),
      "modern" => __( 'Modern', "mk_framework" ),

    ),
    "type" => "select"
  ),


  array(
    "name" => __( "Columns", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "archive_portfolio_column",
    "min" => "1",
    "max" => "6",
    "step" => "1",
    "default" => "3",
    "unit" => 'column',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),

  array(
    "name" => __( "Pagination Style", "mk_framework" ),
    "id" => "archive_portfolio_pagination_style",
    "default" => '1',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "1" => __( 'Pagination Nav', "mk_framework" ),
      "2" => __( 'Load More Button', "mk_framework" ),
      "3" => __( 'Load on Scroll Page',"mk_framework" )

    ),
    "type" => "radio"
  ),





  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/





  array(
    "type"=>"end_sub"
  ),

  array(
    "type"=>"end_main_pane"
  ),
  /* End Main Pane */































  /*
**
**
** Main Pane : Blog
-------------------------------------------------------------*/
  array(
    "type"=>"start_main_pane",
    "id" => 'mk_options_blog'
  ),




  array(
    "type" => "start_sub",
    "options" => array(
      "mk_options_blog_general" => __( "Blog General Settings", "mk_framework" ),
      "mk_options_blog_single_post" => __( "Blog Single Post", "mk_framework" ),
      "mk_options_archive_posts" => __( "Archive", "mk_framework" ),
      "mk_options_search_posts" => __( "Search", "mk_framework" ),
      "mk_options_news_single" => __( "News Single Post", "mk_framework" ),

    ),
  ),



  /* Sub Pane one : General Settings */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_blog_general'
  ),
  array(
    "name" => __("Blog & News / General Settings", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __( "Exclude Categories", "mk_framework" ),
    "desc" => __( "The option allows you to exclude as many categories as you like from your blog loop.", "mk_framework" ),
    "id" => "excluded_cats",
    "default" => array(),
    "target" => "cat",
    "option_structure" => 'sub',
    "divider" => true,
    "prompt" => "Choose category..",
    "type" => "multiselect"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Blog Single Post */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_blog_single_post'
  ),
  array(
    "name" => __("Blog & News / Single Post", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Single Layout", "mk_framework" ),
    "desc" => __( "This option allows you to define the page layout of Blog Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework" ),
    "id" => "single_layout",
    "default" => "full",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 0 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),
  array(
    "name" => __( "Blog Single Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "blog_single_title",
    "default" => __( "Blog", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  array(
    "name" => __( "Featured Image Height", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "single_featured_image_height",
    "min" => "100",
    "max" => "1000",
    "step" => "1",
    "default" => "300",
    "unit" => 'px',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),
  array(
    "name" => __( "Featured Image", "mk_framework" ),
    "desc" => __( "If you do not want to set a featured image (in case of sound post type : Audio player, in case of video post type : Video Player) kindly disable it here.", "mk_framework" ),
    "id" => "single_disable_featured_image",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Meta Section", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "single_meta_section",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "About Author Box", "mk_framework" ),
    "desc" => __( "You can enable or disable the about author box from here. You can modify about author information from your profile settings. Besides, if you add your website URL, your email address and twitter account from extra profile information they will be displayed as an icon link.", "mk_framework" ),
    "id" => "enable_blog_author",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Meta Tags", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "diable_single_tags",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),
  array(
    "name" => __( "Similar Posts", "mk_framework" ),
    "desc" => __( "If you do not want to display similar posts on the bottom of the blog single page then you can disable the option.", "mk_framework" ),
    "id" => "enable_single_related_posts",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Blog Posts Comments", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "enable_blog_single_comments",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Archive */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_archive_posts'
  ),
  array(
    "name" => __("Blog & News / Archive", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),
  array(
    "name" => __( "Archive Layout", "mk_framework" ),
    "id" => "archive_page_layout",
    "default" => "right",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 0 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),


  array(
    "name" => __( "Archive Page Title", "mk_framework" ),
    "desc" => __( "Using this option you can add a title to archive page.", "mk_framework" ),
    "id" => "archive_page_title",
    "default" => __( "Archives", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),



  array(
    "name" => __( "Archive Page Subtitle", "mk_framework" ),
    "desc" => __( "You can disable or enable Archive page Subtitle.", "mk_framework" ),
    "id" => "archive_disable_subtitle",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),



  array(
    "name" => __( "Archive Loop Style", "mk_framework" ),
    "id" => "archive_loop_style",
    "default" => 'classic',
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "30px 40px 20px 0",
    "options" => array(
      "classic" => 'blog-loop-classic',
      "newspaper" => 'blog-loop-newspaper',
      "grid" => 'blog-loop-column-based',
    ),
    "type" => "visual_selector"
  ),


  array(
    "name" => __( "Pagination Style", "mk_framework" ),
    "id" => "archive_pagination_style",
    "default" => '1',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "1" => __( 'Pagination Nav', "mk_framework" ),
      "2" => __( 'Load More Button', "mk_framework" ),
      "3" => __( 'Load on Scroll Page',"mk_framework" )

    ),
    "type" => "radio"
  ),





  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Search */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_search_posts'
  ),
  array(
    "name" => __("Blog & News / Search", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Search Layout", "mk_framework" ),
    "id" => "search_page_layout",
    "default" => "right",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 0 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),



  array(
    "name" => __( "Search Page Title", "mk_framework" ),
    "desc" => __( "Using this option you can add a subtitle to Search page.", "mk_framework" ),
    "id" => "search_page_title",
    "default" => __( "Search", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Search Page subtitle", "mk_framework" ),
    "desc" => __( "You can disable or enable Search page subtitle.", "mk_framework" ),
    "id" => "search_disable_subtitle",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/








  /* Sub Pane one : News Single Post */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_news_single'
  ),
  array(
    "name" => __("Blog & News / News Single Post", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "News Page", "mk_framework" ),
    "desc" => __( "Choose which page you would like to assign as News page. eventhough this is optional, you will get the [Back to News] button in single post headings making user easy to find news page. This page also will be used in News Teaser in homepage.", "mk_framework" ),
    "id" => "news_page",
    "target" => 'page',
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "prompt" => __( "Choose page..", "mk_framework" ),
    "type" => "dropdown"
  ),

  array(
    "name" => __( "News Single Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "news_single_title",
    "default" => __( "News", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),


  array(
    "name" => __( "Single Post Layout", "mk_framework" ),
    "desc" => __( "This option allows you to define the page layout of News Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework" ),
    "id" => "news_layout",
    "default" => "full",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 0 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),
  array(
    "name" => __( "News Single Post Featured Image Height", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "news_featured_image_height",
    "min" => "100",
    "max" => "1000",
    "step" => "1",
    "default" => "340",
    "unit" => 'px',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "range"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/






  array(
    "type"=>"end_sub"
  ),

  array(
    "type"=>"end_main_pane"
  ),
  /* End Main Pane */













  /*
**
**
** Main Pane : Advanced
-------------------------------------------------------------*/
  array(
    "type"=>"start_main_pane",
    "id" => 'mk_options_advanced'
  ),




  array(
    "type" => "start_sub",
    "options" => array(
      "mk_options_ucp" => __( "Under Construction Page", "mk_framework" ),
      "mk_options_twitter_api" => __( "Twitter API", "mk_framework" ),
      "mk_options_seo" => __( "SEO", "mk_framework" ),
      "mk_options_custom_js" => __( "Custom JS", "mk_framework" ),
      "mk_options_custom_css" => __( "Custom CSS", "mk_framework" ),
      "mk_options_woocommrce" => __( "Woocommerce", "mk_framework" ),
      "mk_options_export_options" => __( "Export Options", "mk_framework" ),
      "mk_options_import_options" => __( "Import Options", "mk_framework" ),
      "mk_options_troubleshooting" => __( "Troubleshooting", "mk_framework" ),

    ),
  ),




  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_ucp'
  ),
  array(
    "name" => __("Advanced / Under Construction Page", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __("Under Construction Page", "mk_framework" ),
    "desc" => __( "You can enable this option while building your site. a coming soon page will appear for site visitors (visitor should not logged in).", "mk_framework" ),
    "id" => "enable_uc",
    "default" => "false",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Upload Logo", "mk_framework" ),
    "id" => "uc_logo",
    "default" => "",
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "upload"
  ),

  array(
    "name" => __( "Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "uc_title",
    "default" => "We are currently under construction.",
    "size" => 70,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "uc_subtitle",
    "default" => "Our estimated time before launch.",
    "size" => 70,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Ends at which Year", "mk_framework" ),
    "id" => "uc_year",
    "default" => '2014',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "2013" => '2013',
      "2014" => '2014',
      "2015" => '2015',
      "2016" => '2016',
      "2017" => '2017',
      "2018" => '2018',
      "2019" => '2019',
      "2020" => '2020',
    ),
    "type" => "dropdown"
  ),

  array(
    "name" => __( "Ends at which Month", "mk_framework" ),
    "id" => "uc_month",
    "default" => '1',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "january" => 'January',
      "february" => 'February',
      "march" => 'March',
      "april" => 'April',
      "may" => 'May',
      "june" => 'June',
      "july" => 'July',
      "august" => 'August',
      "september" => 'September',
      "october" => 'October',
      "november" => 'November',
      "december" => 'December',
    ),
    "type" => "dropdown"
  ),


  array(
    "name" => __( "Ends at which Day", "mk_framework" ),
    "id" => "uc_day",
    "default" => '1',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "1" => '1',
      "2" => '2',
      "3" => '3',
      "4" => '4',
      "5" => '5',
      "6" => '6',
      "7" => '7',
      "8" => '8',
      "9" => '9',
      "10" => '10',
      "11" => '11',
      "12" => '12',
      "13" => '13',
      "14" => '14',
      "15" => '15',
      "16" => '16',
      "17" => '17',
      "18" => '18',
      "19" => '19',
      "20" => '20',
      "21" => '21',
      "22" => '22',
      "23" => '23',
      "24" => '24',
      "25" => '25',
      "26" => '26',
      "27" => '27',
      "28" => '28',
      "29" => '29',
      "30" => '30',
      "31" => '31',
    ),
    "type" => "dropdown"
  ),


  array(
    "name" => __( "Ends at which Hour", "mk_framework" ),
    "id" => "uc_hour",
    "default" => '1',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "1" => '1',
      "2" => '2',
      "3" => '3',
      "4" => '4',
      "5" => '5',
      "6" => '6',
      "7" => '7',
      "8" => '8',
      "9" => '9',
      "10" => '10',
      "11" => '11',
      "12" => '12',
      "13" => '13',
      "14" => '14',
      "15" => '15',
      "16" => '16',
      "17" => '17',
      "18" => '18',
      "19" => '19',
      "20" => '20',
      "21" => '21',
      "22" => '22',
      "23" => '23',
      "24" => '24',
    ),
    "type" => "dropdown"
  ),


  array(
    "name" => __( "Ends at which Minute", "mk_framework" ),
    "id" => "uc_minute",
    "default" => '1',
    "option_structure" => 'sub',
    "divider" => true,
    "options" => array(
      "1" => '1',
      "2" => '2',
      "3" => '3',
      "4" => '4',
      "5" => '5',
      "6" => '6',
      "7" => '7',
      "8" => '8',
      "9" => '9',
      "10" => '10',
      "11" => '11',
      "12" => '12',
      "13" => '13',
      "14" => '14',
      "15" => '15',
      "16" => '16',
      "17" => '17',
      "18" => '18',
      "19" => '19',
      "20" => '20',
      "21" => '21',
      "22" => '22',
      "23" => '23',
      "24" => '24',
      "25" => '25',
      "26" => '26',
      "27" => '27',
      "28" => '28',
      "29" => '29',
      "30" => '30',
      "31" => '31',
      "32" => '32',
      "33" => '33',
      "34" => '34',
      "35" => '35',
      "36" => '36',
      "37" => '37',
      "38" => '38',
      "39" => '39',
      "40" => '40',
      "41" => '41',
      "42" => '42',
      "43" => '43',
      "44" => '44',
      "45" => '45',
      "46" => '46',
      "47" => '47',
      "48" => '48',
      "49" => '49',
      "50" => '50',
      "51" => '51',
      "52" => '52',
      "53" => '53',
      "54" => '54',
      "55" => '55',
      "56" => '56',
      "57" => '57',
      "58" => '58',
      "59" => '59',
    ),
    "type" => "dropdown"
  ),


  array(
    "name" => __( "Social Network Facebook", 'mk_framework' ),
    "desc" => __( "Fill this field with your facebook page full URL.", "mk_framework" ),
    "id" => "uc_facebook",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  array(
    "name" => __( "Social Network Twitter", 'mk_framework' ),
    "desc" => __( "Fill this field with your twitter page full URL.", "mk_framework" ),
    "id" => "uc_twitter",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Social Network Google Plus", 'mk_framework' ),
    "desc" => __( "Fill this field with your google plus page full URL.", "mk_framework" ),
    "id" => "uc_gplus",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Your RSS feed URL", 'mk_framework' ),
    "desc" => __( "Fill this field with your RSS feed url, by default your wordpress rss feed will be used.", "mk_framework" ),
    "id" => "uc_rss",
    "default" => get_bloginfo( 'rss2_url' ),
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),
  array(
    "name" => __( "Mailchimp List Subscribe Form URL", "mk_framework" ),
    "desc" => __( "This URL can be retrived from your mailchimp dashboard > Lists > your desired list > list settings > forms. in your form creation page you will need to click on 'share it' tab then find 'Your subscribe form lives at this URL:'. its a short URL so you will need to visit this link. once you get into the your created form page, then copy the full address and paste it here in this form. URL look like http://YOUR_USER_NAME.us6.list-manage.com/subscribe?u=d5f4e5e82a59166b0cfbc716f&id=4db82d169b", "mk_framework" ),
    "id" => "uc_mailchimp_action_url",
    "default" => "",
    "size" => 80,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Header Section Background", 'mk_framework' ),
    "option_structure" => 'sub',
    "id"=> 'uc_background',
    "option_structure" => 'main',
    "divider" => true,
    "type" => "specific_background_selector_start"
  ),

  array(
    "id"=>"uc_bg_color",
    "default"=> "",
    "type"=> 'specific_background_selector_color',
  ),


  array(
    "id"=>"uc_bg_repeat",
    "default"=> "",
    "type"=> 'specific_background_selector_repeat',
  ),

  array(
    "id"=>"uc_bg_attachment",
    "default"=> "",
    "type"=> 'specific_background_selector_attachment',
  ),


  array(
    "id"=>"uc_bg_position",
    "default"=> "",
    "type"=> 'specific_background_selector_position',
  ),


  array(
    "id"=>"uc_bg_preset_image",
    "default"=> "",
    "type"=> 'specific_background_selector_image',
  ),

  array(
    "id"=>"uc_bg_custom_image",
    "default"=> "",
    "type"=> 'specific_background_selector_custom_image',
  ),

  array(
    "id"=>"uc_bg_image_source",
    "default"=> "no-image",
    "type"=> 'specific_background_selector_source',
  ),

  array(
    "divider" => true,
    "type" => "specific_background_selector_end"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/










  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_twitter_api'
  ),
  array(
    "name" => __("Advanced / Twitter API", "mk_framework" ),
    "desc" => __( '<ol style="list-style-type:decimal !important;">
  <li>Go to "<a href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a>," login with your twitter account and click "Create a new application".</li>
  <li>Fill out the required fields, accept the rules of the road, and then click on the "Create your Twitter application" button. You will not need a callback URL for this app, so feel free to leave it blank.</li>
  <li>Once the app has been created, click the "Create my access token" button.</li>
  <li>You are done! You will need the following data later on:</ol>', "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __( "Consumer Key", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "twitter_consumer_key",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Consumer Secret", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "twitter_consumer_secret",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Access Token", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "twitter_access_token",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "name" => __( "Access Token Secret", 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "twitter_access_token_secret",
    "default" => "",
    "size" => 50,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/









  /* Sub Pane one : SEO */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_seo'

  ),
  array(
    "name" => __("Advanced / SEO", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),


  array(
    "name" => __("Google Analytics ID", "mk_framework" ),
    "desc" => __( "Enter your Google Analytics ID here to track your site with Google Analytics.", "mk_framework" ),
    "id" => "analytics",
    "default" => "",
    "size" => 70,
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "text"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Custom JS */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_custom_js'
  ),
  array(
    "name" => __("Advanced / Custom JS", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Custom JS", "mk_framework" ),
    "desc" => __( "You can write your own custom Javascript here in textarea. So you wont need to modify theme files.", "mk_framework" ),
    "id" => "custom_js",
    "default" => '',
    'el_class' => 'mk_black_white',
    "rows" => 30,
    "type" => "textarea"
  ),

  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/












  /* Sub Pane one : Custom CSS */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_custom_css'
  ),


  array(
    "name" => __("Advanced / Custom CSS", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "Custom CSS", "mk_framework" ),
    "desc" => __( "You can write your own custom css, this way you wont need to modify Theme CSS files.", "mk_framework" ),
    "id" => "custom_css",
    'el_class' => 'mk_black_white',
    "default" => '',
    "rows" => 30,
    "type" => "textarea"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/







  /* Sub Pane one : SEO */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_woocommrce'
  ),
  array(
    "name" => __("Advanced / Woocommerce", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),



  array(
    "name" => __( "Woocommerce Shop Layout", "mk_framework" ),
    "id" => "woocommerce_layout",
    "default" => "full",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 30px 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),
  array(
    "name" => __( "Shop Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "woocommerce_shop_title",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Woocommerce Single Product Layout", "mk_framework" ),
    "id" => "woocommerce_single_layout",
    "default" => "full",
    "option_structure" => 'sub',
    "divider" => true,
    "item_padding" => "20px 30px 30px 0",
    "options" => array(
      "left" => 'page-layout-left',
      "right" => 'page-layout-right',
      "full" => 'page-layout-full',
    ),
    "type" => "visual_selector"
  ),
  array(
    "name" => __( "Single Product Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "woocommerce_single_product_title",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Shop Archive Page Title", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "woocommerce_archive_title",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Header Toolbar Checkout", "mk_framework" ),
    "desc" => __( "If you dont want to use header toolbar checkout section (in case if you only use product cataloges), diable this option.", "mk_framework" ),
    "id" => "header_checkout_woocommerce",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),

  array(
    "name" => __( "Woocommerce Scripts and Styles in Homepage", "mk_framework" ),
    "desc" => __( "If you dont want to use any of woocommerce functions such as its shortcodes and loops, enable this option to reduce page load.", "mk_framework" ),
    "id" => "home_disable_woocommerce",
    "default" => 'true',
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "toggle"
  ),



  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/




  /* Sub Pane one : Export Options */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_export_options'
  ),

  array(
    "name" => __("Advanced / Export Options", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __("Export Options", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "theme_export_options",
    "default" => '',
    "rows"=> 30,
    "option_structure" => 'main',
    "divider" => false,
    "type" => "export"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/





  /* Sub Pane one : Import Options */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_import_options'
  ),
  array(
    "name" => __("Advanced / Import Options", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __("Import Options", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "theme_import_options",
    "default" => '',
    "rows"=> 30,
    "option_structure" => 'main',
    "divider" => false,
    "type" => "import"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/



  /* Sub Pane one : System Diagnostic Information */
  array(
    "type" => "start_sub_pane",
    "id" => 'mk_options_troubleshooting'
  ),
  array(
    "name" => __("Advanced / Troubleshooting", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "type" => "heading"
  ),

  array(
    "name" => __( "System Diagnostic Information", "mk_framework" ),
    "desc" => __( "Below information is useful to diagnose some of the possible reasons to malfunctions, performance issues or any errors. You can faciliate the process of support by providing below information to our support staff.", "mk_framework" ),
    "option_structure" => 'sub',
    "divider" => true,
    "type" => "sys_diagnose"
  ),


  array(
    "type"=>"end_sub_pane"
  ),
  /*****************************/





  array(
    "type"=>"end_sub"
  ),

  array(
    "type"=>"end_main_pane"
  ),
  /* End Main Pane */





  /***************************/
  array(
    "type"=>"end"
  )


);
return array(
  'auto' => true,
  'name' => THEME_OPTIONS,
  'options' => $options
);
