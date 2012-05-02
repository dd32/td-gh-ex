/**
 * Executors runs functions 
 */
window.originExecutor = {
	
	e: function(){
		var parts = [];
		for(var i = 0; i < arguments.length; i++) parts[i] = arguments[i];
		return parts.join('');
	},
    
    eif: function(check, opEquals, echoTrue, echoFalse){
        if(typeof check != 'boolean'){
            check = eval(check + opEquals);
        }
        
        return check ? echoTrue : echoFalse;
    },
    
    multiply : function(a,b){ return a*b },
    divide : function(a,b){ return a/b },
    add : function(a,b){ return a+b },
    subtract : function(a,b){ return a-b },
    
	rgba: function(color, opacity){
		var rgb = originColor.hex2rgb(color);
		return 'rgba(' + rgb.join(', ') + ', '+opacity+')';
	},
    
    font: function (v){
        if(v['variant'] == 'regular' || v['variant'] == undefined) v['variant'] = '400';
        
        var isItalic = /(italic)/.test(v['variant']);
        var weight = /bold/.test(v['variant']) ? '700' : /([0-9]+)/.exec(v['variant'])[1];
        
        var r = [];
        r.push('font-weight: ' + weight);
        r.push('font-family: "' + v['family'] + '", Arial, Helvetica, Geneva, sans-serif');
        if(isItalic) r.push('font-style: italic');
        
        return r.join('; ')+'; ';
    },
	
	////////////////////////////////////////////////////////////////////////////
	// Color Functions
	////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Add the arg value to lum
	 */
	color_lum : function(val, lum, m){
		
		var lab = originColor.hex2lab(val);
		
		lum = Number(lum);
		if(m != undefined) lum *= Number(m);
		lab[0] += lum;
		
		return originColor.lab2hex(lab);
	},
	
	color_grey : function (val){
		var g = Math.round(Number(val)*255);
		if(g >= 255) return '#FFFFFF';
		if(g <= 0) return '#000000';
		
		var str = g.toString(16);
		if (str.length == 1) str = '0'+str;
		
		return '#'+Array(4).join(str);
	},
	
	////////////////////////////////////////////////////////////////////////////
	// CSS Functions
	////////////////////////////////////////////////////////////////////////////
	
	css_texture : function(name, level) {
		if(name == '::none' || level == 0) return 'none';
		return 'url('+originSettings.templateUrl+'/images/textures/levels/'+name+'_l'+level+'.png)';
	},
	
	/**
	 * Create a CSS3 gradient
	 */
	css_gradient : function(color, v){
		var b = originColor.hex2lab(color);
		
		var startColor, endColor;
		
		if(!isNaN(parseFloat(v)) && isFinite(v)){
			v = Number(v);
			startColor = originColor.lab2hex([b[0] - v/2, b[1], b[2]]);
			endColor = originColor.lab2hex([b[0] + v/2, b[1], b[2]]);
		}
		else{
			startColor = originColor.hex2lab(color);
			endColor = originColor.hex2lab(v);
		}
		
		return [
			'background: '+color,
			'background: -moz-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)',
			'background: -webkit-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)',
			'background: -o-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)',
			'background: -ms-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)',
			'background: linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)',
			'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'+startColor+'", endColorstr="'+endColor+'",GradientType=0 )',
		].join('; ')+'; ';
	},

    /**
     * Css for a border radius
     * @param radius
     */
    css_border_radius: function(radius){
        return [
            '-webkit-border-radius:' + radius + 'px' ,
            '-moz-border-radius:' + radius  + 'px',
            'border-radius:' + radius + 'px'
        ].join('; ') + '; ';
    },
    
    css_box_shadow :function(){
        var shadows = Math.ceil(arguments.length / 6);
        var shadowDefs = [];
        
        for(var i = 0; i < shadows; i++){
            var inset = arguments[i*6 + 0];
            var x = arguments[i*6 + 1];
            var y = arguments[i*6 + 2];
            var size = arguments[i*6 + 3];
            var color = originColor.hex2rgb(arguments[i*6 + 4]);
            var opacity = arguments[i*6 + 5];
            
            if(opacity > 0){
                shadowDefs.push(
                    (inset ? 'inset ' : '')
                    + x + 'px '
                    + y + 'px '
                    + size + 'px '
                    + 'rgba(' + color.join(', ') + ', ' + opacity + ')'
                );
            }
        }
        
        if(shadowDefs.length > 0){
            return [
                'box-shadow: ' + shadowDefs.join(', '),
                '-webkit-box-shadow: ' + shadowDefs.join(', '),
                '-moz-box-shadow: ' + shadowDefs.join(', ')
            ].join('; ')+'; ';
        }
        else{
            return '';
        }
    },
    
    css_opacity : function(opacity){
        return[
            'zoom: 1',
            'filter: alpha(opacity=' + Math.round(opacity*100) + ')',
            'opacity: ' + opacity
        ].join('; ') + '; ';
    },
	
	/**
	 * Create transparent background
	 */
	transparent_background : function(color, opacity){
		var rgb = originColor.hex2rgb(color);
		var hex = color + parseInt(Math.round(opacity*255) + '', 10).toString(16);
		
		return [
			'background-color: ' + color,
			'background-color: rgba(' + rgb.join(',') + ',' + opacity + ')' ,
			'filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' + hex + ',endColorstr=' + hex + ')',
			'zoom: 1'
		].join('; ') + '; ';
	},

    /**
     * Creates an overlay by contacting the SiteOrigin image API server
     * 
     * @param background
     * @param texture
     * @param texture_level
     * @param noise
     * @return {*}
     */
    api_overlay:function (background, texture, texture_level, noise) {
        if ((texture == '::none' || texture_level == 0) && noise == 0) return background;
        
        if(! texture instanceof Array){
            texture.texture = texture;
            texture.blend = 'Multiply';
        }
        
        var request = [
            background.substring(1),
            texture.texture,
            texture.blend,
            texture_level,
            noise
        ].map(encodeURIComponent).join('/');
        
        var url = originSettings.imageapiUrl + '/overlay/' + request + '/';
        
        return background + ' url(' + url + ')';
    },

    /**
     * 
     * @param start
     * @param end
     * @param height
     * @param texture
     * @param texture_level
     * @param noise
     * @return string
     */
    api_gradient:function (start, end, height, texture, texture_level, noise) {
        if((texture.texture == '::none' || texture_level == 0) && noise == 0 && start == end){
            return start
        }
        
        if(! texture instanceof Array){
            texture.texture = texture;
            texture.blend = 'Over';
        }
        
        var request = [
            start.substring(1),
            end.substring(1),
            height,
            texture.texture,
            texture.blend,
            texture_level,
            noise
        ].map(encodeURIComponent).join('/');
        var url = originSettings.imageapiUrl + '/gradient/' + request + '/';
        
        var r = end + ' left top repeat-x url(' + url + ')';
        return r; 
    }
}