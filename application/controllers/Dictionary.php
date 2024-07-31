<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dictionary extends CI_Controller {

    public function index()
    {
        $this->load->view('dictionary_view');
    }

}
