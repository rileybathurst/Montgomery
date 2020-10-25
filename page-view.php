<?php
/*  
 *  Template Name: View
 */ 
?>

<?php get_header(); ?>

<?php 
    //define variable for url bar .php?n=
    $off = $_GET['offset'];
?>

<!-- Start the main container -->
<div class="container" role="document">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); 

            /*
             * Pull in a different sub-template, depending on the Post Format.
             * 
             * Make sure that there is a default '<tt>format.php</tt>' file to fall back to
             * as a default. Name templates '<tt>format-link.php</tt>', '<tt>format-aside.php</tt>', etc.
             *
             * You should use this in the loop.
             */

            $format = get_post_format();
            get_template_part( 'format', $format );
            ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
                <div class="row">
                    <div class="small-12 medium-4 large-3 columns breathe-before breathe-after"><!-- title -->
                        <h1 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <hr>
                    </div>
                </div>
    
                <div class="row">
                            
                    <div class="small-12 medium-8 large-12 medium-centered stripes">

                    <ul class="no-bullet">

                    <!-- multiple options due to not being logged in would see all guest orders -->
                    <?php 
                        $current_user = wp_get_current_user();
                        $current_id = $current_user->ID;    
                        $user_info = get_userdata( $current_id );

                        if (is_user_logged_in ()) {
                            $user_role = implode(', ', $user_info->roles);
                        }

                        if ($user_role == 'administrator') { 

                        // first extract the current user email as the variable 
                        $current_user = wp_get_current_user();
                        $current_email = $current_user->user_email;   
                            
                    
                        // set the number of items to display per page
                        $items_per_page = 10;

                        // set the offset the page number with a zero after
                        $offset = $off . 0;
                
                        // then search for orders -->
                        $orders = $wpdb->get_results( 
                                "
                                SELECT * 
                                FROM pcrv_inquiry
                                ORDER by unid desc
                                LIMIT $offset , $items_per_page
                                ;"
                            // LIMIt offset , number of rows

                            );

                            foreach ( $orders as $order ) 
                            {
                                echo 
                                '<li><a href="' .

                                    home_url() .

                                    '/view-order?n=' .

                                    $order->unid .

                                '">'.
                                
                                $order->type . 

                                '&nbsp; - ' .     
                                    
                                $order->unid . 

                                '&nbsp; - ' . 

                                $order->name . 

                                '&nbsp; - ' . 

                                $order->email .

                                '&nbsp; - ' .

                                $order->timenow .

                                '</a>' .    

                                '</li>' .

                                '<hr>' ;
                            }

                            ?>

                            <!-- create variable -->
                            <?php $over = $off + 1; ?>
                            <?php $under = $off - 1; ?>

                            <div class="row">
                                <ul class="pagination" role="navigation" aria-label="Pagination" class="small-12 columns">
                                    <li class="current">You're on page <?php if ($off>0) { echo $over; } else { echo '1'; } ?></li>

                                    <!-- If more than 0 previous is OK -->
                                    <li><?php if ($off>0)  {
                                            echo '<li><a href=" ' . home_url() . '/view/?offset=' . $under . '" aria-label="Previous">Previous <span class="show-for-sr">page</span></a></li>' ;
                                         } ?>
                                    </li>

                                    <li><a href="<?php echo home_url(); ?>/view/?offset=<?php echo $over; ?>" aria-label="Previous">Next <span class="show-for-sr">page</span></a></li>

                                </ul>
                            </div>

                            <?php

                            } else {
                                echo '<li class="columns">Sorry your not an admin.</li>';
                            } ?>

                        </ul>

                    </div>

                </div><!-- row -->

                <hr>
                
            </div>
          
        <?php endwhile; ?><!-- while have posts -->
    	
		<?php else : ?>
			<div class="row">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
                    <p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
                    <p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
			     </div><!--.entry-->
            </div>
	
	<?php endif; ?><!-- if have posts -->
    
</div>
			
<?php get_footer(); ?>