<div class="container">
    <div class="row">
            <!-- header part -->
            <div class="top_header clearfix">
                <ul class="details pull-left">
                    <?php if( academic_hub_top_header_address_callback() ): ?><li class="top_header_address"><i class="fa fa-map-marker"></i><a href="#"><?php echo esc_html( academic_hub_top_header_address_callback() ); ?></a></li><?php endif; ?>
                    <?php if( academic_hub_top_header_phone_callback() ): ?><li class="top_header_phone"><i class="fa fa-phone"></i><a href="#"><?php echo esc_html( academic_hub_top_header_phone_callback() ); ?></a></li><?php endif; ?>
                    <?php if( academic_hub_top_header_email_callback() ): ?><li class="top_header_email"><i class="fa fa-envelope-o"></i><a href="#"><?php echo esc_html( academic_hub_top_header_email_callback() ); ?></a></li><?php endif; ?>
                </ul>
                <ul class="icons pull-right">
                    <?php
                        /**
                         * Social Links section
                         */
                        $defaults = array(
                                        array(
                                            'academic_hub_social_icon'       => esc_html__('fa fa-facebook', 'academic-hub'),
                                            'academic_hub_social_link'       => esc_url('https://facebook.com/'),
                                        ),
                                        array(
                                            'academic_hub_social_icon'       => esc_html__('fa fa-twitter', 'academic-hub'),
                                            'academic_hub_social_link'       => esc_url('https://twitter.com/'),
                                        ),
                                        array(
                                            'academic_hub_social_icon'       => esc_html__('fa fa-instagram', 'academic-hub'),
                                            'academic_hub_social_link'       => esc_url('https://instagram.com/'),
                                        ),
                                        array(
                                            'academic_hub_social_icon'       => esc_html__('fa fa-linkedin', 'academic-hub'),
                                            'academic_hub_social_link'       => esc_url('https://linkedin.com/'),
                                        ),
                                    );
                        $academic_hub_social_links = get_theme_mod('academic_hub_social_links',$defaults);


                        /**
                         * Academic Hub social links
                         * @since 1.0.0
                         */
                        if( !empty($academic_hub_social_links) ){
                            foreach( $academic_hub_social_links as $social_links ){
                                echo ' <li><a href="'.esc_url( $social_links['academic_hub_social_link'] ).'"><i class="'.esc_attr( $social_links['academic_hub_social_icon'] ).'"></i></a></li>';
                            }
                        }
                    ?>
                    <li class="search-icon">
                        <div id="wrap">
                            <form role="search"  method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>" autocomplete="on" >
                                <input id="search" type="text"  type="search" class="form-control" placeholder="<?php echo esc_html__( 'Serch Here', 'academic-hub' ) ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
                                <input id="search_submit" value="Rechercher" type="submit"><i class="fa fa-search"></i>
                            </form>
                        </div>
                    </li>	
                </ul>
            </div>
            <!-- End header section -->
    </div>
</div>
<!-- navigation part -->