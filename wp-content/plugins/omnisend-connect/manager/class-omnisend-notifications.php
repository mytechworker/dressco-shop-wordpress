<?php
/**
 * Omnisend Notifications Class
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

class Omnisend_Notifications {
	const CONNECTION_NOTIFICATION  = 'connect_account';
	const WOOCOMMERCE_NOTIFICATION = 'fix_woocommerce';
	const NOTIFICATIONS            = array( self::CONNECTION_NOTIFICATION, self::WOOCOMMERCE_NOTIFICATION );

	/**
	 * @param string $notification
	 *
	 * @return void
	 */
	public static function set_viewed( $notification ) {
		if ( self::is_valid( $notification ) ) {
			update_option( "omnisend_notification_{$notification}_viewed", true );
		}
	}

	/**
	 * @return int
	 */
	public static function get_count() {
		$count = 0;

		foreach ( self::NOTIFICATIONS as $notification ) {
			if ( self::skip_notification( $notification ) ) {
				continue;
			}

			if ( get_option( "omnisend_notification_{$notification}_viewed", null ) ) {
				continue;
			}

			++$count;
		}

		return $count;
	}

	/**
	 * @return bool
	 */
	private static function skip_notification( $notification ) {
		if ( $notification === self::WOOCOMMERCE_NOTIFICATION && ! Omnisend_Helper::is_woocommerce_plugin_activated() ) {
			return false;
		}

		if ( $notification === self::CONNECTION_NOTIFICATION && ! get_option( 'omnisend_api_key', null ) ) {
			return false;
		}

		return true;
	}

	/**
	 * @return bool
	 */
	private static function is_valid( $notification ) {
		return in_array( $notification, self::NOTIFICATIONS );
	}
}
