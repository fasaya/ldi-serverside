<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Main_model', 'Main');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Pinjaman_model', 'Pinjaman');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $this->permohonan();
    }

    public function permohonan()
    {
        $main['permohonan'] = $this->Pinjaman->get_permohonan();
        $this->Main->view('pinjaman/permohonan', $main);
    }

    public function updatepermohonan($kode_tr)
    {
        $query = $this->db->query(' SELECT id_anggota, id_pinjaman
                                    FROM tb_pinjaman 
                                    WHERE kode_tr = "' . $kode_tr . '" AND status = "0"');
        if ($query->num_rows() > 0) {

            $result = $query->row_array();

            $this->form_validation->set_rules('status', 'status permohonan', 'required|callback_status_check');
            $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

            if ($this->form_validation->run() == false) {
                $id_anggota = $result['id_anggota'];
                $main['kode_tr'] = $kode_tr;
                $main['data'] = $this->Pinjaman->dataPinjaman($kode_tr);
                $main['anggota'] = $this->Pinjaman->dataAnggota($id_anggota);
                $this->Main->view('pinjaman/permohonan_update', $main);
            } else {
                $data = [
                    'status' => $this->input->post('status', TRUE),
                    'id_pinjaman' => $result['id_pinjaman']
                ];
                $this->Pinjaman->update_permohonan($data);
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan
                </div>'
            );
            redirect('pengurus/pinjaman/permohonan');
        }
    }

    public function detail($kode_tr)
    {
        $query = $this->db->query(' SELECT id_pinjaman
                                    FROM tb_pinjaman 
                                    WHERE kode_tr = "' . $kode_tr . '" AND status = "1"');
        if ($query->num_rows() > 0) {

            $result = $query->row_array();

            $id_pinjaman = $result['id_pinjaman'];
            $main['kode_tr'] = $kode_tr;
            $main['data'] = $this->Pinjaman->get_detail_pinjaman($id_pinjaman);
            $main['currency'] = $this->Helper->setting('CURRENCY');
            $this->Main->view('pinjaman/pinjaman_detail', $main);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan
                </div>'
            );
            redirect('pengurus/pinjaman/permohonan');
        }
    }

    public function pinjaman()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['pinjaman'] = $this->Pinjaman->get_semua_pinjaman();
        $this->Main->view('pinjaman/semua_pinjaman', $main);
    }

    public function pembayaran()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['laporan'] = $this->Pinjaman->get_pinjaman_sudah_bayar();
        $this->Main->view('pinjaman/semua_pembayaran', $main);
    }

    // ##########################################

    public function status_check($status)
    {
        $id_pengurus = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT pass_tr
                                    FROM tb_pengurus
                                    WHERE id_pengurus = "' . $id_pengurus . '" ');
        $user = $query->row_array();

        if ($status == '1' || $status == '9') {
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
}
