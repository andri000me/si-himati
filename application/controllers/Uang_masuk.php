<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $data['user'] = $this->db->get_where('user', ['nama' =>
        $this->session->userdata('nama')])->row_array();
    }


    public function index()
    {
        $data['title'] = "SIM - HMTI";
        $data['uang_masuk'] = $this->db->get('uang_masuk')->result_array();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/uang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('total', 'Total', 'trim|required', [
            'required' => 'Total uang tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'trim|required', [
            'required' => 'Tanggal uang masuk tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = "SIM - HMTI";
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/uang_masuk_tambah');
            $this->load->view('templates/footer');
        } else {
            $this->load->model('uang_model', 'uang');
            $this->uang->simpan_uang_masuk();
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
           Pemasukan berhasil ditambah!
            </div>');
            redirect('uang_masuk');
        }
    }

    public function ubah()
    {
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('total', 'Total', 'trim|required', [
            'required' => 'Total uang tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'trim|required', [
            'required' => 'Tanggal uang masuk tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {

            $data['uang_masuk'] = $this->db->get_where('uang_masuk', ['id' => $id])->row_array();
            $data['title'] = "SIM - HMTI";
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/uang_masuk_ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('uang_model', 'uang');
            $this->uang->ubah_uang_masuk($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                Pemasukan berhasil dirubah!
            </div>');
            redirect('uang_masuk');
        }
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->load->model('uang_model', 'uang');
        $this->uang->hapus_uang_masuk();
        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                Pemasukan berhasil dihapus!
            </div>');
        redirect('uang_masuk');
    }
}
