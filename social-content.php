    <aside>
    <?php $options = get_option( 'betilu_theme_options' ); ?>
    <ul class="social-block">
<?php if( !empty($options['phonenumber']) ) { ?>
        <li><img src="<?php echo get_template_directory_uri() . '/images/phone.png'; ?>" /> <span><?php _e( 'Telephone: ', 'betilu' ); ?></span><a href="tel:<?php echo esc_attr( $options['phonenumber'] ); ?>"><?php echo esc_attr( $options['phonenumber'] ); ?></a></li>
<?php } ?>
<?php if( !empty($options['facebookurl']) ) { ?>
        <li><img src="<?php echo get_template_directory_uri() . '/images/facebook.png'; ?>" /> <span><?php _e( 'Facebook: ', 'betilu' ); ?></span> <a href="https://<?php echo esc_url( $options['facebookurl'] ); ?>" target="_blank"><?php echo esc_url( $options['facebookurl'] ); ?></a></li>
<?php } ?>
<?php if( !empty($options['twitterurl']) ) { ?>
        <li><img src="<?php echo get_template_directory_uri() . '/images/twitter.png'; ?>" /> <span><?php _e( 'Twitter: ', 'betilu' ); ?></span> <a href="http://twitter.com/<?php echo esc_url( $options['twitterurl'] ); ?>" target="_blank"><?php echo esc_url( $options['twitterurl'] ); ?></a></li>
<?php } ?>
<?php if( !empty($options['betilu_email']) ) { ?>
        <li><img src="<?php echo get_template_directory_uri() . '/images/mail.png'; ?>" /> <span><?php _e( 'E-Mail: ', 'betilu' ); ?></span> <a href="emailto:<?php echo esc_url( $options['betilu_email'] ); ?>"><?php echo esc_url( $options['betilu_email'] ); ?></a></li>
<?php } ?>
        <li>&nbsp;</li>
    </ul>
    </aside> 