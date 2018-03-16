<?php
/**
	This templete is used to display not found error
*/
get_header();
?>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="header-section text-center">
                <h2>Error 404 - Not Found</h2>
                <p class="text-center">
                    We're sorry.  The address you entered is not a functioning page on our site.
                </p>
                <p class="text-center"><a href="<?php echo get_option('home'); ?>/">Click here to visit our home page.</a></p>
            </div> 
            <div class="divider1"></div>
        </div>
    </div>     
</section>

<?php get_footer(); ?>

