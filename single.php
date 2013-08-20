<?php get_header(); ?>

<!-- start content -->

<div class="container">
	<div class="row">
       
    <div <?php post_class(array('pin-article', wip_template('span') , wip_template('sidebar'))); ?> >
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
		<?php get_template_part( 'post-formats/standard' ); ?>
	        
        <div style="clear:both"></div>
        
    </div>

	<?php if ( ( is_active_sidebar(wip_postmeta('wip_sidebar')) ) && ( wip_template('span') == "span8" ) ) : ?>
        
        <section id="sidebar" class="pin-article span4">
            <div class="sidebar-box">
            	<?php dynamic_sidebar(wip_postmeta('wip_sidebar')) ?>
            </div>
        </section>
    
	<?php endif; ?>

	<?php endwhile; get_template_part('pagination'); endif;?>
           
    </div>
</div>

<?php get_footer(); ?>