<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<script>


<!-- Beginning of Asynch Tutorialize Snippet -->

(function() {
  var tu = document.createElement('script'); tu.type = 'text/javascript'; tu.async = true;
  tu.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dpi1c6z6qg9qf.cloudfront.net/client/v3/tutorialize.js.gz'
  var sc = document.getElementsByTagName('script')[0]; sc.parentNode.insertBefore(tu, sc);
})();
var _t = _t || [];
_t.push = function(){if(typeof window.tutorialize !== 'undefined'){window.tutorialize.process(arguments[0]);}
return Array.prototype.push.apply(this, arguments);};
_t.push({publisher_id: '5bdaf9f11cf38f66a9005b44'});

<!-- End of Tutorialize Snippet -->




	var wpcf7Elm = document.querySelector( '.wpcf7' );
	
	document.addEventListener( 'wpcf7invalid', function( event ) {
       
    }, false );
	document.addEventListener( 'wpcf7submit', function( event ) {
	//alert( "Fire!" );
	// var inputs = event.detail.inputs;
	var wpcf7popupBox = document.querySelector( '#fancybox-wrap');
	var wpcf7Form = document.querySelector( '.wpcf7-form' );
	
	var matches = [];
	var searchEles = wpcf7Form.children;
	for(var i = 0; i < searchEles.length; i++) {
		if(searchEles[i].tagName == 'p' ) {
			searchEles[i].tagName.style.display='none';
		}
	}
	wpcf7popupBox.style.height="500px";
	wpcf7Form.style.display = 'none';
	
	var MsgBox = document.getElementById('exp_now_form');
	var txt = document.createTextNode("Thank You! We Have successfully received your details.");
	var newElement = document.createElement('div');
	newElement.setAttribute("id", "msgBoxThankyou");
	newElement.appendChild(txt);
	MsgBox.appendChild(newElement);
	//<a href="https://demo.klera.io:18103/klera/#/main?refid=3f5000ca-5c4b-41df-8383-363e99cdba0d" class="fancybox-iframe wp-block-button__link has-text-color has-very-light-gray-color has-background has-vivid-green-cyan-background-color">View Exploration
	setTimeout(function() {
		console.log(111);
		
		console.log(2222);
				$.fancybox(
				'<iframe src="https://demo.klera.io:18103/klera/#/main?refid=3f5000ca-5c4b-41df-8383-363e99cdba0d" frameborder="1" height="600" width="800" allowfullscreen></iframe>',
				{
						padding:15,
						closeBtn:true
				}
			);
			
		}, 2000);
		_t.push({start: "Test iframe", config:{force:true}});
}, false );

	



</script>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * suffice_before hook
 */
do_action( 'suffice_before' ); ?>

<div id="page" class="site">
	<?php
	/**
	 * suffice_before_header hook
	 */
	do_action( 'suffice_before_header' ); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'suffice' ); ?></a>

	<header id="masthead" class="site-header <?php suffice_header_class(); ?>" role="banner">
		<div class="header-outer-wrapper">
			<div class="header-inner-wrapper">
				<?php if ( ( 'disabled' !== suffice_get_option( 'suffice_header_content_left' ) ) || ( 'disabled' !== suffice_get_option( 'suffice_header_content_right' ) ) ) : ?>
					<div class="header-top">
						<div class="container container--flex">
							<div class="header-top-left-section">
								<?php suffice_top_header_left_content(); ?>
							</div>

							<div class="header-top-right-section">
								<?php suffice_top_header_right_content(); ?>
							</div>
						</div> <!-- .container -->
					</div>  <!-- .header-top -->
				<?php endif; ?>

				<div class="header-bottom">
					<div class="container">
						<div class="header-bottom-left-section">
							<?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
							<?php
							if ( ( 'navigation-default' !== suffice_get_option( 'suffice_menu_style', 'navigation-default' ) ) && ( 'logo-center-menu-center' === suffice_get_option( 'suffice_header_style', 'logo-left-menu-right' ) ) ) {
								get_template_part( 'template-parts/header/header', 'action' );
							}
							?>
						</div>

						<div class="header-bottom-right-section">
							<?php
							if ( 'navigation-default' === suffice_get_option( 'suffice_menu_style', 'navigation-default' ) ) :
								get_template_part( 'template-parts/navigation/navigation', 'primary' );
							endif;

							if ( 'logo-center-menu-center' !== suffice_get_option( 'suffice_header_style', 'logo-left-menu-right' ) ) :
								get_template_part( 'template-parts/header/header', 'action' );
							endif;

							if ( ( 'navigation-default' === suffice_get_option( 'suffice_menu_style', 'navigation-default' ) ) && ( 'logo-center-menu-center' === suffice_get_option( 'suffice_header_style', 'logo-left-menu-right' ) ) ) :
								get_template_part( 'template-parts/header/header', 'action' );
							endif;
							?>
						</div>
					</div> <!-- .container -->
				</div> <!-- .header-bottom -->
			</div>  <!-- .header-inner-wrapper -->
		</div> <!-- .header-outer-wrapper -->

		<?php
		// If navigation is offcanvas or fullscreen pull it outside.
		if ( 'navigation-default' !== suffice_get_option( 'suffice_menu_style', 'navigation-default' ) ) :
			get_template_part( 'template-parts/navigation/navigation', 'primary' );
		endif;
		?>
	</header><!-- #masthead -->

	<?php
	/**
	 * suffice_after_header hook
	 */
	global $wp;
	// echo home_url( $wp->request );
	// echo "<br>";
	// echo $_SERVER['REQUEST_URI'];
	// echo "<br>";
	if(basename(get_permalink())=="free-trial" || basename(get_permalink())=="experience-now"){
		// do not show banner image
	}else{
		do_action( 'suffice_after_header' ); 
	}
	?>

	<div id="content" class="site-content">
		<div class="container">
