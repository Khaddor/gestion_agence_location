<?php

namespace App\Http\Controllers\admin;

use App\Models\Tenant;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $tenants = Tenant::paginate(10);
        return view('admin.tenants.tenants')->with('tenants' , $tenants);
    }

    public function index_add (){
        return view('admin.tenants.add_tenant');
    }

    public function index_edit ($id) {

        $tenant = Tenant::where('id' , $id)->first();
        return view('admin.tenants.edit_tenant')->with('tenant' , $tenant);
    }

    public function store(Request $req)
    {

        $req->validate([
            'name' => 'required',
            'number' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required|email',

        ]);

        $tenant = new Tenant();
        $tenant->name = $req->name;
        $tenant->phone_number = $req->number;
        $tenant->email = $req->email;
        $tenant->city = $req->city;
        $tenant->address = $req->address;
        $tenant->image = 'null';
        $tenant->save();

        return redirect()->route('tenants_index')->with('success' , 'Tenant Added successfully');
    }



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


    public function search (Request $req){
        $output = '';
       $tenants = Tenant::where('name' , 'LIKE' , '%'.$req->search.'%')->paginate(10);
//        $tenants= DB::table('tenants')->where('name','LIKE','%'.$req->search."%")->get();

        if($tenants){
            foreach ($tenants as $key => $tenant) {
                $output.='<tr>'.
                '<td>'.$tenant->id.'</td>'.
                '<td>'.$tenant->name.'</td>'.
                '<td>'.$tenant->phone_number.'</td>'.
                '<td>'.$tenant->email.'</td>'.
                '<td>'.Str::limit($tenant->address ,20).'</td>'.
                '<td>'.$tenant->city.'</td>'.
                '<td>'.
                //  '<a href="{{route("index_edit" , '.$tenant->id.')}}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-sm"></i> </a>'.
                '<a href="/tenants/edit/'.$tenant->id.'" class="btn btn-info btn-sm"><i class="fa fa-edit fa-sm"></i> </a>'.   
                  '<a href="/tenant/delete/'.$tenant->id.'" onclick="return confirm("Are you sure?")"  class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i> </a>'.
                '</td>'.
                '</tr>';
                }

                return response($output);
            }

    }

}
