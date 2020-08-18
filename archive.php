<?php get_header(); ?>

<?php get_template_part( 'menu'); ?>
 
<div id="content">

<div id="cat-description">

<!--Archive label-->

<?php $post = $posts[0]; ?>

      <?php if (is_category()) { ?>
	<h2><?php single_cat_title(); ?></h2>


      <?php } elseif( is_tag()) { ?>
	<h2><?php single_tag_title(); ?></h2>


      <?php } elseif (is_day()) { ?>
	<h2><?php the_time( get_option('date_format') ); ?></h2>


      <?php } elseif (is_month()) { ?>
	<h2><?php the_time('F, Y'); ?></h2>


      <?php } elseif (is_year()) { ?>
	<h2><?php the_time('Y'); ?></h2>


      <?php } elseif (is_author()) { ?>
	<h2><?php the_author(); ?></h2>


      <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

	<h2><?php _e('News archives:','redesign'); ?></h2>

    <?php } ?>


<?php echo category_description(); ?>
</div>


<!--post-->


        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">


		
		<div class="postmetadata"> 

			<?php the_category(' '); ?>

			<?php
			$before = '';
			$seperator = ''; // blank instead of comma
			$after = '';

			the_tags( $before, $seperator, $after );
			?>

		</div>

			<a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
		
		<div class="postmetadata2"> 

			<span class="date updated">
			<a href="<?php the_permalink(); ?>">
			<?php the_time( get_option('date_format') ); ?>
			</a>
			</span>
			
			<span class="vcard author">	
 			<span class="fn"><?php the_author_posts_link(); ?></span>
			</span>


			<?php
			if ( comments_open() ) :
  			comments_popup_link();
			endif;
			?>
			
		</div>
		
			<div class="entry">
                <?php the_content(); ?>
			</div><!--Ends entry-->

		<div class="pagenumber"><?php wp_link_pages(); ?></div>

</div><!--end post-->

	<?php endwhile; endif; ?>

<?php get_template_part( 'content', 'none' ); ?>

    	<div class="navigation"><?php posts_nav_link(); ?></div>
 
	</div><!--end content-->

<?php get_template_part( 'sidebar-post'); ?>
<?php get_footer(); ?>