<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function Index()
	{
        $data = array();
        $data['listeSakafo'] = $this->Sakafo->getDonne();
		$this->load->view('Admin/Index',$data);
	}
    public function content()
    {
        $action = $this->input->get('action');
        // if() 
    }
	
}
