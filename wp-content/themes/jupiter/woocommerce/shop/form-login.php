<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if (is_user_logged_in()) return;
?>
<form method="post" class="login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>
	<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

	<div class="mk-woo-form-section">
		<label for="username"><?php _e( 'Username or email', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" size="50" class="input-text" name="username" id="username" />
	</div>
	<div class="mk-woo-form-section">
		<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input class="input-text" size="50" type="password" name="password" id="password" />
	</div>
	<div class="clear"></div>
	<div class="mk-woo-form-section">
		<?php $woocommerce->nonce_field('login', 'login') ?>
		<input type="submit" class="mk-button three-dimension medium mk-skin-button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		<a class="lost_password" href="<?php echo esc_url( wp_lostpassword_url( home_url() ) ); ?>"><?php _e( 'Lost Password?', 'woocommerce' ); ?></a>
	</div>	
	<div class="clear"></div>
</form>