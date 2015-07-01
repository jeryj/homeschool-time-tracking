/**
 * scripts.js
 *
 * General site scripts
 */

jQuery( document ).ready( function( $ ) {
  var today = new Date();
  $('.date-field').val(today.getFullYear() +'-'+ (today.getMonth() + 1) + '-'+ today.getDate());

});
