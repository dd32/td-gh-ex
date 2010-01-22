
SRS = {
	addLoadEvent: function(f) {
		var oo = window.onload; 
		if (typeof window.onload != 'function') { 
			window.onload = f; 
		} else { 
			window.onload = function() { 
				if (oo) oo(); 
				f(); 
			} 
		} 
	},
	search: {
		d: null,
		init: function() {
			var s = document.getElementById('searchQuery');
			SRS.search.d = s.value;
			s.onfocus = function() {
				if (this.value == SRS.search.d) {
					this.value = '';
					this.className = this.className.replace(new RegExp(" searchQueryIA\\b"), "");
				}
			};
			s.onblur = function() {
				if (this.value == '') {
					this.value = SRS.search.d;
					this.className += " searchQueryIA";
				}
			}
		}
	},
	comment: {
		d: {},
		init: function() {
			//Inject the default WordPress moveForm function with advanced customization.
			if (typeof addComment != 'undefined') {
				addComment._moveForm = addComment.moveForm;
				addComment.moveForm = function(commId, parentId, respondId, postId) {
					var c = this.I('cancel-comment-reply-link');
					var r = this.I(respondId);
					if(!new RegExp('\\bcommentReplyActive\\b').test(r.className))
						r.className+=" commentReplyActive";
					var r = addComment._moveForm(commId, parentId, respondId, postId);
					c._onclick = c.onclick;
					c.onclick = function() {
						var respond = addComment.I(addComment.respondId);
						respond.className = respond.className.replace(new RegExp(" commentReplyActive\\b"), "");
						return this._onclick();
					}
					return r;
				}
			}
			
			//Activate form functionality
			var e1 = document.getElementById('replyName');
			var e2 = document.getElementById('replyEmail');
			var e3 = document.getElementById('replyURL');
			var e4 = document.getElementById('replyMsg');
			var e1d = document.getElementById('replyNameDefault')?document.getElementById('replyNameDefault').value:'';
			var e2d = document.getElementById('replyEmailDefault')?document.getElementById('replyEmailDefault').value:'';
			var e3d = document.getElementById('replyURLDefault')?document.getElementById('replyURLDefault').value:'';
			var e4d = document.getElementById('replyMsgDefault')?document.getElementById('replyMsgDefault').value:'';
			if (e1 != null) {
				e1.onfocus = function() {
					if (this.value == e1d) {
						this.value = '';
						this.className = this.className.replace(new RegExp(" inputIA\\b"), "");
					}
				};
				e1.onblur = function() {
					if (this.value == '') {
						this.value = e1d;
						this.className += " inputIA";
					}
				}
			}
			if (e2 != null) {
				e2.onfocus = function() {
					if (this.value == e2d) {
						this.value = '';
						this.className = this.className.replace(new RegExp(" inputIA\\b"), "");
					}
				};
				e2.onblur = function() {
					if (this.value == '') {
						this.value = e2d;
						this.className += " inputIA";
					}
				}
			}
			if (e3 != null) {
				e3.onfocus = function() {
					if (this.value == e3d) {
						this.value = '';
						this.className = this.className.replace(new RegExp(" inputIA\\b"), "");
					}
				};
				e3.onblur = function() {
					if (this.value == '') {
						this.value = e3d;
						this.className += " inputIA";
					}
				}
			}
			if (e4 != null) {
				e4.onfocus = function() {
					if (this.value == e4d) {
						this.value = '';
						this.className = this.className.replace(this.className.match(' inputIA')?' inputIA':'inputIA', '');
					}
				};
				e4.onblur = function() {
					if (this.value == '') {
						this.value = e4d;
						this.className += " inputIA";
					}
				}
			}
		}
		
	}
};

SRS.addLoadEvent(SRS.search.init);
SRS.addLoadEvent(SRS.comment.init);
