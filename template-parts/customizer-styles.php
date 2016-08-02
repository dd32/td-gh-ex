<!-- Customizer Variables -->
<?php 
//===== Base - LESS Variables
//Colors
$color_one = get_theme_mod('color_one', '#f72565' );
$color_two = get_theme_mod('color_two', '#ffcf38' );
$color_three = get_theme_mod( 'color_three', '#f8be27' );


//====== Others
//background Image
$bg_image = get_theme_mod( 'bg_image', '' ); 

?>



<!-- Customizer Styles -->
<style>


/*colors*/
.color1,
a,
.title-of-section,
.btn-stroke,
.tags-links a,
.tbpw-profile-name,
.navigation a:hover,
.comment-reply-link {
	color: <?php echo $color_one; ?>;
}

.color2 {
	color: <?php echo $color_two; ?>;
}

.color3,
a:hover,
.sidebar-area .widget-list li a:hover,
.sidebar-area .widget ul li a:hover,
.entry-footer .cat-links a,
.navigation a {
	color: <?php echo $color_three; ?>;;
}

html,
#colophon .widget {
	background-color: transparent;
}

body,
.body-boxed {
	background-color: #fafafa;
}

.bdw-wrapper:before,
.bdw-wrapper:after,
.title-border:after,
.btn-default,
.balloon,
.balloon:after,
.dropdown-mega-content,
.dropdown-mega-content ul.dropdown-mega-sub-nav li a:hover,
.navbar-top,
.tagcloud a,
.footer-social-icons .social-icons-list a:hover,
.btn-special, .btn,
.section-title,
.social-icons a,
.navbar .nav  li  a:hover, .navbar .nav  li  a:focus, .navbar .nav  li  a:active,
.wpcf7-form input[type=submit], .mc4wp-form input[type=submit] {
	background-color: <?php echo $color_one; ?>;
}

.bdw-wrapper-negative:before,
.bdw-wrapper-negative:after,
.header-social-icons ul a,
.header-social-icons ul a:hover {
	background-color: #ffffff;
}


.btn-default,
.btn-special:hover,
.balloon,
#masthead,
#masthead a,
.navbar-toggle,
.dropdown-mega-content,
#colophon,
#colophon a,
#colophon .footer-bottom,
#colophon .widget,
#colophon .widget p,
.section-title,
.section-mini-hero,
.sidebar-area .widget-title,
.sidebar-area .widget h3,
.entry-footer .cat-links a:hover,
.entry-footer .comments-link a,
.entry-meta,
.entry-meta a,
.comments-area input[type=submit]:hover,
.wpcf7-form input[type=submit] {
	color: #ffffff;
}

.btn-special,
.btn-stroke:hover,
.btn-stroke-negative,
.tagcloud a,
.tagcloud a:hover,
.footer-social-icons .social-icons-list a,
.footer-social-icons .social-icons-list a:hover,
.contrast-with-image,
.social-icons a,
.post-element-header,
.comments-area input[type=submit],
.hero-slideshow {
	color: #ffffff !important;
}

.btn-stroke {
	border-color: <?php echo $color_one; ?>;
}

.btn-stroke:before,
.navbar .nav li a,
.post-element-header,
.owl-carousel .owl-dot.active span {
	background-color: <?php echo $color_three; ?>; !important;
}

.btn-stroke:hover {
	border-color: <?php echo $color_three; ?>; !important;
}

.btn-stroke:hover {
	background-color: transparent!important;
}

.btn-stroke-negative {
	border-color: #ffffff !important;
}

.form-control,
.comments-area input[type=text],
.comments-area input[type=email],
.comments-area input[type=url],
.comments-area textarea {
	color: #111;
}

.navbar-toggle {
	border-color: #ffffff;
}

.navbar-bottom,
.social-icons a:hover {
	background-color: <?php echo $color_two; ?>;
}

.header-social-icons ul a {
	color: <?php echo $color_three; ?>!important;
}

.header-social-icons ul a:hover {
	color: <?php echo $color_one; ?>!important;
}

#colophon {
	background-color: #444444;
}

.tagcloud a:hover,
.entry-footer .cat-links a:hover,
.entry-footer .comments-link a,
.entry-footer .comments-link a:hover,
.entry-meta {
	background-color: <?php echo $color_three; ?>;;
}

.contrast,
.contrast-box {
	background-color: #f2f2f2;
}

.sidebar-area .widget-list li a,
.sidebar-area .widget ul li a,
.comment-metadata a {
	color: #555;
}

.sidebar-area .widget_search #s {
	border-color: #ccc !important;
}

.sidebar-area .widget_search #s {
	color: #fff;
}

.entry-title,
.entry-title a {
	color: #4d4d4f;
}

.entry-footer .cat-links a {
	border-color: <?php echo $color_three; ?>;;
}

.comments-area input[type=text],
.comments-area input[type=email],
.comments-area input[type=url],
.comments-area textarea,
.wpcf7-form input[type=text],
.wpcf7-form input[type=email],
.wpcf7-form textarea {
	border-color: <?php echo $color_two; ?>;
}

.comment-author .fn a {
	color: #555555;
}




/*Body*/
#body {
	background-image: url('<?php echo esc_url( $bg_image ); ?>'); 
	background-color: <?php echo get_theme_mod( 'bg_color', '#eeeeee' ); ?>;
}

</style>