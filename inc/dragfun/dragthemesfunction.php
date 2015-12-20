<?php
/*---------------------------------------------------
Copyright DragThemes
----------------------------------------------------*/
/**
 * Catching First Image of Post
 */
function howlthemes_catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){
  $first_img = $matches [1] [0];
  }
  return $first_img;
}

 
function howlthemes_foot(){?>
<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
  <div class="container">
    <div class="three-column-footer">
        <?php dynamic_sidebar( 'footer-1' ); ?>

      </div>
      </div><!-- .site-info -->
  </footer><!-- #colophon -->
   <div class="copyright">
   <div class="container">
   <div class="copyright-text">
  <?php _e('Designed By' ); ?> <a href="http://www.howlthemes.com" target="blank" style="color:#efefef;text-decoration:none;">HowlThemes</a>
   </div>
   <div class="back-top">
   <a href="#" id="back-to-top" title="Back to top"><?php _e('Back To Top' ); ?><i class="fa fa-arrow-circle-o-up"></i></a>
   </div>
   </div>
   </div>
</div><!-- #page -->
<?php }


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function howlthemes_customizer( $wp_customize ) {
    
  $wp_customize->add_section( 'howl-themes_logo_section' , array(
    'title'       => __( 'Logo', 'howl-themes' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );

  $wp_customize->add_setting( 'howl-themes_logo',
     array ( 'default' => '',
    'sanitize_callback' => 'esc_url_raw'
    ));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'howl-themes_logo', array(
    'label'    => __( 'Logo', 'howl-themes' ),
    'section'  => 'howl-themes_logo_section',
    'settings' => 'howl-themes_logo',
) ) );

 $wp_customize->add_section( 'howl-themes_favicon_section' , array(
    'title'       => __( 'Favicon', 'howl-themes' ),
    'priority'    => 30,
    'description' => 'Upload custom favicon.',
) );

  $wp_customize->add_setting( 'howl-themes_favicon',
   array ( 'default' => '',
    'sanitize_callback' => 'esc_url_raw'
    ));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'howl-themes_favicon', array(
    'label'    => __( 'Favicon', 'howl-themes' ),
    'section'  => 'howl-themes_favicon_section',
    'settings' => 'howl-themes_favicon',
) ) );

// Styling Panel
$wp_customize->add_panel( 'styling', array(
  'title' => __( 'Styling', 'howl-themes'),
  'priority' => 60, // Mixed with top-level-section hierarchy.
) );

//Theme Layout

$wp_customize->add_section( 'howl-themes_layout_section' , array(
    'title'       => __( 'Choose layout', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'styling',

) );

$wp_customize->add_setting(
    'layout_placement',
    array(
        'default' => 'full',
        'sanitize_callback' => 'sanitize_key',
    )
);
 
$wp_customize->add_control(
    'layout_placement',
    array(
        'type' => 'radio',
        'label' => 'Theme Layout',
        'section' => 'howl-themes_layout_section',
        'choices' => array(
            'full' => 'Full Width',
            'boxed' => 'Boxed',
        ),
    )
);

//Background Image
  $wp_customize->add_section( 'howl-themes_bg_img' , array(
    'title'       => __( 'Background Image', 'howl-themes' ),
    'priority'    => 30,
    'description' => 'It will work only if theme layout is Boxed.',
    'panel' => 'styling',
) );

  $wp_customize->add_setting( 'howl-themes_bgimg',
    array ( 'default' => '',
    'sanitize_callback' => 'esc_url_raw'
    ));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'howl-themes_bgimg', array(
    'section'  => 'howl-themes_bg_img',
    'settings' => 'howl-themes_bgimg',
) ) );

// Home Panel
$wp_customize->add_panel( 'frontpage', array(
  'title' => __( 'Home Page Setting', 'howl-themes'),
  'priority' => 40, // Mixed with top-level-section hierarchy.
) );

//Home Page Display

$wp_customize->add_section( 'howl-themes_magazine' , array(
    'title'       => __( 'Front Page', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'frontpage',

) );

$wp_customize->add_setting(
    'home_display',
    array(
        'default' => 'blog',
        'sanitize_callback' => 'sanitize_key',
    )
);
 
$wp_customize->add_control(
    'home_display',
    array(
        'type' => 'radio',
        'label' => 'Home Page Display',
        'section' => 'howl-themes_magazine',
        'choices' => array(
            'blog' => 'Latest posts - Blog Layout',
            'magazine' => 'News Boxes - use Home Builder',
        ),
    )
);

//Slider
$wp_customize->add_section( 'howl-themes_newsbox_one' , array(
    'title'       => __( 'News Boxes', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'frontpage',
) );


$wp_customize->add_setting(
    'newsbox_one',
    array(
        'default' => 'uncategorized',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
 
$categories = get_categories('hide_empty=0&orderby=name');
$all_cats = array();
foreach ($categories as $category_item ) {
$all_cats[$category_item->cat_ID] = $category_item->cat_name;
}

$wp_customize->add_control(
    'newsbox_one',
    array(
        'type' => 'select',
        'label' => 'Choose category for slider:',
        'section' => 'howl-themes_newsbox_one',
        'choices' => $all_cats,
    )
);

//Carousel
$wp_customize->add_setting(
    'newsbox_two',
    array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    'newsbox_two',
    array(
        'type' => 'select',
        'label' => 'Choose category for carousel:',
        'section' => 'howl-themes_newsbox_one',
        'choices' => $all_cats,
    )
);

$wp_customize->add_setting(
    'newsbox_three',
    array(
        'default' => 'uncategorized',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'newsbox_three',
    array(
        'type' => 'select',
        'label' => 'Choose Category for Grid box 1:',
        'section' => 'howl-themes_newsbox_one',
        'choices' => $all_cats,
    )
);

$wp_customize->add_setting(
    'newsbox_four',
    array(
        'default' => 'uncategorized',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'newsbox_four',
    array(
        'type' => 'select',
        'label' => 'Choose Category for Grid box 2:',
        'section' => 'howl-themes_newsbox_one',
        'choices' => $all_cats,
    )
);

$wp_customize->add_setting(
    'newsbox_five',
    array(
        'default' => 'uncategorized',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'newsbox_five',
    array(
        'type' => 'select',
        'label' => 'Choose Category for blog box:',
        'section' => 'howl-themes_newsbox_one',
        'choices' => $all_cats,
    )
);


//Theme color
$wp_customize->add_section( 'howl-themes_theme_color' , array(
    'title'       => __( 'Theme Color', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'styling',
) );

$wp_customize->add_setting(
    'color-setting',
    array(
        'default' => '#d23f50',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'color-setting',
        array(
            'label' => 'Color Setting',
            'section' => 'howl-themes_theme_color',
            'settings' => 'color-setting',
        )
    )
);
//Link color
$wp_customize->add_section( 'howl-themes_link_color' , array(
    'title'       => __( 'Link Color', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'styling',

) );

$wp_customize->add_setting(
    'linkcolor-setting',
    array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'linkcolor-setting',
        array(
            'label' => 'Link Color',
            'section' => 'howl-themes_link_color',
            'settings' => 'linkcolor-setting',
        )
    )
);
$wp_customize->add_setting(
    'linkcolorhover-setting',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'linkcolorhover-setting',
        array(
            'label' => 'Link Hover Color',
            'section' => 'howl-themes_link_color',
            'settings' => 'linkcolorhover-setting',
        )
    )
);

//Typography

$wp_customize->add_panel( 'typo', array(
  'title' => __( 'Typography', 'howl-themes'),
  'priority' => 80, // Mixed with top-level-section hierarchy.
) );
$wp_customize->add_section( 'howl-themes_typography' , array(
    'title'       => __( 'Choose Font', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'typo',
) );
$wp_customize->add_setting(
   'typography-setting',
    array(
        'default' => 'Josefin Sans',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
     'typography-setting',
    array(
        'type' => 'select',
        'section' => 'howl-themes_typography',
        'choices' => array(

'Playfair Display' => 'Playfair Display',
'Work Sans' => 'Work Sans',
'Alegreya' => 'Alegreya',
'Alegreya Sans' => 'Alegreya Sans',
'Inconsolata' => 'Inconsolata',
'Source Sans Pro' => 'Source Sans Pro',
'Source Serif Pro' => 'Source Serif Pro',
'Neuton' => 'Neuton',
'Poppins' => 'Poppins',
'Crimson Text' => 'Crimson Text',
'Archivo Narrow' => 'Archivo Narrow',
'Libre Baskerville' => 'Libre Baskerville',
'Roboto' => 'Roboto',
'Karla' => 'Karla',
'Lora' => 'Lora',
'Chivo' => 'Chivo',
'Domine' => 'Domine',
'Old Standard TT' => 'Old Standard TT',
'Varela Round' => 'Varela Round',
'Open Sans' => 'Open Sans',
'Raleway' => 'Raleway',
'Josefin Sans' => 'Josefin Sans',
'Oswald' => 'Oswald',
'PT Sans' => 'PT Sans',
'Merriweather' => 'Merriweather',
'Lato' => 'Lato',
'Ubuntu' => 'Ubuntu',
'Bitter' => 'Bitter',
'Cardo' => 'Cardo',
'Arvo' => 'Arvo',
'Montserrat' => 'Montserrat',
'Rajdhani' => 'Rajdhani',
'Droid Sans' => 'Droid Sans',
'PT Serif' => 'PT Serif',
'Dosis' => 'Dosis',
        ),
    )
);

$wp_customize->add_section( 'howl-themes_fontcolor' , array(
    'title'       => __( 'Font color', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'typo',
) );
$wp_customize->add_setting(
    'fontcolor-setting',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fontcolor-setting',
        array(
            'label' => 'Font Color',
            'section' => 'howl-themes_fontcolor',
            'settings' => 'fontcolor-setting',
        )
    )
);

/**
 * Adds textarea support to the theme customizer
 */
class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'fontsize';
 
    public function render_content() {
        ?>
            <label>
                <input type="number" min="1" <?php $this->link(); ?> />
            </label>
        <?php
    }
}

$wp_customize->add_section( 'howl-themes_fontsize' , array(
    'title'       => __( 'Font size', 'howl-themes' ),
    'priority'    => 30,
    'panel' => 'typo',
) );
$wp_customize->add_setting( 
  'fontsize',
    array(
        'default' => '18',
        'sanitize_callback' => 'sanitize_text_field',
    )
  );
 
$wp_customize->add_control(
    new Example_Customize_Textarea_Control(
        $wp_customize,
        'fontsize',
        array(
            'section' => 'howl-themes_fontsize',
            'settings' => 'fontsize'
        )
    )
);

//Social

  $wp_customize->add_section(
        'social_icons',
        array(
            'title' => 'Social',
            'description' => 'Add URLs',
            'priority' => 60,
        )
    );
    $wp_customize->add_setting(
    'fsocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
    'fsocial_url',
    array(
        'label' => 'Facebook',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
     $wp_customize->add_setting(
    'tsocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
    'tsocial_url',
    array(
        'label' => 'Twitter',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
  $wp_customize->add_setting(
    'gsocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
    'gsocial_url',
    array(
        'label' => 'Google+',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
  $wp_customize->add_setting(
    'psocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
    'psocial_url',
    array(
        'label' => 'Pinterest',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
  $wp_customize->add_setting(
    'isocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
    'isocial_url',
    array(
        'label' => 'Instagram',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
  $wp_customize->add_setting(
    'lsocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
    'lsocial_url',
    array(
        'label' => 'Linkedin',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
  $wp_customize->add_setting(
    'ysocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
    'ysocial_url',
    array(
        'label' => 'Youtube',
        'section' => 'social_icons',
        'type' => 'text',
    )
);
  $wp_customize->add_setting(
    'rsocial_url',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
    'rsocial_url',
    array(
        'label' => 'RSS',
        'section' => 'social_icons',
        'type' => 'text',
    )
);


$wp_customize->remove_section('static_front_page');
}
add_action( 'customize_register', 'howlthemes_customizer' );