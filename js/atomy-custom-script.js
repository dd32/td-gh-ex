/**
 * atom-custom-script.js
 * author    Franchi Design
 * package   Atomy
 * version   1.0.0
 */


//FEATURED HOVER
$(document).ready(function(){
    $(".linkfeat").hover(
      function () {
          $(".textfeat").show(500);
      },
      function () {
          $(".textfeat").hide(500);
      }
  );
});



