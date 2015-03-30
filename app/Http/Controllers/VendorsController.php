<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers;
use App\Http\Requests\CreateVendorRequest;
use App\Vendors;
use Request;


class VendorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('vendors.list');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id=null)
	{
	    $vendors = new Vendors();
		if(is_null($id) ) {
		    $returnObj = $vendors->all();
		}else{
            $returnObj =  $vendors->find($id);
		}
        return $returnObj;
	}

    /**
     * Setting cron
     */
    public function setCron($id){
        if(!is_null($id)){
            $vendor = Vendors::find($id);
            $vendor->set_cron = 1;
            $vendor->save();
        }
        return view('vendors.list');
    }

    /**
     * Setting cron
     */
    public function unsetCron($id){
        if(!is_null($id)){
            $vendor = Vendors::find($id);
            $vendor->set_cron = 0;
            $vendor->save();
        }
        return view('vendors.list');
    }

    /**
     * Setting cron
     */
    public function activate($id){
        if(!is_null($id)){
            $vendor = Vendors::find($id);
            $vendor->active = 1;
            $vendor->save();
        }
        return view('vendors.list');
    }

    /**
     * Setting cron
     */
    public function deactivate($id){
        if(!is_null($id)){
            $vendor = Vendors::find($id);
            $vendor->active = 0;
            $vendor->save();
        }
        return view('vendors.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($params)
    {
        $vendor = new Vendors();
        $vendor->update()->where('id',$params['id']);
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('vendors.edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateVendorRequest $input)
    {
        if(isset($input['id'])) {
            $vendor = Vendors::find($input['id']);
            $vendor->update($input->all());
        }else{
            Vendors::create($input->all());
        }
        return view('vendors.list');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id=null)
	{
        if(!is_null($id)){
            $vendor = Vendors::find($id);
        }
        return view('vendors.edit',compact('vendor'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
