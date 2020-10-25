<?php

/*********************
Start all the functions
at once for Montgomery.
*********************/

if ( ! function_exists( 'montgomery_setup' ) ) :
/* Sets up theme defaults and registers support for various WordPress features. */
function montgomery_setup() {
    
    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    /* Let WordPress manage the document title. */
	add_theme_support( 'title-tag' );
    
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'text_domain' ),
		'secondary' => __( 'Seconday Menu', 'text_domain' ),
		'social'  => __( 'Social Links Menu', 'text_domain' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
    
    /* Enable support for Post Formats. */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
    
    add_theme_support( 'post-thumbnails' );
    
}
endif; // montgomery_setup
add_action( 'after_setup_theme', 'montgomery_setup' );

/* Set the content width in pixels, based on the theme's design and stylesheet. */

function montogomery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'montogomery_content_width', 1024 );
}
add_action( 'after_setup_theme', 'montogomery_content_width', 0 );

/* Enqueue scripts and styles. */

function montogomery_scripts() {
    
    // Foundation style.
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/app.css' );
    
    // Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
    
    // Comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script( 'jquery-ui-datepicker' );    
}
add_action( 'wp_enqueue_scripts', 'montogomery_scripts' );

// deals with variable set through form _POST
// CONTACT
function prefix_admin_contact() {
    
    // deal with the upload
            if ( ! function_exists( 'wp_handle_upload' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }
            
            $uploadedfile = $_FILES['file'];
            
            $upload_overrides = array( 'test_form' => false );

            $attachment_id = wp_handle_upload( $uploadedfile, $upload_overrides );
    
            // find the attachment
            $a_up = $attachment_id['url']; 
   
            // Extremley Important to set
            global $wpdb;
    
            // Whats inserted
            $wpdb->insert( pcrv_inquiry ,      
                array(
                    'type'                      => 'contact' ,
                    
                    'name'                      => $_POST['name'] ,
                    'add1'                      => $_POST['add1'] ,
                    'add2'                      => $_POST['add2'] ,
                    'add3'                      => $_POST['add3'] ,
                    'add4'                      => $_POST['add4'] ,
                    'email'                     => $_POST['email'] ,
                    'phone'                     => $_POST['phone'] ,
                    
                    'add_notes'                 => $_POST['add_notes'] ,
                    'questions'                 => $_POST['questions'] ,
                    
                    'attachment'                 => $a_up 
                )
            );

            // this give the unid in the next url
             $id = $wpdb->insert_id;
    
    $to = 'matthew@pacrav.com';
    $to2 = $_POST['email'];
    $to3 = 'riley@rileybathurst.com';
    
    $subject = 'PACRAV Physical Therapy Inquiry: ' . $id;
    
    $message = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Untitled Document</title>
        </head>

        <body bgcolor="#ebebeb">

            <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ebebeb" align="center">
                <tbody>
                    <tr> 
                        <table style="border-left: 2px solid #e6e6e6; border-right: 2px solid #e6e6e6;" cellspacing="0" cellpadding="25" width="605" align="center">

                            <tr>
                                <td width="596" align="center" style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;">
                                    <img src="http://pacrav.com/wp-content/themes/montgomery-0-7-6/img/PACRAV-logo.png" alt="PACRAV Physical Therapy" />
                                </td>
                            </tr>

                            <tr>
                                <td width="596" align="center" style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;">
                                    <p style="margin-bottom: 10px; font-size: 22px; font-weight: bold; color: #494a48; font-family: arial; line-height: 110%; text-align: center;"><a href="http://pacrav.com">PACRAV.com</a></p>
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left;" align="center">

                                    <hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>

                                    <p>
                                        Thanks for your contact, '.
                                            $_POST['name'] .
                                        ' we will be in touch ASAP.
                                    </p>

                                    <hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>   

                                    <p>
                                        For your records the inquiry was, ' .
        
                                        $_POST['add_notes'] .
        
                                    '</p>
                                    
                                    <p>Questions: ' .
        
                                        $_POST['questions'] .
                                    
                                    '<br >With an attached file: ' .
                                        
                                        $a_up . 
                            
                                    '</p>
                                    
                                    <p>
                                        We will contact you on: ' .
                                            $_POST['email'] .
                                        '<br >or: '.
                                            $_POST['phone'] .
                            
                                    '.<br />We have your address as: ' .
                            
                                        $_POST['add1'] .
                                
                                    '<br>' .
                            
                                        $_POST['add2'] .
                            
                                    '<br>' .
                            
                                        $_POST['add3'] .
                            
                                    '&nbsp; | &nbsp;' .
                            
                                        $_POST['add4'] .
                            
                                    '</p>
                                
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: center;" align="center">
                                    <span style="font-size: 11px; color: #575757; line-height: 200%; font-family: arial; text-decoration: none;">
                                        PACRAV Phyical Theraphy<br />
                                        <a href="mailto:matthew@pacrav.com">matthew@pacrav.com</a><br />
                                    </span>
                                </td>
                            </tr>

                        </table>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>
    ';
    
    add_filter( 'wp_mail_from_name', function( $name ) {
	   return 'PACRAV Physical Theraphy';
    });
    
    add_filter( 'wp_mail_content_type', 'set_content_type' );
        function set_content_type( $content_type ) {
            return 'text/html';
    }
    
    wp_mail($to , $subject , $message );
    wp_mail($to2 , $subject , $message );
    wp_mail($to3 , $subject , $message , $headers );
    
        // fail safe if above zero was inserted to database
        if ($id>0)  {
            // Redirect
            wp_redirect( home_url() . '/thanks?n=' . $id );
            
        } else {
            // Redirect
            wp_redirect( home_url() . '/sorry' );
        }
        
    exit();

}
add_action( 'admin_post_contact', 'prefix_admin_contact' );
add_action( 'admin_post_nopriv_contact', 'prefix_admin_contact' );

// deals with variable set through form _POST
// CONTACT
function prefix_admin_consultation() {
    
    // deal with the upload
            if ( ! function_exists( 'wp_handle_upload' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }
            
            $uploadedfile = $_FILES['file'];
            
            $upload_overrides = array( 'test_form' => false );

            $attachment_id = wp_handle_upload( $uploadedfile, $upload_overrides );
    
            // find the attachment
            $a_up = $attachment_id['url']; 
   
            // Extremley Important to set
            global $wpdb;
    
            // Whats inserted
            $wpdb->insert( pcrv_inquiry ,      
                array(
                    'type'                      => 'consultation' ,
                    
                    'name'                      => $_POST['name'] ,
                    'add1'                      => $_POST['add1'] ,
                    'add2'                      => $_POST['add2'] ,
                    'add3'                      => $_POST['add3'] ,
                    'add4'                      => $_POST['add4'] ,
                    'email'                     => $_POST['email'] ,
                    'phone'                     => $_POST['phone'] ,
                    
                    'goal'                     => $_POST['goal'] ,
                    'pain'                     => $_POST['pain'] ,
                    'act1'                     => $_POST['act1'] ,
                    'act2'                     => $_POST['act2'] ,
                    'act3'                     => $_POST['act3'] ,
                    'start'                    => $_POST['start'] ,
                    'manage'                   => $_POST['manage'] ,
                    'previous'                 => $_POST['previous'] ,
                    'physician'                => $_POST['physician'] ,
                    'health'                   => $_POST['health'] ,
                    
                    'add_notes'                => $_POST['add_notes'] ,
                    'questions'                => $_POST['questions'] ,
                    
                    'attachment'               => $a_up 
                )
            );

            // this give the unid in the next url
             $id = $wpdb->insert_id;
    
        $to = 'matthew@pacrav.com';
        $to2 = $_POST['email'];
        $to3 = 'riley@rileybathurst.com';

        $subject = 'PACRAV Physical Therapy Consultation: ' . $id;

        $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Untitled Document</title>
            </head>

            <body bgcolor="#ebebeb">

                <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ebebeb" align="center">
                    <tbody>
                        <tr> 
                            <table style="border-left: 2px solid #e6e6e6; border-right: 2px solid #e6e6e6;" cellspacing="0" cellpadding="25" width="605" align="center">

                                <tr>
                                    <td width="596" align="center" style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;">
                                        <img src="http://pacrav.com/wp-content/themes/montgomery-0-7-6/img/PACRAV-logo.png" alt="PACRAV Physical Therapy" />
                                    </td>
                                </tr>

                                <tr>
                                    <td width="596" align="center" style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;">
                                        <p style="margin-bottom: 10px; font-size: 22px; font-weight: bold; color: #494a48; font-family: arial; line-height: 110%; text-align: center;"><a href="http://pacrav.com">PACRAV.com</a></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left;" align="center">

                                        <hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>

                                        <p>
                                            Thanks for your consultation form, '.
                                                $_POST['name'] .
                                            ' we will be in touch ASAP.
                                        </p>

                                        <hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>   
                                        
                                        <p>For your goal for the consultation was, ' . $_POST['goal'] . '</p>
                                        
                                        <p>Pain level: ' . $_POST['pain'] . '</p>
                                        
                                        <p>Activties Causing the issue, </p>
                                        
                                        <p>' . $_POST['act1'] . '</p>
                                        
                                        <p>' . $_POST['act2'] . '</p>
                                        
                                        <p>' . $_POST['act3'] . '</p>
                                        
                                        <p>The issue started as,  ' . $_POST['start'] . '</p>
                                        
                                        <p>I am managing the issue, ' . $_POST['manage'] . '</p>
                                        
                                        <p>I have had this issue previouslly, ' . $_POST['previous'] . '</p>
                                    
                                        <p>I have seen physicians about this issue before when, ' . $_POST['physician'] . '</p>
                        
                                        <p>Other health issues I have are, ' . $_POST['health'] . '</p>
                                        
                                        <br >With an attached file: ' .

                                            $a_up . 

                                        '</p>

                                        <p>
                                            We will contact you on: ' .
                                                $_POST['email'] .
                                            '<br >or: '.
                                                $_POST['phone'] .

                                        '.<br />We have your address as: ' .

                                            $_POST['add1'] .

                                        '<br>' .

                                            $_POST['add2'] .

                                        '<br>' .

                                            $_POST['add3'] .

                                        '&nbsp; | &nbsp;' .

                                            $_POST['add4'] .

                                        '</p>

                                    </td>
                                </tr>

                                <tr>
                                    <td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: center;" align="center">
                                        <span style="font-size: 11px; color: #575757; line-height: 200%; font-family: arial; text-decoration: none;">
                                            PACRAV Phyical Theraphy<br />
                                            <a href="mailto:matthew@pacrav.com">matthew@pacrav.com</a><br />
                                        </span>
                                    </td>
                                </tr>

                            </table>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ';

        add_filter( 'wp_mail_from_name', function( $name ) {
           return 'PACRAV Physical Theraphy';
        });

        add_filter( 'wp_mail_content_type', 'set_content_type' );
            function set_content_type( $content_type ) {
                return 'text/html';
        }

        wp_mail($to , $subject , $message );
        wp_mail($to2 , $subject , $message );
        wp_mail($to3 , $subject , $message , $headers );
    
    
        // fail safe if above zero was inserted to database
        if ($id>0)  {
            // Redirect
            wp_redirect( home_url() . '/thanks?n=' . $id );
            
        } else {
            // Redirect
            wp_redirect( home_url() . '/sorry' );
        }
        
    exit();

}
add_action( 'admin_post_consultation', 'prefix_admin_consultation' );
add_action( 'admin_post_nopriv_consultation', 'prefix_admin_consultation' );

function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

?>