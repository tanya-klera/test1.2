<!DOCTYPE html>
<?php
$mts_options = get_option(MTS_THEME_NAME);

$mts_contact_email = $mts_options['mts_contact_email'];
$mts_contact_phone = $mts_options['mts_contact_phone'];
?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php mts_meta(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body id="blog" <?php body_class('main'); ?> itemscope itemtype="http://schema.org/WebPage">
	<div class="main-container">
		<header class="main-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			<div class="mts-actionbar">
				<div class="container">
					<?php if ( !empty($mts_options['mts_header_social']) && is_array($mts_options['mts_header_social']) && !empty($mts_options['mts_social_icon_head'])) { ?>
						<div class="header-social">
					        <?php foreach( $mts_options['mts_header_social'] as $header_icons ) : ?>
					            <?php if( ! empty( $header_icons['mts_header_icon'] ) && isset( $header_icons['mts_header_icon'] ) ) : ?>
					                <a href="<?php print $header_icons['mts_header_icon_link'] ?>" class="header-<?php print $header_icons['mts_header_icon'] ?>"><span class="fa fa-<?php print $header_icons['mts_header_icon'] ?>"></span></a>
					            <?php endif; ?>
					        <?php endforeach; ?>
					    </div>
					<?php } ?>

					<ul class="header-contact">
						<?php if ( !empty( $mts_contact_phone) ) { ?>
							<li><span class="fa fa-phone"></span> <?php echo $mts_contact_phone; ?></li>
						<?php } ?>

						<?php if ( !empty( $mts_contact_email) ) { ?>
							<li><span class="fa fa-envelope"></span> <?php echo $mts_contact_email; ?></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php if ($mts_options['mts_sticky_nav'] == '1') echo '<div id="catcher"></div>'; ?>
			<div <?php echo ( $mts_options['mts_sticky_nav'] == '1' ? 'id="sticky"' : '' ); ?> class="mts-main-header">
				<div class="container">
					<div class="logo-wrap">
						<?php if ($mts_options['mts_logo'] != '') { ?>
							<?php if( is_front_page() || is_home() || is_404() || is_page_template( 'page-blog.php' )) { ?>
									<h1 id="logo" class="image-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
								  <h2 id="logo" class="image-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } else { ?>
							<?php if( is_front_page() || is_home() || is_404() || is_page_template( 'page-blog.php' )) { ?>
									<h1 id="logo" class="text-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
								  <h2 id="logo" class="text-logo" itemprop="headline">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } ?>
					</div>
					<?php if ( $mts_options['mts_show_primary_nav'] == '1' ) { ?>
						<div class="header-top">
							<div class="secondary-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<a href="#" id="pull" class="toggle-mobile-menu"><?php _e('Menu','mythemeshop'); ?></a>
								<nav id="navigation" class="clearfix mobile-menu-wrapper">
									<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
										<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>
									<?php } else { ?>
										<ul class="menu clearfix">
											<?php wp_list_categories('title_li='); ?>
										</ul>
									<?php } ?>
								</nav>
							</div>
						</div>
					<?php } ?>
				</div>
			</div><!--#header-->
		</header>