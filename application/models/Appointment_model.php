<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Appointment_model extends CI_Model { 
    
    function __construct(){
        parent::__construct();
    }

    function get_latest_queue_number($date_visited) {
        $this->db->select_max('queue_number');
        $this->db->where('date_visited', $date_visited);
        $query = $this->db->get('appointment');
        return $query->row()->queue_number ?? 0; // Return 0 if no queue number found for the given date
    }
    function insertIntoAppointmentTable() {
        $appointment_data['appointment_code'] = html_escape($this->input->post('appointment_code'));
        $appointment_data['patient_id'] = $this->input->post('patient_id');
        $appointment_data['doctor_id'] = $this->input->post('doctor_id');
        $date_visited = strtotime($this->input->post('date_visited'));
        $appointment_data['date_visited'] = $date_visited;
        $appointment_data['complaint'] = html_escape($this->input->post('complaint'));
        $appointment_data['status'] = html_escape($this->input->post('status'));
    
        // Get the latest queue number for the given date
        $latest_queue_number = $this->get_latest_queue_number($date_visited);
    
        if ($date_visited) {
            $appointment_data['queue_number'] = $latest_queue_number + 1;
        } else {
            $appointment_data['queue_number'] = 1; // Default to 1 if no valid date is provided
        }
    
        // Insert appointment data into the database
        if ($this->db->insert('appointment', $appointment_data)) {
            // Insert was successful, handle success case here if needed
        } else {
            // Insert failed, handle error case here if needed
            // Log the error message: $this->db->error();
            log_message('error', 'Database insert failed: ' . $this->db->error());
        }
    }
    function insertPatientAppointmentTable() {
        $appointment_data['appointment_code'] = html_escape($this->input->post('appointment_code'));
        $appointment_data['patient_id'] = $this->input->post('patient_id');
        $appointment_data['doctor_id'] = $this->input->post('doctor_id');
        // $appointment_data['patient_name'] = html_escape($this->input->post('patient_name'));
        $date_visited = strtotime($this->input->post('date_visited'));
        $appointment_data['date_visited'] = $date_visited;
        $appointment_data['complaint'] = html_escape($this->input->post('complaint'));
        $appointment_data['status'] = html_escape($this->input->post('status'));
        
        // Ensure the date_visited is a valid timestamp
        if ($appointment_data['date_visited']) {
            // Get the latest queue number for the given date
            $latest_queue_number = $this->get_latest_queue_number($appointment_data['date_visited']);
            $appointment_data['queue_number'] = $latest_queue_number + 1;
        } else {
            $appointment_data['queue_number'] = 1; // Default to 1 if no valid date is provided
        }
        
        // Insert appointment data into the database
        if ($this->db->insert('appointment', $appointment_data)) {
            // Insert was successful, handle success case here if needed
        } else {
            // Insert failed, handle error case here if needed
            // Log the error message: $this->db->error();
            log_message('error', 'Database insert failed: ' . $this->db->error());
        }
    }
    

    function updateAppointmentInformation($param2) {
        // $appointment_data['appointment_code'] = html_escape($this->input->post('appointment_code'));
        // $appointment_data['patient_name'] = html_escape($this->input->post('patient_name'));
        $appointment_data['doctor_id'] = $this->input->post('doctor_id');
        $date_visited = strtotime($this->input->post('date_visited'));
        $appointment_data['date_visited'] = $date_visited;
        $appointment_data['complaint'] = html_escape($this->input->post('complaint'));
        $appointment_data['status'] = html_escape($this->input->post('status'));
        $this->db->where('appointment_id', $param2);
        $this->db->update('appointment', $appointment_data);
    }
    
    function updatePatientAppointmentInformation($param2) {
        // $appointment_data['appointment_code'] = html_escape($this->input->post('appointment_code'));
        // $appointment_data['patient_name'] = html_escape($this->input->post('patient_name'));
        $appointment_data['doctor_id'] = $this->input->post('doctor_id');
        $date_visited = strtotime($this->input->post('date_visited'));
        $appointment_data['date_visited'] = $date_visited;
        $appointment_data['complaint'] = html_escape($this->input->post('complaint'));
        $appointment_data['status'] = html_escape($this->input->post('status'));
        $this->db->where('appointment_id', $param2);
        $this->db->update('appointment', $appointment_data);
    }

    function deleteAppointmentInformation($param2) {
        // Get the queue number of the appointment to be deleted
        $this->db->select('queue_number');
        $this->db->where('appointment_id', $param2);
        $query = $this->db->get('appointment');
        $queue_number = $query->row()->queue_number;

        // Delete the appointment
        $this->db->where('appointment_id', $param2);
        $this->db->delete('appointment');

        // Update the queue numbers of the remaining appointments
        $this->db->set('queue_number', 'queue_number - 1', FALSE);
        $this->db->where('queue_number >', $queue_number);
        $this->db->update('appointment');
    }

    function select_all_appointment() {
        $query = $this->db->get('appointment')->result_array();
        return $query;
    }

    function get_appointment_by_id ($appointment_id) {
        $query = $this->db->get_where('appointment', array('appointment_id' => $appointment_id))->result_array();
        return $query;
    }
    function get_patient_by_id($patient_id){
        $query = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
        return $query;
    }
}