<?php
/**
 * Change password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>

<form action="<?php echo esc_url( get_permalink(woocommerce_get_page_id('change_password')) ); ?>" method="post">

	<div class="mk-woo-form-section">
		<label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" size="50" class="input-text" name="password_1" id="password_1" />
	</div>	
	<div class="mk-woo-form-section">
		<label for="password_2"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" size="50" class="input-text" name="password_2" id="password_2" />
	</div>
	<div class="clear"></div>

	<input type="submit" class="mk-button three-dimension medium mk-skin-button" name="change_password" value="<?php _e( 'SAVE', 'woocommerce' ); ?>" />

	<?php $woocommerce->nonce_field('change_password')?>
	<input type="hidden" name="action" value="change_password" />

</form>