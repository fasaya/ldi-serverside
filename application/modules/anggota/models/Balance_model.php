<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balance_model extends CI_Model
{
    // ###########################################################################
    // TOTAL
    function total_balance($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $dp_sukses = $this->deposit_sukses($id_anggota);

        $wd_sukses = $this->withdrawal_sukses($id_anggota);
        $wd_pending = $this->withdrawal_pending($id_anggota);
        $wd = $wd_pending + $wd_sukses;
        $wd_batal = $this->withdrawal_batal($id_anggota);

        $keuntungan = $this->total_keuntungan($id_anggota);
        $deposito_nonaktif = $this->deposito_nonaktif($id_anggota);
        $deposito_aktif = $this->deposito_aktif($id_anggota);
        $simpanan = $this->total_simpanan($id_anggota);
        $biaya_pendaftaran = $this->biaya_pendaftaran($id_anggota);
        $biaya_withdraw = $this->biaya_withdraw($id_anggota);
        $simpanan_masuk_saldo = $this->simpanan_yg_bisa_diambil($id_anggota);
        $pinjaman = $this->pinjaman($id_anggota);
        $pinjaman_dibayar = $this->pinjaman_bayar("1", $id_anggota);

        $total = $dp_sukses + $keuntungan + $deposito_nonaktif + $simpanan_masuk_saldo  + $pinjaman - $wd - $simpanan - $deposito_aktif - $biaya_pendaftaran - $biaya_withdraw - $pinjaman_dibayar;

        if ($total <= 0) {
            return 0;
        } else {
            return $total;
        }
    }

    // DEPOSIT
    function deposit_sukses($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_deposit
                                    WHERE status =  '1' AND 
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // WITHDRAWAL
    function withdrawal_sukses($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_withdrawal
                                    WHERE status =  '1' AND 
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function withdrawal_pending($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_withdrawal
                                    WHERE status =  '0' AND 
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function withdrawal_batal($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_withdrawal
                                    WHERE status =  '9' AND 
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // DEPOSITO
    function deposito_aktif($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_deposito
                                    WHERE id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function deposito_nonaktif($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_deposito
                                    WHERE status =  '0' AND 
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function deviden($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(tb_deviden.amount)
                                    FROM tb_deviden, tb_deposito
                                    WHERE tb_deviden.id_deposito = tb_deposito.id_deposito
                                        AND id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_deviden.amount)'];
    }

    // KEUNTUNGAN
    function total_keuntungan($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $royalti = $this->royalti($id_anggota);
        $bonus_sponsor  = $this->bonus_sponsor($id_anggota);
        $deviden  = $this->deviden($id_anggota);
        $komisi_sponsor = $this->komisi_sponsor($id_anggota);
        $bagi_untung = $this->bagi_untung($id_anggota);

        return $royalti + $deviden + $bonus_sponsor + $komisi_sponsor + $bagi_untung;
    }

    // Biaya withdraw
    function biaya_withdraw($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(tb_biaya_withdraw.amount)
                                    FROM tb_biaya_withdraw, tb_withdrawal
                                    WHERE tb_withdrawal.id_withdrawal = tb_biaya_withdraw.id_withdrawal
                                        AND tb_withdrawal.id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_biaya_withdraw.amount)'];
    }

    // Biaya pendaftaran
    function biaya_pendaftaran($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_biaya_pendaftaran
                                    WHERE id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // Bonus_Sponsor
    function bonus_sponsor($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_bonus_sponsor
                                    WHERE id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // komisi_sponsor
    function komisi_sponsor($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_komisi_sponsor
                                    WHERE id_parent = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // bagi_untung
    function bagi_untung($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(tb_bagi_untung.amount)
                                    FROM tb_bagi_untung, tb_simpanan_sukarela
                                    WHERE tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela
                                        AND tb_simpanan_sukarela.id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_bagi_untung.amount)'];
    }

    // Royalti
    function royalti($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(" SELECT SUM(tb_royalti.amount)
                                    FROM tb_royalti, tb_deposito
                                    WHERE tb_royalti.id_deposito = tb_deposito.id_deposito
                                        AND id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_royalti.amount)'];
    }

    // SIMPANAN
    function total_simpanan($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }
        $pokok = $this->simpanan_pokok($id_anggota);
        $wajib = $this->simpanan_wajib($id_anggota);
        $sukarela = $this->simpanan_sukarela($id_anggota);

        return $wajib + $pokok + $sukarela;
    }

    function simpanan_pokok($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_pokok
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_wajib($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_wajib
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_sukarela($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_sukarela
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_yg_bisa_diambil($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simp_bisa_diambil
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_yg_bisa_diambil_by_tipe($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simp_bisa_diambil
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // #########################################

    function pinjaman($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_pinjaman
                                    WHERE id_anggota = "' . $id_anggota . '" AND status ="1"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function pinjaman_bayar($status = "1", $id_anggota = "")
    {
        // status = "1" itu sudah dibayar
        // status = "0" itu belum dibayar

        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }

        $query = $this->db->query(' SELECT SUM(tb_pinjaman_bayar.amount)
                                    FROM tb_pinjaman_bayar, tb_pinjaman
                                    WHERE tb_pinjaman_bayar.id_pinjaman = tb_pinjaman.id_pinjaman
                                    AND tb_pinjaman.id_anggota = "' . $id_anggota . '" AND tb_pinjaman_bayar.status ="' . $status . '"');
        $result = $query->row_array();
        return $result['SUM(tb_pinjaman_bayar.amount)'];
    }

    // ###########################################################################

    // DASHBOARD

    function jumlah_anggota()
    {
        $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_anggota 
                                    WHERE status = "1" ');
        return $query->num_rows();
    }

    function jumlah_keuntungan()
    {
        $query1 = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_deviden");
        $result1 = $query1->row_array();
        $deviden = $result1['SUM(amount)'];

        $query2 = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_royalti");
        $result2 = $query2->row_array();
        $royalti = $result2['SUM(amount)'];

        return $deviden + $royalti;
    }

    function jumlah_pinjaman()
    {
        $query1 = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_pinjaman WHERE status='1'");
        $result1 = $query1->row_array();
        return $result1['SUM(amount)'];
    }

    function jumlah_pinjaman_dibayar()
    {
        $query1 = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_pinjaman_bayar WHERE status='1'");
        $result1 = $query1->row_array();
        return $result1['SUM(amount)'];
    }

    function jumlah_deposito()
    {
        $query1 = $this->db->query(" SELECT SUM(amount)
                                    FROM tb_deposito");
        $result1 = $query1->row_array();
        return $result1['SUM(amount)'];
    }

    function jumlah_simpanan()
    {
        // $query = $this->db->query(" SELECT SUM(amount) FROM tb_simpanan_wajib
        //                             UNION ALL
        //                             SELECT SUM(amount) FROM tb_simpanan_pokok
        //                             UNION ALL
        //                             SELECT SUM(amount) FROM tb_simpanan_sukarela
        //                             ");
        // $result = $query->row_array();
        // return $result['SUM(amount)'];


        $query1 = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_wajib');
        $result1 = $query1->row_array();
        $s_wajib = $result1['SUM(amount)'];

        $query2 = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_pokok');
        $result2 = $query2->row_array();
        $s_pokok = $result2['SUM(amount)'];

        $query3 = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_sukarela');
        $result3 = $query3->row_array();
        $s_sukarela = $result3['SUM(amount)'];

        return $s_wajib + $s_pokok + $s_sukarela;
    }


    // ###########################################################################

    function get_mutasiDompetAnggota()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("date, kode_tr, debit, credit, saldo, deskripsi");
        $this->db->from("tb_report");
        $this->db->where("id_anggota", $id_anggota);
        $this->db->order_by("date", "DESC");
        $this->db->order_by("kode_tr", "DESC");
        return $this->db->get()->result();
    }
} //end model
