<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div id="theAuthor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h2 class="modal-title"><?php echo esc_html( get_the_author_meta(
                                        'first_name' ) ); ?>
          <span class="sepspace"> </span>
          <?php echo esc_attr( nl2br( get_the_author_meta( 'last_name' ) ) ); ?>
          <span class="screen-reader-text">
          <?php esc_attr_e( 'Information about the author you selected',
                            'appeal' ); ?></span>
        </h2>
      </div>
      <div class="modal-body">
        <p><?php esc_html_e( 'Nickname:  ', 'appeal' );
                 echo esc_attr(get_the_author_meta( 'nicename' )); ?></p>
        <ul class="list-group">

            <li class="list-group-item">
                <?php echo esc_attr(nl2br( the_author_meta('description') )); ?></li>

            <li class="list-group-item">
              <a href="<?php echo esc_url(the_author_meta( 'url' ) ); ?>"
                 title="<?php the_author(); ?>">
              <?php echo esc_url(the_author_meta( 'url' ) ); ?>
              <span class="screen-reader-text">
              <?php esc_html_e( 'link to author', 'appeal' ); ?>
              <?php echo esc_url(the_author_meta( 'url' ) ); ?></span></a></li>

            <li class="list-group-item"><?php
                esc_html_e( 'Author Page and Archives for ',
                            'appeal' ); the_author_posts_link(); ?></li>
            <li class="list-group-item"><b><?php the_author_posts(); ?></b>
              <span class="screen-reader-text">
              <?php esc_html_e( 'Number of articles by this author, ',
                                'appeal'); ?>
              <?php the_author_posts(); ?></span>
            <?php esc_html_e( 'Articles by ', 'appeal' ); ?> <?php the_author(); ?></li>

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
                    'menu_class'    => 'nav navbar-nav',
                    'fallback_cb' => '',
                    ));
             } ?>

            <em class="text-muted"><?php esc_html_e( 'E-Mail: ', 'appeal' ); ?>
            <?php echo esc_html( the_author_meta('user_email') ); ?></em>
            <span class="screen-reader-text">
            <?php esc_html_e( 'email link text to author', 'appeal' ); ?></span>
        <button type="button"
                class="btn btn-default btn-md"
                data-dismiss="modal"
                title="<?php esc_attr_e( 'Close', 'appeal' ); ?>">
                <?php esc_html_e( 'Close', 'appeal' ); ?>
        </button>
        </nav>
      </div>
    </div>

  </div>
</div>

    <div class="article-inner">
	   <div class="entry-content">

        <?php if ( is_front_page() && is_home() ) {
        // Default (blog)if-homepage
        ?>

        <section class="post_content">

        <?php get_template_part('content', 'header' ); ?>

            <?php
            $length          = appeal_custom_posts_excerpt_length();
            $appealmore      = appeal_custom_excerpt_more();
            $content         = get_the_content();
            $trimmed_content = wp_trim_words( $content, $length, $appealmore );

            echo '<p>'.$trimmed_content.'</p>'; ?>

        </section>
            <footer>

                <?php get_template_part('part', 'metadata' ); ?>

            </footer>




        <?php } elseif ( is_home() ) {
        //Blog page if theme homepage is static
        ?>
        <section class="post_content">

            <?php get_template_part('content', 'header' ); ?>

            <?php
            $length          = appeal_custom_posts_excerpt_length();
            $appealmore      = appeal_custom_excerpt_more();
            $content         = get_the_content();
            $trimmed_content = wp_trim_words( $content, $length, $appealmore );

            echo '<p>'.$trimmed_content.'</p>'; ?>


        </section>
            <footer class="meta-footer">

                <?php get_template_part('part', 'metadata' ); ?>

            </footer>




        <?php } elseif ( is_single() || is_page() )  { ?>

            <section class="post_content">

				<?php get_template_part('content', 'header' ); ?>

                <div class="row">
                    <div class="after-content-header">
                <?php
                // check if the post has a Post Thumbnail assigned to it.
                if ( has_post_thumbnail() ) { ?>

                    <div class="col-xs-6 col-sm-6 col-lg-7">
                    <?php
    	            the_post_thumbnail('thumbnail',
                           array( 'class' => 'appeal-thumbnail aligncenter' ) ); ?>
                           </div><?php
                } else {
                  	echo '<div class="no-thumb"></div>'; }
                ?>
                <?php if ( has_excerpt( $post->ID ) ) { ?>
                <div class="col-xs-6 col-sm-6 col-lg-5">
                    <div class="pullquote">
                    <aside>
                    <?php $theme_modA = appeal_teaser_length();
                                        echo esc_html( $theme_modA ); ?>
                    </aside>
                    </div>
                </div><div class="clearfix"></div>
                <?php } //ends .after-content-header .row ?>
                    </div>
                </div>
                    <div class="inner_content">

                            <?php the_content(''); ?>


                    </div><div class="clearfix"></div>
                    <div class="pagination">

		      <?php wp_link_pages( array(
                                    'before' => '<p class="post-pagination">' . __( 'Pages : ', 'appeal' ),
                                    'after' => '</p>',
                                    'link_before' => '<span class="space">',
                                    'link_after' => '',
                                    'next_or_number' => 'number',
                                    'separator' => ' &nbsp; ',
                                    'nextpagelink' => __( 'Next page', 'appeal' ),
                                    'previouspagelink' => __( 'Previous page', 'appeal' ),
                                    'pagelink' => '%',
                                    'echo' => 1
                                    )
                                ); ?>

		    </div>


            </section><div class="clearfix"></div>
                <footer class="meta-footer">

                    <?php get_template_part('part', 'metadata' ); ?>

                </footer>

                    <?php comments_template(); ?>




            <?php } else {
            // ---------------- 4-everything else
            ?>
                <section class="post_content">

					<?php get_template_part('content', 'header' ); ?>

                    <div class="inside-content">

					   <?php
                        // check if the post has a Post Thumbnail assigned to it.
                        if ( has_post_thumbnail() ) {
    	                     the_post_thumbnail('thumbnail',
                                     array( 'class' => 'appeal-thumbnail alignleft' ) );
                        } else {
                    	   echo '<div class="no-thumb"></div>'; }
                        ?>

                            <?php if ( has_excerpt( $post->ID ) ) { ?>

                        <div class="pullquote">
                            <aside>
                                <?php $theme_modA = appeal_teaser_length();
                            esc_html( $theme_modA ); ?>
                            </aside>
                        </div>

                            <?php } ?>

                <?php if ( is_category() || is_archive() ) {
                        the_excerpt();
                    } else { ?>

                            <?php the_content( '', true ); ?>

                <?php } ?>

                    </div>
                        <div class="pagination">
                            <?php wp_link_pages(); ?>
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