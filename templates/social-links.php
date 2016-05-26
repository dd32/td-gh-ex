<?php
if( get_theme_mod( 'conica-social-email', false ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'conica-social-email' ), 1 ) ) . '" title="' . __( 'Send Us an Email', 'conica' ) . '" class="header-social-icon social-email"><i class="fa fa-envelope-o"></i></a>';
endif;

if( get_theme_mod( 'conica-social-skype', false ) ) :
    echo '<a href="skype:' . esc_html( get_theme_mod( 'conica-social-skype' ) ) . '?userinfo" title="' . __( 'Contact Us on Skype', 'conica' ) . '" class="header-social-icon social-skype"><i class="fa fa-skype"></i></a>';
endif;

if( get_theme_mod( 'conica-social-facebook', false ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-facebook' ) ) . '" target="_blank" title="' . __( 'Find Us on Facebook', 'conica' ) . '" class="header-social-icon social-facebook"><i class="fa fa-facebook"></i></a>';
endif;
