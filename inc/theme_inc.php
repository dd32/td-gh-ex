<?php
//////// Theme Options
function bb10_theme_options_items() {
	$items = array (
		array(
			'id' => 'twitter_url',
			'name' => __('Twitter URL.', 'bb10'),
			'desc' => __('Enter your twitter url. For example: http://twitter.com/ylgod.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id'     => 'twitter_name',
			'name'   => __('Twitter Name', 'bb10'),
			'desc'   => __('Enter your twitter name or another description.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id' => 'weibo_url',
			'name' => __('Sina Weibo URL.', 'bb10'),
			'desc' => __('Enter your Sina Weibo url. For example: http://weibo.com/ylgod.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id'     => 'weibo_name',
			'name'   => __('Sina WeiBo Name', 'bb10'),
			'desc'   => __('Enter your Sina Weibo name or another description.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id' => 'email_url',
			'name' => __('Email URL.', 'bb10'),
			'desc' => __('Enter your Email url. For example: mailto:i@hjyl.org.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id'     => 'email_name',
			'name'   => __('Email Name', 'bb10'),
			'desc'   => __('Enter your Email name or another description.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id' => 'rss_url',
			'name' => __('RSS URL.', 'bb10'),
			'desc' => __('Enter your RSS url. For example: http://hjyl.org/feed.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id'     => 'rss_name',
			'name'   => __('RSS Name', 'bb10'),
			'desc'   => __('Enter your RSS name or another description.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id' => 'qrcode_url',
			'name' => __('Qrcode Image URL.', 'bb10'),
			'desc' => __('Enter your Qrcode Image url. For example: http://img.hjyl.org/uploads/2009/09/qrcode_for_gh_8b1a277c7cb7_430-300x300.jpg.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
		array(
			'id'     => 'qrcode_name',
			'name'   => __('Qrcode Name', 'bb10'),
			'desc'   => __('Enter your Qrcode name or another description.', 'bb10'),
			'std'    => '',
			'hr'     => '',
			'nTable' => '',
			'nTitle' => '',
			'type'   => ''
		),
	);
	return $items;
}

add_action( 'admin_init', 'bb10_theme_options_init' );
add_action( 'admin_menu', 'bb10_theme_options_add_page' );
function bb10_theme_options_init(){
	register_setting( 'bb10_options', 'bb10_theme_options', 'bb10_options_validate' );
}
function bb10_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'bb10' ), __( 'Theme Options', 'bb10' ), 'edit_theme_options', 'theme_options', 'bb10_theme_options_do_page' );
}
function bb10_default_options() {
	$options = get_option( 'bb10_theme_options' );
	foreach ( bb10_theme_options_items() as $item ) {
		if ( ! isset( $options[$item['id']] ) ) {
			if ( !empty($item['std']) )
				$options[$item['id']] = $item['std'];
			else
				$options[$item['id']] = '';
		}
	}
	update_option( 'bb10_theme_options', $options );
}
add_action( 'init', 'bb10_default_options' );
function bb10_theme_options_do_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	if( isset( $_REQUEST['action'])&&('reset' == $_REQUEST['action']) ) {
		delete_option( 'bb10_theme_options' );
		bb10_default_options();
	}
?>
	<div class="wrap hjyl_wrap">

		<style>
			.hjyl_wrap label{cursor:text;}
			.has-sidebar-content{overflow:hidden;}
			.stuffbox h3{border-bottom:1px solid #e5e5e5;}
			.form-table, .form-table td, .form-table th, .form-table td p, .form-wrap label{font-size:12px;}
		</style>

		<h2><?php echo sprintf( __( '%1$s Theme Options', 'bb10' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>
		<div id="poststuff" class="metabox-holder has-right-sidebar">
			<div class="inner-sidebar">
				<div style="position:relative;" class="meta-box-sortabless ui-sortable" id="side-sortables">
					<div class="postbox" id="sm_pnres">
								<h3 class="hndle"><span><?php _e('Donation','bb10'); ?></span></h3>
								<div class="inside" style="margin:0;padding-top:10px;background-color:#ffffe0;">
										<?php printf(__('Created, Developed and maintained by %s . If you feel my work is useful and want to support the development of more free resources, you can donate me. Thank you very much!','bb10'), '<a href="'.esc_url( __( 'http://hjyl.org/', 'bb10' ) ).'">HJYL</a>'); ?>
											<br /><br />
											<table>
											<tr>
											<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
												<input type="hidden" name="cmd" value="_xclick">
												<input type="hidden" name="business" value="i@hjyl.org">
												<input type="hidden" name="item_name" value="hjyl WordPress Theme">
												<input type="hidden" name="charset" value="utf-8" >
												<input type="hidden" name="currency_code" value="USD">
												<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
											</form>
											</tr>
											<tr>
											<img src="<?php echo esc_url( __( 'http://t1.qpic.cn/mblogpic/bcd7926bbc4d4e03f384/2000', 'bb10' ) ); ?>" alt="<?php _e('Alipay', 'bb10'); ?>" />
											</tr>
											</table>
								</div>
						</div>
				</div>
			</div>
			<div class="has-sidebar-content" id="post-body-content">
				<form method="post" action="options.php">
					<?php settings_fields( 'bb10_options' ); ?>
					<?php $options = get_option( 'bb10_theme_options' ); ?>
					<div class="stuffbox" style="padding-bottom:10px;">
						<h3><label for="link_url"><?php _e( 'General settings', 'bb10' ); ?></label></h3>
						<div class="inside">
							<table class="form-table">
							<?php foreach (bb10_theme_options_items() as $item) {
							
								$bb10_name = $item['name'];
								$bb10_form_name = 'bb10_theme_options['.$item['id'].']';
								$bb10_value = !empty($options[$item['id']]) ? $options[$item['id']] : $item['std'];
							?>

								<?php if ($item['type'] == 'checkbox') { ?>
								
		<?php if ($item['nTable']) { ?>
							</table>
						</div>
					</div>
					<div class="stuffbox" style="padding-bottom:10px;">
						<h3><label for="link_url"><?php echo $item['nTitle']; ?></label></h3>
						<div class="inside">
							<table class="form-table">
		<?php } ?>
									<tr valign="top">
										<th scope="row"><strong><?php echo $bb10_name; ?></strong></th>
										<td>
											<input name="<?php echo $bb10_form_name; ?>" type="checkbox" value="1" <?php checked($bb10_value, 1); ?> />
											<label class="description" for="<?php echo $bb10_form_name; ?>"><?php echo $item['desc']; ?></label>
										</td>
									</tr>
									<?php if ($item['hr']) echo '<tr valign="top"><th style="margin:0;padding:0;border-bottom:1px solid #ddd;"> </th><td style="margin:0;padding:0;border-bottom:1px solid #ddd;"> </td></tr>'; ?>

								<?php } elseif ($item['type'] == 'code') { ?>
								
		<?php if ($item['nTable']) { ?>
							</table>
						</div>
					</div>
					<div class="stuffbox" style="padding-bottom:10px;">
						<h3><label for="link_url"><?php echo $item['nTitle']; ?></label></h3>
						<div class="inside">
							<table class="form-table">
		<?php } ?>
									<tr valign="top">
										<th scope="row"><strong><?php echo $bb10_name; ?></strong></th>
										<td>
											<textarea name="<?php echo $bb10_form_name; ?>" type="code" cols="65%" rows="4"><?php echo $bb10_value; ?></textarea>
											<br/>
											<label class="description" for="<?php echo $bb10_form_name; ?>"><?php echo $item['desc']; ?></label>
										</td>
									</tr>
									<?php if ($item['hr']) echo '<tr valign="top"><th style="margin:0;padding:0;border-bottom:1px solid #ddd;"> </th><td style="margin:0;padding:0;border-bottom:1px solid #ddd;"> </td></tr>'; ?>

								<?php } else { ?>
								
		<?php if ($item['nTable']) { ?>
							</table>
						</div>
					</div>
					<div class="stuffbox" style="padding-bottom:10px;">
						<h3><label for="link_url"><?php echo $item['nTitle']; ?></label></h3>
						<div class="inside">
							<table class="form-table">
		<?php } ?>
									<tr valign="top">
										<th scope="row"><strong><?php echo $bb10_name; ?></strong></th>
										<td>
											<input name="<?php echo $bb10_form_name; ?>" type="text" value="<?php echo $bb10_value; ?>" size="40" />
											<br/>
											<label class="description" for="<?php echo $bb10_form_name; ?>"><?php echo $item['desc']; ?></label>
										</td>
									</tr>
									<?php if ($item['hr']) echo '<tr valign="top"><th style="margin:0;padding:0;border-bottom:1px solid #ddd;"> </th><td style="margin:0;padding:0;border-bottom:1px solid #ddd;"> </td></tr>'; ?>

								<?php } ?>

							<?php } ?>
							</table>
						</div>
					</div>
					<p class="submit" style="margin:0;padding:0;">
						<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'bb10' ); ?>" />
					</p>
				</form>
				<form method="post" style="position:relative;margin:0;padding:0;">
					<input class="button" name="reset" type="submit" value="<?php _e('Reset All Settings','bb10'); ?>" onclick="return confirm('<?php _e('Click OK to reset. Any settings will be lost!', 'bb10'); ?>');" style="position:absolute;left:120px;top:-28px;" />
					<input type="hidden" name="action" value="reset" />
				</form>
			</div>
		</div>
	</div>
<?php
}

//	Sanitize and validate input. Accepts an array, return a sanitized array.
function bb10_options_validate( $input ) {
	// must be safe text with no HTML tags
	$str = array('twitter_name','twitter_url','weibo_name','weibo_url','email_name','email_url','rss_name','rss_url','qrcode_name','qrcode_url');
	$input[$str] = sanitize_text_field( $input[$str] );

	return $input;
}
