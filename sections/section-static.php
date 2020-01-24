<?php
/**
* section-static.php
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.4
*
*/
?>

<!-- Section Static -->
<section class="at-header-media <?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_write_auto', true ) )) : ?> pb-5<?php endif;?> <?php if ( false == esc_attr(get_theme_mod('atomy_enable_full_width_static', true) )):?>container-fluid pl-0 <?php endif;?> <?php if ( true == esc_attr(get_theme_mod('atomy_enable_full_width_static', true) )):?><?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
	<div class="row">
    <?php the_custom_header_markup() ?>
</div>
 	<!-- Button General Action -->
   <?php if ( false == esc_attr(get_theme_mod('atomy_enable_button_action_static', true) )):?>
	<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
  <div class="row image-caption at-button-action-general text-center at-button-action-static">
  <div class="col-md-12">
  <button class="button post-readmore at-gen-act">
		        <!-- Link Button -->
		        <a href="<?php echo esc_url( get_theme_mod( 'atomy_link_action_static' ));?>">
		           <?php echo esc_html(get_theme_mod( 'at_title_action_static',__('SHOP NOW','atomy')));?>
		        </a>
	</button>
	</div>
</div>
	</div>
	<?php endif;?>
</section>
   
<!-- Write Auto -->
<?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_write_auto', true ) )) : ?>

<div class="at-write-auto">
  <div class="text-center">
    <h1 id="type"></h1><h1 id="blinker">&nbsp;|</h1>
  </div>
</div>
<script>
    class Typewriter {
  constructor(id, arr){
    this.el = document.getElementById(id);
    this.period = 200;
    this.interval = '';
    this.deleteInterval = '';
    this.word = '';
    this.add = true;
    this.textArray = arr;
  }
  type(){
    var self = this;
    this.letter = 0;
    this.counter = 0;
    clearInterval(this.interval);
    this.interval = setInterval(function(){ self.addLetters(); }, this.period);
  }
  setWord(){
    this.word = this.textArray[this.counter];
  }
  deleteLetters(){
    if (this.letter > 0 && !this.add) {
      this.letter--;
      var textContent = this.el.textContent;
      this.el.textContent = textContent.substring(0, this.letter);
    } else if (this.letter === 0 && !this.add) {
      this.add = true;
      this.el.innerHTML = '';
      this.counter++;
      this.setWord();
      this.startAdd();
    }
  }
  addLetters(){
    var self = this;
    if (this.counter === this.textArray.length) {
      this.type();
    } else {
      this.setWord();
      if (this.letter < this.word.length && this.add) {
        this.el.textContent += this.word[this.letter];
        this.letter++;
      } else if (this.letter === this.word.length && this.add) {
        this.add = false;
        document.getElementById('blinker').classList = "blink";
        setTimeout(function () { self.startDelete(); }, 1500);
      }
    }
  }
  startDelete(){
    var self = this;
    document.getElementById('blinker').classList = "";
    clearInterval(this.interval);
    this.interval = setInterval(function () { self.deleteLetters(); }, this.period);
  }
  startAdd(){
    var self = this;
    clearInterval(this.interval);
    this.interval = setInterval(function () { self.addLetters(); }, this.period);
  }
}

var type = new Typewriter('type', [" <?php echo esc_html(get_theme_mod( 'at_title_write_1',__('Atomy is Ecommerce Perfect','atomy')));?>", 
                                    "<?php echo esc_html(get_theme_mod( 'at_title_write_2',__('Atomy is Performing','atomy')));?>", 
                                    "<?php echo esc_html(get_theme_mod( 'at_title_write_3',__('Atomy is Special!','atomy')));?>", 
                                    "<?php echo esc_html(get_theme_mod( 'at_title_write_4',__('Atomy is Dinamic.','atomy')));?>"]);
type.type();
</script>	
<?php endif; ?>








