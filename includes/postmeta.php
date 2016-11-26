<span class="auth"> <?php echo promax_meta_date();
echo promax_meta_author();   ?></span>
<span itemprop="articleSection" class="postcateg"><?php the_category(', '); ?></span>
<?php if ( comments_open() ) : ?><span class="comp"><?php comments_popup_link( __( 'No Comment', 'promax' ), __( '1 Comment', 'promax' ), __( '% Comments', 'promax' ) ); ?></span><?php endif; ?>		