<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-lines' ); ?>>
<?php
global $more;
$more = 0;
?>
    <div class="article-inner">
	   <header>
		  <h2 class="entry-title">
           <a class="text-dark"
              href="<?php the_permalink(); ?>"
              title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		  <div class="entry-meta">
			<p class="theauthor">
<?php echo get_avatar( get_the_author_meta( 'email' ), 42); ?><span> </span>

<a data-toggle="modal" data-target="#theAuthor" href="<?php the_author_meta('user_url'); ?>" title="<?php  echo get_the_author_meta( 'nicename' ); ?>"><?php echo nl2br( get_the_author_meta( 'nicename' ) ); ?></a></p>
		  </div>

<div id="theAuthor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h4 class="modal-title">theAuthor</h4>
      </div>
      <div class="modal-body">
        <p><?php  echo get_the_author_meta( 'nicename' ); ?></p>
        <ul class="list-group">
            <li class="list-group-item"><?php _e( 'Author Website ', 'appeal' );
                                              the_author_link(); ?></li>
            <li class="list-group-item"><?php the_author_meta('description'); ?></li>
            <li class="list-group-item"><?php _e( 'Archives for ', 'appeal' );
                                              the_author_posts_link(); ?></li>
            <li class="list-group-item"><b><?php the_author_posts(); ?></b>
            <?php _e( 'Articles by ', 'appeal' ); ?> <?php the_author(); ?></li>
        </ul>
      </div>
      <div class="modal-footer">
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
           title="email Author">E-Mail</a>
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Close</button>
        </nav>
      </div>
    </div>

  </div>
</div>
	   </header>

	   <div class="entry-content">

        <?php if ( is_front_page() && is_home() ) {
        // Default homepage (blog)
        ?>
        <section class="post_content">

            <?php appeal_theme_excerpt_length(); ?>

        </section><div class="clearfix"></div>
            <footer>

                <?php the_tags('<p class="tags">', ' ', '</p>'); ?>
                <?php get_template_part('part', 'metadata' ); ?>
            </footer>



        <?php } elseif ( is_home()) {
        //Blog page
        ?>
        <section class="post_content">

            <?php the_excerpt(); ?><div class="clearfix"></div>

        </section>
            <footer class="meta-footer">

                <?php get_template_part('part', 'metadata' ); ?>

            </footer>

        <?php } elseif ( is_single() ) { ?>

            <section class="post_content">
                <?php
                // check if the post has a Post Thumbnail assigned to it.
                if ( has_post_thumbnail() ) {
    	           the_post_thumbnail('thumbnail',
                           array( 'class' => 'alignleft' ) );
                }
                ?>

                <?php if ( has_excerpt( $post->ID ) ) { ?>
                <div class="pullquote">
                        <aside>
                            <?php $theme_modA = appeal_teaser_length();
                        esc_html( $theme_modA ); ?>
                        </aside>
                </div>
                <?php } ?>

                    <?php the_content(); ?>

                    <nav class="pagination"><?php // more tag display
                    wp_link_pages();
                    ?></nav>

            </section><div class="clearfix"></div>
                <footer class="meta-footer">

                    <?php get_template_part('part', 'metadata' ); ?>

                </footer>

                    <?php comments_template(); ?>

            <?php } else {
                //everything 4else
                ?>
                <section class="post_content">
                    <div class="inside-content">
                    <?php
                    // check if the post has a Post Thumbnail assigned to it.
                    if ( has_post_thumbnail() ) {
    	                 the_post_thumbnail('thumbnail',
                                     array( 'class' => 'alignleft' ) );
                    }
                    ?>

                            <?php if ( has_excerpt( $post->ID ) ) { ?>
                            <div class="pullquote">
                                <aside>
                                    <?php $theme_modA = appeal_teaser_length();
                                esc_html( $theme_modA ); ?>
                                </aside>
                            </div>
                            <?php } ?>

                            <?php the_content(); ?>

                    </div>
                </section><div class="clearfix"></div>
                    <footer class="meta-footer">

                        <?php get_template_part('part', 'metadata' ); ?>

                    </footer>

                        <?php comments_template(); ?>

<?php } ?>
        </div>
	</div>
</article>