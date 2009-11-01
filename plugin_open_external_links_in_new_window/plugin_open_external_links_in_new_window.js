jQuery(function(){

  // Find some external links:
  jQuery('a[rel*=external], li.widget_links a, div.entry a:not(.more-link), a.rsswidget').click(function(){
    window.open(this.href);
    return false;
  });

});