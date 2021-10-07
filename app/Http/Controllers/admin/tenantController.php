<?php

namespace App\Http\Controllers\admin;

use App\Models\Tenant;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class tenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tenants = Tenant::all();
        return view('admin.tenants.tenants')->with('tenants' , $tenants);
    }

    public function index_add (){
        return view('admin.tenants.add_tenant');
    }

    public function index_edit ($id) {

        $tenant = Tenant::where('id' , $id)->first();
        return view('admin.tenants.edit_tenant')->with('tenant' , $tenant);
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
        $req->validate([
            'name' => 'required',
            'number' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required|email',

        ]);

        $tenant = Tenant::create([
            'name' => $req->name ,
            'phone_number' => $req->number ,
            'email' => $req->email,
            'city' => $req->city ,
            'address' => $req->address,
            'image' => 'null'

        ]);

        return redirect()->back()->with('success' , 'Tenant added succesfully');
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
    public function update(Request $req)
    {
        $tenant = Tenant::where('id' , $req->id)->first();

        $req->validate([
            'name' => 'required',
            'number' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required|email',

        ]);

        $tenant->name = $req->name;
        $tenant->phone_number = $req->number;
        $tenant->email = $req->email;
        $tenant->city = $req->city;
        $tenant->address = $req->address;
        $tenant->image = 'null';
        $tenant->update();

        return redirect()->route('tenants_index')->with('success' , 'Product Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tenant = Tenant::where('id' , $id)->first();
       $tenant->delete();

        return redirect()->route('tenants_index')->with('success' , 'Tenant deleted successfully');
    }
}
