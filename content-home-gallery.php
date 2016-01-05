<?php
global $themePageTemplate;
$workBg = get_post_meta(get_the_ID(), '_work_bg', true);
if (empty($workBg)):
    $workBg = "work-wrapper-light";
endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("page-wrapper"); ?>>
    <div class="work-wrapper <?php echo $workBg; ?> work-wrapper-default">
        <div class="gallery-wrapper">
            <div class="gallery-content">
                <div class="container">
                    <?php theme_get_post_gallery($post, $themePageTemplate); ?>
                </div>
            </div>
        </div>
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
