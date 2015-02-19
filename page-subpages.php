<?php /* Template Name: Subpage List */ ?>	
<?php get_header(); ?>
<div id="wrapper">

	<div id="contentcontainer" class="container_16 containermargin">
		
		<div id="postlistcontainer" class=""  >
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				<header id="author-box" class="postlistbox box archiveheader">
					<div class="author-box">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<span class="entry-meta"><?php the_content(); ?></span>
						<div style="clear:both"></div>
					</div><!-- #author-description	-->
				</header><!-- .entry-author-info -->
		<?php endwhile; endif; ?>
							
		 	<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("post_type=page&post_parent=".$post->ID."&paged=$page&orderby=menu_order&order=ASC");
if ( have_posts() ) : while ( have_posts() ) : the_post() ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('articlebox'); ?>>
						<div class="postlistbox">
							<?php if ( has_post_thumbnail() ) { ?>
							<div class="postlistboximage">
								<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( array(450,3000), array(title => get_the_title() ) ); ?></a>
							</div>	
		<?php } ?>
							<header>
								<h1 class="postlisttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'minimum-minimal' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
									
				
							</header>	 	
		
							<div style="clear:both;"></div>
							</div>
					</article>

			<?php endwhile; else : ?>
			
			<article class="postlistbox box boxes box-standard">
				<header>
					<h1 class="entry-title"><?php _e( 'Sorry, no Subpages have been found!', 'minimum-minimal' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Set up some subpages by assigning this page as the parent.', 'minimum-minimal' ); ?></p>	
					<div style="clear:both;"></div>
				</div><!-- .entry-content -->
			</article>			
			<?php endif;?>
						
		</div><!-- #content -->
		
		
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div id="nav-below" class="meta-nav navigation navigationboxes grid_16">
		<div class="next-previous_posts_nav next-previous_nav_previous">
			<div id="page_nav" class="nav-previous"><?php next_posts_link( __( '&laquo; Older Posts', 'minimum-minimal' ) ); ?></div>
		</div>
		<div class="next-previous_posts_nav next-previous_nav_next">
			<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts &raquo;', 'minimum-minimal' ) ); ?></div>
		</div>
		<div style="clear:both"></div>
		</div><!-- #nav-below -->
	<?php endif; ?>
		
	</div><!-- #contentcontainer -->
</div><!-- #wrapper -->
<?php get_footer(); ?>