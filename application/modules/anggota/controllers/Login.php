<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $log_stat = $this->session->userdata('log_stat');
        $ket = $this->session->userdata('keterangan');

        if ($id_user || $log_stat || $ket) {
            redirect('anggota/dashboard');
        } else {
            // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sesi Anda tidak valid. Mohon melakukan login terlebih dahulu!</div>');
            $this->login();
        }
    }

    public function login()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('log_stat');
        $this->session->unset_userdata('keterangan');

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $query = $this->db->query(' SELECT id_anggota, password, status, is_active
                                    FROM tb_anggota
                                    WHERE username = "' . $username . '" ');
            $user = $query->row_array();

            //cek jika user terdaftar
            if ($user) {
                // cek apakah sudah menjadi anggota
                if ($user['status'] == "1") {
                    // cek apakah akun aktif
                    if ($user['is_active'] == "1") {
                        //cek apabila password benar
                        // if (password_verify($password, $user['pwd']){}
                        if (password_verify($password, $user['password'])) {

                            //cek role
                            $id_user = $user['id_anggota'];

                            // if ($user['keterangan'] == 'admin') {

                            //new session
                            $new_session = [
                                'id_user' => $id_user,
                                'keterangan' => 'anggota',
                                'log_stat' => TRUE
                            ];
                            $this->session->set_userdata($new_session);

                            $data = [
                                'id_user' => $id_user,
                                'ip_address' => $this->getRealIP(),
                                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                                'keterangan' => 'anggota',
                                'date' => new_date()
                            ];
                            $this->db->insert('login_history', $data);

                            redirect('anggota/dashboard');
                            // } else {
                            //     redirect('login');
                            // }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                            redirect('login');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda dinonaktifkan.</div>');
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda belum di verifikasi.</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('log_stat');
        $this->session->unset_userdata('keterangan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil log out!</div>');
        redirect('login');
    }

    // ###########################################

    private function getRealIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) //CHEK IP YANG DISHARE DARI INTERNET  
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //UNTUK CEK IP DARI PROXY  
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    private function getClientIP()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
                return $_SERVER["HTTP_X_FORWARDED_FOR"];

            if (isset($_SERVER["HTTP_CLIENT_IP"]))
                return $_SERVER["HTTP_CLIENT_IP"];

            return $_SERVER["REMOTE_ADDR"];
        }

        if (getenv('HTTP_X_FORWARDED_FOR'))
            return getenv('HTTP_X_FORWARDED_FOR');

        if (getenv('HTTP_CLIENT_IP'))
            return getenv('HTTP_CLIENT_IP');

        return getenv('REMOTE_ADDR');
    }

    public function produce_pass()
    {
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $main['password'] = "";
            $this->load->view('produce_pass', $main);
        } else {
            $passbaru = $this->input->post('password');

            $main['password'] = password_hash($passbaru, PASSWORD_BCRYPT);
            $this->load->view('produce_pass', $main);
        }
    }
}
