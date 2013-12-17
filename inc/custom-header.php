<?php 
function rockers_custom_header_setup() {
    $args = array( 
        'default-text-color' => 'fff',
        'default-image' => '',
        'height' => 300,
        'width' => 960,
        'max-width' => 2000,
        'flex-height' => true,
        'flex-width' => true,
        'random-default' => true,
        'wp-head-callback' => 'rockers_header_style',
        'admin-head-callback' => 'rockers_admin_header_style',
        'admin-preview-callback' => 'rockers_admin_header_image',
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'rockers_custom_header_setup' );

function rockers_header_style() {
    $text_color = get_header_textcolor();
    if ( $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
        return; ?>
    <style type="text/css">
    <?php if ( ! display_header_text() ) : ?>
        .site-title,
        .site-description {
            display: none;
        }
    <?php else : ?>
        .site-title a,
        .site-description {
            color: #<?php echo $text_color; ?> !important;
        }
    <?php endif; ?>
    </style>
<?php }
function rockers_admin_header_style() { ?>
    <style type="text/css">
        .appearance_page_custom-header #headimg {
            border: 0;
        }
        
        #headimg h1,
        #headimg h2 {
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        #headimg h1 {
            font-size: 30px;
        }
        
        #headimg h1 a {
            color: #fffbe1;
            text-decoration: none;
        }

        #headimg h1 a:hover {
            color: #fbfeff;
        }

        #headimg h2 {
            color: #fbfeff;
            font: normal 14px/1.6 Source Sans Pro, verdana, sans-serif;
            margin-bottom: 24px;
        }
        
        #headimg img {
            max-width: <?php echo get_theme_support( 'custom-header', 'max-width' ); ?>px;
        }
    </style>
<?php } 

function rockers_admin_header_image() { ?>
    <div id="headimg">
        <?php if ( ! display_header_text() ) 
            $style = ' style="display: none;"';
        else 
            $style = ' style="color: #' . get_header_textcolor() . ';"'; ?>
        <h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h1>
        <h2 id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
            <img src="<?php echo esc_url( $header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
        <?php endif; ?>
    </div>
<?php }