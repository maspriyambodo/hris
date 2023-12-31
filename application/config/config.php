<?php

defined('BASEPATH')OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['base_url'] .= "://" . $_SERVER['HTTP_HOST'];
$config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$config['modules_locations'] = [APPPATH . 'modules/'];
$config['index_page'] = '';
$config['uri_protocol'] = 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language'] = 'english';
$config['charset'] = 'utf-8';
$config['enable_hooks'] = true;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = 'vendor/autoload.php'; //'vendor/autoload.php'
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-&';
$config['enable_query_strings'] = false;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = true;
$config['log_threshold'] = 1;
$config['log_path'] = '';
$config['log_file_extension'] = 'txt';
$config['log_file_permissions'] = 0755;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = false;
$config['encryption_key'] = hex2bin('4f47938a381348d13c258dc2ab73e3db');
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'bodo_cms';
$config['sess_expiration'] = time() + 60 * 60 * 24 * 30;
$config['sess_save_path'] = APPPATH . 'sessions';
$config['sess_match_ip'] = false;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = false;
$config['cookie_prefix'] = '';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = false;
$config['cookie_httponly'] = false;
$config['standardize_newlines'] = false;
$config['global_xss_filtering'] = true;
$config['csrf_protection'] = false;
$config['csrf_token_name'] = 'bodo_csrf_token';
$config['csrf_cookie_name'] = 'bodo_csrf_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = true;
$config['csrf_exclude_uris'] = [];
$config['compress_output'] = false;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = false;
