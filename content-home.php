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
<article id="post-<?php the_ID(); ?>" <?php post_class("page-wrapper"); ?> >
    <div class="work-wrapper <?php echo $workBg; ?> <?php echo $classPage; ?> <?php
if (!$feat_image_url): echo 'work-wrapper-default';
else: echo 'work-wrapper-bg';
endif;
?> " <?php if ($feat_image_url): ?> style="background-image: url(<?php echo $feat_image_url[0]; ?>)" <?php endif; ?>  >
        <div class="page-content">
            <div class="entry-header">
                <h2 class="entry-title h4">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            </div> 
            <div class="entry entry-content">
                <p><?php theme_get_content_theme(163); ?></p>  
                <a href="<?php the_permalink(); ?>" class="button"><?php _e('View', 'artwork-lite'); ?></a>
            </div>      
        </div> 
    </div>  
</article>
<?php
