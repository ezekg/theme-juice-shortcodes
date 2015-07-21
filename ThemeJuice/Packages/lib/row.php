<?php

/**
 * Row shortcode
 *
 * @param {Array}  $atts    - Array containing arguments for shortcode
 * @param {String} $content - Content of row
 *
 * @return {String}
 *
 * @example
 *   ```
 *   [row]
 *     [col span='half']...[/col]
 *     [col span='half']...[/col]
 *   [/row]
 *   ```
 */
add_shortcode( "row", function( $atts, $content = null ) {
  extract( shortcode_atts( array(), $atts, "row" ) );
  $buffer = array();
  $buffer[] = "<div class='column__span--row'>";
  $buffer[] = do_shortcode( $content );
  $buffer[] = "</div>";
  return implode( "", $buffer );
});
