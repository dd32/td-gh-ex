jQuery(document).ready(function($){
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');//修复Opera滑动异常地，加过就不需要重复加了。
$('#oloUp').click(function(){//点击事件
		$body.animate({scrollTop:0},400);//400毫秒滑动到顶部
});
}); 
//下面部分放jQuery外围，几个数值不妨自行改变试试
function up(){
   $wd = $(window);
   $wd.scrollTop($wd.scrollTop() - 1);
   fq = setTimeout("up()", 50);
}

$(document).ready( function() {
	var h1 = $(".oloPosts").height();
	var h2 = $("#oloContainer #oloWidget").height();

	if(h2 < h1){
		$("#oloContainer #oloWidget").height(h1);
		}else {
		$(".oloPosts").height(h2);
		}
}); 