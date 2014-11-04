/* Weaver Xtreme FitVids - added to end of page html. If add more than FitVids, need to fix
 * how _disable_FitVids works.
 * */
/*global jQuery */
/*jshint browser:true */
/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/

(function( $ ){

  'use strict';

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null
    };

    if(!document.getElementById('fit-vids-style')) {
      // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement("div");
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        'iframe[src*="player.vimeo.com"]',
        'iframe[src*="youtube.com"]',
        'iframe[src*="youtube-nocookie.com"]',
        'iframe[src*="kickstarter.com"][src*="video.html"]',
        'object',
        'embed'
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not('object object'); // SwfObj conflict patch
      $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; // Disable FitVids on this video.
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+'%');
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );


(function( $ ){

  "use strict";

  $.fn.wvrx_fixbranding = function( ) {

    $('#inject_fixedtop').innerWidth( $('#wrapper').innerWidth());      // handle fixed top and bottom
    $('#inject_fixedbottom').innerWidth( $('#wrapper').innerWidth());

    if ($('#site-title').css('display') == 'none' &&  $('#site-tagline').css('display') == 'none')  // if both hidden, don't bother
        return;

    var h_title = $('#title-tagline').outerHeight();
    var h_image = $('#header-image img').outerHeight();

    if ( document.getElementById('title-over-image') != null && h_title != null) {
        if ( h_title > h_image ) {
            // don't need to touch image because it is not absolute
            // so we will just touch the parent div
            $('#title-over-image').css('height', h_title + "px");
        } else {
            $('#title-over-image').css('height', h_image + "px");
        }
    }
    //$('#monitor-branding').html('h_title: ' + h_title + ' h_image: '  + h_image);
  };
})( window.jQuery );




function wvrxFlowColor() {
//version 1.1 - 20 oct 2014
//IE8 Fix
    if ( wvrxEndOpts.flowColor == '0' )
        return;

	var SdbConf = wvrxEndOpts.sbLayout;  //get the sidebar layout

	var MyContent = document.getElementById('content');
	var MyPSdb = document.getElementById('primary-widget-area');
	var MySSdb = document.getElementById('secondary-widget-area');

	//reset min height, must be outside the sidebar test
	if ( MyPSdb ) {
        MyPSdb.style.minHeight = "";
    }
	if ( MySSdb ) {
        MySSdb.style.minHeight = "";
    }
	if ( MyContent ) {
        MyContent.style.minHeight = "";
    }


    function weaverxMarginTop( select ) {
        var val = jQuery(select).css( 'margin-top' );
        if ( val == 'auto' ) // Fix for jQuery returning auto on IE7 and IE8 when no margin is set
            val = '0px';
        return parseInt(val);
    }
    function weaverxMarginBottom( select ) {
        var val = jQuery(select).css( 'margin-bottom' );
        if ( val == 'auto' ) // Fix for jQuery returning auto on IE7 and IE8 when no margin is set
            val = '0px';
        return parseInt(val);
    }

    //Test if on desktop size using weaverxBrowserWidth()
    if ( weaverxBrowserWidth() >= 768 ) {
    //Start testing from actual presence of sidebar, regardless of sidebar config to cover cases of empty split sidebars
        if ( MyPSdb  && ( MySSdb == null ) || MySSdb  && ( MyPSdb == null) ) {
            //--Single SB case--
            if ( MyPSdb ) {         //Primary SB only
                var ContTopM = weaverxMarginTop( '#content' );
                var PSdbTopM = weaverxMarginTop( '#primary-widget-area' );
                var PSdbHeight = MyPSdb.offsetHeight + PSdbTopM;
                var ContHeight = MyContent.offsetHeight + ContTopM;

                //Take the highest content height
                var MaxHeight = Math.max(PSdbHeight, ContHeight);

                //Apply appropriate min height to containers
                MyContent.style.minHeight = (MaxHeight - ContTopM) + "px";
                MyPSdb.style.minHeight = (MaxHeight - PSdbTopM)  + "px";
            } else {           //Secondary SD only
                var ContTopM = weaverxMarginTop( '#content' );
                var SSdbTopM = weaverxMarginTop( '#secondary-widget-area' );
                var SSdbHeight = MySSdb.offsetHeight + SSdbTopM;
                var ContHeight = MyContent.offsetHeight + ContTopM;

                //Take the highest content height
                var MaxHeight = Math.max(SSdbHeight, ContHeight);

                //Apply appropriate min height to containers
                MyContent.style.minHeight = (MaxHeight - ContTopM) + "px";
                MySSdb.style.minHeight = (MaxHeight - SSdbTopM)  + "px";
            }
        }
        if ( MyPSdb && MySSdb ) {
			if ( SdbConf  == 'right' || SdbConf  == 'left' || SdbConf  == 'right-top' || SdbConf  == 'left-top' ) {
            //--Two stacked Sidebars case--
                var ContTopM = weaverxMarginTop( '#content' );
                var SSdbTopM = weaverxMarginTop( '#secondary-widget-area' );
                var PSdbTopM = weaverxMarginTop( '#primary-widget-area' );
                var PSdbBotM = weaverxMarginBottom( '#primary-widget-area' );
                var PSdbHeight = MyPSdb.offsetHeight + PSdbTopM + PSdbBotM;
                var SSdbHeight = MySSdb.offsetHeight + SSdbTopM;
                var ContHeight = MyContent.offsetHeight + ContTopM;
                var TotSdbHeight = PSdbHeight + SSdbHeight;

                //Take the highest content height
                var MaxHeight = Math.max(TotSdbHeight, ContHeight);

                //Apply appropriate min height to containers
                MyContent.style.minHeight = (MaxHeight - ContTopM) + "px";
                MySSdb.style.minHeight = (MaxHeight - PSdbHeight - SSdbTopM) + "px";
            }
            if ( SdbConf  == 'split-top' || SdbConf  == 'split' ) {
            //--Two Split Sidebar case
                var ContTopM = weaverxMarginTop( '#content' );
                var SSdbTopM = weaverxMarginTop( '#secondary-widget-area' );
                var PSdbTopM = weaverxMarginTop( '#primary-widget-area' );
                var PSdbHeight = MyPSdb.offsetHeight + PSdbTopM;
                var SSdbHeight = MySSdb.offsetHeight + SSdbTopM;
                var ContHeight = MyContent.offsetHeight + ContTopM;

                //Take the highest content height
                var MaxHeight = Math.max(PSdbHeight, ContHeight, SSdbHeight);

                //Apply appropriate min height to containers
                MyContent.style.minHeight = (MaxHeight - ContTopM) + "px";
                MyPSdb.style.minHeight = (MaxHeight - PSdbTopM)  + "px";
                MySSdb.style.minHeight = (MaxHeight - SSdbTopM)  + "px";
            }
        }
    } else {
        if ( weaverxBrowserWidth() > 580 ) {
			//Test if on small tablet size using screensize function
            if ( MyPSdb && MySSdb ) {
                if(SdbConf  == 'right' || SdbConf  == 'left' || SdbConf  == 'split' ) {   //Sidebar Right left or Split Sidebar are the only one side by side on small tablets
                    var SSdbTopM = weaverxMarginTop( '#secondary-widget-area' );
                    var PSdbTopM = weaverxMarginTop( '#primary-widget-area' );
                    var PSdbHeight = MyPSdb.offsetHeight + PSdbTopM;
                    var SSdbHeight = MySSdb.offsetHeight + SSdbTopM;
                    //Take the highest content height of both sidebars
                    var MaxHeight = Math.max(PSdbHeight,SSdbHeight);
                    //Apply appropriate min height to containers
                    MyPSdb.style.minHeight = (MaxHeight - PSdbTopM)  + "px";
                    MySSdb.style.minHeight = (MaxHeight - SSdbTopM)  + "px";
                }
            }
        }
    }
}



function weaverxWidgetEq(WdgtClass,AreaId) {
//version 0.8 - 10 oct 2014
//-- added check for actual margin and presence of widget area, and fixed bottom margin eval
//--use offsetxxx instead of clientxxx to account for borders
//--Capture margin in its actual form not only pixel value
//--remove position relative being added to the primary sidebar to avoid problem in split SB layout
//--Improved bottom margin handling, makes it fully ie8 compliant
//--Simplified with jQuery and added test for nobm class to decide on margin removal

//Equalizing widgets in any widget area
var WdgtArea = document.getElementById(AreaId);
	if( WdgtArea != null ) {
		var noBotMargin = jQuery( '#'+AreaId ).hasClass( 'nobm' );  //checks if the nobm class is present
		var widget = jQuery( "#"+AreaId+' .'+WdgtClass);
		//Enter monitoring of widget area
		var WgtPos = -10000;
		var Rows = 0;  //initialise row number
		var WdgtInRow = [];
		for (var i = 1; i <= 20; ++i) {
			WdgtInRow[i] = 0;
		}

		//counting rows and widgets
		for(i=0; i < widget.length; i++) {
			if(widget[i].offsetTop !== WgtPos) {//if dif position, new row
				Rows = Rows + 1;
				WdgtInRow[Rows] = 1;  //initialize number of widgets in row
			} else {
				WdgtInRow[Rows] = WdgtInRow[Rows] + 1;  //increment Nb of widget in row
			};
			WgtPos = widget[i].offsetTop;    //set current top position
		}

		//reset the min-height to measure true height
		for( i = 0; i < widget.length; i++ ) {
			widget[i].style.minHeight = "0px";
		}
		//Running equalization row by row
		var EqWdgt = 0;  //initialize how manu widgets have been done
		for( i = 1; i < (Rows + 1); i++  ) {
			var maxHeight = 0;
			// Calculate the max-height
			var start = (0 + EqWdgt);
			var end = ( WdgtInRow[i] + EqWdgt );
			for( j = start; j < end ; j++ ) {
                if( widget[j].offsetHeight > maxHeight ) {
                    maxHeight = widget[j].offsetHeight
                }
			}
			// Apply the new max height as min-height
			var start = (0 + EqWdgt);
			var end = ( WdgtInRow[i] + EqWdgt );
			for( j = start ; j < end ; j++ ) {
			  widget[j].style.minHeight = maxHeight + "px";
			  widget[j].style.marginBottom = ""; //Remove the zero bot margin in case it was set previously
				if ( i == Rows ) {
                    if( noBotMargin ) {
                        widget[j].style.marginBottom = "0px";  //remove bottom margin if nobm class present
                    }
				}

			  EqWdgt = EqWdgt + 1;
			}
		}
	}
}


function weaverxResizeEnd() {
    jQuery("#branding").wvrx_fixbranding();     // fix up the #branding area title/description/image

    if ( wvrxEndOpts.primary == '1' ) {
        weaverxWidgetEq('widget','primary-widget-area');
    }

    if ( wvrxEndOpts.secondary == '1' ) {
        weaverxWidgetEq('widget','secondary-widget-area');
    }

    if ( wvrxEndOpts.header_sb == '1' ) {
        weaverxWidgetEq('widget','header-widget-area');
    }

    if ( wvrxEndOpts.footer_sb == '1' ) {
        weaverxWidgetEq('widget','footer-widget-area');
    }

    if ( wvrxEndOpts.top == '1' ) {
        weaverxWidgetEq('widget','postpages-widget-area');
        weaverxWidgetEq('widget','blog-top-widget-area');
        weaverxWidgetEq('widget','sitewide-top-widget-area');
        weaverxWidgetEq('widget','page-top-widget-area');
    }

    if ( wvrxEndOpts.bottom == '1' ) {
        weaverxWidgetEq('widget','blog-bottom-widget-area');
        weaverxWidgetEq('widget','page-bottom-widget-area');
        weaverxWidgetEq('widget','sitewide-bottom-widget-area');
    }

    wvrxFlowColor();                               // fix Color Flow - must go after the weaverxWidgetEq calls.


    if (typeof( weaverxUserOnResize ) == 'function' ) // call user function if there
        weaverxUserOnResize();
};

// Invoke scripts
jQuery(document).ready(function () {

    // need to run weaverxResizeEnd on doc ready for at least some browsers
    // As of October, 2014, these included Safari, Desktop Opera, IE9, and IE8.
    // For other browsers, it doesn't seem needed, but it is harmless to do it anyway.

    weaverxResizeEnd();

    if ( wvrxEndOpts.hideTip == '1' ) {
        jQuery('a[title]').mouseover(function(e) {
            var tip = jQuery(this).attr('title');
            jQuery(this).attr('title','');
        }).mouseout(function() {
            jQuery(this).attr('title',jQuery('.tipBody').html());
        });
    }

    if ( wvrxEndOpts.hFontFamily != '0' ) {
        var ffamily = 'font-' + wvrxEndOpts.hFontFamily;
        //alert('ffamily:' + ffamily);
        jQuery('.entry-content h1').addClass( ffamily );
        jQuery('.entry-content h2').addClass( ffamily );
        jQuery('.entry-content h3').addClass( ffamily );
        jQuery('.entry-content h4').addClass( ffamily );
        jQuery('.entry-content h5').addClass( ffamily );
        jQuery('.entry-content h6').addClass( ffamily );
    }

    if ( wvrxEndOpts.hFontMult != 1 ) {
        var mult = wvrxEndOpts.hFontMult;
        // these values computed base on original h sizes times multipler determined in footer.php
        jQuery('.entry-content h1').css('font-size', (2.25 * mult) + 'em');
        jQuery('.entry-content h2').css('font-size', (1.875 * mult) + 'em');
        jQuery('.entry-content h3').css('font-size', (1.5 * mult) + 'em');
        jQuery('.entry-content h4').css('font-size', (1.125 * mult) + 'em');
        jQuery('.entry-content h5').css('font-size', (1.0 * mult) + 'em');
        jQuery('.entry-content h6').css('font-size', (.875 * mult) + 'em');
    }

    // Target your #container, #wrapper etc
    // if ( ! weaver_disable_fitvids )  // one possible solution to disabling FitVids via localize_script in functions.php
    jQuery("#wrapper").fitVids();
});

jQuery(function($) {
    $('#wrapper').resizeX(weaverxResizeEnd);
});

// Handle sizing of dynamic containers like Extra menus

//function to allow people to launch their own monitoring

function weaverxMonitorContent(class2Mon) {
    // This function gather the ID of all containers with the given class and executes weaverResizeEnd
    // (flow color and widgetEq) when they change size
    var XtraMenuAc = jQuery(class2Mon);  // getting all the containers with the given class
    jQuery(function($) {
        for ( i = 0; i < XtraMenuAc.length; i++) {
            $('#'+XtraMenuAc[i].id).resizeX(weaverxResizeEnd);  //launching monitoring using the ID of the container
        }
    });
};

// Finds the extra menus using accordion type and launches resizeX using the extra menu container ID for monitoring

weaverxMonitorContent('.menu-type-accordion');
weaverxMonitorContent('.menu-type-standard');

//Check is users have defined a function to monitor their own dynamic container

if ( typeof( weaverxUserMonitor ) == 'function' ) // call user function if there
    weaverxUserMonitor();
