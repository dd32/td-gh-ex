<?php get_header(); ?>
<div style="background-color:#939">
    <section  class="twelve columns clearfix">
        <?php get_template_part('loop'); ?>
    </section>
    <aside class="four columns clearfix">
        <?php get_sidebar(); ?>
    </aside>
</div>
<section class="footer sixteen columns">
    <?php get_footer(); ?>
</section>