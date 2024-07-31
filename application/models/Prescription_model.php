<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Prescription_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function insertIntoIntoPrescriptionTable($param2)
    {
        $page_data['prescription_code'] = $this->input->post('prescription_code');
        $page_data['appointment_id'] = $this->input->post('appointment_id');
        $page_data['patient_id'] = $this->input->post('patient_id');
        $page_data['doctor_id'] = $this->input->post('doctor_id');
        $page_data['weight'] = $this->input->post('weight');
        $page_data['height'] = $this->input->post('height');
        $page_data['pres_date'] = strtotime($this->input->post('pres_date'));
        $page_data['case_history'] = $this->input->post('case_history');
        $page_data['prescription_type'] = $this->input->post('prescription_type');
        $page_data['odontogram_entries'] = $this->input->post('odontogram_entries');
        // $page_data['date_created'] = strtotime(date('Y-m-d'));

        $odontogram_entries = array();
        $nomor_gigi = $this->input->post('nomor_gigi');
        $penyakit_gigi = $this->input->post('penyakit_gigi');
        $bagian_gigi = $this->input->post('bagian_gigi');
        $catatan = $this->input->post('catatan');
        $odontogram_of_entries = sizeof($nomor_gigi);

        for ($j = 0; $j < $odontogram_of_entries; $j++) {

            if ($nomor_gigi[$j] != "" && $penyakit_gigi[$j] != "" && $catatan[$j] != "") {
                $new_entry = array('nomor_gigi' => $nomor_gigi[$j], 'bagian_gigi' => $bagian_gigi[$j], 'penyakit_gigi' => $penyakit_gigi[$j], 'catatan' => $catatan[$j]);
                array_push($odontogram_entries, $new_entry);
            }

        }

        $page_data['odontogram_entries'] = json_encode($odontogram_entries);

        $prescription_entries = array();
        $diagnose = $this->input->post('entry_diagnose');
        $medicine_name = $this->input->post('entry_medicine_name');
        $usage_prescription = $this->input->post('entry_prescription');
        $usage_days = $this->input->post('entry_days');
        $number_of_entries = sizeof($diagnose);

        for ($i = 0; $i < $number_of_entries; $i++) {

            if ($diagnose[$i] != "" && $medicine_name[$i] != "" &&  $usage_prescription[$i] != "" && $usage_days[$i] != "") {
                $new_entry = array('diagnose' => $diagnose[$i], 'medicine_name' => $medicine_name[$i],  'usage_prescription' => $usage_prescription[$i], 'usage_days' => $usage_days[$i]);
                array_push($prescription_entries, $new_entry);
            }

        }

        $page_data['prescription_entries'] = json_encode($prescription_entries);

        $this->db->insert('prescription', $page_data);
    }

    function updatePrescriptionTable($param2)
    {
        // $page_data['patient_id'] = $this->input->post('patient_id');
        // $page_data['doctor_id'] = $this->input->post('doctor_id');
        
        $page_data['weight'] = $this->input->post('weight');
        $page_data['height'] = $this->input->post('height');
        $page_data['pres_date'] = strtotime($this->input->post('pres_date'));
        $page_data['case_history'] = $this->input->post('case_history');
        $page_data['prescription_type'] = $this->input->post('prescription_type');
        $page_data['odontogram_entries'] = $this->input->post('odontogram_entries');

        $odontogram_entries = array();
        $nomor_gigi = $this->input->post('nomor_gigi');
        $penyakit_gigi = $this->input->post('penyakit_gigi');
        $bagian_gigi = $this->input->post('bagian_gigi');
        $catatan = $this->input->post('catatan');
        $odontogram_of_entries = sizeof($nomor_gigi);

        for ($j = 0; $j < $odontogram_of_entries; $j++) {

            if ($nomor_gigi[$j] != "" && $penyakit_gigi[$j] != "" && $catatan[$j] != "") {
                $new_entry = array('nomor_gigi' => $nomor_gigi[$j], 'bagian_gigi' => $bagian_gigi[$j], 'penyakit_gigi' => $penyakit_gigi[$j], 'catatan' => $catatan[$j]);
                array_push($odontogram_entries, $new_entry);
            }

        }

        $page_data['odontogram_entries'] = json_encode($odontogram_entries);

        $prescription_entries = array();
        $diagnose = $this->input->post('entry_diagnose');
        $medicine_name = $this->input->post('entry_medicine_name');
   
        $usage_prescription = $this->input->post('entry_prescription');
        $usage_days = $this->input->post('entry_days');
        $number_of_entries = sizeof($diagnose);

        for ($i = 0; $i < $number_of_entries; $i++) {

            if ($diagnose[$i] != "" && $medicine_name[$i] != "" && $usage_prescription[$i] != "" && $usage_days[$i] != "") {
                $new_entry = array('diagnose' => $diagnose[$i], 'medicine_name' => $medicine_name[$i],  'usage_prescription' => $usage_prescription[$i], 'usage_days' => $usage_days[$i]);
                array_push($prescription_entries, $new_entry);
            }

        }

        $page_data['prescription_entries'] = json_encode($prescription_entries);

        $this->db->where('prescription_id', $param2);
        $this->db->update('prescription', $page_data);

    }

    function deleteFromPresciptionTable($param2)
    {
        $this->db->where('prescription_id', $param2);
        $this->db->delete('prescription');

    }

    function select_prescription_by_id($prescription_id)
    {
        return $this->db->get_where('prescription', array('prescription_id' => $prescription_id))->result_array();
    }


}