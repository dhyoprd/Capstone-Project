<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prescription extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                        
                $this->load->library('session');  
                $this->load->model('prescription_model');

    }
    // function prescription($appointment_id)  {
    //     $appointment = $this->db->get_where('appointments', array('appointment_id' => $appointment_id))->row();
    
    // if ($appointment) {
    //     $doctor_id = $appointment->doctor_id;
    //     $patient_id = $appointment->patient_id;

    //     // Fetch prescriptions for the given doctor_id
    //     $prescriptions = $this->db->get_where('prescription', array('doctor_id' => $doctor_id))->result_array();
        
    //     // Output the prescription details
    //     foreach ($prescriptions as $prescription) {
    //         echo '<option value="'.$prescription['prescription_id'].'">'
    //             .'Prescription Date: '. date('d M Y', strtotime($prescription['date']))
    //             .' - Medicine: '.$prescription['medicine']
    //             .' - Dosage: '.$prescription['dosage'].'</option>';
    //     }
    // } else {
    //     echo 'No appointment found for the given appointment ID';
    // }
        
      
    //     // Pass data to the view
    //     $data['appointment_id'] = $appointment_id;
    //     $data['patient'] = $patient;
    //     $data['doctors'] = $doctors;
    //     $this->load->view('admin/add_prescription', $data);
        
    // }
    function get_appointment_prescription($appointment_id){
        $page_data['display_appointment'] = $this->appointment_model->get_appointment_by_id($appointment_id);
            $page_data['appointment_id'] = $appointment_id;
            $page_data['page_name'] =   'prescription';
            $page_data['page_title'] =   get_phrase('Prescription');
            $this->load->view('backend/index', $page_data);
    }
    function add_prescription ($appointment_id){
        $this->load->model('crud_model');
        
        // Fetch the appointment data from the database
        $this->db->where('appointment_id', $appointment_id);
        $appointment = $this->db->get('appointment')->row_array();

        // Pass the data to the view
        $page_data['appointment'] = $appointment;
        $page_data['page_name']  = 'add_prescription';
        $page_data['page_title'] = get_phrase('Create Prescription');
        $this->load->view('backend/index', $page_data);
    }
    // function appointment_prescription($param1=null, $param2=null){
    //     if($param1 == 'prescription'){
    //         $this->prescription_model->insertIntoIntoPrescriptionTable($param2);
    //         $this->session->set_flashdata('flash_message', get_phrase('Data Saved Successfully'));
    //         redirect(base_url() . 'prescription/list_prescription', 'refresh');
    //     }
    // }



    function add_prescriptions ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){

            $this->prescription_model->insertIntoIntoPrescriptionTable($param2);
             $this->session->set_flashdata('flash_message', get_phrase('Data Saved Successfully'));
             redirect(base_url() . 'prescription/list_prescription', 'refresh');
         }
         if($param1 == 'prescription'){

            $this->prescription_model->insertIntoIntoPrescriptionTable($param2);
             $this->session->set_flashdata('flash_message', get_phrase('Data Saved Successfully'));
             redirect(base_url() . 'prescription/list_prescription', 'refresh');
         }

         if($param1 == 'update'){

            $this->prescription_model->updatePrescriptionTable($param2);
             $this->session->set_flashdata('flash_message', get_phrase('Data Updated Successfully'));
             redirect(base_url() . 'prescription/list_prescription', 'refresh');
         }

         if($param1 == 'delete'){

            $this->prescription_model->deleteFromPresciptionTable($param2);
             $this->session->set_flashdata('flash_message', get_phrase('Data Deleted Successfully'));
             redirect(base_url() . 'prescription/list_prescription', 'refresh');
         }

    
        $page_data['page_name']  = 'add_prescription';
        $page_data['page_title'] =  get_phrase('Create Prescription');
        $this->load->view('backend/index', $page_data);
    }

    function list_prescription ($param1 = null, $param2 = null, $param3 = null){
        $this->load->model('crud_model');
        
        // Fetch the appointment data from the database
        // $this->db->where('appointment_id', $appointment_id);
        $appointment = $this->db->get('appointment')->row_array();
        

        // Pass the data to the view
        $page_data['appointment'] = $appointment;
        $page_data['page_name']  = 'list_prescription';
        $page_data['page_title'] =  get_phrase('List Prescription');
        $this->load->view('backend/index', $page_data);
    }


    function view_prescription($prescription_id){

        $page_data['select_prescription_by_id']  = $this->prescription_model->select_prescription_by_id($prescription_id);
        $page_data['page_name']  = 'view_prescription';
        $page_data['page_title'] =  get_phrase('Print Prescription');
        $this->load->view('backend/index', $page_data);
    }

    function edit_prescription($prescription_id) {
        $page_data['select_prescription_by_id']  = $this->prescription_model->select_prescription_by_id($prescription_id);
        
        $page_data['prescription_id'] = $prescription_id;
        $page_data['page_name']  = 'edit_prescription';
        $page_data['page_title'] =  get_phrase('Edit Prescription');
        $this->load->view('backend/index', $page_data);
    }
    

    function get_doctor_patient_edit ($department_id, $prescription_id){

        $page_data['department_id'] = $department_id;
        $page_data['prescription_id'] = $prescription_id;
        $this->load->view('backend/admin/display_doc_patient_prescrip', $page_data);
    }
    function add_odontogram (){
        if($param1 == 'create'){
            $this->odontogram_model->createNewOdontogramInformation();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url() . 'prescription/list_odontogram', 'refresh');
        }

        if($param1 == 'update'){
            $this->odontogram_model->updateOdontogramInformation($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url() . 'prescription/list_odontogram', 'refresh');
        }

        if($param1 == 'delete'){
            $this->odontogram_model->deleteOdontogramInformation($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url() . 'prescription/list_odontogram', 'refresh');
        }

        $page_data['page_name']  = 'add_odontogram';
        $page_data['page_title'] =  get_phrase('Add Odontogram');
        $this->load->view('backend/index', $page_data);
    }


    function list_odontogram(){

        $page_data['page_name']  = 'list_odontogram';
        $page_data['page_title'] =  get_phrase('List Odontogram');
        $this->load->view('backend/index', $page_data);

    }
    function get_appointment_details($appointment_id) {
        $this->load->model('Appointment_model'); // Adjust the model name as necessary
        $appointment_details = $this->Appointment_model->get_appointment_by_id($appointment_id);
        echo json_encode($appointment_details);
    }




}