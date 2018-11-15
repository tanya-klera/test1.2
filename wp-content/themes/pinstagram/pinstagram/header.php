<!DOCTYPE html>
<?php $mts_options = get_option('pinstagram'); ?>
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
<body id ="blog" <?php body_class('main'); ?> itemscope itemtype="http://schema.org/WebPage">
	<div class="main-container-wrap">
		<a href="#" id="pull"><?php _e('Menu','mythemeshop'); ?></a>
		<?php if($mts_options['mts_sticky_header'] == '1') { ?>
			<div class="clear" id="catcher"></div>
			<header id="sticky" class="main-header">
		<?php } else { ?>
		<header class="main-header">
		<?php } ?>
			<div class="container">
				<div id="header">
					<div class="logo-wrap">
						<?php if ($mts_options['mts_logo'] != '') { ?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
									<h1 id="logo" class="image-logo">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
								  <h2 id="logo" class="image-logo">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } else { ?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
									<h1 id="logo" class="text-logo">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
								  <h2 id="logo" class="text-logo">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } ?>
					</div>
						<?php /*<div class="header-search"> 
								<?php get_search_form(); ?>
						</div> */?>
					<div class="head-social">
						<ul>
						<?php if ($mts_options['mts_header_search'] == 1) { ?>
							<li class="head-search">
								<i class="icon-search"></i>
								<ul class="dropdown-search">
									<li><?php get_search_form(); ?></li>
								</ul>
							</li>
						<?php } ?>
							<?php if($mts_options['mts_twitter_username'] != '') { ?>
								<li class="mts-twitter-icon"><a href="http://twitter.com/<?php echo $mts_options['mts_twitter_username']; ?>"><i class="icon-twitter"></i></a></li>
							<?php } ?>
							<?php if($mts_options['mts_facebook_username'] != '') { ?>
								<li class="mts-fb-icon"><a href="<?php echo $mts_options['mts_facebook_username']; ?>"><i class="icon-facebook"></i></a></li>
							<?php } ?>
							<?php if($mts_options['mts_gplus_username'] != '') { ?>
								<li class="mts-linkedin-icon"><a href="<?php echo $mts_options['mts_gplus_username']; ?>"><i class="icon-google-plus"></i></a></li>
							<?php } ?>
							<?php if($mts_options['mts_pinterest_username'] != '') { ?>
								<li class="mts-pinterest-icon"><a href="<?php echo $mts_options['mts_pinterest_username']; ?>"><i class="icon-pinterest"></i></a></li>
							<?php } ?>
							<?php if($mts_options['mts_feedburner'] != '') { ?>
								<li class="mts-feedburner-icon"><a href="<?php echo $mts_options['mts_feedburner']; ?>"><i class="icon-rss"></i></a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="secondary-navigation">
						<nav id="navigation" class="clearfix">
							<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
								<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu clearfix', 'container' => '' ) ); ?>
							<?php } else { ?>
								<ul class="menu clearfix">
									<?php wp_list_categories('title_li='); ?>
								</ul>
							<?php } ?>
						</nav>
					</div>              
				</div><!--#header-->
			</div><!--.container-->        
		</header>
		<div class="main-container">