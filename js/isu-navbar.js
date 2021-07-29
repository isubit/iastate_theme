/**
 * @file
 * jQuery the ISU Navbar. Includes keyboard navigable functionality.
 */

 (function ($, Drupal) {

$(document).ready(function() {
  
  // Allow navigation with left and right arrow keys
  $('#isu-navbar').on('keydown', function(event) {
      if (event.keyCode === 39) { // right 
        event.preventDefault();
        if ( $(':focus').is('.isu-navbar_dropdown-menu a') ) {
          // If the focused item is a link in a dropdown...
          // Then change the focus to the link in the next li
          $(':focus').parent('li').next('li').children('a').focus();
        } else if ( $(':focus').is('.isu-navbar_menu--left li:last-of-type a') ) {
          // Or if the focused item is the last parent link in the first section (aka 'Index')...
          // Change the focus to the link in the first li of the next section
          $(':focus').closest('div').next('div').find('li:first-of-type a').focus();
        } else {
          // Finally, if the item is in the top level, but not the last item...
          // Change the focus to the link in the next li
          $(':focus').parent('li').next('li').children('a').focus();
        }

      } else if (event.keyCode === 37) { // left
        if ( $(':focus').is('.isu-navbar_alpha a') ) {
          // If the item is in the Index dropdown...
          // Change the focus to the link in the previous li
          $(':focus').parent('li').prev('li').children('a').focus();
        } else if ( $(':focus').is('.isu-navbar_menu--right > li:first-of-type a') ) {
          // Or if the item is the first link in the second section aka 'Directory'
          // Change the focus to the last link in the previous section
          $(':focus').closest('div').prev('div').find('li:last-of-type a').focus();
        } else {
          // If the item is in the top level
          $(':focus').parent().prev().children('a').focus();
        }
      
      }
  });
  
  // Traverse Signons menu with up/down arrow keys
  $('.isu-navbar_signons').on('keydown', function(event) { 
      if (event.keyCode === 40) { // down
        event.preventDefault();
        // Change the focus to the link in the next li
        $(':focus').parent('li').next('li').children('a').focus();
      } else if (event.keyCode == 38) { // up
        if ( $(':focus').is('.isu-navbar_signons li:not(:first-of-type) a') ) {
          // If the focus is NOT the first item in the list...
          // Change the focus to the link in the previous li
          $(':focus').parent('li').prev().children('a').focus();
        }
      }
  })
  
  // Enter dropdowns with the down arrow
  $('.isu-navbar_dropdown > .isu-navbar_dropdown-toggle').on('keydown', function(event) {
    var dropdownToggle = $(this);
      if (event.keyCode === 40) { // down
        event.preventDefault();
        // Add class for styling
        dropdownToggle.addClass('has-focus');
        // Open menu
        dropdownToggle.parents('.isu-navbar_dropdown').attr('data-isu-navbar-expanded', 'true');
        // Change focus to first link in the dropdown
        $(':focus').next().find('li:first-of-type a').focus();
      }
  });

  // Exit the Index submenu with up arrow
  $('.isu-navbar_alpha > li > a').on('keydown', function(event) {
    var dropdownMenuItem = $(this);
      if (event.keyCode === 38) { // up
        // Close the dropdown
        dropdownMenuItem.closest('.isu-navbar_dropdown').attr('data-isu-navbar-expanded', 'false');
        // Refocus on the parent link
        dropdownMenuItem.closest('.isu-navbar_dropdown').find('a').focus();
      }
  });
  
  // Exit the Sign-Ons menu with up arrow
  $('.isu-navbar_signons > li:first-of-type a').on('keydown', function(event) {
    var dropdownMenuItem = $(this);
      if (event.keyCode === 38) { // up
        // Close the dropdown
        dropdownMenuItem.closest('.isu-navbar_dropdown').attr('data-isu-navbar-expanded', 'false');
        // Refocus on the parent link.
        dropdownMenuItem.closest('.isu-navbar_dropdown').find('a').focus();
      }
  });
  
  // Close dropdowns upon exit
  $('.isu-navbar_dropdown-menu').on('mouseleave focusout', function(e) {
    var dropdownMenu = $(this);
    setTimeout(function() {
      if ( dropdownMenu.find(':focus').length === 0) {
        // If the dropdown nor its children don't not have focus...
        if ( dropdownMenu.siblings('a:focus').length === 0) {
          // Close the menu
          dropdownMenu.parents('.isu-navbar_dropdown').attr('data-isu-navbar-expanded', 'false');
          // And remove styling class
          dropdownMenu.parents('.isu-navbar_dropdown').removeClass('has-focus');
        }
      }
    }, 100 );
  })
})

})(jQuery, Drupal);