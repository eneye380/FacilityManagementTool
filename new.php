<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$_SESSION['from_page'] = "1";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require("./FMT.View/FMT.View.Header/lib.php"); ?>
        <script type=text/javascript src="FMT.Model/Print.js"></script>
        <script type=text/javascript src="FMT.Controller/validation.js"></script>
        <script type=text/javascript src="FMT.Controller/login.js"></script>
        <link href="FMT.View/css/style.css" rel="stylesheet">
    </head>
    <body id = "page-top" class="index">
        <?php include("./FMT.View/FMT.View.Header/header_nav.php"); ?>
        <?php include("./FMT.View/FMT.View.Header/header_2.php"); ?>
        <?php
        // put your code here
        ?>


        <!-- Contact Section -->
        <section id="register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Register</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <!--form name="sentMessage" id="contactForm" novalidate-->
                             <form class="form-horizontal" action="FMT.Model/register_facilitator.php" style='padding: 50px' role="form" method="post" onsubmit="return facilitatorSU(this)">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Agency Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="fname" id="name" 
                                           value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger" id="namehint"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="femail" id="email" 
                                          value="<?php if(isset($_POST['femail'])){echo $_POST['femail'];}?>" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger" id="emailhint"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password1" name="fpassword1"
                                           value="<?php if(isset($_POST['fpassword1'])){echo $_POST['fpassword1'];}?>" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger" id="passwordhint"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password2" name="fpassword2"
                                           value="<?php if(isset($_POST['fpassword2'])){echo $_POST['fpassword2'];}?>" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg" name='submit' id='submit'  style="background-color: #5cb85c;border-color: #5cb85c">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid Section -->
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Login</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <form class="form-horizontal" role='form' style='padding: 100px' role="form" method="post" action="FMT.View/login.php">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="username" id="email" 
                                          value="<?php if(isset($_POST['fusername'])){echo $_POST['fusername'];}?>" required data-validation-required-message="Please enter your email address.">
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password"
                                           value="<?php if(isset($_POST['fpassword'])){echo $_POST['fpassword'];}?>" required data-validation-required-message="Please enter your phone number.">
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg" name='submit' id='submit'  style="background-color: #122b40;border-color: #122b40">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section -->
        <section class="success" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>About</h2>
                        <hr class="star-light">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-2">
                        <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
                    </div>
                    <div class="col-lg-4">
                        <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <a href="#" class="btn btn-lg btn-outline">
                            <i class="fa fa-download"></i> Download Theme
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3>Location</h3>
                            <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Around the Web</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>About Freelancer</h3>
                            <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; Your Website 2014
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll visible-xs visible-sm">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>


    </body>
</html>
