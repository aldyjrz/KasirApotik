<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'useragent' => 'CodeIgniter',
    'protocol'  => 'smtp',
    'mailpath'  => '/usr/sbin/sendmail',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'sample.arsip21@gmail.com',
    'smtp_pass' => 's4mple4rs1p',
    'smtp_keepalive' => TRUE,
    'smtp_crypto' => 'SSL',
    'wordwrap'  => TRUE,
    'wrapchars' => 80,
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'validate'  => TRUE,
    'crlf'      => "\r\n",
    'newline'   => "\r\n"
);