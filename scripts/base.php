<?php $themename = "42k"; $shortname = "bxx"; $apple = "zzz"; $options = array ( array( "type" => "z-a"), array( "type" =>
"an-ending"), array( "type" => "z-b"), array( "name" => "Page and Container", "type" => "title"), array( "type" =>
"dummy-main-sidebar"), array( "name" => "Background Options", "type" => "subtitle"), array( "type" => "pad"), array( "name" =>
"Background Color:", "id" => $shortname."_page_background_color", "std" => "", "type" => "text-color-wide"), array( "name" =>
"Page Background Image:", "id" => $shortname."_page_background_image", "std" => "background.png", "type" => "text-wide"), array(
"name" => "Image Reapet: ", "id" => $shortname."_page_background_image_repeat", "type" => "select", "std" => "repeat", "options"
=> array("repeat", "repeat-y", "no-repeat", "repeat-x"),), array( "name" => "Image Align:", "id" =>
$shortname."_page_background_image_align", "type" => "select", "std" => "", "options" => array( "center right", "top center",
"top right", "center left", "center center", "top left", "bottom left", "bottom center", "bottom right"),), array( "type" =>
"box-close"), array("type" => "line-break"), array( "name" => "Container Options", "type" => "subtitle"), array( "type" =>
"pad"), array( "name" => "Background Color:", "id" => $shortname."_container_background_color", "std" => "", "type" =>
"text-color-wide"), array( "name" => "Background Image:", "id" => $shortname."_container_background_image", "std" =>
"con-back.png", "type" => "text-wide"), array( "name" => "Image Reapet:", "id" =>
$shortname."_container_background_image_repeat", "type" => "select", "std" => "repeat-y", "options" => array("repeat-y",
"repeat", "no-repeat", "repeat-x"), ), array( "name" => "Image Align:", "id" => $shortname."_container_background_image_align",
"type" => "select", "std" => "center right", "options" => array( "center right", "top center", "top right", "center left",
"center center", "top left", "bottom left", "bottom center", "bottom right"),), array( "type" => "box-close"), array("type" =>
"line-break"), array( "name" => "Container Border:", "type" => "left-half"), array( "name" => "Color:", "id" =>
$shortname."_container_border_color", "std" => "c9c9b5", "type" => "text-color"), array( "name" => "Width:", "id" =>
$shortname."_container_border_width", "std" => "1", "type" => "text-left"), array( "name" => "Border Type:", "id" =>
$shortname."_container_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove",
"dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "type" => "line-break"), array( "name"
=> "Container Paddings", "type" => "left-half"), array( "name" => "Top:", "id" => $shortname."_container_padding_top", "std" =>
"5", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_container_padding_right", "std" => "5", "type" =>
"text-mp"), array( "name" => "Bottom:", "id" => $shortname."_container_padding_bottom", "std" => "5", "type" => "text-mp"),
array( "name" => "Left:", "id" => $shortname."_container_padding_left", "std" => "5", "type" => "text-mp"), array( "type" =>
"box-close"), array( "name" => "Conatiner Margins", "type" => "right-half"), array( "name" => "Top:", "id" =>
$shortname."_container_margin_top", "std" => "10", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_container_margin_bottom", "std" => "50", "type" => "text-mp"), array("type" => "box-close"), array( "type" =>
"deus","name" => "Note: Left and Right margins for the container are hard coded to Auto so the container stays in the middle of
the page, no matter what the screen size. If you do wish to change this, you will have to change the actuall CSS file.",),
array( "type" => "an-ending"), array( "type" => "z-c"), array( "name" => "Index/Front Page", "type" => "title"), 
array( "type"
=> "line-break"),


array( "type" => "tin-tin"), array( "type" => "deus", "name" => "The images below are representations of
different layouts available for your front page. Please choose one and select that name from the drop down box below the images.
",), 


array("id" => $shortname."_index_file", "folder" => "homepage", "ifolder" => "homepage-images", "std" => "a-normal.php",
"type" => "select-list"), 




array( "type" => "line-break"), array( "type" => "box-close"), array( "name" => "Full Posts or
Excerpts", "type" => "subtitle"), array( "type" => "tin-tin"), array( "name" => "<strong> aaa-default-front-aaa;</strong> can be
set to either show posts or excerpts though the Front Page Options below. <br> <strong>Mullet:</strong> displays the newest post
(plus sticky) at the top with full content and the rest of the posts below with excerpts. <br> This cannot be changed via the
control panel.", "type" => "advice"), array( "name" => " ", "id" => $shortname."_main_post_type", "type" => "select", "std" =>
"content", "options" => array( "content", "excerpt"), ), array( "type" => "box-close"), array( "type" => "an-ending"), array(
"type" => "z-d"),array( "name" => "Post Title Options", "type" => "title"), array( "type" => "dummy-main-sidebar"), array(
"name" => "Post Title Design", "type" => "subtitle"), array( "name" => "Post Title Colors", "type" => "left-half"), array(
"name" => "Normal:", "id" => $shortname."_post_title_link_color", "std" => "222", "type" => "text-color"), array( "name" =>
"Visited:", "id" => $shortname."_post_title_link_color_visited", "std" => "333", "type" => "text-color"), array( "name" =>
"Hover:", "id" => $shortname."_post_title_link_color_hover", "std" => "ba5613", "type" => "text-color"), array( "type" =>
"box-close"), array( "name" => "Post Title Background Colors", "type" => "right-half"), array( "name" => "Normal:", "id" =>
$shortname."_post_title_link_background", "std" => "", "type" => "text-color"), array( "name" => "Visited:", "id" =>
$shortname."_post_title_link_background_visited", "std" => "", "type" => "text-color"), array( "name" => "Hover:", "id" =>
$shortname."_post_title_link_background_hover", "std" => "", "type" => "text-color"), array( "type" => "box-close"), array(
"type" => "line-break"), array( "name" => "Post Title Size", "type" => "left-half"), array( "name" => "Normal:", "id" =>
$shortname."_post_title_link_size", "std" => "22", "type" => "text-left"), array( "name" => "Visited:", "id" =>
$shortname."_post_title_link_size_visited", "std" => "22", "type" => "text-left"), array( "name" => "Hover:", "id" =>
$shortname."_post_title_link_size_hover", "std" => "22", "type" => "text-left"), array( "type" => "box-close"), array( "name" =>
"Post Title Fonts", "type" => "right-half"), array( "name" => "Font:", "id" => $shortname."_post_title_link_font", "type" =>
"select", "std" => "Helvetica", "options" => array( "Helvetica", "Impact", "Arial", "Courier New","Georgia", "Times New Roman",
"Verdana", "Trebuchet MS", "Lucida Sans"),), array( "name" => "Font Visited:", "id" =>
$shortname."_post_title_link_font_visited", "type" => "select", "std" => "Helvetica", "options" => array( "Helvetica",
"Impact","Arial", "Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" =>
"Font Hover:", "id" => $shortname."_post_title_link_font_hover", "type" => "select", "std" => "Helvetica", "options" => array(
"Helvetica", "Impact", "Arial", "Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ),
array( "type" => "box-close"), array( "type" => "line-break"), array( "name" => "Post Title Decoration", "type" => "left-half"),
array( "name" => "Normal: ", "id" => $shortname."_post_title_link_decoration", "type" => "select", "std" => "none", "options" =>
array( "none", "underline", "overline", "line-through", "blink"), ), array( "name" => "Visited:", "id" =>
$shortname."_post_title_link_decoration_visited", "type" => "select", "std" => "none", "options" => array( "none", "underline",
"overline", "line-through", "blink"), ), array( "name" => "Hover:", "id" => $shortname."_post_title_link_decoration_hover",
"type" => "underline", "type" => "select", "options" => array( "none", "underline", "overline", "line-through", "blink"), "std"
=> "none"), array( "type" => "box-close"), array( "name" => "Post Title Font Style", "type" => "right-half"), array( "name" =>
"Normal", "id" => $shortname."_post_title_link_style", "type" => "select", "std" => "normal", "options" => array( "normal",
"italic", "oblique"),), array( "name" => "Font Style Visited", "id" => $shortname."_post_title_link_style_visited", "type" =>
"select", "std" => "normal", "options" => array( "normal", "italic", "oblique"),), array( "name" => "Hover ", "id" =>
$shortname."_post_title_link_style_hover", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "type" => "box-close"), array( "type" => "line-break"), array( "name" => "Post Title Font Weight", "type"
=> "left-half"), array( "name" => "Normal:", "id" => $shortname."_post_title_link_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"), ), array( "name" => "Visited:", "id" =>
$shortname."_post_title_link_weight_visited", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ),
array( "name" => "Hover:", "id" => $shortname."_post_title_link_weight_hover", "type" => "select", "std" => "normal", "options"
=> array( "normal", "bold"), ), array( "type" => "box-close"), array( "name" => "Post Title Line Height", "type" =>
"right-half"), array( "name" => "Line Height:", "id" => $shortname."_post_title_line_height", "std" => "170", "type" =>
"text-wide"), array( "type" => "box-close"), array("type" => "line-break"), array( "name" => "Post Title Padding (px)", "type"
=> "left-half"), array( "name" => "Top:", "id" => $shortname."_post_title_padding_top", "std" => "2", "type" => "text-mp"),
array( "name" => "Right:", "id" => $shortname."_post_title_padding_right", "std" => "1", "type" => "text-mp"), array( "name" =>
"Bottom:", "id" => $shortname."_post_title_padding_bottom", "std" => "2", "type" => "text-mp"), array( "name" => "Left:", "id"
=> $shortname."_post_title_padding_left", "std" => "0", "type" => "text-mp"), array( "type" => "box-close"), array( "name" =>
"Post Title Margins (px)", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_post_title_margin_top", "std"
=> "15", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_post_title_margin_right", "std" => "1", "type" =>
"text-mp"), array( "name" => "Bottom:", "id" => $shortname."_post_title_margin_bottom", "std" => "1", "type" => "text-mp"),
array( "name" => "Left:", "id" => $shortname."_post_title_margin_left", "std" => "1", "type" => "text-mp"), array("type" =>
"box-close"), array("type" => "line-break"), array( "name" => "Post Meta Information", "type" => "subtitle"), array( "name" =>
"Meta Colors", "type" => "left-half"), array( "name" => "Background Color:", "id" => $shortname."_meta_background", "std" => "",
"type" => "text-color-wide"), array( "name" => "Text Color:", "id" => $shortname."_meta_text_color", "std" => "333", "type" =>
"text-color-wide"), array("type" => "box-close"), array("type" => "line-break"), array( "name" => "Meta Padding (px)", "type" =>
"left-half"), array( "name" => "Top:", "id" => $shortname."_meta_padding_top", "std" => "5", "type" => "text-mp"), array( "name"
=> "Right:", "id" => $shortname."_meta_padding_right", "std" => "2", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_meta_padding_bottom", "std" => "5", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_meta_padding_left", "std" => "2", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "Meta Box
Margins (px)", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_meta_margin_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_meta_margin_right", "std" => "1", "type" => "text-mp"), array(
"name" => "Bottom:", "id" => $shortname."_meta_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:",
"id" => $shortname."_meta_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" =>
"an-ending"), array( "type" => "z-e"), array( "name" => "Comments","type" => "title"), array( "type" => "dummy-space"), array(
"type" => "dummy-comments"), array( "type" => "dummy-space"), array( "name" => "Author Comments", "type" => "subtitle"), array(
"type" => "full-empty"), array( "name" => "Background:", "id" => $shortname."_comment_author_background", "std" => "eee", "type"
=> "text-color"), array( "name" => "Font Color:", "id" => $shortname."_comment_author_p_color", "std" => "666", "type" =>
"text-color"), array( "name" => "Link Color:", "id" => $shortname."_comment_author_link_color", "std" => "333", "type" =>
"text-color"), array( "name" => "Border Width:", "id" => $shortname."_comment_author_border_width", "std" => "1", "type" =>
"text-wide"), array( "name" => "Border Color:", "id" => $shortname."_comment_author_border_color", "std" => "5D8169", "type" =>
"text-color"), array( "name" => "Border Type:", "id" => $shortname."_comment_author_border_type", "type" => "select", "std" =>
"solid", "options" => array("solid", "double", "groove", "dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" =>
"box-close"), array( "name" => "Even Numbered Comments", "type" => "subtitle"), array( "type" => "full-empty"), array( "name" =>
"Background:", "id" => $shortname."_comment_even_background", "std" => "fff", "type" => "text-color"), array( "name" => "Font
Color:", "id" => $shortname."_comment_even_p_color", "std" => "000", "type" => "text-color"), array( "name" => "Link Color:",
"id" => $shortname."_comment_even_link_color", "std" => "333", "type" => "text-color"), array( "name" => "Border Width:", "id"
=> $shortname."_comment_even_border_width", "std" => "1", "type" => "text-wide"), array( "name" => "Border Color:", "id" =>
$shortname."_comment_even_border_color", "std" => "5D8169", "type" => "text-color"), array( "name" => "Border Type:", "id" =>
$shortname."_comment_even_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove",
"dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "name" => "Odd Numbered Comments",
"type" => "subtitle"), array( "type" => "full-empty"), array( "name" => "Background:", "id" =>
$shortname."_comment_odd_background", "std" => "fff", "type" => "text-color"), array( "name" => "Font Color:", "id" =>
$shortname."_comment_odd_p_color", "std" => "333", "type" => "text-color"), array( "name" => "Link Color:", "id" =>
$shortname."_comment_odd_link_color", "std" => "666", "type" => "text-color"), array( "name" => "Border Width:", "id" =>
$shortname."_comment_odd_border_width", "std" => "1", "type" => "text-wide"), array( "name" => "Border Color:", "id" =>
$shortname."_comment_odd_border_color", "std" => "A76E3E", "type" => "text-color"), array( "name" => "Border Type:", "id" =>
$shortname."_comment_odd_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove",
"dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "name" => "Global Comment Options",
"type" => "subtitle"), array( "type" => "full-empty"), array( "name" => "Comment Name Size:", "id" =>
$shortname."_comment_name_size", "std" => "14", "type" => "text-wide"), array( "name" => "Avatar Align:", "id" =>
$shortname."_avatar_float", "type" => "select", "std" => "left", "options" => array("left", "right"), ), array( "name" =>
"Avatar Size:", "id" => $shortname."_avatar_size", "std" => "50", "type" => "text-left"), array( "name" => "Border Size:", "id"
=> $shortname."_avatar_border_size", "std" => "1", "type" => "text-left"), array( "name" => "Border Color:", "id" =>
$shortname."_avatar_border_color", "std" => "ccc", "type" => "text-color"), array( "name" => "Border Type:", "id" =>
$shortname."_avatar_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove",
"dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "type" => "an-ending"), array( "type"
=> "z-f"), array( "name" => "Image Options", "type" => "title"), array( "type" => "dummy-space"),array( "type" =>
"dummy-image"), array( "type" => "dummy-space"), array( "name" => "Image Borders", "type" => "left-half"), array( "name" =>
"Border Color:", "id" => $shortname."_image_border_color", "std" => "eee", "type" => "text-color-wide"), array( "name" =>
"Border Width:", "id" => $shortname."_image_border_width", "std" => "1", "type" => "text-left"), array( "name" => "Border
Type:", "id" => $shortname."_image_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double",
"groove", "dotted", "dashed", "inset", "outset", "ridge" ),), array("type" => "box-close"), array( "name" => "Image Caption",
"type" => "subtitle"), array( "name" => "Image Caption Border", "type" => "left-half"), array( "name" => "Border Color:", "id"
=> $shortname."_caption_border_color", "std" => "ccc", "type" => "text-color-wide"), array( "name" => "Border Width:", "id" =>
$shortname."_caption_border_width", "std" => "1", "type" => "text-left"), array( "name" => "Border Type:", "id" =>
$shortname."_caption_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove",
"dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "name" => "Caption Elements", "type"
=> "right-half"), array( "name" => "Background Color:", "id" => $shortname."_caption_background_color", "std" => "fff", "type"
=> "text-color-wide"), array( "name" => "Font Color:", "id" => $shortname."_caption_font_color", "std" => "666666", "type" =>
"text-color"), array( "name" => "Font Size:", "id" => $shortname."_caption_font_size", "std" => "11", "type" => "text-left"),
array("type" => "box-close"), array( "type" => "an-ending"), array( "type" => "z-g"), array( "name" => "Header Options", "type"
=> "title"), array( "type" => "dummy-space"), array( "type" => "dummy-nav"), array( "type" => "dummy-space"), array("type" =>
"line-break"), array( "name" => "Header Sizes", "type" => "subtitle"), array( "name" => "Header Width:", "id" =>
$shortname."_header_width", "std" => "100", "type" => "text-left"), array( "name" => "Header Width Type: ", "id" =>
$shortname."_header_width_type", "type" => "select", "std" => "%", "options" => array( "%", "px"), ), array( "name" => "Header
Height:", "id" => $shortname."_header_height", "std" => "108", "type" => "text-wide"), array("type" => "line-break"), array(
"name" => "Header Background", "type" => "subtitle"), array("type" => "full-empty"), array( "name" => "Background Color:", "id"
=> $shortname."_header_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Background Image:", "id" =>
$shortname."_header_background_image", "std" => "header.png", "type" => "text-wide"), array( "name" => "Image Repeat:", "id" =>
$shortname."_header_background_image_repeat", "type" => "select", "std" => "repeat-x", "options" => array( "repeat", "repeat-x",
"repeat-y", "no-repeat"), ), array( "name" => "Image Position:", "id" => $shortname."_header_background_image_position", "type"
=> "select", "std" => "bottom", "options" => array( "bottom", "top", "right","centre", "left"), ), array( "name" => "Image
Align:", "id" => $shortname."_header_background_image_position", "type" => "select", "std" => "bottom center", "options" =>
array( " bottom center", "top center", "top right", "center left", "center center", "top left", "bottom left", "center right",
"bottom right"),), array("type" => "box-close"), array("type" => "line-break"), array( "name" => "Website Name Design", "type"
=> "subtitle"), array( "type" => "left-empty"), array( "name" => "Font Color:", "id" => $shortname."_logo_color", "std" =>
"fff", "type" => "text-color"), array( "name" => "Background Color:", "id" => $shortname."_logo_background_color", "std" => "",
"type" => "text-color-wide"), array( "name" => "Size:", "id" => $shortname."_logo_size", "std" => "36", "type" => "text-mp"),
array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Decoration:", "id" =>
$shortname."_name_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Float:", "id" => $shortname."_logo_float", "type" => "select", "std" => "left",
"options" => array("left", "right"),), array( "name" => "Font Family:", "id" => $shortname."_logo_font_family", "type" =>
"select", "std" => "Helvetica", "options" => array( "Helvetica", "Impact","Arial", "Courier New", "Georgia", "Times New Roman",
"Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name" =>
"Weight:", "id" => $shortname."_logo_weight", "type" =>"select", "std" => "bold", "options" => array( "normal", "bold"), ),
array( "name" => "Font Style:", "id" => $shortname."_logo_style_two", "type" => "select", "std" => "normal", "options" => array(
"normal", "italic"),), array( "name" => "Text Transform:", "id" => $shortname."_title_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "uppercase","capitalize", "none", "lowercase",), ), array( "type" => "box-close"), array("type"
=> "line-break"), array( "name" => "Slogan Design:", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" =>
"Font Color:", "id" => $shortname."_slogan_color", "std" => "ccc", "type" => "text-color"), array( "name" => "Background
Color:", "id" => $shortname."_slogan_background_color", "std" => "", "type" => "text-color-wide"), array( "name" => "Size:",
"id" => $shortname."_slogan_size", "std" => "14", "type" => "text-mp"), array( "type" => "box-close"), array( "type" =>
"right-empty"), array( "name" => "Decoration:", "id" => $shortname."_slogan_decoration", "type" => "select", "std" => "none",
"options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "name" => "Float:", "id" =>
$shortname."_slogan_float", "type" => "select", "std" => "left", "options" =>array("left", "right"), ), array( "name" => "Font
Family:", "id" => $shortname."_slogan_font_family", "type" => "select", "options" => array( "Arial", "Helvetica",
"Impact","Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), "std" => "Georgia"), array(
"type" => "box-close"), array( "type" => "left-empty"), array( "name" => "Weight:", "id" => $shortname."_slogan_weight", "type"
=>"select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "name" => "Font Style:", "id" =>
$shortname."_slogan_style_two", "type" => "select", "std" => "normal", "options" => array( "normal", "italic"),), array( "name"
=> "Text Transform:", "id" => $shortname."_slogan_trans", "type" => "select", "std" => "uppercase", "options" => array(
"uppercase","capitalize", "none", "lowercase",), ), array( "type" => "box-close"), array( "type" => "line-break"), array( "name"
=> "Header Icons", "type" => "subtitle"), array( "type" => "full-empty"), array( "name" => "Show the Search Icon:", "id" =>
$shortname."_search_icon", "type" => "select-wide", "std" => "yes", "options" => array( "yes", "no"),), array( "name" => "Show
the RSS Icon:", "id" => $shortname."_rss_icon", "type" => "select-wide", "std" => "yes", "options" => array( "yes", "no"),),
array( "name" => "Float Icons:", "id" => $shortname."_icon_float", "type" => "select-wide", "std" => "right", "options" =>
array( "right", "left"),), array( "type" => "box-close"), array( "type" => "line-break"), array( "type" => "an-ending"), array(
"type" => "z-h"), array( "name" => "Footer Options", "type" => "title"), array( "type" => "dummy-space"), array( "type" =>
"dummy-f1"), array( "type" => "dummy-space"), array( "name" => "Footer Width", "type" => "left-half"), array( "name" => "Footer
Width:", "id" => $shortname."_footer_width", "std" => "100", "type" => "text-wide"), array( "name" => "Footer Width Type: ",
"id" => $shortname."_footer_width_type", "type" => "select", "std" => "%", "options" => array( "%", "px"), ), array( "type" =>
"box-close"), array( "name" => "Footer Border", "type" => "right-half"), array( "name" => "Border Color:", "id" =>
$shortname."_footer_border_color", "std" => "", "type" => "text-color-wide"), array( "name" => "Border Width:", "id" =>
$shortname."_footer_border_width", "std" => "0", "type" => "text-wide"), array( "name" => "Border Type:", "id" =>
$shortname."_footer_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove",
"dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "type" => "deus", "name" => "The
Footer Border is ONLY on TOP of the footer. This is because, as we have a 100% wide footer by default, it would strech the page
out if we gave the border onto the other sides.",), array( "name" => "Footer Background ", "type" => "subtitle"), array( "name"
=> "Footer Width", "type" => "full-empty"), array( "name" => "Background Color:", "id" => $shortname."_footer_background", "std"
=> "181717", "type" => "text-color-wide"), array( "name" => "Background Image:", "id" => $shortname."_footer_background_image",
"std" => "footer.png", "type" => "text-wide"), array( "name" => "Image Reapet:", "id" =>
$shortname."_footer_background_image_repeat", "type" => "select", "std" => "repeat-x", "options" => array("repeat-x", "repeat",
"repeat-y", "no-repeat"), ), array( "name" => "Image Align:", "id" => $shortname."_footer_image_align", "type" => "select",
"std" => "top center", "options" => array( "bottom center", "top center", "top right", "center left", "center center", "center
right", "bottom left", "top left", "bottom right"),), array( "type" => "box-close"), array( "type" => "an-ending"), array(
"type" => "z-i"), array( "name" => "P Text", "type" => "title"), array( "type" => "dummy-main-sidebar"), array( "name" =>
"Global P Options", "type" => "subtitle"), array("type" => "left-empty"), array( "name" => "P Size:", "id" =>
$shortname."_p_size", "std" => "12", "type" => "text-mp"), array( "name" => "P Font Family:", "id" => $shortname."_p_font",
"type" => "select", "std" => "Arial", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia","Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "P Color:", "id" =>$shortname."_p_color", "std" => "333",
"type" => "text-color"), array( "name" => "P Decoration:", "id" => $shortname."_p_decoration", "type" => "select", "std" =>
"none", "options" => array( "none", "underline", "overline","line-through", "blink"), ), array("type" => "box-close"),
array("type" => "right-empty"), array( "name" => "P Font Weight:", "id" => $shortname."_p_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"), ), array( "name" => "P Font Style:", "id" => $shortname."_p_style", "type" =>
"select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "P Line height (%)", "id"
=> $shortname."_p_line_size", "std" => "200", "type" =>"text-left"), array("type" => "box-close"), array("type" =>
"line-break"), array( "name" => "P Padding Options", "type" => "left-half"), array( "name" => "Top:", "id" =>
$shortname."_p_padding_top", "std" => "5", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_p_padding_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_p_padding_bottom", "std" => "3", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_p_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "P Margin
Options", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_p_margin_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_p_margin_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom:", "id" =>$shortname."_p_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_p_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "office-space"),
array( "name" => "Footer P Options", "type" => "subtitle"), array( "type" => "dummy-space"), array( "type" => "dummy-f1"),array(
"type" => "dummy-space"), array("type" => "left-empty"), array( "name" => "P Size:", "id" => $shortname."_p_footer_size", "std"
=> "12", "type" => "text-mp"), array( "name" => "P Font Family: ", "id" => $shortname."_p_footer_font", "type" => "select",
"std" => "Arial", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New Roman", "Verdana",
"Trebuchet MS", "Lucida Sans"), ), array( "name" => "P Color:", "id" =>$shortname."_p_footer_color", "std" => "ccc", "type" =>
"text-color"), array( "name" => "P Decoration:", "id" => $shortname."_p_footer_decoration", "type" => "select", "std" => "none",
"options" => array( "none", "underline", "overline","line-through", "blink"), ), array("type" => "box-close"), array("type" =>
"right-empty"), array( "name" => "P Font Weight: ", "id" => $shortname."_p_footer_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"), ), array( "name" => "P Font Style:", "id" => $shortname."_p_footer_style",
"type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"),), array( "name" => "P Line height
(%)", "id" => $shortname."_p_footer_line_size", "std" => "200", "type" =>"text-wide"), array("type" => "box-close"), array(
"name" => "P Padding Options", "type" => "left-half"), array( "name" => "Top:", "id" => $shortname."_p_footer_padding_top",
"std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_p_footer_padding_right", "std" => "1",
"type" => "text-mp"), array( "name" => "Bottom:", "id" => $shortname."_p_footer_padding_bottom", "std" => "3", "type" =>
"text-mp"), array( "name" => "Left:", "id" => $shortname."_p_footer_padding_left", "std" => "1", "type" => "text-mp"),
array("type" => "box-close"), array( "name" => "P Margin Options", "type" => "right-half"), array( "name" => "Top:", "id" =>
$shortname."_p_footer_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_p_footer_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id"
=>$shortname."_p_footer_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_p_footer_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"), array( "type" =>
"an-ending"), array( "type" => "z-j"), array( "name" => "Sidebar Options", "type" => "title"), array( "type" =>
"dummy-main-sidebar"), array( "name" => "Sidebar Design", "type" => "subtitle"), array( "type" => "full-empty"), array( "name"
=> "Background Color:", "id" => $shortname."_main_sidebar_background_color", "std" => "", "type" => "text-color-wide"), array(
"name" => "Background Image:", "id" => $shortname."_main_sidebar_background_image", "std" => "", "type" => "text-wide"), array(
"name" => "Image Reapet: ", "id" => $shortname."_main_sidebar_background_image_repeat", "type" => "select", "std" => "repeat",
"options" => array("repeat", "repeat-y", "no-repeat", "repeat-x"),), array( "name" => "Image Align:", "id" =>
$shortname."_main_sidebar_background_image_align", "type" => "select", "std" => "top left", "options" => array( "top left", "top
center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right"), ), array(
"type" => "box-close"), array( "name" => "Main Sidebar Widget Headings", "type" => "subtitle"), array( "type" => "left-empty"),
array( "name" => "Font Size:", "id" => $shortname."_h3_widget_size", "std" => "18", "type" => "text-left"), array( "name" =>
"Font:", "id" => $shortname."_h3_widget_font", "type" => "select", "std" => "Arial", "options" => array( "Arial", "Helvetica",
"Impact","Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Font
Color:", "id" => $shortname."_h3_widget_color", "std" => "000", "type" => "text-color-wide"), array( "type" => "box-close"),
array( "type" => "right-empty"), array( "name" => "Background Color:", "id" => $shortname."_h3_widget_background", "std" => "",
"type" => "text-color-wide"), array( "name" => "Font Decoration:", "id" => $shortname."_h3_widget_decoration", "type" =>
"select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "name" =>
"Font Weight:", "id" => $shortname."_h3_widget_weight", "type" => "select", "std" => "normal", "options" => array( "normal",
"bold"), ), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name" => "Font Style:", "id" =>
$shortname."_h3_widget_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ),
array( "name" => "Font Transform:", "id" => $shortname."_h3_widget_font_trans", "type" => "select", "std" => "uppercase",
"options" => array( "uppercase","capitalize", "none", "lowercase",), ), array( "name" => "Line Height (%)", "id" =>
$shortname."_h3_widget_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "type" =>
"full-empty"), array( "type" => "box-close"), array( "name" => "Widget Headers Paddings:", "type" => "left-half"), array( "name"
=> "Top:", "id" => $shortname."_h3_widget_padding_top","std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_h3_widget_padding_right", "std" => "0", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_h3_widget_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_h3_widget_padding_left", "std" => "0", "type" => "text-mp"), array( "type" => "box-close"), array( "name" =>
"Widget Headers Margins:", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_h3_widget_margin_top", "std"
=> "15", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_h3_widget_margin_right", "std" => "0", "type" =>
"text-mp"), array( "name" => "Bottom:", "id" => $shortname."_h3_widget_margin_bottom", "std" => "7", "type" => "text-mp"),
array( "name" => "Left:", "id" => $shortname."_h3_widget_margin_left", "std" => "0", "type" => "text-mp"), array( "type" =>
"box-close"), array( "type" => "an-ending"), array( "type" => "z-aa"), array( "name" => "Footer Widget Options", "type" =>
"title"), array( "type" => "dummy-space"), array( "type" => "dummy-f1"), array( "type" => "dummy-space"), array( "name" =>
"Footer Widgets Design", "type" => "subtitle"), array( "type" => "full-empty"), array( "name" => "Background Color:", "id" =>
$shortname."_footer_left_sidebar_background_color", "std" => "", "type" => "text-color-wide"), array( "name" => "Background
Image:", "id" => $shortname."_footer_left_sidebar_background_image", "std" => "", "type" => "text-wide"), array( "name" =>
"Image Reapet: ", "id" => $shortname."_footer_left_sidebar_background_image_repeat", "type" => "select", "std" => "repeat",
"options" => array("repeat", "repeat-y", "no-repeat", "repeat-x"),), array( "name" => "Image Align:", "id" =>
$shortname."_footer_left_align", "type" => "select", "std" => "center right", "options" => array( "center right", "top left",
"top center", "top right", "center left", "center center", "bottom left", "bottom center", "bottom right"), ), array( "type" =>
"box-close"), array( "name" => "Footer Widget Headings", "type" => "subtitle"), array( "name" => "Font Size:", "id" =>
$shortname."_h3_f1_size", "std" => "18", "type" => "text-left"), array( "name" => "Font Color:", "id" =>
$shortname."_h3_f1_color", "std" => "ccc", "type" => "text-color-wide"), array( "name" => "Background Color:", "id" =>
$shortname."_h3_f1_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Font:", "id" =>
$shortname."_h3_f1_font", "type" => "select", "std" => "Helvetica", "options" => array( "Helvetica", "Impact", "Arial", "Courier
New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Font Decoration:", "id" =>
$shortname."_h3_f1_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Style:", "id" => $shortname."_h3_f1_style", "type" => "select", "std" =>
"normal", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "Font Weight:", "id" =>
$shortname."_h3_f1_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "type" =>
"somehelp"), array( "name" => "Widget Headers Padding (px)", "type" => "left-half"), array( "name" => "Top:", "id" =>
$shortname."_h3_f1_padding_top","std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_h3_f1_padding_right", "std" => "0", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_h3_f1_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_h3_f1_padding_left", "std" => "0", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "Widget
Headers Margin (px)", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_h3_f1_margin_top", "std" => "15",
"type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_h3_f1_margin_right", "std" => "0", "type" => "text-mp"),
array( "name" => "Bottom:", "id" => $shortname."_h3_f1_margin_bottom", "std" => "7", "type" => "text-mp"), array( "name" =>
"Left:", "id" => $shortname."_h3_f1_margin_left", "std" => "0", "type" => "text-mp"), array( "type" => "box-close"), array(
"type" => "an-ending"), array( "type" => "z-k"), array( "name" => "Headings", "type" => "title"), array( "type" => "dummy-h1"),
array( "name" => "H1 Headings", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Size:", "id" =>
$shortname."_h1_size", "std" => "22", "type" => "text-left"), array( "name" => "Font Family: ", "id"=> $shortname."_h1_font",
"type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Color:", "id" => $shortname."_h1_color", "std" =>
"435010", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Background
Color:", "id" =>$shortname."_h1_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Decoration:", "id" =>
$shortname."_h1_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Weight: ", "id" => $shortname."_h1_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"),), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name"
=> "Font Style:", "id" => $shortname."_h1_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_h1_font_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",),), array( "name" => "Line Height (%)", "id" =>
$shortname."_h1_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "name" => "H1
Padding", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h1_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right", "id" => $shortname."_h1_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom", "id" => $shortname."_h1_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h1_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "H1 Margin",
"type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h1_margin_top", "std" => "1", "type" => "text-mp"), array(
"name" => "Right", "id" => $shortname."_h1_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" =>
$shortname."_h1_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h1_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "line-break"),
array( "name" => "H2 Headings", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Size:", "id" =>
$shortname."_h2_size", "std" => "20", "type" => "text-left"), array( "name" => "Font Family: ", "id"=> $shortname."_h2_font",
"type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact","Courier New", "Georgia", "Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Color:", "id" => $shortname."_h2_color", "std" =>
"435010", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Background
Color:", "id" =>$shortname."_h2_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Decoration:", "id" =>
$shortname."_h2_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Weight: ", "id" => $shortname."_h2_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"),), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name"
=> "Font Style:", "id" => $shortname."_h2_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_h2_font_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",), ), array( "name" => "Line Height (%)", "id" =>
$shortname."_h2_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "name" => "h2
Padding", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h2_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right", "id" => $shortname."_h2_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom", "id" => $shortname."_h2_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h2_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "h2 Margin",
"type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h2_margin_top", "std" => "1", "type" => "text-mp"), array(
"name" => "Right", "id" => $shortname."_h2_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" =>
$shortname."_h2_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h2_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "line-break"),
array( "name" => "H3 Headings", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Size:", "id" =>
$shortname."_h3_size", "std" => "18", "type" => "text-left"), array( "name" => "Font Family: ", "id"=> $shortname."_h3_font",
"type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact","Courier New", "Georgia", "Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Color:", "id" => $shortname."_h3_color", "std" =>
"435010", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Background
Color:", "id" =>$shortname."_h3_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Decoration:", "id" =>
$shortname."_h3_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Weight: ", "id" => $shortname."_h3_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"),), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name"
=> "Font Style:", "id" => $shortname."_h3_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_h3_font_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",),), array( "name" => "Line Height (%)", "id" =>
$shortname."_h3_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "name" => "h3
Padding", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h3_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right", "id" => $shortname."_h3_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom", "id" => $shortname."_h3_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h3_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "h3 Margin",
"type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h3_margin_top", "std" => "1", "type" => "text-mp"), array(
"name" => "Right", "id" => $shortname."_h3_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" =>
$shortname."_h3_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h3_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "line-break"),
array( "name" => "H4 Headings", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Size:", "id" =>
$shortname."_h4_size", "std" => "16", "type" => "text-left"), array( "name" => "Font Family: ", "id"=> $shortname."_h4_font",
"type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Color:", "id" => $shortname."_h4_color", "std" =>
"435010", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Background
Color:", "id" =>$shortname."_h4_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Decoration:", "id" =>
$shortname."_h4_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Weight: ", "id" => $shortname."_h4_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"),), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name"
=> "Font Style:", "id" => $shortname."_h4_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_h4_font_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",),), array( "name" => "Line Height (%)", "id" =>
$shortname."_h4_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "name" => "h4
Padding", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h4_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right", "id" => $shortname."_h4_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom", "id" => $shortname."_h4_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h4_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "h4 Margin",
"type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h4_margin_top", "std" => "1", "type" => "text-mp"), array(
"name" => "Right", "id" => $shortname."_h4_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" =>
$shortname."_h4_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h4_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "line-break"),
array( "name" => "H5 Headings", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Size:", "id" =>
$shortname."_h5_size", "std" => "14", "type" => "text-left"), array( "name" => "Font Family: ", "id"=> $shortname."_h5_font",
"type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Color:", "id" => $shortname."_h5_color", "std" =>
"435010", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Background
Color:", "id" =>$shortname."_h5_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Decoration:", "id" =>
$shortname."_h5_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Weight: ", "id" => $shortname."_h5_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"),), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name"
=> "Font Style:", "id" => $shortname."_h5_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_h5_font_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",),), array( "name" => "Line Height (%)", "id" =>
$shortname."_h5_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "name" => "h5
Padding", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h5_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right", "id" => $shortname."_h5_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom", "id" => $shortname."_h5_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h5_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "h5 Margin",
"type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h5_margin_top", "std" => "1", "type" => "text-mp"), array(
"name" => "Right", "id" => $shortname."_h5_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" =>
$shortname."_h5_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h5_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "line-break"),
array( "name" => "H6 Headings", "type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Size:", "id" =>
$shortname."_h6_size", "std" => "13", "type" => "text-left"), array( "name" => "Font Family: ", "id"=> $shortname."_h6_font",
"type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New
Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Color:", "id" => $shortname."_h6_color", "std" =>
"435010", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Background
Color:", "id" =>$shortname."_h6_background", "std" => "", "type" => "text-color-wide"), array( "name" => "Decoration:", "id" =>
$shortname."_h6_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Weight: ", "id" => $shortname."_h6_weight", "type" => "select", "std" =>
"normal", "options" => array( "normal", "bold"), ), array( "type" => "box-close"), array( "type" => "left-empty"), array( "name"
=> "Font Style:", "id" => $shortname."_h6_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_h6_font_trans", "type" => "select", "std" =>
"uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",), ), array( "name" => "Line Height (%)", "id" =>
$shortname."_h6_line_height", "std" => "150", "type" => "text-left"), array( "type" => "box-close"), array( "name" => "h6
Padding", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h6_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right", "id" => $shortname."_h6_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom", "id" => $shortname."_h6_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h6_padding_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "h6 Margin",
"type" => "text-four"), array( "name" => "Top", "id" => $shortname."_h6_margin_top", "std" => "1", "type" => "text-mp"), array(
"name" => "Right", "id" => $shortname."_h6_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" =>
$shortname."_h6_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" =>
$shortname."_h6_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "type" => "an-ending"),
array( "type" => "z-l"), array( "name" => "Sticky Post Options", "type" => "title"), array( "type" => "dummy-space"), array(
"type" => "dummy-sticky"), array( "type" => "dummy-space"), array( "name" => "Sticky Background Image", "type" => "left-half"),
array( "name" => "Image:", "id" => $shortname."_sticky_background_image", "std" => "sticky.png", "type" => "text-left"), array(
"name" => "Image Repeat:", "id" => $shortname."_sticky_background_image_repeat", "type" => "select", "std" => "repeat-x",
"options" => array( "repeat", "repeat-x", "repeat-y", "no-repeat"), ), array( "name" => "Image Position:", "id" =>
$shortname."_sticky_background_image_position", "type" => "select", "std" => "bottom", "options" => array( "bottom", "top",
"right","centre", "left"), ), array("type" => "box-close"), array( "name" => "Sticky Color Options", "type" => "right-half"),
array( "name" => "Background Color:", "id" => $shortname."_sticky_background_color", "std" => "", "type" => "text-color-wide"),
array( "name" => "Border Color:", "id" => $shortname."_sticky_border_color", "std" => "cccccc", "type" => "text-color"), array(
"name" => "Width:", "id" => $shortname."_sticky_border_width", "std" => "1", "type" => "text-mp"), array( "name" => "Border
Type:", "id" => $shortname."_sticky_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double",
"groove", "dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "type" => "line-break"),
array( "name" => "Sticky Post Margins", "type" => "left-half"), array( "name" => "Top:", "id" =>
$shortname."_sticky_margin_top", "std" => "10", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_sticky_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_sticky_margin_bottom", "std" => "20", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_sticky_margin_left", "std" => "1", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "Sticky
Post Padding", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_sticky_padding_top", "std" => "10", "type"
=> "text-mp"), array( "name" => "Right:", "id" => $shortname."_sticky_padding_right", "std" => "10", "type" => "text-mp"),
array( "name" => "Bottom:", "id" => $shortname."_sticky_padding_bottom", "std" => "10", "type" => "text-mp"), array( "name" =>
"Left:", "id" => $shortname."_sticky_padding_left", "std" => "10", "type" => "text-mp"), array("type" => "box-close"), array(
"type" => "an-ending"), array( "type" => "z-m"), array( "name" => "Tag Cloud Options", "type" => "title"), array( "type" =>
"dummy-space"), array( "type" => "dummy-tag-cloud"), array( "type" => "dummy-space"), array( "type" => "left-empty"), array(
"name" => "Display the footer tag cloud box? ", "id" => $shortname."_footer_tags", "type" => "select-wide", "std" => "yes",
"options" => array( "yes", "no"),), array( "name" => "Background Color:", "id" => $shortname."_tag_area_background_color", "std"
=> "", "type" => "text-color"), array( "type" => "box-close"), array( "type" => "right-empty"), array( "name" => "Normal Link
Color:", "id" => $shortname."_tag_area_font_color", "std" => "ccc", "type" => "text-color"), array( "name" => "Hover Link
Color:", "id" => $shortname."_tag_area_font_color_hover", "std" => "fff", "type" => "text-color"), array( "name" => "Visited
Link Color:", "id" => $shortname."_tag_area_font_color_visited", "std" => "ccc", "type" => "text-color"), array( "type" =>
"box-close"), array( "type" => "left-empty"), array( "name" => "Background Image:", "id" => $shortname."_tag_background_image",
"std" => "tag.png", "type" => "text-wide"), array( "name" => "Image Reapet:", "id" => $shortname."_tag_image_repeat", "type" =>
"select", "std" => "repeat-x", "options" => array("repeat-x", "repeat", "repeat-y", "no-repeat"), ), array( "name" => "Image
Align:", "id" => $shortname."_tag_image_align", "type" => "select", "std" => "top left", "options" => array( "top left", "top
center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right"),), 
array("type" => "box-close"), array("type" => "line-break"),array(
"type" => "space-space"), array( "type" => "an-ending"), array( "type" => "z-xx"), array( "type" =>
"an-ending"), array( "type" => "z-xa"), array( "type" => "an-ending"), array( "type" => "z-n"), array( "name" => "Blockquotes",
"type" => "title"), array( "type" => "dummy-space"), array( "type" => "dummy-blockquote"), array( "type" => "dummy-space"),
array("type" => "left-empty"), array( "name" => "Font Size:", "id" => $shortname."_bloc_font_size", "std" => "11", "type" =>
"text-font-size"), array( "name" => "Font:", "id" => $shortname."_bloc_family", "type" =>"select", "std" => "Courier New",
"options" => array( "Courier New", "Helvetica", "Impact", "Arial", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS",
"Lucida Sans"),), array( "name" => "Text Color:", "id" => $shortname."_bloc_color", "std" => "333", "type" => "text-color"),
array( "name" => "Font Decoration:", "id" => $shortname."_bloc_decoration", "type" => "select", "std" => "none", "options" =>
array("none", "underline", "overline", "line-through", "blink"), ),array("type" => "box-close"), array("type" => "right-empty"),
array( "name" => "Font Weight:", "id" => $shortname."_bloc_weight", "type" => "select", "std" => "normal", "options" => array(
"normal", "bold"),), array( "name" => "Font Style:", "id" => $shortname."_bloc_style", "type" => "select", "std" => "italic",
"options" => array( "normal", "italic","oblique"), ), array( "name" => "Font Transform:", "id" => $shortname."_bloc_font_trans",
"type" => "select", "std" => "uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",), ), array("type"
=> "box-close"), array( "type" => "line-break"), array("type" => "left-empty"), array( "name" => "Background Color:", "id" =>
$shortname."_bloc_background_color", "std" => "", "type" => "text-color-wide"), array( "name" => "Border Color:", "id" =>
$shortname."_bloc_border_color", "std" => "fff", "type" => "text-color"), array( "name" => "Width:", "id" =>
$shortname."_bloc_border_width", "std" => "1", "type" => "text-font-size"), array( "name" => "Border Type:", "id" =>
$shortname."_bloc_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove", "dotted",
"dashed", "inset", "outset", "ridge" ), ), array("type" => "box-close"), array( "type" => "line-break"), array( "name" =>
"Padding", "type" => "left-half"), array( "name" => "Top:", "id" => $shortname."_bloc_padding_top", "std" =>"10", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_bloc_padding_right", "std" => "10", "type" => "text-mp"), array(
"name" => "Bottom:", "id" => $shortname."_bloc_padding_bottom", "std" => "10", "type" => "text-mp"), array( "name" => "Left:",
"id" => $shortname."_bloc_padding_left", "std" => "10", "type" => "text-mp"), array("type" => "box-close"), array( "name" =>
"Margin", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_bloc_margin_top", "std" => "10", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_bloc_margin_right", "std" => "10", "type" => "text-mp"), array(
"name" => "Bottom:", "id" => $shortname."_bloc_margin_bottom", "std" => "10", "type" => "text-mp"), array( "name" => "Left:",
"id" => $shortname."_bloc_margin_left", "std" => "10", "type" => "text-mp"), array("type" => "box-close"), array( "type" =>
"an-ending"), array( "type" => "z-o"), array( "name" => "Adverts", "type" => "title"), array( "type" => "deus","name" => "Below
you will see code boxes for adverts on the theme. </br> We do not provide back end previews of the adverts to make sure you dont
get into trouble clicking your on adverts!",), array( "name" => "Advert One", "type" => "subtitle"), array( "type" =>
"deus","name" => "Advert One is positioned on the front page, page, archive, and single post pages. The advert should be a
maximum of about 700px wide so it doesnt stick into anything else.",), array("type" => "left-empty"), array( "name" => "Display
Advert One ", "id" => $shortname."_show_advert_one", "type" => "select", "std" => "no", "options" => array( "yes", "no"),),
array( "type" => "box-close"), array( "desc" => "Enter your advert code in the box above. ", "id" => $shortname."_advert_one",
"std" => "", "type" => "advert"), array( "name" => "Advert Two", "type" => "subtitle"), array( "type" => "deus", "name" =>
"Advert Two is a full sidebar width advert and should be about 250px wide. This can be set up, as we have demoed, to be a block
of 125x125px square adverts or one large advert. Just enter the code acordingly.",), array("type" => "left-empty"), array(
"name" => "Display Advert Two; ", "id" => $shortname."_show_advert_two", "type" => "select", "std" => "no", "options" => array(
"yes", "no"), ), array( "type" => "box-close"), array( "desc" => "Enter your advert code in the box above.", "id" =>
$shortname."_advert_two", "std" => "", "type" => "advert"), array( "type" => "an-ending"), array( "type" => "z-p"), array(
"name" => "Google Anayltics", "type" => "title"), array( "type" => "deus", "name" => "Google Anayltics is a great way of keeping
a watch on your visitors and how they got there. Its built right in to the 42k theme, so all you need to do is enter your Google
Anayltics tracker code in the box below and your ready to go.",), array( "desc" => "Enter your Google Anaylitics code in the box
and it will be added to every page on your Wordpress blog.", "id" => $shortname."_goo_an", "std" => "", "type" => "advert"),
array( "type" => "space-boy"), array( "type" => "an-ending"), array( "type" => "z-q"), array( "type" => "an-ending"), array(
"type" => "z-r"), array( "type" => "an-ending"), array( "type" => "z-s"), array( "name" => "Navigation", "type" => "title"),
array( "type" => "dummy-space"), array( "type" => "dummy-nav"), array( "type" => "dummy-space"), array( "name" => "Menu Width",
"type" => "subtitle"), array( "type" => "left-empty"), array( "name" => "Menu Width:", "id" => $shortname."_menu_width", "std"
=> "100", "type" => "text-wide"), array( "name" => "Menu Width Type: ", "id" => $shortname."_menu_width_type", "type" =>
"select", "std" => "%", "options" => array("%", "px"), ), array( "type" => "box-close"), array( "type" => "deus", "name" =>
"Changing the width of the menu ONLY effects the background of the menu, the actual menu links will always be as wide as the
Conatiner",), array( "name" => "Navigation Layout", "type" => "subtitle"), array( "type" => "full-empty"), array( "name" =>
"Background Color:", "id" => $shortname."_menu_background", "std" => "", "type" => "text-color-wide"), array( "name" =>
"Background Image:", "id" => $shortname."_navbar_background_image", "std" => "menu.png", "type" => "text-wide"), array( "name"
=> "Image Reapet: ", "id" => $shortname."_menu_background_repeat", "type" => "select", "std" => "repeat", "options" =>
array("repeat", "repeat-y", "no-repeat", "repeat-x"), ), array( "name" => "Image Align:", "id" =>
$shortname."_menu_background_image_align", "type" => "select", "std" => "top right", "options" => array( "top right", "top
left", "top center", "center right", "center left", "center center", "bottom left", "bottom center", "bottom right"), ), array(
"type" => "box-close"), array( "name" => "Button Font & Background Colors", "type" => "subtitle"), array( "name" => "Button Font
Color", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_button_font_color", "std" => "333", "type" =>
"text-color"), array( "name" =>"Current Page:", "id" => $shortname."_button_font_color_current", "std" => "435010", "type" =>
"text-color"), array( "name" => "Hover:", "id" => $shortname."_button_font_color_hover", "std" => "435010", "type" =>
"text-color"), array( "type" => "box-close"), array( "name" => "Button Background Color", "type" => "right-half"), array( "name"
=> "Normal:", "id" => $shortname."_button_background", "std" => "", "type" => "text-color"), array( "name" => "Current Page:",
"id" => $shortname."_button_background_current", "std" => "", "type" => "text-color"), array( "name" => "Hover:", "id" =>
$shortname."_button_background_hover", "std" => "", "type" => "text-color"), array( "type" => "box-close"), array( "name" =>
"Button Text", "type" => "subtitle"), array( "name" => "Font Size:", "id" => $shortname."_button_font_size", "std" => "13",
"type" => "text-left"), array( "name" => "Font Family: ", "id" => $shortname."_button_font_family", "type" => "select", "std" =>
"none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet
MS", "Lucida Sans"), ), array( "name" => "Decoration:", "id" => $shortname."_button_font_decoration", "type" => "select", "std"
=> "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "name" => "Font Weight:",
"id" => $shortname."_button_font_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ),
array( "name" => "Font Style:", "id" => $shortname."_button_style", "type" => "select", "std" => "normal", "options" => array(
"normal", "italic", "oblique"), ), array( "name" => "Text Transform:", "id" => $shortname."_button_font_trans", "type" =>
"select", "std" => "uppercase", "options" => array( "none","capitalize", "uppercase", "lowercase",), ), array( "name" => "Line
Height (%)", "id" => $shortname."_button_line_pen", "std" => "195", "type" => "text-left"), array( "type" => "line-break"),
array( "name" => "Button Design", "type" => "subtitle"), array( "name" => "Button Background Image", "type" => "left-half"),
array( "name" => "Background Image:", "id" => $shortname."_button_background_image", "std" => "divider.png", "type" =>
"text-wide"), array( "name" => "Image Align:", "id" => $shortname."_button_background_image_align", "type" => "select", "std" =>
"center right", "options" => array( "center right", "top left", "top center", "top right", "center left", "center center",
"bottom left", "bottom center", "bottom right"), ), array( "name" => "Image Reapet:", "id" =>
$shortname."_button_background_image_repeat", "type" => "select", "std" => "no-repeat", "options" => array("no-repeat",
"repeat-y", "repeat", "repeat-x"),), array( "type" => "box-close"), array( "name" => "Button Border", "type" => "right-half"),
array( "name" => "Button Border Color:", "id" => $shortname."_button_border_color", "std" => "", "type" => "text-color-wide"),
array( "name" => "Button Border Width:", "id" => $shortname."_button_border_width", "std" => "0", "type" => "text-wide"), array(
"name" => "Button Border Type:", "id" => $shortname."_button_border_type", "type" => "select", "std" => "solid", "options" =>
array("solid", "double", "groove", "dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array(
"type" => "line-break"), array( "name" => "Button Margins", "type" => "left-half"), array( "name" => "Top:", "id" =>
$shortname."_button_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_button_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_button_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_button_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "Button
Paddings", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_button_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_button_padding_right", "std" => "10", "type" => "text-mp"), array(
"name" => "Bottom:", "id" => $shortname."_button_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:",
"id" => $shortname."_button_padding_left", "std" => "10", "type" => "text-mp"), array( "type" => "box-close"), array( "type" =>
"line-break"), array( "type" => "an-ending"), array( "type" => "z-t"), array( "name" => "404 Error Pages", "type" => "title"),
array( "type" => "deus", "name" => "The theme has custom error messages avaliable, if you want to give lost visitors a special
message then please change the title and message below. This will show up everytime an error page is displayed.",), array(
"name" => "404 Error Title", "type" => "subtitle"), array( "name" => "", "id" => $shortname."_404_title", "std" => "Sorry",
"type" => "advert"), array( "name" => "404 Error Message", "type" => "subtitle"), array( "name" => "", "id" =>
$shortname."_404_text", "std" => "We cant find what your looking for.", "type" => "advert"), array(
"type" => "space-space"),  array( "type" => "an-ending"),
array( "type" => "z-u"), array( "name" => "Table Options", "type" => "title"), array( "type" => "dummy-space"), array( "type" =>
"dummy-table"), array( "type" => "dummy-space"), array( "name" => " Table Options","type" => "subtitle"), array( "name" =>
"Table Background & Border:", "type" => "left-half"), array( "name" => "Background Color:", "id" =>
$shortname."_table_background_color", "std" => "eee", "type" => "text-color-wide"), array( "name" => "Border Color:", "id" =>
$shortname."_table_border_color", "std" => "666", "type" => "text-color"), array( "name" => "Width:", "id" =>
$shortname."_table_border_width", "std" => "1", "type" => "text-mp"), array( "name" => "Border Type:", "id" =>
$shortname."_table_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove", "dotted",
"dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "name" => "Table Padding", "type" =>
"text-four"), array( "name" => "Top:", "id" => $shortname."_table_padding_top", "std" => "5", "type" =>"text-mp"), array( "name"
=> "Right:", "id" => $shortname."_table_padding_right", "std" => "10", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_table_padding_bottom", "std" => "5", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_table_padding_left", "std" => "10", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "Table
Margins", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_table_margin_top", "std" => "3", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_table_margin_right", "std" => "3", "type" => "text-mp"), array(
"name" => "Bottom:", "id" => $shortname."_table_margin_bottom", "std" => "3", "type" => "text-mp"), array( "name" => "Left:",
"id" => $shortname."_table_margin_left", "std" => "3", "type" => "text-mp"), array( "type" => "box-close"), array( "type" =>
"line-break"), array( "name" => " Table Heading Options","type" => "subtitle"), array( "name" => "Heading Background & Border",
"type" => "left-half"), array( "name" => "Background Color:", "id" => $shortname."_th_background_color", "std" => "eee", "type"
=> "text-color-wide"), array( "name" => "Border Color:", "id" => $shortname."_th_border_color", "std" => "666", "type"=>
"text-color"), array( "name" => "Width:", "id" => $shortname."_th_border_width", "std" => "1", "type" => "text-mp"), array(
"name" => "Border Type:", "id" => $shortname."_th_border_type", "type" => "select", "std" => "solid", "options" =>
array("solid", "double", "groove", "dotted", "dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array(
"name" => "Heading Paddings", "type" => "right-half"), array( "name" => "Top:", "id" => $shortname."_th_padding_top", "std" =>
"5", "type" =>"text-mp"), array( "name" => "Right:", "id" => $shortname."_th_padding_right", "std" => "3", "type" => "text-mp"),
array( "name" => "Bottom:", "id" => $shortname."_th_padding_bottom", "std" => "3", "type" => "text-mp"), array( "name" =>
"Left:", "id" => $shortname."_th_padding_left", "std" => "3", "type" => "text-mp"), array( "type" => "box-close"), array( "name"
=> "Heading Fonts", "type" => "full-full"), array( "name" => "Text Color:", "id" => $shortname."_th_color", "std" => "000",
"type" => "text-color"), array( "name" => "Size:", "id" =>$shortname."_th_font_size", "std" => "", "type" => "text-mp"), array(
"name" => "Font:", "id" => $shortname."_th_family", "type" => "select", "std" => "Arial", "options" => array( "Arial",
"Helvetica", "Impact", "Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name"
=> "Font Style:", "id" => $shortname."_th_style", "type" => "select", "std" => "italic", "options" => array( "normal", "italic",
"oblique"), ), array( "name" => "Decoration:", "id" => $shortname."_th_decoration", "type" => "select", "std" => "none",
"options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "name" => "Font Weight:", "id" =>
$shortname."_th_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "name" => "Text
Transform:", "id" => $shortname."_th_trans", "type" => "select", "std" => "uppercase", "options" => array(
"uppercase","capitalize", "none", "lowercase",), ), array( "type" => "box-close"), array( "type" => "line-break"), array( "name"
=> " Table Data Options","type" => "subtitle"), array( "name" => "Data Background & Border", "type" => "left-half"), array(
"name" => "Background Color:", "id" => $shortname."_td_background_color", "std" => "eee", "type" => "text-color-wide"), array(
"name" => "Border Color:", "id" => $shortname."_td_border_color", "std" => "666", "type"=> "text-color"), array( "name" =>
"Width:", "id" => $shortname."_td_border_width", "std" => "1", "type" => "text-mp"), array( "name" => "Border Type:", "id" =>
$shortname."_td_border_type", "type" => "select", "std" => "solid", "options" => array("solid", "double", "groove", "dotted",
"dashed", "inset", "outset", "ridge" ),), array( "type" => "box-close"), array( "name" => "Data Padding", "type" =>
"right-half"), array( "name" => "Top:", "id" => $shortname."_td_padding_top", "std" => "3", "type" => "text-mp"), array( "name"
=> "Right:", "id" => $shortname."_td_padding_right", "std" => "3", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_td_padding_bottom", "std" => "3", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_td_padding_left", "std" => "3", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "Data Fonts",
"type" => "full-full"), array( "name" => "Text Color:", "id" => $shortname."_td_color", "std" => "000", "type" => "text-color"),
array( "name" => "Size:", "id" =>$shortname."_td_font_size", "std" => "", "type" => "text-mp"), array( "name" => "TD
Decoration:", "id" => $shortname."_td_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline",
"overline", "line-through", "blink"), ), array( "name" => "TD Font:", "id" => $shortname."_td_family", "type" => "select", "std"
=> "Arial", "options" => array( "Arial", "Helvetica", "Impact","Courier New", "Georgia", "Times New Roman", "Verdana",
"Trebuchet MS", "Lucida Sans"), ), array( "name" => "TD Font Style:", "id" => $shortname."_td_style", "type" => "select", "std"
=> "italic", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "TD Font Weight:", "id" =>
$shortname."_td_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "name" => "Text
Transform:", "id" => $shortname."_td_trans", "type" => "select", "std" => "capitalize", "options" => array(
"capitalize","uppercase", "none", "lowercase",), ), array( "type" => "box-close"), array( "type" => "line-break"), array( "type"
=> "an-ending"), array( "type" => "z-v"), array( "name" => "List Options", "type" => "title"), array( "type" => "dummy-space"),
array( "type" => "dummy-list"), array( "type" => "dummy-space"), array( "name" => "Unordered List", "type" => "subtitle"),
array( "name" => "Unordered List Background Color", "type" => "left-half"), array( "name" => "Background Color:", "id" =>
$shortname."_ul_background_color", "std" => "", "type" => "text-color-wide"), array( "type" => "box-close"), array( "name" =>
"UL Margins", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_ul_margin_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_ul_margin_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom:", "id" => $shortname."_ul_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_ul_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "UL Paddings",
"type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_ul_padding_top", "std" => "1", "type" => "text-mp"),
array( "name" => "Right:", "id" => $shortname."_ul_padding_right", "std" => "1", "type" => "text-mp"), array( "name" =>
"Bottom:", "id" => $shortname."_ul_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_ul_padding_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"), array( "type" =>
"line-break"), array( "name" => "Ordered List", "type" => "subtitle"), array( "name" => "Ordered List Background Color", "type"
=> "left-half"), array( "name" => "Background Color:", "id" => $shortname."_ol_background_color", "std" => "", "type" =>
"text-color-wide"), array( "type" => "box-close"), array( "name" => "OL Margins (px)", "type" => "text-four"), array( "name" =>
"Top:", "id" => $shortname."_ol_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" =>
$shortname."_ol_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" =>
$shortname."_ol_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_ol_margin_left", "std" => "10", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "OL
Paddings", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_ol_padding_top", "std" => "1", "type" =>
"text-mp"), array( "name" => "Right:", "id" => $shortname."_ol_padding_right", "std" => "1", "type" => "text-mp"), array( "name"
=> "Bottom:", "id" => $shortname."_ol_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" =>
$shortname."_ol_padding_left", "std" => "10", "type" => "text-mp"), array( "type" => "box-close"), array( "type" =>
"line-break"), array( "name" => "Unordered List Item", "type" => "subtitle"), array( "name" => "", "type" => "left-empty"),
array( "name" => "Font Color (#)", "id" => $shortname."_ul_li_color", "std" => "", "type" => "text-color-wide"), array( "name"
=> "Font Size (px)", "id" => $shortname."_ul_li_size", "std" => "12", "type" => "text-wide"), array( "name" => "Background Color
(#)", "id" => $shortname."_ul_li_background_color", "std" => "", "type" => "text-color-wide"), array( "type" => "box-close"),
array( "name" => "", "type" => "right-empty"), array( "name" => "List Decoration:", "id" => $shortname."_ul_li_pre", "type" =>
"select", "std" => "none", "options" => array( "none", "disc", "circle", "square"),), array( "name" => "Inside/Outside:", "id"
=> $shortname."_ul_li_inside_outside", "type" => "select", "std" => "inside", "options" => array( "inside", "outside"), ),
array( "name" => "Font:","category" => "body-font-links", "id" => $shortname."_ul_li_font", "type" => "select", "std" =>
"courier", "options" => array( "Courier New", "Arial", "Helvetica", "Impact", "Georgia", "Times New Roman", "Verdana",
"Trebuchet MS", "Lucida Sans"),), array( "type" => "box-close"), array( "name" => "", "type" => "left-empty"), array( "name" =>
"Font Weight:", "category" => "body-font", "id" => $shortname."_ul_li_font_weight", "type" => "select", "std" => "normal",
"options" => array( "normal", "bold"), ), array( "name" => "Font Decoration:", "category" => "body-font-links", "id" =>
$shortname."_ul_li_decoration", "type" => "select", "std" => "none","options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Style:", "category" => "body-font", "id" => $shortname."_ul_li_font_style",
"type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"),), array( "type" => "box-close"),
array( "name" => "UL Item Margins", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_ul_li_margin_top",
"std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_ul_li_margin_right", "std" => "1", "type" =>
"text-mp"), array( "name" => "Bottom:", "id" => $shortname."_ul_li_margin_bottom", "std" => "1", "type" => "text-mp"), array(
"name" => "Left:", "id" => $shortname."_ul_li_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),
array( "name" => "UL Item Paddings", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_ul_li_padding_top",
"std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_ul_li_padding_right", "std" => "1", "type"
=> "text-mp"), array( "name" => "Bottom:", "id" => $shortname."_ul_li_padding_bottom", "std" => "1", "type" => "text-mp"),
array( "name" => "Left:", "id" => $shortname."_ul_li_padding_left", "std" => "1", "type" => "text-mp"), array( "type" =>
"box-close"), array( "type" => "line-break"), array( "name" => "Ordered List Item", "type" => "subtitle"), array( "name" => "",
"type" => "left-empty"), array( "name" => "Font Color:", "id" => $shortname."_ol_li_color", "std" => "", "type" =>
"text-color-wide"), array( "name" => "Font Size (px)", "id" => $shortname."_ol_li_size", "std" => "12", "type" => "text-wide"),
array( "name" => "Background Color:", "id" => $shortname."_ol_li_background_color", "std" => "", "type" => "text-color-wide"),
array( "type" => "box-close"), array( "name" => "", "type" => "right-empty"), array( "name" => "Font ","category" =>
"body-font-links", "id" => $shortname."_ol_li_font", "type" => "select", "std" => "courier", "options" => array( "Courier New",
"Georgia", "Arial", "Helvetica", "Impact","Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"),), array( "name" => "List
Decoration", "id" => $shortname."_ol_li_pre", "type" => "select", "std" => "none", "options" => array( "none", "circle", "disc",
"square", "armenian", "decimal", "decimal-leading-zero", "georgian", "lower-alpha", "lower-greek", "lower-latin", "lower-roman",
"upper-alpha", "upper-latin", "upper-roman"),), array( "name" => "inside/outside", "id" => $shortname."_ol_li_inside_outside",
"type" => "select", "std" => "inside", "options" => array( "inside", "outside"), ), array( "type" => "box-close"), array( "name"
=> "", "type" => "left-empty"), array( "name" => "Font Decoration ", "category" => "body-font-links", "id" =>
$shortname."_ol_li_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline",
"line-through", "blink"), ), array( "name" => "Font Style ", "category" => "body-font", "id" => $shortname."_ol_li_font_style",
"type" => "select","std" => "normal", "options" => array( "normal", "italic", "oblique"),), array( "name" => "Font Weight",
"category" => "body-font", "id" => $shortname."_ol_li_font_weight", "type" => "select", "std" => "normal", "options" => array(
"normal", "bold"), ), array( "type" => "box-close"), array( "name" => "OL Item Margins", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_ol_li_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right", "id" => $shortname."_ol_li_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" => $shortname."_ol_li_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" => $shortname."_ol_li_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),array( "name" => "OL Item Paddings", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_ol_li_padding_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right", "id" => $shortname."_ol_li_padding_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" => $shortname."_ol_li_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" => $shortname."_ol_li_padding_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),
array( "type" => "line-break"),
array( "name" => " Widget Unordered List", "type" => "subtitle"), array( "name" => "", "type" => "left-empty"),
 array( "name" => "UL Background Color (#)", "id" => $shortname."_widget_ul_background_color", "std" => "", "type" => "text-color-wide"), array( "type" => "box-close"), array( "name" => "Widget UL Margins", "type" => "text-four"),
 array( "name" => "Top", "id" => $shortname."_widget_ul_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right", "id" => $shortname."_widget_ul_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" => $shortname."_widget_ul_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" => $shortname."_widget_ul_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),
array( "name" => "Widget UL Paddings", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_widget_ul_padding_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right", "id" => $shortname."_widget_ul_padding_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" => $shortname."_widget_ul_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" => $shortname."_widget_ul_padding_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),
array( "type" => "line-break"),
array( "name" => "Widget Ordered List", "type" => "subtitle"), array( "name" => "", "type" => "left-empty"), array( "name" => "Background Color (#)", "id" => $shortname."_widget_ol_background_color", "std" => "", "type" => "text-color-wide"), array( "type" => "box-close"),
 array( "name" => "Widget OL Margins", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_widget_ol_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right", "id" => $shortname."_widget_ol_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" => $shortname."_widget_ol_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" => $shortname."_widget_ol_margin_left", "std" => "10", "type" => "text-mp"), array( "type" => "box-close"),
array( "name" => "Widget OL Paddings", "type" => "text-four"), array( "name" => "Top", "id" => $shortname."_widget_ol_padding_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right", "id" => $shortname."_widget_ol_padding_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom", "id" => $shortname."_widget_ol_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left", "id" => $shortname."_widget_ol_padding_left", "std" => "10", "type" => "text-mp"), array( "type" => "box-close"),
array( "type" => "line-break"),
array( "name" => "Widget Unordered List Item", "type" => "subtitle"), array( "name" => "", "type" => "left-empty"), array( "name" => "Font Color (#)", "id" => $shortname."_widget_ul_li_color", "std" => "", "type" => "text-color-wide"),
array( "name" => "Font Size (px)", "id" => $shortname."_widget_ul_li_size", "std" => "12", "type" => "text-wide"), array( "name" => "Background Color (#)", "id" => $shortname."_widget_ul_li_background_color", "std" => "", "type" => "text-color-wide"), array( "type" => "box-close"),
 array( "type" => "right-empty"),
array( "name" => "Font ","category" => "body-font-links", "id" => $shortname."_widget_ul_li_font", "type" => "select", "std" => "courier", "options" => array( "Courier New", "Georgia","Arial", "Helvetica", "Impact", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ),
array( "name" => "List Decoration", "id" => $shortname."_widget_ul_li_pre", "type" => "select", "std" => "none", "options" => array( "none", "disc", "circle", "square"),),
 array( "name" => "inside/outside", "id" => $shortname."_widget_ul_li_inside_outside", "type" => "select", "std" => "outside", "options" => array( "outside", "inside"), ), array( "type" => "box-close"),
array( "type" => "left-empty"),
 array( "name" => "Font Decoration ", "category" => "body-font-links", "id" => $shortname."_widget_ul_li_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ),
 array( "name" => "Font Style ", "category" => "body-font", "id" => $shortname."_widget_ul_li_font_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ),
 array( "name" => "Font Weight", "category" => "body-font", "id" => $shortname."_widget_ul_li_font_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "type" => "box-close"),
array( "name" => "Widget UL Item Margins", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_widget_ul_li_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_widget_ul_li_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" => $shortname."_widget_ul_li_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" => $shortname."_widget_ul_li_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),
array( "name" => "Widget UL Item Paddings", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_widget_ul_li_padding_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_widget_ul_li_padding_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" => $shortname."_widget_ul_li_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" => $shortname."_widget_ul_li_padding_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"),
array( "type" => "line-break"),
array( "name" => "Widget OL Item", "type" => "subtitle"), array( "name" => "", "type" => "left-empty"), array( "name" => "Font Color:", "id" => $shortname."_widget_ol_li_color", "std" => "", "type" => "text-color-wide"),
array( "name" => "Font Size (px)", "id" => $shortname."_widget_ol_li_size", "std" => "12", "type" => "text-wide"), array( "name" => "Background Color:", "id" => $shortname."_widget_ol_li_background_color", "std" => "", "type" => "text-color-wide"), array( "type" => "box-close"),
 array( "name" => "", "type" => "right-empty"), array( "name" => "Font ","category" => "body-font-links", "id" => $shortname."_widget_ol_li_font", "type" => "select", "std" => "courier", "options" => array( "Courier New", "Arial", "Helvetica", "Impact","Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ),
array( "name" => "List Decoration:", "id" => $shortname."widget_ol_li_pre", "type" => "select", "std" => "none", "options" => array( "none", "circle", "disc", "square", "armenian", "decimal", "decimal-leading-zero", "georgian", "lower-alpha", "lower-greek", "lower-latin", "lower-roman", "upper-alpha", "upper-latin", "upper-roman"),),
 array( "name" => "Inside/Outside:", "id" => $shortname."_widget_ol_li_inside_outside", "type" => "select", "std" => "outside", "options" => array( "outside", "inside"), ),
array( "type" => "box-close"),
 array( "name" => "", "type" => "left-empty"), array( "name" => "Font Decoration: ", "category" => "body-font-links", "id" => $shortname."_widget_ol_li_decoration", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ),
 array( "name" => "Font Style: ", "category" => "body-font", "id" => $shortname."_widget_ol_li_font_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ),
 array( "name" => "Font Weight:", "category" => "body-font", "id" => $shortname."_widget_ol_li_font_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "type" => "box-close"), array( "name" => "Widget OL Item Margins", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_widget_ol_li_margin_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_widget_ol_li_margin_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" => $shortname."_widget_ol_li_margin_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" => $shortname."_widget_ol_li_margin_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"), array( "name" => "Widget OL Item Paddings", "type" => "text-four"), array( "name" => "Top:", "id" => $shortname."_widget_ol_li_padding_top", "std" => "1", "type" => "text-mp"), array( "name" => "Right:", "id" => $shortname."_widget_ol_li_padding_right", "std" => "1", "type" => "text-mp"), array( "name" => "Bottom:", "id" => $shortname."_widget_ol_li_padding_bottom", "std" => "1", "type" => "text-mp"), array( "name" => "Left:", "id" => $shortname."_widget_ol_li_padding_left", "std" => "1", "type" => "text-mp"), array( "type" => "box-close"), array( "type" => "line-break"), array( "type" => "an-ending"), array( "type" => "z-w"), array( "name" => "Links", "type" => "title"), array( "type" => "dummy-main-sidebar"), array( "name" => "Link Font Color", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_link_color", "std" => "435010", "type" => "text-color"), array( "name" => "Visited:", "id" => $shortname."_a_link_color_visited", "std" => "274321", "type" => "text-color"), array( "name" => "Hover:", "id" => $shortname."_a_link_color_hover", "std" => "ba5613", "type" => "text-color"),
array( "type" => "box-close"),
array( "name" => "Link Background Color", "type" => "right-half"), array( "name" => "Normal:", "id" =>$shortname."_a_link_background", "std" => "", "type" => "text-color"), array( "name" => "Visited:", "id" =>$shortname."_a_link_background_visited", "std" => "", "type" => "text-color"), array( "name" => "Hover:", "id" => $shortname."_a_link_background_hover", "std" => "", "type" => "text-color"), array( "type" => "box-close"),
 array( "name" => "Link Font Sizes (px)", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_link_size_normal", "std" => "12", "type" => "text-left"), array( "name" => "Visited:", "id" => $shortname."_a_link_size_visited", "std" => "12", "type" => "text-left"), array( "name" => "Hover:", "id" => $shortname."_a_link_size_hover", "std" => "12", "type" => "text-left"), array( "type" => "box-close"),
 array( "name" => "Link Decoration", "type" => "right-half"), array( "name" => "Normal:", "id" => $shortname."_a_link_decoration", "type" => "select", "std" => "none", "options" =>array( "none", "underline","overline", "line-through", "blink"), ),
array( "name" => "Visited:", "id" => $shortname."_a_link_decoration_visited", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ),
 array( "name" => "Hover:", "id" => $shortname."_a_link_decoration_hover", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "type" => "box-close"),
 array( "name" => "Font Family", "type" => "left-half"),
 array( "name" => "Normal:", "id" => $shortname."_a_link_font_family", "type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ),
 array( "name" => "Visited:", "id" => $shortname."_a_link_font_family_visited", "type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact","Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ),
 array( "name" => "Hover:", "id" => $shortname."_a_link_font_family_hover", "type" => "select", "std" => "none", "options" => array( "Arial", "Courier New", "Helvetica", "Impact","Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "type" => "box-close"),
 array( "name" => "Link Font Style", "type" => "right-half"), array( "name" => "Normal:", "id" => $shortname."_a_link_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "Visited:", "id" => $shortname."_a_link_style_visited", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "Hover:", "id" => $shortname."_a_link_style_hover", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "type" => "box-close"),
 array( "name" => "Link Font Weight", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_link_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"),), array( "name" => "Visited:", "id" => $shortname."_a_link_weight_visited", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "name" => "Hover:", "id" => $shortname."_a_link_weight_hover", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "type" => "box-close"),
 array( "name" => "Link Text Transform", "type" => "right-half"),
array( "name" => "Normal:", "id" => $shortname."_link_trans_normal", "type" => "select", "std" => "none", "options" => array( "none","capitalize", "uppercase", "lowercase",), ),
array( "name" => "Visited:", "id" => $shortname."_link_trans_visited", "type" => "select", "std" => "none", "options" => array( "none","capitalize", "uppercase", "lowercase",), ),
array( "name" => "Hover:", "id" => $shortname."_link_trans_hover", "type" => "select", "std" => "none", "options" => array( "none","capitalize", "uppercase", "lowercase",), ), array( "type" => "box-close"), array( "type" => "office-space"), array( "name" => "Footer Links", "type" => "subtitle"), array( "type" => "dummy-space"), array( "type" => "dummy-f1"), array( "type" => "dummy-space"), array( "name" => "Link Font Color", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_footerlink_color", "std" => "435010", "type" => "text-color"), array( "name" => "Visited:", "id" => $shortname."_a_footerlink_color_visited", "std" => "274321", "type" => "text-color"), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_color_hover", "std" => "ba5613", "type" => "text-color"), array("type" => "box-close"), array( "name" => "Link Background Color", "type" => "right-half"), array( "name" => "Normal:", "id" =>$shortname."_a_footerlink_background", "std" => "", "type" => "text-color"), array( "name" => "Visited:", "id" =>$shortname."_a_footerlink_background_visited", "std" => "", "type" => "text-color"), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_background_hover", "std" => "", "type" => "text-color"), array("type" => "box-close"), array( "name" => "Link Font Sizes", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_footerlink_size_normal", "std" => "12", "type" => "text-mp"), array( "name" => "Visited:", "id" => $shortname."_a_footerlink_size_visited", "std" => "12", "type" => "text-mp"), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_size_hover", "std" => "12", "type" => "text-mp"), array("type" => "box-close"), array( "name" => "Link Decoration", "type" => "right-half"), array( "name" => "Normal:", "id" => $shortname."_a_footerlink_decoration", "type" => "select", "std" => "none", "options" =>array( "none", "underline","overline", "line-through", "blink"), ), array( "name" => "Visited:", "id" => $shortname."_a_footerlink_decoration_visited", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_decoration_hover", "type" => "select", "std" => "none", "options" => array( "none", "underline", "overline", "line-through", "blink"), ), array( "type" => "box-close"), array( "name" => "Font Family", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_footerlink_font_family", "type" => "select", "std" => "none", "options" => array( "Arial", "Helvetica", "Impact", "Courier New", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Visited:", "id" => $shortname."_a_footerlink_font_family_visited", "type" => "select", "std" => "none", "options" => array( "Arial", "Courier New", "Helvetica", "Impact", "Georgia", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_font_family_hover", "type" => "select", "std" => "none", "options" => array( "Arial", "Courier New", "Georgia", "Helvetica", "Impact", "Times New Roman", "Verdana", "Trebuchet MS", "Lucida Sans"), ), array( "type" => "box-close"), array( "name" => "Link Font Style", "type" => "right-half"), array( "name" => "Normal:", "id" => $shortname."_a_footerlink_style", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "Visited:", "id" => $shortname."_a_footerlink_style_visited", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_style_hover", "type" => "select", "std" => "normal", "options" => array( "normal", "italic", "oblique"), ), array( "type" => "box-close"),
 array( "name" => "Link Font Weight", "type" => "left-half"), array( "name" => "Normal:", "id" => $shortname."_a_footerlink_weight", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"),), array( "name" => "Visited:", "id" => $shortname."_a_footerlink_weight_visited", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "name" => "Hover:", "id" => $shortname."_a_footerlink_weight_hover", "type" => "select", "std" => "normal", "options" => array( "normal", "bold"), ), array( "type" => "box-close"),
 array( "name" => "Link Text Transform", "type" => "right-half"),
array( "name" => "Normal:", "id" => $shortname."_footerlink_trans_normal", "type" => "select", "std" => "none", "options" => array( "none","capitalize", "uppercase", "lowercase",), ),
array( "name" => "Visited:", "id" => $shortname."_footerlink_trans_visited", "type" => "select", "std" => "none", "options" => array( "none","capitalize", "uppercase", "lowercase",), ),
array( "name" => "Hover:", "id" => $shortname."_footerlink_trans_hover", "type" => "select", "std" => "none", "options" => array( "none","capitalize", "uppercase", "lowercase",), ),
 array( "type" => "box-close"),
array( "type" => "an-ending"),
array( "type" => "z-xb"), array( "name" => "Loaded Widgets", "type" => "title"), array( "name" => "Meta", "type" => "subtitle"),
array( "type" => "deus", "name" => "In the sidebar there is an area for meta (log in, out etc) do you wish to show this on your site?",),
 array( "name" => "Display Meta in the sidebar? ", "id" => $shortname."_sidebar_meta", "type" => "select-four", "std" => "yes", "options" => array( "yes", "no"),),
array( "name" => "Show Sidebar Categories List?", "type" => "subtitle"),
array( "type" => "deus", "name" => "Sidebar list of categories, do you wish to display this?"),
 array( "name" => "Display the categories list in the sidebar? ", "id" => $shortname."_sidebar_catz", "type" => "select-four", "std" => "yes", "options" => array( "yes", "no"), ),
array( "name" => "Sidebar Links List", "type" => "subtitle"),
array( "type" => "deus", "name" => "Displays a list of your links in the sidebar.",),
 array( "name" => "Display links list in the sidebar? ", "id" => $shortname."_sidebar_links", "type" => "select-four", "std" => "yes", "options" => array( "yes", "no"), ),
array( "name" => "Featured Widget", "type" => "subtitle"),
array( "type" => "deus", "name" => "Featured Widget shows featured posts in the left hand footer widget area.",),
array( "name" => "Display the feature section? ", "id" => $shortname."_feature_value", "type" => "select-four", "std" => "yes", "options" => array( "yes", "no"), ),
array( "name" => "Title:", "id" => $shortname."_featured_title", "std" => "Featured Posts", "type" => "text-wide"),
array( "name" => "Category Number", "id" => $shortname."_featured_cat", "std" => "0", "type" => "text-wide"),
array( "name" => "Amount of posts", "id" => $shortname."_featured_number", "std" => "3", "type" => "text-wide"),
array( "type" => "deus", "name" => "The value for the custom field image is <cite> feature image</cite><br> To learn more about how to use these custom field images in the Featured Widget please see <a target=\"_blank\" href=\"http://factory42.co.uk/how-to-feature-widget-area\">this tutorial</a> which covers everything you need to know about this widget.
",), array( "type" => "left-empty"), array( "name" => "Image Height", "id" => $shortname."_foot_img_height", "std" => "60", "type" => "text-wide"),
array( "name" => "Image Width", "id" => $shortname."_foot_img_width", "std" => "300", "type" => "text-wide"), array( "type" => "box-close"),
array( "name" => "Comment Widget", "type" => "subtitle"),
array( "type" => "deus", "name" => "Details about the recent comments Widget. Avatar options and values are the same as those you selected in the comments tab",),
array( "name" => "Display the recent comments section? ", "id" => $shortname."_com_value", "type" => "select-four", "std" => "yes", "options" => array( "yes", "no"), ),
array( "name" => "Main Title for Comment Widget:", "id" => $shortname."_com_title", "std" => "Recent Comments", "type" => "text-wide"),
array( "name" => "How many comments to show:", "id" => $shortname."_com_number", "std" => "3", "type" => "text-wide"),
array( "name" => "Amount of characters per comment:", "id" => $shortname."_com_siz", "std" => "250", "type" => "text-wide"),
array( "name" => "About Widget", "type" => "subtitle"),
array( "type" => "deus", "name" => "In the right hand footer widget area there is an about section, which can be used for anything you like.",),
array( "name" => "Display the about section? ", "id" => $shortname."_about", "type" => "select-four", "std" => "yes", "options" => array( "yes", "no"), ),
array( "desc" => "Enter your text for the title of the about section.", "id" => $shortname."_about_title", "std" => "About section of text", "type" => "advert"),
array( "desc" => "Enter the text for the about section (HTML is ok)", "id" => $shortname."_about_body", "std" => "
This is some text that you can change through the admin panel, this can be anything you wish, from details about the site to some of your favorite quotes about life. Its HTML ready as well, so you can add tags and even as we have here.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum commodo lacinia. Maecenas venenatis rutrum libero, ut vehicula quam ornare in. In ut ornare orci. Suspendisse faucibus fringilla dolor, non volutpat ligula dignissim sit amet. Nam lacinia est sit amet mi bibendum mollis. Vestibulum dictum feugiat semper. Integer sapien dui, ullamcorper a rutrum ut, consequat sit amet felis. Sed a semper dui. Sed dapibus, nisl eu posuere condimentum, elit massa ornare tortor, id auctor risus est eget metus. Sed gravida nibh in diam venenatis porttitor.
", "type" => "advert"),
array( "type" => "an-ending"),
array( "type" => "z-x"), array( "name" => "Reset", "type" => "title"), array("type" => "reset-reset"), array( "type" => "an-ending"),
array( "type" => "space-space"),
); ?>