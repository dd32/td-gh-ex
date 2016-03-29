<?php
/**
 * Display Social Links
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('acmephoto_social_links') ) :

    function acmephoto_social_links( ) {

        global $acmephoto_customizer_all_values;
        ?>
        <ul class="socials text-center init-animate animated fadeInRight">
            <?php
            if ( !empty( $acmephoto_customizer_all_values['acmephoto-facebook-url'] ) ) { ?>
                <li class="facebook">
                    <a href="<?php echo esc_url( $acmephoto_customizer_all_values['acmephoto-facebook-url'] ); ?>" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
            <?php }
            if ( !empty( $acmephoto_customizer_all_values['acmephoto-twitter-url'] ) ) { ?>
                <li class="twitter">
                    <a href="<?php echo esc_url( $acmephoto_customizer_all_values['acmephoto-twitter-url'] ); ?>" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
            <?php }
            if ( !empty( $acmephoto_customizer_all_values['acmephoto-youtube-url'] ) ) { ?>
                <li class="youtube">
                    <a href="<?php echo esc_url( $acmephoto_customizer_all_values['acmephoto-youtube-url'] ); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                </li>
            <?php } ?>
        </ul>
        <?php
    }

endif;

add_filter( 'acmephoto_action_social_links', 'acmephoto_social_links', 10 );