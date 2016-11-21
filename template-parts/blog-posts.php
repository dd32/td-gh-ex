<?php
/**
 * Frontpage single post content
 */
?>

<div class="col-xs-12 col-lg-4 col-md-4">

    <a href="<?php the_permalink() ?>">

        <h4><?php the_title() ?></h4>

        <?php if( has_post_thumbnail() ) {
            the_post_thumbnail('aza-post-small');
        } ?>

    </a>

    <p><?php the_excerpt();?></p>

</div>
