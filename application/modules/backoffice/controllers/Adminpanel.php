<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Helper_model', 'Helper');
		$this->load->model('Admin_model', 'Admin');
		$this->load->model('Blog_model', 'Blog');
		$this->load->library('form_validation');
		$this->Admin->cek_login();
	}

	public function index()
	{
		$main['kosong'] = "";
		$this->Admin->view('dashboard', $main);
	}

	// #######################
	// login

	public function datalogin()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == false) {
			$query = $this->db->query(' SELECT *
											FROM tb_login
											WHERE id_user = "' . $this->session->userdata('id_user') . '"');
			$main['user'] = $query->row_array();
			$this->Admin->view('data_login', $main);
		} else {
			$data = [
				'username' => $this->input->post('username', TRUE),
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT)
			];

			//Start database transaction
			$this->db->trans_start();

			//insert into table

			$this->db->update('tb_login', $data, "id_user = '" . $this->session->userdata('id_user') . "'");

			//Start database transaction
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						 Gagal!
						 </div>'
				);
				redirect('backoffice/adminpanel/datalogin');
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						 Berhasil update!
						 </div>'
				);
				redirect('backoffice/adminpanel/datalogin');
			}
		}
	}

	// ##########################
	// HOME

	public function halamanhome($tipe = "")
	{
		if ($tipe == "1" || $tipe == "2" || $tipe == "") {
			$this->form_validation->set_rules('judul1', 'judul', 'trim|xss_clean|required');
			$this->form_validation->set_rules('judul2', 'lanjutan judul', 'trim|xss_clean|required');
			$this->form_validation->set_rules('keterangan1', 'keterangan', 'trim|xss_clean|required');
			$this->form_validation->set_rules('keterangan2', 'keterangan', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$main['kosong'] = "";
				$this->Admin->view('home', $main);
			} else {
				$data = [
					'judul1' => $this->input->post('judul1', TRUE),
					'judul2' => $this->input->post('judul2', TRUE),
					'isi1' => $this->input->post('keterangan1', TRUE),
					'isi2' => $this->input->post('keterangan2', TRUE)
				];
				if ($tipe == "1") {
					$data['tipe'] = "1";
					$this->Admin->updateHome($data);
				} elseif ($tipe == "2") {
					$data['tipe'] = "2";
					$this->Admin->updateHome($data);
				} else {
					$this->halamanhome();
				}
			}
		} elseif ($tipe == "3a" || $tipe == "3b" || $tipe == "3c" || $tipe == "3d" || $tipe == "3e") {
			$this->Admin->updateHomeGambar($tipe);
		} elseif ($tipe == "4a") {
			$this->form_validation->set_rules('title1a', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('title1b', 'sub title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('title1c', 'keterangan', 'trim|xss_clean');

			if ($this->form_validation->run() == false) {
				$this->halamanhome();
			} else {
				$data = [
					'tipe' => $tipe,
					'title1a' => $this->input->post('title1a', TRUE),
					'title1b' => $this->input->post('title1b', TRUE),
					'title1c' => $this->input->post('title1c', TRUE)
				];
				$this->Admin->updateHome($data);
			}
		} elseif ($tipe == "4b1") {
			$this->Admin->updateHomeGambar($tipe);
		} elseif ($tipe == "5a") {
			$this->form_validation->set_rules('judul1', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('judul2', 'sub title', 'trim|xss_clean');
			$this->form_validation->set_rules('judul3', 'keterangan', 'trim|xss_clean');

			if ($this->form_validation->run() == false) {
				$this->halamanhome();
			} else {
				$data = [
					'tipe' => $tipe,
					'judul1' => $this->input->post('judul1', TRUE),
					'judul2' => $this->input->post('judul2', TRUE),
					'judul3' => $this->input->post('judul3', TRUE)
				];
				$this->Admin->updateHome($data);
			}
		} elseif ($tipe == "5b") {
			$this->form_validation->set_rules('5b_judul1', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5b_judul2a', 'title', 'trim|xss_clean');
			$this->form_validation->set_rules('5b_judul2b', 'title', 'trim|xss_clean');
			$this->form_validation->set_rules('5b_judul2c', 'title', 'trim|xss_clean');
			$this->form_validation->set_rules('5b_judul3', 'title', 'trim|xss_clean');
			$this->form_validation->set_rules('5b_keterangan', 'keterangan', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$this->halamanhome();
			} else {
				$data = [
					'tipe' => $tipe,
					'judul1' => $this->input->post('5b_judul1', TRUE),
					'judul2a' => $this->input->post('5b_judul2a', TRUE),
					'judul2b' => $this->input->post('5b_judul2b', TRUE),
					'judul2c' => $this->input->post('5b_judul2c', TRUE),
					'judul3' => $this->input->post('5b_judul3', TRUE),
					'keterangan' => $this->input->post('5b_keterangan', TRUE)
				];
				$this->Admin->updateHome($data);
			}
		} elseif ($tipe == "5d") {
			$this->form_validation->set_rules('5d_1a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_1b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_1c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5d_2a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_2b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_2c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5d_3a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_3b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_3c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5d_4a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_4b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5d_4c', 'subtitle', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$this->halamanhome();
			} else {
				$data = [
					'tipe' => $tipe,
					'5d_1a' => $this->input->post('5d_1a', TRUE),
					'5d_1b' => $this->input->post('5d_1b', TRUE),
					'5d_1c' => $this->input->post('5d_1c', TRUE),

					'5d_2a' => $this->input->post('5d_2a', TRUE),
					'5d_2b' => $this->input->post('5d_2b', TRUE),
					'5d_2c' => $this->input->post('5d_2c', TRUE),

					'5d_3a' => $this->input->post('5d_3a', TRUE),
					'5d_3b' => $this->input->post('5d_3b', TRUE),
					'5d_3c' => $this->input->post('5d_3c', TRUE),

					'5d_4a' => $this->input->post('5d_4a', TRUE),
					'5d_4b' => $this->input->post('5d_4b', TRUE),
					'5d_4c' => $this->input->post('5d_4c', TRUE)
				];
				$this->Admin->updateHome($data);
			}
		} elseif ($tipe == "5c") {
			$this->form_validation->set_rules('5c_1a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_1b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_1c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5c_2a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_2b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_2c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5c_3a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_3b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_3c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5c_4a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_4b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_4c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5c_5a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_5b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_5c', 'subtitle', 'trim|xss_clean|required');

			$this->form_validation->set_rules('5c_6a', 'icon', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_6b', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('5c_6c', 'subtitle', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$this->halamanhome();
			} else {
				$data = [
					'tipe' => $tipe,
					'5c_1a' => $this->input->post('5c_1a', TRUE),
					'5c_1b' => $this->input->post('5c_1b', TRUE),
					'5c_1c' => $this->input->post('5c_1c', TRUE),
					'5c_2a' => $this->input->post('5c_2a', TRUE),
					'5c_2b' => $this->input->post('5c_2b', TRUE),
					'5c_2c' => $this->input->post('5c_2c', TRUE),
					'5c_3a' => $this->input->post('5c_3a', TRUE),
					'5c_3b' => $this->input->post('5c_3b', TRUE),
					'5c_3c' => $this->input->post('5c_3c', TRUE),
					'5c_4a' => $this->input->post('5c_4a', TRUE),
					'5c_4b' => $this->input->post('5c_4b', TRUE),
					'5c_4c' => $this->input->post('5c_4c', TRUE),
					'5c_5a' => $this->input->post('5c_5a', TRUE),
					'5c_5b' => $this->input->post('5c_5b', TRUE),
					'5c_5c' => $this->input->post('5c_5c', TRUE),
					'5c_6a' => $this->input->post('5c_6a', TRUE),
					'5c_6b' => $this->input->post('5c_6b', TRUE),
					'5c_6c' => $this->input->post('5c_6c', TRUE)
				];
				$this->Admin->updateHome($data);
			}
		} else {
			$this->halamanhome();
		}
	}

	// ##########################
	// TENTANG

	public function halamantentang($tipe = "")
	{
		if ($tipe == "") {
			$main['kosong'] = "";
			$this->Admin->view('tentang', $main);
		} elseif ($tipe == "1") {
			$this->form_validation->set_rules('1_judul1', 'judul', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_judul2', 'lanjutan judul', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_keterangan1', 'keterangan', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_keterangan2', 'keterangan', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$main['kosong'] = "";
				$this->Admin->view('tentang', $main);
			} else {
				$data = [
					'tipe' => $tipe,
					'judul1' => $this->input->post('1_judul1', TRUE),
					'judul2' => $this->input->post('1_judul2', TRUE),
					'isi1' => $this->input->post('1_keterangan1', TRUE),
					'isi2' => $this->input->post('1_keterangan2', TRUE)
				];
				$this->Admin->updateTentang($data);
			}
		} else {
			$this->halamantentang();
		}
	}

	// ##########################
	// VISI MISI

	public function halamanvisimisi($tipe = "")
	{
		if ($tipe == "1") {

			$this->form_validation->set_rules('1_title1', 'title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_title2', 'sub title', 'trim|xss_clean');
			$this->form_validation->set_rules('1_visi', 'visi', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_misi', 'misi', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_quote1', 'kutipan', 'trim|xss_clean|required');
			$this->form_validation->set_rules('1_quote2', 'pengutip', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$main['kosong'] = "";
				$this->Admin->view('visidanmisi', $main);
			} else {
				$data = [
					'title1' => $this->input->post('1_title1', TRUE),
					'title2' => $this->input->post('1_title2', TRUE),
					'visi' => $this->input->post('1_visi', TRUE),
					'misi' => $this->input->post('1_misi', TRUE),
					'quote1' => $this->input->post('1_quote1', TRUE),
					'quote2' => $this->input->post('1_quote2', TRUE)
				];
				$this->Admin->updateVisimisi($data);
			}
		} elseif ($tipe == "2a" || $tipe == "2b" || $tipe == "2c" || $tipe == "2d") {
			$this->Admin->updateVisimisiGambar($tipe);
		} else {
			$main['kosong'] = "";
			$this->Admin->view('visidanmisi', $main);
		}
	}

	// ##########################
	// ADRT

	public function halamanadrt()
	{
		$this->form_validation->set_rules('title1', 'title', 'trim|xss_clean|required');
		$this->form_validation->set_rules('title2', 'sub title', 'trim|xss_clean');
		$this->form_validation->set_rules('adrt', 'AD/RT', 'required');

		if ($this->form_validation->run() == false) {
			$main['kosong'] = "";
			$this->Admin->view('adrt', $main);
		} else {
			$adrt = $this->input->post('adrt', TRUE);
			$title1 = $this->input->post('title1', TRUE);
			$title2 = $this->input->post('title2', TRUE);

			//Start database transaction
			$this->db->trans_start();

			//insert into table
			$this->db->update('isi_web', ['isi' => $adrt], "kode = 'adrt'");
			$this->db->update('isi_web', ['isi' => $title1], "kode = 'adrt_title1'");
			$this->db->update('isi_web', ['isi' => $title2], "kode = 'adrt_title2'");

			//Start database transaction
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Gagal!
						</div>'
				);
				redirect('backoffice/adminpanel/halamanadrt');
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Berhasil update!
						</div>'
				);
				redirect('backoffice/adminpanel/halamanadrt');
			}
		}
	}

	// ##########################
	// STRUKTUR ORGANISASI

	public function strukturorg($tipe = "")
	{
		if ($tipe == "") {
			$main['kosong'] = "";
			$this->Admin->view('struktur_org', $main);
		} elseif ($tipe == "a" || $tipe == "b" || $tipe == "c" || $tipe == "d" || $tipe == "e") {
			$nama = 'nama_' . $tipe;
			$data = [
				'nama' => $this->input->post($nama, TRUE),
				'tipe' => $tipe
			];
			$this->Admin->updateStrukturOrgGambar($data);
		} elseif ($tipe == "f") {
			$this->form_validation->set_rules('nama_a', 'nama', 'trim|xss_clean|required');
			$this->form_validation->set_rules('nama_b', 'nama', 'trim|xss_clean|required');
			$this->form_validation->set_rules('nama_c', 'nama', 'trim|xss_clean|required');
			$this->form_validation->set_rules('nama_d', 'nama', 'trim|xss_clean|required');
			$this->form_validation->set_rules('nama_e', 'nama', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {
				$this->strukturorg();
			} else {
				$data = [
					'tipe' => $tipe,
					'nama_a' => $this->input->post('nama_a', TRUE),
					'nama_b' => $this->input->post('nama_b', TRUE),
					'nama_c' => $this->input->post('nama_c', TRUE),
					'nama_d' => $this->input->post('nama_d', TRUE),
					'nama_e' => $this->input->post('nama_e', TRUE)
				];
				$this->Admin->updateStrukturOrgGambar($data);
			}
		} else {
			$this->strukturorg();
		}
	}

	// ###########################################
	// KONTAK

	public function kontak()
	{
		$this->form_validation->set_rules('nowa', 'no. whatsapp', 'trim|numeric|xss_clean|required');
		$this->form_validation->set_rules('nohp', 'no. handphone', 'trim|numeric|xss_clean|required');
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email|xss_clean|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|xss_clean|required');

		if ($this->form_validation->run() == false) {
			$main['kosong'] = "";
			$this->Admin->view('kontak', $main);
		} else {
			$data = [
				'nowa' => $this->input->post('nowa', TRUE),
				'nohp' => $this->input->post('nohp', TRUE),
				'email' => $this->input->post('email', TRUE),
				'alamat' => $this->input->post('alamat', TRUE)
			];
			$this->Admin->editKontak($data);
		}
	}

	// ##########################
	// lainnya

	public function lainnya($tipe = "")
	{
		if ($tipe == "a") {
			$this->Admin->updateLainnyaGambarHeader();
		} elseif ($tipe == "b") {
			$this->form_validation->set_rules('b_keterangan', 'keterangan', 'trim|xss_clean');
			if ($this->form_validation->run() == false) {
				$this->lainnya();
			} else {
				$data = ['keterangan' => $this->input->post('b_keterangan', TRUE)];
				$this->Admin->updateLainnyaFooter($data);
			}
		} else {
			$main['kosong'] = "";
			$this->Admin->view('lainnya', $main);
		}
	}

	// #######################
	// PROGRAM KAMI

	public function program()
	{
		$main['blog'] = $this->Blog->get_blog();
		$this->Admin->view('blog/all', $main);
	}

	public function editprogram($id_blog = "")
	{
		$query = $this->db->query(' SELECT *
											FROM tb_blog
											WHERE id_blog = "' . $id_blog . '" AND is_deleted = "0"');
		if ($query->num_rows() > 0 && $id_blog != "") {
			$this->form_validation->set_rules('judul', 'judul', 'trim|xss_clean|required');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|xss_clean|required');

			if ($this->form_validation->run() == false) {

				$main['blog'] = $query->row_array();
				$this->Admin->view('blog/blog_edit', $main);
			} else {
				$result = $query->row_array();
				$data = [
					'id_blog' => $result['id_blog'],
					'foto_lama' => $result['img'],
					'judul' => $this->input->post('judul', TRUE),
					'keterangan' => $this->input->post('keterangan', TRUE)
				];
				$this->Blog->editBlog($data);
			}
		} else {
			$this->program();
		}
	}

	public function tambahprogram()
	{
		$this->form_validation->set_rules('judul', 'judul', 'trim|xss_clean|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|xss_clean|required');

		if ($this->form_validation->run() == false) {
			$main['kosong'] = "";
			$this->Admin->view('blog/blog_tambah', $main);
		} else {
			$data = [
				'judul' => $this->input->post('judul', TRUE),
				'isi' => $this->input->post('keterangan', TRUE)
			];
			$this->Blog->tambahblog($data);
		}
	}

	public function settingprogram()
	{
		$this->form_validation->set_rules('title', 'title', 'trim|xss_clean|required');
		$this->form_validation->set_rules('subtitle', 'sub title', 'trim|xss_clean');

		if ($this->form_validation->run() == false) {
			$main['kosong'] = "";
			$this->Admin->view('blog/blog_setting', $main);
		} else {
			$data = [
				'title' => $this->input->post('title', TRUE),
				'subtitle' => $this->input->post('subtitle', TRUE)
			];
			$this->Blog->updateStgBlog($data);
		}
	}

	public function hapusprogram($id_blog = "")
	{
		$this->Blog->hapusBlog($id_blog);
	}
}
