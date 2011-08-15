$(document).ready(function () {
  $('li.menu-118 > a').contents().unwrap();
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

