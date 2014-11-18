<article id="post-<?php the_ID(); ?>" <?php post_class('articlebox'); ?>>
	<div class="postlistbox postlistboxnotitle postlistboxquote">			
		<?php the_content(); ?>	
	<div style="clear:both;"></div>
	<span class="icon-comment-alt"> </span> <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'richwp' ), __( 'One Comment', 'richwp' ), __( '% Comments', 'richwp' ) ); ?></span>
	</div>
</article>