<!-- start footer -->
<div class="full dark secondary site-footer">	
    <div class="row">
		<ul class="small-12 medium-6 large-3 columns no-bullet breathe-before align-self-bottom">
			<li><h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3></li>
            <li>PHYSICAL THERAPY . RENO . NV</li>
            <li><?php bloginfo('description'); ?></li>
            <li>&nbsp;</li>
            <li>Matthew Oravitz, DPT, FAAOMPT</li>
            <li><a href="tel:(610)390-1111">(610) 390-1111</a></li>
            <li><a href="mailto:<?php bloginfo('admin_email'); ?>">&nbsp;<?php bloginfo('admin_email'); ?></a></li>
            <li class="show-for-small-only">&nbsp;</li>
        </ul>
    
        <ul class="small-12 medium-6 large-3 columns no-bullet breathe-before text-right-medium">
            <li><a href="https://www.google.com/maps/place/6100+Plumas+St+%23201,+Reno,+NV+89519/@39.4727109,-119.8129147,17z/data=!3m1!4b1!4m5!3m4!1s0x8099406a8c9f9abd:0x2c57af426a00ba1!8m2!3d39.4727109!4d-119.810726">6100 Plumas St, Ste 201<br>
            Reno,<br>
            Nevada. 89519</a></li>
            <li>Phone: <a href="tel:(775)683-9070">(775) 683-9070</a></li>
            <li>Fax: (775) 683-9071</li>
        </ul>
    
        <div class="small-12 columns show-for-small-only">
            <hr>
        </div>

        <div class="small-12 large-3 columns breathe-before text-right-large">
			<?php if ( has_nav_menu( 'primary' ) ) { ?>
                <nav>
                    <?php
                        // Primary navigation menu.
                        wp_nav_menu( array(
                            'menu_class'     => 'menu',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul class="no-bullet"><li></li>%3$s</ul>'
                        ) );
                    ?>
			     </nav><!-- .main-navigation -->
                <?php } else { echo 'Add the menu'; } ?>
        </div>
    </div>
    
    <div class="row">
        <div class="small-12 columns">
            <hr />
        </div>
    </div>
            
    <div class="row">
        <div class="small-12 columns menu">
            <nav class="social-footer">
                <?php
                    // Primary navigation menu.
                    wp_nav_menu( array(
                        'theme_location'    => 'social',
                        'menu_class'        => 'social-navigation',
                        'link_before'       => '<span class="screen-reader-text">',
                        'link_after'        => '</span>',

                    ) );
                ?>

                <!-- yelp doesnt have genericons so has to be split off -->
                <p class="logo-without-genricon"><a href="https://www.yelp.com/biz/pacrav-reno-2" target="_blank"><i class="fa fa-yelp"></i></a></p>
            </nav><!-- .social-navigation -->
        </div>
    </div>
          
    <div class="row">
        <div class="small-12 columns">
            <hr />
        </div>
    </div>
    
    <div class="row">
        <div class="small-12 medium-6 columns">
            <p><?php bloginfo( 'name' ); ?> <?php echo date("Y"); ?></p>
        </div>
        
        <div class="small-12 medium-6 columns">
            <p class="text-right-medium"><a href="http://rileybathurst.com" target="_blank">Site by Riley Bathurst Design</a></p>
        </div>    
	</div>
</div><!-- end footer -->

                        </div>
                    </div>
                </div>

            <script src="<?php echo get_template_directory_uri()?>/node_modules/jquery/dist/jquery.min.js"></script>
            <script src="<?php echo get_template_directory_uri()?>/node_modules/what-input/dist/what-input.min.js"></script>
            <script src="<?php echo get_template_directory_uri()?>/node_modules/foundation-sites/dist/js/foundation.min.js"></script>
            <script src="<?php echo get_template_directory_uri()?>/js/app.js"></script>

        <?php wp_footer(); ?>
	
    </body>
</html>