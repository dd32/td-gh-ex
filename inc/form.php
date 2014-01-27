<?php
/* Copyright 2014 IBERMEGA digital (email : soporte@ibermega.com)

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
  
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Form
function shortcode_iberthemeform() {
  ob_start();
?>
  
<div class="alert alert-info"/>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="https://paneles.gestiondecuenta.com/comprobar-formulario/" method="POST" id="formGenGdc">

  <h3><?php _e( 'Contact Form', 'athenea' ); ?></h3>
  
  <div class="form-group">
    <label for="<?php _e( 'Name', 'athenea' ); ?>" class="col-lg-2 control-label">
      <?php _e( 'Name', 'athenea' ); ?> <span class="glyphicon glyphicon-user"></span> 
    </label>
    <div class="col-lg-10">
      <input name="<?php _e( 'Name', 'athenea' ); ?>" type="text" class="form-control" id="<?php _e( 'Name', 'athenea' ); ?>"
             placeholder="<?php _e( 'Full name', 'athenea' ); ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="<?php _e( 'E-Mail', 'athenea' ); ?>" class="col-lg-2 control-label">
      <?php _e( 'E-Mail', 'athenea' ); ?> <span class="glyphicon glyphicon-envelope"></span> 
    </label>
    <div class="col-lg-10">
      <input name="<?php _e( 'E-Mail', 'athenea' ); ?>" type="email" class="form-control" id="Email"
             placeholder="<?php _e( 'E-mail', 'athenea' ); ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="<?php _e( 'Subject', 'athenea' ); ?>" class="col-lg-2 control-label">
      <?php _e( 'Subject', 'athenea' ); ?> <span class="glyphicon glyphicon-info-sign"></span> </label>
    <div class="col-lg-10">
      <textarea name="<?php _e( 'Subject', 'athenea' ); ?>" class="form-control" rows="8" cols="25"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input name="<?php _e( 'Accept', 'athenea' ); ?>" checked type="checkbox"> <?php _e( 'Accept the Privacy Policy.', 'athenea' ); ?>
        </label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary"><?php _e( 'Send', 'athenea' ); ?></button>
	  <input type="hidden" name="redirigir" value="<?php echo esc_url( home_url( '/message-received/' ) ); ?>" />
      <input type="hidden" name="recipe" value="<?php _e( 'office@company.com', 'athenea' ); ?>" />
      <input type="hidden" name="asunto" value="<?php _e( 'They have contacted from their website', 'athenea' ); ?>" />
      <input type="hidden" name="dominio" value="ibermega.com" />
      <input type="hidden" name="idioma" value="<?php _e( 'en', 'athenea' ); ?>" />
    </div>
  </div>
</form>
</div><!-- #alert -->
<hr>

<?php
return ob_get_clean();

}
add_shortcode('iberthemeform', 'shortcode_iberthemeform');