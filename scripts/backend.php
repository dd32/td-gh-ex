<?php
	global $options;
	foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
	}
?>
<style type="text/css"> .masthead-img { border: 0px solid red; margin-left: 70px; } .left-better-half { width: 440px; height: 100px; margin: 3px; float: left; } .right-better-half { width: 440px; height: 100px; margin: 3px; float: right; } .space-boy-space { height: 300px; width: 100%; } .text-appolo { width:210px; float:left; margin-left: 10px; } .test-h1 { color:#<?php echo $bxx_h1_color;?>; background-color:#<?php echo $bxx_h1_background;?>; font-family: <?php echo $bxx_h1_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h1_size;?>px; text-decoration: <?php echo $bxx_h1_decoration;?>; font-style: <?php echo $bxx_h1_style;?>; font-weight: <?php echo $bxx_h1_weight;?>; padding-left: <?php echo $bxx_h1_padding_left;?>px; padding-right: <?php echo $bxx_h1_padding_right;?>px; padding-top: <?php echo $bxx_h1_padding_top;?>px; padding-bottom: <?php echo $bxx_h1_padding_bottom;?>px; margin-left: <?php echo $bxx_h1_margin_left;?>px; margin-right: <?php echo $bxx_h1_margin_right;?>px; margin-top: <?php echo $bxx_h1_margin_top;?>px; margin-bottom: <?php echo $bxx_h1_margin_bottom;?>px; text-transform: <?php echo $bxx_h1_font_trans;?>; line-height: <?php echo $bxx_h1_line_height;?>%; width: 500px; } #dummy-left { width: 600px; float: left; } h3.jam { color: #<?php echo $bxx_h3_widget_color;?>; background-color:#<?php echo $bxx_h3_widget_background;?>; font-family: <?php echo $bxx_h3_widget_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_widget_size;?>px; text-decoration: <?php echo $bxx_h3_widget_decoration;?>; font-style: <?php echo $bxx_h3_widget_style;?>; font-weight: <?php echo $bxx_h3_widget_weight;?>; padding-left: <?php echo $bxx_h3_widget_padding_left;?>px; padding-right: <?php echo $bxx_h3_widget_padding_right;?>px; padding-top: <?php echo $bxx_h3_widget_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_widget_padding_bottom;?>px; margin-left: <?php echo $bxx_h3_widget_margin_left;?>px; margin-right: <?php echo $bxx_h3_widget_margin_right;?>px; margin-top: <?php echo $bxx_h3_widget_margin_top;?>px; margin-bottom: <?php echo $bxx_h3_widget_margin_bottom;?>px; text-transform: <?php echo $bxx_h3_widget_font_trans;?>; line-height: <?php echo $bxx_h3_widget_line_height;?>%; } .move { padding-left: 20px; padding-top: 10px; width: 850px; } #x01, #x02, #x03 { display: none; } h3.hw1 { color: #<?php echo $bxx_h3_hw1_color;?>; background-color:#<?php echo $bxx_h3_hw1_background;?>; font-family: <?php echo $bxx_h3_hw1_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_hw1_size;?>px; text-decoration: <?php echo $bxx_h3_hw1_decoration;?>; font-style: <?php echo $bxx_h3_hw1_style;?>; font-weight: <?php echo $bxx_h3_hw1_weight;?>; padding: 10px; margin: 10px; } .moloko { float: right; clear: none; padding: 5px; } .rightbut { width: 100px; margin: 15px; } h3.f1 { color: #<?php echo $bxx_h3_f1_color;?>; background-color:#<?php echo $bxx_h3_f1_background;?>; font-family: <?php echo $bxx_h3_f1_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_f1_size;?>px; text-decoration: <?php echo $bxx_h3_f1_decoration;?>; font-style: <?php echo $bxx_h3_f1_style;?>; font-weight: <?php echo $bxx_h3_f1_weight;?>; padding-left: <?php echo $bxx_h3_f1_padding_left;?>px; padding-right: <?php echo $bxx_h3_f1_padding_right;?>px; padding-top: <?php echo $bxx_h3_f1_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_f1_padding_bottom;?>px; margin-left: <?php echo $bxx_h3_f1_margin_left;?>px; margin-right: <?php echo $bxx_h3_f1_margin_right;?>px; margin-top: <?php echo $bxx_h3_f1_margin_top;?>px; margin-bottom: <?php echo $bxx_h3_f1_margin_bottom;?>px; } h3.f2 { color: #<?php echo $bxx_h3_f2_color;?>; background-color:#<?php echo $bxx_h3_f2_background;?>; font-family: <?php echo $bxx_h3_f2_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_f2_size;?>px; text-decoration: <?php echo $bxx_h3_f2_decoration;?>; font-style: <?php echo $bxx_h3_f2_style;?>; font-weight: <?php echo $bxx_h3_f2_weight;?>; padding: 10px; margin: 10px; } h3.f3 { color: #<?php echo $bxx_h3_f3_color;?>; background-color:#<?php echo $bxx_h3_f3_background;?>; font-family: <?php echo $bxx_h3_f3_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_f3_size;?>px; text-decoration: <?php echo $bxx_h3_f3_decoration;?>; font-style: <?php echo $bxx_h3_f3_style;?>; font-weight: <?php echo $bxx_h3_f3_weight;?>; padding: 10px; margin: 10px; } h3.hw2 { color: #<?php echo $bxx_h3_hw2_color;?>; background-color:#<?php echo $bxx_h3_hw2_background;?>; font-family: <?php echo $bxx_h3_hw2_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_hw2_size;?>px; text-decoration: <?php echo $bxx_h3_hw2_decoration;?>; font-style: <?php echo $bxx_h3_hw2_style;?>; font-weight: <?php echo $bxx_h3_hw2_weight;?>; padding: 10px; margin: 10px; } #dummy-hw1 { width: 500px; overflow: hidden; background: #<?php echo $bxx_top_left_sidebar_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_top_left_sidebar_background_image;?>); background-repeat: <?php echo $bxx_top_left_sidebar_background_image_repeat;?>; margin: 0 auto; text-align: left; padding: 10px; } #dummy-hw2 { width: 500px;; overflow: hidden; background: #<?php echo $bxx_top_right_sidebar_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_top_right_sidebar_background_image;?>); background-repeat: <?php echo $bxx_top_right_sidebar_background_image_repeat;?>; margin: 0 auto; text-align: left; padding: 10px; } #dummy-f1 { width: 500px; background: #<?php echo $bxx_footer_left_sidebar_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_footer_left_sidebar_background_image;?>); background-repeat: <?php echo $bxx_footer_left_sidebar_background_image_repeat;?>; margin: auto; padding: 3px; } #dummy-main-sidebar{ background-color: #<?php echo $bxx_main_sidebar_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_main_sidebar_background_image;?>); background-repeat: <?php echo $bxx_main_sidebar_background_image_repeat;?>; background-position: <?php echo $bxx_main_sidebar_background_image_align;?>; width: 260px; float: right; clear: none; padding: 0px; } #one-list ul { background-color: #<?php echo $bxx_ul_background_color;?>; margin-top: <?php echo $bxx_ul_margin_top;?>px; margin-right:<?php echo $bxx_ul_margin_right;?>px; margin-bottom:<?php echo $bxx_ul_margin_right;?>px; margin-left: <?php echo $bxx_ul_margin_right;?>px; padding-top: <?php echo $bxx_ul_padding_top;?>px; padding-right:<?php echo $bxx_ul_padding_right;?>px; padding-bottom:<?php echo $bxx_ul_padding_right;?>px; padding-left: <?php echo $bxx_ul_padding_right;?>px; } #two-list ol { background-color: #<?php echo $bxx_ol_background_color;?>; margin-top: <?php echo $bxx_ol_margin_top;?>px; margin-right:<?php echo $bxx_ol_margin_right;?>px; margin-bottom:<?php echo $bxx_ol_margin_right;?>px; margin-left: <?php echo $bxx_ol_margin_right;?>px; padding-top:<?php echo $bxx_ol_padding_top;?>px; padding-right:<?php echo $bxx_ol_padding_right;?>px; padding-bottom:<?php echo $bxx_ol_padding_right;?>px; padding-left: <?php echo $bxx_ol_padding_right;?>px; } #one-list ul li{ list-style-type: <?php echo $bxx_ul_li_pre;?>; background-color:#<?php echo $bxx_ul_li_background_color;?>; color:#<?php echo $bxx_ul_li_color;?>; font-family: <?php echo $bxx_ul_li_font;?>; font-size: <?php echo $bxx_ul_li_size;?>px; font-weight:<?php echo $bxx_ul_li_font_weight;?>; font-style:<?php echo $bxx_ul_li_font_style;?>; text-decoration: <?php echo $bxx_ul_li_decoration;?>; list-style-position: <?php echo $bxx_ul_li_inside_outside;?>; margin-top: <?php echo $bxx_ul_li_margin_top;?>px; margin-right:<?php echo $bxx_ul_li_margin_right;?>px; margin-bottom:<?php echo $bxx_ul_li_margin_bottom;?>px; margin-left: <?php echo $bxx_ul_li_margin_left;?>px; padding-top:<?php echo $bxx_ul_li_padding_top;?>px; padding-right:<?php echo $bxx_ul_li_padding_right;?>px; padding-bottom:<?php echo $bxx_ul_li_padding_bottom;?>px; padding-left: <?php echo $bxx_ul_li_padding_left;?>px; } #two-list ol li{ list-style-type: <?php echo $bxx_ol_li_pre;?>; background-color:#<?php echo $bxx_ol_li_background_color;?>; color:#<?php echo $bxx_ol_li_color;?>; font-family: <?php echo $bxx_ol_li_font;?>; font-size: <?php echo $bxx_ol_li_size;?>px; font-weight:<?php echo $bxx_ol_li_font_weight;?>; font-style:<?php echo $bxx_ol_li_font_style;?>; text-decoration: <?php echo $bxx_ol_li_decoration;?>; list-style-position: <?php echo $bxx_ol_li_inside_outside;?>; margin-top: <?php echo $bxx_ol_li_margin_top;?>px; margin-right:<?php echo $bxx_ol_li_margin_right;?>px; margin-bottom:<?php echo $bxx_ol_li_margin_bottom;?>px; margin-left: <?php echo $bxx_ol_li_margin_left;?>px; padding-top:<?php echo $bxx_ol_li_padding_top;?>px; padding-right:<?php echo $bxx_ol_li_padding_right;?>px; padding-bottom:<?php echo $bxx_ol_li_padding_bottom;?>px; padding-left: <?php echo $bxx_ol_li_padding_left;?>px; } #three-list ul li { list-style-type: <?php echo $bxx_widget_ul_li_pre;?>; background-color:#<?php echo $bxx_widget_ul_li_background_color;?>; color:#<?php echo $bxx_widget_ul_li_color;?>; font-family: <?php echo $bxx_widget_ul_li_font;?>; font-size: <?php echo $bxx_widget_ul_li_size;?>px; font-weight:<?php echo $bxx_widget_ul_li_font_weight;?>; font-style:<?php echo $bxx_widget_ul_li_font_style;?>; text-decoration: <?php echo $bxx_widget_ul_li_decoration;?>; list-style-position: <?php echo $bxx_widget_ul_li_inside_outside;?>; margin-top: <?php echo $bxx_widget_ul_li_margin_top;?>px; margin-right:<?php echo $bxx_widget_ul_li_margin_right;?>px; margin-bottom:<?php echo $bxx_widget_ul_li_margin_bottom;?>px; margin-left: <?php echo $bxx_widget_ul_li_margin_left;?>px; padding-top:<?php echo $bxx_widget_ul_li_padding_top;?>px; padding-right:<?php echo $bxx_widget_ul_li_padding_right;?>px; padding-bottom:<?php echo $bxx_widget_ul_li_padding_bottom;?>px; padding-left: <?php echo $bxx_widget_ul_li_padding_left;?>px; } #three-list ul { background-color: #<?php echo $bxx_widget_ul_background_color;?>; margin-top: <?php echo $bxx_widget_ul_margin_top;?>px; margin-right:<?php echo $bxx_widget_ul_margin_right;?>px; margin-bottom:<?php echo $bxx_widget_ul_margin_right;?>px; margin-left: <?php echo $bxx_widget_ul_margin_right;?>px; padding-top:<?php echo $bxx_widget_ul_padding_top;?>px; padding-right:<?php echo $bxx_widget_ul_padding_right;?>px;widget_ol padding-bottom:<?php echo $bxx_widget_ul_padding_right;?>px; padding-left: <?php echo $bxx_widget_ul_padding_right;?>px; } #four-list ol li { list-style-type: <?php echo $bxx_widget_ol_li_pre;?>; background-color:#<?php echo $bxx_widget_ol_li_background_color;?>; color:#<?php echo $bxx_widget_ol_li_color;?>; font-family: <?php echo $bxx_widget_ol_li_font;?>; font-size: <?php echo $bxx_widget_ol_li_size;?>px; font-weight:<?php echo $bxx_widget_ol_li_font_weight;?>; font-style:<?php echo $bxx_widget_ol_li_font_style;?>; text-decoration: <?php echo $bxx_widget_ol_li_decoration;?>; list-style-position: <?php echo $bxx_widget_ol_li_inside_outside;?>; margin-top: <?php echo $bxx_widget_ol_li_margin_top;?>px; margin-right:<?php echo $bxx_widget_ol_li_margin_right;?>px; margin-bottom:<?php echo $bxx_widget_ol_li_margin_bottom;?>px; margin-left: <?php echo $bxx_widget_ol_li_margin_left;?>px; padding-top:<?php echo $bxx_widget_ol_li_padding_top;?>px; padding-right:<?php echo $bxx_widget_ol_li_padding_right;?>px; padding-bottom:<?php echo $bxx_widget_ol_li_padding_bottom;?>px; padding-left: <?php echo $bxx_widget_ol_li_padding_left;?>px; } #four-list ol { background-color: #<?php echo $bxx_widget_ol_background_color;?>; margin-top: <?php echo $bxx_widget_ol_margin_top;?>px; margin-right:<?php echo $bxx_widget_ol_margin_right;?>px; margin-bottom:<?php echo $bxx_widget_ol_margin_right;?>px; margin-left: <?php echo $bxx_widget_ol_margin_right;?>px; padding-top:<?php echo $bxx_widget_ol_padding_top;?>px; padding-right:<?php echo $bxx_widget_ol_padding_right;?>px;widget_ol padding-bottom:<?php echo $bxx_widget_ol_padding_right;?>px; padding-left: <?php echo $bxx_widget_ol_padding_right;?>px; } .back { background-color:#<?php echo $bxx_table_background_color;?>; width:500px; padding-left: <?php echo $bxx_table_padding_left;?>px; padding-right: <?php echo $bxx_table_padding_right;?>px; padding-top: <?php echo $bxx_table_padding_top;?>px; padding-bottom: <?php echo $bxx_table_padding_bottom;?>px; margin-left: <?php echo $bxx_table_margin_left;?>px; margin-right: <?php echo $bxx_table_margin_right;?>px; margin-top: <?php echo $bxx_table_margin_top;?>px; margin-bottom: <?php echo $bxx_table_margin_bottom;?>px; border: <?php echo $bxx_table_border_width;?>px <?php echo$bxx_table_border_type;?> #<?php echo$bxx_table_border_color;?>; } .back-td { background-color:#<?php echo $bxx_td_background_color;?>; color:#<?php echo $bxx_td_color;?>; width:80%; padding-left: <?php echo $bxx_td_padding_left;?>px; padding-right: <?php echo $bxx_td_padding_right;?>px; padding-top: <?php echo $bxx_td_padding_top;?>px; padding-bottom: <?php echo $bxx_td_padding_bottom;?>px; border: <?php echo $bxx_td_border_width;?>px <?php echo $bxx_td_border_type;?> #<?php echo $bxx_td_border_color;?>; font-family: <?php echo $bxx_td_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_td_font_size;?>px; text-decoration: <?php echo $bxx_td_decoration;?>; font-style: <?php echo $bxx_td_style;?>; font-weight: <?php echo $bxx_td_weight;?>; text-transform: <?php echo $bxx_td_trans;?>; } .back-th { background-color:#<?php echo $bxx_th_background_color;?>; color:#<?php echo $bxx_th_color;?>; width:80%; padding-left: <?php echo $bxx_th_padding_left;?>px; padding-right: <?php echo $bxx_th_padding_right;?>px; padding-top: <?php echo $bxx_th_padding_top;?>px; padding-bottom: <?php echo $bxx_th_padding_bottom;?>px; border: <?php echo $bxx_th_border_width;?>px <?php echo $bxx_th_border_type;?> #<?php echo $bxx_th_border_color;?>; font-family: <?php echo $bxx_th_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_th_font_size;?>px; text-decoration: <?php echo $bxx_th_decoration;?>; font-style: <?php echo $bxx_th_style;?>; font-weight: <?php echo $bxx_th_weight;?>; text-transform: <?php echo $bxx_th_trans;?>; } .backend-block { background-color:#<?php echo $bxx_bloc_background_color;?>; color:#<?php echo $bxx_bloc_color;?>; clear: both; width:500px; padding-left: <?php echo $bxx_bloc_padding_left;?>px; padding-right: <?php echo $bxx_bloc_padding_right;?>px; padding-top: <?php echo $bxx_bloc_padding_top;?>px; text-transform: <?php echo $bxx_bloc_font_trans;?>; padding-bottom: <?php echo $bxx_bloc_padding_bottom;?>px; margin-left: <?php echo $bxx_bloc_margin_left;?>px; margin-right: <?php echo $bxx_bloc_margin_right;?>px; margin-top: <?php echo $bxx_bloc_margin_top;?>px; margin-bottom: <?php echo $bxx_bloc_margin_bottom;?>px; border: <?php echo $bxx_bloc_border_width;?>px <?php echo $bxx_bloc_border_type;?> #<?php echo $bxx_bloc_border_color;?>; font-family: <?php echo $bxx_bloc_family;?>,<?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_bloc_font_size;?>px; text-decoration: <?php echo $bxx_bloc_decoration;?>; font-style: <?php echo $bxx_bloc_style;?>; font-weight: <?php echo $bxx_bloc_weight;?>; } .test-h2 { color: #<?php echo $bxx_h2_color;?>; background-color:#<?php echo $bxx_h2_background;?>; font-family: <?php echo $bxx_h2_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h2_size;?>px; text-decoration: <?php echo $bxx_h2_decoration;?>; font-style: <?php echo $bxx_h2_style;?>; font-weight: <?php echo $bxx_h2_weight;?>; padding-left: <?php echo $bxx_h2_padding_left;?>px; padding-right: <?php echo $bxx_h2_padding_right;?>px; padding-top: <?php echo $bxx_h2_padding_top;?>px; padding-bottom: <?php echo $bxx_h2_padding_bottom;?>px; margin-left: <?php echo $bxx_h2_margin_left;?>px; margin-right: <?php echo $bxx_h2_margin_right;?>px; margin-top: <?php echo $bxx_h2_margin_top;?>px; margin-bottom: <?php echo $bxx_h2_margin_bottom;?>px; text-transform: <?php echo $bxx_h2_font_trans;?>; line-height: <?php echo $bxx_h2_line_height;?>%; width: 500px; } .test-h3 { color: #<?php echo $bxx_h3_color;?>; background-color:#<?php echo $bxx_h3_background;?>; font-family: <?php echo $bxx_h3_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h3_size;?>px; text-decoration: <?php echo $bxx_h3_decoration;?>; font-style: <?php echo $bxx_h3_style;?>; font-weight: <?php echo $bxx_h3_weight;?>; padding-left: <?php echo $bxx_h3_padding_left;?>px; padding-right: <?php echo $bxx_h3_padding_right;?>px; padding-top: <?php echo $bxx_h3_padding_top;?>px; padding-bottom: <?php echo $bxx_h3_padding_bottom;?>px; margin-left: <?php echo $bxx_h3_margin_left;?>px; margin-right: <?php echo $bxx_h3_margin_right;?>px; margin-top: <?php echo $bxx_h3_margin_top;?>px; margin-bottom: <?php echo $bxx_h3_margin_bottom;?>px; text-transform: <?php echo $bxx_h3_font_trans;?>; line-height: <?php echo $bxx_h3_line_height;?>%; width: 500px; } .test-h4 { color: #<?php echo $bxx_h4_color;?>; background-color:#<?php echo $bxx_h4_background;?>; font-family: <?php echo $bxx_h4_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h4_size;?>px; text-decoration: <?php echo $bxx_h4_decoration;?>; font-style: <?php echo $bxx_h4_style;?>; font-weight: <?php echo $bxx_h4_weight;?>; padding-left: <?php echo $bxx_h4_padding_left;?>px; padding-right: <?php echo $bxx_h4_padding_right;?>px; padding-top: <?php echo $bxx_h4_padding_top;?>px; padding-bottom: <?php echo $bxx_h4_padding_bottom;?>px; margin-left: <?php echo $bxx_h4_margin_left;?>px; margin-right: <?php echo $bxx_h4_margin_right;?>px; margin-top: <?php echo $bxx_h4_margin_top;?>px; margin-bottom: <?php echo $bxx_h4_margin_bottom;?>px; text-transform: <?php echo $bxx_h4_font_trans;?>; line-height: <?php echo $bxx_h4_line_height;?>%; width: 500px; } .test-h5 { color: #<?php echo $bxx_h5_color;?>; background-color:#<?php echo $bxx_h5_background;?>; font-family: <?php echo $bxx_h5_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h5_size;?>px; text-decoration: <?php echo $bxx_h5_decoration;?>; font-style: <?php echo $bxx_h5_style;?>; font-weight: <?php echo $bxx_h5_weight;?>; padding-left: <?php echo $bxx_h5_padding_left;?>px; padding-right: <?php echo $bxx_h5_padding_right;?>px; padding-top: <?php echo $bxx_h5_padding_top;?>px; padding-bottom: <?php echo $bxx_h5_padding_bottom;?>px; margin-left: <?php echo $bxx_h5_margin_left;?>px; margin-right: <?php echo $bxx_h5_margin_right;?>px; margin-top: <?php echo $bxx_h5_margin_top;?>px; margin-bottom: <?php echo $bxx_h5_margin_bottom;?>px; text-transform: <?php echo $bxx_h5_font_trans;?>; line-height: <?php echo $bxx_h5_line_height;?>%; width: 500px; } .test-h6 { color: #<?php echo $bxx_h6_color;?>; background-color:#<?php echo $bxx_h6_background;?>; font-family: <?php echo $bxx_h6_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_h6_size;?>px; text-decoration: <?php echo $bxx_h6_decoration;?>; font-style: <?php echo $bxx_h6_style;?>; font-weight: <?php echo $bxx_h6_weight;?>; padding-left: <?php echo $bxx_h6_padding_left;?>px; padding-right: <?php echo $bxx_h6_padding_right;?>px; padding-top: <?php echo $bxx_h6_padding_top;?>px; padding-bottom: <?php echo $bxx_h6_padding_bottom;?>px; margin-left: <?php echo $bxx_h6_margin_left;?>px; margin-right: <?php echo $bxx_h6_margin_right;?>px; margin-top: <?php echo $bxx_h6_margin_top;?>px; margin-bottom: <?php echo $bxx_h6_margin_bottom;?>px; text-transform: <?php echo $bxx_h6_font_trans;?>; line-height: <?php echo $bxx_h6_line_height;?>%; width: 500px; } #dummy-con { margin: 10px; background:#<?php echo $bxx_container_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_container_background_image;?>); background-repeat: <?php echo $bxx_container_background_image_repeat;?>; background-position: <?php echo $bxx_container_background_image_align;?>; text-align: left; border: <?php echo$bxx_container_border_width;?>px <?php echo$bxx_container_border_type;?> #<?php echo $bxx_container_border_color;?>; padding-top: <?php echo $bxx_container_padding_top;?>px; padding-right: <?php echo $bxx_container_padding_right;?>px; padding-bottom: <?php echo $bxx_container_padding_bottom;?>px; padding-left: <?php echo $bxx_container_padding_left;?>px; } #dummy-box { width: 100% height: 400px; background: #<?php echo $bxx_page_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_page_background_image;?>); background-repeat: <?php echo $bxx_page_background_image_repeat;?>; background-position: <?php echo $bxx_page_background_image_align;?>; padding-top:10px; padding-bottom:10px; } 

#fake-header { width: 500px; height: 100px; background: #<?php echo $bxx_header_background;?>;} 

.post-title { clear: both; display: block; padding-top: <?php echo $bxx_post_title_padding_top;?>px; padding-right: <?php
echo $bxx_post_title_padding_right;?>px; padding-bottom: <?php echo $bxx_post_title_padding_bottom;?>px; padding-left: <?php
echo $bxx_post_title_padding_left;?>px; margin-top: <?php echo $bxx_post_title_margin_top;?>px; margin-right: <?php echo
$bxx_post_title_margin_right;?>px; margin-bottom: <?php echo $bxx_post_title_margin_bottom;?>px; margin-left: <?php echo
$bxx_post_title_margin_left;?>px; } .post-title a:link { color: #<?php echo $bxx_post_title_link_color;?>;
background-color:#<?php echo $bxx_post_title_link_background;?>; font-family: <?php echo $bxx_post_title_link_font;?>, <?php
echo $bxx_p_font;?>; font-size: <?php echo $bxx_post_title_link_size;?>px; text-decoration: <?php echo
$bxx_post_title_link_decoration;?>; font-style: <?php echo $bxx_post_title_link_style;?>; font-weight: <?php echo
$bxx_post_title_link_weight;?>; padding-top: <?php echo $bxx_post_title_padding_top;?>px; padding-right: <?php echo
$bxx_post_title_padding_right;?>px; padding-bottom: <?php echo $bxx_post_title_padding_bottom;?>px; padding-left: <?php echo
$bxx_post_title_padding_left;?>px; margin-top: <?php echo $bxx_post_title_margin_top;?>px; margin-right: <?php echo
$bxx_post_title_margin_right;?>px; margin-bottom: <?php echo $bxx_post_title_margin_bottom;?>px; margin-left: <?php echo
$bxx_post_title_margin_left;?>px; } .post-title a:visited { color: #<?php echo $bxx_post_title_link_color_visited;?>;
background-color:#<?php echo $bxx_post_title_link_background_visited;?>; font-family: <?php echo
$bxx_post_title_link_font_visited;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_post_title_link_size_visited;?>px;
text-decoration: <?php echo $bxx_post_title_link_decoration_visited;?>; font-style: <?php echo
$bxx_post_title_link_style_visited;?>; font-weight: <?php echo $bxx_post_title_link_weight_visited;?>; } .post-title a:hover {
color: #<?php echo $bxx_post_title_link_color_hover;?>; background-color:#<?php echo $bxx_post_title_link_background_hover;?>;
font-family: <?php echo $bxx_post_title_link_font_hover;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_post_title_link_size_hover;?>px; text-decoration: <?php echo $bxx_post_title_link_decoration_hover;?>; font-style: <?php
echo $bxx_post_title_link_style_hover;?>; font-weight: <?php echo $bxx_post_title_link_weight_hover;?>; } .metabox {
background-color: #<?php echo $bxx_meta_background;?>; color: #<?php echo $bxx_meta_text_color;?>; float: left; padding-left:
<?php echo $bxx_meta_padding_left;?>px; padding-right: <?php echo $bxx_meta_padding_right;?>px; padding-top: <?php echo
$bxx_meta_padding_top;?>px; padding-bottom: <?php echo $bxx_meta_padding_bottom;?>px; margin-left: <?php echo
$bxx_meta_margin_left;?>px; margin-right: <?php echo $bxx_meta_margin_right;?>px; margin-top: <?php echo
$bxx_meta_margin_top;?>px; margin-bottom: <?php echo $bxx_meta_margin_bottom;?>px; width: 550px; line-height: 100%; } .metabox p
{ color: #<?php echo $bxx_meta_text_color;?>; font-family: <?php echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size:
<?php echo $bxx_p_size;?>px; text-decoration: <?php echo $bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>;
font-weight: <?php echo $bxx_p_weight;?>; line-height: 100%; padding: 0px; margin: 0px; } a.puddle { color: #<?php echo
$bxx_a_link_color;?>; background-color:#<?php echo $bxx_a_link_background;?>; font-family: <?php echo
$bxx_a_link_font_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_a_link_size_normal;?>px; text-decoration:
<?php echo $bxx_a_link_decoration;?>; font-style: <?php echo $bxx_a_link_style;?>; font-weight: <?php echo
$bxx_a_link_weight;?>; line-height:100%; } a.puddle:visited { color: #<?php echo $bxx_a_link_color_visited;?>;
background-color:#<?php echo $bxx_a_link_background_visited;?>; font-family: <?php echo $bxx_a_link_font_family_visited;?>,
<?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_a_link_size_visited;?>px; text-decoration: <?php echo
$bxx_a_link_decoration_visited;?>; font-style: <?php echo $bxx_a_link_style_visited;?>; font-weight: <?php echo
$bxx_a_link_weight_visited;?>; width: 100px; } a.puddle:hover{ color: #<?php echo $bxx_a_link_color_hover;?>;
background-color:#<?php echo $bxx_a_link_background_hover;?>; font-family: <?php echo $bxx_a_link_font_family_hover;?>, <?php
echo $bxx_p_font;?>; font-size: <?php echo $bxx_a_link_size_hover;?>px; text-decoration: <?php echo
$bxx_a_link_decoration_hover;?>; font-style: <?php echo $bxx_a_link_style_hover;?>; font-weight: <?php echo
$bxx_a_link_weight_hover;?>; line-height:100%;; } a.tag-x { color: #<?php echo $bxx_tag_area_font_color;?>; padding: 3px
display: inline; clear: none; margin: 4px; background-color:#<?php echo $bxx_a_footerlink_background;?>; font-family: <?php echo
$bxx_a_footerlink_font_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_a_footerlink_size_normal;?>px;
text-decoration: <?php echo $bxx_a_footerlink_decoration;?>; font-style: <?php echo $bxx_a_footerlink_style;?>; font-weight:
<?php echo $bxx_a_footerlink_weight;?>; margin-left: 0px; } a.tag-x:hover { color:#<?php echo $bxx_tag_area_font_color_hover;?>;
display: inline; clear: none; margin: 4px; background-color:#<?php echo $bxx_a_footerlink_background;?>; font-family: <?php echo
$bxx_a_footerlink_font_family;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_a_footerlink_size_normal;?>px;
text-decoration: <?php echo $bxx_a_footerlink_decoration;?>; font-style: <?php echo $bxx_a_footerlink_style;?>; font-weight:
<?php echo $bxx_a_footerlink_weight;?>; margin-left: 0px;} a.tag-x:visited { color:#<?php echo
$bxx_tag_area_font_color_visited;?>; display: inline; clear: none; margin: 4px; background-color:#<?php echo
$bxx_a_footerlink_background;?>; font-family: <?php echo $bxx_a_footerlink_font_family;?>, <?php echo $bxx_p_font;?>; font-size:
<?php echo $bxx_a_footerlink_size_normal;?>px; text-decoration: <?php echo $bxx_a_footerlink_decoration;?>; font-style: <?php
echo $bxx_a_footerlink_style;?>; font-weight: <?php echo $bxx_a_footerlink_weight;?>; margin-left: 0px; } a.foot-link { display:
inline; clear: none; color: #<?php echo $bxx_a_footerlink_color;?>; background-color:#<?php echo
$bxx_a_footerlink_background;?>; font-family: <?php echo $bxx_a_footerlink_font_family;?>, <?php echo $bxx_p_font;?>; font-size:
<?php echo $bxx_a_footerlink_size_normal;?>px; text-decoration: <?php echo $bxx_a_footerlink_decoration;?>; font-style: <?php
echo $bxx_a_footerlink_style;?>; font-weight: <?php echo $bxx_a_footerlink_weight;?>; margin-left: 0px; } a.foot-link:visited{
display: inline; clear: none; display: inline; color: #<?php echo $bxx_a_footerlink_color_visited;?>; background-color:#<?php
echo $bxx_a_footerlink_background_visited;?>; font-family: <?php echo $bxx_a_footerlink_font_family_visited;?>, <?php echo
$bxx_p_font;?>; font-size: <?php echo $bxx_a_footerlink_size_visited;?>px; text-decoration: <?php echo
$bxx_a_footerlink_decoration_visited;?>; font-style: <?php echo $bxx_a_footerlink_style_visited;?>; font-weight: <?php echo
$bxx_a_footerlink_weight_visited;?>; } a.foot-link:hover{ display: inline;color: #<?php echo $bxx_a_footerlink_color_hover;?>;
background-color:#<?php echo $bxx_a_footerlink_background_hover;?>; font-family: <?php echo
$bxx_a_footerlink_font_family_hover;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_a_footerlink_size_hover;?>px;
text-decoration: <?php echo $bxx_a_footerlink_decoration_hover;?>; font-style: <?php echo $bxx_a_footerlink_style_hover;?>;
font-weight: <?php echo $bxx_a_footerlink_weight_hover;?>; } .dummy-p { color: #<?php echo $bxx_p_color;?>; font-family: <?php
echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo
$bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; padding-left: <?php echo
$bxx_p_padding_left;?>px; padding-right: <?php echo $bxx_p_padding_right;?>px; padding-top: <?php echo $bxx_p_padding_top;?>px;
padding-bottom: <?php echo $bxx_p_padding_bottom;?>px; margin-left: <?php echo $bxx_p_margin_left;?>px; margin-right: <?php echo
$bxx_p_margin_right;?>px; margin-top: <?php echo $bxx_p_margin_top;?>px; margin-bottom: <?php echo $bxx_p_margin_bottom;?>px;
line-height: <?php echo $bxx_p_line_size;?>%; width: 550px; } .head-dummy { width: <?php echo $bxx_header_width;?><?php echo
$bxx_header_width_type;?>; height: <?php echo $bxx_header_height;?>px; background: #<?php echo $bxx_header_background;?>;
background-image: url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_header_background_image;?>); background-repeat:
<?php echo $bxx_header_background_image_repeat;?>; background-position: <?php echo $bxx_header_background_image_position;?>;
margin-left: auto; margin-right: auto; } .dummy-left-foot { width: 300px; float: left; margin: 15px; background: #<?php echo
$bxx_footer_left_sidebar_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo
$bxx_footer_left_sidebar_background_image;?>); background-position: <?php echo $bxx_footer_left_align?>; background-repeat:
<?php echo $bxx_footer_left_sidebar_background_image_repeat;?>; } .dummy-right-foot { width: 300px; background: #<?php echo
$bxx_footer_left_sidebar_background_color;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo
$bxx_footer_left_sidebar_background_image;?>); background-position: <?php echo $bxx_footer_left_align?>; background-repeat:
<?php echo $bxx_footer_left_sidebar_background_image_repeat;?>; float: right; margin: 15px; } .footer-dummy { background-image:
url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_footer_background_image;?>); background-color:#<?php echo
$bxx_footer_background;?>; background-repeat: <?php echo $bxx_footer_background_image_repeat;?>; background-position: <?php echo
$bxx_footer_image_align;?>; border-top:<?php echo $bxx_footer_border_width;?>px <?php echo $bxx_footer_border_type;?> #<?php
echo $bxx_footer_border_color;?>; width: 100%; padding:0%; } .birdy { color: #<?php echo $bxx_p_color;?>; font-family: <?php
echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo
$bxx_p_decoration;?>; font-style: <?php echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; padding-left: <?php echo
$bxx_p_padding_left;?>px; padding-right: <?php echo $bxx_p_padding_right;?>px; padding-top: <?php echo $bxx_p_padding_top;?>px;
padding-bottom: <?php echo $bxx_p_padding_bottom;?>px; margin-left: <?php echo $bxx_p_margin_left;?>px; margin-right: <?php echo
$bxx_p_margin_right;?>px; margin-top: <?php echo $bxx_p_margin_top;?>px; margin-bottom: <?php echo $bxx_p_margin_bottom;?>px;
line-height: <?php echo $bxx_p_line_size;?>%; } .base-pp { color: #<?php echo $bxx_p_footer_color;?>; font-family: <?php echo
$bxx_p_footer_font;?>, <?php echo $bxx_p_footer_font;?>; font-size: <?php echo $bxx_p_footer_size;?>px; text-decoration: <?php
echo $bxx_p_footer_decoration;?>; font-style: <?php echo $bxx_p_footer_style;?>; font-weight: <?php echo
$bxx_p_footer_weight;?>; padding-left: <?php echo $bxx_p_footer_padding_left;?>px; padding-right: <?php echo
$bxx_p_footer_padding_right;?>px; padding-top: <?php echo $bxx_p_footer_padding_top;?>px; padding-bottom: <?php echo
$bxx_p_footer_padding_bottom;?>px; margin-left: <?php echo $bxx_p_footer_margin_left;?>px; margin-right: <?php echo
$bxx_p_footer_margin_right;?>px; margin-top: <?php echo $bxx_p_footer_margin_top;?>px; margin-bottom: <?php echo
$bxx_p_footer_margin_bottom;?>px; line-height: <?php echo $bxx_p_footer_line_size;?>%; width: 250px; padding: 10px; }


h1#logo-text { background-color: #<?php echo $bxx_logo_background_color;?>; font-size: <?php echo $bxx_logo_size;?>px; float:
<?php echo $bxx_logo_float;?>; margin-left: 15px; margin-right: 15px; margin-top: 20px; margin-bottom: 0xp; margin-bottom: 0px;
line-height: 100%; color: #<?php echo $bxx_logo_color;?>; text-transform: <?php echo $bxx_title_trans;?>; text-decoration: <?php
echo $bxx_name_decoration;?>; font-weight: <?php echo $bxx_logo_weight;?>;font-family: <?php echo $bxx_logo_font_family;?>; } 




#navbar{ width: <?php echo $bxx_menu_width;?><?php
echo $bxx_menu_width_type;?>; background: #<?php echo $bxx_menu_background;?>; background-position:<?php echo
$bxx_menu_background_image_align;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php echo
$bxx_navbar_background_image;?>); background-repeat: <?php echo $bxx_menu_background_repeat;?>;; clear: both; margin-left: auto;
margin-right: auto; text-align: left; font-style: <?php echo $bxx_button_style;?>; font-family: <?php echo
$bxx_button_font_family;?>, <?php echo $bxx_p_font;?>; } #navbar li, dd { margin: 0px; padding: 0px; line-height: 100%; }
.clearbox { display:block; height:0px; width:100%; clear:both; } #navbar ul li a:link, #navbar ul li a:visited{ display: inline;
background-color: #<?php echo $bxx_button_background;?>; background-image: url(<?php bloginfo('template_url');?>/images/<?php
echo $bxx_button_background_image;?>); background-position:<?php echo $bxx_button_background_image_align;?>;
 background-repeat: <?php echo $bxx_button_background_image_repeat;?>; color: #<?php echo $bxx_button_font_color;?>;
text-transform: <?php echo $bxx_button_font_trans;?>; font-size: <?php echo $bxx_button_font_size;?>px; padding-left: <?php echo
$bxx_button_padding_left;?>px; padding-right: <?php echo $bxx_button_padding_right;?>px; padding-top: <?php echo
$bxx_button_padding_top;?>px; padding-bottom: <?php echo $bxx_button_padding_bottom;?>px; text-decoration: <?php echo
$bxx_button_font_decoration;?>;margin-top: <?php echo $bxx_button_margin_top;?>px; margin-right: <?php echo $bxx_button_margin_right;?>px; margin-left: <?php echo $bxx_button_margin_left;?>px; margin-bottom: <?php echo $bxx_button_margin_bottom;?>px; font-weight: <?php echo
$bxx_button_font_weight;?>; border:<?php echo $bxx_button_border_width;?>px <?php echo $bxx_button_border_type;?> #<?php echo
$bxx_button_border_color;?>; line-height: <?php echo $bxx_button_line_pen;?>%; font-family: <?php echo
$bxx_button_font_family;?>, <?php echo $bxx_p_font;?>; } #navbar ul li.current_page_item a:link, #navbar ul li.current_page_item
a:visited, #navbar ul li.current_page_item a:hover, #navbar ul li.current_page_item a:active, #navbar ul li.current_page_item
a:focus{ background-color: #<?php echo $bxx_button_background_current;?>; color: #<?php echo $bxx_button_font_color_current;?>;
font-family: <?php echo $bxx_button_font_family;?>, <?php echo $bxx_p_font;?>; } #navbar ul li a:hover, #navbar ul li a:active,
#navbar ul li a:focus{ text-decoration: none; background-color: #<?php echo $bxx_button_background_hover;?>; color: #<?php echo
$bxx_button_font_color_hover;?>; font-family: <?php echo $bxx_button_font_family;?>, <?php echo $bxx_p_font;?>; } #navbar ul{
list-style-type: none; list-style-image: none; display: inline; } #navbar ul li{ display: inline; float: left; line-height:
100%; } h5#slogan { color: #<?php echo $bxx_slogan_color;?>; font-size: <?php echo $bxx_slogan_size;?>px; text-decoration: <?php
echo $bxx_slogan_decoration;?>; line-height: 110%; font-weight: <?php echo $bxx_slogan_weight;?>; font-family: <?php echo
$bxx_slogan_font_family;?>, <?php echo $bxx_p_font;?>; background-color: #<?php echo $bxx_slogan_background_color;?>; font-size:
<?php echo $bxx_slogan_size;?>px; float: <?php echo $bxx_slogan_float;?>; margin-bottom: 0px; padding: 0px; margin-top: 0px;
margin-left: 15px; text-transform: <?php echo $bxx_slogan_trans;?>; clear: both; } .dummy-image { border: <?php echo
$bxx_image_border_width;?>px <?php echo $bxx_image_border_type;?> #<?php echo $bxx_image_border_color;?>; margin-top: 10px;
margin-left: auto; margin-right: auto; } .wp-caption { border: <?php echo $bxx_caption_border_width;?>px <?php echo
$bxx_caption_border_type;?> #<?php echo $bxx_caption_border_color;?>; text-align: center; background-color:#<?php echo
$bxx_caption_background_color;?>; padding-top: 4px; margin: 10px; width: 430px; } .wp-caption p { font-size: <?php echo
$bxx_caption_font_size;?>px; line-height: 17px; padding: 5px; margin: 0; color:#<?php echo $bxx_caption_font_color;?>; } .sticky
{ padding-left: <?php echo $bxx_sticky_padding_left;?>px; padding-right: <?php echo $bxx_sticky_padding_right;?>px; padding-top:
<?php echo $bxx_sticky_padding_top;?>px; padding-bottom: <?php echo $bxx_sticky_padding_bottom;?>px; width: 550px; height:
250px; margin-left: <?php echo $bxx_sticky_margin_left;?>px; margin-right: <?php echo $bxx_sticky_margin_right;?>px; margin-top:
<?php echo $bxx_sticky_margin_top;?>px; background-color:#<?php echo $bxx_sticky_background_color;?>; background-image:
url(<?php bloginfo('template_url');?>/images/<?php echo $bxx_sticky_background_image;?>); background-position: <?php echo
$bxx_sticky_background_image_position;?>; background-repeat: <?php echo $bxx_sticky_background_image_repeat;?>; border: <?php
echo $bxx_sticky_border_width;?>px <?php echo $bxx_sticky_border_type;?> #<?php echo $bxx_sticky_border_color;?>; } #thread-odd
{ background:#<?php echo $bxx_comment_odd_background;?>; border:<?php echo $bxx_comment_odd_border_width;?>px <?php echo
$bxx_comment_odd_border_type;?> #<?php echo $bxx_comment_odd_border_color;?>; text-decoration: none; margin-bottom: 10px;
padding:10px; width: 550px; } #thread-even { background:#<?php echo $bxx_comment_even_background;?>; border:<?php echo
$bxx_comment_even_border_width;?>px <?php echo $bxx_comment_even_border_type;?> #<?php echo $bxx_comment_even_border_color;?>; 

.profile-left {
	float: left;
	}
.profile-right {
	float: right;
	}
text-decoration: none; margin-bottom: 10px; padding:10px; width: 550px; } #thread-author { background:#<?php echo
$bxx_comment_author_background;?>; border:<?php echo $bxx_comment_author_border_width;?>px <?php echo
$bxx_comment_author_border_type;?> #<?php echo $bxx_comment_author_border_color;?>; margin-bottom: 10px; padding:10px; width:
550px; } .reply-even { padding:2px; border:1px solid; margin: 0px; color:#<?php echo $bxx_comment_even_p_color;?>; font-family:
<?php echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo
$bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; width: 35px; } .reply-odd
{ font-family: <?php echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration:
<?php echo $bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; padding:2px;
border:1px solid; margin: 10px; color:#<?php echo $bxx_comment_odd_p_color;?>; width: 35px; } .reply-author { font-family: <?php
echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo
$bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; padding:2px; border:1px
solid; margin: 10px; color:#<?php echo $bxx_comment_author_p_color;?>; width: 35px; } #thread-odd p { font-family: <?php echo
$bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo
$bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; color:#<?php echo
$bxx_comment_odd_p_color;?>; padding: 2px; margin-left: 60px; } #thread-even p { font-family: <?php echo $bxx_p_font;?>, <?php
echo $bxx_p_font;?>; font-size: <?php echo $bxx_p_size;?>px; text-decoration: <?php echo $bxx_p_decoration;?>; font-style:<?php
echo $bxx_p_style;?>; font-weight: <?php echo $bxx_p_weight;?>; color:#<?php echo $bxx_comment_even_p_color;?>; padding: 2px;
margin-left: 60px; } #thread-author p { font-family: <?php echo $bxx_p_font;?>, <?php echo $bxx_p_font;?>; font-size: <?php echo
$bxx_p_size;?>px; text-decoration: <?php echo $bxx_p_decoration;?>; font-style:<?php echo $bxx_p_style;?>; font-weight: <?php
echo $bxx_p_weight;?>; color:#<?php echo $bxx_comment_author_p_color;?>; padding: 2px; margin-left: 60px; } #thread-even
.author-name { background:#<?php echo $bxx_comment_even_background;?>; font-size:<?php echo $bxx_comment_name_size;?>px;
color:#<?php echo $bxx_comment_even_p_color;?>; font-weight: normal; margin: 0px; padding: 0px; } #thread-odd .author-name {
background:#<?php echo $bxx_comment_odd_background;?>; color:#<?php echo $bxx_comment_odd_p_color;?>; font-size:<?php echo
$bxx_comment_name_size;?>px; font-weight: normal; margin: 0px; padding: 0px; }
#thread-author .author-name { background:#<?php echo $bxx_comment_author_background;?>; font-size:<?php echo
$bxx_comment_name_size;?>px; font-weight: normal; color:#<?php echo $bxx_comment_author_p_color;?>; margin: 0px; padding: 0px; }
.avatar { border:<?php echo $bxx_avatar_border_size;?>px <?php echo $bxx_avatar_border_type;?> #<?php echo
$bxx_avatar_border_color;?>; float:<?php echo $bxx_avatar_float;?>; height:<?php echo $bxx_avatar_size;?>px; width:<?php echo
$bxx_avatar_size;?>px; margin:3px; margin-right:6px; } .modernbricksmenu2{ padding: 0; clear: both; width: 900px;
background-color: #eee; background-image: url(<?php bloginfo('template_url');?>/images/zebra.png); background-repeat: repeat; }
.modernbricksmenu2 ul{ margin:0; margin-left: 10px; /*margin between first menu item and left browser edge*/ padding: 0;
list-style: none; } .modernbricksmenu2 li{ display: inline; text-transform:uppercase; } .modernbricksmenu2 a{ float: left;
display: block; font: bold 11px Arial; color: #666; text-decoration: none; line-height: 290%; margin-left: 0px; padding-left:
10px; padding-right: 10px; margin-right: 0px; background-image: url(<?php bloginfo('template_url');?>/images/between.png);
background-repeat: no-repeat; background-position: center right; } .
modernbricksmenu2 a:hover{ color: #009900; }
 .backend-clear { width: 100%; height: 1px; clear: both; } 
.backend-box { width:
900px; background-color: #eee; text-align: left; padding-left: 0px; padding-top: 0px; clear: both; margin-top: 0px; }
#wpbody-content, #wpcontent { background-color: #fff; text-align: left; } #wphead h1 { text-transform: capitalize; } .slak {
background-image: url(<?php bloginfo('template_url');?>/images/main-title.png); background-repeat: repeat-x; height: 45px;
clear: both; width: 100%; margin-top: 0px; margin-bottom: 4px; } .slak-h3 { font-size: 20px; margin: 0px; padding-top: 0px;
padding-left: 5px; background-color: none; color: orange; line-height: 240%; padding-left: 3px; color: #d25a0b; font-weight:
normal; text-align: left; } #flogo-left { width: 150px; padding-top: 15px; padding-left: 10px; float: left; } #flogo-left
a:link,#flogo-left a:visited { color:#666; font-size:10px; line-height: 200%; text-decoration: none; padding-top: 15px; }
#flogo-left a:hover { color: #854114; font-size: 10px; } #flogo-right { width: 50px; padding-top: 7px; float: right; }
#header-logo { border: 0px; } .subtone { background-image: url(<?php bloginfo('template_url');?>/images/zebra-sub.png);
background-repeat: repeat-x; height: 28px; margin-bottom: 10px; margin-top: 10px; clear: both; padding: 0px; line-height: 100%;
} .subtone-h4 { line-height: 180%; padding-left: 15px; font-size: 16px; padding-top: 0px; margin-top: 0px; margin-left: 10px;
padding: 0px; font-weight: normal; color: #854114; text-align: left; }
.feedburnerFeedBlock li { background-image: url(<?php bloginfo('template_url');?>/images/zebra-sub.png); background-repeat:
repeat-x; height: 28px; margin-bottom: 10px; margin-top: 40px; clear: both; widows: 100%; } div.feedBurnerFeedBlock {
padding:50px; border: 10px solid black; } .greenone div { padding: 0px 15px 0px 15px; } .headline a { line-height: 200%;
padding-left: 15px; font-size: 16px; font-weight: normal; color: #854114; text-decoration: none; text-align: left; }
#creditfooter { padding: 20px; } .fbsubscribelink { clear: both; width: 100%; padding-top: 30px; } .left-h { color: #333;
font-size: 14px; font-weight: normal; padding-left: 2px; width: 85%; padding-bottom: 0px; background-position: bottom;
padding-bottom: 4px; background-repeat: repeat-x; background-image: url(<?php bloginfo('template_url');?>/images/abstract.png);
} 
.dino { padding-left: 25px; 
background-image: url(<?php bloginfo('template_url');?>/images/save-save.jpg); 
 background-repeat: no-repeat;
height:35px;
} 
.fino { padding-left: 25px; 
background-image: url(<?php bloginfo('template_url');?>/images/reset-reset.jpg); 
 background-repeat: no-repeat;
height:34px;border: 0px;} 
.dinox-reset { background-image: url(<?php
bloginfo('template_url');?>/images/reset-reset.jpg); width: 900px; background-repeat: repeat-x; height: 40px; background-color:
none; border: 0px; padding: 0px; margin: 0px; border:0px; padding-top: 0px; clear:both; } 
.dinox {
background-image: url(<?php bloginfo('template_url');?>/images/save-save.jpg); width: 900px; background-repeat: repeat-x; height:
33px; padding: 0px; margin: 0px; background-color: none; border: 0px; padding-top: 0px; margin-top: 0px;}
.dinox input ,
.dinox-reset input { background-color: transparent; color: #fff; border: 0px solid red; font-size: 14px; width: 100%;
line-height: 200%; text-align: center; padding: 0px; margin: 0px; } #green-message { width: 880px; margin: 0px; } #red-message {
width: 880px; margin: 0px; } .tenip { padding-left:15px; line-height:200%; } #dummy-tag-cloud { background-image: url(<?php
bloginfo('template_url');?>/images/<?php echo $bxx_tag_background_image;?>); background-repeat: <?php echo
$bxx_tag_image_repeat;?>; background-position: <?php echo $bxx_tag_image_align;?>; background-color: #<?php echo
$bxx_tag_area_background_color;?>; width: 880px; margin-left: auto; margin-right: auto; padding-bottom: 5px; height: 20px;
margin-bottom: 40px; text-align: center; padding: 10px; } .super-clear { width: 100%; height: 2px; clear: both; } </style>