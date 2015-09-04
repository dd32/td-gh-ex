jQuery(document).ready(function($){
setTimeout(function() {
    var $head = $("iframe").contents().find("head");                
    $head.append(
'<link href="http://fonts.googleapis.com/css?family=Lato:400,300,300italic,100italic,100,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">');
                         
}, 1); 
});