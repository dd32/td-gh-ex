<?php
/**
 * The template for displaying Archive pages.
 *
 */
get_header(); ?>

<div id="content"><div class="inner">
<div id="cont">
    <div id="main">
<?php 
if(have_posts()):
?>
        <div class="page-header">
<?php
// If this is a category archive
if (is_category()) {
	printf( __('Archive for the &#8216;<span>%1$s</span>&#8217; Category', 'fmi'), single_cat_title('', false) );
// If this is a tag archive
} elseif (is_tag()) {
	printf( __('Posts Tagged &#8216;<span>%1$s</span>&#8217;', 'fmi'), single_tag_title('', false) );
// If this is a daily archive
} elseif (is_day()) {
	printf( __('Archive for <span>%1$s</span>', 'fmi'), get_the_time(__('F jS, Y', 'fmi')) );
// If this is a monthly archive
} elseif (is_month()) {
	printf( __('Archive for <span>%1$s</span>', 'fmi'), get_the_time(__('F, Y', 'fmi')) );
// If this is a yearly archive
} elseif (is_year()) {
	printf( __('Archive for <span>%1$s</span>', 'fmi'), get_the_time(__('Y', 'fmi')) );
// If this is an author archive
} elseif (is_author()) {
	echo __('Author Archive', 'fmi');
// If this is a paged archive
} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
	echo __('Blog Archives', 'fmi');
}
?>
        </div>
	<?php while(have_posts()):the_post(); ?>
    
		<?php get_template_part('content',get_post_format());?>
        
	<?php endwhile;?>
	
            <?php
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