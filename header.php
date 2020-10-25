<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>	
    
    <!-- google verification -->
    <meta name="google-site-verification" content="v1jY31p6r32OQczq8QS5I9SANmXvje7o2LLMdOkZXck" />
    
    <!-- analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-12917302-16', 'auto');
      ga('send', 'pageview');

    </script>
    
    <!-- yelp logo -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
</head>

<body <?php body_class(); ?>>
    
    <!-- canvas wrappers -->
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

            <!-- this is the off canvas aka small menu -->
            <div class="off-canvas position-right hide-for-print" id="my-info" data-off-canvas data-position="right">

                <div class="small-12 columns">
                    <h2 class="text-right breathe-before"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo bloginfo( 'name' ); ?></a></h2>
                </div>

                <div class="small-12 columns">
                    <hr />
                </div>

                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <div class="small-12 columns">
                        <nav>
                            <?php
                                // Primary navigation menu.
                                wp_nav_menu( array(
                                    'theme_location'    => 'primary',
                                    'items_wrap'        => '<ul class=" menu">%3$s</ul>'
                                ) );
                            ?>
                         </nav><!-- .main-navigation -->
                    </div>

                    <div class="small-12 columns">
                        <hr />
                    </div>
                <?php else:
                    echo '<ul class="inline-list right main-navigation"><li>Put the menu in.</li></ul>';
                endif; ?>
                
                
                <div class="small-12 columns right">
                    <nav>
                        <?php
                            // Primary navigation menu.
                            wp_nav_menu( array(
                                'theme_location'    => 'social',
                                'menu_class'        => 'right no-bullet social-navigation small-menu',
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),

                            ) );
                        ?>
                        <!-- yelp doesnt have genericons so has to be split off -->
                        <ul class="small-menu logo-without-genricon right no-bullet">
                            <li><a href="https://www.yelp.com/biz/pacrav-reno-2" target="_blank"><i class="fa fa-yelp"></i></a></li>
                        </ul>
                     </nav><!-- .main-navigation -->
                </div>
            </div>

            <!--  this is the in canvas -->
            <div class="off-canvas-content" data-off-canvas-content>
                
                <div class="full-highlight no-bottom small-12">
                    <div class="row breathe-before" data-equilizer>

                        <div class="small-9 medium-6 large-4 columns breathe-after" data-equilizer-watch><!-- title -->
                            
                            <?php $logo = get_template_directory() . '/img/PACRAV.png'; 

                            if ( file_exists ($logo) ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/img/PACRAV.png'; ?>" alt="<?php bloginfo ('name') ?>"></a>
                            <?php } else { if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo bloginfo( 'name' ); ?></a></p>
                            <?php endif; } ?>
                           
                        </div><!-- title -->

                        <!-- small nav --> 
                        <div class="small-3 columns show-for-small-only" data-equilizer-watch>
                            <button class="menu-icon float-right button-backed logo-height" type="button" data-open="my-info">Menu</button><!-- toggle off canvas -->
                        </div>

                        <div class="medium-6 large-4 columns large-push-4 show-for-medium"><!-- right nav -->
                            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                <nav>
                                    <?php
                                        // Primary navigation menu.
                                        wp_nav_menu( array(
                                            'menu_class'     => 'nav-menu',
                                            'theme_location' => 'primary',
                                            'items_wrap' => '<ul class="menu align-right main-navigation">%3$s</ul>',
                                        ) );
                                    ?>
                                 </nav><!-- .main-navigation -->
                            <?php else:
                                echo '<ul class="inline-list right main-navigation"><li>Put the menu in.</li></ul>';
                            endif; ?>

                        </div><!-- right nav -->
                        
                        <div class="small-12 columns breathe-before breathe-after show-for-small-only">
                            <p class="special-hr">&nbsp;</p>
                        </div>
                        
                        <div class="small-12 columns show-for-medium">
                        </div>
                        
                        <div class="small-12 medium-4 columns">
                            <h2 class="text-center-small">PHYSICAL THERAPY . RENO . NV</h2>
                        </div>
                        
                        <div class="small-12 columns hide-for-medium">
                            <hr>
                        </div>
                        
                        <div class="small-12 medium-8 columns">
                            <h4 class="text-center-right-medium">
                                <?php echo twentyseventeen_get_svg( array( 'icon' => 'phone' ) ); ?><a href="tel:(775)683-9070">Office - (775) 683-9070</a>
                            </h4>
                            <h4 class="text-center-right-medium">
                                <?php echo twentyseventeen_get_svg( array( 'icon' => 'phone' ) ); ?><a href="tel:(610)390-1111">Cell - (610) 390-1111</a>
                            </h4>
                            <h4 class="text-center-right-medium">
                                <?php echo twentyseventeen_get_svg( array( 'icon' => 'email' ) ); ?><a href="mailto:<?php bloginfo('admin_email'); ?>">&nbsp;<?php bloginfo('admin_email'); ?></a>
                            </h4>
                        </div>
                        
                    </div><!-- full -->
                </div><!-- row -->              
    
<!-- left open off canvas content, off canvas wrapper inner & off canvas wrapper -->