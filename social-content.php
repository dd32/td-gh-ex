    <aside>
    <?php $options = get_option( 'betilu_theme_options' ); ?>
    <ul class="social-block">
    <li><img src="<?php echo get_template_directory_uri() . '/images/phone.png'; ?>" /> <span><?php _e( 'Telephone: ', 'betilu' ); ?></span><a href="tel:<?php echo $options['phonenumber']; ?>"><?php echo $options['phonenumber']; ?></a></li>
    <li><img src="<?php echo get_template_directory_uri() . '/images/facebook.png'; ?>" /> <span><?php _e( 'Facebook: ', 'betilu' ); ?></span> <a href="https://<?php echo $options['facebookurl']; ?>" target="_blank"><?php echo $options['facebookurl']; ?></a></li>
    <li><img src="<?php echo get_template_directory_uri() . '/images/twitter.png'; ?>" /> <span><?php _e( 'Twitter: ', 'betilu' ); ?></span> <a href="http://twitter.com/<?php echo $options['twitterurl']; ?>" target="_blank"><?php echo $options['twitterurl']; ?></a></li>
    <li><img src="<?php echo get_template_directory_uri() . '/images/mail.png'; ?>" /> <span><?php _e( 'E-Mail: ', 'betilu' ); ?></span> <a href="emailto:<?php echo $options['betilu_email']; ?>"><?php echo $options['betilu_email']; ?></a></li>
    </ul>
    </aside> 