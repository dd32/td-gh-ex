<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly ?>
<!-- Entry -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry">
        <?php if(has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php endif; ?>
        <div class="content clearfix">
            <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php get_template_part('entry-details');
            the_excerpt();
            get_template_part('entry-permalink');
            get_template_part('entry-meta'); 
            wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>')); ?>
        </div>
    </div>
</div>
<!-- Entry end -->