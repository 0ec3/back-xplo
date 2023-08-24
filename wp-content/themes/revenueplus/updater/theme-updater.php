<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://www.freshthemes.com', // Site where EDD is hosted
		'item_name'      => 'RevenuePlus WordPress Theme', // Name of theme
		'theme_slug'     => 'revenueplus', // Theme slug
		'version'        => '1.0.1', // The current version of this theme
		'author'         => 'FreshThemes', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'revenueplus' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'revenueplus' ),
		'license-key'               => __( 'License Key', 'revenueplus' ),
		'license-action'            => __( 'License Action', 'revenueplus' ),
		'deactivate-license'        => __( 'Deactivate License', 'revenueplus' ),
		'activate-license'          => __( 'Activate License', 'revenueplus' ),
		'status-unknown'            => __( 'License status is unknown.', 'revenueplus' ),
		'renew'                     => __( 'Renew?', 'revenueplus' ),
		'unlimited'                 => __( 'unlimited', 'revenueplus' ),
		'license-key-is-active'     => __( 'License key is active.', 'revenueplus' ),
		'expires%s'                 => __( 'Expires %s.', 'revenueplus' ),
		'expires-never'             => __( 'Lifetime License.', 'revenueplus' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'revenueplus' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'revenueplus' ),
		'license-key-expired'       => __( 'License key has expired.', 'revenueplus' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'revenueplus' ),
		'license-is-inactive'       => __( 'License is inactive.', 'revenueplus' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'revenueplus' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'revenueplus' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'revenueplus' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'revenueplus' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'revenueplus' ),
	)

);
