<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ContactsModel extends Model{
    protected $table = 'contacts';
    protected $allowedFields = ['id','first_Name','last_Name','image','company','job','email','phone','note','favory','createDate'];
}