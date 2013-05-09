<div class="sidebar aside">
    <?php if( 
        is_active_sidebar( 'sidebar-1' ) 
        && is_active_sidebar( 'sidebar-2' ) 
        && is_active_sidebar( 'sidebar-3' )
    )
    return; ?>
    <div class="cols">
        <?php if( ! dynamic_sidebar( 'sidebar-1' ) ) : 
            the_widget( 'WP_Widget_Meta' );
        endif; ?>
    </div>
    <div class="cols">
        <?php if( ! dynamic_sidebar( 'sidebar-2' ) ) : 
            the_widget( 'WP_Widget_Tag_Cloud' );
        endif; ?>
    </div>
    <div class="cols">
        <?php if( ! dynamic_sidebar( 'sidebar-3' ) ) : 
            the_widget( 'WP_Widget_Categories' );
        endif; ?>
    </div>
</div>