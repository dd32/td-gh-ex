<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] =
get_settings( $value['id'] ); } } ?> <?php $themename = "42k"; $shortname = "bxx"; ?> <form method="post"> <?php foreach ($options as $value) { switch (
$value['type'] ) { case "z-a": ?><div id="z-a"class="backend-box" ><?php include (TEMPLATEPATH . '/scripts/gomez.php'); ?><?php break; case "z-b": ?><div
id="z-b"class="backend-box" ><?php break; case "space-space": ?><div class="space-boy-space" ></div><?php break; 
case "z-c": ?><div id="z-c"class="backend-box"><?php break; 
case "z-d": ?><div id="z-d"class="backend-box" ><?php break; 
case "z-e": ?> <div id="z-e"class="backend-box" > <?php break; 
case "z-f": ?> <div id="z-f"class="backend-box" ><?php break; 
case "z-g": ?><div id="z-g"class="backend-box" ><?php break; case "z-h": ?><div id="z-h"class="backend-box" ><?php break;
case "z-i": ?><div id="z-i"class="backend-box" ><?php break; case "z-j": ?><div id="z-j"class="backend-box" ><?php break; case "z-k": ?><div
id="z-k"class="backend-box" ><?php break; case "z-l": ?> <div id="z-l"class="backend-box" ><?php break; case "z-m": ?> <div id="z-m"class="backend-box" ><?php
break; case "z-n": ?><div id="z-n"class="backend-box" ><?php break; case "z-o": ?> <div id="z-o"class="backend-box" > <?php break; case "z-p": ?><div
id="z-p"class="backend-box" ><?php break; case "z-q": ?><div id="z-q"class="backend-box" ><?php include (TEMPLATEPATH . '/scripts/rescue-me.php'); ?><?php break;
case "z-r": ?><div id="z-r"class="backend-box" ><?php include (TEMPLATEPATH . '/scripts/psd.php'); ?><?php break; case "z-s": ?><div id="z-s"class="backend-box"
><?php break; case "z-t": ?><div id="z-t"class="backend-box" ><?php break; case "z-u": ?><div id="z-u"class="backend-box" ><?php break; case "z-v": ?><div
id="z-v"class="backend-box" ><?php break; case "z-w": ?><div id="z-w"class="backend-box" ><?php break; case "z-x": ?><div id="z-x"class="backend-box" ><?php break;
case "z-aa": ?><div id="z-aa"class="backend-box" ><?php break; case "z-xa": ?><div id="z-xa"class="backend-box" ><?php include (TEMPLATEPATH .
'/scripts/latest.php'); ?><?php break; case "z-xb": ?><div id="z-xb"class="backend-box" ><?php break; case "z-xc": ?><div id="z-xc"class="backend-box" ><?php break;
case "z-xx": ?><div id="z-xx"class="backend-box" ><?php include (TEMPLATEPATH . '/scripts/favicon.php'); ?><?php break; case "an-ending": ?><div style="width:100%;
height:25px; clear:both; background-color:#eee;"></div> <div class="slak"><div id="flogo-left"><a href="http://factory42.co.uk/42k-wordpress-theme/">42k
Theme</a></div><div id="flogo-right"> <a href="http://www.factory42.co.uk"><img border="0" src="<?php bloginfo('template_url');?>/images/factory42-logo.png"
width="20" height="33"></a></div></div></div><?php break; case "port": ?><div style="width:250px; float:left;"><h3 class="left-h"><?php echo $value['name'];
?></h3><?php break; case "box-close": ?></div><?php break; case "line-break": ?> <div style="width:100%; height:0px; clear:both;"></div><?php break; case
"left-title": ?><div style="width:299px; float:left;"><h3 class="left-h"><?php echo $value['name']; ?></h3><?php break; case "box-close": ?></div><?php break; case
"right-title": ?><div style="width:290px; padding-left:5px; float:right;"> <h3 class="left-h"><?php echo $value['name']; ?></h3> <?php break; case "right-half":
?><div class="right-better-half"><h3 class="left-h"><?php echo $value['name']; ?></h3><?php break; case "left-half": ?><div class="left-better-half"><h3
class="left-h"><?php echo $value['name']; ?></h3><?php break; case "right-empty": ?><div class="right-better-half"><?php break; case "left-empty": ?><div
class="left-better-half"> <?php break; case "full-empty": ?><div style="width:800px; padding-left:15px; padding-bottom:10px; float:left;"><?php break; case
"full-full": ?><div style="width:1000px; padding-left:15px; padding-bottom:5px; float:left;"><h3 class="left-h"><?php echo $value['name']; ?></h3> <?php break; case
"pad": ?><div style="width:700px; padding-left:15px; padding-bottom:10px; float:left;"> <?php break; case "right-line": ?> <div class="right-better-half"> <div
style="width:150px; float:left;"><p><?php echo $value['name']; ?></p></div> <?php break; case "left-line": ?><div class="left-better-half"><div style="width:150px;
float:left;"<p><?php echo $value['name']; ?></p></div><?php break; case "title": ?><div class="dinox"><input class="dino" name="save" type="submit" value="Save" /> <input type="hidden" name="action" value="save" /></div><div></div><div class="slak"><H3 class="slak-h3"><?php echo $value['name']; ?></H3></div><?php
break; case "subtitle":?><div class="subtone"><H4 class="subtone-h4"><?php echo $value['name']; ?></H4></div><?php break; case "text-four": ?><div
class="text-appolo"><h3 class="left-h"><?php echo $value['name']; ?></h3><?php break; case 'space-boy':?><div class="space-boy-space"></div><?php break; case
'text-small': ?><div style="width:100px; float:left;padding:2px; overflow:hidden;"> <span style="font-family:Arial, sans-serif; font-size:12px; color:#444;
display:block; padding:3px;"> <?php echo $value['name']; ?></span><input style="width:70px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"
type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo
stripslashes($value['std']); } ?>" /></div><?php break; case 'text-left':?><div style="width:100px; float:left; padding-left:15px; overflow:hidden;"> <span
style="font-family:Arial, sans-serif; font-size:12px; color:#444; display:block; padding-top:10px;"> <?php echo $value['name']; ?></span><input style="width:70px;
background-color:#eee; border:1px solid #98AFC7;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>"
/></div><?php break; case 'text-wide':?> <div style="width:150px; float:left;padding:5px; "><span style="font-family:Arial, sans-serif; font-size:12px; color:#444;
display:block; padding-top:5px;"> <?php echo $value['name']; ?></span><input style="width:120px;background-color:#eee; border:1px solid #98AFC7;" name="<?php echo
$value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo
stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" /></div> <?php break; case 'text-font-size': ?><div style="width:70px;
padding-top:10px; float:left; clear:none;"><span style="font-family:Arial, sans-serif; font-size:12px; color:#444; padding-top:0px;"><?php echo $value['name'];
?></span><input style="width:60px;background-color:#eee; border:1px solid #98AFC7;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php
echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo
stripslashes($value['std']); } ?>" /></div> <?php break; case 'text-mp':?><div style="width:50px; padding-top:10px; float:left; clear:none;"> <span
style="font-family:Arial, sans-serif; font-size:12px; color:#444; padding-top:5px;"> <?php echo $value['name']; ?></span><input
style="width:30px;background-color:#eee; border:1px solid #98AFC7;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo
$value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo
stripslashes($value['std']); } ?>" /></div> <?php break; case 'text-color-wide': ?><script type="text/javascript" src="<?php bloginfo("template_url");
?>/jscolor/jscolor.js"></script> <div style="width:130px; float:left; padding:5px;"><span style="font-family:Arial, sans-serif; font-size:12px; color:#444;
display:block; padding-top:5px;"> <?php echo $value['name']; ?></span><input class="color {required:false}" style="width:110px;background-color:#eee; border:1px
solid #98AFC7;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings(
$value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" /> <br/><span style="font-family:Arial,
sans-serif; font-size:12px; color:#444;"><?php echo $value['desc']; ?></span> </div> <?php break; case 'text-color': ?><script type="text/javascript" src="<?php
bloginfo("template_url"); ?>/jscolor/jscolor.js"></script> <div style="width:90px; float:left;padding:5px;"><span style="font-family:Arial, sans-serif;
font-size:12px; color:#444; display:block; padding-top:5px;"> <?php echo $value['name']; ?></span><input class="color {required:false}"
style="width:70px;background-color:#eee; border:1px solid #98AFC7;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo
$value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo
stripslashes($value['std']); } ?>" /><br/><span style="font-family:Arial, sans-serif; font-size:12px; color:#444; "><?php echo $value['desc']; ?></span></div> <?php
break; case 'somehelp': ?><div style="width:808px; clear:both;"> <span style="font-family:Arial, sans-serif; font-size:12px; color:#444; display:block;
padding:5px;"> <?php echo $value['name']; ?></span></div> <?php break; case 'semi-title': ?> <h3><?php echo $value['name']; ?></h3> <?php break; case 'dummy-space':
?> <div class="backend-clear"></div> <?php break; case 'office-space':?> <div style="height:30px; width:100%; clear:both;"></div> <?php break; case 'dummy-h1': ?>
<div id="dummy-box"><div id="dummy-con"> <p class="dummy-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et nibh ornare sapien dignissim
fringilla sit amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. </p> <h1 class="test-h1">This is a H1 Tag</h1><h1 class="test-h2">This is a H2
Tag</h1><h3 class="test-h3">This is a H3 Tag</h3> <h4 class="test-h4">This is a H4 Tag</h4> <h5 class="test-h5">This is a H5 Tag</h5> <h6 class="test-h6">This is a
H6 Tag</h6> <p class="dummy-p">Sed rutrum ultrices lectus ac dignissim. Duis et dui ut dui consectetur bibendum ut vel dui. Ut enim urna, semper nec ultricies nec,
faucibus eu lacus. Aliquam eu euismod est. Nunc faucibus fermentum turpis, a hendrerit nisi hendrerit scelerisque.</p></div></div> <?php break; case
'dummy-main-sidebar': ?> <div id="dummy-box"><div id="dummy-con"> <div id="dummy-left"> <h3 class="post-title"> <a href="http://www.wordpress.org">This is a Post
Title</a></h3> <div class="metabox"><p>Posted by <a class="puddle" href="http://www.wordpress.org">Author Link</a> | Filed under <a class="puddle"
href="http://www.wordpress.org">Category</a> | 12.01 | <a class="puddle" href="http://www.wordpress.org">Tag One,</a><a class="puddle"
href="http://www.wordpress.org">Tag Two.</a> <a class="puddle" href="http://www.wordpress.org">10 Comments</a></p> </div> <p class="dummy-p">This is some Dummy P
Text and <a class="puddle" href="http://www.wordpress.org/xxx">This is a link</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et nibh ornare
sapien dignissim fringilla sit amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. <br>Sed rutrum ultrices lectus ac dignissim. Duis et dui ut
dui consectetur bibendum ut vel dui. Ut enim urna, semper nec ultricies nec, faucibus eu lacus. Aliquam eu euismod est. Nunc faucibus fermentum turpis, a hendrerit
nisi hendrerit scelerisque.</p> </div> <div id="dummy-main-sidebar"><h3 class="jam">Sidebar Heading</h3><p class="birdy">This is some sidebar text. Lorem ipsum
dolor sit amet, consectetur adipiscing elit.</p> </div><div class="super-clear"> </div></div>&nbsp;</div> <?php break; case 'dummy-f1': ?><div class="footer-dummy">
<div class="dummy-left-foot"><h3 class="f1">Footer Heading</h3> <dl class="ffbox"><a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php
bloginfo('template_url'); ?>/images/place-holder.png" class="foot-latest" alt="Image" /></a><dt><a class="foot-link" href="http://www.wordpress.org">Link Title For
Post In Footer</a></dt></dl> <dl class="ffbox"><a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php bloginfo('template_url');
?>/images/place-holder.png" class="foot-latest" alt="Image" /></a> <dt><a class="foot-link" href="http://www.wordpress.org">Link Title For Post In
Footer</a></dt></dl> <dl class="ffbox"><a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php bloginfo('template_url'); ?>/images/place-holder.png"
class="foot-latest" alt="Image" /></a> <dt><a class="foot-link" href="http://www.wordpress.org">Link Title For Post In Footer</a></dt></dl> </div><div
class="dummy-right-foot"><h3 class="f1">Footer Text Heading</h3><p class="base-pp">This is some P text in the footer.Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Integer et nibh ornare sapien dignissim fringilla sit amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. Sed rutrum ultrices
lectus ac dignissim. Duis et dui ut dui consectetur bibendum ut vel dui. Ut enim urna, semper nec ultricies nec, faucibus eu lacus. Aliquam eu euismod est. Nunc
faucibus fermentum turpis, a hendrerit nisi hendrerit scelerisque.</p> </div><div class="super-clear"></div></div> <?php break; case 'dummy-tag-cloud': ?><div
class="footer-dummy"> <div id="dummy-tag-cloud"><div align="center"> <a class="tag-x" href="http://www.wordpress.org/extend">Tag One,</a><a class="tag-x"
href="http://www.wordpress.org">Tag Two,</a> <a class="tag-x" href="http://www.wordpress.org/extend/themes">Tag Three,</a> <a class="tag-x"
href="http://www.wordpress.org">Tag Four,</a><a class="tag-x" href="http://www.wordpress.org/extend/plugins">Tag Five,</a> <a class="tag-x"
href="http://www.wordpress.org">Tag Six,</a><a class="tag-x" href="http://www.wordpress.org/extend">Tag Seven,</a> <a class="tag-x"
href="http://www.wordpress.org">Tag Eight,</a></div></div><div class="super-clear"></div></div> <?php break; case 'dummy-image': ?> <div id="dummy-box"><br
style="clear:both" />&nbsp; <div id="dummy-con"><img class="dummy-image" src="<?php bloginfo('template_url'); ?>/images/london.jpg" alt="London Dummy Image"
title="Dummy Image" /> <div class="wp-caption"><p>This is an image caption and its container box.</p></div> </div><br style="clear:both" />&nbsp;</div> <?php break;
case 'dummy-blockquote': ?> <div id="dummy-box"><br style="clear:both" />&nbsp; <div id="dummy-con"> <p class="dummy-p">Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Integer et nibh ornare sapien dignissim fringilla sit amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. </p> <blockquote
class="backend-block"> This is a block quote, so edit accordingly! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et nibh ornare sapien dignissim
fringilla sit amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. End of Block Quote!!! </blockquote><p class="dummy-p">Sed rutrum ultrices
lectus ac dignissim. Duis et dui ut dui consectetur bibendum ut vel dui. Ut enim urna, semper nec ultricies nec, faucibus eu lacus. Aliquam eu euismod est. Nunc
faucibus fermentum turpis, a hendrerit nisi hendrerit scelerisque.</p></div><br style="clear:both" />&nbsp;</div> <?php break; case 'dummy-table': ?><div
id="dummy-box"><br style="clear:both" />&nbsp; <div id="dummy-con"> <p class="dummy-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et nibh
ornare sapien dignissim fringilla sit amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. </p> <table class="back"><tr class="back-tr"><th
class="back-th">Month</th><th class="back-th">Savings</th></tr> <tr class="arse"><td class="back-td">row 1, cell 1</td><td class="back-td">row 1, cell 2</td>
</tr><tr class="arse"><td class="back-td">row 2, cell 1</td> <td class="back-td">row 2, cell 2</td></tr></table> <p class="dummy-p">Sed rutrum ultrices lectus ac
dignissim. Duis et dui ut dui consectetur bibendum ut vel dui. Ut enim urna, semper nec ultricies nec, faucibus eu lacus. Aliquam eu euismod est. Nunc faucibus
fermentum turpis, a hendrerit nisi hendrerit scelerisque.</p> </div><br style="clear:both" />&nbsp;</div> <?php break; case 'dummy-nav': ?> <div id="dummy-box"><div
class="head-dummy"><h1 id="logo-text"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?> Homepage"><?php bloginfo('name');
?></a></h1><h5 id="slogan"><?php bloginfo('description'); ?></h5> </div><div id="navbar"> <ul> <?php if (is_home()) { ?> <li class="current_page_item"><a
href="<?php echo get_settings('home'); ?>" title="Home">Home</a></li> <?php }else{ ?><li class="page_item"><a href="<?php echo get_settings('home'); ?>"
title="Home">Home</a></li> <?php } ?> <?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?> </ul><div class="clearbox"></div></div></div> <?php break;
case 'dummy-sticky': ?> <div id="dummy-box"><br style="clear:both" />&nbsp; <div id="dummy-con"><div class="sticky"> <h3 class="post-title"> <a
href="http://www.wordpress.org">This is a Sticky Post Title</a></h3> <div class="metabox"><p> Posted by <a class="puddle" href="http://www.wordpress.org">Author
Link</a> | Filed under <a class="puddle" href="http://www.wordpress.org">Category</a> | 12.01 | <a class="puddle" href="http://www.wordpress.org">Tag One,</a>, <a
class="puddle" href="http://www.wordpress.org">Tag Two</a>, | <a class="puddle" href="http://www.wordpress.org">10 Comments</a></p></div><p>This is some P text for
the sticky post, this is that is this is that is this.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et nibh ornare sapien dignissim fringilla sit
amet nec nisi. Sed orci arcu, faucibus et viverra at, pretium id urna. Sed rutrum ultrices lectus ac dignissim. Duis et dui ut dui consectetur bibendum ut vel dui.
Ut enim urna, semper nec ultricies nec, faucibus eu lacus. Aliquam eu euismod est. Nunc faucibus fermentum turpis, a hendrerit nisi hendrerit scelerisque.</p>
</div>&nbsp; </div>&nbsp; </div> <?php break;

case 'dummy-list': ?> <div id="dummy-box"><br style="clear:both" />&nbsp; <div id="dummy-con"> <div id="one-list" style="width:180px;margin:10px; float:left;
clear:none;"> <h5>Unordered List</h5><ul><li>Coffee</li><li>Milk</li><li>Tea</li><li>Beer</li><li>Lion</li></ul></div> <div id="two-list" style="width:180px;
margin:10px; float:left; clear:none;"><h5>Ordered List</h5> <ol><li>One</li><li>Two</li><li>Three</li><li>Four</li> <li>Five</li></ol></div> <div id="three-list"
style="width:180px; float:right; margin:10px 30px 10px 30px; clear:right;"> <h5>Widget Area Unordered List</h5><ul>
<li>Coffee</li><li>Milk</li><li>Tea</li><li>Beer</li><li>Lion</li></ul></div> <div id="four-list" style="width:180px; margin: 10px 30px 10px 30px; float:right;
clear:both;"> <h5>Widget Area Ordered List</h5><ol><li>One</li><li>Two</li><li>Three</li><li>Four</li><li>Five</li></ol></div> <br style="clear:both" />&nbsp;
</div><br style="clear:both" />&nbsp;</div> <?php break; case 'dummy-comments': ?> <div id="dummy-box"><br style="clear:both" />&nbsp; <div id="dummy-con"><div
id="thread-odd" ><div class="comment-pic"> <?php echo get_avatar($comment,$default='<path_to_url>' ); ?></div> <h4 class="author-name"> Odd Comment Author
says:</h4><div class="comment-meta commentmetadata"><p>12.42 Tue Sept 20 2009</p></div><p>This is an odd numbered comment here. Lorem ipsum dolor sit amet,
consectetur adipiscing elit.</p> <div class="reply-odd">Reply</div></div> <div id="thread-even" ><div class="comment-pic"> <?php echo
get_avatar($comment,$default='<path_to_url>' ); ?></div> <h4 class="author-name"> Even Comment Author says:</h4><div class="comment-meta commentmetadata"><p>12.42
Tue Sept 20 2009</p></div><p>This is an even comment. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><div class="reply-even">Reply</div></div><div
id="thread-author" > <div class="comment-pic"><?php echo get_avatar($comment,$default='<path_to_url>' ); ?> </div> <h4 class="author-name"> Author Comment Author
says:</h4><div class="comment-meta commentmetadata"><p>12.42 Tue Sept 20 2009</p></div><p>This is an author comment. Lorem ipsum dolor sit amet, consectetur
adipiscing elit.</p> <div class="reply-author">Reply</div></div></div></div> <?php break;

case 'text-half': ?> <?php echo $value['name']; ?><input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo
$value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo
stripslashes($value['std']); } ?>" /><br/><?php echo $value['desc']; ?> <?php break;

case 'quart': ?> <?php echo $value['name']; ?><input style="width:100px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo
$value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo
stripslashes($value['std']); } ?>" /><br/> <?php echo $value['desc']; ?>

<?php break;

case 'somehelp': ?> <div style="width:808px; overflow:hidden; clear:both;"><span style=" width:700px; font-family:Verdana, sans-serif; font-size:12px; color:#333;
display:block; "> <?php echo $value['name']; ?> </span></div> <?php break;

case 'advice': ?> <div style="width:650px; margin-left:30px; 0px; overflow:hidden; clear:both;"><span style="font-family:Arial, sans-serif; font-size:12px;
color:#444; display:block;"><?php echo $value['name']; ?></span></div> <?php break;

case 'html': ?> <div style="width:650px; margin-left:30px; 0px; overflow:hidden; clear:both;"><script type="text/javascript" src="<?php bloginfo("template_url");
?>/style.css"></script><span style="font-family:Arial, sans-serif; font-size:12px; color:#444; display:block; "><?php echo $value['name']; ?></span> </div> <?php
break;

case 'tin-tin': ?> <div style="padding-left:10px;"> <?php break;

case 'deus': ?> <div style="padding:10px; clear:both;"><?php echo $value['name']; ?></div> <?php break;

case 'advert': ?> <div style="padding:20px;"><span style="font-family:Arial, sans-serif; font-size:12px; color:#444; display:block; padding:5px;"> <?php echo
$value['name']; ?></span> <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="background-color:#eee; border:1px solid #98AFC7;"
cols="100" rows="3"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); }
?></textarea><span style="font-family:Arial, sans-serif; font-size:12px; color:#444; display:block;"> <?php echo $value['desc']; ?></span> </div> <?php break;
case 'sugercube': ?> <div style=" width:100%; clear:both;">
<img class="profile-left" src="<?php bloginfo("template_url");?>/bricks/homepage-images/42k-layout-normal.png" />
<img class="profile-right" src="<?php bloginfo("template_url");?>/bricks/homepage-images/42k-layout-mulletrightcontent.png" />
<img class="profile-left" src="<?php bloginfo("template_url");?>/bricks/homepage-images/42k-layout-mullet.png" />
<img class="profile-right" src="<?php bloginfo("template_url");?>/bricks/homepage-images/42l-layout-normal-right-content.png" />
</div> <?php break;




case 'select-super': ?> <div style="width:760px; float:left; padding-top:5px; overflow:hidden;"> <span style="font-family:Arial, sans-serif; font-size:12px;
color:#444; display:block; padding:5px;"> <?php echo $value['name']; ?></span><select style="width:700px;" name="<?php echo $value['id']; ?>" id="<?php echo
$value['id']; ?>"> <?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }
elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <br/></div> <?php break;
case 'select': ?> <div style="width:110px; padding:5px; float:left; overflow:hidden;"> <span style="font-family:Arial, sans-serif; font-size:12px; color:#444;
display:block; padding-top:5px;"> <?php echo $value['name']; ?></span><select style="width:105px; background-color:#eee; border:1px solid #98AFC7;" name="<?php echo
$value['id']; ?>" id="<?php echo $value['id']; ?>"> <?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) {
echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <br/></div>
<?php break;

case 'select-wide': ?> <div style="width:160px; float:left; padding-top:5px; overflow:hidden;"> <span style="font-family:Arial, sans-serif; font-size:12px;
color:#444; display:block; padding:5px;"> <?php echo $value['name']; ?></span><select style="width:150px;" name="<?php echo $value['id']; ?>" id="<?php echo
$value['id']; ?>"> <?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }
elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <br/></div> <?php break;

case 'select-four': ?> <div style="width:260px; float:left; padding:15px; overflow:hidden;"> <span style="font-family:Arial, sans-serif; font-size:12px; color:#444;
display:block; padding:5px;"> <?php echo $value['name']; ?></span><select style="width:150px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option ==
$value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <br/></div> <?php break;

case 'reset-reset': ?> <div style="display:none"><p class="submit"><input name="save" type="submit" value="Save changes" /><input type="hidden" name="action"
value="save" /></p></div></form><p class="tenip"><strong>DANGER WILL ROBINSON!</strong> This resets ALL the options, so please be warned before you click this!
There is <strong>NO</strong> undo and it does reset everything!</p> <div class="dinox-reset"><form method="post"><input class="dino" name="save" type="submit"
value="Reset" /> <input type="hidden" name="action" value="reset" /></form></span> <?php break;

case "submit": ?> <?php break; } } ?> </form>