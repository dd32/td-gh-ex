<?php
/**
 * @package WordPress
 * @subpackage Garmin
 */

get_header(); ?>

<div id="center">

	<?php if ( is_home()) : ?> <?php include( TEMPLATEPATH . '/map.php' ); ?> <?php endif; ?>
	
	<?php get_sidebar(); ?>
    
    <?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    <div id="content" >
        <div id="label"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
		<?php the_content('Read the rest of this entry &raquo;'); ?>
        <?php wp_link_pages(); ?>
        <div id="clearz"><div id="tags">
        <?php if ( is_home()) : ?>
        	<?php if ('open' == $post->comment_status) : ?>
        	<?php comments_popup_link('Leave A Comment', '1 Comment', '% Comments'); ?>,
            <?php endif; ?>
        <?php endif; ?>
        	Written on <?php the_time('F jS, Y') ?> <?php if ( is_page()) : ?><?php else : ?>&amp; filed under <?php the_category(', ') ?> <?php the_tags('Tags: ', ', ', '<br />'); ?><?php endif; ?>
        </div></div>
    </div>
	<?php if ('open' == $post->comment_status) : ?>
    <?php comments_template(); ?>
    <?php endif; ?>  
    <?php endwhile; ?>
    
    
    <?php next_posts_link('<div id="content" >
        <div id="label">
        <div class="left"><< Older Entries</div>
        </div>
	</div>', 0); ?>
    
    <?php previous_posts_link('<div id="content" >
        <div id="label">
        <div class="right">Newer Entries >></div>
        </div>
	</div>', '0') ?>
    
    <?php if ( is_search()) : ?>
    <div id="content" >
        <div id="label">
        <div class="left"><?php next_posts_link('<< Older Entries', 0); ?></div>
        <div class="right"><?php previous_posts_link('Newer Entries >>', '0') ?></div>
        </div>
	</div>
    <?php endif; ?>
    
    <?php else : ?>
    <div id="content">
        <div id="label">Not Found</div>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
    </div>  
	

<?php endif; ?>

<?php get_footer(); ?>

</div>

<div id="endspacer">
</div>
    
<div id="header">
    
	<div id="title">
    	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    </div>
    	
    <div id="menu">
        <ul id="menulist">
			<?php $frontpage_id = get_option('page_on_front'); wp_list_pages('sort_column=menu_order&exclude='.$frontpage_id.'&depth=1&title_li=');?>
		</ul>
    </div>
    
    <div id="slogan">
    	<h2><?php bloginfo('description');?></h2>
    </div> 
    
</div>

</body>
</html>