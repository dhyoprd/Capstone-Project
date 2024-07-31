<?php $select_based_on_parameter = $this->db->get_where('doctor', array('doctor_id' => $param2))->result_array();
        foreach($select_based_on_parameter as $key => $all_selected_doctors):?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('Update Doctor');?></div>
                    <div class="panel-body">    
                              
					    
                        <?php echo form_open(base_url() . 'admin/update_doctor/update/' . $param2 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

	
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('name');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="name" class="form-control m-r-10" value="<?php echo $all_selected_doctors['name'];?>" required>
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
                                    <input type="text" id="example-text" name="place_of_birth" class="form-control m-r-10" value="<?php echo $all_selected_doctors['place_of_birth'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('id_card');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="id_card" class="form-control m-r-10" value="<?php echo $all_selected_doctors['id_card'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12"><?php echo get_phrase('gender');?>*</label>
                                    <div class="col-sm-12">
                                        <select class=" form-control" name="gender" data-style="btn-primary btn-outline" required>
                                            <option data-tokens="Male"<?php if($all_selected_doctors['gender'] == 'Male') echo 'selected="selected"' ;?>><?php echo get_phrase('male');?></option>
                                            <option data-tokens="Female"<?php if($all_selected_doctors['gender'] == 'Female') echo 'selected="selected"' ;?>><?php echo get_phrase('female');?></option>
                                            <option data-tokens="Others"<?php if($all_selected_doctors['gender'] == 'Others') echo 'selected="selected"' ;?>><?php echo get_phrase('others');?></option>
                                        </select>
                                    </div>
                            </div>

                        

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('mother_tongue');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="mother_tongue" value="<?php echo $all_selected_doctors['mother_tongue'];?>" class="form-control m-r-10">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12"><?php echo get_phrase('marital_status');?>*</label>
                                    <div class="col-sm-12">
                                        <select class=" form-control" name="marital_status" >
                                            <option value="Married"<?php if($all_selected_doctors['marital_status'] == 'Married') echo 'selected="selected"';?>><?php echo get_phrase('Married');?></option>
                                            <option value="Single"<?php if($all_selected_doctors['marital_status'] == 'Single') echo 'selected="selected"';?>><?php echo get_phrase('Single');?></option>
                                            <option value="Divorced"<?php if($all_selected_doctors['marital_status'] == 'Divorced') echo 'selected="selected"';?>><?php echo get_phrase('Divorced');?></option>
                                            <option value="Engaged"<?php if($all_selected_doctors['marital_status'] == 'Engaged') echo 'selected="selected"';?>><?php echo get_phrase('Engaged');?></option>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('religion');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="religion" value="<?php echo $all_selected_doctors['religion'];?>" class="form-control m-r-10" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('blood_group');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="blood_group" class="form-control m-r-10" value="<?php echo $all_selected_doctors['blood_group'];?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                <div class="col-md-12">
                                    <textarea class="form-control m-r-10" rows="5" name="address"><?php echo $all_selected_doctors['address'];?></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('city');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="city" class="form-control m-r-10" value="<?php echo $all_selected_doctors['city'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('qualifications');?></span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="qualification" class="form-control m-r-10" value="<?php echo $all_selected_doctors['qualification'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('state');?></span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="state" class="form-control m-r-10" value="<?php echo $all_selected_doctors['state'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('nationality');?>*</span></label>
                                <div class="col-md-12">
                                    <input type="text" id="example-text" name="nationality" class="form-control m-r-10" value="<?php echo $all_selected_doctors['nationality'];?>">
                                </div>
                            </div>

                            


                                	

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="white-box">
                                            <h3 class="box-title"><?php echo get_phrase('account_information');?></h3>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*</span></label>
                                                    <div class="col-md-12">
                                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" value="<?php echo $all_selected_doctors['email'];?>" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12" for="example-phone"><?php echo get_phrase('phone');?>*</span></label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="example-phone" name="phone" class="form-control" value="<?php echo $all_selected_doctors['phone'];?>">
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                <label class="col-md-12" for="example-phone"><?php echo get_phrase('mobile_no');?></span></label>
                                                <div class="col-md-12">
                                                    <input type="text" id="example-phone" name="mobile_no" class="form-control" value="<?php echo $all_selected_doctors['mobile_no'];?>">
                                                </div>
                                            </div>

                                    </div>
                                </div>


                                
                        <button type="submit" class="btn btn-success btn-rounded btn-block waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('update');?></button>
                        <?php echo form_close();?>        
									
									
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>