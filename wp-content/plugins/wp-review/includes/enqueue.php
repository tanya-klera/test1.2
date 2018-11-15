<?php
/**
 * Custom style for the plugin.
 *
 * @since     1.0
 * @copyright Copyright (c) 2013, MyThemesShop
 * @author    MyThemesShop
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Enqueue style for this plugin. */
add_action( 'wp_enqueue_scripts', 'wp_review_enqueue', 12 );

/* IE7 style for the font icon. */
// add_action( 'wp_head', 'wp_review_ie7' );

/**
 * Enqueue style
 *
 * @since 1.0
 * @since 3.0.0 Add font awesome.
 */
function wp_review_enqueue() {
	$rating_types = wp_review_get_rating_types();

	// Register.
	wp_register_style( 'magnificPopup', WP_REVIEW_ASSETS . 'css/magnific-popup.css', array(), '1.1.0' );
	wp_register_script( 'magnificPopup', WP_REVIEW_ASSETS . 'js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );

	wp_register_style( 'wp_review-style', WP_REVIEW_ASSETS . 'css/wp-review.css', array(), WP_REVIEW_PLUGIN_VERSION, 'all' );

	wp_register_script( 'js-cookie', WP_REVIEW_ASSETS . 'js/js.cookie.min.js', array(), '2.1.4', true );

	wp_register_script( 'wp_review-js', WP_REVIEW_ASSETS . 'js/main.js', array( 'magnificPopup', 'js-cookie', 'wp-util' ), WP_REVIEW_PLUGIN_VERSION, true );

	wp_localize_script( 'wp_review-js', 'wpreview', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'rateAllFeatures' => __( 'Please rate all features', 'wp-review' ),
		'verifiedPurchase' => __( '(Verified purchase)', 'wp-review' ),
	) );


	// Enqueue.
	wp_enqueue_script( 'js-cookie' );
	wp_enqueue_script( 'wp_review-js' );
	wp_enqueue_script( 'wp_review-jquery-appear' );
	wp_enqueue_style( 'magnificPopup' );
	wp_enqueue_script( 'magnificPopup' );
	wp_enqueue_style( 'wp_review-style' );
}

/**
 * IE7 style for the font icon.
 *
 * @since 1.0
 * @deprecated 3.0.0 Default icon font is no longer used.
 */
function wp_review_ie7() {
	_deprecated_function( __FUNCTION__, '3.0.0' );
	?>
	<!--[if IE 7]>
	<link rel="stylesheet" href="<?php echo trailingslashit( WP_REVIEW_ASSETS ) . 'css/wp-review-ie7.css'; ?>">
	<![endif]-->
	<?php
}
