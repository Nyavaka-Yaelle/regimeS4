<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
    public function Index()
	{
        redirect("ControllerAdmin/Sakafo");
    }
	public function Sakafo()
	{
        $data = array();
        $data['listeSakafo'] = $this->Sakafo->getDonne();
        $data['content'] = 'Sakafo';
		$this->load($data);
	}
    public function TypeSakafo()
	{
        $data = array();
        $data['listeTypeSakafo'] = $this->TypeSakafo->getDonne();
        $data['content'] = 'TypeSakafo';
		$this->load($data);
	}
    public function TypeEnchainement()
	{
        $data = array();
        $data['listeTypeEnchainement'] = $this->TypeEnchainement->getDonne();
        $data['content'] = 'TypeEnchainement';
		$this->load($data);
	}
    public function Enchainement()
	{
        $data = array();
        $data['listeEnchainement'] = $this->Enchainement->getDonne();
        $data['content'] = 'Enchainement';
		$this->load($data);
	}
    public function load($data)
	{
		$this->load->view('Admin/Header');
		$this->load->view('Admin/'.$data['content'],$data);
		$this->load->view('Admin/Footer');
	}
    public function content()
    {
        $action = $this->input->get('action');
        if($action==1)
        {
            $this->Sakafo();
        } 
        else if($action==11)
        {
            $this->TypeSakafo();
        }
        else if($action==2)
        {
            $this->TypeEnchainement();
        }
        else if($action==21)
        {
            $this->Enchainement();
        }
    }
	
}
