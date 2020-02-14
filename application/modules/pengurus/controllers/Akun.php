<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Main_model', 'Main');
        $this->load->library('form_validation');

        $this->Main->cek_login();
    }

    // MAIN

    public function index()
    {
        $this->edit();
    }

    public function edit()
    {
        $id_pengurus = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT pass_tr, password
                                            FROM tb_pengurus
                                            WHERE id_pengurus = "' . $id_pengurus . '"');
        $main['data'] = $query->row_array();
        $this->Main->view('akun/edit', $main);
    }


    public function editpass()
    {
        $this->form_validation->set_rules('pass_lama', 'password lama', 'required|callback_pass_check');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {

            $this->edit();
        } else {
            $id_pengurus = $this->session->userdata('id_user');

            //Start database transaction
            $this->db->trans_start();

            $data = [
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT)
            ];
            $this->db->update('tb_pengurus', $data, "id_pengurus = '" . $id_pengurus . "'");

            // report activity
            $report_act = array(
                'id_user' => $id_pengurus,
                'user' => "pengurus",
                'keterangan' => "Update password",
                'date' => new_date()
            );
            $this->db->insert('tb_report_activity', $report_act);

            // Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('pengurus/akun/edit');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Berhasil memperbarui password login.
                    </div>'
                );
                redirect('pengurus/akun/edit');
            }
        }
    }

    public function editpasstr()
    {
        // $this->form_validation->set_rules('passtr_lama', 'password transaksi lama', 'callback_passtr_check|required');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required');
        $this->form_validation->set_rules('password', 'password login', 'required|callback_pass_check');

        if ($this->form_validation->run() == false) {

            $this->edit();
        } else {
            $id_pengurus = $this->session->userdata('id_user');

            //Start database transaction
            $this->db->trans_start();

            $data = [
                'pass_tr' => password_hash($this->input->post('passtr', TRUE), PASSWORD_BCRYPT)
            ];
            $this->db->update('tb_pengurus', $data, "id_pengurus = '" . $id_pengurus . "'");

            // report activity
            $report_act = array(
                'id_user' => $id_pengurus,
                'user' => "pengurus",
                'keterangan' => "Update password transaksi",
                'date' => new_date()
            );
            $this->db->insert('tb_report_activity', $report_act);

            // Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('pengurus/akun/edit');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Berhasil memperbarui password transaksi.
                    </div>'
                );
                redirect('pengurus/akun/edit');
            }
        }
    }

    // ########################################

    public function pass_check($pass_tr)
    {
        $id_pengurus = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT password
                                    FROM tb_pengurus
                                    WHERE id_pengurus = "' . $id_pengurus . '" ');
        $user = $query->row_array();

        if (password_verify($pass_tr, $user['password'])) {
            return TRUE;
        } else {
            $this->form_validation->set_message('pass_check', 'Password login salah');
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
