<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<h4><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></h4>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a class="mk-button three-dimension medium mk-skin-button" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( '&larr; Return To Shop', 'woocommerce' ) ?></a></p>