<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Conica
 */

function customizer_library_conica_options() {

	$primary_color = '#64ace0';
	$secondary_color = '#148be0';

	$body_font_color = '#3C3C3C';
	$heading_font_color = '#1d1d1d';

    $slider_bg_color = '#1d1d1d';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;


    $panel = 'conica-panel-website';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Theme Settings', 'conica' ),
        'priority' => '20'
    );

    $section = 'conica-panel-website-section-website'; // --------------------------------- Website Layout Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Layout Settings', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $choices = array(
        'conica-skin-light' => __( 'Light', 'conica' ),
        'conica-skin-dark' => __( 'Dark', 'conica' )
    );
    $options['conica-set-site-skin'] = array(
        'id' => 'conica-set-site-skin',
        'label'   => __( 'Website Skin', 'conica' ),
        'section' => $section,
        'type'    => 'radio',
        'choices' => $choices,
        'default' => 'conica-skin-light'
    );
    $choices = array(
        'conica-site-boxed' => __( 'Boxed Layout', 'conica' ),
        'conica-site-full-width' => __( 'Full Width Layout', 'conica' )
    );
    $options['conica-set-site-layout'] = array(
        'id' => 'conica-set-site-layout',
        'label'   => __( 'Website Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-site-full-width'
    );
    $options['conica-site-add-side-social'] = array(
        'id' => 'conica-site-add-side-social',
        'label'   => __( 'Add Side Aligned Social Icons', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Add Social Icons for this to show', 'conica' ),
        'default' => 0,
    );

    $options['conica-upsell-layout'] = array(
        'id' => 'conica-upsell-layout',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Set website container width<br />- Change sidebar width<br />- Change content area padding', 'conica' )
    );
    // ---------------------------------------------------------------------------- Website Layout Settings

    $section = 'conica-panel-website-section-header'; // ---------------------------------- Header Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['conica-set-header-remove-topline'] = array(
        'id' => 'conica-set-header-remove-topline',
        'label'   => __( 'Remove Top Line', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['conica-set-header-remove-topbar'] = array(
        'id' => 'conica-set-header-remove-topbar',
        'label'   => __( 'Remove Top Bar', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['conica-set-topbar-switch'] = array(
        'id' => 'conica-set-topbar-switch',
        'label'   => __( 'Switch Top Bar', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['conica-set-header-align-right'] = array(
        'id' => 'conica-set-header-align-right',
        'label'   => __( 'Switch Header Main', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $choices = array(
        'conica-header-layout-one' => __( 'Standard Header', 'conica' ),
        'conica-header-layout-two' => __( 'Standard Header Two', 'conica' ),
        'conica-header-layout-three' => __( 'Standard Header Three', 'conica' ),
        'conica-header-layout-four' => __( 'Centered Header Layout', 'conica' )
    );
    $options['conica-set-header-layout'] = array(
        'id' => 'conica-set-header-layout',
        'label'   => __( 'Header Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-header-layout-one'
    );
    $options['conica-set-sticky-header'] = array(
        'id' => 'conica-set-sticky-header',
        'label'   => __( 'Sticky Header', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['conica-set-header-nav-center-align'] = array(
        'id' => 'conica-set-header-nav-center-align',
        'label'   => __( 'Center Align Navigation', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['conica-set-show-search'] = array(
        'id' => 'conica-set-show-search',
        'label'   => __( 'Show Search Bar Icon', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $choices = array(
        'conica-search-icon-angle' => __( 'Angle Icon', 'conica' ),
        'conica-search-icon-magnify' => __( 'Magnify Icon', 'conica' ),
        'conica-search-icon-caret' => __( 'Caret Icon', 'conica' ),
        'conica-search-icon-arrow' => __( 'Arrow Icon', 'conica' )
    );
    $options['conica-set-search-icon'] = array(
        'id' => 'conica-set-search-icon',
        'label'   => __( 'Search Icon', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-search-icon-angle'
    );

    $options['conica-upsell-header'] = array(
        'id' => 'conica-upsell-header',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Enable WooCommerce drop down basket/cart<br />- Add Site Title & Tagline with an uploaded logo<br />- Adjust logo position<br />- Vertically align Header One & Two Navigation<br />- Remove WooCommerce Cart from header', 'conica' )
    );
    // --------------------------------------------------------------------------------------- Header Settings

    $section = 'conica-panel-website-section-navigation'; // ----------------------------- Navigation Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Navigation', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $choices = array(
        'conica-navigation-style-blocks' => __( 'Navigation Style Blocks', 'conica' ),
        'conica-navigation-style-underline' => __( 'Navigation Style Underline', 'conica' ),
        'conica-navigation-style-plain' => __( 'Navigation Style Plain', 'conica' )
    );
    $options['conica-set-navigation-style'] = array(
        'id' => 'conica-set-navigation-style',
        'label'   => __( 'Navigation Styling', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-navigation-style-blocks'
    );

    $options['conica-upsell-nav'] = array(
        'id' => 'conica-upsell-nav',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change dropdown animation<br />- Fade / Slide Down / Fold Out', 'conica' )
    );
    // ----------------------------------------------------------------------------------- Navigation Settings

    $section = 'conica-panel-website-section-slider'; // ------------------------------------- Slider Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Page Slider', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $choices = array(
        'conica-slider-default' => __( 'Default Slider', 'conica' ),
        'conica-shortcode-slider' => __( 'Slider Shortcode', 'conica' ),
        'conica-no-slider' => __( 'None', 'conica' )
    );
    $options['conica-slider-type'] = array(
        'id' => 'conica-slider-type',
        'label'   => __( 'Choose a Slider', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-no-slider'
    );
    $options['conica-slider-cats'] = array(
        'id' => 'conica-slider-cats',
        'label'   => __( 'Slider Categories', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)<br /><br />Get the ID at <b>Posts -> Categories</b>.<br /><br />Or <a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><b>See more instructions here</b></a>', 'conica' )
    );
    $options['conica-slider-shortcode'] = array(
        'id' => 'conica-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the slider shortcode', 'conica' )
    );
    $options['conica-slider-style'] = array(
        'id' => 'conica-slider-style',
        'label'   => __( 'Full Width Slider', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'conica-slider-size-small' => __( 'Small Slider', 'conica' ),
        'conica-slider-size-medium' => __( 'Medium Slider', 'conica' ),
        'conica-slider-size-large' => __( 'Large Slider', 'conica' )
    );
    $options['conica-slider-size'] = array(
        'id' => 'conica-slider-size',
        'label'   => __( 'Slider Size', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-slider-size-medium'
    );
    $options['conica-upsell-slider'] = array(
        'id' => 'conica-upsell-slider',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Set each slide to have custom url link<br />- Change slider scroll effect<br />- Change slider scroll duration<br />- Change slider direction<br />- Link slide to single post<br />- Remove slider title/text<br />- Stop slider scrolling', 'conica' )
    );
    // --------------------------------------------------------------------------------------- Slider Settings


    $section = 'conica-panel-website-section-single-page'; // -------------------------- Single Pages Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Pages', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $choices = array(
        'conica-page-fimage-layout-none' => __( 'None', 'conica' ),
        'conica-page-fimage-layout-standard' => __( 'Standard', 'conica' )
    );
    $options['conica-page-fimage-layout'] = array(
        'id' => 'conica-page-fimage-layout',
        'label'   => __( 'Featured Image Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-page-fimage-layout-none'
    );

    $options['conica-upsell-pages'] = array(
        'id' => 'conica-upsell-pages',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Adjust sidebar widget title size/align/styling<br />- Select Featured Image to display as a page banner<br />- Change banner size and width', 'conica' )
    );
    // --------------------------------------------------------------------------------- Single Pages Settings

    $section = 'conica-panel-website-section-blog-list'; // ------------------------------- Blog List Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog List', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $choices = array(
        'blog-left-layout' => __( 'Left Layout', 'conica' ),
        'blog-right-layout' => __( 'Right Layout', 'conica' ),
        'blog-alt-layout' => __( 'Alternate Layout', 'conica' ),
        'blog-top-layout' => __( 'Top Layout', 'conica' ),
        'blog-grid-layout' => __( 'Grid/Blocks Layout', 'conica' )
    );
    $options['conica-set-blog-layout'] = array(
        'id' => 'conica-set-blog-layout',
        'label'   => __( 'Blog Posts Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-left-layout'
    );
    $options['conica-set-blog-cats'] = array(
        'id' => 'conica-set-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br /><br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.<br /><br />Get the ID at <b>Posts -> Categories</b>.', 'conica' )
    );

    $options['conica-upsell-blog'] = array(
        'id' => 'conica-upsell-blog',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Show blog post summary<br />- Adjust text and amount of words shown<br />- Remove meta/categories/tags info<br />- Set blog to left sidebar or full width<br />- Set archive / search to full width<br />- Remove "Category:" text from Archives/Categories list', 'conica' )
    );
    // ----------------------------------------------------------------------------------- Blog List Settings

    $section = 'conica-panel-website-section-blog-single'; // -------------------------- Blog Single Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog Single Page', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );
    $choices = array(
        'conica-single-page-fimage-layout-none' => __( 'None', 'conica' ),
        'conica-single-page-fimage-layout-standard' => __( 'Standard', 'conica' )
    );
    $options['conica-single-page-fimage-layout'] = array(
        'id' => 'conica-single-page-fimage-layout',
        'label'   => __( 'Featured Image Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-single-page-fimage-layout-none'
    );

    $options['conica-upsell-posts'] = array(
        'id' => 'conica-upsell-posts',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Remove meta/categories/tags info<br />- Set posts to left sidebar or full width<br />- Select Featured Image to display as a page banner<br />- Change banner size and width<br />- Add Author block to single posts', 'conica' )
    );
    // ---------------------------------------------------------------------------------- Blog Single Settings


    // WooCommerce style Layout
    if ( conica_is_woocommerce_activated() ) :

        $section = 'conica-panel-woocommerce-section-website'; // ---------------- WooCommerce Layout Settings

        $sections[] = array(
            'id' => $section,
            'title' => __( 'WooCommerce', 'conica' ),
            'priority' => '15',
            'panel' => $panel
        );

        $choices = array(
            'fa-shopping-cart' => __( 'Shopping Cart', 'conica' ),
            'fa-shopping-basket' => __( 'Shopping Basket', 'conica' ),
            'fa-shopping-bag' => __( 'Shopping Bag', 'conica' )
        );
        $options['conica-cart-icon'] = array(
            'id' => 'conica-cart-icon',
            'label'   => __( 'Cart Icon', 'conica' ),
            'section' => $section,
            'type'    => 'select',
            'description' => __( 'Due to the AJAX, This will only change when you open the site again in a new tab', 'conica' ),
            'choices' => $choices,
            'default' => 'fa-shopping-cart'
        );

        $options['conica-upsell-woocommerce'] = array(
            'id' => 'conica-upsell-woocommerce',
            'section' => $section,
            'type'    => 'upsell',
            'description' => __( '<b>Premium Extra Features:</b><br />- Change amount of products per row<br />- Remove products hover border<br />- Set Shop/Archive/Single pages left sidebar<br />- Set Shop/Archive/Single pages full width', 'conica' )
        );

    endif;
    // -------------------------------------------------------------------------- WooCommerce Layout Settings

    $section = 'conica-panel-website-section-footer'; // ------------------------------------ Footer Settings

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['conica-footer-hide-social'] = array(
        'id' => 'conica-footer-hide-social',
        'label'   => __( 'Remove Social Links', 'conica' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'conica-footer-layout-standard' => __( 'Standard Layout', 'conica' ),
        'conica-footer-layout-social' => __( 'Social Layout', 'conica' ),
        'conica-footer-layout-none' => __( 'None', 'conica' )
    );
    $options['conica-footer-layout'] = array(
        'id' => 'conica-footer-layout',
        'label'   => __( 'Footer Layout', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'conica-footer-layout-standard'
    );

    $options['conica-upsell-footer'] = array(
        'id' => 'conica-upsell-footer',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Remove footer bottom bar<br />- Extra advanced footer layout<br />- Set advanced footer column widths<br /><br />- Change attribution text to your own<br />- Extra custom text blocks can be added to the footer', 'conica' )
    );
    // -------------------------------------------------------------------------------------- Footer Settings

    $panel = 'conica-panel-text';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Text Settings', 'conica' ),
        'priority' => '20'
    );

    $section = 'conica-panel-text-section-header'; // ------------------------------------------- Header Text

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['conica-set-text-header-phone'] = array(
        'id' => 'conica-set-text-header-phone',
        'label'   => __( 'Phone Number', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Call Us: +2782 444 YEAH', 'conica' )
    );
    $options['conica-set-text-header-add'] = array(
        'id' => 'conica-set-text-header-add',
        'label'   => __( 'Address', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Cape Town, South Africa', 'conica' )
    );
    $options['conica-set-text-header-custom'] = array(
        'id' => 'conica-set-text-header-custom',
        'label'   => __( 'Custom Text', 'conica' ),
        'section' => $section,
        'type'    => 'text'
    );
    $options['conica-set-text-header-custom-icon'] = array(
        'id' => 'conica-set-text-header-custom-icon',
        'label'   => __( 'Custom Text Icon', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'You can select any icon to add from <a href="http://fontawesome.io/cheatsheet/" target="_blank">Font Awesome</a>, add only the text next to the icon. Eg: fa-link', 'conica' )
    );
    // ----------------------------------------------------------------------------------------- Header Text

    $section = 'conica-panel-text-section-navigation'; // ---------------------------------- Navigation Text

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Navigation', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    // Navigation Text
    $options['conica-set-text-mobile-nav'] = array(
        'id' => 'conica-set-text-mobile-nav',
        'label'   => __( 'Mobile Navigation Button', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'MENU', 'conica' )
    );
    // ------------------------------------------------------------------------------------ Navigation Text

    $section = 'conica-panel-text-section-error'; // ---------------------------------- Navigation Text

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Error 404/No Results', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['conica-website-error-head'] = array(
        'id' => 'conica-website-error-head',
        'label'   => __( '404 Error Page Heading', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'conica')
    );
    $options['conica-website-error-msg'] = array(
        'id' => 'conica-website-error-msg',
        'label'   => __( 'Error 404 Message', 'conica' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'conica')
    );

    $options['conica-website-nosearch-head'] = array(
        'id' => 'conica-website-nosearch-head',
        'label'   => __( 'No Search Results Heading', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Nothing Found', 'conica')
    );
    $options['conica-website-nosearch-msg'] = array(
        'id' => 'conica-website-nosearch-msg',
        'label'   => __( 'No Search Results Message', 'conica' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'conica')
    );
    
    $section = 'conica-panel-text-section-footer'; // ------------------------------------------- Header Text

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );
    
    $options['conica-website-footer-icon'] = array(
        'id' => 'conica-website-footer-icon',
        'label'   => __( 'Custom Icon', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Change the icon by pasting the corrent <a href="http://fontawesome.io/icons/#brand" target="_blank">Font Awesome</a> class here<br />Eg: "fa-map-marker"', 'conica' ),
        'default' => __( 'fa-map-marker', 'conica' )
    );
    $options['conica-website-footer-add'] = array(
        'id' => 'conica-website-footer-add',
        'label'   => __( 'Address', 'conica' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Cape Town, South Africa', 'conica' )
    );
    
    // ------------------------------------------------------------------------------------ Navigation Text

    $panel = 'conica-panel-font-options';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Font Options', 'conica' ),
        'priority' => '30'
    );

    $section = 'conica-panel-font-section-site'; // ----------------------------------------- Default Fonts
    $font_choices = customizer_library_get_font_choices();

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Theme Fonts', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['conica-body-font'] = array(
        'id' => 'conica-body-font',
        'label'   => __( 'Body Font', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );
    $options['conica-body-font-color'] = array(
        'id' => 'conica-body-font-color',
        'label'   => __( 'Body Font Color', 'conica' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['conica-heading-font'] = array(
        'id' => 'conica-heading-font',
        'label'   => __( 'Heading Font', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Poppins'
    );
    $options['conica-heading-font-color'] = array(
        'id' => 'conica-heading-font-color',
        'label'   => __( 'Heading Font Color', 'conica' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    // -------------------------------------------------------------------------------------- Default Fonts

    $section = 'conica-panel-font-section-titles'; // ----------------------------------------- Title Fonts
    $font_choices = customizer_library_get_font_choices();

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Title & Description', 'conica' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['conica-title-font'] = array(
        'id' => 'conica-title-font',
        'label'   => __( 'Site Title Font', 'conica' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Poppins'
    );

    $options['conica-upsell-fonts'] = array(
        'id' => 'conica-upsell-fonts',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change site title font size<br />- Select custom tagline font<br />- Change tagline font size<br />- Change title / tagline spacing', 'conica' )
    );
    // ---------------------------------------------------------------------------------------- Title Fonts

    // ------------------------------------------------------- Social Options
    $section = 'conica-section-social';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'conica' ),
        'priority' => '80'
    );

    $options['conica-social-email'] = array(
        'id' => 'conica-social-email',
        'label'   => __( 'Email Address', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['conica-social-facebook'] = array(
        'id' => 'conica-social-facebook',
        'label'   => __( 'Facebook', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['conica-social-google-plus'] = array(
        'id' => 'conica-social-google-plus',
        'label'   => __( 'Google Plus', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['conica-social-linkedin'] = array(
        'id' => 'conica-social-linkedin',
        'label'   => __( 'LinkedIn', 'conica' ),
        'section' => $section,
        'type'    => 'text',
    );

    $options['conica-upsell-social'] = array(
        'id' => 'conica-upsell-social',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Over 18 different social profile links available<br />- Custom setting to add any needed link<br />- Let us know which links you need and we\'ll add it!', 'conica' )
    );
    // ------------------------------------------------------- Social Options

    // --------------------------------------------------------------- Colors
    $section = 'colors';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Colors', 'conica' ),
        'priority' => '40'
    );

    $options['conica-primary-color'] = array(
        'id' => 'conica-primary-color',
        'label'   => __( 'Primary Color', 'conica' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
    $options['conica-secondary-color'] = array(
        'id' => 'conica-secondary-color',
        'label'   => __( 'Secondary Color', 'conica' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $secondary_color,
    );
    $options['conica-upsell-colors'] = array(
        'id' => 'conica-upsell-colors',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />Conica Premium ($25) has advanced color settings to change Header, Top Bar and Navigation colors, Default Slider colors, Page Title & Widget heading colors, Footer & Bottom Bar colors + more', 'conica' )
    );
    // --------------------------------------------------------------- Colors

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_conica_options' );
