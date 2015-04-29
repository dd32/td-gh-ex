<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="site-content-full">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h3 class="entry-title"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'barista' ); ?></h3> 
            <?php the_content(); ?>
                <?php comments_template(); ?>
    </article>
</section>