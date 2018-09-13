<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['custom_base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/LiveProjects/maayog/app/admin/';
 $config['email_detail'] = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.maayog.com',
			'smtp_port' => 465, //587
			'smtp_user' => 'info@maayog.com',
			'smtp_pass' => 'oH?t&?z&lKdh',
			'smtp_crypto' => 'ssl',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

?>