<?php
namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model{

    // for saved data
    protected $table='books';
    protected $allowedFields=['title','author','isbn_no'];

// for dispaly data from db
    public function getRecords(){
       return $this->orderBy('id','DESC')->findAll();
    }

// for edit data
        public function getRow($id){
       return $this->where('id',$id)->first();
    }
}
?>