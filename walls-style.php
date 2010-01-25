<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] =
$value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?> <style type="text/css">
.logo-text { background-color: #<?php echo $bxx_logo_background_color;?>; font-size: <?php echo $bxx_logo_size;?>px; float:
<?php echo $bxx_logo_float;?>; margin-left: 0px; margin-right: 15px; margin-top: 10px; margin-bottom: 0xp; margin-bottom: 0px;
line-height: 100%; color: #<?php echo $bxx_logo_color;?>; text-transform: <?php echo $bxx_title_trans;?>; text-decoration: <?php echo $bxx_name_decoration;?>;  font-weight: <?php echo $bxx_logo_weight;?>; } 
.logo-text a:link, .logo-text a:visited, .logo-text a:hover {
background-color: #<?php echo $bxx_logo_background_color;?>; color: #<?php echo $bxx_logo_color;?>; font-size: <?php echo
$bxx_logo_size;?>px; text-decoration: <?php echo $bxx_name_decoration;?>; font-style: <?php echo $bxx_logo_style;?>;
font-weight: <?php echo $bxx_logo_weight;?>; font-family: <?php echo $bxx_logo_font_family;?>, <?php echo $bxx_p_font;?>;
text-transform: <?php echo $bxx_title_trans;?>; text-decoration: <?php echo $bxx_name_decoration;?>; font-weight: <?php echo
$bxx_logo_weight;?>; padding: 0px; margin-bottom: 0px; line-height: 100%; } 
.icon-holder { width: 1000px; } .icon { float:<?php
echo $bxx_icon_float;?>; border: 0px; width: 21px; height: 21px; padding-left: 5px; padding-right: 5px; margin-bottom: 3px;
margin-top: 3px; } #showhide { margin-left: auto; margin-right: auto; display: none; width: 1000px; padding-top: 15px;
padding-bottom: 15px; } .search-input{ width: 350px; height: 14px; color: #<?php echo $bxx_p_color;?>; float:left; border: 1px
solid #ccc; background:#fff; font-size: 11px; padding: 3px 5px; }
.maxi { width: 230px; float: right; } .mini .avatar { border:<?php echo $bxx_avatar_border_size;?>px <?php echo
$bxx_avatar_border_type;?> #<?php echo $bxx_avatar_border_color;?>; float:<?php echo $bxx_avatar_float;?>; height:<?php echo
$bxx_avatar_size;?>px; width:<?php echo $bxx_avatar_size;?>px; margin:5px 10px 5px 5px; padding:0px;
 } .conbreak { clear: both; height: 10px; } .xclear { height: 20px; clear: both; } .ff-link { line-height: 150%; }
#container .post-title { clear: both; display: block; padding-top: <?php echo $bxx_post_title_padding_top;?>px; padding-right:
<?php echo $bxx_post_title_padding_right;?>px; padding-bottom: <?php echo $bxx_post_title_padding_bottom;?>px; padding-left:
<?php echo $bxx_post_title_padding_left;?>px; margin-top: <?php echo $bxx_post_title_margin_top;?>px; margin-right: <?php echo
$bxx_post_title_margin_right;?>px; margin-bottom: <?php echo $bxx_post_title_margin_bottom;?>px; margin-left: <?php echo
$bxx_post_title_margin_left;?>px; }
#container .post-title a:link { color: #<?php echo $bxx_post_title_link_color;?>; background-color:#<?php echo
$bxx_post_title_link_background;?>; font-family: <?php echo $bxx_post_title_link_font;?>, <?php echo $bxx_p_font;?>; font-size:
<?php echo $bxx_post_title_link_size;?>px; text-decoration: <?php echo $bxx_post_title_link_decoration;?>; font-style: <?php
echo $bxx_post_title_link_style;?>; font-weight: <?php echo $bxx_post_title_link_weight;?>; padding-top: <?php echo
$bxx_post_title_padding_top;?>px; padding-right: <?php echo $bxx_post_title_padding_right;?>px; padding-bottom: <?php echo
$bxx_post_title_padding_bottom;?>px; padding-left: <?php echo $bxx_post_title_padding_left;?>px; margin-top: <?php echo
$bxx_post_title_margin_top;?>px; margin-right: <?php echo $bxx_post_title_margin_right;?>px; margin-bottom: <?php echo
$bxx_post_title_margin_bottom;?>px; margin-left: <?php echo $bxx_post_title_margin_left;?>px; line-height: <?php echo
$bxx_post_title_line_height;?>%; } #container .post-title a:visited { color: #<?php echo $bxx_post_title_link_color_visited;?>;
background-color:#<?php echo $bxx_post_title_link_background_visited;?>; font-family: <?php echo
$bxx_post_title_link_font_visited;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_post_title_link_size_visited;?>px;
text-decoration: <?php echo $bxx_post_title_link_decoration_visited;?>; font-style: <?php echo
$bxx_post_title_link_style_visited;?>; font-weight: <?php echo $bxx_post_title_link_weight_visited;?>; padding-top: <?php echo
$bxx_post_title_padding_top;?>px; padding-right: <?php echo $bxx_post_title_padding_right;?>px; padding-bottom: <?php echo
$bxx_post_title_padding_bottom;?>px; padding-left: <?php echo $bxx_post_title_padding_left;?>px; margin-top: <?php echo
$bxx_post_title_margin_top;?>px; margin-right: <?php echo $bxx_post_title_margin_right;?>px; margin-bottom: <?php echo
$bxx_post_title_margin_bottom;?>px; margin-left: <?php echo $bxx_post_title_margin_left;?>px; line-height: <?php echo
$bxx_post_title_line_height;?>%; }
#container .post-title a:hover { color: #<?php echo $bxx_post_title_link_color_hover;?>; background-color:#<?php echo
$bxx_post_title_link_background_hover;?>; font-family: <?php echo $bxx_post_title_link_font_hover;?>, <?php echo $bxx_p_font;?>;
font-size: <?php echo $bxx_post_title_link_size_hover;?>px; text-decoration: <?php echo
$bxx_post_title_link_decoration_hover;?>; font-style: <?php echo $bxx_post_title_link_style_hover;?>; font-weight: <?php echo
$bxx_post_title_link_weight_hover;?>; padding-top: <?php echo $bxx_post_title_padding_top;?>px; padding-right: <?php echo
$bxx_post_title_padding_right;?>px; padding-bottom: <?php echo $bxx_post_title_padding_bottom;?>px; padding-left: <?php echo
$bxx_post_title_padding_left;?>px; margin-top: <?php echo $bxx_post_title_margin_top;?>px; margin-right: <?php echo
$bxx_post_title_margin_right;?>px; margin-bottom: <?php echo $bxx_post_title_margin_bottom;?>px; margin-left: <?php echo
$bxx_post_title_margin_left;?>px; line-height: <?php echo $bxx_post_title_line_height;?>%; } #tagcon { width: <?php echo
$bxx_footer_width;?><?php echo $bxx_footer_width_type;?>;
background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_tag_background_image;?>); background-repeat:
<?php echo $bxx_tag_image_repeat;?>; background-position: <?php echo $bxx_tag_image_align;?>; padding-top: 10px; padding-bottom:
10px; background-color: #<?php echo $bxx_tag_area_background_color;?>; margin-left: auto; margin-right: auto; padding-bottom:
5px; }
#tagcloud { width: 1000px; padding-bottom: 10px; margin:auto; }
body{ background: #<?php echo $bxx_page_background_color;?>; background-image: url(<?php
bloginfo('template_url');?>/images/<?php echo $bxx_page_background_image;?>); background-repeat: <?php echo
$bxx_page_background_image_repeat;?>; background-position: <?php echo $bxx_page_background_image_align;?>; text-align: center;
font-family: <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; padding: 0px; margin: 0px; }
p, .textwidget, caption { color: #<?php echo $bxx_p_color;?>; font-family: <?php echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>;
font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo $bxx_p_decoration;?>; font-style: <?php echo
$bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; padding-left: <?php echo $bxx_p_padding_left;?>px; padding-right:
<?php echo $bxx_p_padding_right;?>px; padding-top: <?php echo $bxx_p_padding_top;?>px; padding-bottom: <?php echo
$bxx_p_padding_bottom;?>px; margin-left: <?php echo $bxx_p_margin_left;?>px; margin-right: <?php echo $bxx_p_margin_right;?>px;
margin-top: <?php echo $bxx_p_margin_top;?>px; margin-bottom: <?php echo $bxx_p_margin_bottom;?>px; line-height: <?php echo
$bxx_p_line_size;?>%; }
.footcon p, .footcon .textwidget, .footcon caption { color: #<?php echo $bxx_p_footer_color;?>; font-family: <?php echo $bxx_p_footer_font;?>,
<?php echo $bxx_p_footer_font;?>; font-size: <?php echo $bxx_p_footer_size;?>px; text-decoration: <?php echo
$bxx_p_footer_decoration;?>; font-style: <?php echo $bxx_p_footer_style;?>; font-weight: <?php echo $bxx_p_footer_weight;?>;
padding-left: <?php echo $bxx_p_footer_padding_left;?>px; padding-right: <?php echo $bxx_p_footer_padding_right;?>px;
padding-top: <?php echo $bxx_p_footer_padding_top;?>px; padding-bottom: <?php echo $bxx_p_footer_padding_bottom;?>px;
margin-left: <?php echo $bxx_p_footer_margin_left;?>px; margin-right: <?php echo $bxx_p_footer_margin_right;?>px; margin-top:
<?php echo $bxx_p_footer_margin_top;?>px; margin-bottom: <?php echo $bxx_p_footer_margin_bottom;?>px; line-height: <?php echo
$bxx_p_footer_line_size;?>%; }
.footcon { width: 1000px; margin-left: auto; margin-right: auto; }
.con { width: 990px; padding-right: <?php echo $bxx_container_padding_right;?>px; padding-left: <?php echo
$bxx_container_padding_left;?>px; margin-left: auto; margin-right: auto; }
#container{ width: 990px; overflow: hidden; background:#<?php echo $bxx_container_background_color;?>; background-image:
url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_container_background_image;?>); background-repeat: <?php echo
$bxx_container_background_image_repeat;?>; background-position: <?php echo $bxx_container_background_image_align;?>; margin: 0
auto; clear: both; text-align: left; border: <?php echo $bxx_container_border_width;?>px <?php echo
$bxx_container_border_type;?> #<?php echo $bxx_container_border_color;?>; padding-top: <?php echo
$bxx_container_padding_top;?>px; padding-right: <?php echo $bxx_container_padding_right;?>px; padding-bottom: <?php echo
$bxx_container_padding_bottom;?>px; padding-left: <?php echo $bxx_container_padding_left;?>px; margin-top: <?php echo
$bxx_container_margin_top;?>px; margin-right: auto; margin-bottom: <?php echo $bxx_container_margin_bottom;?>px; margin-left:
auto; }
#footer { background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_footer_background_image;?>);
background-color:#<?php echo $bxx_footer_background;?>; background-repeat: <?php echo $bxx_footer_background_image_repeat;?>;
background-position: <?php echo $bxx_footer_image_align;?>; margin: auto; border-top:<?php echo $bxx_footer_border_width;?>px
<?php echo $bxx_footer_border_type;?> #<?php echo $bxx_footer_border_color;?>; width: <?php echo $bxx_footer_width;?><?php echo
$bxx_footer_width_type;?>; padding:0px 0 10px 0; }
.footer-base { width:900px; margin: auto; clear: both; } .footer-base img { height: 20px; width: 20px; border: 0px; }
#header { width: <?php echo $bxx_header_width;?><?php echo $bxx_header_width_type;?>; height: <?php echo
$bxx_header_height;?>px; background: #<?php echo $bxx_header_background;?>; background-image: url(<?php
bloginfo('template_url');?>/images/<?php echo $bxx_header_background_image;?>); background-repeat: <?php echo
$bxx_header_background_image_repeat;?>; background-position: <?php echo $bxx_header_background_image_position;?>;
margin-left: auto; margin-right: auto; }
#navbar{ width: <?php echo $bxx_menu_width;?><?php echo $bxx_menu_width_type;?>; background: #<?php echo
$bxx_menu_background;?>; background-position:<?php echo $bxx_menu_background_image_align;?>;
 background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_navbar_background_image;?>); background-repeat:
<?php echo $bxx_menu_background_repeat;?>;; clear: both; padding: 0px; margin: 0px; margin-left: auto; margin-right: auto;
text-align: left; font-style: <?php echo $bxx_button_style;?>; font-family: <?php echo $bxx_button_font_family;?>, <?php echo
$bxx_p_font;?>; } #navbar ul li a:link, #navbar ul li a:visited{ display: inline; background-color: #<?php echo
$bxx_button_background;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo
$bxx_button_background_image;?>); background-position:<?php echo $bxx_button_background_image_align;?>;
 background-repeat: <?php echo $bxx_button_background_image_repeat;?>;
 color: #<?php echo $bxx_button_font_color;?>; text-transform: <?php echo $bxx_button_font_trans;?>; font-size: <?php echo
$bxx_button_font_size;?>px; padding-left: <?php echo $bxx_button_padding_left;?>px; padding-right: <?php echo
$bxx_button_padding_right;?>px; padding-top: <?php echo $bxx_button_padding_top;?>px; padding-bottom: <?php echo
$bxx_button_padding_bottom;?>px; text-decoration: <?php echo $bxx_button_font_decoration;?>;
 margin-top: <?php echo $bxx_button_margin_top;?>px; margin-right: <?php echo $bxx_button_margin_right;?>px; margin-left: <?php
echo $bxx_button_margin_left;?>px; margin-bottom: <?php echo $bxx_button_margin_bottom;?>px; font-weight: <?php echo
$bxx_button_font_weight;?>; border:<?php echo $bxx_button_border_width;?>px <?php echo $bxx_button_border_type;?> #<?php echo
$bxx_button_border_color;?>; line-height: <?php echo $bxx_button_line_pen;?>%; font-family: <?php echo
$bxx_button_font_family;?>, <?php echo $bxx_p_font;?>; } .clearbox { display:block; height:0px; background-color:none;
width:100%; clear:both; } #navbar ul li.current_page_item a:link, #navbar ul li.current_page_item a:visited, #navbar ul
li.current_page_item a:hover, #navbar ul li.current_page_item a:active, #navbar ul li.current_page_item a:focus{
background-color: #<?php echo $bxx_button_background_current;?>; color: #<?php echo $bxx_button_font_color_current;?>;
font-family: <?php echo $bxx_button_font_family;?>, <?php echo $bxx_p_font;?>;
} #navbar ul li a:hover, #navbar ul li a:active, #navbar ul li a:focus{ text-decoration: none; background-color: #<?php echo
$bxx_button_background_hover;?>; color: #<?php echo $bxx_button_font_color_hover;?>; font-family: <?php echo
$bxx_button_font_family;?>, <?php echo $bxx_p_font;?>; text-decoration: none;
}
#sidebar-left-one { width: 200px; float: left; overflow: hidden; width: 260px; }
#main-right{ float: right; width: 700px;
}
#main{ background-color: #<?php echo $bxx_main_background_color;?>; float: left; clear: left; overflow: hidden; width: 70%; }
#sidebar{ background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_main_sidebar_background_image;?>);
background-color: #<?php echo $bxx_main_sidebar_background_color;?>; background-repeat: <?php echo
$bxx_main_sidebar_background_image_repeat;?>; background-position: <?php echo $bxx_main_sidebar_background_image_align;?>;
height: 100% }
.footer-widget { width: 315px; background: #<?php echo $bxx_footer_left_sidebar_background_color;?>; background-image: url(<?php
bloginfo('template_url');?>/images/<?php echo $bxx_footer_left_sidebar_background_image;?>); background-position: <?php echo
$bxx_footer_left_align?>; background-repeat: <?php echo $bxx_footer_left_sidebar_background_image_repeat;?>; float: left; clear:
none; padding: 4px; margin: 4px; border: 0px; margin-top: 10px; text-align: left; } #submit { background: none;?>; color: #<?php
echo $bxx_a_link_color;?>; border: 1px solid #<?php echo $bxx_a_link_color;?>; padding:3px; }
.search-box-small .search-button{ width: 55px; height: 20px; padding-top: 3px; float: right; background:none; font-size: 10px; text-transform:
uppercase; font-weight: bold; color: #<?php echo $bxx_a_link_color;?>; margin-top:11px; border: 1px solid #<?php echo $bxx_a_link_color;?>; }
.search-button{ width: 55px; height: 20px; padding-top: 3px; float: right; background:none; font-size: 10px; text-transform:
uppercase; font-weight: bold; color: #<?php echo $bxx_a_link_color;?>; border: 1px solid #<?php echo $bxx_a_link_color;?>; }
table.authorbox { background-color:transparent; width: 300px; border: 0px; padding: 0px; } table.authorbox td, th {
background-color:transparent; border: 0px; text-align: left; padding: 0px; } table { background-color:#<?php echo
$bxx_table_background_color;?>; width:80%; padding-left: <?php echo $bxx_table_padding_left;?>px; padding-right: <?php echo
$bxx_table_padding_right;?>px; padding-top: <?php echo $bxx_table_padding_top;?>px; padding-bottom: <?php echo
$bxx_table_padding_bottom;?>px; margin-left: <?php echo $bxx_table_margin_left;?>px; margin-right: <?php echo
$bxx_table_margin_right;?>px; margin-top: <?php echo $bxx_table_margin_top;?>px; margin-bottom: <?php echo
$bxx_table_margin_bottom;?>px; border: <?php echo $bxx_table_border_width;?>px <?php echo$bxx_table_border_type;?> #<?php
echo$bxx_table_border_color;?>; }
td { background-color:#<?php echo $bxx_td_background_color;?>; color:#<?php echo $bxx_td_color;?>; width:80%; padding-left:
<?php echo $bxx_td_padding_left;?>px; padding-right: <?php echo $bxx_td_padding_right;?>px; padding-top: <?php echo
$bxx_td_padding_top;?>px; padding-bottom: <?php echo $bxx_td_padding_bottom;?>px; border: <?php echo $bxx_td_border_width;?>px
<?php echo $bxx_td_border_type;?> #<?php echo $bxx_td_border_color;?>; font-family: <?php echo $bxx_td_family;?>, <?php echo
$bxx_p_font;?>; font-size: <?php echo $bxx_td_font_size;?>px; text-decoration: <?php echo $bxx_td_decoration;?>; font-style:
<?php echo $bxx_td_style;?>; font-weight: <?php echo $bxx_td_weight;?>; text-transform: <?php echo $bxx_td_trans;?>; }
th { background-color:#<?php echo $bxx_th_background_color;?>; color:#<?php echo $bxx_th_color;?>; width:80%; padding-left:
<?php echo $bxx_th_padding_left;?>px; padding-right: <?php echo $bxx_th_padding_right;?>px; padding-top: <?php echo
$bxx_th_padding_top;?>px; padding-bottom: <?php echo $bxx_th_padding_bottom;?>px; border: <?php echo $bxx_th_border_width;?>px
<?php echo $bxx_th_border_type;?> #<?php echo $bxx_th_border_color;?>; font-family: <?php echo $bxx_th_family;?>, <?php echo
$bxx_p_font;?>; font-size: <?php echo $bxx_th_font_size;?>px; text-decoration: <?php echo $bxx_th_decoration;?>; font-style:
<?php echo $bxx_th_style;?>; font-weight: <?php echo $bxx_th_weight;?>; text-transform: <?php echo $bxx_th_trans;?>; }
#container a:link { color: #<?php echo $bxx_a_link_color;?>; background-color:#<?php echo $bxx_a_link_background;?>;
font-family: <?php echo $bxx_a_link_font_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_a_link_size_normal;?>px; text-decoration: <?php echo $bxx_a_link_decoration;?>; font-style: <?php echo
$bxx_a_link_style;?>; font-weight: <?php echo $bxx_a_link_weight;?>; text-transform: <?php echo $bxx_link_trans_normal;?>;
}
#container a:visited{ color: #<?php echo $bxx_a_link_color_visited;?>; background-color:#<?php echo
$bxx_a_link_background_visited;?>; font-family: <?php echo $bxx_a_link_font_family_visited;?>, <?php echo $bxx_p_font;?>;
font-size: <?php echo $bxx_a_link_size_visited;?>px; text-decoration: <?php echo $bxx_a_link_decoration_visited;?>; font-style:
<?php echo $bxx_a_link_style_visited;?>; font-weight: <?php echo $bxx_a_link_weight_visited;?>; text-transform: <?php echo
$bxx_link_trans_visited;?>; }
#container a:hover{ color: #<?php echo $bxx_a_link_color_hover;?>; background-color:#<?php echo $bxx_a_link_background_hover;?>;
font-family: <?php echo $bxx_a_link_font_family_hover;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_a_link_size_hover;?>px; text-decoration: <?php echo $bxx_a_link_decoration_hover;?>; font-style: <?php echo
$bxx_a_link_style_hover;?>; font-weight: <?php echo $bxx_a_link_weight_hover;?>; text-transform: <?php echo
$bxx_link_trans_hover;?>; }
#footer a:link { color: #<?php echo $bxx_a_footerlink_color;?>; background-color:#<?php echo $bxx_a_footerlink_background;?>;
font-family: <?php echo $bxx_a_footerlink_font_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_a_footerlink_size_normal;?>px; text-decoration: <?php echo $bxx_a_footerlink_decoration;?>; font-style: <?php echo
$bxx_a_footerlink_style;?>; font-weight: <?php echo $bxx_a_footerlink_weight;?>; text-transform: <?php echo
$bxx_footerlink_trans_normal;?>; }
#footer a:visited{ color: #<?php echo $bxx_a_footerlink_color_visited;?>; background-color:#<?php echo
$bxx_a_footerlink_background_visited;?>; font-family: <?php echo $bxx_a_footerlink_font_family_visited;?>, <?php echo
$bxx_p_font;?>; font-size: <?php echo $bxx_a_footerlink_size_visited;?>px; text-decoration: <?php echo
$bxx_a_footerlink_decoration_visited;?>; font-style: <?php echo $bxx_a_footerlink_style_visited;?>; font-weight: <?php echo
$bxx_a_footerlink_weight_visited;?>; text-transform: <?php echo $bxx_footerlink_trans_visited;?>; }
#footer a:hover{ color: #<?php echo $bxx_a_footerlink_color_hover;?>; background-color:#<?php echo
$bxx_a_footerlink_background_hover;?>; font-family: <?php echo $bxx_a_footerlink_font_family_hover;?>, <?php echo
$bxx_p_font;?>; font-size: <?php echo $bxx_a_footerlink_size_hover;?>px; text-decoration: <?php echo
$bxx_a_footerlink_decoration_hover;?>; font-style: <?php echo $bxx_a_footerlink_style_hover;?>; font-weight: <?php echo
$bxx_a_footerlink_weight_hover;?>; text-transform: <?php echo $bxx_footerlink_trans_hover;?>;}
h1 { color:#<?php echo $bxx_h1_color;?>; background-color:#<?php echo $bxx_h1_background;?>; font-family: <?php echo
$bxx_h1_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h1_size;?>px; text-decoration: <?php echo
$bxx_h1_decoration;?>; font-style: <?php echo $bxx_h1_style;?>; font-weight: <?php echo $bxx_h1_weight;?>; padding-left: <?php
echo $bxx_h1_padding_left;?>px; padding-right: <?php echo $bxx_h1_padding_right;?>px; padding-top: <?php echo
$bxx_h1_padding_top;?>px; padding-bottom: <?php echo $bxx_h1_padding_bottom;?>px; margin-left: <?php echo
$bxx_h1_margin_left;?>px; margin-right: <?php echo $bxx_h1_margin_right;?>px; margin-top: <?php echo $bxx_h1_margin_top;?>px;
margin-bottom: <?php echo $bxx_h1_margin_bottom;?>px; text-transform: <?php echo $bxx_h1_font_trans;?>; line-height: <?php echo
$bxx_h1_line_height;?>%; }
h2 { color: #<?php echo $bxx_h2_color;?>; background-color:#<?php echo $bxx_h2_background;?>; font-family: <?php echo
$bxx_h2_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h2_size;?>px; text-decoration: <?php echo
$bxx_h2_decoration;?>; font-style: <?php echo $bxx_h2_style;?>; font-weight: <?php echo $bxx_h2_weight;?>; padding-left: <?php
echo $bxx_h2_padding_left;?>px; padding-right: <?php echo $bxx_h2_padding_right;?>px; padding-top: <?php echo
$bxx_h2_padding_top;?>px; padding-bottom: <?php echo $bxx_h2_padding_bottom;?>px; margin-left: <?php echo
$bxx_h2_margin_left;?>px; margin-right: <?php echo $bxx_h2_margin_right;?>px; margin-top: <?php echo $bxx_h2_margin_top;?>px;
margin-bottom: <?php echo $bxx_h2_margin_bottom;?>px; text-transform: <?php echo $bxx_h2_font_trans;?>; line-height: <?php echo
$bxx_h2_line_height;?>%;}
h3 { color: #<?php echo $bxx_h3_color;?>; background-color:#<?php echo $bxx_h3_background;?>; font-family: <?php echo
$bxx_h3_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_size;?>px; text-decoration: <?php echo
$bxx_h3_decoration;?>; font-style: <?php echo $bxx_h3_style;?>; font-weight: <?php echo $bxx_h3_weight;?>; padding-left: <?php
echo $bxx_h3_padding_left;?>px; padding-right: <?php echo $bxx_h3_padding_right;?>px; padding-top: <?php echo
$bxx_h3_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_padding_bottom;?>px; margin-left: <?php echo
$bxx_h3_margin_left;?>px; margin-right: <?php echo $bxx_h3_margin_right;?>px; margin-top: <?php echo $bxx_h3_margin_top;?>px;
margin-bottom: <?php echo $bxx_h3_margin_bottom;?>px; text-transform: <?php echo $bxx_h3_font_trans;?>; line-height: <?php echo
$bxx_h3_line_height;?>%;}
h4 { color: #<?php echo $bxx_h4_color;?>; background-color:#<?php echo $bxx_h4_background;?>; font-family: <?php echo
$bxx_h4_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h4_size;?>px; text-decoration: <?php echo
$bxx_h4_decoration;?>; font-style: <?php echo $bxx_h4_style;?>; font-weight: <?php echo $bxx_h4_weight;?>; padding-left: <?php
echo $bxx_h4_padding_left;?>px; padding-right: <?php echo $bxx_h4_padding_right;?>px; padding-top: <?php echo
$bxx_h4_padding_top;?>px; padding-bottom: <?php echo $bxx_h4_padding_bottom;?>px; margin-left: <?php echo
$bxx_h4_margin_left;?>px; margin-right: <?php echo $bxx_h4_margin_right;?>px; margin-top: <?php echo $bxx_h4_margin_top;?>px;
margin-bottom: <?php echo $bxx_h4_margin_bottom;?>px;
text-transform: <?php echo $bxx_h4_font_trans;?>; line-height: <?php echo $bxx_h4_line_height;?>%;}
 h5 { color: #<?php echo $bxx_h5_color;?>; background-color:#<?php echo $bxx_h5_background;?>; font-family: <?php echo
$bxx_h5_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h5_size;?>px; text-decoration: <?php echo
$bxx_h5_decoration;?>; font-style: <?php echo $bxx_h5_style;?>; font-weight: <?php echo $bxx_h5_weight;?>; padding-left: <?php
echo $bxx_h5_padding_left;?>px; padding-right: <?php echo $bxx_h5_padding_right;?>px; padding-top: <?php echo
$bxx_h5_padding_top;?>px; padding-bottom: <?php echo $bxx_h5_padding_bottom;?>px; margin-left: <?php echo
$bxx_h5_margin_left;?>px; margin-right: <?php echo $bxx_h5_margin_right;?>px; margin-top: <?php echo $bxx_h5_margin_top;?>px;
margin-bottom: <?php echo $bxx_h5_margin_bottom;?>px; text-transform: <?php echo $bxx_h5_font_trans;?>; line-height: <?php echo
$bxx_h5_line_height;?>%;}
h6 { color: #<?php echo $bxx_h6_color;?>; background-color:#<?php echo $bxx_h6_background;?>; font-family: <?php echo
$bxx_h6_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h6_size;?>px; text-decoration: <?php echo
$bxx_h6_decoration;?>; font-style: <?php echo $bxx_h6_style;?>; font-weight: <?php echo $bxx_h6_weight;?>; padding-left: <?php
echo $bxx_h6_padding_left;?>px; padding-right: <?php echo $bxx_h6_padding_right;?>px; padding-top: <?php echo
$bxx_h6_padding_top;?>px; padding-bottom: <?php echo $bxx_h6_padding_bottom;?>px; margin-left: <?php echo
$bxx_h6_margin_left;?>px; margin-right: <?php echo $bxx_h6_margin_right;?>px; margin-top: <?php echo $bxx_h6_margin_top;?>px;
margin-bottom: <?php echo $bxx_h6_margin_bottom;?>px; text-transform: <?php echo $bxx_h6_font_trans;?>; line-height: <?php echo
$bxx_h6_line_height;?>%;}
h3.widget { color: #<?php echo $bxx_h3_widget_color;?>; background-color:#<?php echo $bxx_h3_widget_background;?>; font-family:
<?php echo $bxx_h3_widget_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_widget_size;?>px; text-decoration:
<?php echo $bxx_h3_widget_decoration;?>; font-style: <?php echo $bxx_h3_widget_style;?>; font-weight: <?php echo
$bxx_h3_widget_weight;?>;
padding-left: <?php echo $bxx_h3_widget_padding_left;?>px; padding-right: <?php echo $bxx_h3_widget_padding_right;?>px;
padding-top: <?php echo $bxx_h3_widget_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_widget_padding_bottom;?>px;
margin-left: <?php echo $bxx_h3_widget_margin_left;?>px; margin-right: <?php echo $bxx_h3_widget_margin_right;?>px; margin-top:
<?php echo $bxx_h3_widget_margin_top;?>px; margin-bottom: <?php echo $bxx_h3_widget_margin_bottom;?>px;
text-transform: <?php echo $bxx_h3_widget_font_trans;?>; line-height: <?php echo $bxx_h3_widget_line_height;?>%; }
h3.f1 { color: #<?php echo $bxx_h3_f1_color;?>; background-color:#<?php echo $bxx_h3_f1_background;?>; font-family: <?php echo
$bxx_h3_f1_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_f1_size;?>px; text-decoration: <?php echo
$bxx_h3_f1_decoration;?>; font-style: <?php echo $bxx_h3_f1_style;?>; font-weight: <?php echo $bxx_h3_f1_weight;?>;
padding-left: <?php echo $bxx_h3_f1_padding_left;?>px; padding-right: <?php echo $bxx_h3_f1_padding_right;?>px; padding-top:
<?php echo $bxx_h3_f1_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_f1_padding_bottom;?>px; margin-left: <?php echo
$bxx_h3_f1_margin_left;?>px; margin-right: <?php echo $bxx_h3_f1_margin_right;?>px; margin-top: <?php echo
$bxx_h3_f1_margin_top;?>px; margin-bottom: <?php echo $bxx_h3_f1_margin_bottom;?>px; }
h3.hw1 { color: #<?php echo $bxx_h3_hw1_color;?>; background-color:#<?php echo $bxx_h3_hw1_background;?>; font-family: <?php
echo $bxx_h3_hw1_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_hw1_size;?>px; text-decoration: <?php echo
$bxx_h3_hw1_decoration;?>; font-style: <?php echo $bxx_h3_hw1_style;?>; font-weight: <?php echo $bxx_h3_hw1_weight;?>;
padding-left: <?php echo $bxx_h3_hw1_padding_left;?>px; padding-right: <?php echo $bxx_h3_hw1_padding_right;?>px; padding-top:
<?php echo $bxx_h3_hw1_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_hw1_padding_bottom;?>px; margin-left: <?php echo
$bxx_h3_hw1_margin_left;?>px; margin-right: <?php echo $bxx_h3_hw1_margin_right;?>px; margin-top: <?php echo
$bxx_h3_hw1_margin_top;?>px; margin-bottom: <?php echo $bxx_hw1_widget_margin_bottom;?>px; } h3.hw2 { color: #<?php echo
$bxx_h3_hw2_color;?>; background-color:#<?php echo $bxx_h3_hw2_background;?>; font-family: <?php echo $bxx_h3_hw2_font;?>, <?php
echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_hw2_size;?>px; text-decoration: <?php echo $bxx_h3_hw2_decoration;?>;
font-style: <?php echo $bxx_h3_hw2_style;?>; font-weight: <?php echo $bxx_h3_hw2_weight;?>; padding-left: <?php echo
$bxx_h3_hw2_padding_left;?>px; padding-right: <?php echo $bxx_h3_hw2_padding_right;?>px; padding-top: <?php echo
$bxx_h3_hw2_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_hw2_padding_bottom;?>px; margin-left: <?php echo
$bxx_h3_hw2_margin_left;?>px; margin-right: <?php echo $bxx_h3_hw2_margin_right;?>px; margin-top: <?php echo
$bxx_h3_hw2_margin_top;?>px; margin-bottom: <?php echo $bxx_hw2_widget_margin_bottom;?>px; } 
.metabox { background-color: #<?php
echo $bxx_meta_background;?>; color: #<?php echo $bxx_meta_text_color;?>; padding-left: <?php echo
$bxx_meta_padding_left;?>px; padding-right: <?php echo $bxx_meta_padding_right;?>px; padding-top: <?php echo
$bxx_meta_padding_top;?>px; padding-bottom: <?php echo $bxx_meta_padding_bottom;?>px; clear:both; margin-left: <?php echo
$bxx_meta_margin_left;?>px; margin-right: <?php echo $bxx_meta_margin_right;?>px; margin-top: <?php echo
$bxx_meta_margin_top;?>px; margin-bottom: <?php echo $bxx_meta_margin_bottom;?>px; width: 100%; line-height: 130%; } 
h5#slogan {color: #<?php echo $bxx_slogan_color;?>; font-size: <?php echo $bxx_slogan_size;?>px; text-decoration: <?php echo
$bxx_slogan_decoration;?>; line-height: 110%; font-weight: <?php echo $bxx_slogan_weight;?>; font-family: <?php echo
$bxx_slogan_font_family;?>, <?php echo $bxx_p_font;?>; background-color: #<?php echo $bxx_slogan_background_color;?>; font-size:
<?php echo $bxx_slogan_size;?>px; float: <?php echo $bxx_slogan_float;?>; margin-bottom: 0px; padding: 0px; margin-top: 0px;
text-transform: <?php echo $bxx_slogan_trans;?>; clear: both; margin-left: 0px; margin-right: 15px; } #comment-land textarea {
background: none; width:90%; padding: 10px; font-family: <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px;
border: <?php echo $bxx_container_border_width;?>px solid #<?php echo $bxx_container_border_color;?>; } #respond #author,
#respond #url, #respond #email { width: 80%; font-family: <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px;
background: none; padding: 2px; border: <?php echo $bxx_container_border_width;?>px solid #<?php echo
$bxx_container_border_color;?>; }
.sticky { padding-left: <?php echo $bxx_sticky_padding_left;?>px; padding-right: <?php echo $bxx_sticky_padding_right;?>px;
padding-top: <?php echo $bxx_sticky_padding_top;?>px; padding-bottom: <?php echo $bxx_sticky_padding_bottom;?>px; margin-left:
<?php echo $bxx_sticky_margin_left;?>px; margin-right: <?php echo $bxx_sticky_margin_right;?>px; margin-top: <?php echo
$bxx_sticky_margin_top;?>px; margin-bottom: <?php echo $bxx_sticky_margin_bottom;?>px; background-color:#<?php echo
$bxx_sticky_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo
$bxx_sticky_background_image;?>); background-position: <?php echo $bxx_sticky_background_image_position;?>; background-repeat:
<?php echo $bxx_sticky_background_image_repeat;?>; border: <?php echo $bxx_sticky_border_width;?>px <?php echo
$bxx_sticky_border_type;?> #<?php echo $bxx_sticky_border_color;?>; }
img{ border: <?php echo $bxx_image_border_width;?>px <?php echo $bxx_image_border_type;?> #<?php echo
$bxx_image_border_color;?>; }
.wp-caption { border: <?php echo $bxx_caption_border_width;?>px <?php echo $bxx_caption_border_type;?> #<?php echo
$bxx_caption_border_color;?>; text-align: center; background-color:#<?php echo $bxx_caption_background_color;?>; padding-top:
4px; margin: 10px; }
.wp-caption p.wp-caption-text { font-size: <?php echo $bxx_caption_font_size;?>px; line-height: 17px; padding: 5px; margin: 0;
color:#<?php echo $bxx_caption_font_color;?>; }
.navigation a:link, .navigation a:hover, .navigation a:visited { background: none; color:#<?php echo $bxx_a_link_color;?>;
border: 1px solid #<?php echo $bxx_a_link_color;?>; padding:3px; margin-top: 15px; line-height: 200%; }
#sidebar ul li, #footer ul li { list-style-type: <?php echo $bxx_widget_ul_li_pre;?>; background-color:#<?php echo
$bxx_widget_ul_li_background_color;?>; color:#<?php echo $bxx_widget_ul_li_color;?>; font-family: <?php echo
$bxx_widget_ul_li_font;?>; font-size: <?php echo $bxx_widget_ul_li_size;?>px; font-weight:<?php echo
$bxx_widget_ul_li_font_weight;?>; font-style:<?php echo $bxx_widget_ul_li_font_style;?>; text-decoration: <?php echo
$bxx_widget_ul_li_decoration;?>; list-style-position: <?php echo $bxx_widget_ul_li_inside_outside;?>; margin-top: <?php echo
$bxx_widget_ul_li_margin_top;?>px; margin-right:<?php echo $bxx_widget_ul_li_margin_right;?>px; margin-bottom:<?php echo
$bxx_widget_ul_li_margin_bottom;?>px; margin-left: <?php echo $bxx_widget_ul_li_margin_left;?>px; padding-top:<?php echo
$bxx_widget_ul_li_padding_top;?>px; padding-right:<?php echo $bxx_widget_ul_li_padding_right;?>px; padding-bottom:<?php echo
$bxx_widget_ul_li_padding_bottom;?>px; padding-left: <?php echo $bxx_widget_ul_li_padding_left;?>px; }
#sidebar ul, #footer ul { background-color: #<?php echo $bxx_widget_ul_background_color;?>; margin-top: <?php echo
$bxx_widget_ul_margin_top;?>px; margin-right:<?php echo $bxx_widget_ul_margin_right;?>px; margin-bottom:<?php echo
$bxx_widget_ul_margin_right;?>px; margin-left: <?php echo $bxx_widget_ul_margin_right;?>px; padding-top:<?php echo
$bxx_widget_ul_padding_top;?>px; padding-right:<?php echo $bxx_widget_ul_padding_right;?>px;widget_ol padding-bottom:<?php echo
$bxx_widget_ul_padding_right;?>px; padding-left: <?php echo $bxx_widget_ul_padding_right;?>px; }
#sidebar ol li, #footer ol li { list-style-type: <?php echo $bxx_widget_ol_li_pre;?>; background-color:#<?php echo
$bxx_widget_ol_li_background_color;?>; color:#<?php echo $bxx_widget_ol_li_color;?>; font-family: <?php echo
$bxx_widget_ol_li_font;?>; font-size: <?php echo $bxx_widget_ol_li_size;?>px; font-weight:<?php echo
$bxx_widget_ol_li_font_weight;?>; font-style:<?php echo $bxx_widget_ol_li_font_style;?>; text-decoration: <?php echo
$bxx_widget_ol_li_decoration;?>; list-style-position: <?php echo $bxx_widget_ol_li_inside_outside;?>; margin-top: <?php echo
$bxx_widget_ol_li_margin_top;?>px; margin-right:<?php echo $bxx_widget_ol_li_margin_right;?>px; margin-bottom:<?php echo
$bxx_widget_ol_li_margin_bottom;?>px; margin-left: <?php echo $bxx_widget_ol_li_margin_left;?>px; padding-top:<?php echo
$bxx_widget_ol_li_padding_top;?>px; padding-right:<?php echo $bxx_widget_ol_li_padding_right;?>px; padding-bottom:<?php echo
$bxx_widget_ol_li_padding_bottom;?>px; padding-left: <?php echo $bxx_widget_ol_li_padding_left;?>px; } #sidebar ol, #footer ol {
background-color: #<?php echo $bxx_widget_ol_background_color;?>; margin-top: <?php echo $bxx_widget_ol_margin_top;?>px;
margin-right:<?php echo $bxx_widget_ol_margin_right;?>px; margin-bottom:<?php echo $bxx_widget_ol_margin_right;?>px;
margin-left: <?php echo $bxx_widget_ol_margin_right;?>px; padding-top:<?php echo $bxx_widget_ol_padding_top;?>px;
padding-right:<?php echo $bxx_widget_ol_padding_right;?>px;widget_ol padding-bottom:<?php echo
$bxx_widget_ol_padding_right;?>px; padding-left: <?php echo $bxx_widget_ol_padding_right;?>px; }
ul.commentlist li.thread-odd { background:#<?php echo $bxx_comment_odd_background;?>; border:<?php echo
$bxx_comment_odd_border_width;?>px <?php echo $bxx_comment_odd_border_type;?> #<?php echo $bxx_comment_odd_border_color;?>;
margin-left:0px; margin:0px; padding:0px; float:left; }
ul.commentlist li.thread-even { background:#<?php echo $bxx_comment_even_background;?>; border:<?php echo
$bxx_comment_even_border_width;?>px <?php echo $bxx_comment_even_border_type;?> #<?php echo $bxx_comment_even_border_color;?>;
margin-left:0px; margin:0px; padding:0px; float:left; }
ul.commentlist li.bypostauthor { background:#<?php echo $bxx_comment_author_background;?>; border:<?php echo
$bxx_comment_author_border_width;?>px <?php echo $bxx_comment_author_border_type;?> #<?php echo
$bxx_comment_author_border_color;?>; margin-left:0px; margin:0px; padding:0px; float:left; }
ul.commentlist li.thread-even p { color:#<?php echo $bxx_comment_even_p_color;?>; padding: 2px; }
ul.commentlist li.thread-odd p { color:#<?php echo $bxx_comment_odd_p_color;?>; padding: 2px; }
ul.commentlist li.thread-even .comment-reply-link { padding:5px; border:1px solid; margin: 5px;  color:#<?php echo
$bxx_comment_even_p_color;?>; }
ul.commentlist li.thread-odd .comment-reply-link { padding:5px; border:1px solid; margin: 5px;
color:#<?php echo $bxx_comment_odd_p_color;?>; }
ul.commentlist li.bypostauthor .comment-reply-link { padding:5px; border:1px solid; margin: 5px; color:#<?php echo
$bxx_comment_author_p_color;?>; }
ul.commentlist li.thread-even .author-name { background:#<?php echo $bxx_comment_even_background;?>; font-size:<?php echo
$bxx_comment_name_size;?>px; color:#<?php echo $bxx_comment_even_p_color;?>; }
ul.commentlist li.thread-odd .author-name { background:#<?php echo $bxx_comment_odd_background;?>; color:#<?php echo
$bxx_comment_odd_p_color;?>; font-size:<?php echo $bxx_comment_name_size;?>px; }
.commentlist li.thread-odd .comment-span a:link, { color:#<?php echo $bxx_comment_odd_link_color;?>; background:#<?php echo
$bxx_comment_odd_background;?>; }
.commentlist li.thread-even .comment-span a:link,{ color:#<?php echo $bxx_comment_even_link_color;?>; background:#<?php echo
$bxx_comment_even_background;?>; } ul.commentlist li.bypostauthor a:link, { color:#<?php echo $bxx_comment_author_link_color;?>;
background:#<?php echo $bxx_comment_author_background;?>; } ul.commentlist li.bypostauthor .author-name { background:#<?php echo
$bxx_comment_author_background;?>; font-size:<?php echo $bxx_comment_name_size;?>px; color:#<?php echo
$bxx_comment_author_p_color;?>; } .author-name { font-size: 14px; padding: 1px; width: 400px; margin-top: 4px; margin-bottom:
1px; margin-left: 1px; margin-right: 1px; background-color: none; clear: none; } ul.commentlist li.bypostauthor p { color:#<?php
echo $bxx_comment_author_p_color;?>; padding: 4px; }
#tagcon a { font-family: <?php echo $bxx_a_footerlink_font_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_a_footerlink_size_normal;?>px; text-decoration: <?php echo $bxx_a_footerlink_decoration;?>; font-style: <?php echo
$bxx_a_footerlink_style;?>; font-weight: <?php echo $bxx_a_footerlink_weight;?>; text-transform: <?php echo
$bxx_footerlink_trans_normal;?>; }
#tagcon a:link { color: #<?php echo $bxx_tag_area_font_color;?>; padding: 3px;
} #tagcon a:visited { color: #<?php echo $bxx_tag_area_font_color;?>; }
#tagcon a:hover { color:#<?php echo $bxx_tag_area_font_color_hover;?>; }
#tagcon a:visited { color:#<?php echo $bxx_tag_area_font_color_visited;?>; }
.comment-pic img { border:<?php echo $bxx_avatar_border_size;?>px <?php echo $bxx_avatar_border_type;?> #<?php echo
$bxx_avatar_border_color;?>; float:<?php echo $bxx_avatar_float;?>; height:<?php echo $bxx_avatar_size;?>px; width:<?php echo
$bxx_avatar_size;?>px; margin:5px 10px 5px 5px; padding:0px; } #main ul { background-color: #<?php echo
$bxx_ul_background_color;?>; margin-top: <?php echo $bxx_ul_margin_top;?>px; margin-right:<?php echo $bxx_ul_margin_right;?>px;
margin-bottom:<?php echo $bxx_ul_margin_right;?>px; margin-left: <?php echo $bxx_ul_margin_right;?>px; padding-top: <?php echo
$bxx_ul_padding_top;?>px; padding-right:<?php echo $bxx_ul_padding_right;?>px; padding-bottom:<?php echo
$bxx_ul_padding_right;?>px; padding-left: <?php echo $bxx_ul_padding_right;?>px; } #main ol { background-color: #<?php echo
$bxx_ol_background_color;?>; margin-top: <?php echo $bxx_ol_margin_top;?>px; margin-right:<?php echo $bxx_ol_margin_right;?>px;
margin-bottom:<?php echo $bxx_ol_margin_right;?>px; margin-left: <?php echo $bxx_ol_margin_right;?>px; padding-top:<?php echo
$bxx_ol_padding_top;?>px; padding-right:<?php echo $bxx_ol_padding_right;?>px; padding-bottom:<?php echo
$bxx_ol_padding_right;?>px; padding-left: <?php echo $bxx_ol_padding_right;?>px; } #main ul li{ list-style-type: <?php echo
$bxx_ul_li_pre;?>; background-color:#<?php echo $bxx_ul_li_background_color;?>; color:#<?php echo $bxx_ul_li_color;?>;
font-family: <?php echo $bxx_ul_li_font;?>; font-size: <?php echo $bxx_ul_li_size;?>px; font-weight:<?php echo
$bxx_ul_li_font_weight;?>; font-style:<?php echo $bxx_ul_li_font_style;?>; text-decoration: <?php echo $bxx_ul_li_decoration;?>;
list-style-position: <?php echo $bxx_ul_li_inside_outside;?>; margin-top: <?php echo $bxx_ul_li_margin_top;?>px;
margin-right:<?php echo $bxx_ul_li_margin_right;?>px; margin-bottom:<?php echo $bxx_ul_li_margin_bottom;?>px; margin-left: <?php
echo $bxx_ul_li_margin_left;?>px; padding-top:<?php echo $bxx_ul_li_padding_top;?>px; padding-right:<?php echo
$bxx_ul_li_padding_right;?>px; padding-bottom:<?php echo $bxx_ul_li_padding_bottom;?>px; padding-left: <?php echo
$bxx_ul_li_padding_left;?>px; }
#main ol li{ list-style-type: <?php echo $bxx_ol_li_pre;?>; background-color:#<?php echo $bxx_ol_li_background_color;?>;
color:#<?php echo $bxx_ol_li_color;?>; font-family: <?php echo $bxx_ol_li_font;?>; font-size: <?php echo $bxx_ol_li_size;?>px;
font-weight:<?php echo $bxx_ol_li_font_weight;?>; font-style:<?php echo $bxx_ol_li_font_style;?>; text-decoration: <?php echo
$bxx_ol_li_decoration;?>; list-style-position: <?php echo $bxx_ol_li_inside_outside;?>; margin-top: <?php echo
$bxx_ol_li_margin_top;?>px; margin-right:<?php echo $bxx_ol_li_margin_right;?>px; margin-bottom:<?php echo
$bxx_ol_li_margin_bottom;?>px; margin-left: <?php echo $bxx_ol_li_margin_left;?>px; padding-top:<?php echo
$bxx_ol_li_padding_top;?>px; padding-right:<?php echo $bxx_ol_li_padding_right;?>px; padding-bottom:<?php echo
$bxx_ol_li_padding_bottom;?>px; padding-left: <?php echo $bxx_ol_li_padding_left;?>px; } blockquote p { color: #<?php echo
$bxx_bloc_color;?>; font-family: <?php echo $bxx_bloc_family;?>,<?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_bloc_font_size;?>px; text-decoration: <?php echo $bxx_bloc_decoration;?>; font-style: <?php echo $bxx_bloc_style;?>;
font-weight: <?php echo $bxx_bloc_weight;?>; } blockquote { background-color:#<?php echo $bxx_bloc_background_color;?>;
color:#<?php echo $bxx_bloc_color;?>; clear: both; width:80%; padding-left: <?php echo $bxx_bloc_padding_left;?>px;
padding-right: <?php echo $bxx_bloc_padding_right;?>px; padding-top: <?php echo $bxx_bloc_padding_top;?>px; text-transform:
<?php echo $bxx_bloc_font_trans;?>; padding-bottom: <?php echo $bxx_bloc_padding_bottom;?>px; margin-left: <?php echo
$bxx_bloc_margin_left;?>px; margin-right: <?php echo $bxx_bloc_margin_right;?>px; margin-top: <?php echo
$bxx_bloc_margin_top;?>px; margin-bottom: <?php echo $bxx_bloc_margin_bottom;?>px; border: <?php echo
$bxx_bloc_border_width;?>px <?php echo $bxx_bloc_border_type;?> #<?php echo $bxx_bloc_border_color;?>; font-family: <?php echo
$bxx_bloc_family;?>,<?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_bloc_font_size;?>px; text-decoration: <?php echo
$bxx_bloc_decoration;?>; font-style: <?php echo $bxx_bloc_style;?>; font-weight: <?php echo $bxx_bloc_weight;?>; } .basement {
color:#<?php echo $bxx_footer_base_p;?>; font-size: 11px; } .footer-base a { color:#<?php echo $bxx_footer_base_link;?>;
font-size: 11px; } </style>