<?php

/**
 * Bio component's wrapper shortcode
 *
 * @param {String} $content - The actual bio shortcodes
 *
 * @return {String}
 *
 * @example
 *   ```
 *   [staff]
 *     [bio]...[/bio]
 *     [bio]...[/bio]
 *   [/staff]
 *   ```
 */
add_shortcode( "staff", function( $atts, $content = null ) {
  extract( shortcode_atts( array(), $atts, "staff" ) );

  $buffer = array();

  $buffer[] = "<h4 class='bio__heading'>Our Staff</h4>";
  $buffer[] = "<div class='bio__wrapper'>";

  if ( $content ) {
    $buffer[] = do_shortcode( $content );
  }

  $buffer[] = "</div>";

  return implode( "", $buffer );
});
