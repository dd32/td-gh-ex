<?php get_header();?>

<div id="content"><div class="inner">
<div id="cont">
    <div id="main">
		<?php if ( have_posts() ) : ?>
            
            <div class="page-header"><?php printf( __( 'Search Results for: %s', 'albar' ), '<span>' . get_search_query() . '</span>' ); ?></div>
            
            <?php while ( have_posts() ) : the_post(); ?>
                
                <?php get_template_part( 'content'); ?>
                
            <?php endwhile; ?>
            
            <?php fmi_page_nav('page-nav-below');?>
            
        <?php else : ?>
            
            <?php get_template_part( 'content', 'none' ); ?>
            
        <?php endif; ?>
    </div>

	<?php get_sidebar();?>

	<div class="clear"></div>
</div>
</div></div>

<?php get_footer();?>