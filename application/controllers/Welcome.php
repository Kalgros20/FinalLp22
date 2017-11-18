<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	// criar página é a mesma coisa que criar um novo método
	public function hello(){
		$this->load->view('intro/cabecalho');
		$this->load->view('intro/topicos');
	}
}
