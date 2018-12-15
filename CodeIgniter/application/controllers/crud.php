<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud extends CI_Controller {
		public function __construct(){
			parent:: __construct();
			$this->load->model("M_Mhs");
		}
		public function index()
		{
			$data["mahasiswa"] = $this->M_Mhs->getTable();
			$this->load->view("v_tampil.php", $data);
		}
		public function tambahData()
		{
			$this->load->model('M_Nilai');

			$data['nilai'] = $this->M_Nilai->getAll();

			$this->load->view('action/tambah', $data);
		}
		public function simpanData()
		{
			$this->load->model('M_Mhs');
			$nama = $this->input->post('nama');
			$jurusan = $this->input->post('jurusan');
			$agama = $this->input->post('agama');
			$alamat = $this->input->post('alamat');
			$NilaiIPK = $this->input->post('NilaiIPK');

			$data = [
				'nama' => $nama,
				'jurusan' => $jurusan,
				'agama' => $agama,
				'alamat' => $alamat,
				'id_nilai' => $NilaiIPK		
			];

			$simpan = $this->M_Mhs->insert($data);

			if ($simpan) {
				$this->session->set_flashdata('msg_success', 'Data sudah tersimpan');		
			}else {
				$this->session->set_flashdata('msg_error', 'Data gagal disimpan');
			}
			redirect('crud');
		}

		public function edit($id)
		{
			$this->load->model('M_Nilai');
			$this->load->model('M_Mhs');

			$data['nilai'] = $this->M_Nilai->getAll();

			$data['mahasiswa'] = $this->M_Mhs->get($id);

			$this->load->view('action/update', $data);
		}

		public function update(){
	        $this->load->model('M_Mhs');
	        $id = $this->input->post('id');
	        $nama = $this->input->post('nama');
	        $jurusan = $this->input->post('jurusan');
	        $agama = $this->input->post('agama');
	        $alamat = $this->input->post('alamat');
	        $id_nilai = $this->input->post('NilaiIPK');

	        $data = [
	            'nama' => $nama,
	            'jurusan' => $jurusan,
				'agama' => $agama,
	            'alamat' => $alamat,
	            'id_nilai' => $id_nilai
	        ];

        $save = $this->M_Mhs->update($data, $id);

        if($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }
        redirect('crud');
    }

		 public function delete($id){
        $this->load->model('M_Mhs');

        $delete = $this->M_Mhs->delete($id);

        if ($delete) {
            $this->session->set_flashdata('msg_success', 'Data yang anda pilih telah terhapus');
        } else {
            $this->session->set_flashdata('msg_error', 'Tidak bisa hapus pesan');
        }
        redirect('crud');
		}
	}
?>