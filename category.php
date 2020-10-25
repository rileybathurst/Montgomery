<?php get_header(); ?>
<!-- posts -->
<div class="row">
    
    <!-- title -->
    <div class="small-12 large-4 columns"><!-- nessecary due to putting them on small doesnt work with title -->
        <h2 class="category-title"><?php single_cat_title(); ?></h2>
    </div>
        
    <!-- description -->
	<p class="small-12 large-8 columns title-drop"><?php echo category_description(); ?></p>
    <hr />
</div>

<div class="row">
    <ul class="no-bullet odd-clear lastchildleft">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
        
                <li class="small-12 large-6 columns">
                    <h1 class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <hr />

                    <p class="dropimage"><?php the_content(); ?></p>
                    <p><?php the_post_thumbnail(); ?>

                </li>  
                  
            <?php endwhile; ?><!-- while have posts -->
                
    </ul>
</div><!-- inside row -->  

<div class="row">
    <div class="full nobottom">
        <div class="small-12 large-6 columns">
            <p>Look back deeper into <?php single_cat_title(); ?></p>
        </div>
        
        <div class="small-12 large-6 columns">
            <p><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'text_domain' ) ); ?></p>
            <p><?php previous_posts_link( __( '<span class="meta-nav">&rarr;</span> Newer posts', 'text_domain' ) ); ?></p>
        </div>
    </div>
</div>
		
<!-- start no posts -->
<?php else : ?>
    <div class="row">
        <div class="small-12 columns">
				<p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
            	<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
			</div>
	</div>
<?php endif; ?><!-- if have posts -->
	
<!-- Single -->
<?php if (is_single()) { ?>
    <div class="row">
		<ul class="no-bullet">
			<li class="small-6 columns"><p><?php previous_post_link( '%link', '%title', TRUE ); ?></p></li>
			<li class="small-6 columns"><p class="text-right"> <?php next_post_link( '%link', '%title', TRUE ); ?> </p></li>
		</ul>	
    </div>
	<?php } ?>
		
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>	
    
	<?php endif; ?>

<?php get_footer(); ?>