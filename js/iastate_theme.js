/**
 * @file
 * javascript for the ISU Theme.
 */

(function ($, Drupal) {
  $(document).ready(function() {

 // Toggle Menu Navbar and Site Links on Mobile
  $('#isu-menu-navbar_toggler').click(function() {
    $('#isu-menu-navbar_toggler').toggleClass('isu-menu-navbar_toggler_open');
    $('#isu-menu-navbar_collapse').toggleClass('isu-menu-navbar_show');
    $('#isu-sitelinks_collapse').toggleClass('isu-sitelinks_show');
  });


 // Toggle Search on Mobile
  $('#isu-search_toggler').click(function() {
    $('#isu-search_toggler').toggleClass('isu-search_toggler_open');
    $('#isu-search_collapse').toggleClass('isu-search_show');
  });

});

 })(jQuery, Drupal);