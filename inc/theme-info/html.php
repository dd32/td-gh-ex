<?php

    // Request Theme Data and build an automated Theme Page
    $semperfi_theme_info = wp_get_theme();

    // convert to sanitized simple variables
    $semperfi_name         = esc_attr( $semperfi_theme_info->get( 'Name' ) );
    $semperfi_author       = esc_attr( $semperfi_theme_info->get( 'Author' ) );
    $semperfi_description  = wp_kses_normalize_entities( $semperfi_theme_info->get( 'Description' ) );
    $semperfi_version      = esc_attr( $semperfi_theme_info->get( 'Version' ) );

    // This one is a URL
    $semperfi_URI          = esc_url( $semperfi_theme_info->get( 'ThemeURI' ) );

        
        
?>

<div class="theme-wrap clear">
    
    <div class="theme-about hentry">
    
        <div>

            <h3 class="theme-name entry-title"><?php echo $semperfi_name; ?></h3>

            <h4 class="theme-author"><?php _e( 'By' , 'semper-fi-lite' )?>
                <a href="https://wordpress.org/themes/author/<?php echo $semperfi_author; ?>/" target="_blank">
                    <span class="author"><?php echo $semperfi_author; ?></span>
                </a>
            </h4>

        </div>

        <div class="theme-info">

            <div class="screenshot">

                <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="">

            </div>
            
            <div class="upgrade-summary">
                
                <h4><?php _e( 'Support the Theme' , 'semper-fi-lite' ) ?>:</h4>
                
                <p><?php _e( 'All of the themes on <a href="https://wordpress.org/themes/" target="_blank">WordPress.org</a> are created, developed, and maintained free of charge by the author. The author of this theme, <i>' , 'semper-fi-lite' ); echo $semperfi_author; _e( '</i>, offers a premium plugin that complements ' , 'semper-fi-lite' ); echo  $semperfi_name; _e( ' with additional features to enhance the experience. This premium plugin for ' , 'semper-fi-lite' ); echo $semperfi_name; _e( ' supports the author by offsetting the many hours of work being put into the theme. For incentive to purchase the premium plugin for ' , 'semper-fi-lite' ); echo $semperfi_name; _e( ', the plugin includes additional features to customize the theme with. Additionally, ' , 'semper-fi-lite' ); echo $semperfi_author; _e( ' the author of ' , 'semper-fi-lite' ); echo $semperfi_name; _e( ', offers to write minor one off customizer options for any of the supporters. Even if the decision is made to not support the theme, ' , 'semper-fi-lite' ); echo $semperfi_author; _e( ' is still going to offer support for the free versions when issues or errors in the code are found.' , 'semper-fi-lite' ) ?></p>
                
                <a href="<?php echo $semperfi_URI; ?>" class="button button-secondary alignright"  style="margin-bottom:1em;" target="_blank"><?php _e( 'Support the Theme' , 'semper-fi-lite' ) ?></a>
                
            </div>
            
            <div class="upgrade-summary clear" >
                
                <h4><?php _e( 'Premium Options' , 'semper-fi-lite' ) ?>:</h4>
                
                <table>
                    <tr>
                        <th><?php _e( 'Upgraded Premium Plugin Features' , 'semper-fi-lite' ) ?></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><?php _e( 'The premium plugin for ' , 'semper-fi-lite' ); echo $semperfi_name; _e( ' keeps the website updated with the latest premium code. Whenever a new custom  ' , 'semper-fi-lite' ); echo $semperfi_name; _e( ' feature gets written for a supporting customer, all customers recieve custom feature.' , 'semper-fi-lite' ) ?></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td><?php _e( 'Remove unnecassary WordPress Styles to improve load times cleaner code. One of my favorite things to improving the Google Site Speed Index Score.' , 'semper-fi-lite' ) ?></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td><?php _e( 'More features are currently in developement. At the moment this theme has not been updated in 2+ years which why my main focus is just getting an updated version of the theme released. January 15th, 2020. ' , 'semper-fi-lite' ) ?></td>
                        <td>&#10004;</td>
                    </tr>
                </table>
                
                <a href="<?php echo $semperfi_URI ?>" class="button button-secondary alignright"  style="margin-bottom:3.33em;" target="_blank"><?php _e( 'Upgrade' , 'semper-fi-lite' ) ?></a>
                
            </div>
            
            <div class="theme-description entry-summary clear">
                
                <h4><?php _e( 'Description' , 'semper-fi-lite' ) ?>:</h4>
                
                <p><?php echo $semperfi_description; ?></p>
            
            </div>
            
            <div class="theme-tags">
                
                <h4><?php _e( 'Tags' , 'semper-fi-lite' ); ?>:</h4>
                
                <p>
                    <?php
                        
                        $semperfi_tags_array = $semperfi_theme_info->get( 'Tags' );
                        
                        $semperfi_number_theme_tags = count( $semperfi_tags_array ) - 1;
                                           
                        $semperfi_tag_loop_count = 0;
                        
                        foreach ( $semperfi_tags_array as $semperfi_tag ) {
                            
                            $semperfi_tag_loop_count = $semperfi_tag_loop_count + 1;
                            
                            if ( $semperfi_tag_loop_count <= $semperfi_number_theme_tags )
                            
                                echo '<a href="https://wordpress.org/themes/tags/' . esc_attr( $semperfi_tag ) . '" target="_blank">' . ucwords( str_replace( "-" , " " , esc_attr( $semperfi_tag ) ) ) . '</a>, ';
                        
                            else
                            
                                echo '<a href="https://wordpress.org/themes/tags/' . esc_attr( $semperfi_tag ) . '" target="_blank">' . ucwords( str_replace( "-" , " " , esc_attr( $semperfi_tag ) ) ) . '</a>'; } ?>
                    
                </p>
                    
            </div>

        </div>
        
        <div class="theme-head">
            
            <div class="theme-actions clear">
                
                
                <a href="http://schwarttzy.com/contact-me/" class="button button-secondary alignleft"><?php _e( 'Email' , 'semper-fi-lite' ) ?></a>
				
                <a href="<?php echo $semperfi_URI; ?>" class="button button-primary alignright" target="_blank"><?php _e( 'Upgrade' , 'semper-fi-lite' ) ?></a>
				
            </div>

            <div class="theme-meta-info">
                
                <p><?php _e( 'Version' , 'semper-fi-lite' ); ?>: <strong><?php echo $semperfi_version; ?></strong></p>
                
                <p>
                    
                    <strong>
					
				        <a href="<?php echo $semperfi_URI; ?>" target="_blank"><?php _e( 'Theme Homepage &#8594;' , 'semper-fi-lite' ); ?></a>
					
				    </strong>
                    
                </p>
                
                <p>
                    
                    <strong>
					
				        <a href="https://wordpress.org/themes/author/<?php echo $semperfi_author ?>" target="_blank"><?php _e( 'Theme Author Profile &#8594;' , 'semper-fi-lite' ); ?></a>
					
				    </strong>
                    
                </p>
            
            </div>
            
        </div>
            
            
				<div class="theme-meta">
                    
                    <div class="theme-rating">
                    
                        <h4><?php _e( 'Rate the Theme' , 'semper-fi-lite' ); ?></h4>
                        
                        <p><?php _e( 'Help improve the WordPress community by rating ' , 'semper-fi-lite' ); echo $semperfi_name; _e( '. Rating a theme helps the community out by flitering the best WordPress Themes to the top. Visit ' , 'semper-fi-lite' ); echo $semperfi_name  ; _e( "'s Reviews page and take just a couple minutes to help improve the WordPress comunity for all of us." , 'semper-fi-lite' ); ?></p>
                        
                            <a href="https://wordpress.org/support/view/theme-reviews/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name ) ); ?>#postform" class="button button-secondary" target="_blank"><?php _e( 'Add Your Review' , 'semper-fi-lite' ); ?></a>

                    </div><!-- .theme-rating -->

                    <div class="theme-support">
                        <h4><?php _e( 'Support' , 'semper-fi-lite' ); ?></h4>
                        <p><?php _e( 'Contact the author, <i>' , 'semper-fi-lite' ); echo $semperfi_author; _e( '</i>, by email for support with their theme, <i>' , 'semper-fi-lite' ); echo $semperfi_name; _e( '</i>, using this contact page.' , 'semper-fi-lite' ); ?></p>
                        <a href="http://schwarttzy.com/contact-me/" class="button button-secondary" target="_blank"><?php _e( 'Email' , 'semper-fi-lite' ); ?></a>
                        <p><?php _e( 'Got something to say? Need help? View the offical support forum for ' , 'semper-fi-lite' ); echo $semperfi_name; _e( ' on WordPress.org' , 'semper-fi-lite' ); ?></p>
                        <a href="https://wordpress.org/support/theme/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name ) ); ?>" class="button button-secondary" target="_blank"><?php _e( 'View support forum' , 'semper-fi-lite' ); ?></a>
                    </div><!-- .theme-support -->

                    <div class="theme-translations">
                        <h4><?php _e( 'Translations' , 'semper-fi-lite' ); ?></h4>
                            <a href="https://translate.wordpress.org/projects/wp-themes/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name ) ); ?>" target="_blank"><?php echo __( 'Translate ', 'semper-fi-lite' ) . $semperfi_name; ?>
                            </a>
                    </div><!-- .theme-translations -->

                    <div class="theme-devs">
                        <h4><?php _e( 'Development' , 'semper-fi-lite' ); ?></h4>
                        <h5><?php _e( 'Subscribe' , 'semper-fi-lite' ); ?></h5>
                        <ul class="unmarked-list">
                            <li>
                                <a href="//themes.trac.wordpress.org/log/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name) ) ; ?>?limit=100&amp;mode=stop_on_copy&amp;format=rss" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/theme-info/images/feedicon.png"><?php _e( 'Development Log' , 'semper-fi-lite' ); ?>
                                </a>
                            </li>
                        </ul>

                        <h5><?php _e( 'Browse the Code' , 'semper-fi-lite' ); ?></h5>
                        <ul class="unmarked-list">
                            <li><a href="//themes.trac.wordpress.org/log/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name ) ); ?>/"  target="_blank"><?php _e( ' Development Log' , 'semper-fi-lite' ); ?></a></li>
                            <li class="holy-cannoli"><a href="https://www.youtube.com/watch?v=WHix3l4trMY" target="_blank"><?php _e( 'Aeronautical Jump' , 'semper-fi-lite' ); ?></a></li>
                            <li><a href="//themes.svn.wordpress.org/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name ) ); ?>/"  target="_blank"><?php _e( 'Subversion Repository' , 'semper-fi-lite' ); ?></a></li>
                            <li><a href="//themes.trac.wordpress.org/browser/<?php echo strtolower( str_replace( ' ' , '-' , $semperfi_name ) ); ?>/" target="_blank"><?php _e( 'Browse in Trac' , 'semper-fi-lite' ); ?></a></li>
                        </ul>
                    </div><!-- .theme-devs -->

        
        </div>
        
    </div>

</div>

<?php
