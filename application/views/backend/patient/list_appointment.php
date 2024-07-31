<?php
$patient_id = $this->session->userdata('patient_id'); // Retrieve the patient ID from session

$patient_info = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
foreach ($patient_info as $patient):
?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Your Patient Id: <?php echo $patient['pid']; ?></h3>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('list_appointment'); ?></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('Queue Number'); ?></th>
                                <th><?php echo get_phrase('Patient ID'); ?></th>
                                <th><?php echo get_phrase('Date Visited'); ?></th>
                                <th><?php echo get_phrase('Status'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                        // Prepare the SQL query to fetch appointments for the given patient ID
                        $sql = "SELECT * FROM appointment WHERE patient_id = ? ORDER BY patient_id DESC LIMIT 100";
                        $appointments = $this->db->query($sql, array($patient_id))->result_array();

                        foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo $appointment['queue_number']; ?></td>
                                <td><?php echo $this->crud_model->get_type_id_by_id('patient', $appointment['patient_id']); ?></td>
                                <td><?php echo date('d M Y', $appointment['date_visited']); ?></td>
                                <td>
                                    <span class="label label-<?php echo ($appointment['status'] == '1') ? 'success' : 'warning'; ?>">
                                        <?php echo ($appointment['status'] == '1') ? 'Active' : 'Inactive'; ?>
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
