<?php foreach($select_invoice_by_id as $key => $row) : ?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-body table-responsive">
                <?php echo get_phrase('print_invoice');?>
                <a href="<?php echo base_url();?>payment/list_invoice" 
                   class="btn btn-orange btn-xs pull-right"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                </a>
                <hr>

                <div id="invoice_print">
                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td width="50%"><img src="<?php echo base_url() ?>uploads/logo.png" style="max-height:80px;"></td>
                            <td align="right">
                                <h4><?php echo get_phrase('invoice_number'); ?> : <?php echo $row['invoice_number']; ?></h4>
                                <h5><?php echo get_phrase('issue_date'); ?> : <?php echo date('d M, Y', $row['date_created']); ?></h5>
                                <h5><?php echo get_phrase('due_date'); ?> : <?php echo date('d M, Y', $row['due_date']); ?></h5>
                                <h5><?php echo get_phrase('status'); ?> : <span class="label label-<?php echo ($row['status'] == '1') ? 'danger' : 'success'; ?>">
                                    <?php echo ($row['status'] == '1') ? 'Unpaid Invoice' : 'Paid Invoice'; ?>
                                </span></h5>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h4><?php echo get_phrase('Patient Name'); ?></h4>
                    <table width="100%" border="0">    
                        <tr>
                            <td colspan="2">&nbsp;&nbsp;<?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id']); ?></td> 
                        </tr>
                    </table>
                    <hr>
                    <h4><?php echo get_phrase('invoice_entries'); ?></h4>
                    <table class="table table-bordered" width="100%" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center" width="30%"><?php echo get_phrase('title'); ?></th>
                                <th class="text-center"><?php echo get_phrase('price'); ?></th>
                                <th class="text-center"><?php echo get_phrase('quantity'); ?></th>
                                <th class="text-center"><?php echo get_phrase('total_price'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- INVOICE ENTRY STARTS HERE -->
                            <?php
                                $total_amount = 0;
                                $i = 1;
                                $currency_symbol = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;
                                $invoice_entries = json_decode($row['invoice_entries'], true);

                                // Create an associative array to map medicine_id to medicine_name
                                $medicine_map = array();
                                $medicine = $this->db->get('medicine')->result_array();
                                foreach ($medicine as $med) {
                                    $medicine_map[$med['medicine_id']] = $med['name'];
                                }

                                foreach ($invoice_entries as $key => $invoice_entry) {
                                    $total_price = $invoice_entry['invoice_price'] * $invoice_entry['invoice_quantity'];
                                    $total_amount += $total_price;
                                    $medicine_name = isset($medicine_map[$invoice_entry['invoice_name']]) ? $medicine_map[$invoice_entry['invoice_name']] : $invoice_entry['invoice_name'];
                            ?>  
                            <tr>
                                <td class="text-center"><?php echo $i++;?></td>
                                <td class="text-center"><?php echo $medicine_name;?></td>
                                
                                <td class="text-center"><?php echo $currency_symbol.' '.$invoice_entry['invoice_price'];?></td>
                                <td class="text-center"><?php echo $invoice_entry['invoice_quantity'];?></td>
                                <td class="text-center"><?php echo $currency_symbol.' '.$total_price;?></td>
                            </tr>
                            <?php } ?>
                            <!-- INVOICE ENTRY ENDS HERE -->
                        </tbody>
                    </table>

                    <hr>
                    <table width="100%" border="0">    
                        <tr>
                            <td align="right" width="80%"><h4><?php echo get_phrase('sub_total'); ?> :</h4></td>
                            <td align="right"><h4> <?php echo $currency_symbol.' '.$total_amount;?> </h4></td>
                        </tr>
                        
                    </table>
                </div>
                <br>

                <a onClick="PrintElem('#invoice_print')" class="btn btn-success btn-sm btn-block btn-rounded">
                    Print Invoice
                    <i class="entypo-doc-text"></i>
                </a>
            </div>  
        </div>  
    </div>
</div>
<?php endforeach; ?>

<script>
    function PrintElem(elem) {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />');
        mywindow.document.write('<style>');
        mywindow.document.write('table { width: 100%; border-collapse: collapse; }');
        mywindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }');
        mywindow.document.write('th { background-color: #f2f2f2; }');
        mywindow.document.write('img { max-height: 80px; }');
        mywindow.document.write('</style>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.querySelector(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
