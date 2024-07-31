<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Register_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    
    function get_patient_by_id($patient_id){
        $query = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
        return $query;
    }

    function createNewAkun(){
            
            $page_data['idcard']            = html_escape($this->input->post('idcard'));
            $page_data['issue_at']          = html_escape($this->input->post('issue_at'));
            $page_data['issue_on']          = html_escape($this->input->post('issue_on'));
            $page_data['name']              = html_escape($this->input->post('name'));
            $page_data['sex']               = html_escape($this->input->post('sex'));
            $page_data['birth_date']        = html_escape($this->input->post('birth_date'));
            $page_data['age']               = html_escape($this->input->post('age'));
            $page_data['place_of_birth']    = html_escape($this->input->post('place_of_birth'));
            $page_data['idcard']            = html_escape($this->input->post('idcard'));
            $page_data['issue_at']          = html_escape($this->input->post('issue_at'));
            $page_data['issue_on']          = html_escape($this->input->post('issue_on'));
            $page_data['occupation']        = html_escape($this->input->post('occupation'));
            $page_data['mother_tongue']     = html_escape($this->input->post('mother_tongue'));
            $page_data['marital_status']    = html_escape($this->input->post('marital_status'));
            $page_data['religion']          = html_escape($this->input->post('religion'));
            $page_data['address']           = html_escape($this->input->post('address'));
            $page_data['city']              = html_escape($this->input->post('city'));
            $page_data['state']             = html_escape($this->input->post('state'));
            $page_data['nationality']       = html_escape($this->input->post('nationality'));
            $page_data['phone']             = html_escape($this->input->post('phone'));
            $page_data['mobile_no']         = html_escape($this->input->post('mobile_no'));
            $page_data['blood_group']       = html_escape($this->input->post('blood_group'));
            $page_data['email']             = html_escape($this->input->post('email'));
            $page_data['password']          = sha1($this->input->post('password'));
    
            
    
            $check_email = $this->db->get_where('patient', array('email' => $page_data['email']))->row()->email;
            if($check_email != null){
    
              return false;
            }
            else{
    
                $this->db->insert('patient', $page_data);
                $patient_id = $this->db->insert_id();
                move_uploaded_file($_FILES['file_name']['tmp_name'], 'uploads/patient_image/' . $_FILES["file_name"]["name"]);
                // upload patient's file/document to nurse image folder
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $patient_id . '.jpg');
    
    
            }
        }

}