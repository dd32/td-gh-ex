<?php get_header(); ?>

    <div id="content" class="row">
	    <div id="main" class="col-xs-12 col-sm-6 col-md-7 col-lg-7" role="main">

	   <header>

		  <div class="entry-meta">
            <h2><?php echo get_the_author_meta( 'first_name' ); ?>
                <span class="sepspace"> </span>
                <?php echo nl2br( get_the_author_meta( 'last_name' ) ); ?></h2>
			<p class="theauthor">
            <?php echo get_avatar( get_the_author_meta( 'email' ), 42); ?>
            <span class="sepspace"> </span>
            <?php echo nl2br( get_the_author_meta( 'nicename' ) ); ?></p><br>
                <blockquote><?php the_author_meta('description'); ?></blockquote>
                <h3><em><?php _e( 'Recent Articles ', 'appeal' ); ?></em></h3>
            <hr>
        </header>

        <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-lines' ); ?>>
            <h3 class="entry-title">
             <a class="text-dark"
                href="<?php the_permalink(); ?>"
                title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<?php
global $more;
$more = 0;
?>
		    <section class="post_content">
            <?php
            // only showing excerpts on author page
            appeal_theme_excerpt_length( '48' );
            ?>
                    <nav class="pagination"><?php // more tag display
                    wp_link_pages();
                    ?></nav>

            </section><div class="clearfix"></div>
                <footer class="meta-footer">

                    <?php get_template_part('part', 'metadata' ); ?>

                </footer>

        </article>
		<?php endwhile; ?>
                <aside class="author-aside block">

                    <h4><?php echo get_the_author_meta( 'first_name' ); ?>
                <span class="sepspace"> </span>
                <?php echo nl2br( get_the_author_meta( 'last_name' ) ); ?></h4>
                    <ul class="list-group">
                    <li class="list-group-item"><?php _e( 'Author Website ', 'appeal' );
                                                      the_author_link(); ?></li>
                    <li class="list-group-item"><?php the_author_meta('description'); ?></li>
                    <li class="list-group-item"><?php _e( 'Archives for ', 'appeal' );
                                                      the_author_posts_link(); ?></li>
                    <li class="list-group-item"><b><?php the_author_posts(); ?></b>
                    <?php _e( 'Articles by ', 'appeal' ); ?> <?php the_author(); ?></li>
                    </ul>
                    <div class="author-footer">
                        <nav class="modal-nav">
                        <?php if ( has_nav_menu( 'author_modal' ) ) {
                                    wp_nav_menu( array(
                                'menu'               => 'author_modal',
                                'theme_location'    => 'author_modal',
                                'container'        => 'ul',
                                'container_class' => 'list-inline',
                                'container_id'   => 'modalLinkA',
                                'menu_class'    => 'nav navbar-nav'));
                             } ?>
                        <a class="btn btn-primary"
                           href="<?php the_author_meta('email'); ?>"
                           title="email Author">E-Mail</a></nav>
                    </div>
                </aside><div class="clearfix"></div>

		<?php else : ?>

		        <?php get_template_part( 'nothing' ); ?>

		<?php endif; ?>

            <?php get_template_part( 'nav', 'content' ); ?>

    </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">

            <?php get_sidebar( 'left'); ?>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

            <?php get_sidebar( 'right' ); ?>

        </div>


    </div><!-- ends #content .row -->

<?php get_footer(); ?>
