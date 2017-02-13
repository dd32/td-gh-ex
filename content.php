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
			<p class="theauthor"><span class="screen-reader-text">
                <?php _e( 'Author Gravatar is shown here. More info to follow is below.',
                          'appeal' ); ?></span>
                <?php echo get_avatar( get_the_author_meta( 'email' ), 42); ?>
                <span> </span> <a data-toggle="modal"
                                  data-target="#theAuthor"
                                  href="<?php the_author_meta('user_url'); ?>"
                                  title="<?php  echo get_the_author_meta( 'nicename' ); ?>">
                        <?php echo nl2br( get_the_author_meta( 'nicename' ) ); ?>
                        <span class="screen-reader-text">
                        <?php _e( 'author nickname and the link to author website or other works outside of this website.', 'appeal' ); ?>
                <?php echo esc_attr( get_the_author_meta( 'nicename' ) ); ?></span> </a></p>
		  </div>

<div id="theAuthor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h2 class="modal-title"><?php echo get_the_author_meta( 'first_name' ); ?>
                <span class="sepspace"> </span>
                <?php echo nl2br( get_the_author_meta( 'last_name' ) ); ?>
                <span class="screen-reader-text">
                <?php _e( 'Information about the author you selected', 'appeal' ); ?></span>
        </h2>
      </div>
      <div class="modal-body">
        <p><?php _e( 'Nickname:  ', 'appeal' ); echo get_the_author_meta( 'nicename' ); ?></p>
        <ul class="list-group">

            <li class="list-group-item">
                <a href="<?php echo esc_url(the_author_meta( 'url' ) ); ?>"
                   title="<?php the_author(); ?>">
                <?php echo esc_url(the_author_meta( 'url' ) ); ?>
                <span class="screen-reader-text">
                <?php _e( 'link to author', 'appeal' ); ?>
                <?php echo esc_url(the_author_meta( 'url' ) ); ?></span></a></li>

            <li class="list-group-item"><?php the_author_meta('description'); ?></li>

            <li class="list-group-item"><?php _e( 'Archives for ', 'appeal' );
                                                 the_author_posts_link(); ?></li>

            <li class="list-group-item"><b><?php the_author_posts(); ?></b>
                <span class="screen-reader-text">
                <?php _e( 'Here is the number of articles by this author, ', 'appeal'); ?>
                <?php the_author_posts(); ?></span>
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
           title="email Author"><?php _e( 'E-Mail', 'appeal' ); ?> <span class="screen-reader-text"><?php _e( 'email link to author', 'appeal' ); ?></span></a>
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

        <?php } elseif ( is_single() || is_page() )  { ?>

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

                    <?php the_content( '', true ); ?>

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

                            <?php the_content( '', true ); ?>

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