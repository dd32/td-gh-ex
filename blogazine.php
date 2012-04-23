<?php
/*
blogazine style: Blogazine Style
*/
?>
<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_content(); ?>
</div>	
<?php endwhile; ?>

<div id="nav-below" class="navigation">
<div class="aligncenter">
<?php
					$tags_list = the_tags( '', ',' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tagged :</span> %2$s', 'artblogazine' ), '', $tags_list ); ?>
					</span>
				<?php endif; ?>

</div>
<div class="meta-prev">
<?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'artblogazine' ) . '</span> %title' ); ?>
</div>
<div class="meta-next">
<?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'artblogazine' ) . '</span>' ); ?>
</div>
</div>
<div id="comm">
<div class="komentar">
<?php comments_template('', true); ?>	
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
