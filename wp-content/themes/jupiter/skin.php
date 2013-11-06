<?php
$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
require_once( $path[0] . '/wp-load.php' );

header("Content-type: text/css; charset: UTF-8");
include(THEME_FUNCTIONS . "/generate-dynamic-styles.php");


echo <<<CSS

{$fontface_style_1}
{$fontface_style_2}
{$fontface_css_1}
{$fontface_css_2}

{$google_font_1}
{$google_font_2}

{$safefont_css_1}
{$safefont_css_2}



/*
*****************************
GENERAL SECTIONS ************
*****************************
*/


body{
	font-size: {$option['body_font_size']}px;
	color: {$option['body_text_color']};
	font-weight: {$option['body_weight']};
	line-height: 22px;
	{$safe_font}
	{$body_bg}
}

#mk-header {
	border-bottom-color:{$option['banner_border_color']};
}

#mk-boxed-layout {
  -webkit-box-shadow: 0 0 {$option['boxed_layout_shadow_size']}px rgba(0, 0, 0, {$option['boxed_layout_shadow_intensity']});
  -moz-box-shadow: 0 0 {$option['boxed_layout_shadow_size']}px rgba(0, 0, 0, {$option['boxed_layout_shadow_intensity']});
  box-shadow: 0 0 {$option['boxed_layout_shadow_size']}px rgba(0, 0, 0, {$option['boxed_layout_shadow_intensity']});
}

.mk-header-inner {
	border-bottom-color:{$option['header_border_color']};
}

 

.mk-header-toolbar{
	border-bottom-color:{$option['header_toolbar_border_color']};
}

.mk-boxed-enabled #mk-boxed-layout, .mk-boxed-enabled #mk-boxed-layout .mk-header-inner.mk-fixed {
	max-width: {$boxed_layout_width}px;

}
.mk-boxed-enabled #mk-boxed-layout .mk-header-inner.mk-fixed, .mk-boxed-enabled #mk-boxed-layout .classic-style-nav .mk-header-nav-container.mk-fixed {
		width: {$boxed_layout_width}px !important;
		left:auto !important;
}

p {
	font-size: {$option['p_size']}px;
	color: {$option['p_color']};
}

a {
	color: {$option['a_color']};
}
a:hover {
	color: {$option['a_color_hover']};
}

#theme-page strong {
	color: {$option['strong_color']};
}

.mk-header-bg{
	{$header_bg}
}



.mk-uc-header{
 	{$uc_bg}
 }


#theme-page {
	{$page_bg}
}

.mk-tabs-panes,
.mk-news-tab .mk-tabs-tabs li.ui-tabs-active a,
.mk-divider .divider-go-top {
	background-color: {$option['page_color']};
}

#mk-footer {
	{$footer_bg}
}



.mk-header-bg {
  -webkit-opacity: {$option['header_opacity']};
  -moz-opacity: {$option['header_opacity']};
  -o-opacity: {$option['header_opacity']};
  opacity: {$option['header_opacity']};
}

.mk-fixed .mk-header-bg {
  -webkit-opacity: {$option['header_sticky_opacity']};
  -moz-opacity: {$option['header_sticky_opacity']};
  -o-opacity: {$option['header_sticky_opacity']};
  opacity: {$option['header_sticky_opacity']};
}


.modern-style-nav .mk-header-inner .main-navigation-ul > li > a, 
.modern-style-nav .mk-header-inner .mk-header-start-tour,
.mk-header-inner #mk-header-search,
.modern-style-nav .mk-header-inner,
.modern-style-nav .mk-search-trigger
 {
	height: {$option['header_height']}px;
	line-height:{$option['header_height']}px;
}

.mk-header-nav-container {
	text-align:{$option['main_menu_align']};
}




@media handheld, only screen and (max-width: {$option['responsive_nav_width']}px){
	.mk-header-nav-container {
		width: auto !important;
		display:none;
	}
	.mk-header-tagline, 
	.mk-header-date, 
	.mk-header-start-tour,
	.mk-header-checkout,
	.mk-header-login,
	.mk-header-signup {
		display: none !important;
	}
	#mk-toolbar-navigation,
	#mk-header-social,
	#mk-header-search,
	.mk-language-nav {
		float: none !important;
		display: block !important;
		margin-left: 0 !important;
	}

	.mk-header-inner #mk-header-search {
		display:none !important;
	}

	#mk-header-search {
		padding-bottom: 10px !important;
	}
	#mk-header-searchform span .text-input {
		width: 100% !important;
	}
	#mk-responsive-nav {
		background-color:{$option['responsive_nav_color']} !important;
	}
	.mk-mega-icon {
		display:none !important;
	}
	.mk-header-nav-container #mk-responsive-nav {
		visibility: hidden;
	}
	.mk-responsive .mk-header-nav-container #mk-main-navigation {
		visibility: visible;
	}
	.classic-style-nav .header-logo .center-logo{
	    		text-align: right !important;
	 }
	 .classic-style-nav .header-logo .center-logo a{
	    		margin: 0 !important;
	 }
	.header-logo {
	    height: {$option['header_height']}px !important;
	}
	
	.mk-header-inner{padding-top:0 !important}
	.header-logo{position:relative !important;right:auto !important;left:auto !important;float:left !important;margin-left:10px;text-align:left}
	
	#mk-responsive-nav li ul li .megamenu-title:hover, #mk-responsive-nav li ul li .megamenu-title, #mk-responsive-nav li a, #mk-responsive-nav li ul li a:hover {
  			color:{$option['responsive_nav_txt_color']} !important;
	}


	.mk-header-bg{zoom:1 !important;filter:alpha(opacity=100) !important;opacity:1 !important}
	.mk-header-toolbar{padding:0 10px}
	.mk-header-date{margin-left:0 !important}
	.mk-nav-responsive-link{cursor:pointer;display:block !important; padding:14px 16px;position:absolute;right:20px;top:50%;margin-top:-19px;z-index:12;line-height:8px;border:1px solid rgba(255,255,255,0.5);background-color:rgba(0,0,0,0.15)}
	.mk-nav-responsive-link i{font-size:16px;line-height:8px;color:#fff}
	.mk-nav-responsive-link:hover{background-color:rgba(0,0,0,0.3)}
	.mk-header-nav-container{height:100%;z-index:200}
	#mk-main-navigation{position:relative;z-index:2}
	.mk_megamenu_columns_2, .mk_megamenu_columns_3, .mk_megamenu_columns_4, .mk_megamenu_columns_5, .mk_megamenu_columns_6 {width:100% !important}

}

.classic-style-nav .header-logo {
	   		 height: {$option['header_height']}px !important;
}

.classic-style-nav .mk-header-inner {
	
	line-height:{$option['header_height']}px;
	padding-top:{$option['header_height']}px;
}

.mk-header-start-tour {
			font-size: {$option['start_tour_size']}px;
			color: {$option['start_tour_color']};
}
.mk-header-start-tour:hover{
	color: {$option['start_tour_color']};
}



.mk-header-toolbar {
	background-color: {$option['header_toolbar_bg']};
}

#mk-toolbar-navigation ul li a, 
.mk-language-nav > a, 
.mk-header-login .mk-login-link, 
.mk-subscribe-link, 
.mk-checkout-btn,
.mk-header-tagline a,
.header-toolbar-contact a,
#mk-toolbar-navigation ul li a:hover, 
.mk-language-nav > a:hover, 
.mk-header-login .mk-login-link:hover, 
.mk-subscribe-link:hover, 
.mk-checkout-btn:hover,
.mk-header-tagline a:hover
 {
	color:{$option['header_toolbar_link_color']};
}

#mk-toolbar-navigation ul li a {
	border-right:1px solid {$option['header_toolbar_link_color']};
}


.mk-header-tagline, 
.header-toolbar-contact, 
.mk-header-date
 {
	color:{$option['header_toolbar_txt_color']};
}


#mk-header-social a i {
	color:{$option['header_toolbar_social_network_color']};
}





/*
*****************************
TYPOGRAPHY ******************
*****************************
*/
 

#theme-page h1{
			font-size: {$option['h1_size']}px;
			color: {$option['h1_color']};
			font-weight: {$option['h1_weight']};
			text-transform: {$option['h1_transform']};
	}

#theme-page h2{
			font-size: {$option['h2_size']}px;
			color: {$option['h2_color']};
			font-weight: {$option['h2_weight']};
			text-transform: {$option['h2_transform']};
	}


#theme-page h3{
			font-size: {$option['h3_size']}px;
			color: {$option['h3_color']};
			font-weight: {$option['h3_weight']};
			text-transform: {$option['h3_transform']};
	}

#theme-page h4{
			font-size: {$option['h4_size']}px;
			color: {$option['h4_color']};
			font-weight: {$option['h4_weight']};
			text-transform: {$option['h4_transform']};
	}


#theme-page h5{
			font-size: {$option['h5_size']}px;
			color: {$option['h5_color']};
			font-weight: {$option['h5_weight']};
			text-transform: {$option['h5_transform']};
	}


#theme-page h6{
			font-size: {$option['h6_size']}px;
			color: {$option['h6_color']};
			font-weight: {$option['h6_weight']};
			text-transform: {$option['h6_transform']};
	}


.mk-fancy-title.pattern-style span, .mk-portfolio-view-all, .mk-woo-view-all, .mk-blog-view-all  {
	background-color: {$option['page_color']};
}






/* Widgets : Sidebar */
#mk-sidebar, #mk-sidebar p{
			font-size: {$option['sidebar_text_size']}px;
			color: {$option['sidebar_text_color']};
			font-weight: {$option['sidebar_text_weight']};
	}

#mk-sidebar .widgettitle {
			text-transform: {$option['sidebar_title_transform']};
			font-size: {$option['sidebar_title_size']}px;
			color: {$option['sidebar_title_color']};
			font-weight: {$option['sidebar_title_weight']};
	}	
#mk-sidebar .widgettitle a {
			color: {$option['sidebar_title_color']};
	}		

#mk-sidebar .widget a{
			color: {$option['sidebar_links_color']};
	}









/* Widgets : Footer */
#mk-footer, #mk-footer p  {
			font-size: {$option['footer_text_size']}px;
			color: {$option['footer_text_color']};
			font-weight: {$option['footer_text_weight']};
	}

#mk-footer .widgettitle {
			text-transform: {$option['footer_title_transform']};
			font-size: {$option['footer_title_size']}px;
			color: {$option['footer_title_color']};
			font-weight: {$option['footer_title_weight']};
	}

#mk-footer .widgettitle a {
			color: {$option['footer_title_color']};
}	

#mk-footer .widget a{
			color: {$option['footer_links_color']};
	}

	

#sub-footer {
	background-color: {$option['sub_footer_bg_color']};
}





#mk-header {
	{$banner_bg}
}
.page-introduce-title {
	font-size: {$option['page_introduce_title_size']}px;
	color: {$option['page_title_color']};
	text-transform: {$option['page_title_transform']};
	font-weight: {$option['page_introduce_weight']};
}


.page-introduce-subtitle {
	font-size: {$option['page_introduce_subtitle_size']}px;
	line-height: 100%;
	color: {$option['page_subtitle_color']};
	font-size: {$option['page_introduce_subtitle_size']}px;
	text-transform: {$option['page_introduce_subtitle_transform']};
	
}



.mk-flexsldier-slideshow {
	background-color: {$option['flexslider_container_bg']};
}

.mk-icarousel-slideshow {
	background-color: {$option['icarousel_container_bg']};
}



/* Main Navigation */


.mk-classic-nav-bg {
	{$classic_nav_bg}
}

.mk-header-nav-container {
	background-color: {$option['main_nav_bg_color']};
}

.main-navigation-ul > li > a {
	color: {$option['main_nav_top_text_color']};
	background-color: {$option['main_nav_top_bg_color']};
	font-size: {$option['main_nav_top_size']}px;
	font-weight: {$option['main_nav_top_weight']};
	padding-right:{$option['main_nav_item_space']}px;
	padding-left:{$option['main_nav_item_space']}px;
}

.mk-search-trigger {
	color: {$option['main_nav_top_text_color']};
}

#mk-header-searchform .text-input {
			background-color:{$option['header_toolbar_search_input_bg']} !important;
			color: {$option['header_toolbar_search_input_txt']};
}
#mk-header-searchform span i {
	color: {$option['header_toolbar_search_input_txt']};
}


#mk-header-searchform .text-input::-webkit-input-placeholder {
				color: {$option['header_toolbar_search_input_txt']};
			}
#mk-header-searchform .text-input:-ms-input-placeholder {
				color: {$option['header_toolbar_search_input_txt']};
			} 
#mk-header-searchform .text-input:-moz-placeholder {
				color: {$option['header_toolbar_search_input_txt']};
			}

.main-navigation-ul li > a:hover,
.main-navigation-ul li:hover > a,
.main-navigation-ul li.current-menu-item > a,
.main-navigation-ul li.current-menu-ancestor > a{
	background-color: {$option['main_nav_top_bg_hover_color']};
	background-color: {$main_nav_top_bg_hover_color};
	color: {$option['main_nav_top_text_hover_color']};
}

.mk-search-trigger:hover {
	color: {$option['main_nav_top_text_hover_color']};
}

.main-navigation-ul > li:hover > a,
.main-navigation-ul > li.current-menu-item > a,
.main-navigation-ul > li.current-menu-ancestor > a {
	border-top-color:{$skin_color};
}
.main-navigation-ul li .sub {
  border-top:3px solid {$skin_color};
}

#mk-main-navigation ul li ul  {
	background-color: {$option['main_nav_sub_bg_color']};
}
#mk-main-navigation ul li ul li a {
	color: {$option['main_nav_sub_text_color']};
}
#mk-main-navigation ul li ul li a:hover {
	color: {$option['main_nav_sub_text_color_hover']} !important;
}



.main-navigation-ul li ul li a:hover,
.main-navigation-ul li ul li:hover > a,
.main-navigation-ul ul li a:hover,
.main-navigation-ul ul li:hover > a,
.main-navigation-ul ul li.current-menu-item > a {
	background-color:{$option['main_nav_sub_hover_bg_color']} !important;
  	color: {$skin_color} !important;
}


.mk-grid{
	max-width: {$option['grid_width']}px;
}

.mk-header-nav-container, .mk-classic-menu-wrapper {
	width: {$option['grid_width']}px;
}


.theme-page-wrapper #mk-sidebar.mk-builtin {
	width: {$sidebar_width}%;
}

.theme-page-wrapper.right-layout .theme-content, .theme-page-wrapper.left-layout .theme-content {
	width: {$option['content_width']}%;
}


@media handheld, only screen and (max-width: {$option['content_responsive']}px){

.theme-page-wrapper .theme-content {
	width: 100% !important;
	float: none !important;


}
.theme-page-wrapper {
	padding-right:20px !important;
	padding-left: 20px !important;	
}

.theme-page-wrapper #mk-sidebar  {
	width: 100% !important;
	float: none !important;
	padding: 0 !important;

}
.theme-page-wrapper #mk-sidebar .sidebar-wrapper {
		padding-right:0px !important;
		padding-left: 0px !important;
	}

}	




/*
*****************************
SKINING *********************
*****************************
*/



/* Main Skin Color : Color Property */


.comment-reply a,
.mk-tabs .mk-tabs-tabs li.current a > i,
.mk-toggle .mk-toggle-title.active-toggle:before,
.introduce-simple-title,
.rating-star .rated,
.mk-accordion .mk-accordion-tab.current:before,
.mk-testimonial-author,
.modern-style .mk-testimonial-company,
#wp-calendar td#today,
.mk-tweet-list a,
.widget_testimonials .testimonial-slider .testimonial-author,
.news-full-without-image .news-categories span,
.news-half-without-image .news-categories span,
.news-fourth-without-image .news-categories span,
.mk-read-more,
.news-single-social li a,
.portfolio-widget-cats,
.portfolio-carousel-cats,
.blog-showcase-more,
.simple-style .mk-employee-item:hover .team-member-position,
.mk-blog-classic-item .mk-categories a, 
.mk-blog-grid-item .mk-categories a, 
.mk-blog-classic-item time a,
.mk-blog-grid-item time a,
.mk-blog-author a,
.mk-readmore,
.mk-blog-author a, .mk-post-date a, .mk-post-cat a,
.about-author-name,
.blog-similar-posts .similar-post-title,
.filter-portfolio li a:hover,
.mk-portfolio-classic-item .portfolio-categories a,
.portfolio-single-cat,
.mk-pagination .page-number,
.mk-woocommerce-pagination a.page-numbers,
.mk-portfolio-skills-text, 
.mk-portfolio-cats-text,
.register-login-links a:hover,
#mk-language-navigation ul li a:hover, 
#mk-language-navigation ul li.current-menu-item > a,
.mk_product_meta span a,
.mk_product_meta span .sku,
.not-found-subtitle,
.mk-mini-callout a,
.mk-quick-contact-wrapper h4,
.search-loop-meta a,
.new-tab-readmore,
.mk-news-tab .mk-tabs-tabs li.ui-tabs-active a,
.mk-tooltip,
.mk-search-permnalink,
.divider-go-top:hover,
.widget-sub-navigation ul li a:hover,
.mk-image-shortcode-lightbox i,
.mk-toggle-title.active-toggle i,
.mk-accordion-tab.current i,
.monocolor.pricing-table .pricing-price span,
#mk-footer .widget_posts_lists ul li .post-list-meta time,
.modern-post-type-icon i,
.mk-footer-tweets .tweet-username

{
	color: {$skin_color} !important;
}


#mk-sidebar .widget a:hover, #mk-footer .widget a:hover {
	color: {$skin_color};
}



/* Main Skin Color : Background-color Property */

.image-hover-overlay,
.post-type-badge,
.newspaper-portfolio,
.single-post-tags a:hover,
.similar-posts-wrapper .post-thumbnail:hover > .overlay-pattern,
.portfolio-logo-section,
.post-list-document .post-type-thumb:hover,
#cboxTitle,
#cboxPrevious,
#cboxNext,
#cboxClose,
.comment-form-button, 
.mk-dropcaps.fancy-style,
.mk-image-overlay,
.pinterest-item-overlay,
.news-full-with-image .news-categories span,
.news-half-with-image .news-categories span,
.news-fourth-with-image .news-categories span,
.widget-portfolio-overlay,
.portfolio-carousel-overlay,
.blog-carousel-overlay,
.mk-classic-comments span,
.mk-similiar-overlay,
.mk-skin-button,
.mk-flex-caption .flex-desc span,
.mk-icon-box .mk-icon-wrapper i:hover,
.mk-quick-contact-link:hover,
.quick-contact-active.mk-quick-contact-link,
.mk-fancy-table th,
.mk-blog-showcase-thumb a,
.mk-tooltip .tooltip-text,
.mk-tooltip .tooltip-text:after,
.wpcf7-submit,
.ui-slider-handle
{
	background-color: {$skin_color} !important;
}


::-webkit-selection{
	background-color: {$skin_color};
	color:#fff;
}

::-moz-selection{
	background-color: {$skin_color};
	color:#fff;
}

::selection{
	background-color: {$skin_color};
	color:#fff;
}


/* Main Skin Color : Border-color Property */


.mk-testimonial-image img,
.testimonial-author-image,  
.mk-about-author-wrapper .avatar,
.mk-circle-image span {
	-webkit-box-shadow:0 0 0 1px {$skin_color};
	-moz-box-shadow:0 0 0 1px {$skin_color};
	box-shadow:0 0 0 1px {$skin_color};
}

.single-back-top, 
.mk-blockquote.line-style,
.bypostauthor .comment-content,
.bypostauthor .comment-content:after,
.modern-post-type-icon {
	border-color: {$skin_color} !important;
}

.news-full-with-image .news-categories span,
.news-half-with-image .news-categories span,
.news-fourth-with-image .news-categories span,
.mk-flex-caption .flex-desc span {
	box-shadow: 8px 0 0 {$skin_color}, -8px 0 0 {$skin_color};
}

.monocolor.pricing-table .pricing-cols .pricing-col.featured-plan {
	border:1px solid {$skin_color};
}



.mk-skin-button.three-dimension, .wpcf7-submit {
	box-shadow: 0px 3px 0px 0px {$skin_darker};
}

.mk-skin-button.three-dimension:active, .wpcf7-submit:active {
	box-shadow: 0px 1px 0px 0px {$skin_darker};	
}









{$option['custom_css']}

/****************************/



CSS;
?>