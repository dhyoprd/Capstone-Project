<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('add_doctor');?>
            </div>
				<div class="panel-body">    
					    
                        <?php echo form_open(base_url() . 'admin/add_doctor/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

	
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('name');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="name" class="form-control m-r-10" placeholder="enter your name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('date_of_birth');?>*</span></label>
                                <div class="col-md-12">
                                    <input class="form-control m-r-10" name="date_of_birth" type="date" value="<?php echo date('Y-m-d');?>" id="example-date-input" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('place_of_birth');?></span>
                                </label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="place_of_birth" class="form-control m-r-10" placeholder="enter place of birth">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('id_card');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="id_card" class="form-control m-r-10" placeholder="eg national ID card, International Passport, Voters card " required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12"><?php echo get_phrase('gender');?>*</label>
                                    <div class="col-sm-12">
                                        <select class=" form-control" name="gender" data-style="btn-primary btn-outline" required>
                                            <option data-tokens=""><?php echo get_phrase('select_gender');?></option>
                                            <option data-tokens="Male"><?php echo get_phrase('male');?></option>
                                            <option data-tokens="Female"><?php echo get_phrase('female');?></option>
                                            <option data-tokens="Others"><?php echo get_phrase('others');?></option>
                                        </select>
                                    </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother_tongue');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="mother_tongue" class="form-control m-r-10" placeholder="enter your mother tongue" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12"><?php echo get_phrase('marital_status');?>*</label>
                                    <div class="col-sm-12">
                                        <select class=" form-control" name="marital_status" data-style="btn-primary btn-outline" required>
                                            <option data-tokens=""><?php echo get_phrase('select_marital_status');?></option>
                                            <option data-tokens="Married"><?php echo get_phrase('married');?></option>
                                            <option data-tokens="Single"><?php echo get_phrase('single');?></option>
                                            <option data-tokens="Divorced"><?php echo get_phrase('divorced');?></option>
                                            <option data-tokens="Engaged"><?php echo get_phrase('engaged');?></option>
                                        </select>
                                    </div>
                            </div>

                            <div class="col-md-12">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('religion');?>*</label>
                                       <select class="form-control" name="religion" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_religion');?></option>
										<option data-tokens="Christianity"><?php echo get_phrase('Christianity');?></option>
                                        <option data-tokens="Islam"><?php echo get_phrase('Islam');?></option>
                                        <option data-tokens="Hindu"><?php echo get_phrase('Hindu');?></option>
                                        <option data-tokens="Budha"><?php echo get_phrase('Budha');?></option>
                                        <option data-tokens="Konghucu"><?php echo get_phrase('Konghucu');?></option>
                                        <option data-tokens="Others"><?php echo get_phrase('others');?></option>
                                    </select>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('blood_group');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                       <select class="form-control" name="blood_group" required>

                                    	<option value="A+">A+</option>

                                        <option value="A">A</option>

                                        <option value="A-">A-</option>

                                        <option value="B+">B+</option>

                                        <option value="B">B</option>

                                        <option value="B-">B-</option>

                                        <option value="AB+">AB+</option>

                                        <option value="AB">AB</option>

                                        <option value="AB-">AB-</option>

                                        <option value="O+">O+</option>

                                        <option value="O">O</option>

                                        <option value="O-">O-</option>

                                    </select>                                    </div>
                                </div>

                            

                            <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                <div class="col-md-12">
                                    <textarea class="form-control m-r-10" rows="5" name="address" placeholder="Enter Address ..." required></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('city');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="city" class="form-control m-r-10" placeholder="enter your city" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('qualifications');?></span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="qualification" class="form-control m-r-10" placeholder="enter your Qualifications">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('state');?></span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="state" class="form-control m-r-10" placeholder="enter your state" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('nationality');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="nationality" class="form-control m-r-10" placeholder="enter your nationality" required>
                                </div>
                            </div>

                           



                                	

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="white-box">
                                            <h3 class="box-title"><?php echo get_phrase('account_information');?></h3>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*</span></label>
                                                    <div class="col-md-12">
                                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" placeholder="enter your email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12" for="example-phone"><?php echo get_phrase('phone');?>*</span></label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="example-phone" name="phone" class="form-control" placeholder="enter your phone" data-mask="(999) 999-9999" required>
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                <label class="col-md-12" for="example-phone"><?php echo get_phrase('mobile_no');?></span></label>
                                                <div class="col-md-12">
                                                    <input type="text" id="example-phone" name="mobile_no" class="form-control" placeholder="enter your mobile number" data-mask="(999) 999-9999" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12" for="pwd"><?php echo get_phrase('password');?>*</span></label>
                                                <div class="col-md-12">
                                                    <input type="password" id="pwd" name="password" class="form-control" placeholder="enter your password" required>
                                                </div>
                                            </div>

                                    </div>
                                </div>




                                

                        <button type="submit" class="btn btn-success btn-sm btn-rounded btn-block waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                        <?php echo form_close();?>   
                        </div>
									
									
            </div>
        </div>
    </div>
</div>