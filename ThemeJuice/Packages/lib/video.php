<?php

/**
 * Responsive video shortcode
 *
 * @param {Array}  $atts         - Array containing arguments for shortcode
 * @param {String} $atts->$src   - YouTube embed string
 * @param {String} $atts->$ratio - Aspect ratio of video
 *
 * @return {String}
 *
 * @example
 *   ```
 *   [video src='WSG0P5VpSUk']
 *   ```
 */
add_shortcode( "video", function( $atts, $content = null ) {
  extract( shortcode_atts( array(
    "src" => null,
    "ratio" => "9-16",
  ), $atts, "video" ) );

  $buffer = array();

  $buffer[] = "<div class='video__wrapper'>";
  $buffer[] = "<div class='video video--ratio-{$ratio}'>";
  $buffer[] = "<iframe width='960' height='720' src='//www.youtube.com/embed/{$src}' frameborder='0' allowfullscreen></iframe>";
  $buffer[] = "</div>";
  $buffer[] = "</div>";

  return implode( "", $buffer );
});
