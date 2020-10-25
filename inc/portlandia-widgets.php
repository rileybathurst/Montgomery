<?php
/* Portlandia */

/* Portlandia Gallery */

/* Default to the uncategorized number to be written over */
$portlandia_gallery =  1 ;

class portlandia_gallery_posts extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_gallery', // Base ID
			__( 'Portlandia Gallery', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia gallery unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_gallery;
        
        if ( ! empty( $instance['portlandia_gallery'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_gallery = $instance['portlandia_gallery'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_gallery'  => __( '', 'text_domain' ),
        ) );
        $portlandia_gallery   = $instance['portlandia_gallery']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_gallery"), 
                                                    'selected' => $instance["portlandia_gallery"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_gallery'] = ( ! empty( $new_instance['portlandia_gallery'] ) ) ? strip_tags( $new_instance['portlandia_gallery'] ) : '';

		return $instance;
	}

} // class Portlanida Gallery

// register portlandia gallery widget
function register_portlandia_gallery_widget() {
    register_widget( 'portlandia_gallery_posts' );
}
add_action( 'widgets_init', 'register_portlandia_gallery_widget' );

/* Portlandia Page */

/* Default to the sample page number to be written over */
$portlandia_page =  2 ;

class portlandia_pages extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_page', // Base ID
			__( 'Portlandia Page', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia page unit', 'text_domain' ), ) // Args
		);
	}
    
	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_page ;   
        
        if ( ! empty( $instance['portlandia_page'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_page = $instance['portlandia_page'] ; 
        }
        
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_page'  => __( '', 'text_domain' ),
        ) );
        $portlandia_page   = $instance['portlandia_page']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_pages( array( 
                    'name' => $this->get_field_name("portlandia_page") , 
                    'selected' => $instance["portlandia_page"]
                ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_page'] = ( ! empty( $new_instance['portlandia_page'] ) ) ? strip_tags( $new_instance['portlandia_page'] ) : '';

		return $instance;
	}

} // class Portlanida Pages

// register portlandia page widget
function register_portlandia_page_widget() {
    register_widget( 'portlandia_pages' );
}
add_action( 'widgets_init', 'register_portlandia_page_widget' );

/* Portlandia One */

/* Default to the uncategorized number to be written over */
$portlandia_one =  1 ;

class portlandia_one_posts extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_one', // Base ID
			__( 'Portlandia One', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia one unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_one;
        
        if ( ! empty( $instance['portlandia_one'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_one = $instance['portlandia_one'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_one'  => __( '', 'text_domain' ),
        ) );
        $portlandia_one   = $instance['portlandia_one']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_one"), 
                                                    'selected' => $instance["portlandia_one"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_one'] = ( ! empty( $new_instance['portlandia_one'] ) ) ? strip_tags( $new_instance['portlandia_one'] ) : '';

		return $instance;
	}

} // class Portlanida one

// register portlandia one widget
function register_portlandia_one_posts_widget() {
    register_widget( 'portlandia_one_posts' );
}
add_action( 'widgets_init', 'register_portlandia_one_posts_widget' );

/* Portlandia Two */

/* Default to the uncategorized number to be written over */
$portlandia_two_posts =  1 ;

class portlandia_two extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_two_posts', // Base ID
			__( 'Portlandia Two Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia two posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_two_posts;
        
        if ( ! empty( $instance['portlandia_two_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_two_posts = $instance['portlandia_two_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_two_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_two_posts   = $instance['portlandia_two_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_two_posts"), 
                                                    'selected' => $instance["portlandia_two_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_two_posts'] = ( ! empty( $new_instance['portlandia_two_posts'] ) ) ? strip_tags( $new_instance['portlandia_two_posts'] ) : '';

		return $instance;
	}

} // class Portlanida two

// register portlandia two widget
function register_portlandia_two_widget() {
    register_widget( 'portlandia_two' );
}
add_action( 'widgets_init', 'register_portlandia_two_widget' );

/* Portlandia Three */

/* Default to the uncategorized number to be written over */
$portlandia_three_posts =  1 ;

class portlandia_three extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_three_posts', // Base ID
			__( 'Portlandia Three Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia three posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_three_posts;
        
        if ( ! empty( $instance['portlandia_three_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_three_posts = $instance['portlandia_three_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_three_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_three_posts   = $instance['portlandia_three_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_three_posts"), 
                                                    'selected' => $instance["portlandia_three_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_three_posts'] = ( ! empty( $new_instance['portlandia_three_posts'] ) ) ? strip_tags( $new_instance['portlandia_three_posts'] ) : '';

		return $instance;
	}

} // class Portlanida three

// register portlandia three widget
function register_portlandia_three_widget() {
    register_widget( 'portlandia_three' );
}
add_action( 'widgets_init', 'register_portlandia_three_widget' );







































/* Portlandia Four Parent */

/* Default to the uncategorized number to be written over */
$portlandia_four_parent_posts =  1 ;

class portlandia_four_parent extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_four_parent_posts', // Base ID
			__( 'Portlandia Four Parent Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia four parent posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_four_parent_posts;
        
        if ( ! empty( $instance['portlandia_four_parent_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_four_parent_posts = $instance['portlandia_four_parent_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_four_parent_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_four_parent_posts   = $instance['portlandia_four_parent_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_four_parent_posts"), 
                                                    'selected' => $instance["portlandia_four_parent_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_four_parent_posts'] = ( ! empty( $new_instance['portlandia_four_parent_posts'] ) ) ? strip_tags( $new_instance['portlandia_four_parent_posts'] ) : '';

		return $instance;
	}

} // class Portlanida Four Parent

// register portlandia four parent widget
function register_portlandia_four_parent_widget() {
    register_widget( 'portlandia_four_parent' );
}
add_action( 'widgets_init', 'register_portlandia_four_parent_widget' );

/* Portlandia Four Child One */

/* Default to the uncategorized number to be written over */
$portlandia_four_child_one_posts =  1 ;

class portlandia_four_child_one extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_four_child_one_posts', // Base ID
			__( 'Portlandia Four Child One Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia four child one posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_four_child_one_posts;
        
        if ( ! empty( $instance['portlandia_four_child_one_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_four_child_one_posts = $instance['portlandia_four_child_one_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_four_child_one_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_four_child_one_posts   = $instance['portlandia_four_child_one_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_four_child_one_posts"), 
                                                    'selected' => $instance["portlandia_four_child_one_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_four_child_one_posts'] = ( ! empty( $new_instance['portlandia_four_child_one_posts'] ) ) ? strip_tags( $new_instance['portlandia_four_child_one_posts'] ) : '';

		return $instance;
	}

} // class Portlanida Four Child One

// register portlandia four child one widget
function register_portlandia_four_child_one_widget() {
    register_widget( 'portlandia_four_child_one' );
}
add_action( 'widgets_init', 'register_portlandia_four_child_one_widget' );

/* Portlandia Four Child Two */

/* Default to the uncategorized number to be written over */
$portlandia_four_child_two_posts =  1 ;

class portlandia_four_child_two extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_four_child_two_posts', // Base ID
			__( 'Portlandia Four Child Two Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia four child two posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_four_child_two_posts;
        
        if ( ! empty( $instance['portlandia_four_child_two_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_four_child_two_posts = $instance['portlandia_four_child_two_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_four_child_two_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_four_child_two_posts   = $instance['portlandia_four_child_two_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_four_child_two_posts"), 
                                                    'selected' => $instance["portlandia_four_child_two_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_four_child_two_posts'] = ( ! empty( $new_instance['portlandia_four_child_two_posts'] ) ) ? strip_tags( $new_instance['portlandia_four_child_two_posts'] ) : '';

		return $instance;
	}

} // class Portlanida Four Child Tow

// register portlandia four child two widget
function register_portlandia_four_child_two_widget() {
    register_widget( 'portlandia_four_child_two' );
}
add_action( 'widgets_init', 'register_portlandia_four_child_two_widget' );

/* Adds Portlandia Video widget. */

/* Default to the uncategorized number to be written over */
$portlandia_video =  1 ;

class portlandia_video_posts extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_video', // Base ID
			__( 'Portlandia Video', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia video widget', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget. */
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_video;
        
        if ( ! empty( $instance['portlandia_video'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_video = $instance['portlandia_video'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_video'            => __( '', 'text_domain' ),
		) );
        $portlandia_video            = $instance['portlandia_video'];
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_video"), 
                                                    'selected' => $instance["portlandia_video"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_video'] = ( ! empty( $new_instance['portlandia_video'] ) ) ? strip_tags( $new_instance['portlandia_video'] ) : '';

		return $instance;
	}

} // class Portlandia Video Posts

// register portlandia video posts widget
function register_portlandia_video_widget() {
    register_widget( 'portlandia_video_posts' );
}
add_action( 'widgets_init', 'register_portlandia_video_widget' );

/* Portlandia Five */

/* Default to the uncategorized number to be written over */
$portlandia_five_posts =  1 ;

class portlandia_five extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_five_posts', // Base ID
			__( 'Portlandia Five Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia five posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_five_posts;
        
        if ( ! empty( $instance['portlandia_five_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_five_posts = $instance['portlandia_five_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_five_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_five_posts   = $instance['portlandia_five_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_five_posts"), 
                                                    'selected' => $instance["portlandia_five_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_five_posts'] = ( ! empty( $new_instance['portlandia_five_posts'] ) ) ? strip_tags( $new_instance['portlandia_five_posts'] ) : '';

		return $instance;
	}

} // class Portlanida five

// register portlandia five widget
function register_portlandia_five_widget() {
    register_widget( 'portlandia_five' );
}
add_action( 'widgets_init', 'register_portlandia_five_widget' );

/* Portlandia Page Two */

/* Default to the sample page number to be written over */
$portlandia_page_two =  2 ;

class portlandia_pages_two extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_page_two', // Base ID
			__( 'Portlandia Page Two', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia page two unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_page_two;
        
        if ( ! empty( $instance['portlandia_page_two'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_page_two = $instance['portlandia_page_two'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_page_two'  => __( '', 'text_domain' ),
        ) );
        $portlandia_page_two   = $instance['portlandia_page_two']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_pages( array( 'name' => $this->get_field_name("portlandia_page_two"), 
                                                    'selected' => $instance["portlandia_page_two"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_page_two'] = ( ! empty( $new_instance['portlandia_page_two'] ) ) ? strip_tags( $new_instance['portlandia_page_two'] ) : '';

		return $instance;
	}

} // class Portlanida Pages Two

// register portlandia page two widget
function register_portlandia_page_two_widget() {
    register_widget( 'portlandia_pages_two' );
}
add_action( 'widgets_init', 'register_portlandia_page_two_widget' );

/* Portlandia Six */

/* Default to the uncategorized number to be written over */
$portlandia_six_posts =  1 ;

class portlandia_six extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_six_posts', // Base ID
			__( 'Portlandia Six Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia six posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_six_posts;
        
        if ( ! empty( $instance['portlandia_six_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_six_posts = $instance['portlandia_six_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_six_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_six_posts   = $instance['portlandia_six_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_six_posts"), 
                                                    'selected' => $instance["portlandia_six_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_six_posts'] = ( ! empty( $new_instance['portlandia_six_posts'] ) ) ? strip_tags( $new_instance['portlandia_six_posts'] ) : '';

		return $instance;
	}

} // class Portlanida Six

// register portlandia six widget
function register_portlandia_six_widget() {
    register_widget( 'portlandia_six' );
}
add_action( 'widgets_init', 'register_portlandia_six_widget' );


/* Portlandia Seven */

/* Default to the uncategorized number to be written over */
$portlandia_seven_posts =  1 ;

class portlandia_seven extends WP_Widget {

	/* Register widget with WordPress. */
	function __construct() {
		parent::__construct(
			'portlandia_seven_posts', // Base ID
			__( 'Portlandia Seven Posts', 'text_domain' ), // Name
			array( 'description' => __( 'The portlandia seven posts unit', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget.	*/
	public function widget( $args, $instance ) {
        
        /* creates global variable to be used outside of the function, has to be here */
        global $portlandia_seven_posts;
        
        if ( ! empty( $instance['portlandia_seven_posts'] ) ) {
            /* takes output and passes it to a variable */
            $portlandia_seven_posts = $instance['portlandia_seven_posts'] ; 
        }
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		// From twenty Sixteen - clean up
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		
        // From Category Posts Plugin - cleans it up
		$instance = wp_parse_args( ( array ) $instance, array(	
			'portlandia_seven_posts'  => __( '', 'text_domain' ),
        ) );
        $portlandia_seven_posts   = $instance['portlandia_seven_posts']; ?>
        
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'text_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label>
				<?php echo 'Category'; ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("portlandia_seven_posts"), 
                                                    'selected' => $instance["portlandia_seven_posts"] ) ); ?>
			</label>
		</p>
		<?php 
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['portlandia_seven_posts'] = ( ! empty( $new_instance['portlandia_seven_posts'] ) ) ? strip_tags( $new_instance['portlandia_seven_posts'] ) : '';

		return $instance;
	}

} // class Portlanida Seven

// register portlandia seven widget
function register_portlandia_seven_widget() {
    register_widget( 'portlandia_seven' );
}
add_action( 'widgets_init', 'register_portlandia_seven_widget' );

?>