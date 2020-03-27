<?php

/*  -----------------------------------------------------------------------------------------------
  THEME SUPPORTS
  Default setup.
  --------------------------------------------------------------------------------------------------- */

  function baena_theme_support() {
    // Automatic feed
    add_theme_support( 'automatic-feed-links' );

    // Custom background color
    add_theme_support( 'custom-background', apply_filters( 'baena_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Set content-width
    global $content_width;
    if ( ! isset( $content_width ) ) {
      $content_width = 980;
    }

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Custom logo
    add_theme_support( 'custom-logo', array(
      'height'      => 100,
      'width'       => 400,
      'flex-width' => true,
    ) 
    );

    // Title tag
    add_theme_support( 'title-tag' );

    // HTML5 semantic markup
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Make the theme translation ready
    load_theme_textdomain( 'baena', get_template_directory() . '/languages' );

    // Alignwide and alignfull classes in the block editor
    add_theme_support( 'align-wide' );

    // Custom header
    add_theme_support( 'custom-header', apply_filters( 'baena_custom_header_args', array(
      'default-image'          => '',
      'width'                  => 250,
      'height'                 => 250,
      'flex-height'            => true
    ) ) );

    // Style
    add_editor_style( get_stylesheet_directory_uri() . '/css/editor-style.css' );

    add_theme_support( 'customize-selective-refresh-widgets' );

    }
    add_action( 'after_setup_theme', 'baena_theme_support' );



/*  -----------------------------------------------------------------------------------------------
  REGISTER STYLES & SCRIPTS
  Register and enqueue CSS & JavaScript
  --------------------------------------------------------------------------------------------------- */

  function baena_main_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'baena_main', get_template_directory_uri() . '/assets/css/baena_main.css', array(), '1.1', 'all');
    wp_enqueue_style( 'baena_normalize', get_template_directory_uri() . '/assets/css/baena_normalize.css', array(), '1.1', 'all');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Noto+Serif:400,700|Quicksand:400,500,700', array());
        
    wp_enqueue_script( 'baena_main-script', get_template_directory_uri() . '/assets/js/baena_main.js', array( 'jquery' ));
    wp_enqueue_script( 'baena_jquery.slides.min', get_template_directory_uri() . '/assets/js/baena_jquery.slides.min.js', array( 'jquery' ));
  
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'baena_main_scripts' );

//ELIMINAR EL AVISO DE MIGRATE, PARA JQUERY ANTIGUO UTILIZADO
  add_action( 'baena_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
      $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
  } );


/*  -----------------------------------------------------------------------------------------------
  MENUS
  Register navigational menus (wp_nav_menu)
  --------------------------------------------------------------------------------------------------- */

  function baena_menus() {
    register_nav_menus(
      array(
        'menut' => __( 'Menu superior', 'baena' ), 
        'sidemenu' => __( 'Menu redes sociales', 'baena' ),
        'menubottom' => __( 'Menu en el pie', 'baena' )
      )
    );
  }
  add_action( 'init', 'baena_menus' );


/* ------------------------------------------------------------------------------------------------
   REGISTER THEME WIDGETS
   --------------------------------------------------------------------------------------------------- */

   function baena_widgets_baena() {
    register_sidebar( array(
      'name'          => esc_html__( 'widget del pie', 'baena' ),
      'id'            => 'widgetspie',
      'description'   => esc_html__( 'Add widgets here.', 'baena' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'widget de la columna', 'baena' ),
      'id'            => 'widgetscolumna',
      'description'   => esc_html__( 'Add widgets here.', 'baena' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
  }
  add_action( 'widgets_init', 'baena_widgets_baena' );



/*  -----------------------------------------------------------------------------------------------
  EXCERPT
  --------------------------------------------------------------------------------------------------- */

  function baena_custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_excerpt() , true );
    echo wp_trim_words($content, $word_count_limit);
  }
  add_filter('baena_custom_length_excerpt', 'baena_custom_length_excerpt');
  
  function baena_new_excerpt_more( $more ) {
    return '  ...';
  }
  add_filter('excerpt_more', 'baena_new_excerpt_more');

/*  -----------------------------------------------------------------------------------------------
  HIGHLIGHT RESULTS AND SEARCHS
  --------------------------------------------------------------------------------------------------- */

  function baena_wps_highlight_results($text){
   if(is_search()){
     $sr = get_query_var('s');
     $keys = explode("+",$sr);
     $text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="terminos-destacados">'.$sr.'</strong>', $text);
   }
   return $text;
 }
 add_filter('the_excerpt', 'baena_wps_highlight_results');
 add_filter('the_title', 'baena_wps_highlight_results');
 add_filter('the_author', 'baena_wps_highlight_results');
 add_filter( 'posts_search', 'baena_db_filter_authors_search' );
 
 function baena_db_filter_authors_search( $posts_search ) {
  if ( !is_search() || empty( $posts_search ) )
    return $posts_search;
  global $wpdb;
  add_filter( 'pre_user_query', 'baena_db_filter_user_query' );
  $search = sanitize_text_field( get_query_var( 's' ) );
  $args = array(
    'count_total' => false,
    'search' => sprintf( '*%s*', $search ),
    'search_fields' => array(
      'display_name',
      'user_login',
    ),
    'fields' => 'ID',
  );
  $matching_users = get_users( $args );
  remove_filter( 'pre_user_query', 'baena_db_filter_user_query' );

  if ( empty( $matching_users ) )
    return $posts_search;

  $posts_search = str_replace( ')))', ")) OR ( {$wpdb->posts}.post_author IN (" . implode( ',', array_map( 'absint', $matching_users ) ) . ")))", $posts_search );
  return $posts_search;
}
function baena_db_filter_user_query( &$user_query ) {
  if ( is_object( $user_query ) )
    $user_query->query_where = str_replace( "user_nicename LIKE", "display_name LIKE", $user_query->query_where );
  return $user_query;
}


/*  -----------------------------------------------------------------------------------------------
  COPYRIGHT & YEAR
  Default setup.
  --------------------------------------------------------------------------------------------------- */

  function baena_display_copyright( $iYear = null, $szSeparator = " - ", $szTail = '. Porque somos molones.' )
  {
    echo '<div id="copyright">' . baena_display_years( $iYear, $szSeparator, false ) . ' &copy; ' . get_bloginfo('name') . $szTail . '</div>';
  }

  function baena_display_years( $iYear = null, $szSeparator = " - ", $bPrint = true )
  {
    $iCurrentYear = ( date( "Y" ) );
    if ( is_int( $iYear ) )
      {$iYear = ( $iCurrentYear > $iYear ) ? $iYear = $iYear . $szSeparator . $iCurrentYear : $iYear;
      } else {
        $iYear = $iCurrentYear;}
        if ( $bPrint == true ) echo $iYear; else return $iYear;
      }

/*  -----------------------------------------------------------------------------------------------
  METABOX
  Metabox.
  --------------------------------------------------------------------------------------------------- */
  function baena_metabox() {
    add_meta_box( 'books-metabox', 'Info de los books', 'baena_campos_books', 'post', 'normal', 'high' );
  }
  add_action( 'add_meta_boxes', 'baena_metabox' );
   
  function baena_campos_books($post) {
    $book = get_post_meta( $post->ID, 'book', true );
    $author = get_post_meta( $post->ID, 'author', true );
    $format = get_post_meta( $post->ID, 'format', true );  
    $array_format = array("Select the format", 
          'ePub' =>'ePub',           
          'Mobi' =>'Mobi', 
          'Papel' =>'Papel', 
          'Pdf' =>'Pdf', 
          'Txt' =>'Txt', 
     );    
    wp_nonce_field( 'baena_campos_books_metabox', 'baena_campos_books_metabox_nonce' );?>
   
    <table width="100%" cellpadding="1" cellspacing="1" border="0">
      <tr>
        <td width="20%"><strong>Book Title : </strong><br /></td>
        <td width="80%"><input type="text" name="book" value="<?php echo sanitize_text_field($book);?>" class="large-text" placeholder="Book Title" /></td>
      </tr>
      <tr>
        <td><strong>Author : </strong></td>
        <td><input type="text" name="author" value="<?php echo sanitize_text_field($author);?>" class="large-text" placeholder="author" /></td>
      </tr>
      <tr>
        <td><strong>Format :</strong><br /></td>
        <td><select name="format" class="postform">
          <?php foreach ($array_format as $key => $format) {?>
            <option value="<?php echo ($key);?>" <?php if ($format == $key){?>selected="selected"<?php }?>><?php echo $format;?></option>
          <?php }?>
        </select></td>
      </tr>
    </table>
  <?php }?>
      
  <?php
  function baena_campos_books_save_data($post_id) {

    if ( ! isset( $_POST['baena_campos_books_metabox_nonce'] ) ) {
      return $post_id;
    }
    $nonce = $_POST['baena_campos_books_metabox_nonce']; 

    if ( !wp_verify_nonce( $nonce, 'baena_campos_books_metabox' ) ) {
      return $post_id;
    } 

    if ( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return $post_id;
    } 

    if ( $_POST['post_type'] == 'page' ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
        return $post_id;
    } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }

    $old_book = get_post_meta( $post_id, 'book', true );
    $old_author = get_post_meta( $post_id, 'author', true );
    $old_format = get_post_meta( $post_id, 'format', true );
   
    $book = sanitize_text_field( $_POST['book'] );
    $author = sanitize_text_field( $_POST['author'] );
    $format = sanitize_text_field( $_POST['format'] );
   
    update_post_meta( $post_id, 'book', $book, $old_book );
    update_post_meta( $post_id, 'author', $author, $old_author );
    update_post_meta( $post_id, 'format', $format, $old_format );
  }
  add_action( 'save_post', 'baena_campos_books_save_data' );
  add_filter( 'the_content', 'baena_add_custom_fields_to_content' );

  function baena_add_custom_fields_to_content( $content ) {
      $custom_fields = get_post_custom();
      $content .= "<div class='campos'>";
      if( isset( $custom_fields['book'] ) ) {
           $content .= '<li>book: '. $custom_fields['book'][0] . '</li>';
      }
      if( isset( $custom_fields['author'] ) ) {
           $content .= '<li>author: ' . $custom_fields['author'][0] . '</li>';
      }
      if( isset( $custom_fields['format'] ) ) {
           $content .= '<li>format: ' . $custom_fields['format'][0] . '</li>';  
      $content .= '</div>';
    }
      return $content;
  }
/*End Metabox*/


?>