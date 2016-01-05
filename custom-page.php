<?php ?>
<div class="site-header">
    <div class="container">
        <div class="site-logo">
            <?php if (get_theme_mod('theme_logo') != "" || get_bloginfo('description') || get_theme_mod('name') != "") : ?>
                <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                       <?php if (get_theme_mod('theme_logo', false) === false) : ?> 
                        <div class="header-logo "><img src="<?php echo (get_template_directory_uri() . '/images/headers/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                    <?php else: ?>
                        <?php if (get_theme_mod('theme_logo')) : ?> 
                            <div class="header-logo "><img src="<?php echo get_theme_mod('theme_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="site-description">
                        <h1 class="site-title <?php if (!get_bloginfo('description')) : ?>empty-tagline<?php endif; ?>"><?php bloginfo('name'); ?></h1>
                        <?php if (get_bloginfo('description')) : ?>
                            <p class="site-tagline"><?php bloginfo('description'); ?></p>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endif ?>
        </div>
    </div>
</div>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => theme_get_post_type_slug(),
    'paged' => $paged
);

$works = new WP_Query($args);
?>

<?php
if ($works->have_posts()) {
    ?>

    <div class="work-blog home-work-blog">
        <?php
        while ($works->have_posts()) {
            $works->the_post();
            get_template_part('content-home', get_post_format());
        }
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="hidden">
        <div class="older-works">
            <?php next_posts_link('&laquo; Older Entries', $works->max_num_pages) ?>
        </div>
        <?php previous_posts_link('Newer Entries &raquo;') ?>
    </div>
    <?php
} else {
    ?>
    <article class="page-wrapper">
        <div class="work-wrapper work-wrapper-dark work-wrapper-cover work-wrapper-bg work-wrapper1"> 
            <div class="page-content">
                <div class="entry-header">
                    <h2 class="entry-title h4">
                        <a href="#" rel="bookmark"><?php _e('Woman In Gallery', 'artwork-lite'); ?></a>
                    </h2>
                </div> 
                <div class="entry entry-content">
                    <p><?php _e('Aenean aliquam volutpat ipsum at cursus. Quisque porttitor lectus ac cursus imperdiet. Donec tempor ligula vel auctor venenatis. Vestibulum vehicula auctor dictum.', 'artwork-lite'); ?></p>  
                    <a href="#" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                </div>      
            </div> 
        </div>  
    </article>
    <article class="page-wrapper">
        <div class="work-wrapper work-wrapper-light work-wrapper-cover work-wrapper-bg work-wrapper2"> 
            <div class="page-content">
                <div class="entry-header">
                    <h2 class="entry-title h4">
                        <a href="#" rel="bookmark"><?php _e('The Mona Lisa', 'artwork-lite'); ?></a>
                    </h2>
                </div> 
                <div class="entry entry-content">
                    <p><?php _e('Aenean aliquam volutpat ipsum at cursus. Quisque porttitor lectus ac cursus imperdiet. Donec tempor ligula vel auctor venenatis. Vestibulum vehicula auctor dictum.', 'artwork-lite'); ?></p>  
                    <a href="#" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                </div>      
            </div> 
        </div>  
    </article>
    <article class="page-wrapper">
        <div class="work-wrapper work-wrapper-light work-wrapper-cover work-wrapper-bg work-wrapper3"> 
            <div class="page-content">
                <div class="entry-header">
                    <h2 class="entry-title h4">
                        <a href="#" rel="bookmark"><?php _e('The Louvre Museum', 'artwork-lite'); ?></a>
                    </h2>
                </div> 
                <div class="entry entry-content">
                    <p><?php _e('Aenean aliquam volutpat ipsum at cursus. Quisque porttitor lectus ac cursus imperdiet. Donec tempor ligula vel auctor venenatis. Vestibulum vehicula auctor dictum.', 'artwork-lite'); ?></p>  
                    <a href="#" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                </div>      
            </div> 
        </div>  
    </article>
    <article class="page-wrapper">
        <div class="work-wrapper work-wrapper-light work-wrapper-cover work-wrapper-bg work-wrapper4"> 
            <div class="page-content">
                <div class="entry-header">
                    <h2 class="entry-title h4">
                        <a href="#" rel="bookmark"><?php _e('Lorem ipsum dolor', 'artwork-lite'); ?></a>
                    </h2>
                </div> 
                <div class="entry entry-content">
                    <p><?php _e('Aenean aliquam volutpat ipsum at cursus. Quisque porttitor lectus ac cursus imperdiet. Donec tempor ligula vel auctor venenatis. Vestibulum vehicula auctor dictum.', 'artwork-lite'); ?></p>  
                    <a href="#" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                </div>      
            </div> 
        </div>  
    </article>
    <article class="page-wrapper">
        <div class="work-wrapper work-wrapper-light work-wrapper-cover work-wrapper-bg work-wrapper5"> 
            <div class="page-content">
                <div class="entry-header">
                    <h2 class="entry-title h4">
                        <a href="#" rel="bookmark"><?php _e('Lorem ipsum dolor', 'artwork-lite'); ?></a>
                    </h2>
                </div> 
                <div class="entry entry-content">
                    <p><?php _e('Aenean aliquam volutpat ipsum at cursus. Quisque porttitor lectus ac cursus imperdiet. Donec tempor ligula vel auctor venenatis. Vestibulum vehicula auctor dictum.', 'artwork-lite'); ?></p>  
                    <a href="#" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                </div>      
            </div> 
        </div>  
    </article>
    <article class="page-wrapper">
        <div class="work-wrapper work-wrapper-light work-wrapper-bg work-wrapper6"> 
            <div class="page-content">
                <div class="entry-header">
                    <h2 class="entry-title h4">
                        <a href="#" rel="bookmark"><?php _e('Lorem ipsum dolor', 'artwork-lite'); ?></a>
                    </h2>
                </div> 
                <div class="entry entry-content">
                    <p><?php _e('Aenean aliquam volutpat ipsum at cursus. Quisque porttitor lectus ac cursus imperdiet. Donec tempor ligula vel auctor venenatis. Vestibulum vehicula auctor dictum.', 'artwork-lite'); ?></p>  
                    <a href="#" class="button"><?php _e('View', 'artwork-lite'); ?></a>
                </div>      
            </div> 
        </div>  
    </article>
    <div class="clearfix"></div>
    <?php
}
    
