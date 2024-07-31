 <div class="p-3 mb-2 bg-white text-dark">
    <h1>Welcome to the Dental Practice Information System</h1>
    <p>The Dental Practice Information System is designed to facilitate users (dentists and patients) in delivering and receiving services at the Dental Practice. Within the system, the management of the data input process includes the patient registration system (E-Registration) and digital appointment scheduling. Additionally, the Dental Practice Information System can serve as a support system to help patients receive services.</p>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0"><?php echo get_phrase('New Schedule List'); ?></h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('Doctor Name'); ?></th>
                            <th><?php echo get_phrase('Date'); ?></th>
                            <th><?php echo get_phrase('start_time'); ?></th>
                            <th><?php echo get_phrase('end_time'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Update the SQL query to select the latest four schedules
                        $sql = "SELECT * FROM shedule ORDER BY shedule_id DESC LIMIT 4";
                        $array_select = $this->db->query($sql)->result_array();
                        foreach ($array_select as $key => $shedule): ?>
                            <tr>
                                <td><?php echo $this->crud_model->get_type_name_by_id('doctor', $shedule['doctor_id']); ?></td> 
                                <td><?php echo date('d M Y', $shedule['avail_day']); ?></td>
                                <td><?php echo $shedule['start_time']; ?></td>
                                <td><?php echo $shedule['end_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url(); ?>patient/add_appointment" class="btn btn-primary btn-lg enable" tabindex="-1" role="button" aria-disabled="true">Add Appointment</a>
            </div>
        </div>
    </div>
</div>
