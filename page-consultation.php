<?php
/*  
 *  Template Name: Consultation
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
                    <div class="small-12 medium-3 columns breathe-before breathe-after"><!-- title -->
                        <h2 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                        
                    <div class="small-12 medium-9 columns breathe-before breathe-below">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="small-12 columns">
                        <hr>
                    </div>
                </div>
                
    
                <!-- enctype='multipart/form-data' is key to submitting documents -->
                <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype='multipart/form-data' method="post" data-abide novalidate>

                    <input type="hidden" name="action" value="consultation">
                    <input type="hidden" name="data" value="consultationid"><!-- slightly different value to differentiate, not used -->

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
                            <hr>
                        </div>
                    </div>
                         
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="goal">What is your primary goal that you want to complete by the end of this virtual consultation?</label>
                        </div>

                        <div class="small-12 medium-9 columns">
                            <textarea name="goal" id="goal" placeholder="Mobility and freedom"></textarea>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="pain">Can you rate your level of pain on a scale of 0-10 with 0 being no pain at all and 10 being emergency room level pain?</label>
                        </div>
                    
                        <div class="small-12 medium-9 columns">
                            <div class="row">
                                <div class="small-2 large-1 columns">
                                    <input type="number" name="pain" id="pain" class="boxed" placeholder="5" oninput="paininput.value = pain.value">
                                </div>

                                <div class="small-10 large-11 columns">
                                    <input type="range" name="paininput" id="paininput" value="5" min="1" max="10" oninput="pain.value = paininput.value">
                                </div>
                            </div>
                            <hr>
                        </div>      
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <p>Can you describe three activities in your daily life that cause your symptoms to be irritated?  How long does this take - seconds, minutes, or hours?  And finally, how long does it take to resolve back to the baseline level - seconds, minutes, or hours?</p>
                        </div>
                    </div>
           
                    <div class="row">
                        <div class="small-1 medium-3 columns">
                            <label for="act1" class="right-medium-up">1:</label>
                        </div>
                        <div class="small-11 medium-9 columns">
                            <input name="act1" type="text" id="act1" placeholder="walking, 1 hour to hurt, 1 hour to relieve">
                        </div>
                    </div>
           
                    <div class="row">
                        <div class="small-1 medium-3 columns">
                            <label for="act2" class="right-medium-up">2:</label>
                        </div>
                        <div class="small-11 medium-9 columns">
                            <input name="act2" type="text" id="act2" placeholder="stairs, 3 flights to hurt, 30 minutes to relieve">
                        </div>
                    </div>
           
                    <div class="row">
                        <div class="small-1 medium-3 columns">
                            <label for="act3" class="right-medium-up">3:</label>
                        </div>
                        <div class="small-11 medium-9 columns">
                            <input name="act3" type="text" id="act3" placeholder="cycling, 1 mile, next day to relieve">
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="start">When and how did the symptoms start?</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <textarea name="start" id="start" placeholder="Last tuesday while at work"></textarea>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="manage">Are the symptoms getting better, worse, and staying the same?  What are you currently doing to manage them?</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <textarea name="manage" id="manage" placeholder="A little worse but I'm trying to keep active"></textarea>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="previous">Is this the first time you have experienced this problem or has this happen in the past?  If you suffered from a previous episode, when was the last time you experienced similar symptoms?</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <textarea name="previous" id="previous" placeholder="First time I have had this issue"></textarea>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="physician">If you seen a physician or other healthcare provider, in your own words, what was their diagnosis and/or advice?</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <textarea name="physician" id="physician" placeholder="I have not seen anyone else about this yet"></textarea>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-9 medium-push-3 columns">
                            <label for="health">Are there any general health issues you think are important that I should know about before we start?</label>
                        </div>
                        <div class="small-12 medium-9 columns">
                            <textarea name="health" id="health" placeholder="I am currently on this medication"></textarea>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-3 columns">
                            <label for="fileUpload" class="right-medium-up">Attach file:</label>
                        </div>  
                        <div class="small-12 medium-9 columns">
                            <p><em>This form is not for sensitive information such as medical records or a SSN.</em></p>
                            <input type="file" name="file" id="file">
                            <hr>
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