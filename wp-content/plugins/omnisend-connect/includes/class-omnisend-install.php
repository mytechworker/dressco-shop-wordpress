<?php
/**
 * Omnisend Install Class
 *
 * @package OmnisendPlugin
 */

defined( 'ABSPATH' ) || exit;

class Omnisend_Install {

	public static function get_registration_url() {
		$registration_url_params = array(
			'registration_redirect_url' => self::generate_install_url(),
		);

		$partner_link = self::omnisend_get_partner_link();
		if ( ! empty( $partner_link ) ) {
			$registration_url_params['partner_link'] = $partner_link;
		}

		return OMNISEND_REGISTRATION_URL . '?' . http_build_query( $registration_url_params );
	}

	public static function get_connecting_url() {
		$login_url_params = array(
			'url' => '/' . self::generate_install_url(),
		);

		return OMNISEND_LOGIN_URL . '?' . http_build_query( $login_url_params );
	}

	public static function notify_about_plugin_activation() {
		$brand_id = get_option( 'omnisend_account_id', null );
		if ( ! $brand_id ) {
			return;
		}

		$body = array(
			'brandID' => $brand_id,
		);

		Omnisend_Helper::omnisend_api( OMNISEND_ACTIVATION_URL, 'POST', $body );
	}

	public static function notify_about_plugin_update() {
		$brand_id = get_option( 'omnisend_account_id', null );
		if ( ! $brand_id ) {
			return;
		}

		$body = array(
			'brandID' => $brand_id,
		);

		Omnisend_Helper::omnisend_api( OMNISEND_UPDATE_URL, 'POST', $body );
	}

	public static function revoke_omnisend_woo_api_keys() {

		$api_keys = self::get_woo_api_keys();

		if ( count( $api_keys ) <= 0 ) {
			return;
		}

		foreach ( $api_keys as $api_key ) {
			self::remove_woo_api_key( $api_key->key_id );
		}
	}

	public static function delete_omnisend_webhooks() {
		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			return;
		}

		$webhook_data_store = WC_Data_Store::load( 'webhook' );
		$num_webhooks       = $webhook_data_store->get_count_webhooks_by_status();
		$count              = array_sum( $num_webhooks );

		if ( $count <= 0 ) {
			return;
		}

		$webhook_ids = $webhook_data_store->get_webhooks_ids();

		foreach ( $webhook_ids as $webhook_id ) {
			$webhook = wc_get_webhook( $webhook_id );
			if ( ! $webhook ) {
				continue;
			}

			$is_omnisend_delivery_url = false !== strpos( $webhook->get_delivery_url(), 'webhooks-woocommerce.omnisend' );
			$is_omnisend_name         = false !== strpos( $webhook->get_name(), 'omnisend::' );
			if ( $is_omnisend_delivery_url && $is_omnisend_name ) {
				$webhook_data_store->delete( $webhook );
			}
		}
	}

	/**
	 * Retrieves woocommerce api keys for omnisend.
	 *
	 * @return array of {"key_id": integer}
	 */
	public static function get_woo_api_keys() {
		global $wpdb;

		$like = OMNISEND_WC_API_APP_NAME . ' - API %';
		$sql  = $wpdb->prepare( "SELECT `key_id`, `user_id` FROM {$wpdb->prefix}woocommerce_api_keys WHERE `description` LIKE %s", $like );

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		return $wpdb->get_results( $sql );
	}

	/**
	 * Remove woocommerce api key.
	 *
	 * @param integer $key_id API Key ID.
	 *
	 * @return boolean
	 */
	public static function remove_woo_api_key( $key_id ) {
		global $wpdb;

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		$delete = $wpdb->delete( $wpdb->prefix . 'woocommerce_api_keys', array( 'key_id' => $key_id ), array( '%d' ) );

		return $delete;
	}

	private static function generate_install_url() {
		$token = get_option( 'omnisend_connect_token', '' );

		if ( $token === '' ) {
			$token = hash( 'sha256', time() );
			update_option( 'omnisend_connect_token', $token );
		}

		$install_url_params = array(
			'token'             => $token,
			'storeUrl'          => home_url(),
			'woocommerceUserId' => get_current_user_id(),
			'_wpnonce'          => wp_create_nonce( 'omnisend-oauth' ),
		);

		return OMNISEND_PLUGIN_INSTALL_URL . '?' . http_build_query( $install_url_params );
	}

	private static function omnisend_get_partner_link() {
		$link = '';
		// Run any filters that may be on the partner link.
		$link = apply_filters( 'omnisend_woo_partner_link', $link );

		if ( empty( $link ) ) {
			$link = get_option( 'omnisend_woo_partner_link', $link );
		}
		return $link;
	}
}
