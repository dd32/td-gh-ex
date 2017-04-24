<?php
/**
 * Show messages
 *
 * @author 		Theme.al
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-info alert alert-warning" role="alert"><?php echo wp_kses_post( $message ); ?></div>
<?php endforeach; ?>
