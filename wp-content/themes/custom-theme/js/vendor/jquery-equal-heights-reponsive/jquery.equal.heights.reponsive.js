/*
 * jQuery Equal Heights Responsive
 * Version: 1.0.0
 *
 * Usage:
 *     $('.elements-to-equalize-heights').equalHeightsResponsive();
 *           
 *
 */

;(function ( $, window, document ) {
    $.fn.equalHeightsResponsive = function( options ) {

        var settings = $.extend({}, options ),
            maxHeight = 0,
            height;

        this.each( function() {
            $el = $(this);

            // reset height (so we can handle multiple calls on responsive resize)
            $el.height('auto');

            height = $el.height();

            if ( height > maxHeight ) {
                maxHeight = height;
            }
        });
        return this.css( { 'height': maxHeight } );
    };
})( jQuery, window, document );
