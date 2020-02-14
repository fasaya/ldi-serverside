<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keanggotaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
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
        $main['list_anggota'] = $this->Keanggotaan->anggota();
        $this->Main->view('keanggotaan/semua_anggota', $main);
    }

    public function calonanggota()
    {
        $main['list_anggota'] = $this->Keanggotaan->anggota("0");
        $this->Main->view('keanggotaan/semua_anggota', $main);
    }

    public function mutasi($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {
                $result = $query1->row_array();

                $main['no_anggota'] = $no_anggota;
                $main['mutasi'] = $this->Keanggotaan->mutasi_anggota($result['id_anggota']);
                $this->Main->view('keanggotaan/mutasi_anggota', $main);
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan
                </div>'
                );
                redirect('pengurus/keanggotaan/anggota');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Terjadi kesalahan
            </div>'
            );
            redirect('pengurus/keanggotaan/anggota');
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
                                        WHERE no_anggota = "' . $no_anggota . '" AND status = "0"');

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
                redirect('pengurus/keanggotaan/pendaftaranreferral');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('pengurus/keanggotaan/pendaftaranreferral');
        }
    }

    // UPDATE

    public function dataanggota($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {

                $this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|xss_clean');
                $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required|xss_clean');
                $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required|xss_clean');
                $this->form_validation->set_rules('no_ktp', 'nomor ktp', 'trim|numeric|required|xss_clean|callback_no_ktp_edit_check');
                $this->form_validation->set_rules('no_hp', 'no. handphone', 'trim|numeric|xss_clean|required');
                $this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email|callback_update_email_check|required');

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
                $this->form_validation->set_rules('is_active', 'aktif', 'required|callback_status_check');

                if ($this->form_validation->run() == false) {
                    $result = $query1->row_array();
                    $main['data'] = $this->Keanggotaan->dataLengkapAnggota($result['id_anggota']);
                    $this->Main->view('keanggotaan/data_anggota', $main);
                } else {
                    $data = [
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
                        'is_active' => $this->input->post('is_active', TRUE)
                    ];
                    $this->Keanggotaan->updateDataAnggota($no_anggota, $data);
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan
                        </div>'
                );
                redirect('pengurus/keanggotaan/anggota');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('pengurus/keanggotaan/anggota');
        }
    }

    public function upnoanggota($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {
                $this->form_validation->set_rules('no_anggota', 'no anggota', 'trim|required|numeric|callback_no_anggota_check');

                if ($this->form_validation->run() == false) {
                    $this->dataanggota($no_anggota);
                } else {
                    $data = [
                        'no_anggota_baru' => $this->input->post('no_anggota', TRUE),
                        'no_anggota' => $no_anggota
                    ];
                    $this->Keanggotaan->updateNoAnggota($data);
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan
                        </div>'
                );
                redirect('pengurus/keanggotaan/anggota');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('pengurus/keanggotaan/anggota');
        }
    }
    
    public function upusername($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT username
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {
                $this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|callback_username_check|xss_clean');

                if ($this->form_validation->run() == false) {
                    $this->dataanggota($no_anggota);
                } else {
                    $username_baru = $this->input->post('username', TRUE);
                    $result = $query1->row_array();
                    if ($result['username'] != $username_baru) {
                        // Update
                        $update = ['username' => $username_baru];
                        $this->db->update('tb_anggota', $update, "no_anggota = '" . $no_anggota . "'");

                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    Ganti username berhasil.
                                    </div>'
                        );
                        redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota);
                    
                    }else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    Username baru tidak boleh sama dengan username lama.
                                    </div>'
                        );
                        redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota);
                    }
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan
                        </div>'
                );
                redirect('pengurus/keanggotaan/anggota');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('pengurus/keanggotaan/anggota');
        }
    }
    
    public function passanggota($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {
                $this->form_validation->set_rules('pass', 'password', 'required');

                if ($this->form_validation->run() == false) {
                    $this->dataanggota($no_anggota);
                } else {
                    $data = [
                        'pass' => $this->input->post('pass', TRUE),
                        'no_anggota' => $no_anggota
                    ];
                    $this->Keanggotaan->updatePassword("pass", $data);
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan
                        </div>'
                );
                redirect('pengurus/keanggotaan/anggota');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('pengurus/keanggotaan/anggota');
        }
    }

    public function passtranggota($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {
                $this->form_validation->set_rules('passtr', 'password transaksi', 'required');

                if ($this->form_validation->run() == false) {
                    $this->dataanggota($no_anggota);
                } else {
                    $data = [
                        'passtr' => $this->input->post('passtr', TRUE),
                        'no_anggota' => $no_anggota
                    ];
                    $this->Keanggotaan->updatePassword("passtr", $data);
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan
                        </div>'
                );
                redirect('pengurus/keanggotaan/anggota');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan
                    </div>'
            );
            redirect('pengurus/keanggotaan/anggota');
        }
    }

    public function aturan()
    {
        $this->Main->view('keanggotaan/anggota');
    }

    public function adart()
    {
        $this->Main->view('keanggotaan/anggota');
    }

    public function transaksianggota()
    {
        $main['mutasi'] = $this->Keanggotaan->semuaTransaksi();
        $this->Main->view('keanggotaan/semua_transaksi', $main);
    }

    // ###############################################


    public function export()
    {
        $this->form_validation->set_rules('hari', 'hari', 'numeric|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'numeric|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'numeric|required');
        if ($this->form_validation->run() == false) {
            $this->transaksianggota();
        } else {
            $hari = $this->input->post('hari', TRUE);
            $bulan = $this->input->post('bulan', TRUE);
            $tahun = $this->input->post('tahun', TRUE);

            $this->db->select("tb_anggota.no_anggota, tb_report.kode_tr, tb_report.debit, tb_report.credit, tb_report.saldo, tb_report.deskripsi, tb_report.date");
            $this->db->where("tb_report.id_anggota = tb_anggota.id_anggota");
            if ($hari != "0") {
                $this->db->where("DAY(date)", $hari);
            }
            if ($bulan != "0") {
                $this->db->where("MONTH(date)", $bulan);
            }
            if ($tahun != "0") {
                $this->db->where("YEAR(date)", $tahun);
            }
            $this->db->from("tb_report, tb_anggota");
            $this->db->order_by("date", "DESC");

            $main['mutasi'] =  $this->db->get()->result();

            if ($tahun == "0") {
                $t = "semua";
            } else {
                $t = $tahun;
            }

            if ($bulan == "0") {
                $b = "semua";
            } else {
                $b = $bulan;
            }

            if ($hari == "0") {
                $h = "semua";
            } else {
                $h = $hari;
            }
            $main['title'] = $t . "/" . $b . "/" . $h;

            $this->load->view('export/export_mutasi', $main);
        }
    }

    public function exportmutasianggota($no_anggota)
    {
        if ($no_anggota != "") {
            $query1 = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '"');
            if ($query1->num_rows() > 0) {
                $result = $query1->row_array();
                $id_anggota = $result['id_anggota'];

                $this->db->select("tb_anggota.no_anggota, tb_report.kode_tr, tb_report.debit, tb_report.credit, tb_report.saldo, tb_report.deskripsi, tb_report.date");
                $this->db->where("tb_report.id_anggota = tb_anggota.id_anggota");
                $this->db->where("tb_anggota.id_anggota", $id_anggota);
                $this->db->from("tb_report, tb_anggota");
                $this->db->order_by("date", "DESC");

                $main['mutasi'] =  $this->db->get()->result();
                $main['title'] = "anggota [" . $no_anggota . "]";

                $this->load->view('export/export_mutasi', $main);
            } else {
                redirect("pengurus/keanggotaan/anggota");
            }
        } else {
            redirect("pengurus/keanggotaan/anggota");
        }
    }

    public function exportanggota()
    {
        $this->db->select("*");
        $this->db->from("tb_anggota");
        $this->db->where("status", "1");
        $this->db->order_by("join_date", "ASC");

        $main['anggota'] =  $this->db->get()->result();
        $this->load->view('export/export_anggota', $main);
    }

    // ################################

    public function status_check($status)
    {
        if ($status == '0' || $status == '1') {
            return TRUE;
        } else {
            $this->form_validation->set_message('status_check', 'Pilih status Setujui atau Tolak');
            return FALSE;
        }
    }

    public function update_username_check($username)
    {
        $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE username = "' . $username . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() + 1 <= 1) {
            return TRUE;
        } elseif($query->num_rows() == 1){

        } else {
            $this->form_validation->set_message('update_username_check', '{field} ' . $username . ' telah digunakan.');
            return FALSE;
        }
    }

    public function update_email_check($email)
    {
        $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE email = "' . $email . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 1) {
            return TRUE;
        } else {
            $this->form_validation->set_message('update_email_check', '{field} ' . $email . ' telah digunakan.');
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

    public function no_ktp_edit_check($no_ktp)
    {
        $query = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE no_ktp = "' . $no_ktp . '" ');
        // $result = $query->row_array();
        if ($query->num_rows() <= 1) {
            return TRUE;
        } else {
            $this->form_validation->set_message('no_ktp_check', '{field} ' . $no_ktp . ' telah digunakan.');
            return FALSE;
        }
    }

    public function no_anggota_check($no_anggota)
    {

        $query_no_anggota = $this->db->query(' SELECT no_anggota
                                        FROM tb_anggota 
                                        WHERE no_anggota = "' . $no_anggota . '" ');
        if ($query_no_anggota->num_rows() <= 0) {
            $cek_no_anggota = TRUE;
        } else {
            $cek_no_anggota = FALSE;
        }

        $query_id_anggota = $this->db->query(' SELECT id_anggota
                                        FROM tb_anggota 
                                        WHERE id_anggota = "' . $no_anggota . '" ');
        if ($query_id_anggota->num_rows() <= 0) {
            $cek_id_anggota = TRUE;
        } else {
            $cek_id_anggota = FALSE;
        }

        if ($cek_no_anggota == TRUE && $cek_id_anggota == TRUE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('no_anggota_check', '{field} ' . $no_anggota . ' telah digunakan.');
            return FALSE;
        }
    }

    // ################################

}
