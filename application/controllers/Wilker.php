<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wilker extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('setting_model');
    }
   
    public function index() 
    {
        $data['title'] = 'Wilayah Kerja';
        $data['data'] = $this->setting_model->fetch_data();
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('wilker/index', $data);
        $this->load->view('dist/_partials/footer');
    }

}
