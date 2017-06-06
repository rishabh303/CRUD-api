<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peoplemodel extends CI_Model {

	public function getPeoples()
	{
		$this->db->select("*");
		$this->db->from('assign_car');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}
	
	public function insertPerson($name, $address, $telephone, $a, $b, $c, $d) {
		$this->db->set('CAR_ID', $name);
		$this->db->set('CAR_MODEL', $address);
		$this->db->set('CAR_YEAR', $telephone);
                $this->db->set('CAR_SEGMENT', $a);
                $this->db->set('CAR_BRAND', $b);
                $this->db->set('CAR_CODE', $c);
                $this->db->set('CAR_FUEL', $d);
		$this->db->insert('assign_car');
	}
	
	public function deletePerson($carID) {
		$this->db->where('CAR_ID', $carID);
		$this->db->delete('assign_car');
	}
	
	public function getPerson($carID) {
         
		 $this->db->where('CAR_ID', $carID);
		 $query = $this->db->get('assign_car');
		 
		 if($query->result()) {
		
		$result = $query->result();
		
		foreach ($result as $row) {
			
			$users[$row->CAR_ID] = array($row->CAR_ID, $row->CAR_MODEL, $row->CAR_YEAR,$row->CAR_SEGMENT, $row->CAR_BRAND, $row->CAR_CODE,$row->CAR_FUEL);	
		}
		return $users;	 
		 }
		 
	}
	
	
		public function updatePerson($carID, $address, $telephone, $a, $b, $c, $d) {
		
		$this->db->where('CAR_ID', $carID);
		$this->db->set('CAR_MODEL', $address);
		$this->db->set('CAR_YEAR', $telephone);
		$this->db->set('CAR_SEGMENT', $a);
                $this->db->set('CAR_BRAND', $b);
                $this->db->set('CAR_CODE', $c);
                $this->db->set('CAR_FUEL', $d);
		$this->db->update('assign_car)');
	}
	
	
}
