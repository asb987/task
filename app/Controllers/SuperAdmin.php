<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\AddCompanyModel;

class SuperAdmin extends BaseController
{	
    public function index()
    {
		//check Admin by role
		if(session()->get('role')!=1){
			session()->destroy();
			return redirect()->to('login');
		}
		
		$data['name'] = 'admin/dashboard';
		$footerdata['name'] = 'admin/dashboard';
        $this->global['pageTitle'] = 'Super Admin: Dashboard';	//title
		$this->load->loadViewsSuperadmin('admin/dashboard', $this->global, $data, $footerdata);	//view
    }

    public function add_company($id='')
    {
		if(session()->get('role')!=1){
			session()->destroy();
			return redirect()->to('login');
		}
		$company=new AddCompanyModel;	//companylist model object
		$data['company']=$company->where('id',$id)->find();		//find companylist data by id
		//print_r($data['company']);exit;
		$data['name'] = 'Add Company';
		$footerdata['name'] = 'SuperAdmin';
        $this->global['pageTitle'] = 'Super Admin: Add Company';
		$this->load->loadViewsSuperadmin('admin/add_company', $this->global, $data, $footerdata);	//view
    }
	
	public function logout()
    {
        $session = session();
        $session->destroy();	//session destroy
        return redirect()->to('/login');
    }

	public function add_company_action()
    {
		if(session()->get('role')!=1){
			session()->destroy();
			return redirect()->to('login');
		}
		helper(['form']);
		
		$id=$this->request->getVar('id');
		$company_email=$this->request->getVar('company_email');
		$old_email=$this->request->getVar('old_email');
		$login=new LoginModel;
		
		$is_exit=$login->where('email',$company_email)->find();		//check email already Exits
		if(!empty($is_exit) and $id==''){
			session()->setFlashdata(['error' => 'Email is Already Exist Please use another']);
			return redirect()->to('add_company/'.$id);
		}
		
		//validation
		$input = $this->validate([            
            'company_name' => 'required',
            'company_email' => 'required|valid_email',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
		
		
		//if validation failed
        if (!$input) {
            session()->setFlashdata(['error' => 'Please Check something went wrong']);
            session()->setFlashdata(['validation' => $this->validator->getErrors()]);
			if($id>0){
				return redirect()->to('add_company/'.$id);
			}else{
				return redirect()->to('add_company');
			}
        } else {
			
			//insert;
			
			$company_name=$this->request->getVar('company_name');
			$mobile=$this->request->getVar('mobile');
			$address=$this->request->getVar('address');
			$city=$this->request->getVar('city');
			
			
			
			$company=new AddCompanyModel;
			
			$add_companylist_tbl=array(
				'id'		=> $id,
				'companyname'=>$company_name,
				'email'=>$company_email,
				'phone'=>$mobile,
				'address'=>$address,
				'city'=>$city
			);
			$company->save($add_companylist_tbl);
			$user_id="";
			if($id!=""){
				$data=$login->where('email',$old_email)->find();
				//print_r($data);exit;
				$user_id=$data[0]['user_id'];
				$comp_id=$id;
			}else{
				$comp_id=$company->getInsertID();
			}
			$add_tbl_user=array(
				'user_id'=>$user_id,
				'name'=>$company_name,
				'comp_id'=>$comp_id,
				'email'=>$company_email,
				'password'=>'123',
				'role_id'=>2,
				'is_active'=>1
			);
			
			//print_r($add_tbl_user);exit;
			
			$login->save($add_tbl_user);
			
			if(($company->getInsertID()>0 and $login->getInsertID()>0) or ($company->affectedRows()>0 and $login->affectedRows()>0)){
				session()->setFlashdata(['success' => 'Comapny Added Successful']);
				return redirect()->to('add_company');
			}else{
				session()->setFlashdata(['error' => 'Company adding Failed']);
				if($id>0){
					return redirect()->to('add_company/'.$id);
				}else{
					return redirect()->to('add_company');
				}
			}
			
		
		}
    }
	
	public function company_list()
    {
		if(session()->get('role')!=1){
			session()->destroy();
			return redirect()->to('login');
		}
		$company=new AddCompanyModel;
		$pager = service('pager');
		$name=$this->request->getVar('name');
		
		$page = (int)(($this->request->getVar('page') != null) ? $this->request->getVar('page') : 1) - 1;	//page no get value
		$perPage =  10;
		$total = count($company->get_company($name,$any1 = '', $any2 = ''));		// count total
        $pager->makeLinks($page, $perPage, $total);									// makein link with page
        $data['pager'] = $pager;
        $page = $page * $perPage;													//limit	
		$data['company_list'] = $company->get_company($name,$page, $perPage);		//get data
		$data['name'] = 'admin/dashboard';
		$footerdata['name'] = 'admin/dashboard';
        $this->global['pageTitle'] = 'Super Admin: List Company';
		$this->load->loadViewsSuperadmin('admin/company_list', $this->global, $data, $footerdata);
    }
	
	public function delete_company($id)
    {
		if(session()->get('role')!=1){
			session()->destroy();
			return redirect()->to('login');
		}
		$comp_id=session()->get('comp_id');
		$company=new AddCompanyModel;
		$login=new LoginModel;
		$company->where('id',$id)->delete();
		$login->where('comp_id',$id)->delete();
		session()->setFlashdata(['success' => 'Contact deleted Successful']);
		return redirect()->to('company_list');
    }
}
