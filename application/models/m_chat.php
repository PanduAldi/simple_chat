<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chat extends CI_Model {

	var $table = 't_chat';
	var $pk  = 'id';

	public function	get()
	{
		$this->db->order_by('date', 'asc');
		return $this->db->get($this->table);
	}

	public function add($record)
	{
		$this->db->insert($this->table, $record);
	}


}

/* End of file m_chat.php */
/* Location: ./application/models/m_chat.php */