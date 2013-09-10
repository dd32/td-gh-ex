<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly ?>
<ul class="meta">
    <?php if(comments_open()) : ?>
        <li class="comments"><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></li>
    <?php endif;
    if(has_tag()) : ?>
    <li class="tags"><?php the_tags('', ', ', ''); ?></li>
    <?php endif;
    if(has_category()) : ?>
        <li class="categories"><?php the_category(', '); ?></li>
    <?php endif; ?>
</ul>