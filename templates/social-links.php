<?php
if( get_theme_mod( 'conica-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'conica-social-email' ), 1 ) ) . '" title="' . __( 'Send Us an Email', 'conica' ) . '" class="social-icon social-email"><i class="fa fa-envelope-o"></i></a>';
endif;

if( get_theme_mod( 'conica-social-facebook' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-facebook' ) ) . '" target="_blank" title="' . __( 'Find Us on Facebook', 'conica' ) . '" class="social-icon social-facebook"><i class="fa fa-facebook"></i></a>';
endif;

if( get_theme_mod( 'conica-social-google-plus' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-google-plus' ) ) . '" target="_blank" title="' . __( 'Find Us on Google Plus', 'conica' ) . '" class="social-icon social-gplus"><i class="fa fa-google-plus"></i></a>';
endif;

if( get_theme_mod( 'conica-social-linkedin' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-linkedin' ) ) . '" target="_blank" title="' . __( 'Find Us on LinkedIn', 'conica' ) . '" class="social-icon social-linkedin"><i class="fa fa-linkedin"></i></a>';
endif;