<?php
/**
 * The template used for displaying page content in front-page.php
 *
 * @package Avrora
 */
?>

<div class="news infos">
    <?php if (of_get_option('top_box_1_title') <> '') : ?>
        <div class="box-news">
                <h5><?php echo of_get_option('top_box_1_title'); ?></h5>
                <?php if (of_get_option('top_box_1_image') <> '') : ?>
                    <img height="147" width="254"  src="<?php echo of_get_option('top_box_1_image'); ?>"  alt=""/>
                <?php endif; ?>
                <p><?php echo of_get_option('top_box_1_content'); ?></p>
        </div>
    <?php endif; ?>
    <?php if (of_get_option('top_box_2_title') <> '') : ?>
        <div class="box-news">
            <h5><?php echo of_get_option('top_box_2_title'); ?></h5>
            <?php if (of_get_option('top_box_2_image') <> '') : ?>
                <img height="147" width="254"  src="<?php echo of_get_option('top_box_2_image'); ?>"  alt=""/>
            <?php endif; ?>
            <p><?php echo of_get_option('top_box_2_content'); ?></p>
        </div>
    <?php endif; ?>
    <?php if (of_get_option('top_box_3_title') <> '') : ?>
        <div class="box-news">
            <h5><?php echo of_get_option('top_box_3_title'); ?></h5>
            <?php if (of_get_option('top_box_3_image') <> '') : ?>
                <img height="147" width="254"  src="<?php echo of_get_option('top_box_3_image'); ?>"  alt=""/>
            <?php endif; ?>
            <p><?php echo of_get_option('top_box_3_content'); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php if ( of_get_option( 'example_checkbox', 'no entry' )==1) : ?>
            <div class="news">
                <h3>Recent News</h3>
                <?php
                $postslist = get_posts('numberposts=4&order=DESC&orderby=date');
                foreach ($postslist as $post) :
                    setup_postdata($post);
                    ?>
                    <div class="box-news post25">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } ?>
                        <span class="date-home"><?php echo get_the_date(); ?></span><h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                <?php endforeach; ?>
<?php endif; ?>
