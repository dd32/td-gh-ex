<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header(); ?>

    <div class="author-page">
        <div class="row">
            <div class="col-lg-9 col-sm-8">
                <div class="row">
					<?php
					global $wp_query;
					$curauth = $wp_query->get_queried_object();
					$q       = new WP_Query( 'post_type=post&posts_per_page=-1&author=' . $curauth->ID );
					while ( $q->have_posts() ): $q->the_post();
						?>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="post-block">
                                <a href="<?php the_permalink(); ?>"><?php attire_post_thumb( array( 300, 300 ) ); ?></a>
                                <div class="post-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </div>
						<?php
					endwhile;
					?>
                </div>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="author-avatar">
                    <div class="card">
                        <img class="card-img-top"
                             src="<?php echo get_avatar_url( $curauth->user_email, array( 'size' => 300 ) ); ?>"
                             alt="Author avatar">

                        <div class="card-footer text-muted">
							<?php echo $curauth->first_name . " " . $curauth->last_name; ?>
                        </div>
                    </div>
                </div>
                <br>
				<?php dynamic_sidebar( 'author_page' ); ?>
				<?php if ( get_user_meta( $curauth->ID, 'description', true ) ) : ?>


                    <div class="card">
                        <div class="card-header"><?php _e( 'About', 'attire' ); ?></div>
                        <div class="card-body">
							<?php echo get_user_meta( $curauth->ID, 'description', true ); ?>
                        </div>
                    </div>
				<?php endif; ?>

                <br>
                <div class="card">
                    <div class="card-header"><?php _e( 'Contact Author', 'attire' ); ?></div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="task" value="contact_author"/>
                            <input type="hidden" name="uid" value="<?php echo $curauth->ID; ?>"/>

                            <label><?php _e( 'Your Name:', 'attire' ); ?></label>
                            <input type="text" name="name" class="form-control"/>
                            <label><?php _e( 'Your Email:', 'attire' ); ?></label>
                            <input type="text" name="email" class="form-control"/>
                            <label><?php _e( 'Subject:', 'attire' ); ?></label>
                            <input type="text" name="subject" class="form-control"/>
                            <label><?php _e( 'Message:', 'attire' ); ?></label>
                            <textarea class="form-control" name="message"></textarea><br>
                            <button class="btn btn-info"><?php _e( 'Submit', 'attire' ); ?></button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

<?php get_footer();
