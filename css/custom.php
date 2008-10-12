<?php
header("Content-type: text/css"); 
require_once('../../../../wp-config.php');

if (!$customOptions) $customOptions = get_option('Adept_customOptions');  //Load Variables: on/off
$bkgColor = "#".trim(get_option('Adept_bkgColor'));
$hoverColor = "#".trim(get_option('Adept_hoverColor')); 
$sidebarOneTop = "#".trim(get_option('Adept_sidebarOneTop')); 
$sidebarOneLower = "#".trim(get_option('Adept_sidebarOneLower')); 
$sidebarTwo = "#".trim(get_option('Adept_sidebarTwo'));

if ($customOptions == 'on') {
?>/* --------------------------------------------------------------
Adept Custom Overrides
-------------------------------------------------------------- */
body{background-color:<?php echo $bkgColor; ?>;}
h1{color:<?php echo $sidebarOneTop; ?>;}
a:focus,
a:hover{color:<?php echo $hoverColor; ?>;}
a{color:<?php echo $sidebarOneTop; ?>;}
th{font-weight:bold;background:<?php echo $sidebarOneTop; ?>;}

#wrapper{background-color:white;}
#contentArea{
	background-color:transparent;
	/*background-image:url('../img/grayoilpaint.gif');*/
	background-repeat:repeat;
	border-left:1px #999 solid;
	border-right:1px #999 solid;
}
#header{background-color:white;}

#search #s{background-color:#ccc;color:#fff;}
#search #searchsubmit{background-color:<?php echo $sidebarTwo; ?>;}
input#searchsubmit:hover{background-color:<?php echo $hoverColor; ?>;}
#topBar{background-color:black;}
#navArea #pageTitle{color:#666;}
#navArea #pageTitle a{color:#666;}
#navArea #pageTitle a:hover{color:<?php echo $hoverColor; ?>;}
#topNav .tabs a{color:white;}
#topNav .tabs .page_item{
	background-color:<?php echo $sidebarOneTop; ?>; 
	/*background-image:url('../img/blkgrad-blu.jpg');*/
}
#topNav .tabs .page_item a:hover{background-color:white;color:<?php echo $hoverColor; ?>;}
#topNav .tabs .current_page_item a{color:<?php echo $hoverColor; ?>;}

#leftCol div.menu{background-color:<?php echo $sidebarOneTop; ?>;}
#leftCol div.menu + div.menu{background-color:<?php echo $sidebarOneLower; ?>;}
#rightCol div.menu{background-color:<?php echo $sidebarTwo; ?>;}

div.menu h3 span.unibullet{background-color:#333;color:white;}
div.menu h3{color:white;}

div.menu ul li a{color:black;}
div.menu ul li a:hover,
div.menu ul li > a:hover{color:<?php echo $hoverColor; ?>;background-color:white;}
#doubleCol{color:white;background-color:#333;}
#doubleCol h3{color:white;}
#doubleCol h3 span.unibullet{background-color:#fff;color:#333;}
#doubleColInset a{color:#e1e1e1;}
#doubleColInset a:hover,
#doubleColInset a:focus{color:<?php echo $hoverColor; ?>;}

.articleInfo .unibullet{background-color:#333;color:white;}
#pageContent{background-color:white;/*float:right;*/}
#pageContent hr{border-top:1px solid #999;}
.more,.more a:link{color:<?php echo $hoverColor; ?>;}

#footer{background-color:#333;color:#a7a7a7;}
#footer p a{color:#a7a7a7;}
#footerExtended{background-color:black;color:#a7a7a7;}
#footerExtended h4{color:white;}
#footerExtended h4 span.unibullet{background-color:<?php echo $sidebarOneTop; ?>;color:#fff;}
#footerExtended a:hover,#footerExtended a:focus,
#footer a:hover,#footer a:focus{color:<?php echo $hoverColor; ?>;}
#footerCol-1 ul li a,#footerCol-2 ul li a,#footerCol-3 ul li a,#footerCol-4 ul li a{color:#a7a7a7;}


/* Wordpress specific Styles
-------------------------------------------------------------- */
#commentform label{color:<?php echo $sidebarOneTop; ?>;}
.commentlist li .avatar{border:1px solid <?php echo $innerColor; ?>;background:<?php echo $bkgColor; ?>;}
#wp-calendar caption{background-color:transparent;}
#wp-calendar th{color:#fff;background:#666;}
#wp-calendar a{color:#fff;}
.wp-pagenavi{color:<?php echo $hoverColor; ?>;}
.wp-pagenavi a,.wp-pagenavi .current_page_item{color:<?php echo $innerColor; ?>;}
.wp-pagenavi a:hover,.wp-pagenavi .current_page_item{color:<?php echo $hoverColor; ?>;}
.wp-caption{border:1px solid <?php echo $bkgColor; ?>;background-color:<?php echo $bkgColor; ?>;}

<?php } ?>

