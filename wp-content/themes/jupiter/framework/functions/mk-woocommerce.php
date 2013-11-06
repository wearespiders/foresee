<?php
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action( 'woocommerce_before_main_content', 'mk_woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'mk_woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

function mk_woocommerce_output_content_wrapper() {
	global $post;
	if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
		$page_layout = $_REQUEST['layout'];
	} else {
		if(is_single()) {
			$page_layout = theme_option( THEME_OPTIONS, 'woocommerce_single_layout' );
		} 
		else if(is_page()) {
			$page_layout = get_post_meta($post->ID, '_layout', true);
		} else {
			$page_layout=theme_option( THEME_OPTIONS, 'woocommerce_layout' );
		}
	}
	


?>
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout  mk-grid row-fluid">
		<div class="theme-content">
<?php
}





function mk_woocommerce_output_content_wrapper_end() {
	global $post;
	if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
		$page_layout = $_REQUEST['layout'];
	} else {
		if(is_single()) {
		$page_layout = theme_option( THEME_OPTIONS, 'woocommerce_single_layout' );
		} 
		else if(is_page()) {
			$page_layout = get_post_meta($post->ID, '_layout', true);
		} else {
			$page_layout=theme_option( THEME_OPTIONS, 'woocommerce_layout' );
		}
	}

	
?>
		</div>
	<?php if($page_layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>	
	</div>
</div>
<?php
}







function mk_woocommerce_styles(){
	if(is_admin() || 'wp-login.php' == basename($_SERVER['PHP_SELF'])){
		return;
	}
	wp_enqueue_style('mk-woocommerce', THEME_STYLES.'/mk-woocommerce.css', false, false, 'all');
}
add_action('wp_print_styles', 'mk_woocommerce_styles',12);


function mk_woocommerce_scripts(){
	if(is_admin() || 'wp-login.php' == basename($_SERVER['PHP_SELF'])){
		return;
	}
	wp_enqueue_script( 'jquery-isotope', THEME_JS .'/jquery.isotope.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'jquery-mk-woocommerce', THEME_JS .'/woocommerce-scripts.js', array('jquery'), false, true);
}
add_action('wp_print_scripts', 'mk_woocommerce_scripts',12);




add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
if ( ! function_exists( 'woocommerce_header_add_to_cart_fragment' ) ) { 
    function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        
        ob_start();
        
        ?>
       <span class="cart_details">
            <span class="mk-woo-items"><i class="mk-moon-cart-2"></i><?php echo sprintf(_n('<strong>%d</strong> item', '<strong>%d</strong> items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
            <span class="mk-woo-total"><strong><?php echo $woocommerce->cart->get_cart_total(); ?></strong><?php _e("Total",'mk_framework');?></span>
            <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" class="mk-button three-dimension small mk-skin-button"><i class="mk-moon-cart-2"></i><?php _e("view cart",'mk_framework');?></a>
        </span>
        <?php
        
        $fragments['span.cart_details'] = ob_get_clean();
        
        return $fragments;
        
    }
}


/*--------------------------------------------------------------------------------------------------
	PRODUCTS PAGE - FILTER IMAGE
--------------------------------------------------------------------------------------------------*/
 
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
}
 

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
			
			$output = '<div class="mk-product-image">';

			if ( has_post_thumbnail() ) {
				$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true );
				$image = theme_image_resize($image_src_array[0],  500 , 500);
				$output .= '<a href="'. get_permalink().'"><img src="'.$image['url'].'" alt=""></a>';
				
			} else {
			
				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="500" height="500" />';
			
			}
			
			$output .= '</div>';
			
			return $output;
	}
}

