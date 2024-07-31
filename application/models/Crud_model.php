<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crud_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    function get_image_url($type = null, $id = null){
        
        if(file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
        $image_url = base_url(). 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
        $image_url = base_url(). 'uploads/default.jpg';
        return $image_url;
    }
    
    function get_type_id_by_id ($type, $type_id = null, $field = 'pid'){
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $key => $row)
        return $row[$field];
    }

    function get_type_name_by_id ($type, $type_id = null, $field = 'name'){
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $key => $row)
        return $row[$field];
    }
    
    function get_type_appointment_by_id ($type, $type_id = null, $field = 'appointment_code'){
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $key => $row)
        return $row[$field];
    }


    function select_prescription_info(){
        return $this->db->get('prescription')->result_array();
    }

    function select_prescription_info_by_patient_id(){
        $patient_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('prescription', array('patient_id' => $patient_id))->result_array();
    }
    function select_prescription_info_by_doctor_id(){
        $doctor_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('prescription', array('doctor_id' => $doctor_id))->result_array();
    }

    function select_Invoice_info(){
        return $this->db->get('invoice')->result_array();
    }
    function select_prescription_appointment() {
        $this->db->select('prescription.*, appointment.patient_id, appointment.appointment_id');
        $this->db->from('prescription');
        $this->db->join('appointment', 'appointment.appointment_id = prescription.appointment_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_type_name_by_ids($table, $id) {
        $this->db->where('patient_id', $id);
        $query = $this->db->get($table);
        $result = $query->row_array();
        return $result ? $result['name'] : 'Unknown';
    }





}