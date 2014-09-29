<?php
global $cx_framework_options;

if( $cx_framework_options['cx-options-url-email'] ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( $cx_framework_options['cx-options-url-email'], 1 ) ) . '" title="' . __( 'Send Us an Email', 'albar' ) . '"><i class="fa fa-envelope-o"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-skype'] ) :
    echo '<a href="skype:' . esc_html( $cx_framework_options['cx-options-url-skype'] ) . '?userinfo" title="' . __( 'Contact Us on Skype', 'albar' ) . '"><i class="fa fa-skype"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-facebook'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-facebook'] ) . '" target="_blank" title="' . __( 'Find Us on Facebook', 'albar' ) . '"><i class="fa fa-facebook"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-twitter'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-twitter'] ) . '" target="_blank" title="' . __( 'Follow Us on Twitter', 'albar' ) . '"><i class="fa fa-twitter"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-google-plus'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-google-plus'] ) . '" target="_blank" title="' . __( 'Find Us on Google Plus', 'albar' ) . '"><i class="fa fa-google-plus"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-youtube'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-youtube'] ) . '" target="_blank" title="' . __( 'View our YouTube Channel', 'albar' ) . '"><i class="fa fa-youtube"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-instagram'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-instagram'] ) . '" target="_blank" title="' . __( 'Follow Us on Instagram', 'albar' ) . '"><i class="fa fa-instagram"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-pinterest'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-pinterest'] ) . '" target="_blank" title="' . __( 'Pin Us on Pinterest', 'albar' ) . '"><i class="fa fa-pinterest"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-linkedin'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-linkedin'] ) . '" target="_blank" title="' . __( 'Find Us on LinkedIn', 'albar' ) . '"><i class="fa fa-linkedin"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-tumblr'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-tumblr'] ) . '" target="_blank" title="' . __( 'Find Us on Tumblr', 'albar' ) . '"><i class="fa fa-tumblr"></i></a>';
endif;

if( $cx_framework_options['cx-options-url-flickr'] ) :
    echo '<a href="' . esc_url( $cx_framework_options['cx-options-url-flickr'] ) . '" target="_blank" title="' . __( 'Find Us on Flickr', 'albar' ) . '"><i class="fa fa-flickr"></i></a>';
endif; ?>