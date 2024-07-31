<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <?php echo get_phrase('edit_appointment');?>
				
			</div>
				<div class="panel-body">

                <?php foreach ($display_appointment as $key => $value) { ?>
                    <?php
                    // Fetch appointment details
                    $appointment_id = $value['appointment_id'];
                    $appointment = $this->db->get_where('appointment', array('appointment_id' => $appointment_id))->row_array();
                    
                    // Fetch appointment details
                    $appointment_code = $value['appointment_code'];
                    $appointment = $this->db->get_where('appointment', array('appointment_code' => $appointment_code))->row_array();
                    
                    // Fetch patient details
                    $patient_id = $appointment['patient_id'];
                    $patient_name = $this->crud_model->get_type_name_by_id('patient', $patient_id);

                    // Fetch doctor details
                    $doctor_id = $appointment['doctor_id'];
                    $doctor_name = $this->crud_model->get_type_name_by_id('doctor', $doctor_id);
                    ?>
                
					<?php echo form_open(base_url() . 'admin/add_appointment/update/' . $value['appointment_id'], 
					array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					
                    

                    <div class="form-group">
                        <label class="col-md-12" for="example-text"><?php echo get_phrase('appointment_id'); ?></label>
                        <div class="col-sm-12">
                            <input name="appointment_code" value="<?php echo $appointment_code; ?>" type="text" class="form-control" readonly="true">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12" for="patient_name"><?php echo get_phrase('patient_name'); ?>*</label>
                        <div class="col-md-12">
                            <input type="text" name="patient_name" value="<?php echo $patient_name; ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('Doctor'); ?>*</label>
                        <div class="col-sm-12">
                            <select class="select2 form-control" name="doctor_id" onchange="return get_doctor_patient(this.value)" required>
                                <option value=""><?php echo get_phrase('select_doctor'); ?></option>
                                <?php
                                $doctors = $this->db->get('doctor')->result_array();
                                foreach ($doctors as $doctor):
                                    ?>
                                    <option value="<?php echo $doctor['doctor_id']; ?>" <?php echo ($doctor['doctor_id'] == $value['doctor_id']) ? 'selected' : ''; ?>>
                                        <?php echo $doctor['name']; ?>
                                    </option>
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
                                                 
                <!--            <div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('appointment_date');?>*</span></label>
                                        <div class="col-md-12">
                                            <input class="form-control " name="date_visited" type="date" value="<?php echo date('Y-m-d');?>" id="example-date-input" required>
                                        </div>
						</div> -->

                        <div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('appointment_date');?>*</span></label>
                                        <div class="col-md-12">
                                            <input class="form-control " name="date_visited" type="date" value="<?php echo date('Y-m-d', ($appointment['date_visited']));?>" id="example-date-input" required>
                                        </div>
						</div>
                        
                        <div class="form-group">
                            <label class="col-md-12"><?php echo get_phrase('Complaint');?></label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="mymce" name="complaint" required><?php echo html_entity_decode($value['complaint']); ?></textarea>
                            </div>
                        </div>

								
				
						<hr>
			<!--			<div class="form-group">
							<div class="col-sm-12">
								<input type="radio" class="check" id="square-radio-1" name="status" value="1" data-radio="iradio_square-red" required>
                                	<label for="square-radio-1"><?php echo get_phrase('active');?></label>        
                                  	<input type="radio" class="check" id="square-radio-2" name="status" value="2" checked data-radio="iradio_square-red" required>
                                 	<label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
							</div>
						</div>\
			-->
			
			            <div class="form-group">
							<div class="col-sm-12">
								    <input type="radio" class="check" id="square-radio-1" name="status" value="1" <?php if($appointment['status'] == '1') echo 'checked';?> data-radio="iradio_square-red" required>
                                	<label for="square-radio-1"><?php echo get_phrase('active');?></label>        
                                  	
                                      <input type="radio" class="check" id="square-radio-2" name="status" value="2" <?php if($appointment['status'] == '2') echo 'checked';?> data-radio="iradio_square-red" required>
                                 	<label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
							</div>
						</div>
								 
						<hr>
                                             
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>  

                <?php } ?>              
                        </div>
			</div>
		</div>
	</div>
</div>


    


    <script type="text/javascript">
    function get_doctor_shedule(doctor_id){
        $.ajax({
            url: '<?php echo base_url();?>admin/get_doctor_shedule/' + doctor_id,
            success: function(response){
                jQuery('#get_doctor_shedule_holder').html(response);
            }
        });
    }

    </script>

   
                    
      