<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading"> <?php echo get_phrase("Print Prescription");?>
							
					<a href="<?php echo base_url();?>prescription/list_prescription" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					
					<a href="<?php echo base_url();?>prescription/add_prescription" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('New Prescription');?>
                    </a>
					
					<button type="button" name="b_print" class="btn btn-xs btn-info" onClick="printdiv('div_print');"><i class="fa fa-print"></i>
					<?php echo get_phrase('print');?></button>	
			</div>
			<div class="panel-body table-responsive" id="div_print">
    <?php foreach($select_prescription_by_id as $key => $prescription):?> 
        <table class="table" width="1030" border="1">
 
 <div class="alert alert-default" align="center"><img src="<?php echo base_url() ?>uploads/logo.png"  class="img-circle" width="80" height="80"/>
					<h3><?php echo $system_name;?></h3>
					<?php $address = $this->db->get_where('settings', array('type' => 'address'))->row()->description;?>
					<?php echo $address; ?>
					<h5><?php $phone = $this->db->get_where('settings', array('type' => 'phone'))->row()->description;?></h5>
					<?php echo $phone; ?>&nbsp;&nbsp;Email:&nbsp;&nbsp;<?php $system_email = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;?>
					<?php echo $system_email; ?>
					
					<!-- Informasi Dokter -->
					</div>
					<hr>
					<tr>
						<td colspan="3"><div class="alert alert-info">DOCTOR DETAILS</div> </td>
				  	</tr>
 
					  <tr>
						
						<td width="135"><div align="right">Doctor Name</div></td>
						<td colspan="2">&nbsp;&nbsp;<?php echo $this->crud_model->get_type_name_by_id('doctor',$prescription['doctor_id']);?></td>  
					 </tr>
					
					
					  <tr>
						<td><div align="right">Doctor Gender</div></td>
						<td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('doctor', array('doctor_id' => $prescription['doctor_id']))->row()->gender; ?></td>
					  </tr>
					  
					  <tr>
						<td><div align="right">Doctor Phone</div></td>
						<td>&nbsp;&nbsp;<?php echo $this->db->get_where('doctor', array('doctor_id' => $prescription['doctor_id']))->row()->phone; ?></td>
					  </tr>
					  
					  
					<!-- Informasi Pasien -->
				  	<tr>
						<td colspan="3"><div class="alert alert-info">PATIENT DETAILS</div> </td>
				  	</tr>
					
					<tr>
						<tr>
						
						<td width="135"><div align="right">Patient Name</div></td>
						<td colspan="2">&nbsp;&nbsp;<?php echo $this->crud_model->get_type_name_by_id('patient', $prescription['patient_id']);?></td>  
					</tr>
						
					
				   <tr>
						<td><div align="right">Patient Sex</div></td>
						<td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('patient', array('patient_id' => $prescription['patient_id']))->row()->sex;?></td>
				  </tr>
				  
				  <tr>
						<td><div align="right">Patient Age</div></td>
						<td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('patient', array('patient_id' => $prescription['patient_id']))->row()->age;?></td>
				  </tr>
				  
				  <tr>
						<td><div align="right">Patient Occupation</div></td>
						<td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('patient', array('patient_id' => $prescription['patient_id']))->row()->occupation;?></td>
				  </tr>
  
					<tr>
						<td><div align="right">Prescription Code</div></td>
						<td colspan="2">&nbsp;&nbsp;<strong><?php echo $prescription['prescription_code'];?></strong></td>
				  </tr>
  
					
				  
					  <tr>
							<td><div align="right">Weight</div></td>
							<td colspan="2">&nbsp;&nbsp;<?php echo $prescription['weight'];?></td>
					  </tr>
  
					   <tr>
							<td><div align="right">Height</div></td>
							<td colspan="2">&nbsp;&nbsp;<?php echo $prescription['height'];?></td>
					  </tr>

					  
  
					  <tr>
							<td><div align="right">Prescription Type</div></td>
							<td colspan="2">&nbsp;&nbsp;
                            
                            
                            <span class="label label-<?php if($prescription['prescription_type'] == '1') echo 'success'; else echo 'warning';?>">
                                            <?php if($prescription['prescription_type'] == '1'):?>
                                            <?php echo 'New Prescription';?>
                                            <?php endif;?>
                                            <?php if($prescription['prescription_type'] == '2'):?>
                                            <?php echo 'Old Prescription';?>
                                            <?php endif;?>
                            </span>
                            </td>
					  </tr>
 
					  
  
						<tr>
							<td><div align="right">Case History</div></td>
							<td colspan="2">&nbsp;&nbsp;<?php echo $prescription['case_history'];?></td>
					  </tr>
 			</table>
    <?php endforeach;?>


			<div class="alert alert-info">DIAGNOSE INFORMATION</div>
			<table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
					<thead>
						<tr>
							 <th>#</th>
							 <th><?php echo get_phrase('Tooth Number'); ?></th>
							 <th><?php echo get_phrase('Dental Part'); ?></th>
							 <th><?php echo get_phrase('Dental Diseases'); ?></th>
							<th><?php echo get_phrase('Notes'); ?></th>
							
							
						</tr>
					</thead>
					<tbody>

	  
	  <?php $odontogram_entries = json_decode($prescription['odontogram_entries']); 
	 			 $i = 1;
	  			foreach($odontogram_entries as $key => $odontogram_entry) : ?>
						<tr>
							<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $odontogram_entry->nomor_gigi;?></td>
							
							<td><?php echo $odontogram_entry->bagian_gigi; ?></td>
							<td><?php echo $odontogram_entry->penyakit_gigi;?></td>
							<td><?php echo $odontogram_entry->catatan;?></td>
							
						</tr>
				  <?php endforeach;?>
					</tbody>
					<tbody>
			

				<table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
					<thead>
						<tr>
							 <th>#</th>
							 <th><?php echo get_phrase('Diagnose'); ?></th>
							 <th><?php echo get_phrase('Medicine Name'); ?></th>
							 <th><?php echo get_phrase('Medicine Type'); ?></th>
							<th><?php echo get_phrase('Prescription'); ?></th>
							<th><?php echo get_phrase('Usage Days'); ?></th>
							
						</tr>
					</thead>
					<tbody>

	  
					<?php 
        $prescription_entries = json_decode($prescription['prescription_entries']); 
        $i = 1;
        foreach($prescription_entries as $key => $prescription_entry) : ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $prescription_entry->diagnose;?></td>
                <td>
                    <?php 
                    // Fetch medicine name from database using medicine ID
                    $medicine_name = $this->db->get_where('medicine', array('medicine_id' => $prescription_entry->medicine_name))->row()->name;
                    echo $medicine_name;
                    ?>
                </td>
				<td>
            		<?php 
            		// Fetch medicine type name from database using medicine type ID
            		$medicine_type = $this->db->get_where('med_category', array('med_category_id' => $prescription_entry->medicine_type))->row()->name;
            		echo $medicine_type;
            		?>
        		</td>
                
                <td><?php echo $prescription_entry->usage_prescription;?></td>
                <td><?php echo $prescription_entry->usage_days;?></td>
            </tr>
        <?php endforeach;?>
					</tbody>
					<!-- Tanda tangan Dokter dan Pasien -->
                    <tr>
                        <td colspan="6"></td> <!-- Add an empty cell to span the entire width -->
                    </tr>
                    <tr>
                        <td colspan="6">
                            <!-- Tanda tangan Dokter -->
                            <div style="float: right; margin-right: 50px;">
                                <p><?php echo get_phrase('Doctor Signature'); ?></p>
								<p>&nbsp;</p>
                                <p><?php echo $this->crud_model->get_type_name_by_id('doctor', $prescription['doctor_id']); ?></p>
                            </div>
                            <!-- Tanda tangan Pasien -->
                            <div style="float: left; margin-left: 50px;">
                                <p><?php echo get_phrase('Patient Signature'); ?></p>
								<p>&nbsp;</p>
								
                                <?php echo $this->crud_model->get_type_name_by_id('patient', $prescription['patient_id']); ?></p> 
                            </div>
                        </td>
                    </tr>
				</table>
				

				

            </div>
		</div>
	</div>
</div>
	<script language="javascript">
		function printdiv(printpage){
		var headstr = "<html><head><title></title></head><body>";
		var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = headstr+newstr+footstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}
	</script>