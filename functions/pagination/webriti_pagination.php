<?php 
class Webriti_pagination
{
function Webriti_page($curpage, $post_type_data)
{	?>
	<div class="blog-pagination">
	<?php $i=1; ?>
	<?php for($i=1;$i<=$post_type_data->max_num_pages;$i++) { ?>
		<a <?php if($i == $curpage ){ echo 'class="active"'; }?> href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a>
	<?php } ?>
	</div>
<?php } 
}
?>