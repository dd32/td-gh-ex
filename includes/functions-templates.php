<?php

if ( ! function_exists( 'themeora_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 * @since themeora 1.0
 * @param boolean shorten. Weather to shorten by removing category information. Default false.
 * @return string block of html for blog meta.
 */
function themeora_entry_meta($shorten = false) {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'atwood' ) . '</span>';

	if ( 'post' == get_post_type() ) {
        echo '<div class="meta">';
            echo __('Posted on', 'atwood') . ' ';
            echo get_the_time('jS') . ' ' . get_the_time('F') . ', ' . __('by', 'atwood') . ' ' ;
            the_author_posts_link(); 
            if ( !$shorten ) {
                echo ' ' . __('in', 'atwood') . ' '; 
                the_category(', ') . ' ' ;
            }
            ?>
        <?php echo '</div>';
    }
}
endif;

if ( ! function_exists( 'themeora_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 * @since themeora 1.0
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function themeora_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'atwood' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'atwood' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;


if ( ! function_exists( 'themeora_post_nav' ) ) :
/**
* Displays navigation to next/previous post when applicable.
* @since themeora 1.0
* @return next and prev posts links
*/
function themeora_post_nav() {
	global $post;
    if( get_theme_mod( 'post_pagination' ) == true ) {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous )
            return;
        ?>
        <nav class="navigation post-navigation styled-box" role="navigation">
            <div class="nav-links row-fluid">
                <div class="col-md-6 col-sm-6 col-xs-6 nav-links-prev">
                    <?php previous_post_link( '%link', _x( '<i class="fa fa-arrow-circle-left"></i> Last Post', 'Previous post link', 'atwood' ) ); ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 nav-links-next">
                    <?php next_post_link( '%link', _x( 'Next Post <i class="fa fa-arrow-circle-right"></i>', 'Next post link', 'atwood' ) ); ?>
                </div>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
	<?php
    }
}
endif;


if ( ! function_exists( 'themeora_post_tags' ) ) :
/**
* Displays post tags
* @since themeora 1.0
* @return tag cloud
*/
function themeora_post_tags() {
	global $post;
    if( get_theme_mod( 'show_tags' ) == true && has_tag() && is_singular() ) {
        echo '<div class="styled-box post-tags">';
        echo the_tags( '<h3>' . __('Tagged As', 'atwood') . '</h3>', '', '' );
        echo '</div>';
    }
}
endif;


if ( ! function_exists( 'themeora_post_author_meta' ) ) :
/**
 * Displays author information under posts
*  @since themeora 1.0
*  @return block of html to display author info
*/
function themeora_post_author_meta() {
    if( get_theme_mod( 'show_author_bio' ) == true ) {
        if ( 'post' == get_post_type() && get_the_author_meta('first_name') != '' && get_the_author_meta('last_name') != '') { ?>
            <div class="post-author styled-box">
                <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
                <h2><?php _e('Author', 'atwood') ?>: <a href="<?php echo home_url(); ?>/?author=<?php the_author_meta('ID'); ?>" title="<?php _e('Posts by ', 'atwood'); the_author_meta('first_name'); print ' '; the_author_meta('last_name'); ?>">
                <?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></a></h2>
                <p><?php the_author_meta('description'); ?></p>
                <a href="<?php echo home_url(); ?>/?author=<?php the_author_meta('ID'); ?>">
                <?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?>
                <?php _e('has', 'atwood'); ?>
                <?php the_author_posts(); ?> 
                <?php
                count_user_posts( get_the_author_meta('ID') ) == 1 ? _e('article', 'atwood') : _e('articles', 'atwood');
                ?></a>.
            </div>
        <?php
        }
    }
}
endif;


if ( ! function_exists( 'themeora_paging' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 * @since themeora 1.0
 * @return block of html with paging links
 */
function themeora_paging() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
    <div class="article_nav">
        <nav class="navigation paging-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'atwood' ); ?></h2>
            <div class="nav-links post-navigation styled-box">
                <div class="row-fluid">
                    <?php if ( get_previous_posts_link() ) : ?>
                    <div class="span6 pull-left nav-links-prev"><?php previous_posts_link( __( 'Newer posts <i class="fa fa-arrow-circle-left"></i>', 'atwood' ) ); ?></div>
                    <?php endif; ?>

                    <?php if ( get_next_posts_link() ) : ?>
                    <div class="span6 pull-right nav-links-next"><?php next_posts_link( __( '<i class="fa fa-arrow-circle-right"></i> Older posts', 'atwood' ) ); ?></div>
                    <?php endif; ?>
                </div>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
    </div>
	<?php
}
endif;


if ( ! function_exists( 'themeora_post_media' ) ) :
/**
 * Displays the correct media above a post, featured, image, gallery, video or audio
 * @since themeora 1.0
 * @param int post. The id of the post.
 * @param string size. The size for featured images
 * @return html for the post media
 */
function themeora_post_media( $postId, $size = null ){
    //check for a featured image
    if ( has_post_thumbnail( $postId ) ) : ?>
        <div class="featured-image">
            <?php if ( is_single() ) : ?>
                <?php echo get_the_post_thumbnail( $postId, $size ); ?>
            <?php else : ?>
                <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $postId, $size ); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php
}
endif;


if ( ! function_exists( 'themeora_load_content' ) ) :
/**
 * Checks the post type and loads the right content from the includes folder
 * @since themeora 1.0
 * @param int post. The id of the current post
 * @return A block of html for each type of content
 */
function themeora_load_content( $post ){
    //load the content for quotes
    if ( get_post_format($post) == "quote" )
        get_template_part('includes/content', 'quote');
    //load the content for galleries
    elseif ( get_post_format($post) == "gallery" )
        get_template_part('includes/content', 'gallery');
    elseif ( get_post_format($post) == "link" )
        get_template_part('includes/content', 'link');
    //load content for any other post type
    else
        get_template_part('includes/content', 'standard');
}
endif;

if ( ! function_exists( 'themeora_excerpt_more' ) ) :
/**
 * Add our own read more link to the except
 * @return block of html for a read more link
 */

function themeora_excerpt_more() {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. __('...read more', 'atwood') . '</a>';
}
endif;

add_filter( 'excerpt_more', 'themeora_excerpt_more' );


if ( ! function_exists( 'themeora_default_page_loop' ) ) :
/**
 * Default loop
 *
 * Run a loop based off the provided page id. If no id is passed in, just do a standard loop.
 * Used to return various pages for the single page template.
 * @param int $page. The id of the page
 * @param boolean $sidebar. Should the sidebar be shown
 * @return the page structure for full width or default page
 */
function themeora_default_page_loop( $page = null, $sidebar = null ) { 
    $col_span = $sidebar === true ? 'col-md-8' : 'col-md-12';
    $template = get_page_template_slug( $page );
    ?>
    <div class="full-width-container <?php echo $template; ?>">
        <div class="container">
            <div class="row">
                <div class="<?php echo $col_span ?>">
                    <article class="single-page-article styled-box">
                        <div class="content">
                            <?php if ( have_posts() ) : ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <h1 class="title"><span><?php the_title(); ?></span></h1>
                                    <?php the_content(); ?>
                                    
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php _e('No posts found', 'atwood'); ?>
                            <?php endif; ?>
                        </div>
                    </article><!-- end col-md-8 / col-md-12 -->
                    
                    <!-- begin comments -->
                    <?php if ( comments_open() || get_comments_number() ) : ?>
                        <div class="blog-comments styled-box mobile-stack">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- end comments -->
                    
                </div>
                <?php 
                if ( $sidebar === true ) {
                    get_sidebar('page');
                }
                ?>

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end main-content-area -->
<?php }
endif;


if ( ! function_exists( 'themeora_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 * @since Twenty Thirteen 1.0
 * @return string The Link format URL.
 */
function themeora_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;