<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class rentPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contracts = Contract::all();
        return view('admin.rents.rented_properties')->with('contracts', $contracts);
    }
    public function rent_index (){
        
        $properties = Property::where('isRented','0')->get();
        $tenants = Tenant::all();

        return view('admin.rents.rent_property')->with([
            'properties' => $properties,
            'tenants' => $tenants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $req->validate([
            'property' => 'required',
            'tenant' => 'required',
            'rent_type' => 'required',
            'rent_amount' => 'required',
        ]);

        $contract = Contract::create([
            'rent_type' => $req->rent_type,
            'rent_amount' => $req->rent_amount,
            'date' => date("Y-m-d"),
            'close_date' => $req->close_date
        ]);
        $contract->save();
        $property = Property::where('id' , $req->property)->first();
        $property->isRented = 1;
        $property->contract_id = $contract->id;
        $property->save();

        $tenant = Tenant::where('id' , $req->tenant)->first();
        $tenant->contract_id = $contract->id;
        $tenant->save();

        return redirect()->back()->with('success' , 'Property rented Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
