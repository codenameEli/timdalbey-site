jQuery(document).ready(function($) {

  $('html').removeClass('no-js');

  // START Slick Slider
  $('#slideshow').slick({
    dots: true,
    // autoplay: true
  });
  // END Slick Slider

  // START Fancybox
  $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").fancybox({
      //fitToView: false
  });
  // END Fancybox

  // START make containers the same height
  var $sameHeightEl = $('.latest-posts');
  var makeSameHeightContainersSameHeight = debounce(function() {
    $sameHeightEl.promise().done(function(){
      $(this).equalHeightsResponsive();
    });
  }, 250)();
  // END make containers the same height

  // START Map
  $map = $('#map');

  var colors = [
  '#152935',// Boston
  '#256b98',// Philadelphia
  '#436c86',// Atlanta
  '#08334f',// Charlotte
  '#74aed2',// Tampa
  '#12496d',// Chicago
  '#5f99be',// St. Louis
  '#1e95e7',// Houston
  '#0a598f',// Denver
  '#284151',// Los Angeles
  '#89d0fd',// San Francisco
  ];

  var omniMap = $map.usmap({
      showLabels: false,
      stateStyles: {
        stroke: "#060606",
        "stroke-width": 0.75,
        // "stroke-linejoin": "bevel",
        // "stroke-linejoin": "miter",
        "stroke-linejoin": "round",
      },
      stateHoverStyles: {fill: '#0875bc'},


      stateSpecificStyles: {
        'AZ': {
          fill: colors[9],
          title: 'los-angeles'
        },
        'CA': {
          fill: colors[10],
          title: 'san-francisco'
        },
        'FL': {
          fill: colors[4],
          title: 'tampa'
        },
        'KS': {
          fill: colors[6],
          title: 'st-louis'
        },
        'MA': {
          fill: colors[0],
          title: 'boston'
        },
        'MN': {
          fill: colors[5],
          title: 'chicago'
        },
        'MT': {
          fill: colors[8],
          title: 'denver'
        },
        'PA': {
          fill: colors[1],
          title: 'philadelphia'
        },
        'TN': {
          fill: colors[2],
          title: 'atlanta'
        },
        'TX': {
          fill: colors[7],
          title: 'houston'
        },
        'VA': {
          fill: colors[3],
          title: 'charlotte',
        },
      },

      click: function(e,d) {
        var region = 'http://omnicable.wpengine.com/locations/cable-wire-distribution-' + d.shape.attrs.title + '.html';
        document.location.href = region;
      },

      mouseover: function(e,d) {
        // Only do this on touch events
        // The map plugin treats the first touch as a mouseover
        // Only highlights the state,
        // Second click goes to the correct location page
        if (Modernizr.touch) {
          var region = 'http://omnicable.wpengine.com/locations/cable-wire-distribution-' + d.shape.attrs.title + '.html';
          document.location.href = region;
        };
      },
  });
  // END Map

  // START Bootstrap

    // START Employee Popover
    $('.single-employee').popover();
    // END Employee Popover

    // START Collapse Advanced Search for mobile
    var addMobileFunctionality = function() {
      // Find all menus with children
      var screenWidth = $(window).width(),
          $searchToggle = $('#searchToggle'),
          $searchForm = $('.omni-adv-search');

      var mobileFunction = function(e){
        // Hide onload
        setTimeout(function(){
          $searchForm.collapse('hide');
        }, 600);
        // setTimeout($searchForm.collapse('hide'), 10000);

        $searchForm.on('hidden', function(){
          $searchToggle.addClass('collapsed');
        });

        $searchForm.on('shown', function(){
          $searchToggle.removeClass('collapsed');
        });

        $searchToggle.on('click', function() {
          $searchForm.collapse('toggle');
        });

      };

      if ( screenWidth < 979 ) {
        // Using bind and unbind with debounce to call the mobile funcitons
        mobileFunction();
      }
    }();
    // END Collapse Advanced Search for mobile

    // START Advanced Search Auto Open selected choices after search
    var groups = $('.omni-adv-search').find('.accordion-body');

    $(groups).each(function(){
      // Find checkboxes options in group
      var checkboxes = $(this).find('input[type="checkbox"]');

      // Loop through each to check state
      $(checkboxes).each(function() {
        var state = $(this).attr('checked');
        // If state is checked
        // Remove class 'collapase'
        if ( state ) {
          var accordion = $(this).parent().parent();
          $(accordion).promise().done(function(){
            $(this).collapse('show');
            $(this).parent().find('.accordion-toggle').removeClass('collapsed');
          });
        }
      });
    });
    // END Advanced Search Auto Open selected choices after search
  // END Bootstrap

  // START Debounce
  var callDebounce = debounce(function(){
    makeSameHeightContainersSameHeight;
    addMobileFunctionality;
  }, 250);
  // IE8 and below do not support addEventListener
  // it supports addEvent in place
  // Even though IE8< is not responsive, we don't need any JS errors
  // http://stackoverflow.com/questions/85815/how-to-tell-if-a-javascript-function-is-defined
  if ( typeof(addEventListener) == "function" ) {
    window.addEventListener('resize', callDebounce);
  }
  // END Debounce
});