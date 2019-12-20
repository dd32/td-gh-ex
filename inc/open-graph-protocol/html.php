<?php global $post; ?>
<meta property="og:title" content="<?php if ( is_home() || is_front_page() ) : bloginfo('name'); else : echo get_the_title(); endif; ?>" />
<meta property="og:description" content="<?php echo wp_trim_words( $post->post_content , 40 , '...' ); ?>" />
<meta property="og:image" content="<?php if ( has_post_thumbnail() && ( !is_home() || !is_front_page() ) ) { the_post_thumbnail_url( '1920x1080' ); } else { echo get_theme_mod( 'above_the_fold_img_1' , get_template_directory_uri() . '/images/moose-logo-1920x1080.jpg' ); } ?>" />
<meta property="og:image:secure_url" content="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url( '1920x1080' ); } else { echo get_theme_mod( 'above_the_fold_img_1' , get_template_directory_uri() . '/images/moose-logo-1920x1080.jpg' ); } ?>" />
<meta property="og:type" content="<?php echo ( is_product() ? 'product' : 'article'); ?>"/>
<meta property="og:locale" content="<?php echo $lang=get_bloginfo("language"); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:url" content="<?php echo get_permalink(); ?>" />
<?php if ( get_theme_mod( 'open_graph_protocol_fb_app_id_1' ) != 'fb:app_id' ) : ?><meta property="fb:app_id" content="<?php echo get_theme_mod( 'open_graph_protocol_fb_app_id_1' ); ?>" />
<?php endif; ?>
