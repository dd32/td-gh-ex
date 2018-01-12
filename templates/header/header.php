<?php if ( get_theme_mod( 'conica-set-header-layout' ) == 'conica-header-layout-two' ) : ?>
    
    <?php get_template_part( '/templates/header/header-two' ); ?>
    
<?php elseif ( get_theme_mod( 'conica-set-header-layout' ) == 'conica-header-layout-three' ) : ?>
    
    <?php get_template_part( '/templates/header/header-three' ); ?>
    
<?php elseif ( get_theme_mod( 'conica-set-header-layout' ) == 'conica-header-layout-four' ) : ?>
    
    <?php get_template_part( '/templates/header/header-four' ); ?>
    
<?php else : ?>
    
    <?php get_template_part( '/templates/header/header-one' ); ?>
    
<?php endif; ?>
