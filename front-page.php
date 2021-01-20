<?php
$arzine_theme_options=theme_setup_data();
$arzine_is_front_page = wp_parse_args(get_option('busiprof_theme_options', array()), $arzine_theme_options);
?>

<!-- End of Page Title -->
<div class="clearfix"></div>
<!-- Blog Masonry 3 Column Section -->
<?php if (is_home()) {
 get_header();
 get_template_part('index', 'bannerstrip');
?>
    <div id="content">
<section>
    <div class="container">
    <div class="row">
    <?php   echo '<div class="col-md-'.(!is_active_sidebar("sidebar-primary") ?"12" :"8").'">'; ?>
        <div class="row site-content" id="blog-masonry">
                    <?php
                    if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) : the_post();
                    echo '<div class="item">';
                    ?>
                    <article <?php post_class('post'); ?>>
                    <?php if (has_post_thumbnail()) { ?>
                    <figure class="post-thumbnail">
                        <a  href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        <?php $arzine_cat_list = get_the_category_list();
                            if (!empty($arzine_cat_list)) { ?>
                        <span class="cat-links"><?php the_category(', '); ?></span>
                        <?php } ?>
                    </figure>
                    <?php }?>
                    <aside class="masonry-content">
                        <div class="entry-meta">
                        <?php $arzine_cat_list = get_the_category_list();
                                if (!empty($arzine_cat_list)) {
                                    ?>
                        <?php if (!has_post_thumbnail()) {
                                        ?>
                        <span class="cat-links"><?php the_category(', '); ?></span>
                        <?php
                                    }
                                }?>
                        <span class="entry-date"><a href="<?php echo esc_url(home_url('/')); ?><?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>"><time datetime=""><?php the_time('M j,Y');?></time></a></span>
                        </div>
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </header>
                        <div class="entry-content">
                            <?php the_content(__('Read More', 'arzine')); ?>
                        </div>
                        <span class="author">
                        <figure class="avatar">
                        <?php $arzine_author_id=$post->post_author; ?>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>" title="<?php echo esc_attr(the_author_meta('display_name', $arzine_author_id)); ?>"><?php echo get_avatar(get_the_author_meta('ID'), 32); ?></a>
                        </figure>
                        <?php esc_html_e('by', 'arzine'); echo ' ';?><a rel="tag" class="name" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><?php echo esc_html(the_author_meta('display_name', $arzine_author_id)); ?></a>
                        </span>
                    </aside>
                </article>
                    <?php echo '</div>';
                    endwhile;
                ?>
        </div>
                    <!-- Pagination -->
                    <div class="paginations">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                        'prev_text'          => esc_html__('Previous', 'arzine'),
                        'next_text'          => esc_html__('Next', 'arzine'),
                        'screen_reader_text' => ' ',
                        )); ?>
                    </div>
                    <?php endif; ?>
                    <!-- /Pagination -->
    </div>
        <?php get_sidebar();?>
    </div>
    </div>
</section>
</div>
<?php
get_footer(); } elseif('page' == get_option('show_on_front') && $arzine_is_front_page['front_page'] == 'yes' ){
 get_header();
 ?>
<div id="content">
<?php do_action( 'busiprof_home_template_sections', false ); ?>
<!-- footer Section of index blog -->
<?php get_template_part('index', 'blog'); ?>
<?php do_action( 'busiprof_home_tesi_sections', false ); ?>
</div>
<?php get_footer(); }elseif('page' == get_option('show_on_front') && $arzine_is_front_page['front_page'] != 'yes' ){get_template_part('page');
                            }
elseif (is_page_template('front-page.php')) {
                            $arzine_theme_options=theme_setup_data();
                            $arzine_is_front_page = wp_parse_args(get_option('busiprof_theme_options', array()), $arzine_theme_options);
                            if ($arzine_is_front_page['front_page'] != 'yes') {
                                get_template_part('index');
                            }
                        } elseif (is_page_template('template-home-two.php')) {
                            $arzine_theme_options=theme_setup_data();
                            $arzine_is_front_page = wp_parse_args(get_option('busiprof_theme_options', array()), $arzine_theme_options);
                            if ($arzine_is_front_page['front_page'] != 'yes') {
                                get_template_part('index');
                            }
                        } else { ?>
    <?php if (is_page_template('Page-fullwidth.php')):
     get_header();
get_template_part('index', 'bannerstrip');
?>
<div id="content">
    <section>
    <div class="container">
        <div class="row">
            <!--Blog Posts-->
            <div class="col-md-12 col-xs-12">
                <div class="page-content">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> >
                        <div class="entry-content">
                            <?php the_post(); the_content(); ?>
                        </div>
                    </article>
                </div>
            <?php comments_template('', true); // show comments?>
            </div>
            <!--/End of Blog Posts-->
        </div>
    </div>
    </section>
    </div>
    <?php get_footer(); ?>
    <?php else:
        get_header();
get_template_part('index', 'bannerstrip');
?>
<div id="content">
        <section>
    <div class="container">
        <div class="row">
            <!--Blog Detail-->
            <?php
                if (class_exists('WooCommerce')) {
                    if (is_account_page() || is_cart() || is_checkout()) {
                        echo '<div class="col-md-'.(!is_active_sidebar("woocommerce-1") ?"12" :"8").'">';
                    } else {
                        echo '<div class="col-md-'.(!is_active_sidebar("sidebar-primary") ?"12" :"8").'">';
                    }
                } else {
                    echo '<div class="col-md-'.(!is_active_sidebar("sidebar-primary") ?"12" :"8").'">';
                } ?>
                <div class="page-content">
                        <?php the_post(); the_content(); ?>
                        <?php
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                        ?>
                </div>
                </div>
                <!--/End of Blog Detail-->
            <?php
                if (class_exists('WooCommerce')) {
                    if (is_account_page() || is_cart() || is_checkout()) {
                        get_sidebar('woocommerce');
                    } else {
                        get_sidebar();
                    }
                } else {
                    get_sidebar();
                } ?>
            </div>
    </div>
    <?php get_footer(); ?>
</section>
</div>
    <?php endif; ?>
<?php } ?>
<!-- End of Blog Masonry 3 Column Section -->
<div class="clearfix"></div>
