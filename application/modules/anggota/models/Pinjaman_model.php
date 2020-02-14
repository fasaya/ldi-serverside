<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman_model extends CI_Model
{

    function get_pinjaman()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("id_pinjaman, kode_tr, amount, bunga, periode, angsuran, date, status");
        $this->db->where("id_anggota", $id_anggota);
        $this->db->from("tb_pinjaman");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    function get_pinjaman_belum_bayar()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("tb_pinjaman_bayar.kode_tr AS kode_pb, tb_pinjaman_bayar.amount, tb_pinjaman_bayar.angsuran_ke, tb_pinjaman_bayar.date, tb_pinjaman_bayar.status, tb_pinjaman.kode_tr AS kode_pj");
        $this->db->from("tb_pinjaman, tb_pinjaman_bayar");
        $this->db->where("tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman");
        $this->db->where("tb_pinjaman.id_anggota", $id_anggota);
        $this->db->where("tb_pinjaman_bayar.status", "0");
        $this->db->order_by("tb_pinjaman_bayar.date", "ASC");
        return $this->db->get()->result();
    }

    function get_pinjaman_sudah_bayar()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("tb_pinjaman_bayar.kode_tr AS kode_pb, tb_pinjaman_bayar.amount, tb_pinjaman_bayar.tgl_bayar, tb_pinjaman_bayar.angsuran_ke, tb_pinjaman_bayar.date, tb_pinjaman_bayar.status, tb_pinjaman.kode_tr AS kode_pj");
        $this->db->from("tb_pinjaman, tb_pinjaman_bayar");
        $this->db->where("tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman");
        $this->db->where("tb_pinjaman.id_anggota", $id_anggota);
        $this->db->where("tb_pinjaman_bayar.status", "1");
        $this->db->order_by("tb_pinjaman_bayar.tgl_bayar", "ASC");
        return $this->db->get()->result();
    }

    function get_ket_pinjaman()
    {
        $this->db->select("id_setting_pinjaman, jangka_waktu, bunga");
        $this->db->where("status = '1'");
        $this->db->from("pinjaman");
        $this->db->order_by("jangka_waktu", "ASC");
        return $this->db->get()->result();
    }


    // ############################################

    function bayar_pinjaman($kode_tr)
    {
        $id_anggota = $this->session->userdata('id_user');

        // cek if package exists
        $cek = $this->db->query(' SELECT tb_pinjaman.id_anggota, tb_pinjaman.kode_tr, tb_pinjaman_bayar.id_pinjaman, tb_pinjaman_bayar.status, tb_pinjaman_bayar.id_bayar, tb_pinjaman_bayar.amount, tb_pinjaman_bayar.angsuran_ke
                                    FROM tb_pinjaman_bayar, tb_pinjaman
                                    WHERE tb_pinjaman_bayar.id_pinjaman = tb_pinjaman.id_pinjaman
                                    AND tb_pinjaman_bayar.kode_tr = "' . $kode_tr . '"');
        if ($cek->num_rows() > 0) {
            $result1 = $cek->row_array();
            if ($id_anggota == $result1['id_anggota']) {

                $status_pembayaran = $result1['status'];
                $id_pinjaman = $result1['id_pinjaman'];
                $angsuran_ke = $result1['angsuran_ke'];


                if ($angsuran_ke == "1") {
                    $sudah_bayar_sebelumnya = TRUE;
                } else {
                    $angsuran_sebelumnya = (int) $angsuran_ke - 1;

                    $cek2 = $this->db->query(' SELECT status
                                            FROM tb_pinjaman_bayar
                                            WHERE id_pinjaman = "' . $id_pinjaman . '" AND angsuran_ke = "' . $angsuran_sebelumnya . '"
                                            LIMIT 1');
                    $result2 = $cek2->row_array();
                    $status_angsuran_sebelumnya = $result2['status'];
                    if ($status_angsuran_sebelumnya == "1") {
                        $sudah_bayar_sebelumnya = TRUE;
                    } else {
                        $sudah_bayar_sebelumnya = FALSE;
                    }
                }

                // cek apakah sudah bayar tagihan sebelumnya
                if ($sudah_bayar_sebelumnya) {

                    if ($status_pembayaran == "0") {

                        $id_anggota = $this->session->userdata('id_user');
                        $kode_pinjaman = $result1['kode_tr'];
                        $id_bayar = $result1['id_bayar'];
                        $amount = $result1['amount'];
                        $date = new_date();
                        $balance = $this->Balance->total_balance();

                        //Start database transaction
                        $this->db->trans_start();

                        $data1 = [
                            'status' => "1",
                            'tgl_bayar' => $date
                        ];
                        $this->db->update('tb_pinjaman_bayar', $data1, "id_pinjaman = '" . $id_pinjaman . "' AND kode_tr = '" . $kode_tr . "'");

                        // report transaksi
                        $report_tr1 = array(
                            'id_anggota' => $id_anggota,
                            'id' => $id_bayar,
                            'kode_tr' => $kode_tr,
                            'debit' => $amount,
                            'credit' => 0,
                            'saldo' => $balance - $amount,
                            'deskripsi' => "Membayar tagihan ke-" . $angsuran_ke . " dari pinjaman [" . $kode_pinjaman . "]",
                            'tipe' => "bayar_pinjaman",
                            'date' => $date
                        );
                        $this->db->insert('tb_report', $report_tr1);

                        // report activity
                        $report_act = array(
                            'id_user' => $id_anggota,
                            'user' => "anggota",
                            'keterangan' => "Membayar tagihan ke-" . $angsuran_ke . " dari pinjaman [" . $kode_pinjaman . "]",
                            'date' => $date
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
                            redirect('anggota/pinjaman/pembayaran');
                        } else {
                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terima kasih telah membayar tagihan nomor [' . $kode_tr . '].
                        </div>'
                            );
                            redirect('anggota/pinjaman/pembayaran');
                        }
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Tagihan telah dibayar.
                    </div>'
                        );
                        redirect('anggota/pinjaman/laporan');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Harap membayar tagihan sebelumnya.
                </div>'
                    );
                    redirect('anggota/pinjaman/pembayaran');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('anggota/pinjaman/pembayaran');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan.
                </div>'
            );
            redirect('anggota/pinjaman/pembayaran');
        }
    }


    function pengajuan_pinjaman($data)
    {
        // cek apabila sudah menjadi anggota lebih dari 3 bulan
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT join_date
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        $result = $query->row_array();
        $tgl_join = $result['join_date'];
        $tgl_tambah3bln =  strtotime("+3 month", strtotime($tgl_join));
        $tgl_hari_ini = strtotime(new_date());
        $kurang = $tgl_hari_ini - $tgl_tambah3bln;
        $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

        if ($selisih > 0) {

            if ($this->Helper->is_sudah_bayar_simpanan()) {
                $bisa_pinjam = $this->Helper->setting('PINJAMAN', 'status');
                if ($bisa_pinjam == '1') {

                    //Start database transaction
                    $this->db->trans_start();

                    $id_jangka = $data['jangka'];

                    $query1 = $this->db->query(' SELECT jangka_waktu, bunga
                                    FROM pinjaman
                                    WHERE id_setting_pinjaman = "' . $id_jangka . '" AND status = "1"');
                    $result1 = $query1->row_array();

                    $periode = $result1['jangka_waktu'];
                    $bunga = $result1['bunga'];
                    $nilai = $data['nilai'];
                    $brp_kali_angsuran = $data['angsuran'];
                    $keterangan = $data['keterangan'];

                    $kode_tr = $this->Helper->generate_kodeTR("PJ");
                    $currency = $this->Helper->setting('CURRENCY');
                    $date = new_date();

                    //insert into table
                    $data1 = [
                        'id_anggota' => $id_anggota,
                        'kode_tr' => $kode_tr,
                        'amount' => $nilai,
                        'bunga' => $bunga,
                        'periode' => $periode,
                        'angsuran' => $brp_kali_angsuran,
                        'keterangan' => $keterangan,
                        'date' => $date,
                        'status' => "0" // 1 berarti baru mengajukan permohonan
                    ];
                    $this->db->insert('tb_pinjaman', $data1);

                    // report activity
                    $report_act = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Mengajukan permohonan pinjaman [" . $kode_tr . "]  senilai " . $currency . " " . rupiah($nilai),
                        'date' => $date
                    );
                    $this->db->insert('tb_report_activity', $report_act);

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-dange">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Gagal melakukan permohonan pinjaman.
                    </div>'
                        );
                        redirect('anggota/pinjaman/formulir');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Berhasil mengajukan permohonan pinjaman. Silahkan tunggu sampai pinjaman dikonfirmasi.
                    </div>'
                        );
                        redirect('anggota/pinjaman/pinjamansaya');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Maaf saat ini Anda tidak bisa mengajukan permohonan pinjaman.
                    </div>'
                    );
                    redirect('anggota/pinjaman/formulir');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Harap untuk membayar Simpanan Wajib dan Pokok terlebih dahulu.
                </div>'
                );
                redirect('anggota/pinjaman/formulir');
            }    # code...
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Anda harus menjadi anggota selama minimal 3 bulan untuk dapat mengajukan pinjaman.
            </div>'
            );
            redirect('anggota/pinjaman/formulir');
        }
    }

    // ############################################

    function fetch_bayar($kode_tr)
    {
        $id_anggota = $this->session->userdata('id_user');

        // cek if package exists
        $cek = $this->db->query(' SELECT id_pinjaman
                                    FROM tb_pinjaman_bayar
                                    WHERE kode_tr = "' . $kode_tr . '" AND status = "0"');
        $result1 = $cek->row_array();
        if ($cek->num_rows() > 0) {

            $query = $this->db->query(' SELECT tb_pinjaman.kode_tr, tb_pinjaman_bayar.id_bayar, tb_pinjaman_bayar.id_pinjaman, tb_pinjaman_bayar.amount, tb_pinjaman_bayar.angsuran_ke, tb_pinjaman_bayar.date
                                        FROM tb_pinjaman_bayar, tb_pinjaman
                                        WHERE tb_pinjaman_bayar.id_pinjaman = tb_pinjaman.id_pinjaman
                                            AND tb_pinjaman_bayar.kode_tr = "' . $kode_tr . '" AND tb_pinjaman_bayar.status = "0"');

            $currency = $this->Helper->setting('CURRENCY');

            $result = $query->row_array();

            $id_bayar = $result['id_bayar'];
            $id_pinjaman = $result['id_pinjaman'];
            $kode_pinjaman = $result['kode_tr'];
            $amount = $result['amount'];
            $angsuran_ke = $result['angsuran_ke'];
            $jatuh_tempo = $result['date'];

            $output = '
                <header class="card-header">
                    <h2 class="card-title">Bayar Pinjaman [' . $kode_tr . ']</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="font-weight-semibold mt-1 mb-3 text-center">Bayar Pinjaman?</h3>
                    </div>
                    <table class="table table-responsive-md table-striped table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td>No. Pinjaman</td>
                                <td>' . $kode_pinjaman . '</td>
                            </tr>
                            <tr>
                                <td>No. Pembayaran</td>
                                <td>' . $kode_tr . '</td>
                            </tr>
                            <tr>
                                <td>Angsuran Ke</td>
                                <td>' . $angsuran_ke . '</td>
                            </tr>
                            <tr>
                                <td>Tanggal Jatuh Tempo</td>
                                <td>' . $jatuh_tempo . '</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td><strong>' . $currency . ' ' . rupiah($amount) . '</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="' . base_url() . 'anggota/pinjaman/bayar/' . $kode_tr . '" class="btn btn-primary">Bayar</a>
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        </div>
                    </div>
                </footer>';

            return $output;
        } else {
            $output = '
                <header class="card-header">
                <h2 class="card-title">Bayar Pinjaman</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <p class="text-center">Data tidak ditemukan</p>
                    </div>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        </div>
                    </div>
                </footer>';

            return $output;
        }
    }
} //end model
