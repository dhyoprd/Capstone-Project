		
<?php $patient_info = $this->db->get_where('patient', array('patient_id' => $this->session->userdata('patient_id')))->result_array();
        foreach ($patient_info as $key => $patient):
?>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('My Profile');?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
        
						
                        <?php echo form_open(base_url() . 'patient/change_profile/update_info/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('Id Patient');?>*</span>
                                    <div class="col-md-12">
                                        <input type="text" name="pid" value="<?php echo $patient['pid'];?>" class="form-control" readonly="true" required>
                                    </div>
                            </div>	
                                                
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('full_name');?>*</span>
                                    <div class="col-md-12">
                                        <input type="text" name="name" value="<?php echo $patient['name'];?>" class="form-control form-control-line" required>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('email');?>*</span>
                                    <div class="col-md-12">
                                        <input type="email" name="email" value="<?php echo $patient['email'];?>"  class="form-control form-control-line" id="example-email" required>
                                    </div>
                            </div>
                                        
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('phone_number');?>*</span>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" value="<?php echo $patient['phone'];?>" class="form-control form-control-line" required>
                                    </div>
                            </div>
                                            
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('address');?>*</span>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="address" required><?php echo $patient['address'];?></textarea>
                                    </div>
                            </div>
                                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success btn-block btn-rounded btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('change');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
		
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach;?>

    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('Login Details');?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
								
                        <?php echo form_open(base_url() . 'patient/change_profile/change_password/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>	
									
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('new_password');?>*</span>
                                    <div class="col-md-12">
                                        <input type="password" name="new_password" class="form-control form-control-line" id="example-email" required>
                                    </div>
                            </div>
										
							<div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('confirm_new_password');?>*</span>
                                    <div class="col-md-12">
                                        <input type="password" name="confirm_new_password" class="form-control form-control-line" id="example-email" required>
                                    </div>
                            </div>

                                
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success btn-block btn-rounded btn-sm"><i class="fa fa-save"></i> <?php echo get_phrase('change');?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>					
								
                    </div>
                </div>
            </div>
        </div>
    </div>

