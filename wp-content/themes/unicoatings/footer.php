        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container-fluid text-center">
                <div class="copy">
                    <div class="col-md-2">
                        <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
                                <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                        <?php endif; ?>        
                    </div>
                    <div class="col-md-6">
                        <?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
                                <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                        <?php endif; ?>            
                    </div>
                </div>
            </div>
        </footer>
        <!--/ Footer-->
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/contactform/contactform.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>