<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jabatan
 *
 * @author Akhmad Fariiqun Awwa
 */
class Jabatan extends CI_Controller  {
	function __construct(){
		parent::__construct();
		$this->load->model("jabatan_m"); //constructor yang dipanggil ketika memanggil jabatan.php untuk melakukan pemanggilan pada model : jabatan_m.php yang ada di folder models
	}

	public function index()
	{
		//Function yang digunakan untuk menampilkan view jabatan_view.php
		//berisi dari return value pada function getAllJabatan() di file models/jabatan_m.php
		if($query = $this->jabatan_m->get_all())
                {
                    $data['records'] = $query;
                }
                $this->load->view('daftar_jabatan', $data); //menampilkan view 'jabatan_view' dan juga passing data dengan nama $data(Bentuknya array) yang berisi 'listJabatan'
	}

	public function addProduct()
	{
            //Function yang dipanggil ketika ingin melakukan add produk kemudian menampilkan add_product_view
		$this->load->view('add_product_view');
	}

	public function addProductDb()
	{
		//Function yang dipanggil ketika ingin memasukan produk ke dalam database
		$data = array(
				'productName' => $this->input->post('productName'),
				'stock' => $this->input->post('stock')
				);
		$this->products_model->addProduct($data); //passing variable $data ke products_model

		redirect('products'); //redirect page ke halaman utama controller products
	}

	public function updateProduct()
	{
		//Function yang dipanggil ketika ingin melakukan update produk kemudian menampilkan update_product_view
	}

	public function updateProductDb()
	{
		//Function yang dipanggil ketika ingin melakukan update terhadap produk yang ada di dalam database
	}

	public function deleteProductDb()
	{
		//Function yang dipanggil ketika ingin melakukan delete produk dari database
	}
}

/* Location: ./application/controllers/jabatan.php */