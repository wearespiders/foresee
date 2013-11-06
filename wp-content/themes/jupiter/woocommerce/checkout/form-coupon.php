<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( ! $woocommerce->cart->coupons_enabled() )
	return;

$info_message = apply_filters('woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ));
?>

<div class="mk-message-box mk-info-message-box"><span><?php echo $info_message; ?> <a href="#" class="showcoupon"><?php _e( 'Click here to enter your code', 'woocommerce' ); ?></a>
<form class="checkout_coupon" method="post" style="display:none">

		<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
		<input type="submit" class="mk-button mk-skin-secondary-button three-dimension medium" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

	<div class="clear"></div>
</form>
</span></div>
