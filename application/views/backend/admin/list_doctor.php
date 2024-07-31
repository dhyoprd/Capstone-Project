<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('list_doctors');?></div>
            <?php echo form_open(base_url() . 'admin/list_doctor/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
            <div class="panel-body table-responsive">
                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                
                                <th><?php echo get_phrase('doctor_name');?></th>
                                <th><?php echo get_phrase('email');?></th>
                                <th><?php echo get_phrase('phone');?></th>
                                <th><?php echo get_phrase('gender');?></th>
                                <th><?php echo get_phrase('qualification');?></th>
                                <th><?php echo get_phrase('Actions');?></th>
                            </tr>
                        </thead>
                        <tbody>
                <?php $get_all_doctors_from_doctor_model = $this->doctor_model->select_all_doctors();
                            foreach ($get_all_doctors_from_doctor_model as $key => $selected_doctors):?>
                            <tr>
                                
                                <td><?php echo $selected_doctors['name'];?></td>
                                <td><?php echo $selected_doctors['email'];?></td>
                                <td><?php echo $selected_doctors['phone'];?></td>
                                <td><?php echo $selected_doctors['gender'];?></td>
                                <td><?php echo $selected_doctors['qualification'];?></td>
                                
                                <td>
                                <a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_doctor/<?php echo $selected_doctors['doctor_id'];?>')" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url();?>admin/add_doctor/delete/<?php echo $selected_doctors['doctor_id'];?>" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-circle btn-xs" style="color:white"><i class="fa fa-times"></i></a>
                                
                                </td>							
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>