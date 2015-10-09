<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit - ', 'themeofwp' ), '<small class="edit-link">', '</small>' ); ?>
        <?php if ( is_single() ) { ?>
        <h1 class="entry-title"><span class="post-format"><i class="fa fa-picture-o"></i></span> <?php the_title(); ?></h1>
        <?php } else { ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><span class="post-format"><i class="fa fa-picture-o"></i></span> <?php the_title(); ?></a></h2>
        <?php } //.entry-title ?>

        <!--/.entry-meta -->
		<div class="entry-meta">
			<span>
			<?php global $data, $shortname; if(themeofwp_option(''.$shortname.'_show_date')=='1'){ ?><i class="fa fa-clock-o"></i> <?php _e( 'on ', 'themeofwp' ); ?> <?php echo get_the_date('m'); ?>.<?php echo get_the_date('d'); ?>.<?php echo get_the_date('Y'); ?> / <?php } ?><?php if(themeofwp_option(''.$shortname.'_show_author')=='1'){ ?><i class="fa fa-user"></i> <?php _e( 'by ', 'themeofwp' ); ?> <?php the_author_link(); ?> / <?php } ?><?php if(themeofwp_option(''.$shortname.'_show_comments')=='1'){ ?><i class="fa fa-comments"></i> <?php comments_popup_link('0 comments', '1 comment', ' % comments'); ?><?php } ?></span>
			<?php if(themeofwp_option(''.$shortname.'_show_categories')=='1'){ ?><span><i class="fa fa-bookmark"></i> <?php _e( 'in ', 'themeofwp' ); ?> <?php the_category(', '); ?></span><?php } ?>
		</div>
		<!--/.entry-meta -->

    </header><!--/.entry-header -->

    <div class="entry-content">
        <?php 
        if ( is_single() || ! get_post_gallery() ) {
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themeofwp' ) );
        } else {
            echo get_post_gallery();
        } 
        ?>
    </div><!--/.entry-content -->

    <footer>
        <?php
        if ( is_single() || ! get_post_gallery() ) themeofwp_link_pages();
        ?>
    </footer>
</article><!--/#post -->

<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) { ?>
<?php get_template_part( 'author-bio' ); ?>
<?php } ?>