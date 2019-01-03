<?php
    add_action( 'admin_menu', 'quemalabs_getting_started_menu' );
    function quemalabs_getting_started_menu() {
        add_theme_page( esc_attr__( 'Theme Info', 'absolutte' ), esc_attr__( 'Theme Info', 'absolutte' ), 'manage_options', 'absolutte_theme-info', 'quemalabs_getting_started_page' );
    }

    /**
     * Theme Info Page
     */
    function quemalabs_getting_started_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'absolutte' ) );
        }
        echo '<div class="getting-started">';
    ?>
	<div class="getting-started-header">
		<div class="header-wrap">
			<div class="theme-image">
				<span class="top-browser"><i></i><i></i><i></i></span>
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="<?php echo esc_html( ABSOLUTTE_THEME_NAME ); ?>">
			</div>
			<div class="theme-content">
				<div class="theme-content-wrap">
				<h4><?php esc_html_e( 'Getting Started', 'absolutte' ); ?></h4>
				<h2 class="theme-name"><?php echo esc_html( ABSOLUTTE_THEME_NAME ); ?> <span class="ver"><?php echo 'v' . esc_html( ABSOLUTTE_THEME_VERSION ); ?></span></h2>
				<p><?php echo sprintf( esc_html__( 'Thanks for using %s, we appriciate that you create with our products.', 'absolutte' ), esc_html( ABSOLUTTE_THEME_NAME ) ); ?></p>
				<p><?php esc_html_e( 'Check the content below to get started with our theme.', 'absolutte' ); ?></p>
				</div>

				<ul class="getting-started-menu">
					<?php
                        if ( isset( $_GET['tab'] ) ) {
                                $tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) );
                            } else {
                                $tab = 'docs';
                            }
                        ?>
					<li><a href="?page=absolutte_theme-info&amp;tab=docs" class="<?php echo ( 'docs' == $tab ) ? ' active' : ''; ?>"><i class="fa fa-file-text-o"></i><?php esc_html_e( 'Documentation', 'absolutte' ); ?></a></li>
					<?php if ( class_exists( 'OCDI_Plugin' ) ) { ?>
						<li><a href="<?php echo esc_url( get_admin_url( null, 'themes.php?page=pt-one-click-demo-import' ) ); ?>"><i class="fa fa-download"></i><?php esc_html_e( 'Import Demo', 'absolutte' ); ?></a></li>
					<?php } ?>
					<li class="featured"><a href="https://www.quemalabs.com/plugin/absolutte-blocks-pro/" target="_blank"><i class="fa fa-support"></i><?php esc_html_e( 'Get PRO', 'absolutte' ); ?></a></li>
					<li><a href="https://quemalabs.ticksy.com/" target="_blank"><i class="fa fa-support"></i>					                                                                                         					                                                                                         					                                                                                         					                                                                                         					                                                                                          <?php esc_html_e( 'Support', 'absolutte' ); ?></a></li>
				</ul>

			</div><!-- .theme-content -->
		</div>
		<a href="https://www.quemalabs.com/" class="ql_logo" target="_blank"><img  src="<?php echo esc_url( get_template_directory_uri() ) . '/images/quemalabs.png'; ?>" alt="Quema Labs" /></a>
	</div><!-- .getting-started-header -->

	<div class="getting-started-content">

	<?php
        global $pagenow;
            global $updater;

            if ( $pagenow == 'themes.php' && isset( $_GET['page'] ) && 'absolutte_theme-info' == $_GET['page'] ) {
                if ( isset( $_GET['tab'] ) ) {
                    $tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) );
                } else {
                    $tab = 'docs';
                }

                switch ( $tab ) {
                case 'docs':
                ?>

			<div class="theme-docuementation">
				<div class="help-msg-wrap">
					<div class="help-msg"><?php echo sprintf( esc_html__( 'You can find this documentation and more at our %1$sHelp Center%2$s.', 'absolutte' ), '<a href="https://quemalabs.ticksy.com/articles/100013420" target="_blank">', '</a>' ); ?></div>
				</div>
			</div><!-- .theme-docuementation -->
			<?php
                break;
                        case 'license':

                            $updater->license_page();
                    } //switch ?>


	<?php } //if theme.php ?>

	</div><!-- .getting-started-content -->


	<?php
        echo '</div><!-- .getting-started -->';
    }
    ?>