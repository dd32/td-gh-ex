(function ($) {
	"use strict";
	
	
	var CustomGalleryEdit,CustomFrame;
	
	function customClasses() {
		var media = wp.media;
		var l10n = media.view.l10n;
		
		CustomGalleryEdit = wp.media.controller.GalleryEdit.extend({
			gallerySettings: function( browser ) {
				if ( ! this.get('displaySettings') ) {
					return;
				}

				var library = this.get('library');

				if ( ! library || ! browser ) {
					return;
				}

				browser.toolbar.set( 'reverse', {
					text:     l10n.reverseOrder,
					priority: 80,

					click: function() {
						library.reset( library.toArray().reverse() );
					}
				});
			}
		});
		
		CustomFrame = wp.media.view.MediaFrame.Post.extend({
			galleryMenu: function( view ) {
			},
			createStates: function() {
				var options = this.options;
				// custom frame has only 2 states: gallery edit/add
				this.states.add([
					new CustomGalleryEdit({
						library: options.selection,
						editing: true,
						requires: { selection: false },
						menu:    'gallery'
					}),
					new media.controller.GalleryAdd()
				]);
			},
			galleryEditToolbar: function() {
				try {
					var updateGallery = l10n.updateGallery;
					// change the button label
					l10n.updateGallery = 'Save Gallery';
					// call parent method
					media.view.MediaFrame.Post.prototype.galleryEditToolbar.apply(this,arguments);
					// change the button behaviour so that it would allow us to save an empty gallery
					this.toolbar.get().options.items.insert.requires.library = false;
					l10n.updateGallery = updateGallery;
				} catch (x) {

				}
			}
		});
		
	}
	
	function getWorkFlow(selection) {
		var attributes = {
				state:      'gallery-edit',
				editing:    true,
				multiple:   true
			};
		
		if (typeof selection != 'undefined' && selection) {
			attributes.selection = selection;
		}
		return new CustomFrame(attributes);
	}
	
	function init() {
		if (window.wp && window.wp.media) {
			customClasses();
		}
	}
	
	$(init);
	
	
	
	
	// input field where the gallery images ids are stored as comma separated list
	var store = $('#anorya_g');
	
	// the media uploader
	var workflow = false;
	
	// selection object which list gallery images as collection
	var selection;
	
	// opens the dialog
	function open() {
		if (!selection) {
			fetch();
		}
		
		if (workflow) {
			workflow.off('update',update);
			workflow.dispose();
		}
		
		workflow = getWorkFlow(selection);
		workflow.on('update',update);
		workflow.open();
	}
	
	// create selection collection
	function fetch() {
		var value = store.val();
		
		if (!value) {
			selection = [];
			return;
		} 
		
		var shortcode = new wp.shortcode({
				tag:    "gallery",
				attrs:   { ids: value },
				type:   "single"
			});
		
		var attachments = wp.media.gallery.attachments( shortcode );
		
		selection = new wp.media.model.Selection( attachments.models, {
			props:    attachments.props.toJSON(),
			multiple: true
		});
		
		selection.gallery = attachments.gallery;
		selection.more().done( function() {
			// Break ties with the query.
			selection.props.set({ query: false });
			selection.unmirror();
			selection.props.unset("orderby");
		});
		
	}
	
	// retrieve list of gallery images and stores them
	function update() {
		var library = workflow.states.get('gallery-edit').get('library');
		var ids = library.pluck('id');
		var value = (typeof ids === 'object') ? ids.join(',') : '';
		store.val(value);
		selection = false;
	}
	
	$( "#anorya_g_open" ).click(function() {
		open();
	});	
	
}(jQuery));
