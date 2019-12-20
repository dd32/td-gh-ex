<?php

// Add some CSS so I can Style the Theme Options Page
function semperfi_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('semperfi-theme-options', get_template_directory_uri() . '/inc/theme-option-page/style.css', false, '1.0');}

add_action('admin_print_styles-appearance_page_theme_options', 'semperfi_admin_enqueue_scripts');

// Create the Theme Information page (Theme Options)
function semperfi_theme_options_do_page() { ?>

<div class="theme-wrap clear">
    
    <div class="theme-about hentry">
    
        <div>

            <h3 class="theme-name entry-title"><?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' ); ?></h3>

            <h4 class="theme-author">By 
                <a href="https://wordpress.org/themes/author/<?php echo $my_theme->get('Author'); ?>/" target="_blank">
                    <span class="author"><?php echo $my_theme->get('Author'); ?></span>
                </a>
            </h4>

        </div>

        <div class="theme-info">

            <div class="screenshot">

                <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="">

            </div>
            
            <div class="upgrade-summary">
                
                <h4>Upgrade:</h4>
                
                <p>All of the theme's on <a href="https://wordpress.org/themes/" target="_blank">WordPress.org</a> are created, developed, and maintained free of charge by the author. The author of this theme, <i><?php echo $my_theme->get( 'Author' ); ?></i>, offers a premium version that includes additional features to enhance your experience. This premium version of <?php echo $my_theme->get( 'Name' ); ?> supports the author by offsetting the many hours of work being put into the theme. For incentive, the premium version of <?php echo $my_theme->get( 'Name' ); ?> includes additional features to customize the theme with. Many of these options, list of these options are just below, are not available in the free version. Additionally, the author has offered to make minor custom changes to the <?php echo $my_theme->get( 'Name' ); ?> code for further customization. However, the author is still going to support the free versions when issues of bugs or errors in the code are found.</p>
                
                <a href="<?php echo $my_theme->get('ThemeURI'); ?>" class="button button-secondary alignright"  style="margin-bottom:1em;" target="_blank">Upgrade</a>
                
            </div>
            
            <div class="upgrade-summary clear" style="display:none;">
                
                <h4>Premium Options:</h4>
                
                <table>
                    <tr>
                        <th>Upgraded Premium Features</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Double every numerical choice for every Customizer option.</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Change <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements" target="_blank">Header</a> to any <a href="https://www.google.com/fonts" target="_blank">Google Font</a></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Change <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p" target="_blank">Body</a> to any <a href="https://www.google.com/fonts" target="_blank">Google Font</a></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Increase slider maxium count to 10</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Replace the content background with uploaded image.</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Control <?php echo $my_theme->get( 'Name' ); ?>'s main color through out the website.</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Support with minor changes to <?php echo $my_theme->get( 'Name' ); ?>'s code.</td>
                        <td>&#10004;</td>
                    </tr>
                </table>
                
                <a href="<?php echo $my_theme->get('ThemeURI'); ?>" class="button button-secondary alignright"  style="margin-bottom:3.33em;" target="_blank">Upgrade</a>
                
            </div>
            
            <div class="theme-description entry-summary clear">
                
                <h4>Description:</h4>
                
                <p><?php echo $my_theme->get('Description'); ?></p>
            
            </div>
            
            <div class="theme-tags">
                
                <h4>Tags:</h4>
                
                <p>
                    <?php
                        
                        $tags_array = $my_theme->get('Tags');
                        
                        $result = count($tags_array) - 1;
                                           
                        $count = 0;
                        
                        foreach ($tags_array as $tag) {
                            
                            $count = $count + 1;
                            
                            if ($count <= $result)
                            
                                echo '<a href="https://wordpress.org/themes/tags/' . $tag . '" target="_blank">' . ucwords(str_replace("-", " ", $tag)) . '</a>, ';
                        
                            else
                            
                                echo '<a href="https://wordpress.org/themes/tags/' . $tag . '" target="_blank">' . ucwords(str_replace("-", " ", $tag)) . '</a>';} ?>
                    
                </p>
                    
            </div>

        </div>
        
        <div class="theme-head">
            
            <div class="theme-actions clear">
                
                
                <a href="http://schwarttzy.com/contact-me/" class="button button-secondary alignleft">Email</a>
				
                <a href="<?php echo $my_theme->get('ThemeURI'); ?>" class="button button-primary alignright" target="_blank">Upgrade</a>
				
            </div>

            <div class="theme-meta-info">
                
                <p>Version: <strong><?php echo $my_theme->get('Version');  ?></strong></p>
                
                <p>
                    
                    <strong>
					
				        <a href="<?php echo $my_theme->get('ThemeURI'); ?>" target="_blank">Theme Homepage &#8594;</a>
					
				    </strong>
                    
                </p>
            
            </div>
            
        </div>
            
            
				<div class="theme-meta">
                    
                    <div class="theme-rating">
                    
                        <h4>Rate the Theme</h4>
                        
                        <p>Help improve the WordPress community by rating <?php echo $my_theme->get('Name'); ?>. Rating a theme helps the community out by flitering the best WordPress Themes to the top. Visit <?php echo $my_theme->get('Name'); ?>'s Reviews page and take just a couple minutes to help improve the WordPress comunity for all of us.</p>
                        
                            <a href="https://wordpress.org/support/view/theme-reviews/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>#postform" class="button button-secondary" target="_blank">Add Your Review</a>

                    </div><!-- .theme-rating -->

                    <div class="theme-support">
                        <h4>Support</h4>
                        <p>Contact the author, <i><?php echo $my_theme->get('Author');  ?></i>, by email for support with their theme, <i><?php echo $my_theme->get( 'Name' ); ?></i>, using this contact page.</p>
                        <a href="http://schwarttzy.com/contact-me/" class="button button-secondary" target="_blank">Email</a>
                        <p>Got something to say? Need help? View the offical support forum for <?php echo $my_theme->get( 'Name' ); ?> on WordPress.org</p>
                        <a href="https://wordpress.org/support/theme/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>" class="button button-secondary" target="_blank">View support forum</a>
                    </div><!-- .theme-support -->

                    <div class="theme-translations">
                        <h4>Translations</h4>
                            <a href="https://translate.wordpress.org/projects/wp-themes/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>" target="_blank">
                                Translate <?php echo $my_theme->get( 'Name' ); ?>
                            </a>
                    </div><!-- .theme-translations -->

                    <div class="theme-devs">
                        <h4>Development</h4>
                        <h5>Subscribe</h5>
                        <ul class="unmarked-list">
                            <li>
                                <a href="//themes.trac.wordpress.org/log/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>?limit=100&amp;mode=stop_on_copy&amp;format=rss" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/feedicon.png">
                                    Development Log
                                </a>
                            </li>
                        </ul>

                        <h5>Browse the Code</h5>
                        <ul class="unmarked-list">
                            <li><a href="//themes.trac.wordpress.org/log/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>/"  target="_blank">Development Log</a></li>
                            <li class="holy-cannoli"><a href="https://www.youtube.com/watch?v=WeTIa69NbVk" target="_blank">Aeronautical Jump</a><div class="chris-farley"></div></li>
                            <li><a href="//themes.svn.wordpress.org/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>/"  target="_blank">Subversion Repository</a></li>
                            <li><a href="//themes.trac.wordpress.org/browser/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>/" target="_blank">Browse in Trac</a></li>
                        </ul>
                    </div><!-- .theme-devs -->

        
        </div>
        
    </div>

</div>

<?php }
add_action('admin_menu', 'semperfi_theme_options_add_page'); ?>