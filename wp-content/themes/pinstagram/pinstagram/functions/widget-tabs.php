<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: MyThemeShop Tabs Widget
	Description: Display the popular Posts and Latest Posts in tabbed format
	Version: 1.0

-----------------------------------------------------------------------------------*/
class mts_Widget_Tabs extends WP_Widget {

	function mts_Widget_Tabs() {
		$widget_ops = array('classname' => 'widget_tab', 'description' => __('Display the popular Posts and Latest Posts in tabbed format', 'mythemeshop'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('tab', __('MyThemeShop: Tab Widget', 'mythemeshop'), $widget_ops, $control_ops);
	}
	
	function form( $instance ) { 
		$instance = wp_parse_args( (array) $instance, array( 'popular_post_num' => '5', 'recent_post_num' => '5', 'show_thumb4' => 1, 'show_thumb5' => 1, 'date1' => 1, 'date2' => 1, 'comment_num1' => 1, 'comment_num2' => 1) );
		$popular_post_num = $instance['popular_post_num'];
		$show_thumb4 = isset( $instance[ 'show_thumb4' ] ) ? esc_attr( $instance[ 'show_thumb4' ] ) : 1;
		$show_thumb5 = isset( $instance[ 'show_thumb5' ] ) ? esc_attr( $instance[ 'show_thumb5' ] ) : 1;
		$date1 = isset( $instance[ 'date1' ] ) ? esc_attr( $instance[ 'date1' ] ) : 1;
		$date2 = isset( $instance[ 'date2' ] ) ? esc_attr( $instance[ 'date2' ] ) : 1;
		$comment_num1 = isset( $instance[ 'comment_num1' ] ) ? esc_attr( $instance[ 'comment_num1' ] ) : 1;
		$comment_num2 = isset( $instance[ 'comment_num2' ] ) ? esc_attr( $instance[ 'comment_num2' ] ) : 1;
		$recent_post_num = format_to_edit($instance['recent_post_num']);
	?>
		<p><label for="<?php echo $this->get_field_id('popular_post_num'); ?>"><?php _e('Number of popular posts to show:', 'mythemeshop'); ?></label>
		<input id="<?php echo $this->get_field_id('popular_post_num'); ?>" name="<?php echo $this->get_field_name('popular_post_num'); ?>" type="number" min="1" step="1" value="<?php echo $popular_post_num; ?>" /></p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_thumb4"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb4"); ?>" name="<?php echo $this->get_field_name("show_thumb4"); ?>" value="1" <?php if (isset($instance['show_thumb4'])) { checked( 1, $instance['show_thumb4'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("date1"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date1"); ?>" name="<?php echo $this->get_field_name("date1"); ?>" value="1" <?php if (isset($instance['date1'])) { checked( 1, $instance['date1'], true ); } ?> />
				<?php _e( 'Show Date', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("comment_num1"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num1"); ?>" name="<?php echo $this->get_field_name("comment_num1"); ?>" value="1" <?php if (isset($instance['comment_num1'])) { checked( 1, $instance['comment_num1'], true ); } ?> />
				<?php _e( 'Show number of comments', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('recent_post_num'); ?>"><?php _e('Number of latest posts to show:', 'mythemeshop'); ?></label>
		<input type="number" min="1" step="1" id="<?php echo $this->get_field_id('recent_post_num'); ?>" name="<?php echo $this->get_field_name('recent_post_num'); ?>" value="<?php echo $recent_post_num; ?>" /></p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_thumb5"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb5"); ?>" name="<?php echo $this->get_field_name("show_thumb5"); ?>" value="1" <?php if (isset($instance['show_thumb5'])) { checked( 1, $instance['show_thumb5'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("date2"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date2"); ?>" name="<?php echo $this->get_field_name("date2"); ?>" value="1" <?php if (isset($instance['date2'])) { checked( 1, $instance['date2'], true ); } ?> />
				<?php _e( 'Show Date', 'mythemeshop'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("comment_num2"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num2"); ?>" name="<?php echo $this->get_field_name("comment_num2"); ?>" value="1" <?php if (isset($instance['comment_num2'])) { checked( 1, $instance['comment_num2'], true ); } ?> />
				<?php _e( 'Show number of comments', 'mythemeshop'); ?>
			</label>
		</p>

	<?php }
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['popular_post_num'] = $new_instance['popular_post_num'];
		$instance['recent_post_num'] =  $new_instance['recent_post_num'];
		$instance['show_thumb4'] = $new_instance['show_thumb4'];
		$instance['show_thumb5'] = $new_instance['show_thumb5'];
		$instance['date1'] = $new_instance['date1'];
		$instance['date2'] = $new_instance['date2'];
		$instance['comment_num1'] = $new_instance['comment_num1'];
		$instance['comment_num2'] = $new_instance['comment_num2'];
		return $instance;
	}
	
	function widget( $args, $instance ) {
		extract($args);
		$popular_post_num = $instance['popular_post_num'];
		$recent_post_num = $instance['recent_post_num'];
		$show_thumb4 = $instance['show_thumb4'];
		$show_thumb5 = $instance['show_thumb5'];
		$date1 = $instance['date1'];
		$date2 = $instance['date2'];
		$comment_num1 = $instance['comment_num1'];
		$comment_num2 = $instance['comment_num2'];
		?>
		
<?php echo $before_widget; ?>
	<div id="tabber">	
		<ul class="tabs">
			<li><a href="#popular-posts"><?php _e('Popular Posts', 'mythemeshop'); ?></a></li>
			<li class="tab-recent-posts"><a href="#recent-posts"><?php _e('Recent Posts', 'mythemeshop'); ?></a></li>
		</ul> <!--end .tabs-->
		<div class="clear"></div>
		<div class="inside">
			<div id="popular-posts">
				<ul>
					<?php rewind_posts(); ?>
					<?php $popular = new WP_Query( array('ignore_sticky_posts' => 1, 'showposts' => $popular_post_num, 'orderby' => 'comment_count', 'order' => 'desc')); while ($popular->have_posts()) : $popular->the_post(); ?>
					<?php if($popular_post_num != 1){echo '';} ?>
						<li>
							<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
								<?php if ( $show_thumb4 == 1 ) : ?>
									<div class="left">
										<?php if(has_post_thumbnail()): ?>
											<?php the_post_thumbnail('widgetthumb',array('title' => '')); ?>
										<?php else: ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/smallthumb.png" alt="<?php the_title(); ?>"  class="wp-post-image" />
										<?php endif; ?>
										<div class="clear"></div>
									</div>
								<?php endif; ?>
								<p class="entry-title"><?php the_title(); ?></p>
							</a>
							<?php if ( $date1 == 1 || $comment_num1 == 1) : ?>
								<div class="meta">
									<?php if ( $date1 == 1 ) : ?>
										<?php the_time('F j, Y'); ?>
									<?php endif; ?>
									<?php if ( $date1 == 1 && $comment_num1 == 1) : ?>
										 &bull; 
									<?php endif; ?>
									<?php if ( $comment_num1 == 1 ) : ?>
										<?php echo comments_number(__('No Comment','mythemeshop'), __('One Comment','mythemeshop'), '<span class="comm">%</span> '.__('Comments','mythemeshop'));?>
									<?php endif; ?>
								</div> <!--end .entry-meta--> 
							<?php endif; ?>
							<div class="clear"></div>
						</li>
					<?php $popular_post_num++; endwhile; wp_reset_query(); ?>
				</ul>			
		    </div> <!--end #popular-posts-->
		       
		    <div id="recent-posts"> 
		        <ul>
					<?php $the_query = new WP_Query('showposts='. $recent_post_num .'&orderby=post_date&order=desc'); while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<li>
							<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
								<?php if ( $show_thumb4 == 1 ) : ?>
									<div class="left">
										<?php if(has_post_thumbnail()): ?>
											<?php the_post_thumbnail('widgetthumb',array('title' => '')); ?>
										<?php else: ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/smallthumb.png" alt="<?php the_title(); ?>"  class="wp-post-image" />
										<?php endif; ?>
										<div class="clear"></div>
									</div>
								<?php endif; ?>
								<p class="entry-title"><?php the_title(); ?></p>
							</a>
							<?php if ( $date1 == 1 || $comment_num1 == 1) : ?>
								<div class="meta">
									<?php if ( $date1 == 1 ) : ?>
										<?php the_time('F j, Y'); ?>
									<?php endif; ?>
									<?php if ( $date1 == 1 && $comment_num1 == 1) : ?>
										 &bull; 
									<?php endif; ?>
									<?php if ( $comment_num1 == 1 ) : ?>
										<?php echo comments_number(__('No Comment','mythemeshop'), __('One Comment','mythemeshop'), '<span class="comm">%</span> '.__('Comments','mythemeshop'));?>
									<?php endif; ?>
								</div> <!--end .entry-meta--> 
							<?php endif; ?>
							<div class="clear"></div>
						</li>
					<?php $recent_post_num++; endwhile; wp_reset_query(); ?>                      
				</ul>	
		    </div> <!--end #recent-posts-->
			
			<div class="clear"></div>
		</div> <!--end .inside -->
		<div class="clear"></div>
	</div><!--end #tabber -->
<?php echo $after_widget; ?>

<?php }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "mts_Widget_Tabs" );' ) );
?>