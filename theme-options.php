<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/* ------------------------------------------------------------------------ *
 * Setting Registration for theme Appeal
 * ------------------------------------------------------------------------ */

/**
 * Initializes the theme options page by registering the Sections,
 * Fields, and Settings.
 *
 * This function is registered with the 'admin_init' hook.
 */
add_action( 'admin_init', 'appeal_add_theme_settings' );
add_action( 'admin_menu', 'appeal_add_options_page' );
/**
 * Add theme menu
 *
 * @since 1.0.6
 * @uses add_theme_page()
 * $page_title, $menu_title, $capability, $menu_slug, $function
 */

function appeal_add_options_page() {

    add_theme_page(

        __( 'Instructions Etc', 'appeal' ),
         __( 'Theme Options', 'appeal' ),
        'manage_options',
        'appeal_page_elements',
        'appeal_display_options_page'
    );
}

/**
 * Add theme settings and section
 *
 * @since 1.0.6
 * @uses add_settings_section()
 * $id, $title, $callback, $page
 */
function appeal_add_theme_settings() {

        add_settings_section (
            'appeal_page_section',
            __( 'Theme Overview', 'appeal' ),
            'appeal_options_page_callback',
            'appeal_page_elements'
        );
}

function appeal_options_page_callback() {

    echo esc_attr( '<h2>' );
    esc_html_e( 'Appeal Theme Instructions and General Information', 'appeal' );
    echo esc_attr( '</h2>' );
}

/**
 * This function renders the interface elements.
 *
 * It accepts an array of arguments and expects the first element in the array to be the description
 * to be displayed.
 */
function appeal_display_options_page() {

?>

<div class="wrap">
    <h1><div id="icon-info" class="dashicons dashicons-welcome-learn-more"></div>
    <?php esc_html_e( 'Appeal theme page', 'appeal' ); ?></h1>

        <h3><?php esc_html_e( 'General Overview of Theme Settings', 'appeal' ); ?></h3>

        <table class="widefat" style="max-width:100%;">

<thead><tr>
<th width=200"><?php esc_html_e( 'Excerpt Instructions', 'appeal' ); ?></th>
<th width=200"><?php esc_html_e( 'Two Part Page', 'appeal' ); ?></th>
<th width=200"><?php esc_html_e( 'Three Wide Page', 'appeal' ); ?></th>
<th width=150"><?php esc_html_e( 'Tips and Information', 'appeal' ); ?></th>
</tr></thead><tbody style="padding: 7px;">

<tr>

<td style="border-right:1px solid #eee;"><p><?php esc_html_e( 'To utilize the Pullquote excerpt option you will need to enable the Screen Options from the Pages or Posts Editor page. See first picture below.', 'appeal' ); ?></p><p><?php esc_html_e( 'To add the Pullquote you will use the Excerpt box which should now appear at the bottom of the Editor box. See picture 2 below.', 'appeal' ); ?></p></td>

<td style="border-right:1px solid #eee;"><?php esc_html_e( 'Page template that is TwoPart Template can divide the page content by using the', 'appeal' ); ?>
<code style="display:inline-block">&lt;!--more--></code> <?php _e( 'tag.<sup>1</sup> <strong>Place the more-tag at the point where you want the page content to split in half.</strong> Test your height by viewing and pre-defining your content with a private page in order to achieve a balanced layout of paragraphs prior to publishing<sup>2</sup>. <b>Shift+Alt+j</b> in editor will justify text alignment.', 'appeal' ); ?></td>

<td style="border-right:1px solid #eee;"><?php esc_html_e( 'Three Width Page Template is a normal copy of your content and displays the page with small sidebar on the left and a wider sidebar on the right.', 'appeal' ); ?><p><?php _e( 'Also note that <strong>if theme is set to render posts &lt;blog> as home page</strong> Three Wide Template will be the home page.', 'appeal' ); ?></p> </td>

<td><h4><?php esc_html_e( 'Customize Theme', 'appeal' ); ?></h4>
<p><?php printf(
    __( 'To set up the Pullquote color, width and length, open Customizer </p>
    <p style="text-align:center"><a href="%s" class="button-primary">customizer</a>', 'appeal' ),
    admin_url( 'customize.php?autofocus[control]=appeal_custom_teaser_length' )
    ); ?></p><hr></td>

</tr>

<tr>

<td style="padding:1px 1px;"><figure style="border:2px dashed gray;margin-bottom:5px;padding:0"><a href="<?php echo get_template_directory_uri() . '/assets/imgs/screenshot-03.png'; ?>"><img src="<?php echo get_template_directory_uri() . '/assets/imgs/screenshot-03.png'; ?>" alt="" width="200"/></a></figure>
<figcaption style="line-height:.48;text-align:center;padding: 0"><?php esc_html_e( 'Screen Options pull-down menu', 'appeal' ); ?></figcaption>
<figure style="border:2px dashed gray;margin-bottom:5px;padding:0""><img src="<?php echo get_template_directory_uri() . '/assets/imgs/screenshot-04.png'; ?>" alt="" width="200"/></figure><figcaption style="line-height:.48;padding: 0;text-align:center"><?php esc_html_e( 'Editor Excerpt meta-box for Pullquote', 'appeal' ); ?></figcaption>
<div style="padding: 7px;">
    <hr>
    <h5><?php esc_html_e( 'Other Notes', 'appeal' ); ?></h5><small style="line-height:.48;"><?php esc_html_e( '&bull; Author Links are taken from the User Profile. Be creative by adding user profile info into Bio textarea.', 'appeal' ); ?><br>&bull; <?php esc_html_e( 'To set up social media links in the page footer--and the popup--use Appearance > Menus  then create your links using the <Custom Links> panel.', 'appeal' ); ?></small>
</div></td>

<td style="padding: 1px 1px;border-left:1px solid #eee;">
<figure style="padding:0" class="aligncenter"><img src="<?php echo get_template_directory_uri() . '/assets/imgs/screenshot-twopart.png'; ?>" alt="" height="240"/></figure>
<p style="line-height:1;padding: 0 7px;"><small><sup>1</sup><?php esc_html_e( 'ref. use more tag in editor:', 'appeal' ); ?> https://codex.wordpress.org/Customizing_the_Read_More</small></p>
<p style="line-height:1;padding: 0 7px;"><small><sup>2</sup><?php esc_html_e( 'ref. private page viewing:', 'appeal' ); ?> https://codex.wordpress.org/Content_Visibility</small></p>
</td>

<td style="border-left:1px solid #eee;padding: 1px 3px;">
<figure style="padding:0"><img src="<?php echo get_template_directory_uri() . '/assets/imgs/screenshot-05.png'; ?>" alt="" width="200"/></figure><figcaption style="padding: 0;text-align:center"><?php esc_html_e( 'Three Wide Template', 'appeal' ); ?></figcaption>
<div style="padding: 7px">
    <h4><?php esc_html_e( 'Full width Template', 'appeal' ); ?></h4>
    <?php esc_html_e( 'Appeal has an additional template Full Width Page that can be used for galleries or larger content.', 'appeal' ); ?>
</div></td>

<td style="border-left:1px solid #eee;padding: 1px 7px;">
<p style="padding: 5px 7px"><?php _e( '<h5>Other notes: </h5> &bull; By hiding titles of posts/pages, your titles can be added from your <b>Editor</b> to give better SEO URLs and puts title where you want it in the article. h3 tag is pre styled to match theme. <b>The Editor Title box will be the url name.</b> This is required.', 'appeal' ); ?></p>
<p style="padding: 5px 7px"><a href="http://themes.tradesouthwest.com/wordpress/" target="_blank" title="=|=">Tradesouthwest</a></p></td>

</tr></tbody></table>

<hr>

<table><tbody><tr>
<td><p><?php esc_html_e( 'Also try the Plugin Depict by TSW to create an expanded Author Profile for this theme.', 'appeal' );?></p><p><?php printf( __( 'Plugin can be found online at <a href="%s" title="w.org plugins" target="_blank">https://wordpress.org/plugins/depict/</a>', 'appeal' ), 'https://wordpress.org/plugins/depict/' ); ?></p></td>

<td><p style="padding-left:60px"><a href="https://paypal.me/tradesouthwest" class="button button-primary"  title="paypal.me/tradesouthwest Opens in new window" target="_blank"><?php esc_html_e( 'Donate if you like.', 'appeal' ); ?></a> <span><a style="text-align:center;width:80px;background: #fdfdfd;padding:7px" href="https://twitter.com/tradesouthwest" title="Twitter" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/imgs/alpha-twitter.png'; ?>" alt="tweet" width="28" style="position: relative;top:8px;"/></a></span></p></td>
</tr><tbody><table>
</div>
<?php

}
?>
