<div class="content">

<?php if ( have_posts() ) : ?>

<?php 
  if (is_search())
  {
    echo '<h1 style="font-style:oblique">';
    printf( __( 'Search Results for: %s', 'adsticle' ), '<span>' . get_search_query() . '</span>' );
	echo '</h1>';
  };
  
  if (is_tag())
  {
    echo '<h1 style="font-style:oblique">';
    printf( __( 'Tag Archives: %s', 'adsticle' ), '<span>' . single_tag_title( '', false ) . '</span>' );
	echo '</h1>';
  };  
?>

<?php while ( have_posts() ) : the_post(); ?>
		
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
  <!-- <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1> -->
  
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'adsticle' ), 
    the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	<?php if (trim(get_the_title()) != '') { the_title(); } else { echo '&nbsp;'; }; ?></a></h1>
  
  <div class="meta">  
  <?php _e('By', 'adsticle'); ?>: <?php the_author_link(); ?> | 
  <?php _e('Date', 'adsticle'); ?>: <?php the_date(); ?> 
  <?php if (!is_page()): ?>
  | <?php _e('Categories', 'adsticle'); ?>: <?php the_category(', '); ?>    
  <?php endif; ?>
  </div>
  

  <div class="post_content">
  <?php 
    if (!is_single() && !is_page()):   
      the_excerpt();
    else:
	  the_content();
    endif; 
  ?>
  </div>  

  <?php if (!is_single() && !is_page()): ?>
  <div class="readmore">
  <a href="<?php the_permalink() ?>#more" class="more-link"><?php _e('Read more', 'adsticle'); ?></a>
  </div>
  <div class="addcomment">
  <?php comments_popup_link( __( 'Leave a comment', 'adsticle' ), __( '1 Comment', 'adsticle' ), __( '% Comments', 'adsticle' ) ); ?>
  </div>  
  <?php else: ?>
  <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'adsticle' ), 'after' => '</div>' ) ); ?>  
  <?php endif; ?>

  <?php if (get_the_tag_list()) : ?>				   
  <div class="tags">
  <?php _e('Tags', 'adsticle'); ?>: <?php echo get_the_tag_list('',', ',''); ?>
  </div>  
  <?php endif; ?>
  
  </div>    
	
  <div class="clear"></div>		  
  
<?php endwhile; ?>	

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <div id="nav-below" class="navigation">
    <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'adsticle' ) ); ?>
	&nbsp;&nbsp;&nbsp;
    <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'adsticle' ) ); ?>
  </div>
<?php endif; ?>

<?php comments_template( '', true ); ?>

<?php else: ?>

<?php if (is_search()): ?>
    <div class="post" style="padding-top:50px"><div class="post_content">
    <?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'adsticle' ); ?>
	</div></div>
<?php endif; ?>

<?php endif; ?>

</div>