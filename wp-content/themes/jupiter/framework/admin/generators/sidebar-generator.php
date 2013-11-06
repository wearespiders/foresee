<?php
class sidebarGenerator {
	var $sidebar_names = array();
	var $footer_sidebar_count = 0;
	var $footer_sidebar_names = array();
	
	function sidebarGenerator(){
		$this->sidebar_names = array(
			'page'=>__('Page Widget Area','mk_framework'),
			'single_post'=>__('Single Posts Widget Area','mk_framework'),
			'single_portfolio'=>__('Single Portfolios Widget Area','mk_framework'),
			'single_news'=>__('Single News Widget Area','mk_framework'),
			'search'=>__('Search Widget Area','mk_framework'),
			'archive'=>__('Archive Widget Area','mk_framework'),
			'404'=>__('404 Widget Area','mk_framework'),
			'woocommerce'=>__('Woocommerce Shop Widget Area','mk_framework'),
			'woocommerce_single'=>__('Woocommerce Single Widget Area','mk_framework'),
		);
		$this->footer_sidebar_names = array(
			__('First Footer Widget Area','mk_framework'),
			__('Second Footer Widget Area','mk_framework'),
			__('Third Footer Widget Area','mk_framework'),
			__('Fourth Footer Widget Area','mk_framework'),
			__('Fifth Footer Widget Area','mk_framework'),
			__('Sixth Footer Widget Area','mk_framework'),
		);

	}

	function register_sidebar(){
		foreach ($this->sidebar_names as $name){
			register_sidebar(array(
				'name' => $name,
				'description' => $name,
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<div class="widgettitle">',
				'after_title' => '</div>',
			));
		}	
		foreach ($this->footer_sidebar_names as $name){
			register_sidebar(array(
				'name' =>  $name,
				'description' => $name,
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<div class="widgettitle">',
				'after_title' => '</div>',
			));
		}
		
	
		
		//register custom sidebars
	$custom_sidebars = theme_option(THEME_OPTIONS,'sidebars');
		if(!empty($custom_sidebars)){
			$custom_sidebar_names = explode(',',$custom_sidebars);
			foreach ($custom_sidebar_names as $name){
				register_sidebar(array(
					'name' =>  $name,
					'description' => $name,
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget' => '</section>',
					'before_title' => '<div class="widgettitle">',
					'after_title' => '</div>',
				));
			}
		}
		
	}
	
	function get_sidebar($post_id){
		
		if(is_page() || is_home()){
			$sidebar = $this->sidebar_names['page'];
		}
		if(is_search()) {
		$sidebar = $this->sidebar_names["search"];
		}
		if(is_404()) {
		$sidebar = $this->sidebar_names["404"];
		}
		if(is_archive()) {
		$sidebar = $this->sidebar_names["archive"];
		}		
		if(is_singular('post')){
			$sidebar = $this->sidebar_names['single_post'];
		}
		if(is_singular('portfolio')){
			$sidebar = $this->sidebar_names['single_portfolio'];
		}
		if(is_singular('news')){
			$sidebar = $this->sidebar_names['single_news'];
		}
		if(is_archive()){
			$sidebar = $this->sidebar_names["archive"];
		}
		if ( function_exists('is_woocommerce') && is_woocommerce() && is_archive()) { 
			$sidebar = $this->sidebar_names["woocommerce"]; 
		}
		if ( function_exists('is_woocommerce') && is_woocommerce() && is_single()) { 
			$sidebar = $this->sidebar_names["woocommerce_single"]; 
		}
		if ( function_exists('is_bbpress') && is_bbpress()) { 
			$sidebar = $this->sidebar_names['page'];
		}

		
		
		if(!empty($post_id)){
			$custom = get_post_meta($post_id, '_sidebar', true);
			if(!empty($custom)){
				$sidebar = $custom;
			}
		}
		if(isset($sidebar)){
			dynamic_sidebar($sidebar);
		}
	}
	function get_footer_sidebar(){
		dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
		$this->footer_sidebar_count++;
	}

}
global $_sidebarGenerator;
$_sidebarGenerator = new sidebarGenerator;

add_action('widgets_init', array($_sidebarGenerator,'register_sidebar'));

function sidebar_generator($function){
	global $_sidebarGenerator;
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_sidebarGenerator, $function ), $args );
}


