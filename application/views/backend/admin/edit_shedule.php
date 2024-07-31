<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <?php echo get_phrase('edit_shedule');?>
			</div>
				<div class="panel-body">

                    <?php foreach ($get_shedule as $key => $shedule):?>
					<?php echo form_open(base_url() . 'admin/add_schedule/update/'. $shedule['shedule_id'] , 
					array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
                        <label class="col-sm-12"><?php echo get_phrase('doctor');?>*</label>
                        <div class="col-sm-12">
                            <select class="select2 form-control" name="doctor_id" required>
                                <option data-tokens=""><?php echo get_phrase('select_doctor');?></option>
                                <?php 
                                $doctors = $this->db->get('doctor')->result_array();
                                foreach($doctors as $doctor):
                                    $selected = ($doctor['doctor_id'] == $shedule['doctor_id']) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $doctor['doctor_id'];?>" <?php echo $selected;?>><?php echo $doctor['name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
								
					<div class="form-group">
						<label class="col-md-12" for="example-text"><?php echo get_phrase('schedule_date');?>*</label>
						<div class="col-md-12">
							<input class="form-control" name="avail_day" type="date" value="<?php echo date('Y-m-d', ($shedule['avail_day']));?>" required>
						</div>
					</div>		
								
						
								
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-group clockpicker">
                                    <input class="form-control" id="single-input" name="start_time" value="<?php echo $shedule['start_time'];?>" placeholder="Start date" required>
										 <span class="input-group-btn">
										 <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('start_time');?></button>
										</span> 

								</div>
							</div>
						</div>
								
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-group clockpicker">
									<input class="form-control" id="single-input" name="end_time" value="<?php echo $shedule['end_time'];?>" placeholder="End date" required>
									<span class="input-group-btn">
										<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('end_time');?></button>
									</span> 

                             	</div>
							</div>
                       	</div>
								
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-group clockpicker">
                                	<input class="form-control" id="single-input" value="<?php echo $shedule['per_patient_time'];?>" name="per_patient_time" value="" placeholder="Time for each patient" required>
                                	<span class="input-group-btn">
                  					<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('per_patient_time');?></button>
                  					</span> 

                                </div>
							</div>
						</div>
								
								
						<hr>
						<div class="form-group">
							<div class="col-sm-12">
								    <input type="radio" class="check" id="square-radio-1" name="status" value="1" <?php if($shedule['status'] == '1') echo 'checked';?> data-radio="iradio_square-red" required>
                                	<label for="square-radio-1"><?php echo get_phrase('active');?></label>        
                                  	
                                      <input type="radio" class="check" id="square-radio-2" name="status" value="2" <?php if($shedule['status'] == '2') echo 'checked';?> data-radio="iradio_square-red" required>
                                 	<label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
							</div>
						</div>
								 
						<hr>
                                             
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>       
                        <?php endforeach;?>         
                        </div>
			</div>
		</div>
	</div>
</div>


                    
      