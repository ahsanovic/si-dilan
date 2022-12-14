<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('setting_model');
    }
   
    public function index() 
    {
        $data['title'] = 'Beranda';
        $data['data'] = $this->setting_model->fetch_data();
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('beranda/index', $data);
        $this->load->view('dist/_partials/footer');
    }

}
