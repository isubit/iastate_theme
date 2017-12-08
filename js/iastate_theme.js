/**
 * @file
 * javascript for the ISU Theme.
 */

(function ($, Drupal) {

 // Toggle Menu Navbar and Site Links on Mobile
 $(document).ready(function() {
  $('#isu-menu-navbar_toggler').click(function() {
    $('#isu-menu-navbar_collapse').toggleClass('isu-menu-navbar_show');
    $('#isu-sitelinks_collapse').toggleClass('isu-sitelinks_show');
  });
 })

 // Toggle Search on Mobile
 $(document).ready(function() {
  $('#isu-search_toggler').click(function() {
    $('#isu-search_collapse').toggleClass('isu-search_show');
  });
 })

 })(jQuery, Drupal);