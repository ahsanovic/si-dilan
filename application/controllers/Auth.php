<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }
    
    public function index() {
        $this->load->view('auth/login');
        $this->load->view('auth/ajax');
    }

    public function login() {
        cek_ajax();
        cek_csrf_ajax();
        $this->_validate();
        $this->_cek_login();
    }

    /* fungsi validasi form */
    private function _validate() {
        $data = [];
        $data['inputerror'] = [];
        $data['error_string'] = [];
        $data['status'] = TRUE;
 
        if ($this->input->post('username') == '') {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'username harus diisi';
            $data['status'] = FALSE;
        }

        if ($this->input->post('password') == '') {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'password harus diisi';
            $data['status'] = FALSE;
        }
 
        if ($data['status'] === FALSE) {
            $data['success'] = true;
            echo json_encode($data);
            exit();
        }
    }

    private function _cek_login() {
        // cek input dari user
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        // cari user di database
        $user = $this->auth_model->get_by_username($username);
        
        if ($user) { // jika user ditemukan
            // cek status user
            if ($user->is_active == 1) {
                // cek password
                if (!password_verify($password, $user->password)) {
                    echo json_encode([
                        'success' => true,
                        'status' => false,
                        'error' => 'password'
                    ]);
                } else {
                    $data = [
                        'username' => $user->username,
                        'nama' => $user->nama,
                        'role' => $user->role,
                        'token' => bin2hex(openssl_random_pseudo_bytes(24))
                    ];
                    // masukkan data user ke dalam session
                    $this->session->set_userdata($data);

                    echo json_encode([
                        'success' => true,
                        'status' => true,
                    ]);
                }
            } else { // jika user tidak aktif / banned
                echo json_encode([
                    'success' => true,
                    'status' => false,
                    'error' => 'banned'
                ]);
            }
        } else { // jika user tidak ditemukan
            echo json_encode([
                'success' => true,
                'status' => false,
                'error' => 'not found'
            ]);
        }
    }

    public function logout() {
        $query_string_token = !empty($this->input->get('token')) ? $this->input->get('token') : '';
        if (hash_equals($this->session->userdata('token'), $query_string_token)) {
            $this->session->sess_destroy();
            redirect('/');
        } else {
            show_error("this action doesn't allowed");
        }
    }

    public function blocked() {
        $this->load->view('auth/blocked');
    }

}
