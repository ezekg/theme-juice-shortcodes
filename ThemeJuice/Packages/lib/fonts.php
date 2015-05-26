<?php

/**
 * Import JSON font map, create shortcode for each font family
 */
if ( file_exists( $file = get_template_directory() . "/assets/json/fonts.json" ) ) {

  /**
   * Get contents of fonts map
   */
  $fonts = json_decode( file_get_contents( $file ), true );

  /**
   * Loop through font map and create a shortcode for each family
   */
  foreach ( $fonts as $family => $stack ) {

    /**
     * Font shortcode
     *
     * @param {Array}  $atts                   - Array containing arguments for shortcode
     * @param {String} $atts->$weight (400)    - Weight of the font
     * @param {String} $atts->$style  (normal) - Style of the font
     * @param {String} $content                - The content to apply font to
     *
     * @return {String}
     *
     * @example
     *   ```
     *   [open-sans weight='900' style='italic']...[/open-sans]
     *   ```
     */
    add_shortcode( $family, function( $atts, $content = null ) use ( $family, $stack ) {
      extract( shortcode_atts( array(
        "weight" => "400",
        "style" => "normal"
      ), $atts, $family ) );

      return "<span style='font-family:" . implode( ",", $stack ) . ";font-weight:{$weight};font-style:{$style};'>{$content}</span>";
    });
  }
}
