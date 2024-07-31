<?php
$patient_id = $this->session->userdata('patient_id'); // Retrieve the patient ID from session

$patient_info = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
foreach ($patient_info as $patient):
?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php $patient_info = $this->db->get_where('patient', array('patient_id' => $this->session->userdata('patient_id')))->row_array();
            if ($patient_info):?>
                <h3 class="box-title m-b-0">Your Patient Id: <?php echo $patient_info['pid'];?></h3>
            <?php endif; ?>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('Queue');?></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="appointmentTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('Queue Number');?></th>
                                <th><?php echo get_phrase('Patient ID');?></th>
                                <th><?php echo get_phrase('Date Visited');?></th>
                                <th><?php echo get_phrase('Status');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            // Get the current date start and end timestamps
                            $start_of_day = strtotime("today midnight");
                            $end_of_day = strtotime("tomorrow midnight") - 1;
                            
                            // Prepare the SQL query to fetch appointments for the current date
                            $sql = "SELECT * FROM appointment WHERE date_visited BETWEEN $start_of_day AND $end_of_day ORDER BY date_visited DESC LIMIT 100";
                            $appointments = $this->db->query($sql)->result_array();
                            
                            foreach ($appointments as $key => $appointment): ?>
                                <tr>
                                    <td><?php echo $appointment['queue_number'];?></td>
                                    <td><?php echo $this->crud_model->get_type_id_by_id('patient', $appointment['patient_id']);?></td>
                                    <td><?php echo date('d M Y', $appointment['date_visited']);?></td>
                                    <td>
                                        <span class="label label-<?php echo ($appointment['status'] == '1') ? 'success' : 'warning';?>">
                                            <?php echo ($appointment['status'] == '1') ? 'Active' : 'Inactive';?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<script>
$(document).ready( function () {
    $('#appointmentTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true
    });
});
</script>
