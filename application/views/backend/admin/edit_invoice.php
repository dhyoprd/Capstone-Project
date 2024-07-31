<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('edit_invoice');?>
            </div>
            <div class="panel-body">
                <?php foreach ($select_invoice_by_id as $key => $value) { ?>
                <?php echo form_open(base_url() . 'payment/add_invoices/update/' . $value['invoice_id'], 
                array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                    
                <div class="form-group">
                    <label class="col-sm-12"><?php echo get_phrase('patient');?>*</label>
                    <div class="col-sm-12">
                        <select class="select2 form-control" id="patient_id" name="patient_id" onchange="return get_doctor_patient_edit(this.value, <?php echo $prescription_id;?>)" required>
                            <option data-tokens=""><?php echo get_phrase('select_patient');?></option>
                            <?php 
                            $patient = $this->db->get('patient')->result_array();
                            foreach($patient as $row):
                            ?>
                                <option value="<?php echo $row['patient_id'];?>"<?php if($value['patient_id'] == $row['patient_id']) echo 'selected="selected"';?>><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('date_created'); ?></label>
                    <div class="col-sm-12">
                        <input name="date_created" type="date" id="date" value="<?php echo date('Y-m-d', $value['date_created']);?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('due_date'); ?></label>
                    <div class="col-sm-12">
                        <input name="due_date" type="date" id="date" value="<?php echo date('Y-m-d', $value['due_date']);?>" class="form-control" required>
                    </div>
                </div>

                <div id="doc_entries">
                    <?php 
                    $invoice_entries = json_decode($value['invoice_entries'], true); 
                    $medicine_map = array();
                    $medicine = $this->db->get('medicine')->result_array();
                    foreach ($medicine as $med) {
                        $medicine_map[$med['medicine_id']] = $med['name'];
                    }
                    foreach($invoice_entries as $key => $invoice_entry) : 
                        $invoice_name = $invoice_entry['invoice_name'];
                        $invoice_price = $invoice_entry['invoice_price'];
                        $invoice_quantity = $invoice_entry['invoice_quantity'];
                        $invoice_total = $invoice_entry['invoice_total'];
                        
                    ?>
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('invoice_entry'); ?></label>

                        <div class="col-md-3">
                            <select class="form-control invoice_select" name="entry_invoice[]" data-style="btn-primary btn-outline" onchange="updateInvoiceEntry(this)" required>
                                <option data-tokens=""><?php echo get_phrase('Select Invoice'); ?></option>
                                <option value="Tambal" data-price="200000" <?php if($invoice_name == 'Tambal') echo 'selected'; ?>><?php echo get_phrase('Tambal'); ?></option>
                                <option value="Cabut Gigi" data-price="100000" <?php if($invoice_name == 'Cabut Gigi') echo 'selected'; ?>><?php echo get_phrase('Cabut Gigi'); ?></option>
                                <option value="Scalling" data-price="100000" <?php if($invoice_name == 'Scalling') echo 'selected'; ?>><?php echo get_phrase('Scalling'); ?></option>
                                <option value="Pulpitis" data-price="150000" <?php if($invoice_name == 'Pulpitis') echo 'selected'; ?>><?php echo get_phrase('Pulpitis'); ?></option>
                                
                                <?php
                                foreach ($medicine as $row): ?>
                                    <option value="<?php echo $row['medicine_id']; ?>" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['price']; ?>" <?php if($invoice_name == $row['medicine_id']) echo 'selected'; ?>><?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control white-bg invoice_price" name="invoice_price[]" value="<?php echo $invoice_price; ?>" placeholder="Invoice Price" readonly>
                            <input type="hidden" name="invoice_name[]" class="invoice_name" value="<?php echo $invoice_name; ?>">
                        </div>

                        <div class="col-md-2">
                            <input type="number" class="form-control invoice_quantity" name="invoice_quantity[]" value="<?php echo $invoice_quantity; ?>" placeholder="Quantity" min="1" onchange="updateInvoiceTotal(this)">
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control white-bg invoice_total" name="invoice_total[]" value="<?php echo $invoice_total; ?>" placeholder="Invoice Total" readonly>
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-info btn-circle btn-sm" onClick="deleteParentElement(this)"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <?php endforeach;?>    
                </div>
                
                <button type="button" class="btn btn-info btn-sm btn-rounded btn-block" onClick="doc_entry()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add More');?></button> 

                <hr>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="radio" class="check" id="square-radio-1" name="status" value="1" <?php if($value['status'] == '1') echo 'checked';?> data-radio="iradio_square-red" required>
                        <label for="square-radio-1"><?php echo get_phrase('Unpaid Invoice');?></label>        
                        
                        <input type="radio" class="check" id="square-radio-2" name="status" value="2" <?php if($value['status'] == '2') echo 'checked';?> data-radio="iradio_square-red" required>
                        <label for="square-radio-2"><?php echo get_phrase('Paid Invoice');?></label>
                    </div>
                </div>
                                 
                <hr>
                <button type="submit" class="btn btn-success btn-block btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Save');?></button>
                <?php echo form_close();?>   
                <?php } ?>             
            </div>
        </div>
    </div>
</div>

<script>
    function updateInvoiceEntry(selectElement) {
        var priceInput = selectElement.closest('.form-group').querySelector('.invoice_price');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        priceInput.value = price ? price : '';

        // Trigger the update of invoice total when the price is updated
        updateInvoiceTotal(selectElement.closest('.form-group').querySelector('.invoice_quantity'));
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initial update of prices based on selected options
        document.querySelectorAll('.invoice_select').forEach(function(select) {
            updateInvoiceEntry(select);
        });
    });

    function doc_entry() {
        var docEntries = document.getElementById('doc_entries');
        var newEntry = docEntries.firstElementChild.cloneNode(true);
        newEntry.querySelector('.invoice_price').value = '';
        newEntry.querySelector('.invoice_select').selectedIndex = 0;
        newEntry.querySelector('.invoice_quantity').value = '';
        newEntry.querySelector('.invoice_total').value = '';
        docEntries.appendChild(newEntry);

        // Update prices for the newly added entry
        updateInvoiceEntry(newEntry.querySelector('.invoice_select'));
    }

    function deleteParentElement(n) {
        n.closest('.form-group').remove();
    }

    function updateInvoiceTotal(quantityInput) {
        var parentFormGroup = quantityInput.closest('.form-group');
        var price = parseFloat(parentFormGroup.querySelector('.invoice_price').value);
        var quantity = parseInt(quantityInput.value);
        var total = isNaN(price) || isNaN(quantity) ? 0 : price * quantity;
        parentFormGroup.querySelector('.invoice_total').value = total; // Adjust as needed for formatting
    }

    // Event listener for invoice_select change
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('invoice_select')) {
            updateInvoiceEntry(e.target);
        } else if (e.target.classList.contains('invoice_quantity')) {
            updateInvoiceTotal(e.target);
        }
    });
</script>

<style>
    .white-bg {
        background-color: white !important;
        color: black;
    }
</style>
