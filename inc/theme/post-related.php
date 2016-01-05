<?php
/*
 * Post related posts
 */

function theme_related_posts() {
    global $post;
    $orig_post = $post;
    if (strcmp(get_post_type($post), 'post') === 0) {
        theme_related_posts_post();
    } else {
        theme_related_posts_work();
    }
}

function theme_related_cat_id() {
    global $post;
    $category_ids = array();
    $categories = get_the_category($post->ID);
    if ($categories) {
        foreach ($categories as $individual_category) {
            if ($individual_category->slug != 'uncategorised') {
                $category_ids[] = $individual_category->term_id;
            }
        }
    }
    return $category_ids;
}

function theme_related_tag_id() {
    global $post;
    $tag_ids = array();
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
        foreach ($tags as $individual_tag) {
            $tag_ids[] = $individual_tag->term_id;
        }
    }
    return $tag_ids;
}

function theme_related_tag_tax_id($postTypeSlug) {
    global $post;
    $tag_ids = array();
    $tags = wp_get_post_terms($post->ID, 'post_tag_' . $postTypeSlug);
    foreach ($tags as $individual_tag) {
        $tag_ids[] = $individual_tag->term_id;
    }
    return $tag_ids;
}

function theme_related_cat_tax_id($postTypeSlug) {
    global $post;
    $category_ids = array();
    $categories = wp_get_post_terms($post->ID, 'category_' . $postTypeSlug);
    foreach ($categories as $individual_cat) {
        $category_ids[] = $individual_cat->term_id;
    }
    return $category_ids;
}

function theme_related_posts_work() {
    global $post;
    $postTypeSlug = theme_get_post_type_slug();
    $tag_ids = theme_related_tag_tax_id($postTypeSlug);
    $category_ids = theme_related_cat_tax_id($postTypeSlug);
    $post_ids = array($post->ID);
    $args = array();
    if ($tag_ids || $category_ids) {
        $tax_query = array('relation' => 'OR');
        if ($tag_ids) {
            array_push($tax_query, array(
                'taxonomy' => 'post_tag_' . $postTypeSlug,
                'field' => 'term_id',
                'terms' => $tag_ids,
            ));
        }
        if ($category_ids) {
            array_push($tax_query, array(
                'taxonomy' => 'category_' . $postTypeSlug,
                'field' => 'term_id',
                'terms' => $category_ids,
            ));
        }
        $args = array(
            'orderby'=>'date',
            'tax_query' => $tax_query,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 6,
            'post_type' => get_post_type($post)
        );
        $works = null;
        $works = new wp_query($args);
        if ($works->have_posts()) {
            theme_related_posts_loop_before();
            while ($works->have_posts()) {
                theme_related_posts_loop($works);
            }
            theme_related_posts_loop_after();
        }
        wp_reset_query();
    }
}

function theme_related_posts_post() {
    global $post;
    $tag_ids = theme_related_tag_id();
    $category_ids = theme_related_cat_id();
    $args = array();
    if ($tag_ids || $category_ids) {
        $tax_query = array('relation' => 'OR');
       
        $args = array(
            'orderby'=>'date',
            'tax_query' => $tax_query,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 6,
            'post_type' => get_post_type($post)
        );
         if ($tag_ids) {
            $args['tag__in'] = $tag_ids;
        }
        if ($category_ids) {
            $args['category__in'] = $category_ids;
        }
        $works = null;
        $works = new wp_query($args);
        if ($works->have_posts()) {
            theme_related_posts_loop_before();
            while ($works->have_posts()) {
                theme_related_posts_loop($works);
            }
            theme_related_posts_loop_after();
        }
        wp_reset_query();
    }
}

function theme_related_posts_loop_before() {
    ?>
    <div class="posts-related" id="post-<?php the_ID(); ?>">
        <div class="posts-related-header h2">
            <span><?php _e('Thanks for watching!', 'artwork-lite'); ?></span>
            <span><?php _e('Want more?', 'artwork-lite'); ?></span>
        </div>
        <div class="two-col-works">
            <?php
        }

        function theme_related_posts_loop_after() {
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
}

function theme_related_posts_content($args, $argscat) {
    global $post;
    $orig_post = $post;
    $post_ids = array($post->ID);
    $first = false;
    $works = null;
    $works = new wp_query($args);
    if ($works->have_posts()) {
        $first = true;
        theme_related_posts_loop_before();
        while ($works->have_posts()) {
            array_push($post_ids, $post->ID);
            theme_related_posts_loop($works);
        }
    }
    wp_reset_query();
    $argscat['post__not_in'] = $post_ids;
    $works = null;
    $works = new wp_query($argscat);
    if ($works->have_posts()) {
        if (!$first) {
            $first = true;
            theme_related_posts_loop_before();
        }
        while ($works->have_posts()) {
            theme_related_posts_loop($works);
        }
    }
    wp_reset_query();
    if ($first) {
        theme_related_posts_loop_after();
    }
}

function theme_related_posts_loop($works) {
    global $post;
    $works->the_post();
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
    <?php
    if ($feat_image_url):
        ?>
        <a href="<?php the_permalink(); ?>" class="work-element" id="post-<?php echo $post->ID; ?>">
            <div class="work-wrapper work-wrapper-bg <?php echo $workBg; ?> <?php echo $classPage; ?>" style="background-image: url(<?php echo $feat_image_url[0]; ?>)">
            </div>
        <?php the_title('<div class="work-content"><div class="work-header"><h5>', '</h5></div></div>'); ?>                            
        </a>
    <?php else: ?>
        <a href="<?php the_permalink(); ?>" class="work-element default-elemet"  id="post-<?php echo $post->ID; ?>">
            <div class="work-wrapper <?php echo $workBg; ?> <?php echo $classPage; ?>" >
            </div>
        <?php the_title('<div class="work-content"><div class="work-header"><h5>', '</h5></div></div>'); ?>  
        </a>
    <?php
    endif;
}
