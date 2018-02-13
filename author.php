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
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
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
                             src="<?php echo esc_url( get_avatar_url( $curauth->user_email, array( 'size' => 300 ) ) ); ?>"
                             alt="<?php _e( 'Author avatar', 'attire' ); ?>">

                        <div class="card-footer text-muted">
							<?php echo esc_html( $curauth->first_name . " " . $curauth->last_name ); ?>
                        </div>
                    </div>
                </div>
                <br>
				<?php dynamic_sidebar( 'author_page' ); ?>
				<?php if ( get_user_meta( $curauth->ID, 'description', true ) ) : ?>


                    <div class="card">
                        <div class="card-header"><?php echo __( 'About', 'attire' ); ?></div>
                        <div class="card-body">
							<?php echo esc_html( get_user_meta( $curauth->ID, 'description', true ) ); ?>
                        </div>
                    </div>
				<?php endif; ?>

                <br>
                <div class="card">
                    <div class="card-header"><?php echo __( 'Contact Author', 'attire' ); ?></div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="task" value="contact_author"/>
                            <input type="hidden" name="uid" value="<?php echo esc_attr( $curauth->ID ); ?>"/>

                            <label><?php echo __( 'Your Name:', 'attire' ); ?></label>
                            <input type="text" name="name" class="form-control"/>
                            <label><?php echo __( 'Your Email:', 'attire' ); ?></label>
                            <input type="text" name="email" class="form-control"/>
                            <label><?php echo __( 'Subject:', 'attire' ); ?></label>
                            <input type="text" name="subject" class="form-control"/>
                            <label><?php echo __( 'Message:', 'attire' ); ?></label>
                            <textarea class="form-control" name="message"></textarea><br>
                            <button class="btn btn-info"><?php echo __( 'Submit', 'attire' ); ?></button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

<?php get_footer();
