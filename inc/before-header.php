<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function baw_before_header () { 
if (get_theme_mod('activate_before_header')) {
?>
	<div class="before-header">
		<div class="left-top">
			<?php if (get_theme_mod('header_email')) { ?>
				<div class="h-email" itemprop="email"><span class="dashicons dashicons-email-alt"> </span> <?php echo esc_html(get_theme_mod('header_email')); ?></div>
			<?php } ?>
			<?php if (get_theme_mod('header_address')) { ?>
				<div class="h-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span class="dashicons dashicons-location"> </span> <?php echo esc_html(get_theme_mod('header_address')); ?></div>
			<?php } ?>
			<?php if (get_theme_mod('header_phone')) { ?>
				<div class="h-phone" itemprop="telephone"><span class="dashicons dashicons-phone"> </span> <?php echo esc_html(get_theme_mod('header_phone')); ?></div>
			<?php } ?>
			<?php if (get_theme_mod('activate_search_icon')) { ?>
			<div class="search-top">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
					<label>
					<button class="button-primary button-search"><i class="dashicons dashicons-search"></i><span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'baw' ) ?></span></button>
						<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'baw' ) ?></span>
						<input type="search" class="search-field"
							placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'baw' ) ?>"
							value="<?php echo get_search_query() ?>" name="s"
							title="<?php echo esc_attr_x( 'Search for:', 'label', 'baw' ) ?>" />
					</label>
					<input type="submit" class="search-submit"
						value="<?php echo esc_attr_x( 'Search', 'submit button', 'baw' ) ?>" />
				</form>
			</div>
			<?php } ?>
			<?php if (get_theme_mod('activate_woo_cart')) { ?>
				<?php do_action( 'baw_header_top' ); ?><!-- Go to /inc/woocommerce/cart.php -->
			<?php } ?>
		</div>
		<?php if ( get_theme_mod('activate_my_account') and in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
		<div class="right-top">
			<span class="dashicons dashicons-admin-users"></span>
			<?php if ( is_user_logged_in() ) { ?>
				<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','baw'); ?>"><?php _e('My Account','baw'); ?></a>
			<?php } 
			else { ?>
				<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','baw'); ?>"><?php _e('Login / Register','baw'); ?></a>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
<?php
}
}