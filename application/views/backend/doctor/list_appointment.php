<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <?php echo get_phrase('List Appointment');?></div>
				<div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th><?php echo get_phrase('Queue Number');?></th>
                                            <th><?php echo get_phrase('Patient Name');?></th>
                                            <th><?php echo get_phrase('Doctor Name');?></th>
                                          
                                            <th><?php echo get_phrase('Appointment Date');?></th>											
                                            <th><?php echo get_phrase('Prescription');?></th>
                                            <th><?php echo get_phrase('payment');?></th>

                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									
                                    <?php $get_all_appointments = $this->appointment_model->select_all_appointment();
                                            foreach($get_all_appointments as $key => $appointment){?>
                                        <tr>
                            
                                            <td><?php echo $appointment['queue_number'];?></td>
                                            <td><?php echo $this->crud_model->get_type_name_by_id ('patient', $appointment['patient_id']);?></td>
                                            <td><?php echo $this->crud_model->get_type_name_by_id ('doctor', $appointment['doctor_id']);?></td>

                                            
                                            <td><?php echo date('d M Y', $appointment['date_visited']);?></td>
											<td><a href="<?php echo base_url();?>prescription/add_prescription/<?php echo $appointment['appointment_id'];?>"><button>Prescription</button></a></td>
                                            <td>
											<a href="<?php echo base_url();?>payment/add_invoice/<?php echo $appointment['appointment_id'];?>"><button>Payment</button></a></td>
											</td>
                                            <td>
												<a href="#" onclick="confirm_modal('<?php echo base_url();?>doctor/add_appointment/delete/<?php echo $appointment['appointment_id'];?>');">
												<button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button>
												</a>

                             					<a href="<?php echo base_url();?>doctor/edit_appointment/<?php echo $appointment['appointment_id'];?>">
												<button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-edit"></i> </button>
												</a>
                                            </td>
             							</tr>
                                    <?php } ?>
									</tbody>
					

							</table>
			</div>
		</div>
	</div>
</div>

