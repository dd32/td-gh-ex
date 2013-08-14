
<script type="text/javascript">

jQuery(function($){

$.supersized({

autoplay				:	<?php echo of_get_option('autoplay', '0'); ?>,
random					:   <?php echo of_get_option('randomimgs', '0'); ?>,
slide_interval			:	<?php echo of_get_option('super_translideint', '3000'); ?>,
transition              :   <?php echo of_get_option('super_effects', '0'); ?>,
transition_speed		:	<?php echo of_get_option('super_transpeed', '3000'); ?>,
progress_bar			:   <?php echo of_get_option('progbar', '0'); ?>,
slides 					:  	[


<?php if ( of_get_option('radio_images') == "two") { ?>
{image : '<?php echo of_get_option('radio_image_one'); ?>', title : '<?php echo of_get_option('radio_image_one_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_two'); ?>', title : '<?php echo of_get_option('radio_image_two_credit'); ?>'}
<?php } ?>

<?php if ( of_get_option('radio_images') == "three") { ?>
{image : '<?php echo of_get_option('radio_image_one'); ?>', title : '<?php echo of_get_option('radio_image_one_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_two'); ?>', title : '<?php echo of_get_option('radio_image_two_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_three'); ?>', title : '<?php echo of_get_option('radio_image_three_credit'); ?>'}
<?php } ?>

<?php if ( of_get_option('radio_images') == "four") { ?>
{image : '<?php echo of_get_option('radio_image_one'); ?>', title : '<?php echo of_get_option('radio_image_one_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_two'); ?>', title : '<?php echo of_get_option('radio_image_two_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_three'); ?>', title : '<?php echo of_get_option('radio_image_three_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_four'); ?>', title : '<?php echo of_get_option('radio_image_four_credit'); ?>'}
<?php } ?>

<?php if ( of_get_option('radio_images') == "five") { ?>
{image : '<?php echo of_get_option('radio_image_one'); ?>', title : '<?php echo of_get_option('radio_image_one_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_two'); ?>', title : '<?php echo of_get_option('radio_image_two_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_three'); ?>', title : '<?php echo of_get_option('radio_image_three_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_four'); ?>', title : '<?php echo of_get_option('radio_image_four_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_five'); ?>', title : '<?php echo of_get_option('radio_image_five_credit'); ?>'}
<?php } ?>

<?php if ( of_get_option('radio_images') == "six") { ?>
{image : '<?php echo of_get_option('radio_image_one'); ?>', title : '<?php echo of_get_option('radio_image_one_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_two'); ?>', title : '<?php echo of_get_option('radio_image_two_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_three'); ?>', title : '<?php echo of_get_option('radio_image_three_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_four'); ?>', title : '<?php echo of_get_option('radio_image_four_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_five'); ?>', title : '<?php echo of_get_option('radio_image_five_credit'); ?>'},
{image : '<?php echo of_get_option('radio_image_six'); ?>', title : '<?php echo of_get_option('radio_image_six_credit'); ?>'}

<?php } ?>

],

});
});

</script>
