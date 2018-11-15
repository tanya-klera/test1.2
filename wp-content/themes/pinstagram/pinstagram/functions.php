<?php
/*-----------------------------------------------------------------------------------*/
/*	Do not remove these lines, sky will fall on your head.
/*-----------------------------------------------------------------------------------*/
require_once( dirname( __FILE__ ) . '/theme-options.php' );
include("functions/tinymce/tinymce.php");
define( 'MTS_THEME_VERSION', '1.2.6' );
if ( ! isset( $content_width ) ) $content_width = 1060;

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );
if ( function_exists('add_theme_support') ) add_theme_support('automatic-feed-links');

/*-----------------------------------------------------------------------------------*/
/*	Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 290, 150, true );
	add_image_size( 'featured', 290, 150, true ); //featured
	add_image_size( 'related', 82, 60, true ); //related
	add_image_size( 'widgetthumb', 65, 50, true ); //widget
	add_image_size( 'slider', 510, 300, true ); //slider
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary-menu' => 'Primary Menu'
		)
	);
}

/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/
function mts_add_scripts() {
	$mts_options = get_option('pinstagram');

	wp_enqueue_script('jquery');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_register_script('customscript', get_template_directory_uri() . '/js/customscript.js', true);
	wp_enqueue_script ('customscript');

	//Slider
	if($mts_options['mts_featured_slider'] == '1' && !is_singular()) {
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
		wp_enqueue_script ('flexslider');
	}	

	global $is_IE;
    if ($is_IE) {
        wp_register_script ('html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js");
        wp_enqueue_script ('html5shim');
	}
}
add_action('wp_enqueue_scripts','mts_add_scripts');
   
function mts_load_footer_scripts() {  
	$mts_options = get_option('pinstagram');
	
	// Site wide js
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.8.3');
	
	//Lightbox
	if($mts_options['mts_lightbox'] == '1') {
		wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', true);
		wp_enqueue_script('prettyPhoto');
	}
	
	//Sticky Nav
	if($mts_options['mts_sticky_header'] == '1') {
		wp_register_script('StickyNav', get_template_directory_uri() . '/js/sticky.js', true);
		wp_enqueue_script('StickyNav');;
	}
}  
add_action('wp_footer', 'mts_load_footer_scripts');  

/*-----------------------------------------------------------------------------------*/
/* Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function mts_enqueue_css() {
	$mts_options = get_option('pinstagram');

	//slider
	if($mts_options['mts_featured_slider'] == '1' && !is_singular()) {
		wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', 'style');
		wp_enqueue_style('flexslider');
	}
	
	//lightbox
	if($mts_options['mts_lightbox'] == '1') {
		wp_register_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');
		wp_enqueue_style('prettyPhoto');
	}
	
	//Font Awesome
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', 'style');
	wp_enqueue_style('fontawesome');
	global $is_IE;
    if ($is_IE) {
       wp_register_style('ie7-fontawesome', get_template_directory_uri() . '/css/font-awesome-ie7.min.css', 'style');
	   wp_enqueue_style('ie7-fontawesome');
	}
	
	wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/style.css', 'style');
	
	//Responsive
	if($mts_options['mts_responsive'] == '1') {
        wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', 'style');
	}
	
	if ($mts_options['mts_bg_pattern_upload'] != '') {
		$mts_bg = $mts_options['mts_bg_pattern_upload'];
	} else {
		if($mts_options['mts_bg_pattern'] != '') {
			$mts_bg = get_template_directory_uri().'/images/'.$mts_options['mts_bg_pattern'].'.png';
		} 
	}
	$mts_sclayout = '';
	$mts_shareit_left = '';
	$mts_shareit_right = '';
	$mts_author = '';
	$mts_header_section = '';
	$mts_single_layout = '';
	if($mts_options['mts_layout'] == 'rcslayout') {
		$mts_sclayout = '
			.addon-content { float: left; -moz-box-shadow: 0px 0 6px 0 #ADADAD; -webkit-box-shadow: 0px 0 6px 0 #ADADAD; box-shadow: 0px 0 6px 0 #ADADAD;}
			.post-content-in { float: right; margin-right: 1.2% }';
	}elseif($mts_options['mts_layout'] == 'scrlayout') {
		$mts_sclayout = '
			.article { float: right;}
			.post-content-in { margin-right: 1.2%; margin-left: 1.2% }
			.addon-content { -moz-box-shadow: -2px 0 5px 0 #888; -webkit-box-shadow: -2px 0 5px 0 #888; box-shadow: -2px 0 5px 0 #888;}
			.sidebar.c-4-12 { float: left; -moz-box-shadow: 2px 0 6px 0 #888; -webkit-box-shadow: 2px 0 6px 0 #888; box-shadow: 2px 0 6px 0 #888;}';
	}elseif($mts_options['mts_layout'] == 'srclayout') {
		$mts_sclayout = '
			.article { float: right;}
			.sidebar.c-4-12 { float: left; }
			.addon-content { float: left; }
			.post-content-in { float: right; margin: 0 }';
	}elseif($mts_options['mts_layout'] == 'sclayout') {
		$mts_sclayout = '
			.secondary-navigation { float: left }
			#header h1, #header h2 { border: 0; padding-left: 0 }
			#page, .container { max-width: 860px }
			.main-container { width: 860px }
			.article { float: right; width: 60.8% }
			.sidebar.c-4-12 { float: left; width: 34.9% }
			.excerpt-text { width:100%; max-width:100%; min-height:108px; }
			.noborder { border-bottom: 1px solid #F1F1F1 !important; }
			h2.post-heading, h2.post-heading-span { width:100%; }
			.post-content-in { width: 97.6%; max-width: 100%; margin: 0 0 0 2.4%; }';
	}elseif($mts_options['mts_layout'] == 'cslayout') {
		$mts_sclayout = '
			.secondary-navigation { float: right; }
			#header h1, #header h2 { border: 0; padding-left: 0 }
			#page, .container { max-width: 860px }
			.main-container { width: 860px }
			.article { width: 60.8% }
			.addon-content { display: none }
			.sidebar.c-4-12 { width: 34.9% }
			.excerpt-text { width:100%; max-width:100%; min-height:108px; }
			.noborder { border-bottom: 1px solid #F1F1F1 !important; }
			h2.post-heading, h2.post-heading-span { width:100%; }
			.post-content-in { width: 97.6%; max-width: 100%; }';
	}
	if($mts_options['mts_single_post_layout'] == 'crlayuot') {
		$mts_single_layout = '
			.single_post { width: 77%; float: left; } .related-posts2 { margin-left: 0; margin-right: 2.5%; }';
	}elseif($mts_options['mts_single_post_layout'] == 'rclayout') {
		$mts_single_layout = '
			.single_post { width: 77%; float: right; }
			.related-posts2 { float: left; }';
	}elseif($mts_options['mts_single_post_layout'] == 'clayout' || $mts_options['mts_single_post_layout'] == 'cbrlayout') {
		$mts_single_layout = '
			.single_post { width: 100%; }';
	}
	if($mts_options['mts_author_comment'] == '1') {
		$mts_author = '.bypostauthor {padding: 3%!important; background: #FAFAFA; width: 94%!important;}
		.bypostauthor:after { content: "'.__('Author','mythemeshop').'"; position: absolute; right: -1px; top: -1px; padding: 1px 10px; background: #818181; color: #FFF; }';
	}
	$custom_css = "
		.main-container-wrap {background-color:{$mts_options['mts_bg_color']}; }
		.main-container-wrap {background-image: url({$mts_bg});}
		.postauthor h5, .textwidget a, .pnavigation2 a, .sidebar.c-4-12 a:hover, .copyrights a:hover, footer .widget li a:hover, .sidebar.c-4-12 a:hover, .related-posts a:hover, .reply a, .title a:hover, .comm, #tabber .inside li a:hover, .fn a, a, a:hover { color:{$mts_options['mts_color_scheme']}; }	
		#navigation ul ul, .head-social ul ul, #navigation ul ul li, .main-header, #commentform input#submit, .contactform #submit, .mts-subscribe input[type='submit'], #move-to-top:hover, #searchform .icon-search, #navigation ul li:hover, .currenttext, .pagination a:hover, .single .pagination a:hover .currenttext, #tabber ul.tabs li a.selected, .readMore a, .tagcloud a, #searchsubmit, #move-to-top, .sbutton, #searchsubmit, .pagination .nav-previous a, .pagination .nav-next a { background-color:{$mts_options['mts_color_scheme']}; color: #fff!important; }
		.flex-control-thumbs .flex-active{ border-top:3px solid {$mts_options['mts_color_scheme']};}
		.currenttext, .pagination a:hover, .single .pagination a:hover .currenttext, .sbutton, #searchsubmit, .pagination .nav-previous a, .pagination .nav-next a { border-color: {$mts_options['mts_color_scheme']}; }
		{$mts_sclayout}
		{$mts_single_layout}
		{$mts_shareit_left}
		{$mts_shareit_right}
		{$mts_author}
		{$mts_header_section}
		{$mts_options['mts_custom_css']}
			";
	wp_add_inline_style( 'stylesheet', $custom_css );
}
add_action('wp_enqueue_scripts', 'mts_enqueue_css', 99);

/*-----------------------------------------------------------------------------------*/
/*	Enable Widgetized sidebar and Footer
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name'=>'Sidebar',
		'description'   => __( 'Appears on homepage, posts and pages', 'mythemeshop' ),
		'before_widget' => '<li id="%1$s" class="widget widget-sidebar %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-wrap"><h3>',
		'after_title' => '</h3></div>',
	));
	register_sidebar(array(
		'name' => 'Left Footer',
		'description'   => __( 'Appears in left side of footer.', 'mythemeshop' ),
		'id' => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	register_sidebar(array(
		'name' => 'Center Footer',
		'description'   => __( 'Appears in center of footer.', 'mythemeshop' ),
		'id' => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	register_sidebar(array(
		'name' => 'Right Footer',
		'description'   => __( 'Appears in right side of footer.', 'mythemeshop' ),
		'id' => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

/*-----------------------------------------------------------------------------------*/
/*  Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/
// Add the 125x125 Ad Block Custom Widget
include("functions/widget-ad125.php");

// Add the 300x250 Ad Block Custom Widget
include("functions/widget-ad300.php");

// Add the Tabbed Custom Widget
include("functions/widget-tabs.php");

// Add the Latest Tweets Custom Widget
include("functions/widget-tweets.php");

// Add the Theme Shortcodes
include("functions/theme-shortcodes.php");

// Add Recent Posts Widget
include("functions/widget-recentposts.php");

// Add Related Posts Widget
include("functions/widget-relatedposts.php");

// Add Popular Posts Widget
include("functions/widget-popular.php");

// Add Facebook Like box Widget
include("functions/widget-fblikebox.php");

// Add Google Plus box Widget
include("functions/widget-googleplus.php");

// Add Subscribe Widget
include("functions/widget-subscribe.php");

// Add Social Profile Widget
include("functions/widget-social.php");

// Add Category Posts Widget
include("functions/widget-catposts.php");

// Add Welcome message
include("functions/welcome-message.php");

// Theme Functions
include("functions/theme-actions.php");

// Recommended Plugins
include("functions/plugin-activation.php");

/*-----------------------------------------------------------------------------------*/
/*	Filters customize wp_title
/*-----------------------------------------------------------------------------------*/
function mts_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mythemeshop' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mts_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
add_filter('the_content_rss', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mts_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" style="position:relative;">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
				<?php printf(__('<span class="fn">%s</span>', 'mythemeshop'), get_comment_author_link()) ?> 
				<?php $mts_options = get_option('pinstagram'); if($mts_options['mts_comment_date'] == '1') { ?>
					<span class="ago"><?php comment_date(get_option( 'date_format' )); ?> / </span>
				<?php } ?>
				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</span>
				<span class="comment-meta">
					<?php edit_comment_link(__('(Edit)', 'mythemeshop'),'  ','') ?>
				</span>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'mythemeshop') ?></em>
				<br />
			<?php endif; ?>
			<div class="commentmetadata">
			<?php comment_text() ?>
			</div>
		</div>
	</li>
<?php }

/*-----------------------------------------------------------------------------------*/
/*	excerpt
/*-----------------------------------------------------------------------------------*/
function mts_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function mts_pagination_add_nofollow($content) {
    return 'rel="nofollow"';
}
add_filter('next_posts_link_attributes', 'mts_pagination_add_nofollow' );
add_filter('previous_posts_link_attributes', 'mts_pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'mts_add_nofollow_cat' ); 
function mts_add_nofollow_cat( $text ) {
$text = str_replace('rel="category tag"', 'rel="nofollow"', $text); return $text;
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter('the_author_posts_link', 'mts_nofollow_the_author_posts_link');
function mts_nofollow_the_author_posts_link ($link) {
return str_replace('<a href=', '<a rel="nofollow" href=',$link); 
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow to reply links
/*-----------------------------------------------------------------------------------*/
function mts_add_nofollow_to_reply_link( $link ) {
return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'mts_add_nofollow_to_reply_link' );

/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
function wb_remove_version() {
	return '<!--Theme by MyThemeShop.com-->';
}
add_filter('the_generator', 'wb_remove_version');
	
/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
add_filter('get_comments_number', 'mts_comment_count', 0);
function mts_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
function has_thumb_class($classes) {
	global $post;
	if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
		return $classes;
}
add_filter('post_class', 'has_thumb_class');

/*-----------------------------------------------------------------------------------*/	
/* Breadcrumb
/*-----------------------------------------------------------------------------------*/
function mts_the_breadcrumb() {
	echo '<a href="';
	echo home_url();
	echo '" rel="nofollow"><i class="icon-home"></i>&nbsp;'.__('Home','mythemeshop');
	echo "</a>";
	if (is_category() || is_single()) {
		echo "&nbsp;>&nbsp;";
		the_category(' & ');
			if (is_single()) {
				echo "&nbsp;>&nbsp;";
				the_title();
			}
	} elseif (is_page()) {
		echo "&nbsp;>&nbsp;";
		echo the_title();
	} elseif (is_search()) {
		echo "&nbsp;>&nbsp;".__('Search Results for','mythemeshop')."... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

/*-----------------------------------------------------------------------------------*/	
/* Pagination
/*-----------------------------------------------------------------------------------*/
function mts_pagination($pages = '', $range = 3) { 
	$showitems = ($range * 3)+1;
	global $paged; if(empty($paged)) $paged = 1;
	if($pages == '') {
		global $wp_query; $pages = $wp_query->max_num_pages; 
		if(!$pages){ $pages = 1; } 
	}
	if(1 != $pages) { 
		echo "<div class='pagination'><ul>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."'>&laquo; ".__('First','mythemeshop')."</a></li>";
		if($paged > 1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive'>&lsaquo; ".__('Previous','mythemeshop')."</a></li>";
		for ($i=1; $i <= $pages; $i++){ 
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) { 
				echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
			} 
		} 
		if ($paged < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive'>".__('Next','mythemeshop')." &rsaquo;</a></li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' class='inactive' href='".get_pagenum_link($pages)."'>".__('Last','mythemeshop')." &raquo;</a></li>";
			echo "</ul></div>"; 
	}
}

/*-----------------------------------------------------------------------------------*/
/* Redirect feed to feedburner
/*-----------------------------------------------------------------------------------*/
$mts_options = get_option('pinstagram');
if ( isset($mts_options['mts_feedburner']) != '') {
function mts_rss_feed_redirect() {
    $mts_options = get_option('pinstagram');
    global $feed;
    $new_feed = $mts_options['mts_feedburner'];
    if (!is_feed()) {
            return;
    }
    if (preg_match('/feedburner/i', $_SERVER['HTTP_USER_AGENT'])){
            return;
    }
    if ($feed != 'comments-rss2') {
            if (function_exists('status_header')) status_header( 302 );
            header("Location:" . $new_feed);
            header("HTTP/1.1 302 Temporary Redirect");
            exit();
    }
}
add_action('template_redirect', 'mts_rss_feed_redirect');
}

/*-----------------------------------------------------------------------------------*/
/* Single Post Pagination
/*-----------------------------------------------------------------------------------*/
function mts_wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;
    if (!$args['next_or_number'] == 'next_and_number')
        return $args; 
    $args['next_or_number'] = 'number'; 
    if (!$more)
        return $args; 
    if($page-1) 
        $args['before'] .= _wp_link_page($page-1)
        . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
    ;
    if ($page<$numpages) 
    
        $args['after'] = _wp_link_page($page+1)
        . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
        . $args['after']
    ;
    return $args;
}
add_filter('wp_link_pages_args', 'mts_wp_link_pages_args_prevnext_add');

/*-----------------------------------------------------------------------------------*/
/* add <!-- next-page --> button to tinymce
/*-----------------------------------------------------------------------------------*/
add_filter('mce_buttons','wysiwyg_editor');
function wysiwyg_editor($mce_buttons) {
   $pos = array_search('wp_more',$mce_buttons,true);
   if ($pos !== false) {
       $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
       $tmp_buttons[] = 'wp_page';
       $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
   }
   return $mce_buttons;
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'mts_custom_gravatar' ) ) {
    function mts_custom_gravatar( $avatar_defaults ) {
        $mts_avatar = get_bloginfo('template_directory') . '/images/gravatar.png';
        $avatar_defaults[$mts_avatar] = 'Custom Gravatar (/images/gravatar.png)';
        return $avatar_defaults;
    }
    add_filter( 'avatar_defaults', 'mts_custom_gravatar' );
}

?>
