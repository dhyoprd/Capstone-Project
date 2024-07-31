<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
		
				<div class="panel-heading"> <?php echo get_phrase('edit_prescription');?></div>
                <div class="panel-body">
                
                <?php foreach ($select_prescription_by_id as $key => $value) { ?>
                <?php
                    // Fetch appointment details
                    $appointment_id = $value['appointment_id'];
                    $appointment = $this->db->get_where('appointment', array('appointment_id' => $appointment_id))->row_array();
                    
                    // Fetch patient details
                    $patient_id = $appointment['patient_id'];
                    $patient_name = $this->crud_model->get_type_name_by_id('patient', $patient_id);

                    // Fetch doctor details
                    $doctor_id = $appointment['doctor_id'];
                    $doctor_name = $this->crud_model->get_type_name_by_id('doctor', $doctor_id);
                    ?>
					<?php echo form_open(base_url() . 'prescription/add_prescriptions/update/'. $value['prescription_id'] , 
					array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
					
                   
                    

                    <div class="form-group">
                        <label class="col-md-12" for="patient_name"><?php echo get_phrase('patient_name'); ?>*</label>
                        <div class="col-md-12">
                            <input type="text" name="patient_name" value="<?php echo $patient_name; ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="doctor_name"><?php echo get_phrase('doctor_name'); ?>*</label>
                        <div class="col-md-12">
                            <input type="text" name="doctor_name" value="<?php echo $doctor_name; ?>" class="form-control" readonly>
                        </div>
                    </div>

                        <div id="select_doctor_patient_holder"></div>

                        

						
						
						
                        <div class="form-group">
                            <label class="col-md-12" for="example-text"><?php echo get_phrase('weight'); ?></label>
                            <div class="col-sm-12">
                                    <input name="weight" value="<?php echo $value['weight'];?>" type="text" class="form-control"/ required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12" for="example-text"><?php echo get_phrase('height'); ?></label>
                            <div class="col-sm-12">
                                    <input name="height" value="<?php echo $value['height'];?>" type="text" class="form-control"/ required>
                            </div>
                        </div>

                        <div class="form-group">
                    <label class="col-md-12"
                        for="example-text"><?php echo get_phrase('prescription_date'); ?>*</span></label>
                    <div class="col-md-12">
                        <input class="form-control " name="pres_date" type="date" value="<?php echo date('Y-m-d'); ?>"
                            id="example-date-input" required>
                    </div>
                </div>


                        <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('case_history');?></label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="mymce" name="case_history"><?php echo $value['case_history'];?></textarea>
                            </div>
                        </div>
                        <div id="odontogram_entries">
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('Add Odontogram'); ?></label>
                        <div class="panel-body">
                            <!-- Modal -->
                            <div class="modal fade" id="catatanModal" tabindex="-1" role="dialog"
                                aria-labelledby="catatanModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="panel-heading" style="padding-top: 20px; padding-bottom:10px;">
                                            <div class="modal-title" id="catatanModalLabel">Tambah Catatan</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form untuk menyimpan catatan -->
                                            <form action="<?php echo base_url('odontogram/simpan_catatan'); ?>"
                                                method="post">
                                                <div class="form-group">
                                                    <label for="nomor_gigi">Nomor Gigi:</label>
                                                    <input type="text" class="form-control" id="nomor_gigi"
                                                        name="nomor_gigi[]" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="col-md-12"><?php echo get_phrase('Bagian Gigi'); ?></label>
                                                    <div class="col-md-12">
                                                        <div class="checkbox-group">
                                                                                                 <label class="checkbox-inline" style="font-size: 13px;">
                                                            <input type="checkbox" name="bagian_gigi[]" value="gigi atas"> <?php echo get_phrase('Mesial');?>
                                                        </label>
                                                        <label class="checkbox-inline" style="font-size: 14px;">
                                                            <input type="checkbox" name="bagian_gigi[]" value="gigi bawah"> <?php echo get_phrase('Distal');?>
                                                        </label>
                                                        <label class="checkbox-inline" style="font-size: 14px;">
                                                            <input type="checkbox" name="bagian_gigi[]" value="gigi tengah"> <?php echo get_phrase('Buccal');?>
                                                        </label>
                                                        <label class="checkbox-inline" style="font-size: 14px;">
                                                            <input type="checkbox" name="bagian_gigi[]" value="gigi kanan"> <?php echo get_phrase('Lingual');?>
                                                        </label>
                                                        <label class="checkbox-inline" style="font-size: 14px;">
                                                            <input type="checkbox" name="bagian_gigi[]" value="gigi kiri"> <?php echo get_phrase('Occlusal');?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        class="col-md-12"><?php echo get_phrase('Penyakit Gigi'); ?></label>
                                                    <div class="col-md-12">
                                                        <select class="select2 form-control" name="penyakit_gigi[]"
                                                            data-toggle="select2" required>
                    <option value=""><?php echo get_phrase('Choose a dental disease');?></option>
                    <!-- Mulaiu dari sini list giginya -->
                    <!--<option value="Karies Gigi"><?php echo get_phrase('Karies Gigi');?></option>-->
                    <!--<option value="Gigi Sensitif"><?php echo get_phrase('Gigi Sensitif');?></option>-->
                    <!--<option value="Gigi Goyang"><?php echo get_phrase('Gigi Goyang');?></option>-->
                    <!--<option value="Gusi Bengkak"><?php echo get_phrase('Gusi Bengkak');?></option>-->
                    <option value="Hiperemi Pulpa"><?php echo get_phrase('HP');?></option>
                    <option value="Gangren Pulpa"><?php echo get_phrase('GP');?></option>
                    <option value="Gangren Radiks"><?php echo get_phrase('GR');?></option>
                    <option value="Persistensi"><?php echo get_phrase('Persistensi');?></option>
                    <option value="Abses"><?php echo get_phrase('Abses');?></option>
                    <option value="Gingi vits"><?php echo get_phrase('Gingivits');?></option>
                    <option value="Pulpitis"><?php echo get_phrase('Pulpitis'
                    );?></option>
                    <option value="Presistensi"><?php echo get_phrase('Presistensi'
                    );?></option>
                                                            <!-- Tinggal tambah kalau ada lagi -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <label for="catatan">Catatan:</label>
                                                <textarea class="form-control" id="catatan" name="catatan[]"
                                                    rows="3"></textarea>
                                                <!-- Startnya link Kamus Gigi -->
                                                <div class="col-md-12 text-right">
                                                    <a href="<?php echo site_url('dictionary'); ?>" class="btn btn-link"><?php echo get_phrase('Kamus Gigi');?></a>
                                                </div>
                                                <!-- <button type="submit" class="btn btn-info btn-sm btn-block btn-rounded "  >Simpan</button> -->
                                                <button type="button"
                                                    class="btn btn-warning btn-sm btn-block btn-rounded"
                                                    onclick="temporary_save()" aria-label="Close"
                                                    style="margin-top: 15px ;">
                                                    <span aria-hidden="true" style="padding-top: 40px;">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tampilan Odontogram -->
                            <div class="odontogram-container" style="display: flex; justify-content: center;">
                <?php
                    // Tampilan kotak gigi dengan nomor gigi
                    // Tandai urutan gigi untuk gigi atas inget otak dipake
                        // Tandai urutan gigi untuk gigi atas
                        $upper_teeth_order = array(18, 17, 16, 15, 14, 13, 12, 11, '', 21, 22, 23, 24, 25, 26, 27, 28);
                        // Tandai urutan gigi untuk gigi bawah
                        $lower_teeth_order = array(48, 47, 46, 45, 44, 43, 42, 41, '', 31, 32, 33, 34, 35, 36, 37, 38);
                        // Tampilkan kotak gigi untuk gigi anak atas
                        $upper_teeth_order_child = array(55, 54, 53, 52, 51, '' ,61, 62, 63, 64, 65);
                        // Tampilkan kotak gigi untuk gigi anak bawah
                        $lower_teeth_order_child = array(85, 84, 83, 82, 81, '' ,71, 72, 73, 74, 75);
                                // ini java s menampilkan gigi atas
                    echo '<div style="width: 100%; height: 20px;"></div>';
                    foreach ($upper_teeth_order as $tooth) {
                        if ($tooth === '') {
                            echo '<div style="width: 50px; height: 50px;"></div>'; // buatkan stye dini buat Spasi antara gigi 11 dan 21
                        } else {
                            echo '<div class="gigi-wrapper"><div id="tooth_'.$tooth.'" class="gigi" onclick="tambah_catatan('.$tooth.')">'.$tooth.'</div></div>';
                        }
                    }
                    echo '<div style="width: 100%; height: 20px;"></div>';
                    foreach ($upper_teeth_order_child as $tooth) {
                      if ($tooth === '') {
                          echo '<div style="width: 50px; height: 50px;"></div>'; // buatkan stye dini buat Spasi antara gigi 11 dan 21
                      } else {
                          echo '<div class="gigi-wrapper"><div id="tooth_'.$tooth.'" class="gigi" onclick="tambah_catatan('.$tooth.')">'.$tooth.'</div></div>';
                      }
                  }
                  // Kalau ini buat spasi antara box gigi atas dan gigi bawah
                  echo '<div style="width: 100%; height: 20px;"></div>';
                  // ini java s menampilkan gigi bawah
                  foreach ($lower_teeth_order_child as $tooth) {
                      if ($tooth === '') {
                          echo '<div style="width: 50px; height: 50px;"></div>'; // buatkan stye dini buat Spasi antara gigi 11 dan 21
                      } else {
                          echo '<div class="gigi-wrapper"><div id="tooth_'.$tooth.'" class="gigi" onclick="tambah_catatan('.$tooth.')">'.$tooth.'</div></div>';
                      }
                  }
                    // Kalau ini buat spasi antara box gigi atas dan gigi bawah
                    echo '<div style="width: 100%; height: 20px;"></div>';
                    // ini java s menampilkan gigi bawah
                    foreach ($lower_teeth_order as $tooth) {
                        if ($tooth === '') {
                            echo '<div style="width: 50px; height: 50px;"></div>'; // buatkan stye dini buat Spasi antara gigi 11 dan 21
                        } else {
                            echo '<div class="gigi-wrapper"><div id="tooth_'.$tooth.'" class="gigi" onclick="tambah_catatan('.$tooth.')">'.$tooth.'</div></div>';
                        }
                    }
                ?>
                            </div>
                        </div>
                    </div>

                    <!-- CSS untuk memperjegeg tampilan -->
                    <style>
                        .odontogram-container {
                            display: flex;
                            flex-wrap: wrap;
                        }

                        .gigi-wrapper {
                            width: 50px;
                            height: 50px;
                            margin: 5px;
                        }

                        .gigi {
                            width: 100%;
                            height: 100%;
                            border: 1px solid grey;
                            border-radius: 10%;
                            text-align: center;
                            line-height: 50px;
                            cursor: pointer;
                            background-color: #59aeed;
                            color: white;
                        }

                        .modal-header {
                            background-color: green;
                            /* Ganti warna header modal 
        color: white; /* Warna teks header modal */
                        }
                    </style>

                    <!-- JavaScript untuk menangani fungsi tambah_catatan() -->
                    <script type="text/javascript">
                        // Fungsi untuk menambahkan catatan gigi
                        let odontogramEntries = [];

                        function temporary_save() {
                            const nomorGigi = $('#nomor_gigi').val();
                            const bagianGigi = $('input[name="bagian_gigi[]"]:checked').map(function () {
                                return $(this).val();
                            }).get();
                            const penyakitGigi = $('select[name="penyakit_gigi[]"]').val();
                            const catatan = $('#catatan').val();

                            const odontogramEntry = {
                                nomor_gigi: nomorGigi,
                                bagian_gigi: bagianGigi,
                                penyakit_gigi: penyakitGigi,
                                catatan: catatan
                            };

                            let existOdontogramEntry = odontogramEntries.find((odontogram) => odontogram.nomor_gigi === odontogramEntry.nomor_gigi);

                            if (existOdontogramEntry) {
                                if (bagianGigi.length == 0 && penyakitGigi == '' && catatan == '') {
                                    odontogramEntries = odontogramEntries.filter((odontogram) => {
                                        return odontogram.nomor_gigi != nomorGigi;
                                    });
                                } else {
                                    existOdontogramEntry.bagian_gigi = bagianGigi;
                                    existOdontogramEntry.penyakit_gigi = penyakitGigi;
                                    existOdontogramEntry.catatan = catatan;
                                }
                            } else {
                                if (bagianGigi.length == 0 && penyakitGigi == '' && catatan == '') {
                                    odontogramEntries.filter((odontogram) => {
                                        return odontogram.nomor_gigi !== nomorGigi;
                                    });
                                } else {
                                    odontogramEntries.push(odontogramEntry);
                                }
                            }

                            $('#temporary_odontogram_entries').val(JSON.stringify(odontogramEntries));
                            $('#catatanModal').modal('hide');
                        }

                        function tambah_catatan(nomor_gigi) {
                            let bagianGigi = [];
                            let penyakitGigi = '';
                            let catatan = '';

                            const existOdontogramEntry = odontogramEntries.find((odontogram) => odontogram.nomor_gigi == nomor_gigi);

                            if (existOdontogramEntry) {
                                bagianGigi = existOdontogramEntry.bagian_gigi;
                                penyakitGigi = existOdontogramEntry.penyakit_gigi;
                                catatan = existOdontogramEntry.catatan;
                            }

                            // Menetapkan nomor gigi ke input tersembunyi pada form
                            $('#nomor_gigi').val(nomor_gigi);

                            if (bagianGigi.length > 0) {
                                bagianGigi.forEach((checkedBagianGigi) => {
                                    $(`input[name="bagian_gigi[]"][value="${checkedBagianGigi}"]`).prop('checked', true);
                                });
                            } else {
                                $('input[name="bagian_gigi[]"]').prop('checked', false);
                            }

                            $('select[name="penyakit_gigi[]"]').val(penyakitGigi).trigger('change');

                            $('#catatan').val(catatan);

                            // Menampilkan modal tambah catatan
                            $('#catatanModal').modal('show');
                        }
                        function tambah_catatan(nomor_gigi) {
          // Menetapkan nomor gigi ke input tersembunyi pada form
          document.getElementById('nomor_gigi').value = nomor_gigi;
          // Tampilan tambah catatan
          $('#catatanModal').modal('show');
          // Mendapatkan elemen kotak gigi
          var toothElement = document.getElementById('tooth_' + nomor_gigi);
          // Logika Cek apakah kotak gigi sudah berwarna merah atau tidak
          if (toothElement.style.backgroundColor === 'red') {
            // Logika cek apakah sudah berwarna merah, hapus warna merahnya
            toothElement.style.backgroundColor = '';
          } else {
            // Jika belum berwarna merah, tambahkan warna merah
            toothElement.style.backgroundColor = 'red';
          }
          }

                    </script>

                        <div id="doc_entries">

                        <?php $prescription_entries = json_decode($value['prescription_entries']); 
                        foreach($prescription_entries as $key => $prescription_entry) : ?>
                        
                        
                            <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('prescription_entry'); ?></label>
                                    <div class="col-md-3">
                                    <input name="entry_diagnose[]" type="text" class="form-control" value="<?php echo $prescription_entry->diagnose;?>">
                                    </div>

                                    <div class="col-md-2">
            <select class="select2 form-control" name="entry_medicine_name[]" required>
                <option data-tokens=""><?php echo get_phrase('select_medicine'); ?></option>
                <?php
                // Mengambil data obat dari database
                $medicine = $this->db->get('medicine')->result_array();
                // Looping melalui setiap obat yang diambil dari database
                foreach ($medicine as $row):
                    $selected = ($row['medicine_id'] == $prescription_entry->medicine_name) ? 'selected' : '';
                ?>
                    <option value="<?php echo $row['medicine_id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

       

                           

                                    <div class="col-md-2">
                                    <input name="entry_prescription[]" type="text" class="form-control" value="<?php echo $prescription_entry->usage_prescription;?>">
                                    </div>

                                    <div class="col-md-2">
                                    <input name="entry_days[]" type="text" class="form-control" value="<?php echo $prescription_entry->usage_days;?>">
                                    </div>

                                    <div class="col-md-1">
                                    <button type="button" class="btn btn-info btn-circle btn-sm" onClick="deleteParentElement(this)"><i class="fa fa-times"></i></button>
                                    </div>
						    </div>
                        <?php endforeach;?>
                        </div>

                        <div id="two_doc_entries">
                            <div class="form-group">
                                <label class="col-md-12"><?php echo get_phrase('prescription_entry'); ?></label>
                                    <div class="col-md-3">
                                    <input name="entry_diagnose[]" type="text" class="form-control" placeholder="<?php echo get_phrase('diagnose');?>">
                                    </div>

                                    <div class="col-md-2">
                                
                                <select class="select2 form-control" input name="entry_medicine_name[]" required>
                                
                                     <option data-tokens=""><?php echo get_phrase('select_medicine'); ?></option>
                                     <?php
                                        $medicine = $this->db->get('medicine')->result_array();  // Mengambil data obat dari database
                                         foreach ($medicine as $row):  // Looping melalui setiap obat yang diambil dari database
                                            ?>
                                        <option value="<?php echo $row['medicine_id']; ?>"><?php echo $row['name']; ?></option>  // Menampilkan nama obat dalam opsi dropdown
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            


                           

                                    <div class="col-md-2">
                                    <input name="entry_prescription[]" type="text" class="form-control" placeholder="<?php echo get_phrase('Usage Prescription');?>">
                                    </div>

                                    <div class="col-md-2">
                                    <input name="entry_days[]" type="text" class="form-control" placeholder="<?php echo get_phrase('Usage Days');?>">
                                    </div>

                                    <div class="col-md-1">
                                    <button type="button" class="btn btn-info btn-circle btn-sm" onClick="deleteParentElement(this)"><i class="fa fa-times"></i></button>
                                    </div>
                                    
						    </div>
                        </div>
                        <button type="button" class="btn btn-info btn-sm btn-rounded btn-block" onClick="two_doc_entry()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add More');?></button> 
                       
				
						<hr>
                        <div class="form-group">
							<div class="col-sm-12">
								    <input type="radio" class="check" id="square-radio-1" name="prescription_type" value="1" <?php if($value['prescription_type'] == '1') echo 'checked';?> data-radio="iradio_square-red" required>
                                	<label for="square-radio-1"><?php echo get_phrase('New Prescription');?></label>        
                                  	
                                      <input type="radio" class="check" id="square-radio-2" name="prescription_type" value="2" <?php if($value['prescription_type'] == '2') echo 'checked';?> data-radio="iradio_square-red" required>
                                 	<label for="square-radio-2"><?php echo get_phrase('Old Prescription');?></label>
							</div>
						</div>
								 
						<hr>
                                             
                        <button type="submit" class="btn btn-success btn-block btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                    <?php echo form_close();?>  
            <?php } ?>              
                        </div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
    function get_doctor_patient_edit(patient_id, prescription_id){
        $.ajax({
            url: '<?php echo base_url();?>prescription/get_doctor_patient_edit/' + patient_id + '/' + prescription_id,
            success: function(response){
                jQuery('#doctor_patient_holder').html(response);
            }
        });
    }

    </script>

    <script>
        $(document).ready(function() {
            var patient_id = $('#patient_id').val();
            var prescription_id = '<?php echo $prescription_id;?>';
            get_doctor_patient_edit(patient_id,prescription_id);
            
        });
    </script>


    
    <script type="text/javascript">
        // CREATING BLANK PRESCRIPTION ENTRY
        var blank_doc_entry = '';
            $(document).ready(function(){
            blank_doc_entry = $('#two_doc_entries').html();
        });

        function two_doc_entry(){
            $('#two_doc_entries').append(blank_doc_entry);
        }

        // REMOVING BLANK PRESCRIPTION ENTRY
        function deleteParentElement(n){
            n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        }
    </script>