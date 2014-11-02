// GRAVITY FORMS GENERIC
// 2014/06/10
// This function creates placeholders
// Based upon the label of the field
// It will work on any Gravity Form
(function($) {
  var gListItems = $('.gform_fields').find('.gfield');
  $(gListItems).each(function(){
    var gComplex = $(this).find('.ginput_complex');

    // Search for complex containers
    if ( 0 !== gComplex.length ) {

      var gFieldComplex = $(gComplex).find('span');
      $(gFieldComplex).each(function(){

        var gLabel = $(this).find('label').text(),
            gField = $(this).find('input');

        var gField = checkForOtherFieldTypes(gField, 'textarea');
        var gLabel = removeRequiredSymbol(gLabel);

        addPlaceholderText(gField, gLabel);
      });
    }

    else {
      var gLabel = $(this).find('label').text(),
          gField = $(this).find('input');

      var gField = checkForOtherFieldTypes(gField, 'textarea');

      var gLabel = removeRequiredSymbol(gLabel);
      addPlaceholderText(gField, gLabel);
    }
  });

  function addPlaceholderText(field, label) {
    $(field).attr('placeholder', label);
  }

  function removeRequiredSymbol(label) {
    // Search for *
    // If it exsists, remove it
    if ( -1 !== label.indexOf('*') ) {
      var label = label.replace('*', '');
    }
    return label;
  }

  function checkForOtherFieldTypes(field, type) {
    // If it returns 0
    // look for textarea
    if ( 0 === field.length ) {
      var field = $(this).find(type);
    }
    return field;
  }
})(jQuery);