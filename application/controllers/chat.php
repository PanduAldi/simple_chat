<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_chat');
	}

	public function index()
	{
		$data['title'] = "Aplikasi Chat Sederhana Menggunakan Codeigneter & JQuery AJAX";

		$this->load->view('chat', $data);
	}

	public function tampil_chat()
	{
		$datanya =  $this->m_chat->get()->result();

		echo '<table class="table table-striped">';
				foreach ($datanya as $d) {
						echo '<tr><td>['.$d->date.'] <b>'.$d->nama.'</b> : '.$d->chat.'</td></tr>';
					}	
		echo '</table>';
	}


	public function add_chat()
	{
		$nama = $this->input->post('nama');
		$chat = $this->input->post('chat');

		$this->m_chat->add(array('id'=>'','nama'=>$nama, 'chat'=>$chat, 'date'=>date('Y-m-d H:i:s')));

		$datanya =  $this->m_chat->get()->result();

		echo '<table class="table table-striped">';
				foreach ($datanya as $d) {
						echo '<tr><td>['.$d->date.'] <b>'.$d->nama.'</b> : '.$d->chat.'</td></tr>';
					}	
		echo '</table>';		
	}

	public function hapus()
	{
		$kode = $this->input->post('kode');

		$this->db->where('id', $kode);
		$this->db->delete('t_chat');
	}

}

/* End of file chat.php */
/* Location: ./application/controllers/chat.php */