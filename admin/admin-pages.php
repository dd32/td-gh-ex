<?php
/*
* About page in the admin Area.
* @package Atlast Agency
* @since version 1.0.0
*/

function atlast_agency_theme_var_boot() {
	$theme_info = array();

	$theme_data    = wp_get_theme();
	$theme_name    = trim( $theme_data->get( 'Name' ) );
	$theme_slug    = trim( strtolower( $theme_data->get( 'Name' ) ) );
	$theme_version = $theme_data->get( 'Version' );

	$theme_info['version'] = $theme_version;
	$theme_info['name']    = $theme_name;
	$theme_info['slug']    = $theme_slug;

	return $theme_info;
}

function atlast_agency_set_promo_div() {
	$promo              = array();
	$promo['heading']   = esc_html__( 'PRO VERSION? DON\'T THINK SO..', 'atlast-agency' );
	$promo['content']   = esc_html__( 'Atlast Agency theme has already been packed with awesome features.
    So there is no need at all for a "Pro" version of this theme. We only get better based on your feedback. Please rate us. ', 'atlast-agency' );
	$promo['link_text'] = esc_html__( 'Rate our Theme', 'atlast-agency' );
	$promo['link_url']  = esc_url( 'https://wordpress.org/support/theme/atlast-agency/reviews/' );

	return $promo;
}

function atlast_agency_register_tabs() {
	$tabs            = array();
	$getting_started = array(
		'tab_key'  => 'getting_started',
		'tab_name' => esc_html__( 'Getting Started', 'atlast-agency' )
	);
	$documentation   = array(
		'tab_key'  => 'documentation',
		'tab_name' => esc_html__( 'Documentation / Support', 'atlast-agency' )
	);
	$more_info      = array(
		'tab_key'  => 'more_info',
		'tab_name' => esc_html__( 'Extra Info', 'atlast-agency' )
	);

	$tabs[] = $getting_started;
	$tabs[] = $documentation;
	$tabs[] = $more_info;

	return $tabs;
}


function atlast_agency_register_about_page() {
	$theme_data    = wp_get_theme();
	$theme_name    = trim( $theme_data->get( 'Name' ) );
	$theme_slug    = trim( strtolower( $theme_data->get( 'Name' ) ) );
	$theme_version = $theme_data->get( 'Version' );

	add_theme_page(
		sprintf( __( 'Welcome to %1$s', 'atlast-agency' ), ucfirst( $theme_name ) ),
		sprintf( __( 'About  %1$s', 'atlast-agency' ), ucfirst( $theme_name ) ),
		'edit_theme_options',
		'atlast-agency-hello',
		'atlast_agency_render_about_page'
	);

	function atlast_agency_render_about_page() {
		$themeVars = atlast_agency_theme_var_boot();

		echo '<div class="wrap">
<div id="icon-tools" class="icon32"></div>'; ?>
        <div class="akisthemes-about-wrapper">
            <div class="akis-section akis-group d-flex center-flex">
                <div class="akis-col span_2_of_3">
                    <h2>
						<?php echo sprintf( __( 'Welcome to %1$s ', 'atlast-agency' ), ucfirst( $themeVars['name'] ) ); ?> <?php echo $themeVars['version']; ?>
                    </h2>
                    <h3>
						<?php
						echo esc_html__( 'You are minutes away for creating something smashing good 
                        for any any kind of freelancer / digital agency. Atlast Agency theme is really one of its kind combining superb features with free price.', 'atlast-agency' ); ?>
                    </h3>
                </div>
				<?php
				$promo = atlast_agency_set_promo_div();
				if ( ! empty( $promo ) ):
					?>
                    <div class="akis-col span_1_of_3">
                        <div class="promo-div">
                            <h3><?php echo esc_html( $promo['heading'] ); ?></h3>
                            <p>
								<?php echo esc_html( $promo['content'] ); ?>
                            </p>
                            <a target="_blank" href="<?php echo esc_url( $promo['link_url'] ); ?>"
                               class="promo-btn button button-primary button-hero">
								<?php echo esc_attr( $promo['link_text'] ); ?>
                            </a>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>

		<?php
		$tabs = atlast_agency_register_tabs();
		if ( ! empty( $tabs ) ):
			$active_tab = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'getting_started';
			?>
            <h2 class="nav-tab-wrapper wp-clearfix akisthemes-tabs">
				<?php foreach ( $tabs as $tab ): ?>

                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=atlast-agency-hello' ) ); ?>&amp;tab=<?php echo esc_attr( $tab['tab_key'] ); ?>"
                       class="nav-tab <?php echo( $active_tab == $tab['tab_key'] ? 'nav-tab-active' : '' ); ?>"
                       role="tab"
                       data-toggle="tab"><?php echo esc_html( $tab['tab_name'] ); ?></a>
				<?php endforeach; ?>
            </h2>
		<?php endif; ?>

        <!-- Tab Content -->

        <div class="about-tab-content <?php echo ($active_tab == 'getting_started' ? ' show-tab-content ':' hide-tab-content'); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Install The Recommended Plugins', 'atlast-agency' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'This theme comes with some recommended plugins. You can use it without them installed, however
                        if you install them you
                        use this theme with its max features. The recommended plugins appear at the top of the screen when in a notice box.', 'atlast-agency' ); ?>
                    </p>
                    <p><?php echo esc_html__( 'If you haven\'t already done so, please install and activate these plugins.', 'atlast-agency' ); ?> </p>
                </div>
                <div class="akis-col span_1_of_2">
                    <h4>
						<?php echo esc_html__( '2. Install the demo content.', 'atlast-agency' ); ?>
                    </h4>
                    <p>
						<?php echo esc_html__( 'All our our themes comes with Predefined demo content. If you want to replicate the demo in a
                        single click just browse to "Appearance > Import Demo Data" and hit the "Import Demo Data"
                        Button.', 'atlast-agency' ); ?>
                    </p>


                </div>

            </div>
        </div>
        <!-- Documentation -->
        <div class="about-tab-content <?php echo ($active_tab == 'documentation' ? ' show-tab-content ':' hide-tab-content'); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Documentation', 'atlast-agency' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'This theme comes with extensive documentation. 
						You can find it by clicking the button below.', 'atlast-agency' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( 'https://akisthemes.com/docs/atlast-agency-documentation/'); ?>"
                       class="promo-btn button button-primary">
		                <?php echo esc_html__('Read the Docs','atlast-agency' ); ?>
                    </a>
                </div>
                <div class="akis-col span_1_of_2">
                    <h4>
						<?php echo esc_html__( '2. Support', 'atlast-agency' ); ?>
                    </h4>
                    <p>
						<?php echo esc_html__( 'We provide awesome support through the WordPress.org forums. If you need any help just click the button below. We really respect our users.', 'atlast-agency' ); ?>
                    </p>

                    <a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/theme/atlast-agency'); ?>"
                       class="promo-btn button button-primary">
		                <?php echo esc_html__('I need support','atlast-agency' ); ?>
                    </a>
                </div>

            </div>
        </div>

        <!-- Extra info -->
        <div class="about-tab-content <?php echo ($active_tab == 'more_info' ? ' show-tab-content ':' hide-tab-content'); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Changelog', 'atlast-agency' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'Click the button below to learn more about the changelog of this theme. You can view all the changes that happen with any new update.', 'atlast-agency' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( 'https://akisthemes.com/changelog/atlast-agency-changelog/'); ?>"
                       class="promo-btn button button-primary">
		                <?php echo esc_html__('View Changelog','atlast-agency' ); ?>
                    </a>
                </div>

            </div>
        </div>
		<?php
		echo '</div>';


	}
}

add_action( 'admin_menu', 'atlast_agency_register_about_page' );

