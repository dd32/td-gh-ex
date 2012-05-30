<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="row">
<section class="home-content">

<section class="header">

	<?php if ( get_header_image() != '' ) : ?>
                <div class="title-blog">

 <h1><a href="<?php echo home_url( '/' ); ?>"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('description'); ?>" /></a></h1>
           </div>
<div class="clearfix"></div>
</section>
     
    <?php endif; // header image was removed ?>

    <?php if ( !get_header_image() ) : ?>
           <div class="title-blog">

<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><p class="description"><?php bloginfo('description'); ?></p>
</div>
<div class="clearfix"></div>
</section>
     
            <?php endif; // header image was removed (again) ?>
<section class="content-excerpt">
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="clear"></div>													
<header class="entry-meta">				
<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="post-info"> <?php batik_posted_on(); ?> | <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'batik' ) . '</span>', _x( '1 comment', 'comments number', 'batik' ), _x( '% comments', 'comments number', 'batik' ) ); ?></p>
</header>
<div class="ekserp">
<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
<?php the_excerpt(); ?>
</div>
</div>
<div class="clearfix"></div>
<?php endwhile; ?>
<?php batik_content_nav();?>
<?php else : ?>
<h2 class="eror"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'batik' ); ?></h2>

<?php endif; ?>
</section>
</section>

<section class="side-depan">
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