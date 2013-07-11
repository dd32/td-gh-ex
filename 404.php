<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="blog-header">
        <h1 class="blog-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <h2 class="blog-description"><?php bloginfo( 'description' ); ?> | <a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php _e( 'Subscribe to the RSS Feed of this site', 'content' ); ?>" id="rss">RSS</a></h2>
    </header>
    <div id="page" class="hfeed container">
        <div id="wrapper" class="content">
            <article id="post-0" class="post error404 no-results not-found">
                <header class="post-header">
                    <h1 class="post-title"><?php _e( 'Error: page not found.', 'content' ); ?></h1>
                </header>
                <div class="post-content">
                    <p><?php _e( 'Please come back and search again.', 'content' ); ?></p>
                </div>
            </article>
        </div>
    <footer id="footer">
        <p class="footer-notes"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <?php printf( __( 'is based on', 'content' ) ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'content' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'content' ); ?>" rel="generator"><?php printf( __( '%s', 'content' ), 'WordPress' ); ?></a>.</p>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>