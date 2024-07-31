
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <?php echo get_phrase('add_appointment');?>
				
			</div>
				<div class="panel-body">
					<?php echo form_open(base_url() . 'admin/add_appointment/create' , 
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
                    <label class="col-sm-12"><?php echo get_phrase('Patient'); ?>*</label>
                    <div class="col-sm-12">
                        <select class="select2 form-control" name="patient_id"
                            onchange="return get_doctor_patient(this.value)" required>
                            <option data-tokens=""><?php echo get_phrase('select_patient'); ?></option>
                            <?php
                            $patient = $this->db->get('patient')->result_array();
                            foreach ($patient as $row):
                                ?>
                                <option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                

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
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('appointment_date');?>*</span></label>
                                        <div class="col-md-12">
                                            <input class="form-control " name="date_visited" type="date" value="<?php echo date('Y-m-d');?>" id="example-date-input" required>
                                        </div>
						</div>

                        <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('Complaint');?></label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="mymce" name="complaint"></textarea>
                            </div>
                        </div>


								
				
						<hr>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="radio" class="check" id="square-radio-1" name="status" value="1" data-radio="iradio_square-red" required>
                                	<label for="square-radio-1"><?php echo get_phrase('active');?></label>        
                                  	<input type="radio" class="check" id="square-radio-2" name="status" value="2" checked data-radio="iradio_square-red" required>
                                 	<label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
							</div>
						</div>
								 
						<hr>
                                             
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>                
                        </div>
			</div>
		</div>
	</div>
</div>

                    
      