<?php atlast_business_breadcrumb(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item blog-item-style-1'); ?>>
    <?php the_content(); ?>

    <?php
    $faqPages = atlast_business_get_faq();
    if ($faqPages != false):
        if (!empty($faqPages)): ?>
            <div class="atlast-business-faq-container">
                <?php foreach ($faqPages as $faq): ?>
                    <div class="faq-item">

                        <div class="faq-item-title" data-content="<?php echo  esc_attr('faq-'.$faq->ID);?>">
                            <h4><?php echo esc_html($faq->post_title); ?></h4>
                        </div>
                        <div id="faq-<?php echo esc_attr($faq->ID);?>" class="faq-item-content">
                            <p><?php echo wp_kses($faq->post_content, atlast_business_allowed_HTML()); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="entry-links"><?php wp_link_pages(); ?></div>

</article>