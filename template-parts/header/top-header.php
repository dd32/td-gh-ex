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
                        $academic_hub_social_links = get_theme_mod('academic_hub_social_links');

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
                            
                            <?php get_search_form(); ?>
                        </div>
                    </li>	
                </ul>
            </div>
            <!-- End header section -->
    </div>
</div>
<!-- navigation part -->