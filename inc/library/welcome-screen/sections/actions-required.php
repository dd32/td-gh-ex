<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Actions required
 */

wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );
?>

<div class="feature-section action-required demo-import-boxed" id="plugin-filter">

	<?php
	global $beenews_required_actions;

	if ( ! empty( $beenews_required_actions ) ):

		/* beenews_show_required_actions is an array of true/false for each required action that was dismissed */
		$beenews_show_required_actions = get_option( "beenews_show_required_actions" );
		$hooray = true;

		foreach ( $beenews_required_actions as $beenews_required_action_key => $beenews_required_action_value ):
			$hidden = false;
			if ( isset($beenews_show_required_actions[ $beenews_required_action_value['id'] ]) && $beenews_show_required_actions[ $beenews_required_action_value['id'] ] === false ) {
				$hidden = true;
			}
			if ( isset($beenews_required_action_value['check']) && $beenews_required_action_value['check'] ) {
				continue;
			}
			?>
			<div class="beenews-action-required-box">
				<?php if ( ! $hidden ): ?>
					<span data-action="dismiss" class="dashicons dashicons-visibility beenews-required-action-button"
					      id="<?php echo esc_attr( $beenews_required_action_value['id'] ); ?>"></span>
				<?php else: ?>
					<span data-action="add" class="dashicons dashicons-hidden beenews-required-action-button"
					      id="<?php echo esc_attr( $beenews_required_action_value['id'] ); ?>"></span>
				<?php endif; ?>
				<h3><?php if ( ! empty( $beenews_required_action_value['title'] ) ): echo esc_html( $beenews_required_action_value['title'] ); endif; ?></h3>
				<p>
					<?php if ( ! empty( $beenews_required_action_value['description'] ) ): echo esc_html( $beenews_required_action_value['description'] ); endif; ?>
					<?php if ( ! empty( $beenews_required_action_value['help'] ) ): echo '<br/>' . wp_kses_post( $beenews_required_action_value['help'] ); endif; ?>
				</p>
				<?php
				if ( ! empty( $beenews_required_action_value['plugin_slug'] ) ) {
					$active = $this->check_active( $beenews_required_action_value['plugin_slug'] );
					$url    = $this->create_action_link( $active['needs'], $beenews_required_action_value['plugin_slug'] );
					$label  = '';

					switch ( $active['needs'] ) {
						case 'install':
							$class = 'install-now button';
							$label = __( 'Install', 'bee-news' );
							break;
						case 'activate':
							$class = 'activate-now button button-primary';
							$label = __( 'Activate', 'bee-news' );
							break;
						case 'deactivate':
							$class = 'deactivate-now button';
							$label = __( 'Deactivate', 'bee-news' );
							break;
					}

					?>
					<p class="plugin-card-<?php echo esc_attr( $beenews_required_action_value['plugin_slug'] ) ?> action_button <?php echo ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : '' ?>">
						<a data-slug="<?php echo esc_attr( $beenews_required_action_value['plugin_slug'] ) ?>"
						   class="<?php echo esc_attr( $class ); ?>"
						   href="<?php echo esc_url( $url ) ?>"> <?php echo esc_html( $label ) ?> </a>
					</p>
					<?php
				};
				?>
			</div>
			<?php
			$hooray = false;
		endforeach;
	endif;

	if ( $hooray ):
		echo '<span class="hooray">' . __( 'Hooray! There are no required actions for you right now.', 'bee-news' ) . '</span>';
	endif;
	?>

</div>
