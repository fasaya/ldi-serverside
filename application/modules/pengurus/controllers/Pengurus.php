<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Pengurus_model', 'Pengurus');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $this->tambahpengurus();
    }

    public function tambahpengurus()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|callback_username_check|xss_clean');
        $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_ktp', 'nomor ktp', 'trim|numeric|required|xss_clean');
        $this->form_validation->set_rules('no_hp', 'no. handphone', 'trim|numeric|xss_clean|required');
        $this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email|callback_email_check|required');

        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|xss_clean|required');

        if ($this->form_validation->run() == false) {
            $this->Main->view('pengurus/tambah_pengurus');
        } else {
            $data = [
                'username' => $this->input->post('username', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'no_ktp' => $this->input->post('no_ktp', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'email' => $this->input->post('email', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'pekerjaan' => $this->input->post('pekerjaan', TRUE),
                'pendidikan' => $this->input->post('pendidikan', TRUE),
                'join_date' => new_date(),
                'status' => '1'
            ];
            $this->Pengurus->tambahPengurus($data);
        }
    }

    public function semuapengurus()
    {
        $main['list_pengurus'] = $this->Pengurus->pengurus();
        $this->Main->view('pengurus/semua_pengurus', $main);
    }

    // ################################

    public function update_username_check($username)
    {
        $query = $this->db->query(' SELECT id_pengurus
                                        FROM tb_pengurus
                                        WHERE username = "' . $username . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 1) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', '{field} ' . $username . ' telah digunakan.');
            return FALSE;
        }
    }

    public function update_email_check($email)
    {
        $query = $this->db->query(' SELECT id_pengurus
                                        FROM tb_pengurus
                                        WHERE email = "' . $email . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 1) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', '{field} ' . $email . ' telah digunakan.');
            return FALSE;
        }
    }

    public function username_check($username)
    {
        $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE username = "' . $username . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', '{field} ' . $username . ' telah digunakan.');
            return FALSE;
        }
    }

    public function email_check($email)
    {
        $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE email = "' . $email . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', '{field} ' . $email . ' telah digunakan.');
            return FALSE;
        }
    }

    // ################################

}
