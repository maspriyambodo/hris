<?php defined("\x42\x41\x53\105\x50\x41\x54\x48") or die("\116\157\40\x64\x69\x72\145\x63\x74\x20\x73\x63\x72\x69\160\164\40\x61\x63\143\145\x73\x73\x20\x61\x6c\154\157\x77\145\144"); class CI_DB_mysqli_driver extends CI_DB { public $dbdriver = "\x6d\x79\x73\161\154\x69"; public $compress = FALSE; public $delete_hack = TRUE; public $stricton; protected $_escape_char = "\x60"; protected $_mysqli; public function db_connect($persistent = FALSE) { if ($this->hostname[0] === "\x2f") { $hostname = NULL; $port = NULL; $socket = $this->hostname; } else { $hostname = $persistent === TRUE ? "\160\72" . $this->hostname : $this->hostname; $port = empty($this->port) ? NULL : $this->port; $socket = NULL; } $client_flags = $this->compress === TRUE ? MYSQLI_CLIENT_COMPRESS : 0; $this->_mysqli = mysqli_init(); $this->_mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10); if (isset($this->stricton)) { if ($this->stricton) { $this->_mysqli->options(MYSQLI_INIT_COMMAND, "\x53\105\x54\40\x53\x45\123\x53\111\117\x4e\40\x73\x71\x6c\x5f\x6d\157\144\145\40\75\x20\x43\117\x4e\103\x41\124\x28\x40\100\163\x71\x6c\137\x6d\x6f\144\145\x2c\40\x22\x2c\x22\x2c\x20\42\x53\124\122\111\103\124\137\x41\x4c\x4c\137\x54\x41\102\x4c\x45\123\42\51"); } else { $this->_mysqli->options(MYSQLI_INIT_COMMAND, "\x53\105\124\x20\x53\x45\x53\123\x49\x4f\x4e\x20\x73\161\x6c\x5f\155\157\x64\x65\x20\x3d\xa\x9\11\11\x9\11\x52\x45\120\x4c\x41\x43\x45\x28\x52\105\x50\x4c\x41\x43\105\x28\122\x45\120\114\x41\103\x45\x28\122\x45\120\x4c\101\x43\x45\x28\122\105\x50\x4c\x41\103\105\50\x52\x45\x50\114\x41\x43\105\50\xa\11\x9\x9\11\x9\100\100\x73\x71\x6c\137\155\x6f\x64\x65\54\12\x9\11\x9\x9\x9\x22\123\x54\x52\x49\103\124\x5f\x41\114\114\137\124\x41\102\114\105\x53\54\x22\x2c\x20\42\42\x29\x2c\xa\x9\x9\x9\x9\x9\x22\x2c\123\x54\x52\x49\103\124\x5f\101\114\114\137\124\x41\102\x4c\105\x53\x22\x2c\x20\42\42\x29\54\xa\x9\11\11\11\11\42\x53\x54\122\111\x43\124\x5f\101\114\114\x5f\x54\101\102\114\105\123\42\54\x20\x22\42\x29\54\12\x9\x9\11\11\x9\42\x53\x54\x52\x49\x43\x54\x5f\124\x52\x41\116\x53\x5f\124\x41\102\114\105\123\54\42\54\40\42\42\x29\x2c\xa\11\11\11\11\11\42\x2c\123\124\122\x49\103\x54\x5f\124\x52\101\116\123\137\x54\x41\x42\x4c\105\123\x22\54\40\42\42\x29\54\12\x9\11\11\11\11\42\x53\124\x52\111\103\x54\x5f\x54\x52\101\116\123\x5f\x54\x41\x42\x4c\x45\123\42\54\x20\42\42\51"); } } if (is_array($this->encrypt)) { $ssl = array(); empty($this->encrypt["\x73\163\154\137\x6b\x65\x79"]) or $ssl["\x6b\145\x79"] = $this->encrypt["\x73\163\154\137\x6b\145\x79"]; empty($this->encrypt["\x73\163\154\137\143\145\x72\164"]) or $ssl["\143\x65\x72\x74"] = $this->encrypt["\x73\163\x6c\137\x63\x65\162\x74"]; empty($this->encrypt["\163\x73\x6c\137\x63\141"]) or $ssl["\x63\x61"] = $this->encrypt["\x73\163\x6c\137\x63\x61"]; empty($this->encrypt["\x73\163\x6c\x5f\143\141\x70\x61\x74\150"]) or $ssl["\143\141\x70\141\x74\x68"] = $this->encrypt["\x73\163\x6c\137\143\x61\160\141\x74\150"]; empty($this->encrypt["\x73\x73\154\137\x63\151\x70\x68\x65\162"]) or $ssl["\x63\151\x70\x68\x65\162"] = $this->encrypt["\163\x73\154\137\x63\x69\x70\x68\145\162"]; if (isset($this->encrypt["\x73\x73\154\x5f\166\x65\x72\x69\x66\171"])) { $client_flags |= MYSQLI_CLIENT_SSL; if ($this->encrypt["\x73\x73\x6c\137\166\x65\162\151\x66\x79"]) { defined("\115\131\123\x51\x4c\x49\x5f\x4f\120\x54\x5f\123\123\114\x5f\x56\x45\122\x49\106\131\137\x53\105\x52\126\x45\122\x5f\x43\x45\x52\x54") && $this->_mysqli->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, TRUE); } elseif (defined("\115\x59\x53\121\114\x49\x5f\x43\x4c\x49\x45\x4e\x54\x5f\123\123\114\x5f\104\x4f\x4e\x54\137\x56\105\x52\111\x46\131\137\123\x45\x52\x56\x45\122\137\103\105\x52\124")) { $client_flags |= MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT; } } if (!empty($ssl)) { $client_flags |= MYSQLI_CLIENT_SSL; $this->_mysqli->ssl_set(isset($ssl["\x6b\x65\x79"]) ? $ssl["\153\145\171"] : NULL, isset($ssl["\x63\x65\x72\x74"]) ? $ssl["\x63\x65\162\164"] : NULL, isset($ssl["\x63\x61"]) ? $ssl["\x63\141"] : NULL, isset($ssl["\x63\x61\160\x61\x74\150"]) ? $ssl["\143\141\160\141\x74\150"] : NULL, isset($ssl["\x63\151\160\x68\x65\x72"]) ? $ssl["\x63\151\160\x68\x65\162"] : NULL); } } if ($this->_mysqli->real_connect($hostname, $this->username, $this->password, $this->database, $port, $socket, $client_flags)) { if ($client_flags & MYSQLI_CLIENT_SSL && version_compare($this->_mysqli->client_info, "\x35\x2e\x37\56\x33", "\74\75") && empty($this->_mysqli->query("\123\110\117\127\x20\123\x54\x41\x54\125\123\40\x4c\111\x4b\105\40\x27\163\163\x6c\137\143\151\x70\x68\145\x72\47")->fetch_object()->Value)) { $this->_mysqli->close(); $message = "\x4d\x79\x53\x51\x4c\x69\40\x77\x61\x73\40\x63\x6f\156\146\151\147\x75\162\x65\x64\40\x66\x6f\162\40\141\156\x20\123\123\x4c\x20\143\157\156\156\145\x63\164\x69\x6f\156\x2c\x20\x62\x75\164\40\147\157\x74\x20\x61\x6e\x20\165\x6e\145\156\x63\162\x79\160\164\145\x64\x20\x63\157\156\156\145\143\164\x69\x6f\x6e\x20\x69\156\x73\164\145\141\144\x21"; log_message("\145\162\x72\x6f\x72", $message); return $this->db_debug ? $this->display_error($message, '', TRUE) : FALSE; } return $this->_mysqli; } return FALSE; } public function reconnect() { if ($this->conn_id !== FALSE && $this->conn_id->ping() === FALSE) { $this->conn_id = FALSE; } } public function db_select($database = '') { if ($database === '') { $database = $this->database; } if ($this->conn_id->select_db($database)) { $this->database = $database; $this->data_cache = array(); return TRUE; } return FALSE; } protected function _db_set_charset($charset) { return $this->conn_id->set_charset($charset); } public function version() { if (isset($this->data_cache["\x76\145\162\x73\x69\x6f\156"])) { return $this->data_cache["\x76\145\x72\x73\x69\x6f\156"]; } return $this->data_cache["\x76\145\x72\163\x69\157\x6e"] = $this->conn_id->server_info; } protected function _execute($sql) { return $this->conn_id->query($this->_prep_query($sql)); } protected function _prep_query($sql) { if ($this->delete_hack === TRUE && preg_match("\57\x5e\x5c\163\52\104\x45\114\105\x54\105\134\163\x2b\x46\122\x4f\115\x5c\163\x2b\50\x5c\123\x2b\x29\x5c\163\52\x24\x2f\151", $sql)) { return trim($sql) . "\40\x57\x48\105\x52\105\x20\61\x3d\x31"; } return $sql; } protected function _trans_begin() { $this->conn_id->autocommit(FALSE); return is_php("\65\56\65") ? $this->conn_id->begin_transaction() : $this->simple_query("\x53\x54\101\x52\x54\x20\x54\x52\101\x4e\x53\101\x43\x54\x49\x4f\x4e"); } protected function _trans_commit() { if ($this->conn_id->commit()) { $this->conn_id->autocommit(TRUE); return TRUE; } return FALSE; } protected function _trans_rollback() { if ($this->conn_id->rollback()) { $this->conn_id->autocommit(TRUE); return TRUE; } return FALSE; } protected function _escape_str($str) { return $this->conn_id->real_escape_string($str); } public function affected_rows() { return $this->conn_id->affected_rows; } public function insert_id() { return $this->conn_id->insert_id; } protected function _list_tables($prefix_limit = FALSE) { $sql = "\x53\x48\117\x57\40\x54\x41\102\114\x45\x53\x20\106\x52\x4f\x4d\40" . $this->_escape_char . $this->database . $this->_escape_char; if ($prefix_limit !== FALSE && $this->dbprefix !== '') { return $sql . "\40\114\x49\113\x45\x20\x27" . $this->escape_like_str($this->dbprefix) . "\45\x27"; } return $sql; } protected function _list_columns($table = '') { return "\x53\x48\117\x57\x20\x43\x4f\x4c\125\115\116\123\40\106\122\117\x4d\x20" . $this->protect_identifiers($table, TRUE, NULL, FALSE); } public function field_data($table) { if (($query = $this->query("\123\110\117\x57\x20\103\x4f\x4c\x55\x4d\116\x53\x20\x46\122\x4f\x4d\x20" . $this->protect_identifiers($table, TRUE, NULL, FALSE))) === FALSE) { return FALSE; } $query = $query->result_object(); $retval = array(); for ($i = 0, $c = count($query); $i < $c; $i++) { $retval[$i] = new stdClass(); $retval[$i]->name = $query[$i]->Field; sscanf($query[$i]->Type, "\x25\133\141\55\172\135\50\x25\144\x29", $retval[$i]->type, $retval[$i]->max_length); $retval[$i]->default = $query[$i]->Default; $retval[$i]->primary_key = (int) ($query[$i]->Key === "\120\122\111"); } return $retval; } public function error() { if (!empty($this->_mysqli->connect_errno)) { return array("\143\x6f\144\145" => $this->_mysqli->connect_errno, "\155\145\x73\163\x61\x67\x65" => $this->_mysqli->connect_error); } return array("\x63\x6f\x64\145" => $this->conn_id->errno, "\x6d\145\163\163\x61\147\x65" => $this->conn_id->error); } protected function _from_tables() { if (!empty($this->qb_join) && count($this->qb_from) > 1) { return "\x28" . implode("\x2c\40", $this->qb_from) . "\51"; } return implode("\54\40", $this->qb_from); } protected function _close() { $this->conn_id->close(); } }