<?php

/*  Settings from customiser
--------------------------------------------------------------------- */
if ( !function_exists('Themeora_Customize_Variables') ) {
    function Themeora_Customize_Variables() {

    //Colours
    $theme_accent_color = get_theme_mod('theme_accent_color', '#428BCA');
    $body_text_color = get_theme_mod('body_text_color', '#4e4e4e');
    $body_sec_text_color = get_theme_mod('body_sec_text_color', '#B7B7B7');

    //Images
    $logo_upload_width = get_theme_mod('img-upload-logo-width');

    //Typography
    $header_text_color = get_theme_mod('header_text_color');
    $type_heading_weight = get_theme_mod('type_heading_weight');
    $type_select_logo = get_theme_mod('type_select_logo');
    $logo_size = get_theme_mod('type_logo_size');
    $logo_lineheight = get_theme_mod('type_logo_lineheight');
    $logo_letterspacing = get_theme_mod('type_logo_letterspacing');

    $type_select_headings = get_theme_mod('type_select_headings');

    $type_select_body = get_theme_mod('type_select_body');

    //Buttons
    $primary_button_color = get_theme_mod('button_primary_color');
    $primary_button_hover_color = get_theme_mod('button_primary_hover_color');
    ?>

<style>

<?php

/*  Apply colours to page elements
--------------------------------------------------------------------- */

$customizations =
'
blockquote { border-left: 5px solid '.$theme_accent_color.' !important; }
.cats,
.author-tag,
.post-pagination a:hover,
.comment-author a:hover,
.site-description a:hover,
.logo a h1:hover,
.wp-playlist-light .wp-playlist-playing .wp-playlist-item-title,
.wp-playlist-dark .wp-playlist-playing .wp-playlist-item-title,
.wp-playlist-light .wp-playlist-playing .wp-playlist-caption,
.wp-playlist-dark .wp-playlist-playing .wp-playlist-caption { color:'.$theme_accent_color.' !important; }

h4.entry-title a, h1, h1 a, h2 a, h3, h4, h5 { color:'.$header_text_color.' !important; }
body, form label  { color:'.$body_text_color.' !important; }

.btn, .btn:visited { background: '. $primary_button_color .' !important; }
.btn:hover, .btn:focus { background: '. $primary_button_hover_color .' !important; }

.subtext,
.post-date,
#wp-calendar tbody,
a.comment-edit-link,
.widget_categories li,
.comment-author .url-tag,
blockquote cite,
.entry-content .wp-playlist-item-length,
.footer-bottom,
.meta { color:'.$body_sec_text_color.' !important; }

img.logo-uploaded {width:' . $logo_upload_width . 'px;}
';


/*  Apply fonts
--------------------------------------------------------------------- */
if( themeora_theme_supports( 'primary', 'fonts' ))
{

     if($type_select_headings != 'default') {
          $headings_output = '
          h1,
          h2,
          h3,
          h4,
          h5,
          .comment-author cite
          { font-family: '.$type_select_headings.' !important; }';
     } else { $headings_output = ''; }

     if($type_select_body != 'default') {
          $body_output =
          'p,
          body,
          input,
          .btn,
          textarea,
          .tagcloud a,
          .btn[type="submit"],
          input[type="button"],
          input[type="reset"],
          input[type="submit"],
          #cancel-comment-reply-link { font-family: '.$type_select_body.' !important; }';
     } else { $body_output = ''; }

     $custom_fonts_output = '
     h1, h1 p { font-size: '.$h1_size.'px !important; line-height: '.$h1_lineheight.'px !important; letter-spacing: '.$h1_letterspacing.'px !important; font-weight: '. $type_heading_weight .' !important; }
     h2 { font-size: '.$h2_size.'px !important; line-height: '.$h2_lineheight.'px !important; letter-spacing: '.$h2_letterspacing.'px !important; font-weight: '. $type_heading_weight .' !important; }
     h3 { font-size: '.$h3_size.'px !important; line-height: '.$h3_lineheight.'px !important; letter-spacing: '.$h3_letterspacing.'px !important; font-weight: '. $type_heading_weight .' !important; }
     h4 { font-size: '.$h4_size.'px !important; line-height: '.$h4_lineheight.'px !important; letter-spacing: '.$h4_letterspacing.'px !important; font-weight: '. $type_heading_weight .' !important; }
     h5 { font-size: '.$h5_size.'px !important; line-height: '.$h5_lineheight.'px !important; letter-spacing: '.$h5_letterspacing.'px !important; font-weight: '. $type_heading_weight .' !important; }

     p, body { font-size: '.$body_size.'px !important; line-height: '.$body_lineheight.'px !important; letter-spacing: '.$body_letterspacing.'px !important; }
     .logo-text { font-size: '.$logo_size.'px; line-height: '.$logo_lineheight.'px; letter-spacing: '.$logo_letterspacing.'px; }
     ';

     //Logo
     if($type_select_logo !='default') {
          $logo_output = '.logo-text { font-family: '.$type_select_logo.'!important; }';
     }

     //Compile settings ready for output
     $customfonts = $logo_output . $custom_fonts_output . $body_output . $headings_output;

} else {
     $customfonts = '';
}


/*  Build the final output
--------------------------------------------------------------------- */

$customizer_final_output = $customfonts .$customizations;

$final_output = preg_replace('#/\*.*?\*/#s', '', $customizer_final_output);
$final_output = preg_replace('/\s*([{}|:;,])\s+/', '$1', $final_output);
$final_output = preg_replace('/\s\s+(.*)/', '$1', $final_output);
echo $final_output;
?>
</style>
<?php }

//Add final output to the head section

add_action( 'wp_head', 'Themeora_Customize_Variables', 1 );

}
