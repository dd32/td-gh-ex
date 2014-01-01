<?php get_header(); ?>
<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen:700' rel='stylesheet' type='text/css'>
<style>
#oloContent p {font-family: 'Press Start 2P', cursive;margin-left:auto;margin-top:40px;margin-right:auto;font-size:80px;text-align:center;  margin-bottom:0px; color:#4ec7ff;text-shadow: 0px 0px 1000px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);}
.flickering {animation: flickering 0.7s;-webkit-animation: flickering 0.88s;color:white;animation-iteration-count:infinite;}
.bigger{font-size:135px;}
@keyframes flickering{
0% {text-shadow: 0px 0px 15px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:white;}
10% {text-shadow: 0px 0px 0px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:black;}
20% {text-shadow: 0px 0px 8px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:#4ec7ff;}
30% {text-shadow: 0px 0px 10px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
40% {text-shadow: 0px 0px 0px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:black;}
50% {text-shadow: 0px 0px 10px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
52% {text-shadow: 0px 0px 20px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
55% {text-shadow: 0px 0px 5px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:#4ec7ff;}
60% {text-shadow: 0px 0px 5px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:white;}
75% {text-shadow: 0px 0px 0px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:black;}
85% {text-shadow: 0px 0px 5px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0); color:#4ec7ff;}
100% {text-shadow: 0px 0px 10px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
}
@-webkit-keyframes flickering
{
0% {text-shadow: 0px 0px 15px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
10% {text-shadow: 0px 0px 0px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:black;}
20% {text-shadow: 0px 0px 8px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:#4ec7ff;}
30% {text-shadow: 0px 0px 10px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
40% {text-shadow: 0px 0px 0px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:black;}
50% {text-shadow: 0px 0px 10px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
52% {text-shadow: 0px 0px 20px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
55% {text-shadow: 0px 0px 5px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:#4ec7ff;}
60% {text-shadow: 0px 0px 5px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
75% {text-shadow: 0px 0px 0px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:black;}
85% {text-shadow: 0px 0px 5px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:#4ec7ff;}
100% {text-shadow: 0px 0px 10px #38d1ff;filter: dropshadow(color=#38d1ff, offx=0, offy=0);color:white;}
}

#oloContent #info {margin-top:20px;color:white;font-size:12px;}
</style>
<div id="oloContainer">
	<div id="oloContent">
		<p><span class="bigger flickering">404</span><br/> ERROR</p>
		<p id="info">Move along, there's nothing to do here.</p>
	</div><!-- #oloContent-->
</div><!-- #oloContainer-->
<?php get_footer(); ?>