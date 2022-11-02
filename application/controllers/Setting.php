<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('setting_model');
    }
   
    public function index() 
    {
        $data['title'] = 'Setting';
        $data['data'] = $this->setting_model->fetch_data();
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('setting/index', $data);
        $this->load->view('dist/_partials/footer');
    }

    private function _upload($name)
    {
        $config['upload_path'] = './public/image';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1048;
        $config['encrypt_name'] = true;

        // load library upload
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($name)) {
            $data['success'] = false;
            $data['msg'] = $this->upload->display_errors();
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function update()
    {        
        $item = $this->setting_model->fetch_data();
        if ($item) {
            $data = [
                'about' => $this->input->post('about'),
                'tupoksi' => $this->input->post('tupoksi'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if (!empty($_FILES['sotk']['name'])) {
                if (file_exists('public/image/' . $item->sotk) && $item->sotk) {
                    unlink('public/image/' . $item->sotk);
                }
                $data['sotk'] = $this->_upload('sotk');
            }
            
            if (!empty($_FILES['wilker']['name'])) {
                if (file_exists('public/image/' . $item->wilker) && $item->wilker) {
                    unlink('public/image/' . $item->wilker);
                }
                $data['wilker'] = $this->_upload('wilker');
            }

            $this->setting_model->update(['id' => $item->id], $data);
        } else {
            $data = [
                'about' => $this->input->post('about'),
                'tupoksi' => $this->input->post('tupoksi'),
                'sotk' => !empty($_FILES['sotk']['name']) ? $this->_upload('sotk') : null,
                'wilker' => !empty($_FILES['wilker']['name']) ? $this->_upload('wilker') : null,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->setting_model->save($data);
        }

        echo json_encode([
            'status' => true,
            'success' => true
        ]);
    }

}
