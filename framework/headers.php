<?php if( get_theme_mod('agama_sticky_header', false) ): // Sticky header ?>

	<?php get_template_part( 'framework/headers/header-sticky' ); ?>

<?php else: // Default header ?>

	<?php get_template_part( 'framework/headers/header-default' ); ?>

<?php endif; ?>