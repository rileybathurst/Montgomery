<?php

/**
 * Adds Port Posts widget.
 */
class Port_Posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'port_posts', // Base ID
			__( 'Port Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portfolio page base unit', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        
        if ( ! empty( $instance['port_posts_cat'] ) ) {
            
        ?>

            <div class="row">
                <div class="small-12 large-3 columns"><!-- title -->
                    <h2 class="category-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>?cat=<?php echo $instance['port_posts_cat'] ; ?>"><?php echo (get_category( $instance['port_posts_cat'] )->name); ?></a></h2>
                    <p><?php echo (get_category( $instance['port_posts_cat'] )->description); ?></p>
                    
                    <!-- more print large up -->
                    <div class="show-for-large-up">
                        <hr>
                        <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>?cat=<?php echo $instance['port_posts_cat'] ; ?>" class="push">More <?php echo (get_category( $instance['port_posts_cat'] )->name); ?></a></p>
                        <hr>
                    </div>

                </div>
                    
                <?php
    
                    // The Query
                    $the_query = new WP_Query( 'cat='. $instance['port_posts_cat'] );

                    // The Loop
                    if ( $the_query->have_posts() ) {

                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); ?>

                                    <div class="small-12 large-9 columns">
                                        <?php the_content(); ?>
                                    </div>

                        <?php
                        }

                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata(); 

                    ?>

            </div>
            
        <?php
        }
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// From twenty Sixteen
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin
		$instance = wp_parse_args( ( array ) $instance, array(	
			'port_posts_cat'            => __( '', 'text_domain' ),
		) );
        $port_posts_cat            = $instance['port_posts_cat'];
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("port_posts_cat"), 
                                                    'selected' => $instance["port_posts_cat"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['port_posts_cat'] = ( ! empty( $new_instance['port_posts_cat'] ) ) ? strip_tags( $new_instance['port_posts_cat'] ) : '';

		return $instance;
	}

} // class Port Posts

// register port posts widget
function register_port_posts_widget() {
    register_widget( 'port_posts' );
}
add_action( 'widgets_init', 'register_port_posts_widget' );

/**
 * Adds Port Gallery widget.
 */
class Port_Gallery extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'port_gallery', // Base ID
			__( 'Port Gallery', 'text_domain' ), // Name
			array( 'description' => __( 'The portfolio gallery widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        
        if ( ! empty( $instance['port_gallery_cat'] ) ) {
            
        ?>

            <div class="row breathe-before">
                <div class="small-12 columns">	
                    <ul data-orbit>

                        <?php

                        // The Query
                        $the_query = new WP_Query( 'cat='. $instance['port_gallery_cat'] );

                        // The Loop
                        if ( $the_query->have_posts() ) {

                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); ?>

                                        <li><?php the_content(); ?></li>

                            <?php
                            }

                        } else {
                            // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata(); 

                        ?>

                    </ul>

                </div>
            </div>  
            
        <?php
        }
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// From twenty Sixteen
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin
		$instance = wp_parse_args( ( array ) $instance, array(	
			'port_gallery_cat'            => __( '', 'text_domain' ),
		) );
        $port_gallery_cat            = $instance['port_gallery_cat'];
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("port_gallery_cat"), 
                                                    'selected' => $instance["port_gallery_cat"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['port_gallery_cat'] = ( ! empty( $new_instance['port_gallery_cat'] ) ) ? strip_tags( $new_instance['port_gallery_cat'] ) : '';

		return $instance;
	}

} // class Port Posts

// register port posts widget
function register_port_gallery_widget() {
    register_widget( 'port_gallery' );
}
add_action( 'widgets_init', 'register_port_gallery_widget' );

/**
 * Adds Port Video widget.
 */
class Port_Video extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'port_video', // Base ID
			__( 'Port Video', 'text_domain' ), // Name
			array( 'description' => __( 'The portfolio video widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        
        if ( ! empty( $instance['port_video_cat'] ) ) {
            
        ?>

            <div class="row">
                <div class="small-12 columns full dark highlight">

                        <?php

                        // The Query
                        $the_query = new WP_Query( 'cat='. $instance['port_video_cat'] );

                        // The Loop
                        if ( $the_query->have_posts() ) {

                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); ?>

                                        <div class="flex-video widescreen vimeo">
                                            <?php the_content(); ?>
                                        </div>


                            <?php
                            }

                        } else {
                            // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata(); 

                        ?>

                </div>
            </div>  
            
        <?php
        }
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// From twenty Sixteen
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin
		$instance = wp_parse_args( ( array ) $instance, array(	
			'port_video_cat'            => __( '', 'text_domain' ),
		) );
        $port_gallery_cat            = $instance['port_video_cat'];
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("port_video_cat"), 
                                                    'selected' => $instance["port_video_cat"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['port_video_cat'] = ( ! empty( $new_instance['port_video_cat'] ) ) ? strip_tags( $new_instance['port_video_cat'] ) : '';

		return $instance;
	}

} // class Port Posts

// register port posts widget
function register_port_video_widget() {
    register_widget( 'port_video' );
}
add_action( 'widgets_init', 'register_port_video_widget' );

?>