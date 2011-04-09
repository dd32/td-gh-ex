<?php get_header(); ?>

<div id="center">
	
<?php get_sidebar(); ?>
    
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="content">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="imagez">
<?php if ( has_post_thumbnail()) : ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('page-thumbnail'); ?></a><?php endif; ?>
<div class="label"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if ( get_the_title() ) { the_title();} else { echo '(No Title)';} ?></a></div></div>
<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php wp_link_pages(); ?>
<div class="clearz"><div class="tags">
<?php if ( is_home()) : ?>
<?php if ('open' == $post->comment_status) : ?>
<?php comments_popup_link('Leave A Comment', '1 Comment', '% Comments'); ?>,
<?php endif; ?>
<?php endif; ?>
Written on <?php the_time('F jS, Y') ?> <?php if ( is_page()) : ?><?php else : ?>, <?php the_category(', ') ?> <?php the_tags('Tags: ', ', ', '<br />'); ?><?php endif; ?>
</div></div></div></div>
<?php if ('open' == $post->comment_status) : ?>
<?php comments_template(); ?>
<?php endif; ?>  
<?php endwhile; ?>

<?php $max_page = $wp_query->max_num_pages; ?>
<?php if ( $max_page >=  2 ) : ?>
<div class="content" >
<div class="label"><div class="left"><?php next_posts_link('&lt;&lt; Older Entries', 0); ?></div></div>    
<div class="label"><div class="right"><?php previous_posts_link('Newer Entries &gt;&gt;', '0') ?></div></div>
</div>
<?php endif; ?>
    
<?php else : ?>
<div class="content">
<div class="label">Not Found</div>
<p>Sorry, but you are looking for something that isn't here.</p>
<?php get_search_form(); ?>
</div>  
	

<?php endif; ?>

<div id="notfooter">
<p>
<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> and the Theme <a href="http://schwarttzy.com/web-design/backpacking-wordpress-theme-1-0">Adventure by Eric Schwarz</a>
<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
<!-- Theme design by Eric Schwarz - http://schwarttzy.com/?page_id=225 -->
</p>
</div>

</div>

<div id="endspacer">
</div>
    
<div id="bottombar">

	<div id="title"><h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1></div>
    
	<div id="menu">
        <?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
    	<ul><?php wp_list_pages( 'title_li=&depth=0' ); ?></ul>
        <?php endif; ?>
    </div>
    
    <div id="slogan"><h2><?php bloginfo('description');?></h2></div>   
    
</div>

<?php get_footer(); ?>