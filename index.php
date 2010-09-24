<?php get_header(); ?>

<div id="center">
	
	<?php get_sidebar(); ?>
    
    <?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    <div id="content">
    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div id="label"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
		<?php the_content('Read the rest of this entry &raquo;'); ?>
        <?php wp_link_pages(); ?>
        <div id="clearz"><div id="tags">
        <?php if ( is_home()) : ?>
        	<?php if ('open' == $post->comment_status) : ?>
        	<?php comments_popup_link('Leave A Comment', '1 Comment', '% Comments'); ?>,
            <?php endif; ?>
        <?php endif; ?>
        Written on <?php the_time('F jS, Y') ?> <?php if ( is_page()) : ?><?php else : ?>, <?php the_category(', ') ?> <?php the_tags('Tags: ', ', ', '<br />'); ?><?php endif; ?>
        </div></div></div>
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

<div id="notfooter">
<p>
		<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a>, Theme <a href="http://schwarttzy.com/?page_id=551">Adventure</a> designed by <a href="http://schwarttzy.com/?page_id=225">Eric Schwarz</a>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
        <!-- Theme design by Eric Schwarz - http://schwarttzy.com/?page_id=225 -->
	</p>
</div>

</div>

<div id="endspacer">
</div>
    
<div id="bottombar">

	<div id="menuz">
        <ul id="menulist">
        <?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
        <ul id="menulist"><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
        <?php endif; ?>
		</ul>
    </div>
    
	<div id="title">
    	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    </div>
    
    <div id="slogan">
    	<h2><?php bloginfo('description');?></h2>
    </div> 
    
</div>

<?php get_footer(); ?>