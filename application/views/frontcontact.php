<div class="thirdsection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <img alt="" height="328px" id="myimage" src="<?php echo base_url() ?>assets/img//me2.png" width="180px"><br>
                        <a href=""><span class="fa fa-facebook social"></span></a> <a href=""><span class="fa fa-linkedin social"></span></a> <a href=""><span class="fa fa-instagram social"></span></a>
                    </div>
                    <form method="post" action="<?php echo base_url('index.php/frontpage/insert_contact'); ?>">
                    <div class="col-lg-9 col-md-6 col-xs-12">
                        <p  class="medium_text">Let's keep in touch</p>
                        <p  class="small_text">Fill the information below for further info</p>
                        <p style="color : #28af77"><?php echo $this->session->flashdata('success'); ?></p>
                        <br/>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-xs-12">
                                    <p>Name</p>
                                    <input placeholder="Please input your name" type="text" name="p_name" class="form-control input_general" required>
                                </div> 
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-xs-12">
                                    <p>Email</p>
                                    <input placeholder="Please input your email" type="text" name="p_email" class="form-control input_general" required >
                                </div> 
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-xs-12">
                                    <p>Message</p>
                                    <textarea placeholder="Please input your message" width="100%" name="p_message" rows="7" class="form-control input_general"></textarea>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-xs-12">
                                        <input type="submit" name="submit" class="button1_small_black block_display mycv" value="Submit">
                                </div> 
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        