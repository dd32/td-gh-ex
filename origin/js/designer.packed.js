(function(){var SelectParser;SelectParser=(function(){function SelectParser(){this.options_index=0;this.parsed=[];}
SelectParser.prototype.add_node=function(child){if(child.nodeName==="OPTGROUP"){return this.add_group(child);}else{return this.add_option(child);}};SelectParser.prototype.add_group=function(group){var group_position,option,_i,_len,_ref,_results;group_position=this.parsed.length;this.parsed.push({array_index:group_position,group:true,label:group.label,children:0,disabled:group.disabled});_ref=group.childNodes;_results=[];for(_i=0,_len=_ref.length;_i<_len;_i++){option=_ref[_i];_results.push(this.add_option(option,group_position,group.disabled));}
return _results;};SelectParser.prototype.add_option=function(option,group_position,group_disabled){if(option.nodeName==="OPTION"){if(option.text!==""){if(group_position!=null)this.parsed[group_position].children+=1;this.parsed.push({array_index:this.parsed.length,options_index:this.options_index,value:option.value,text:option.text,html:option.innerHTML,selected:option.selected,disabled:group_disabled===true?group_disabled:option.disabled,group_array_index:group_position,classes:option.className,style:option.style.cssText});}else{this.parsed.push({array_index:this.parsed.length,options_index:this.options_index,empty:true});}
return this.options_index+=1;}};return SelectParser;})();SelectParser.select_to_array=function(select){var child,parser,_i,_len,_ref;parser=new SelectParser();_ref=select.childNodes;for(_i=0,_len=_ref.length;_i<_len;_i++){child=_ref[_i];parser.add_node(child);}
return parser.parsed;};this.SelectParser=SelectParser;}).call(this);(function(){var AbstractChosen,root;root=this;AbstractChosen=(function(){function AbstractChosen(form_field,options){this.form_field=form_field;this.options=options!=null?options:{};this.set_default_values();this.is_multiple=this.form_field.multiple;this.default_text_default=this.is_multiple?"Select Some Options":"Select an Option";this.setup();this.set_up_html();this.register_observers();this.finish_setup();}
AbstractChosen.prototype.set_default_values=function(){var _this=this;this.click_test_action=function(evt){return _this.test_active_click(evt);};this.activate_action=function(evt){return _this.activate_field(evt);};this.active_field=false;this.mouse_on_container=false;this.results_showing=false;this.result_highlighted=null;this.result_single_selected=null;this.allow_single_deselect=(this.options.allow_single_deselect!=null)&&(this.form_field.options[0]!=null)&&this.form_field.options[0].text===""?this.options.allow_single_deselect:false;this.disable_search_threshold=this.options.disable_search_threshold||0;this.choices=0;return this.results_none_found=this.options.no_results_text||"No results match";};AbstractChosen.prototype.mouse_enter=function(){return this.mouse_on_container=true;};AbstractChosen.prototype.mouse_leave=function(){return this.mouse_on_container=false;};AbstractChosen.prototype.input_focus=function(evt){var _this=this;if(!this.active_field){return setTimeout((function(){return _this.container_mousedown();}),50);}};AbstractChosen.prototype.input_blur=function(evt){var _this=this;if(!this.mouse_on_container){this.active_field=false;return setTimeout((function(){return _this.blur_test();}),100);}};AbstractChosen.prototype.result_add_option=function(option){var classes,style;if(!option.disabled){option.dom_id=this.container_id+"_o_"+option.array_index;classes=option.selected&&this.is_multiple?[]:["active-result"];if(option.selected)classes.push("result-selected");if(option.group_array_index!=null)classes.push("group-option");if(option.classes!=="")classes.push(option.classes);style=option.style.cssText!==""?" style=\""+option.style+"\"":"";return'<li id="'+option.dom_id+'" class="'+classes.join(' ')+'"'+style+'>'+option.html+'</li>';}else{return"";}};AbstractChosen.prototype.results_update_field=function(){this.result_clear_highlight();this.result_single_selected=null;return this.results_build();};AbstractChosen.prototype.results_toggle=function(){if(this.results_showing){return this.results_hide();}else{return this.results_show();}};AbstractChosen.prototype.results_search=function(evt){if(this.results_showing){return this.winnow_results();}else{return this.results_show();}};AbstractChosen.prototype.keyup_checker=function(evt){var stroke,_ref;stroke=(_ref=evt.which)!=null?_ref:evt.keyCode;this.search_field_scale();switch(stroke){case 8:if(this.is_multiple&&this.backstroke_length<1&&this.choices>0){return this.keydown_backstroke();}else if(!this.pending_backstroke){this.result_clear_highlight();return this.results_search();}
break;case 13:evt.preventDefault();if(this.results_showing)return this.result_select(evt);break;case 27:if(this.results_showing)this.results_hide();return true;case 9:case 38:case 40:case 16:case 91:case 17:break;default:return this.results_search();}};AbstractChosen.prototype.generate_field_id=function(){var new_id;new_id=this.generate_random_id();this.form_field.id=new_id;return new_id;};AbstractChosen.prototype.generate_random_char=function(){var chars,newchar,rand;chars="0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";rand=Math.floor(Math.random()*chars.length);return newchar=chars.substring(rand,rand+1);};return AbstractChosen;})();root.AbstractChosen=AbstractChosen;}).call(this);(function(){var $,Chosen,get_side_border_padding,root,__hasProp=Object.prototype.hasOwnProperty,__extends=function(child,parent){for(var key in parent){if(__hasProp.call(parent,key))child[key]=parent[key];}
function ctor(){this.constructor=child;}
ctor.prototype=parent.prototype;child.prototype=new ctor;child.__super__=parent.prototype;return child;};root=this;$=jQuery;$.fn.extend({chosen:function(options){if($.browser.msie&&($.browser.version==="6.0"||$.browser.version==="7.0")){return this;}
return $(this).each(function(input_field){if(!($(this)).hasClass("chzn-done"))return new Chosen(this,options);});}});Chosen=(function(_super){__extends(Chosen,_super);function Chosen(){Chosen.__super__.constructor.apply(this,arguments);}
Chosen.prototype.setup=function(){this.form_field_jq=$(this.form_field);return this.is_rtl=this.form_field_jq.hasClass("chzn-rtl");};Chosen.prototype.finish_setup=function(){return this.form_field_jq.addClass("chzn-done");};Chosen.prototype.set_up_html=function(){var container_div,dd_top,dd_width,sf_width;this.container_id=this.form_field.id.length?this.form_field.id.replace(/(:|\.)+/g,'_'):this.generate_field_id();this.container_id+="_chzn";this.f_width=this.form_field_jq.outerWidth();this.default_text=this.form_field_jq.data('placeholder')?this.form_field_jq.data('placeholder'):this.default_text_default;container_div=$("<div />",{id:this.container_id,"class":"chzn-container"+(this.is_rtl?' chzn-rtl':''),style:'width: '+this.f_width+'px;'});if(this.is_multiple){container_div.html('<ul class="chzn-choices"><li class="search-field"><input type="text" value="'+this.default_text+'" class="default" autocomplete="off" style="width:25px;" /></li></ul><div class="chzn-drop" style="left:-9000px;"><ul class="chzn-results"></ul></div>');}else{container_div.html('<a href="javascript:void(0)" class="chzn-single"><span>'+this.default_text+'</span><div><b></b></div></a><div class="chzn-drop" style="left:-9000px;"><div class="chzn-search"><input type="text" autocomplete="off" /></div><ul class="chzn-results"></ul></div>');}
this.form_field_jq.hide().after(container_div);this.container=$('#'+this.container_id);this.container.addClass("chzn-container-"+(this.is_multiple?"multi":"single"));this.dropdown=this.container.find('div.chzn-drop').first();dd_top=this.container.height();dd_width=this.f_width-get_side_border_padding(this.dropdown);this.dropdown.css({"width":dd_width+"px","top":dd_top+"px"});this.search_field=this.container.find('input').first();this.search_results=this.container.find('ul.chzn-results').first();this.search_field_scale();this.search_no_results=this.container.find('li.no-results').first();if(this.is_multiple){this.search_choices=this.container.find('ul.chzn-choices').first();this.search_container=this.container.find('li.search-field').first();}else{this.search_container=this.container.find('div.chzn-search').first();this.selected_item=this.container.find('.chzn-single').first();sf_width=dd_width-get_side_border_padding(this.search_container)-get_side_border_padding(this.search_field);this.search_field.css({"width":sf_width+"px"});}
this.results_build();this.set_tab_index();return this.form_field_jq.trigger("liszt:ready",{chosen:this});};Chosen.prototype.register_observers=function(){var _this=this;this.container.mousedown(function(evt){return _this.container_mousedown(evt);});this.container.mouseup(function(evt){return _this.container_mouseup(evt);});this.container.mouseenter(function(evt){return _this.mouse_enter(evt);});this.container.mouseleave(function(evt){return _this.mouse_leave(evt);});this.search_results.mouseup(function(evt){return _this.search_results_mouseup(evt);});this.search_results.mouseover(function(evt){return _this.search_results_mouseover(evt);});this.search_results.mouseout(function(evt){return _this.search_results_mouseout(evt);});this.form_field_jq.bind("liszt:updated",function(evt){return _this.results_update_field(evt);});this.search_field.blur(function(evt){return _this.input_blur(evt);});this.search_field.keyup(function(evt){return _this.keyup_checker(evt);});this.search_field.keydown(function(evt){return _this.keydown_checker(evt);});if(this.is_multiple){this.search_choices.click(function(evt){return _this.choices_click(evt);});return this.search_field.focus(function(evt){return _this.input_focus(evt);});}else{return this.container.click(function(evt){return evt.preventDefault();});}};Chosen.prototype.search_field_disabled=function(){this.is_disabled=this.form_field_jq[0].disabled;if(this.is_disabled){this.container.addClass('chzn-disabled');this.search_field[0].disabled=true;if(!this.is_multiple){this.selected_item.unbind("focus",this.activate_action);}
return this.close_field();}else{this.container.removeClass('chzn-disabled');this.search_field[0].disabled=false;if(!this.is_multiple){return this.selected_item.bind("focus",this.activate_action);}}};Chosen.prototype.container_mousedown=function(evt){var target_closelink;if(!this.is_disabled){target_closelink=evt!=null?($(evt.target)).hasClass("search-choice-close"):false;if(evt&&evt.type==="mousedown")evt.stopPropagation();if(!this.pending_destroy_click&&!target_closelink){if(!this.active_field){if(this.is_multiple)this.search_field.val("");$(document).click(this.click_test_action);this.results_show();}else if(!this.is_multiple&&evt&&(($(evt.target)[0]===this.selected_item[0])||$(evt.target).parents("a.chzn-single").length)){evt.preventDefault();this.results_toggle();}
return this.activate_field();}else{return this.pending_destroy_click=false;}}};Chosen.prototype.container_mouseup=function(evt){if(evt.target.nodeName==="ABBR")return this.results_reset(evt);};Chosen.prototype.blur_test=function(evt){if(!this.active_field&&this.container.hasClass("chzn-container-active")){return this.close_field();}};Chosen.prototype.close_field=function(){$(document).unbind("click",this.click_test_action);if(!this.is_multiple){this.selected_item.attr("tabindex",this.search_field.attr("tabindex"));this.search_field.attr("tabindex",-1);}
this.active_field=false;this.results_hide();this.container.removeClass("chzn-container-active");this.winnow_results_clear();this.clear_backstroke();this.show_search_field_default();return this.search_field_scale();};Chosen.prototype.activate_field=function(){if(!this.is_multiple&&!this.active_field){this.search_field.attr("tabindex",this.selected_item.attr("tabindex"));this.selected_item.attr("tabindex",-1);}
this.container.addClass("chzn-container-active");this.active_field=true;this.search_field.val(this.search_field.val());return this.search_field.focus();};Chosen.prototype.test_active_click=function(evt){if($(evt.target).parents('#'+this.container_id).length){return this.active_field=true;}else{return this.close_field();}};Chosen.prototype.results_build=function(){var content,data,_i,_len,_ref;this.parsing=true;this.results_data=root.SelectParser.select_to_array(this.form_field);if(this.is_multiple&&this.choices>0){this.search_choices.find("li.search-choice").remove();this.choices=0;}else if(!this.is_multiple){this.selected_item.find("span").text(this.default_text);if(this.form_field.options.length<=this.disable_search_threshold){this.container.addClass("chzn-container-single-nosearch");}else{this.container.removeClass("chzn-container-single-nosearch");}}
content='';_ref=this.results_data;for(_i=0,_len=_ref.length;_i<_len;_i++){data=_ref[_i];if(data.group){content+=this.result_add_group(data);}else if(!data.empty){content+=this.result_add_option(data);if(data.selected&&this.is_multiple){this.choice_build(data);}else if(data.selected&&!this.is_multiple){this.selected_item.find("span").text(data.text);if(this.allow_single_deselect)this.single_deselect_control_build();}}}
this.search_field_disabled();this.show_search_field_default();this.search_field_scale();this.search_results.html(content);return this.parsing=false;};Chosen.prototype.result_add_group=function(group){if(!group.disabled){group.dom_id=this.container_id+"_g_"+group.array_index;return'<li id="'+group.dom_id+'" class="group-result">'+$("<div />").text(group.label).html()+'</li>';}else{return"";}};Chosen.prototype.result_do_highlight=function(el){var high_bottom,high_top,maxHeight,visible_bottom,visible_top;if(el.length){this.result_clear_highlight();this.result_highlight=el;this.result_highlight.addClass("highlighted");maxHeight=parseInt(this.search_results.css("maxHeight"),10);visible_top=this.search_results.scrollTop();visible_bottom=maxHeight+visible_top;high_top=this.result_highlight.position().top+this.search_results.scrollTop();high_bottom=high_top+this.result_highlight.outerHeight();if(high_bottom>=visible_bottom){return this.search_results.scrollTop((high_bottom-maxHeight)>0?high_bottom-maxHeight:0);}else if(high_top<visible_top){return this.search_results.scrollTop(high_top);}}};Chosen.prototype.result_clear_highlight=function(){if(this.result_highlight)this.result_highlight.removeClass("highlighted");return this.result_highlight=null;};Chosen.prototype.results_show=function(){var dd_top;if(!this.is_multiple){this.selected_item.addClass("chzn-single-with-drop");if(this.result_single_selected){this.result_do_highlight(this.result_single_selected);}}
dd_top=this.is_multiple?this.container.height():this.container.height()-1;this.dropdown.css({"top":dd_top+"px","left":0});this.results_showing=true;this.search_field.focus();this.search_field.val(this.search_field.val());return this.winnow_results();};Chosen.prototype.results_hide=function(){if(!this.is_multiple){this.selected_item.removeClass("chzn-single-with-drop");}
this.result_clear_highlight();this.dropdown.css({"left":"-9000px"});return this.results_showing=false;};Chosen.prototype.set_tab_index=function(el){var ti;if(this.form_field_jq.attr("tabindex")){ti=this.form_field_jq.attr("tabindex");this.form_field_jq.attr("tabindex",-1);if(this.is_multiple){return this.search_field.attr("tabindex",ti);}else{this.selected_item.attr("tabindex",ti);return this.search_field.attr("tabindex",-1);}}};Chosen.prototype.show_search_field_default=function(){if(this.is_multiple&&this.choices<1&&!this.active_field){this.search_field.val(this.default_text);return this.search_field.addClass("default");}else{this.search_field.val("");return this.search_field.removeClass("default");}};Chosen.prototype.search_results_mouseup=function(evt){var target;target=$(evt.target).hasClass("active-result")?$(evt.target):$(evt.target).parents(".active-result").first();if(target.length){this.result_highlight=target;return this.result_select(evt);}};Chosen.prototype.search_results_mouseover=function(evt){var target;target=$(evt.target).hasClass("active-result")?$(evt.target):$(evt.target).parents(".active-result").first();if(target)return this.result_do_highlight(target);};Chosen.prototype.search_results_mouseout=function(evt){if($(evt.target).hasClass("active-result"||$(evt.target).parents('.active-result').first())){return this.result_clear_highlight();}};Chosen.prototype.choices_click=function(evt){evt.preventDefault();if(this.active_field&&!($(evt.target).hasClass("search-choice"||$(evt.target).parents('.search-choice').first))&&!this.results_showing){return this.results_show();}};Chosen.prototype.choice_build=function(item){var choice_id,link,_this=this;choice_id=this.container_id+"_c_"+item.array_index;this.choices+=1;this.search_container.before('<li class="search-choice" id="'+choice_id+'"><span>'+item.html+'</span><a href="javascript:void(0)" class="search-choice-close" rel="'+item.array_index+'"></a></li>');link=$('#'+choice_id).find("a").first();return link.click(function(evt){return _this.choice_destroy_link_click(evt);});};Chosen.prototype.choice_destroy_link_click=function(evt){evt.preventDefault();if(!this.is_disabled){this.pending_destroy_click=true;return this.choice_destroy($(evt.target));}else{return evt.stopPropagation;}};Chosen.prototype.choice_destroy=function(link){this.choices-=1;this.show_search_field_default();if(this.is_multiple&&this.choices>0&&this.search_field.val().length<1){this.results_hide();}
this.result_deselect(link.attr("rel"));return link.parents('li').first().remove();};Chosen.prototype.results_reset=function(evt){this.form_field.options[0].selected=true;this.selected_item.find("span").text(this.default_text);this.show_search_field_default();$(evt.target).remove();this.form_field_jq.trigger("change");if(this.active_field)return this.results_hide();};Chosen.prototype.result_select=function(evt){var high,high_id,item,position;if(this.result_highlight){high=this.result_highlight;high_id=high.attr("id");this.result_clear_highlight();if(this.is_multiple){this.result_deactivate(high);}else{this.search_results.find(".result-selected").removeClass("result-selected");this.result_single_selected=high;}
high.addClass("result-selected");position=high_id.substr(high_id.lastIndexOf("_")+1);item=this.results_data[position];item.selected=true;this.form_field.options[item.options_index].selected=true;if(this.is_multiple){this.choice_build(item);}else{this.selected_item.find("span").first().text(item.text);if(this.allow_single_deselect)this.single_deselect_control_build();}
if(!(evt.metaKey&&this.is_multiple))this.results_hide();this.search_field.val("");this.form_field_jq.trigger("change");return this.search_field_scale();}};Chosen.prototype.result_activate=function(el){return el.addClass("active-result");};Chosen.prototype.result_deactivate=function(el){return el.removeClass("active-result");};Chosen.prototype.result_deselect=function(pos){var result,result_data;result_data=this.results_data[pos];result_data.selected=false;this.form_field.options[result_data.options_index].selected=false;result=$("#"+this.container_id+"_o_"+pos);result.removeClass("result-selected").addClass("active-result").show();this.result_clear_highlight();this.winnow_results();this.form_field_jq.trigger("change");return this.search_field_scale();};Chosen.prototype.single_deselect_control_build=function(){if(this.allow_single_deselect&&this.selected_item.find("abbr").length<1){return this.selected_item.find("span").first().after("<abbr class=\"search-choice-close\"></abbr>");}};Chosen.prototype.winnow_results=function(){var found,option,part,parts,regex,result,result_id,results,searchText,startpos,text,zregex,_i,_j,_len,_len2,_ref;this.no_results_clear();results=0;searchText=this.search_field.val()===this.default_text?"":$('<div/>').text($.trim(this.search_field.val())).html();regex=new RegExp(searchText.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"),'i')
zregex=new RegExp(searchText.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"),'i');_ref=this.results_data;for(_i=0,_len=_ref.length;_i<_len;_i++){option=_ref[_i];if(!option.disabled&&!option.empty){if(option.group){$('#'+option.dom_id).css('display','none');}else if(!(this.is_multiple&&option.selected)){found=false;result_id=option.dom_id;result=$("#"+result_id);if(regex.test(option.html)){found=true;results+=1;}else if(option.html.indexOf(" ")>=0||option.html.indexOf("[")===0){parts=option.html.replace(/\[|\]/g,"").split(" ");if(parts.length){for(_j=0,_len2=parts.length;_j<_len2;_j++){part=parts[_j];if(regex.test(part)){found=true;results+=1;}}}}
if(found){if(searchText.length){startpos=option.html.search(zregex);text=option.html.substr(0,startpos+searchText.length)+'</em>'+option.html.substr(startpos+searchText.length);text=text.substr(0,startpos)+'<em>'+text.substr(startpos);}else{text=option.html;}
result.html(text);this.result_activate(result);if(option.group_array_index!=null){$("#"+this.results_data[option.group_array_index].dom_id).css('display','list-item');}}else{if(this.result_highlight&&result_id===this.result_highlight.attr('id')){this.result_clear_highlight();}
this.result_deactivate(result);}}}}
if(results<1&&searchText.length){return this.no_results(searchText);}else{return this.winnow_results_set_highlight();}};Chosen.prototype.winnow_results_clear=function(){var li,lis,_i,_len,_results;this.search_field.val("");lis=this.search_results.find("li");_results=[];for(_i=0,_len=lis.length;_i<_len;_i++){li=lis[_i];li=$(li);if(li.hasClass("group-result")){_results.push(li.css('display','auto'));}else if(!this.is_multiple||!li.hasClass("result-selected")){_results.push(this.result_activate(li));}else{_results.push(void 0);}}
return _results;};Chosen.prototype.winnow_results_set_highlight=function(){var do_high,selected_results;if(!this.result_highlight){selected_results=!this.is_multiple?this.search_results.find(".result-selected.active-result"):[];do_high=selected_results.length?selected_results.first():this.search_results.find(".active-result").first();if(do_high!=null)return this.result_do_highlight(do_high);}};Chosen.prototype.no_results=function(terms){var no_results_html;no_results_html=$('<li class="no-results">'+this.results_none_found+' "<span></span>"</li>');no_results_html.find("span").first().html(terms);return this.search_results.append(no_results_html);};Chosen.prototype.no_results_clear=function(){return this.search_results.find(".no-results").remove();};Chosen.prototype.keydown_arrow=function(){var first_active,next_sib;if(!this.result_highlight){first_active=this.search_results.find("li.active-result").first();if(first_active)this.result_do_highlight($(first_active));}else if(this.results_showing){next_sib=this.result_highlight.nextAll("li.active-result").first();if(next_sib)this.result_do_highlight(next_sib);}
if(!this.results_showing)return this.results_show();};Chosen.prototype.keyup_arrow=function(){var prev_sibs;if(!this.results_showing&&!this.is_multiple){return this.results_show();}else if(this.result_highlight){prev_sibs=this.result_highlight.prevAll("li.active-result");if(prev_sibs.length){return this.result_do_highlight(prev_sibs.first());}else{if(this.choices>0)this.results_hide();return this.result_clear_highlight();}}};Chosen.prototype.keydown_backstroke=function(){if(this.pending_backstroke){this.choice_destroy(this.pending_backstroke.find("a").first());return this.clear_backstroke();}else{this.pending_backstroke=this.search_container.siblings("li.search-choice").last();return this.pending_backstroke.addClass("search-choice-focus");}};Chosen.prototype.clear_backstroke=function(){if(this.pending_backstroke){this.pending_backstroke.removeClass("search-choice-focus");}
return this.pending_backstroke=null;};Chosen.prototype.keydown_checker=function(evt){var stroke,_ref;stroke=(_ref=evt.which)!=null?_ref:evt.keyCode;this.search_field_scale();if(stroke!==8&&this.pending_backstroke)this.clear_backstroke();switch(stroke){case 8:this.backstroke_length=this.search_field.val().length;break;case 9:if(this.results_showing&&!this.is_multiple)this.result_select(evt);this.mouse_on_container=false;break;case 13:evt.preventDefault();break;case 38:evt.preventDefault();this.keyup_arrow();break;case 40:this.keydown_arrow();break;}};Chosen.prototype.search_field_scale=function(){var dd_top,div,h,style,style_block,styles,w,_i,_len;if(this.is_multiple){h=0;w=0;style_block="position:absolute; left: -1000px; top: -1000px; display:none;";styles=['font-size','font-style','font-weight','font-family','line-height','text-transform','letter-spacing'];for(_i=0,_len=styles.length;_i<_len;_i++){style=styles[_i];style_block+=style+":"+this.search_field.css(style)+";";}
div=$('<div />',{'style':style_block});div.text(this.search_field.val());$('body').append(div);w=div.width()+25;div.remove();if(w>this.f_width-10)w=this.f_width-10;this.search_field.css({'width':w+'px'});dd_top=this.container.height();return this.dropdown.css({"top":dd_top+"px"});}};Chosen.prototype.generate_random_id=function(){var string;string="sel"+this.generate_random_char()+this.generate_random_char()+this.generate_random_char();while($("#"+string).length>0){string+=this.generate_random_char();}
return string;};return Chosen;})(AbstractChosen);get_side_border_padding=function(elmt){var side_border_padding;return side_border_padding=elmt.outerWidth()-elmt.width();};root.get_side_border_padding=get_side_border_padding;}).call(this);window.originColor={hex2rgb:function(hex){if(hex[0]!='#')throw"Invalid hex color";hex=hex.replace(/[^0-9A-Fa-f]/,'');var rgb=[];if(hex.length==6){var c=parseInt(hex,16);rgb[0]=0xFF&(c>>0x10);rgb[1]=0xFF&(c>>0x8);rgb[2]=0xFF&c;}
else if(hex.length==3){rgb[0]=parseInt(Array(3).join(hex[0]),16);rgb[1]=parseInt(Array(3).join(hex[1]),16);rgb[2]=parseInt(Array(3).join(hex[2]),16);}
return rgb;},rgb2hex:function(rgb){var hex='#';var hexVal;for(var i=0;i<3;i++){hexVal=parseInt(rgb[i]+'',10).toString(16);if(hexVal.length==1)hexVal=0+''+hexVal;hex+=hexVal;}
return hex;},rgb2xyz:function(rgb){for(var i=0;i<3;i++)rgb[i]/=255;for(var i=0;i<3;i++){if(rgb[i]>0.04045){rgb[i]=Math.pow((rgb[i]+0.055)/1.055,2.4);}
else{rgb[i]=rgb[i]/12.92;}
rgb[i]=rgb[i]*100;}
var xyz=[];xyz[0]=rgb[0]*0.4124+rgb[1]*0.3576+rgb[2]*0.1805;xyz[1]=rgb[0]*0.2126+rgb[1]*0.7152+rgb[2]*0.0722;xyz[2]=rgb[0]*0.0193+rgb[1]*0.1192+rgb[2]*0.9505;return xyz;},xyz2rgb:function(xyz){xyz[0]/=100;xyz[1]/=100;xyz[2]/=100;var rgb=[];rgb[0]=xyz[0]*3.2406+xyz[1]*-1.5372+xyz[2]*-0.4986;rgb[1]=xyz[0]*-0.9689+xyz[1]*1.8758+xyz[2]*0.0415;rgb[2]=xyz[0]*0.0557+xyz[1]*-0.2040+xyz[2]*1.0570;for(var i=0;i<3;i++){if(rgb[i]>0.0031308){rgb[i]=1.055*Math.pow(rgb[i],(1/2.4))-0.055;}
else{rgb[i]=12.92*rgb[i];}}
rgb[0]=Math.round(Math.min(Math.max(rgb[0],0),1)*255);rgb[1]=Math.round(Math.min(Math.max(rgb[1],0),1)*255);rgb[2]=Math.round(Math.min(Math.max(rgb[2],0),1)*255);return rgb;},xyz2lab:function(xyz){xyz[0]=xyz[0]/95.047;xyz[1]=xyz[1]/100.000;xyz[2]=xyz[2]/108.883;for(var i=0;i<3;i++){if(xyz[i]>0.008856){xyz[i]=Math.pow(xyz[i],1/3);}
else{xyz[i]=(7.787*xyz[i])+(16/116);}}
var lab=[];lab[0]=(116*xyz[1])-16;lab[1]=500*(xyz[0]-xyz[1]);lab[2]=200*(xyz[1]-xyz[2]);for(var i=0;i<3;i++)lab[i]/=100;return lab;},lab2xyz:function(lab){for(var i=0;i<3;i++)lab[i]*=100;var xyz=[];xyz[1]=(lab[0]+16)/116;xyz[0]=lab[1]/500+xyz[1];xyz[2]=xyz[1]-lab[2]/200;for(var i=0;i<3;i++){if(Math.pow(xyz[i],3)>0.008856){xyz[i]=Math.pow(xyz[i],3);}
else{xyz[i]=(xyz[i]-16/116)/7.787;}}
xyz[0]*=95.047;xyz[1]*=100.000;xyz[2]*=108.883;return xyz;},rgb2lab:function(rgb){var xyz=this.rgb2xyz(rgb);return this.xyz2lab(xyz);},lab2rgb:function(lab){var xyz=this.lab2xyz(lab);return this.xyz2rgb(xyz);},lab2hex:function(lab){var rgb=this.lab2rgb(lab);return this.rgb2hex(rgb);},hex2lab:function(hex){var rgb=this.hex2rgb(hex);return this.rgb2lab(rgb);}};const kCHARSET_RULE_MISSING_SEMICOLON="Missing semicolon at the end of @charset rule";const kCHARSET_RULE_CHARSET_IS_STRING="The charset in the @charset rule should be a string";const kCHARSET_RULE_MISSING_WS="Missing mandatory whitespace after @charset";const kIMPORT_RULE_MISSING_URL="Missing URL in @import rule";const kURL_EOF="Unexpected end of stylesheet";const kURL_WS_INSIDE="Multiple tokens inside a url() notation";const kVARIABLES_RULE_POSITION="@variables rule invalid at this position in the stylesheet";const kIMPORT_RULE_POSITION="@import rule invalid at this position in the stylesheet";const kNAMESPACE_RULE_POSITION="@namespace rule invalid at this position in the stylesheet";const kCHARSET_RULE_CHARSET_SOF="@charset rule invalid at this position in the stylesheet";const kUNKNOWN_AT_RULE="Unknow @-rule";const kENGINES=["webkit","presto","trident","generic"];const kCSS_VENDOR_VALUES={"-moz-box":{"webkit":"-webkit-box","presto":"","trident":"","generic":"box"},"-moz-inline-box":{"webkit":"-webkit-inline-box","presto":"","trident":"","generic":"inline-box"},"-moz-initial":{"webkit":"","presto":"","trident":"","generic":"initial"},"-moz-linear-gradient":{"webkit20110101":FilterLinearGradientForOutput,"webkit":FilterLinearGradientForOutput,"presto":"","trident":"","generic":FilterLinearGradientForOutput},"-moz-radial-gradient":{"webkit20110101":FilterRadialGradientForOutput,"webkit":FilterRadialGradientForOutput,"presto":"","trident":"","generic":FilterRadialGradientForOutput},"-moz-repeating-linear-gradient":{"webkit20110101":"","webkit":FilterRepeatingGradientForOutput,"presto":"","trident":"","generic":FilterRepeatingGradientForOutput},"-moz-repeating-radial-gradient":{"webkit20110101":"","webkit":FilterRepeatingGradientForOutput,"presto":"","trident":"","generic":FilterRepeatingGradientForOutput}};const kCSS_VENDOR_PREFIXES={"lastUpdate":1304175007,"properties":[{"gecko":"","webkit":"","presto":"","trident":"-ms-accelerator","status":"P"},{"gecko":"","webkit":"","presto":"-wap-accesskey","trident":"","status":""},{"gecko":"-moz-animation","webkit":"-webkit-animation","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-delay","webkit":"-webkit-animation-delay","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-direction","webkit":"-webkit-animation-direction","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-duration","webkit":"-webkit-animation-duration","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-fill-mode","webkit":"-webkit-animation-fill-mode","presto":"","trident":"","status":"ED"},{"gecko":"-moz-animation-iteration-count","webkit":"-webkit-animation-iteration-count","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-name","webkit":"-webkit-animation-name","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-play-state","webkit":"-webkit-animation-play-state","presto":"","trident":"","status":"WD"},{"gecko":"-moz-animation-timing-function","webkit":"-webkit-animation-timing-function","presto":"","trident":"","status":"WD"},{"gecko":"-moz-appearance","webkit":"-webkit-appearance","presto":"","trident":"","status":"CR"},{"gecko":"","webkit":"-webkit-backface-visibility","presto":"","trident":"","status":"WD"},{"gecko":"background-clip","webkit":"-webkit-background-clip","presto":"background-clip","trident":"background-clip","status":"WD"},{"gecko":"","webkit":"-webkit-background-composite","presto":"","trident":"","status":""},{"gecko":"-moz-background-inline-policy","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"background-origin","webkit":"-webkit-background-origin","presto":"background-origin","trident":"background-origin","status":"WD"},{"gecko":"","webkit":"background-position-x","presto":"","trident":"-ms-background-position-x","status":""},{"gecko":"","webkit":"background-position-y","presto":"","trident":"-ms-background-position-y","status":""},{"gecko":"background-size","webkit":"-webkit-background-size","presto":"background-size","trident":"background-size","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-behavior","status":""},{"gecko":"-moz-binding","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"","presto":"","trident":"-ms-block-progression","status":""},{"gecko":"","webkit":"-webkit-border-after","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-after-color","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-after-style","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-after-width","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-before","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-before-color","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-before-style","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-before-width","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-bottom-colors","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"border-bottom-left-radius","webkit":"-webkit-border-bottom-left-radius","presto":"border-bottom-left-radius","trident":"border-bottom-left-radius","status":"WD"},{"gecko":"","webkit":"-webkit-border-bottom-left-radius = border-bottom-left-radius","presto":"","trident":"","status":""},{"gecko":"border-bottom-right-radius","webkit":"-webkit-border-bottom-right-radius","presto":"border-bottom-right-radius","trident":"border-bottom-right-radius","status":"WD"},{"gecko":"","webkit":"-webkit-border-bottom-right-radius = border-bottom-right-radius","presto":"","trident":"","status":""},{"gecko":"-moz-border-end","webkit":"-webkit-border-end","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-end-color","webkit":"-webkit-border-end-color","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-end-style","webkit":"-webkit-border-end-style","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-end-width","webkit":"-webkit-border-end-width","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-border-fit","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-border-horizontal-spacing","presto":"","trident":"","status":""},{"gecko":"-moz-border-image","webkit":"-webkit-border-image","presto":"-o-border-image","trident":"","status":"WD"},{"gecko":"-moz-border-left-colors","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"border-radius","webkit":"-webkit-border-radius","presto":"border-radius","trident":"border-radius","status":"WD"},{"gecko":"-moz-border-right-colors","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-border-start","webkit":"-webkit-border-start","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-start-color","webkit":"-webkit-border-start-color","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-start-style","webkit":"-webkit-border-start-style","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-start-width","webkit":"-webkit-border-start-width","presto":"","trident":"","status":"ED"},{"gecko":"-moz-border-top-colors","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"border-top-left-radius","webkit":"-webkit-border-top-left-radius","presto":"border-top-left-radius","trident":"border-top-left-radius","status":"WD"},{"gecko":"","webkit":"-webkit-border-top-left-radius = border-top-left-radius","presto":"","trident":"","status":""},{"gecko":"border-top-right-radius","webkit":"-webkit-border-top-right-radius","presto":"border-top-right-radius","trident":"border-top-right-radius","status":"WD"},{"gecko":"","webkit":"-webkit-border-top-right-radius = border-top-right-radius","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-border-vertical-spacing","presto":"","trident":"","status":""},{"gecko":"-moz-box-align","webkit":"-webkit-box-align","presto":"","trident":"-ms-box-align","status":"WD"},{"gecko":"-moz-box-direction","webkit":"-webkit-box-direction","presto":"","trident":"-ms-box-direction","status":"WD"},{"gecko":"-moz-box-flex","webkit":"-webkit-box-flex","presto":"","trident":"-ms-box-flex","status":"WD"},{"gecko":"","webkit":"-webkit-box-flex-group","presto":"","trident":"","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-box-line-progression","status":""},{"gecko":"","webkit":"-webkit-box-lines","presto":"","trident":"-ms-box-lines","status":"WD"},{"gecko":"-moz-box-ordinal-group","webkit":"-webkit-box-ordinal-group","presto":"","trident":"-ms-box-ordinal-group","status":"WD"},{"gecko":"-moz-box-orient","webkit":"-webkit-box-orient","presto":"","trident":"-ms-box-orient","status":"WD"},{"gecko":"-moz-box-pack","webkit":"-webkit-box-pack","presto":"","trident":"-ms-box-pack","status":"WD"},{"gecko":"","webkit":"-webkit-box-reflect","presto":"","trident":"","status":""},{"gecko":"box-shadow","webkit":"-webkit-box-shadow","presto":"box-shadow","trident":"box-shadow","status":"WD"},{"gecko":"-moz-box-sizing","webkit":"box-sizing","presto":"box-sizing","trident":"","status":"CR"},{"gecko":"","webkit":"-webkit-box-sizing = box-sizing","presto":"","trident":"","status":""},{"gecko":"","webkit":"-epub-caption-side = caption-side","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-color-correction","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-column-break-after","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-column-break-before","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-column-break-inside","presto":"","trident":"","status":""},{"gecko":"-moz-column-count","webkit":"-webkit-column-count","presto":"column-count","trident":"column-count","status":"CR"},{"gecko":"-moz-column-gap","webkit":"-webkit-column-gap","presto":"column-gap","trident":"column-gap","status":"CR"},{"gecko":"-moz-column-rule","webkit":"-webkit-column-rule","presto":"column-rule","trident":"column-rule","status":"CR"},{"gecko":"-moz-column-rule-color","webkit":"-webkit-column-rule-color","presto":"column-rule-color","trident":"column-rule-color","status":"CR"},{"gecko":"-moz-column-rule-style","webkit":"-webkit-column-rule-style","presto":"column-rule-style","trident":"column-rule-style","status":"CR"},{"gecko":"-moz-column-rule-width","webkit":"-webkit-column-rule-width","presto":"column-rule-width","trident":"column-rule-width","status":"CR"},{"gecko":"","webkit":"-webkit-column-span","presto":"column-span","trident":"column-span","status":"CR"},{"gecko":"-moz-column-width","webkit":"-webkit-column-width","presto":"column-width","trident":"column-width","status":"CR"},{"gecko":"","webkit":"-webkit-columns","presto":"columns","trident":"columns","status":"CR"},{"gecko":"","webkit":"-webkit-dashboard-region","presto":"-apple-dashboard-region","trident":"","status":""},{"gecko":"filter","webkit":"","presto":"filter","trident":"-ms-filter","status":""},{"gecko":"-moz-float-edge","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"","presto":"-o-focus-opacity","trident":"","status":""},{"gecko":"-moz-font-feature-settings","webkit":"","presto":"","trident":"","status":""},{"gecko":"-moz-font-language-override","webkit":"","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-font-size-delta","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-font-smoothing","presto":"","trident":"","status":""},{"gecko":"-moz-force-broken-image-icon","webkit":"","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-column","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-column-align","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-column-span","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-columns","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-layer","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-row","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-row-align","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-row-span","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-grid-rows","status":"WD"},{"gecko":"","webkit":"-webkit-highlight","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-hyphenate-character","presto":"","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-hyphenate-limit-after","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-hyphenate-limit-before","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-hyphens","presto":"","trident":"","status":"WD"},{"gecko":"","webkit":"-epub-hyphens = -webkit-hyphens","presto":"","trident":"","status":""},{"gecko":"-moz-image-region","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"ime-mode","webkit":"","presto":"","trident":"-ms-ime-mode","status":""},{"gecko":"","webkit":"","presto":"-wap-input-format","trident":"","status":""},{"gecko":"","webkit":"","presto":"-wap-input-required","trident":"","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-interpolation-mode","status":""},{"gecko":"","webkit":"","presto":"-xv-interpret-as","trident":"","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-layout-flow","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-layout-grid","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-layout-grid-char","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-layout-grid-line","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-layout-grid-mode","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-layout-grid-type","status":""},{"gecko":"","webkit":"-webkit-line-box-contain","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-line-break","presto":"","trident":"-ms-line-break","status":""},{"gecko":"","webkit":"-webkit-line-clamp","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-line-grid-mode","status":""},{"gecko":"","webkit":"","presto":"-o-link","trident":"","status":""},{"gecko":"","webkit":"","presto":"-o-link-source","trident":"","status":""},{"gecko":"","webkit":"-webkit-locale","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-logical-height","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-logical-width","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-margin-after","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-margin-after-collapse","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-margin-before","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-margin-before-collapse","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-margin-bottom-collapse","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-margin-collapse","presto":"","trident":"","status":""},{"gecko":"-moz-margin-end","webkit":"-webkit-margin-end","presto":"","trident":"","status":"ED"},{"gecko":"-moz-margin-start","webkit":"-webkit-margin-start","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-margin-top-collapse","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-marquee","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"-wap-marquee-dir","trident":"","status":""},{"gecko":"","webkit":"-webkit-marquee-direction","presto":"","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-marquee-increment","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"-wap-marquee-loop","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-marquee-repetition","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-marquee-speed","presto":"-wap-marquee-speed","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-marquee-style","presto":"-wap-marquee-style","trident":"","status":"WD"},{"gecko":"mask","webkit":"-webkit-mask","presto":"mask","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-attachment","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-box-image","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-clip","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-composite","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-image","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-origin","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-position","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-position-x","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-position-y","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-repeat","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-repeat-x","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-repeat-y","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-mask-size","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-match-nearest-mail-blockquote-color","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-max-logical-height","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-max-logical-width","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-min-logical-height","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-min-logical-width","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"","presto":"-o-mini-fold","trident":"","status":""},{"gecko":"","webkit":"-webkit-nbsp-mode","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"","presto":"-o-object-fit","trident":"","status":"ED"},{"gecko":"","webkit":"","presto":"-o-object-position","trident":"","status":"ED"},{"gecko":"opacity","webkit":"-webkit-opacity","presto":"opacity","trident":"opacity","status":"WD"},{"gecko":"","webkit":"-webkit-opacity = opacity","presto":"","trident":"","status":""},{"gecko":"-moz-outline-radius","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-outline-radius-bottomleft","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-outline-radius-bottomright","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-outline-radius-topleft","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-outline-radius-topright","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"overflow-x","webkit":"overflow-x","presto":"overflow-x","trident":"-ms-overflow-x","status":"WD"},{"gecko":"overflow-y","webkit":"overflow-y","presto":"overflow-y","trident":"-ms-overflow-y","status":"WD"},{"gecko":"","webkit":"-webkit-padding-after","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-padding-before","presto":"","trident":"","status":"ED"},{"gecko":"-moz-padding-end","webkit":"-webkit-padding-end","presto":"","trident":"","status":"ED"},{"gecko":"-moz-padding-start","webkit":"-webkit-padding-start","presto":"","trident":"","status":"ED"},{"gecko":"","webkit":"-webkit-perspective","presto":"","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-perspective-origin","presto":"","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-perspective-origin-x","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-perspective-origin-y","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-phonemes","trident":"","status":""},{"gecko":"","webkit":"-webkit-rtl-ordering","presto":"","trident":"","status":"P"},{"gecko":"-moz-script-level","webkit":"","presto":"","trident":"","status":""},{"gecko":"-moz-script-min-size","webkit":"","presto":"","trident":"","status":""},{"gecko":"-moz-script-size-multiplier","webkit":"","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"scrollbar-3dlight-color","trident":"-ms-scrollbar-3dlight-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-arrow-color","trident":"-ms-scrollbar-arrow-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-base-color","trident":"-ms-scrollbar-base-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-darkshadow-color","trident":"-ms-scrollbar-darkshadow-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-face-color","trident":"-ms-scrollbar-face-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-highlight-color","trident":"-ms-scrollbar-highlight-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-shadow-color","trident":"-ms-scrollbar-shadow-color","status":"P"},{"gecko":"","webkit":"","presto":"scrollbar-track-color","trident":"-ms-scrollbar-track-color","status":"P"},{"gecko":"-moz-stack-sizing","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-svg-shadow","presto":"","trident":"","status":""},{"gecko":"-moz-tab-size","webkit":"","presto":"-o-tab-size","trident":"","status":""},{"gecko":"","webkit":"","presto":"-o-table-baseline","trident":"","status":""},{"gecko":"","webkit":"-webkit-tap-highlight-color","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"","presto":"","trident":"-ms-text-align-last","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-text-autospace","status":"WD"},{"gecko":"-moz-text-blink","webkit":"","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-combine","presto":"","trident":"","status":""},{"gecko":"","webkit":"-epub-text-combine = -webkit-text-combine","presto":"","trident":"","status":""},{"gecko":"-moz-text-decoration-color","webkit":"","presto":"","trident":"","status":""},{"gecko":"-moz-text-decoration-line","webkit":"","presto":"","trident":"","status":""},{"gecko":"-moz-text-decoration-style","webkit":"","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-decorations-in-effect","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-emphasis","presto":"","trident":"","status":""},{"gecko":"","webkit":"-epub-text-emphasis = -webkit-text-emphasis","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-emphasis-color","presto":"","trident":"","status":""},{"gecko":"","webkit":"-epub-text-emphasis-color = -webkit-text-emphasis-color","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-emphasis-position","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-emphasis-style","presto":"","trident":"","status":""},{"gecko":"","webkit":"-epub-text-emphasis-style = -webkit-text-emphasis-style","presto":"","trident":"","status":""},{"gecko":"","webkit":"-webkit-text-fill-color","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"","presto":"","trident":"-ms-text-justify","status":"WD"},{"gecko":"","webkit":"","presto":"","trident":"-ms-text-kashida-space","status":"P"},{"gecko":"","webkit":"-webkit-text-orientation","presto":"","trident":"","status":""},{"gecko":"","webkit":"-epub-text-orientation = -webkit-text-orientation","presto":"","trident":"","status":""},{"gecko":"","webkit":"text-overflow","presto":"text-overflow","trident":"-ms-text-overflow","status":"WD"},{"gecko":"","webkit":"-webkit-text-security","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-text-size-adjust","presto":"","trident":"-ms-text-size-adjust","status":""},{"gecko":"","webkit":"-webkit-text-stroke","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-text-stroke-color","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-text-stroke-width","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-epub-text-transform = text-transform","presto":"","trident":"","status":""},{"gecko":"","webkit":"","presto":"","trident":"-ms-text-underline-position","status":"P"},{"gecko":"","webkit":"-webkit-touch-callout","presto":"","trident":"","status":"P"},{"gecko":"-moz-transform","webkit":"-webkit-transform","presto":"-o-transform","trident":"-ms-transform","status":"WD"},{"gecko":"-moz-transform-origin","webkit":"-webkit-transform-origin","presto":"-o-transform-origin","trident":"-ms-transform-origin","status":"WD"},{"gecko":"","webkit":"-webkit-transform-origin-x","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-transform-origin-y","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-transform-origin-z","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"-webkit-transform-style","presto":"","trident":"","status":"WD"},{"gecko":"-moz-transition","webkit":"-webkit-transition","presto":"-o-transition","trident":"","status":"WD"},{"gecko":"-moz-transition-delay","webkit":"-webkit-transition-delay","presto":"-o-transition-delay","trident":"","status":"WD"},{"gecko":"-moz-transition-duration","webkit":"-webkit-transition-duration","presto":"-o-transition-duration","trident":"","status":"WD"},{"gecko":"-moz-transition-property","webkit":"-webkit-transition-property","presto":"-o-transition-property","trident":"","status":"WD"},{"gecko":"-moz-transition-timing-function","webkit":"-webkit-transition-timing-function","presto":"-o-transition-timing-function","trident":"","status":"WD"},{"gecko":"","webkit":"-webkit-user-drag","presto":"","trident":"","status":"P"},{"gecko":"-moz-user-focus","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-user-input","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"-moz-user-modify","webkit":"-webkit-user-modify","presto":"","trident":"","status":"P"},{"gecko":"-moz-user-select","webkit":"-webkit-user-select","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"","presto":"-xv-voice-balance","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-voice-duration","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-voice-pitch","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-voice-pitch-range","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-voice-rate","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-voice-stress","trident":"","status":""},{"gecko":"","webkit":"","presto":"-xv-voice-volume","trident":"","status":""},{"gecko":"-moz-window-shadow","webkit":"","presto":"","trident":"","status":"P"},{"gecko":"","webkit":"word-break","presto":"","trident":"-ms-word-break","status":"WD"},{"gecko":"","webkit":"-epub-word-break = word-break","presto":"","trident":"","status":""},{"gecko":"word-wrap","webkit":"word-wrap","presto":"word-wrap","trident":"-ms-word-wrap","status":"WD"},{"gecko":"","webkit":"-webkit-writing-mode","presto":"writing-mode","trident":"-ms-writing-mode","status":"ED"},{"gecko":"","webkit":"-epub-writing-mode = -webkit-writing-mode","presto":"","trident":"","status":""},{"gecko":"","webkit":"zoom","presto":"","trident":"-ms-zoom","status":""}]};const kCSS_PREFIXED_VALUE=[{"gecko":"-moz-box","webkit":"-moz-box","presto":"","trident":"","generic":"box"}];var CssInspector={mVENDOR_PREFIXES:null,kEXPORTS_FOR_GECKO:true,kEXPORTS_FOR_WEBKIT:true,kEXPORTS_FOR_PRESTO:true,kEXPORTS_FOR_TRIDENT:true,cleanPrefixes:function()
{this.mVENDOR_PREFIXES=null;},prefixesForProperty:function(aProperty)
{if(!this.mVENDOR_PREFIXES){this.mVENDOR_PREFIXES={};for(var i=0;i<kCSS_VENDOR_PREFIXES.properties.length;i++){var p=kCSS_VENDOR_PREFIXES.properties[i];if(p.gecko&&(p.webkit||p.presto||p.trident)){var o={};if(this.kEXPORTS_FOR_GECKO)o[p.gecko]=true;if(this.kEXPORTS_FOR_WEBKIT&&p.webkit)o[p.webkit]=true;if(this.kEXPORTS_FOR_PRESTO&&p.presto)o[p.presto]=true;if(this.kEXPORTS_FOR_TRIDENT&&p.trident)o[p.trident]=true;this.mVENDOR_PREFIXES[p.gecko]=[];for(var j in o)
this.mVENDOR_PREFIXES[p.gecko].push(j)}}}
if(aProperty in this.mVENDOR_PREFIXES)
return this.mVENDOR_PREFIXES[aProperty].sort();return null;},parseColorStop:function(parser,token)
{var color=parser.parseColor(token);var position="";if(!color)
return null;token=parser.getToken(true,true);if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){position=token.value;token=parser.getToken(true,true);}
return{color:color,position:position}},parseGradient:function(parser,token)
{var isRadial=false;var gradient={isRepeating:false};if(token.isNotNull()){if(token.isFunction("-moz-linear-gradient(")||token.isFunction("-moz-radial-gradient(")||token.isFunction("-moz-repeating-linear-gradient(")||token.isFunction("-moz-repeating-radial-gradient(")){if(token.isFunction("-moz-radial-gradient(")||token.isFunction("-moz-repeating-radial-gradient(")){gradient.isRadial=true;}
if(token.isFunction("-moz-repeating-linear-gradient(")||token.isFunction("-moz-repeating-radial-gradient(")){gradient.isRepeating=true;}
token=parser.getToken(true,true);var haveGradientLine=false;var foundHorizPosition=false;var haveAngle=false;if(token.isAngle()){gradient.angle=token.value;haveGradientLine=true;haveAngle=true;token=parser.getToken(true,true);}
if(token.isLength()||token.isIdent("top")||token.isIdent("center")||token.isIdent("bottom")||token.isIdent("left")||token.isIdent("right")){haveGradientLine=true;if(token.isLength()||token.isIdent("left")||token.isIdent("right")){foundHorizPosition=true;}
gradient.position=token.value;token=parser.getToken(true,true);}
if(haveGradientLine){if(!haveAngle&&token.isAngle()){gradient.angle=token.value;haveAngle=true;token=parser.getToken(true,true);}
else if(token.isLength()||(foundHorizPosition&&(token.isIdent("top")||token.isIdent("center")||token.isIdent("bottom")))||(!foundHorizPosition&&(token.isLength()||token.isIdent("top")||token.isIdent("center")||token.isIdent("bottom")||token.isIdent("left")||token.isIdent("right")))){gradient.position=("position"in gradient)?gradient.position+" ":"";gradient.position+=token.value;token=parser.getToken(true,true);}
if(!haveAngle&&token.isAngle()){gradient.angle=token.value;haveAngle=true;token=parser.getToken(true,true);}
if(!token.isSymbol(","))
return null;token=parser.getToken(true,true);}
if(gradient.isRadial){if(token.isIdent("circle")||token.isIdent("ellipse")){gradient.shape=token.value;token=parser.getToken(true,true);}
if(token.isIdent("closest-side")||token.isIdent("closest-corner")||token.isIdent("farthest-side")||token.isIdent("farthest-corner")||token.isIdent("contain")||token.isIdent("cover")){gradient.size=token.value;token=parser.getToken(true,true);}
if(!("shape"in gradient)&&(token.isIdent("circle")||token.isIdent("ellipse"))){gradient.shape=token.value;token=parser.getToken(true,true);}
if((("shape"in gradient)||("size"in gradient))&&!token.isSymbol(","))
return null;else if(("shape"in gradient)||("size"in gradient))
token=parser.getToken(true,true);}
var stop1=this.parseColorStop(parser,token);if(!stop1)
return null;token=parser.currentToken();if(!token.isSymbol(","))
return null;token=parser.getToken(true,true);var stop2=this.parseColorStop(parser,token);if(!stop2)
return null;token=parser.currentToken();if(token.isSymbol(",")){token=parser.getToken(true,true);}
gradient.stops=[stop1,stop2];while(!token.isSymbol(")")){var colorstop=this.parseColorStop(parser,token);if(!colorstop)
return null;token=parser.currentToken();if(!token.isSymbol(")")&&!token.isSymbol(","))
return null;if(token.isSymbol(","))
token=parser.getToken(true,true);gradient.stops.push(colorstop);}
return gradient;}}
return null;},parseBoxShadows:function(aString)
{var parser=new CSSParser();parser._init();parser.mPreserveWS=false;parser.mPreserveComments=false;parser.mPreservedTokens=[];parser.mScanner.init(aString);var shadows=[];var token=parser.getToken(true,true);var color="",blurRadius="0px",offsetX="0px",offsetY="0px",spreadRadius="0px";var inset=false;while(token.isNotNull()){if(token.isIdent("none")){shadows.push({none:true});token=parser.getToken(true,true);}
else{if(token.isIdent('inset')){inset=true;token=parser.getToken(true,true);}
if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var offsetX=token.value;token=parser.getToken(true,true);}
else
return[];if(!inset&&token.isIdent('inset')){inset=true;token=parser.getToken(true,true);}
if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var offsetX=token.value;token=parser.getToken(true,true);}
else
return[];if(!inset&&token.isIdent('inset')){inset=true;token=parser.getToken(true,true);}
if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var blurRadius=token.value;token=parser.getToken(true,true);}
if(!inset&&token.isIdent('inset')){inset=true;token=parser.getToken(true,true);}
if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var spreadRadius=token.value;token=parser.getToken(true,true);}
if(!inset&&token.isIdent('inset')){inset=true;token=parser.getToken(true,true);}
if(token.isFunction("rgb(")||token.isFunction("rgba(")||token.isFunction("hsl(")||token.isFunction("hsla(")||token.isSymbol("#")||token.isIdent()){var color=parser.parseColor(token);token=parser.getToken(true,true);}
if(!inset&&token.isIdent('inset')){inset=true;token=parser.getToken(true,true);}
shadows.push({none:false,color:color,offsetX:offsetX,offsetY:offsetY,blurRadius:blurRadius,spreadRadius:spreadRadius});if(token.isSymbol(",")){inset=false;color="";blurRadius="0px";spreadRadius="0px"
offsetX="0px";offsetY="0px";token=parser.getToken(true,true);}
else if(!token.isNotNull())
return shadows;else
return[];}}
return shadows;},parseTextShadows:function(aString)
{var parser=new CSSParser();parser._init();parser.mPreserveWS=false;parser.mPreserveComments=false;parser.mPreservedTokens=[];parser.mScanner.init(aString);var shadows=[];var token=parser.getToken(true,true);var color="",blurRadius="0px",offsetX="0px",offsetY="0px";while(token.isNotNull()){if(token.isIdent("none")){shadows.push({none:true});token=parser.getToken(true,true);}
else{if(token.isFunction("rgb(")||token.isFunction("rgba(")||token.isFunction("hsl(")||token.isFunction("hsla(")||token.isSymbol("#")||token.isIdent()){var color=parser.parseColor(token);token=parser.getToken(true,true);}
if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var offsetX=token.value;token=parser.getToken(true,true);}
else
return[];if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var offsetY=token.value;token=parser.getToken(true,true);}
else
return[];if(token.isPercentage()||token.isDimensionOfUnit("cm")||token.isDimensionOfUnit("mm")||token.isDimensionOfUnit("in")||token.isDimensionOfUnit("pc")||token.isDimensionOfUnit("px")||token.isDimensionOfUnit("em")||token.isDimensionOfUnit("ex")||token.isDimensionOfUnit("pt")){var blurRadius=token.value;token=parser.getToken(true,true);}
if(!color&&(token.isFunction("rgb(")||token.isFunction("rgba(")||token.isFunction("hsl(")||token.isFunction("hsla(")||token.isSymbol("#")||token.isIdent())){var color=parser.parseColor(token);token=parser.getToken(true,true);}
shadows.push({none:false,color:color,offsetX:offsetX,offsetY:offsetY,blurRadius:blurRadius});if(token.isSymbol(",")){color="";blurRadius="0px";offsetX="0px";offsetY="0px";token=parser.getToken(true,true);}
else if(!token.isNotNull())
return shadows;else
return[];}}
return shadows;},parseBackgroundImages:function(aString)
{var parser=new CSSParser();parser._init();parser.mPreserveWS=false;parser.mPreserveComments=false;parser.mPreservedTokens=[];parser.mScanner.init(aString);var backgrounds=[];var token=parser.getToken(true,true);while(token.isNotNull()){if(token.isFunction("url(")){token=parser.getToken(true,true);var urlContent=parser.parseURL(token);backgrounds.push({type:"image",value:"url("+urlContent});token=parser.getToken(true,true);}
else if(token.isFunction("-moz-linear-gradient(")||token.isFunction("-moz-radial-gradient(")||token.isFunction("-moz-repeating-linear-gradient(")||token.isFunction("-moz-repeating-radial-gradient(")){var gradient=this.parseGradient(parser,token);backgrounds.push({type:gradient.isRadial?"radial-gradient":"linear-gradient",value:gradient});token=parser.getToken(true,true);}
else
return null;if(token.isSymbol(",")){token=parser.getToken(true,true);if(!token.isNotNull())
return null;}}
return backgrounds;},serializeGradient:function(gradient)
{var s=gradient.isRadial?(gradient.isRepeating?"-moz-repeating-radial-gradient(":"-moz-radial-gradient("):(gradient.isRepeating?"-moz-repeating-linear-gradient(":"-moz-linear-gradient(");if(gradient.angle||gradient.position)
s+=(gradient.angle?gradient.angle+" ":"")+
(gradient.position?gradient.position:"")+", ";if(gradient.isRadial&&(gradient.shape||gradient.size))
s+=(gradient.shape?gradient.shape:"")+" "+
(gradient.size?gradient.size:"")+", ";for(var i=0;i<gradient.stops.length;i++){var colorstop=gradient.stops[i];s+=colorstop.color+(colorstop.position?" "+colorstop.position:"");if(i!=gradient.stops.length-1)
s+=", ";}
s+=")";return s;},parseBorderImage:function(aString)
{var parser=new CSSParser();parser._init();parser.mPreserveWS=false;parser.mPreserveComments=false;parser.mPreservedTokens=[];parser.mScanner.init(aString);var borderImage={url:"",offsets:[],widths:[],sizes:[]};var token=parser.getToken(true,true);if(token.isFunction("url(")){token=parser.getToken(true,true);var urlContent=parser.parseURL(token);if(urlContent){borderImage.url=urlContent.substr(0,urlContent.length-1).trim();if((borderImage.url[0]=='"'&&borderImage.url[borderImage.url.length-1]=='"')||(borderImage.url[0]=="'"&&borderImage.url[borderImage.url.length-1]=="'"))
borderImage.url=borderImage.url.substr(1,borderImage.url.length-2);}
else
return null;}
else
return null;token=parser.getToken(true,true);if(token.isNumber()||token.isPercentage())
borderImage.offsets.push(token.value);else
return null;var i;for(i=0;i<3;i++){token=parser.getToken(true,true);if(token.isNumber()||token.isPercentage())
borderImage.offsets.push(token.value);else
break;}
if(i==3)
token=parser.getToken(true,true);if(token.isSymbol("/")){token=parser.getToken(true,true);if(token.isDimension()||token.isNumber("0")||(token.isIdent()&&token.value in parser.kBORDER_WIDTH_NAMES))
borderImage.widths.push(token.value);else
return null;for(var i=0;i<3;i++){token=parser.getToken(true,true);if(token.isDimension()||token.isNumber("0")||(token.isIdent()&&token.value in parser.kBORDER_WIDTH_NAMES))
borderImage.widths.push(token.value);else
break;}
if(i==3)
token=parser.getToken(true,true);}
for(var i=0;i<2;i++){if(token.isIdent("stretch")||token.isIdent("repeat")||token.isIdent("round"))
borderImage.sizes.push(token.value);else if(!token.isNotNull())
return borderImage;else
return null;token=parser.getToken(true,true);}
if(!token.isNotNull())
return borderImage;return null;},parseMediaQuery:function(aString)
{const kCONSTRAINTS={"width":true,"min-width":true,"max-width":true,"height":true,"min-height":true,"max-height":true,"device-width":true,"min-device-width":true,"max-device-width":true,"device-height":true,"min-device-height":true,"max-device-height":true,"orientation":true,"aspect-ratio":true,"min-aspect-ratio":true,"max-aspect-ratio":true,"device-aspect-ratio":true,"min-device-aspect-ratio":true,"max-device-aspect-ratio":true,"color":true,"min-color":true,"max-color":true,"color-index":true,"min-color-index":true,"max-color-index":true,"monochrome":true,"min-monochrome":true,"max-monochrome":true,"resolution":true,"min-resolution":true,"max-resolution":true,"scan":true,"grid":true};var parser=new CSSParser();parser._init();parser.mPreserveWS=false;parser.mPreserveComments=false;parser.mPreservedTokens=[];parser.mScanner.init(aString);var m={amplifier:"",medium:"",constraints:[]};var token=parser.getToken(true,true);if(token.isIdent("all")||token.isIdent("aural")||token.isIdent("braille")||token.isIdent("handheld")||token.isIdent("print")||token.isIdent("projection")||token.isIdent("screen")||token.isIdent("tty")||token.isIdent("tv")){m.medium=token.value;token=parser.getToken(true,true);}
else if(token.isIdent("not")||token.isIdent("only")){m.amplifier=token.value;token=parser.getToken(true,true);if(token.isIdent("all")||token.isIdent("aural")||token.isIdent("braille")||token.isIdent("handheld")||token.isIdent("print")||token.isIdent("projection")||token.isIdent("screen")||token.isIdent("tty")||token.isIdent("tv")){m.medium=token.value;token=parser.getToken(true,true);}
else
return null;}
if(m.medium){if(!token.isNotNull())
return m;if(token.isIdent("and")){token=parser.getToken(true,true);}
else
return null;}
while(token.isSymbol("(")){token=parser.getToken(true,true);if(token.isIdent()&&(token.value in kCONSTRAINTS)){var constraint=token.value;token=parser.getToken(true,true);if(token.isSymbol(":")){token=parser.getToken(true,true);var values=[];while(!token.isSymbol(")")){values.push(token.value);token=parser.getToken(true,true);}
if(token.isSymbol(")")){m.constraints.push({constraint:constraint,value:values});token=parser.getToken(true,true);if(token.isNotNull()){if(token.isIdent("and")){token=parser.getToken(true,true);}
else
return null;}
else
return m;}
else
return null;}
else if(token.isSymbol(")")){m.constraints.push({constraint:constraint,value:null});token=parser.getToken(true,true);if(token.isNotNull()){if(token.isIdent("and")){token=parser.getToken(true,true);}
else
return null;}
else
return m;}
else
return null;}
else
return null;}
return m;}};var CSS_ESCAPE='\\';var IS_HEX_DIGIT=1;var START_IDENT=2;var IS_IDENT=4;var IS_WHITESPACE=8;var W=IS_WHITESPACE;var I=IS_IDENT;var S=START_IDENT;var SI=IS_IDENT|START_IDENT;var XI=IS_IDENT|IS_HEX_DIGIT;var XSI=IS_IDENT|START_IDENT|IS_HEX_DIGIT;function CSSScanner(aString)
{this.init(aString);}
CSSScanner.prototype={kLexTable:[0,0,0,0,0,0,0,0,0,W,W,0,W,W,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,W,0,0,0,0,0,0,0,0,0,0,0,0,I,0,0,XI,XI,XI,XI,XI,XI,XI,XI,XI,XI,0,0,0,0,0,0,0,XSI,XSI,XSI,XSI,XSI,XSI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,0,S,0,0,SI,0,XSI,XSI,XSI,XSI,XSI,XSI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI,SI],kHexValues:{"0":0,"1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"a":10,"b":11,"c":12,"d":13,"e":14,"f":15},mString:"",mPos:0,mPreservedPos:[],init:function(aString){this.mString=aString;this.mPos=0;this.mPreservedPos=[];},getCurrentPos:function(){return this.mPos;},getAlreadyScanned:function()
{return this.mString.substr(0,this.mPos);},preserveState:function(){this.mPreservedPos.push(this.mPos);},restoreState:function(){if(this.mPreservedPos.length){this.mPos=this.mPreservedPos.pop();}},forgetState:function(){if(this.mPreservedPos.length){this.mPreservedPos.pop();}},read:function(){if(this.mPos<this.mString.length)
return this.mString.charAt(this.mPos++);return-1;},peek:function(){if(this.mPos<this.mString.length)
return this.mString.charAt(this.mPos);return-1;},isHexDigit:function(c){var code=c.charCodeAt(0);return(code<256&&(this.kLexTable[code]&IS_HEX_DIGIT)!=0);},isIdentStart:function(c){var code=c.charCodeAt(0);return(code>=256||(this.kLexTable[code]&START_IDENT)!=0);},startsWithIdent:function(aFirstChar,aSecondChar){var code=aFirstChar.charCodeAt(0);return this.isIdentStart(aFirstChar)||(aFirstChar=="-"&&this.isIdentStart(aSecondChar));},isIdent:function(c){var code=c.charCodeAt(0);return(code>=256||(this.kLexTable[code]&IS_IDENT)!=0);},pushback:function(){this.mPos--;},nextHexValue:function(){var c=this.read();if(c==-1||!this.isHexDigit(c))
return new jscsspToken(jscsspToken.NULL_TYPE,null);var s=c;c=this.read();while(c!=-1&&this.isHexDigit(c)){s+=c;c=this.read();}
if(c!=-1)
this.pushback();return new jscsspToken(jscsspToken.HEX_TYPE,s);},gatherEscape:function(){var c=this.peek();if(c==-1)
return"";if(this.isHexDigit(c)){var code=0;for(var i=0;i<6;i++){c=this.read();if(this.isHexDigit(c))
code=code*16+this.kHexValues[c.toLowerCase()];else if(!this.isHexDigit(c)&&!this.isWhiteSpace(c)){this.pushback();break;}
else
break;}
if(i==6){c=this.peek();if(this.isWhiteSpace(c))
this.read();}
return String.fromCharCode(code);}
c=this.read();if(c!="\n")
return c;return"";},gatherIdent:function(c){var s="";if(c==CSS_ESCAPE)
s+=this.gatherEscape();else
s+=c;c=this.read();while(c!=-1&&(this.isIdent(c)||c==CSS_ESCAPE)){if(c==CSS_ESCAPE)
s+=this.gatherEscape();else
s+=c;c=this.read();}
if(c!=-1)
this.pushback();return s;},parseIdent:function(c){var value=this.gatherIdent(c);var nextChar=this.peek();if(nextChar=="("){value+=this.read();return new jscsspToken(jscsspToken.FUNCTION_TYPE,value);}
return new jscsspToken(jscsspToken.IDENT_TYPE,value);},isDigit:function(c){return(c>='0')&&(c<='9');},parseComment:function(c){var s=c;while((c=this.read())!=-1){s+=c;if(c=="*"){c=this.read();if(c==-1)
break;if(c=="/"){s+=c;break;}
this.pushback();}}
return new jscsspToken(jscsspToken.COMMENT_TYPE,s);},parseNumber:function(c){var s=c;var foundDot=false;while((c=this.read())!=-1){if(c=="."){if(foundDot)
break;else{s+=c;foundDot=true;}}else if(this.isDigit(c))
s+=c;else
break;}
if(c!=-1&&this.startsWithIdent(c,this.peek())){var unit=this.gatherIdent(c);s+=unit;return new jscsspToken(jscsspToken.DIMENSION_TYPE,s,unit);}
else if(c=="%"){s+="%";return new jscsspToken(jscsspToken.PERCENTAGE_TYPE,s);}
else if(c!=-1)
this.pushback();return new jscsspToken(jscsspToken.NUMBER_TYPE,s);},parseString:function(aStop){var s=aStop;var previousChar=aStop;var c;while((c=this.read())!=-1){if(c==aStop&&previousChar!=CSS_ESCAPE){s+=c;break;}
else if(c==CSS_ESCAPE){c=this.peek();if(c==-1)
break;else if(c=="\n"||c=="\r"||c=="\f"){d=c;c=this.read();if(d=="\r"){c=this.peek();if(c=="\n")
c=this.read();}}
else{s+=this.gatherEscape();c=this.peek();}}
else if(c=="\n"||c=="\r"||c=="\f"){break;}
else
s+=c;previousChar=c;}
return new jscsspToken(jscsspToken.STRING_TYPE,s);},isWhiteSpace:function(c){var code=c.charCodeAt(0);return code<256&&(this.kLexTable[code]&IS_WHITESPACE)!=0;},eatWhiteSpace:function(c){var s=c;while((c=this.read())!=-1){if(!this.isWhiteSpace(c))
break;s+=c;}
if(c!=-1)
this.pushback();return s;},parseAtKeyword:function(c){return new jscsspToken(jscsspToken.ATRULE_TYPE,this.gatherIdent(c));},nextToken:function(){var c=this.read();if(c==-1)
return new jscsspToken(jscsspToken.NULL_TYPE,null);if(this.startsWithIdent(c,this.peek()))
return this.parseIdent(c);if(c=='@'){var nextChar=this.read();if(nextChar!=-1){var followingChar=this.peek();this.pushback();if(this.startsWithIdent(nextChar,followingChar))
return this.parseAtKeyword(c);}}
if(c=="."||c=="+"||c=="-"){var nextChar=this.peek();if(this.isDigit(nextChar))
return this.parseNumber(c);else if(nextChar=="."&&c!="."){firstChar=this.read();var secondChar=this.peek();this.pushback();if(this.isDigit(secondChar))
return this.parseNumber(c);}}
if(this.isDigit(c)){return this.parseNumber(c);}
if(c=="'"||c=='"')
return this.parseString(c);if(this.isWhiteSpace(c)){var s=this.eatWhiteSpace(c);return new jscsspToken(jscsspToken.WHITESPACE_TYPE,s);}
if(c=="|"||c=="~"||c=="^"||c=="$"||c=="*"){var nextChar=this.read();if(nextChar=="="){switch(c){case"~":return new jscsspToken(jscsspToken.INCLUDES_TYPE,"~=");case"|":return new jscsspToken(jscsspToken.DASHMATCH_TYPE,"|=");case"^":return new jscsspToken(jscsspToken.BEGINSMATCH_TYPE,"^=");case"$":return new jscsspToken(jscsspToken.ENDSMATCH_TYPE,"$=");case"*":return new jscsspToken(jscsspToken.CONTAINSMATCH_TYPE,"*=");default:break;}}else if(nextChar!=-1)
this.pushback();}
if(c=="/"&&this.peek()=="*")
return this.parseComment(c);return new jscsspToken(jscsspToken.SYMBOL_TYPE,c);}};function CSSParser(aString)
{this.mToken=null;this.mLookAhead=null;this.mScanner=new CSSScanner(aString);this.mPreserveWS=true;this.mPreserveComments=true;this.mPreservedTokens=[];this.mError=null;}
CSSParser.prototype={_init:function(){this.mToken=null;this.mLookAhead=null;},kINHERIT:"inherit",kBORDER_WIDTH_NAMES:{"thin":true,"medium":true,"thick":true},kBORDER_STYLE_NAMES:{"none":true,"hidden":true,"dotted":true,"dashed":true,"solid":true,"double":true,"groove":true,"ridge":true,"inset":true,"outset":true},kCOLOR_NAMES:{"transparent":true,"black":true,"silver":true,"gray":true,"white":true,"maroon":true,"red":true,"purple":true,"fuchsia":true,"green":true,"lime":true,"olive":true,"yellow":true,"navy":true,"blue":true,"teal":true,"aqua":true,"aliceblue":true,"antiquewhite":true,"aqua":true,"aquamarine":true,"azure":true,"beige":true,"bisque":true,"black":true,"blanchedalmond":true,"blue":true,"blueviolet":true,"brown":true,"burlywood":true,"cadetblue":true,"chartreuse":true,"chocolate":true,"coral":true,"cornflowerblue":true,"cornsilk":true,"crimson":true,"cyan":true,"darkblue":true,"darkcyan":true,"darkgoldenrod":true,"darkgray":true,"darkgreen":true,"darkgrey":true,"darkkhaki":true,"darkmagenta":true,"darkolivegreen":true,"darkorange":true,"darkorchid":true,"darkred":true,"darksalmon":true,"darkseagreen":true,"darkslateblue":true,"darkslategray":true,"darkslategrey":true,"darkturquoise":true,"darkviolet":true,"deeppink":true,"deepskyblue":true,"dimgray":true,"dimgrey":true,"dodgerblue":true,"firebrick":true,"floralwhite":true,"forestgreen":true,"fuchsia":true,"gainsboro":true,"ghostwhite":true,"gold":true,"goldenrod":true,"gray":true,"green":true,"greenyellow":true,"grey":true,"honeydew":true,"hotpink":true,"indianred":true,"indigo":true,"ivory":true,"khaki":true,"lavender":true,"lavenderblush":true,"lawngreen":true,"lemonchiffon":true,"lightblue":true,"lightcoral":true,"lightcyan":true,"lightgoldenrodyellow":true,"lightgray":true,"lightgreen":true,"lightgrey":true,"lightpink":true,"lightsalmon":true,"lightseagreen":true,"lightskyblue":true,"lightslategray":true,"lightslategrey":true,"lightsteelblue":true,"lightyellow":true,"lime":true,"limegreen":true,"linen":true,"magenta":true,"maroon":true,"mediumaquamarine":true,"mediumblue":true,"mediumorchid":true,"mediumpurple":true,"mediumseagreen":true,"mediumslateblue":true,"mediumspringgreen":true,"mediumturquoise":true,"mediumvioletred":true,"midnightblue":true,"mintcream":true,"mistyrose":true,"moccasin":true,"navajowhite":true,"navy":true,"oldlace":true,"olive":true,"olivedrab":true,"orange":true,"orangered":true,"orchid":true,"palegoldenrod":true,"palegreen":true,"paleturquoise":true,"palevioletred":true,"papayawhip":true,"peachpuff":true,"peru":true,"pink":true,"plum":true,"powderblue":true,"purple":true,"red":true,"rosybrown":true,"royalblue":true,"saddlebrown":true,"salmon":true,"sandybrown":true,"seagreen":true,"seashell":true,"sienna":true,"silver":true,"skyblue":true,"slateblue":true,"slategray":true,"slategrey":true,"snow":true,"springgreen":true,"steelblue":true,"tan":true,"teal":true,"thistle":true,"tomato":true,"turquoise":true,"violet":true,"wheat":true,"white":true,"whitesmoke":true,"yellow":true,"yellowgreen":true,"activeborder":true,"activecaption":true,"appworkspace":true,"background":true,"buttonface":true,"buttonhighlight":true,"buttonshadow":true,"buttontext":true,"captiontext":true,"graytext":true,"highlight":true,"highlighttext":true,"inactiveborder":true,"inactivecaption":true,"inactivecaptiontext":true,"infobackground":true,"infotext":true,"menu":true,"menutext":true,"scrollbar":true,"threeddarkshadow":true,"threedface":true,"threedhighlight":true,"threedlightshadow":true,"threedshadow":true,"window":true,"windowframe":true,"windowtext":true},kLIST_STYLE_TYPE_NAMES:{"decimal":true,"decimal-leading-zero":true,"lower-roman":true,"upper-roman":true,"georgian":true,"armenian":true,"lower-latin":true,"lower-alpha":true,"upper-latin":true,"upper-alpha":true,"lower-greek":true,"disc":true,"circle":true,"square":true,"none":true,"box":true,"check":true,"diamond":true,"hyphen":true,"lower-armenian":true,"cjk-ideographic":true,"ethiopic-numeric":true,"hebrew":true,"japanese-formal":true,"japanese-informal":true,"simp-chinese-formal":true,"simp-chinese-informal":true,"syriac":true,"tamil":true,"trad-chinese-formal":true,"trad-chinese-informal":true,"upper-armenian":true,"arabic-indic":true,"binary":true,"bengali":true,"cambodian":true,"khmer":true,"devanagari":true,"gujarati":true,"gurmukhi":true,"kannada":true,"lower-hexadecimal":true,"lao":true,"malayalam":true,"mongolian":true,"myanmar":true,"octal":true,"oriya":true,"persian":true,"urdu":true,"telugu":true,"tibetan":true,"upper-hexadecimal":true,"afar":true,"ethiopic-halehame-aa-et":true,"ethiopic-halehame-am-et":true,"amharic-abegede":true,"ehiopic-abegede-am-et":true,"cjk-earthly-branch":true,"cjk-heavenly-stem":true,"ethiopic":true,"ethiopic-abegede":true,"ethiopic-abegede-gez":true,"hangul-consonant":true,"hangul":true,"hiragana-iroha":true,"hiragana":true,"katakana-iroha":true,"katakana":true,"lower-norwegian":true,"oromo":true,"ethiopic-halehame-om-et":true,"sidama":true,"ethiopic-halehame-sid-et":true,"somali":true,"ethiopic-halehame-so-et":true,"tigre":true,"ethiopic-halehame-tig":true,"tigrinya-er-abegede":true,"ethiopic-abegede-ti-er":true,"tigrinya-et":true,"ethiopic-halehame-ti-et":true,"upper-greek":true,"asterisks":true,"footnotes":true,"circled-decimal":true,"circled-lower-latin":true,"circled-upper-latin":true,"dotted-decimal":true,"double-circled-decimal":true,"filled-circled-decimal":true,"parenthesised-decimal":true,"parenthesised-lower-latin":true},reportError:function(aMsg){this.mError=aMsg;},consumeError:function(){var e=this.mError;this.mError=null;return e;},currentToken:function(){return this.mToken;},getHexValue:function(){this.mToken=this.mScanner.nextHexValue();return this.mToken;},getToken:function(aSkipWS,aSkipComment){if(this.mLookAhead){this.mToken=this.mLookAhead;this.mLookAhead=null;return this.mToken;}
this.mToken=this.mScanner.nextToken();while(this.mToken&&((aSkipWS&&this.mToken.isWhiteSpace())||(aSkipComment&&this.mToken.isComment())))
this.mToken=this.mScanner.nextToken();return this.mToken;},lookAhead:function(aSkipWS,aSkipComment){var preservedToken=this.mToken;this.mScanner.preserveState();var token=this.getToken(aSkipWS,aSkipComment);this.mScanner.restoreState();this.mToken=preservedToken;return token;},ungetToken:function(){this.mLookAhead=this.mToken;},addUnknownAtRule:function(aSheet,aString){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var blocks=[];var token=this.getToken(false,false);while(token.isNotNull()){aString+=token.value;if(token.isSymbol(";")&&!blocks.length)
break;else if(token.isSymbol("{")||token.isSymbol("(")||token.isSymbol("[")||token.type=="function"){blocks.push(token.isFunction()?"(":token.value);}else if(token.isSymbol("}")||token.isSymbol(")")||token.isSymbol("]")){if(blocks.length){var ontop=blocks[blocks.length-1];if((token.isSymbol("}")&&ontop=="{")||(token.isSymbol(")")&&ontop=="(")||(token.isSymbol("]")&&ontop=="[")){blocks.pop();if(!blocks.length&&token.isSymbol("}"))
break;}}}
token=this.getToken(false,false);}
this.addUnknownRule(aSheet,aString,currentLine);},addUnknownRule:function(aSheet,aString,aCurrentLine){var errorMsg=this.consumeError();var rule=new jscsspErrorRule(errorMsg);rule.currentLine=aCurrentLine;rule.parsedCssText=aString;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule);},addWhitespace:function(aSheet,aString){var rule=new jscsspWhitespace();rule.parsedCssText=aString;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule);},addComment:function(aSheet,aString){var rule=new jscsspComment();rule.parsedCssText=aString;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule);},parseCharsetRule:function(aToken,aSheet){var s=aToken.value;var token=this.getToken(false,false);s+=token.value;if(token.isWhiteSpace(" ")){token=this.getToken(false,false);s+=token.value;if(token.isString()){var encoding=token.value;token=this.getToken(false,false);s+=token.value;if(token.isSymbol(";")){var rule=new jscsspCharsetRule();rule.encoding=encoding;rule.parsedCssText=s;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule);return true;}
else
this.reportError(kCHARSET_RULE_MISSING_SEMICOLON);}
else
this.reportError(kCHARSET_RULE_CHARSET_IS_STRING);}
else
this.reportError(kCHARSET_RULE_MISSING_WS);this.addUnknownAtRule(aSheet,s);return false;},parseImportRule:function(aToken,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=aToken.value;this.preserveState();var token=this.getToken(true,true);var media=[];var href="";if(token.isString()){href=token.value;s+=" "+href;}
else if(token.isFunction("url(")){token=this.getToken(true,true);var urlContent=this.parseURL(token);if(urlContent){href="url("+urlContent;s+=" "+href;}}
else
this.reportError(kIMPORT_RULE_MISSING_URL);if(href){token=this.getToken(true,true);while(token.isIdent()){s+=" "+token.value;media.push(token.value);token=this.getToken(true,true);if(!token)
break;if(token.isSymbol(",")){s+=",";}else if(token.isSymbol(";")){break;}else
break;token=this.getToken(true,true);}
if(!media.length){media.push("all");}
if(token.isSymbol(";")){s+=";"
this.forgetState();var rule=new jscsspImportRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.href=href;rule.media=media;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule);return true;}}
this.restoreState();this.addUnknownAtRule(aSheet,"@import");return false;},parseVariablesRule:function(token,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=token.value;var declarations=[];var valid=false;this.preserveState();token=this.getToken(true,true);var media=[];var foundMedia=false;while(token.isNotNull()){if(token.isIdent()){foundMedia=true;s+=" "+token.value;media.push(token.value);token=this.getToken(true,true);if(token.isSymbol(",")){s+=",";}else{if(token.isSymbol("{"))
this.ungetToken();else{token.type=jscsspToken.NULL_TYPE;break;}}}else if(token.isSymbol("{"))
break;else if(foundMedia){token.type=jscsspToken.NULL_TYPE;break;}
token=this.getToken(true,true);}
if(token.isSymbol("{")){s+=" {";token=this.getToken(true,true);while(true){if(!token.isNotNull()){valid=true;break;}
if(token.isSymbol("}")){s+="}";valid=true;break;}else{var d=this.parseDeclaration(token,declarations,true,false,aSheet);s+=((d&&declarations.length)?" ":"")+d;}
token=this.getToken(true,false);}}
if(valid){this.forgetState();var rule=new jscsspVariablesRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.declarations=declarations;rule.media=media;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule)
return true;}
this.restoreState();return false;},parseNamespaceRule:function(aToken,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=aToken.value;var valid=false;this.preserveState();var token=this.getToken(true,true);if(token.isNotNull()){var prefix="";var url="";if(token.isIdent()){prefix=token.value;s+=" "+prefix;token=this.getToken(true,true);}
if(token){var foundURL=false;if(token.isString()){foundURL=true;url=token.value;s+=" "+url;}else if(token.isFunction("url(")){token=this.getToken(true,true);var urlContent=this.parseURL(token);if(urlContent){url+="url("+urlContent;foundURL=true;s+=" "+urlContent;}}}
if(foundURL){token=this.getToken(true,true);if(token.isSymbol(";")){s+=";";this.forgetState();var rule=new jscsspNamespaceRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.prefix=prefix;rule.url=url;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule);return true;}}}
this.restoreState();this.addUnknownAtRule(aSheet,"@namespace");return false;},parseFontFaceRule:function(aToken,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=aToken.value;var valid=false;var descriptors=[];this.preserveState();var token=this.getToken(true,true);if(token.isNotNull()){if(token.isSymbol("{")){s+=" "+token.value;var token=this.getToken(true,false);while(true){if(token.isSymbol("}")){s+="}";valid=true;break;}else{var d=this.parseDeclaration(token,descriptors,false,false,aSheet);s+=((d&&descriptors.length)?" ":"")+d;}
token=this.getToken(true,false);}}}
if(valid){this.forgetState();var rule=new jscsspFontFaceRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.descriptors=descriptors;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule)
return true;}
this.restoreState();return false;},parsePageRule:function(aToken,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=aToken.value;var valid=false;var declarations=[];this.preserveState();var token=this.getToken(true,true);var pageSelector="";if(token.isSymbol(":")||token.isIdent()){if(token.isSymbol(":")){pageSelector=":";token=this.getToken(false,false);}
if(token.isIdent()){pageSelector+=token.value;s+=" "+pageSelector;token=this.getToken(true,true);}}
if(token.isNotNull()){if(token.isSymbol("{")){s+=" "+token.value;var token=this.getToken(true,false);while(true){if(token.isSymbol("}")){s+="}";valid=true;break;}else{var d=this.parseDeclaration(token,declarations,true,true,aSheet);s+=((d&&declarations.length)?" ":"")+d;}
token=this.getToken(true,false);}}}
if(valid){this.forgetState();var rule=new jscsspPageRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.pageSelector=pageSelector;rule.declarations=declarations;rule.parentStyleSheet=aSheet;aSheet.cssRules.push(rule)
return true;}
this.restoreState();return false;},parseDefaultPropertyValue:function(token,aDecl,aAcceptPriority,descriptor,aSheet){var valueText="";var blocks=[];var foundPriority=false;var values=[];while(token.isNotNull()){if((token.isSymbol(";")||token.isSymbol("}")||token.isSymbol("!"))&&!blocks.length){if(token.isSymbol("}"))
this.ungetToken();break;}
if(token.isIdent(this.kINHERIT)){if(values.length){return"";}
else{valueText=this.kINHERIT;var value=new jscsspVariable(kJscsspINHERIT_VALUE,aSheet);values.push(value);token=this.getToken(true,true);break;}}
else if(token.isSymbol("{")||token.isSymbol("(")||token.isSymbol("[")){blocks.push(token.value);}
else if(token.isSymbol("}")||token.isSymbol("]")){if(blocks.length){var ontop=blocks[blocks.length-1];if((token.isSymbol("}")&&ontop=="{")||(token.isSymbol(")")&&ontop=="(")||(token.isSymbol("]")&&ontop=="[")){blocks.pop();}}}
if(token.isFunction()){if(token.isFunction("var(")){token=this.getToken(true,true);if(token.isIdent()){var name=token.value;token=this.getToken(true,true);if(token.isSymbol(")")){var value=new jscsspVariable(kJscsspVARIABLE_VALUE,aSheet);valueText+="var("+name+")";value.name=name;values.push(value);}
else
return"";}
else
return"";}
else{var fn=token.value;token=this.getToken(false,true);var arg=this.parseFunctionArgument(token);if(arg){valueText+=fn+arg;var value=new jscsspVariable(kJscsspPRIMITIVE_VALUE,aSheet);value.value=fn+arg;values.push(value);}
else
return"";}}
else if(token.isSymbol("#")){var color=this.parseColor(token);if(color){valueText+=color;var value=new jscsspVariable(kJscsspPRIMITIVE_VALUE,aSheet);value.value=color;values.push(value);}
else
return"";}
else if(!token.isWhiteSpace()&&!token.isSymbol(",")){var value=new jscsspVariable(kJscsspPRIMITIVE_VALUE,aSheet);value.value=token.value;values.push(value);valueText+=token.value;}
else
valueText+=token.value;token=this.getToken(false,true);}
if(values.length&&valueText){this.forgetState();aDecl.push(this._createJscsspDeclarationFromValuesArray(descriptor,values,valueText));return valueText;}
return"";},parseMarginOrPaddingShorthand:function(token,aDecl,aAcceptPriority,aProperty)
{var top=null;var bottom=null;var left=null;var right=null;var values=[];while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!values.length&&token.isIdent(this.kINHERIT)){values.push(token.value);token=this.getToken(true,true);break;}
else if(token.isDimension()||token.isNumber("0")||token.isPercentage()||token.isIdent("auto")){values.push(token.value);}
else
return"";token=this.getToken(true,true);}
var count=values.length;switch(count){case 1:top=values[0];bottom=top;left=top;right=top;break;case 2:top=values[0];bottom=top;left=values[1];right=left;break;case 3:top=values[0];left=values[1];right=left;bottom=values[2];break;case 4:top=values[0];right=values[1];bottom=values[2];left=values[3];break;default:return"";}
this.forgetState();aDecl.push(this._createJscsspDeclarationFromValue(aProperty+"-top",top));aDecl.push(this._createJscsspDeclarationFromValue(aProperty+"-right",right));aDecl.push(this._createJscsspDeclarationFromValue(aProperty+"-bottom",bottom));aDecl.push(this._createJscsspDeclarationFromValue(aProperty+"-left",left));return top+" "+right+" "+bottom+" "+left;},parseBorderColorShorthand:function(token,aDecl,aAcceptPriority)
{var top=null;var bottom=null;var left=null;var right=null;var values=[];while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!values.length&&token.isIdent(this.kINHERIT)){values.push(token.value);token=this.getToken(true,true);break;}
else{var color=this.parseColor(token);if(color)
values.push(color);else
return"";}
token=this.getToken(true,true);}
var count=values.length;switch(count){case 1:top=values[0];bottom=top;left=top;right=top;break;case 2:top=values[0];bottom=top;left=values[1];right=left;break;case 3:top=values[0];left=values[1];right=left;bottom=values[2];break;case 4:top=values[0];right=values[1];bottom=values[2];left=values[3];break;default:return"";}
this.forgetState();aDecl.push(this._createJscsspDeclarationFromValue("border-top-color",top));aDecl.push(this._createJscsspDeclarationFromValue("border-right-color",right));aDecl.push(this._createJscsspDeclarationFromValue("border-bottom-color",bottom));aDecl.push(this._createJscsspDeclarationFromValue("border-left-color",left));return top+" "+right+" "+bottom+" "+left;},parseCueShorthand:function(token,declarations,aAcceptPriority)
{var before="";var after="";var values=[];var values=[];while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!values.length&&token.isIdent(this.kINHERIT)){values.push(token.value);}
else if(token.isIdent("none"))
values.push(token.value);else if(token.isFunction("url(")){var token=this.getToken(true,true);var urlContent=this.parseURL(token);if(urlContent)
values.push("url("+urlContent);else
return"";}
else
return"";token=this.getToken(true,true);}
var count=values.length;switch(count){case 1:before=values[0];after=before;break;case 2:before=values[0];after=values[1];break;default:return"";}
this.forgetState();aDecl.push(this._createJscsspDeclarationFromValue("cue-before",before));aDecl.push(this._createJscsspDeclarationFromValue("cue-after",after));return before+" "+after;},parsePauseShorthand:function(token,declarations,aAcceptPriority)
{var before="";var after="";var values=[];var values=[];while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!values.length&&token.isIdent(this.kINHERIT)){values.push(token.value);}
else if(token.isDimensionOfUnit("ms")||token.isDimensionOfUnit("s")||token.isPercentage()||token.isNumber("0"))
values.push(token.value);else
return"";token=this.getToken(true,true);}
var count=values.length;switch(count){case 1:before=values[0];after=before;break;case 2:before=values[0];after=values[1];break;default:return"";}
this.forgetState();aDecl.push(this._createJscsspDeclarationFromValue("pause-before",before));aDecl.push(this._createJscsspDeclarationFromValue("pause-after",after));return before+" "+after;},parseBorderWidthShorthand:function(token,aDecl,aAcceptPriority)
{var top=null;var bottom=null;var left=null;var right=null;var values=[];while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!values.length&&token.isIdent(this.kINHERIT)){values.push(token.value);}
else if(token.isDimension()||token.isNumber("0")||(token.isIdent()&&token.value in this.kBORDER_WIDTH_NAMES)){values.push(token.value);}
else
return"";token=this.getToken(true,true);}
var count=values.length;switch(count){case 1:top=values[0];bottom=top;left=top;right=top;break;case 2:top=values[0];bottom=top;left=values[1];right=left;break;case 3:top=values[0];left=values[1];right=left;bottom=values[2];break;case 4:top=values[0];right=values[1];bottom=values[2];left=values[3];break;default:return"";}
this.forgetState();aDecl.push(this._createJscsspDeclarationFromValue("border-top-width",top));aDecl.push(this._createJscsspDeclarationFromValue("border-right-width",right));aDecl.push(this._createJscsspDeclarationFromValue("border-bottom-width",bottom));aDecl.push(this._createJscsspDeclarationFromValue("border-left-width",left));return top+" "+right+" "+bottom+" "+left;},parseBorderStyleShorthand:function(token,aDecl,aAcceptPriority)
{var top=null;var bottom=null;var left=null;var right=null;var values=[];while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!values.length&&token.isIdent(this.kINHERIT)){values.push(token.value);}
else if(token.isIdent()&&token.value in this.kBORDER_STYLE_NAMES){values.push(token.value);}
else
return"";token=this.getToken(true,true);}
var count=values.length;switch(count){case 1:top=values[0];bottom=top;left=top;right=top;break;case 2:top=values[0];bottom=top;left=values[1];right=left;break;case 3:top=values[0];left=values[1];right=left;bottom=values[2];break;case 4:top=values[0];right=values[1];bottom=values[2];left=values[3];break;default:return"";}
this.forgetState();aDecl.push(this._createJscsspDeclarationFromValue("border-top-style",top));aDecl.push(this._createJscsspDeclarationFromValue("border-right-style",right));aDecl.push(this._createJscsspDeclarationFromValue("border-bottom-style",bottom));aDecl.push(this._createJscsspDeclarationFromValue("border-left-style",left));return top+" "+right+" "+bottom+" "+left;},parseBorderEdgeOrOutlineShorthand:function(token,aDecl,aAcceptPriority,aProperty)
{var bWidth=null;var bStyle=null;var bColor=null;while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!bWidth&&!bStyle&&!bColor&&token.isIdent(this.kINHERIT)){bWidth=this.kINHERIT;bStyle=this.kINHERIT;bColor=this.kINHERIT;}
else if(!bWidth&&(token.isDimension()||(token.isIdent()&&token.value in this.kBORDER_WIDTH_NAMES)||token.isNumber("0"))){bWidth=token.value;}
else if(!bStyle&&(token.isIdent()&&token.value in this.kBORDER_STYLE_NAMES)){bStyle=token.value;}
else{var color=(aProperty=="outline"&&token.isIdent("invert"))?"invert":this.parseColor(token);if(!bColor&&color)
bColor=color;else
return"";}
token=this.getToken(true,true);}
this.forgetState();bWidth=bWidth?bWidth:"medium";bStyle=bStyle?bStyle:"none";bColor=bColor?bColor:"-moz-initial";function addPropertyToDecl(aSelf,aDecl,property,w,s,c){aDecl.push(aSelf._createJscsspDeclarationFromValue(property+"-width",w));aDecl.push(aSelf._createJscsspDeclarationFromValue(property+"-style",s));aDecl.push(aSelf._createJscsspDeclarationFromValue(property+"-color",c));}
if(aProperty=="border"){addPropertyToDecl(this,aDecl,"border-top",bWidth,bStyle,bColor);addPropertyToDecl(this,aDecl,"border-right",bWidth,bStyle,bColor);addPropertyToDecl(this,aDecl,"border-bottom",bWidth,bStyle,bColor);addPropertyToDecl(this,aDecl,"border-left",bWidth,bStyle,bColor);}
else
addPropertyToDecl(this,aDecl,aProperty,bWidth,bStyle,bColor);return bWidth+" "+bStyle+" "+bColor;},parseBackgroundShorthand:function(token,aDecl,aAcceptPriority)
{var kHPos={"left":true,"right":true};var kVPos={"top":true,"bottom":true};var kPos={"left":true,"right":true,"top":true,"bottom":true,"center":true};var bgColor=null;var bgRepeat=null;var bgAttachment=null;var bgImage=null;var bgPosition=null;while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!bgColor&&!bgRepeat&&!bgAttachment&&!bgImage&&!bgPosition&&token.isIdent(this.kINHERIT)){bgColor=this.kINHERIT;bgRepeat=this.kINHERIT;bgAttachment=this.kINHERIT;bgImage=this.kINHERIT;bgPosition=this.kINHERIT;}
else{if(!bgAttachment&&(token.isIdent("scroll")||token.isIdent("fixed"))){bgAttachment=token.value;}
else if(!bgPosition&&((token.isIdent()&&token.value in kPos)||token.isDimension()||token.isNumber("0")||token.isPercentage())){bgPosition=token.value;token=this.getToken(true,true);if(token.isDimension()||token.isNumber("0")||token.isPercentage()){bgPosition+=" "+token.value;}
else if(token.isIdent()&&token.value in kPos){if((bgPosition in kHPos&&token.value in kHPos)||(bgPosition in kVPos&&token.value in kVPos))
return"";bgPosition+=" "+token.value;}
else{this.ungetToken();bgPosition+=" center";}}
else if(!bgRepeat&&(token.isIdent("repeat")||token.isIdent("repeat-x")||token.isIdent("repeat-y")||token.isIdent("no-repeat"))){bgRepeat=token.value;}
else if(!bgImage&&(token.isFunction("url(")||token.isIdent("none"))){bgImage=token.value;if(token.isFunction("url(")){token=this.getToken(true,true);var url=this.parseURL(token);if(url)
bgImage+=url;else
return"";}}
else if(!bgImage&&(token.isFunction("-moz-linear-gradient(")||token.isFunction("-moz-radial-gradient(")||token.isFunction("-moz-repeating-linear-gradient(")||token.isFunction("-moz-repeating-radial-gradient("))){var gradient=CssInspector.parseGradient(this,token);if(gradient)
bgImage=CssInspector.serializeGradient(gradient);else
return"";}
else{var color=this.parseColor(token);if(!bgColor&&color)
bgColor=color;else
return"";}}
token=this.getToken(true,true);}
this.forgetState();bgColor=bgColor?bgColor:"transparent";bgImage=bgImage?bgImage:"none";bgRepeat=bgRepeat?bgRepeat:"repeat";bgAttachment=bgAttachment?bgAttachment:"scroll";bgPosition=bgPosition?bgPosition:"top left";aDecl.push(this._createJscsspDeclarationFromValue("background-color",bgColor));aDecl.push(this._createJscsspDeclarationFromValue("background-image",bgImage));aDecl.push(this._createJscsspDeclarationFromValue("background-repeat",bgRepeat));aDecl.push(this._createJscsspDeclarationFromValue("background-attachment",bgAttachment));aDecl.push(this._createJscsspDeclarationFromValue("background-position",bgPosition));return bgColor+" "+bgImage+" "+bgRepeat+" "+bgAttachment+" "+bgPosition;},parseListStyleShorthand:function(token,aDecl,aAcceptPriority)
{var kPosition={"inside":true,"outside":true};var lType=null;var lPosition=null;var lImage=null;while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!lType&&!lPosition&&!lImage&&token.isIdent(this.kINHERIT)){lType=this.kINHERIT;lPosition=this.kINHERIT;lImage=this.kINHERIT;}
else if(!lType&&(token.isIdent()&&token.value in this.kLIST_STYLE_TYPE_NAMES)){lType=token.value;}
else if(!lPosition&&(token.isIdent()&&token.value in kPosition)){lPosition=token.value;}
else if(!lImage&&token.isFunction("url")){token=this.getToken(true,true);var urlContent=this.parseURL(token);if(urlContent){lImage="url("+urlContent;}
else
return"";}
else if(!token.isIdent("none"))
return"";token=this.getToken(true,true);}
this.forgetState();lType=lType?lType:"none";lImage=lImage?lImage:"none";lPosition=lPosition?lPosition:"outside";aDecl.push(this._createJscsspDeclarationFromValue("list-style-type",lType));aDecl.push(this._createJscsspDeclarationFromValue("list-style-position",lPosition));aDecl.push(this._createJscsspDeclarationFromValue("list-style-image",lImage));return lType+" "+lPosition+" "+lImage;},parseFontShorthand:function(token,aDecl,aAcceptPriority)
{var kStyle={"italic":true,"oblique":true};var kVariant={"small-caps":true};var kWeight={"bold":true,"bolder":true,"lighter":true,"100":true,"200":true,"300":true,"400":true,"500":true,"600":true,"700":true,"800":true,"900":true};var kSize={"xx-small":true,"x-small":true,"small":true,"medium":true,"large":true,"x-large":true,"xx-large":true,"larger":true,"smaller":true};var kValues={"caption":true,"icon":true,"menu":true,"message-box":true,"small-caption":true,"status-bar":true};var kFamily={"serif":true,"sans-serif":true,"cursive":true,"fantasy":true,"monospace":true};var fStyle=null;var fVariant=null;var fWeight=null;var fSize=null;var fLineHeight=null;var fFamily="";var fSystem=null;var fFamilyValues=[];var normalCount=0;while(true){if(!token.isNotNull())
break;if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();break;}
else if(!fStyle&&!fVariant&&!fWeight&&!fSize&&!fLineHeight&&!fFamily&&!fSystem&&token.isIdent(this.kINHERIT)){fStyle=this.kINHERIT;fVariant=this.kINHERIT;fWeight=this.kINHERIT;fSize=this.kINHERIT;fLineHeight=this.kINHERIT;fFamily=this.kINHERIT;fSystem=this.kINHERIT;}
else{if(!fSystem&&(token.isIdent()&&token.value in kValues)){fSystem=token.value;break;}
else{if(!fStyle&&token.isIdent()&&(token.value in kStyle)){fStyle=token.value;}
else if(!fVariant&&token.isIdent()&&(token.value in kVariant)){fVariant=token.value;}
else if(!fWeight&&(token.isIdent()||token.isNumber())&&(token.value in kWeight)){fWeight=token.value;}
else if(!fSize&&((token.isIdent()&&(token.value in kSize))||token.isDimension()||token.isPercentage())){fSize=token.value;var token=this.getToken(false,false);if(token.isSymbol("/")){token=this.getToken(false,false);if(!fLineHeight&&(token.isDimension()||token.isNumber()||token.isPercentage())){fLineHeight=token.value;}
else
return"";}
else
this.ungetToken();}
else if(token.isIdent("normal")){normalCount++;if(normalCount>3)
return"";}
else if(!fFamily&&(token.isString()||token.isIdent())){var lastWasComma=false;while(true){if(!token.isNotNull())
break;else if(token.isSymbol(";")||(aAcceptPriority&&token.isSymbol("!"))||token.isSymbol("}")){this.ungetToken();break;}
else if(token.isIdent()&&token.value in kFamily){var value=new jscsspVariable(kJscsspPRIMITIVE_VALUE,null);value.value=token.value;fFamilyValues.push(value);fFamily+=token.value;break;}
else if(token.isString()||token.isIdent()){var value=new jscsspVariable(kJscsspPRIMITIVE_VALUE,null);value.value=token.value;fFamilyValues.push(value);fFamily+=token.value;lastWasComma=false;}
else if(!lastWasComma&&token.isSymbol(",")){fFamily+=", ";lastWasComma=true;}
else
return"";token=this.getToken(true,true);}}
else{return"";}}}
token=this.getToken(true,true);}
this.forgetState();if(fSystem){aDecl.push(this._createJscsspDeclarationFromValue("font",fSystem));return fSystem;}
fStyle=fStyle?fStyle:"normal";fVariant=fVariant?fVariant:"normal";fWeight=fWeight?fWeight:"normal";fSize=fSize?fSize:"medium";fLineHeight=fLineHeight?fLineHeight:"normal";fFamily=fFamily?fFamily:"-moz-initial";aDecl.push(this._createJscsspDeclarationFromValue("font-style",fStyle));aDecl.push(this._createJscsspDeclarationFromValue("font-variant",fVariant));aDecl.push(this._createJscsspDeclarationFromValue("font-weight",fWeight));aDecl.push(this._createJscsspDeclarationFromValue("font-size",fSize));aDecl.push(this._createJscsspDeclarationFromValue("line-height",fLineHeight));aDecl.push(this._createJscsspDeclarationFromValuesArray("font-family",fFamilyValues,fFamily));return fStyle+" "+fVariant+" "+fWeight+" "+fSize+"/"+fLineHeight+" "+fFamily;},_createJscsspDeclaration:function(property,value)
{var decl=new jscsspDeclaration();decl.property=property;decl.value=this.trim11(value);decl.parsedCssText=property+": "+value+";";return decl;},_createJscsspDeclarationFromValue:function(property,valueText)
{var decl=new jscsspDeclaration();decl.property=property;var value=new jscsspVariable(kJscsspPRIMITIVE_VALUE,null);value.value=valueText;decl.values=[value];decl.valueText=valueText;decl.parsedCssText=property+": "+valueText+";";return decl;},_createJscsspDeclarationFromValuesArray:function(property,values,valueText)
{var decl=new jscsspDeclaration();decl.property=property;decl.values=values;decl.valueText=valueText;decl.parsedCssText=property+": "+valueText+";";return decl;},parseURL:function(token)
{var value="";if(token.isString())
{value+=token.value;token=this.getToken(true,true);}
else
while(true)
{if(!token.isNotNull()){this.reportError(kURL_EOF);return"";}
if(token.isWhiteSpace()){nextToken=this.lookAhead(true,true);if(!nextToken.isSymbol(")")){this.reportError(kURL_WS_INSIDE);token=this.currentToken();break;}}
if(token.isSymbol(")")){break;}
value+=token.value;token=this.getToken(false,false);}
if(token.isSymbol(")")){return value+")";}
return"";},parseFunctionArgument:function(token)
{var value="";if(token.isString())
{value+=token.value;token=this.getToken(true,true);}
else{var parenthesis=1;while(true)
{if(!token.isNotNull())
return"";if(token.isFunction()||token.isSymbol("("))
parenthesis++;if(token.isSymbol(")")){parenthesis--;if(!parenthesis)
break;}
value+=token.value;token=this.getToken(false,false);}}
if(token.isSymbol(")"))
return value+")";return"";},parseColor:function(token)
{var color="";if(token.isFunction("rgb(")||token.isFunction("rgba(")){color=token.value;var isRgba=token.isFunction("rgba(")
token=this.getToken(true,true);if(!token.isNumber()&&!token.isPercentage())
return"";color+=token.value;token=this.getToken(true,true);if(!token.isSymbol(","))
return"";color+=", ";token=this.getToken(true,true);if(!token.isNumber()&&!token.isPercentage())
return"";color+=token.value;token=this.getToken(true,true);if(!token.isSymbol(","))
return"";color+=", ";token=this.getToken(true,true);if(!token.isNumber()&&!token.isPercentage())
return"";color+=token.value;if(isRgba){token=this.getToken(true,true);if(!token.isSymbol(","))
return"";color+=", ";token=this.getToken(true,true);if(!token.isNumber())
return"";color+=token.value;}
token=this.getToken(true,true);if(!token.isSymbol(")"))
return"";color+=token.value;}
else if(token.isFunction("hsl(")||token.isFunction("hsla(")){color=token.value;var isHsla=token.isFunction("hsla(")
token=this.getToken(true,true);if(!token.isNumber())
return"";color+=token.value;token=this.getToken(true,true);if(!token.isSymbol(","))
return"";color+=", ";token=this.getToken(true,true);if(!token.isPercentage())
return"";color+=token.value;token=this.getToken(true,true);if(!token.isSymbol(","))
return"";color+=", ";token=this.getToken(true,true);if(!token.isPercentage())
return"";color+=token.value;if(isHsla){token=this.getToken(true,true);if(!token.isSymbol(","))
return"";color+=", ";token=this.getToken(true,true);if(!token.isNumber())
return"";color+=token.value;}
token=this.getToken(true,true);if(!token.isSymbol(")"))
return"";color+=token.value;}
else if(token.isIdent()&&(token.value in this.kCOLOR_NAMES))
color=token.value;else if(token.isSymbol("#")){token=this.getHexValue();if(!token.isHex())
return"";var length=token.value.length;if(length!=3&&length!=6)
return"";if(token.value.match(/[a-fA-F0-9]/g).length!=length)
return"";color="#"+token.value;}
return color;},parseDeclaration:function(aToken,aDecl,aAcceptPriority,aExpandShorthands,aSheet){this.preserveState();var blocks=[];if(aToken.isIdent()){var descriptor=aToken.value.toLowerCase();var token=this.getToken(true,true);if(token.isSymbol(":")){var token=this.getToken(true,true);var value="";var declarations=[];if(aExpandShorthands)
switch(descriptor){case"background":value=this.parseBackgroundShorthand(token,declarations,aAcceptPriority);break;case"margin":case"padding":value=this.parseMarginOrPaddingShorthand(token,declarations,aAcceptPriority,descriptor);break;case"border-color":value=this.parseBorderColorShorthand(token,declarations,aAcceptPriority);break;case"border-style":value=this.parseBorderStyleShorthand(token,declarations,aAcceptPriority);break;case"border-width":value=this.parseBorderWidthShorthand(token,declarations,aAcceptPriority);break;case"border-top":case"border-right":case"border-bottom":case"border-left":case"border":case"outline":value=this.parseBorderEdgeOrOutlineShorthand(token,declarations,aAcceptPriority,descriptor);break;case"cue":value=this.parseCueShorthand(token,declarations,aAcceptPriority);break;case"pause":value=this.parsePauseShorthand(token,declarations,aAcceptPriority);break;case"font":value=this.parseFontShorthand(token,declarations,aAcceptPriority);break;case"list-style":value=this.parseListStyleShorthand(token,declarations,aAcceptPriority);break;default:value=this.parseDefaultPropertyValue(token,declarations,aAcceptPriority,descriptor,aSheet);break;}
else
value=this.parseDefaultPropertyValue(token,declarations,aAcceptPriority,descriptor,aSheet);token=this.currentToken();if(value)
{var priority=false;if(token.isSymbol("!")){token=this.getToken(true,true);if(token.isIdent("important")){priority=true;token=this.getToken(true,true);if(token.isSymbol(";")||token.isSymbol("}")){if(token.isSymbol("}"))
this.ungetToken();}
else return"";}
else return"";}
else if(token.isNotNull()&&!token.isSymbol(";")&&!token.isSymbol("}"))
return"";for(var i=0;i<declarations.length;i++){declarations[i].priority=priority;aDecl.push(declarations[i]);}
return descriptor+": "+value+";";}}}
else if(aToken.isComment()){if(this.mPreserveComments){this.forgetState();var comment=new jscsspComment();comment.parsedCssText=aToken.value;aDecl.push(comment);}
return aToken.value;}
this.restoreState();var s=aToken.value;blocks=[];var token=this.getToken(false,false);while(token.isNotNull()){s+=token.value;if((token.isSymbol(";")||token.isSymbol("}"))&&!blocks.length){if(token.isSymbol("}"))
this.ungetToken();break;}else if(token.isSymbol("{")||token.isSymbol("(")||token.isSymbol("[")||token.isFunction()){blocks.push(token.isFunction()?"(":token.value);}else if(token.isSymbol("}")||token.isSymbol(")")||token.isSymbol("]")){if(blocks.length){var ontop=blocks[blocks.length-1];if((token.isSymbol("}")&&ontop=="{")||(token.isSymbol(")")&&ontop=="(")||(token.isSymbol("]")&&ontop=="[")){blocks.pop();}}}
token=this.getToken(false,false);}
return"";},parseKeyframesRule:function(aToken,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=aToken.value;var valid=false;var keyframesRule=new jscsspKeyframesRule();keyframesRule.currentLine=currentLine;this.preserveState();var token=this.getToken(true,true);var foundName=false;while(token.isNotNull()){if(token.isIdent()){foundName=true;s+=" "+token.value;keyframesRule.name=token.value;token=this.getToken(true,true);if(token.isSymbol("{"))
this.ungetToken();else{token.type=jscsspToken.NULL_TYPE;break;}}
else if(token.isSymbol("{")){if(!foundName){token.type=jscsspToken.NULL_TYPE;}
break;}
else{token.type=jscsspToken.NULL_TYPE;break;}
token=this.getToken(true,true);}
if(token.isSymbol("{")&&keyframesRule.name){s+=" { ";token=this.getToken(true,false);while(token.isNotNull()){if(token.isComment()&&this.mPreserveComments){s+=" "+token.value;var comment=new jscsspComment();comment.parsedCssText=token.value;keyframesRule.cssRules.push(comment);}else if(token.isSymbol("}")){valid=true;break;}else{var r=this.parseKeyframeRule(token,keyframesRule,true);if(r)
s+=r;}
token=this.getToken(true,false);}}
if(valid){this.forgetState();keyframesRule.currentLine=currentLine;keyframesRule.parsedCssText=s;aSheet.cssRules.push(keyframesRule);return true;}
this.restoreState();return false;},parseKeyframeRule:function(aToken,aOwner){var currentLine=CountLF(this.mScanner.getAlreadyScanned());this.preserveState();var token=aToken;var key="";while(token.isNotNull()){if(token.isIdent()||token.isPercentage()){if(token.isIdent()&&!token.isIdent("from")&&!token.isIdent("to")){key="";break;}
key+=token.value;token=this.getToken(true,true);if(token.isSymbol("{")){this.ungetToken();break;}
else
if(token.isSymbol(",")){key+=", ";}
else{key="";break;}}
else{key="";break;}
token=this.getToken(true,true);}
var valid=false;var declarations=[];if(key){var s=key;token=this.getToken(true,true);if(token.isSymbol("{")){s+=" { ";token=this.getToken(true,false);while(true){if(!token.isNotNull()){valid=true;break;}
if(token.isSymbol("}")){s+="}";valid=true;break;}else{var d=this.parseDeclaration(token,declarations,true,true,aOwner);s+=((d&&declarations.length)?" ":"")+d;}
token=this.getToken(true,false);}}}
else{}
if(valid){var rule=new jscsspKeyframeRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.declarations=declarations;rule.keyText=key;rule.parentRule=aOwner;aOwner.cssRules.push(rule);return s;}
this.restoreState();s=this.currentToken().value;this.addUnknownAtRule(aOwner,s);return"";},parseMediaRule:function(aToken,aSheet){var currentLine=CountLF(this.mScanner.getAlreadyScanned());var s=aToken.value;var valid=false;var mediaRule=new jscsspMediaRule();mediaRule.currentLine=currentLine;this.preserveState();var token=this.getToken(true,true);var foundMedia=false;while(token.isNotNull()){if(token.isIdent()){foundMedia=true;s+=" "+token.value;mediaRule.media.push(token.value);token=this.getToken(true,true);if(token.isSymbol(",")){s+=",";}else{if(token.isSymbol("{"))
this.ungetToken();else{token.type=jscsspToken.NULL_TYPE;break;}}}
else if(token.isSymbol("{"))
break;else if(foundMedia){token.type=jscsspToken.NULL_TYPE;break;}
token=this.getToken(true,true);}
if(token.isSymbol("{")&&mediaRule.media.length){s+=" { ";token=this.getToken(true,false);while(token.isNotNull()){if(token.isComment()&&this.mPreserveComments){s+=" "+token.value;var comment=new jscsspComment();comment.parsedCssText=token.value;mediaRule.cssRules.push(comment);}else if(token.isSymbol("}")){valid=true;break;}else{var r=this.parseStyleRule(token,mediaRule,true);if(r)
s+=r;}
token=this.getToken(true,false);}}
if(valid){this.forgetState();mediaRule.parsedCssText=s;aSheet.cssRules.push(mediaRule);return true;}
this.restoreState();return false;},trim11:function(str){str=str.replace(/^\s+/,'');for(var i=str.length-1;i>=0;i--){if(/\S/.test(str.charAt(i))){str=str.substring(0,i+1);break;}}
return str;},parseStyleRule:function(aToken,aOwner,aIsInsideMediaRule)
{var currentLine=CountLF(this.mScanner.getAlreadyScanned());this.preserveState();var selector=this.parseSelector(aToken,false);var valid=false;var declarations=[];if(selector){selector=this.trim11(selector.selector);var s=selector;var token=this.getToken(true,true);if(token.isSymbol("{")){s+=" { ";var token=this.getToken(true,false);while(true){if(!token.isNotNull()){valid=true;break;}
if(token.isSymbol("}")){s+="}";valid=true;break;}else{var d=this.parseDeclaration(token,declarations,true,true,aOwner);s+=((d&&declarations.length)?" ":"")+d;}
token=this.getToken(true,false);}}}
else{}
if(valid){var rule=new jscsspStyleRule();rule.currentLine=currentLine;rule.parsedCssText=s;rule.declarations=declarations;rule.mSelectorText=selector;if(aIsInsideMediaRule)
rule.parentRule=aOwner;else
rule.parentStyleSheet=aOwner;aOwner.cssRules.push(rule);return s;}
this.restoreState();s=this.currentToken().value;this.addUnknownAtRule(aOwner,s);return"";},parseSelector:function(aToken,aParseSelectorOnly){var s="";var specificity={a:0,b:0,c:0,d:0};var isFirstInChain=true;var token=aToken;var valid=false;var combinatorFound=false;while(true){if(!token.isNotNull()){if(aParseSelectorOnly)
return{selector:s,specificity:specificity};return"";}
if(!aParseSelectorOnly&&token.isSymbol("{")){valid=!combinatorFound;if(valid)this.ungetToken();break;}
if(token.isSymbol(",")){s+=token.value;isFirstInChain=true;combinatorFound=false;token=this.getToken(false,true);continue;}
else if(!combinatorFound&&(token.isWhiteSpace()||token.isSymbol(">")||token.isSymbol("+")||token.isSymbol("~"))){if(token.isWhiteSpace()){s+=" ";var nextToken=this.lookAhead(true,true);if(!nextToken.isNotNull()){if(aParseSelectorOnly)
return{selector:s,specificity:specificity};return"";}
if(nextToken.isSymbol(">")||nextToken.isSymbol("+")||nextToken.isSymbol("~")){token=this.getToken(true,true);s+=token.value+" ";combinatorFound=true;}}
else{s+=token.value;combinatorFound=true;}
isFirstInChain=true;token=this.getToken(true,true);continue;}
else{var simpleSelector=this.parseSimpleSelector(token,isFirstInChain,true);if(!simpleSelector)
break;s+=simpleSelector.selector;specificity.b+=simpleSelector.specificity.b;specificity.c+=simpleSelector.specificity.c;specificity.d+=simpleSelector.specificity.d;isFirstInChain=false;combinatorFound=false;}
token=this.getToken(false,true);}
if(valid){return{selector:s,specificity:specificity};}
return"";},isPseudoElement:function(aIdent)
{switch(aIdent){case"first-letter":case"first-line":case"before":case"after":case"marker":return true;break;default:return false;break;}},parseSimpleSelector:function(token,isFirstInChain,canNegate)
{var s="";var specificity={a:0,b:0,c:0,d:0};if(isFirstInChain&&(token.isSymbol("*")||token.isSymbol("|")||token.isIdent())){if(token.isSymbol("*")||token.isIdent()){s+=token.value;var isIdent=token.isIdent();token=this.getToken(false,true);if(token.isSymbol("|")){s+=token.value;token=this.getToken(false,true);if(token.isIdent()||token.isSymbol("*")){s+=token.value;if(token.isIdent())
specificity.d++;}else
return null;}else{this.ungetToken();if(isIdent)
specificity.d++;}}else if(token.isSymbol("|")){s+=token.value;token=this.getToken(false,true);if(token.isIdent()||token.isSymbol("*")){s+=token.value;if(token.isIdent())
specificity.d++;}else
return null;}}
else if(token.isSymbol(".")||token.isSymbol("#")){var isClass=token.isSymbol(".");s+=token.value;token=this.getToken(false,true);if(token.isIdent()){s+=token.value;if(isClass)
specificity.c++;else
specificity.b++;}
else
return null;}
else if(token.isSymbol(":")){s+=token.value;token=this.getToken(false,true);if(token.isSymbol(":")){s+=token.value;token=this.getToken(false,true);}
if(token.isIdent()){s+=token.value;if(this.isPseudoElement(token.value))
specificity.d++;else
specificity.c++;}
else if(token.isFunction()){s+=token.value;if(token.isFunction(":not(")){if(!canNegate)
return null;token=this.getToken(true,true);var simpleSelector=this.parseSimpleSelector(token,isFirstInChain,false);if(!simpleSelector)
return null;else{s+=simpleSelector.selector;token=this.getToken(true,true);if(token.isSymbol(")"))
s+=")";else
return null;}
specificity.c++;}
else{while(true){token=this.getToken(false,true);if(token.isSymbol(")")){s+=")";break;}else
s+=token.value;}
specificity.c++;}}else
return null;}else if(token.isSymbol("[")){s+="[";token=this.getToken(true,true);if(token.isIdent()||token.isSymbol("*")){s+=token.value;var nextToken=this.getToken(true,true);if(token.isSymbol("|")){s+="|";token=this.getToken(true,true);if(token.isIdent())
s+=token.value;else
return null;}else
this.ungetToken();}else if(token.isSymbol("|")){s+="|";token=this.getToken(true,true);if(token.isIdent())
s+=token.value;else
return null;}
else
return null;token=this.getToken(true,true);if(token.isIncludes()||token.isDashmatch()||token.isBeginsmatch()||token.isEndsmatch()||token.isContainsmatch()||token.isSymbol("=")){s+=token.value;token=this.getToken(true,true);if(token.isString()||token.isIdent()){s+=token.value;token=this.getToken(true,true);}
else
return null;if(token.isSymbol("]")){s+=token.value;specificity.c++;}
else
return null;}
else if(token.isSymbol("]")){s+=token.value;specificity.c++;}
else
return null;}
else if(token.isWhiteSpace()){var t=this.lookAhead(true,true);if(t.isSymbol('{'))
return""}
if(s)
return{selector:s,specificity:specificity};return null;},preserveState:function(){this.mPreservedTokens.push(this.currentToken());this.mScanner.preserveState();},restoreState:function(){if(this.mPreservedTokens.length){this.mScanner.restoreState();this.mToken=this.mPreservedTokens.pop();}},forgetState:function(){if(this.mPreservedTokens.length){this.mScanner.forgetState();this.mPreservedTokens.pop();}},parse:function(aString,aTryToPreserveWhitespaces,aTryToPreserveComments){if(!aString)
return null;this.mPreserveWS=aTryToPreserveWhitespaces;this.mPreserveComments=aTryToPreserveComments;this.mPreservedTokens=[];this.mScanner.init(aString);var sheet=new jscsspStylesheet();var token=this.getToken(false,false);if(!token.isNotNull())
return;if(token.isAtRule("@charset")){this.parseCharsetRule(token,sheet);token=this.getToken(false,false);}
var foundStyleRules=false;var foundImportRules=false;var foundNameSpaceRules=false;while(true){if(!token.isNotNull())
break;if(token.isWhiteSpace())
{if(aTryToPreserveWhitespaces)
this.addWhitespace(sheet,token.value);}
else if(token.isComment())
{if(this.mPreserveComments)
this.addComment(sheet,token.value);}
else if(token.isAtRule()){if(token.isAtRule("@variables")){if(!foundImportRules&&!foundStyleRules)
this.parseVariablesRule(token,sheet);else{this.reportError(kVARIABLES_RULE_POSITION);this.addUnknownAtRule(sheet,token.value);}}
else if(token.isAtRule("@import")){if(!foundStyleRules&&!foundNameSpaceRules)
foundImportRules=this.parseImportRule(token,sheet);else{this.reportError(kIMPORT_RULE_POSITION);this.addUnknownAtRule(sheet,token.value);}}
else if(token.isAtRule("@namespace")){if(!foundStyleRules)
foundNameSpaceRules=this.parseNamespaceRule(token,sheet);else{this.reportError(kNAMESPACE_RULE_POSITION);this.addUnknownAtRule(sheet,token.value);}}
else if(token.isAtRule("@font-face")){if(this.parseFontFaceRule(token,sheet))
foundStyleRules=true;else
this.addUnknownAtRule(sheet,token.value);}
else if(token.isAtRule("@page")){if(this.parsePageRule(token,sheet))
foundStyleRules=true;else
this.addUnknownAtRule(sheet,token.value);}
else if(token.isAtRule("@media")){if(this.parseMediaRule(token,sheet))
foundStyleRules=true;else
this.addUnknownAtRule(sheet,token.value);}
else if(token.isAtRule("@keyframes")){if(!this.parseKeyframesRule(token,sheet))
this.addUnknownAtRule(sheet,token.value);}
else if(token.isAtRule("@charset")){this.reportError(kCHARSET_RULE_CHARSET_SOF);this.addUnknownAtRule(sheet,token.value);}
else{this.reportError(kUNKNOWN_AT_RULE);this.addUnknownAtRule(sheet,token.value);}}
else
{var ruleText=this.parseStyleRule(token,sheet,false);if(ruleText)
foundStyleRules=true;}
token=this.getToken(false);}
return sheet;}};function jscsspToken(aType,aValue,aUnit)
{this.type=aType;this.value=aValue;this.unit=aUnit;}
jscsspToken.NULL_TYPE=0;jscsspToken.WHITESPACE_TYPE=1;jscsspToken.STRING_TYPE=2;jscsspToken.COMMENT_TYPE=3;jscsspToken.NUMBER_TYPE=4;jscsspToken.IDENT_TYPE=5;jscsspToken.FUNCTION_TYPE=6;jscsspToken.ATRULE_TYPE=7;jscsspToken.INCLUDES_TYPE=8;jscsspToken.DASHMATCH_TYPE=9;jscsspToken.BEGINSMATCH_TYPE=10;jscsspToken.ENDSMATCH_TYPE=11;jscsspToken.CONTAINSMATCH_TYPE=12;jscsspToken.SYMBOL_TYPE=13;jscsspToken.DIMENSION_TYPE=14;jscsspToken.PERCENTAGE_TYPE=15;jscsspToken.HEX_TYPE=16;jscsspToken.prototype={isNotNull:function()
{return this.type;},_isOfType:function(aType,aValue)
{return(this.type==aType&&(!aValue||this.value.toLowerCase()==aValue));},isWhiteSpace:function(w)
{return this._isOfType(jscsspToken.WHITESPACE_TYPE,w);},isString:function()
{return this._isOfType(jscsspToken.STRING_TYPE);},isComment:function()
{return this._isOfType(jscsspToken.COMMENT_TYPE);},isNumber:function(n)
{return this._isOfType(jscsspToken.NUMBER_TYPE,n);},isSymbol:function(c)
{return this._isOfType(jscsspToken.SYMBOL_TYPE,c);},isIdent:function(i)
{return this._isOfType(jscsspToken.IDENT_TYPE,i);},isFunction:function(f)
{return this._isOfType(jscsspToken.FUNCTION_TYPE,f);},isAtRule:function(a)
{return this._isOfType(jscsspToken.ATRULE_TYPE,a);},isIncludes:function()
{return this._isOfType(jscsspToken.INCLUDES_TYPE);},isDashmatch:function()
{return this._isOfType(jscsspToken.DASHMATCH_TYPE);},isBeginsmatch:function()
{return this._isOfType(jscsspToken.BEGINSMATCH_TYPE);},isEndsmatch:function()
{return this._isOfType(jscsspToken.ENDSMATCH_TYPE);},isContainsmatch:function()
{return this._isOfType(jscsspToken.CONTAINSMATCH_TYPE);},isSymbol:function(c)
{return this._isOfType(jscsspToken.SYMBOL_TYPE,c);},isDimension:function()
{return this._isOfType(jscsspToken.DIMENSION_TYPE);},isPercentage:function()
{return this._isOfType(jscsspToken.PERCENTAGE_TYPE);},isHex:function()
{return this._isOfType(jscsspToken.HEX_TYPE);},isDimensionOfUnit:function(aUnit)
{return(this.isDimension()&&this.unit==aUnit);},isLength:function()
{return(this.isPercentage()||this.isDimensionOfUnit("cm")||this.isDimensionOfUnit("mm")||this.isDimensionOfUnit("in")||this.isDimensionOfUnit("pc")||this.isDimensionOfUnit("px")||this.isDimensionOfUnit("em")||this.isDimensionOfUnit("ex")||this.isDimensionOfUnit("pt"));},isAngle:function()
{return(this.isDimensionOfUnit("deg")||this.isDimensionOfUnit("rad")||this.isDimensionOfUnit("grad"));}}
var kJscsspUNKNOWN_RULE=0;var kJscsspSTYLE_RULE=1
var kJscsspCHARSET_RULE=2;var kJscsspIMPORT_RULE=3;var kJscsspMEDIA_RULE=4;var kJscsspFONT_FACE_RULE=5;var kJscsspPAGE_RULE=6;var kJscsspKEYFRAMES_RULE=7;var kJscsspKEYFRAME_RULE=8;var kJscsspNAMESPACE_RULE=100;var kJscsspCOMMENT=101;var kJscsspWHITE_SPACE=102;var kJscsspVARIABLES_RULE=200;var kJscsspSTYLE_DECLARATION=1000;var gTABS="";function jscsspStylesheet()
{this.cssRules=[];this.variables={};}
jscsspStylesheet.prototype={insertRule:function(aRule,aIndex){try{this.cssRules.splice(aIndex,1,aRule);}
catch(e){}},deleteRule:function(aIndex){try{this.cssRules.splice(aIndex);}
catch(e){}},cssText:function(){var rv="";for(var i=0;i<this.cssRules.length;i++)
rv+=this.cssRules[i].cssText()+"\n";return rv;},resolveVariables:function(aMedium){function ItemFoundInArray(aArray,aItem){for(var i=0;i<aArray.length;i++)
if(aItem==aArray[i])
return true;return false;}
for(var i=0;i<this.cssRules.length;i++)
{var rule=this.cssRules[i];if(rule.type==kJscsspSTYLE_RULE||rule.type==kJscsspIMPORT_RULE)
break;else if(rule.type==kJscsspVARIABLES_RULE&&(!rule.media.length||ItemFoundInArray(rule.media,aMedium))){for(var j=0;j<rule.declarations.length;j++){var valueText="";for(var k=0;k<rule.declarations[j].values.length;k++)
valueText+=(k?" ":"")+rule.declarations[j].values[k].value;this.variables[rule.declarations[j].property]=valueText;}}}}};function jscsspCharsetRule()
{this.type=kJscsspCHARSET_RULE;this.encoding=null;this.parsedCssText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspCharsetRule.prototype={cssText:function(){return"@charset "+this.encoding+";";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(false,false);if(token.isAtRule("@charset")){if(parser.parseCharsetRule(token,sheet)){var newRule=sheet.cssRules[0];this.encoding=newRule.encoding;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspErrorRule(aErrorMsg)
{this.error=aErrorMsg?aErrorMsg:"INVALID";this.type=kJscsspUNKNOWN_RULE;this.parsedCssText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspErrorRule.prototype={cssText:function(){return this.parsedCssText;}};function jscsspComment()
{this.type=kJscsspCOMMENT;this.parsedCssText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspComment.prototype={cssText:function(){return this.parsedCssText;},setCssText:function(val){var parser=new CSSParser(val);var token=parser.getToken(true,false);if(token.isComment())
this.parsedCssText=token.value;else
throw DOMException.SYNTAX_ERR;}};function jscsspWhitespace()
{this.type=kJscsspWHITE_SPACE;this.parsedCssText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspWhitespace.prototype={cssText:function(){return this.parsedCssText;}};function jscsspImportRule()
{this.type=kJscsspIMPORT_RULE;this.parsedCssText=null;this.href=null;this.media=[];this.parentStyleSheet=null;this.parentRule=null;}
jscsspImportRule.prototype={cssText:function(){var mediaString=this.media.join(", ");return"@import "+this.href
+((mediaString&&mediaString!="all")?mediaString+" ":"")
+";";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@import")){if(parser.parseImportRule(token,sheet)){var newRule=sheet.cssRules[0];this.href=newRule.href;this.media=newRule.media;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspNamespaceRule()
{this.type=kJscsspNAMESPACE_RULE;this.parsedCssText=null;this.prefix=null;this.url=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspNamespaceRule.prototype={cssText:function(){return"@namespace "+(this.prefix?this.prefix+" ":"")
+this.url
+";";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@namespace")){if(parser.parseNamespaceRule(token,sheet)){var newRule=sheet.cssRules[0];this.url=newRule.url;this.prefix=newRule.prefix;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspDeclaration()
{this.type=kJscsspSTYLE_DECLARATION;this.property=null;this.values=[];this.valueText=null;this.priority=null;this.parsedCssText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspDeclaration.prototype={kCOMMA_SEPARATED:{"cursor":true,"font-family":true,"voice-family":true,"background-image":true},kUNMODIFIED_COMMA_SEPARATED_PROPERTIES:{"text-shadow":true,"box-shadow":true,"-moz-transition":true,"-moz-transition-property":true,"-moz-transition-duration":true,"-moz-transition-timing-function":true,"-moz-transition-delay":true},cssText:function(){var prefixes=CssInspector.prefixesForProperty(this.property);if(this.property in this.kUNMODIFIED_COMMA_SEPARATED_PROPERTIES){if(prefixes){var rv="";for(var propertyIndex=0;propertyIndex<prefixes.length;propertyIndex++){var property=prefixes[propertyIndex];rv+=(propertyIndex?gTABS:"")+property+": ";rv+=this.valueText+(this.priority?" !important":"")+";";rv+=((prefixes.length>1&&propertyIndex!=prefixes.length-1)?"\n":"");}
return rv;}
return this.property+": "+this.valueText+
(this.priority?" !important":"")+";"}
if(prefixes){var rv="";for(var propertyIndex=0;propertyIndex<prefixes.length;propertyIndex++){var property=prefixes[propertyIndex];rv+=(propertyIndex?gTABS:"")+property+": ";var separator=(property in this.kCOMMA_SEPARATED)?", ":" ";for(var i=0;i<this.values.length;i++)
if(this.values[i].cssText()!=null)
rv+=(i?separator:"")+this.values[i].cssText();else
return null;rv+=(this.priority?" !important":"")+";"+
((prefixes.length>1&&propertyIndex!=prefixes.length-1)?"\n":"");}
return rv;}
var rv=this.property+": ";var separator=(this.property in this.kCOMMA_SEPARATED)?", ":" ";var extras={"webkit":false,"presto":false,"trident":false,"generic":false}
for(var i=0;i<this.values.length;i++){var v=this.values[i].cssText();if(v!=null){var paren=v.indexOf("(");var kwd=v;if(paren!=-1)
kwd=v.substr(0,paren);if(kwd in kCSS_VENDOR_VALUES){for(var j in kCSS_VENDOR_VALUES[kwd]){extras[j]=extras[j]||(kCSS_VENDOR_VALUES[kwd][j]!="");}}
rv+=(i?separator:"")+v;}
else
return null;}
rv+=(this.priority?" !important":"")+";";for(var j in extras){if(extras[j]){var str="\n"+gTABS+this.property+": ";for(var i=0;i<this.values.length;i++){var v=this.values[i].cssText();if(v!=null){var paren=v.indexOf("(");var kwd=v;if(paren!=-1)
kwd=v.substr(0,paren);if(kwd in kCSS_VENDOR_VALUES){functor=kCSS_VENDOR_VALUES[kwd][j];if(functor){v=(typeof functor=="string")?functor:functor(v,j);if(!v){str=null;break;}}}
str+=(i?separator:"")+v;}
else
return null;}
if(str)
rv+=str+";"
else
rv+="\n"+gTABS+"/* Impossible to translate property "+this.property+" for "+j+" */";}}
return rv;},setCssText:function(val){var declarations=[];var parser=new CSSParser(val);var token=parser.getToken(true,true);if(parser.parseDeclaration(token,declarations,true,true,null)&&declarations.length&&declarations[0].type==kJscsspSTYLE_DECLARATION){var newDecl=declarations.cssRules[0];this.property=newDecl.property;this.value=newDecl.value;this.priority=newDecl.priority;this.parsedCssText=newRule.parsedCssText;return;}
throw DOMException.SYNTAX_ERR;}};function jscsspFontFaceRule()
{this.type=kJscsspFONT_FACE_RULE;this.parsedCssText=null;this.descriptors=[];this.parentStyleSheet=null;this.parentRule=null;}
jscsspFontFaceRule.prototype={cssText:function(){var rv=gTABS+"@font-face {\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.descriptors.length;i++)
rv+=gTABS+this.descriptors[i].cssText()+"\n";gTABS=preservedGTABS;return rv+gTABS+"}";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@font-face")){if(parser.parseFontFaceRule(token,sheet)){var newRule=sheet.cssRules[0];this.descriptors=newRule.descriptors;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspKeyframesRule()
{this.type=kJscsspKEYFRAMES_RULE;this.parsedCssText=null;this.cssRules=[];this.name=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspKeyframesRule.prototype={cssText:function(){var rv=gTABS
+"@keyframes "
+this.name+" {\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.cssRules.length;i++)
rv+=gTABS+this.cssRules[i].cssText()+"\n";gTABS=preservedGTABS;rv+=gTABS+"}\n";return rv;},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@keyframes")){if(parser.parseKeyframesRule(token,sheet)){var newRule=sheet.cssRules[0];this.cssRules=newRule.cssRules;this.name=newRule.name;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspKeyframeRule()
{this.type=kJscsspKEYFRAME_RULE;this.parsedCssText=null;this.declarations=[]
this.keyText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspKeyframeRule.prototype={cssText:function(){var rv=this.keyText+" {\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.declarations.length;i++){var declText=this.declarations[i].cssText();if(declText)
rv+=gTABS+this.declarations[i].cssText()+"\n";}
gTABS=preservedGTABS;return rv+gTABS+"}";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(!token.isNotNull()){if(parser.parseKeyframeRule(token,sheet,false)){var newRule=sheet.cssRules[0];this.keyText=newRule.keyText;this.declarations=newRule.declarations;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspMediaRule()
{this.type=kJscsspMEDIA_RULE;this.parsedCssText=null;this.cssRules=[];this.media=[];this.parentStyleSheet=null;this.parentRule=null;}
jscsspMediaRule.prototype={cssText:function(){var rv=gTABS+"@media "+this.media.join(", ")+" {\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.cssRules.length;i++)
rv+=gTABS+this.cssRules[i].cssText()+"\n";gTABS=preservedGTABS;return rv+gTABS+"}";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@media")){if(parser.parseMediaRule(token,sheet)){var newRule=sheet.cssRules[0];this.cssRules=newRule.cssRules;this.media=newRule.media;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspStyleRule()
{this.type=kJscsspSTYLE_RULE;this.parsedCssText=null;this.declarations=[]
this.mSelectorText=null;this.parentStyleSheet=null;this.parentRule=null;}
jscsspStyleRule.prototype={cssText:function(){var rv=this.mSelectorText+" {\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.declarations.length;i++){var declText=this.declarations[i].cssText();if(declText)
rv+=gTABS+this.declarations[i].cssText()+"\n";}
gTABS=preservedGTABS;return rv+gTABS+"}";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(!token.isNotNull()){if(parser.parseStyleRule(token,sheet,false)){var newRule=sheet.cssRules[0];this.mSelectorText=newRule.mSelectorText;this.declarations=newRule.declarations;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;},selectorText:function(){return this.mSelectorText;},setSelectorText:function(val){var parser=new CSSParser(val);var token=parser.getToken(true,true);if(!token.isNotNull()){var s=parser.parseSelector(token,true);if(s){this.mSelectorText=s.selector;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspPageRule()
{this.type=kJscsspPAGE_RULE;this.parsedCssText=null;this.pageSelector=null;this.declarations=[];this.parentStyleSheet=null;this.parentRule=null;}
jscsspPageRule.prototype={cssText:function(){var rv=gTABS+"@page "
+(this.pageSelector?this.pageSelector+" ":"")
+"{\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.declarations.length;i++)
rv+=gTABS+this.declarations[i].cssText()+"\n";gTABS=preservedGTABS;return rv+gTABS+"}";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@page")){if(parser.parsePageRule(token,sheet)){var newRule=sheet.cssRules[0];this.pageSelector=newRule.pageSelector;this.declarations=newRule.declarations;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};function jscsspVariablesRule()
{this.type=kJscsspVARIABLES_RULE;this.parsedCssText=null;this.declarations=[];this.parentStyleSheet=null;this.parentRule=null;this.media=null;}
jscsspVariablesRule.prototype={cssText:function(){var rv=gTABS+"@variables "+
(this.media.length?this.media.join(", ")+" ":"")+"{\n";var preservedGTABS=gTABS;gTABS+="  ";for(var i=0;i<this.declarations.length;i++)
rv+=gTABS+this.declarations[i].cssText()+"\n";gTABS=preservedGTABS;return rv+gTABS+"}";},setCssText:function(val){var sheet={cssRules:[]};var parser=new CSSParser(val);var token=parser.getToken(true,true);if(token.isAtRule("@variables")){if(parser.parseVariablesRule(token,sheet)){var newRule=sheet.cssRules[0];this.declarations=newRule.declarations;this.parsedCssText=newRule.parsedCssText;return;}}
throw DOMException.SYNTAX_ERR;}};var kJscsspINHERIT_VALUE=0;var kJscsspPRIMITIVE_VALUE=1;var kJscsspVARIABLE_VALUE=4;function jscsspVariable(aType,aSheet)
{this.value="";this.type=aType;this.name=null;this.parentRule=null;this.parentStyleSheet=aSheet;}
jscsspVariable.prototype={cssText:function(){if(this.type==kJscsspVARIABLE_VALUE)
return this.resolveVariable(this.name,this.parentRule,this.parentStyleSheet);else
return this.value;},setCssText:function(val){if(this.type==kJscsspVARIABLE_VALUE)
throw DOMException.SYNTAX_ERR;else
this.value=val;},resolveVariable:function(aName,aRule,aSheet)
{if(aName.toLowerCase()in aSheet.variables)
return aSheet.variables[aName.toLowerCase()];return null;}};function ParseURL(buffer){var result={};result.protocol="";result.user="";result.password="";result.host="";result.port="";result.path="";result.query="";var section="PROTOCOL";var start=0;var wasSlash=false;while(start<buffer.length){if(section=="PROTOCOL"){if(buffer.charAt(start)==':'){section="AFTER_PROTOCOL";start++;}else if(buffer.charAt(start)=='/'&&result.protocol.length()==0){section=PATH;}else{result.protocol+=buffer.charAt(start++);}}else if(section=="AFTER_PROTOCOL"){if(buffer.charAt(start)=='/'){if(!wasSlash){wasSlash=true;}else{wasSlash=false;section="USER";}
start++;}else{throw new ParseException("Protocol shell be separated with 2 slashes");}}else if(section=="USER"){if(buffer.charAt(start)=='/'){result.host=result.user;result.user="";section="PATH";}else if(buffer.charAt(start)=='?'){result.host=result.user;result.user="";section="QUERY";start++;}else if(buffer.charAt(start)==':'){section="PASSWORD";start++;}else if(buffer.charAt(start)=='@'){section="HOST";start++;}else{result.user+=buffer.charAt(start++);}}else if(section=="PASSWORD"){if(buffer.charAt(start)=='/'){result.host=result.user;result.port=result.password;result.user="";result.password="";section="PATH";}else if(buffer.charAt(start)=='?'){result.host=result.user;result.port=result.password;result.user="";result.password="";section="QUERY";start++;}else if(buffer.charAt(start)=='@'){section="HOST";start++;}else{result.password+=buffer.charAt(start++);}}else if(section=="HOST"){if(buffer.charAt(start)=='/'){section="PATH";}else if(buffer.charAt(start)==':'){section="PORT";start++;}else if(buffer.charAt(start)=='?'){section="QUERY";start++;}else{result.host+=buffer.charAt(start++);}}else if(section=="PORT"){if(buffer.charAt(start)=='/'){section="PATH";}else if(buffer.charAt(start)=='?'){section="QUERY";start++;}else{result.port+=buffer.charAt(start++);}}else if(section=="PATH"){if(buffer.charAt(start)=='?'){section="QUERY";start++;}else{result.path+=buffer.charAt(start++);}}else if(section=="QUERY"){result.query+=buffer.charAt(start++);}}
if(section=="PROTOCOL"){result.host=result.protocol;result.protocol="http";}else if(section=="AFTER_PROTOCOL"){throw new ParseException("Invalid url");}else if(section=="USER"){result.host=result.user;result.user="";}else if(section=="PASSWORD"){result.host=result.user;result.port=result.password;result.user="";result.password="";}
return result;}
function ParseException(description){this.description=description;}
function CountLF(s)
{var nCR=s.match(/\n/g);return nCR?nCR.length+1:1;}
function FilterLinearGradientForOutput(aValue,aEngine)
{if(aEngine=="generic")
return aValue.substr(5);if(aEngine=="webkit")
return aValue.replace(/\-moz\-/g,"-webkit-")
if(aEngine!="webkit20110101")
return"";var g=CssInspector.parseBackgroundImages(aValue)[0];var cancelled=false;var str="-webkit-gradient(linear, ";var position=("position"in g.value)?g.value.position.toLowerCase():"";var angle=("angle"in g.value)?g.value.angle.toLowerCase():"";if(angle){var match=angle.match(/^([0-9\-\.\\+]+)([a-z]*)/);var angle=parseFloat(match[1]);var unit=match[2];switch(unit){case"grad":angle=angle*90/100;break;case"rad":angle=angle*180/Math.PI;break;default:break;}
while(angle<0)
angle+=360;while(angle>=360)
angle-=360;}
var startpoint=[];var endpoint=[];if(position!=""){if(position=="center")
position="center center";startpoint=position.split(" ");if(angle==""&&angle!=0){switch(startpoint[0]){case"left":endpoint.push("right");break;case"center":endpoint.push("center");break;case"right":endpoint.push("left");break;default:{var match=startpoint[0].match(/^([0-9\-\.\\+]+)([a-z]*)/);var v=parseFloat(match[0]);var unit=match[1];if(unit=="%"){endpoint.push((100-v)+"%");}
else
cancelled=true;}
break;}
if(!cancelled)
switch(startpoint[1]){case"top":endpoint.push("bottom");break;case"center":endpoint.push("center");break;case"bottom":endpoint.push("top");break;default:{var match=startpoint[1].match(/^([0-9\-\.\\+]+)([a-z]*)/);var v=parseFloat(match[0]);var unit=match[1];if(unit=="%"){endpoint.push((100-v)+"%");}
else
cancelled=true;}
break;}}
else{switch(angle){case 0:endpoint.push("right");endpoint.push(startpoint[1]);break;case 90:endpoint.push(startpoint[0]);endpoint.push("top");break;case 180:endpoint.push("left");endpoint.push(startpoint[1]);break;case 270:endpoint.push(startpoint[0]);endpoint.push("bottom");break;default:cancelled=true;break;}}}
else{if(angle=="")
angle=270;switch(angle){case 0:startpoint=["left","center"];endpoint=["right","center"];break;case 90:startpoint=["center","bottom"];endpoint=["center","top"];break;case 180:startpoint=["right","center"];endpoint=["left","center"];break;case 270:startpoint=["center","top"];endpoint=["center","bottom"];break;default:cancelled=true;break;}}
if(cancelled)
return"";str+=startpoint.join(" ")+", "+endpoint.join(" ");if(!g.value.stops[0].position)
g.value.stops[0].position="0%";if(!g.value.stops[g.value.stops.length-1].position)
g.value.stops[g.value.stops.length-1].position="100%";var current=0;for(var i=0;i<g.value.stops.length&&!cancelled;i++){var s=g.value.stops[i];if(s.position){if(s.position.indexOf("%")==-1){cancelled=true;break;}}
else{var j=i+1;while(j<g.value.stops.length&&!g.value.stops[j].position)
j++;var inc=parseFloat(g.value.stops[j].position)-current;for(var k=i;k<j;k++){g.value.stops[k].position=(current+inc*(k-i+1)/(j-i+1))+"%";}}
current=parseFloat(s.position);str+=", color-stop("+(parseFloat(current)/100)+", "+s.color+")";}
if(cancelled)
return"";return str+")";}
function FilterRadialGradientForOutput(aValue,aEngine)
{if(aEngine=="generic")
return aValue.substr(5);else if(aEngine=="webkit")
return aValue.replace(/\-moz\-/g,"-webkit-")
else if(aEngine!="webkit20110101")
return"";var g=CssInspector.parseBackgroundImages(aValue)[0];var shape=("shape"in g.value)?g.value.shape:"";var size=("size"in g.value)?g.value.size:"";if(shape!="circle"||(size!="farthest-corner"&&size!="cover"))
return"";if(g.value.stops.length<2||!("position"in g.value.stops[0])||!g.value.stops[g.value.stops.length-1].position||!("position"in g.value.stops[0])||!g.value.stops[g.value.stops.length-1].position)
return"";for(var i=0;i<g.value.stops.length;i++){var s=g.value.stops[i];if(("position"in s)&&s.position&&s.position.indexOf("px")==-1)
return"";}
var str="-webkit-gradient(radial, ";var position=("position"in g.value)?g.value.position:"center center";str+=position+", "+parseFloat(g.value.stops[0].position)+", ";str+=position+", "+parseFloat(g.value.stops[g.value.stops.length-1].position);var current=parseFloat(g.value.stops[0].position);for(var i=0;i<g.value.stops.length;i++){var s=g.value.stops[i];if(!("position"in s)||!s.position){var j=i+1;while(j<g.value.stops.length&&!g.value.stops[j].position)
j++;var inc=parseFloat(g.value.stops[j].position)-current;for(var k=i;k<j;k++){g.value.stops[k].position=(current+inc*(k-i+1)/(j-i+1))+"px";}}
current=parseFloat(s.position);var c=(current-parseFloat(g.value.stops[0].position))/(parseFloat(g.value.stops[g.value.stops.length-1].position)-parseFloat(g.value.stops[0].position));str+=", color-stop("+c+", "+s.color+")";}
str+=")"
return str;}
function FilterRepeatingGradientForOutput(aValue,aEngine)
{if(aEngine=="generic")
return aValue.substr(5);else if(aEngine=="webkit")
return aValue.replace(/\-moz\-/g,"-webkit-")
return"";}
jQuery(function($){var barHeight=42;var resizeIframe=function(){$('#preview-iframe').width($('body').width()-$('.od-side').width()-1);$('.od-side').height($(document).height()-barHeight);$('#iscroll-block').height($(document).height()-barHeight);}
$(window).resize(function(){resizeIframe();});$('.od-side ul.settings > li > h2').click(function(){var $$=$(this);if($$.closest('li').is('.active')){var li=$$.closest('li');li.removeClass('active').find('ul').slideUp(350).end().find('li.setting').removeClass('highlight');}
else{$$.closest('li').addClass('active').find('ul').slideDown(350);}
return false;})
$('#preview-iframe').load(function(){$(this).contents().find('#wpadminbar').remove();$(this).contents().find('style[media=screen]').each(function(){var $$=$(this);if($$.html().indexOf('html { margin-top: 28px !important; }')!=-1){$$.remove();}})
$(this).contents().find('body').css({'-moz-user-select':'none','-webkit-user-select':'none','user-select':'none','-ms-user-select':'none'});$('#od-overlay').fadeOut();$(window).resize();});$('#preview-iframe').load(function(){$('.od-side ul.settings > li > ul > li').each(function(){var $$=$(this);var field=$$.find('.preview-field');$('#preview-iframe').contents().find($$.attr('data-influences')).each(function(){var $el=$(this);$el.addClass('origin-influenced-el');var fields=$el.data('origin-fields');if(fields==undefined)fields=field;else{fields=fields.add(field);}
$el.data('origin-fields',fields);});});$('#preview-iframe').contents().find('.origin-influenced-el').mouseover(function(e){var $$=$(this);$$.closest('body').find('.origin-influenced-el').originUnhighlight();$$.originHighlight();e.stopPropagation();return false;}).mouseout(function(){var $$=$(this);$$.originUnhighlight();}).bind('contextmenu',function(e){var $$=$(this);var fields=$$.data('origin-fields');$('.od-side li.settings-section').removeClass('active').find('ul.general-settings').hide();$('.od-side li.setting').removeClass('highlight');fields.each(function(){var $f=$(this);$f.closest('li').addClass('highlight');var container=$f.closest('li.settings-section');if(container.not('.active')){container.addClass('active').find('ul.general-settings').show();}});$('#iscroll-block').slimScroll({scroll:fields.eq(0).closest('li').position().top-40});e.stopPropagation();return false;});});$('.od-side ul.settings > li > ul > li .section-title').mouseenter(function(e){$('#preview-iframe').contents().find($(this).closest('li').attr('data-influences')).originHighlight();}).mouseleave(function(){$('#preview-iframe').contents().find('.origin-highlight').remove();}).click(function(){var $$=$(this).closest('li');var f=$('#preview-iframe');var top=f.contents().find($$.attr('data-influences')).eq(0).offset().top;f.contents().find('html,body').scrollable().clearQueue().animate({'scrollTop':Math.max(top-36,0)},900);});$('#child-download-form .od-bar-button').click(function(){$(window).unbind('beforeunload');$('#child-download-form input[name="settings"]').val($('#settings-form').serialize());$('#child-download-form').submit();});var uploader=new plupload.Uploader({runtimes:'gears,html5,flash,silverlight,browserplus',browse_button:'origin-style-load',unique_names:true,url:pluploadSettings.style_url,flash_swf_url:pluploadSettings.flash_swf_url,silverlight_xap_url:pluploadSettings.silverlight_xap_url,});uploader.bind('FilesAdded',function(up,files){$('#origin-style-load').addClass('loading');setTimeout(function(){uploader.start();},500);});uploader.bind('Init',function(up,params){});uploader.bind('Error',function(up,params){});uploader.bind('FileUploaded',function(up,file){$.getJSON(originSettings.siteUrl,{'om':'style_upload_fetch','name':file.target_name},function(data){$('#origin-style-load').removeClass('loading');if(data.style!=undefined){simpleHistory.add(data.style.settings);simpleHistory.setItem(data.style.settings);setPreviewInput(data.style.settings,true);}
$.gritter.add({title:data.message.title,text:data.message.text,time:2500,sticky:!data.success});})});uploader.init();$('<img />').attr('src',originSettings.originUrl+'/img/dark-loader.gif');$('<img />').attr('src',originSettings.originUrl+'/img/light-loader.gif');$('#iscroll-block').slimScroll({height:'100%',wheelStep:10});simpleHistory.setUndoButton($('.od-bar-button.undo'));simpleHistory.setRedoButton($('.od-bar-button.redo'));simpleHistory.add(getOriginValues());});window.originExecutor={e:function(){var parts=[];for(var i=0;i<arguments.length;i++)parts[i]=arguments[i];return parts.join('');},eif:function(check,opEquals,echoTrue,echoFalse){if(typeof check!='boolean'){check=eval(check+opEquals);}
return check?echoTrue:echoFalse;},multiply:function(a,b){return a*b},divide:function(a,b){return a/b},add:function(a,b){return a+b},subtract:function(a,b){return a-b},rgba:function(color,opacity){var rgb=originColor.hex2rgb(color);return'rgba('+rgb.join(', ')+', '+opacity+')';},font:function(v){if(v['variant']=='regular'||v['variant']==undefined)v['variant']='400';var isItalic=/(italic)/.test(v['variant']);var weight=/bold/.test(v['variant'])?'700':/([0-9]+)/.exec(v['variant'])[1];var r=[];r.push('font-weight: '+weight);r.push('font-family: "'+v['family']+'", Arial, Helvetica, Geneva, sans-serif');if(isItalic)r.push('font-style: italic');return r.join('; ')+'; ';},color_lum:function(val,lum,m){var lab=originColor.hex2lab(val);lum=Number(lum);if(m!=undefined)lum*=Number(m);lab[0]+=lum;return originColor.lab2hex(lab);},color_grey:function(val){var g=Math.round(Number(val)*255);if(g>=255)return'#FFFFFF';if(g<=0)return'#000000';var str=g.toString(16);if(str.length==1)str='0'+str;return'#'+Array(4).join(str);},css_texture:function(name,level){if(name=='::none'||level==0)return'none';return'url('+originSettings.templateUrl+'/images/textures/levels/'+name+'_l'+level+'.png)';},css_gradient:function(color,v){var b=originColor.hex2lab(color);var startColor,endColor;if(!isNaN(parseFloat(v))&&isFinite(v)){v=Number(v);startColor=originColor.lab2hex([b[0]-v/2,b[1],b[2]]);endColor=originColor.lab2hex([b[0]+v/2,b[1],b[2]]);}
else{startColor=originColor.hex2lab(color);endColor=originColor.hex2lab(v);}
return['background: '+color,'background: -moz-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)','background: -webkit-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)','background: -o-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)','background: -ms-linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)','background: linear-gradient(top, '+startColor+' 0%, '+endColor+' 100%)','filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'+startColor+'", endColorstr="'+endColor+'",GradientType=0 )',].join('; ')+'; ';},css_border_radius:function(radius){return['-webkit-border-radius:'+radius+'px','-moz-border-radius:'+radius+'px','border-radius:'+radius+'px'].join('; ')+'; ';},css_box_shadow:function(){var shadows=Math.ceil(arguments.length/6);var shadowDefs=[];for(var i=0;i<shadows;i++){var inset=arguments[i*6+0];var x=arguments[i*6+1];var y=arguments[i*6+2];var size=arguments[i*6+3];var color=originColor.hex2rgb(arguments[i*6+4]);var opacity=arguments[i*6+5];if(opacity>0){shadowDefs.push((inset?'inset ':'')
+x+'px '
+y+'px '
+size+'px '
+'rgba('+color.join(', ')+', '+opacity+')');}}
if(shadowDefs.length>0){return['box-shadow: '+shadowDefs.join(', '),'-webkit-box-shadow: '+shadowDefs.join(', '),'-moz-box-shadow: '+shadowDefs.join(', ')].join('; ')+'; ';}
else{return'';}},css_opacity:function(opacity){return['zoom: 1','filter: alpha(opacity='+Math.round(opacity*100)+')','opacity: '+opacity].join('; ')+'; ';},transparent_background:function(color,opacity){var rgb=originColor.hex2rgb(color);var hex=color+parseInt(Math.round(opacity*255)+'',10).toString(16);return['background-color: '+color,'background-color: rgba('+rgb.join(',')+','+opacity+')','filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='+hex+',endColorstr='+hex+')','zoom: 1'].join('; ')+'; ';},api_overlay:function(background,texture,texture_level,noise){if((texture=='::none'||texture_level==0)&&noise==0)return background;if(!texture instanceof Array){texture.texture=texture;texture.blend='Multiply';}
var request=[background.substring(1),texture.texture,texture.blend,texture_level,noise].map(encodeURIComponent).join('/');var url=originSettings.imageapiUrl+'/overlay/'+request+'/';return background+' url('+url+')';},api_gradient:function(start,end,height,texture,texture_level,noise){if((texture.texture=='::none'||texture_level==0)&&noise==0&&start==end){return start}
if(!texture instanceof Array){texture.texture=texture;texture.blend='Over';}
var request=[start.substring(1),end.substring(1),height,texture.texture,texture.blend,texture_level,noise].map(encodeURIComponent).join('/');var url=originSettings.imageapiUrl+'/gradient/'+request+'/';var r=end+' left top repeat-x url('+url+')';return r;}}
window.simpleHistory={stack:[],i:0,lock:false,add:function(input){if(this.i>0){this.stack.splice(0,this.i);}
this.i=0;this.stack.unshift(input);if(this.stack.length>50)this.stack.splice(50,999);this.updateButtonStates();},setItem:function(input){setPreviewInput(input);this.lock=true;for(var section in input){for(var field in input[section]){if(typeof input[section][field]==='string'){var name='settings['+section+']['+field+']';this.setFieldValue(name,input[section][field]);}
else{for(var i in input[section][field]){var name='settings['+section+']['+field+']['+i+']';this.setFieldValue(name,input[section][field][i]);}}}}
this.lock=false;},setFieldValue:function(name,value){jQuery('*[name="'+name.replace(/([\[\]])/g,"\\$1")+'"]').val(value).change();},undo:function(){this.i++;if(this.stack[this.i]!=undefined){this.setItem(this.stack[this.i]);}
else this.i=this.stack.length-1;this.updateButtonStates();},redo:function(){this.i--;if(this.i>=0)this.setItem(this.stack[this.i]);else this.i=0;this.updateButtonStates();},updateButtonStates:function(){if(this.i<this.stack.length)this.undoButton.css('opacity',1);else this.undoButton.css('opacity',0.35);if(this.i>0)this.redoButton.css('opacity',1);else this.redoButton.css('opacity',0.35);},setUndoButton:function(button){button.click(function(){window.simpleHistory.undo();return false;});this.undoButton=button;},setRedoButton:function(button){button.click(function(){window.simpleHistory.redo();return false;});this.redoButton=button;}};(function($){$.gritter={};$.gritter.options={position:'',class_name:'',fade_in_speed:'medium',fade_out_speed:1000,time:6000}
$.gritter.add=function(params){try{return Gritter.add(params||{});}catch(e){var err='Gritter Error: '+e;(typeof(console)!='undefined'&&console.error)?console.error(err,params):alert(err);}}
$.gritter.remove=function(id,params){Gritter.removeSpecific(id,params||{});}
$.gritter.removeAll=function(params){Gritter.stop(params||{});}
var Gritter={position:'',fade_in_speed:'',fade_out_speed:'',time:'',_custom_timer:0,_item_count:0,_is_setup:0,_tpl_close:'<div class="gritter-close"></div>',_tpl_item:'<div id="gritter-item-[[number]]" class="gritter-item-wrapper [[item_class]]" style="display:none"><div class="gritter-top"></div><div class="gritter-item">[[close]][[image]]<div class="[[class_name]]"><span class="gritter-title">[[username]]</span><p>[[text]]</p></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div>',_tpl_wrap:'<div id="gritter-notice-wrapper"></div>',add:function(params){if(!params.title||!params.text){throw'You need to fill out the first 2 params: "title" and "text"';}
if(!this._is_setup){this._runSetup();}
var user=params.title,text=params.text,image=params.image||'',sticky=params.sticky||false,item_class=params.class_name||$.gritter.options.class_name,position=$.gritter.options.position,time_alive=params.time||'';this._verifyWrapper();this._item_count++;var number=this._item_count,tmp=this._tpl_item;$(['before_open','after_open','before_close','after_close']).each(function(i,val){Gritter['_'+val+'_'+number]=($.isFunction(params[val]))?params[val]:function(){}});this._custom_timer=0;if(time_alive){this._custom_timer=time_alive;}
var image_str=(image!='')?'<img src="'+image+'" class="gritter-image" />':'',class_name=(image!='')?'gritter-with-image':'gritter-without-image';tmp=this._str_replace(['[[username]]','[[text]]','[[close]]','[[image]]','[[number]]','[[class_name]]','[[item_class]]'],[user,text,this._tpl_close,image_str,this._item_count,class_name,item_class],tmp);if(this['_before_open_'+number]()===false){return false;}
$('#gritter-notice-wrapper').addClass(position).append(tmp);var item=$('#gritter-item-'+this._item_count);item.fadeIn(this.fade_in_speed,function(){Gritter['_after_open_'+number]($(this));});if(!sticky){this._setFadeTimer(item,number);}
$(item).bind('mouseenter mouseleave',function(event){if(event.type=='mouseenter'){if(!sticky){Gritter._restoreItemIfFading($(this),number);}}
else{if(!sticky){Gritter._setFadeTimer($(this),number);}}
Gritter._hoverState($(this),event.type);});$(item).find('.gritter-close').click(function(){Gritter.removeSpecific(number,{},null,true);});return number;},_countRemoveWrapper:function(unique_id,e,manual_close){e.remove();this['_after_close_'+unique_id](e,manual_close);if($('.gritter-item-wrapper').length==0){$('#gritter-notice-wrapper').remove();}},_fade:function(e,unique_id,params,unbind_events){var params=params||{},fade=(typeof(params.fade)!='undefined')?params.fade:true;fade_out_speed=params.speed||this.fade_out_speed,manual_close=unbind_events;this['_before_close_'+unique_id](e,manual_close);if(unbind_events){e.unbind('mouseenter mouseleave');}
if(fade){e.animate({opacity:0},fade_out_speed,function(){e.animate({height:0},300,function(){Gritter._countRemoveWrapper(unique_id,e,manual_close);})})}
else{this._countRemoveWrapper(unique_id,e);}},_hoverState:function(e,type){if(type=='mouseenter'){e.addClass('hover');e.find('.gritter-close').show();}
else{e.removeClass('hover');e.find('.gritter-close').hide();}},removeSpecific:function(unique_id,params,e,unbind_events){if(!e){var e=$('#gritter-item-'+unique_id);}
this._fade(e,unique_id,params||{},unbind_events);},_restoreItemIfFading:function(e,unique_id){clearTimeout(this['_int_id_'+unique_id]);e.stop().css({opacity:'',height:''});},_runSetup:function(){for(opt in $.gritter.options){this[opt]=$.gritter.options[opt];}
this._is_setup=1;},_setFadeTimer:function(e,unique_id){var timer_str=(this._custom_timer)?this._custom_timer:this.time;this['_int_id_'+unique_id]=setTimeout(function(){Gritter._fade(e,unique_id);},timer_str);},stop:function(params){var before_close=($.isFunction(params.before_close))?params.before_close:function(){};var after_close=($.isFunction(params.after_close))?params.after_close:function(){};var wrap=$('#gritter-notice-wrapper');before_close(wrap);wrap.fadeOut(function(){$(this).remove();after_close();});},_str_replace:function(search,replace,subject,count){var i=0,j=0,temp='',repl='',sl=0,fl=0,f=[].concat(search),r=[].concat(replace),s=subject,ra=r instanceof Array,sa=s instanceof Array;s=[].concat(s);if(count){this.window[count]=0;}
for(i=0,sl=s.length;i<sl;i++){if(s[i]===''){continue;}
for(j=0,fl=f.length;j<fl;j++){temp=s[i]+'';repl=ra?(r[j]!==undefined?r[j]:''):r[0];s[i]=(temp).split(f[j]).join(repl);if(count&&s[i]!==temp){this.window[count]+=(temp.length-s[i].length)/f[j].length;}}}
return sa?s:s[0];},_verifyWrapper:function(){if($('#gritter-notice-wrapper').length==0){$('body').append(this._tpl_wrap);}}}})(jQuery);
/*!
 * jQuery Smooth Scroll Plugin v1.4.5
 *
 * Date: Sun Mar 11 18:17:42 2012 EDT
 * Requires: jQuery v1.3+
 *
 * Copyright 2012, Karl Swedberg
 * Dual licensed under the MIT and GPL licenses (just like jQuery):
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 *
 *
 *
*/
(function($){var version='1.4.4',defaults={exclude:[],excludeWithin:[],offset:0,direction:'top',scrollElement:null,scrollTarget:null,beforeScroll:function(){},afterScroll:function(){},easing:'swing',speed:400,autoCoefficent:2},getScrollable=function(opts){var scrollable=[],scrolled=false,dir=opts.dir&&opts.dir=='left'?'scrollLeft':'scrollTop';this.each(function(){if(this==document||this==window){return;}
var el=$(this);if(el[dir]()>0){scrollable.push(this);return;}
el[dir](1);scrolled=el[dir]()>0;el[dir](0);if(scrolled){scrollable.push(this);return;}});if(opts.el==='first'&&scrollable.length){scrollable=[scrollable.shift()];}
return scrollable;},isTouch='ontouchend'in document;$.fn.extend({scrollable:function(dir){var scrl=getScrollable.call(this,{dir:dir});return this.pushStack(scrl);},firstScrollable:function(dir){var scrl=getScrollable.call(this,{el:'first',dir:dir});return this.pushStack(scrl);},smoothScroll:function(options){options=options||{};var opts=$.extend({},$.fn.smoothScroll.defaults,options),locationPath=$.smoothScroll.filterPath(location.pathname);this.die('click.smoothscroll').live('click.smoothscroll',function(event){var clickOpts={},link=this,$link=$(this),hostMatch=((location.hostname===link.hostname)||!link.hostname),pathMatch=opts.scrollTarget||($.smoothScroll.filterPath(link.pathname)||locationPath)===locationPath,thisHash=escapeSelector(link.hash),include=true;if(!opts.scrollTarget&&(!hostMatch||!pathMatch||!thisHash)){include=false;}else{var exclude=opts.exclude,elCounter=0,el=exclude.length;while(include&&elCounter<el){if($link.is(escapeSelector(exclude[elCounter++]))){include=false;}}
var excludeWithin=opts.excludeWithin,ewlCounter=0,ewl=excludeWithin.length;while(include&&ewlCounter<ewl){if($link.closest(excludeWithin[ewlCounter++]).length){include=false;}}}
if(include){event.preventDefault();$.extend(clickOpts,opts,{scrollTarget:opts.scrollTarget||thisHash,link:link});$.smoothScroll(clickOpts);}});return this;}});$.smoothScroll=function(options,px){var opts,$scroller,scrollTargetOffset,speed,scrollerOffset=0,offPos='offset',scrollDir='scrollTop',aniprops={},useScrollTo=false,scrollprops=[];if(typeof options==='number'){opts=$.fn.smoothScroll.defaults;scrollTargetOffset=options;}else{opts=$.extend({},$.fn.smoothScroll.defaults,options||{});if(opts.scrollElement){offPos='position';if(opts.scrollElement.css('position')=='static'){opts.scrollElement.css('position','relative');}}
scrollTargetOffset=px||($(opts.scrollTarget)[offPos]()&&$(opts.scrollTarget)[offPos]()[opts.direction])||0;}
opts=$.extend({link:null},opts);scrollDir=opts.direction=='left'?'scrollLeft':scrollDir;if(opts.scrollElement){$scroller=opts.scrollElement;scrollerOffset=$scroller[scrollDir]();}else{$scroller=$('html, body').firstScrollable();useScrollTo=isTouch&&'scrollTo'in window;}
aniprops[scrollDir]=scrollTargetOffset+scrollerOffset+opts.offset;opts.beforeScroll.call($scroller,opts);if(useScrollTo){scrollprops=(opts.direction=='left')?[aniprops[scrollDir],0]:[0,aniprops[scrollDir]];window.scrollTo.apply(window,scrollprops);opts.afterScroll.call(opts.link,opts);}else{speed=opts.speed;if(speed==='auto'){speed=aniprops[scrollDir]||$scroller.scrollTop();speed=speed/opts.autoCoefficent;}
$scroller.animate(aniprops,{duration:speed,easing:opts.easing,complete:function(){opts.afterScroll.call(opts.link,opts);}});}};$.smoothScroll.version=version;$.smoothScroll.filterPath=function(string){return string.replace(/^\//,'').replace(/(index|default).[a-zA-Z]{3,4}$/,'').replace(/\/$/,'');};$.fn.smoothScroll.defaults=defaults;function escapeSelector(str){return str.replace(/(:|\.)/g,'\\$1');}})(jQuery);(function($){$.fn.originHighlight=function(options){var basicCss={'position':'absolute','opacity':0.55,'background':'green','z-index':9999};options=$.extend({'class':'origin-highlight'},options);return this.each(function(){var $$=$(this);if(!$$.is(':visible'))return;var offset=$$.offset();var css=[];css.push({'height':4,'width':$$.outerWidth()+10,'left':offset.left-5,'top':offset.top-5,'box-shadow':'0px 2px 1px rgba(0,0,0,0.3)'});css.push({'height':4,'width':$$.outerWidth()+10,'left':offset.left-5,'top':offset.top+$$.outerHeight()+1,'box-shadow':'0px -2px 1px rgba(0,0,0,0.3)'});css.push({'height':$$.outerHeight()+2,'width':4,'left':offset.left-5,'top':offset.top-1,'box-shadow':'2px 0px 1px rgba(0,0,0,0.3)'});css.push({'height':$$.outerHeight()+2,'width':4,'left':offset.left+$$.outerWidth()+1,'top':offset.top-1,'box-shadow':'-2px 0px 1px rgba(0,0,0,0.3)'});var highlights=[];for(var i=0;i<css.length;i++){highlights.push($('<div></div>').addClass(options['class']).css(basicCss).css(css[i]).appendTo($$.closest('body')));}
$$.data('highlights',highlights);})};$.fn.originUnhighlight=function(){return this.each(function(){var $$=$(this);var hl=$$.data('highlights');if(hl==undefined||hl==null)return;for(var i=0;i<hl.length;i++){hl[i].remove();}
$$.data('highlights',null);});};})(jQuery);var lastInput=undefined;var updateLocked=false;var previewUpdate=function(trigger,refresh,clean){if(simpleHistory.lock)return;var confirm=false;if(refresh==undefined&&clean==undefined)confirm=true;if(refresh==undefined)refresh=false;if(clean==undefined)clean=false;var input=getOriginValues();if(refresh){setPreviewInput(input,clean);}
else{if(lastInput==JSON.stringify(input))return false;lastInput=JSON.stringify(input);simpleHistory.add(input);setPreviewInput(input,clean);}
if(confirm){jQuery(window).unbind('beforeunload');jQuery(window).bind('beforeunload',function(){return'Are you sure you want to navigate away from this page?';});}
return input;}
var getOriginValues=function(){var $=jQuery;var input={};$('.preview-field').each(function(){var $$=$(this);var reg=(/\[(.*?)\]/g);var match;var name=[];while(match=reg.exec($$.attr('name'))){name.push(match[1]);}
if(input[name[0]]==undefined)input[name[0]]={};var val;if($$.attr('type')=='checkbox')val=$$.is(':checked');else val=$$.val();if(name[2]==undefined)input[name[0]][name[1]]=val;else{if(input[name[0]][name[1]]==undefined)input[name[0]][name[1]]={};input[name[0]][name[1]][name[2]]=val;}});return input;}
var setPreviewInput=function(input,clean){if(clean==undefined)first=false;var $=jQuery;var css=originGenerateCss(input,originExecutor);if(clean){$('#preview-iframe').contents().find('#origin-css').remove().end().find('head').append($('<style type="text/css" id="origin-css"></style>').html(css));return;}
var parser=new CSSParser();var newSheet=parser.parse(css,false,true);if(frames['preview-iframe'].document.getElementById('origin-css')==null)return;var previewSheet=frames['preview-iframe'].document.getElementById('origin-css').sheet;var cssRule=false;var i=0;do{if(previewSheet.cssRules){cssRule=previewSheet.cssRules[i];}
else{cssRule=previewSheet.rules[i];}
if(cssRule){var newCssRule=newSheet.cssRules[i];if(newCssRule.mSelectorText==cssRule.selectorText){for(var k in newCssRule.declarations){var d=newCssRule.declarations[k];if(cssRule.style[d.property]!=d.valueText){cssRule.style[d.property]=d.valueText;}}}}
i++;}while(cssRule);}
jQuery(function($){$("#preview-iframe").load(function(){previewUpdate(null,true,true);});});jQuery(function($){$('#share-modal iframe').load(function(){$(this).show();});$('.od-bar-button.share').click(function(){$('#od-overlay').css('opacity',0.99).fadeIn();$('#share-modal').fadeIn().css({'margin-top':-$('#share-modal').height()/2,'margin-left':-$('#share-modal').width()/2,}).find('iframe').hide();var sform=$('#settings-form');sform.attr('action',originSettings.shareUrl).attr('target','share-iframe').submit().attr('action',sform.attr('data-original-url'));});$('#share-modal .close').click(function(){$('#share-modal').fadeOut();$('#od-overlay').fadeOut();});});
/*! Copyright (c) 2011 Piotr Rochala (http://rocha.la)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version: 0.5.0
 * 
 */
(function($){jQuery.fn.extend({slimScroll:function(options){var defaults={wheelStep:20,width:'auto',height:'250px',size:'7px',color:'#000',position:'right',distance:'1px',start:'top',opacity:.4,alwaysVisible:false,railVisible:false,railColor:'#333',railOpacity:'0.2',railClass:'slimScrollRail',barClass:'slimScrollBar',wrapperClass:'slimScrollDiv',allowPageScroll:false,scroll:0};var o=ops=$.extend(defaults,options);this.each(function(){var isOverPanel,isOverBar,isDragg,queueHide,barHeight,percentScroll,divS='<div></div>',minBarHeight=30,releaseScroll=false,wheelStep=parseInt(o.wheelStep),cwidth=o.width,cheight=o.height,size=o.size,color=o.color,position=o.position,distance=o.distance,start=o.start,opacity=o.opacity,alwaysVisible=o.alwaysVisible,railVisible=o.railVisible,railColor=o.railColor,railOpacity=o.railOpacity,allowPageScroll=o.allowPageScroll,scroll=o.scroll;var me=$(this);if(me.parent().hasClass('slimScrollDiv'))
{if(scroll)
{bar=me.parent().find('.slimScrollBar');rail=me.parent().find('.slimScrollRail');scrollContent(me.scrollTop()+parseInt(scroll),false,true);}
return;}
var wrapper=$(divS).addClass(o.wrapperClass).css({position:'relative',overflow:'hidden',width:cwidth,height:cheight});me.css({overflow:'hidden',width:cwidth,height:cheight});var rail=$(divS).addClass(o.railClass).css({width:size,height:'100%',position:'absolute',top:0,display:(alwaysVisible&&railVisible)?'block':'none','border-radius':size,background:railColor,opacity:railOpacity,zIndex:90});var bar=$(divS).addClass(o.barClass).css({background:color,width:size,position:'absolute',top:0,opacity:opacity,display:alwaysVisible?'block':'none','border-radius':size,BorderRadius:size,MozBorderRadius:size,WebkitBorderRadius:size,zIndex:99});var posCss=(position=='right')?{right:distance}:{left:distance};rail.css(posCss);bar.css(posCss);me.wrap(wrapper);me.parent().append(bar);me.parent().append(rail);bar.draggable({axis:'y',containment:'parent',start:function(){isDragg=true;},stop:function(){isDragg=false;hideBar();},drag:function(e)
{scrollContent(0,$(this).position().top,false);}});rail.hover(function(){showBar();},function(){hideBar();});bar.hover(function(){isOverBar=true;},function(){isOverBar=false;});me.hover(function(){isOverPanel=true;showBar();hideBar();},function(){isOverPanel=false;hideBar();});var _onWheel=function(e)
{if(!isOverPanel){return;}
var e=e||window.event;var delta=0;if(e.wheelDelta){delta=-e.wheelDelta/120;}
if(e.detail){delta=e.detail/3;}
scrollContent(delta,true);if(e.preventDefault&&!releaseScroll){e.preventDefault();}
if(!releaseScroll){e.returnValue=false;}}
function scrollContent(y,isWheel,isJump)
{var delta=y;if(isWheel)
{delta=parseInt(bar.css('top'))+y*wheelStep/100*bar.outerHeight();var maxTop=me.outerHeight()-bar.outerHeight();delta=Math.min(Math.max(delta,0),maxTop);bar.css({top:delta+'px'});}
percentScroll=parseInt(bar.css('top'))/(me.outerHeight()-bar.outerHeight());delta=percentScroll*(me[0].scrollHeight-me.outerHeight());if(isJump)
{delta=y;var offsetTop=delta/me[0].scrollHeight*me.outerHeight();bar.css({top:offsetTop+'px'});}
me.scrollTop(delta);showBar();hideBar();}
var attachWheel=function()
{if(window.addEventListener)
{this.addEventListener('DOMMouseScroll',_onWheel,false);this.addEventListener('mousewheel',_onWheel,false);}
else
{document.attachEvent("onmousewheel",_onWheel)}}
attachWheel();function getBarHeight()
{barHeight=Math.max((me.outerHeight()/me[0].scrollHeight)*me.outerHeight(),minBarHeight);bar.css({height:barHeight+'px'});}
getBarHeight();function showBar()
{getBarHeight();clearTimeout(queueHide);releaseScroll=allowPageScroll&&percentScroll==~~percentScroll;if(barHeight>=me.outerHeight()){releaseScroll=true;return;}
bar.stop(true,true).fadeIn('fast');if(railVisible){rail.stop(true,true).fadeIn('fast');}}
function hideBar()
{if(!alwaysVisible)
{queueHide=setTimeout(function(){if(!isOverBar&&!isDragg)
{bar.fadeOut('slow');rail.fadeOut('slow');}},1000);}}
if(start=='bottom')
{bar.css({top:me.outerHeight()-bar.outerHeight()});scrollContent(0,true);}
else if(typeof start=='object')
{scrollContent($(start).position().top,null,true);if(!alwaysVisible){bar.hide();}}});return this;}});jQuery.fn.extend({slimscroll:jQuery.fn.slimScroll});})(jQuery);