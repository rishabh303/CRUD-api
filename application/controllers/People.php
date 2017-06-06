<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('peoplemodel');
	}

	public function index()
	{
		$this->load->model('peoplemodel');
		$this->data['names'] = $this->peoplemodel->getPeoples();
		$this->load->view('name_display', $this->data);
	}
	
	public function person() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$telephone = $this->input->post('telephone');
                        $a = $this->input->post('a');
                        $b = $this->input->post('b');
                        $c = $this->input->post('c');
                        $d = $this->input->post('d');
			
			$data = $this->peoplemodel->insertperson($name, $address, $telephone,$a,$b,$c,$d);
			echo json_encode($data);
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $carID = $this->input->get('carid');
			 
			 $deleted = $this->peoplemodel->deleteperson($carID);
			 echo json_encode($deleted);
		
		}
	}
	
	
	
	public function user() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$carID = $this->input->post('personID');
			$address = $this->input->post('address');
		        $telephone = $this->input->post('telephone');
		        $a = $this->input->post('a');
                        $b = $this->input->post('b');
                        $c = $this->input->post('c');
                        $d = $this->input->post('d');
			$update = $this->peoplemodel->updatePerson($carID, $address, $telephone, $a, $b, $c, $d);
			echo json_encode($update);
			
	
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $carID = $this->input->get('carID');
			 
			 $edit = $this->peoplemodel->getPerson($carID);
			 echo json_encode($edit);
		}
	}
	
	
	
}
