<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Payment_model extends CI_Model { 
	
	function __construct(){
        parent::__construct();
    }


    function insertIntoIntoPaymentTable(){

        $page_data['invoice_number'] = $this->input->post('invoice_number');
        $page_data['appointment_id'] = $this->input->post('appointment_id');
        //$page_data['title'] = $this->input->post('title');
        $page_data['date_created'] = strtotime(date($this->input->post('date_created')));
        $page_data['due_date'] = strtotime(date($this->input->post('due_date')));
        
        $page_data['status'] = $this->input->post('status');
        $page_data['patient_id'] = $this->input->post('patient_id');
        
        $invoice_entries = array();

// Mendapatkan input dari form untuk therapy
$entry_invoice = $this->input->post('entry_invoice');
$invoice_price = $this->input->post('invoice_price');

$invoice_quantity = $this->input->post('invoice_quantity');
//$invoice_total = $this->input->post('invoice_total');



// Menghitung jumlah entri (bisa berbeda, tapi umumnya sama)
$number_of_entries_invoice = sizeof($entry_invoice);


// Memproses entri untuk therapy
for ($i = 0; $i < $number_of_entries_invoice; $i++){
    if ($entry_invoice[$i] != "" && $invoice_price[$i] != ""){
        $invoice_total = $invoice_price[$i] * $invoice_quantity[$i]; // Menghitung total price
        $new_entry = array(
            'invoice_name' => $entry_invoice[$i],
            'invoice_price' => $invoice_price[$i],
            'invoice_quantity' => $invoice_quantity[$i],
            'invoice_total' => $invoice_total
        );
        array_push($invoice_entries, $new_entry);
    }
}



// Menyimpan data entri sebagai JSON dalam variabel page_data
$page_data['invoice_entries'] = json_encode($invoice_entries);

// Memasukkan data invoice ke dalam database
$this->db->insert('invoice', $page_data);
    }
        
        

    function updatePaymentTable($param2){
        //$page_data['title'] = $this->input->post('title');
        $page_data['date_created'] = strtotime(date($this->input->post('date_created')));
        $page_data['due_date'] = strtotime(date($this->input->post('due_date')));
       
        $page_data['status'] = $this->input->post('status');
        $page_data['patient_id'] = $this->input->post('patient_id');
        
        $invoice_entries = array();

// Mendapatkan input dari form untuk therapy
$entry_invoice = $this->input->post('entry_invoice');
$invoice_price = $this->input->post('invoice_price');
$invoice_quantity = $this->input->post('invoice_quantity');
//$invoice_total = $this->input->post('invoice_total');



// Menghitung jumlah entri (bisa berbeda, tapi umumnya sama)
$number_of_entries_invoice = sizeof($entry_invoice);


// Memproses entri untuk therapy
for ($i = 0; $i < $number_of_entries_invoice; $i++){
    if ($entry_invoice[$i] != "" && $invoice_price[$i] != ""){
        $invoice_total = $invoice_price[$i] * $invoice_quantity[$i]; // Menghitung total price
        $new_entry = array(
            'invoice_name' => $entry_invoice[$i],
            'invoice_price' => $invoice_price[$i],
            'invoice_quantity' => $invoice_quantity[$i],
            'invoice_total' => $invoice_total
        );
        array_push($invoice_entries, $new_entry);
    }
}

        $page_data['invoice_entries'] = json_encode($invoice_entries);

        $this->db->where('invoice_id', $param2);
        $this->db->update('invoice', $page_data);
        
    }

    function deleteFromPaymentTable($param2){
        $this->db->where('invoice_id', $param2);
        $this->db->delete('invoice');
        
    }

    function select_invoice_by_id($invoice_id){
        return $this->db->get_where('invoice', array('invoice_id' => $invoice_id))->result_array();
    }


    function calculate_invoice_total_price($invoice_number) {
        $grand_total = 0;  // Inisialisasi grand_total
        
        // Mengambil data invoice berdasarkan invoice_number
        $select_invoice = $this->db->get_where('invoice', array('invoice_number' => $invoice_number))->result_array();
    
        // Iterasi setiap invoice
        foreach ($select_invoice as $key => $row) {
            $total_price = 0;  // Inisialisasi total_price untuk setiap invoice
            
            // Menguraikan JSON invoice_entries menjadi array asosiatif
            $invoice_entries = json_decode($row['invoice_entries'], true);
    
            // Iterasi setiap entry dalam invoice_entries untuk menghitung total_price
            foreach ($invoice_entries as $invoice_entry) {
                $total_price += $invoice_entry['invoice_price'];
            }
    
            
        }
    
        return $grand_total;
    }

}