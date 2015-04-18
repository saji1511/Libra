<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager;
use League\Flysystem\Exception;

class VendorsMfgMap extends Model {

    protected $libraDb, $xcartDb;
    public function __construct(){
        $this->libraDb  = \Config::get('app.dbs.libradb');
        $this->xcartDb  = \Config::get('app.dbs.xcartdb');
    }

	public function getMfgs($id)
    {
        $query = 'select mfg.manufacturerid as id, mfg.manufacturer as name, count(1) as cnt
                    from '.$this->xcartDb.'.xcart_manufacturers mfg
                    join '.$this->libraDb.'.vendor_mfg_maps maps
                      on maps.manufacturerid = mfg.manufacturerid
                    JOIN '.$this->xcartDb.'.xcart_products xp
                      ON xp.manufacturerid = mfg.manufacturerid

                    where maps.vendor_id = :vendorid
                    GROUP BY xp.manufacturerid ';
        $result = \DB::select($query,['vendorid'=>$id]);
        return $result;
    }

    public function getProducts($id,$params)
    {
        $search ='';
        $where = array();
        if(!empty($params['search'])){
            $search = $params['search'];
        }
        if(!isset($params['offset'])){
            $params['offset'] = 0;
        }
        if(!isset($params['limit'])){
            $params['limit'] = 50;
        }
        if(!isset($params['sort'])){
            $params['sort']='productid';
            $params['order'] = 'desc';
        }
        $resultSet = \DB::table(\DB::raw($this->xcartDb.'.`xcart_products`'))
                    -> select('productid', 'productcode', 'product', 'list_price', 'forsale', 'ebay_id', 'amazon_id', 'mfgsku')
                    -> where('manufacturerid',$id)
                    -> where(function($query) use ($search){
                            if(!empty($search)) {
                                $query->where('productid', $search)
                                    ->orWhere('productcode', $search)
                                    ->orWhere('product', $search);
                            }
                    })
                    -> orderBy($params['sort'],$params['order'])
//                    -> limit($params['limit'])
//                    -> offset($params['offset'])
                    ->get();

        return $resultSet;
    }
}
