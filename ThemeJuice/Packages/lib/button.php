<?php

/**
 * Button shortcode
 *
 * @param {Array}  $atts         - Array containing arguments for shortcode
 * @param {String} $atts->$link  - HREF value for the link
 * @param {String} $atts->$size  - Size of the button
 * @param {String} $atts->$color - Color of the button
 * @param {String} $content      - The button text
 *
 * @return {String}
 *
 * @example
 *   ```
 *   [button size='small' color='red' link='url/to/link/to']...[/button]
 *   ```
 */
add_shortcode( "button", function( $atts, $content = null ) {
  extract( shortcode_atts( array(
    "link" => '#',
    "size" => null,
    "color" => null,
  ), $atts, "button" ) );

  $buffer = array();

  if ( $size ) {
    $size = " button--{$size}";
  }

  if ( $color ) {
    $color = " button--{$color}";
  }

  $buffer[] = "<a class='button{$size}{$color}' href='{$link}'>";
  $buffer[] = do_shortcode( $content );
  $buffer[] = "</a>";

  return implode( "", $buffer );
});
