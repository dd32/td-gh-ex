
<?php get_header(); ?>

<div id='content'>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="post" id="post-<?php the_ID(); ?>">

        <fieldset>

            <legend class='title'>
                <a href="<?php the_permalink() ?>" rel="bookmark"
                    title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
            </legend>

            <div class='dateauthor'>
                <small class='capsule'><?php the_time('F jS, Y') ?> by <?php the_author() ?></small>
            </div>

            <div id='postaction'>

                <ul>

                <?php edit_post_link('Edit Entry', '<li>', '</li>'); ?>

                <li>
                    <img border=0 valign='middle'
                        src='<?php print bloginfo('template_directory') . "/images/rss-icon.gif"; ?>'>
                    <?php comments_rss_link('Comments Feed'); ?>
                </li>

                <?php
                            
                    if (('open' == $post-> comment_status) && ('open' == $post->ping_status))
                    {
                        print "
                            <li> <a href='#respond'>Add Comment</a> </li>
                            <li> <a href='" . trackback_url(false) . "' rel='trackback'>Trackback</a> </li>
                            ";
                    }
                    elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status))
                    {
                        print "<li> <a href='" . trackback_url(true) . "' rel='trackback'>Trackback</a> </li>";
                    }
                ?>

                </ul>

            </div>

            <div class="entry">
                <?php the_content('Read the rest of this entry &raquo;'); ?>
            </div>

            <br clear='all'/>

            <div class="postmetadata">
                <div>
                Posted in:
                <?php
                    foreach((get_the_category()) as $cat)
                        print
                            "<a href='" . get_category_link($cat->cat_ID) . "'>" .
                            "<span class='capsule category'>$cat->cat_name</span></a>\n";
                ?>
                </div>
                <br/>
                <div>
                Tagged:
                <?php
                    print
                        get_the_tag_list(
                                $before = '<span class="capsule category">',
                                $sep = ', ',
                                $after = '</span>');
                ?> 
                </div>
            </div>

        </fieldset>

    </div>

    <?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

    <?php endif; ?>

</div>

<?php get_footer(); ?>

