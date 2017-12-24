
  <?php if ( is_active_sidebar( 'right-sidebar' ) ): ?>
    <div class="cell small-12 medium-11 large-4">
      <div id="sidebar" class="sidebar-inner" >
        <div  class="grid-x grid-margin-x ">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
