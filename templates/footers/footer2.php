<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['footer_content_layout_type']; // container or container-fluid
?>
<footer class="footer2" id="footer2">
    <div class="item dark">
        <div class="<?php echo $content_layout; ?> footer-contents">
            <div class="col-lg-12">
                <div class="social row align-items-center justify-content-between">
                    <ul class="list-inline ">
                        <li class="list-inline-item">
                            <a class="footer-logo navbar-brand default-logo"
                               href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::FooterLogo(); ?></a>
                        </li>
						<?php if ( isset( $theme_mod['copyright_info_visibility'] ) && $theme_mod['copyright_info_visibility'] === 'show' ) { ?>
                            <li class="list-inline-item">
                                <div class="copyright-outer">

                                    <p class="copyright-text"><?php if ( isset( $theme_mod['copyright_info'] ) )
											echo esc_attr( $theme_mod['copyright_info'] ) ?></p>
                                </div>

                            </li>
						<?php } ?>

                    </ul>
                    <ul class="list-inline">
	                    <?php if ( isset( $theme_mod['facebook_profile_url'] ) && $theme_mod['facebook_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['facebook_profile_url'] ); ?>"><i
                                            class="fa fa-facebook"></i></a></li>
	                    <?php }
	                    if ( isset( $theme_mod['instagram_profile_url'] ) && $theme_mod['instagram_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['instagram_profile_url'] ); ?>"><i
                                            class="fa fa-instagram"></i></a></li>
	                    <?php }
	                    if ( isset( $theme_mod['googleplus_profile_url'] ) && $theme_mod['googleplus_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['googleplus_profile_url'] ); ?>"><i
                                            class="fa fa-google-plus"></i></a></li>
	                    <?php }
	                    if ( isset( $theme_mod['twitter_profile_url'] ) && $theme_mod['twitter_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['twitter_profile_url'] ); ?>"><i
                                            class="fa fa-twitter"></i></a></li>
	                    <?php }
	                    if ( isset( $theme_mod['pinterest_profile_url'] ) && $theme_mod['pinterest_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['pinterest_profile_url'] ); ?>"><i
                                            class="fa fa-pinterest"></i></a></li>
	                    <?php }
	                    if ( isset( $theme_mod['linkedin_profile_url'] ) && $theme_mod['linkedin_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['linkedin_profile_url'] ); ?>"><i
                                            class="fa fa-linkedin"></i></a></li>
	                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>