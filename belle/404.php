<?php/** * @package WordPress * @subpackage Belle */?>	<h2 class="center">Not Found</h2>	<div class="entry">		<p>You're looking for some blog info which just isn't here! You are lucky to use Belle theme wich provides you tools in the right sidebar for you to use in your search for what you need, or you can browse the most recent posts, listed below.</p>				<h4>Most Recent Posts:</h4>		<ul>	         <?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?>			</ul>	</div>