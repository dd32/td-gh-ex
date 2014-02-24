<span class="auth"> <?php optimize_post_meta_data(); ?></span>
<span class="postcateg"><?php the_category(', '); ?></span>
<?php if ( comments_open() ) : ?><span class="comp"><?php comments_popup_link( __( 'No Comment', 'optimize' ), __( '1 Comment', 'optimize' ), __( '% Comments', 'optimize' ) ); ?></span><?php endif; ?>