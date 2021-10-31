<?php

namespace App\Models;

use CodeIgniter\Model;

class AddCompanyModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'companylist';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['companyname','email','phone','address','city',];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
	
	
	public function get_company($name,$page = '', $limit = '')
	{
		$db = \Config\Database::connect('default');
		$builder=$db->table('companylist');
		$builder->select('*');
		$builder->join('tbl_user','tbl_user.email=companylist.email');
		$builder->where('tbl_user.role_id',2);
		if($name!=""){
			$builder->like('companyname',$name,'both');
			$builder->orLike('companylist.email',$name);
		}
		/* if($email!=""){
			$builder->where('companylist.email',$email);
		} */
		if($page!='' || $limit!='')
		{
			$builder->limit($limit,$page);
		}
		return $query = $builder->get()->getResultArray();
	}
}
