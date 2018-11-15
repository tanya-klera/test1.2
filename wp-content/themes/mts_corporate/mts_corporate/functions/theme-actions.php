<?php
$mts_options = get_option(MTS_THEME_NAME);
/*------------[ Meta ]-------------*/
if ( ! function_exists( 'mts_meta' ) ) {
	function mts_meta(){
	global $mts_options, $post;

    $mts_favicon = ( $mts_options['mts_favicon'] != '' ) ? $mts_options['mts_favicon'] : get_template_directory_uri().'/images/favicon.png';
?>
<link rel="icon" href="<?php echo $mts_favicon; ?>" type="image/x-icon" />
<!--iOS/android/handheld specific -->
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php if($mts_options['mts_prefetching'] == '1') { ?>
<?php if (is_front_page()) { ?>
	<?php $my_query = new WP_Query('posts_per_page=1'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<link rel="prefetch" href="<?php the_permalink(); ?>">
	<link rel="prerender" href="<?php the_permalink(); ?>">
	<?php endwhile; wp_reset_query(); ?>
<?php } elseif (is_singular()) { ?>
	<link rel="prefetch" href="<?php echo home_url(); ?>">
	<link rel="prerender" href="<?php echo home_url(); ?>">
<?php } ?>
<?php } ?>
    <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>" />
    <meta itemprop="url" content="<?php echo site_url(); ?>" />
    <?php if ( is_singular() ) { ?>
    <meta itemprop="creator accountablePerson" content="<?php $user_info = get_userdata($post->post_author); echo $user_info->first_name.' '.$user_info->last_name; ?>" />
    <?php } ?>
<?php }
}

/*------------[ Head ]-------------*/
if ( ! function_exists( 'mts_head' ) ){
	function mts_head() {
	global $mts_options
?>
<?php echo $mts_options['mts_header_code']; ?>
<?php }
}
add_action('wp_head', 'mts_head');

/*------------[ Copyrights ]-------------*/
if ( ! function_exists( 'mts_copyrights_credit' ) ) {
	function mts_copyrights_credit() {
	global $mts_options
?>
<!--start copyrights-->
<div class="row" id="copyright-note">
    <div class="copyright-footer"> <?php echo date("Y") ?> &copy; <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" rel="nofollow"><?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'mythemeshop'); ?> &nbsp;<?php echo $mts_options['mts_copyrights']; ?></a></div>
    <?php if ( !empty($mts_options['mts_header_social']) && is_array($mts_options['mts_header_social']) && !empty($mts_options['mts_social_icon_head'])) { ?>
        <div class="footer-social">
            <?php foreach( $mts_options['mts_header_social'] as $header_icons ) : ?>
                <?php if( ! empty( $header_icons['mts_header_icon'] ) && isset( $header_icons['mts_header_icon'] ) ) : ?>
                    <a href="<?php print $header_icons['mts_header_icon_link'] ?>" class="header-<?php print $header_icons['mts_header_icon'] ?>"><span class="fa fa-<?php print $header_icons['mts_header_icon'] ?>"></span></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php } ?>

</div>
<!--end copyrights-->
<?php }
}

/*------------[ footer ]-------------*/
if ( ! function_exists( 'mts_footer' ) ) {
	function mts_footer() {
	global $mts_options
?>
<?php if ($mts_options['mts_analytics_code'] != '') { ?>
<!--start footer code-->
<?php echo $mts_options['mts_analytics_code']; ?>
<!--end footer code-->
<?php } ?>
<?php }
}

/*------------[ breadcrumb ]-------------*/
if (!function_exists('mts_the_breadcrumb')) {
    function mts_the_breadcrumb() {
    	echo '<div><i class="fa fa-home"></i></div> <div typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
        echo home_url();
        echo '" rel="nofollow">'.sprintf( __( "Home","mythemeshop"));
        echo '</a></div><div><i class="fa fa-caret-right"></i></div>';
        if (is_category() || is_single()) {
            $categories = get_the_category();
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    echo '<div typeof="v:Breadcrumb"><a href="'.get_category_link( $category->term_id ).'" rel="v:url" property="v:title">'.$category->cat_name.'</a></div><div><i class="fa fa-caret-right"></i></div>';
                }
            }
            if (is_single()) {
                echo "<div><span>";
                the_title();
                echo "</span></div>";
            }
        } elseif (is_page()) {
            echo "<div><span>";
            the_title();
            echo "</span></div>";
        }
    }
}

/*------------[ schema.org-enabled the_category() and the_tags() ]-------------*/
function mts_the_category( $separator = ', ' ) {
    $categories = get_the_category();
    $count = count($categories);
    foreach ( $categories as $i => $category ) {
        echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'mythemeshop' ), $category->name ) . '" ' . ' itemprop="articleSection">' . $category->name.'</a>';
        if ( $i < $count - 1 )
            echo $separator;
    }
}
function mts_the_tags($before = null, $sep = ', ', $after = '') {
    if ( null === $before )
        $before = __('Tags: ', 'mythemeshop');

    $tags = get_the_tags();
    if (empty( $tags ) || is_wp_error( $tags ) ) {
        return;
    }
    $tag_links = array();
    foreach ($tags as $tag) {
        $link = get_tag_link($tag->term_id);
        $tag_links[] = '<a href="' . esc_url( $link ) . '" rel="tag" itemprop="keywords">' . $tag->name . '</a>';
    }
    echo $before.join($sep, $tag_links).$after;
}

/*------------[ pagination ]-------------*/
if (!function_exists('mts_pagination')) {
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
                echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i> ".__('First','mythemeshop')."</a></li>";
            if($paged > 1 && $showitems < $pages)
                echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive'><i class='fa fa-angle-left'></i> ".__('Previous','mythemeshop')."</a></li>";
            for ($i=1; $i <= $pages; $i++){
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                    echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
                }
            }
            if ($paged < $pages && $showitems < $pages)
                echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive'>".__('Next','mythemeshop')." <i class='fa fa-angle-right'></i></a></li>";
            if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
                echo "<li><a rel='nofollow' class='inactive' href='".get_pagenum_link($pages)."'>".__('Last','mythemeshop')." <i class='fa fa-angle-double-right'></i></a></li>";
                echo "</ul></div>";
        }
    }
}

/*------------[ Related Posts ]-------------*/
if (!function_exists('mts_related_posts')) {
    function mts_related_posts() {
        global $post;
        $mts_options = get_option(MTS_THEME_NAME);
        //if(!empty($mts_options['mts_related_posts'])) { ?>
    		<!-- Start Related Posts -->
    		<?php
            $empty_taxonomy = false;
            if (empty($mts_options['mts_related_posts_taxonomy']) || $mts_options['mts_related_posts_taxonomy'] == 'tags') {
                // related posts based on tags
                $tags = get_the_tags($post->ID);
                if (empty($tags)) {
                    $empty_taxonomy = true;
                } else {
                    $tag_ids = array();
                    foreach($tags as $individual_tag) {
                        $tag_ids[] = $individual_tag->term_id;
                    }
                    $args = array( 'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => $mts_options['mts_related_postsnum'],
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'rand'
                    );
                }
             } else {
                // related posts based on categories
                $categories = get_the_category($post->ID);
                if (empty($categories)) {
                    $empty_taxonomy = true;
                } else {
                    $category_ids = array();
                    foreach($categories as $individual_category)
                        $category_ids[] = $individual_category->term_id;
                    $args = array( 'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => $mts_options['mts_related_postsnum'],
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'rand'
                    );
                }
             }
            if (!$empty_taxonomy) {
    		$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
    			echo '<div class="related-posts">';
                echo '<h4>'.__('Related Posts','mythemeshop').'</h4>';
                echo '<div class="clear">';
                $posts_per_row = 3;
                $j = 0;
    			while( $my_query->have_posts() ) { $my_query->the_post(); ?>
    			<article class="latestPost excerpt  <?php echo (++$j % $posts_per_row == 0) ? 'last' : ''; ?>">
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
                        <?php if(has_post_thumbnail()) { ?>
                            <div class="featured-thumb">
                                <?php
                                $post_id = get_the_ID(); $blog_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
                                $blog_image = $blog_image[0];
                                $blog_image_url = bfi_thumb( $blog_image, array( 'width' => '80', 'height' => '80', 'crop' => true ) );
                                echo '<img src="'.$blog_image_url.'" class="wp-post-image">';  ?>
                            </div>
                        <?php } ?>
                    </a>
					<header>
						<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					</header>
                </article><!--.post.excerpt-->
    			<?php } echo '</div></div>'; }} wp_reset_query(); ?>
    		<!-- .related-posts -->
    	<?php //}
    }
}


if ( ! function_exists('mts_the_postinfo' ) ) {
    function mts_the_postinfo( $section = 'home' ) {
        $mts_options = get_option( MTS_THEME_NAME );
        $opt_key = 'mts_'.$section.'_headline_meta_info';

        if ( isset( $mts_options[ $opt_key ] ) && is_array( $mts_options[ $opt_key ] ) && array_key_exists( 'enabled', $mts_options[ $opt_key ] ) ) {
            $headline_meta_info = $mts_options[ $opt_key ]['enabled'];
        } else {
            $headline_meta_info = array();
        }
        if ( !isset( $headline_meta_info['date'] ) ) { // datePublished is reqired in schema ?>
            <meta itemprop="datePublished" content="<?php the_time( get_option( 'date_format' ) ); ?>">
        <?php
        }
        if ( ! empty( $headline_meta_info ) ) { ?>
			<div class="post-info">
                <?php foreach( $headline_meta_info as $key => $meta ) { mts_the_postinfo_item( $key ); } ?>
			</div>
		<?php }
    }
}
if ( ! function_exists('mts_the_postinfo_item' ) ) {
    function mts_the_postinfo_item( $item ) {
        switch ( $item ) {
            case 'author':
            ?>
                <span class="theauthor">BY <span itemprop="author"><?php the_author_posts_link(); ?></span></span>
            <?php
            break;
            case 'date':
            ?>
                <span class="thetime updated"><span itemprop="datePublished"><?php the_time( get_option( 'date_format' ) ); ?></span></span>
            <?php
            break;
            case 'category':
            ?>
                <span class="thecategory"> <?php mts_the_category(', ') ?></span>
            <?php
            break;
            case 'comment':
            ?>
                <span class="thecomment"> <a rel="nofollow" href="<?php comments_link(); ?>" itemprop="interactionCount"><?php echo comments_number();?></a></span>
            <?php
            break;
        }
    }
}

if (!function_exists('mts_social_buttons')) {
    function mts_social_buttons() {
        $mts_options = get_option( MTS_THEME_NAME );

        if ( isset( $mts_options['mts_social_buttons'] ) && is_array( $mts_options['mts_social_buttons'] ) && array_key_exists( 'enabled', $mts_options['mts_social_buttons'] ) ) {
            $buttons = $mts_options['mts_social_buttons']['enabled'];
        } else {
            $buttons = array();
        }

        if ( ! empty( $buttons ) ) {
        ?>
    		<!-- Start Share Buttons -->
    		<div class="shareit <?php echo $mts_options['mts_social_button_position']; ?>">
                <?php foreach( $buttons as $key => $button ) { mts_social_button( $key ); } ?>
    		</div>
    		<!-- end Share Buttons -->
    	<?php
        }
    }
}

if ( ! function_exists('mts_social_button' ) ) {
    function mts_social_button( $button ) {
        $mts_options = get_option( MTS_THEME_NAME );
        switch ( $button ) {
            case 'twitter':
            ?>
                <!-- Twitter -->
                <span class="share-item twitterbtn">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo $mts_options['mts_twitter_username']; ?>">Tweet</a>
                </span>
            <?php
            break;
            case 'gplus':
            ?>
                <!-- GPlus -->
                <span class="share-item gplusbtn">
                    <g:plusone size="medium"></g:plusone>
                </span>
            <?php
            break;
            case 'facebook':
            ?>
                <!-- Facebook -->
                <span class="share-item facebookbtn">
                    <div id="fb-root"></div>
                    <div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
                </span>
            <?php
            break;
            case 'pinterest':
                global $post;
            ?>
                <!-- Pinterest -->
                <span class="share-item pinbtn">
                    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
                </span>
            <?php
            break;
            case 'linkedin':
            ?>
                <!--Linkedin -->
                <span class="share-item linkedinbtn">
                    <script type="IN/Share" data-url="<?php get_permalink(); ?>"></script>
                </span>
            <?php
            break;
            case 'stumble':
            ?>
                <!-- Stumble -->
                <span class="share-item stumblebtn">
                    <su:badge layout="1"></su:badge>
                </span>
            <?php
            break;
        }
    }
}

/*------------[ Class attribute for <article> element ]-------------*/
if ( ! function_exists( 'mts_article_class' ) ) {
    function mts_article_class() {
        $mts_options = get_option( MTS_THEME_NAME );
        $class = '';
        
        // sidebar or full width
        if ( mts_custom_sidebar() == 'mts_nosidebar' ) {
            $class = 'ss-full-width';
        } else {
            $class = 'article';
        }
        
        return $class;
    }
}

?>