<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_controller
{
    public function index()
    {
        $penjualan = $this->db->count_all('penjualan');
        $pelanggan = $this->db->count_all('pelanggan');
        $produk = $this->db->count_all('produk');

        $this->db->select_sum('TotalHarga');
        $this->db->from('penjualan');
        $pendapatan = $this->db->get()->row();
        $data = [
            'penjualan' => $penjualan,
            'pendapatan' => $pendapatan,
            'pelanggan' => $pelanggan,
            'produk' => $produk,
        ];
        $this->load->view('Template/Header');
        $this->load->view('Dashboard', $data);
        $this->load->view('Template/Footer');
    }
}