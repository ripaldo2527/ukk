<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Produk extends CI_Controller
{
    public function index()
    {
        $produk = $this->db->get('Produk')->result();
        $data = [
            'produk' => $produk,
        ];
        $this->load->view('Template/Header');
        $this->load->view('Produk', $data);
        $this->load->view('Template/Footer');
    }

    public function ProsesCreate()
    {
        $this->form_validation->set_rules('NamaProduk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('Harga', 'Harga Produk', 'required');
        $this->form_validation->set_rules('Stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->Create();
        } else {
            $data = [
                'NamaProduk' => $this->input->post('NamaProduk'),
                'Harga' => $this->input->post('Harga'),
                'Stok' => $this->input->post('Stok'),
            ];
            if ($this->db->insert('produk', $data)) {
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data Produk');
                redirect('Produk');
            } else {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Data Produk');
                redirect('Produk/Create');
            }
        }
    }



    public function ProsesEdit()

    {

        $this->form_validation->set_rules('NamaProduk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('Harga', 'Harga', 'required');
        $this->form_validation->set_rules('Stok', 'Stok', 'required|numeric');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->Edit();
        } else {
            $data = [
                'NamaProduk' => $this->input->post('NamaProduk'),
                'Harga' => $this->input->post('Harga'),
                'Stok' => $this->input->post('Stok'),
            ];

            $this->db->where('ProdukID', $id);
            $update = $this->db->update('produk', $data);
            if ($update) {
                $this->session->set_flashdata('success', 'Berhasil Mengubah Data Produk');
                redirect('Produk');
            } else {
                $this->session->set_flashdata('error', 'Gagal Mengubah Data Produk');
                redirect('Produk/Edit/' . $id);
            }
        }
    }

    public function Hapus($id)

    {

        $this->db->where('ProdukID', $id);
        $delete = $this->db->delete('produk');

        if ($delete) {

            $this->session->set_flashdata('success', 'Berhasil Menghapus Data Produk');
            redirect('Produk');
        } else {

            $this->session->set_flashdata('error', 'Gagal Menghapus Data Produk');
            redirect('Produk');
        }

    }
}