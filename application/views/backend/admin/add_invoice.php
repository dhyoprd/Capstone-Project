<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <?php echo get_phrase('Add Invoice'); ?></div>
            <div class="panel-body">
            <?php if (isset($appointment)): ?>
                <?php echo form_open(base_url() . 'payment/add_invoices/create/' . $appointment['appointment_id'], [
                        'class' => 'form-horizontal form-groups-bordered validate',
                        'enctype' => 'multipart/form-data'
                    ]); 
                ?>

                <?php
                function generateRandomString($length = 10) {
                    $characters = 'ABCDEFGHIJKLMNO0123456789PQRSTUVWXYZ0123456789ABCDEFGHIJ0123456789KLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }
                ?>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Invoice Number'); ?></label>
                    <div class="col-sm-12">
                        <input name="invoice_number" value="<?php echo generateRandomString(); ?>" readonly="true" type="text" class="form-control" required>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Title'); ?></label>
                    <div class="col-sm-12">
                        <input name="title" type="text" class="form-control" required>
                    </div>
                </div> -->
                <div class="form-group">
                        <label class="col-md-12" for="appointment_id"><?php echo get_phrase('Appointment id'); ?>*</label>
                        <div class="col-md-12">
                            <input type="text" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>

                    <input type="hidden" name="patient_id" value="<?php echo $appointment['patient_id']; ?>">
                    
                <div class="form-group">
                        <label class="col-md-12" for="patient_name"><?php echo get_phrase('patient_name'); ?>*</label>
                        <div class="col-md-12">
                            <input type="text" name="patient_name" value="<?php echo $this->crud_model->get_type_name_by_id('patient', $appointment['patient_id']); ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Date Created'); ?></label>
                    <div class="col-sm-12">
                        <input name="date_created" type="date" id="date" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('Due Date'); ?></label>
                    <div class="col-sm-12">
                        <input name="due_date" type="date" id="date" class="form-control">
                    </div>
                </div>

                <div id="doc_entries">
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('invoice_entry'); ?></label>

                        <div class="col-md-3">
                            <select class="form-control invoice_select" name="entry_invoice[]" data-style="btn-primary btn-outline" required onchange="updateInvoiceEntry(this)">
                                <option data-tokens=""><?php echo get_phrase('Select Invoice'); ?></option>
                                <option data-tokens="Tambal" data-price="200000"><?php echo get_phrase('Tambal'); ?></option>
                                <option data-tokens="Cabut Gigi" data-price="100000"><?php echo get_phrase('Cabut Gigi'); ?></option>
                                <option data-tokens="Scalling" data-price="100000"><?php echo get_phrase('Scalling'); ?></option>
                                <option data-tokens="Pulpitis" data-price="150000"><?php echo get_phrase('Pulpitis'); ?></option>

                                <?php
                                $medicine = $this->db->get('medicine')->result_array();
                                foreach ($medicine as $row): ?>
                                    <option value="<?php echo $row['medicine_id']; ?>" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['price']; ?>" data-quantity="<?php echo $row['quantity']; ?>"><?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        

                        <div class="col-md-2">
                            <input type="text" class="form-control white-bg invoice_price" name="invoice_price[]" placeholder="Invoice Price" readonly>
                            <input type="hidden" name="invoice_name[]" class="invoice_name">
                        </div>

                        <div class="col-md-2">
                            <input type="number" class="form-control invoice_quantity" name="invoice_quantity[]" placeholder="Quantity" min="1" onchange="updateInvoiceTotal(this)">
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control white-bg invoice_total" name="invoice_total[]" placeholder="Invoice Total" readonly>
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-info btn-circle btn-sm" onClick="deleteParentElement(this)"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-info btn-sm btn-rounded btn-block" onClick="doc_entry()"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add More'); ?></button>

                <hr>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="radio" class="check" id="square-radio-1" name="status" value="1" checked data-radio="iradio_square-red" required>
                        <label for="square-radio-1"><?php echo get_phrase('Unpaid Invoice'); ?></label>
                        <input type="radio" class="check" id="square-radio-2" name="status" value="2" data-radio="iradio_square-red" required>
                        <label for="square-radio-2"><?php echo get_phrase('Paid Invoice'); ?></label>
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-success btn-block btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('Save'); ?></button>
                <?php echo form_close(); ?>
                <?php else: ?>
                    <p><?php echo get_phrase('No appointment found.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function updateInvoiceEntry(selectElement) {
        var formGroup = selectElement.closest('.form-group');
        var priceInput = formGroup.querySelector('.invoice_price');
        var nameInput = formGroup.querySelector('.invoice_name');
        var quantityInput = formGroup.querySelector('.invoice_quantity');
        var totalInput = formGroup.querySelector('.invoice_total');

        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        var name = selectedOption.getAttribute('data-name');

        priceInput.value = price ? price : '';
        nameInput.value = name ? name : '';

        // Update invoice total if quantity is already set
        updateInvoiceTotal(quantityInput);
    }

    function updateInvoiceTotal(quantityInput) {
        var formGroup = quantityInput.closest('.form-group');
        var priceInput = formGroup.querySelector('.invoice_price');
        var totalInput = formGroup.querySelector('.invoice_total');
        var quantity = parseFloat(quantityInput.value);
        var price = parseFloat(priceInput.value);

        if (!isNaN(quantity) && !isNaN(price)) {
            totalInput.value = quantity * price;
        } else {
            totalInput.value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.invoice_select').forEach(function(select) {
            updateInvoiceEntry(select);
        });
    });

    function doc_entry() {
        var docEntries = document.getElementById('doc_entries');
        var newEntry = docEntries.firstElementChild.cloneNode(true);
        newEntry.querySelector('.invoice_price').value = '';
        newEntry.querySelector('.invoice_name').value = '';
        newEntry.querySelector('.invoice_quantity').value = '';
        newEntry.querySelector('.invoice_total').value = '';
        newEntry.querySelector('.invoice_select').selectedIndex = 0;
        docEntries.appendChild(newEntry);
    }

    function deleteParentElement(n) {
        n.closest('.form-group').remove();
    }

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
