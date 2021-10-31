<?php

namespace App\Libraries;

class Base_library
{
	
	public function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
	   
	   echo view('includes/user_header',$headerInfo);        
       echo view($viewName,$pageInfo);
       echo view('includes/user_footer',$footerInfo);
	}
	
	public function loadViewsSuperadmin($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
	   
	   echo view('includes/super_admin_header',$headerInfo);        
       echo view($viewName,$pageInfo);
       echo view('includes/super_admin_footer',$footerInfo);
	}
}