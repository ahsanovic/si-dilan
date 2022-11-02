<?php

function is_logged_in() {
    $ci = get_instance();

    // if user not login, kick!
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }

}