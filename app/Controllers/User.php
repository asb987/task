<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddContactModel;

class User extends BaseController
{
    public function index()
    {
		if(session()->get('role')!=2){
			session()->destroy();
			return redirect()->to('login');
		}
		$data['name'] = 'admin/dashboard';
		$footerdata['name'] = 'admin/dashboard';
        $this->global['pageTitle'] = 'User: Dashboard';
		$this->load->loadViews('company/dashboard', $this->global, $data, $footerdata);
    }


    public function add_contact($id="")
    {
		if(session()->get('role')!=2){
			session()->destroy();
			return redirect()->to('login');
		}
		$comp_id=session()->get('comp_id');
		$data['name'] = 'admin/dashboard';
		$footerdata['name'] = 'admin/dashboard';
        $this->global['pageTitle'] = 'User: Add Contact Company';
		$add_contact=new AddContactModel;
		$data['contact_all']=$add_contact->where('companyid',$comp_id)->findAll();
		$data['contact']=$add_contact->where('id',$id)->findAll();

		$this->load->loadViews('company/add_contact', $this->global, $data, $footerdata);
    }


    public function add_conntact_action()
    {
		if(session()->get('role')!=2){
			session()->destroy();
			return redirect()->to('login');
		}
		helper(['form']);
		
		$id=$this->request->getVar('id');
		$input = $this->validate([            
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required',
            'designation' => 'required'
        ]);

        if (!$input) {
            session()->setFlashdata(['error' => 'Please Check something went wrong']);
            session()->setFlashdata(['validation' => $this->validator->getErrors()]);
			if($id>0){
				return redirect()->to('add_contact/'.$id);
			}else{
				return redirect()->to('add_contact');
			}
        } else {
			$name=$this->request->getVar('name');
			$email=$this->request->getVar('email');
			$mobile=$this->request->getVar('mobile');
			$designation=$this->request->getVar('designation');
			$comp_id=session()->get('comp_id');
			$add_contact=new AddContactModel;
			
			$add_contct_dtl=array(
				'id'=>$id,
				'companyid'=>$comp_id,
				'name'=>$name,
				'email'=>$email,
				'phone'=>$mobile,
				'designation'=>$designation
			);
			
			
			$add_contact->save($add_contct_dtl);
			
			if($add_contact->getInsertID()>0  or $add_contact->affectedRows()>0){
				session()->setFlashdata(['success' => 'Contact Added Successful']);
				return redirect()->to('add_contact');
			}else{
				session()->setFlashdata(['error' => 'Contact adding Failed']);
				if($id>0){
					return redirect()->to('add_contact/'.$id);
				}else{
					return redirect()->to('add_contact');
				}
			}
		}
    }


	public function delete_contact($id)
    {
		if(session()->get('role')!=2){
			session()->destroy();
			return redirect()->to('login');
		}
		$comp_id=session()->get('comp_id');
		$add_contact=new AddContactModel;
		$data['contact_all']=$add_contact->where('id',$id)->where('companyid',$comp_id)->delete();
		session()->setFlashdata(['success' => 'Contact deleted Successful']);
		return redirect()->to('add_contact');
    }

}
