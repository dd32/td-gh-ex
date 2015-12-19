
    <?php if (get_theme_mod( 'aster_home_layout' ) == 'full') {
        
    } elseif(get_theme_mod('aster_home_layout') == 'leftsidebar') { ?>
        <div class="col-md-4 col-md-pull-8">
            <div class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
        </div>
    <?php } else; {
        ?>
        <div class="col-md-4">
            <div class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
        </div>
        <?php
    }
     ?>