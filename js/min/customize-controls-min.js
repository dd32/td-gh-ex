jQuery(document).ready(function(){"use strict";function r(r){var e=r.find(".repeater").map(function(){return jQuery(this).attr("data-sorter")}).toArray();r.find(".customize-control-drag-and-drop").val(e),r.find(".customize-control-drag-and-drop").trigger("change")}jQuery(".drag_and_drop_control").each(function(){var r=jQuery(this).find(".customize-control-drag-and-drop").val().split(","),e=jQuery.map(r,function(e,t){return jQuery(".drag_and_drop_control").find("[data-sorter="+r[t]+"]").text()}),t=r.length,a;for(a=0;t>=a;a++)jQuery(this).find(".repeater:eq("+a+")").attr("data-sorter",r[a]).html('<div class="repeater-input">'+e[a]+"</div>");""==sorter.woocommerce&&jQuery(".sortable").find('[data-sorter="feat_prod"],[data-sorter="feat_prod_car"]').remove()}),jQuery(this).find(".sortable").sortable({items:"> li:not(.disabled)",helper:"clone",update:function(e,t){r(jQuery(this).parent())}}),jQuery.each(sorter,function(r,e){"disable"==e&&jQuery(".sortable").find("[data-sorter="+r+"]").addClass("disabled")}),jQuery(".sortable").find("li").each(function(){jQuery(this).hasClass("disabled")?jQuery(this).removeData("sortableItem"):!1}),jQuery(".sorter_reset").click(function(){var r="feat_posts,feat_posts_car,feat_cat,feat_prod,feat_prod_car",e=r.split(","),t=jQuery.map(e,function(r,t){return jQuery(".drag_and_drop_control").find("[data-sorter="+e[t]+"]").text()}),a=e.length,o;for(o=0;a>=o;o++)jQuery(".sortable").find(".repeater:eq("+o+")").attr("data-sorter",e[o]).html('<div class="repeater-input">'+t[o]+"</div>");jQuery(".drag_and_drop_control").find(".customize-control-drag-and-drop").val(r),jQuery(".drag_and_drop_control").find(".customize-control-drag-and-drop").trigger("change")}),jQuery("body").on("click",".enable-disable-switch",function(){var r=jQuery(this);r.hasClass("switch-enable")?(jQuery(this).removeClass("switch-enable"),r.next("input").val("disable").trigger("change")):(jQuery(this).addClass("switch-enable"),r.next("input").val("enable").trigger("change"))})});