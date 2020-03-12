<?php

if ( is_front_page() && is_home() ) {
    
    // Just seems easier to write it this way so that "Customizer" - > "Homepage Settings" - > "Homepage" - > (selected static page) displays properly
    return;

} elseif ( is_front_page() ) {

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="title-image-content" itemscope itemtype="http://schema.org/NewsArticle">

        <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>
            
<?php if ( has_post_thumbnail() ) : ?>

        <header id="title-and-image" style="background-image: url('<?php echo the_post_thumbnail_url( '1920x1080' ); ?>');">
            
        <?php if ( is_customize_preview() ) echo '<div class="customizer-tite-image"></div><div class="customizer-tite-image-2"></div><div class="customizer-tite-image-3"></div>'; ?>
            
            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                    <meta itemprop="url" content="<?php echo esc_url( the_post_thumbnail_url( '850x478' ) ); ?>">

                    <meta itemprop="width" content="<?php $semperfi_featured_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '850x478' ); $semperfi_featured_image_width = $semperfi_featured_image_data[1]; echo absint( $semperfi_featured_image_width ); ?>">

                    <meta itemprop="height" content="<?php $semperfi_featured_image_width = $semperfi_featured_image_data[2]; echo absint( $semperfi_featured_image_width ); ?>">

            </div>
<?php else : ?>

        <header id="title-and-image" >
            
        <?php if ( is_customize_preview() ) echo '<div class="customizer-tite-image"></div><div class="customizer-tite-image-2"></div><div class="customizer-tite-image-3"></div>'; ?>
<?php endif; ?>

            <h2 class='header-text' itemprop="headline"><?php if ( get_the_title() ) : the_title();  else : _e( '(No Title)' , 'semper-fi-lite' ); endif; ?></h2>

        </header>

        <main id="the-article" itemprop="articleBody" style="background-image:url(<?php echo esc_url( get_theme_mod( 'main_background_img_1' , get_template_directory_uri() . '/inc/single/images/eeeeee-mouse-chocolate-lab-tennis-ball-300x300.jpg' ) ); ?>);" >
            
            <?php edit_post_link( __( 'Edit this Post' , 'semper-fi-lite' ) ); ?>
                
            <?php do_action( 'semperfi_content_data' ); ?>
            
            <?php the_content(); ?>

            <?php wp_link_pages( array( 'before' => __( 'Pages: ' , 'semper-fi-lite' ) , 'after' => '</br>' ) ); if ( is_customize_preview() ) echo '<div class="customizer"></div>'; ?>

        </main>

    </article>

<?php endwhile; endif; }