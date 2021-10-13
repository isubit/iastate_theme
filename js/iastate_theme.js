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

/**
 * Fix issue: anchor_link modal cannot grab focus when using layout_builder.
 *
 * @see https://www.drupal.org/project/drupal/issues/3065095#comment-13311079
 */
(function ($, Drupal) {
  let orig_allowInteraction = $.ui.dialog.prototype._allowInteraction;

  $.ui.dialog.prototype._allowInteraction = function (event) {
    if ($(event.target).closest('.cke_dialog').length) {
      return true;
    }

    return orig_allowInteraction.apply(this, arguments);
  };

})(jQuery, Drupal);

