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

            <div class="row">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
                    <div class="small-12 large-3 columns breathe-before breathe-after"><!-- title -->
                        <h1 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <hr>
                        <!-- <p><em><?php the_date(); ?></em></p> -->
                        
                    </div>
    
                    <!-- post -->
                    <div class="small-12 large-9 columns title-drop breathe-after">
                        <?php the_post_thumbnail(); ?>
                        
                        <?php if ( has_post_format( 'video' )) { ?>
                            <div class="flex-video"><?php the_content(); ?></div>
                        <?php } else { 
                            the_content(); 
                        } ?>
            
                        <p><?php wp_link_pages(); ?></p>
                    </div>
                    
                    <hr>
                
                </div>
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