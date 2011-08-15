function ($) {

Drupal.behaviors.initColorbox = function (context) {
  var settings = Drupal.settings.colorbox;
  settings.slideshow = true;
  $('a, area, input', context)
    .filter('.colorbox-slideshow:not(.initColorbox-processed)')
    .addClass('initColorbox-processed')
    .colorbox(settings);

}

<script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('li.menu-118 > a').contents().unwrap();
        });
</script>