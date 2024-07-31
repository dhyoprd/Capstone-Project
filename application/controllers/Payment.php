<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                        
                $this->load->library('session');  
                $this->load->model('payment_model');

    }

    function get_appointment_invoice($appointment_id){
        $page_data['display_appointment'] = $this->appointment_model->get_appointment_by_id($appointment_id);
            $page_data['appointment_id'] = $appointment_id;
            $page_data['page_name'] =   'invoice';
            $page_data['page_title'] =   get_phrase('Invoice');
            $this->load->view('backend/index', $page_data);
    }
    function add_invoice ($appointment_id){
        $this->load->model('crud_model');
        
        // Fetch the appointment data from the database
        $this->db->where('appointment_id', $appointment_id);
        $appointment = $this->db->get('appointment')->row_array();

        // Pass the data to the view
        $page_data['appointment'] = $appointment;
        $page_data['page_name']  = 'add_invoice';
        $page_data['page_title'] = get_phrase('Create Invoice');
        $this->load->view('backend/index', $page_data);
    }


    function add_invoices ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){

             $this->payment_model->insertIntoIntoPaymentTable();
             $this->session->set_flashdata('flash_message', get_phrase('Data Saved Successfully'));
             redirect(base_url() . 'payment/list_invoice', 'refresh');
         }

         if($param1 == 'update'){

            $this->payment_model->updatePaymentTable($param2);
             $this->session->set_flashdata('flash_message', get_phrase('Data Updated Successfully'));
             redirect(base_url() . 'payment/list_invoice', 'refresh');
         }

         if($param1 == 'delete'){

            $this->payment_model->deleteFromPaymentTable($param2);
             $this->session->set_flashdata('flash_message', get_phrase('Data Deleted Successfully'));
             redirect(base_url() . 'payment/list_invoice', 'refresh');
         }

    
        $page_data['page_name']  = 'add_invoice';
        $page_data['page_title'] =  get_phrase('Create Payment');
        $this->load->view('backend/index', $page_data);
    }

    function list_invoice ($param1 = null, $param2 = null, $param3 = null){
       
        // $this->load->model('crud_model');
        
        // // Fetch the appointment data from the database
        // // $this->db->where('appointment_id', $appointment_id);
        $appointment = $this->db->get('appointment')->row_array();
        

        // // Pass the data to the view
        $page_data['appointment'] = $appointment;
        $page_data['page_name']  = 'list_invoice';
        $page_data['page_title'] =  get_phrase('List invoice');
        $this->load->view('backend/index', $page_data);
    }

    function view_invoice($invoice_id){

        $page_data['select_invoice_by_id']  = $this->payment_model->select_invoice_by_id($invoice_id);
        $page_data['page_name']  = 'view_invoice';
        $page_data['page_title'] =  get_phrase('Print invoice');
        $this->load->view('backend/index', $page_data);
    }

    function edit_invoice($invoice_id){

        $page_data['select_invoice_by_id']  = $this->payment_model->select_invoice_by_id($invoice_id);
        $page_data['invoice_id'] = $invoice_id;
        $page_data['page_name']  = 'edit_invoice';
        $page_data['page_title'] =  get_phrase('Edit invoice');
        $this->load->view('backend/index', $page_data);
    }



    


}