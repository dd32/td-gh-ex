<?php get_header();
        
if (is_home()) :

    if (get_theme_mod('number_slides') == '')
        $number_of_slides = 3;
    else
        $number_of_slides = get_theme_mod('number_slides');
   
    $args = array(
        'post_type' => array('post', 'page', 'product'),
        'post_status' => 'publish',
        'posts_per_page' => $number_of_slides,
        'orderby' => 'meta_value_num',
        'meta_key'  => 'meta-select',
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'value' => '',
                'compare' => '!='),
            array(
                'key' => 'meta-checkbox',
                'value' => 'yes',
                'compare' => '=')));

    $slider_posts = new WP_Query($args);

    if ($slider_posts->have_posts()) :

    $total_post = $slider_posts->found_posts;

    if ($total_post >= $number_of_slides) $total_post = $number_of_slides;

    $count = 1; ?>

        <div class="slider">
            <div id="continue_slide"></div>

            <?php while($slider_posts->have_posts()) : $slider_posts->the_post() ?>

            <div id="slide<?php echo $count; ?>" class="slide_padding number_slides<?php echo $total_post; ?>">
                <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large_featured' ); ?>
                <div class="slide" style="background-image:url(<?php echo $background[0]; ?>)">
                    <?php if (('yes' != get_post_meta( get_the_ID(), 'meta-checkbox-image', true )) && (get_theme_mod('slider_text') != 'on')) : ?>
                        <a href="<?php the_permalink() ?>">
                            <h3><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'localize_semperfi'); } ?></h3>
                            <p><span><?php echo the_excerpt_max_charlength(120); ?></span></p>
                        </a>
                    <?php endif; ?>
                    <a href="#slide<?php if ($count > 1) echo $count - 1; else echo $total_post; ?>" class="fa previous_slide">&#xf137;</a>
                    <a href="#slide<?php echo $count; ?>" class="fa pause_sliding">&#xf04c;</a>
                    <a href="#continue_slide" class="fa continue_sliding">&#xf144;</a>
                    <a href="#slide<?php if($total_post != $count) echo $count + 1; else echo '1'; ?>" class="fa next_slide">&#xf138;</a>
                </div>
            </div>

            <?php $count = $count + 1;

            endwhile ?>
            
            <div class="transitions_helper"></div>

        </div>

    <div class="stars_and_bars" style="margin: 0 0 1.5em;">
        <span class="left">Blog</span>
        <?php if ( (get_next_posts_link() != '') || (get_previous_posts_link() != '') ) : ?>
        <span class="right"><?php next_post_link('%link', __('Older Post', 'localize_semperfi') . ' &#8250;'); ?></span>
        <?php endif; ?>
    </div>

<?php endif ?>
        
<?php wp_reset_postdata(); // reset the query ?>

    <?php endif; ?>

            <div class="blog_content">

    <?php if (have_posts()) :

        while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php if ( has_post_thumbnail()) : post_class('has_featured_image every_third'); else : post_class('every_third'); endif;?>>

                <?php if ( get_theme_mod('display_post_title_setting') == 'off' ) : else : ?>

                    <h5 class="post_title"><?php if (get_theme_mod('display_date_setting') != 'off' ) : ?><time datetime="<?php the_time('Y-m-d H:i') ?>"><?php the_time('M jS') ?><br/><?php the_time('Y') ?></time><?php endif; ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'localize_semperfi'); } ?></a></h5>

                <?php endif; ?>

                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('small_featured', array( 'class' => "featured_image")); ?>
                </a>
				
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				    <?php the_excerpt(); ?>
                </a>

            </div>

            <?php if (!is_home() && (get_theme_mod('comments_setting') != 'none')) :

                comments_template();

            endif;

        endwhile;?>
        
    </div>

    <?php endif; ?>

<?php if ( (get_next_posts_link() != '') || (get_previous_posts_link() != '') ) : ?>

    <div class="stars_and_bars">   
        <span class="left"><?php next_posts_link( '&#8249; ' . __('Older Posts', 'localize_semperfi')); ?></span>
        <span class="right"><?php previous_posts_link( __('Newer Posts', 'localize_semperfi') . ' &#8250;'); ?></span>
    </div>

<?php else : ?>

    <div class="stars_and_bars"></div>

<?php endif;

if (semperfi_is_sidebar_active('widget')) get_sidebar();

get_footer(); ?>