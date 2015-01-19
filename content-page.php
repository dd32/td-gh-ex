<?php
/**
 * @package fmi
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<div class="entry-title"><span><?php the_title();?></span></div>

	<div class="entry-meta">
    	<span><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
        <span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php echo get_the_author(); ?>"><?php echo get_the_author(); ?></a></span>
        <?php edit_post_link( __( 'Edit', 'fmi' ), '<span class="edit-link"><i class="fa fa-edit"></i> ', '</span>' );?>
        <div class="div2">
        <?php if(!post_password_required() && (comments_open()||get_comments_number())):?>
        <span><i class="fa fa-comments"></i> <?php comments_popup_link(__('Leave a comment','fmi'), __('1 Comment','fmi'), __('% Comments','fmi'));?></span>
        <?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>

	<div class="entry-content"><div class="mscont">
		<?php the_content();?>
		
		<?php wp_link_pages( array('before' => '<div class="page-links">'.__( 'Pages:', 'fmi' ),'after'  => '</div>',));?>
	</div></div>
</div>