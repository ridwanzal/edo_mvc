<div class="thirdsection2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12 container_images_me">
                        <img alt="" height="328px" id="myimage" src="<?php echo base_url() ?>assets/img//me2.png"><br>
                        <a href=""><span class="fa fa-facebook social"></span></a> <a href=""><span class="fa fa-linkedin social"></span></a> <a href=""><span class="fa fa-instagram social"></span></a>
                    </div>
                    <?php echo validation_errors(); ?>
                    <form method="post" action="<?php echo base_url('submit_contact'); ?>">
                        <div class="col-lg-9 col-md-6 col-xs-12">
                            <p  class="medium_text">Let's keep in touch</p>
                            <p  class="small_text">Feel free to ask, or contact me personally, if you want another option just fill the information below. Enjoy :)</p>
                            <br/>
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-xs-12">
                                        <p class="bolders">Name *</p>
                                        <input placeholder="Please input your name" type="text" name="p_name" class="form-control input_general" required>
                                    </div> 
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-xs-12">
                                        <p class="bolders">Email *</p>
                                        <input placeholder="Please input your email" type="email" name="p_email" class="form-control input_general" required >
                                    </div> 
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-xs-12">
                                        <p class="bolders">Message</p>
                                        <textarea placeholder="Please input your message" width="100%" name="p_message" rows="7" class="form-control input_general" required></textarea>
                                    </div> 
                                </div>
                                <div class="row submitcontainer">
                                    <div class="col-xl-12 col-md-12 col-xs-12">
                                        <p style="color : #28af77;margin-top:10px;"><?php echo $this->session->flashdata('success'); ?></p>
                                        <p style="color : #ffcc00;margin-top:10px;"><?php echo $this->session->flashdata('failed'); ?></p>
                                            <input type="submit" name="submit" class="button1_small_black block_display mycv submit_contacts" value="Submit">
                                    </div> 
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        