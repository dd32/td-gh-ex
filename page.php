<?php get_header() ?>    
		<div id="main">
			<div id="maincontent">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div>
    			<h1 class="post"><?php the_title(); ?></h1>
    			<?php the_content(); ?>
       </div>
    <?php endwhile; ?>
    
    <?php else : ?>
    	<h1>Not Found</h1>
    	<p>Sorry, but you are looking for something that isn't here.</p>
    	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
    	<div class="postmeta"></div>
    <?php endif; ?>
    </div>
      
	<?php get_sidebar() ?>
    <div class="clearboth"></div>
    </div>
<?php get_footer() ?>