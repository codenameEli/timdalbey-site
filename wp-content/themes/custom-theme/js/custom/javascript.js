jQuery(document).ready(function($) {

    // START make containers the same height
    var makeWidgetEqualHeight = function() {
        $('.ldm_widget').equalHeightsResponsive();
    }();
    // END make containers the same height

    // START Calling Functions - Debounce
    var callDebounce = debounce(function() {
        makeWidgetEqualHeight;
    }, 250);
    // IE8 and below do not support addEventListener
    // it supports addEvent in place
    // Even though IE8< is not responsive, we don't need any JS errors
    // http://stackoverflow.com/questions/85815/how-to-tell-if-a-javascript-function-is-defined
    if ( typeof(addEventListener) == "function" ) {
        window.addEventListener('resize', callDebounce);
    }
    // END Debounce

    // BEGIN: Fancybox
    $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif'],.fancybox").attr('rel','gallery').fancybox({
        helpers: {
          fitToView: true,
          thumbs : {
              width: 75,
              height: 75
          },
            overlay: {
                locked: false
            }
        }
    });
    // END: Fancybox

    // START YouTube Thumbnails
    $('.youtube_item').launchdmYouTubeThumbs({
        // 'thumbSize': 'large',
        'callback': function(atag, youtubeid) {
            $(atag).click(function() {
                $.fancybox({
                    'padding'           : 0,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'width'             : 680,
                    'height'            : 382, // 382 wideaspect
                    'href'              : "http://www.youtube.com/embed/"+youtubeid+"?autoplay=1&amp;loop=1&amp;rel=0&amp;modestbranding=1",
                    'type'              : 'iframe',
                    'overlayColor'      : '#000',
                    'overlayOpacity'    : 0.7,
                    helpers : {
                        overlay: {
                            locked: false
                        },
                    }
                }); // .fancybox
                return false;
            });
        } // callback
    });

    // START Disable Search if Nothing is Typed in
    var preventSearchIfEmpty = function() {

        $('form[role="search"]').on( 'submit', function( ev ){

            var query = $('input[type="search"]').val(),
                queryLength = query.length;

            if ( 0 === queryLength ) {

                // Make the cursor blink so user is aware it's not broken, they need input to search
                $('input[type="search"]').focus();
                ev.preventDefault();
                return;
            }
        });
    }();
    // END Disable Search if Nothing is Typed in

    var searchFunctionality = function() {

        $searchForm = $('.search-form');

        $searchForm.on( 'hover', function(){

            $(this).toggleClass('show-search-field');
        });
    }();
});