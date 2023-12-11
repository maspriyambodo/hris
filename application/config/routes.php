<?php

defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
$route['Change%(:any)'] = 'Systems/Change/';
$route['keluaran_detail'] = 'Applications/Toto/Keluaran/Detail/';
$route['Setting%20Profile'] = 'Systems/Profile/';
$route['Dashboard'] = 'Applications/Dashboard/index/';
$route['Signin'] = 'Auth/index/';
$route['404_override'] = 'Error_404';
//=====================================finance========================================
$route['finance'] = 'Applications/Finance/Dashboard/index/';
$route['finance-update'] = 'Applications/Finance/Dashboard/Update/';
$route['finance-delete'] = 'Applications/Finance/Dashboard/Delete/';
//=====================================finance========================================
//=====================================idx========================================
$route['company-profiles'] = 'Idx/Compro/index/';
$route['trading-info-daily'] = 'Applications/Finance/Dashboard/index/';
//=====================================idx========================================
$route['translate_uri_dashes'] = false;
$route['bkm-upload'] = 'Bkm/Upload';
$route['bkm-save'] = 'Bkm/Save';
$route['bkm-getkab'] = 'Bkm/Getkab';
$route['bkm-getkec'] = 'Bkm/Getkec';
$route['bkm-getkel'] = 'Bkm/Getkel';