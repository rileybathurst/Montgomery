<?php
/*  
 *  Template Name: View Order
 */ 
?>

<?php 
    //define variable for url bar .php?n=
    $unid = $_GET['n'];
?>

<?php get_header(); ?>

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
    
                <div class="row no-print">
                    <div class="small-12 medium-4 large-3 columns breathe-before breathe-after"><!-- title -->
                        <h1 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <hr>
                    </div>
                </div>
    
                <div class="row" data-equalizer>
                            
                    <div class="small-12 large-6 print-6 columns stripes" data-equalizer-watch>

                    <ul class="no-bullet second-rows">

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

                    // then search for orders -->
                    $orders = $wpdb->get_results( 
                            "
                                SELECT * 
                                FROM pcrv_inquiry
                                WHERE unid = '$unid';
                            "
                        );
                        foreach ( $orders as $order ) 
                        { ?>
            
            <!-- type -->
                    <li class="small-12 columns ">TYPE |
                            <strong>
                                <?php echo $order->type; ?>
                            </strong>
                        </li>            
                        
            <!-- unid -->
                    <li class="small-12 columns ">ORDER NUMBER |
                            <strong>
                                <?php echo $order->unid; ?>
                            </strong>
                        </li>

            <!-- name -->

                        <li class="small-12 columns ">NAME |
                            <strong>
                                <?php echo $order->name; ?>
                            </strong>
                        </li>

            <!-- add1 -->
                        <li class="small-12 columns ">ADDRESS |
                            <strong>
                                <?php echo $order->add1; ?>
                            </strong>
                        </li>
                        
            <!-- add2 -->
                        <li class="small-12 columns ">SUBURB |
                            <strong>
                                <?php echo $order->add2; ?>
                            </strong>
                        </li>
                        
            <!-- add3 add4 -->
                        <li class="small-8 columns ">CITY | 
                            <strong>
                                <?php echo $order->add3; ?>
                            </strong>
                        </li>
                        
                        <!-- hack to fix the background colour -->
                        <li></li>
                        
                        <li class="small-4 columns ">POSTCODE |
                            <strong>
                                <?php echo $order->add4; ?>
                            </strong>
                        </li>
                       
            <!-- email -->
                        <li class="small-12 columns ">EMAIL |
                            <strong>
                                <?php echo $order->email; ?>
                            </strong>
                        </li>
                        
            <!-- phone -->
                        <li class="small-12 columns ">PHONE |
                            <strong>
                                <?php echo $order->phone; ?>
                            </strong>
                        </li>
            
                        <?php if ($order->type == consultation)  { ?>
                            
                            <!-- goal -->
                            <li class="small-12 columns ">GOAL |
                                <strong>
                                    <?php echo $order->goal; ?>
                                </strong>
                            </li>
                        
                            <!-- pain -->
                            <li class="small-12 columns ">PAIN |
                                <strong>
                                    <?php echo $order->pain; ?>
                                </strong>
                            </li>
                        
                            <!-- act1 -->
                            <li class="small-12 columns ">ACTIVITY 1 |
                                <strong>
                                    <?php echo $order->act1; ?>
                                </strong>
                            </li>
                        
                            <!-- act2 -->
                            <li class="small-12 columns ">ACTIVITY 2 |
                                <strong>
                                    <?php echo $order->act2; ?>
                                </strong>
                            </li>
                        
                            <!-- act3 -->
                            <li class="small-12 columns ">ACTIVITY 3 |
                                <strong>
                                    <?php echo $order->act3; ?>
                                </strong>
                            </li>
                        
                            <!-- start -->
                            <li class="small-12 columns ">HOW THE ISSUE STARTED |
                                <strong>
                                    <?php echo $order->start; ?>
                                </strong>
                            </li>
                        
                            <!-- manage -->
                            <li class="small-12 columns ">HOW ARE YOU MANAGING |
                                <strong>
                                    <?php echo $order->manage; ?>
                                </strong>
                            </li>
                        
                            <!-- previous -->
                            <li class="small-12 columns ">PAST ISSUE |
                                <strong>
                                    <?php echo $order->previous; ?>
                                </strong>
                            </li>
                        
                            <!-- physician -->
                            <li class="small-12 columns ">PHYSICIAN |
                                <strong>
                                    <?php echo $order->physician; ?>
                                </strong>
                            </li>
                        
                             <!-- health -->
                            <li class="small-12 columns ">HEALTH ISSUES |
                                <strong>
                                    <?php echo $order->health; ?>
                                </strong>
                            </li>   
                            
                        <?php } ?>
                        
            <!-- add_notes -->
                        <li class="small-12 columns ">ADDITIONAL NOTES |
                            <strong>
                                <?php echo $order->add_notes; ?>
                            </strong>
                        </li>
                        
            <!-- questions -->
                        <li class="small-12 columns ">QUESTIONS |
                            <strong>
                                <?php echo $order->questions; ?>
                            </strong>
                        </li>
                        
            <!-- FileUpload -->
                        <li class="small-12 columns ">File               
                            <img src="<?php echo $order->attachment; ?>" alt="uploaded" >
                        </li>
                        
            <!-- terms -->
                    <li class="small-12 columns ">Terms and Conditions confirm |
                            <strong>                                
                                <?php if ($order->terms == 1) { 
                                    echo 'Yes';
                                } else { 
                                    echo 'No'; 
                                } ?>      
                            </strong>
                        </li>
                        
             <!-- timenow -->
                        <li class="small-12 columns ">DATE SUBMITTED |
                            <strong>
                                <?php echo $order->timenow; ?>
                            </strong>
                        </li>
                        
                    <?php  } ?>
                            
                    <!-- back and forward --> 
                        
                        <hr class="no-print">
                        
                        <?php $above = $unid + 1; ?>
                        <?php $below = $unid - 1; ?>
                        
                        <button><a href="<?php esc_url( home_url( '/' ) ); ?>view-order/?n=<?php echo $above; ?>" aria-label="Next">Next Order</a></button>
                        <?php if ($unid>0)  { ?><button><a href="<?php esc_url( home_url( '/' ) ); ?>view-order/?n=<?php echo $below; ?>" aria-label="Previous">Previous Order</a></button><?php } ;?>
                            
                        <div class="row no-print">
                            <div class="small-12 columns">
                                <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>view" class="button">Back to orders</a></p>
                            </div>
                        </div>
                            
                    <?php } else {
                    echo '<li>Sorry your not an admin.</li>';
                    }
                    ?>

                    </ul>
                        
                </div>

            </div><!-- row -->

                    
                
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