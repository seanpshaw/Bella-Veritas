$('.primary-navigation-wrapper .menu-118 a[href="/cast-and-crew-page"]').click(function () {
  return false;
});

function ($) {

Drupal.behaviors.initColorbox = function (context) {
  var settings = Drupal.settings.colorbox;
  settings.slideshow = true;
  $('a, area, input', context)
    .filter('.colorbox-slideshow:not(.initColorbox-processed)')
    .addClass('initColorbox-processed')
    .colorbox(settings);

}

