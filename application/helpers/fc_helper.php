<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('fc_truncate')) {
    function fc_truncate($text, $limit = 120) {
        return strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
    }
}
