<?php
/**
 * Omnisend Settings Title View
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

function omnisend_display_title( $title = 'Plugin settings' ) {
	?>
	<div class="settings-section">
		<h1 class="omnisend-content-h4 settings-page-title"><?php echo esc_attr( $title ); ?></h1>
	</div>
	<?php
}
