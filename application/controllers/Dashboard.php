<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		$tot_rw1 = $this->db->query("SELECT sum(total_tabungan) as jmltabungan1 FROM view_nasabah WHERE nama_wilayah = 'Sidotrukan'")->result();
		$tot_rw2 = $this->db->query("SELECT sum(total_tabungan) as jmltabungan2 FROM view_nasabah WHERE nama_wilayah = 'Sidokoyo'")->result();
		$tot_rw3 = $this->db->query("SELECT sum(total_tabungan) as jmltabungan3 FROM view_nasabah WHERE nama_wilayah = 'Sidoluhur'")->result();
		$tot_rw4 = $this->db->query("SELECT sum(total_tabungan) as jmltabungan4 FROM view_nasabah WHERE nama_wilayah = 'Sidomulyo'")->result();
		$tot_rw5 = $this->db->query("SELECT sum(total_tabungan) as jmltabungan5 FROM view_nasabah WHERE nama_wilayah = 'Sidoasri'")->result();

		$data = array(
			'rw1' => $tot_rw1,
			'rw2' => $tot_rw2,
			'rw3' => $tot_rw3,
			'rw4' => $tot_rw4,
			'rw5' => $tot_rw5,
		);

		$this->template->load('layout/template', 'pages/admin/dashboard', $data);
	}
}
