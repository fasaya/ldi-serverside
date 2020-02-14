<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keanggotaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Keanggotaan_model', 'Keanggotaan');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $this->pendaftaran();
    }

    public function pendaftaran()
    {
        if ($this->Helper->cek_simpanan_wajib() && $this->Helper->cek_simpanan_pokok()) {
            redirect('anggota/dashboard');
        }

        $this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|callback_username_check|xss_clean');
        $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_ktp', 'nomor ktp', 'trim|numeric|required|xss_clean|callback_no_ktp_check');
        $this->form_validation->set_rules('no_hp', 'no. handphone', 'trim|numeric|xss_clean|required');
        $this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email|callback_email_check|required');

        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kecamatan', 'desa/kecamatan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kota', 'kota/kabupaten', 'trim|required|xss_clean');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|numeric|required');

        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|xss_clean');
        // $this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|xss_clean');
        // $this->form_validation->set_rules('alamat_perusahaan', 'alamat', 'trim|xss_clean');
        // $this->form_validation->set_rules('kota_perusahaan', 'kota', 'trim|xss_clean');

        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|xss_clean|required');

        if ($this->form_validation->run() == false) {
            $this->Main->view('keanggotaan/daftar');
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
                'kecamatan' => $this->input->post('kecamatan', TRUE),
                'kelurahan' => $this->input->post('kelurahan', TRUE),
                'kota' => $this->input->post('kota', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
                'kode_pos' => $this->input->post('kode_pos', TRUE),
                'pekerjaan' => $this->input->post('pekerjaan', TRUE),
                // 'jabatan' => $this->input->post('jabatan', TRUE),
                // 'perusahaan' => $this->input->post('perusahaan', TRUE),
                // 'alamat_perusahaan' => $this->input->post('alamat_perusahaan', TRUE),
                // 'kota_perusahaan' => $this->input->post('kota_perusahaan', TRUE),
                'pendidikan' => $this->input->post('pendidikan', TRUE),
                'join_date' => new_date(),
                'status' => '1',
                'is_active' => '1'
            ];
            $this->Keanggotaan->daftarAnggotaBaru($data);
        }
    }

    public function anggota()
    {
        $main['id_anggota'] = $this->session->userdata('id_user');
        $main['list_anggota'] = $this->Keanggotaan->anggota();
        $this->Main->view('keanggotaan/list_anggota', $main);
    }

    public function infoanggota($no_anggota)
    {
        $id_anggota = $this->session->userdata('id_user');
        $query = $this->db->query(' SELECT id_anggota, id_parent
                                    FROM tb_anggota 
                                    WHERE no_anggota = "' . $no_anggota . '" AND id_parent = "' . $id_anggota . '"');
        $cek = $query->num_rows();

        if ($cek > 0) {
            $main['data'] = $this->Keanggotaan->dataLengkapAnggota($no_anggota);
            $this->Main->view('keanggotaan/info_anggota', $main);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('anggota/keanggotaan/anggota');
        }
    }

    public function pendaftaranreferral()
    {
        $main['list_anggota'] = $this->Keanggotaan->calonanggotadarireferral();
        $this->Main->view('keanggotaan/list_calon_anggota', $main);
    }

    public function editcalonanggota($no_anggota = "")
    {
        if ($no_anggota != "") {
            $id_anggota = $this->session->userdata('id_user');
            $query = $this->db->query(' SELECT no_anggota, username, nama, email, tempat_lahir, tanggal_lahir, no_ktp, no_hp, alamat, kecamatan, kelurahan, kota, pekerjaan, jabatan, perusahaan, alamat_perusahaan, kota_perusahaan, pendidikan
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"AND id_parent = ' . $id_anggota . ' AND status = "0"');

            if ($query->num_rows() > 0) {
                $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|xss_clean');
                $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required|xss_clean');
                $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required|xss_clean');
                $this->form_validation->set_rules('no_ktp', 'nomor ktp', 'trim|numeric|required|xss_clean|callback_no_ktp_check');
                $this->form_validation->set_rules('no_hp', 'no. handphone', 'trim|numeric|xss_clean|required');

                $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|xss_clean');
                $this->form_validation->set_rules('kecamatan', 'desa/kecamatan', 'trim|required|xss_clean');
                $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required|xss_clean');
                $this->form_validation->set_rules('kota', 'kota/kabupaten', 'trim|required|xss_clean');
                $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required|xss_clean');
                $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|numeric|required');

                $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required|xss_clean');
                // $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|xss_clean');
                // $this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|xss_clean');
                // $this->form_validation->set_rules('alamat_perusahaan', 'alamat', 'trim|xss_clean');
                // $this->form_validation->set_rules('kota_perusahaan', 'kota', 'trim|xss_clean');

                if ($this->form_validation->run() == false) {
                    $main['data'] =  $query->row_array();
                    $this->Main->view('keanggotaan/update_calon_anggota', $main);
                } else {
                    $data = [
                        'nama' => $this->input->post('nama', TRUE),
                        'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                        'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                        'no_ktp' => $this->input->post('no_ktp', TRUE),
                        'no_hp' => $this->input->post('no_hp', TRUE),
                        'alamat' => $this->input->post('alamat', TRUE),
                        'kecamatan' => $this->input->post('kecamatan', TRUE),
                        'kelurahan' => $this->input->post('kelurahan', TRUE),
                        'kota' => $this->input->post('kota', TRUE),
                        'provinsi' => $this->input->post('provinsi', TRUE),
                        'kode_pos' => $this->input->post('kode_pos', TRUE),
                        'pekerjaan' => $this->input->post('pekerjaan', TRUE),
                        // 'jabatan' => $this->input->post('jabatan', TRUE),
                        // 'perusahaan' => $this->input->post('perusahaan', TRUE),
                        // 'alamat_perusahaan' => $this->input->post('alamat_perusahaan', TRUE),
                        // 'kota_perusahaan' => $this->input->post('kota_perusahaan', TRUE),
                        'pendidikan' => $this->input->post('pendidikan', TRUE),
                        'status' => '1',
                        'is_active' => '1'
                    ];
                    $this->Keanggotaan->daftarAnggotaBaruReferral($no_anggota, $data);
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan
                        </div>'
                );
                redirect('anggota/keanggotaan/pendaftaranreferral');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('anggota/keanggotaan/pendaftaranreferral');
        }
    }

    public function aturan()
    {
        $this->Main->view('keanggotaan/aturan');
    }

    public function adart()
    {
        $this->Main->view('keanggotaan/adart');
    }

    // ################################

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

    public function no_ktp_check($no_ktp)
    {
        $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_ktp = "' . $no_ktp . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('no_ktp_check', '{field} ' . $no_ktp . ' telah digunakan.');
            return FALSE;
        }
    }

    // ################################

}
