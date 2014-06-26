/**
 * Figure/Ground animation script. Runs on a full-window <canvas> element.
 */

var fg = {};
( function( $ ) {

	// Load settings passed from wp_localize_script().
	fg.settings = figureGroundSettings;

	// Start the animation.
	fg.init = function() {
		clearInterval( fg.t ); // Allows re-initing via this same function.

		fg.canvas = document.getElementById( 'figure-ground' );
		fg.ctx = fg.canvas.getContext('2d');

		fg.resizeCanvas();
		fg.alignToGrid();

		fg.ctx.fillStyle = fg.settings.color;
		fg.i = 0;

		if ( 'orthogonal' == fg.settings.type ) {
			fg.initOrthogonal( fg.settings.initial );
			if ( 0 != fg.settings.delay ) {
				fg.t = setInterval( fg.rectangle, fg.settings.delay );
			}
		}
		else {
			fg.initCircular( fg.settings.initial );
			if ( 0 != fg.settings.delay ) {
				fg.t = setInterval( fg.circle, fg.settings.delay );
			}
		}
	};

	// Run the initial iterations of the animation.
	fg.initOrthogonal = function( iterations ) {
		var ii = 0;
		while ( ii < iterations ) {
			fg.rectangle();
			ii++;
		}
	};

	// Run the initial iterations of the animation.
	fg.initCircular = function( iterations ) {
		var ii = 0;
		while ( ii < iterations ) {
			fg.circle();
			ii++;
		}
	}

	// Alternately draw or remove a randomly sized and positioned rectangle.
	fg.rectangle = function() {
		var w = Math.ceil( Math.random() * fg.settings.maxw / 16 ) * 16,
			h = Math.ceil( Math.random() * fg.settings.maxh / 16 ) * 16,
			x = Math.floor( Math.random() * ( fg.iwidth - w + 16 ) / 16 ) * 16,
			y = Math.floor( Math.random() * ( fg.iheight - h + 16 ) / 16 ) * 16;

		( fg.isEven( fg.i ) ) ? fg.ctx.fillRect( x, y, w, h ) : fg.ctx.clearRect( x, y, w, h );
		fg.i++;
	}

	// Alternately draw or remove a randomly sized and positioned circle.
	fg.circle = function() {
		var rad = Math.ceil( Math.random() * fg.settings.maxr / 16 ) * 16,
			x = Math.floor( Math.random() * ( fg.iwidth - rad ) / 16 ) * 16 + ( rad / 2 ),
			y = Math.floor( Math.random() * ( fg.iheight - rad ) / 16 ) * 16 + ( rad / 2 );

		( fg.isEven( fg.i ) ) ? fg.drawCircle( x, y, rad ) : fg.clearCircle( x, y, rad );
		fg.i++;
	}

	// Draw a circle at the given position and size.
	fg.drawCircle = function( x, y, rad ) {
		fg.ctx.beginPath();
		fg.ctx.arc( x, y, rad, 0, Math.PI*2, false ); 
		fg.ctx.closePath();
		fg.ctx.fill();
	}

	// Remove a circle at the given position and size.
	fg.clearCircle = function( x, y, rad ) {
		fg.ctx.save();
		fg.ctx.globalCompositeOperation = 'destination-out';
		fg.ctx.beginPath();
		fg.ctx.arc( x, y, rad, 0, 2 * Math.PI, false );
		fg.ctx.closePath();
		fg.ctx.fill();
		fg.ctx.restore();
	};

	// Returns boolean whether the value is true or false.
	fg.isEven = function( value ) {
		return ( 0 == value % 2 ) ? true : false;
	}

	// Resive the <canvas> element to fill the window, and update the corresponding internal vars. 
	fg.resizeCanvas = function() {
		fg.iwidth = window.innerWidth;
		fg.iheight = window.innerHeight;
		fg.canvas.width = fg.iwidth + 16;
		fg.canvas.height = fg.iheight;
	}

	// Attempt to align the figure/ground grid to the centered page layout grid. This isn't pixel-perfect in most browsers, unfortunately
	fg.alignToGrid = function() {
		fg.iwidth = window.innerWidth;
		var left = ( fg.iwidth % 16 ) / 2;
		$( '#figure-ground' ).css( 'margin-left', - Math.floor( left ) );
	}

	// fg.resizeCanvas and fh.alignToGrid could be called on window.resize, but that requires resetting the animation, which results in an awkward UX.

	// Clear the entire canvas.
	fg.clearCanvas = function() {
		fg.resizeCanvas(); // Might as well re-set it now if it changed.
		fg.ctx.clearRect( 0, 0, fg.iwidth, fg.iheight );
	}

	$(document).ready( function() { fg.init(); } );

} )( jQuery );