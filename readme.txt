=== Theme Name ===
Contributors: Schwarttzy
Requires at least: 5.0
Tested up to: 5.3.2
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Semper Fi Lite Wordpress Theme written for my personal use and freely shared with everyone else.


== Description ==
Semper Fi Lite is a handwritten WordPress theme for blogs, businesses, and can also be used as a powerful e-commerce (Woocommerce) solution. Written without JavaScript, just pure HTML5 and CSS3, Semper Fi Lite is free of any possible scripting conflicts with every WordPress Plugin out there. Fully responsive, with a built-in mobile friendly touch screen menu, adaptive font sizing, Woo Commerce integration, page-specific custom backgrounds, and 4k+ resolution ready. All of Semper Fi Lite's options are organized and controlled with WordPress's powerful Customizer for real-time customization. For support with questions, help, or issues use http://schwarttzy.com/contact-me/ or head over to https://wordpress.org/support/theme/semper-fi-lite/


== Frequently Asked Questions ==

= How do I contact the Theme Author? =

Head to http://schwarttzy.com/contact-me/ send Schwarttzy an email directly, or head to https://wordpress.org/support/theme/semper-fi-lite/ to ask on the forums.


== Changelog ==

= 101 =
* Removed theme promotions on semper-fi-lite\inc\store-front\html.php and semper-fi-lite\inc\store-front\customizer.php
* Moved semper-fi-lite\inc\open-graph-protocol\ from the theme over to the premium plugin because a third party api key is plugin territory
* fixed wrong use of unique prefix in semper-fi-lite\inc\woo-commerce\
* fixed the wrong uses of esc_attr, esc_textarea, and missing esc_url
* custom customizer sanitizer for range and select
* adding in the missing text domain for translation in semper-fi-lite\inc\footer-widgets\html.php
* fixed coding error in semper-fi-lite\inc\404\html.php and issues with escaping functions with esc_html() between HTML tags using only esc_attr() 
* fixed hardcode the date formats, although few hidden hard coded dates remain to ensure the Microdata work properly, these coded dates are not seen but the viewer, only the search engines see these hard coded dates
* fixed missing translations on semper-fi-lite\inc\comments\html.php and semper-fi-lite\inc\woo-commerce\customizer.php
* updated Read Me to use WordPress.org match recommend 

= 100 =
* Theme released after two plus years with new code


== Upgrade Notice ==

= 101 =
* Improvements to the theme based on WordPress.org Review Recommendations.

= 100 =
* Completely redesigned theme under the hood with many fixes, new features.