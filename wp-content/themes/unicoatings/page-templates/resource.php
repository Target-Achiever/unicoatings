<?php
/**
    Template Name: Resource Template
*/
?>
<?php get_header(); ?>
		<div class="divider1"></div>
        <!--/ Navigation bar-->       
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="header-section text-center">
                        <h2 class="text-uppercase">we are only a click away </h2>                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/contact_img1.png" class="img-responsive" alt="Contact">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/contact_img2.png" class="img-responsive" alt="Contact">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/contact_img3.png" class="img-responsive" alt="Contact">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/contact_img4.png" class="img-responsive" alt="Contact">
                    </div>
                </div>      
                <div class="row">
                   <div class="contact_content">
                        <div class="col-md-9 col-sm-9 contact_left">
                            <div class="contact_title text-uppercase">
                                <h3>contact us</h3>
                            </div>
                            <div class="contact_info">
                                <h4>Unicoatings HEAD OFFICE</h4>
                                <p>Van Weerden Poelmanweg 2, 3088 EB Rotterdam,<br> The Netherlands  <b>T:</b> +31 10 820 9787</p>
                            </div>
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2463.2326760280976!2d4.441374515257885!3d51.87496519158307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c434401ab1692b%3A0xed3281ec3f286518!2sVan+Weerden+Poelmanweg+2%2C+3088+EB+Rotterdam%2C+Netherlands!5e0!3m2!1sen!2sin!4v1519975149156" width="555" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="enquiry">
                                <h3>MAKE AN ENQUIRY</h3>
                                <form class="enquiry_form" action="#" method="post"> 
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="side_bar">
                                <div class="contact_title text-uppercase">
                                    <h3>distributors</h3>
                                </div>
                                <p>Unicoatings is distributed and supported internationally by the following network of partners.</p>
                                <div class="get_details_form">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <select name="country" class="form-control">
                                                <option>Europe</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="country" class="form-control">
                                                <option>The Netherlands</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Get Details</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="divider"></div>
                                <h4>Distributor details</h4>
                                <div class="divider2"></div>
                                <h3>NETHERLANDS</h3>
                                <div class=" top_finish text-uppercase">
                                    <h3>top finish</h3>
                                </div>
                                <div class="address_info">
                                    <p>Van Weerden Poelmanweg 2,<br> 3088 EB Rotterdam,<br> The Netherlands<br> <b> T:</b> +31 10 820 9787</p>
                                </div>
                                <h4>Distributor support portal</h4>
                                <div class="divider2"></div>
                                 <button class="btn btn-primary">Login</button>
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="divider1"></div>
                <div class="contact_foot_content">
                    <p class="text-center">“I would proudly state that the first two electric locomotives in the Netherlands are coated with UC2K… We are planning to treat all of our assets with UC2K as it is complementary to our operational needs.” </p>
                    <h4 class="text-center">FLEET MANAGER</h4>
                    </div>
                <div class="divider1"></div>
            </div>     
        </section>
<?php get_footer(); ?>
