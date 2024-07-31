<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('Queue');?></div>
            <div class="panel-body table-responsive">
                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('queue_number');?></th>
                            <th><?php echo get_phrase('patient_id');?></th>
                            <th><?php echo get_phrase('patient_name');?></th>
                            <th><?php echo get_phrase('Date Visited');?></th>
                            <th><?php echo get_phrase('Status');?></th>
                            <th><?php echo get_phrase('actions');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        // Get the current date start and end timestamps
                        $start_of_day = strtotime("today midnight");
                        $end_of_day = strtotime("tomorrow midnight") - 1;
                        
                        // Prepare the SQL query to fetch appointments for the current date
                        $sql = "SELECT * FROM appointment WHERE date_visited BETWEEN $start_of_day AND $end_of_day ORDER BY date_visited DESC LIMIT 100";
                        $array_select = $this->db->query($sql)->result_array();
                        
                         foreach ($array_select as $key => $appointment): ?>
                            <tr>
                                <td><?php echo $appointment['queue_number'];?></td>
                                <td><?php echo $this->crud_model->get_type_id_by_id ('patient', $appointment['patient_id']);?></td>
                                <td><?php echo $this->crud_model->get_type_name_by_id ('patient', $appointment['patient_id']);?></td>
                                <td><?php echo date('d M Y', $appointment['date_visited']);?></td>
                                <td>
								<span class="label label-<?php if($appointment['status'] == '1') echo 'success'; else echo 'warning';?>">
                                <?php if($appointment['status'] == '1'):?>
                                <?php echo 'Active';?>
                                <?php endif;?>
                                <?php if($appointment['status'] == '2'):?>
                                <?php echo 'Inactive';?>
                                <?php endif;?>
                                            
                                </span>
								</td>
                                <td>
									<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/add_appointment/delete/<?php echo $appointment['appointment_id'];?>');">
									<button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button>
									</a>
                            		<a href="<?php echo base_url();?>patient/edit_queue/<?php echo $appointment['appointment_id'];?>">
									<button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-edit"></i> </button>
									</a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
