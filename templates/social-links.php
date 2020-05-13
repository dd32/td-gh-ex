<?php
if( get_theme_mod( 'conica-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'conica-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'conica' ) . '" class="social-icon social-email"><i class="fab fa-envelope-o"></i></a>';
endif;

if( get_theme_mod( 'conica-social-facebook' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'conica' ) . '" class="social-icon social-facebook"><i class="fab fa-facebook"></i></a>';
endif;

if( get_theme_mod( 'conica-social-twitter' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'conica' ) . '" class="social-icon social-twitter"><i class="fab fa-twitter"></i></a>';
endif;

if( get_theme_mod( 'conica-social-google-plus' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-google-plus' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Google Plus', 'conica' ) . '" class="social-icon social-gplus"><i class="fab fa-google-plus"></i></a>';
endif;

if( get_theme_mod( 'conica-social-linkedin' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'conica' ) . '" class="social-icon social-linkedin"><i class="fab fa-linkedin"></i></a>';
endif;

if( get_theme_mod( 'conica-social-behance' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-behance' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Behance', 'conica' ) . '" class="social-icon social-behance"><i class="fab fa-behance"></i></a>';
endif;

if( get_theme_mod( 'conica-social-tumblr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'conica' ) . '" class="social-icon social-tumblr"><i class="fab fa-tumblr"></i></a>';
endif;

if( get_theme_mod( 'conica-social-flickr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'conica' ) . '" class="social-icon social-flickr"><i class="fab fa-flickr"></i></a>';
endif;

if( get_theme_mod( 'conica-social-vk' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VK', 'conica' ) . '" class="social-icon social-vk"><i class="fab fa-vk"></i></a>';
endif;