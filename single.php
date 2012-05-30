<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="row">
<section class="home-content">
<section class="content-excerpt">
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="clear"></div>													
<header class="entry-meta">
<h1 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<p class="post-info"> <?php batik_posted_on(); ?> | <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'batik' ) . '</span>', _x( '1 comment', 'comments number', 'batik' ), _x( '% comments', 'comments number', 'batik' ) ); ?></p>
</header>
<div class="ekserp">
<?php the_content(); ?>
<div class="clearfix"></div>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'batik' ) . '</span>', 'after' => '</div>' ) ); ?>
<div class="clearfix"></div>
<?php _e('Categories :', 'batik'); ?> <?php the_category(' &bull; '); ?>
<p><?php
				$tags_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
				if ( $tags_list ):
				 ?>
				<?php printf( __( '<span class="%1$s">Tagged : </span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				?>
			
			<?php endif;?></p>
<div id="nav-below" class="navigation">
<div class="meta-prev">
<?php if (!is_attachment()) {previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'batik' ) . '</span> %title' );} else {previous_image_link(array( 64, 64 ));}; ?>
</div>
<div class="meta-next">
<?php if (!is_attachment()) {next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'batik' ) . '</span>' );} else { next_image_link(array( 64, 64 ));}; ?>
</div>
</div>
<section id="authorarea">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 90 ) ); ?>
		<div class="authorinfo">
			<h3><?php the_author(); ?></h3>
			<p><?php the_author_meta( 'description' ); ?></p>
			
		</div>
	</section>
</div>
</div>
<?php comments_template('', true); ?>
<div class="clearfix"></div>
<?php endwhile; ?>

<?php else : ?>
<h2 class="eror"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'batik' ); ?></h2>

<?php endif; ?>
</section>
</section>
<section class="side-depan">
<?php echo batik_breadcrumb(); ?>
<?php get_search_form(); ?>
<div class="side-padding2">
<?php get_sidebar('icon'); ?>
<?php get_sidebar('adds'); ?>
<?php if (!dynamic_sidebar('sidebar-right') ) : ?>
<?php endif; ?>
<div class="clearfix"></div>
</div>
<div class="row scoloumn">
<div class="six">
<?php if (!dynamic_sidebar('coloumn-one') ) : ?>
<?php endif; ?>
</div>
<div class="six">
<?php if (!dynamic_sidebar('coloumn-two') ) : ?>
<?php endif; ?>
</div>
</div>
</section>
</section>                      
<?php get_sidebar(); ?>
<?php get_footer(); ?>