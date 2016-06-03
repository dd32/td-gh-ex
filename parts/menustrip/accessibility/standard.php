<p id="accessClose" class="holderclose"><span><span class="fa fa-times"></span></span></p>
<h2><?PHP echo __("Accessibility", 'antonine'); ?></h2>
<div id="accessform">
	<form action="javascript:function(){return false;}">
		<div id="basic_accessibility_widget_options">
			<label for="basic_accessibility_background-color">
				<?PHP echo __("Background Colour", "antonine"); ?>
			</label>
			<input name="background-colour" type='text' id="basic_accessibility_background-color" maxlength="10" title="<?PHP echo __("Background colour", "antonine"); ?>" />
			<input type='hidden' name="basic_accessibility_background-color_default" id="basic_accessibility_background-color_default" value="<?PHP echo get_theme_mod('site_allsite_background_colour'); ?>" />
			<button id="basic_accessibility_widget_restore_background">Restore</button>
			<label for="basic_accessibility_color">
				<?PHP echo __("Text Colour", "antonine"); ?>
			</label>
			<input name="text-colour" type='text' title="<?PHP echo __("Text colour", "antonine"); ?>" id="basic_accessibility_color" maxlength="10" />
			<input type='hidden' name="basic_accessibility_color_default" id="basic_accessibility_color_default" value="<?PHP echo get_theme_mod('site_alltext_colour'); ?>" />
			<button id="basic_accessibility_widget_restore_colour"><?PHP echo __("Restore", "antonine"); ?></button>
			<label for="basic_accessibility_font-size_default">
				<?PHP echo __("Text Size", "antonine"); ?> : 
			</label>
			<input type='hidden' name="basic_accessibility_font-size_default" id="basic_accessibility_font-size_default" value="14px" />
			<button id="basic_accessibility_widget_font-size_restore">Restore</button>
			<span id="basic_accessibility_font-size_display"></span>
			<div id="access-font-size">
			</div>
			<button id="basic_accessibility_widget_default"><?PHP echo __("Default Settings", "antonine"); ?></button>
		</div>
	</div>
</form>