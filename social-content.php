                        <aside>
                        <?php $options = get_option( 'betilu_theme_options' ); ?>
                            <ul class="social-block">
                <li><img src="<?php echo get_template_directory_uri() . '/images/phone.png'; ?>" /> <span>Telephone:</span> 
<a href="tel:<?php echo $options['phonenumber']; ?>"><?php echo $options['phonenumber']; ?></a></li>
                <li><img src="<?php echo get_template_directory_uri() . '/images/facebook.png'; ?>" /> <span>Facebook:</span> <a href="https://<?php echo $options['facebookurl']; ?>" target="_blank"><?php echo $options['facebookurl']; ?></a></li>
                <li><img src="<?php echo get_template_directory_uri() . '/images/twitter.png'; ?>" /> <span>Twitter:</span> <a href="http://twitter.com/<?php echo $options['twitterurl']; ?>" target="_blank"><?php echo $options['twitterurl']; ?></a></li>
                <li><img src="<?php echo get_template_directory_uri() . '/images/mail.png'; ?>" /> <span>E-Mail:</span> <a href="emailto:<?php echo $options['betilu_email']; ?>"><?php echo $options['betilu_email']; ?></a></li>
                </ul>
                        </aside> 