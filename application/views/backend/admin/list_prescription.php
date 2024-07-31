<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('List Prescription'); ?></div>
            <div class="panel-body table-responsive">
                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('prescription code'); ?></th>
                            <th><?php echo get_phrase('Appointment Code'); ?></th>
                            <th><?php echo get_phrase('Patient Name'); ?></th>
                            <th><?php echo get_phrase('Prescription Date'); ?></th>
                            <th><?php echo get_phrase('Status'); ?></th>
                            <th><?php echo get_phrase('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($appointment)): ?>
                            <?php $get_all_prescriptions = $this->crud_model->select_prescription_appointment(); ?>
                            <?php foreach ($get_all_prescriptions as $prescription): ?>
                                <tr>
                                    <td><?php echo $prescription['prescription_code']; ?></td>
                                    <td><?php echo $this->crud_model->get_type_appointment_by_id ('appointment', $prescription['appointment_id']);?></td>
                                    <td><?php echo $this->crud_model->get_type_name_by_ids('patient', $prescription['patient_id']); ?></td>
                                    <td><?php echo date('d M Y', $prescription['pres_date']); ?></td>
                                    <td>
                                        <span class="label label-<?php echo $prescription['prescription_type'] == '1' ? 'success' : 'warning'; ?>">
                                            <?php echo $prescription['prescription_type'] == '1' ? 'New Prescription' : 'Old Prescription'; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>prescription/view_prescription/<?php echo $prescription['prescription_id']; ?>">
                                            <button type="button" class="btn btn-success btn-circle btn-xs">
                                                <i class="fa fa-print"></i>
                                            </button>
                                        </a>
                                        <a href="<?php echo base_url(); ?>prescription/edit_prescription/<?php echo $prescription['prescription_id']; ?>">
                                            <button type="button" class="btn btn-primary btn-circle btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>prescription/add_prescriptions/delete/<?php echo $prescription['prescription_id']; ?>');">
                                            <button type="button" class="btn btn-danger btn-circle btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
