<?php
/**
 * The main template file.
 *
 */
?>
<?php get_header(); ?>

<div id="content"><div class="inner">
<div id="cont">
    <div id="main">
		<?php if(have_posts()):?>
			<?php while(have_posts()):the_post(); ?>
            
                <?php get_template_part('content'); ?>
                
            <?php endwhile; ?>
            
            <?php
if(function_exists('wp_pagenavi')) {
	wp_pagenavi();
}else{
			if(function_exists('the_posts_pagination')){
				the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-arrow-left"></i>',
					'next_text'          => '<i class="fa fa-arrow-right"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fmi' ) . ' </span>',
				) );
			}else{
			?>
				<div id="page-nav-below">
					<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><i class="fa fa-arrow-left"></i> <?php next_posts_link( __( 'Older posts', 'fmi' ) ); ?></div>
					<?php endif; ?>

					<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'fmi' ) ); ?> <i class="fa fa-arrow-right"></i></div>
					<?php endif; ?>
				</div>
			<?php
			}
}
			?>
            
        <?php else:?>
            <?php get_template_part('content','none');?>
        <?php endif;?>
    </div>
    
    <?php get_sidebar();?>
    
	<div class="clear"></div>
</div>
</div></div>

<?php get_footer();?>