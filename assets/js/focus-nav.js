jQuery(document).ready(function () {
  window.automobile_hub_currentfocus=null;
    automobile_hub_checkfocusdElement();
  var automobile_hub_body = document.querySelector('body');
  automobile_hub_body.addEventListener('keyup', automobile_hub_check_tab_press);
  var automobile_hub_gotoHome = false;
  var automobile_hub_gotoClose = false;
  window.automobile_hub_responsiveMenu=false;
  function automobile_hub_checkfocusdElement(){
    if(window.automobile_hub_currentfocus=document.activeElement.className){
      window.automobile_hub_currentfocus=document.activeElement.className;
    }
  }
  function automobile_hub_check_tab_press(e) {
    "use strict";
    // pick passed event or global event object if passed one is empty
    e = e || event;
    var activeElement;

    if(window.innerWidth < 999){
    if (e.keyCode == 9) {
      if(window.automobile_hub_responsiveMenu){
      if (!e.shiftKey) {
        if(automobile_hub_gotoHome) {
          jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
        }
      }
      if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
        automobile_hub_gotoHome = true;
      } else {
        automobile_hub_gotoHome = false;
      }

    }else{

      if(window.automobile_hub_currentfocus=="responsivetoggle"){
        jQuery( "" ).focus();
      }}}
    }
    if (e.shiftKey && e.keyCode == 9) {
    if(window.innerWidth < 999){
      if(window.automobile_hub_currentfocus=="header-search"){
        jQuery(".responsivetoggle").focus();
      }else{
        if(window.automobile_hub_responsiveMenu){
        if(automobile_hub_gotoClose){
          jQuery("a.closebtn.mobile-menu").focus();
        }
        if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
          automobile_hub_gotoClose = true;
        } else {
          automobile_hub_gotoClose = false;
        }
      
      }else{

      if(window.automobile_hub_responsiveMenu){
      }}}}
    }
    automobile_hub_checkfocusdElement();
  }
});