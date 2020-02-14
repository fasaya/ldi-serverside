<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    function get_setting_pinjaman()
    {
        $this->db->select("*");
        $this->db->from("pinjaman");
        return $this->db->get()->result();
    }

    function get_bagi_untung()
    {
        $this->db->select("kode, bulan, profit");
        $this->db->from("persen_share_profit");
        return $this->db->get()->result();
    }

    function get_gateway()
    {
        $this->db->select("*");
        $this->db->from("tb_gateway");
        return $this->db->get()->result();
    }

    // #######################################################

    function update_status($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_lentera_setting', ['status' => $data['login_anggota']], "kode = 'LOGIN_ANGGOTA'");
        $this->db->update('tb_lentera_setting', ['status' => $data['deposit']], "kode = 'DEPOSIT'");
        $this->db->update('tb_lentera_setting', ['status' => $data['withdraw']], "kode = 'WITHDRAW'");
        $this->db->update('tb_lentera_setting', ['status' => $data['deposito']], "kode = 'DEPOSITO'");
        $this->db->update('tb_lentera_setting', ['status' => $data['simpanan']], "kode = 'SIMPANAN'");
        $this->db->update('tb_lentera_setting', ['status' => $data['pinjaman']], "kode = 'PINJAMAN'");
        $this->db->update('tb_lentera_setting', ['status' => $data['daftar_anggota']], "kode = 'DAFTAR_ANGGOTA'");
        $this->db->update('tb_lentera_setting', ['status' => $data['devroy']], "kode = 'REFRESH'");
        $this->db->update('tb_lentera_setting', ['status' => $data['share_profit']], "kode = 'CJ_SHARE_PROFIT'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan status",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan status.
            </div>'
            );
            redirect('pengurus/setting');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan status.
            </div>'
            );
            redirect('pengurus/setting');
        }
    }

    function update_pinjaman($id_setting_pinjaman, $data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('pinjaman', $data, "id_setting_pinjaman = '" . $id_setting_pinjaman . "'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan pinjaman",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan pinjaman.
            </div>'
            );
            redirect('pengurus/setting/pinjaman/' . $id_setting_pinjaman);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan pinjaman.
            </div>'
            );
            redirect('pengurus/setting/pinjaman/' . $id_setting_pinjaman);
        }
    }

    function update_bagiuntung($kode, $data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('persen_share_profit', $data, "kode = '" . $kode . "'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan bagi untung",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan bagi untung.
            </div>'
            );
            redirect('pengurus/setting/bagiuntung/' . $kode);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan bagi untung.
            </div>'
            );
            redirect('pengurus/setting/bagiuntung/' . $kode);
        }
    }

    function update_deposito($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_mikro_min']], "kode = 'DEPOSITO_MIKRO_MIN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_mikro_max']], "kode = 'DEPOSITO_MIKRO_MAX'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_min']], "kode = 'DEPOSITO_MAKRO_MIN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_max']], "kode = 'DEPOSITO_MAKRO_MAX'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_prioritas_min']], "kode = 'DEPOSITO_PRIORITAS_MIN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_prioritas_max']], "kode = 'DEPOSITO_PRIORITAS_MAX'");

        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_mikro_kontrak']], "kode = 'DEPOSITO_MIKRO_KONTRAK'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_mikro_deviden']], "kode = 'DEPOSITO_MIKRO_DEVIDEN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_1_kontrak']], "kode = 'DEPOSITO_MAKRO_1_KONTRAK'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_1_deviden']], "kode = 'DEPOSITO_MAKRO_1_DEVIDEN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_2_kontrak']], "kode = 'DEPOSITO_MAKRO_2_KONTRAK'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_2_deviden']], "kode = 'DEPOSITO_MAKRO_2_DEVIDEN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_3_kontrak']], "kode = 'DEPOSITO_MAKRO_3_KONTRAK'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_makro_3_deviden']], "kode = 'DEPOSITO_MAKRO_3_DEVIDEN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_prioritas_kontrak']], "kode = 'DEPOSITO_PRIORITAS_KONTRAK'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_prioritas_deviden']], "kode = 'DEPOSITO_PRIORITAS_DEVIDEN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['deposito_prioritas_royalti']], "kode = 'DEPOSITO_PRIORITAS_ROYALTI'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan deposito",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan deposito.
            </div>'
            );
            redirect('pengurus/setting');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan deposito.
            </div>'
            );
            redirect('pengurus/setting');
        }
    }

    function update_deposit($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_lentera_setting', ['nilai' => $data['depo_min']], "kode = 'DEPO_MIN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['depo_max']], "kode = 'DEPO_MAX'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan deposit",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan deposit.
            </div>'
            );
            redirect('pengurus/setting');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan deposit.
            </div>'
            );
            redirect('pengurus/setting');
        }
    }

    function update_komisisponsor($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_lentera_setting', ['nilai' => $data['komisi_sponsor_awal']], "kode = 'KOMISI_SPONSOR_AWAL'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['komisi_sponsor_berjalan']], "kode = 'KOMISI_SPONSOR_BERJALAN'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan komisi sponsor",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan komisi sponsor.
            </div>'
            );
            redirect('pengurus/setting#komisisponsor');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan komisi sponsor.
            </div>'
            );
            redirect('pengurus/setting#komisisponsor');
        }
    }

    function update_withdrawal($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_lentera_setting', ['nilai' => $data['wd_min']], "kode = 'WD_MIN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['wd_max']], "kode = 'WD_MAX'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['biaya_wd']], "kode = 'BIAYA_WD'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan withdrawal",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan withdrawal.
            </div>'
            );
            redirect('pengurus/setting#withdrawal');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan withdrawal.
            </div>'
            );
            redirect('pengurus/setting#withdrawal');
        }
    }

    function update_gateway($id_gtw, $data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $gtw = [
            'gateway' => $data['gateway'],
            'no_rekening' => $data['no_rekening'],
            'atas_nama' => $data['atas_nama'],
            'status' => $data['status']
        ];
        $this->db->update('tb_gateway', $gtw, "id_gateway = '" . $id_gtw . "'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan gateway",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan gateway.
            </div>'
            );
            redirect('pengurus/setting/gateway/' . $id_gtw);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan gateway.
            </div>'
            );
            redirect('pengurus/setting/gateway/' . $id_gtw);
        }
    }

    function tambah_gateway($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->insert('tb_gateway', $data);

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Tambah gateway",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal menambah gateway.
            </div>'
            );
            redirect('pengurus/setting#gateway');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil menambah gateway.
            </div>'
            );
            redirect('pengurus/setting#gateway');
        }
    }

    function update_lainnya($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_lentera_setting', ['nilai' => $data['biaya_pendaftaran']], "kode = 'BIAYA_PENDAFTARAN'");
        $this->db->update('tb_lentera_setting', ['nilai' => $data['keuntungan_koperasi']], "kode = 'KEUNTUNGAN_KOPERASI'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan lain",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan lain.
            </div>'
            );
            redirect('pengurus/setting');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan lain.
            </div>'
            );
            redirect('pengurus/setting');
        }
    }

    function update_tanggal($data)
    {
        $id_pengurus = $this->session->userdata('id_user');

        //Start database transaction
        $this->db->trans_start();

        if ($data['btn'] == "reset") {
            $data_baru = [
                'status' => $data['status_tgl'],
                'nilai' => new_date()
            ];
        } else {
            $nilai = $data['nilai_tgl'];
            if ($nilai >= 0) {
                $tgl_baru = date("Y-m-d H:i:s", strtotime("+" . $nilai . " month", strtotime($this->Helper->setting('TGL'))));
            } else {
                $tgl_baru = date("Y-m-d H:i:s", strtotime($nilai . " month", strtotime($this->Helper->setting('TGL'))));
            }

            $data_baru = [
                'status' => $data['status_tgl'],
                'nilai' => $tgl_baru
            ];
        }

        $this->db->update('tb_lentera_setting', $data_baru, "kode = 'TGL'");

        // report activity
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update pengaturan waktu",
            'date' => new_date()
        );
        $this->db->insert('tb_report_activity', $report_act);

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-dange">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Gagal memperbarui pengaturan lain.
            </div>'
            );
            redirect('pengurus/setting');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Berhasil memperbarui pengaturan lain.
            </div>'
            );
            redirect('pengurus/setting');
        }
    }

    function upload_adrt()
    {
        //Start database transaction
        $this->db->trans_start();

        if ($_FILES['file_pdf']['name'] != NULL) {

            $fileName = $_FILES['file_pdf']['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = "pdf_" . uniqid('', true) . "." . $fileActualExt;

            // Set preference 
            $config['upload_path'] = './template/img/isi';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '10240'; // max_size in kb (1 mb = 1024 kb)
            $config['file_name'] = $fileNameNew;

            // Load upload library 
            $this->load->library('upload', $config);

            // File upload
            if ($this->upload->do_upload('file_pdf')) {
                $fotolama = $this->Helper->setting_isi_web('adrt_pdf');
                $path = "./template/images/isi/" . $fotolama;
                if (!unlink($path)) {
                    // echo "Error hapus gambar.";
                }

                //upload
                $uploadData = $this->upload->data();

                // Get data about the file
                $filename = $uploadData['file_name'];

                //insert into table

                $this->db->update('isi_web', ['isi' => $filename], "kode = 'adrt_pdf'");

                // report activity
                $report_act = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'user' => "pengurus",
                    'keterangan' => "Update ad/art",
                    'date' => new_date()
                );
                $this->db->insert('tb_report_activity', $report_act);

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
                    redirect('pengurus/setting/aturan');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil update!
                        </div>'
                    );
                    redirect('pengurus/setting/aturan');
                }
            } else {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ' . $error['error'] . '
                    </div>'
                );
                redirect('pengurus/setting/aturan');
            }
        }
    }

    // #####################################################

    function fetch_add_gateway()
    {
        $output = '
            <header class="card-header">
                <h2 class="card-title">Tambah Gateway</h2>
            </header>
            <div class="card-body">
                <form class="form-horizontal" action="' . base_url() . 'pengurus/setting/addgateway" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Gateway</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="gateway" placeholder="Gateway">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">No. Rekening</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="no_rekening" placeholder="No. rekening">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Atas Nama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="atas_nama" placeholder="Atas nama">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        <div>
                    </form>
            </div>
            ';

        return $output;
    }
} //end model
