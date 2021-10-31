<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        echo view("login");
    }
	
	public function auth()
    {
        $session = session();
        $login_obj = new LoginModel();
        $email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$data = $login_obj->where('email', $email)->first();
		print_r($data);
        if($data){
            $pass = $data['password'];
            //$verify_pass = password_verify($password, $pass);
            if($password==$pass){
                $ses_data = [
					'userId'			=>$data['user_id'],
					'comp_id'			=>$data['comp_id'],
					'email'				=>$data['email'],
					'name'				=>$data['name'],
					'role'				=>$data['role_id'],
                    'logged_in'			=> TRUE
				];
				 $session->set($ses_data);
				 //print_r($_SESSION);exit;
				 if($data['role_id']==1){
                  return redirect()->to('super_admin');
				 }elseif($data['role_id']==2)
				 {
					 return redirect()->to('dashboard');
				 }
            }else{
                $session->setFlashdata('msg', 'Invalid Credential. Please try again');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'Invalid Credential. Please Contact to Admin');
            return redirect()->to('/');
        }
    }
}
