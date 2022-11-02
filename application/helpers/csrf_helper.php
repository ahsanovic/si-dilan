<?php

if (!function_exists('csrf_name')) {
    function csrf_name() {
        return 'token';
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token() {
        $ci = get_instance();
        if (!$ci->session->csrf_token) {
            $ci->session->csrf_token = hash('sha1', time());
        }
        return $ci->session->csrf_token;
    }
}

if (!function_exists('cek_csrf')) {
    function cek_csrf() {
        $ci = get_instance();
        if ($ci->input->post('token') != $ci->session->csrf_token || !$ci->input->post('token') || !$ci->session->csrf_token) {
            $ci->session->unset_userdata('csrf_token');
            $ci->output->set_status_header(403);
            show_error('Forbidden access!');
            return false;
        }
    }
}

if (!function_exists('cek_csrf_ajax')) {
    function cek_csrf_ajax() {
        $ci = get_instance();
        if ($ci->input->post('token') != $ci->session->csrf_token || !$ci->input->post('token') || !$ci->session->csrf_token) {
            $ci->session->unset_userdata('csrf_token');
            echo json_encode(['status' => false]);
            exit();
        }
    }
}

if (!function_exists('csrf')) {
    function csrf() {
        return '<input type="hidden" name="'.csrf_name().'" value="'.csrf_token().'" />';
    }
}

if (!function_exists('hash_id')) {
    function hash_id($id = 'hash_id') {
        $str = '';
        for ($i = 0; $i < strlen($id); $i++) {
            $str .= hash('sha256', substr($id, $i, 1));
        }
        return hash('sha1', $str);
    }
}

if (!function_exists('cek_ajax')) {
    function cek_ajax() {
        $ci = get_instance();
        if (!$ci->input->is_ajax_request()) {
            $ci->output->set_status_header(403);
            show_error('The action doesn\'t allowed!');
        }
    }
}

if (!function_exists('hash_equals')) {
    function hash_equals($str1, $str2)
    {
        if (strlen($str1) != strlen($str2)) {
            return false;
        } else {
            $res = $str1 ^ $str2;
            $ret = 0;
            for ($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
            return !$ret;
        }
    }
}