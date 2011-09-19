<div class="sidebar">

<?php if ( is_dynamic_sidebar('big1') || is_dynamic_sidebar('small-left1') || is_dynamic_sidebar('small-right1') || 
  is_dynamic_sidebar('big2') || is_dynamic_sidebar('small-left2') || is_dynamic_sidebar('small-right2')) : ?>

<div class="sidebar-big">
<?php dynamic_sidebar('big1'); ?>
</div>

<div class="sidebar-2column1">
<?php dynamic_sidebar('small-left1'); ?>
</div>

<div class="sidebar-2column2">
<?php dynamic_sidebar('small-right1'); ?>
</div>

<div class="sidebar-big">
<?php dynamic_sidebar('big2'); ?>
</div>

<div class="sidebar-2column1">
<?php dynamic_sidebar('small-left2'); ?>
</div>

<div class="sidebar-2column2">
<?php dynamic_sidebar('small-right2'); ?>
</div>

<?php else: ?>

<div class="sidebar-big">
<?php the_widget('WP_Widget_Search'); ?> 
</div>

<div class="sidebar-2column1">
<?php the_widget('WP_Widget_Recent_Comments', 'title='.__('Comments', 'adsticle')); ?> 
</div>

<div class="sidebar-2column2">
<?php the_widget('WP_Widget_Recent_Posts', 'number=5&title='.__('Posts', 'adsticle')); ?> 
</div>

<div class="sidebar-big">
</div>

<div class="sidebar-2column1">
<?php the_widget('WP_Widget_Categories', 'title='.__('Categories', 'adsticle')); ?> 
</div>

<div class="sidebar-2column2">
<?php the_widget( 'WP_Widget_Tag_Cloud', 'title='.__('Tags', 'adsticle')); ?>  
</div>



<?php endif; ?>

</div>