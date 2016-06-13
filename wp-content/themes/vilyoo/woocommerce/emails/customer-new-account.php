<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf( __( "Thank you for registering with Vilyoo! Your username is <strong>%s</strong>.", 'woocommerce' ), esc_html( $user_login ) ); ?></p>

<?php if ( get_option( 'woocommerce_registration_generate_password' ) == 'yes' && $password_generated ) : ?>

	<p><?php printf( __( "Your password has been automatically generated: <strong>%s</strong>", 'woocommerce' ), esc_html( $user_pass ) ); ?></p>

<?php endif; ?>

<?php
	$userid = username_exists( $user_login );
	$vilyoo_user = get_user_by( 'id', $userid );

	if ( in_array( 'seller', (array) $vilyoo_user->roles ) ):
?>
	
	<p>
		Your account is activated now and you can start selling.   
	</p> 
	<p>
		1. Please read the sellers policy at <a href="<?php echo get_site_url();?>/sellers-policy/">http://vilyoo.com/sellers-policy/</a>.<br>
		2. Check <a href="<?php echo get_site_url();?>/sellers-guide/">http://vilyoo.com/sellers-guide/</a>  for guidance on how to open a shop, list your products and manage the shop. <br>
		3. Products will be approved within 24hrs from the time you list/upload and submit. <br>
	</p>

<?php endif; ?>

<p><?php printf( __( 'You can access your account area to view your orders and change your password here: %s.', 'woocommerce' ), wc_get_page_permalink( 'myaccount' ) ); ?></p>

<?php do_action( 'woocommerce_email_footer' ); ?>
