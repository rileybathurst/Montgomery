<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
                printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'text_domain' ),
                    number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'text_domain' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'text_domain' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'text_domain' ) ); ?></div>
        </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ul class="no-bullet">
            <?php
                wp_list_comments();
            ?>
        </ul><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'text_domain' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'text_domain' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'text_domain' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>

        <?php if ( ! comments_open() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'text_domain' ); ?></p>
        <?php endif; ?>

	<?php endif; // have_comments() ?>
    
    <?php $fields = array (
                
            'name' => '<div class="row">
                        <div class="medium-2 large-2 columns show-for-medium-up">
                            <label class="inline right">Name *</label>
                        </div>

                        <div class="small-12 medium-6 large-10 columns end">
                                <input type="text" name="name" id="name" placeholder="Name *" required pattern="[a-zA-Z]+" /><small class="error">A name is required.</small>
                        </div> 
                        </div>
                        ',
            
            'email' => '<div class="row">
                            <div class="medium-2 large-2 columns show-for-medium-up">
                                <label class="inline right">email *</label>
                            </div>

                            <div class="small-12 medium-6 large-10 columns end">
                                <input type="email" name="email" id="email" placeholder="email *" required pattern="[a-zA-Z]+" /><small class="error">An email is required.</small>
                            </div>
                        </div>',
                
            'website' => '<div class="row">
                            <div class="medium-2 large-2 columns show-for-medium-up">
                                <label class="inline right">Website </label>
                            </div>

                            <div class="small-12 medium-6 large-10 columns end">
                                <input type="text" name="url" id="url" placeholder="website" />
                            </div>
                        </div>',
                
    ); ?>
    
    <?php $new_defaults = array (
        'class_submit'      => 'button',
        'fields'            => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field'     => '<div class="row">
                                    <div class="small-12 medium-2 large-2 columns show-for-medium-up">
                                        <label class="inline right">Enquiry *</label> 
                                    </div>

                                    <div class="small-12 medium-6 large-10 columns end">
                                            <textarea placeholder="Enquiry *" name="details" id="details" required></textarea><small class="error">An enquiry is required.</small>
                                    </div>
                                </div>',
    );
    ?>

	<?php comment_form( $new_defaults ); ?>

</div><!-- #comments -->