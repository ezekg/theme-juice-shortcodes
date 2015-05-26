<?php

/**
 * Map shortcode
 *
 * @param {Array}  $atts         - Array containing arguments for shortcode
 * @param {String} $atts->$cords - Coordinates for the map embed
 *
 * @return {String}
 *
 * @example
 *   ```
 *   [map cords='https://www.google.com/maps/embed?...']
 *   ```
 */
add_shortcode( "map", function( $atts, $content = null ) {
  extract( shortcode_atts( array(
    "cords" => null,
  ), $atts, "map" ) );

  $buffer = array();

  $buffer[] = "<div class='embed__wrapper'>";
  $buffer[] = "<div class='embed'>";
  $buffer[] = "<iframe width='600 height='450' frameborder='0' style='border:0' src='{$cords}'></iframe>";
  $buffer[] = "</div>";
  $buffer[] = "</div>";

  return implode( "", $buffer );
});
