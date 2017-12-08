/**
 * @file
 * jQuery to implement responsive tables.
 */

(function ($) {

$(document).ready(function() {
  
  // Find tables in content
  var table = $('article table');
  
/* 
 * First, check the table structure and assign classes.
 */
  
  // No headers
  table.addClass('isu-table-none');
  
  // Row
  var rowsHeader = $(table.has('tr:first-of-type th:nth-of-type(2)'));
  rowsHeader.addClass('isu-table-row');
  rowsHeader.removeClass('isu-table-none');
    
  // Col
  var colHeader = $(table.has('tr:nth-of-type(2) th:nth-of-type(1)'));
  colHeader.addClass('isu-table-col');
  colHeader.removeClass('isu-table-none isu-table-row');
  
  // Both
  var bothHeader = $(table.has('tr:nth-of-type(1) th:nth-of-type(2)').has('tr:nth-of-type(2) th:nth-of-type(1)'));
  bothHeader.addClass('isu-table-both');
  bothHeader.removeClass('isu-table-none isu-table-row isu-table-col');
  
  // Colspan or Rowspan
  var responsiveClasses = 'isu-table-none isu-table-row isu-table-col';

  var tdColFreeze = $(table.has('td[colspan]'));
      tdColFreeze.addClass('isu-table-freeze');
      tdColFreeze.removeClass(responsiveClasses);

  var thColFreeze = $(table.has('th[colspan]'));
      thColFreeze.addClass('isu-table-freeze');
      thColFreeze.removeClass(responsiveClasses);

  var tdRowFreeze = $(table.has('td[rowspan]'));
      tdRowFreeze.addClass('isu-table-freeze');
      tdRowFreeze.removeClass(responsiveClasses);

  var thRowFreeze = $(table.has('th[rowspan]'));
      thRowFreeze.addClass('isu-table-freeze');
      thRowFreeze.removeClass(responsiveClasses);

  // All responsive tables
  table.addClass('isu-responsive-table table');

/* 
 * Now apply any jQuery needed to make the tables responsive
 */

  // Row
  // Wrap cell content in a span for flexbox.
  $('.isu-table-row td').wrapInner('<span class="isu-cell-content"></span>');

  // Cycle through each row...
  $('.isu-table-row tr').each(function() {
    // And cycle through each td in that row...
   $(this).find('td').each(function(i) {
      // Find the content of the closest th...    
      var rowHeader = $(this).closest('.isu-table-row').find('tr th')[i].innerHTML;
      // And add it as a span in the td.
      $(this).prepend('<span class="isu-row-header" aria-hidden="true">' + rowHeader + '</span>')
    });
  });

  // Both
  // Wrap cell content in a span for flexbox.
  $('.isu-table-both td').wrapInner('<span class="isu-both-cell-content"></span>');

  // Cycle through each row...
  $('.isu-table-both tr').each(function() {
    // And cycle through each td in that row...
    $(this).find('td').each(function(i) {
            
      // Find the content of the closest th...    
      var rowHeader = $(this).closest('.isu-table-both').find('tr th:not(:first-of-type)')[i].innerHTML;
      // And add it as a span in the td.
      $(this).prepend('<span class="isu-both-row-header" aria-hidden="true">' + rowHeader + '</span>')
    });
  });
});

})(jQuery);
