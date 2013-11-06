<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
	$out_of_stock_badge = '';
	if ( ! $product->is_in_stock() ) { 

	$mk_link = '<a href="'. apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" class="add_to_cart_button mk-button mk-skin-button three-dimension small"><i class="mk-icon-search"></i>'. apply_filters( 'out_of_stock_add_to_cart_text', __( 'READ MORE', 'woocommerce' ) ).'</a>';
	$out_of_stock_badge = '<span class="mk-out-stock">'.__( 'OUT OF STOCK', 'woocommerce' ).'</span>';
	}
	else { ?>

	<?php

		switch ( $product->product_type ) {
			case "variable" :
				$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
				$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', 'woocommerce') );
			break;
			case "grouped" :
				$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
				$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', 'woocommerce') );
			break;
			case "external" :
				$link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
				$label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
			break;
			default :
				$link 	= apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
				$label 	= apply_filters( 'add_to_cart_text', __('ADD TO CART', 'woocommerce') );
			break;
		}
		
		if ( $product->product_type != 'external') {
			$mk_link = '<a href="'. $link .'" rel="nofollow" data-product_id="'.$product->id.'" class="add_to_cart_button mk-button mk-skin-button three-dimension small product_type_'.$product->product_type.'"><i class="mk-icon-shopping-cart"></i>'. $label.'</a>';
		}
		else {
			$mk_link = '';
		}
	}


?>
<li <?php post_class(); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php
		echo $out_of_stock_badge;
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<div class="woo-loop-meta">
		<h3><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	<?php if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
	return;
	?>

	<?php if ( $rating_html = $product->get_rating_html() ) : ?>
		<?php echo $rating_html; ?>
	<?php endif; ?>


	<?php echo $mk_link; ?>
	<!--<a class="mk-button woo-readmore small three-dimension" href="<?php the_permalink(); ?>"><i class="mk-icon-search"></i><?php _e('DETAILS', 'mk_framework'); ?></a>-->
</div>
</li>