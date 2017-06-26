(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// 'use strict';

jQuery(document).ready(function($) {

  require('./checkbox-group');
  require('./footer-sortables');
  require('./frontpage-sortables');
  require('./load-preview-url');
  require('./refresh-alert');

  require('./sortable');
  require('./widgetized-sortables');


});

window.$ = jQuery;

},{"./checkbox-group":2,"./footer-sortables":3,"./frontpage-sortables":4,"./load-preview-url":5,"./refresh-alert":6,"./sortable":7,"./widgetized-sortables":8}],2:[function(require,module,exports){
$('.js--checkbox-group input[type="checkbox"]').on('change', function(e){
  var $this = $(this);
  var $parent = $this.closest('.js--checkbox-group');
  var targetID = $parent.attr('id');
  var $targetField = $('.'+targetID.replace('js--', ''));
  var settingID = $parent.data('setting');
  var $siblings = $parent.find('input[type="checkbox"]:checked');
  var thisVal = $this.val();
  var checked = [];

  $siblings.each(function(idx) {

    var $thisComp = $(this);
    var component = $thisComp.val();

    checked.push(component);
  });


  save_checkbox_group_value(settingID, JSON.stringify(checked), $targetField );

});


function save_checkbox_group_value(key, componentsStr, $field){

  wp.customize( key, function ( obj ) {

    obj.set( componentsStr );
  } );

  $field.val( componentsStr );
}

},{}],3:[function(require,module,exports){
jQuery(function($) {

  if($('.js--footer-sortables').length <= 0)
    return;

  var $sortableList = $('.js--footer-sortables');
  var $groupWrapper = $sortableList.closest('.sortables');
  var siblingsName = $groupWrapper.find('.'+$sortableList.data('sortable-group'));
  var id = $sortableList.data('sortable-group').replace('_control', '_setting');
  var $active = $groupWrapper.find('.js--sortables-active');

  var $field = $groupWrapper.find('input[type="hidden"]');
  // inits the sortable and does things
  $sortableList.sortable({
    placeholder: 'ui-state-highlight',
    connectWith: siblingsName,
    change: function(e, u){

    },
  	update: function(event, ui) {
      var $this = $(this);

      var activeComponentsStr = '';

      activeComponentsStr = get_active_sortables($active);

      save_values(id, activeComponentsStr, $field)
    },
    receive: function(e){}
  });


  // when the visibility changes
  // $('.sortable__visibility select').on('change', function(e){
  //   var $this = $(this);
  //   var thisVal = $this.val();
  //   $this.closest('.sortable').addClass('save-warning');
  //   $('#submit').parent('.submit').addClass('save-warning');
  //
  //   var activeComponentsStr = get_active_sortables($active);
  //   save_values(id, activeComponentsStr, $field);
  //
  // });


  // gets the active sortables and sets their settings/positions to a string to be saved
  function get_active_sortables($active){
    var activeComponents = [];

    // loop through the active components and collect their data
    $active.find('li').each(function(idx) {
        var $thisComp = $(this);
        var component = $thisComp.attr('id');
        var label = $thisComp.text();

        $thisComp.addClass('save-warning');
        activeComponents.push({
          name: component,
          label: label
        });
    });
    // stringify the array into a string and return
    return JSON.stringify(activeComponents);
  }


  function save_values(key, activeComponentsStr, $field){

    wp.customize( key, function ( obj ) {

      obj.set( activeComponentsStr );
    } );

    $field.val(activeComponentsStr);
  }
});

},{}],4:[function(require,module,exports){
jQuery(function($) {

  if($('.js--frontpage-sortables').length <= 0)
    return;

  var $sortableList = $('.js--frontpage-sortables');
  var $groupWrapper = $sortableList.closest('.sortables');
  var siblingsName = $groupWrapper.find('.'+$sortableList.data('sortable-group'));
  var id = $sortableList.data('sortable-group').replace('_control', '_setting');
  var $active = $groupWrapper.find('.js--sortables-active');

  var $field = $groupWrapper.find('input[type="hidden"]');
  // inits the sortable and does things
  $sortableList.sortable({
    placeholder: 'ui-state-highlight',
    connectWith: siblingsName,
    change: function(e, u){

    },
  	update: function(event, ui) {
      var $this = $(this);

      var activeComponentsStr = '';

      activeComponentsStr = get_active_sortables($active);

      save_values(id, activeComponentsStr, $field)
    },
    receive: function(e){}
  });


  // when the visibility changes
  $('.sortable__visibility select').on('change', function(e){
    var $this = $(this);
    var thisVal = $this.val();
    $this.closest('.sortable').addClass('save-warning');
    $('#submit').parent('.submit').addClass('save-warning');

    var activeComponentsStr = get_active_sortables($active);
    save_values(id, activeComponentsStr, $field);

  });


  // gets the active sortables and sets their settings/positions to a string to be saved
  function get_active_sortables($active){
    var activeComponents = [];

    // loop through the active components and collect their data
    $active.find('li').each(function(idx) {
        var $thisComp = $(this);
        var component = $thisComp.attr('id');
        var label = $thisComp.text();

        $thisComp.addClass('save-warning');
        activeComponents.push({
          name: component,
          label: label
        });
    });
    // stringify the array into a string and return
    return JSON.stringify(activeComponents);
  }


  function save_values(key, activeComponentsStr, $field){

    wp.customize( key, function ( obj ) {
      obj.set( activeComponentsStr );
    } );

    $field.val(activeComponentsStr);
  }
});

},{}],5:[function(require,module,exports){
function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}



(function ( api ) {
    api.section( '_404_settings_section', function( section ) {
        section.expanded.bind( function( isExpanded ) {
            var rand = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
            var url = api.settings.url.home + rand;
            var previousUrl = api.previewer.previewUrl.get();
            if ( isExpanded ) {
                api.previewer.previewUrl.set( url );
            }
        } );
    } );
} ( wp.customize ) );

},{}],6:[function(require,module,exports){
window.refreshAlert = function() {

  $('#save').addClass('alert alert--refresh').val('Save and Refresh');
}

},{}],7:[function(require,module,exports){
jQuery(function($) {

  if($('.js--sortables').length <= 0)
    return;

  var $sortableList = $('.js--sortables');
  var $groupWrapper = $sortableList.closest('.sortables');
  var siblingsName = $groupWrapper.find('.'+$sortableList.data('sortable-group'));
  var id = $sortableList.data('sortable-group').replace('_control', '_setting');
  var $active = $groupWrapper.find('.js--sortable-active');

  var $field = $groupWrapper.find('input[type="hidden"]');


  // inits the sortable and does things
  $sortableList.sortable({
    placeholder: 'ui-state-highlight',
    connectWith: siblingsName,
  	update: function(event, ui) {
      var $this = $(this);

      var activeComponentsStr = '';

      activeComponentsStr = get_active_sortables($active);

      save_values(id, activeComponentsStr, $field)
    },
    receive: function(e){}
  });


  // when the visibility changes
  $('.sortable__visibility select').on('change', function(e){
    var $this = $(this);
    var thisVal = $this.val();
    $this.closest('.sortable').addClass('save-warning');
    $('#submit').parent('.submit').addClass('save-warning');

    var activeComponentsStr = get_active_sortables($active);
    save_values(id, activeComponentsStr, $field);

  });


  // gets the active sortables and sets their settings/positions to a string to be saved
  function get_active_sortables($active){
    var activeComponents = [];

    // loop through the active components and collect their data
    $active.find('li').each(function(idx) {
        var $thisComp = $(this);
        var component = $thisComp.attr('id');
        var label = $thisComp.text();

        $thisComp.addClass('save-warning');
        activeComponents.push({
          name: component,
          label: label
        });
    });
    // stringify the array into a string and return
    return JSON.stringify(activeComponents);
  }


  function save_values(key, activeComponentsStr, $field){


    wp.customize( key, function ( obj ) {
      obj.set( activeComponentsStr );
    } );

    $field.val(activeComponentsStr);
  }
});

},{}],8:[function(require,module,exports){
jQuery(function($) {

  if($('.js--widgetized-sortables').length <= 0)
    return;

  var $sortableList = $('.js--widgetized-sortables');
  var $groupWrapper = $sortableList.closest('.sortables');
  var siblingsName = $groupWrapper.find('.'+$sortableList.data('sortable-group'));
  var id = $sortableList.data('sortable-group').replace('_control', '_setting');
  var $active = $groupWrapper.find('.js--sortables-active');

  var $field = $groupWrapper.find('input[type="hidden"]');
  // inits the sortable and does things
  $sortableList.sortable({
    placeholder: 'ui-state-highlight',
    connectWith: siblingsName,
    change: function(e, u){

    },
  	update: function(event, ui) {
      var $this = $(this);

      var activeComponentsStr = '';

      activeComponentsStr = get_active_sortables($active);

      save_values(id, activeComponentsStr, $field)
    },
    receive: function(e){}
  });


  // when the visibility changes
  $('.sortable__visibility select').on('change', function(e){
    var $this = $(this);
    var thisVal = $this.val();
    $this.closest('.sortable').addClass('save-warning');
    $('#submit').parent('.submit').addClass('save-warning');

    var activeComponentsStr = get_active_sortables($active);
    save_values(id, activeComponentsStr, $field);

  });


  // gets the active sortables and sets their settings/positions to a string to be saved
  function get_active_sortables($active){
    var activeComponents = [];

    // loop through the active components and collect their data
    $active.find('li').each(function(idx) {
        var $thisComp = $(this);
        var component = $thisComp.attr('id');
        var label = $thisComp.text();

        $thisComp.addClass('save-warning');
        activeComponents.push({
          name: component,
          label: label
        });
    });
    // stringify the array into a string and return
    return JSON.stringify(activeComponents);
  }


  function save_values(key, activeComponentsStr, $field){


    wp.customize( key, function ( obj ) {
      obj.set( activeComponentsStr );
    } );

    $field.val(activeComponentsStr);
  }
});

},{}]},{},[1]);
