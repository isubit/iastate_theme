/**
 * @file
 * jQuery navigating the main menu with a keyboard
 *
 * - Right and left should tab through top level items.
 * - Down should open and enter a dropdown.
 * - Up and down should go up and down within the dropdown.
 * - Right and left should also go up and down within the dropdown.
 * - Enter should still work to click on parent items.
 *
 */

(function ($, Drupal) {

$(document).ready(function() {

  // Navigate with right and left arrow keys.
  $('#block-iastate8-theme-main-menu').on('keydown', function(event) {
    if (event.keyCode === 39) { // RIGHT arrow key
      if ( $(':focus').is('.isu-dropdown-menu a') ) {
        // If the focused item is a link in a dropdown...
        // Then change the focus to the next link.
        $(':focus').parent('li').next('li').children('a').focus();
      } else {
        // Otherwise, the focused item is a top-level link.
        // In this case, move to the next top-level link.
        $(':focus').parent('li').next('li').children('a').focus();
      }
    } else if (event.keyCode === 37) { // LEFT arrow key
      if ( $(':focus').is('.isu-dropdown-menu a') ) {
        // If the focused item is a link in a dropdown...
        // Then change the focus to the previous link.
        $(':focus').parent('li').prev('li').children('a').focus();
      } else {
        // Otherwise the focused item is a top-level link.
        // In this case, move the previous top-level link.
        $(':focus').parent().prev().children('a').focus();
      }
    }
  });

  // Enter dropdowns with the down arrow
  $('.isu-dropdown-toggle').on('keydown', function(event) {
    var dropdownToggle = $(this);
      if (event.keyCode === 40) { // DOWN arrow key
        event.preventDefault();
        // Add class for styling
        //dropdownToggle.addClass('active');
        // Open menu
        dropdownToggle.closest('.isu-dropdown').attr('aria-expanded', 'true');
        // Change focus to the first link in the dropdown
        $(':focus').next().find('li:first-of-type a').focus();
      }
  });

  // Navigate within a dropdown with the up and down arrow keys.
  $('.isu-dropdown-menu').on('keydown', function(event) {
    if (event.keyCode === 40) { // DOWN arrow key
      event.preventDefault();
      // Change the focus to the next link in the dropdown
      $(':focus').parent('li').next('li').children('a').focus();
    } else if (event.keyCode === 38) { // UP arrow key
      event.preventDefault();
      if ( $(':focus').is('.isu-dropdown-menu li:not(:first-of-type) a') ) {
        // If the focused item is NOT the first item in the list...
        // Change the focus to the link in the previous li
        $(':focus').parent('li').prev().children('a').focus();
      }
    }
  });

  // Exit dropdowns with the up arrow
  $('.isu-dropdown-menu > li:first-of-type a').on('keydown', function(event) {
    var dropdownMenuItem = $(this);
      if (event.keyCode === 38) { // up
        // Close the dropdown
        dropdownMenuItem.closest('.isu-dropdown').attr('aria-expanded', 'false');
        // Refocus on the parent link
        dropdownMenuItem.closest('.isu-dropdown-menu').prev('.isu-dropdown-toggle').focus();
      }
  });

  // Close dropdowns when clicked out
  $('.isu-dropdown-menu').on('mouseleave focusout', function(e) {
    var dropdownMenu = $(this);
    setTimeout(function() {
      if (dropdownMenu.find(':focus').length === 0) {
        // If neither the dropdown or its children have focus...
        if (dropdownMenu.siblings('a:focus').length === 0) {
          // Close the menu
          dropdownMenu.parents('.isu-dropdown').attr('aria-expanded', 'false');
          // Remove styling class
          //dropdownMenu.parents('.isu-dropdown a').removeClass('active');
        }
      }
    }, 100 );
  })

  /* Entering and exiting the dropdowns with the mobile toggle
   *
   * Because there is no hover on mobile, we must add a mobile toggle button
   * for those narrow screens. They must open on click/tap, enter, and arrow keys 
   * because the mobile breakpoints also appear when the page zooms.
   */

  // Enter dropdowns on mobile with the mobile toggle button
  $('.isu-dropdown-toggle_mobile').on('keydown', function(event) {
    var mobileDropdownToggle = $(this);
    if (event.keyCode === 40) { // DOWN arrow key
      event.preventDefault();
      // Open menu
      mobileDropdownToggle.closest('.isu-dropdown').attr('aria-expanded', 'true');
    } else if (event.keyCode === 13) {
      mobileDropdownToggle.closest('.isu-dropdown').attr('aria-expanded', 'true');
    }
  });
  $('.isu-dropdown-toggle_mobile').click(function() {
    var mobileDropdownToggle = $(this);
    mobileDropdownToggle.closest('.isu-dropdown').attr('aria-expanded', 'true');
  })
});

})(jQuery, Drupal);