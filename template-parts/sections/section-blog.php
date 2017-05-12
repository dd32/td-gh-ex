<?php
/**
 * Template part for displaying section content in template-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beetech
 */
?>

<?php
	$section_option = get_theme_mod( 'homepage_blog_option', 'show' );
	if( $section_option == 'show' ) {
		$section_title = get_theme_mod( 'blog_section_title');
		$blog_section_desc = get_theme_mod( 'blog_section_desc');
        $bt_blog_categories = get_theme_mod('blog_cat_id');
?>
		<section class="bt-blog" id="bt-section-blog">
    		<div class="bt-wrapper">
                <?php if($section_title || $blog_section_desc){ ?>
    			<div class="bt-section-header">
    				<?php if($section_title){ ?><h2><?php echo esc_attr($section_title); ?></h2><?php } ?>
    				<?php if($blog_section_desc){ ?>
                        <p>
        				    <?php echo esc_attr($blog_section_desc); ?>
        				</p>
                    <?php } ?>
    			</div>
                <?php } ?>
                <?php if($bt_blog_categories){
                    $bt_blog_query = new WP_Query(array('post_type'=>'post','cat'=>$bt_blog_categories,'posts_per_page'=>6));
                    if($bt_blog_query->have_posts()):?>
            			<div class="row">
                            <?php while($bt_blog_query->have_posts()): $bt_blog_query->the_post();
                            $bt_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'beetech_blog_thumb'); ?>
                                <div class="col">
                                    <div class="blog-contents-wrap-">
                                        <div class="blog-contents">
                                        <?php $blog_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'beetech_blog_thumb'); 
                                              $blogs_image_src = $blog_image_url[0];  ?>
                                            <div class="blogs-grid-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($blogs_image_src); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"  /></a></div>
                                            <?php if(get_the_title() || get_the_content()){ ?>
                                            <div class="grid-titles-info-post">
                                                <div class="grid-blogs-titles">
                                                    <div class="blog-date">
                                                        <span class="date"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                                    </div>
                                                    <?php if(get_the_title()){ ?>
                                                        <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                    <?php } ?>
                                                    <?php if(get_the_title()){ ?>
                                                        <div class="desc-blog"><?php echo wp_kses_post(wp_trim_words(get_the_content(),'20','...')); ?></div>
                                                    <?php } ?>
                                                    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read more','beetech'); ?></a>
                                                </div>
                                            <?php } ?>
                                            <div class="bottom-blog clearfix">
                                                <span class="blogs-grid-author"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_url(the_author_posts_link()); ?> </span>
                                                <span class="blog-grid-comnment"><a href="<?php comments_link(); ?>"><i class="fa fa-comments" aria-hidden="true"></i><?php echo absint(get_comments_number()); esc_html_e(' Comment','beetech'); ?></a></span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            				<?php endwhile; ?>
            			</div>
                    <?php endif; ?>
                <?php } ?>
    		</div>
    	</section>
<?php } ?>