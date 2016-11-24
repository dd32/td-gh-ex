<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()) : ?>
        <div class="thumbnails">
            <?php the_post_thumbnail('aster-post-thumbnails', array('class' => 'post-thumbnail img-responsive')); ?>
        </div>
    <?php endif; ?>

    <div class="padding-content">
        <header class="entry-header">
            <?php the_title( sprintf( '<h2 class="entry-title">' ), '</h2>' ); ?>
        </header> <!--/.entry-header -->

        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
            <?php aster_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div> <!-- //.entry-content -->
        <br>
        <div class="entry-tags text-left"><?php the_tags(); ?></div>
    </div>

</article><!-- #post-## -->


