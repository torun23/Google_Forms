<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['forms'] = 'Form_controller/index';

$route['default_controller'] = 'home/index2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['start'] = 'home/index';
$route['new_form'] = 'home/create_form';
$route['title_desc'] = 'home/title';


