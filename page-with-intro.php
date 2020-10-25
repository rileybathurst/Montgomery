<?php
/*  
 *  Template Name: With Intro
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
                            <h1 class="category-title over-flex over-flex-no-hover"><?php bloginfo('description'); ?></h1>
                        </div>
    
    
                    <?php endforeach; 
                wp_reset_postdata();?>
    
            <div class="row">
                <hr>
            </div>
    
            <div class="row">
                
                <div class="small-12 medium-4 large-3 columns breathe-after"><!-- title -->
                    <h2 class="category-title"><a href="<?php the_permalink(); ?>">At PACRAV</a></h2>
                </div>
                    
                <div class="small-12 large-9 columns breathe-after">
                    <p class="title-drop"><?php echo (get_page_by_title('Many People')->post_content); ?></p>
                </div>  
            </div>
    
            <div class="row">
                <hr>
            </div>

            <div class="row">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
                    <div class="small-12 medium-4 large-3 columns breathe-after"><!-- title -->
                        <h2 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
    
                    <!-- post -->
                    <div class="small-12 large-9 columns title-drop breathe-after">
                        <?php the_post_thumbnail(); ?>
                        
                        <?php the_content(); ?>
            
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