<?php defined("\x42\x41\123\x45\120\x41\x54\x48") or die("\x4e\157\x20\144\x69\x72\145\143\164\x20\x73\x63\x72\151\160\164\40\141\143\143\145\x73\x73\40\141\154\x6c\157\167\145\144"); class CI_Config { public $config = array(); public $is_loaded = array(); public $_config_paths = array(APPPATH); public function __construct() { $this->config =& get_config(); if (empty($this->config["\142\141\x73\145\x5f\165\162\x6c"])) { if (isset($_SERVER["\x53\105\122\126\x45\x52\x5f\101\104\x44\x52"])) { if (strpos($_SERVER["\x53\x45\122\x56\105\122\137\x41\x44\104\x52"], "\72") !== FALSE) { $server_addr = "\x5b" . $_SERVER["\x53\105\122\x56\105\122\x5f\x41\x44\x44\122"] . "\135"; } else { $server_addr = $_SERVER["\123\x45\x52\126\105\x52\137\x41\x44\x44\x52"]; } $base_url = (is_https() ? "\x68\164\164\x70\163" : "\x68\164\164\x70") . "\x3a\57\x2f" . $server_addr . substr($_SERVER["\x53\103\x52\111\x50\x54\x5f\x4e\101\115\x45"], 0, strpos($_SERVER["\x53\103\x52\x49\120\x54\x5f\116\x41\115\x45"], basename($_SERVER["\x53\103\x52\x49\x50\124\x5f\x46\111\114\105\x4e\x41\x4d\x45"]))); } else { $base_url = "\150\164\x74\160\72\57\x2f\x6c\x6f\x63\x61\154\150\x6f\x73\x74\x2f"; } $this->set_item("\142\141\163\x65\x5f\165\x72\154", $base_url); } log_message("\x69\156\x66\x6f", "\103\157\x6e\x66\x69\147\40\x43\x6c\x61\163\x73\x20\x49\x6e\151\x74\151\x61\x6c\x69\x7a\145\x64"); } public function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE) { $file = $file === '' ? "\x63\x6f\x6e\x66\151\x67" : str_replace("\x2e\160\150\x70", '', $file); $loaded = FALSE; foreach ($this->_config_paths as $path) { foreach (array($file, ENVIRONMENT . DIRECTORY_SEPARATOR . $file) as $location) { $file_path = $path . "\x63\x6f\x6e\x66\151\147\x2f" . $location . "\x2e\160\x68\160"; if (in_array($file_path, $this->is_loaded, TRUE)) { return TRUE; } if (!file_exists($file_path)) { continue; } include $file_path; if (!isset($config) or !is_array($config)) { if ($fail_gracefully === TRUE) { return FALSE; } show_error("\x59\157\165\x72\x20" . $file_path . "\x20\146\x69\x6c\145\40\144\157\x65\163\x20\x6e\x6f\164\40\141\x70\160\145\141\x72\40\x74\x6f\x20\143\157\x6e\164\x61\151\x6e\x20\141\x20\x76\141\154\151\144\x20\143\x6f\156\x66\x69\x67\x75\162\141\164\x69\x6f\x6e\40\141\x72\162\x61\x79\56"); } if ($use_sections === TRUE) { $this->config[$file] = isset($this->config[$file]) ? array_merge($this->config[$file], $config) : $config; } else { $this->config = array_merge($this->config, $config); } $this->is_loaded[] = $file_path; $config = NULL; $loaded = TRUE; log_message("\x64\145\142\165\147", "\x43\157\x6e\x66\x69\147\x20\x66\x69\x6c\145\40\154\157\x61\x64\145\144\x3a\40" . $file_path); } } if ($loaded === TRUE) { return TRUE; } elseif ($fail_gracefully === TRUE) { return FALSE; } show_error("\124\x68\145\40\x63\x6f\x6e\x66\151\x67\165\162\141\x74\x69\157\x6e\40\146\151\154\x65\x20" . $file . "\56\x70\150\160\x20\144\x6f\x65\163\40\156\157\164\40\x65\x78\151\163\164\x2e"); } public function item($item, $index = '') { if ($index == '') { return isset($this->config[$item]) ? $this->config[$item] : NULL; } return isset($this->config[$index], $this->config[$index][$item]) ? $this->config[$index][$item] : NULL; } public function slash_item($item) { if (!isset($this->config[$item])) { return NULL; } elseif (trim($this->config[$item]) === '') { return ''; } return rtrim($this->config[$item], "\57") . "\57"; } public function site_url($uri = '', $protocol = NULL) { $base_url = $this->slash_item("\142\x61\163\x65\x5f\165\162\x6c"); if (isset($protocol)) { if ($protocol === '') { $base_url = substr($base_url, strpos($base_url, "\57\57")); } else { $base_url = $protocol . substr($base_url, strpos($base_url, "\x3a\x2f\x2f")); } } if (empty($uri)) { return $base_url . $this->item("\x69\x6e\x64\x65\170\x5f\x70\x61\x67\145"); } $uri = $this->_uri_string($uri); if ($this->item("\145\x6e\x61\142\154\145\137\161\x75\x65\162\x79\137\x73\x74\x72\151\156\x67\x73") === FALSE) { $suffix = isset($this->config["\165\162\154\x5f\163\x75\146\x66\x69\170"]) ? $this->config["\165\x72\x6c\137\163\x75\x66\x66\151\170"] : ''; if ($suffix !== '') { if (($offset = strpos($uri, "\x3f")) !== FALSE) { $uri = substr($uri, 0, $offset) . $suffix . substr($uri, $offset); } else { $uri .= $suffix; } } return $base_url . $this->slash_item("\x69\x6e\144\x65\170\137\x70\x61\x67\x65") . $uri; } elseif (strpos($uri, "\77") === FALSE) { $uri = "\x3f" . $uri; } return $base_url . $this->item("\x69\156\144\x65\170\x5f\x70\141\x67\x65") . $uri; } public function base_url($uri = '', $protocol = NULL) { $base_url = $this->slash_item("\x62\141\163\x65\x5f\x75\162\x6c"); if (isset($protocol)) { if ($protocol === '') { $base_url = substr($base_url, strpos($base_url, "\x2f\x2f")); } else { $base_url = $protocol . substr($base_url, strpos($base_url, "\72\x2f\x2f")); } } return $base_url . $this->_uri_string($uri); } protected function _uri_string($uri) { if ($this->item("\145\156\x61\x62\x6c\x65\x5f\x71\x75\x65\162\171\137\x73\x74\162\x69\x6e\x67\163") === FALSE) { is_array($uri) && ($uri = implode("\x2f", $uri)); return ltrim($uri, "\57"); } elseif (is_array($uri)) { return http_build_query($uri); } return $uri; } public function system_url() { $x = explode("\x2f", preg_replace("\174\x2f\x2a\x28\x2e\53\77\51\57\x2a\x24\x7c", "\134\61", BASEPATH)); return $this->slash_item("\142\141\163\145\x5f\165\x72\x6c") . end($x) . "\57"; } public function set_item($item, $value) { $this->config[$item] = $value; } }