<?php
/*-----------------------------------------------------------------------------------*/
/*  Do not remove these lines, sky will fall on your head.
/*-----------------------------------------------------------------------------------*/
define( 'MTS_THEME_NAME', 'corporate' );
define( 'MTS_THEME_VERSION', '1.1.10' );
require_once( dirname( __FILE__ ) . '/theme-options.php' );
if ( ! isset( $content_width ) ) $content_width = 1060;

/*-----------------------------------------------------------------------------------*/
/*  Load Options
/*-----------------------------------------------------------------------------------*/
$mts_options = get_option( MTS_THEME_NAME );

/*-----------------------------------------------------------------------------------*/
/*  Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );

// Custom translations
if ( !empty( $mts_options['translate'] )) {
    $mts_translations = get_option( 'mts_translations_'.MTS_THEME_NAME );//$mts_options['translations'];
    function mts_custom_translate( $translated_text, $text, $domain ) {
        if ( $domain == 'mythemeshop' || $domain == 'nhp-opts' ) {
            global $mts_translations;
            if ( !empty( $mts_translations[$text] )) {
                $translated_text = $mts_translations[$text];
            }
        }
        return $translated_text;

    }
    add_filter( 'gettext', 'mts_custom_translate', 20, 3 );
}

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/*  Disable theme updates from WordPress.org theme repository
/*-----------------------------------------------------------------------------------*/
if ( !class_exists('mts_connection') ) {
    add_filter( 'pre_set_site_transient_update_themes', 'mts_prevent_update' );
    function mts_prevent_update( $update_transient ) {
        if ( property_exists( $update_transient, 'response' ) && is_array( $update_transient->response ) && ! empty( $update_transient->response['corporate'] ) ) {
            unset($update_transient->response['corporate']);
        }
        return $update_transient;
    }
}
// Disable auto update
add_filter( 'auto_update_theme', '__return_false' );


/*------------------------------------------------------------------------------------------------------------*/
/*  Define MTS_ICONS constant containing all available icons for use in nav menus and icon select option
/*------------------------------------------------------------------------------------------------------------*/

$_mts_icons = array(
    'Web Application Icons' => array(
        'adjust', 'anchor', 'archive', 'area-chart', 'arrows', 'arrows-h', 'arrows-v', 'asterisk', 'at', 'ban', 'bar-chart', 'barcode', 'bars', 'beer', 'bell', 'bell-o', 'bell-slash', 'bell-slash-o', 'bicycle', 'binoculars', 'birthday-cake', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'bus', 'calculator', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'cc', 'certificate', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clock-o', 'cloud', 'cloud-download', 'cloud-upload', 'code', 'code-fork', 'coffee', 'cog', 'cogs', 'comment', 'comment-o', 'comments', 'comments-o', 'compass', 'copyright', 'credit-card', 'crop', 'crosshairs', 'cube', 'cubes', 'cutlery', 'database', 'desktop', 'dot-circle-o', 'download', 'ellipsis-h', 'ellipsis-v', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'eyedropper', 'fax', 'female', 'fighter-jet', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-pdf-o', 'file-powerpoint-o', 'file-video-o', 'file-word-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flask', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'frown-o', 'futbol-o', 'gamepad', 'gavel', 'gift', 'glass', 'globe', 'graduation-cap', 'hdd-o', 'headphones', 'heart', 'heart-o', 'history', 'home', 'inbox', 'info', 'info-circle', 'key', 'keyboard-o', 'language', 'laptop', 'leaf', 'lemon-o', 'level-down', 'level-up', 'life-ring', 'lightbulb-o', 'line-chart', 'location-arrow', 'lock', 'magic', 'magnet', 'male', 'map-marker', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'money', 'moon-o', 'music', 'newspaper-o', 'paint-brush', 'paper-plane', 'paper-plane-o', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'phone', 'phone-square', 'picture-o', 'pie-chart', 'plane', 'plug', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'random', 'recycle', 'refresh', 'reply', 'reply-all', 'retweet', 'road', 'rocket', 'rss', 'rss-square', 'search', 'search-minus', 'search-plus', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'sitemap', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'space-shuttle', 'spinner', 'spoon', 'square', 'square-o', 'star', 'star-half', 'star-half-o', 'star-o', 'suitcase', 'sun-o', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'terminal', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-off', 'toggle-on', 'trash', 'trash-o', 'tree', 'trophy', 'truck', 'tty', 'umbrella', 'university', 'unlock', 'unlock-alt', 'upload', 'user', 'users', 'video-camera', 'volume-down', 'volume-off', 'volume-up', 'wheelchair', 'wifi', 'wrench'
    ),
    'File Type Icons' => array(
        'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-o', 'file-pdf-o', 'file-powerpoint-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o'
    ),
    'Spinner Icons' => array(
        'circle-o-notch', 'cog', 'refresh', 'spinner'
    ),
    'Form Control Icons' => array(
        'check-square', 'check-square-o', 'circle', 'circle-o', 'dot-circle-o', 'minus-square', 'minus-square-o', 'plus-square', 'plus-square-o', 'square', 'square-o'
    ),
    'Payment Icons' => array(
        'cc-amex', 'cc-discover', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'credit-card', 'google-wallet', 'paypal'
    ),
    'Chart Icons' => array(
        'area-chart', 'bar-chart', 'line-chart', 'pie-chart'
    ),
    'Currency Icons' => array(
        'btc', 'eur', 'gbp', 'ils', 'inr', 'jpy', 'krw', 'money', 'rub', 'try', 'usd'
    ),
    'Text Editor Icons' => array(
        'align-center', 'align-justify', 'align-left', 'align-right', 'bold', 'chain-broken', 'clipboard', 'columns', 'eraser', 'file', 'file-o', 'file-text', 'file-text-o', 'files-o', 'floppy-o', 'font', 'header', 'indent', 'italic', 'link', 'list', 'list-alt', 'list-ol', 'list-ul', 'outdent', 'paperclip', 'paragraph', 'repeat', 'scissors', 'strikethrough', 'subscript', 'superscript', 'table', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'underline', 'undo'
    ),
    'Directional Icons' => array(
        'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up'
    ),
    'Video Player Icons' => array(
        'arrows-alt', 'backward', 'compress', 'eject', 'expand', 'fast-backward', 'fast-forward', 'forward', 'pause', 'play', 'play-circle', 'play-circle-o', 'step-backward', 'step-forward', 'stop', 'youtube-play'
    ),
    'Brand Icons' => array(
        'adn', 'android', 'angellist', 'apple', 'behance', 'behance-square', 'bitbucket', 'bitbucket-square', 'btc', 'cc-amex', 'cc-discover', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'codepen', 'css3', 'delicious', 'deviantart', 'digg', 'dribbble', 'dropbox', 'drupal', 'empire', 'facebook', 'facebook-square', 'flickr', 'foursquare', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'google', 'google-plus', 'google-plus-square', 'google-wallet', 'hacker-news', 'html5', 'instagram', 'ioxhost', 'joomla', 'jsfiddle', 'lastfm', 'lastfm-square', 'linkedin', 'linkedin-square', 'linux', 'maxcdn', 'meanpath', 'openid', 'pagelines', 'paypal', 'pied-piper', 'pied-piper-alt', 'pinterest', 'pinterest-square', 'qq', 'rebel', 'reddit', 'reddit-square', 'renren', 'share-alt', 'share-alt-square', 'skype', 'slack', 'slideshare', 'soundcloud', 'spotify', 'stack-exchange', 'stack-overflow', 'steam', 'steam-square', 'stumbleupon', 'stumbleupon-circle', 'tencent-weibo', 'trello', 'tumblr', 'tumblr-square', 'twitch', 'twitter', 'twitter-square', 'vimeo-square', 'vine', 'vk', 'weibo', 'weixin', 'windows', 'wordpress', 'xing', 'xing-square', 'yahoo', 'yelp', 'youtube', 'youtube-play', 'youtube-square'
    ),
    'Medical Icons' => array(
        'ambulance', 'h-square', 'hospital-o', 'medkit', 'plus-square', 'stethoscope', 'user-md', 'wheelchair'
    )
);

define ( 'MTS_ICONS', serialize( $_mts_icons ) ); // To use it - $mts_icons = unserialize( MTS_ICONS );

/*-----------------------------------------------------------------------------------*/
/*  Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 200, true );
    add_image_size( 'widgetfull', 300, 200, true ); //for Mega Menu Plugin

    add_action( 'init', 'magazine_wp_review_thumb_size', 11 );
    function magazine_wp_review_thumb_size() {
        add_image_size( 'wp_review_large', 300, 200, true ); 
        add_image_size( 'wp_review_small', 80, 80, true );
    }
}

function mts_get_thumbnail_url( $size = 'full' ) {
    global $post;
    if (has_post_thumbnail( $post->ID ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
        return $image[0];
    }

    // use first attached image
    $images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
    if (!empty($images)) {
        $image = reset($images);
        $image_data = wp_get_attachment_image_src( $image->ID, $size );
        return $image_data[0];
    }
}

/*-----------------------------------------------------------------------------------*/
/*  CREATE AND SHOW COLUMN FOR FEATURED IN PORTFOLIO ITEMS LIST ADMIN PAGE
/*-----------------------------------------------------------------------------------*/

//Get Featured image
function mts_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'widgetfull');
        return $post_thumbnail_img[0];
    }
}
function mts_columns_head($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}
function mts_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = mts_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img width="150" height="100" src="' . $post_featured_image . '" />';
        }
    }
}
add_filter('manage_posts_columns', 'mts_columns_head');
add_action('manage_posts_custom_column', 'mts_columns_content', 10, 2);

/*-----------------------------------------------------------------------------------*/
/*  Use first attached image as post thumbnail (fallback)
/*-----------------------------------------------------------------------------------*/
add_filter( 'post_thumbnail_html', 'mts_post_image_html', 10, 5 );
function mts_post_image_html( $html, $post_id, $post_image_id, $size, $attr ) {
    if ( has_post_thumbnail() || get_post_type( $post_id ) != 'post'  )
        return $html;

    // use first attached image
    $images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post_id );
    if (!empty($images)) {
        $image = reset($images);
        return wp_get_attachment_image( $image->ID, $size, false, $attr );
    }

}

/*-----------------------------------------------------------------------------------*/
/*  Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'primary-menu' => __( 'Primary Menu', 'mythemeshop' )
         )
     );
}

/*-----------------------------------------------------------------------------------*/
/*  Enable Widgetized sidebar and Footer
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'register_sidebar' ) ) {
    function mts_register_sidebars() {
        $mts_options = get_option( MTS_THEME_NAME );

        // Default sidebar
        register_sidebar( array(
            'name' => __('Sidebar', 'mythemeshop'),
            'description'   => __( 'Default sidebar.', 'mythemeshop' ),
            'id' => 'sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'class' => 'test'
        ) );

        // Homepage Widget Area Section
        register_sidebar( array(
            'name' => __('Homepage Widget Area', 'mythemeshop'),
            'description'   => __( 'Appears on homepage, if Widget Area section is enabled. Recommended widget: WP Subscribe plugin.', 'mythemeshop' ),
            'id' => 'homepage-widget-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'class' => 'test'
        ) );

        // Custom sidebars
        if ( !empty( $mts_options['mts_custom_sidebars'] ) && is_array( $mts_options['mts_custom_sidebars'] )) {
            foreach( $mts_options['mts_custom_sidebars'] as $sidebar ) {
                if ( !empty( $sidebar['mts_custom_sidebar_id'] ) && !empty( $sidebar['mts_custom_sidebar_id'] ) && $sidebar['mts_custom_sidebar_id'] != 'sidebar-' ) {
                    register_sidebar( array( 'name' => ''.$sidebar['mts_custom_sidebar_name'].'', 'id' => ''.sanitize_title( strtolower( $sidebar['mts_custom_sidebar_id'] )).'', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
                }
            }
        }


    }

    add_action( 'widgets_init', 'mts_register_sidebars' );
}

function mts_custom_sidebar() {
    $mts_options = get_option( MTS_THEME_NAME );

    // Default sidebar
    $sidebar = 'Sidebar';

    if ( is_page_template( 'page-blog.php' ) && !empty( $mts_options['mts_sidebar_for_home'] )) $sidebar = $mts_options['mts_sidebar_for_home'];
    if ( is_single() && !empty( $mts_options['mts_sidebar_for_post'] )) $sidebar = $mts_options['mts_sidebar_for_post'];
    if ( is_page() && !empty( $mts_options['mts_sidebar_for_page'] )) $sidebar = $mts_options['mts_sidebar_for_page'];

    // Archives
    if ( is_archive() && !empty( $mts_options['mts_sidebar_for_archive'] )) $sidebar = $mts_options['mts_sidebar_for_archive'];
    if ( is_category() && !empty( $mts_options['mts_sidebar_for_category'] )) $sidebar = $mts_options['mts_sidebar_for_category'];
    if ( is_tag() && !empty( $mts_options['mts_sidebar_for_tag'] )) $sidebar = $mts_options['mts_sidebar_for_tag'];
    if ( is_date() && !empty( $mts_options['mts_sidebar_for_date'] )) $sidebar = $mts_options['mts_sidebar_for_date'];
    if ( is_author() && !empty( $mts_options['mts_sidebar_for_author'] )) $sidebar = $mts_options['mts_sidebar_for_author'];

    // Other
    if ( is_search() && !empty( $mts_options['mts_sidebar_for_search'] )) $sidebar = $mts_options['mts_sidebar_for_search'];
    if ( is_404() && !empty( $mts_options['mts_sidebar_for_notfound'] )) $sidebar = $mts_options['mts_sidebar_for_notfound'];


    // Page/post specific custom sidebar
    if ( is_page() || is_single() ) {
        wp_reset_postdata();
        global $post;
        $custom = get_post_meta( $post->ID, '_mts_custom_sidebar', true );
        if ( !empty( $custom )) $sidebar = $custom;
    }

    return $sidebar;
}

/*-----------------------------------------------------------------------------------*/
/*  Load Widgets, Actions and Libraries
/*-----------------------------------------------------------------------------------*/

// BFI Thumb Resize
include_once( "functions/bfi-thumb.php" );

// Add the 125x125 Ad Block Custom Widget
include_once( "functions/widget-ad125.php" );

// Add the 300x250 Ad Block Custom Widget
include_once( "functions/widget-ad300.php" );

// Add the Latest Tweets Custom Widget
include_once( "functions/widget-tweets.php" );

// Add Recent Posts Widget
include_once( "functions/widget-recentposts.php" );

// Add Related Posts Widget
include_once( "functions/widget-relatedposts.php" );

// Add Author Posts Widget
include_once( "functions/widget-authorposts.php" );

// Add Popular Posts Widget
include_once( "functions/widget-popular.php" );

// Add Facebook Like box Widget
include_once( "functions/widget-fblikebox.php" );

// Add Social Profile Widget
include_once( "functions/widget-social.php" );

// Add Category Posts Widget
include_once( "functions/widget-catposts.php" );

// Add Welcome message
include_once( "functions/welcome-message.php" );

// Template Functions
include_once( "functions/theme-actions.php" );

// Post/page editor meta boxes
include_once( "functions/metaboxes.php" );

// TGM Plugin Activation
include_once( "functions/plugin-activation.php" );

// AJAX Contact Form - mts_contact_form()
include_once( 'functions/contact-form.php' );

// Custom menu walker
include_once( 'functions/nav-menu.php' );

/*-----------------------------------------------------------------------------------*/
/*  Filters customize wp_title
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
/*  Javascript
/*-----------------------------------------------------------------------------------*/
function mts_nojs_js_class() {
    echo '<script type="text/javascript">document.documentElement.className = document.documentElement.className.replace( /\bno-js\b/,\'js\' );</script>';
}
add_action( 'wp_head', 'mts_nojs_js_class', 1 );

function mts_add_scripts() {
    $mts_options = get_option( MTS_THEME_NAME );

    wp_enqueue_script( 'jquery' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_register_script( 'customscript', get_template_directory_uri() . '/js/customscript.js', true );
    if ( ! empty( $mts_options['mts_show_primary_nav'] ) && ! empty( $mts_options['mts_show_secondary_nav'] ) ) {
        $nav_menu = 'both';
    } else {
        if ( ! empty( $mts_options['mts_show_primary_nav'] ) ) {
            $nav_menu = 'primary';
        } elseif ( ! empty( $mts_options['mts_show_secondary_nav'] ) ) {
            $nav_menu = 'secondary';
        } else {
            $nav_menu = 'none';
        }
    }
    wp_localize_script(
        'customscript',
        'mts_customscript',
        array(
            'responsive' => ( empty( $mts_options['mts_responsive'] ) ? false : true ),
            'nav_menu' => $nav_menu
        )
    );
    wp_enqueue_script( 'customscript' );

    // Parallax pages and posts
    if (is_singular()) {
        if ( basename( mts_get_post_template() ) == 'singlepost-parallax.php' || basename( get_page_template() ) == 'page-parallax.php' ) {
            wp_register_script ( 'jquery-parallax', get_template_directory_uri() . '/js/parallax.js' );
            wp_enqueue_script ( 'jquery-parallax' );
        }
    }

    global $is_IE;
    if ( $is_IE ) {
        wp_register_script ( 'html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js" );
        wp_enqueue_script ( 'html5shim' );
    }

}
add_action( 'wp_enqueue_scripts', 'mts_add_scripts' );

function mts_load_footer_scripts() {
    $mts_options = get_option( MTS_THEME_NAME );

    //Lightbox
    if ( ! empty( $mts_options['mts_lightbox'] ) ) {
        wp_register_script( 'magnificPopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', true );
        wp_enqueue_script( 'magnificPopup' );
    }

    //Sticky Nav
    if ( ! empty( $mts_options['mts_sticky_nav'] ) ) {
        wp_register_script( 'StickyNav', get_template_directory_uri() . '/js/sticky.js', true );
        wp_enqueue_script( 'StickyNav' );
    }

    // Ajax Load More and Search Results
    wp_register_script( 'mts_ajax', get_template_directory_uri() . '/js/ajax.js', true );
    if( ! empty( $mts_options['mts_pagenavigation_type'] ) && $mts_options['mts_pagenavigation_type'] >= 2 && ( !is_singular() || is_page_template('page-blog.php') ) ) {
        wp_enqueue_script( 'mts_ajax' );

        wp_register_script( 'historyjs', get_template_directory_uri() . '/js/history.js', true );
        wp_enqueue_script( 'historyjs' );

        // Add parameters for the JS
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
        if ( $max == 0 ) {
            $my_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'ignore_sticky_posts'=> 1
                )
            );
            $max = $my_query->max_num_pages;
            wp_reset_query();
        }
        $autoload = ( $mts_options['mts_pagenavigation_type'] == 3 );
        wp_localize_script(
            'mts_ajax',
            'mts_ajax_loadposts',
            array(
                'startPage' => $paged,
                'maxPages' => $max,
                'nextLink' => next_posts( $max, false ),
                'autoLoad' => $autoload,
                'i18n_loadmore' => __( 'Load More Posts', 'mythemeshop' ),
                'i18n_loading' => __('Loading...', 'mythemeshop'),
                'i18n_nomore' => __( 'No more posts.', 'mythemeshop' )
             )
        );
    }
    if ( ! empty( $mts_options['mts_ajax_search'] ) ) {
        wp_enqueue_script( 'mts_ajax' );
        wp_localize_script(
            'mts_ajax',
            'mts_ajax_search',
            array(
                'url' => admin_url( 'admin-ajax.php' ),
                'ajax_search' => '1'
             )
        );
    }

}
add_action( 'wp_footer', 'mts_load_footer_scripts' );

if( !empty( $mts_options['mts_ajax_search'] )) {
    add_action( 'wp_ajax_mts_search', 'ajax_mts_search' );
    add_action( 'wp_ajax_nopriv_mts_search', 'ajax_mts_search' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function mts_enqueue_css() {
    $mts_options = get_option( MTS_THEME_NAME );

    wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/style.css', 'style' );

    // Lightbox
    if ( ! empty( $mts_options['mts_lightbox'] ) ) {
        wp_register_style( 'magnificPopup', get_template_directory_uri() . '/css/magnific-popup.css', 'style' );
        wp_enqueue_style( 'magnificPopup' );
    }

    //Font Awesome
    wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', 'style' );
    wp_enqueue_style( 'fontawesome' );

    //Responsive
    if ( ! empty( $mts_options['mts_responsive'] ) ) {
        wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', 'style' );
    }

    $mts_bg = '';
    if ( $mts_options['mts_bg_pattern_upload'] != '' ) {
        $mts_bg = $mts_options['mts_bg_pattern_upload'];
    } else {
        if( !empty( $mts_options['mts_bg_pattern'] )) {
            $mts_bg = get_template_directory_uri().'/images/'.$mts_options['mts_bg_pattern'].'.png';
        }
    }
    $mts_sclayout = '';
    $mts_shareit_left = '';
    $mts_shareit_right = '';
    $mts_author = '';
    $mts_header_section = '';
    if ( is_page() || is_single() ) {
        $mts_sidebar_location = get_post_meta( get_the_ID(), '_mts_sidebar_location', true );
    } else {
        $mts_sidebar_location = '';
    }
    if ( $mts_sidebar_location != 'right' && ( $mts_options['mts_layout'] == 'sclayout' || $mts_sidebar_location == 'left' )) {
        $mts_sclayout = '.article { float: right;}
        .sidebar.c-4-12 { float: left; padding-right: 0; }';
        if( isset( $mts_options['mts_social_button_position'] ) && $mts_options['mts_social_button_position'] == 'floating' ) {
            $mts_shareit_right = '.shareit { margin: 0 725px 0; border-left: 0; }';
        }
    }
    if ( empty( $mts_options['mts_header_section2'] ) ) {
        $mts_header_section = '.logo-wrap, .mts-main-header:before { display: none; }
        .header-top { float: left; } .secondary-navigation li:first-child a { padding-left: 0; }';
    }
    if ( isset( $mts_options['mts_social_button_position'] ) && $mts_options['mts_social_button_position'] == 'floating' ) {
        $mts_shareit_left = '.shareit { top: 300px; left: auto; margin: 0 0 0 -100px; width: 90px; position: fixed; padding: 5px; border:none; border-right: 0;}
        .share-item {margin: 2px;}';
    }
    if ( ! empty( $mts_options['mts_author_comment'] ) ) {
        $mts_author = '.bypostauthor {padding: 3%!important; background: #FAFAFA; width: 94%!important;}
        .bypostauthor:after { content: "'.__( 'Author', 'mythemeshop' ).'"; position: absolute; right: -1px; top: -1px; padding: 1px 10px; background: #818181; color: #FFF; }';
    }
    $color_scheme_in_rgb = mts_hex_to_rgba( $mts_options['mts_color_scheme'], '0.8' );
    
    $custom_css = '';
    $custom_css = "
        body {background-color:{$mts_options['mts_bg_color']}; }
        body {background-image: url( {$mts_bg} );}
        .mts-main-header {background-color:{$mts_options['mts_header_bg']}; }
        footer {background-color:{$mts_options['mts_footer_bg']}; }
        .postauthor h5, .single_post a, .textwidget a, #logo a, .pnavigation2 a, .copyrights a:hover, .related-posts a:hover, .reply a, .title a:hover, .post-info a:hover, .readMore a:hover, .fn a, a, a:hover, .contact-btn input[type='submit']:hover, .features_ic.fa, #move-to-top:hover, .fa-check, .mts-subscribe input[type='submit']:hover, .counter, .header-social a:hover, .mts-button:hover, #commentform input#submit:hover, .contactform #submit:hover, .sidebar.c-4-12 a:hover { color:{$mts_options['mts_color_scheme']}; }
        .mts-button, #commentform input#submit, .contactform #submit, #searchform .fa-search, .tagcloud a:hover, #navigation ul .sfHover a, .pace .pace-progress, #mobile-menu-wrapper ul li a:hover, .team-thumb:after, #move-to-top, .logo-wrap, .mts-main-header:before, .mts-subscribe input[type='submit'], .contact-btn input[type='submit'], .footer-social a:hover, #navigation ul ul li, nav#navigation.mobile-menu-wrapper, .pagination a:hover, .pagination .nav-previous a:hover, .pagination .nav-next a:hover, .currenttext, .pagination a:hover, .single .pagination a:hover .currenttext, #commentform input#submit, .contactform #submit { background-color:{$mts_options['mts_color_scheme']}; color: #fff }
        .wp-subscribe-custom-css .submit { background-color:{$mts_options['mts_color_scheme']} !important; border-color:{$mts_options['mts_color_scheme']} !important; }
        .wp-subscribe-custom-css .submit:hover { background-color:#fff !important; color:{$mts_options['mts_color_scheme']} !important; }
        .mts-button, .features_ic.fa, #move-to-top, .mts-subscribe input[type='submit'], .contact-btn input[type='submit'], .pagination a, .pagination .nav-previous a, .pagination .nav-next a, .currenttext, .pagination a:hover, .single .pagination a:hover .currenttext, #commentform input#submit, .contactform #submit { border-color:{$mts_options['mts_color_scheme']}; }
        .mask, .team-desc, .testimonials-authors li .mask, .hexagon { background-color: {$color_scheme_in_rgb}; }
        .hexagon:before { border-bottom-color: {$color_scheme_in_rgb}; }
        {$mts_sclayout}
        {$mts_shareit_left}
        {$mts_shareit_right}
        {$mts_author}
        {$mts_header_section}
        {$mts_options['mts_custom_css']}
            ";

        $custom_css .= home_page_sections();
    wp_add_inline_style( 'stylesheet', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'mts_enqueue_css', 99 );

/*-----------------------------------------------------------------------------------*/
/*  Wrap videos in .responsive-video div
/*-----------------------------------------------------------------------------------*/
function mts_responsive_video( $data ) {
    return '<div class="flex-video">' . $data . '</div>';
}
add_filter( 'embed_oembed_html', 'mts_responsive_video' );

/*-----------------------------------------------------------------------------------*/
/*  Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_content_rss', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*  Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mts_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $mts_options = get_option( MTS_THEME_NAME ); ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/UserComments">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
                <?php printf( '<span class="fn"><span>%s</span></span>', get_comment_author_link() ) ?>
                <?php if ( ! empty( $mts_options['mts_comment_date'] ) ) { ?>
                    <span class="ago"><?php comment_date( get_option( 'date_format' ) ); ?></span>
                <?php } ?>
                <span class="comment-meta">
                    <?php edit_comment_link( __( '( Edit )', 'mythemeshop' ), '  ', '' ) ?>
                </span>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em><?php _e( 'Your comment is awaiting moderation.', 'mythemeshop' ) ?></em>
                <br />
            <?php endif; ?>
            <div class="commentmetadata">
                <div class="commenttext" itemprop="commentText">
                    <?php comment_text() ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ) ?>
                </div>
            </div>
        </div>
    </li>
<?php }

/*-----------------------------------------------------------------------------------*/
/*  Excerpt
/*-----------------------------------------------------------------------------------*/

// Increase max length
function mts_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'mts_excerpt_length', 20 );

// Remove [...] and shortcodes
function mts_custom_excerpt( $output ) {
  return preg_replace( '/\[[^\]]*]/', '', $output );
}
add_filter( 'get_the_excerpt', 'mts_custom_excerpt' );

// Truncate string to x letters/words
function mts_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;' ) {
    if ( $units == 'letters' ) {
        if ( mb_strlen( $str ) > $length ) {
            return mb_substr( $str, 0, $length ) . $ellipsis;
        } else {
            return $str;
        }
    } else {
        $words = explode( ' ', $str );
        if ( count( $words ) > $length ) {
            return implode( " ", array_slice( $words, 0, $length ) ) . $ellipsis;
        } else {
            return $str;
        }
    }
}

if ( ! function_exists( 'mts_excerpt' ) ) {
    function mts_excerpt( $limit = 40 ) {
      return mts_truncate( get_the_excerpt(), $limit, 'words' );
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Remove more link from the_content and use custom read more
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_content_more_link', 'mts_remove_more_link', 10, 2 );
function mts_remove_more_link( $more_link, $more_link_text ) {
    return '';
}
// shorthand function to check for more tag in post
function mts_post_has_moretag() {
    global $post;
    return strpos( $post->post_content, '<!--more-->' );
}

if ( ! function_exists( 'mts_readmore' ) ) {
    function mts_readmore() {
        ?>
        <div class="readmore">
            <a href="<?php the_permalink(); ?>"><span class="mts-button blue">
            <?php _e( 'Read More', 'mythemeshop' ); ?>
            </span></a>
        </div>

        <?php
    }
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function mts_pagination_add_nofollow( $content ) {
    return 'rel="nofollow"';
}
add_filter( 'next_posts_link_attributes', 'mts_pagination_add_nofollow' );
add_filter( 'previous_posts_link_attributes', 'mts_pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'mts_add_nofollow_cat' );
function mts_add_nofollow_cat( $text ) {
    $text = str_replace( 'rel="category tag"', 'rel="nofollow"', $text ); return $text;
}

/*-----------------------------------------------------------------------------------*/
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_author_posts_link', 'mts_nofollow_the_author_posts_link' );
function mts_nofollow_the_author_posts_link ( $link ) {
    return str_replace( '<a href=', '<a rel="nofollow" href=', $link );
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to reply links
/*-----------------------------------------------------------------------------------*/
function mts_add_nofollow_to_reply_link( $link ) {
    return str_replace( '" )\'>', '" )\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'mts_add_nofollow_to_reply_link' );

/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
function mts_remove_wpversion() {
    return '<!--Theme by MyThemeShop.com-->';
}
add_filter( 'the_generator', 'mts_remove_wpversion' );

/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
add_filter( 'get_comments_number', 'mts_comment_count', 0 );
function mts_comment_count( $count ) {
    if ( ! is_admin() ) {
        global $id;
        $comments = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $comments );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
function has_thumb_class( $classes ) {
    global $post;
    if( has_post_thumbnail( $post->ID ) ) { $classes[] = 'has_thumb'; }
        return $classes;
}
add_filter( 'post_class', 'has_thumb_class' );

/*-----------------------------------------------------------------------------------*/
/* AJAX Search results
/*-----------------------------------------------------------------------------------*/
function ajax_mts_search() {
    $query = $_REQUEST['q']; // It goes through esc_sql() in WP_Query
    $search_query = new WP_Query( array( 's' => $query, 'posts_per_page' => 3, 'post_status' => 'publish' ));
    $search_count = new WP_Query( array( 's' => $query, 'posts_per_page' => -1, 'post_status' => 'publish' ));
    $search_count = $search_count->post_count;
    if ( !empty( $query ) && $search_query->have_posts() ) :
        //echo '<h5>Results for: '. $query.'</h5>';
        echo '<ul class="ajax-search-results">';
        while ( $search_query->have_posts() ) : $search_query->the_post();
            ?><li>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'widgetthumb', array( 'title' => '' )); ?>
                    <?php the_title(); ?>
                </a>
                <div class="meta">
                        <span class="thetime"><?php the_time( 'F j, Y' ); ?></span>
                </div> <!-- / .meta -->

            </li>
            <?php
        endwhile;
        echo '</ul>';
        echo '<div class="ajax-search-meta"><span class="results-count">'.$search_count.' '.__( 'Results', 'mythemeshop' ).'</span><a href="'.get_search_link( $query ).'" class="results-link">Show all results</a></div>';
    else:
        echo '<div class="no-results">'.__( 'No results found.', 'mythemeshop' ).'</div>';
    endif;

    exit; // required for AJAX in WP
}

/*-----------------------------------------------------------------------------------*/
/* Redirect feed to feedburner
/*-----------------------------------------------------------------------------------*/

if ( $mts_options['mts_feedburner'] != '' ) {
    function mts_rss_feed_redirect() {
        $mts_options = get_option( MTS_THEME_NAME );
        global $feed;
        $new_feed = $mts_options['mts_feedburner'];
        if ( !is_feed() ) {
                return;
        }
        if ( preg_match( '/feedburner/i', $_SERVER['HTTP_USER_AGENT'] )){
                return;
        }
        if ( $feed != 'comments-rss2' ) {
                if ( function_exists( 'status_header' )) status_header( 302 );
                header( "Location:" . $new_feed );
                header( "HTTP/1.1 302 Temporary Redirect" );
                exit();
        }
    }
    add_action( 'template_redirect', 'mts_rss_feed_redirect' );
}

/*-----------------------------------------------------------------------------------*/
/* Single Post Pagination - Numbers + Previous/Next
/*-----------------------------------------------------------------------------------*/
function mts_wp_link_pages_args( $args ) {
    global $page, $numpages, $more, $pagenow;
    if ( !$args['next_or_number'] == 'next_and_number' )
        return $args;
    $args['next_or_number'] = 'number';
    if ( !$more )
        return $args;
    if( $page-1 )
        $args['before'] .= _wp_link_page( $page-1 )
        . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
    ;
    if ( $page<$numpages )

        $args['after'] = _wp_link_page( $page+1 )
        . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
        . $args['after']
    ;
    return $args;
}
add_filter( 'wp_link_pages_args', 'mts_wp_link_pages_args' );

/*-----------------------------------------------------------------------------------*/
/* add <!-- next-page --> button to tinymce
/*-----------------------------------------------------------------------------------*/
add_filter( 'mce_buttons', 'wysiwyg_editor' );
function wysiwyg_editor( $mce_buttons ) {
   $pos = array_search( 'wp_more', $mce_buttons, true );
   if ( $pos !== false ) {
       $tmp_buttons = array_slice( $mce_buttons, 0, $pos+1 );
       $tmp_buttons[] = 'wp_page';
       $mce_buttons = array_merge( $tmp_buttons, array_slice( $mce_buttons, $pos+1 ));
   }
   return $mce_buttons;
}

/*-----------------------------------------------------------------------------------*/
/*  Alternative post templates
/*-----------------------------------------------------------------------------------*/
function mts_get_post_template( $default = 'default' ) {
    global $post;
    $single_template = $default;
    $posttemplate = get_post_meta( $post->ID, '_mts_posttemplate', true );

    if ( empty( $posttemplate ) || ! is_string( $posttemplate ) )
        return $single_template;

    if ( file_exists( dirname( __FILE__ ) . '/singlepost-'.$posttemplate.'.php' ) ) {
        $single_template = dirname( __FILE__ ) . '/singlepost-'.$posttemplate.'.php';
    }

    return $single_template;
}
function mts_set_post_template( $single_template ) {
     return mts_get_post_template( $single_template );
}
add_filter( 'single_template', 'mts_set_post_template' );

/*-----------------------------------------------------------------------------------*/
/*  Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/
function mts_custom_gravatar( $avatar_defaults ) {
    $mts_avatar = get_template_directory_uri() . '/images/gravatar.png';
    $avatar_defaults[$mts_avatar] = 'Custom Gravatar ( /images/gravatar.png )';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'mts_custom_gravatar' );

/*-----------------------------------------------------------------------------------*/
/*  WP Review Support
/*-----------------------------------------------------------------------------------*/

// Set default colors for new reviews
function new_default_review_colors( $colors ) {
    $colors = array(
        'color' => '#FFCA00',
        'fontcolor' => '#fff',
        'bgcolor1' => '##3498DB',
        'bgcolor2' => '##3498DB',
        'bordercolor' => '##3498DB'
    );
  return $colors;
}
add_filter( 'wp_review_default_colors', 'new_default_review_colors' );

// Set default location for new reviews
function new_default_review_location( $position ) {
  $position = 'top';
  return $position;
}
add_filter( 'wp_review_default_location', 'new_default_review_location' );


/*-----------------------------------------------------------------------------------*/
/*  Thumbnail Upscale
/*  Enables upscaling of thumbnails for small media attachments,
/*  to make sure it fits into it's supposed location.
/*  Cannot be used in conjunction with Retina Support.
/*-----------------------------------------------------------------------------------*/
if ( empty( $mts_options['mts_retina'] ) ) {
    function mts_image_crop_dimensions( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
        if( !$crop )
            return null; // let the wordpress default function handle this

        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

        $crop_w = round( $new_w / $size_ratio );
        $crop_h = round( $new_h / $size_ratio );

        $s_x = floor( ( $orig_w - $crop_w ) / 2 );
        $s_y = floor( ( $orig_h - $crop_h ) / 2 );

        return array( 0, 0, ( int ) $s_x, ( int ) $s_y, ( int ) $new_w, ( int ) $new_h, ( int ) $crop_w, ( int ) $crop_h );
    }
    add_filter( 'image_resize_dimensions', 'mts_image_crop_dimensions', 10, 6 );
}


/*-----------------------------------------------------------------------------------*/
/* Post view count
/* AJAX is used to support caching plugins - it is possible to disable with filter
/* It is also possible to exclude admins with another filter
/*-----------------------------------------------------------------------------------*/
add_filter('the_content', 'mts_view_count_js'); // outputs JS for AJAX call on single
add_action('wp_ajax_mts_view_count', 'ajax_mts_view_count');
add_action('wp_ajax_nopriv_mts_view_count','ajax_mts_view_count');

function mts_view_count_js( $content ) {
    global $post;
    $id = $post->ID;
    $use_ajax = apply_filters( 'mts_view_count_cache_support', true );

    $exclude_admins = apply_filters( 'mts_view_count_exclude_admins', false ); // pass in true or a user capability
    if ($exclude_admins === true) $exclude_admins = 'edit_posts';
    if ($exclude_admins && current_user_can( $exclude_admins )) return $content; // do not count post views here

    if (is_single()) {
        if ($use_ajax) {
            // enqueue jquery
            wp_enqueue_script( 'jquery' );

            $url = admin_url( 'admin-ajax.php' );
            $content .= "
            <script type=\"text/javascript\">
            jQuery(document).ready(function($) {
                $.post('{$url}', {action: 'mts_view_count', id: '{$id}'});
            });
            </script>";

        }

        if (!$use_ajax) {
            mts_update_view_count($id);
        }
    }

    return $content;
}

function ajax_mts_view_count() {
    // do count
    $post_id = $_POST['id'];
    mts_update_view_count( $post_id );
}
function mts_update_view_count( $post_id ) {
    $count = get_post_meta( $post_id, '_mts_view_count', true );
    update_post_meta( $post_id, '_mts_view_count', $count + 1 );

    do_action( 'mts_view_count_after_update', $post_id );
}

/*-----------------------------------------------------------------------------------*/
/*  Color manipulations
/*-----------------------------------------------------------------------------------*/
function mts_hex_to_rgba( $hex, $a = '1' ) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgba = array($r, $g, $b, $a);

    $css_string = 'rgba('.implode(",", $rgba).')';

    return $css_string;
}

function mts_hex_to_hsl( $color ){

    // Sanity check
    $color = mts_check_hex_color($color);

    // Convert HEX to DEC
    $R = hexdec($color[0].$color[1]);
    $G = hexdec($color[2].$color[3]);
    $B = hexdec($color[4].$color[5]);

    $HSL = array();

    $var_R = ($R / 255);
    $var_G = ($G / 255);
    $var_B = ($B / 255);

    $var_Min = min($var_R, $var_G, $var_B);
    $var_Max = max($var_R, $var_G, $var_B);
    $del_Max = $var_Max - $var_Min;

    $L = ($var_Max + $var_Min)/2;

    if ($del_Max == 0) {
        $H = 0;
        $S = 0;
    } else {
        if ( $L < 0.5 ) $S = $del_Max / ( $var_Max + $var_Min );
        else            $S = $del_Max / ( 2 - $var_Max - $var_Min );

        $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
        $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
        $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

        if      ($var_R == $var_Max) $H = $del_B - $del_G;
        else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
        else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;

        if ($H<0) $H++;
        if ($H>1) $H--;
    }

    $HSL['H'] = ($H*360);
    $HSL['S'] = $S;
    $HSL['L'] = $L;

    return $HSL;
}

function mts_hsl_to_hex( $hsl = array() ){

    list($H,$S,$L) = array( $hsl['H']/360,$hsl['S'],$hsl['L'] );

    if( $S == 0 ) {
        $r = $L * 255;
        $g = $L * 255;
        $b = $L * 255;
    } else {

        if($L<0.5) {
            $var_2 = $L*(1+$S);
        } else {
            $var_2 = ($L+$S) - ($S*$L);
        }

        $var_1 = 2 * $L - $var_2;

        $r = round(255 * mts_huetorgb( $var_1, $var_2, $H + (1/3) ));
        $g = round(255 * mts_huetorgb( $var_1, $var_2, $H ));
        $b = round(255 * mts_huetorgb( $var_1, $var_2, $H - (1/3) ));
    }

    // Convert to hex
    $r = dechex($r);
    $g = dechex($g);
    $b = dechex($b);

    // Make sure we get 2 digits for decimals
    $r = (strlen("".$r)===1) ? "0".$r:$r;
    $g = (strlen("".$g)===1) ? "0".$g:$g;
    $b = (strlen("".$b)===1) ? "0".$b:$b;

    return $r.$g.$b;
}

function mts_huetorgb( $v1,$v2,$vH ) {
    if( $vH < 0 ) {
        $vH += 1;
    }

    if( $vH > 1 ) {
        $vH -= 1;
    }

    if( (6*$vH) < 1 ) {
           return ($v1 + ($v2 - $v1) * 6 * $vH);
    }

    if( (2*$vH) < 1 ) {
        return $v2;
    }

    if( (3*$vH) < 2 ) {
        return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
    }

    return $v1;

}

function mts_check_hex_color( $hex ) {
    // Strip # sign is present
    $color = str_replace("#", "", $hex);

    // Make sure it's 6 digits
    if( strlen($color) == 3 ) {
        $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
    }

    return $color;
}

// Check if color is considered light or not
function mts_is_light_color( $color ){

    $color = mts_check_hex_color( $color );

    // Calculate straight from rbg
    $r = hexdec($color[0].$color[1]);
    $g = hexdec($color[2].$color[3]);
    $b = hexdec($color[4].$color[5]);

    return ( ( $r*299 + $g*587 + $b*114 )/1000 > 130 );
}

// Darken color by given amount in %
function mts_darken_color( $color, $amount = 10 ) {

    $hsl = mts_hex_to_hsl( $color );

    // Darken
    $hsl['L'] = ( $hsl['L'] * 100 ) - $amount;
    $hsl['L'] = ( $hsl['L'] < 0 ) ? 0 : $hsl['L']/100;

    // Return as HEX
    return mts_hsl_to_hex($hsl);
}

// Lighten color by given amount in %
function mts_lighten_color( $color, $amount = 10 ) {

    $hsl = mts_hex_to_hsl( $color );

    // Lighten
    $hsl['L'] = ( $hsl['L'] * 100 ) + $amount;
    $hsl['L'] = ( $hsl['L'] > 100 ) ? 1 : $hsl['L']/100;

    // Return as HEX
    return mts_hsl_to_hex($hsl);
}

/*-----------------------------------------------------------------------------------*/
/*  WP Mega Menu
/*-----------------------------------------------------------------------------------*/
/* Thumb Size */
function megamenu_thumbnails( $thumbnail_html, $post_id ) {
    $thumbnail_html = '<div class="wpmm-thumbnail">';
    $thumbnail_html .= '<a title="'.get_the_title( $post_id ).'" href="'.get_permalink( $post_id ).'">';
    if(has_post_thumbnail($post_id)):
        $thumbnail_html .= get_the_post_thumbnail($post_id, 'widgetfull', array('title' => ''));
    endif;
    $thumbnail_html .= '</a>';
    
    // WP Review
    $thumbnail_html .= (function_exists('wp_review_show_total') ? wp_review_show_total(false) : '');
    
    $thumbnail_html .= '</div>';

    return $thumbnail_html;
}
add_filter( 'wpmm_thumbnail_html', 'megamenu_thumbnails', 10, 2 );

/* Parent Class */
function megamenu_parent_element( $selector ) {
    return '.main-header .container';
}
add_filter( 'wpmm_container_selector', 'megamenu_parent_element' );

/*-----------------------------------------------------------------------------------*/
/*  Theme Options Section Settings
/*-----------------------------------------------------------------------------------*/

function home_page_sections () {
    $mts_options = get_option( MTS_THEME_NAME );

    $custom_css = "";
    // Slider/Intro section
    $overview_bg = '';
    if ( !empty($mts_options['mts_slider_bg_image']) ) {
        $overview_bg = $mts_options['mts_slider_bg_image'];
    }

    elseif( !empty( $mts_options['mts_slider_bg_pattern'] ) ) {
        $overview_bg = get_template_directory_uri().'/images/'.$mts_options['mts_slider_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_slider_bg_color']) ) {
        $custom_css .= "section#intro{background-color:{$mts_options['mts_slider_bg_color']};}";
    }

    if ( !empty($mts_options['mts_slider_bg_image']) ) {
        $custom_css .= "section#intro{background-image: url( {$overview_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    }
    else {
        $custom_css .= "section#intro{background-image: url( {$overview_bg} );}";
    }

    // Services section
    $services_bg = '';
    if ( !empty($mts_options['mts_services_bg_image']) ) {
        $services_bg = $mts_options['mts_services_bg_image'];
    }

    elseif( !empty( $mts_options['mts_services_bg_pattern'] ) ) {
        $services_bg = get_template_directory_uri().'/images/'.$mts_options['mts_services_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_services_bg_color']) ) {
        $custom_css .= "section#services {background-color:{$mts_options['mts_services_bg_color']};}";
    }

    if ( !empty($mts_options['mts_services_bg_image']) ) {
        $custom_css .= "section#services{background-image: url( {$services_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    }
    else {
        $custom_css .= "section#services{background-image: url( {$services_bg} );}";
    }

    

    // Features section
    $features_bg = '';
    if ( !empty($mts_options['mts_feature_image']) ) {
        $features_bg = $mts_options['mts_feature_image'];
    }

    elseif( !empty( $mts_options['mts_feature_bg_pattern'] ) ) {
        $features_bg = get_template_directory_uri().'/images/'.$mts_options['mts_feature_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_feature_bg_color']) ) {
        $custom_css .= "section#features{background-color:{$mts_options['mts_feature_bg_color']};}";
    }

    if ( !empty($mts_options['mts_feature_image']) ) {
        $custom_css .= "section#features{background-image: url( {$features_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#features{background-image: url( {$features_bg} );}";
    }
    
    // Our Work section
    $work_bg = '';
    if ( !empty($mts_options['mts_work_bg_image']) ) {
        $work_bg = $mts_options['mts_work_bg_image'];
    }

    elseif( !empty( $mts_options['mts_work_bg_pattern'] ) ) {
        $work_bg = get_template_directory_uri().'/images/'.$mts_options['mts_work_bg_pattern'].'.png';
    }

     if ( !empty($mts_options['mts_work_bg_color']) ) {
        $custom_css .= "section#ourworks{background-color:{$mts_options['mts_work_bg_color']};}";
    }

    if ( !empty($mts_options['mts_work_bg_image']) ) {
        $custom_css .= "section#ourworks{background-image: url( {$work_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#ourworks{background-image: url( {$work_bg} );}";
    }

    // Experience section
    $exp_bg = '';
    if ( !empty($mts_options['mts_exp_bg_image']) ) {
        $exp_bg = $mts_options['mts_exp_bg_image'];
    } elseif( !empty( $mts_options['mts_exp_bg_pattern'] ) ) {
        $exp_bg = get_template_directory_uri().'/images/'.$mts_options['mts_exp_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_exp_bg_color']) ) {
        $custom_css .= "section#experience{background-color:{$mts_options['mts_exp_bg_color']};}";
    }

    if ( !empty($mts_options['mts_exp_bg_image']) ) {
        $custom_css .= "section#experience{background-image: url( {$exp_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#experience{background-image: url( {$exp_bg} );}";
    }

    // Subscription section
    $sub_bg = '';
    if ( !empty($mts_options['mts_sub_bg_image']) ) {
        $sub_bg = $mts_options['mts_sub_bg_image'];
    } elseif( !empty( $mts_options['mts_sub_bg_pattern'] ) ) {
        $sub_bg = get_template_directory_uri().'/images/'.$mts_options['mts_sub_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_sub_bg_color']) ) {
        $custom_css .= "section#subscription{background-color:{$mts_options['mts_sub_bg_color']};}";
    }

    if ( !empty($mts_options['mts_sub_bg_image']) ) {
        $custom_css .= "section#subscription{background-image: url( {$sub_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#subscription{background-image: url( {$sub_bg} );}";
    }

    // Statistics section
    $stats_bg = '';
    if ( !empty($mts_options['mts_stats_bg_image']) ) {
        $stats_bg = $mts_options['mts_stats_bg_image'];
    } elseif( !empty( $mts_options['mts_stats_bg_pattern'] ) ) {
        $stats_bg = get_template_directory_uri().'/images/'.$mts_options['mts_stats_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_stats_bg_color']) ) {
        $custom_css .= "section#statistics{background-color:{$mts_options['mts_stats_bg_color']};}";
    }

    if ( !empty($mts_options['mts_stats_bg_image']) ) {
        $custom_css .= "section#statistics{background-image: url( {$stats_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#statistics{background-image: url( {$stats_bg} );}";
    }

    // Testimonials section
    $test_bg = '';
    if ( !empty($mts_options['mts_testimonials_bg_image']) ) {
        $test_bg = $mts_options['mts_testimonials_bg_image'];
    } elseif( !empty( $mts_options['mts_testimonials_bg_pattern'] ) ) {
        $test_bg = get_template_directory_uri().'/images/'.$mts_options['mts_testimonials_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_testimonials_bg_color']) ) {
        $custom_css .= "section#testimonials{background-color:{$mts_options['mts_testimonials_bg_color']};}";
    }

    if ( !empty($mts_options['mts_testimonials_bg_image']) ) {
        $custom_css .= "section#testimonials{background-image: url( {$test_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#testimonials{background-image: url( {$test_bg} );}";
    }

    // Buttons section
    $buttons_bg = '';
    if ( !empty($mts_options['mts_buttons_bg_image']) ) {
        $buttons_bg = $mts_options['mts_buttons_bg_image'];
    }elseif( !empty( $mts_options['mts_buttons_bg_pattern'] ) ) {
        $buttons_bg = get_template_directory_uri().'/images/'.$mts_options['mts_buttons_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_buttons_bg_color']) ) {
        $custom_css .= "section#buttons{background-color:{$mts_options['mts_buttons_bg_color']};}";
    }

    if ( !empty($mts_options['mts_buttons_bg_image']) ) {
        $custom_css .= "section#buttons{background-image: url( {$buttons_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#buttons{background-image: url( {$buttons_bg} );}";
    }

    // App Screenshots section
    $screenshots_bg = '';
    if ( !empty($mts_options['mts_screenshot_bg_image']) ) {
        $screenshots_bg = $mts_options['mts_screenshot_bg_image'];
    } elseif( !empty( $mts_options['mts_screenshot_bg_pattern'] ) ) {
        $screenshots_bg = get_template_directory_uri().'/images/'.$mts_options['mts_screenshot_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_screenshot_bg_color']) ) {
        $custom_css .= "section#screenshot{background-color:{$mts_options['mts_screenshot_bg_color']};}";
    }

    if ( !empty($mts_options['mts_screenshot_bg_image']) ) {
        $custom_css .= "section#screenshot{background-image: url( {$screenshots_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#screenshot{background-image: url( {$screenshots_bg} );}";
    }

    // App Features section
    $appfeatures_bg = '';
    if ( !empty($mts_options['mts_app_feature_bg_image']) ) {
        $appfeatures_bg = $mts_options['mts_app_feature_bg_image'];
    } elseif( !empty( $mts_options['mts_app_feature_bg_pattern'] ) ) {
        $appfeatures_bg = get_template_directory_uri().'/images/'.$mts_options['mts_app_feature_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_app_feature_bg_color']) ) {
        $custom_css .= "section#app-features, #app-features .services:hover{background-color:{$mts_options['mts_app_feature_bg_color']};}";
    }

    if ( !empty($mts_options['mts_app_feature_bg_image']) ) {
        $custom_css .= "section#app-features{background-image: url( {$appfeatures_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#app-features{background-image: url( {$appfeatures_bg} );}";
    }

    if ( !empty($mts_options['mts_app_single_feature_bg_color']) ) {
        $custom_css .= "#app-features .services {background-color:{$mts_options['mts_app_single_feature_bg_color']};}";
    }

    // Overview section
    $overview_bg = '';
    if ( !empty($mts_options['mts_overview_bg_image']) ) {
        $overview_bg = $mts_options['mts_overview_bg_image'];
    } elseif( !empty( $mts_options['mts_overview_bg_pattern'] ) ) {
        $overview_bg = get_template_directory_uri().'/images/'.$mts_options['mts_overview_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_overview_bg_color']) ) {
        $custom_css .= "section#overview{background-color:{$mts_options['mts_overview_bg_color']};}";
    }

    if ( !empty($mts_options['mts_overview_bg_image']) ) {
        $custom_css .= "section#overview{background-image: url( {$overview_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#overview{background-image: url( {$overview_bg} );}";
    }

    // Team section
    $team_bg = '';
    if ( !empty($mts_options['mts_team_bg_image']) ) {
        $team_bg = $mts_options['mts_team_bg_image'];
    } elseif( !empty( $mts_options['mts_team_bg_pattern'] ) ) {
        $team_bg = get_template_directory_uri().'/images/'.$mts_options['mts_team_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_team_bg_color']) ) {
        $custom_css .= "section#ourteam{background-color:{$mts_options['mts_team_bg_color']};}";
    }

    if ( !empty($mts_options['mts_team_bg_image']) ) {
        $custom_css .= "section#ourteam{background-image: url( {$team_bg} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#ourteam{background-image: url( {$team_bg} );}";
    }

    // Pricing section
    $price = '';
    if ( !empty($mts_options['mts_pricing_bg_image']) ) {
        $price = $mts_options['mts_pricing_bg_image'];
    } elseif( !empty( $mts_options['mts_pricing_bg_pattern'] ) ) {
        $price = get_template_directory_uri().'/images/'.$mts_options['mts_pricing_bg_pattern'].'.png';
    }

    if ( !empty($mts_options['mts_pricing_bg_color']) ) {
        $custom_css .= "section#pricing{background-color:{$mts_options['mts_pricing_bg_color']};}";
    }

    if ( !empty($mts_options['mts_team_bg_image']) ) {
        $custom_css .= "section#pricing{background-image: url( {$price} );
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom center;}";
    } else {
        $custom_css .= "section#pricing{background-image: url( {$price} );}";
    }

    // Contact section
    $contact_bg = '';

    if( !empty( $mts_options['mts_contact_bg_pattern'] ) ) {
        $contact_bg = get_template_directory_uri().'/images/'.$mts_options['mts_contact_bg_pattern'].'.png';
    }

    return $custom_css;
}

// remove parenthesis from categories
function categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','categories_postcount_filter');

function archive_postcount_filter ($variable) {
   $variable = str_replace('(', ' ', $variable);
   $variable = str_replace(')', ' ', $variable);
   return $variable;
}
add_filter('get_archives_link', 'archive_postcount_filter');

/*-----------------------------------------------------------------------------------*/
/*  Create portfolio post type
/*-----------------------------------------------------------------------------------*/
function mts_portfolio_register() {

    $args = array(
        'label' => __('Projects', 'mythemeshop'),
        'singular_label' => __('Project', 'mythemeshop'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => false,
        'publicly_queryable' => true,
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-id',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array("slug" => "portfolio"), // Permalinks format
    );

    register_post_type( 'portfolio' , $args );
}

add_action('init', 'mts_portfolio_register');

function mts_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mts_rewrite_flush' );

// Transfer widgets & menus settings, as the theme folder is prefixed with mts_ in v1.1.6
add_action('after_switch_theme', 'mts_transfer_corporate_theme_mods');
function mts_transfer_corporate_theme_mods () {
    if ( false !== get_option( 'theme_mods_corporate' ) ) {
        $theme_mods = get_option( 'theme_mods_corporate' );
        update_option( 'theme_mods_mts_corporate', $theme_mods );
        delete_option( 'theme_mods_corporate' );//delete old theme mods

        delete_site_transient('update_themes'); // maybe not needed
    }
}