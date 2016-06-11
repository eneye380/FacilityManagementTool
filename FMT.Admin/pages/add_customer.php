<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Building</title>
        <?php include '../pages/top_lib.php'; ?>
        
        <script src="../js/customer.js" type="text/javascript"></script>
        
        <style>            
            
        </style>
    </head>
    <body>
        <?php
        // put your code here
        include '../pages/navigation.php';
        ?>

        <section id="register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Customer Registration</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <!--form name="sentMessage" id="contactForm" novalidate-->
                        <form class="form-horizontal" action="../../FMT.Model/register_customer.php" style='padding: 50px' role="form" method="post" onsubmit="return click_submit(this)">
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <div><label>Customer Name</label></div>
                                    <input type="text" class="form-control" placeholder="Customer Name" name="cname" id="name" 
                                           value="<?php
                                           if (isset($_POST['cname'])) {
                                               echo $_POST['cname'];
                                           }
                                           ?>" required data-validation-required-message="Please enter a customer name.">
                                    <p class="help-block text-danger" id="name-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="type">Customer Type</label>
                                    <select class="form-control" name='ctype' id="type">
                                        <option class="p_level" value='' selected="true">select customer type</option>
                                        <option class="p_level" value='Estate'>Family</option>
                                        <option class="p_level" value='Hospital'>Business</option>
                                        <option class="p_level" value='University'>Shop Owner</option>
                                        <option class="p_level" value='Other'>Other</option>
                                    </select>
                                    <p class="help-block text-danger" id="type-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Customer Email</label>
                                    <input type="email" class="form-control" placeholder="Customer Email" name="cemail" id="email" 
                                           value="<?php
                                           if (isset($_POST['cemail'])) {
                                               echo $_POST['cemail'];
                                           }
                                           ?>" required data-validation-required-message="Please enter an email address.">
                                    <p class="help-block text-danger" id="address-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Customer Detail</label>
                                    <textarea rows="5" class="form-control" placeholder="Customer Detail" name="cdetail" id="detail" required data-validation-required-message="Please enter a description."></textarea>
                                    <p class="help-block text-danger" id="description-hint"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row page-1">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg pull-right" name='submit' id='submit'  style="background-color: #245269;border-color: #245269">Submit</button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include '../pages/footer.php'; ?>
        <?php include '../pages/bottom_lib.php'; ?>
        
    </body>
</html>
