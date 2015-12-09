<?php

namespace LaunchPad\Shortcode;

use LaunchPad\Utils\Utils;

class LDMButton {

	public static function do_shortcode( $atts, $content = null ){

		$button_atts = shortcode_atts( array(
			'link'		=> '#',
			'newtab'	=> false,
		), $atts );

		$link = esc_attr( $button_atts['link'] );
		$link = Utils::parse_link( $link );

		$new_tab = ( esc_attr( $button_atts['newtab'] ) == 'true' ? true : false );
		$target = ( $new_tab ? 'target="_blank"' : '' );

		ob_start();

		?>
			<a href="<?php echo $link; ?>" <?php echo $target; ?> class="ldm-button-shortcode">
				<?php echo $content; ?>
			</a>
		<?php

		return ob_get_clean();
	}
}