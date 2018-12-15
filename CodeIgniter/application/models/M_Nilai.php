<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class M_Nilai extends CI_Model {
		public function getAll() 
		{
			return $this->db->get('nilai')->result();
		}
	}
 ?>