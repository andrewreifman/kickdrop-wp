<style>
header h1{
	display: none;
}
</style>

<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="customer-login">

<?php endif; ?>

		<h1><?php _e( 'Sign In', 'woocommerce' ); ?></h1>

		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="form-group">
				<label for="username sr-only"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" placeholder="Email address" />
			</div>
			<div class="form-group">
				<label for="password sr-only"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password" placeholder="Password" />
			</div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<div class="form-group">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
				<label for="rememberme" class="inline">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				</label>
			</div>
			<p class="lost_password">
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
</div><!-- customer-login -->

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
