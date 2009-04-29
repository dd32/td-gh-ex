<?php /* Arclite/digitalnature */ ?>
<?php get_header(); ?>


   <div id="main-wrap1">
    <div id="main-wrap2">
     <div id="main" class="block-content">
      <div class="mask-main rightdiv">
       <div class="mask-left">
        <div class="col1">
          <div id="main-content">

   <?php if (have_posts()) : ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
     <h1 class="pagetitle"><?php printf( __('Archive for category %s', 'arclite'), single_cat_title('', false)); ?></h1>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
     <h1 class="pagetitle"><?php printf( __('Posts Tagged %s', 'arclite'), single_cat_title('', false) ); ?></h1>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
     <h1 class="pagetitle"><?php  printf(__('Archive for %s', 'arclite'), get_the_time(__('F jS, Y','arclite')));  ?></h1>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
     <h1 class="pagetitle"><?php  printf(__('Archive for %s', 'arclite'), get_the_time(__('F, Y','arclite')));  ?></h1>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
     <h1 class="pagetitle"><?php  printf(__('Archive for %s', 'arclite'), get_the_time(__('Y','arclite')));  ?></h1>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
     <h1 class="pagetitle"><?php _e('Author Archive','arclite'); ?></h1>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
     <h1 class="pagetitle"><?php _e('Blog Archives','arclite'); ?></h1>
    <?php } ?>
    <?php while (have_posts()) : the_post(); ?>
    <!-- post -->
    <?php if (function_exists("post_class")) { ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php } else { ?>
    <div class="post" id="post-<?php the_ID(); ?>">
    <?php } ?>



     <div class="post-header">
              <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:','arclite'); echo ' '; the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
              <p class="post-date">
               <span class="month"><?php the_time(__('M','arclite')); ?></span>
               <span class="day"><?php the_time(__('j','arclite')); ?></span>
              </p>
              <p class="post-author">
               <span><?php printf(__('Posted by %s in %s','arclite'),'<a href="'. get_author_posts_url(get_the_author_ID()) .'" title="'. sprintf(__("Posts by %s","arclite"), attribute_escape(get_the_author())).' ">'. get_the_author() .'</a>',get_the_category_list(', ')); ?> <?php edit_post_link(''); ?></span>
              </p>
             </div>
             <div class="post-content clearfix">
               <?php the_content(__('Read the rest of this entry &raquo;', 'arclite')); ?>

                <?php
         $posttags = get_the_tags();
         if ($posttags) { ?>
          <p class="tags"><?php the_tags(_('Tags: ','arclite')); ?></p>
        <?php } ?>

             </div>
             <div class="post-links">
              <?php
           global $id, $comment;
           $number = get_comments_number( $id );
          ?>
          <a class="<?php if($number<1) { echo 'no '; }?>comments" href="<?php comments_link(); ?>"><?php comments_number(__('No Comments','arclite'), __('1 Comment','arclite'), __('% Comments','arclite')); ?></a>
             </div>


    </div>
    <!-- /post -->

 
    <?php endwhile; ?>

    <div class="navigation" id="pagenavi">
     <?php if(function_exists('wp_pagenavi')) : ?>
      <?php wp_pagenavi() ?>
    <?php else : ?>
      <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','arclite')) ?></div>
      <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','arclite')) ?></div>
      <div class="clear"></div>
    <?php endif; ?>
    </div>
   <?php else :
    if ( is_category() ) { // If this is a category archive
        ?> <h2> <?php printf(__("Sorry, but there aren't any posts in the %s category yet.", "arclite"),single_cat_title('',false)); ?> </h2> <?php
    } else if ( is_date() ) { // If this is a date archive
    	?> <h2> <?php _e("Sorry, but there aren't any posts with this date."); ?> </h2> <?php
    } else if ( is_author() ) { // If this is a category archive
    	$userdata = get_userdatabylogin(get_query_var('author_name'));
    	?> <h2> <?php printf(__("Sorry, but there aren't any posts by %s yet.", "arclite"),$userdata->display_name); ?> </h2> <?php
    } else {
    	?> <h2> <?php _e('No posts found.'); ?> </h2> <?php
    }
    get_search_form();

    endif;
?>

       </div>

         </div>

<?php get_sidebar(); ?>

  </div>
      </div>
      <div class="clear-content"></div>
     </div>


    </div>
   </div>

  </div>

<?php get_footer(); ?>