<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['forms'] = 'home/index4';

$route['default_controller'] = 'Form_controller/index_forms';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['start'] = 'home/index';
$route['new_form'] = 'home/create_form';
$route['title_desc'] = 'home/title';
$route['forms_home'] = 'Form_controller/index_forms';
$route['forms/delete/(:any)'] = 'Form_controller/delete/$1';

