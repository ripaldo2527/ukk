<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan extends CI_Controller
{
    public function index()
    {
        $pelanggan = $this->db->get('Pelanggan')->result();
        $data = [
            'pelanggan' => $pelanggan,
        ];
        $this->load->view('Template/Header');
        $this->load->view('Pelanggan', $data);
        $this->load->view('Template/Footer');
    }

    public function ProsesCreate()
    {
        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('NomorTelpon', 'Nomor Telpon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->Create();
        } else {
            $data = [
                'NamaPelanggan' => $this->input->post('NamaPelanggan'),
                'Alamat' => $this->input->post('Alamat'),
                'NomorTelpon' => $this->input->post('NomorTelpon'),
            ];
            if ($this->db->insert('pelanggan', $data)) {
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data Pelanggan');
                redirect('Pelanggan');
            } else {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Data Pelanggan');
                redirect('Pelanggan/Create');
            }
        }
    }



    public function ProsesEdit()

    {

        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('NomorTelpon', 'Nomor Telpon', 'required|numeric');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->Edit();
        } else {
            $data = [
                'NamaPelanggan' => $this->input->post('NamaPelanggan'),
                'Alamat' => $this->input->post('Alamat'),
                'NomorTelpon' => $this->input->post('NomorTelpon'),
            ];

            $this->db->where('PelangganID', $id);
            $update = $this->db->update('pelanggan', $data);
            if ($update) {
                $this->session->set_flashdata('success', 'Berhasil Mengubah Data Pelanggan');
                redirect('Pelanggan');
            } else {
                $this->session->set_flashdata('error', 'Gagal Mengubah Data Pelanggan');
                redirect('Pelanggan/Edit/' . $id);
            }
        }
    }

    public function Hapus($id)

    {

        $this->db->where('PelangganID', $id);
        $delete = $this->db->delete('pelanggan');

        if ($delete) {

            $this->session->set_flashdata('success', 'Berhasil Menghapus Data Pelanggan');
            redirect('Pelanggan');
        } else {

            $this->session->set_flashdata('error', 'Gagal Menghapus Data Pelanggan');
            redirect('Pelanggan');
        }

    }
}