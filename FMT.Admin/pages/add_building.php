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
        
        <script src="../js/building.js" type="text/javascript"></script>
        
        <style>            
            .page-1{
                /**display: none;*/
            }
            .page-2{
                display: none;
            }
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
                        <h2>Building Registration</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <!--form name="sentMessage" id="contactForm" novalidate-->
                        <form class="form-horizontal" action="../../FMT.Model/register_building.php" style='padding: 50px' role="form" method="post" onsubmit="return click_submit(this)">
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <div><label>Building Name</label></div>
                                    <input type="text" class="form-control" placeholder="Building Name" name="bname" id="name" 
                                           value="<?php
                                           if (isset($_POST['bname'])) {
                                               echo $_POST['bname'];
                                           }
                                           ?>" required data-validation-required-message="Please enter a building name.">
                                    <p class="help-block text-danger" id="name-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="type">Building Type</label>
                                    <select class="form-control" name='btype' id="type">
                                        <option class="p_level" value='' selected="true">select building type</option>
                                        <option class="p_level" value='Estate'>Estate</option>
                                        <option class="p_level" value='Hospital'>Hospital</option>
                                        <option class="p_level" value='University'>University</option>
                                        <option class="p_level" value='Cinema'>Cinema</option>
                                        <option class="p_level" value='Shopping Mall'>Shopping Mall</option>
                                        <option class="p_level" value='Other'>Other</option>
                                    </select>
                                    <p class="help-block text-danger" id="type-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Building Address</label>
                                    <input type="text" class="form-control" placeholder="Building Address" name="baddress" id="address" 
                                           value="<?php
                                           if (isset($_POST['baddress'])) {
                                               echo $_POST['baddress'];
                                           }
                                           ?>" required data-validation-required-message="Please enter an address.">
                                    <p class="help-block text-danger" id="address-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Building Description</label>
                                    <textarea rows="5" class="form-control" placeholder="Building Description" name="bdesc" id="description" required data-validation-required-message="Please enter a description."></textarea>
                                    <p class="help-block text-danger" id="description-hint"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row page-1">
                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn btn-success btn-lg pull-right" name='button' id='button'  style="background-color: #245269;border-color: #245269" onclick="click_next(this.form)">Next</button>
                                </div>
                            </div>
                            <div class="row page-2 control-group" style="">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>No of Room's</label>
                                    <input type="number" min='1' class="form-control" placeholder="No of Room's" name="brooms" id="room" 
                                           value="<?php
                                           if (isset($_POST['brooms'])) {
                                               echo $_POST['brooms'];
                                           }
                                           ?>" required data-validation-required-message="Please enter no of room's.">
                                    <p class="help-block text-danger" id="emailhint"></p>
                                </div>
                            </div>
                            <div class="row page-2 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Asset</label>
                                    <input type="text" class="form-control" placeholder="Asset" name="basset" id="asset" 
                                           value="<?php
                                           if (isset($_POST['basset'])) {
                                               echo $_POST['basset'];
                                           }
                                           ?>" required data-validation-required-message="Please enter a asset.">
                                    <p class="help-block text-danger" id="emailhint"></p>
                                </div>
                            </div>
                            <div class="row page-2">
                                <div class="form-group col-xs-12">
                                    <button type="button" class="btn btn-success btn-lg pull-left" name='button' id='button'  style="background-color: #245269;border-color: #245269" onclick="click_back()">Back</button>
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
