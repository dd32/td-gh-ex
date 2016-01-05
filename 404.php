<?php get_header(); ?>

<div class="contents">

    <h3 class="post_title">Oh No, we can't find what your looking for!</h3>
    
    <img src=" <?php echo get_template_directory_uri() . '/images/something is not right.gif' ?>" class="featured_image wp-post-image" />

    <p>The 404 or Not Found error message is a HTTP standard response code indicating that the client was able to communicate with the server, but the server could not find what was requested.</p>

    <p>The web site hosting server will typically generate a "404 Not Found" web page when a user attempts to follow a broken or dead link; hence the 404 error is one of the most recognizable errors users can find on the web.</p>

    <p>A 404 error should not be confused with "server not found" or similar errors, in which a connection to the destination server could not be made at all. A 404 error indicates that the requested resource may be available again in the future; however, the fact does not guarantee the same content.</p>

    <h4>So what can we do?</h4>

    <p>For starters, you could just head to the <a href="<?php echo home_url(); ?>/">home page</a>.</p>
    
    <h4>Next have a list of all the pages that the website contains.</h4>
    
    <ul>
        <?php wp_list_pages( 'title_li=' ); ?>
    </ul>
    
    <h4>Finally you might try searching for it.</h4>
    
     <?php get_search_form(); ?>
    
    <p></p>
    
    <div class="stars_and_bars"></div>

    <?php if (semperfi_is_sidebar_active('widget')) get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>