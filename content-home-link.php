<?php
global $themePageTemplate;
$feat_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-large');
$widthImg = $feat_image_url[1];
$classPage = '';
if ($widthImg >= 600) {
    $classPage = 'work-wrapper-cover';
}
$workBg = get_post_meta(get_the_ID(), '_work_bg', true);
if (empty($workBg)):
    $workBg = "work-wrapper-light";
endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("page-wrapper"); ?>>
    <div class="work-wrapper <?php echo $workBg; ?> <?php echo $classPage; ?> <?php
    if (!$feat_image_url): echo 'work-wrapper-default';
    else: echo 'work-wrapper-bg';
    endif;
    ?> " <?php if ($feat_image_url): ?> style="background-image: url(<?php echo $feat_image_url[0]; ?>)" <?php endif; ?>>
        <div class="page-content">
            <div class="entry-header">
                <h2 class="entry-title h4">
                    <?php the_title(); ?>
                </h2>
            </div> 
            <div class="entry entry-content">
                <?php
                $link = theme_get_first_link();
                if ($link) {
                    ?>
                    <a href="<?php echo $link; ?>" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                    <?php
                } else {
                    ?>
                    <a href="<?php the_permalink(); ?>" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                    <?php
                }
                ?>
            </div>      
        </div> 
    </div>  
</article>
<?php
