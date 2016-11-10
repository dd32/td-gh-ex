<?php
/*
	Writing Board's Front Page to Display the Home Page if Selected
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/
get_header(); ?>
			<div id="container">
            <div id="content">
            <div class="main-slider">
            <div class="flexslider">
			<ul class="slides">
			
            <?php
			$writingboard_thumb = 'writingboard-category-thumb'; 
			$writingboard_args = writingboard_ppp();
			$writingboard_query = new WP_Query( $writingboard_args );

			if ( $writingboard_query->have_posts()) : while ($writingboard_query->have_posts()) : $writingboard_query->the_post();

            if ( has_post_thumbnail() ): $writingboard_thumburl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $writingboard_thumb ); endif;
            ?>
            <li>
                   	<div class="slide-text-container">
                		<h2 class="fslidersubtitle captionDelay2 FromTop"><?php the_title(); ?></h2>
               	 		<h3 class="fslidedescription captionDelay3 FromTop"><?php  $WritingBoardExcerptLength=25; the_excerpt(); ?></h3>
                  		<a href="<?php the_permalink(); ?>" class="fslidelink captionDelay4 FromBottom" ><?php echo writingboard_get_option('slider-link-text', 'Learn More'); ?></a>
                    </div>
                    <?php if (!empty($writingboard_thumburl)): ?><img src="<?php echo $writingboard_thumburl['0']; ?>" /><?php endif; ?>
            </li>
			
			<?php endwhile; endif; wp_reset_query(); ?>
      
            </ul>
			</div></div><div class="clear"> </div>  
       
        
<?php if ( esc_textarea(writingboard_get_option('heading_text', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time') != '' )): ?>  
	<h1 id="heading"><?php echo esc_textarea(writingboard_get_option('heading_text', 'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.')); ?></h1>
<?php endif; ?>
 
<div class="clear"> </div>


<div class="fpec">
	<h3 class="fpgal-title"><?php _e('L A T E S T &nbsp; P O S T S', 'writing-board'); ?></h3>
	<?php $featured_args = array( 'post_type'=> 'post', 'ignore_sticky_posts' => 1, 'posts_per_page'  => '10' ); $featured_query = new WP_Query($featured_args); 
 	if (have_posts()) : ?>
 	<ul class="editorschoice">
  		<?php while ( $featured_query->have_posts()) :  $featured_query->the_post(); ?>
 			<li class="featuredfp"><a href="<?php the_permalink() ?>" target="_blank"><span class="edchoice"><?php the_post_thumbnail('thumbnail'); ?></span>	<span class="featuredtitle"><h3><?php the_title(); ?></h3></span></a></li>
		<?php endwhile; ?>
	</ul>
 
	<?php endif; wp_reset_postdata(); ?>
</div>
<div class="clear"> </div>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 			<div class="content-ver-sep"> </div>
 			<div class="entrytext">
 				<?php the_post_thumbnail('thumbnail');  writingboard_content(); ?>
 				<div class="clear"> </div>
 			</div>
        </div>
 
 	<?php endwhile; ?>
        <div id="page-nav">
			<div class="alignleft"><?php previous_posts_link('<span class="fa-arrow-left"></span> '.__('NEWER ENTRIES', 'writing-board') ) ?></div>
			<div class="alignright"><?php next_posts_link(__('OLDER ENTRIES', 'writing-board').' <span class="fa-arrow-right"></span>') ?></div>
		</div>
<?php endif; ?>




</div>
<?php if (writingboard_get_option('frs-check', 0 ) !='1' ): get_sidebar( 'frontpage' );  endif;?>
<?php get_footer(); ?>