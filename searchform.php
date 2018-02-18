<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<ul class="nav navbar-nav ul-search">
    <li class="mobile-search">
        <form class="navbar-left nav-search nav-search-form"
              action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get">
            <div class="form-inline">
                <input name="post_type" value="post" type="hidden">
                <div class="input-group">
                    <input type="search" required="required"
                           class="search-field form-control"
                           value="" name="s" title="<?php _e( 'Search for:', 'attire' ); ?>"/>

                    <span class="input-group-addon" id="mobile-search-icon">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </form>
    </li>
    <li class="dropdown nav-item desktop-search">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-search"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right list-search">
            <li class="dropdown-item">
                <form class="navbar-left nav-search search-form"
                      action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get">
                    <div class="form-inline">
                        <input name="post_type" value="post"
                               type="hidden">
                        <input type="search" class="search-field form-control"
                               value="" name="s"
                               title="<?php _e( 'Search for:', 'attire' ); ?>"/>
                    </div>
                </form>
            </li>
        </ul>
    </li>
</ul>

<form class="widget-search-form"
      action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get">

    <input name="post_type" value="post"
           type="hidden">
    <input type="search" class="search-field form-control"
           value="" name="s" placeholder="<?php _e( 'Search for...', 'attire' ); ?>"/>

</form>

