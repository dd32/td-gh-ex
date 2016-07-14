<?php if(has_post_thumbnail()): ?>
<?php the_post_thumbnail('page-image', array( 'class'	=> "about_image")); ?>
<?php endif; ?>
<?php the_content(); ?>
