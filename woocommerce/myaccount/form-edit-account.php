<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="edit-account form-horizontal" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<div class="well">

			<fieldset>
				<div class="form-group">
				</div>
				<div class="form-group form-row-first">
					<label for="account_first_name" class="col-sm-4 control-label"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
					</div>
				</div>
				<div class="form-group form-row-last">
					<label for="account_last_name" class="col-sm-4 control-label"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
					</div>
				</div>
				<div class="form-group form-row-wide">
					<label for="account_email" class="col-sm-4 control-label"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
					<div class="col-md-8">
						<input type="email" class="form-control" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
					</div>
				</div>
				<div class="form-group">
				</div>
			</fieldset>


			<fieldset>

				<div class="col-md-offset-4 col-md-8">
					<legend><?php _e( 'Password Change', 'woocommerce' ); ?></legend>
				</div>

				<div class="form-group form-row-wide">
					<label for="password_current" class="col-sm-4 control-label"><?php _e( 'Current Password', 'woocommerce' ); ?></label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="password_current" id="password_current" />
						<span class="help-block"><?php _e( 'Leave blank to leave unchanged', 'woocommerce' ); ?></span>
					</div>
				</div>
				<div class="form-group form-row-wide">
					<label for="password_1" class="col-sm-4 control-label"><?php _e( 'New Password', 'woocommerce' ); ?></label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="password_1" id="password_1" />
						<span class="help-block"><?php _e( 'Leave blank to leave unchanged', 'woocommerce' ); ?></span>
					</div>
				</div>
				<div class="form-group form-row-wide">
					<label for="password_2" class="col-sm-4 control-label"><?php _e( 'Confirm New Password', 'woocommerce' ); ?></label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="password_2" id="password_2" />
					</div>
				</div>

				<div class="form-group form-row-wide">
					<?php wp_nonce_field( 'save_account_details' ); ?>
					<div class="col-md-offset-4 col-md-8">
						<input type="submit" class="btn btn-primary" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
						<input type="hidden" name="action" value="save_account_details" />
					</div>
				</div>


			</fieldset>

		</div>


	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

</form>


<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
