<?php
/**
 * Page Template
 *
 *
 * @file           page.php
 * @package        Sampression Lite 
 * @author         Idealaya
 * @copyright      2012 Sampression
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/sampression/page.php
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section id="content" class="columns twelve" role="main">
  <article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="featured-img">
      <?php the_post_thumbnail( 'featured' ); ?>
    </div>
    <!-- .featured-img -->
    <?php } ?>
    <header class="post-header">
      <h2 class="post-title">
        <?php the_title(); ?>
      </h2>
       
    </header>
   
    <div class="entry">
      <?php the_content(); ?>
      
      <?php if(is_user_logged_in()){ ?>
       <div class="meta">
      	<div class="edit"><span class="ico">Edit</span> <?php edit_post_link( __( 'Edit', 'sampression' ) ); ?> </div>
       </div>
	  <?php } ?>
    </div>
  </article>
  <?php comments_template( '', true ); ?>
</section>
<!-- end content -->

<?php endwhile; endif; ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
