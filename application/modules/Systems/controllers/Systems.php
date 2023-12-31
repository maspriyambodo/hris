<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Systems extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_system', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'sys-config',
            'privilege' => $this->bodo->Check_previlege('sys-config'),
            'siteTitle' => 'System configurations | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Systems Settings',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Systems',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('sys_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Change() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'sys-config',
            'privilege' => $this->bodo->Check_previlege('sys-config'),
            'siteTitle' => 'Change Password | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Change Password',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Systems',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('pwd/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Favico() {
        shell_exec('chmod 777 ./assets/images/systems/favicon.*');
        $param = [
            'upload_path' => 'assets/images/systems/',
            'file_name' => "favicon",
            'input_name' => "favico",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $fav = _Upload($param);
        if (!$fav) {
            $result = [
                'status' => false,
                'msg' => 'error while upload favicon'
            ];
        } else {
            $exec = $this->model->Favico(['field' => 'favico', 'file_name' => $fav['file_name']]);
            if ($exec) {
                $result = [
                    'status' => true,
                    'msg' => 'favicon has been changed'
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'error while change favicon'
                ];
            }
        }
        shell_exec('chmod 777 ./assets/images/systems/favicon.*');
        return ToJson($result);
    }

    public function Logo() {
        shell_exec('chmod 777 ./assets/images/systems/logo.*');
        $param = [
            'upload_path' => 'assets/images/systems/',
            'file_name' => "logo",
            'input_name' => "logo_comp",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $fav = _Upload($param);
        if (!$fav) {
            $result = [
                'status' => false,
                'msg' => 'error while upload logo company'
            ];
        } else {
            $exec = $this->model->Favico(['field' => 'logo', 'file_name' => $fav['file_name']]);
            if ($exec) {
                $result = [
                    'status' => true,
                    'msg' => 'logo company has been changed'
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'error while change logo company'
                ];
            }
        }
        shell_exec('chmod 777 ./assets/images/systems/logo.*');
        return ToJson($result);
    }

    public function Old_pwd($param) {
        $id_user = $this->bodo->Dec($this->session->userdata('id_user'));
        $exec = $this->model->Old_pwd($id_user);
        if (password_verify($param, $exec->pwd)) {
            $result = [
                'status' => true,
                'msg' => 'password accepted'
            ];
        } else {
            $result = [
                'status' => false,
                'msg' => 'Sorry, your password was incorrect'
            ];
        }
        return ToJson($result);
    }

    public function Update_pwd() {
        $data = [
            'id_user' => $this->bodo->Dec($this->session->userdata('id_user')),
            'pwd' => password_hash(Post_input("cnf_pwd"), PASSWORD_DEFAULT)
        ];
        return $this->model->Update_pwd($data);
    }

    public function Update() {
        $data = [
            'company_name' => Post_input("comp_name"),
            'app_year' => Post_input("app_year"),
            'app_name' => Post_input("app_name"),
        ];
        return $this->model->Update($data);
    }

    public function Getkab() {
        $id = $this->input->Post_get('id_provinsi');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($this->model->Getkab($this->bodo->Dec($id)), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Getkec() {
        $id = $this->input->Post_get('id_kec');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($this->model->Getkec($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Getkel() {
        $id = $this->input->Post_get('id_kec');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($this->model->Getkel($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Profile() {
        $data = [
            'data' => $this->model->Profile($this->user),
            'prov' => $this->model->Provinsi(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'siteTitle' => 'Profile Setting | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Profile Setting',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Systems',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('profile/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Profile_save() {
        $param = [
            'upload_path' => 'assets/images/users/',
            'file_name' => 'users' . date('d_His'),
            'input_name' => "profile_avatar",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $pict = _Upload($param);
        $old_ava = Post_input("old_ava");
        $address_provinsi = $this->bodo->Dec(Post_input('provinsi'));
        if (!$pict['status'] or empty($pict['status'])) {
            $pict['file_name'] = $old_ava;
        } elseif (!$old_ava or empty($old_ava)) {
            $pict['file_name'] = 'blank.png';
        } else {
            if ($old_ava <> 'blank.png') {
                unlink('assets/images/users/' . $old_ava);
            }
        }
        $data = [
            'pict' => $pict['file_name'],
            'provinsi' => $address_provinsi
        ];
        return $this->Save_profile($data);
    }

    private function Save_profile($param) {
        $data = [
            'id_user' => $this->user,
            'sys_users' => [
                'uname' => Post_input('uname'),
                'pict' => $param['pict'],
                'sysupdateuser' => $this->user,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ],
            'dt_users' => [
                'nama' => Post_input('nama_lengkap'),
                'jenis_kelamin' => Post_input('gender'),
                'id_number' => Post_input('id_num'),
                'lahir_1' => Post_input('place_born'),
                'lahir_2' => Post_input('date_birth'),
                'address_1' => Post_input('alamat'),
                'address_provinsi' => $param['provinsi'],
                'address_kabupaten' => Post_input('kabupaten'),
                'address_kecamatan' => Post_input('kecamatan'),
                'address_kelurahan' => Post_input('kelurahan'),
                'mail' => Post_input('mail_user'),
                'telp' => Post_input('tlepon'),
                'sysupdateuser' => $this->user,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ]
        ];
        return $this->model->Profile_save($data);
    }

    public function Check_uname() {
        $uname = Post_get('val');
        $exec = $this->model->Check_uname($uname);
        if ($exec) {
            $response = [
                'stat' => false,
                'msg' => 'Username already exist, please use another username!'
            ];
        } else {
            $response = [
                'stat' => true,
                'msg' => 'Username available to use!'
            ];
        }
        return ToJson($response);
    }

}
