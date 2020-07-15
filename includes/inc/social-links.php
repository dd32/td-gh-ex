<?php
if( kaira_theme_option( 'kra-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( kaira_theme_option( 'kra-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'albar' ) . '"><i class="fas fa-envelope"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-skype' ) ) :
    echo '<a href="skype:' . esc_html( kaira_theme_option( 'kra-social-skype' ) ) . '?userinfo" title="' . esc_attr__( 'Contact Us on Skype', 'albar' ) . '"><i class="fab fa-skype"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-facebook' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'albar' ) . '"><i class="fab fa-facebook"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-twitter' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Twitter', 'albar' ) . '"><i class="fab fa-twitter"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-google-plus' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-google-plus' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Google Plus', 'albar' ) . '"><i class="fab fa-google-plus"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-youtube' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-youtube' ) ) . '" target="_blank" title="' . esc_attr__( 'View our YouTube Channel', 'albar' ) . '"><i class="fab fa-youtube"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-instagram' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-instagram' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Instagram', 'albar' ) . '"><i class="fab fa-instagram"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-pinterest' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-pinterest' ) ) . '" target="_blank" title="' . esc_attr__( 'Pin Us on Pinterest', 'albar' ) . '"><i class="fab fa-pinterest"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-linkedin' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'albar' ) . '"><i class="fab fa-linkedin"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-tumblr' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'albar' ) . '"><i class="fab fa-tumblr"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-medium' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-medium' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Medium', 'albar' ) . '"><i class="fab fa-medium"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-etsy' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-etsy' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Etsy', 'albar' ) . '"><i class="fab fa-etsy"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-yelp' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-yelp' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Yelp', 'albar' ) . '"><i class="fab fa-yelp"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-behance' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-behance' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Behance', 'albar' ) . '"><i class="fab fa-behance"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-slack' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-slack' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Slack', 'albar' ) . '"><i class="fab fa-slack"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-houzz' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-houzz' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Houzz', 'albar' ) . '"><i class="fab fa-houzz"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-vk' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VK', 'albar' ) . '"><i class="fab fa-vk"></i></a>';
endif;

if( kaira_theme_option( 'kra-social-flickr' ) ) :
    echo '<a href="' . esc_url( kaira_theme_option( 'kra-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'albar' ) . '"><i class="fab fa-flickr"></i></a>';
endif; ?>