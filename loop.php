<article id="post-<?php the_ID(); ?>" <?php post_class('articlebox'); ?>>
	<div class="postlistbox">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="postlistboximage">
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( array(450,3000) ); ?></a>
			</div>	
		<?php } ?>
			<header>
			<h2 class="postlisttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'richwp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
<?php if (is_sticky()) { ?><span class="icon-alert"></span> 
<?php } elseif ( has_post_format( 'audio' )) { ?>
  <span class="icon-volume"></span>
<?php } elseif ( has_post_format( 'video' )) { ?>
  <span class="icon-play-circled2"></span>
<?php } elseif  ( has_post_format( 'image' )) { ?>
  <span class="icon-picture-2"></span>
<?php } elseif ( has_post_format( 'gallery' )) { ?>
  <span class="icon-picture"></span>
<?php } elseif ( has_post_format( 'chat' )) { ?>
  <span class="icon-chat"></span>
<?php } ?>

<?php the_title(); ?></a></h2>
			<div class="entry-meta">
				<?php echo get_the_date(); ?>			
			</div><!-- .entry-meta -->	
				
			</header>	 	
		
		<div style="clear:both;"></div>
	</div>
</article>
 
 
