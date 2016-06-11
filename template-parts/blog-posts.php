<div class="col-xs-12 col-lg-4 col-md-4">
    <a href="<?php the_permalink() ?>">
        <h4><?php the_title() ?></h4>
         <?php the_post_thumbnail('small') ?>
    </a>
    <p><?php the_excerpt();?></p>
</div>
