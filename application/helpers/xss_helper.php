<?php

function xss_filter($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}