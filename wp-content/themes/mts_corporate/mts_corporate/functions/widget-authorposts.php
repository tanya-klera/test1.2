<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: MyThemeShop Author Posts
	Version: 2.0
	
-----------------------------------------------------------------------------------*/


class mts_author_posts_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'mts_author_posts_widget',
			__('MyThemeShop: Author Posts','mythemeshop'),
			array( 'description' => __( 'Display other posts written by the author of the current post. Will appear on single posts only.','mythemeshop' ) )
		);
	}

 	public function form( $instance ) {
		$defaults = array(
			'comment_num' => 1,
			'date' => 1,
			'show_thumb7' => 1,
			'show_excerpt' => 0,
			'excerpt_length' => 10
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Author Posts','mythemeshop' );
		$qty = isset( $instance[ 'qty' ] ) ? esc_attr( $instance[ 'qty' ] ) : 5;
		$comment_num = isset( $instance[ 'comment_num' ] ) ? esc_attr( $instance[ 'comment_num' ] ) : 1;
		$date = isset( $instance[ 'date' ] ) ? esc_attr( $instance[ 'date' ] ) : 1;
		$show_thumb7 = isset( $instance[ 'show_thumb7' ] ) ? esc_attr( $instance[ 'show_thumb7' ] ) : 1;
		$show_excerpt = isset( $instance[ 'show_excerpt' ] ) ? esc_attr( $instance[ 'show_excerpt' ] ) : 1;
		$excerpt_length = isset( $instance[ 'excerpt_length' ] ) ? intval( $instance[ 'excerpt_length' ] ) : 10;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','mythemeshop' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php _e( 'Number of Posts to show','mythemeshop' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'qty' ); ?>" name="<?php echo $this->get_field_name( 'qty' ); ?>" type="number" min="1" step="1" value="<?php echo $qty; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_thumb7"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb7"); ?>" name="<?php echo $this->get_field_name("show_thumb7"); ?>" value="1" <?php if (isset($instance['show_thumb7'])) { checked( 1, $instance['show_thumb7'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("date"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>" value="1" <?php checked( 1, $instance['date'], true ); ?> />
				<?php _e( 'Show post date', 'mythemeshop'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("comment_num"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num"); ?>" name="<?php echo $this->get_field_name("comment_num"); ?>" value="1" <?php checked( 1, $instance['comment_num'], true ); ?> />
				<?php _e( 'Show number of comments', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_excerpt"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_excerpt"); ?>" name="<?php echo $this->get_field_name("show_excerpt"); ?>" value="1" <?php checked( 1, $instance['show_excerpt'], true ); ?> />
				<?php _e( 'Show excerpt', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
	       <label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php _e( 'Excerpt Length:', 'mythemeshop' ); ?>
	       <input id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" type="number" min="1" step="1" value="<?php echo $excerpt_length; ?>" />
	       </label>
       </p>
	   
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['qty'] = intval( $new_instance['qty'] );
		$instance['comment_num'] = intval( $new_instance['comment_num'] );
		$instance['date'] = intval( $new_instance['date'] );
		$instance['show_thumb7'] = intval( $new_instance['show_thumb7'] );
		$instance['show_excerpt'] = intval( $new_instance['show_excerpt'] );
		$instance['excerpt_length'] = intval( $new_instance['excerpt_length'] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$comment_num = $instance['comment_num'];
		$date = $instance['date'];
		$qty = (int) $instance['qty'];
		$show_thumb7 = (int) $instance['show_thumb7'];
		$show_excerpt = $instance['show_excerpt'];
		$excerpt_length = $instance['excerpt_length'];
		
		if(is_singular()){
			echo $before_widget;
			if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
			echo self::get_author_posts( $qty, $comment_num, $date, $show_thumb7, $show_excerpt, $excerpt_length );
			echo $after_widget;
		}
	}

	public function get_author_posts( $qty, $comment_num, $date, $show_thumb7, $show_excerpt, $excerpt_length ) {
	global $post;
	$thePostID = $post->ID;
    
	$posts = new WP_Query( 
		array(
			'author' => $post->author,
			'post__not_in' => array($thePostID),
			'posts_per_page' => $qty, 
			'orderby' => 'rand'
			));

		echo '<ul class="author-posts-widget">';
		while ( $posts->have_posts() ) { $posts->the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php if ( $show_thumb7 == 1 ) : ?>
				    <?php if (has_post_thumbnail()) { 
						if (has_post_thumbnail()) { 
							$post_id = get_post_thumbnail_id();
							$widget_image = wp_get_attachment_image_src( $post_id, 'full' );
							$widget_image = $widget_image[0];
							$thumbnail = bfi_thumb( $widget_image, array( 'width' => '80', 'height' => '80', 'crop' => true ) );
							echo '<img src="'.$thumbnail.'" class="wp-post-image">';
						}
					} ?>
				<?php endif; ?>
				<?php the_title(); ?>
				<div class="meta">
					<?php if ( $date == 1 ) : ?>
						<?php the_time('F j, Y'); ?>
					<?php endif; ?>
					<?php if ( $date == 1 && $comment_num == 1) : ?>
						 &bull; 
					<?php endif; ?>
					<?php if ( $comment_num == 1 ) : ?>
						<?php echo comments_number(__('No Comment','mythemeshop'), __('One Comment','mythemeshop'), '<span class="comm">%</span> '.__('Comments','mythemeshop'));?>
					<?php endif; ?>
				</div> <!--end .entry-meta-->	
			</a> 	
			<?php if ( $show_excerpt == 1 ) : ?>
				<p>
					<?php echo mts_excerpt($excerpt_length); ?>
				</p>
			<?php endif; ?>
		</li>	
		<?php }			
		echo '</ul>'."\r\n";
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "mts_author_posts_widget" );' ) );