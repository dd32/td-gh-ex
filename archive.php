<?php
/*
 * Archive Template File.
 */
get_header(); ?>
<!--archive posts start-->
<div class="heading-wrap blog-heading-wrap">
    <div class="heading-layer">
        <div class="heading-title">
            <h4> <?php _e('Archive ','best-startup'); the_archive_title(); ?> </h4>
        </div>
    </div>
</div>
<?php  get_template_part('content'); get_footer(); ?>