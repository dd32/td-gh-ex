<footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <!--<img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">-->
            <?php __('Apelle uno', 'apelle-uno' );?>
            <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
            <?php the_tags();?>
          </div>
          <div id="container-apelleuno-footer-1" class="col-6 col-md">
           <?php if ( is_active_sidebar( 'apelleuno-footer-1' ) ) : ?>
       			<ul class="list-unstyled text-small">
                <?php dynamic_sidebar( 'apelleuno-footer-1' ); ?>
                </ul>
			<?php endif; ?>           
          </div>
          <div id="container-apelleuno-footer-2" class="col-6 col-md">
           <?php if ( is_active_sidebar( 'apelleuno-footer-2' ) ) : ?>
       			<ul class="list-unstyled text-small">
                <?php dynamic_sidebar( 'apelleuno-footer-2' ); ?>
                </ul>
			<?php endif; ?>           
          </div>
          <div id="container-apelleuno-footer-3" class="col-6 col-md">
           <?php if ( is_active_sidebar( 'apelleuno-footer-3' ) ) : ?>
       			<ul class="list-unstyled text-small">
                <?php dynamic_sidebar( 'apelleuno-footer-3' ); ?>
                </ul>
			<?php endif; ?>           
          </div>
        </div>
      </footer>