 <section class="page_topline section_padding_0 table_section table_section_md hidden-xs hidden-sm">
                    <div class="container">
                        <div class="row">
                            <div class="info col-md-9 ">
                                <i class="fa fa-envelope highlight fontsize_24"><span><?php echo esc_html( get_theme_mod( 'topline_section_email', __( 'info@yoursite.com', 'atlas-concern' ) )); ?></span></i>
                            </div>
                            <div class="col-md-3 text-right">
                                <div class="page_social_icons">
                                    <?php if( get_theme_mod( 'topline_section_facebook_url' ) ) : ?>
                                        <a title="Facebook" class="fa fa-facebook" href="<?php echo esc_url( get_theme_mod( 'topline_section_facebook_url', __( '#', 'atlas-concern' ) )); ?>">&nbsp;</a>
                                    <?php endif; ?>
                                    <?php if( get_theme_mod( 'topline_section_twitter_url' ) ) : ?>
                                        <a title="Twitter" class="fa fa-twitter" href="<?php echo esc_url( get_theme_mod( 'topline_section_twitter_url', __( '#', 'atlas-concern' ) )); ?>">&nbsp;</a>
                                    <?php endif; ?>
                                    <?php if( get_theme_mod( 'topline_section_linkedin_url' ) ) : ?>
                                        <a title="LinkedIn" class="fa fa-linkedin" href="<?php echo esc_url( get_theme_mod( 'topline_section_linkedin_url', __( '#', 'atlas-concern' ) )); ?>">&nbsp;</a>
                                    <?php endif; ?>
                                    <?php if( get_theme_mod( 'topline_section_dribbble_url' ) ) : ?>
                                        <a title="Dribble" class="fa fa-dribbble" href="<?php echo esc_url( get_theme_mod( 'topline_section_dribbble_url', __( '#', 'atlas-concern' ) )); ?>">&nbsp;</a>
                                    <?php endif; ?>
                                    <?php if( get_theme_mod( 'topline_section_google_url' ) ) : ?>
                                        <a title="Google" class="fa fa-google" href="<?php echo esc_url( get_theme_mod( 'topline_section_google_url', __( '#', 'atlas-concern' ) )); ?>">&nbsp;</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="page_toplogo columns_padding_0 table_section section_padding_top_30 section_padding_bottom_30 columns_margin_bottom_20 columns_margin_top_0">
                    <div class="container">
                        <div class="row">
                            <div class="brand col-md-6">
									<div class="site-branding">
			                               <?php
			                               the_custom_logo();
			                               if ( is_front_page() && is_home() ) :
				                            ?>
				                           <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				                           <?php
			                                else :
				                            ?>
				                           <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				                           <?php
			                                endif;
			                                $atlas_concern_description = get_bloginfo( 'description', 'display' );
			                                if ( $atlas_concern_description || is_customize_preview() ) :
				                             ?>
				                           <p class="site-description"><?php echo esc_html($atlas_concern_description); /* WPCS: xss ok. */ ?></p>
			                                <?php endif; ?>
		                             </div><!-- .site-branding -->
                             </div>
                            <div class="text-center text-md-right columns_padding_25 col-lg-6 col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="bottommargin_0 hidden-xs col-md-6">
                                        <div class="media teaser inline-block text-left">
                                            <div class="media-left media-middle">
                                                <div class="size_small border_icon round">
                                                    <i class="fa highlight fa-mobile-phone"></i>
                                                </div>
                                            </div>
                                            <div class="media-body media-middle">
                                                <h5 class="extrabold"><?php esc_html_e( 'Call Us', 'atlas-concern' ); ?></h5>
                                                <p><?php echo esc_html( get_theme_mod( 'topline_section_phone', __( '', 'atlas-concern' ) )); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden-xs col-md-6">
                                        <div class="media teaser inline-block text-left">
                                            <div class="media-left media-middle">
                                                <div class="size_small border_icon round">
                                                    <i class="fa highlight fa-map"></i>
                                                </div>
                                            </div>
                                            <div class="media-body media-middle">
                                                <h5 class="extrabold"><?php esc_html_e( 'Address', 'atlas-concern' ); ?></h5>
                                                <p><?php echo wp_kses_post( get_theme_mod( 'topline_section_address', '' )); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                             
                        </div>
                    </div>
                </section>