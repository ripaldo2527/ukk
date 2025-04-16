<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->db->select('penjualan.*, pelanggan.*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'pelanggan.PelangganID = penjualan.PelangganID', 'left');
        $penjualan = $this->db->get()->result();

        $pelanggan = $this->db->get('pelanggan')->result();

        $data = [
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan
        ];

        $this->load->view('Template/Header');
        $this->load->view('Penjualan/Penjualan', $data);
        $this->load->view('Template/Footer');
    }
    public function ProsesPenjualan($id)
    {
        $this->db->where('PelangganID', $id);
        $pelanggan = $this->db->get('pelanggan')->row();

        $tanggal = date('Y-m-d');
        if ($pelanggan) {
            $data = [
                'TanggalPenjualan' => $tanggal,
                'PelangganID' => $pelanggan->PelangganID,
                'TotalHarga' => 0
            ];
            $this->db->insert('penjualan', $data);
            $PenjualanID = $this->db->insert_id();
            if ($PenjualanID) {
                redirect('Penjualan/Detail/' . $PenjualanID);
            } else {
                redirect('Penjualan');
            }
        } else {
            $this->session->set_flashdata('error', ' Gagal Menambahkan Penjualan');
            redirect('penjualan');
        }
    }

    public function HapusPenjualan($id)
    {
        $this->db->where('PenjualanID', $id);
        $delete = $this->db->delete('penjualan');
        if ($delete) {
            $this->session->set_flashdata('success', '<div class="alert alert-primary" role="alert">Data Penjualan Telah Dihapus</div>');
            redirect('Penjualan');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-primary" role="alert">Data Penjualan Tidak Bisa Dihapus</div>');
            redirect('Penjualan');
        }
    }

    public function Detail($id)
    {

        $this->db->select('penjualan.*, pelanggan.*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'pelanggan.PelangganID = penjualan.PelangganID', 'left');
        $this->db->where('PenjualanID', $id);
        $penjualan = $this->db->get()->row();

        $this->db->select('detail_penjualan.*, produk.*');
        $this->db->from('detail_penjualan');
        $this->db->join('produk', 'produk.ProdukID = detail_penjualan.ProdukID', 'left');
        $this->db->where('PenjualanID', $id);
        $detail = $this->db->get()->result();

        $this->db->select_sum("Subtotal");
        $this->db->where('PenjualanID', $id);
        $TotalHarga = $this->db->get('detail_penjualan')->row();

        $produk = $this->db->get('produk')->result();

        $data = [
            'produk' => $produk,
            'penjualan' => $penjualan,
            'detail' => $detail,
            'TotalHarga' => $TotalHarga,
        ];

        $this->load->view('Template/Header');
        $this->load->view('Penjualan/Detail', $data);
        $this->load->view('Template/Footer');
    }


    public function AddDetail()
    {
        $ProdukID = $this->input->post('ProdukID');
        $JumlahProduk = $this->input->post('JumlahProduct');
        $PenjualanID = $this->input->post('PenjualanID');

        $this->form_validation->set_rules('ProdukID', 'Produk ID', 'required');
        $this->form_validation->set_rules('JumlahProduct', 'Jumlah Produk', 'required');
        $this->form_validation->set_rules('PenjualanID', 'Penjualan ID', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->Detail($PenjualanID);
        } else {
            $this->db->where('PenjualanID', $PenjualanID);
            $this->db->where('ProdukID', $ProdukID);
            $ProdukSudahAda = $this->db->get('detail_penjualan')->row();

            if ($ProdukSudahAda) {
                $this->session->set_flashdata('error', '<div class="alert alert-primary" role="alert">Produk sudah ada di detail penjualan</div>');
                redirect('Penjualan/Detail/' . $PenjualanID);
            }

            $produk = $this->db->where('ProdukID', $ProdukID)->get('produk')->row();

            if (!$produk || $produk->Stok < $JumlahProduk) {
                $this->session->set_flashdata('error', 'Stok tidak mencukupi');
                redirect('Penjualan/Detail/' . $PenjualanID);
            }

            $SubTotal = $JumlahProduk * (int) $produk->Harga;
            $data = [
                'PenjualanID' => $PenjualanID,
                'ProdukID' => $ProdukID,
                'JumlahProduk' => $JumlahProduk,
                'Subtotal' => $SubTotal,
            ];

            if ($this->db->insert('detail_penjualan', $data)) {

                $this->db->where('ProdukID', $ProdukID);
                $this->db->set('Stok', 'Stok - ' . $JumlahProduk, false);
                $this->db->update('produk');

                $this->session->set_flashdata('success', '<div class="alert alert-primary" role="alert">Produk ditambahkan</div>');
                redirect('Penjualan/Detail/' . $PenjualanID);
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-primary" role="alert">Gagal menambahkan detail</div>');
                redirect('Penjualan/Detail/' . $PenjualanID);
            }
        }
    }



    public function HapusDetail($id)
    {
        $this->db->where('DetailID', $id);
        $detail = $this->db->get('detail_penjualan')->row();

        $jumlahDikembalikan = $detail->JumlahProduk;

        $this->db->set('Stok', 'Stok + ' . $jumlahDikembalikan, false);
        $kembaliStok = $this->db->update('produk');

        if ($kembaliStok) {
            // Hapus
            $this->db->where('DetailID', $id);
            $this->db->delete('detail_penjualan');

            //Hapus
            $this->session->set_flashdata('success', '<div class="alert alert-primary" role="alert">Detail Produk Dihapus</div>');
            redirect('Penjualan/Detail/' . $detail->PenjualanID);
        }
    }

    public function Bayar($id)
    {
        $TotalHarga = $this->input->post('TotalHarga');
        $Pembayaran = $this->input->post('Pembayaran');

        if ($Pembayaran < $TotalHarga) {
            $this->session->set_flashdata('error', '<div class="alert alert-primary" role="alert">embayaran Kurang</div>');
            return;
        }

        $data = [
            'TotalHarga' => $TotalHarga,
            'TotalPembayaran' => $Pembayaran,
        ];
        $this->db->where('PenjualanID', $id);

        $bayar = $this->db->update('penjualan', $data);

        if ($bayar) {
            redirect('Penjualan/Struk/' . $id);
        } else {
            redirect('Penjualan/Detail/' . $id);
        }
    }

    public function Struk($id)
    {
        $this->db->select('penjualan.*,pelanggan.*');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'pelanggan.PelangganID = penjualan.PelangganID', 'left');
        $this->db->where('PenjualanID', $id);
        $penjualan = $this->db->get()->row();

        $this->db->select('detail_penjualan.*, produk.*');
        $this->db->from('detail_penjualan');
        $this->db->join('produk', 'produk.ProdukID = detail_penjualan.ProdukID', 'left');
        $this->db->where('PenjualanID', $id);
        $detail = $this->db->get()->result();

        $produk = $this->db->get('produk')->row();

        $data = [
            'produk' => $produk,
            'penjualan' => $penjualan,
            'detail' => $detail,
        ];
        $this->load->view('Penjualan/Struk', $data);
    }

}