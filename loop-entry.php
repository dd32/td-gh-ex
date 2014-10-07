<?php while (have_posts()) : the_post(); ?>

    <div class="item col-md-6">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
            <div class="post_box" style="padding-bottom:35px;">
                    <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                    <h4 class="post_title"><a href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h4>
                    <div class="meta-info row">
                        <div class="col-md-6  col-xs-6"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></div>
                        <div class="col-md-6 col-xs-6"><a href="<?php comments_link(); ?>" class="meta-comment"><i class="fa fa-comments"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></div> 
                    </div>                                                       
                    <p class="post_desc"><?php echo excerpt('30'); ?></p>
                    <div class="clearfix"></div>
                    <a href="<?php the_permalink('') ?>" class="btn btn-info read_more"><?php _e( 'Read More >>', 'wp-fanzone' ); ?></a>
                    <div class="clearfix"></div>
            </div>
         </div> 
</div>  
<?php endwhile; ?>