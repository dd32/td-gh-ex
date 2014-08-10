<?php

$styleSheets = array();

// DEFINE STYLESHEETS

$styleSheets[0]["text"]='<span class="white">Black text on white </span>';

$styleSheets[0]["title"]='Click here to set Style 0';
$styleSheets[0]["sheet"]='<link href="'. get_stylesheet_directory_uri() . '/style/white.css" rel="stylesheet" type="text/css" />';



$styleSheets[3]["text"]='<span class="whiteLarge">Black text(large) on white </span>';

$styleSheets[3]["title"]='Click here to set Style 3';

$styleSheets[3]["sheet"]='<link href="ent/wp-content/themes/badeyes/style/white_l.css" rel="stylesheet" type="text/css" />';

$styleSheets[1]["text"]='<span class="black">White text on black </span>';

$styleSheets[1]["title"]='Click here to set Style 1';

$styleSheets[1]["sheet"]='<link href="
'. get_stylesheet_directory_uri() . '/style/black.css" rel="stylesheet" type="text/css" />';

$styleSheets[2]["text"]='<span class="blackLarge">White text(large) on black </span>';

$styleSheets[2]["title"]='Click here to set Style 2';

$styleSheets[2]["sheet"]='<link href="/client/wp-content/themes/badeyes/style/black_l.css" rel="stylesheet" type="text/css" />';



$styleSheets[4]["text"]='<span class="dyslexic">Off white  for people with Dyslexia</span>';

$styleSheets[4]["title"]='Click here to set Style 4';

$styleSheets[4]["sheet"]='<link href="/client/wp-content/themes/badeyes/style/dyslexic.css" rel="stylesheet" type="text/css" />';





$styleSheets[5]["text"]='<span class="white">Single column black text on white </span>';

$styleSheets[5]["title"]='Click here to set Style 5';

$styleSheets[5]["sheet"]='<link href="/client/wp-content/themes/badeyes/style/zoom_w.css" rel="stylesheet" type="text/css" />';



$styleSheets[6]["text"]='<span class="blackZoom">Single column white text on black </span>';

$styleSheets[6]["title"]='Click here to set Style 6';

$styleSheets[6]["sheet"]='<link href="/client/wp-content/themes/badeyes/style/zoom_b.css" rel="stylesheet" type="text/css" />';



// DEFAULT STYLESHEET

$defaultStyleSheet=0;

// SET STYLESHEET

if(!isset($_COOKIE["STYLE"])){

if(isset($_SESSION["STYLE"])){

echo $styleSheets[$_SESSION["STYLE"]]["sheet"];

}else{

echo $styleSheets[$defaultStyleSheet]["sheet"];

}

}else{

echo $styleSheets[$_COOKIE["STYLE"]]["sheet"];

}

?>

