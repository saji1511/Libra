<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vendors;
use App\Manufacturers;
use App\VendorsMfgMap;
use Illuminate\Http\Request;

class VendorsMfgMapController extends Controller {

    public function showmfgmap()
    {
        $vendorsObj = new Vendors();
        $vendors = $vendorsObj->all(['id','name'])->toArray();

        $mfgObj = new Manufacturers();
        $mfgs = $mfgObj->all(['manufacturerid','manufacturer'])->toArray();

        return view('vendors.editmfg',compact('vendors','mfgs'));
    }

    public function mfgs($id){
        $vendorMap = new VendorsMfgMap();
        return $vendorMap->getMfgs($id);
    }

    public function products($id){
        $params=array();
        if(isset($_GET['sort'])){
            $params['sort']=\Input::get('sort');
        }

        if(isset($_GET['order'])){
            $params['order']=\Input::get('order');
        }
        if(isset($_GET['search'])){
            $params['search']=\Input::get('search');
        }
        if(isset($_GET['offset'])){
            $params['offset']=\Input::get('offset');
        }
        if(isset($_GET['limit'])){
            $params['limit']=\Input::get('limit');
        }
        $vendorMap = new VendorsMfgMap();
        return $vendorMap->getProducts($id,$params);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showMfgs($id)
	{
        return view('vendors.vendormfglist',compact('id'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function showProducts($id)
	{
        return view('vendors.vmproductslist',compact('id'));
	}
}
