<?php
/**
 * Builds our main Layout meta box.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_enqueue_scripts', 'asagi_enqueue_meta_box_scripts' );
/**
 * Adds any scripts for this meta box.
 *
 *
 * @param string $hook The current admin page.
 */
function asagi_enqueue_meta_box_scripts( $hook ) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		$post_types = get_post_types( array( 'public' => true ) );
		$screen = get_current_screen();
		$post_type = $screen->id;

		if ( in_array( $post_type, ( array ) $post_types ) ) {
			wp_enqueue_style( 'asagi-layout-metabox', get_template_directory_uri() . '/css/admin/meta-box.css', array(), ASAGI_VERSION );
		}
	}
}

add_action( 'add_meta_boxes', 'asagi_register_layout_meta_box' );
/**
 * Generate the layout metabox
 *
 */
function asagi_register_layout_meta_box() {
	if ( ! current_user_can( apply_filters( 'asagi_metabox_capability', 'edit_theme_options' ) ) ) {
		return;
	}

	if ( ! defined( 'ASAGI_LAYOUT_META_BOX' ) ) {
		define( 'ASAGI_LAYOUT_META_BOX', true );
	}

	$post_types = get_post_types( array( 'public' => true ) );
	foreach ($post_types as $type) {
		if ( 'attachment' !== $type ) {
			add_meta_box (
				'asagi_layout_options_meta_box',
				esc_html__( 'Layout', 'asagi' ),
				'asagi_do_layout_meta_box',
				$type,
				'normal',
				'high'
			);
		}
	}
}

/**
 * Build our meta box.
 *
 *
 * @param object $post All post information.
 */
function asagi_do_layout_meta_box( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'asagi_layout_nonce' );
	$stored_meta = (array) get_post_meta( $post->ID );
	$stored_meta['_asagi-sidebar-layout-meta'][0] = ( isset( $stored_meta['_asagi-sidebar-layout-meta'][0] ) ) ? $stored_meta['_asagi-sidebar-layout-meta'][0] : '';
	$stored_meta['_asagi-footer-widget-meta'][0] = ( isset( $stored_meta['_asagi-footer-widget-meta'][0] ) ) ? $stored_meta['_asagi-footer-widget-meta'][0] : '';
	$stored_meta['_asagi-full-width-content'][0] = ( isset( $stored_meta['_asagi-full-width-content'][0] ) ) ? $stored_meta['_asagi-full-width-content'][0] : '';
	$stored_meta['_asagi-disable-headline'][0] = ( isset( $stored_meta['_asagi-disable-headline'][0] ) ) ? $stored_meta['_asagi-disable-headline'][0] : '';

	$tabs = apply_filters( 'asagi_metabox_tabs',
		array(
			'sidebars' => array(
				'title' => esc_html__( 'Sidebars', 'asagi' ),
				'target' => '#asagi-layout-sidebars',
				'class' => 'current',
			),
			'footer_widgets' => array(
				'title' => esc_html__( 'Footer Widgets', 'asagi' ),
				'target' => '#asagi-layout-footer-widgets',
				'class' => '',
			),
			'disable_elements' => array(
				'title' => esc_html__( 'Disable Elements', 'asagi' ),
				'target' => '#asagi-layout-disable-elements',
				'class' => '',
			),
			'container' => array(
				'title' => esc_html__( 'Page Builder Container', 'asagi' ),
				'target' => '#asagi-layout-page-builder-container',
				'class' => '',
			),
		)
	);
	?>
	<script>
		jQuery(document).ready(function($) {
			$( '.asagi-meta-box-menu li a' ).on( 'click', function( event ) {
				event.preventDefault();
				$( this ).parent().addClass( 'current' );
				$( this ).parent().siblings().removeClass( 'current' );
				var tab = $( this ).attr( 'data-target' );

				// Page header module still using href.
				if ( ! tab ) {
					tab = $( this ).attr( 'href' );
				}

				$( '.asagi-meta-box-content' ).children( 'div' ).not( tab ).css( 'display', 'none' );
				$( tab ).fadeIn( 100 );
			});
		});
	</script>
	<div id="asagi-meta-box-container">
		<ul class="asagi-meta-box-menu">
			<?php
			foreach ( ( array ) $tabs as $tab => $data ) {
				echo '<li class="' . esc_attr( $data['class'] ) . '"><a data-target="' . esc_attr( $data['target'] ) . '" href="#">' . esc_html( $data['title'] ) . '</a></li>';
			}

			do_action( 'asagi_layout_meta_box_menu_item' );
			?>
		</ul>
		<div class="asagi-meta-box-content">
			<div id="asagi-layout-sidebars">
				<div class="asagi_layouts">
					<label for="meta-asagi-layout-global" style="display:block;margin-bottom:10px;">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-global" value="" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], '' ); ?>>
						<?php esc_html_e( 'Default', 'asagi' );?>
					</label>

					<label for="meta-asagi-layout-one" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( 'Right Sidebar', 'asagi' );?>">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-one" value="right-sidebar" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], 'right-sidebar' ); ?>>
						<?php esc_html_e( 'Content', 'asagi' );?> / <strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong>
					</label>

					<label for="meta-asagi-layout-two" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( 'Left Sidebar', 'asagi' );?>">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-two" value="left-sidebar" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], 'left-sidebar' ); ?>>
						<strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong> / <?php esc_html_e( 'Content', 'asagi' );?>
					</label>

					<label for="meta-asagi-layout-three" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( 'No Sidebars', 'asagi' );?>">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-three" value="no-sidebar" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], 'no-sidebar' ); ?>>
						<?php esc_html_e( 'Content (no sidebars)', 'asagi' );?>
					</label>

					<label for="meta-asagi-layout-four" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( 'Both Sidebars', 'asagi' );?>">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-four" value="both-sidebars" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], 'both-sidebars' ); ?>>
						<strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong> / <?php esc_html_e( 'Content', 'asagi' );?> / <strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong>
					</label>

					<label for="meta-asagi-layout-five" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( 'Both Sidebars on Left', 'asagi' );?>">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-five" value="both-left" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], 'both-left' ); ?>>
						<strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong> / <strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong> / <?php esc_html_e( 'Content', 'asagi' );?>
					</label>

					<label for="meta-asagi-layout-six" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( 'Both Sidebars on Right', 'asagi' );?>">
						<input type="radio" name="_asagi-sidebar-layout-meta" id="meta-asagi-layout-six" value="both-right" <?php checked( $stored_meta['_asagi-sidebar-layout-meta'][0], 'both-right' ); ?>>
						<?php esc_html_e( 'Content', 'asagi' );?> / <strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong> / <strong><?php echo esc_html_x( 'Sidebar', 'Short name for meta box', 'asagi' ); ?></strong>
					</label>
				</div>
			</div>
			<div id="asagi-layout-footer-widgets" style="display: none;">
				<div class="asagi_footer_widget">
					<label for="meta-asagi-footer-widget-global" style="display:block;margin-bottom:10px;">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-global" value="" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '' ); ?>>
						<?php esc_html_e( 'Default', 'asagi' );?>
					</label>

					<label for="meta-asagi-footer-widget-zero" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( '0 Widgets', 'asagi' );?>">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-zero" value="0" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '0' ); ?>>
						<?php esc_html_e( '0 Widgets', 'asagi' );?>
					</label>

					<label for="meta-asagi-footer-widget-one" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( '1 Widget', 'asagi' );?>">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-one" value="1" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '1' ); ?>>
						<?php esc_html_e( '1 Widget', 'asagi' );?>
					</label>

					<label for="meta-asagi-footer-widget-two" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( '2 Widgets', 'asagi' );?>">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-two" value="2" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '2' ); ?>>
						<?php esc_html_e( '2 Widgets', 'asagi' );?>
					</label>

					<label for="meta-asagi-footer-widget-three" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( '3 Widgets', 'asagi' );?>">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-three" value="3" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '3' ); ?>>
						<?php esc_html_e( '3 Widgets', 'asagi' );?>
					</label>

					<label for="meta-asagi-footer-widget-four" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( '4 Widgets', 'asagi' );?>">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-four" value="4" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '4' ); ?>>
						<?php esc_html_e( '4 Widgets', 'asagi' );?>
					</label>

					<label for="meta-asagi-footer-widget-five" style="display:block;margin-bottom:3px;" title="<?php esc_attr_e( '5 Widgets', 'asagi' );?>">
						<input type="radio" name="_asagi-footer-widget-meta" id="meta-asagi-footer-widget-five" value="5" <?php checked( $stored_meta['_asagi-footer-widget-meta'][0], '5' ); ?>>
						<?php esc_html_e( '5 Widgets', 'asagi' );?>
					</label>
				</div>
			</div>
			<div id="asagi-layout-page-builder-container" style="display: none;">
				<p class="page-builder-content" style="color:#666;font-size:13px;margin-top:0;">
					<?php esc_html_e( 'Choose your page builder content container type. Both options remove the content padding for you.', 'asagi' ) ;?>
				</p>

				<p class="asagi_full_width_template">
					<label for="default-content" style="display:block;margin-bottom:10px;">
						<input type="radio" name="_asagi-full-width-content" id="default-content" value="" <?php checked( $stored_meta['_asagi-full-width-content'][0], '' ); ?>>
						<?php esc_html_e( 'Default', 'asagi' );?>
					</label>

					<label id="full-width-content" for="_asagi-full-width-content" style="display:block;margin-bottom:10px;">
						<input type="radio" name="_asagi-full-width-content" id="_asagi-full-width-content" value="true" <?php checked( $stored_meta['_asagi-full-width-content'][0], 'true' ); ?>>
						<?php esc_html_e( 'Full Width', 'asagi' );?>
					</label>

					<label id="asagi-remove-padding" for="_asagi-remove-content-padding" style="display:block;margin-bottom:10px;">
						<input type="radio" name="_asagi-full-width-content" id="_asagi-remove-content-padding" value="contained" <?php checked( $stored_meta['_asagi-full-width-content'][0], 'contained' ); ?>>
						<?php esc_html_e( 'Contained', 'asagi' );?>
					</label>
				</p>
			</div>
			<div id="asagi-layout-disable-elements" style="display: none;">
				<?php if ( ! defined( 'ASAGI_DE_VERSION' ) ) : ?>
					<div class="asagi_disable_elements">
						<label for="meta-asagi-disable-headline" style="display:block;margin: 0 0 1em;" title="<?php esc_attr_e( 'Content Title', 'asagi' );?>">
							<input type="checkbox" name="_asagi-disable-headline" id="meta-asagi-disable-headline" value="true" <?php checked( $stored_meta['_asagi-disable-headline'][0], 'true' ); ?>>
							<?php esc_html_e( 'Content Title', 'asagi' );?>
						</label>

						<?php if ( ! defined( 'ASAGI_PREMIUM_VERSION' ) ) : ?>
							<span style="display:block;padding-top:1em;border-top:1px solid #EFEFEF;">
								<a href="<?php echo ASAGI_THEME_URL; // WPCS: XSS ok, sanitization ok. ?>" target="_blank"><?php esc_html_e( 'Premium module available', 'asagi' ); ?></a>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php do_action( 'asagi_layout_disable_elements_section', $stored_meta ); ?>
			</div>
			<?php do_action( 'asagi_layout_meta_box_content', $stored_meta ); ?>
		</div>
	</div>
    <?php
}

add_action( 'save_post', 'asagi_save_layout_meta_data' );
/**
 * Saves the sidebar layout meta data.
 *
 *
 * @param int Post ID.
 */
function asagi_save_layout_meta_data( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'asagi_layout_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'asagi_layout_nonce' ] ), basename( __FILE__ ) ) ) ? true : false;

	if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	$sidebar_layout_key   = '_asagi-sidebar-layout-meta';
	$sidebar_layout_value = filter_input( INPUT_POST, $sidebar_layout_key, FILTER_SANITIZE_STRING );

	if ( $sidebar_layout_value ) {
		update_post_meta( $post_id, $sidebar_layout_key, $sidebar_layout_value );
	} else {
		delete_post_meta( $post_id, $sidebar_layout_key );
	}

	$footer_widget_key   = '_asagi-footer-widget-meta';
	$footer_widget_value = filter_input( INPUT_POST, $footer_widget_key, FILTER_SANITIZE_STRING );

	// Check for empty string to allow 0 as a value.
	if ( '' !== $footer_widget_value ) {
		update_post_meta( $post_id, $footer_widget_key, $footer_widget_value );
	} else {
		delete_post_meta( $post_id, $footer_widget_key );
	}

	$page_builder_container_key   = '_asagi-full-width-content';
	$page_builder_container_value = filter_input( INPUT_POST, $page_builder_container_key, FILTER_SANITIZE_STRING );

	if ( $page_builder_container_value ) {
		update_post_meta( $post_id, $page_builder_container_key, $page_builder_container_value );
	} else {
		delete_post_meta( $post_id, $page_builder_container_key );
	}

	// We only need this if the Disable Elements module doesn't exist
	if ( ! defined( 'ASAGI_DE_VERSION' ) ) {
		$disable_content_title_key   = '_asagi-disable-headline';
		$disable_content_title_value = filter_input( INPUT_POST, $disable_content_title_key, FILTER_SANITIZE_STRING );

		if ( $disable_content_title_value ) {
			update_post_meta( $post_id, $disable_content_title_key, $disable_content_title_value );
		} else {
			delete_post_meta( $post_id, $disable_content_title_key );
		}
	}

	do_action( 'asagi_layout_meta_box_save', $post_id );
}
