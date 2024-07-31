<?php $patient_info = $this->db->get_where('patient', array('patient_id' => $this->session->userdata('patient_id')))->result_array();
        foreach ($patient_info as $key => $patient):
?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <?php echo get_phrase('add_appointment');?>
				
			</div>
				<div class="panel-body">
					<?php echo form_open(base_url() . 'patient/add_appointment/create' , 
					array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
					

                    <?php
                        function generateRandomString($length = 10) {
                        $characters = 'ABCDEFGHIJKLMNO0123456789PQRSTUVWXYZ0123456789ABCDEFGHIJ0123456789KLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                        }
                    ?> 
                    
                    
                    <div class="form-group">
                            <label class="col-md-12" for="example-text"><?php echo get_phrase('Appointment Code'); ?></label>
                        <div class="col-sm-12">
                                <input name="appointment_code" value="<?php echo generateRandomString();?>" readonly="true" type="text" class="form-control"/ required>
                        </div>
                    </div>	
                    
                    <div class="form-group">
                            <label class="col-md-12" for="example-text"><?php echo get_phrase('Id Patient');?>*</label>
                        <div class="col-md-12">
                                        <input type="text" name="pid" value="<?php echo $patient['pid'];?>" class="form-control" readonly="true" required>
                                    </div>
                    </div>
						
						<div id="select_doctor_patient_holder"></div>
                        <div class="form-group">
                            <label class="col-md-12" for="example-text"><?php echo get_phrase('full_name'); ?>*</label>
                            <div class="col-md-12">
                                <input type="text" name="full_name" value="<?php echo $patient['name']; ?>" class="form-control" readonly="true">
                            </div>
                        </div>
                        <input type="hidden" name="patient_id" value="<?php echo $patient['patient_id']; ?>">

                        <div class="form-group">
                    <label class="col-sm-12"><?php echo get_phrase('Doctor'); ?>*</label>
                    <div class="col-sm-12">
                        <select class="select2 form-control" name="doctor_id"
                            onchange="return get_doctor_patient(this.value)" required>
                            <option data-tokens=""><?php echo get_phrase('select_doctor'); ?></option>
                            <?php
                            $patient = $this->db->get('doctor')->result_array();
                            foreach ($patient as $row):
                                ?>
                                <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                            
                            <!-- <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('full_name');?>*</span>
                                    <div class="col-md-12">
                                        <input type="text" name="name" value="<?php echo $patient['name'];?>" class="form-control form-control-line"readonly="true">
                                    </div>
                            </div> -->
                                                 
                            <div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('appointment_date'); ?>*</label>
                                    <div class="col-md-12">
                                            <?php
                                                $current_date = date('Y-m-d');
                                                $max_date = date('Y-m-d', strtotime('+3 days'));
                                            ?>
                                        <input class="form-control" name="date_visited" type="date" value="<?php echo $current_date; ?>" id="example-date-input" min="<?php echo $current_date; ?>" max="<?php echo $max_date; ?>" required>
                                    </div>
                            </div>

                        <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('Complaint');?></label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="mymce" name="complaint"></textarea>
                            </div>
                        </div>
                        
                        <input type="hidden" name="status" value="1">
                                             
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>                
                        </div>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>