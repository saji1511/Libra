<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Manufacturers extends Model {

	//protected $connection,$table;
    public function __construct(){
        $this->connection = 'mysql2';
        $this->table = 'xcart_manufacturers';
    }

}
