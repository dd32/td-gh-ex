<?php 

if( is_home() ) { ?>
    <div <?php post_class(); ?>>
    	<?php ct_tracks_featured_image(); ?>
        <div class="excerpt-container">
            <div class="excerpt-meta">
                <span class="date"><?php echo get_the_date('F j'); ?> / </span>
                <span class="author"><?php the_author_posts_link(); ?> / </span>
                <span class="category">
                    <?php
                        $category = get_the_category();
                        $category_link = get_category_link( $category[0]->term_id );
                        $category_name = $category[0]->cat_name;
                        $html = "<a href='" . $category_link . "'>" . $category_name . "</a>";
                        echo $html;
                    ?>
                </span>
            </div>
            <div class='excerpt-header'>
                <h1 class='excerpt-title'>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
            </div>
            <div class='excerpt-content'>
                <article>
                    <?php ct_tracks_excerpt(); ?>
                </article>
            </div>
        </div>
	</div>
<?php     
} elseif( is_single() ) { ?>
    <div <?php post_class(); ?>>
        <?php ct_tracks_featured_image(); ?>
        <div class="entry-meta">
            <span class="date"><?php echo get_the_date('F j'); ?> / </span>
            <span class="author"><?php the_author_posts_link(); ?> / </span>
                <span class="category">
                    <?php
                    $category = get_the_category();
                    $category_link = get_category_link( $category[0]->term_id );
                    $category_name = $category[0]->cat_name;
                    $html = "<a href='" . $category_link . "'>" . $category_name . "</a>";
                    echo $html;
                    ?>
                </span>
        </div>
        <div class='entry-header'>
            <h1 class='entry-title'><?php the_title(); ?></h1>
        </div>
        <div class="entry-container">
            <div class="entry-content">
                <article>
                    <?php the_content(); ?>
                    <?php wp_link_pages(array('before' => '<p class="singular-pagination">' . __('Pages:','tracks'), 'after' => '</p>', ) ); ?>
                </article>
            </div>
            <div class='entry-meta-bottom'>
                <?php ct_tracks_further_reading(); ?>
                <div class="entry-categories"><?php ct_tracks_category_display(); ?></div>
                <div class="entry-tags"><?php ct_tracks_tags_display(); ?></div>
            </div>
            <div class="author-meta">
                <div class="author">
                    <?php echo get_avatar( get_the_author_meta('email'), '72' ); ?>
                    <span>Written by: <?php the_author_posts_link(); ?></span>
                </div>
                <div class="bio">
                    <p><?php the_author_meta( 'description' ); ?></p>
                    <?php ct_tracks_author_social_icons(); ?>
                </div>
            </div>
        </div>
    </div>
<?php 
} else { ?>
    <div <?php post_class(); ?>>
        <?php ct_tracks_featured_image(); ?>
        <div class="excerpt-container">
            <div class="excerpt-meta">
                <span class="date"><?php echo get_the_date('F j'); ?> / </span>
                <span class="author"><?php the_author_posts_link(); ?> / </span>
                <span class="category">
                    <?php
                    $category = get_the_category();
                    $category_link = get_category_link( $category[0]->term_id );
                    $category_name = $category[0]->cat_name;
                    $html = "<a href='" . $category_link . "'>" . $category_name . "</a>";
                    echo $html;
                    ?>
                </span>
            </div>
            <div class='excerpt-header'>
                <h1 class='excerpt-title'>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
            </div>
            <div class='excerpt-content'>
                <article>
                    <?php ct_tracks_excerpt(); ?>
                </article>
            </div>
        </div>
    </div>
<?php 
}

