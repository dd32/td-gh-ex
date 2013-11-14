<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'Appointway Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = appointway_get_option('of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        $alt_stylesheets = array("green" => "green", "coffee" => "coffee", "blue" => "blue", "teal-green" => "teal-green", "light-blue" => "light-blue", "orange" => "orange", "yellow" => "yellow", "silver" => "silver", "purple" => "purple", "pink" => "pink", "red" => "red");
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Populate OptionsFramework option in array for use in theme
        $contact_option = array("on" => "On", "off" => "Off");
        $captcha_option = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array(
            array("name" => "General Settings",
                "type" => "heading"),
            array("name" => "Custom Logo",
                "desc" => "Upload a logo for your Website. The recommended size for the logo is 340px width x 46px height.",
                "id" => "appointway_logo",
                "type" => "upload"),
            array("name" => "Custom Favicon",
                "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
                "id" => "appointway_favicon",
                "type" => "upload"),
            //Background Image
            array("name" => "Background Image",
                "desc" => "Choose a suitable background image that will complement your website.",
                "id" => "appointway_bodybg",
                "type" => "upload"),
            array("name" => "Top Right Contact Details",
                "desc" => "Mention the contact details here which will be displayed on the top right corner of Website.",
                "id" => "appointway_topright",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Contact Number For Tap To Call Feature",
                "desc" => "Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.",
                "id" => "appointway_contact_number",
                "std" => "",
                "type" => "text"),
            array("name" => "Front Page On/Off",
                "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
                "id" => "re_nm",
                "std" => "on",
                "type" => "radio",
                "options" => $file_rename),
            //Homepage Feature Area
            array("name" => "Homepage Feature Area",
                "type" => "heading"),
            array("name" => "Home Page Main Heading.",
                "desc" => "Mention the punch line for your business here.",
                "id" => "appointway_page_main_heading",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Home Page Sub Heading",
                "desc" => "Mention the tagline for your business here that will complement the punch line.",
                "id" => "appointway_page_sub_heading",
                "std" => "",
                "type" => "textarea"),
            //First Slider
            array("name" => "Home Page Main Image",
                "desc" => "Upload the image for the Home Page Main Image Area. Recommended size is 694px width x 345px height.",
                "id" => "appointway_slideimage1",
                "std" => "",
                "type" => "upload"),
            array("name" => "Link for Home Page Main Image",
                "desc" => "Mention the URL for Home Page Main Image",
                "id" => "appointway_slidelink1",
                "std" => "",
                "type" => "text"),
            array("name" => "Three Column Feature Starts From Here",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Three Column Feature Main Heading",
                "desc" => "Here you can mention a suitable title for your business services.",
                "id" => "appointway_feature_mainhead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Heading",
                "desc" => "Mention the heading for First column that will showcase your business services.",
                "id" => "appointway_firsthead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Image",
                "desc" => "Upload an image for First column. Optimal size is 217px x 200px.",
                "id" => "appointway_feature_image1",
                "std" => "",
                "type" => "upload"),
            array("name" => "First Feature Description",
                "desc" => "Write short description for your First heading.",
                "id" => "appointway_firstdesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First feature Link",
                "desc" => "Enter your text for First feature Link.",
                "id" => "appointway_feature_link1",
                "std" => "",
                "type" => "text"),
            //Second Feature Separetor
            array("name" => "Second Feature Starts From Here",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Second Feature Heading",
                "desc" => "Mention the heading for Second column that will showcase your business services.",
                "id" => "appointway_secondhead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second Feature Image",
                "desc" => "Upload an image for Second column. Optimal size is 217px x 200px.",
                "id" => "appointway_feature_image2",
                "std" => "",
                "type" => "upload"),
            array("name" => "Second Feature Description",
                "desc" => "Write short description for your Second heading.",
                "id" => "appointway_seconddesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second feature Link",
                "desc" => "Enter your text for Second feature Link.",
                "id" => "appointway_feature_link2",
                "std" => "",
                "type" => "text"),
            //Third Feature Separetor
            array("name" => "Third Feature Starts From Here",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Third Feature Heading",
                "desc" => "Mention the heading for Third column that will showcase your business services.",
                "id" => "appointway_thirdhead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third Feature Image",
                "desc" => "Upload an image for Third column. Optimal size is 217px x 200px.",
                "id" => "appointway_feature_image3",
                "std" => "",
                "type" => "upload"),
            array("name" => "Third Feature Description",
                "desc" => "Write short description for your third heading.",
                "id" => "appointway_thirddesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third feature Link",
                "desc" => "Enter your text for Second feature Link.",
                "id" => "appointway_feature_link3",
                "std" => "",
                "type" => "text"),
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
            array("name" => "Styling Options",
                "type" => "heading"),
            array("name" => "Custom CSS",
                "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
                "id" => "appointway_customcss",
                "std" => "",
                "type" => "textarea"),
//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//
            array("name" => "Social Icons",
                "type" => "heading"),
            array("name" => "Twitter URL",
                "desc" => "Mention the URL of your Twitter here.",
                "id" => "appointway_twitter",
                "std" => "#",
                "type" => "text"),
            array("name" => "Facebook URL",
                "desc" => "Mention the URL of your Facebook here.",
                "id" => "appointway_facebook",
                "std" => "#",
                "type" => "text"),
            array("name" => "Google+ URL",
                "desc" => "Mention the URL of your Google+ here.",
                "id" => "appointway_google",
                "std" => "#",
                "type" => "text"),
            array("name" => "RSS URL",
                "desc" => "Mention the URL of your RSS here.",
                "id" => "appointway_rss",
                "std" => "#",
                "type" => "text"),
            array("name" => "LinkedIn URL",
                "desc" => "Mention the URL of your LinkedIn here.",
                "id" => "appointway_linkdin",
                "std" => "#",
                "type" => "text"));

        appointway_update_option('of_template', $options);
        appointway_update_option('of_themename', $themename);
        appointway_update_option('of_shortname', $shortname);
    }

}
?>
