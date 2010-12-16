<?php header("Content-type: text/css"); ?>  
    
img {filter: expression(smtFixPNG(this));}
li.current_page_item a .item-left, li.current_page_item a .item-right, #content img, a.post-more, #content .wp-caption, #back-top-left, #back-top-right, #back-bottom-left, #back-bottom-right, #back-top, #back-bottom, #back-left, #back-right {font-size: 1px;background: none;}
 
#back-top-left, #back-top-right, #back-bottom-left, #back-bottom-right {behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/back-corners.png',sizingMethod='scale')");}
#back-top-left {clip:rect(auto 20px 20px auto);}
#back-top-right {left: expression(this.parentNode.offsetWidth-28+'px');clip:rect(auto auto 20px 20px);}
#back-bottom-left {top: expression(this.parentNode.offsetHeight-20+'px'); clip: rect(20px 20px auto auto);}
#back-bottom-right {top: expression(this.parentNode.offsetHeight-20+'px');left: expression(this.parentNode.offsetWidth-28+'px'); clip: rect(20px auto auto 20px);}
        
#back-left, #back-right {height: expression(this.parentNode.offsetHeight-0+'px');behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/back-left-right.png',sizingMethod='scale')");}    
#back-left {clip:rect(auto 12px auto auto);}
#back-right {clip: rect(auto auto auto 12px);}

#back-top, #back-bottom {width: expression(this.parentNode.offsetWidth-16+'px');behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/back-top-bottom.png',sizingMethod='scale')");}
#back-top {clip: rect(auto auto 20px auto);}
#back-bottom {top: expression(this.parentNode.offsetHeight-20+'px');clip: rect(20px auto auto auto);}

#content img, #content .wp-caption {behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/image-back.png',sizingMethod='scale')");}

a.post-more {behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/read-more.png',sizingMethod='scale')");}

li.current_page_item a .item-left {top: expression(this.parentNode.offsetHeight-41+'px'); height: expression(this.parentNode.offsetHeight-13+'px'); behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/item-left.png',sizingMethod='scale')");}

li.current_page_item a .item-right {top: expression(this.parentNode.offsetHeight-41+'px'); height: expression(this.parentNode.offsetHeight-13+'px'); behavior: expression(this.runtimeStyle.filter?'':this.runtimeStyle.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + smtGetStyleUrl()+"images/item-right.png',sizingMethod='scale')");}

#access a {font-size:15px;}

#slide_holder img {width:expression(document.body.clientWidth < 742? '100px' : document.body.clientWidth > 1000? '100px' : 'auto');}

a.follow-replies {top:-4px;}

a.home span.icon {background-position:0 0px;}

.comments-link a {top:-31px;}

.commentlist .avatar {left:-65px;}

.widget-title {left:-16px;width: 286px;}

























               