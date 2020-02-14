<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Main_model', 'Main');
        $this->load->model('Setting_model', 'Setting');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $this->setting();
    }

    public function aturan()
    {
        $this->form_validation->set_rules('aturan', 'aturan', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->Main->view('setting/aturan');
        } else {
            $object = ['isi' => $this->input->post('aturan', TRUE)];
            $this->db->update('isi_web', $object, "kode = 'pengurus_aturan'");
            redirect('pengurus/setting/aturan');
        }
    }

    // public function adrt()
    // {
    //     $this->form_validation->set_rules('adrt', 'adrt', 'trim|required|xss_clean');
    //     if ($this->form_validation->run() == false) {
    //         $this->Main->view('setting/aturan');
    //     } else {
    //         $object = ['isi' => $this->input->post('adrt', TRUE)];
    //         $this->db->update('isi_web', $object, "kode = 'pengurus_adrt'");
    //         $this->db->update('isi_web', $object, "kode = 'adrt'");
    //         redirect('pengurus/setting/aturan');
    //     }
    // }

    public function adrt()
    {
        $this->Setting->upload_adrt();
    }

    public function setting()
    {
        $query = $this->db->query(' SELECT gateway, no_rekening, atas_nama
                                    FROM tb_gateway
                                    WHERE id_gateway ="1"');
        $main['gtw'] = $query->row_array();

        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['login_anggota'] = $this->Helper->setting('LOGIN_ANGGOTA', 'status');
        $main['deposit'] = $this->Helper->setting('DEPOSIT', 'status');
        $main['withdraw'] = $this->Helper->setting('WITHDRAW', 'status');
        $main['deposito'] = $this->Helper->setting('DEPOSITO', 'status');
        $main['pinjaman'] = $this->Helper->setting('PINJAMAN', 'status');
        $main['simpanan'] = $this->Helper->setting('SIMPANAN', 'status');
        $main['share_profit'] = $this->Helper->setting('CJ_SHARE_PROFIT', 'status');
        $main['bunga_pinjaman'] = $this->Setting->get_setting_pinjaman();
        $main['bagi_untung'] = $this->Setting->get_bagi_untung();
        $main['gateway'] = $this->Setting->get_gateway();
        $main['daftar_anggota'] = $this->Helper->setting('DAFTAR_ANGGOTA', 'status');
        $main['devroy'] = $this->Helper->setting('REFRESH', 'status'); // deviden dan royalti
        $main['tgl'] = $this->Helper->setting('TGL', 'status'); // deviden dan royalti
        $this->Main->view('setting/setting', $main);
    }

    public function status()
    {
        $this->form_validation->set_rules('login_anggota', 'login_anggota', 'required|callback_status_check');
        $this->form_validation->set_rules('deposit', 'deposit', 'required|callback_status_check');
        $this->form_validation->set_rules('withdraw', 'withdraw', 'required|callback_status_check');
        $this->form_validation->set_rules('deposito', 'deposito', 'required|callback_status_check');
        $this->form_validation->set_rules('pinjaman', 'pinjaman', 'required|callback_status_check');
        $this->form_validation->set_rules('daftar_anggota', 'daftar_anggota', 'required|callback_status_check');
        $this->form_validation->set_rules('devroy', 'devroy', 'required|callback_status_check');
        $this->form_validation->set_rules('simpanan', 'simpanan', 'required|callback_status_check');
        $this->form_validation->set_rules('share_profit', 'bagi_untung', 'required|callback_status_check');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'login_anggota' => $this->input->post('login_anggota', TRUE),
                'deposit' => $this->input->post('deposit', TRUE),
                'withdraw' => $this->input->post('withdraw', TRUE),
                'deposito' => $this->input->post('deposito', TRUE),
                'simpanan' => $this->input->post('simpanan', TRUE),
                'pinjaman' => $this->input->post('pinjaman', TRUE),
                'daftar_anggota' => $this->input->post('daftar_anggota', TRUE),
                'devroy' => $this->input->post('devroy', TRUE),
                'share_profit' => $this->input->post('share_profit', TRUE)
            ];
            $this->Setting->update_status($data);
        }
    }


    public function deposito()
    {
        // minimal dan maksimal
        $this->form_validation->set_rules('deposito_mikro_min', 'minimal', 'required|numeric');
        $this->form_validation->set_rules('deposito_mikro_max', 'maksimal', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_min', 'minimal', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_max', 'maksimal', 'required|numeric');
        $this->form_validation->set_rules('deposito_prioritas_min', 'minimal', 'required|numeric');
        $this->form_validation->set_rules('deposito_prioritas_max', 'maksimal', 'required|numeric');
        // kontrak, deviden, dan royalti
        $this->form_validation->set_rules('deposito_mikro_kontrak', 'kontrak', 'required|numeric');
        $this->form_validation->set_rules('deposito_mikro_deviden', 'deviden', 'required|numeric');

        $this->form_validation->set_rules('deposito_makro_1_kontrak', 'kontrak', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_1_deviden', 'deviden', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_2_kontrak', 'kontrak', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_2_deviden', 'deviden', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_3_kontrak', 'kontrak', 'required|numeric');
        $this->form_validation->set_rules('deposito_makro_3_deviden', 'deviden', 'required|numeric');
        $this->form_validation->set_rules('deposito_prioritas_kontrak', 'kontrak', 'required|numeric');
        $this->form_validation->set_rules('deposito_prioritas_deviden', 'deviden', 'required|numeric');
        $this->form_validation->set_rules('deposito_prioritas_royalti', 'royalti', 'required|numeric');

        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'deposito_mikro_min' => $this->input->post('deposito_mikro_min', TRUE),
                'deposito_mikro_max' => $this->input->post('deposito_mikro_max', TRUE),
                'deposito_makro_min' => $this->input->post('deposito_makro_min', TRUE),
                'deposito_makro_max' => $this->input->post('deposito_makro_max', TRUE),
                'deposito_prioritas_min' => $this->input->post('deposito_prioritas_min', TRUE),
                'deposito_prioritas_max' => $this->input->post('deposito_prioritas_max', TRUE),

                'deposito_mikro_kontrak' => $this->input->post('deposito_mikro_kontrak', TRUE),
                'deposito_mikro_deviden' => $this->input->post('deposito_mikro_deviden', TRUE),
                'deposito_makro_1_kontrak' => $this->input->post('deposito_makro_1_kontrak', TRUE),
                'deposito_makro_1_deviden' => $this->input->post('deposito_makro_1_deviden', TRUE),
                'deposito_makro_2_kontrak' => $this->input->post('deposito_makro_2_kontrak', TRUE),
                'deposito_makro_2_deviden' => $this->input->post('deposito_makro_2_deviden', TRUE),
                'deposito_makro_3_kontrak' => $this->input->post('deposito_makro_3_kontrak', TRUE),
                'deposito_makro_3_deviden' => $this->input->post('deposito_makro_3_deviden', TRUE),
                'deposito_prioritas_kontrak' => $this->input->post('deposito_prioritas_kontrak', TRUE),
                'deposito_prioritas_deviden' => $this->input->post('deposito_prioritas_deviden', TRUE),
                'deposito_prioritas_royalti' => $this->input->post('deposito_prioritas_royalti', TRUE)
            ];
            $this->Setting->update_deposito($data);
        }
    }

    public function deposit()
    {
        $this->form_validation->set_rules('depo_min', 'minimal', 'required|numeric');
        $this->form_validation->set_rules('depo_max', 'maksimal', 'required|numeric');

        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'depo_min' => $this->input->post('depo_min', TRUE),
                'depo_max' => $this->input->post('depo_max', TRUE)
            ];
            $this->Setting->update_deposit($data);
        }
    }

    public function withdrawal()
    {
        $this->form_validation->set_rules('wd_min', 'minimal', 'required|numeric');
        $this->form_validation->set_rules('wd_max', 'maksimal', 'required|numeric');
        $this->form_validation->set_rules('biaya_wd', 'biaya admin withdrawal', 'required|numeric');

        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'biaya_wd' => $this->input->post('biaya_wd', TRUE),
                'wd_min' => $this->input->post('wd_min', TRUE),
                'wd_max' => $this->input->post('wd_max', TRUE)
            ];
            $this->Setting->update_withdrawal($data);
        }
    }

    public function pinjaman($id_setting_pinjaman = "")
    {
        if ($id_setting_pinjaman != "") {
            $id_anggota = $this->session->userdata('id_user');
            $query = $this->db->query(' SELECT *
                                        FROM pinjaman
                                        WHERE id_setting_pinjaman = "' . $id_setting_pinjaman . '"');

            $this->form_validation->set_rules('jangka_waktu', 'jangka waktu', 'required|numeric');
            $this->form_validation->set_rules('bunga', 'bunga', 'required|numeric');
            $this->form_validation->set_rules('status', 'status', 'required|in_list[1,0]');

            $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

            if ($this->form_validation->run() == false) {
                $main['pj'] = $query->row_array();
                $this->Main->view('setting/pinjaman', $main);
            } else {
                $data = [
                    'jangka_waktu' => $this->input->post('jangka_waktu', TRUE),
                    'bunga' => $this->input->post('bunga', TRUE),
                    'status' => $this->input->post('status', TRUE)
                ];
                $this->Setting->update_pinjaman($id_setting_pinjaman, $data);
            }
        } else {
            redirect("pengurus/setting");
        }
    }

    public function bagiuntung($kode)
    {
        if ($kode != "") {
            $id_anggota = $this->session->userdata('id_user');
            $query = $this->db->query(' SELECT *
                                        FROM persen_share_profit
                                        WHERE kode = "' . $kode . '"');

            $this->form_validation->set_rules('profit', 'profit', 'required|numeric');
            $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

            if ($this->form_validation->run() == false) {
                $main['dt'] = $query->row_array();
                $this->Main->view('setting/bagi_untung', $main);
            } else {
                $data = [
                    'profit' => $this->input->post('profit', TRUE),
                ];
                $this->Setting->update_bagiuntung($kode, $data);
            }
        } else {
            redirect("pengurus/setting");
        }
    }

    public function gateway($id_gtw)
    {
        if ($id_gtw != "") {
            $query = $this->db->query(' SELECT *
                                        FROM tb_gateway
                                        WHERE id_gateway = "' . $id_gtw . '"');

            $this->form_validation->set_rules('gateway', 'gateway', 'trim|required|xss_clean');
            $this->form_validation->set_rules('no_rekening', 'no. rekening', 'trim|required|xss_clean');
            $this->form_validation->set_rules('atas_nama', 'atas nama', 'trim|required|xss_clean');
            $this->form_validation->set_rules('status', 'status', 'required|callback_status_check');
            $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

            if ($this->form_validation->run() == false) {
                $main['dt'] = $query->row_array();
                $this->Main->view('setting/gateway', $main);
            } else {
                $data = [
                    'gateway' => $this->input->post('gateway', TRUE),
                    'no_rekening' => $this->input->post('no_rekening', TRUE),
                    'atas_nama' => $this->input->post('atas_nama', TRUE),
                    'status' => $this->input->post('status', TRUE)
                ];
                $this->Setting->update_gateway($id_gtw, $data);
            }
        } else {
            redirect("pengurus/setting#gateway");
        }
    }

    public function addgateway()
    {
        $this->form_validation->set_rules('gateway', 'gateway', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_rekening', 'no. rekening', 'trim|required|xss_clean');
        $this->form_validation->set_rules('atas_nama', 'atas nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'gateway' => $this->input->post('gateway', TRUE),
                'no_rekening' => $this->input->post('no_rekening', TRUE),
                'atas_nama' => $this->input->post('atas_nama', TRUE),
                'status' => "0"
            ];
            $this->Setting->tambah_gateway($data);
        }
    }

    public function komisisponsor()
    {
        $this->form_validation->set_rules('komisi_sponsor_awal', 'komisi sponsor awal koperasi', 'required|numeric');
        $this->form_validation->set_rules('komisi_sponsor_berjalan', 'komisi sponsor berjalan', 'required|numeric');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'komisi_sponsor_awal' => $this->input->post('komisi_sponsor_awal', TRUE),
                'komisi_sponsor_berjalan' => $this->input->post('komisi_sponsor_berjalan', TRUE)
            ];
            $this->Setting->update_komisisponsor($data);
        }
    }

    public function lainnya()
    {
        $this->form_validation->set_rules('keuntungan_koperasi', 'keuntungan koperasi', 'required|numeric');
        $this->form_validation->set_rules('biaya_pendaftaran', 'biaya pendaftaran', 'required|numeric');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $data = [
                'keuntungan_koperasi' => $this->input->post('keuntungan_koperasi', TRUE),
                'biaya_pendaftaran' => $this->input->post('biaya_pendaftaran', TRUE)
            ];
            $this->Setting->update_lainnya($data);
        }
    }

    public function waktu()
    {
        $this->form_validation->set_rules('status_tgl', 'status', 'required|callback_status_check');
        $this->form_validation->set_rules('nilai_tgl', 'tanggal', 'required|numeric');

        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            if (isset($_POST['reset'])) {
                $btn = "reset";
            } else {
                $btn = "submit";
            }
            $data = [
                'status_tgl' => $this->input->post('status_tgl', TRUE),
                'nilai_tgl' => $this->input->post('nilai_tgl', TRUE),
                'btn' => $btn
            ];
            $this->Setting->update_tanggal($data);
        }
    }



    // ###############################################

    public function status_check($status)
    {
        if ($status == '0' || $status == '1') {
            return TRUE;
        } else {
            $this->form_validation->set_message('status_check', 'Pilih status Setujui atau Tolak');
            return FALSE;
        }
    }

    public function passtr_check($pass_tr)
    {
        $id_pengurus = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT pass_tr
                                    FROM tb_pengurus
                                    WHERE id_pengurus = "' . $id_pengurus . '" ');
        $user = $query->row_array();

        if (password_verify($pass_tr, $user['pass_tr'])) {
            return TRUE;
        } else {
            $this->form_validation->set_message('passtr_check', 'Password transaksi salah');
            return FALSE;
        }
    }

    // ###############################################

    public function fetch_add_gateway()
    {
        echo $this->Setting->fetch_add_gateway();
    }
}
