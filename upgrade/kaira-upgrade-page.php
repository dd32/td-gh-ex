<div class="wrap kaira-upgrade-page-wrap">
    <?php
    $kaira_link = 'http://www.kairaweb.com';
    $premium_link = 'http://sllwi.re/p/K3'; ?>
    
    <h2 id="theme-settings-title">
        <a href="<?php echo $kaira_link; ?>" target="_blank"></a>
    </h2>
    
    <div class="kaira-page-description">
        <?php _e( '<a href="http://www.kairaweb.com/" target="_blank">Visit our website</a> to view our other Themes and Plugins', 'topshop' ); ?>
    </div>
    
    <table class="form-table">
        <tr>
            <th scope="row">
                <?php _e( 'Site Layout', 'topshop' ); ?>
            </th>
            <td>
                <a href="<?php echo $premium_link; ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/site-layout-full-width.jpg'; ?>" alt="" class="kaira-page-img" /><br />
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/site-layout-boxed.jpg'; ?>" alt="" class="kaira-page-img" />
                </a>
                <p class="description"><?php _e( '<a href="http://sllwi.re/p/K3" target="_blank">Upgrade to premium</a> to enable the option to select between the website being full width or boxed layout.', 'topshop' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?php _e( 'Header Layout', 'topshop' ); ?>
            </th>
            <td>
                <a href="<?php echo $premium_link; ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/site-header-standard.jpg'; ?>" alt="" class="kaira-page-img" /><br />
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/site-header-centered.jpg'; ?>" alt="" class="kaira-page-img" />
                </a>
                <p class="description"><?php _e( 'Enable the option to select between two different header layouts, standard or centered layout.', 'topshop' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?php _e( 'Blog Posts Layout', 'topshop' ); ?>
            </th>
            <td>
                <a href="<?php echo $premium_link; ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/blog-layout-side.jpg'; ?>" alt="" class="kaira-page-img" /><br />
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/blog-layout-top.jpg'; ?>" alt="" class="kaira-page-img" />
                </a>
                <p class="description"><?php _e( 'Enable the option to select between two different blog layouts, side layout or top layout.', 'topshop' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?php _e( 'Social Links', 'topshop' ); ?>
            </th>
            <td>
                <a href="<?php echo $premium_link; ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/social-icons.jpg'; ?>" alt="" class="kaira-page-img" />
                </a>
                <p class="description"><?php _e( 'Enable social links on the theme to link to all your social profiles.', 'topshop' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?php _e( 'Website copy text', 'topshop' ); ?>
            </th>
            <td>
                <a href="<?php echo $premium_link; ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() . '/upgrade/images/site-copy-text.jpg'; ?>" alt="" class="kaira-page-img" />
                </a>
                <p class="description"><?php _e( 'Change the website copy to link out to your own website.', 'topshop' ); ?></p>
            </td>
        </tr>
    </table>
    
</div>