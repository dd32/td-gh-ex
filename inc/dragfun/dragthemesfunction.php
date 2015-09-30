<?php
/*---------------------------------------------------
Copyright DragThemes
----------------------------------------------------*/
/**
 * Catching First Image of Post
 */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){
  $first_img = $matches [1] [0];
  }
  return $first_img;
}

/**
 * Declare Variables
 */
$themename = "dasthemes";
$shortname = "dt";
 
$categories = get_categories('hide_empty=0&orderby=name');
$all_cats = array();
foreach ($categories as $category_item ) {
$all_cats[$category_item->cat_ID] = $category_item->cat_name;
}
array_unshift($all_cats, "Select a category");
/**
 * register settings
 */
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
}
/**
 * add settings page to menu
 */
function add_theme_panel() {
add_theme_page( __( 'Theme Panel' . 'howl-themes' ), __( 'Theme Panel' . '' ), 'manage_options', 'settings', 'theme_settings_page');
}
/**
 * add actions
 */
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_theme_panel' );
/**
 * Declare Option
 */
$theme_options = array (
 
array( "name" => $themename." Options",
"type" => "title"),

/**
 * Homepage Builder
 */
    array( "name" => "LabelSep",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "countlin",
    "desc" => "save li count",
    "id" => $shortname."_howlimany",
    "type" => "text",
    "std" => ""),

    array( "name" => "rembembertname",
    "desc" => "remember the name",
    "id" => $shortname."_rembertname",
    "type" => "text",
    "std" => ""),

    array( "name" => "remebertcat",
    "desc" => "remember the cat",
    "id" => $shortname."_rembertcat",
    "type" => "text",
    "std" => ""),

    array( "name" => "remembertli",
    "desc" => "remember the li",
    "id" => $shortname."_remembertli",
    "type" => "text",
    "std" => ""),

     array( "name" => "Upload Logo",
    "desc" => "Enter the link to your logo image",
    "id" => $shortname."_logo",
    "type" => "upload",
    "std" => ""),

    array( "name" => "Custom Favicon",
    "desc" => "A favicon is a 16x16 pixel icon that represents your site",
    "id" => $shortname."_favicon",
    "type" => "upload",
    "std" => home_url('url') ."/images/favicon.ico"),

    array( "name" => "Home Page Display",
    "id" => $shortname."_homedisplay",
    "type" => "text",
    "std" => ""),

    array( "name" => "Home Page Layout",
    "id" => $shortname."_homelayout",
    "type" => "text",
    "std" => ""),

    array( "type" => "close"),



    array( "name" => "Styling",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Background Color",
    "desc" => "Choose the color for your site background",
    "id" => $shortname."_backcolor",
    "type" => "color",
    "std" => ""),

     array( "name" => "Background Image",
    "desc" => "Change background image using upload button",
    "id" => $shortname."_backimg",
    "type" => "upload",
    "std" => ""),

    array( "name" => "Theme Primary Color",
    "desc" => "Change the Primary Color of your theme",
    "id" => $shortname."_themecolor",
    "type" => "color",
    "std" => ""),

    array( "name" => "Link Color",
    "desc" => "Choose the color for links",
    "id" => $shortname."_linkcolor",
    "type" => "color",
    "std" => ""),

    array( "name" => "Link Color:onHover",
    "desc" => "Which color you want link to show when users puts mouse on it",
    "id" => $shortname."_linkhovercolor",
    "type" => "color",
    "std" => ""),

    array( "type" => "close"),

    array( "name" => "Typography",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Fonts ID",
    "id" => $shortname."_fontid",
    "type" => "text",
    "std" => ""),

    array( "name" => "Fonts Name",
    "id" => $shortname."_fontname",
    "type" => "text",
    "std" => ""),

     array( "name" => "Post Font Color",
    "desc" => "Choose the color for Text which display inside container",
    "id" => $shortname."_bodycolor",
    "type" => "color",
    "std" => ""),

     array( "name" => "Post Font Size",
    "desc" => "To change font size, just edit the integer, eg: 20px",
    "id" => $shortname."_bfontsize",
    "type" => "text",
    "std" => "18px"),

    array( "type" => "close"),

    array( "name" => "Social",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Facebook",
    "desc" => "Enter Facebook Page URL",
    "id" => $shortname."_fbpageurl",
    "type" => "text",
    "std" => ""),

    array( "name" => "Twitter",
    "desc" => "Enter Twitter Page URL",
    "id" => $shortname."_twpageurl",
    "type" => "text",
    "std" => ""),

    array( "name" => "Google Plus",
    "desc" => "Enter Google+ Page URL",
    "id" => $shortname."_gopageurl",
    "type" => "text",
    "std" => ""),

    array( "name" => "Pinterest",
    "desc" => "Enter Pinterest Profile URL",
    "id" => $shortname."_pinteresturl",
    "type" => "text",
    "std" => ""),

    array( "name" => "Instagram",
    "desc" => "Enter Instagram Profile URL",
    "id" => $shortname."_instagramurl",
    "type" => "text",
    "std" => ""),

    array( "name" => "Linkedin",
    "desc" => "Enter Linkedin Profile URL",
    "id" => $shortname."_linkedinurl",
    "type" => "text",
    "std" => ""),

    array( "name" => "YouTube",
    "desc" => "Enter YouTube Channel URL",
    "id" => $shortname."_youtubeurl",
    "type" => "text",
    "std" => ""),

    array( "name" => "RSS",
    "desc" => "Enter Feedburner URL of your blog",
    "id" => $shortname."_rssurl",
    "type" => "text",
    "std" => ""),

    array( "type" => "close"),

    array( "name" => "Advertisment",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "720X90 Ads Code (Below Header)",
    "desc" => "You can add custom ads code or adsense ads code, it will display below header. I will suggest you to use responsive adsense ads code.",
    "id" => $shortname."_custom_ads_header",
    "type" => "textarea",
    "std" => ""),  

    array( "name" => "Ads Code (Above Comment)",
    "desc" => "This ad will only display in post page above comment form, You can add custom ads code or adsense ads code. I will suggest you to use responsive adsense ads code.",
    "id" => $shortname."_custom_ads_abovecmt",
    "type" => "textarea",
    "std" => ""),  

     array( "name" => "Ads Code (Below Post Title)",
    "desc" => "This ad will only display in post page, You can add custom ads code or adsense ads code. I will suggest you to use responsive adsense ads code.",
    "id" => $shortname."_custom_ads_post",
    "type" => "textarea",
    "std" => ""),  

    array( "type" => "close"),

    
 

    array( "name" => "fordev",
    "type" => "section"),
    array( "type" => "open"),

    array( "name" => "Custom Css Code",
    "desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of.",
    "id" => $shortname."_custom_css",
    "type" => "textarea",
    "std" => ""),  

    array( "name" => "Head Code",
    "desc" => "Just paste below any script or css stylesheet you want to add to your site",
    "id" => $shortname."_custom_head",
    "type" => "textarea",
    "std" => ""),  

    array( "name" => "Footer Code",
    "desc" => "Anything pasted in below textbox will be added in theme footer, use it if you know what you are doing. Else any wrong code can give hacker chance to hack your blog.",
    "id" => $shortname."_custom_foot",
    "type" => "textarea",
    "std" => ""),  

    array( "type" => "close"),

);
/**
 * Theme Panel Output
 */
function theme_settings_page() {
  global $themename,$theme_options;
  $i=0;
  $message='';
  if ( 'save' == isset($_REQUEST['action']) ) {
    
    foreach ($theme_options as $value) {
      if(isset($value['id'])){
      update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
    }
    }
    
    foreach ($theme_options as $value) {
      if(isset($value['id'])){
      if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
    $message='saved';
     }
  }

  else if( 'reset' == isset($_REQUEST['action'] )) {
      
    foreach ($theme_options as $value) {
      delete_option( $value['id'] ); }
    $message='reset';     
  }

 ?>
 <div class="wrap options_wrap">
<div class="builderlogo"><center><img src="<?php echo get_template_directory_uri() ?>/img/howlthemestextogo.png"></center></div>
<ul id="menu">
    <li class="homeselect"><i class="fa fa-home"></i><div class="menutext">Home</div></li>     
    <li class="styleselect"><i class="fa fa-paint-brush"></i> <div class="menutext">Styling</div></li>                 
    <li class="typoselect"><i class="fa fa-font"></i><div class="menutext">Typography</div></li>                 
    <li class="socialselect"><i class="fa fa-facebook"></i> <div class="menutext">Social</div></li>                 
    <li class="adsselect"><i class="fa fa-usd"></i> <div class="menutext">Advertisment</div></li>                 
    <li class="advselect"><i class="fa fa-code"></i><div class="menutext">Advanced</div></li>                 
</ul>
 <?php
    if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated">
    <p>'.$themename.' settings saved.</strong></p></div>';
    if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated">
    <p>'.$themename.' settings reset.</strong></p></div>';
    ?>
<div class="content_options">
      <form method="post">

 <?php foreach ($theme_options as $value) {
      
        switch ( $value['type'] ) {
        
          case "open": ?>
          <?php break;
          
          case "close": ?>
          <?php break;
          
          case "title": ?>
         
          <?php break;
          
          case 'text': ?>
          <div class="option_input option_text" id="<?php echo $value['id']; ?>idhe">
          <div class="<?php echo $value['id']; ?> titleofdiv">
          <?php echo $value['name']; ?> 
          <span class="questionhlder" title="<?php echo $value['desc']; ?>"><i class="fa fa-question-circle"></i></span>
</div>
          <input id="<?php echo $value['id']; ?>ok" class="adinp" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
          <div class="clearfix"></div>
          </div>

           <?php break;
          
          case 'upload': ?>
          <div class="option_input option_upload" id="<?php echo $value['id']; ?>idhe">
          <div class="<?php echo $value['id']; ?> titleofdiv">
          <?php echo $value['name']; ?><span class="questionhlder" title="<?php echo $value['desc']; ?>"><i class="fa fa-question-circle"></i></span></div>
           <input id="<?php echo $value['id']; ?>ok" class="adinp" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
          <input id="<?php echo $value['id']; ?>upload_image_button" class="createbuilder" type="button" value="Upload Image" />
          <div class="clearfix"></div>
          </div>

          <?php break;
          
          case 'color': ?>

           <div class="option_input option_text" id="<?php echo $value['id']; ?>idhe">
          <div class="<?php echo $value['id']; ?> titleofdiv">
          <?php echo $value['name']; ?> 
          <span class="questionhlder" title="<?php echo $value['desc']; ?>"><i class="fa fa-question-circle"></i></span>
          </div>
          <input class="colorbox" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
          <div class="clearfix"></div>
          </div>

          <?php break;
          
          case 'textarea': ?>
          <div class="option_input option_textarea" id="<?php echo $value['id']; ?>idhe">
          <div class="<?php echo $value['id']; ?> titleofdiv">
          <?php echo $value['name']; ?> 
          <span class="questionhlder" title="<?php echo $value['desc']; ?>"><i class="fa fa-question-circle"></i></span>
          </div>
          <textarea id="<?php echo $value['id']; ?>ok" class="adinp" name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
          <div class="clearfix"></div>
          </div>
          <?php break;
          
          case 'select': ?>
          <div class="option_input option_select" id="<?php echo $value['id']; ?>idhe">
          <div class="<?php echo $value['id']; ?> titleofdiv">
          <?php echo $value['name']; ?> 
          <span class="questionhlder" title="<?php echo $value['desc']; ?>"><i class="fa fa-question-circle"></i></span>
          </div>          
          <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          <?php foreach ($value['options'] as $option) { ?>
              <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
          <?php } ?>
          </select>
          <div class="clearfix"></div>
          </div>
          <?php break;
          
          case "checkbox": ?>
          <div class="option_input option_checkbox">
          <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
          <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
          <input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
          <small><?php echo $value['desc']; ?></small>
          <div class="clearfix"></div>
          </div>
        
          <div class="input_section">
               <?php break;
          
          case "section":
          $i++; ?>
          <div class="input_title">
            
            <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-drag wowbutton<?php echo $i; ?>" value="Save changes" /></span>
            <div class="clearfix"></div>
          </div>
          <?php break;
           
        }
      }?>

<script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/jquery.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/jquery-ui.js"></script>
<link href="<?php echo esc_url( get_template_directory_uri() ) ?>/css/fontawesome.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ) ?>/css/dragfunpanel.css" />
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/dragfun.js"></script>




<?php $awesom = get_option('dt_rembertname') ; $awesome = get_option('dt_rembertcat') ;?>
<script>
$(document).ready(function(){
 $( "#sortable" ).sortable();
 $(".createbuilder").click(function(){
$('.createbuilder').text('SAVED');
$('.createbuilder').css("background", "#ccc");
$('.createbuilder').css("color", "#666");
$('.createbuilder').css("cursor", "default");
  var num =0;
  var lival = {};
  var lival2 = {};
    var lival3 = {};
  $(".selctcat").each(function(){
  lival[num] = $(this).attr('id');
        lival2[num] = $(this).find(".idcatcon option:selected").text();
      num++;
  });
  var livalkival = 1;
  for(var ghantacount =num-1;ghantacount>=0;ghantacount--){
    var livalkival = lival[ghantacount] + livalkival;
  }
  var livalkival2 = 'uncategorized';
  for(var ghantacount =num-1;ghantacount>=0;ghantacount--){
    var livalkival2 = lival2[ghantacount] +", "+ livalkival2;
  }
    /*
    1. Crousel
    2. Slider
    3. Posts Grid
    4. Random
    */
    $("#dt_howlimanyok").val(livalkival);
    $("#dt_rembertnameok").val(livalkival);
    $("#dt_rembertcatok").val(livalkival2);
    $("#dt_remembertliok").val(num);
      });
 var num2 =0;
$(".selctcat").each(function(){

  num2++;
  });
 var aaaa =  "<?php echo $awesom; ?>";
 var aaaaa =  "<?php echo $awesome; ?>";
    if(aaaa && aaaaa){
       var number = {};
       for (var i = 1;i<=num2;i++) {
        number[i] = aaaa.substring(i-1, i);
       }
    /*   number[1] = aaaa.substring(0, 1);
       number[2] = aaaa.substring(1, 2);
       number[3] = aaaa.substring(2, 3);
       number[4] = aaaa.substring(3, 4);
      */
       var catasep = "<?php echo $awesome ?>".split(", ");
           gandunum=0;

            somemaths =num2;
$(".selctcat").each(function(){
    gandunum=gandunum+1;
    $(this).attr('id', number[gandunum]);
      });
$(".selctcat").each(function(){
var optionValue =  catasep[catasep.length - somemaths -1];
var finalseek= optionValue.toLowerCase().replace(/\s/g, '');
//alert(finalseek);
 $(this).find('.idcatcon').val(finalseek).find("option[value=" + finalseek +"]").attr('selected', true);
somemaths--;
      });
    }

$(".addnewligrid2").click(function(){
var ghantaaaa = $(".idcatcon").html();
$("#sortable").append('<li class="selctcat" id="4"><div class="titleofli blogptxt">Grid Post Style 2</div><i class="fa fa-align-justify"></i><select class="idcatcon newselect">'+ ghantaaaa +'</select></li>');
$(".newselect option").prop("selected", false);
    });
$(".addnewligrid1").click(function(){
var ghantaaaa = $(".idcatcon").html();
$("#sortable").append('<li class="selctcat" id="3"><div class="titleofli blogptxt">Grid Post Style 1</div><i class="fa fa-align-justify"></i><select class="idcatcon newselect">'+ ghantaaaa +'</select></li>');
$(".newselect option").prop("selected", false);
    });
$(".addnewliblog").click(function(){
var ghantaaaa = $(".idcatcon").html();
$("#sortable").append('<li class="selctcat" id="5"><div class="titleofli blogptxt">Blog Post Style</div><i class="fa fa-align-justify"></i><select class="idcatcon newselect">'+ ghantaaaa +'</select></li>');
$(".newselect option").prop("selected", false);
    });

jQuery('#dt_logoupload_image_button').click(function() {
 formfield = jQuery('#dt_logook').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#dt_logook').val(imgurl);
 tb_remove();
}
});


jQuery('#dt_faviconupload_image_button').click(function() {
 formfield = jQuery('#dt_faviconok').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#dt_faviconok').val(imgurl);
 tb_remove();
}
});
 

jQuery('#dt_backimgupload_image_button').click(function() {
 formfield = jQuery('#dt_backimgok').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#dt_backimgok').val(imgurl);
 tb_remove();
}
});
 


$('.questionhlder').hover(function(){
        var title = $(this).attr('title');  //Getting Title Text
        $(this).data('tipText', title).removeAttr('title');
    $('<div class="tooltip"><p class="txttooltip">'+title+'</p>')
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
}).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex })
});

var getvalofradio = "<?php echo get_option('dt_homedisplay'); ?>";


$('#myFormradio input').on('change', function() {
   var getvalofradio = $('input[name=radioNameblog]:checked', '#myFormradio').val();
    $('#dt_homedisplayok').val(getvalofradio);
    if(getvalofradio == "blog"){document.getElementById("blogradio").checked = true; $('.home-builder').css('display', 'none');}
    else if(getvalofradio == "magazine"){document.getElementById("magradio").checked = true; $('.home-builder').css('display', 'block');}
});

if (getvalofradio == "") {
 document.getElementById("blogradio").checked = true; $('.home-builder').css('display', 'none');
}
else if(getvalofradio == "blog"){document.getElementById("blogradio").checked = true; $('.home-builder').css('display', 'none');}
else if(getvalofradio == "magazine"){document.getElementById("magradio").checked = true; $('.home-builder').css('display', 'block');}


var getvalofradio2 = "<?php echo get_option('dt_homelayout'); ?>";
$('#myFormradio2 input').on('change', function() {
   var getvalofradio2 =$('input[name=radioNameblog2]:checked', '#myFormradio2').val();
    $('#dt_homelayoutok').val(getvalofradio2);
});
if (getvalofradio2 == "") {
 document.getElementById("fullwidth").checked = true;
}
else if(getvalofradio2 == "fullwidth"){document.getElementById("fullwidth").checked = true;}
else if(getvalofradio2 == "boxedl"){document.getElementById("boxedl").checked = true;}



$('.colorbox').minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    change: function(hex, opacity) {
                        var log;
                        try {
                            log = hex ? hex : 'transparent';
                            if( opacity ) log += ', ' + opacity;
                            console.log(log);
                        } catch(e) {}
                    },
                    theme: 'default'
                });

function removeallelements(){
$("#dt_backcoloridhe, #dt_backimgidhe, #dt_themecoloridhe, #dt_linkcoloridhe, #dt_linkhovercoloridhe, .wowbutton2").css("display","none");
$("#dt_typographyidhe, #dt_bodycoloridhe, #dt_bfontsizeidhe, .optionchoosefont, #dt_fontididhe, #dt_fontnameidhe, .wowbutton3").css("display","none");
$("#dt_fbpageurlidhe, #dt_twpageurlidhe, #dt_gopageurlidhe, #dt_pinteresturlidhe, #dt_instagramurlidhe, #dt_linkedinurlidhe, #dt_youtubeurlidhe, #dt_rssurlidhe, .wowbutton4").css("display","none");
$("#dt_custom_ads_headeridhe, #dt_custom_ads_abovecmtidhe, #dt_custom_ads_postidhe, .wowbutton5").css("display","none");
$("#dt_custom_cssidhe, #dt_custom_headidhe, #dt_custom_footidhe, .wowbutton6").css("display","none");
$("#dt_logoidhe, #dt_faviconidhe, .homebuilderto, .wowbutton1").css("display","none");
}
removeallelements();
$("#dt_logoidhe, #dt_faviconidhe, .homebuilderto, .wowbutton1").css("display","block");
$(".homeselect").click(function(){
  removeallelements();
$("#dt_logoidhe, #dt_faviconidhe, .homebuilderto, .wowbutton1").css("display","block");
$("#menu li").css("background", "#2e86b9");
$(this).css("background", "#3dbaaa");
});
$(".styleselect").click(function(){
  removeallelements();
$("#dt_backcoloridhe, #dt_backimgidhe, #dt_themecoloridhe, #dt_linkcoloridhe, #dt_linkhovercoloridhe, .wowbutton2").css("display","block");
$("#menu li").css("background", "#2e86b9");
$(this).css("background", "#3dbaaa");
});
$(".typoselect").click(function(){
  removeallelements();
$("#dt_typographyidhe, #dt_bodycoloridhe, #dt_bfontsizeidhe, .optionchoosefont, .wowbutton3").css("display","block");
$("#menu li").css("background", "#2e86b9");
$(this).css("background", "#3dbaaa");
});
$(".socialselect").click(function(){
  removeallelements();
$("#dt_fbpageurlidhe, #dt_twpageurlidhe, #dt_gopageurlidhe, #dt_pinteresturlidhe, #dt_instagramurlidhe, #dt_linkedinurlidhe, #dt_youtubeurlidhe, #dt_rssurlidhe, .wowbutton4").css("display","block");
$("#menu li").css("background", "#2e86b9");
$(this).css("background", "#3dbaaa");
});
$(".adsselect").click(function(){
  removeallelements();
$("#dt_custom_ads_headeridhe, #dt_custom_ads_abovecmtidhe, #dt_custom_ads_postidhe, .wowbutton5").css("display","block");
$("#menu li").css("background", "#2e86b9");
$(this).css("background", "#3dbaaa");
});
$(".advselect").click(function(){
  removeallelements();
$("#dt_custom_cssidhe, #dt_custom_headidhe, #dt_custom_footidhe, .wowbutton6").css("display","block");
$("#menu li").css("background", "#2e86b9");
$(this).css("background", "#3dbaaa");
});
$('.googlefonts').change(function(){
var fontname = $('.googlefonts option:selected').text();
$('#dt_fontnameok').val(fontname);
var fontid = $('.googlefonts').val();
$('#dt_fontidok').val(fontid);
    });
$(".tooglelimaker").click(function(){
$('.addlistoogle').toggle();
});
});
</script>

 <input type="hidden" name="action" value="save" />
      </form>

      <div class="option_input optionchoosefont">
<div class="titleofdiv">Choose Font</div>
<select class="googlefonts">
  <option value="Playfair+Display">Playfair Display</option>
  <option value="Work+Sans">Work Sans</option>
  <option value="Alegreya">Alegreya</option>
  <option value="Alegreya+Sans">Alegreya Sans</option>
  <option value="Inconsolata">Inconsolata</option>
  <option value="Source+Sans+Pro">Source Sans Pro</option>
  <option value="Source+Serif+Pro">Source Serif Pro</option>
  <option value="Neuton">Neuton</option>
  <option value="Poppins">Poppins</option>
  <option value="Crimson+Text">Crimson Text</option>
  <option value="Archivo+Narrow">Archivo Narrow</option>
  <option value="Libre+Baskerville">Libre Baskerville</option>
  <option value="Roboto">Roboto</option>
  <option value="Karla">Karla</option>
  <option value="Lora">Lora</option>
  <option value="Chivo">Chivo</option>
  <option value="Domine">Domine</option>
  <option value="Old+Standard+TT">Old Standard TT</option>
  <option value="Varela+Round">Varela Round</option>
  <option value="Open+Sans">Open Sans</option>
  <option value="Raleway">Raleway</option>
  <option value="Josefin+Sans">Josefin Sans</option>
  <option value="Oswald">Oswald</option>
  <option value="PT+Sans">PT Sans</option>
  <option value="Merriweather">Merriweather</option>
  <option value="Lato">Lato</option>
  <option value="Ubuntu">Ubuntu</option>
  <option value="Bitter">Bitter</option>
  <option value="Cardo">Cardo</option>
  <option value="Arvo">Arvo</option>
  <option value="Montserrat">Montserrat</option>
  <option value="Rajdhani">Rajdhani</option>
  <option value="Droid+Sans">Droid Sans</option>
  <option value="PT+Serif">PT Serif</option>
  <option value="Dosis">Dosis</option>
</select>
</div>



      <div class="homebuilderto">

<div class="option_input optionhpl">
<div class="titleofdiv">Theme Layout</div>
<form id="myFormradio2">
<input type="radio" name="radioNameblog2" value="fullwidth" id="fullwidth" >    
<label for="fullwidth">Full Width</label>
<input type="radio" name="radioNameblog2" value="boxedl" id="boxedl">
<label for="boxedl">Boxed</label>   
</form>
</div>

<div class="option_input optionhpd">
<div class="dt_favicon titleofdiv">Home Page Display </div>
<form id="myFormradio">
<input type="radio" name="radioNameblog" value="blog" id="blogradio" >    
<label for="blogradio">Latest posts - Blog Layout</label>
<input type="radio" name="radioNameblog" value="magazine" id="magradio">
<label for="magradio">News Boxes - use Home Builder</label>   
</form>
</div>



<div class="home-builder"><p class="titleofhome">Home Builder</p>
<ul id="sortable">
  <?php 
  $howliprint = get_option('dt_remembertli') ; 
  if ($howliprint) {
     $howlimany = get_option('dt_howlimany');
for ($i=1;$i<=$howliprint;$i++) {
        $numberid[$i] = substr($howlimany,$i-1, 1);
       }
for($i=1;$i<=$howliprint;$i++){
  ?>
    <li class="selctcat" id="<?php echo $numberid[$i] ?>">
      <?php if($numberid[$i] == 1){echo '<div class="titleofli">Slider</div>'; } 
      elseif ($numberid[$i] == 2) {
        echo '<div class="titleofli carouseltxt">Carousel</div>';
      }
      elseif ($numberid[$i] == 3) {
        echo '<div class="titleofli">Grid Post Style 1</div>';
      }
      elseif ($numberid[$i] == 4) {
        echo '<div class="titleofli">Grid Post Style 2</div>';
      }
      elseif ($numberid[$i] == 5) {
        echo '<div class="titleofli">Blog Style Post Box</div>';
      }?>
      <i class="fa fa-align-justify"></i>
      <select class="idcatcon">
      <?php
     $categories = get_categories('hide_empty=0&orderby=name');
$all_cats = array();
foreach ($categories as $category_item ) {
$all_cats[$category_item->cat_ID] = $category_item->cat_name;
}
array_unshift($all_cats, "Select a category");
foreach ($all_cats as $categories) {
  echo '<option value="'. strtolower(str_replace(' ', '', $categories)) .'">'. $categories .'</option>';
}
?>
</select>
</li>
<?php } } else{

  for($i=1;$i<=5;$i++){
  ?>
    <li class="selctcat" id="<?php echo $i ?>">
 <?php if($i == 1){echo '<div class="titleofli">Slider</div>'; } 
      elseif ($i == 2) {
        echo '<div class="titleofli carouseltxt">Carousel</div>';
      }
      elseif ($i == 3) {
        echo '<div class="titleofli">Grid Post Style 1</div>';
      }
      elseif ($i == 4) {
        echo '<div class="titleofli">Grid Post Style 2</div>';
      }
      elseif ($i == 5) {
        echo '<div class="titleofli">Blog Style Post Box</div>';
      }?>
      <i class="fa fa-align-justify"></i>
      <select class="idcatcon">
      <?php
     $categories = get_categories('hide_empty=0&orderby=name');
$all_cats = array();
foreach ($categories as $category_item ) {
$all_cats[$category_item->cat_ID] = $category_item->cat_name;
}
array_unshift($all_cats, "Select a category");
foreach ($all_cats as $categories) {
  echo '<option value="'. strtolower(str_replace(' ', '', $categories)) .'">'. $categories .'</option>';
}
?>
</select>
</li>
<?php } }?>
   </ul>
  <div class="addlistoogle">
   <div class="addnewliblog"><i class="fa fa-plus-circle"></i> Blog Post Style</div>
   <div class="addnewligrid1"><i class="fa fa-plus-circle"></i> Grid Post Style 1</div>
   <div class="addnewligrid2"><i class="fa fa-plus-circle"></i> Grid Post Style 2</div>
</div>
<div class="tooglelimaker"><i class="fa fa-plus-circle"></i> Add</div>
   <div class="createbuilder">Save</div>
 </div>
</div>
      <form method="post">
        <p class="submit">
        <input name="reset" type="submit" value="RESET (Don't click it, you will lose all the edits you made.)" class="button-drag" />
        <input type="hidden" name="action" value="reset" />
        </p>
      </form>
</div>          </div>

<script>
$(h1).('background','red');
</script>
 <?php }
function howlfoot(){?>
<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
  <div class="container">
    <div class="three-column-footer">
        <?php dynamic_sidebar( 'footer-1' ); ?>

      </div>
      </div><!-- .site-info -->
  </footer><!-- #colophon -->
   <div class="copyright">
   <div class="container">
   <div class="copyright-text">
  Designed By <a href="http://www.howlthemes.com" target="blank" style="color:#efefef;text-decoration:none;">HowlThemes</a>
   </div>
   <div class="back-top">
   <a href="#" id="back-to-top" title="Back to top">Back To Top <i class="fa fa-arrow-circle-o-up"></i></a>
   </div>
   </div>
   </div>
</div><!-- #page -->
<?php }