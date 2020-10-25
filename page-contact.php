<?php
/*  
 *  Template Name: Contact
 */ 
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

            <!-- fix for parallax below -->
            <div class="row"></div>
            
                <?php $args = array( 'posts_per_page' => 1, 'orderby' => 'rand', 'category_name' => 'parallax' ); 
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post );

                    $parallax = get_the_content(); ?>

                        <div class="full-img breathe-after flex">
                            <div class="parallax" style="background-image: url('<?php echo $parallax; ?>');" data-img-width="1600"></div>
                            <h1 class="over-flex over-flex-no-hover"><?php bloginfo('description'); ?></h1>
                        </div>
    
    
                    <?php endforeach; 
                wp_reset_postdata();?>
    
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- find this -->
    
                <div class="row">
                    <div class="small-12 medium-4 large-3 columns breathe-before breathe-after"><!-- title -->
                        <h2 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <hr>
                    </div>
                </div>
            
                <!-- put the page content here -->
                <div class="row">
                    <div class="small-12 columns">
                        <?php the_content(); ?>
                    </div>
                </div>
    
                <!-- enctype='multipart/form-data' is key to submitting documents -->
                <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype='multipart/form-data' method="post" data-abide novalidate>

                    <input type="hidden" name="action" value="contact">
                    <input type="hidden" name="data" value="contactid"><!-- slightly different value to differentiate, not used -->

                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="name" class="right-medium-up">Full Name:*</label>
                        </div>

                        <div class="small-12 medium-9 columns">
                            <input name="name" type="text" required id="name"
                               <?php if ( is_user_logged_in() ) { ?>
                                    value="<?php echo $current_user->display_name; ?>"
                                <?php } else { ?>
                                    placeholder="Joe Smith"
                                <?php } ?>
                            />

                            <!-- error -->
                            <small class="form-error">A full name is required.</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="add1" class="right-medium-up">Address:*</label>
                        </div>

                        <div class="small-12 medium-9 columns">
                            <input name="add1" type="text" required id="add1" placeholder="Street Address">
                            <small class="form-error">An address is required.</small>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="show-for-medium medium-3 columns">&nbsp;</div>
                        <div class="small-12 medium-9 columns">
                            <input name="add2" type="text" required id="add2" placeholder="City">
                            <small class="form-error">A suburb is required.</small>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="show-for-medium medium-3 columns">&nbsp;</div>
                        <div class="small-9 medium-6 columns">
                            <input name="add3" type="text" required id="add3" placeholder="State">
                            <small class="form-error">A city is required.</small>
                        </div>

                        <div class="small-3 columns">
                            <input name="add4" type="number" required id="add4" placeholder="Zip Code">
                            <small class="form-error">A post code is required.</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="email" class="right-medium-up">email:*</label>
                        </div>

                        <div class="small-12 medium-9 columns">
                            <input name="email" type="text" required pattern="email" id="email"  
                                <?php if ( is_user_logged_in() ) { ?>
                                    value="<?php echo $current_user->user_email; ?>"
                                <?php } else { ?>
                                    placeholder="matthew at pacrav.com"
                                <?php } ?>       
                            /><small class="form-error">An email address is required.</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="phone" class="right-medium-up">Phone:*</label>
                        </div>

                        <div class="small-12 medium-9 columns">
                            <input name="phone" type="text" required id="phone" placeholder="&#40;775&#41;">
                            <small class="form-error">A phone number is required.</small>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="add_notes" class="right-medium-up">Notes</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <input type="text" name="add_notes">
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="questions" class="right-medium-up">Questions</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <input type="text" name="questions">
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="fileUpload" class="right-medium-up">Attach file</label>
                        </div>  
                        <div class="small-12 medium-9 columns">
                            <p><em>This form is not for sensitive information such as medical records or a SSN.</em></p>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <input type="file" name="file" id="file">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div data-abide-error class="alert callout" style="display: none;">
                            <p><i class="fi-alert"></i> There are some errors in your form.</p>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="show-for-medium medium-3 columns">&nbsp;</div>
                        <div class="small-12 medium-9 columns">
                            <button type="submit">Submit</button>
                        </div>
                    </div>    
                </form>
                    
                    <hr />
              &nbsp; <!-- hack to fix a border on hr --> 
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