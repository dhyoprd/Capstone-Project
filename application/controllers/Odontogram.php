<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odontogram extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
	}
	public function index()
	{
        $session[] = $this->session->userdata('akses');
		if (!empty($session) && $session == "") redirect('welcome/logout');
        $data['akses'] = $session[0];
        $data['nama'] = $this->session->userdata('nama');;
		redirect(base_url()."pasien");
	}
	public function tambah($id_pasien)
	{
        $session[] = $this->session->userdata('akses');
		if (!empty($session) && $session == "") redirect('welcome/logout');
        $data['akses'] = $session[0];
        $data['nama'] = $this->session->userdata('nama');;
		$this->load->model('m_main');
		$data['id_odontogram'] = $this->m_main->get_id('odontogram_pasien', 'id_odontogram');

		if (empty($data['id_odontogram'])){
			$data['id_odontogram'] = 1;
		}
		else{
			$id_odontogram = $data['id_odontogram'][0];
			$data['id_odontogram'] = $id_odontogram->id_odontogram;
			$data['id_odontogram'] = $data['id_odontogram']+1;
		}
		$id_odontogram = $data['id_odontogram'];
		$data = array(
			'id_odontogram' => $id_odontogram,
			'id_pasien' => $id_pasien,
			'tanggal_odontogram' => date("Y-m-d"),
		);
		$this->m_main->insert('odontogram_pasien', $data);
		redirect(base_url()."odontogram/view_odontogram/".$id_odontogram);
	}

	public function view_odontogram($id_odontogram){
		
        $session[] = $this->session->userdata('akses');
		if (!empty($session) && $session == "") redirect('welcome/logout');
        $data['akses'] = $session[0];
        $data['nama'] = $this->session->userdata('nama');;
		$this->load->model('m_main');
		$data['lib_gigi'] = $this->m_main->getall('lib_gigi');
		$data['title'] = 'Tambah odontogram Gigi';
		
		$res_odontogram_pasien = $this->m_main->select_where('odontogram_pasien', array('id_odontogram' => $id_odontogram));
		$res_odontogram_pasien = $res_odontogram_pasien[0];
		
		$data['id_pasien'] = $res_odontogram_pasien['id_pasien'];
		$data['id_odontogram'] = $id_odontogram;

		$this->load->view('dashboard/header', $data);
		$this->load->view('odontogram/add', $data);
		$this->load->view('dashboard/footer');
	}

	public function record($id_pasien){
        $session[] = $this->session->userdata('akses');
		if (!empty($session) && $session == "") redirect('welcome/logout');
        $data['akses'] = $session[0];
        $data['nama'] = $this->session->userdata('nama');;
		$data['title'] = "odontogram Pasien";
		$this->load->model('m_main');
		$data['odontogram_pasien'] = $this->m_main->select_where('odontogram_pasien', array('id_pasien' => $id_pasien));
		$data['id_pasien'] = $id_pasien;
		$this->load->view('dashboard/header', $data);
		$this->load->view('odontogram/record', $data);
		$this->load->view('dashboard/footer');
	}

	public function ubah($id)
	{
		
	}
	public function update()
	{
		
	}

	public function add_kondisi_gigi(){
        $session[] = $this->session->userdata('akses');
		if (!empty($session) && $session == "") redirect('welcome/logout');
        $data['akses'] = $session[0];
        $data['nama'] = $this->session->userdata('nama');;
		$this->load->model('m_main');
		$gigi = $this->m_main->select_where('gigi', array('id_odontogram' => $_POST['id_odontogram']));
		$detail_gigi = $_POST['ada_gigi'];
		
		if ($_POST['ada_gigi'] == "ada"){
			$detail_gigi = $_POST['permukaan_gigi']." ".$_POST['keadaan_gigi']." ".$_POST['bahan_restorasi']." ".$_POST['restorasi']." ".$_POST['protesa'];
		}
		if (empty($gigi)){
			$insert_odontogram_pasien = array(
				'id_pasien' => $_POST['id_pasien'],
				'id_odontogram' => $_POST['id_odontogram'],
			);
			$insert_gigi = array(
				'id_odontogram' => $_POST['id_odontogram'],
				'G'.$_POST['kode_gigi'] => $detail_gigi,
			);
			$this->m_main->insert('gigi', $insert_gigi);
			echo "1";
		}else {
			$update_gigi = array(
				'G'.$_POST['kode_gigi'] => $detail_gigi,
			);
			$this->m_main->update('gigi', $update_gigi, array('id_odontogram' => $_POST['id_odontogram']));
			echo "1";
		}
		//redirect(base_url()."index.php/odontogram/view_odontogram/".$_POST['id_odontogram']);
	}

	public function simpan_odontograman_gigi(){
        $session[] = $this->session->userdata('akses');
		if (!empty($session) && $session == "") redirect('welcome/logout');
        $data['akses'] = $session[0];
        $data['nama'] = $this->session->userdata('nama');;
		$this->load->model('m_main');
		$gigi = $this->m_main->select_where('gigi', array('id_odontogram' => $_POST['id_odontogram']));
		if (empty($gigi)){
			$insert_gigi = array(
				'id_odontogram' => $_POST['id_odontogram'],
				'occlusi' => $_POST['oclusi'],
				'torus_palatinus' => $_POST['palatinus'],
				'torus_mandibularis' => $_POST['mandibula'],
				'palatum' => $_POST['palatum'],
				'diastema' => $_POST['diastema'],
				'gigi_anomali' => $_POST['anomali'],
				'lain_lain' => $_POST['lain_lain'],
			);
			$this->m_main->insert('gigi', $insert_gigi);
		}else {
			$update_gigi = array(
				'occlusi' => $_POST['oclusi'],
				'torus_palatinus' => $_POST['palatinus'],
				'torus_mandibularis' => $_POST['mandibula'],
				'palatum' => $_POST['palatum'],
				'diastema' => $_POST['diastema'],
				'gigi_anomali' => $_POST['anomali'],
				'lain_lain' => $_POST['lain_lain'],
			);
			$this->m_main->update('gigi', $update_gigi, array('id_odontogram' => $_POST['id_odontogram']));
		}
		redirect(base_url()."index.php/odontogram/record/".$_POST['id_pasien']);
	}
	public function hapus($id_odontogram){
		$this->load->model('m_main');
		$this->m_main->delete('odontogram_pasien', array('id_odontogram' => $id_odontogram));
		$this->m_main->delete('gigi', array('id_odontogram' => $id_odontogram));
		redirect(base_url()."index.php/pasien");
	}
}
