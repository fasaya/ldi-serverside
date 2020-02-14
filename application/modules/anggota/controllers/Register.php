<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Main_model', 'Main');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Register_model', 'Register');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->daftar();
    }

    public function daftar()
    {

        $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric|callback_username_check');
        $this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email|callback_email_check|required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|xss_clean|numeric|required');
        // $this->form_validation->set_rules('pass', 'password', 'required');
        // $this->form_validation->set_rules('pass_konfirm', 'konfirmasi password', 'required|matches[pass]');

        if ($this->form_validation->run() == false) {
            $this->load->view('register/non_referral');
        } else {
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE)
                // 'password' => $this->input->post('pass', TRUE)
            ];
            $this->Register->add_calon_anggota('non-ref', $data);
        }
    }

    public function referral($kode_ref = NULL)
    {
        if ($kode_ref != NULL) {

            $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|xss_clean');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_numeric|callback_username_check');
            $this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email|callback_email_check|required');
            $this->form_validation->set_rules('no_hp', 'no hp', 'trim|xss_clean|numeric|required');
            // $this->form_validation->set_rules('pass', 'password', 'required');
            // $this->form_validation->set_rules('pass_konfirm', 'konfirmasi password', 'required|matches[pass]');
            $this->form_validation->set_rules('kode_ref', 'Kode referral', 'trim|required|xss_clean|callback_referral_check');

            if ($this->form_validation->run() == false) {
                $main['kode_ref'] = $kode_ref;
                $this->load->view('register/referral', $main);
            } else {
                $data = [
                    'nama' => $this->input->post('nama', TRUE),
                    'username' => $this->input->post('username', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'no_hp' => $this->input->post('no_hp', TRUE),
                    // 'password' => $this->input->post('pass', TRUE),
                    'kode_ref' => $this->input->post('kode_ref', TRUE)
                ];
                $this->Register->add_calon_anggota('ref', $data);
            }
        } else {
            $this->index();
        }
    }

    // ######################

    public function referral_check($referral)
    {
        if ($referral != '' || !empty($referral)) {
            $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE username = "' . $referral . '" ');
            // $result = $query->row_array();
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                $this->form_validation->set_message('referral_check', '{field} ' . $referral . ' tidak ditemukan.');
                return FALSE;
            }
        } else {
            return TRUE;
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
            $this->form_validation->set_message('username_check', '{field} ' . $username . ' telah dipakai.');
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
}
